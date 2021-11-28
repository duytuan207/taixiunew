<?PHP

$cu  = $_POST['cu'];
$moi = $_POST['moi'];
$lai = $_POST['lai'];

if(empty($cu) or empty($moi) or empty($lai))
{
    echo 'Vui lòng nhập đầy đủ thông tin';
}
else
if(strlen($moi) <=5)
{
    echo 'Mật khẩu phải lớn hơn 5 kí tự';
}
else
if($admin['matkhau'] != $cu)
{
    echo 'Mật khẩu cũ bạn nhập chưa chính xác';
}
else
if($moi != $lai)
{
    echo 'Mật khẩu nhập lại không chính xác.';
}
else
{
    echo 'Đổi mật khẩu thành công';
    $mysqli->query("UPDATE `admin` SET `matkhau` = '".$moi."' WHERE `id` = '".$admin['id']."'");
}