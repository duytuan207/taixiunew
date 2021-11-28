<style>

    .khung-tx .group-button .button.tai {
    height: 100%;
    width: 23%;
    background-image: url(../lib/img/datcuoc.png);
}
    .khung-tx .group-button .button.xiu {
    height: 100%;
    width: 23%;
    background-image: url(../lib/img/chontien.png);
}
    
  .dragon {
        animation: spin 3s linear infinite;
    }

</style>
<?php
include_once('/function/config.php');
$_SESSION['nantx']=0;


$data_tx = $mysqli->query("SELECT * FROM `taixiu`   ORDER by id DESC LIMIT 1");
$tx=$data_tx->fetch_assoc();


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

	



?>
<style>

        .thongbao{
            width: 90%;
            margin-left: auto;
    margin-right: auto;
    margin-top: 32%;;
    padding: 7px 15px;
 text-align: center;
         background: rgba(0, 0, 0, 0.75);

        text-shadow: 0 0 3px #000;
        border-radius: 40px;
color: rgb(245, 242, 68);

transition: 0.5s;
        opacity: 0;
        }
        .khung-tx .panelgame {
margin-top: -34%;
    margin-left: -110px;
}


.class-input{border:0 solid #fff;background:rgba(255,255,255,0);text-align:center}@media(min-width:0px) and (max-width:480px){.khung-tx{width:100%!important}.chat-wrap{width:100%!important;max-width:250px!important;display:none!important}.khung-tx .font_size_35{font-size:5.5vw!important;font-weight:700}.khung-tx .font_size_25{font-size:4.2vw!important;font-weight:700}.khung-tx .font_size_18{font-size:3.7vw!important;font-weight:700}.khung-tx .font_size_100{font-size:18.5vw!important;font-weight:700}}#game-taixiu{z-index:10000000000;height:0;width:100%;font-weight:700}#game-taixiu #khung-tx{position:relative;margin:auto}.khung-tx{width:55%;display:block;margin-bottom:11%;max-width:600px;position:relative;float:left;margin-right:-3%}.khung-tx .button-top{right:0;top:0;z-index:2;width:7.5%;position:absolute;cursor:pointer}.khung-tx .button-top img{width:100%;cursor:pointer;z-index:100;position:absolute}.khung-tx .money-xiu,.khung-tx .money-tai{color:#ff0;text-shadow:0 0 8px black,0 0 8px #000;text-align:center}.khung-tx .cuoc-xiu,.khung-tx .cuoc-tai{color:#FF9800;text-shadow:0 0 8px black,0 0 8px #000;text-align:center;font-weight:600;height:18%;margin-top:36%}.khung-tx .user-xiu,.khung-tx .user-tai{color:#fff!important;text-shadow:0 0 8px black,0 0 8px #000;text-align:center;height:20%;margin-left:0;width:100%}.khung-tx .input-xiu,.khung-tx .input-tai{color:#ff0!important;font-weight:600;position:absolute;text-align:center;height:20%;margin-top:.5%;width:23%;padding:0;z-index:49;cursor:pointer;outline:unset!important}.khung-tx .input-cuoc-hide div{height:60%;width:97%;margin-top:8%;border-radius:25px;border:2px solid rgba(255,255,255,0)}.khung-tx .input-cuoc-hide.active div{animation:changesolid .35s infinite alternate;-webkit-animation:changesolid .35s infinite alternate;-moz-animation:changesolid .35s infinite alternate;-ms-animation:changesolid .35s infinite alternate;-o-animation:changesolid .35s infinite alternate}.placered::placeholder{color:red!important}.placered::-ms-placeholder{color:red!important}.placered::-moz-placeholder{color:red!important}.placered::-webkit-input-placeholder{color:red!important}.placered::-o-input-placeholder{color:red!important}.placewhite::placeholder{color:rgba(255,255,255,0.8)!important}.placewhite::-ms-placeholder{color:rgba(255,255,255,0.8)!important}.placewhite::-moz-placeholder{color:rgba(255,255,255,0.8)!important}.placewhite::-webkit-input-placeholder{color:rgba(255,255,255,0.8)!important}.placewhite::-o-input-placeholder{color:rgba(255,255,255,0.8)!important}.khung-tx .clock-big{color:#fff;text-shadow:0 0 8px black,0 0 8px #000;font-weight:800;position:absolute;top:40%;left:50%}.khung-tx .btn-xiu,.khung-tx .btn-tai{width:6.5%;float:left;height:100%;border:0;background:url(../lib/img/tx/ico_kq_xiu.png) 0 0 / cover no-repeat;margin:0 .5%;cursor:pointer}.khung-tx .btn-tai{background-image:url(../lib/img/tx/ico_kq_tai.png)}.khung-tx .his{float:left;width:57%;text-align:center;margin-left:22.7%;margin-top:.0%;height:14.8%;margin-bottom:-1%;padding:2.05% 0}.khung-tx .group-button{float:left;width:100%;text-align:center;height:auto;margin-top:1.2%;display:none;-webkit-touch-callout:none!important;-webkit-user-select:none!important;-khtml-user-select:none!important;-moz-user-select:none!important;-ms-user-select:none!important;user-select:none!important}.khung-tx .group-button .button{cursor:pointer;width:15.6%;height:85%;float:left;margin:.25% .5%;background:url(../lib/web/btn/2.png) 0 0 / cover no-repeat;position:relative;background-size:100% 100%}.khung-tx .group-button .button.blue{height:100%;width:23%;margin-left:16%;background-image:url(../lib/img/btn-red.png)}.khung-tx .group-button .button.green{height:100%;width:23%;background-image:url(../lib/web/btn/green.png)}.khung-tx .group-button .button.red{height:100%;width:23%;background-image:url(../lib/web/btn/red.png)}.khung-tx .group-button .middle{position:absolute;white-space:nowrap;color:#fff;text-shadow:0 0 8px black,0 0 8px #000}.khung-tx .group-button .middle:after{content:attr(data-txt)}.khung-tx .his div:hover ~ :nth-child(14){-webkit-animation:none!important;-moz-animation:none!important;-o-animation:none!important;animation:none!important}.khung-tx .his div:hover{animation:updown .5s infinite alternate;-webkit-animation:updown .5s infinite alternate;-moz-animation:updown .5s infinite alternate;-ms-animation:updown .5s infinite alternate;-o-animation:updown .5s infinite alternate}.khung-tx .his div:nth-child(14){animation:updown .5s infinite alternate;-webkit-animation:updown .5s infinite alternate;-moz-animation:updown .5s infinite alternate;-ms-animation:updown .5s infinite alternate;-o-animation:updown .5s infinite alternate}.btn-cuocMoney{outline:0;padding:.5%;color:#333;border-radius:5px;background-color:#fff;border-color:#ccc;box-shadow:0 0 5px 3px #000;border:0 solid #000;font-weight:900;cursor:pointer}.btn-cuocMoney:hover,.btn-cuocMoney:focus{background-color:#673AB7!important;color:#fff!important}.btn-tattay{outline:0;transform:scale(0.95);padding:.5%;color:#fff;text-shadow:0 0 3px black,0 0 3px #000;border-radius:5px;background-color:#f55541;border-color:#ccc;box-shadow:0 0 5px 3px #000;border:0 solid #000;font-weight:900;cursor:pointer}.btn-cancel{outline:0;transform:scale(0.95);padding:.5%;color:#fff;text-shadow:0 0 3px black,0 0 3px #000;border-radius:5px;background-color:#f0ad4e;border-color:#ccc;box-shadow:0 0 5px 3px #000;border:0 solid #000;font-weight:900;cursor:pointer}.btn-agree{outline:0;transform:scale(0.95);padding:.5%;color:#fff;text-shadow:0 0 3px black,0 0 3px #000;border-radius:5px;background-color:#00a65a;border-color:#ccc;box-shadow:0 0 5px 3px #000,0 0 5px 3px #000;border:0 solid #000;font-weight:900;cursor:pointer}.khung-tx .tai-wrap,.khung-tx .xiu-wrap{width:23%;height:60%;float:left;margin-top:5%}.khung-tx .tai-wrap .money-tai,.khung-tx .xiu-wrap .money-xiu{height:20%;margin-top:11%;width:100%}.khung-tx .tai-wrap .icon,.khung-tx .xiu-wrap .icon{background:url(../lib/img/tx/tai_default.png) 0 0 /cover no-repeat;width:60%;height:28%;margin-left:20%;
animation: zoomout 0.2s ease-in-out infinite alternate;}.khung-tx .xiu-wrap .icon{background-image:url(../lib/img/tx/xiu_default.png);
animation: zoomout 0.2s ease-in-out infinite alternate;}.khung-tx .tai-wrap .icon.kq{background-image:url(../lib/img/tx/tai_on.png)!important;background-size:100% auto;background-repeat:no-repeat;-webkit-animation:zoomout .5s infinite alternate;-moz-animation:zoomout .5s infinite alternate;animation:zoomout .5s infinite alternate}.khung-tx .xiu-wrap .icon.kq{background-image:url(../lib/img/tx/xiu_on.png)!important;background-size:100% auto;background-repeat:no-repeat;-webkit-animation:zoomout .5s infinite alternate;-moz-animation:zoomout .5s infinite alternate;animation:zoomout .5s infinite alternate}.khung-tx #vung-taixiu{margin-top:0;margin-left:0;position:absolute;width:100%;height:100%;background:url(../lib/img/tx/bat.png) 0 0 / cover no-repeat;border:0 solid #fff;z-index:51;cursor:pointer;display:none}.khung-tx .clock,.khung-tx .clock img{position:absolute;width:100%;height:100%}.khung-tx #game-taixiu2{width:32%;height:60%;float:left;margin-top:10%;position:relative;background-position:center;background-size:100%}.khung-tx #game-taixiu2.nantx .vung{display:block}.khung-tx #game-taixiu2 #vung-taixiu .vung_number span{display:table-cell;text-align:center;vertical-align:middle}.khung-tx #game-taixiu2 #vung-taixiu .vung_number{display:table;width:30%;height:32%;background:#000;border-radius:50%;color:#fff;margin-top:50%;margin-left:50%;transform:translate(-50%,-50%);-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%)}.khung-tx #game-taixiu2 .kq-num div{position:absolute}.khung-tx #game-taixiu2 .kq-num{position:absolute;height:26%;width:25%;margin-top:15%;margin-left:72%;opacity:1;border:1.5px solid ;border-radius:50%;background:#ff0119;color:#fff}.khung-tx #game-taixiu2 .roll-play{position:absolute;top:-30%;width:100%;height:22%;text-align:center;color:#fff;border-radius:15px;text-shadow:0 0 4px black,0 0 4px black,0 0 4px #000}.khung-tx #game-taixiu2 .clock-small{position:absolute;background:rgba(0,0,0,0.7);top:80%;width:25%;height:22%;left:50%;text-align:center;color:red;-webkit-transform:translateX(-50%);-moz-transform:translateX(-50%);-ms-transform:translateX(-50%);-o-transform:translateX(-50%);transform:translateX(-50%);border-radius:15px}.khung-tx #game-taixiu2.time .vung,.khung-tx #game-taixiu2.time .effect,.khung-tx #game-taixiu2.time .clock-small,.khung-tx #game-taixiu2.time .kq-num{display:block}.khung-tx #game-taixiu2.time .clock-big{display:block}.chat-wrap{width:25%;display:block;max-width:270px;position:relative;float:left}.chat-wrap.off{display:none}.chat-wrap .chat-content{height:72%;overflow:hidden;padding:10% 10% 0;position:relative}.chat-wrap .chat-inner{overflow:hidden;height:100%}.chat-wrap .chat-footer{width:93%;height:14%;margin-top:1%;background:none;font-size:20px;font-weight:600}.chat-wrap .chat-input{width:100%;height:100%;background:none;border:0 solid #fff;padding:0 12%;color:#fff;z-index:49}.chat-wrap .chat-inner p{margin:0;color:#fff;line-height:1.05;cursor:default}.chat-wrap .chat-inner p .u-name{color:#CDDC39;font-weight:400}.khung-tx .effect{background:url(../lib/img/tx/ef.png) 0 0 / cover no-repeat;visibility:visible;z-index:5;height:100%;margin-top:-8%;opacity:1}.khung-tx .his .tooltip_tx{position:absolute;color:#fff;background:rgba(0,0,0,0.6);padding:3px 15px;margin-top:4%;left:12.5%;white-space:nowrap;z-index:49;display:none}.khung-tx .clogame{margin-left:-140%;width:130%}.khung-tx .wingame,.khung-tx .allgame{margin-top:110%;margin-left:-42%}.khung-tx .hisgame{margin-top:230%;margin-left:10%}.khung-tx .guigame{margin-top:365%;margin-left:0}.khung-tx .chatgame{margin-top:511%;margin-left:-90%}.khung-tx .nangame{margin-top:430%;margin-left:-525%}
</style>
<div id="game-taixiu" class="khung_game_show ui-draggable ui-draggable-handle">
<div id="khung-tx">
<div class="khung-tx">
<?php
echo'
    
