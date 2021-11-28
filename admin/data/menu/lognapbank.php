<?PHP
if(isset($_GET['xoaall']))
{
    $mysqli->query("DELETE FROM lognapbank");
}
if(isset($_GET['xoa']))
{
    $mysqli->query("DELETE FROM `lognapbank` WHERE `id` = '".$_GET['id']."'");
}
if(isset($_GET['edit']))
{
    $mysqli->query("UPDATE `lognapbank` SET `trangthai` = '".$_GET['edit']."' WHERE `id` = '".$_GET['id']."'");
}
$ab = $mysqli->query("SELECT * FROM `lognapbank`  ORDER by id DESC LIMIT $start, $kmess ");
if ($mysqli->query("SELECT * FROM `lognapbank`")->num_rows > $kmess)
{
    $trang = '<center>' . trang('get/lognapbank&', $start, $mysqli->query("SELECT * FROM `lognapbank`")->num_rows, $kmess) . '</center>';
}
while($a=$ab->fetch_assoc())
{ 
    $list .= '<tr><td>'.$a['thoigian'].'</td><td>'.$a['telco'].'</td><td>'.$a['amount'].'</td><td>'.number_format($a['serial']).'</td><td>'.$a['code'].'</td><td>'.number_format($a['uid']).'</td><td><font color="red"><b>#'.$a['id'].'</b></font></td> <td>'.($a['trangthai'] == 0 ? 'Chờ' : '').' '.($a['trangthai'] == 1 ? 'Hoàn thành' : '').' '.($a['trangthai'] == 2 ? 'Lỗi' : '').'</td> <td><a href="get/lognapbank&xoa&id='.$a['id'].'">[XÓA]</a> <a href="get/lognapbank&edit=0&id='.$a['id'].'">[CHỜ]</a> <a href="get/lognapbank&edit=1&id='.$a['id'].'">[HOÀN THÀNH]</a> <a href="get/lognapbank&edit=2&id='.$a['id'].'">[LỖI]</a></td></tr>';
}

?>
 <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Yêu cầu NẠP BANK <a href="get/lognapbank&xoaall">[XÓA ALL]</a></h4>
                  <p class="card-category"> Danh sách yêu cầu nạp</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                       <th>Thời gian</th> <td>Loại Ví</td> <td>Tài Khoản Ví</td> <td>Số Tiền Nạp</td> <td>Nội Dung GD</td> <td>ID Nhân Vật</td> <td>STT</td> <td>Trạng thái</td>  <td>Hành động</td>
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