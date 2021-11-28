<?php
include_once('../function/config.php');
if((!$_SESSION['username'])){
               echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập", "");</script>';
               exit();
        }
?>
<div class="modal fade" id="rut_tien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 105%;

  ">
<div class="popup-header">
<img src="/images/close-btn.png" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -3%;">
<h4 class="popup-title" style="margin-left: 10%;
    margin-top: 3%;" id="myModalLabel">
    
          <button type="button" onclick="doithecao()" class="Btn zoom-hove">Thẻ cào</button>
                                  <button type="button" onclick="rutvidt()" class="Btn zoom-hove">Ví điện tử</button>
                                  
                                   <button type="button" onclick="lichsurut()" class="Btn zoom-hove">Lịch sử rút tiền</button>
</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

<div class="form pt-3" id="form_doithe" style="display: block;">
                                    <center>
<div class="khung-body">

<div class="khung">
<b><center>Tỉ giá đổi thẻ</center>

<div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mệnh giá</th>
                                            <th scope="col">Cần tiền</th>

                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                     <td>50.000đ</td>
                                            <td>60.000đ</td>
                                            </tr>
                                            
                                             <tr>

                                     <td>100.000đ</td>
                                            <td>120.000đ</td>
                                            </tr>
                                                 <tr>

                                     <td>200.000đ</td>
                                            <td>240.000đ</td>
                                            </tr>
                                                 <tr>

                                     <td>500.000đ</td>
                                            <td>600.000đ</td>
                                            </tr>
                                            
                                            
                                            </tbody>
                                            </table>
                                            </div>

</b>
</div>
</br>

<font color="red"><b><font id="notice_doithe" name="notice_doithe"></font></b></font>
                                    <div class="form-group">

                                            
                                             <select class="form-control" name="loaithe"  id="loaithe" class="form-control">
		                                                            <option value="">Chọn loại thẻ</option>
                        <option value="VIETTEL">Viettel</option>
<option value="MOBIFONE">Mobifone</option>
<option value="VINAPHONE">Vinaphone</option>

                        
																   </select>
                                          

                                    </div>




                                    
                                    <div class="form-group">

                                            
                                             <select class="form-control" name="menhgia"  id="menhgia" class="form-control">
		                                                            <option value="">Chọn mệnh giá</option>
                        
                                <option value="50000">50.000</option>
                                <option value="100000">100.000</option>
                                <option value="200000">200.000</option>
                                <option value="500000">500.000</option>
                                
                               
																   </select>
                                          

                                    </div>
                                   
                                    
                        <div class="form-group">

                                            
                                            <input placeholder="Nhập OTP" type="password" class="form-control" placeholder=""   name="otp" value="" aria-describedby="basic-addon11">
                                        
                                    </div>
                                   
                                              
                                    
                                     
                   <button type="button" onclick="doithe()" class="Btn nap zoom-hove"  type="submit">Đổi Ngay</button>
                   </br></br>
               
</center>
                              </div>  </div>
                                
              <div class="form pt-3" id="form_rutvidt" style="display: none;">
                                    <center>
                                                                               <div class="khung-body">

                                       <div class="khung">
                                         
                                            <font color="#fd5a5a">Lưu ý:</br>
                                            - Xử lí giao dịch nhanh chóng</br>
                                            - Vui lòng điền đúng số điện thoại, nếu nhập sau không hoàn tiền.</br>
                                            - Rút tối thiếu 100.000đ</br>
                                           - Tỉ lệ rút: <?=$site['site_ck_momo_rut']?>%. Rút 100.000đ nhận ngay <?=format_cash($site['site_ck_momo_rut']*100000/100)?>đ </font>
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

                                            <label>Nhập số điện thoại</label>
                                            <input placeholder="SĐT" type="text" class="form-control" placeholder="" id="sdt"  name="sdt" value="" aria-describedby="basic-addon11">
                                            
                                                     <label>Nhập số tiền</label>
                                            <input placeholder=">=100000" type="number" class="form-control" placeholder="" id="sotien"  name="sotien" value="" aria-describedby="basic-addon11">
                                                                                                 <label>Thực nhận</label>
                                                        <b id="ketqua" style="color:red;">0</b>   </br>
                                                        <label>Nhập OTP</label>
                                            <input placeholder="OTP" type="password" class="form-control" placeholder=""   name="otp" value="" aria-describedby="basic-addon11">
                                                        </br>       
                                                        
                                                                                
                   <button type="button" onclick="ruttien()" class="Btn nap zoom-hove"  type="submit">Rút Ngay</button>

                                            
                                        

                    </div>
                   
                
                
                      
                     
