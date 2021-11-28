<?php
include_once('../function/config.php');
if((!$_SESSION['username'])){
               echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập", "");</script>';
               exit();
        }
?>
<div class="modal fade" id="nap_the" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 101%;

  ">
<div class="popup-header">
<img src="/images/close-btn.png" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -3%;">
<h4 class="popup-title" style="margin-left: 10%;
    margin-top: 3%;" id="myModalLabel">
    
          <button type="button" onclick="napthecao()" class="Btn zoom-hove">Thẻ cào</button>
                                  <button type="button" onclick="napvidt()" class="Btn zoom-hove">Ví điện tử</button>
     <button type="button" onclick="napatm()" class="Btn zoom-hove">ATM</button>
</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

<div class="form pt-3" id="form_napthe" style="display: block;">
                                    <center>
                                        <div class="khung-body">
<div class="khung">
<b><font color="#fd5a5a">Lưu Ý:</br>
- Nạp Sai Mệnh Giá Có Thể Mất Thẻ,Vui Lòng Kiểm Tra Kỹ Trước Khi Nạp<br>
- Thời gian duyệt thẻ: 5 giây -> 1 phút</br>
- Chiết khấu: <?=$site['site_ck_card'];?>%<br>
<?php $ketqua = 10000 - 10000 * $site['site_ck_card'] / 100;?>
- Nạp 10.000đ sẽ được <?=format_cash($ketqua);?>đ</font></b>
</div>
</br>

<font color="red"><b><font id="notice_napthe" name="notice_napthe"></font></b></font>
                                    <div class="form-group">

                                            
                                             <select class="form-control" name="loaithe"  id="loaithe" class="form-control">
		                                                            <option value="">Chọn loại thẻ</option>
                        <option value="VIETTEL">Viettel</option>
<option value="MOBIFONE">Mobifone</option>
<option value="VINAPHONE">Vinaphone</option>
<option value="VNMOBI">Vietnammobi</option>
<option value="ZING">Zing</option>
<option value="GATE">Gate</option>
                        
																   </select>
                                          

                                    </div>




                                    
                                    <div class="form-group">

                                            
                                             <select class="form-control" name="menhgia"  id="menhgia" class="form-control">
		                                                            <option value="">Chọn mệnh giá</option>
                        <option value="10000">10.000</option>
                                <option value="20000">20.000</option>
                                <option value="30000">30.000</option>
                                <option value="50000">50.000</option>
                                <option value="100000">100.000</option>
                                <option value="200000">200.000</option>
                                <option value="300000">300.000</option>
                                <option value="500000">500.000</option>
                                <option value="1000000">1.000.000</option>
																   </select>
                                          

                                    </div>
                                   
                                    
                                    <div class="form-group">

                                            
                                            <input placeholder="Seri" type="text" class="form-control" placeholder="" id="seri"  name="seri" value="" aria-describedby="basic-addon11">
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                      
                                            <input placeholder="Mã thẻ" type="text" class="form-control" placeholder="" id="pin"  name="pin" value="" aria-describedby="basic-addon11">
                                        
                                    </div>
                                    
                                     
                   <button type="button" onclick="napthe()" class="Btn nap zoom-hove"  type="submit">Nạp Ngay</button>
                  
              
</center>
</div>
                                </div>
                                
              <div class="form pt-3" id="form_napvidt" style="display: none;">
                                    <center>
                                        
                                                                               <div class="khung-body">

                                       <div class="khung">
                                           <font color="yellow">Hướng dẫn:</br>
                                           - Copy số tài khoản và nội dung chuyển khoản</br>
                                           - Đăng nhập ví điện tử Momo và thực hiện chuyển tiền.</font></br>
                                            <font color="#fd5a5a">Lưu ý:</br>
                                            - Cộng tiền sau 30 giây đến 5 phút</br>
                                            - Không ghi nội dung tạm giữ tiền trong 7 ngày, vui lòng liên hệ để được chuyển lại.</br>
                                            - Nạp tối thiếu 20.000đ, dưới 20.000đ sẽ bị nuốt tiền</br>
                                           - Tỉ lệ nạp: <?=$site['site_ck_momo']?>%. Nạp 100.000đ nhận ngay <?=format_cash($site['site_ck_momo']*100000/100)?>đ </font>
</div> 
</br>

                                        <font color="red"><b><font id="notice_chuyentien"></font></b></font>
                                        <div class="form-group">
<img src="/images/momo.png" style="
    border-radius: 10px;
    width: 12%;
    margin-top: -2%;
    margin-left: -61%;
