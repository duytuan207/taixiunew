<?php
include_once('function/config.php');


$data_rut = $mysqli->query("SELECT * FROM `lichsu_ruttien` WHERE `username` = '".$datauser->taikhoan."'   ORDER by id DESC");
while($row=$data_rut->fetch_assoc())
{
    echo'<tr>';
   
echo'<td>'.$row['thoigian'].'</td>'; 
echo'<td>'.format_cash($row['sotien']).'</td>'; 
echo'<td>'.format_cash($row['thucnhan']).'</td>'; 
echo'<td>'.$row['noidung'].'</td>'; 
echo'<td>'.$row['status'].'</td>'; 


   echo'</tr>';
}
?>
 