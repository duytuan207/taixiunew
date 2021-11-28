<?PHP

include_once('config.php');



if($_POST['user_check'] == true)
{
    $d->tien = $tien;
    if($id <=0)
    {
        $d->error =0;
        $d->uid = false;
        $d->tai = 0;
        $d->xiu =0;
        $d->money = 0;
    }
    else
    {

        $d->money = $tien <=0 ? $datauser->xu : $datauser->xu;
        $d->moneyket = $tien <=0 ? $datauser->ketsat : $datauser->ketsat;
       
        
       
    }
    echo json_encode($d);
}
?>
