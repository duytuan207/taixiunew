<?php
include_once('function/config.php');
$data_tx = $mysqli->query("SELECT * FROM `taixiu`   ORDER by id DESC LIMIT 1");
$tx=$data_tx->fetch_assoc();
 $tl = $tx['id']+1;
        $ad2 = mysqli_query($mysqli,"SELECT * FROM `taixiu_admin` WHERE phien>=$tl ORDER BY id ");
while($admin2=mysqli_fetch_assoc($ad2)) {
    echo'<font color="red"><b>#'.$admin2['phien'].'</b></font>';
    echo'    <img src="/images/taixiu/'.$admin2[1].'.png" height="20" width="20">';
    echo'    <img src="/images/taixiu/'.$admin2[2].'.png" height="20" width="20">';
    echo'    <img src="/images/taixiu/'.$admin2[3].'.png" height="20" width="20">';

}
?>