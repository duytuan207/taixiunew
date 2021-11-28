 <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Đổi mật khẩu</h4>
                  <p class="card-category">Đổi mật khẩu của tài khoản admin.</p>
                </div>
                <div class="card-body" id="ducnghia_form">
                  
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mật khẩu cũ</label>
                          <input type="text" value="" name="cu" class="form-control">
                        </div>
                      </div>
                      
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mật khẩu mới</label>
                          <input type="text" value="" name="moi" class="form-control">
                        </div>
                      </div>
                      
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nhập lại mật khẩu mới</label>
                          <input type="text" value="" name="lai" class="form-control">
                        </div>
                      </div>
                      
                      
                      </div>
                    
                    
                    
                    <button onclick="doipassword()" type="submit" class="btn btn-primary pull-right">Đổi</button>
                    <div class="clearfix"></div>
                  
                </div>
              </div>
            </div>
           
          </div>
          
          
          <script>
    function doipassword(){
    $.ajax({
            	       	url         : 'd/doipassword',
    	            	type        : 'POST',
    	            	data        : $("#ducnghia_form").find("select, textarea, input").serialize(),
                  	success : function(result){

md.showNotification('bottom','left',result)
    	            	}
    	        	});
}
</script>