<?PHP
$id  = $_POST['id'];
$tk  = $_POST['taikhoan'];
$xu  = $_POST['xu'];
$data= $_POST['array'];

$kiemtra = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$_POST['id']."'")->fetch_assoc();

if($kiemtra['id'] <=0)
{
    echo'Không tồn tại người chơi này, vui lòng quay lại.';
    exit();
}

$u = new users($kiemtra['id']);


$mysqli->query("UPDATE `nguoichoi` SET `xu` = '".$xu."', `taikhoan` = '".$tk."' WHERE `id` = '".$id."'");

foreach($data as $id => $value)
{
    $u->upthongtin($id,$value);
}
echo'Chỉnh sửa thành công.';