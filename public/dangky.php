<?php
include_once('../function/config.php');

?>
<div class="modal fade" id="dang_ky" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 105%;

   ">
<div class="popup-header">
<img src="/images/close-btn.png"  data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -4%;">
<h4 class="popup-title" id="myModalLabel">Đăng ký tài khoản</h4>
</div>
<div class="modal-body" style="padding: 0px;">
<div class="popup-body">

  <div class="form pt-3" id="form_reg">
                                    <center>
                                        <font color="red"><b><font id="notice_reg"></font></b></font>
                                    <div class="form-group">
                                       
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Tài khoản" aria-label="Username" name="taikhoan" aria-describedby="basic-addon11" style="width: 60%;">
                                       
                                    </div>
                       
                                     <div class="form-group">
                                       
                                          
                                            <input type="text" class="form-control" placeholder="Email" aria-label="Username" name="email" aria-describedby="basic-addon11" style="width: 60%;">
                                       
                                    </div>

                                  
                                    <div class="form-group">
                                       
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Mật khẩu" aria-label="Password" name="matkhau" aria-describedby="basic-addon33" style="width: 60%;">
                                     
                                    </div>
                                     <div class="form-group">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Mật khẩu" aria-label="Password" name="matkhau2" aria-describedby="basic-addon33" style="width: 60%;">
                                     
                                    </div>
    <div style="margin-top:5px">
                                                                        <center><button class="Btn zoom-hove" onclick="dangky()"  type="submit" class="btn btn-success mr-2">Đăng ký</button></center>
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
     function dangky()
{
    $.ajax({
        url : '/game/send?reg',
        type : 'POST',
        data : $("#form_reg").find("select, textarea, input").serialize(),
        success : function(d)
        {
            $("#notice_reg").html(d.msg);

        }
        
    });
}
    $('#dang_ky').modal('show');

</script>