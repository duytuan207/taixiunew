<?php
include_once('function/config.php');
if(isset($_POST['btnAdmintx'])){
        $tx1 = ($_POST['xx1']);
        $tx2 = ($_POST['xx2']);
        $tx3 = ($_POST['xx3']);
        $phien = ($_POST['phien']);
        $result = $mysqli->query("SELECT * FROM `taixiu`   ORDER by id DESC LIMIT 1");
$kq=$result->fetch_assoc();


if(empty($phien)) {
        $phien=$kq['id']+1;
    }



 if($datauser->level!='admin')
    {

        echo '<script type="text/javascript">swal("Thất Bại", "Lỗi hệ thống", "error");</script>';
    } else if ($tx1>6 || $tx1<1) {
               echo '<script type="text/javascript">swal("Thất Bại", "Lỗi hệ thống", "error");</script>';
 
    } else if ($tx2>6 || $tx2<1) {
               echo '<script type="text/javascript">swal("Thất Bại", "Lỗi hệ thống", "error");</script>';
 
    } else if ($tx3>6 || $tx3<1) {
               echo '<script type="text/javascript">swal("Thất Bại", "Lỗi hệ thống", "error");</script>';
 
    } else if ($phien<$kq['id']+1) {
                      echo '<script type="text/javascript">swal("Thất Bại", "Lỗi hệ thống", "error");</script>';
 
    }
    else
    {
        $mysqli->query("INSERT INTO taixiu_admin SET `1`= '$tx1', `2` = '$tx2', `3` = '$tx3', `phien` = '$phien' ");
        
       
        die('<script type="text/javascript">swal("Thành Công","Thêm thành công!","");;</script>');
        
    }
}



?>