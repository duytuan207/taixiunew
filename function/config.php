<?PHP

session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$vip    = array("10","20","150","400","1000","5000");
$mysqli = new mysqli("localhost","werfamil_scam","Thinh123@@@","werfamil_scam");
$mysqli -> set_charset("utf8");
$site = $mysqli->query("SELECT * FROM setting")->fetch_array();
$site_favicon = $site['site_favicon'];
$site_tenweb = $site['site_tenweb'];
$site_mota = $site['site_mota'];
$site_tukhoa = $site['site_tukhoa'];
$site_api_card = $site['site_api_card'];
$site_api_momo = $site['site_api_momo'];
$site_baotri = $site['site_baotri'];
$site_ck_card = $site['site_ck_card'];
$site_image = $site['site_image'];
$site_logo = $site['site_logo'];
$site_gmail = $site['site_gmail'];
$site_domain = $site['site_domain'];
$site_sdt_momo = $site['site_sdt_momo'];
$site_gmail_momo = $site['site_gmail_momo'];
$site_ten_momo = $site['site_ten_momo'];
$site_qr_momo = $site['site_qr_momo'];
$site_pass_momo = $site['site_pass_momo'];
$site_noidung_momo = $site['site_noidung_momo'];
$site_show_soluong = $site['site_show_soluong'];
$site_thong_bao = $site['site_thong_bao'];
$site_token = $site['site_token'];
$carousel_1 = $site['carousel_1'];
$carousel_2 = $site['carousel_2'];
$carousel_3 = $site['carousel_3'];
$site_show_carousel = $site['site_show_carousel'];
$site_callback = $site_domain.'/callback.php';
include_once('SMTP/class.smtp.php');
include_once('SMTP/PHPMailerAutoload.php');
include_once('SMTP/class.phpmailer.php');

function sendCSM($mail_nhan,$ten_nhan,$chu_de,$noi_dung,$bcc)
{
    global $site_gmail_momo, $site_pass_momo;
        // PHPMailer Modify
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail ->Debugoutput = "html";
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $site_gmail_momo; // GMAIL STMP
        $mail->Password = $site_pass_momo; // PASS STMP
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom($site_gmail_momo, $bcc);
        $mail->addAddress($mail_nhan, $ten_nhan);
        $mail->addReplyTo($site_gmail_momo, $bcc);
        $mail->isHTML(true);
        $mail->Subject = $chu_de;
        $mail->Body    = $noi_dung;
        $mail->CharSet = 'UTF-8';
        $send = $mail->send();
        return $send;
}

$tien = $_SESSION['tien'] >=1 ? 1 : 0;
/*Bug*/
$ip = $_SERVER['REMOTE_ADDR'];
$url = $_SERVER['PHP_SELF'];
$check_log = $mysqli->query("SELECT * FROM `log` WHERE `ip` = '".$ip."' AND `uid` = '".$_SESSION['id']."' AND `url` = '".$url."' AND `get1` = '".json_encode($_GET)."' AND `post` = '".json_encode($_POST)."' ")->fetch_assoc();
if($check_log['id'] <=0)
{
    $mysqli->query("INSERT INTO `log` SET `ip` = '".$ip."', `uid` = '".$_SESSION['id']."', `url` = '".$url."', `get1` = '".json_encode($_GET)."', `post` = '".json_encode($_POST)."' ");
}

if(isset($_POST)){
foreach($_POST as $index => $value){
if(is_string($_POST[$index])){
    if($index != "taixiu" AND $index !="cuoc")
    {
        $_POST[$index]=$mysqli->real_escape_string($_POST[$index]);
    }


}
}
}
if(isset($_GET)){
foreach($_GET as $index => $value){
if(is_string($_GET[$index])){
$_GET[$index]=$mysqli->real_escape_string($_GET[$index]);
}
}
}

/*Anti bug*/
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$gio = date('h');
$phut= date('i');
$giay= date('s');
$thoigian = ''.$gio.':'.$phut.':'.$giay.' '.$ngay.'/'.$thang.'/'.$nam.'';
$ngaythangnam = ''.$ngay.'/'.$thang.'/'.$nam.'';
$id = $_SESSION['id'];
$kmess = $_SESSION['kmess'] > 5 && $_SESSION['kmess'] < 10 ? $_SESSION['kmess'] : 10;
$page = isset($_REQUEST['p']) && $_REQUEST['p'] > 0 ? intval($_REQUEST['p']) : 1;
$start = isset($_REQUEST['p']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);
if($id >=1)
{
    $datauser = new users($id);
    $user     = $datauser;
    $uid      = $id;
    $u        = $user;
    $check_login = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$_SESSION['id']."'")->fetch_assoc();
    if($check_login['id'] <=0)
    {
        session_destroy();
    }
}

$admin = 0;
if($_SESSION['admin'] >=1)
{
    $admin = $mysqli->query("SELECT * FROM `admin` WHERE `id` = '".$_SESSION['admin']."'")->fetch_assoc();
}
/*Sử lý tiền tài xỉu*/

class users
{
    public $id;
    public function users($id)
    {
        global $mysqli;
        $users = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '" . $id . "'")->fetch_array();
        foreach($users as $key => $value)
        {
            $this->{$key} = $value;
        }
        $this->thongtin = json_decode($this->thongtin);
        if (!isset($this->thongtin)) 
        {
            $this->thongtin = new stdClass();
        }
    }
    
    public function up($name, $value)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `$name` = '".$value."' WHERE `id` = '" . $this->id . "'");
    }
    
    public function info()
    {
        return $this->id;
    }
    
    public function upthongtin($name,$value)
    {
        global $mysqli;
        $this->thongtin->$name = $value;
        $mysqli->query("UPDATE `nguoichoi` SET `thongtin` = '" . json_encode($this->thongtin,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "' WHERE `id` = '" . $this->id . "'");
    }
    
    public function upxu($vnd)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `xu` = `xu` +  '" . $vnd . "' WHERE `id` = '" . $this->id . "'");
    }
    
    public function upxu2($vnd)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `tien` = `tien` +  '" . $vnd . "' WHERE `id` = '" . $this->id . "'");
    }
}
function random($string, $int)
{  
    return substr(str_shuffle($string), 0, $int);
}

function az($length = 10) {

return md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length));

}
function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}
function tron($k)
{
    if($k < 1000) return $k;
    else if($k>=1000 AND $k < 1000000) return format_cash($k/1000).'K';
    else if($k>=1000000) return format_cash($k/1000000).'M';
}



function trang($url, $start, $total, $kmess) {
    $out[] = '<div class="row"><center><ul class="pagination">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li><a class="pagenav" href="' . strtr($url, array('%' => '%%')) . 'p=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '&lt;&lt; Trang Tr&#432;&#7899;c');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li><a>...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="active"><a>' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li><a>...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total) {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, 'Trang Ti&#7871;p &gt;&gt;');
    }
    $out[] = '</ul></center></div>';
    return implode('', $out);
}
