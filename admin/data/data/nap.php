<?PHP

$id = $_POST['id'];
$xu = $_POST['xu'];
$t  = $_POST['type'];

$us = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$id."'")->fetch_assoc();
if($us['id'] <=0)
{
    echo'Không tồn tại id này.';
}
else

if($t == true)
{
    $u = new users($id);
    $u->upxu($xu);
    $mysqli->query("INSERT INTO `lichsu` SET `uid` = '".$id."', `thoigian` = '".$thoigian."', `noidung` = 'nạp ".$xu." XU', `admin` = '".$admin['taikhoan']."' ");
    $sotien = round($xu/1000);
    $u->upthongtin('diem',round($u->thongtin->diem)+$sotien);
    $u->upthongtin('nap',round($u->thongtin->diem)+$xu);
    echo'Nạp cho người chơi '.$datauser->taikhoan.' '.$xu.' xu ';
}
else
if($t == false)
{
    $u = new users($id);
    $u->upxu($xu);
    if($xu >=1)
    {
    $mysqli->query("INSERT INTO `lichsu` SET `uid` = '".$id."', `thoigian` = '".$thoigian."', `noidung` = 'Nhận lại ".$xu." XU', `admin` = '".$admin['taikhoan']."' ");
    }
    echo'hoàn lại '.$datauser->taikhoan.' '.$xu.' xu ';
}