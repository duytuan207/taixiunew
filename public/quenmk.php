<?php
include_once('../function/config.php');

?>
<div class="modal fade" id="quen_mk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 105%;

  ">
<div class="popup-header">
<img src="/images/close-btn.png" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -2%;">
<h4 class="popup-title" style="margin-left: 10%;
    margin-top: 2%;" id="myModalLabel">Quên mật khẩu</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

 <div class="form pt-3" id="form_quenmk">
                                    <center>
                                        <font color="red"><b><font id="notice_quenmk"></font></b></font>
                                    <div class="form-group">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Tài khoản" aria-label="Username" name="taikhoan" aria-describedby="basic-addon11" style="width: 60%;border-radius: 17px;">
                                       
                                    </div>
                                    

                                  
                                    <div class="form-group">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Email" aria-label="Email" name="email" aria-describedby="basic-addon33" style="width: 60%;border-radius: 17px;">
                                     
                                    </div>
                                     
    <div style="margin-top:5px">
                                            <center><button class="Btn zoom-hove" onclick="quenmk()" type="submit">Tiếp tục</button></center>
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
     function quenmk()
{
    $.ajax({
        url : '/game/send?quenmk',
        type : 'POST',
        data : $("#form_quenmk").find("select, textarea, input").serialize(),
        success : function(d)
        {
        swal(d.type, d.msg);
       
        }
        
    });
}

</script>