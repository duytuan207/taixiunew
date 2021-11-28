<?php
include_once('../function/config.php');
if((!$_SESSION['username'])){
               echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập", "");</script>';
               exit();
        }
?>
<div class="modal fade" id="thiet_lap_otp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 105%;

  ">
<div class="popup-header">
<img src="/images/close-btn.png" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -3%;">
<h4 class="popup-title" style="margin-left: 10%;
    margin-top: 3%;" id="myModalLabel">Bảo mật
    
        
</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

<div class="form pt-3" id="form_otp" >
    <div id="hien"></div>
                                    <center>
<div class="khung-body">
   <?php
    if ($datauser->otp=0) {

    ?>
 <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Nhập OTP </span>
                        </div>
                        <input type="text" class="form-control" placeholder="OTP"  name="otp" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                    </div>
                    <?php
    } else {
       ?>
 <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Nhập OTP mới </span>
                        </div>
                        <input type="text" class="form-control" placeholder="OTP" name="otp" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                    </div>
                    <?php   
    }
                    ?>
                       <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Nhập OTP MAIL </span>
                        </div>
                        <input type="text" class="form-control" placeholder="vui lòng check mail để lấy OTP mail"  name="otpmail" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                            <button type="button" onclick="getotp(<?=$datauser->id?>)" class="Btn">Lấy OTP mail</button>
                    </div>
                     
                  
              
                    
                   <button class="Btn zoom-hove" onclick="otp()" type="submit" style="
    background-image: url(https://i.imgur.com/FgSRpsA.png);
    color: white;
">Thực hiện</button>
            
                    
                                    


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

<div id="hienotp"></div>





<script>

function getotp(id)
{
    $.ajax(
        {
            url : '/getotp.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {

                $("#hienotp").html(d);
        swal(d.type, d.msg);

            }
        }
        
        );
}

function otp()
{
    $.ajax({
        url : '/game/send?otp',
        type : 'POST',
        data : $("#form_otp").find("select, textarea, input").serialize(),
        success : function(d)
        {
        swal(d.type, d.msg);
        if (d.type=='Thành công') {
  $("#form_otp").find('select, textarea, input').val('');      
  }
        }
        
    });
}





</script>