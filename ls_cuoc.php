<?php
include_once('function/config.php');

 $result2 = $mysqli->query("SELECT * FROM `taixiu` ORDER BY id desc limit 1  ");
$kq = mysqli_fetch_assoc($result2);
$data_tx = $mysqli->query("SELECT * FROM `taixiu_cuoc` WHERE `username` = '".$datauser->taikhoan."'   ORDER by id DESC LIMIT 30");
while($row=$data_tx->fetch_assoc())
{
    if ($kq[id]+1==$row[phien]){
    $ketqua='<img src="/lib/loading.gif" style="height: 25px">';
    $status='<img src="/lib/loading.gif" style="height: 25px">';
} else {
    

 if ($row['ketqua']=='tai') {
     $ketqua = '<img src="/lib/img/tx/ico_kq_tai.png" height="20">';
 
}  else  if ($row['ketqua']=='xiu') {
     $ketqua = '<img src="/lib/img/tx/ico_kq_xiu.png" height="20">';
 
} 


  $status = $row['status'];
  

}
    


if ($row['taixiu']=='tai') {
     $tx = '<img src="/lib/img/tx/ico_kq_tai.png" height="20">';
 
}else if ($row['taixiu']=='xiu') {
     $tx = '<img src="/lib/img/tx/ico_kq_xiu.png" height="20">';
 
} 

echo'<tr>
   <td>'.$row['phien'].'</td>
   <td><span style="white-space: nowrap;">'.$row['time'].'</span></td>
   <td>'.$tx.'</td>';
echo'   <td>'.$ketqua.'</td>';

   echo'<td>'.format_cash($row['money']).'</td>';
   if ($kq[id]+1!=$row[phien]){
       
   echo' <td>'.format_cash($row['nhantien']).'</td>';
   } else {
       echo'<td><img src="/lib/loading.gif" style="height: 25px"></td>';

   }
if ($kq[id]+1!=$row[phien]){

if ($row['status'] == 'Thắng') {
echo'    <td><span class="badge badge-success">'.$status.'</span></td>';
} else {
 echo'    <td><span class="badge badge-danger">'.$status.'</span></td>';
}
} else {
echo'<td>'.$status.'</td>'; 
}
echo'<td>'.format_cash($row['hoantien']).'</td>'; 
echo'
   </tr>';
}
?>
 