<?PHP
if(isset($_GET['xoaall']))
{
    $mysqli->query("DELETE FROM thecao");
}
if(isset($_GET['id']))
{
    $mysqli->query("DELETE FROM `thecao` WHERE `id` = '".$_GET['id']."'");
}
$ab = $mysqli->query("SELECT * FROM `thecao`  ORDER by id DESC LIMIT $start, $kmess ");
if ($mysqli->query("SELECT * FROM `thecao`")->num_rows > $kmess)
{
    $trang = '<center>' . trang('get/thecao&', $start, $mysqli->query("SELECT * FROM `thecao`")->num_rows, $kmess) . '</center>';
}
while($a=$ab->fetch_assoc())
{ 
    $list .= '<tr><td>'.$a['serial'].'</td>  <td>'.$a['mathe'].'</td> <td>'.($a['menhgia'] == 2 ? '50k' : '').' '.($a['menhgia'] == 3 ? '100k' : '').' '.($a['menhgia'] == 4 ? '200k' : '').' '.($a['menhgia'] == 5 ? '300k' : '').' '.($a['menhgia'] == 6 ? '500k' : '').' '.($a['menhgia'] == 7 ? '1M' : '').'</td> <td>'.($a['type'] == 1 ? 'VIETTEL' : '').' '.($a['type'] == 2 ? 'Mobiphone' : '').' '.($a['type'] == 3 ? 'Vinaphone' : '').' '.($a['type'] == 4 ? 'Vietnammobile' : '').' '.($a['type'] == 5 ? 'Garena' : '').' '.($a['type'] == 6 ? 'Zing' : '').' '.($a['type'] == 7 ? 'VTC' : '').' '.($a['type'] == 8 ? 'Gate' : '').'</td> <td><a href="get/thecao&xoa&id='.$a['id'].'">XÓA</a></td></tr>';
}

?>

 <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Thẻ cào <a href="get/thecao&xoaall">[XÓA ALL]</a></h4>
                  <p class="card-category"> Danh sách Thẻ cào</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                       <th>Serial</th> <td>Mã thẻ</td> <td>VNĐ</td> <td>Loại</td> 
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
                  <h4 class="card-title">Tạo thecao</h4>
                  <p class="card-category">Thêm thẻ mới</p>
                </div>
                <div class="card-body" id="ducnghia_form">
                  
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Serial</label>
                          <input type="text" value="" name="serial" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mã thẻ</label>
                          <input type="text" name="mathe" value="" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <select class="form-control" name="menhgia">
                                <option value="0">Chọn Mệnh Giá</option>
                                <option value="2">50.000 VND</option>
                                <option value="3">100.000 VND</option>
                                <option value="4">200.000 VND</option>
                                <option value="5">300.000 VND</option>
                                <option value="6">500.000 VND</option>
                                <option value="7">1.000.000 VND</option>
                                </select>

                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                            <select class="form-control" name="type">
<option value="1">Viettel</option>
<option value="2">Mobiphone</option>
<option value="3">Vinaphone</option>
<option value="4">Vietnammobile</option>
<option value="5">Garena</option>
<option value="6">Zing</option>
<option value="7">VTC</option>
<option value="8">Gate</option>
                                </select>

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
            	       	url         : 'd/thecao',
    	            	type        : 'POST',
    	            	data        : $("#ducnghia_form").find("select, textarea, input").serialize(),
                  	success : function(result){

md.showNotification('bottom','left',result)
    	            	}
    	        	});
}
</script>