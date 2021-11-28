<?PHP

$taikhoan = $_POST['taikhoan'];
$matkhau  = $_POST['matkhau'];
$check    = $mysqli->query("SELECT * FROM `admin` WHERE `taikhoan` = '".$taikhoan."' LIMIT 1")->fetch_assoc();
if(empty($matkhau))
{
    echo'Vui lòng nhập mật khẩu';
}
else
if(empty($taikhoan))
{
    echo 'Vui lòng nhập tài khoản';
}
else
if($check['id'] <=0)
{
    echo 'không thể tìm thấy tài khoản này.';
}
else
if($check['matkhau'] != $matkhau)
{
    echo 'Mật khẩu bạn nhập chưa chính xác vui lòng thử lại.';
}
else
{
    $_SESSION['admin'] = $check['id'];
    echo 1;
}