<div class="button-top">

<img class="clogame zoom-hove" src="../lib/img/btn_close.png">
<img class="nangame zoom-hove" onclick="nangame()" src="../lib/img/tx/btn_nan_0.png">';
if ($datauser->level=='admin') {
    echo'<a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#panel-tx" href="#"><img class="panelgame zoom-hove"  src="https://i.imgur.com/xm2i8J3.png"></a>';

}
echo'


<a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#lichsu-tx" href="#"><img class="hisgame zoom-hove" src="../lib/img/btn_info.png"></a>
<a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#huongdan-tx" href="#"><img class="guigame zoom-hove" src="../lib/img/btn_help.png"></a>
<a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#soicau-tx" href="#"><img class="allgame zoom-hove" src="../lib/img/btn_thongke.png"></a>
</div> 
<div class="move-here ui-draggable-handle" style="position:absolute;width: 100%;height: 81%;z-index: 1;">
<div class="note_here font_size_18" style="position: absolute;display: flex;width: 100%;height:70%;top: 15%;text-align: center;z-index:50;">';

echo'</div><p id="statustxt" class="thongbao"></p>
</div>';

echo'<div class="font_size_25" style="position:absolute;width: 100%;height: 100%;">
<div class="tai-wrap"  style="margin-left:10%;">';



