 
    <?php
include_once('function/config.php');

$data_tx = $mysqli->query("SELECT * FROM `taixiu`   ORDER by id DESC LIMIT 1");
$tx=$data_tx->fetch_assoc();

if ($tx[time]+60-time()<=0){

$r1 = rand(1,6);
$r2 = rand(1,6);
$r3 = rand(1,6);
$xxx=$r1+$r2+$r3;

if  ($xxx % 2 !=0) {
    $chanle='le';
} else {
        $chanle='chan';

}
if ($xxx<11) {
$hero='xiu';

} else {
$hero='tai';

}

$pm = $tx['id']+1;

//Taì xỉu

$q=mysqli_query($mysqli,"SELECT * FROM `taixiu_cuoc` WHERE `taixiu`='".$hero."' AND `phien` ='$pm' AND `status` !='Hoàn' ORDER BY `id` ");
while($post=mysqli_fetch_assoc($q)) {
        $sodu = $datauser->xu + ($post['money']*2*99/100);

    $mysqli->query("UPDATE `nguoichoi` SET `xu`=`xu`+'".($post['money']*2*99/100)."' WHERE `taikhoan`='".$post['username']."' ");
        $mysqli->query("UPDATE `taixiu_cuoc` SET `ketqua`='".$hero."',`sodu`= '{$sodu}', `status`='Thắng',  `nhantien` = '".($post['money']*2*99/100)."' WHERE `phien` ='$pm' AND `username`='".$post['username']."'  AND `status` !='Hoàn' ");
       
}
$q=mysqli_query($mysqli,"SELECT * FROM `taixiu_cuoc` WHERE `taixiu`!='".$hero."' AND `phien` ='$pm' AND `status` !='Hoàn' ORDER BY `id` ");
while($post=mysqli_fetch_assoc($q)) {

        $mysqli->query("UPDATE `taixiu_cuoc` SET `ketqua`='".$hero."', `status`='Thua',  `nhantien` = '0' WHERE `phien` ='$pm' AND `username`='".$post['username']."'  AND `status` !='Hoàn' ");
       
}
$q=mysqli_query($mysqli,"SELECT * FROM `taixiu_cuoc` WHERE `phien` ='$pm' AND `status` ='Hoàn' ORDER BY `id` ");
while($post=mysqli_fetch_assoc($q)) {

        $mysqli->query("UPDATE `taixiu_cuoc` SET `ketqua`='".$hero."'  WHERE `phien` ='$pm' AND `username`='".$post['username']."'  AND `status` ='Hoàn' ");
       
}


$mysqli->query("INSERT INTO taixiu SET `ketqua`= '".$hero."', `1`='".$r1."',`2`='".$r2."',`3`='".$r3."',`chanle`= '".$chanle."',`time`='".time()."' ,`createdate`= now() ");





    
}
$phienphien = $tx['id']+1;

	$checktientai = $mysqli->query("SELECT * FROM `taixiu_cuoc` WHERE `taixiu`='tai' AND `phien` = '$phienphien' AND `status`!='Hoàn' ORDER BY id ");
	$tongtientai = 0;
	$i=0;
		while ($listtientai = mysqli_fetch_array($checktientai)) 
			{
			    $tongtientai = $tongtientai + $listtientai['money'];
			    $i++;
}
	$checktienxiu = $mysqli->query("SELECT * FROM `taixiu_cuoc` WHERE `taixiu`='xiu' AND `phien` = '$phienphien'  AND `status`!='Hoàn' ORDER BY id ");
	$tongtienxiu = 0;
	$i2=0;
		while ($listtienxiu = mysqli_fetch_array($checktienxiu)) 
			{
			    $tongtienxiu = $tongtienxiu + $listtienxiu['money'];
			    $i2++;
}
	$checktientaiuser = $mysqli->query("SELECT * FROM `taixiu_cuoc` WHERE `taixiu`='tai' AND `phien` = '$phienphien' AND `username` ='".$datauser->taikhoan."'  AND `status`!='Hoàn'");
	$listtientaiuser=$checktientaiuser->fetch_assoc();

		$checktienxiuuser = $mysqli->query("SELECT * FROM `taixiu_cuoc` WHERE `taixiu`='xiu' AND `phien` = '$phienphien' AND `username` ='".$datauser->taikhoan."'  AND `status`!='Hoàn'");
	$listtienxiuuser=$checktienxiuuser->fetch_assoc();

	

