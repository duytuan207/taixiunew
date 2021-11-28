<?PHP
if(isset($_GET['xoaall']))
{
    $mysqli->query("DELETE FROM lognap");
}
if(isset($_GET['xoa']))
{
    $mysqli->query("DELETE FROM `lognap` WHERE `id` = '".$_GET['id']."'");
}
if(isset($_GET['edit']))
{
    $mysqli->query("UPDATE `lognap` SET `trangthai` = '".$_GET['edit']."' WHERE `id` = '".$_GET['id']."'");
}
$ab = $mysqli->query("SELECT * FROM `lognap`  ORDER by id DESC LIMIT $start, $kmess ");
if ($mysqli->query("SELECT * FROM `lognap`")->num_rows > $kmess)
{
    $trang = '<center>' . trang('get/lognap&', $start, $mysqli->query("SELECT * FROM `lognap`")->num_rows, $kmess) . '</center>';
}
while($a=$ab->fetch_assoc())
{ 
    $list .= '<tr><td>'.$a['thoigian'].'</td><td>'.$a['telco'].'</td><td>'.number_format($a['amount']).'</td><td>'.$a['serial'].'</td><td>'.$a['code'].'</td><td>'.number_format($a['uid']).'</td><td><font color="red"><b>#'.$a['id'].'</b></font></td> <td>'.($a['trangthai'] == 0 ? 'Chờ' : '').' '.($a['trangthai'] == 1 ? 'Hoàn thành' : '').' '.($a['trangthai'] == 2 ? 'Lỗi' : '').'</td> <td><a href="get/lognap&xoa&id='.$a['id'].'">[XÓA]</a> <a href="get/lognap&edit=0&id='.$a['id'].'">[CHỜ]</a> <a href="get/lognap&edit=1&id='.$a['id'].'">[HOÀN THÀNH]</a> <a href="get/lognap&edit=2&id='.$a['id'].'">[LỖI]</a></td></tr>';
}

?>
 <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Yêu cầu NẠP <a href="get/lognap&xoaall">[XÓA ALL]</a></h4>
                  <p class="card-category"> Danh sách yêu cầu nạp</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                       <th>Thời gian</th> <td>Loại Thẻ</td> <td>Mệnh Giá</td> <td>Seri</td> <td>Mã Thẻ</td> <td>ID Nhân Vật</td> <td>STT</td> <td>Trạng thái</td>  <td>Hành động</td>
                      </thead>
                      <tbody>
                       
                      <?=$list?>
                        
                      </tbody>
                    </table>
                    
                  </div>
                  <?=$trang?>
                </div>
                
              </div>
            </div>
          </div>
          
          

          
          <script>
    function edit(){
    $.ajax({
            	       	url         : 'd/giftcode',
    	            	type        : 'POST',
    	            	data        : $("#ducnghia_form").find("select, textarea, input").serialize(),
                  	success : function(result){

md.showNotification('bottom','left',result)
    	            	}
    	        	});
}
</script>