echo'<div class="icon" id="taiicon" style="animation-play-state: paused;"></div>';




echo'<div class="money-tai">';
echo'<p id="sumtai"></p></div>';

    if($id <=0)
    {
        echo'<input type="number" class="input-tai class-input font_size_25 placered" placeholder="" style="z-index: 50;" readonly>';
    } else {
        echo'<form method="post" id="form_tx_t">';

echo'

<input type="number" id="moneytai" name="moneytai" class="input-tai class-input font_size_25 placered" placeholder="" style="font-size: 10px;z-index: 50;">';
}
echo'</form>';
echo'

<div class="cuoc-tai" style="font-size: 10px"></div>
<div class="user-tai">'.$i.'</div>';
    
    
echo'</div>
<div id="game-taixiu2" class="time">
<div class="clock">';

echo'<div id="lethinhtest"><img src="../lib/img/tx/hetphien.png" style="display: none";></div>';
echo'<img class="dragon" id="dragon" src="https://i.imgur.com/GLOjP6c.png" style="animation-play-state: paused;";>';





echo'</div>';

echo'
<div class="vung ui-draggable ui-draggable-handle" id="vung-taixiu" style="display:none;">';

echo'
</div>
<div class="kq-num" id="kq-tx"  style="display:none;"><div class="middle" id="kqq">'.$xxx.'</div></div>';


