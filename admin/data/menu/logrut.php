


<?PHP
if(isset($_GET['xoaall']))
{
    $mysqli->query("DELETE FROM lichsu_ruttien");
}
if(isset($_GET['xoa']))
{
    $mysqli->query("DELETE FROM `lichsu_ruttien` WHERE `id` = '".$_GET['id']."'");
}
if(isset($_GET['edit']))
{
    $mysqli->query("UPDATE `lichsu_ruttien` SET `code` = '".$_GET['edit']."' WHERE `id` = '".$_GET['id']."'");
}
$ab = $mysqli->query("SELECT * FROM `lichsu_ruttien`  ORDER by id DESC LIMIT $start, $kmess ");
if ($mysqli->query("SELECT * FROM `lichsu_ruttien`")->num_rows > $kmess)
{
    $trang = '<center>' . trang('get/lichsu_ruttien&', $start, $mysqli->query("SELECT * FROM `lichsu_ruttien`")->num_rows, $kmess) . '</center>';
}
while($a=$ab->fetch_assoc())
{ 
    $list .= '<td><td>' .$a['thoigian'].'</td><td>'.$a['loai'].'</td><td>'.$a['stk'].'</td><td>'.$a['ctk'].'</td><td>'.number_format($a['vnd']).'</td><td>'.number_format($a['uid']).'</td><td><font color="red"><b>#'.$a['id'].'</b></font></td> <td>'.($a['code'] == 0 ? 'Chờ' : '').' '.($a['code'] == 1 ? 'Hoàn thành' : '').' '.($a['code'] == 2 ? 'Lỗi' : '').'</td> <td><a href="get/lichsu_ruttien&xoa&id='.$a['id'].'">[XÓA]</a> <a href="get/lichsu_ruttien&edit=0&id='.$a['id'].'">[CHỜ]</a> <a href="get/lichsu_ruttien&edit=1&id='.$a['id'].'">[HOÀN THÀNH]</a> <a href="get/lichsu_ruttien&edit=2&id='.$a['id'].'">[LỖI]</a></td></tr>';
}

?>
 <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Yêu Cầu RÚT <a href="get/lichsu_ruttien&xoaall">[XÓA ALL]</a></h4>
                  <p class="card-category"> Danh Sách Yêu Cầu Rút</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                       <th>Thời gian</th> <td>Loại</td> <td>Số Tk</td> <td>Chủ Tk</td> <td>VNĐ</td> <td>UID</td> <td>STT</td> <td>Trạng thái</td>  <td>Hành động</td>
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