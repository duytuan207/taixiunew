<?php
include_once('../function/config.php');
if((!$_SESSION['username'])){
               echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập", "");</script>';
               exit();
        }
?>
<div class="modal fade" id="ket_sat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 105%;

  ">
<div class="popup-header">
<img src="/images/close-btn.png" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -2%;">
<h4 class="popup-title" style="margin-left: 10%;
    margin-top: 2%;" id="myModalLabel">Két sắt</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

 <div class="form pt-3" id="form_ketsat">
                                    <center>
                                        
                                    <div class="form-group">

<label>Số tiền hiện có: <span class="mymoney"><?=$datauser-xu?></span>đ</label>
                                           </div>  
                                                                       <div class="form-group">

<label>Số tiền đóng băng: <span class="mymoneyket"><?=$datauser-ketsat?></span>đ</label>
                                           </div>  
                                              <div class="form-group">
                    
                        <input type="text" class="form-control" placeholder="Số tiền"  name="sotien" aria-label="Username" aria-describedby="basic-addon1">
                      
                    </div>
                                                     <div class="form-group">
                    
                        <input type="password" class="form-control" placeholder="Nhập OTP"  name="otp" aria-label="Username" aria-describedby="basic-addon1">
                      
                    </div></br>
                    
                     <button type="button" onclick="dongbang()" class="Btn nap zoom-hove"  type="submit">Đóng Băng</button> <button type="button" onclick="rutket()" class="Btn nap zoom-hove"  type="submit">Rút Ngay</button>


            
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
    function dongbang()
{
    $.ajax({
        url : '/game/send?dongbang',
        type : 'POST',
        data : $("#form_ketsat").find("select, textarea, input").serialize(),
        success : function(d)
        {
        swal(d.type, d.msg);
            if (d.type=='Thành công') {
                               $("#form_ketsat").find('select, textarea, input').val('');

        }
        }
        
    });
}
    function rutket()
{
    $.ajax({
        url : '/game/send?rutket',
        type : 'POST',
        data : $("#form_ketsat").find("select, textarea, input").serialize(),
        success : function(d)
        {
        swal(d.type, d.msg);
            if (d.type=='Thành công') {
                               $("#form_ketsat").find('select, textarea, input').val('');

        }
        }
        
    });
}
    $('#ket_sat').modal('show');

</script>
