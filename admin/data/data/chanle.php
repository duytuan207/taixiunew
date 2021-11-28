<?PHP

$kiemtra = $mysqli->query("SELECT * FROM `taixiu`  ORDER BY `id` DESC LIMIT  1")->fetch_assoc();


$mysqli->query("UPDATE `taixiu` SET `c1` = '".$_POST['c1']."', `c2` = '".$_POST['c2']."', `c3` = '".$_POST['c3']."', `c4` = '".$_POST['c4']."', `c5` = '".$_POST['c5']."'");

echo'Thay đổi kết quả thành công.';