echo'
    
<div class="button-top">
<img class="clogame zoom-hove" src="../lib/img/btn_close.png">

<a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#lichsu-tx" href="#"><img class="hisgame zoom-hove" src="../lib/img/btn_info.png"></a>
<a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#huongdan-tx" href="#"><img class="guigame zoom-hove" src="../lib/img/btn_help.png"></a>
<a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#soicau-tx" href="#"><img class="allgame zoom-hove" src="../lib/img/btn_thongke.png"></a>
</div> 
<div class="move-here ui-draggable-handle" style="position:absolute;width: 100%;height: 81%;z-index: 1;">
<div class="note_here font_size_18" style="position: absolute;display: flex;width: 100%;height:70%;top: 15%;text-align: center;z-index:50;">';

  if ($tx[time]+60-time()<=5){
      $pm = $tx['id']+1;

    /*   
$q=mysqli_query($mysqli,"SELECT * FROM `taixiu_cuoc` WHERE `taixiu`='tai' AND `phien` ='$pm' AND `status`='xuli' ORDER BY `id` DESC");
while($post=mysqli_fetch_assoc($q)) {

if ($tongtientai > $tongtienxiu) {

    
 
if ($post['money']>$tongtienxiu) {
                  $hoantien = $post['money']-$tongtienxiu;
                 $tiencuoccon = $post['money']-$hoantien;

                       $mysqli->query("UPDATE `taixiu_cuoc` SET  `status`='xuli',`money`= '".($tiencuoccon)."', `hoantien`= '".($hoantien)."', `nhantien` = '".($hoantien)."' WHERE `phien` ='$pm' AND `username`='".$post['username']."' ");
                    
           $mysqli->query("UPDATE `nguoichoi` SET `xu`=`xu`+'".($hoantien)."' WHERE `taikhoan`='".$post['username']."' ");
        
           
                                $tongtientai = $tongtientai -$tiencuoccon;

              } else {
                   $hoantien = $post['money']-$tongtienxiu;
                 $tiencuoccon = $post['money']-$hoantien;

                       $mysqli->query("UPDATE `taixiu_cuoc` SET  `status`='Hoàn',`money`= '".($tiencuoccon)."', `hoantien`= '".($hoantien)."', `nhantien` = '".($hoantien)."' WHERE `phien` ='$pm' AND `username`='".$post['username']."' ");
                    
           $mysqli->query("UPDATE `nguoichoi` SET `xu`=`xu`+'".($hoantien)."' WHERE `taikhoan`='".$post['username']."' ");
      
           
                                $tongtientai = $tongtientai -$tiencuoccon; 
              }


 

} 
  
              
          }
          

 
  */         
        

      
echo'<p class="note_play" style="color: rgb(245, 242, 68); display: block;">Hệ thống ngưng nhận cược</p>';   
}

echo'</div>
</div>
<div class="font_size_25" style="position:absolute;width: 100%;height: 100%;">
<div class="tai-wrap" style="margin-left:11%;">';

if ($tx[time]+60-time()<=50){

echo'<div class="icon"></div>';


} else 

{
 if  ($tx['ketqua']=='tai'){  
echo'<div class="icon kq"></div>';
}
else {
    
echo'<div class="icon"></div>';

}
    
}

echo'<div class="money-tai">';
echo'' .number_format($tongtientai) . '</div>';
    if($id <=0)
    {
        echo'<input type="number" class="input-tai class-input font_size_25 placered" placeholder="" style="z-index: 50;" readonly>';
    } else {
echo'

<a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#dattai-tx" href="#"><input type="number" class="input-tai class-input font_size_25 placered" placeholder="'.number_format($listtientaiuser['money']).'" style="font-size: 10px;z-index: 50;" readonly></a>';
}
echo'
<div class="input-tai class-input input-cuoc-hide">
<div></div>
</div>
<div class="cuoc-tai"></div>
<div class="user-tai">'.$i.'</div>
</div>
<div id="game-taixiu2" class="time">
<div class="clock">';
echo'<div id="lethinhtest"><img src="../lib/img/tx/hetphien.png" style="display: none";></div>';






