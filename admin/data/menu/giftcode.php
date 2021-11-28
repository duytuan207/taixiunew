<?PHP
if(isset($_GET['xoaall']))
{
    $mysqli->query("DELETE FROM giftcode");
}
if(isset($_GET['id']))
{
    $mysqli->query("DELETE FROM `giftcode` WHERE `id` = '".$_GET['id']."'");
}
$ab = $mysqli->query("SELECT * FROM `giftcode`  ORDER by id DESC LIMIT $start, $kmess ");
if ($mysqli->query("SELECT * FROM `giftcode`")->num_rows > $kmess)
{
    $trang = '<center>' . trang('get/giftcode&', $start, $mysqli->query("SELECT * FROM `giftcode`")->num_rows, $kmess) . '</center>';
}
while($a=$ab->fetch_assoc())
{ 
    $list .= '<tr><td>'.$a['id'].'</td>  <td>'.$a['text'].'</td> <td>'.number_format($a['xu']).'</td> <td>'.number_format($a['max']).'</td> <td><a href="get/giftcode&xoa&id='.$a['id'].'">XÓA</a></td></tr>';
}

?>
 <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Gift code <a href="get/giftcode&xoaall">[XÓA ALL]</a></h4>
                  <p class="card-category"> Danh sách gift code</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                       <th>Id</th> <td>Mã</td> <td>Xu</td> <td>Số lần sử dụng còn</td> <td>XÓA</td> 
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
                  <h4 class="card-title">Tạo giftcode</h4>
                  <p class="card-category">Tạo giftcode mới</p>
                </div>
                <div class="card-body" id="ducnghia_form">
                  
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Số lượng</label>
                          <input type="text" value="1" name="soluong" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Giá trị</label>
                          <input type="text" name="xu" value="0" class="form-control">
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Số lần sử dụng</label>
                          <input type="text" name="max" value="1" class="form-control">
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    <button onclick="edit()" type="submit" class="btn btn-primary pull-right">Tạo</button>
                    <div class="clearfix"></div>
                  
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