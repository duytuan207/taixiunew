<?PHP

$ketqua = $_POST['ketqua'];
$an     = $_POST['win'];
$data   = $_POST['thoigian'];

$ktra2 = $mysqli->query("SELECT * FROM `xoso` WHERE `ngay` = '".$data."' AND `ketqua` <= '0'");

$allthang = 0;
$allthua  = 0;

while($ktra = $ktra2->fetch_assoc())
{
    if($ktra['ketqua'] <=0)
    {
        if($ktra['so'] == $ketqua)
        {
            /*Win*/
            $v = new users($ktra['uid']);
            $v->upxu($ktra['xu']*$an);
            $mysqli->query("UPDATE `xoso` SET `ketqua` = '".$ketqua."', `xuwin` = '".($ktra['xu']*$an)."' WHERE `id` = '".$ktra['id']."'");
            $allthang+=1;
        }
        else
        {
            /*Lose*/
            $mysqli->query("UPDATE `xoso` SET `ketqua` = '".$ketqua."', `xuwin` = '0' WHERE `id` = '".$ktra['id']."'");
            $allthua+=1;
        }
    }
}

echo'Đã trao cho tổng '.($allthang+$allthua).' dữ liệu, trong đó có '.$allthang.' dữ liệu thắng và '.$allthua.' dữ liệu thua. ';