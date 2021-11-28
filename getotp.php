<?php
include_once('function/config.php');
    header('Content-Type: application/json;charset=utf-8');  


            $get_otp = rand(000000,999999);
            
            if ($datauser->timeotp+60>time()) {
                $timecl = ($datauser->timeotp+60)-time(); 
                  $msg = 'Vui lòng đợi '.$timecl.'s nữa để lấy OTP';
        $type = 'canhbao';      

            } else {
            





   $mysqli->query("UPDATE `nguoichoi` SET `otpmail` = '".$get_otp."' ,`timeotp` = '".time()."' WHERE `taikhoan` = '".$datauser->taikhoan."' ");
        $guitoi = $datauser->email;   
        $subject = 'XÁC NHẬN OTP';
        $bcc = "From:$site_tenweb@lethinh2003.me \r\n";
        $bcc .= "MIME-Version: 1.0\r\n";             //MỚI
        $bcc .= "Content-type: text/html\r\n";       //MỚI
     
        $noi_dung = '<h3>Có ai đó vừa yêu cầu mã OTP để thực hiện giao dịch. Vui lòng không đưa mã OTP này cho bất kì ai</br> !</h3>
        <table >
        <tbody>
        <tr>
        <td>Mã OTP của bạn là:</td>
        <td><b style="color:blue;"><h3>'.$get_otp.'</h3></b></td>
        </tr>
        </tbody>
        </table>
        <hr>
        <h3><font color="red">
   
Hệ thống chẵn lẻ tài xỉu con số may mắn.<br>
Đổi thẻ - Nạp thẻ - Rút tiền tự động.<br>
Hotline: 0369084341</font></h3>
        ';
        
    
     $success =  mail ($guitoi, $subject, $noi_dung, $bcc);  
      if( $success == true )
    {
          $msg = 'Lấy OTP thành công';
        $type = 'Thành công';   

    } else {
        $msg = 'Lấy OTP thất bại';
        $type = 'Thất bại';   
  
    }
    


}
    $d->msg = $msg;
    $d->type= $type;
    echo json_encode($d);
?>
