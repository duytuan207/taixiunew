<?PHP

        if(isset($_GET['reset']))
        {
            $mysqli->query("UPDATE `nguoichoi` SET `win` = '0'");
            echo 'reset thanh cong <br>';
        }


echo'Ban co chac chan muon reset k ? <a href="get/reset&reset">[DONG Y]</a>';