echo'</div>';
if ($tx[time]+60-time()>50){

$xxx=$tx[1]+$tx[2]+$tx[3];
echo'
<div class="vung ui-draggable ui-draggable-handle" id="vung-taixiu" style="display:none;">';

echo'
</div>
<div class="kq-num"><div class="middle">'.$xxx.'</div></div>';
}

echo'
<div class="roll-play">';



echo'<span>#'.($tx['id']+1).'</span>';

echo'</div>
<div class="clock-big font_size_100 middle">';



if ($tx[time]+60-time()<=50){

    if ($tx[time]+60-time()<=1){
    echo'<img src="https://lethinh2003.me/images/taixiu/roll.gif"  height="120" width="120">';
    } else {

echo''.$tx[time]+60-time().'';
}
} else 


{
       echo '<img src="https://lethinh2003.me/images/taixiu/'.$tx[1].'.png"  height="50" width="50" class="responsive1"> 
    <img src="https://lethinh2003.me/images/taixiu/'.$tx[2].'.png" height="50" width="50" class="responsive2"> 
    <img src="https://lethinh2003.me/images/taixiu/'.$tx[3].'.png" height="50" width="50"  class="responsive3">';



 
}

echo'</div>';
if ($tx[time]+60-time()>50){
    
echo'
<div class="clock-small">'.($tx[time]+10-time()).'</div>';

    


}
echo'</div>';

echo'
<div class="xiu-wrap">';


if ($tx[time]+60-time()<=50){


echo'<div class="icon"></div>';

  

} else 

{
 if  ($tx['ketqua']=='xiu'){  
echo'<div class="icon kq"></div>';
} else {
    
echo'<div class="icon"></div>';

}
    
}echo'<div class="money-xiu">';
echo'' .number_format($tongtienxiu) . '</div>';
    if($id <=0)
    {
  echo' <input type="number" class="input-xiu class-input font_size_25 placered"  placeholder="" style="z-index: 50;" readonly>  ';
    } else {

echo'<a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#datxiu-tx" href="#"><input type="number" class="input-xiu class-input font_size_25 placered"  placeholder="'.number_format($listtienxiuuser['money']).'" style="font-size: 10px;z-index: 50;" readonly></a>';
}
echo'

<div class="input-xiu class-input input-cuoc-hide">
<div>
 
 
 
 
</div>
</div>

 
<div class="cuoc-xiu"></div>
<div class="user-xiu">'.$i2.'</div>
</div>
<div class="his" style="z-index: 49;">';
$data_bc = $mysqli->query("SELECT * FROM `taixiu`   ORDER by id DESC LIMIT 13");
$log = array();
while($phien=$data_bc->fetch_assoc())
{
   $log[] = '<div onmouseover="show_roll_tx($(this))" class="btn-'.$phien['ketqua'].'" data-title="#'.$phien['id'].' ('.$phien['1'].'-'.$phien['2'].'-'.$phien['3'].')'.($phien['1']+$phien['2']+$phien['3']).'-'.($phien['ketqua'] == "xiu" ? 'Xỉu' : 'Tài').'"></div>';
}
$max = count($log);
while($max >= 0)
{
    echo $log[$max];
    $max = $max - 1;
}
if(count($log) <=0)
{
    echo '<div onmouseover="show_roll_tx($(this))" class="btn-xiu" data-title="#a (1-1-1) 3- Xỉu"></div><div onmouseover="show_roll_tx($(this))" class="btn-xiu" data-title="#b (1-1-1) 3- Xỉu"></div><div onmouseover="show_roll_tx($(this))" class="btn-xiu" data-title="#c (1-1-1) 3- Xỉu"></div>';
}
echo'<div id="hien"></div>';

echo'<span class="tooltip_tx font_size_18"></span>


</div>
</div>
<img src="../lib/img/tx/bkgtaixiu.png" width="100%">
';



