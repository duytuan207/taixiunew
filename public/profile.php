<?php
include_once('../function/config.php');
if((!$_SESSION['username'])){
               echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập", "");</script>';
               exit();
        }
?>
<div class="modal fade" id="ca_nhan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 105%;

  ">
<div class="popup-header">
<img src="/images/close-btn.png" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -3%;">
<h4 class="popup-title" style="margin-left: 10%;
    margin-top: 3%;" id="myModalLabel">Thông tin cá nhân
    
        
</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

<div class="form pt-3" id="form_canhan" >
                                    <center>
<div class="khung-body">
    <div class="khung-avatar">
        <span class="name"><font color="white"><b><?=$datauser->taikhoan?></b></font></span></br>
        <img src="/lib/avatar/<?=$datauser->avatar?>.png" alt="Avatar" class="img-circle" style="width:15%;">
    </div>
    </br>
    <a onclick="opendoimk()"><button class="Btn zoom-hove" type="submit" style="
    background-image: url(https://i.imgur.com/FgSRpsA.png);
    color: white;
">Đổi mật khẩu</button></a>


        <div class="form-group">

                                            <input placeholder="<?=$datauser->taikhoan?>" type="text" class="form-control" value="" readonly style="width: 90%;background-color: #696666;">
                              
                  
                                    </div>
                                            <div class="form-group">

                                            <input placeholder="<?=$datauser->email?>" type="text" class="form-control" value="" readonly style="width: 90%;background-color: #696666;">
                                            <?php
                                               if ($datauser->otp==0) {
                                                   echo'<font color="red"><b>Bạn chưa kích hoạt OTP</b></font>';
    
  
    }
          echo' <a onclick="openotp()">Thiết lập OTP</a><br>';
                                            ?>
                              
                  
                                    </div>
                                    


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
<?php 
include_once('../public/otp.php');
include_once('../public/doimk.php');

?>
<script>
function openotp() {
            $('#thiet_lap_otp').modal('show');

}
function opendoimk() {
            $('#doi_mk').modal('show');

}
        $('#ca_nhan').modal('show');

</script>






