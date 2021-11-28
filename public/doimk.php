<?php
include_once('../function/config.php');
if((!$_SESSION['username'])){
               echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập", "");</script>';
               exit();
        }
?>
<div class="modal fade" id="doi_mk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 105%;

  ">
<div class="popup-header">
<img src="/images/close-btn.png" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -3%;">
<h4 class="popup-title" style="margin-left: 10%;
    margin-top: 3%;" id="myModalLabel">Đổi mật khẩu
    
        
</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

<div class="form pt-3" id="form_doimk" >
                                    <center>
<div class="khung-body">
    <div class="form-group">

                        <input type="text" class="form-control" placeholder="Mật khẩu hiện tại"  name="cu" aria-label="Username" aria-describedby="basic-addon1">
                     
                    </div>
                    
                    <div class="form-group">
                    
                        <input type="text" class="form-control" placeholder="Mật khẩu mới"  name="matkhau" aria-label="Username" aria-describedby="basic-addon1">
                      
                    </div>
                    
                    <div class="form-group">
                     
                        <input type="text" class="form-control" placeholder="Mật khẩu mới" name="matkhau2" aria-label="Username" aria-describedby="basic-addon1">
                     
                    </div>
                    
                    
                    
                    
                    
                  
                   <button type="button" onclick="doipass()" class="Btn">Đổi mật khẩu</button>
                    
                                    


  </div>
                                
            
            </div>
                
                
                      
                     
</center>
                                </div>
                                
                                
                                
                          
            

                  
  </div>

  
                    
                                  
                                  
                                  


</div>
</div>
</div>
<div class="popup-footer">

</div>
</div>







<script>
 function doipass()
{
    $.ajax({
        url : '/game/send?doipass',
        type : 'POST',
        data : $("#form_doimk").find("select, textarea, input").serialize(),
        success : function(d)
        {
        swal(d.type, d.msg);
        if (d.type=='Thành công') {
                               $("#form_doimk").find('select, textarea, input').val('');

        }
        }
        
    });
}


</script>