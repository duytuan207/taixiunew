 <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Nạp tiền cho người chơi</h4>
                  <p class="card-category">Nếu là nạp thẻ thì để ở ô check là true, còn không thì là false</p>
                </div>
                <div class="card-body" id="ducnghia_form">
                  
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">ID</label>
                          <input type="text" value="1" name="id" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Số tiền</label>
                          <input type="text" name="xu" value="0" class="form-control">
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nạp hay hoàn ?</label>
                          <input type="text" name="type" value="true" class="form-control">
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    <button onclick="edit()" type="submit" class="btn btn-primary pull-right">Nạp</button>
                    <div class="clearfix"></div>
                  
                </div>
              </div>
            </div>
           
          </div>
          
          
          <script>
    function edit(){
    $.ajax({
            	       	url         : 'd/nap',
    	            	type        : 'POST',
    	            	data        : $("#ducnghia_form").find("select, textarea, input").serialize(),
                  	success : function(result){

md.showNotification('bottom','left',result)
    	            	}
    	        	});
}
</script>