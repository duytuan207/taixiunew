<?PHP

$taikhoan = $_POST['taikhoan'];
$matkhau  = $_POST['matkhau'];
$check    = $mysqli->query("SELECT * FROM `admin` WHERE `taikhoan` = '".$taikhoan."'")->fetch_assoc();
if($check['id'] >=1)
{
    echo 'Tài khoản đã tồn tại';
}
else
if(strlen($taikhoan) <=5)
{
    echo 'Tài khoản phải lớn hơn 5 kí tự';
}
else
if(strlen($matkhau) <=5)
{
    echo 'Mật khẩu phải lớn hơn 5 kí tự.';
}
else
{
    $mysqli->query("INSERT INTO `admin` SET `taikhoan` = '".$taikhoan."', `matkhau` = '".$matkhau."'");
    echo 'Tạo admin thành công.';
}