echo'
<div class="roll-play">';



echo'<span>#'.($tx['id']+1).'</span>';

echo'</div>
<div class="clock-big font_size_100 middle">';
echo'<div class="txx"></div>';





echo'</div>';
echo'<div class="txxx">';


echo'</div>';
echo'</div>';

echo'
<div class="xiu-wrap">';




echo'<div class="icon" id="xiuicon" style="animation-play-state: paused;"></div>';


    
echo'<div class="money-xiu">';
echo'<p id="sumxiu"></p></div>';

    if($id <=0)
    {
  echo' <input type="number" class="input-xiu class-input font_size_25 placered"  placeholder="" style="z-index: 50;" readonly>  ';
    } else {
echo'<form method="post" id="form_tx_x">';

echo'<input type="number" name="moneyxiu" id="moneyxiu"  class="input-xiu class-input font_size_25 placered"  placeholder="" style="font-size: 10px;z-index: 50;" >';
}
echo'</form>';
echo'



 
<div class="cuoc-xiu" style="font-size: 10px"></div>
<div class="user-xiu">'.$i2.'</div>';
    


echo'</div>
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

echo'<span class="tooltip_tx font_size_18"></span>';
echo'


</div>';

echo'
<div class="group-button font_size_25" id="bangcuoc" style="display: none;height: 40%;margin-top: 5%;width: 90%;margin-left: 5%;">
<div class="so_khac" style="width: 100%;height: 35%;">
<div class="button money"><div class="middle" data-txt="100"></div></div>
<div class="button money"><div class="middle" data-txt="500"></div></div>
<div class="button money"><div class="middle" data-txt="1K"></div></div>
<div class="button money"><div class="middle" data-txt="5K"></div></div>
<div class="button money"><div class="middle" data-txt="10K"></div></div>
<div class="button money"><div class="middle" data-txt="50K"></div></div>
<div class="button money"><div class="middle" data-txt="100K"></div></div>
<div class="button money"><div class="middle" data-txt="500K"></div></div>
<div class="button money"><div class="middle" data-txt="1M"></div></div>
<div class="button money"><div class="middle" data-txt="2M"></div></div>
<div class="button money"><div class="middle" data-txt="5M"></div></div>
<div class="button money"><div class="middle" data-txt="10M"></div></div>