">                                            </div>
                                  <div class="form-group" style="    margin-left: 28%;
    margin-top: -16%;
    text-align: left;">
                      <label>Số tài khoản: <font color="yellow"><b><?=$site['site_sdt_momo']?></b></font> <img src="/images/copy.png" style="width: 10%;" onclick="copy('<?=$site['site_sdt_momo']?>')">
 </label>
                        

                    
                    </br>
                      <label>Tên tài khoản: <font color="yellow"><b><?=$site['site_ten_momo']?></b></font> <img src="/images/copy.png" style="width: 10%;" onclick="copy('<?=$site['site_ten_momo']?>')"></label>
                        

                    </br>
                  
                      <label>Nội dung chuyển khoản: <font color="yellow"><b><?=$datauser->taikhoan?></b></font> <img src="/images/copy.png" style="width: 10%;" onclick="copy('<?=$datauser->taikhoan?>')"></label>
                        

                    
                    </div>
                   
                                    </div>

                
                      
                     
</center>
                                </div>
                                
                                
                                  <div class="form pt-3" id="form_napatm" style="display: none;">
                                    <center>
                                                                               <div class="khung-body">

                                       <div class="khung">
                                           <font color="yellow">Hướng dẫn:</br>
                                           - Copy số tài khoản và nội dung chuyển khoản</br>
                                           - Đăng nhập ví điện tử ATM và thực hiện chuyển tiền.</font></br>
                                            <font color="#fd5a5a">Lưu ý:</br>
                                            - Cộng tiền sau 30 giây đến 5 phút</br>
                                            - Không ghi nội dung tạm giữ tiền trong 7 ngày, vui lòng liên hệ để được chuyển lại.</br>
                                            - Nạp tối thiếu 50.000đ, dưới 50.000đ sẽ bị nuốt tiền</br>
                                           - Tỉ lệ nạp: <?=$site['site_ck_atm']?>%. Nạp 100.000đ nhận ngay <?=format_cash($site['site_ck_atm']*100000/100)?>đ </font>
</div> 
</br>

                                        <font color="red"><b><font id="notice_chuyentien"></font></b></font>
                                        <div class="form-group">
<img src="/images/bidv.png" style="
    border-radius: 10px;
    width: 12%;
    margin-top: -2%;
    margin-left: -61%;
">                                            </div>
                                  <div class="form-group" style="    margin-left: 28%;
    margin-top: -16%;
    text-align: left;">
                                                            <label>Ngân hàng: <font color="yellow"><b><?=$site['site_ten_atm']?></b></font> 
 </label>
    </br>
                      <label>Số tài khoản: <font color="yellow"><b><?=$site['site_stk_atm']?></b></font> <img src="/images/copy.png" style="width: 10%;" onclick="copy('<?=$site['site_stk_atm']?>')">
 </label>
                        

                    
                    </br>
                      <label>Tên tài khoản: <font color="yellow"><b><?=$site['site_tentk_atm']?></b></font> <img src="/images/copy.png" style="width: 10%;" onclick="copy('<?=$site['site_tentk_atm']?>')"></label>
                        

                    </br>
                  
                      <label>Nội dung chuyển khoản: <font color="yellow"><b><?=$datauser->taikhoan?></b></font> <img src="/images/copy.png" style="width: 10%;" onclick="copy('<?=$datauser->taikhoan?>')"></label>
                        

                    
                    </div>
                   
                
                
                      
                     
</center>
                                </div>
                                                          </div>

                 
                                <script>
                                function copy(text) {
                                    swal("Thành công", "Copy thành công", "");
  document.body.insertAdjacentHTML("beforeend","<div id=\"copy\" contenteditable>"+text+"</div>")
  document.getElementById("copy").focus();
  document.execCommand("selectAll");
  document.execCommand("copy");
  document.getElementById("copy").remove();
}
                                    function napthecao() {
  document.getElementById("form_napthe").style.display = "block";
    document.getElementById("form_napvidt").style.display = "none";
            document.getElementById("form_napatm").style.display = "none";

      		                                 		                            



}                                    function napvidt() {
  document.getElementById("form_napthe").style.display = "none";
    document.getElementById("form_napvidt").style.display = "block";
            document.getElementById("form_napatm").style.display = "none";

      $("#form_napthe").find('input:text, input:password, input:file, select, textarea').val('');

    
        


  

}
                      function napatm() {
  document.getElementById("form_napthe").style.display = "none";
    document.getElementById("form_napvidt").style.display = "none";
        document.getElementById("form_napatm").style.display = "block";

      $("#form_napthe").find('input:text, input:password, input:file, select, textarea').val('');

    
        


  

}
                                </script>

                  
  </div>

  
                                  <!-- -->
                                  
                                  
                                  


</div>
</div>
</div>
<div class="popup-footer">

</div>
</div>
<script>
function napthe()
{
    $.ajax({
        url : '/game/send?napthe',
        type : 'POST',
        data : $("#form_napthe").find("select, textarea, input").serialize(),
        success : function(d)
        {
        swal(d.type, d.msg);
        }
        
    });
}
    $('#nap_the').modal('show');

 
</script>