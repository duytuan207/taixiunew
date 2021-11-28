<?PHP
include_once('../function/config.php');
if(isset($_GET['quenmk'])) {
     header('Content-Type: application/json;charset=utf-8'); 
    $taikhoan = htmlspecialchars(trim($_POST['taikhoan']));
    $email = htmlspecialchars(trim($_POST['email']));
    if(!$taikhoan or !$email)
    {
    
            $d->msg = 'Vui lòng nhập đầy đủ thông tin';
        $d->type = 'Thất bại';
              echo json_encode($d);

        exit();
    }
    $kiemtra  = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$taikhoan."' AND `email` = '".$email."' LIMIT 1")->fetch_assoc();
    if($kiemtra['id'] <=0)
    {
        $d->msg = 'Không tồn tại tài khoản này.';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();
    }


    $get_pass = random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM012345', '8');
    
     $guitoi = $email;   
        $subject = 'QUÊN MẬT KHẨU';
        $bcc = "From:$site_tenweb@lethinh2003.me \r\n";
        $bcc .= "MIME-Version: 1.0\r\n";             //MỚI
        $bcc .= "Content-type: text/html\r\n";       //MỚI
     
        $noi_dung = '<h3>Có ai đó vừa yêu cầu reset mật khẩu tài khoản của bạn. </br> !</h3>
        <table >
        <tbody>
        <tr>
        <td>Mật khẩu mới của bạn là:</td>
        <td><b style="color:blue;"><h3>'.$get_pass.'</h3></b></td>
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
    

   $mysqli->query("UPDATE `nguoichoi` SET `password` = '".md5($get_pass)."' WHERE `taikhoan` = '".$taikhoan."' ");
    $d->msg = 'Mật khẩu mới đã gửi về Mail của bạn';
    $d->type = 'Thành công';
    } else {
            $d->msg = 'Gửi thất bại';
    $d->type = 'Thất bại';
    }
    echo json_encode($d);
}


if(isset($_GET['chat']))
{
    header('Content-Type: application/json;charset=utf-8');
    $chat = htmlspecialchars($_POST['chat']);
    if($id <=0)
    {
        $msg = 'Vui lòng đăng nhập';
        $type = 'Thất bại';
    }
    else
    if(strlen($chat) <=2)
    {
        $msg = 'Nội dung chát phải lớn hơn 2 kí tự.';
        $type = 'Thất bại';
    }
    else
    if(strlen($chat) >=500)
    {
        $msg = 'Nội dung bạn nhập quá dài';
        $type='thongtin';
    }
    else
    {
        $type = 'Thành công';
        $d->center = '<b>'.($datauser->{'do'} >=1 ? '<font color="red">'.$datauser->taikhoan.'</font>' : ''.$datauser->taikhoan.'').'</b> : '.$chat.'<hr>';
        $d->notice = ''.($datauser->{'do'} >=1 ? '<font color="red">'.$datauser->taikhoan.'</font>' : ''.$datauser->taikhoan.'').' : '.$chat.' ';
        $mysqli->query("INSERT INTO `chat` SET `noidung` = '".$chat."', `username` = '".$datauser->taikhoan."', `do` = '".$datauser->{'do'}."' ");
    }
    $d->msg = $msg;
    $d->type = $type;
    echo json_encode($d);
}
if(isset($_GET['doipass']))
{
    header('Content-Type: application/json;charset=utf-8');
    $cu = $_POST['cu'];
    $matkhau = $_POST['matkhau'];
    $matkhau2 = $_POST['matkhau2'];
    if($id <=0)
    {
        $msg = 'Vui lòng đăng nhập';
        $type = 'Thất bại';
    }
    else
    if(empty($matkhau) or empty($matkhau2))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin';
        $type = 'Thất bại';
    }
    else
    if(strlen($matkhau) <= 4)
    {
        $msg = 'Mật khẩu phải lớn hơn 4 kí tự';
        $type = 'Thất bại';
    }
    else if (md5($matkhau) == $datauser->password) {
        $msg = 'Mật khẩu mới trùng với mật khẩu cũ';
        $type = 'Thất bại';
    } else
    if($matkhau != $matkhau2)
    {
        $msg = 'Mật khẩu mới nhập chưa chính xác';
        $type = 'Thất bại';
    }
    else
    if(md5($cu) != $datauser->password)
    {
        $msg = 'Mật khẩu cũ nhập không chính xác';
        $type = 'Thất bại';
    }
    else
    {
        $msg = 'Thay đổi mật khẩu thành công';
        $type ='Thành công';
         $mysqli->query("UPDATE `nguoichoi` SET 
            
              `password` = '".md5($matkhau)."'
             WHERE
              `taikhoan` = '".$datauser->taikhoan."'
              ");

    }
    
    $d->msg = $msg;
    $d->type = $type;
    echo json_encode($d);
}