<div class="button blue"><div class="middle" data-txt="Đóng"></div></div>';

echo'<div class="button tai"><div class="middle" data-txt="Cược tài" onclick="cuoctai()"></div></div>';
echo'<div class="button xiu"><div class="middle" data-txt="Cược xỉu" onclick="cuocxiu()"></div></div>';

echo'</div>';

echo'

</div>';
echo'</div>
<img src="/images/taixiu/khung.png" width="100%">
';
echo'<div id="hien"></div>';
echo'<div class="load-game"></div>';


?>




</div>
</div>

</div>





<script>
var _0xb5c9 = ["offset", "#game-taixiu .his", "show", "left", "px", "css", "data-title", "attr", "html", "#game-taixiu .tooltip_tx", "post", "./user-play", "parse", "error", "tb", "ms", "ajax", "hide", "%", "url(../lib/img/tx/ef.png)", "1", "#khung-tx .effect", "background-image", " url(../lib/img/tx/xx", "xn1", "floor", "_1.png),url(../lib/img/tx/xx", "xn2", "_2.png),url(../lib/img/tx/xx", "xn3", "_3.png)", "xn4", "#game-taixiu .kq-num div", "0", "#game-taixiu .effect", "#game-taixiu .kq-num", "val", "#khung-tx", "\x54\x68\xF4\x6E\x67\x20\x42\xE1\x6F", "\x56\x75\x69\x20\x4C\xF2\x6E\x67\x20\x43\x68\u1ECD\x6E\x20\x54\xE0\x69\x20\x48\x6F\u1EB7\x63\x20\x58\u1EC9\x75", "", "replace", ".mymoney", "#khung-tx input.input-tai", "#khung-tx input.input-xiu", "000000", "000", "data-txt", ".middle", "find", "\x58\xF3\x61", "slice", "tai", "xiu", "check", "stringify", "emit", "focus", "fade", "#khung-tx .group-button", "active", "removeClass", "#khung-tx .input-cuoc-hide", "addClass", "#khung-tx .input-tai.input-cuoc-hide", "select", "#khung-tx .input-xiu.input-cuoc-hide", "src", "../lib/img/tx/btn_nan_0.png", "nantx", "#game-taixiu2", "../lib/img/tx/btn_nan_1.png", "#game-taixiu2 .clock img", "hasClass", "0px", "#vung-taixiu", "dequeue", "kq", "queue", "delay", ".", "color", " .icon", "remove", "first", "#game-taixiu .his div", "xiu-wrap", "<div class=\"btn-xiu\" onmouseover=\"show_roll_tx($(this))\" data-title=\"#", "roll", " (", "-", ")", "-Xỉu\"></div>", "tai-wrap", "<div class=\"btn-tai\" onmouseover=\"show_roll_tx($(this))\" data-title=\"#", "\x2D\x54\xE0\x69\x22\x3E\x3C\x2F\x64\x69\x76\x3E", "before", "#game-taixiu .his span", "tai-xiu", "#chat-swiper p", "<p>", "</p>", "parseHTML", "append", "#chat-swiper div", "length", "height", "eq", "#chat-swiper", "20", "animate", "actigame", ".actigame", ".group-button", ".move-here", "draggable", "#game-taixiu", "position", "width", "top", "click touchstart mousedown touchend", "on", "#khung-tx .tai-wrap .input-tai", "#khung-tx .xiu-wrap .input-xiu", "#khung-tx .clogame", "#khung-tx .wingame", "/game/lichsu_tx", "#khung-tx .hisgame", "/game/huongdan_tx", "#khung-tx .guigame", "#khung-tx .chatgame", "click", "#khung-tx .nangame", "/game/taixiu", "#khung-tx .allgame", "#khung-tx .group-button .button.blue", "#khung-tx .group-button .button.money2", "#khung-tx .group-button .button.money", "#khung-tx .group-button .button.tattay", "#khung-tx .group-button .button.green", "#khung-tx .group-button .button.red", "ready"];



