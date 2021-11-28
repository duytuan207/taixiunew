<?PHP

$serial = $_POST['serial'];
$mathe  = $_POST['mathe'];
$menhgia = $_POST['menhgia'];
$type    =$_POST['type'];

$kiemtra = $mysqli->query("SELECT * FROM `thecao` WHERE `serial` = '".$serial."' AND `mathe` = '".$_POST['mathe']."'")->fetch_assoc();
if(empty($serial) or empty($mathe) or empty($menhgia) or empty($type))
{
    echo'Vui lòng nhập đầy đủ thông tin';
}
else
if($kiemtra['id'] >=1)
{
    echo'Hệ thống tìm thấy thẻ này trong data';
}
else
{
    echo'Thêm thẻ vào hệ thống thành công.';
    $mysqli->query("INSERT INTO `thecao` SET `serial` = '".$serial."', `menhgia` = '".$menhgia."', `type` = '".$_POST['type']."', `mathe` = '".$_POST['mathe']."'  ");
}
