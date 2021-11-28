<?php
include_once('function/config.php');


$data_rut = $mysqli->query("SELECT * FROM `lichsu_chuyentien` WHERE `taikhoan` = '".$datauser->taikhoan."'   ORDER by id DESC");
while($row=$data_rut->fetch_assoc())
{
    echo'<tr>';
   
echo'<td>'.$row['thoigian'].'</td>'; 

echo'<td>'.$row['noidung'].'</td>'; 



   echo'</tr>';
}
?>
 