<?PHP
if(isset($_GET['xoaall']))
{
    $mysqli->query("DELETE FROM admin WHERE quyen <=0");
}
if(isset($_GET['edit']))
{
    $d = $_GET['r'];
    if($d ==1)
    {
        $quyen = 0;
    }
    else
    {
        $quyen =1;
    }
    $mysqli->query("UPDATE `admin` SET `edit` = '".$quyen."' WHERE `id` = '".$_GET['edit']."'");
}
if(isset($_GET['id']))
{
    $mysqli->query("DELETE FROM `admin` WHERE `id` = '".$_GET['id']."'");
}
$ab = $mysqli->query("SELECT * FROM `admin` WHERE `id` >=2  ORDER by id DESC LIMIT $start, $kmess ");
if ($mysqli->query("SELECT * FROM `admin`")->num_rows > $kmess)
{
    $trang = '<center>' . trang('get/taoadmin&', $start, $mysqli->query("SELECT * FROM `admin`")->num_rows, $kmess) . '</center>';
}
while($a=$ab->fetch_assoc())
{ 
    $list .= '<tr><td>'.$a['taikhoan'].'</td><td>'.md5($a['matkhau']).'</td> <td>[<a href="get/taoadmin&xoa&id='.$a['id'].'">XÓA</a>] [<a href="get/lichsunap&id='.$a['taikhoan'].'">LỊCH SỬ NẠP</a>]  [<a href="get/taoadmin&edit='.$a['id'].'&r='.$a['edit'].'">'.($a['edit'] >=1 ? 'HỦY QUYỀN' : 'CẤP QUYỀN').'</a>]</td></tr>';
}

?>

 <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Danh sách admin <a href="get/admin&xoaall">[XÓA ALL]</a></h4>
                  <p class="card-category"> Danh sách admin</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                       <td>Tài khoản</td> <td>Mật khẩu</td> <td>Hành động</td> 
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
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Tạo admin</h4>
                  <p class="card-category">Thêm admin mới</p>
                </div>
                <div class="card-body" id="ducnghia_form">
                  
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tài khoản</label>
                          <input type="text" value="" name="taikhoan" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mật khẩu</label>
                          <input type="text" name="matkhau" value="" class="form-control">
                        </div>
                      </div>
                    </div>

                    <button onclick="taoadmin()" type="submit" class="btn btn-primary pull-right">Tạo</button>
                    <div class="clearfix"></div>
                  
                </div>
              </div>
            </div>
           
          </div>
          
          
          <script>
    function taoadmin(){
    $.ajax({
            	       	url         : 'd/taoadmin',
    	            	type        : 'POST',
    	            	data        : $("#ducnghia_form").find("select, textarea, input").serialize(),
                  	success : function(result){

md.showNotification('bottom','left',result)
    	            	}
    	        	});
}
</script>