</center>
                                </div>
                                
                                
                                    <div class="form pt-3" id="form_lichsu" style="display: none;">
                                    <center>
                                        
                                     
</br>

                                       
                                  <div class="khung-body" style="margin-left: 1px;
    text-align: center;
    width: 100%;
    overflow: scroll;
    height: 300px;
    margin-top: -12px;
    font-size:10px;"
    >

          
                    <table id="customers" class="table table-bordered"  >
                      <thead style="color:yellow;white-space: nowrap;">
                        <tr>
                         
                          <th> Thời gian </th>
                          <th> Số tiền </th>
                          <th> Thực nhận </th>
                          <th> Nội dung </th>
                          <th> Trạng thái </th>

                        </tr>
                      </thead>
                <tbody id="ls_ruttien" style="    white-space: nowrap;">
</tbody>
                    </table>
                   
            </div>
                
                
                      
                     
</center>
                                </div>
                                
                                
                                
                          
                 
                                <script>

setInterval(function(){
 $( "#ls_ruttien" ).load( "/ls_ruttien.php" );
 }, 1000);
                                

                                function copy(text) {
                                    swal("Thành công", "Copy thành công", "");
  document.body.insertAdjacentHTML("beforeend","<div id=\"copy\" contenteditable>"+text+"</div>")
  document.getElementById("copy").focus();
  document.execCommand("selectAll");
  document.execCommand("copy");
  document.getElementById("copy").remove();
}
                                    function doithecao() {
  document.getElementById("form_doithe").style.display = "block";
    document.getElementById("form_rutvidt").style.display = "none";
    document.getElementById("form_lichsu").style.display = "none";

      		                                 		                            



}                                    function rutvidt() {
  document.getElementById("form_doithe").style.display = "none";
    document.getElementById("form_rutvidt").style.display = "block";
    document.getElementById("form_lichsu").style.display = "none";

      $("#form_doithe").find('input:text, input:password, input:file, select, textarea').val('');

    
        


  

}
                      function lichsurut() {
  document.getElementById("form_doithe").style.display = "none";
    document.getElementById("form_rutvidt").style.display = "none";
    document.getElementById("form_lichsu").style.display = "block";

      $("#form_napthe").find('input:text, input:password, input:file, select, textarea').val('');

    
        


  

}
                                </script>

                  
  </div>

  
                    
                                  
                                  
                                  


</div>
</div>
</div>
<div class="popup-footer">

</div>
</div>







<script>
  $('#sotien').on('change', function() {
    var sotien = $('#sotien').val();
    var ck = <?=$site['site_ck_momo_rut'];?>;
    var ketqua = sotien * ck / 100;
    $('#ketqua').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g, '$1.'));


});


function doithe()
{
    $.ajax({
        url : '/game/send?doithe',
        type : 'POST',
        data : $("#form_doithe").find("select, textarea, input").serialize(),
        success : function(d)
        {
        swal(d.type, d.msg);
        }
        
    });
}
function ruttien()
{
    $.ajax({
        url : '/game/send?ruttien',
        type : 'POST',
        data : $("#form_rutvidt").find("select, textarea, input").serialize(),
        success : function(d)
        {
        swal(d.type, d.msg);
        }
        
    });
}
    $('#rut_tien').modal('show');

</script>