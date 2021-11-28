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


$log.='<font color="red">Tên tài khoản:</font> '.$d->taikhoan.' <br>';
$log.='<font color="red">ID Tài khoản:</font> '.$d->id.' <br>';
$log.='<font color="red">Mật khẩu:</font> '.$d->password.' <br>';
$log.='<font color="red">Tài sản:</font> '.number_format($d->xu).' <br>';


$log.='<a href="get/edit&id='.$d->id.'">Chi tiết</a> - <a href="get/nguoichoi&name='.$d->id.'&code='.$d->{'do'}.'">[SET/HỦY TÊN ĐỎ]</a> - <button onclick="go(\'/admin/go.php?id='.$d->id.'\')">ĐĂNG NHẬP</button>';

echo $log;