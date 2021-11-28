<?php
include_once('../function/config.php');

?>
<div class="modal fade" id="dang_nhap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 105%;

">
<div class="popup-header">
<img src="/images/close-btn.png" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -3%;">
<h4 class="popup-title" style="margin-left: 10%;
    margin-top: 3%;" id="myModalLabel">Đăng nhập tài khoản</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

 <div class="form pt-3" id="form_login">
                                    <center>
                                        <font color="red"><b><font id="notice_login"></font></b></font>
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
                                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" aria-label="Password" name="matkhau" aria-describedby="basic-addon33" style="width: 60%;border-radius: 17px;">
                                     
                                    </div>
                                     
    <div style="margin-top:5px">
                                            <center><button class="Btn zoom-hove" onclick="dangnhap()" type="submit">Đăng nhập</button></center>
    </div>
            <div class="form-group">
                                    <a onclick="openquenmk()"> <font color="yellow">Quên mật khẩu ?</font></a>
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
<?php 
include_once('../public/quenmk.php');

?>
<script> 
function dangnhap()
{
    $.ajax({
        url : '/game/send?login',
        type : 'POST',
        data : $("#form_login").find("select, textarea, input").serialize(),
        success : function(d)
        {
            $("#notice_login").html(d.msg);
            if(d.type =="Thành công")
            {
         location.href = "/index.php";
            }
        }
        
    });
}
function openquenmk() {
    $('#quen_mk').modal('show');
    
}
    $('#dang_nhap').modal('show');

</script>