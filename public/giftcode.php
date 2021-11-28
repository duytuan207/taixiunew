<?php
include_once('../function/config.php');
if((!$_SESSION['username'])){
               echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập", "");</script>';
               exit();
        }
?>

<div class="modal fade" id="gift_code" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 105%;

">
<div class="popup-header">
<img src="/images/close-btn.png" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -1%;">
<h4 class="popup-title" style="margin-left: 10%;
    margin-top: 1%;" id="myModalLabel">Giftcode</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

 <div class="form pt-3" id="form_giftcode">
                                    <center>
                                        
                                    <div class="form-group">

                                           
                                            <input type="text" class="form-control" placeholder="Nhập giftcode" aria-label="giftcode" name="giftcode" aria-describedby="basic-addon11" style="width: 60%;border-radius: 17px;">
                                       
                                    </div>
                                    

                                  
                
                                     
    <div style="margin-top:5px">
                                            <center><button class="Btn zoom-hove" onclick="napcode()" type="submit">Đồng ý</button></center>
    </div>
          
</center>
                                </div>

</div>
</div>
<div class="popup-footer">

</div>
</div>
</div>
</div>
<script> 
function napcode()
{
    $.ajax({
        url : '/game/send?giftcode',
        type : 'POST',
        data : $("#form_giftcode").find("select, textarea, input").serialize(),
        success : function(d)
        {
                   swal(d.type, d.msg);

        }
        
    });
}
    $('#gift_code').modal('show');

</script>