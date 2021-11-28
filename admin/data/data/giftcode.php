<?PHP

$soluong = $_POST['soluong'];
$xu      = $_POST['xu'];
$i       = 0;

while($i < $soluong)
{
    $ma = rand(1000000000,9999999999);
    $mysqli->query("INSERT INTO `giftcode` SET `text` = '".$ma."', `xu` = '".$xu."', `max` = '".$_POST['max']."' ");
    $i++;
}

echo'Đã tạo thành công '.$i.' giftcode.';