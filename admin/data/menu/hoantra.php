<?PHP

$count = $mysqli->query("SELECT * FROM `cuoc_taixiu` WHERE `code` <='0' AND `time` < '".time()."' ")->num_rows;

if($count <=0)
{
    echo'Không có phiên bị kẹt, không cần hoàn trả';
    exit();
}

$list_d = $mysqli->query("SELECT * FROM `cuoc_taixiu` WHERE `code` <='0' AND `time` < '".time()."'");
while($cuoc = $list_d->fetch_assoc())
{
    $ktratiep = $mysqli->query("SELECT * FROM `cuoc_taixiu` WHERE `az` = '".$cuoc['az']."'")->fetch_assoc();
    if($ktratiep['code'] <=0)
    {
    $c = new users($cuoc['uid']);
    $x = $c->xu + $cuoc['xucuoc'];
    $mysqli->query("UPDATE `cuoc_taixiu` SET   `sau` = '".$x."', `xucuoc` =   '0', `hoantra` = '".$cuoc['xucuoc']."', `code` = '2' WHERE `az` = '".$cuoc['az']."'  ");
    $c->upxu($cuoc['xucuoc']);
    echo 'Hoàn trả cho '.$c->taikhoan.' : '.$cuoc['xucuoc'].' xu. ';
    }
}