?>
<script>
var _0xb5c9 = ["offset", "#game-taixiu .his", "show", "left", "px", "css", "data-title", "attr", "html", "#game-taixiu .tooltip_tx", "post", "./user-play", "parse", "error", "tb", "ms", "ajax", "hide", "%", "url(../lib/img/tx/ef.png)", "1", "#khung-tx .effect", "background-image", " url(../lib/img/tx/xx", "xn1", "floor", "_1.png),url(../lib/img/tx/xx", "xn2", "_2.png),url(../lib/img/tx/xx", "xn3", "_3.png)", "xn4", "#game-taixiu .kq-num div", "0", "#game-taixiu .effect", "#game-taixiu .kq-num", "val", "#khung-tx", "\x54\x68\xF4\x6E\x67\x20\x42\xE1\x6F", "\x56\x75\x69\x20\x4C\xF2\x6E\x67\x20\x43\x68\u1ECD\x6E\x20\x54\xE0\x69\x20\x48\x6F\u1EB7\x63\x20\x58\u1EC9\x75", "", "replace", ".mymoney", "#khung-tx input.input-tai", "#khung-tx input.input-xiu", "000000", "000", "data-txt", ".middle", "find", "\x58\xF3\x61", "slice", "tai", "xiu", "check", "stringify", "emit", "focus", "fade", "#khung-tx .group-button", "active", "removeClass", "#khung-tx .input-cuoc-hide", "addClass", "#khung-tx .input-tai.input-cuoc-hide", "select", "#khung-tx .input-xiu.input-cuoc-hide", "src", "../lib/img/tx/btn_nan_0.png", "nantx", "#game-taixiu2", "../lib/img/tx/btn_nan_1.png", "#game-taixiu2 .clock img", "hasClass", "0px", "#vung-taixiu", "dequeue", "kq", "queue", "delay", ".", "color", " .icon", "remove", "first", "#game-taixiu .his div", "xiu-wrap", "<div class=\"btn-xiu\" onmouseover=\"show_roll_tx($(this))\" data-title=\"#", "roll", " (", "-", ")", "-Xỉu\"></div>", "tai-wrap", "<div class=\"btn-tai\" onmouseover=\"show_roll_tx($(this))\" data-title=\"#", "\x2D\x54\xE0\x69\x22\x3E\x3C\x2F\x64\x69\x76\x3E", "before", "#game-taixiu .his span", "tai-xiu", "#chat-swiper p", "<p>", "</p>", "parseHTML", "append", "#chat-swiper div", "length", "height", "eq", "#chat-swiper", "20", "animate", "actigame", ".actigame", ".group-button", ".move-here", "draggable", "#game-taixiu", "position", "width", "top", "click touchstart mousedown touchend", "on", "#khung-tx .tai-wrap .input-tai", "#khung-tx .xiu-wrap .input-xiu", "#khung-tx .clogame", "#khung-tx .wingame", "/game/lichsu_tx", "#khung-tx .hisgame", "/game/huongdan_tx", "#khung-tx .guigame", "#khung-tx .chatgame", "click", "#khung-tx .nangame", "/game/taixiu", "#khung-tx .allgame", "#khung-tx .group-button .button.blue", "#khung-tx .group-button .button.money2", "#khung-tx .group-button .button.money", "#khung-tx .group-button .button.tattay", "#khung-tx .group-button .button.green", "#khung-tx .group-button .button.red", "ready"];

    //Close button
    $(document)[_0xb5c9[141]](function () {
    $(_0xb5c9[116])[_0xb5c9[115]]({
        start: function () {
            $(_0xb5c9[112])[_0xb5c9[61]](_0xb5c9[111]);
            $(this)[_0xb5c9[63]](_0xb5c9[111])
        },
        cancel: _0xb5c9[113],
        handle: _0xb5c9[114]
    });

    
  


    $(_0xb5c9[124])[_0xb5c9[121]](_0xb5c9[120], function () {
        if (check_click($(this)) == true) {
            $(_0xb5c9[116])[_0xb5c9[17]](_0xb5c9[58], {}, 500)
        }
    });


})

 function soicau()
{
    $.ajax(
        {
            url : '/f5-reloadd.php',
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}

</script>


 