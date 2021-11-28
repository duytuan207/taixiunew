
    <?php
include_once('function/config.php');
 
$log_chat = $mysqli->query("SELECT * FROM chat ORDER by id DESC LIMIT $start, $kmess");
while($a = $log_chat->fetch_assoc())
{
    $check_u = $mysqli->query("SELECT * FROM nguoichoi WHERE `taikhoan` = '".$a['username']."'");
$b = $check_u->fetch_assoc(); 

if ($datauser->taikhoan == $a['username']) {
echo'<div class="text-right"><p style="display: inline-block; padding: 5px 10px; border-radius: 10px; margin-bottom: 3px; margin-top: 3px" class="bg bg-primary text-white"> '.$a['noidung'].' </p></div>';    
} else {
    echo'<div class="text-left"><b><img src="/lib/avatar/'.$b['avatar'].'.png" alt="avatar" class="img-circle" width="40" /> '.$a['username'].'</b>: '.$a['noidung'].'</div></br>';
}
}
?>