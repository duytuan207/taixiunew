
<?PHP


include_once('function/head.php');
if($site['site_baotri']=='ON' && $datauser->level!='admin')
{
   echo '<script type="text/javascript">swal("Thất Bại", "'.$site['noidungbaotri'].'", "error");</script>';
    exit();
}
?>


<div class="col-md-12" >
<section class="panel">

<div class="body-game" >
    <center>
        <?php
        if($datauser->id<=0) { 
        ?>
  <a onclick="opendangnhap()"><img width="20%" src="https://i.imgur.com/6OkQtAV.png"></a>
       <a onclick="opendangky()" href="#"><img width="20%" src="https://i.imgur.com/Baf2w78.png"></a>
<?php } else { ?>

    <div class="avatar" >
    <a onclick="openprofile()"><img src="/lib/avatar/<?=$datauser->avatar?>.png" alt="Avatar" class="img-circle" style="float: left;
    margin-left: 0%;
    width: 50px;
    margin-top: 0%;"></a>
</div>
<span class="name" style="float: left;margin-left: -16%;font-size:8px"><font color="white"><b><?=$datauser->taikhoan?></b></font></span></br>
<div class="money">
<span class="mymoney"><font color="yellow"><b><?=format_cash($datauser->xu)?></b></font></span> <img class="chatgame" src="/images/coin.png" width="20"> <a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#nap_the" href="#"><img src="/images/add.png" style="width:8%;"></a>
</div>

</br>


<div class="menu-right">
    
  
    <a onclick="thoatgame();">
<img src="/images/back-btn.png" style="
    width: 27px;
"></a>
    
    
<a onclick="openhomthu()"><img src="/images/email-btn.png" style="
    width: 27px;
"></a>   
 
    
    
<a onclick="opengiftcode()"><img src="/images/giftode-btn.png" style="
    width: 27px;
"></a>


</div>




<?php }?>
</center>
   </br>
   </br>
   </br>
   


<div class="col-sm-2 col-xs-4"><a href="#" onclick="Load_Game(1,'game-taixiu')"><img width="50%" class="zoom-hove" style="border-radius: 10px;
    border: 1px solid #cecece !important;" src="https://i.imgur.com/4g9UfcK.png"></a></div>
<!--<div class="col-sm-2 col-xs-4"><a href="#" onclick="Load_Game(2,'khung_chanle')"><img width="50%" class="zoom-hove" style="border-radius: 10px;
    border: 1px solid #cecece !important;" src="https://i.imgur.com/vrVaE0j.png"></a></div>-->
<br><br><br><br><br><br>
 </br>
   </br>
   </br>

<center>
   
 <a onclick="opennapthe()"><button class="Btn zoom-hove" type="submit" style="
    background-image: url(https://i.imgur.com/FgSRpsA.png);
    color: white;
">Nạp thẻ</button></a>
<a onclick="openruttien()"><button class="Btn zoom-hove" type="submit" style="
    background-image: url(https://i.imgur.com/FgSRpsA.png);
    color: white;
">Rút tiền</button></a>
<a onclick="openchuyentien()"><button class="Btn zoom-hove" type="submit" style="
    background-image: url(https://i.imgur.com/FgSRpsA.png);
    color: white;
">Chuyển khoản</button></a>

</br>
<div class="bot-menu">


<a onclick="openketsat()"><img src="/images/img-ketsat.png" style="
    /* margin-left: -4%; */
    width: 50px;
"></a>
<a onclick="opennapthe()"><img src="/images/img-naprut.png" style="
       width: 47px;
    margin-top: -18px;
"></a>
<a onclick="openhotro()"><img src="/images/img-support.png" style="
       width: 37px;
    margin-top: 0px;
"></a>
<a onclick="openketsat()"><img src="/images/img-ketsat.png" style="
    margin-left: -77%;
    width: 50px;
"></a>
<a onclick="opennapthe()"><img src="/images/img-naprut.png" style="
       width: 47px;
    margin-top: -18px;
"></a>
<a onclick="openhotro()"><img src="/images/img-support.png" style="
       width: 37px;
    margin-top: 0px;
"></a>


</div>


</center>
</div>

</section>

</div>
<!--
<div class="row">

<div class="col-md-6">
<section class="panel">
<header class="panel-heading">

<h2 class="panel-title">Box Chat</h2>
</header>
<div class="panel-body">
 <div class="form-group">
     <div class="input-group input-group-sm"><input class="inputThai" type="text" id="name_chat" onkeydown="if (event.keyCode == 13) chat()" placeholder="Nhập nội dung chat" autocomplete="off" style="height: 40px; font-weight: normal;">
                <span><button onclick="chat()" id="chatBtn" type="button" class="btn btn-primary" style="width:100px;background-color: #ffff0047;height: 34px;border: 1px solid #ffc34875;border-radius: 5px;margin-left:3px; height: 40px;">Chat</button></span></div>
         
                    </div>
                    <hr>
                  
                    <div style="height: 250px;overflow: auto;" >  <div id="phongchat2"></div></div>
</div>
</section>
</div>
</div>
-->
</font>


<?PHP


include_once('function/foot.php');

?>



           
          