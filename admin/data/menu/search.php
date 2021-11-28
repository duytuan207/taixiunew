 <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Tìm kiếm người chơi</h4>
                  <p class="card-category">Vui lòng nhập tên tài khoản hệ thống sẽ tìm thông tin người chơi này cho bạn.</p>
                </div>
                <div class="card-body" id="ducnghia_form">
                  
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tên tài khoản</label>
                          <input type="text" value="" name="taikhoan" class="form-control">
                        </div>
                      </div>
                      
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tìm kiếm theo</label>
                          <select name="ducnghia">
                              <option value="1">Theo tên tài khoản</option>
                              <option value="2">Theo ID</option>
                              
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-md-8">
                        <div class="form-group" id="search">
                         
                         </div>
                      </div>
                      


                      
                      </div>
                    
                    
                    
                    <button onclick="search()" type="submit" class="btn btn-primary pull-right">Tìm Kiếm</button>
                    <div class="clearfix"></div>
                  
                </div>
              </div>
            </div>
           
          </div>
          
          
          <script>
    function search(){
    $.ajax({
            	       	url         : 'd/search',
    	            	type        : 'POST',
    	            	data        : $("#ducnghia_form").find("select, textarea, input").serialize(),
                  	success : function(result){
$("#search").html(result);
    	            	}
    	        	});
}
</script>