function show_roll_tx(data) {
    var soicau = data[_0xb5c9[0]]();
    var soicau2 = $(_0xb5c9[1])[_0xb5c9[0]]();
    $(_0xb5c9[9])[_0xb5c9[8]](data[_0xb5c9[7]](_0xb5c9[6]))[_0xb5c9[5]]({
        'margin-left': (soicau[_0xb5c9[3]] - soicau2[_0xb5c9[3]]) + _0xb5c9[4]
    })[_0xb5c9[2]]()
}
function btn_money_tx(_0x9ca2xc) {
    var _0x9ca2x2 = Math[_0xb5c9[25]]($(_0xb5c9[37])[_0xb5c9[36]]());
    if (_0x9ca2x2 == 0) {
        thong_bao(_0xb5c9[38], _0xb5c9[39])
    } else {
        if (_0x9ca2x2 == 1) {
            $(_0xb5c9[43])[_0xb5c9[36]](Math[_0xb5c9[25]](_0x9ca2xc[_0xb5c9[49]](_0xb5c9[48])[_0xb5c9[7]](_0xb5c9[47])[_0xb5c9[41]](/\K/g, _0xb5c9[46])[_0xb5c9[41]](/\M/g, _0xb5c9[45])) + Math[_0xb5c9[25]]($(_0xb5c9[43])[_0xb5c9[36]]()))
        } else {
            if (_0x9ca2x2 == 2) {
                $(_0xb5c9[44])[_0xb5c9[36]](Math[_0xb5c9[25]](_0x9ca2xc[_0xb5c9[49]](_0xb5c9[48])[_0xb5c9[7]](_0xb5c9[47])[_0xb5c9[41]](/\K/g, _0xb5c9[46])[_0xb5c9[41]](/\M/g, _0xb5c9[45])) + Math[_0xb5c9[25]]($(_0xb5c9[44])[_0xb5c9[36]]()))
            }
        }
    };
    return false
}
function nan_taixiu(_0x9ca2x2) {
    if (_0x9ca2x2[_0xb5c9[36]]() == 1) {
        
        _0x9ca2x2[_0xb5c9[7]](_0xb5c9[67], _0xb5c9[68])[_0xb5c9[36]](0);
        $(_0xb5c9[70])[_0xb5c9[61]](_0xb5c9[69])

                                         
                                                    

    } else {
        _0x9ca2x2[_0xb5c9[7]](_0xb5c9[67], _0xb5c9[71])[_0xb5c9[36]](1);
        $(_0xb5c9[70])[_0xb5c9[63]](_0xb5c9[69])

                                                    
                                              

    };
    return false
}


