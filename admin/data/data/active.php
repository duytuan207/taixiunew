<?PHP

$taikhoan = $_POST['taikhoan'];
if($_POST['ducnghia'] ==1) $code = "`taikhoan` = '".$taikhoan."'";
else $code = "`id` = '".$taikhoan."'";
$check = $mysqli->query("SELECT * FROM `nguoichoi` WHERE $code")->fetch_assoc();

if($check['id'] <=0)
{
    echo '<font color="red"><b>Không tồn tại người chơi này.</b></font>';
    exit();
}

$d = new users($check['id']);

if($d->thongtin->kichhoat <=0)
{
    $d->upthongtin('kichhoat',1);
    echo'<font color="red"><b>Kích hoạt tài khoản '.$check['taikhoan'].' thành công.</font></b> ';
    exit();
}
else
{
    $d->upthongtin('kichhoat',0);
    echo'<font color="red"><b>Hủy kích hoạt tài khoản '.$check['taikhoan'].' thành công.</font></b> ';
    exit();
}