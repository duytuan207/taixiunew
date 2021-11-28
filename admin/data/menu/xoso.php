<?PHP
if(isset($_GET['xoaall']))
{
    $mysqli->query("DELETE FROM xoso");
}
if(isset($_GET['xoa']))
{
    $mysqli->query("DELETE FROM `xoso` WHERE `id` = '".$_GET['id']."'");
}
if(isset($_GET['edit']))
{
    $mysqli->query("UPDATE `xoso` SET `trangthai` = '".$_GET['edit']."' WHERE `id` = '".$_GET['id']."'");
}
$ab = $mysqli->query("SELECT * FROM `xoso`  ORDER by id DESC LIMIT $start, $kmess ");
if ($mysqli->query("SELECT * FROM `xoso`")->num_rows > $kmess)
{
    $trang = '<center>' . trang('get/xoso&', $start, $mysqli->query("SELECT * FROM `xoso`")->num_rows, $kmess) . '</center>';
}
while($a=$ab->fetch_assoc())
{ 
    $list .= '<tr><td>'.$a['ngay'].'</td><td>'.$a['so'].'</td><td>'.number_format($a['ketqua']).'</td><td>'.number_format($a['xu']).'</td><td>'.$a['xuwin'].'</td><td>'.number_format($a['uid']).'</td><td><font color="red"><b>#'.$a['id'].'</b></font></td> <td>'.($a['trangthai'] == 0 ? 'Chờ' : '').' '.($a['trangthai'] == 1 ? 'THẮNG' : '').' '.($a['trangthai'] == 2 ? 'THUA' : '').'</td> <td><a href="get/xoso&xoa&id='.$a['id'].'">[XÓA]</a> <a href="get/xoso&edit=0&id='.$a['id'].'">[CHỜ]</a> <a href="get/xoso&edit=1&id='.$a['id'].'">[THẮNG]</a> <a href="get/xoso&edit=2&id='.$a['id'].'">[THUA]</a></td></tr>';
}

?>

 <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Danh Sách Xổ Số <a href="get/xoso&xoaall">[XÓA ALL]</a></h4>
                  <p class="card-category"> Xổ số hôm nay</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                       <th>Thời gian</th> <td>Số chọn</td> <td>Kết quả</td> <td>Xu cược</td> <td>Xu nhận</td> <td>ID User</td> <td>STT</td> <td>Trạng thái</td> <td>Hành động</td>
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
          
 <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Trao thưởng</h4>
                  <p class="card-category">Sau 19h mỗi ngày kết quả của ngày hôm đó sẽ được hiển thị dưới đây, bạn hãy nhập kết quả và tỉ lệ ăn hệ thống sẽ tự động trao thưởng</p>
                </div>
                <div class="card-body" id="ducnghia_form">
                  
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kết quả (2 số cuối giải đặc biệt)</label>
                          <input type="number" value="0" name="ketqua" class="form-control">
                        </div>
                      </div>
                      
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tỉ lệ ăn (ví dụ nhập 10 thì tỉ lệ ăn sẽ là x10, cược 10k thắng sẽ ăn 100k).</label>
                          <input type="number" value="3" name="win" class="form-control">
                        </div>
                      </div>
                      
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ngày tháng năm cần trao thưởng (vd 01/02/2019)</label>
                          <input type="text" value="<?=$ngaythangnam?>" name="thoigian" class="form-control">
                        </div>
                      </div>
                      
                      
                      </div>
                    
                    
                    
                    <button onclick="traothuong()" type="submit" class="btn btn-primary pull-right">Trao thưởng</button>
                    <div class="clearfix"></div>
                  
                </div>
              </div>
            </div>
           
          </div>
          
         <link rel="stylesheet" type="text/css" href="//www.minhngoc.com.vn/style/bangketqua_mini.css"/><div id="box_kqxs_minhngoc"><script language="javascript"> 	bgcolor="#bfbfbf";titlecolor="#730038";dbcolor="#000000";fsize="12px";kqwidth="300px"; </script><script language="javascript" src="//www.minhngoc.com.vn/getkqxs/mien-bac.js"></script></div>
          
          <script>
    function traothuong(){
    $.ajax({
            	       	url         : 'd/traothuong',
    	            	type        : 'POST',
    	            	data        : $("#ducnghia_form").find("select, textarea, input").serialize(),
                  	success : function(result){

md.showNotification('bottom','left',result)
    	            	}
    	        	});
}
</script>