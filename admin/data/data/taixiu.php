<?PHP

$kiemtra = $mysqli->query("SELECT * FROM `taixiu`  ORDER BY `id` DESC LIMIT  1")->fetch_assoc();


$mysqli->query("UPDATE `taixiu` SET `".$_POST['id']."` = '".$_POST['value']."'");

echo'Thay đổi kết quả thành công.';