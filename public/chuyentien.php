<?php
include_once('../function/config.php');
if((!$_SESSION['username'])){
               echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập", "");</script>';
               exit();
        }
?>
<div class="modal fade" id="chuyen_tien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 101%;

  ">
<div class="popup-header">
<img src="/images/close-btn.png" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -3%;">
<h4 class="popup-title" style="margin-left: 10%;
    margin-top: 3%;" id="myModalLabel">
    
          <button type="button" onclick="chuyenkhoan()" class="Btn zoom-hove">Chuyển khoản</button>
          <button type="button" onclick="lschuyenkhoan()" class="Btn zoom-hove">Lịch sử</button>
                                 
</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

<div class="form pt-3" id="form_chuyentien" style="display: block;">
                                    <center>
                                        <div class="khung-body">
<div class="khung">
<b><font color="#fd5a5a">Lưu Ý:</br>
- Chuyển khoản tối thiểu 20.000đ<br>
- Phí giao dịch <?=100-$site['site_ck_chuyentien'] ?>% do người nhận chịu<br>
</font></b>
</div>
</br>

<font color="red"><b><font id="notice_napthe" name="notice_napthe"></font></b></font>
    
                                   
                                    
                                    <div class="form-group">

                                            
                                            <input placeholder="Tài khoản" type="text" class="form-control" placeholder="" id="taikhoan"  name="taikhoan" value="" aria-describedby="basic-addon11">
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                      
                                            <input placeholder="Số tiền" type="number" class="form-control" placeholder=""   name="sotien" value="" aria-describedby="basic-addon11">
                                        
                                    </div>
                                     
                                                                   
                                    
                                      <div class="form-group">
                                      
                                            <input placeholder="Nhập OTP" type="password" class="form-control" placeholder=""  name="otp" value="" aria-describedby="basic-addon11">
                                        
                                    </div>
                                          <div class="form-group">
                        
                        <textarea placeholder="Nhập nội dung" class="form-control" name="noidung" ></textarea>
                      </div>
                                    
                                     
                   <button type="button" onclick="chuyentien()" class="Btn nap zoom-hove"  type="submit">Chuyển Ngay</button>
                  
              
</center>
</div>
                                </div>
                                
            
                                 
                                    
                                    
                                    <div class="form pt-3" id="form_lichsuck" style="display: none;">
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
                 
                          <th> Nội dung </th>
                  

                        </tr>
                      </thead>
                <tbody id="ls_chuyentien" style="    white-space: nowrap;">
</tbody>
                    </table>
                   
            </div>

                
                      
                     
</center>
                                </div>
                                
                                
                               
                   
                
                      
                     
</center>
                                </div>
                                                          </div>

                 
                             

                  
  </div>

  
                                  <!-- -->
                                  
                                  
                                  


</div>
</div>
</div>
<div class="popup-footer">

</div>
</div>
<script>
function chuyentien()
{
    $.ajax({
        url : '/game/send?chuyentien',
        type : 'POST',
        data : $("#form_chuyentien").find("select, textarea, input").serialize(),
        success : function(d)
        {
        swal(d.type, d.msg);
        if (d.type=='Thành công') {
                   $("#form_chuyentien").find('select, textarea, input').val('');
        }
    
        }
        
    });
}

                                    function chuyenkhoan() {
  document.getElementById("form_chuyentien").style.display = "block";
    document.getElementById("form_lichsuck").style.display = "none";

      		                                 		                            



}                                    function lschuyenkhoan() {
  document.getElementById("form_chuyentien").style.display = "none";
    document.getElementById("form_lichsuck").style.display = "block";

    
        


  

}
setInterval(function(){
 $( "#ls_chuyentien" ).load( "/ls_chuyentien.php" );
 }, 1000);
    $('#chuyen_tien').modal('show');

 
</script>