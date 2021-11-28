<?PHP
if(isset($_GET['okxoa']))
{
    $mysqli->query("DELETE FROM nguoichoi WHERE `id` = '".$_GET['id']."'");
}
$kiemtra = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$_GET['id']."'")->fetch_assoc();
if($kiemtra['id'] <=0)
{
    echo'Không tồn tại người chơi này, vui lòng quay lại.';
    exit();
}
$u = new users($kiemtra['id']);
?>
<div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Chỉnh sửa người chơi <a href="get/edit&id=<?=$u->id?>"><?=$u->taikhoan?></a> </h4>
                  <p class="card-category">Sửa người chơi</p>
                  <?PHP
                  if(isset($_GET['xoa']))
                  {
                      echo'<p class="card-category"><br><br><font color="red"><b>Bạn có chắc chắn muốn xóa người chơi này không ?</b> <a href="get/edit&id='.$_GET['id'].'&okxoa">CHẮC CHẮN</a></p>';
                  }
                  ?>
                </div>
                <div class="card-body" id="ducnghia_form">
                  
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">ID</label>
                          <input type="text" value="<?=$u->id?>" name="id" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="taikhoan" value="<?=$u->taikhoan?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Xu</label>
                          <input type="text" name="xu" value="<?=$u->xu?>" class="form-control">
                        </div>
                      </div>
                    </div>
     
                    
                    
                    <button onclick="edit()" type="submit" class="btn btn-primary pull-right">Chỉnh sửa</button> <a href="get/edit&id=<?=$_GET['id']?>&xoa">XÓA</a>
                    <div class="clearfix"></div>
                  
                </div>
              </div>
            </div>
           
          </div>

<script>
    function edit(){
    $.ajax({
            	       	url         : 'd/edit',
    	            	type        : 'POST',
    	            	data        : $("#ducnghia_form").find("select, textarea, input").serialize(),
                  	success : function(result){

md.showNotification('bottom','left',result)
    	            	}
    	        	});
}
</script>