function cuoc_tx(_0x9ca2x2) {
    if (_0x9ca2x2 == 1) {
        $(_0xb5c9[43])[_0xb5c9[57]]();
        $(_0xb5c9[59])[_0xb5c9[2]](_0xb5c9[58], {}, 500);
        $(_0xb5c9[37])[_0xb5c9[36]](1);
        $(_0xb5c9[43])[_0xb5c9[36]](Math[_0xb5c9[25]]($(_0xb5c9[43])[_0xb5c9[36]]()) + 0);
        $(_0xb5c9[44])[_0xb5c9[36]](_0xb5c9[40]);
        $(_0xb5c9[62])[_0xb5c9[61]](_0xb5c9[60]);
        $(_0xb5c9[64])[_0xb5c9[63]](_0xb5c9[60])
    } else {
        if (_0x9ca2x2 == 2) {
            $(_0xb5c9[44])[_0xb5c9[57]]()[_0xb5c9[65]]();
            $(_0xb5c9[59])[_0xb5c9[2]](_0xb5c9[58], {}, 500);
            $(_0xb5c9[37])[_0xb5c9[36]](2);
            $(_0xb5c9[44])[_0xb5c9[36]](Math[_0xb5c9[25]]($(_0xb5c9[44])[_0xb5c9[36]]()) + 0);
            $(_0xb5c9[43])[_0xb5c9[36]](_0xb5c9[40]);
            $(_0xb5c9[62])[_0xb5c9[61]](_0xb5c9[60]);
            $(_0xb5c9[66])[_0xb5c9[63]](_0xb5c9[60])
        } else {
            if (_0x9ca2x2 == 3) {
                $(_0xb5c9[59])[_0xb5c9[17]](_0xb5c9[58], {}, 500);
                $(_0xb5c9[62])[_0xb5c9[61]](_0xb5c9[60]);
                $(_0xb5c9[44])[_0xb5c9[36]](_0xb5c9[40]);
                $(_0xb5c9[43])[_0xb5c9[36]](_0xb5c9[40])
            }
        }
    };
    return false
}
   $("#game-taixiu .clogame").on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){$('#game-taixiu').hide('fade', {} , 500 );}}); 


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

  
   
   
  
    $(_0xb5c9[130])[_0xb5c9[121]](_0xb5c9[120], function () {});
    $(_0xb5c9[132])[_0xb5c9[121]](_0xb5c9[131], function () {
        if (check_click($(this)) == true) {


            nan_taixiu($(this))
        }
    });
  



        $(_0xb5c9[122])[_0xb5c9[121]](_0xb5c9[120], function () {
        if (check_click($(this)) == true) {
            cuoc_tx(1)
        }
    });
	 $(_0xb5c9[123])[_0xb5c9[121]](_0xb5c9[120], function () {
        if (check_click($(this)) == true) {
            cuoc_tx(2)
        }
    });


    $(_0xb5c9[135])[_0xb5c9[121]](_0xb5c9[120], function () {
        if (check_click($(this)) == true) {
            cuoc_tx(3)
        }
    });

    $(_0xb5c9[137])[_0xb5c9[121]](_0xb5c9[120], function () {
        if (check_click($(this)) == true) {
            btn_money_tx($(this))
        }
    });


})

 setInterval(function(){
 $( ".roll-play" ).load( "/f5-taixiu.php?roll-play" );
 $( ".txx" ).load( "/f5-taixiu.php?txx" );

  $( "#sumtai" ).load( "/f5-taixiu.php?sumtai" );
 $( "#sumxiu" ).load( "/f5-taixiu.php?sumxiu" );
 $( ".user-xiu" ).load( "/f5-taixiu.php?user-xiu" );
 $( ".user-tai" ).load( "/f5-taixiu.php?user-tai" );
 $( ".cuoc-tai" ).load( "/f5-taixiu.php?cuoc-tai" );
 $( ".cuoc-xiu" ).load( "/f5-taixiu.php?cuoc-xiu" );
 $( ".load-game" ).load( "/f5-taixiu.php?load-game" );
 $( ".vung_number" ).load( "/f5-taixiu.php?vung_number" );

 $( ".txxx" ).load( "/f5-taixiu.php?txxx" );
  $( "#kqq" ).load( "/f5-taixiu.php?kqq" );

}, 1000);

 
var loadcontent ='<img src="/lib/img/loading.gif" witdh="20">';
$(document).ready(function(){
$('.his').html(loadcontent);
$('.his').load('/f5-taixiu.php?his');
var refreshId = setInterval(function(){
$('.his').load('/f5-taixiu.php?his');
$('.his').slideDown('slow');
},15000);
});



    showStt = function(msg,timeout = 3000){
    statustxt = document.getElementById('statustxt');
    statustxt.innerHTML = msg;
    statustxt.style.opacity = 1;
    setTimeout(()=>{
        statustxt.style.opacity = 0;

    },timeout);
}
function cuocxiu()
{
    $.ajax({
        url : '/game/send?datxiu',
        type : 'POST',
        data : $("#form_tx_x").find("input").serialize(),
        success : function(d)
        {

            thongbao(d.msg,d.type);
            if (d.type=='Thành công'){
                                showStt('Cuợc thành công');

                                 $('#moneyxiu')['val']('');
            }

            
        }
        
    });
}
function cuoctai()
{
    $.ajax({
        url : '/game/send?dattai',
        type : 'POST',
        data : $("#form_tx_t").find("input").serialize(),
        success : function(d)
        {

            thongbao(d.msg,d.type);
            if (d.type=='Thành công'){
                                showStt('Cuợc thành công');

                                 $('#moneytai')['val']('');
            }

            
        }
        
    });
}