if(isset($_GET['otp']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $otp = $_POST['otp'];
    $otpmail = $_POST['otpmail'];

    if($id <=0)
    {
        $msg = 'Vui lòng đăng nhập';
        $type = 'Thất bại';
    }
    else
    if(empty($otp) or empty($otpmail))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin';
        $type = 'Thất bại';
    } else if (md5($otp) == $datauser->otp){
        $msg = 'OTP trùng với OTP cũ';
        $type = 'Thất bại';
    } 
    else
    if($datauser->otpmail != $otpmail)
    {
        $msg = 'OTP mail bạn nhập không chính xác';
        $type = 'Thất bại';
    }
   
    else
    {
        if ($datauser->otp==0) {
                $msg = 'Bạn nhận được 3.000đ từ kích hoạt OTP';
        $type  ='Thành công';
         $mysqli->query("UPDATE `nguoichoi` SET `xu` = `xu`+ '3000' WHERE `taikhoan` = '".$datauser->taikhoan."' ");
        }
        $msg = 'Thiết lập OTP thành công';
        $type  ='Thành công';
        $mysqli->query("UPDATE `nguoichoi` SET `otp` = '".md5($otp)."' ,`otpmail` ='0' WHERE `taikhoan` = '".$datauser->taikhoan."' ");
    }
    $d->msg = $msg;
    $d->type= $type;
    echo json_encode($d);
}

if(isset($_GET['rutket']))
{
     header('Content-Type: application/json;charset=utf-8');  

    $sotien = $_POST['sotien'];
    $otp = $_POST['otp'];
  if( empty($sotien) or empty($otp))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin';
  $type = 'Thất bại'; 

    
    } else  if ($sotien<0) {
          $msg = 'Vui lòng nhập đầy đủ thông tin';
  $type = 'Thất bại'; 
    } else 
    
    

 if ($datauser->ketsat<$sotien)
    
    {
           $msg = 'Bạn không đủ tiền để rút';
  $type = 'Thất bại'; 

    } else if (md5($otp) != ($datauser->otp)){
              $msg = 'OTP không chính xác';
  $type = 'Thất bại'; 
    } else {
    

        
              
              $mysqli->query("UPDATE `nguoichoi` SET 
            
              `ketsat` = `ketsat` - '".$sotien."',
                            `xu` = `xu` + '".$sotien."'

             WHERE
              `taikhoan` = '".$datauser->taikhoan."'
              ");
              
        $msg = 'Rút về két sắt thành công';
        $type = 'Thành công';

                      
   
              
    
        
    }
      $d->msg = $msg;
    $d->type= $type;
    echo json_encode($d);
}

if(isset($_GET['dongbang']))
{
     header('Content-Type: application/json;charset=utf-8');  

    $sotien = $_POST['sotien'];
    $otp = $_POST['otp'];
  if( empty($sotien) or empty($otp))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin';
  $type = 'Thất bại'; 

    
    } else if ($sotien<0) {
          $msg = 'Vui lòng nhập đầy đủ thông tin';
  $type = 'Thất bại'; 
    } else 
    
    

 if ($datauser->xu<$sotien)
    
    {
           $msg = 'Bạn không đủ tiền để đóng băng';
  $type = 'Thất bại'; 

    } else if (md5($otp) != ($datauser->otp)){
              $msg = 'OTP không chính xác';
  $type = 'Thất bại'; 
    } else {
    

        
              
              $mysqli->query("UPDATE `nguoichoi` SET 
            
              `ketsat` = `ketsat` + '".$sotien."',
                            `xu` = `xu` -'".$sotien."'

             WHERE
              `taikhoan` = '".$datauser->taikhoan."'
              ");
              
        $msg = 'Đóng băng két sắt thành công';
        $type = 'Thành công';

                      
   
              
    
        
    }
      $d->msg = $msg;
    $d->type= $type;
    echo json_encode($d);
}

