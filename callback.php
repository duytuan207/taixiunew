<?php
include_once('function/config.php');
error_reporting(0);

include 'tsr.php';

	$callback_sign = md5($partner_key.$_GET['code'].$_GET['serial']);



		if($_GET['callback_sign'] == $callback_sign) { 
	$getdata['status'] = $_GET['status'];
				$getdata['message'] = $_GET['message'];
				$getdata['request_id'] = $_GET['request_id'];   /// Mã giao dịch của bạn
				$getdata['trans_id'] = $_GET['trans_id'];   /// Mã giao dịch của website webthedfull.com
				$getdata['declared_value'] = $_GET['declared_value'];  /// Mệnh giá mà bạn khai báo lên
				$getdata['value'] = $_GET['value'];  /// Mệnh giá thực tế của thẻ
				$getdata['amount'] = $_GET['amount'];   /// Số tiền bạn nhận về (VND)
				$getdata['code'] = $_GET['code'];   /// Mã nạp
				$getdata['serial'] = $_GET['serial'];  /// Serial thẻ
				$getdata['telco'] = $_GET['telco'];   /// Nhà mạng
  $code =  $_GET['code'];  
  $seri =  $_GET['serial']; 
    $card2 = $mysqli->query("SELECT * FROM cards WHERE `pin` = '$code' and `seri` = '$seri'  ");
    $card = mysqli_fetch_array($card2);
    if ($_GET['status'] == '1')
    {
        $thucnhan = $card['thucnhan'];
        $mysqli->query("UPDATE cards SET `status` = 'hoantat' WHERE `pin` = '$code' and `seri` = '$seri' ");
        $mysqli->query("UPDATE nguoichoi SET `xu` = `xu` + '$thucnhan' WHERE `taikhoan` = '".$card['username']."' ");
      
    }
    else 
    {
        $mysqli->query("UPDATE cards SET status = 'thatbai' WHERE `pin` = '$code' and `seri` = '$seri' ");
    }
}
else
{   
   
}
?>