function nangame(id)
{
    $.ajax(
        {
            url : '/f5-taixiu.php?nangame',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}

</script>

</script>
  <style>
  
    .responsive1 {
  width: 100%;
    max-width: 20px;
            margin-left: 15px;

  height: auto;
          transform: scale(3) rotate(-30deg);

}
    .responsive2 {
  width: 100%;
    max-width: 20px;

  height: auto;
          transform: scale(3) rotate(20deg);

}
    .responsive3 {
  width: 100%;
      max-width: 20px;

  height: auto;
          transform: scale(3) rotate(5deg);

}

.khung-tx .wingame, .khung-tx .allgame {
    margin-top: 505%;
    margin-left: -98%;

}
.khung-tx .nangame {
    margin-top: 120%;
    margin-left: -33%;
}
.khung-tx .effect2 {
    visibility: visible;
    z-index: 5;
    height: 100%;
    margin-top: -8%;
    opacity: 1;
}

   </style>
<!-- Tai xiu -->
<style>
.badge-success {
    color: #fff;
    background-color: #28a745;
}

</style>
<?php
if ($datauser->level=='admin') {
    ?>
    <div id="admin"></div>
    <div class="modal fade" id="panel-tx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content">
<div class="popup-header">
<img src="/lib/img/btn_close.png" class="zoom-hove" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -3%;">
<h4 class="popup-title"  id="myModalLabel">Panel tài xỉu</h4>
</div>
<div class="modal-body">
<div class="popup-body">
    <center>
       <?php
    echo'<div id="admin-load-tx"></div>';
   

    
    ?>
    
 <div class="form-group">
<input type="number" class="form-control" name="xx1" id="xx1" placeholder="Xúc xắc 1 ">
</div>
<div class="form-group">
<input type="number" class="form-control" name="xx2"  id="xx2" placeholder="Xúc xắc 2" >
</div>
<div class="form-group">
<input type="number" class="form-control" name="xx3"  id="xx3"  placeholder="Xúc xắc 3" >
</div>

<div class="form-group">
<input type="number" class="form-control" id="phien" name="phien" placeholder="Phiên">
</div>
<center><button type="submit" id="btnAdmintx" name="btnAdmintx" class="Btn">Chỉnh</button></center>
</center>
</div>
</div>

 

</div>

<div class="popup-footer">
    

</div>
</div>
</div>
</div>

<script>
$(document).ready(function(){
	$('#btnAdmintx').click(function(){
		var xx1 = $('#xx1').val();
		var xx2 = $('#xx2').val();
		var xx3 = $('#xx3').val();
		var phien = $('#phien').val();
		
		var url = "/panel.php";
		var data = {"btnAdmintx": "", "xx1": xx1, "xx2": xx2, "xx3": xx3, "phien": phien};
		$('#admin').load(url, data);
		                                 $('#xx1')['val']('');
		                                 $('#xx2')['val']('');
		                                 $('#xx3')['val']('');
		                                 		                                 $('#phien')['val']('');


		return false;
	});
});
  setInterval(function(){
 $( "#admin-load-tx" ).load( "/f5-admin.php" );
 }, 1000);
</script>
</form>

<!-- -->
    <?php
}
?>
<div class="modal fade" id="huongdan-tx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content">
<div class="popup-header">
<img src="/lib/img/btn_close.png" class="zoom-hove" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -3%;">
<h4 class="popup-title" id="myModalLabel">Hướng dẫn tài xỉu</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

 <font color="yellow"><b>Mỗi phiên tài xỉu có 60 giây:</b></font></br>
<b>Tài xỉu </b></br>         
+ Tài: từ 11-18 điểm.</br>
+ Xỉu: từ 3-10 điểm.</br>
- Mỗi lần kết thúc phiên sẽ ngẫu nhiên 3 xí ngầu, mỗi xí ngẫu mang các mặt là các điểm.</br>

<font color="yellow"><b>Thưởng thắng cuộc:</b></font> </br>
+ Tài xỉu: đặt <i>10.000đ</i> nhận <i>19.800đ</i></br>
- Chúc các bạn chơi game vui vẻ.

</div>
</div>
<div class="popup-footer">

</div>
</div>
</div>
</div>

<!-- -->

<!-- -->
<?php

?>
<div class="modal fade" id="lichsu-tx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content">
<div class="popup-header">
<img src="/lib/img/btn_close.png" class="zoom-hove" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -3%;">
    <h4 class="popup-title" id="myModalLabel">Lịch sử đặt cược</h4>
</div>
<div class="popup-body">
<div class="popup-body">

<div class="row" style="margin-left: 1px;
    text-align: center;
    width: 100%;
    overflow: scroll;
    height: 300px;
    margin-top: -12px;"
    >

          
                    <table id="customers" class="table table-bordered"  >
                      <thead style="color:yellow;white-space: nowrap;">
                        <tr>
                          <th> #Phiên </th>  
                          <th> Thời gian </th>
                          <th> Cược </th>
                          <th> Kết quả </th>
                          <th> Tiền cược </th>
                          <th> Thực nhận </th>
                          <th> Trạng thái </th>
                                                    <th> Hoàn tiền </th>

                        </tr>
                      </thead>
                <tbody id="ls_cuoc" >
</tbody>
                    </table>
                   
            </div>
         


</div>
</div>
<div class="popup-footer">

</div>
</div>
</div>
</div>

<!-- -->

<div class="modal fade" id="soicau-tx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content">
<div class="popup-header">
<img src="/lib/img/btn_close.png" class="zoom-hove" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -3%;">
    <h4 class="popup-title" style="padding: 10px;" id="myModalLabel">Soi cầu tài xỉu</h4>
</div>
<div class="popup-body">
<div class="popup-body" style="overflow: scroll;height:500px;">
    
<div id="reloadd" >
          

</div>


  

</div>
</div>
<div class="popup-footer">

</div>
</div>
</div>
</div>
   