if(isset($_GET['ruttien']))
{
     header('Content-Type: application/json;charset=utf-8');  

    $sdt = $_POST['sdt'];
    $sotien = $_POST['sotien'];
    $otp = $_POST['otp'];
        $thucnhan = $sotien*$site['site_ck_momo_rut']/100;
  if(empty($sdt) or empty($sotien) or empty($otp))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin  '.$menhgia.'';
  $type = 'Thất bại'; 

    }
    else
    if ($sotien <100000) {
         $msg = 'Rút tối thiểu 100.000đ';
  $type = 'Thất bại';   
    } else
    
    

 if ($datauser->xu<$sotien)
    
    {
           $msg = 'Bạn không đủ tiền để rút';
  $type = 'Thất bại'; 

    } else if (md5($otp) != ($datauser->otp)){
              $msg = 'OTP không chính xác';
  $type = 'Thất bại'; 
    } else {
    
$noidung =' Rút tiền về ví MOMO mệnh giá '.$sotien.' ';

              $mysqli->query("INSERT INTO `lichsu_ruttien` SET 
            `username` = '".$datauser->taikhoan."',
              `sotien` = '".$sotien."',
            `thucnhan` = '".$thucnhan."',
             `noidung` = '".$noidung."',

             `thoigian` = now(),
           
              `status` = 'Xử lí'
              ");
             
             
        
              
              $mysqli->query("UPDATE `nguoichoi` SET 
            
              `xu` = `xu` - '".$sotien."'
             WHERE
              `taikhoan` = '".$datauser->taikhoan."'
              ");
              
        $msg = 'Tạo yêu cầu rút tiền thành công, vui lòng đợi trong giây lát ';
        $type = 'Thành công';

                      
   
              
    
        
    }
      $d->msg = $msg;
    $d->type= $type;
    echo json_encode($d);
}

if(isset($_GET['doithe']))
{
    header('Content-Type: application/json;charset=utf-8');  

    $loaithe = $_POST['loaithe'];
    $menhgia = $_POST['menhgia'];
    $otp = $_POST['otp'];
        $coin = $menhgia*120/100;
  if(empty($loaithe) or empty($menhgia) or empty($otp))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin';
  $type = 'Thất bại'; 

    }
    else 
    
    

 if ($datauser->xu<$coin)
    
    {
           $msg = 'Bạn không đủ tiền để đổi';
  $type = 'Thất bại'; 

    } else if (md5($otp) != ($datauser->otp)){
              $msg = 'OTP không chính xác';
  $type = 'Thất bại'; 
    } else {
        
        
           $ktrathe     = $mysqli->query("SELECT * FROM `khothe` WHERE `username` != '".$datauser->taikhoan."' AND `loaithe`='".$loaithe."' AND `menhgia`='".$menhgia."'  ")->fetch_assoc();
           
                      if ($ktrathe <1) {
                          
                $msg = 'Thẻ đã hết vui lòng thử lại sau';
        $type = 'Thất bại'; 
            
                          
                          
                      } else {
                          
                              $data_the = $mysqli->query("SELECT * FROM `khothe` WHERE `username` != '".$datauser->taikhoan."'   AND  `loaithe` = '".$loaithe."'  AND  `menhgia` = '".$menhgia."'  ORDER by id DESC LIMIT 1");
   
    while($thongtinthe=$data_the->fetch_assoc()) {
                  $noidung = 'THẺ '.$loaithe.' MỆNH GIÁ '.$menhgia.'đ: SERI: '.$thongtinthe['seri'].' PIN: '.$thongtinthe['pin'].'';
   $mysqli->query("UPDATE `khothe` SET 
            
              `username` = '".$datauser->taikhoan."',
                            `ngaynhan` = now()

             WHERE
              `id` = '".$thongtinthe['id']."'
              ");
    }
     
     $noidung2 =' Đổi thẻ '.$loaithe.' mệnh giá '.format_cash($menhgia).'đ ';

              $mysqli->query("INSERT INTO `lichsu_ruttien` SET 
            `username` = '".$datauser->taikhoan."',
              `sotien` = '".$coin."',
            `thucnhan` = '".$menhgia."',
             `noidung` = '".$noidung2."',

             `thoigian` = now(),
           
              `status` = 'Thành công'
              ");
     
                     
                  
$mysqli->query("INSERT INTO `homthu` SET 
`username` = '".$datauser->taikhoan."',
`status` =  'chuadoc',
`noidung` =  '".$noidung."',
    `thoigian`= now()


            
             
             
              ");   
              
              $mysqli->query("UPDATE `nguoichoi` SET 
            
              `xu` = `xu` - '".$coin."'
             WHERE
              `taikhoan` = '".$datauser->taikhoan."'
              ");
        $msg = 'Đổi thẻ '.$loaithe.' '.$menhgia.' thành công, vui lòng kiểm tra thư ';
        $type = 'Thành công';

                      }  
   
              
    
        
    }
      $d->msg = $msg;
    $d->type= $type;
    echo json_encode($d);
}
if(isset($_GET['napthe']))
{
    header('Content-Type: application/json;charset=utf-8');  
$loaithe = $_POST['loaithe'];
    $menhgia = $_POST['menhgia'];
    $seri = $_POST['seri'];
    $pin = $_POST['pin'];
        $thucnhan = $menhgia - $menhgia * $site['site_ck_card'] / 100;

    if($id <=0)
    {
        $msg = 'Vui lòng đăng nhập';
        $type = 'Thất bại';
    }
    else
    if(empty($loaithe) or empty($menhgia) or empty($seri) or empty($pin))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin';
        $type = 'Thất bại';
    }
    else
    
    {
        $command = 'charging'; 
                require_once('../tsr.php'); 

                

                
        $request_id = rand(100000000, 999999999); /// Order id của bạn, ví dụ này lấy ngẫu nhiên để test
$telco = $loaithe;
$amount = $menhgia;
$serial = $seri;
$code = $pin;
            $dataPost = array();
			$dataPost['partner_id'] = $partner_id;
			$dataPost['request_id'] = $request_id;
			$dataPost['telco'] = $telco;
			$dataPost['amount'] = $amount;
			$dataPost['serial'] = $serial;
			$dataPost['code'] = $code;
			$dataPost['command'] = $command;
			$sign = creatSign($partner_key, $dataPost);
			$dataPost['sign'] = $sign;
			
            $data = http_build_query($dataPost);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            curl_setopt($ch, CURLOPT_REFERER, $actual_link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);

            $obj = json_decode($result);
$tbcmmm = $obj->message;
            if ($obj->status == 99) {
              $create = $mysqli->query("INSERT INTO `cards` SET 
              `code` = '".$code1."',
              `seri` = '".$seri."',
              `pin` = '".$pin."',
              `loaithe` = '".$loaithe."',
              `menhgia` = '".$menhgia."',
              `thucnhan` = '".$thucnhan."',
              `username` = '".$datauser->taikhoan."',
              `status` = 'xuly',
              `note` = '',
              `createdate` = now() ");
                  
        $msg = 'Thành công '.$tbcmmm.'';
        $type = 'Thành công';
            } else {
                $msg = 'Thất bại '.$tbcmmm.'';
        $type = 'Thất bại'; 
            }
   
              
    
        
    }
    $d->msg = $msg;
    $d->type= $type;
    echo json_encode($d);
}

if(isset($_GET['chuyentien']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $taikhoan = $_POST['taikhoan'];
    $sotien   = $_POST['sotien'];
    $matkhau  = $_POST['otp'];
    $noidung  = $_POST['noidung'];
    $thucnhan      = round($sotien*$site['site_ck_chuyentien']/100);
    $ktra     = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$taikhoan."'")->fetch_assoc();
    if($id <=0)
    {
        $msg = 'Vui lòng đăng nhập';
        $type = 'Thất bại';
    }
    else
    if(empty($taikhoan) or empty($sotien) or empty($matkhau))
    {
        $msg = 'Vui lòng nhập đầy đủ thông tin';
        $type = 'Thất bại';
    }
    else
    if($datauser->otp != md5($matkhau))
    {
        $msg = 'OTP bạn nhập không chính xác';
        $type = 'Thất bại';
    }
    else
    if($sotien <20000)
    {
        $msg = 'Số tiền phải lớn hơn 20.000đ';
        $type ='Thất bại';
    }
    else
    if($datauser->xu < $phi)
    {
        $msg = 'Tài khoản của bạn không có đủ tiền.';
        $type = 'Thất bại';
    }
    else
    if($ktra['id'] <=0)
    {
        $msg = 'Không tồn tại người dùng này';
        $type = 'Thất bại';
    }
    else
    if($taikhoan == $datauser->taikhoan)
    {
        $msg = 'Không thể chuyển cho chính bản thân mình';
        $type = 'Thất bại';
    }
    else
    {
        $msg = 'Chuyển thành công cho '.$taikhoan.'  với số tiền '.format_cash($sotien).'đ kèm nội dung: '.$noidung.' ';
        $type  ='Thành công';
        $n = new users($ktra['id']);
       
        $mysqli->query("UPDATE `nguoichoi` SET `xu` = `xu`- '".$sotien."' WHERE  `taikhoan` = '".$datauser->taikhoan."' ");
          $mysqli->query("UPDATE `nguoichoi` SET `xu` = `xu`+ '".$thucnhan."' WHERE  `taikhoan` = '".$n->taikhoan."' ");
             $mysqli->query("INSERT INTO `homthu` SET `username` = '".$n->taikhoan."', `noidung` = 'Nhận tiền từ ".$datauser->taikhoan." ".format_cash($thucnhan)."đ với lời nhắn: ".$noidung."'");
          
        $mysqli->query("INSERT INTO `lichsu_chuyentien` SET `thoigian` = '".$thoigian."', `taikhoan` = '".$datauser->taikhoan."', `noidung` = 'Chuyển cho ".$n->taikhoan." ".format_cash($sotien)."đ với lời nhắn: ".$noidung." '");
        $mysqli->query("INSERT INTO `lichsu_chuyentien` SET `thoigian` = '".$thoigian."', `taikhoan` = '".$n->taikhoan."', `noidung` = 'Nhận tiền từ ".$datauser->taikhoan." ".format_cash($thucnhan)."đ với lời nhắn: ".$noidung."' ");
    }
    $d->msg = $msg;
    $d->type= $type;
    echo json_encode($d);
}

if(isset($_GET['search_users']))
{
    header('Content-Type: application/json;charset=utf-8');  
    $taikhoan = $_POST['name'];
    $ktra     = $mysqli->query("SELECT * FROM `daily` WHERE `taikhoan` = '".$taikhoan."'")->fetch_assoc();
    if($ktra['id'] <=0)
    {
        $d->error =0;
    }
    else
    {
        $a = new users($ktra['id']);
        $d->name = $a->thongtin->ten;
        $d->error =1;
    }
    echo json_encode($d);
    
}

if(isset($_GET['giftcode']))
{
    header('Content-Type: application/json;charset=utf-8'); 
    $giftcode = $_POST['giftcode'];
    $text     = $mysqli->query("SELECT * FROM `giftcode` WHERE `code` = '".$giftcode."'")->fetch_assoc();
    if($id <=0)
    {
        $d->type = 'Thất bại';
        $d->msg  = 'Vui lòng đăng nhập';
        
    }
    else
    if($text['id'] <=0)
    {
        $d->type = 'Thất bại';
        $d->msg = 'Không tồn tại mã quà tặng này.';
    }
    else
    if($datauser->thongtin->{''.$giftcode.''} >=1)
    {
        $d->type = 'Thất bại';
        $d->msg  = 'Bạn đã sử dụng giftcode này rồi.';
    }
    else
    {
        $d->type = 'Thành công';
        $d->msg = 'Nhập mã quà tặng thành công ! Bạn nhận được '.format_cash($text['xu']).'đ';
        $datauser->upxu($text['xu']);
        $datauser->upthongtin($giftcode,1);
        if($text['max'] <=1)
        {
            $mysqli->query("DELETE FROM `giftcode` WHERE `id` = '".$text['id']."'");
        }
        else
        {
            $mysqli->query("UPDATE `giftcode` SET `max` = `max` - '1' WHERE `id` = '".$text['id']."'");
        }
    }
    echo json_encode($d);
}




if(isset($_GET['exit']))
{
    session_destroy();
}

if(isset($_GET['reg']))
{
    header('Content-Type: application/json;charset=utf-8'); 
    $taikhoan = htmlspecialchars(trim($_POST['taikhoan']));
        $email = htmlspecialchars(trim($_POST['email']));

    $matkhau  = htmlspecialchars(trim($_POST['matkhau']));
    $matkhau2  = htmlspecialchars(trim($_POST['matkhau2']));
    $kiemtra  = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$taikhoan."'")->fetch_assoc();
        $kiemtramail  = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `email` = '".$email."'")->fetch_assoc();
     if(strlen($email) <=9)
    {
           $d->msg = 'Email không hợp lệ.';
        $d->type = 'Thất bại';
    } else 
    if(strlen($taikhoan) <=3)
    {
        $d->msg = 'Tài khoản phải lớn hơn 3 kí tự và nhỏ hơn 20 kí tự.';
        $d->type = 'Thất bại';
    } else
    
    if(!preg_match('/^[a-z0-9]{3,15}$/', $matkhau))
    {
        $d->msg = 'Mật khẩu hơn 3 kí tự và nhỏ hơn 20 kí tự.';
        $d->type = 'Thất bại';
    }else
    if($matkhau != $matkhau2)
    {
        $d->msg = 'Mật khẩu không khớp.';
        $d->type = 'Thất bại';
    }else
    if($kiemtra['id'] >=1)
    {
        $d->msg = 'Tài khoản đã tồn tại.';
        $d->type = 'Thất bại';
    } else  if($kiemtramail >=1)
    {
        $d->msg = 'Email đã tồn tại.';
        $d->type = 'Thất bại';
    }
    else {
    $mysqli->query("INSERT INTO `nguoichoi` SET `taikhoan` = '".$taikhoan."', `xu` = '0',`email`='".$email."',`password` = '".md5($matkhau)."' ");


    $d->msg = '<font color="yellow">Đăng kí thành công,chúc bạn chơi game vui vẻ ! </font>';
    $d->type = 'Thành công';
    }
    echo json_encode($d);
}


if(isset($_GET['login']))
{
    header('Content-Type: application/json;charset=utf-8'); 
    $taikhoan = htmlspecialchars(trim($_POST['taikhoan']));
    $matkhau = htmlspecialchars(trim($_POST['matkhau']));
    if(!$taikhoan or !$matkhau)
    {
    
            $d->msg = 'Vui lòng nhập đầy đủ thông tin';
        $d->type = 'Thất bại';
              echo json_encode($d);

        exit();
    }
    $kiemtra  = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$taikhoan."' LIMIT 1")->fetch_assoc();
    if($kiemtra['id'] <=0)
    {
        $d->msg = 'Không tồn tại tài khoản này.';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();
    }
    $p = new users($kiemtra['id']);
    if($p->password != md5($matkhau))
    {
        $d->msg = 'Tài khoản hoặc mật khẩu không chính xác.';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();
    }
    
  
        $_SESSION['username'] = $taikhoan;

    $_SESSION['id'] = $p->id;
    $d->msg = '<font color="yellow">Đăng nhập thành công</font>';
    $d->type = 'Thành công';

    echo json_encode($d);
}
////




if(isset($_GET['datxiu']))
{
    header('Content-Type: application/json;charset=utf-8'); 
    $timetx=70;
    $money = htmlspecialchars(trim($_POST['moneyxiu']));
         if($id <=0) {
          $d->msg = 'Đăng nhập để đặt cược';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();   
     }
    if(!$money or $money <1)
    {
        $d->msg = 'Vui lòng nhập số tiền hợp lệ';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();
    }
    if($datauser->xu < $money)
    {
     $d->msg = 'Vui lòng nhập số tiền hợp lệ';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();
    }
            $gettx = mysqli_query($mysqli,"SELECT * FROM `taixiu` ORDER BY id desc limit 1  ");

        $phienmo = mysqli_fetch_assoc($gettx);
        $phienmoi = $phienmo['id']+1;
        
                $query_lscuoc = $mysqli->query("SELECT * FROM `taixiu_cuoc` WHERE `username`='".$datauser->taikhoan."' AND `phien` = '$phienmoi' ");
                
	 if ($phienmo[time]+$timetx-time()<=5|| $phienmo[time]+$timetx-time()>=($timetx-20) ){
	        $d->msg = 'Hệ thống ngưng nhận cược';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();
      } 
	
      if($query_lscuoc->num_rows >0)  {
    $d->msg = 'Bạn đã cược ván này rồi';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();
      } 
         $sodu = $datauser->xu-$money;
     $mysqli->query("INSERT INTO  `taixiu_cuoc` SET `sodu`= '{$sodu}' ,`taixiu` = 'xiu', `status`='xuli', `username`='".$datauser->taikhoan."',`money`='$money',`phien`='$phienmoi',`time` = now()  "); 

  $mysqli->query("UPDATE `nguoichoi` SET `xu` = `xu` - '{$money}' WHERE `id` = '".$datauser->id."'");
    $d->msg = 'Cược thành công ';
    $d->type = 'Thành công';
    
    echo json_encode($d);
    
}

if(isset($_GET['dattai']))
{
    
    header('Content-Type: application/json;charset=utf-8'); 
    $timetx=70;
    $money = htmlspecialchars(trim($_POST['moneytai']));
     if($id <=0) {
          $d->msg = 'Đăng nhập để đặt cược';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();   
     }
    
    if(!$money or $money <1)
    {
        $d->msg = 'Vui lòng nhập số tiền hợp lệ';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();
    }
    if($datauser->xu < $money)
    {
     $d->msg = 'Vui lòng nhập số tiền hợp lệ';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();
    }
     $gettx = mysqli_query($mysqli,"SELECT * FROM `taixiu` ORDER BY id desc limit 1  ");

        $phienmo = mysqli_fetch_assoc($gettx);
        $phienmoi = $phienmo['id']+1;
        
        $query_lscuoc = $mysqli->query("SELECT * FROM `taixiu_cuoc` WHERE `username`='".$datauser->taikhoan."' AND `phien` = '$phienmoi' ");

	 if ($phienmo[time]+$timetx-time()<=5 || $phienmo[time]+$timetx-time()>=($timetx-20)){
	        $d->msg = 'Hệ thống ngưng nhận cược';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();
      } 
      if($query_lscuoc->num_rows >0)  {
    $d->msg = 'Bạn đã cược ván này rồi';
        $d->type = 'Thất bại';
        echo json_encode($d);
        exit();
      } 
               
                $sodu = $datauser->xu-$money;
 
     $mysqli->query("INSERT INTO  `taixiu_cuoc` SET `sodu`= '{$sodu}', `taixiu` = 'tai', `status`='xuli',`username`='".$datauser->taikhoan."',`money`='$money',`phien`='$phienmoi',`time` = now()  "); 
    
  $mysqli->query("UPDATE `nguoichoi` SET `xu` = `xu` - '{$money}' WHERE `id` = '".$datauser->id."'");
    $d->msg = 'Cược thành công ';
    $d->type = 'Thành công';
    
    echo json_encode($d);
}