<?php
/*MÃ NGUỒN ĐƯỢC PHÁT TRIỂN BỞI CMSNT.CO DEV NTTHANH - LH ZALO 0947838128*/
if(isset($_POST['btnNapCard']))
{
    $loaithe = check_string($_POST['loaithe']);
    $menhgia = check_string($_POST['menhgia']);
    $seri = check_string($_POST['seri']);
    $pin = check_string($_POST['pin']);
    $code = random('qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM', 12);
    $thucnhan = $menhgia - $menhgia * $site['site_ck_card'] / 100;
    if (strlen($seri) < 5 || strlen($pin) < 5)
    {
               $d->type = 'canhbao';
        $d->msg = 'Mã thẻ hoặc seri không đúng định dạng';
            echo json_encode($d);

        
    }
    else
    {
        $json = json_decode(curl_get('https://autocard365.com/api/card-auto.php?auto=true&type='.$loaithe.'&menhgia='.$menhgia.'&seri='.$seri.'&pin='.$pin.'&APIKey='.$site['site_api_card'].'&callback='.$site_callback.'&content='.$code), true);
        if (isset($json['data']))
        {
            if ($json['data']['status'] == 'error')
            {
                         $d->type = 'canhbao';
        $d->msg = ''.$json['data']['msg'].'';
            echo json_encode($d);
                
            }
            else if ($json['data']['status'] == 'success')
            {
              $create = $mysqli->query("INSERT INTO `cards` SET 
              `code` = '".$code."',
              `seri` = '".$seri."',
              `pin` = '".$pin."',
              `loaithe` = '".$loaithe."',
              `menhgia` = '".$menhgia."',
              `thucnhan` = '".$thucnhan."',
              `username` = '".$my_username."',
              `status` = 'xuly',
              `note` = '',
              `createdate` = now() ");
              if($create)
              {
                             $d->type = 'canhbao';
        $d->msg = ''.$json['data']['msg'].'';
            echo json_encode($d);
              }
              else
              {
                          $d->type = 'canhbao';
        $d->msg = ''.$json['data']['msg'].'';
            echo json_encode($d);
              }
            }
        }
    }
}
/*MÃ NGUỒN ĐƯỢC PHÁT TRIỂN BỞI CMSNT.CO DEV NTTHANH - LH ZALO 0947838128*/
?>