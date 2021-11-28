

    <?php

include_once('function/config.php');



$data_tx = $mysqli->query("SELECT * FROM `taixiu`   ORDER by id DESC LIMIT 1");
$tx=$data_tx->fetch_assoc();
$timetx=70;
$tl= $tx['id']+1;
$ad = mysqli_query($mysqli,"SELECT * FROM `taixiu_admin` WHERE phien=$tl ORDER BY id desc ");



if ($tx[time]+$timetx-time()<=0){

$r1 = rand(1,6);
$r2 = rand(1,6);
$r3 = rand(1,6);
while($admin=mysqli_fetch_assoc($ad)) {
$r1 = $admin[1];
$r2 = $admin[2];
$r3 = $admin[3];

}

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

	
if (isset($_GET['roll-play'])) {

    
    
echo'<span>#'.($tx['id']+1).'</span>';
}
if (isset($_GET['txx'])) {
    if ($tx[time]+$timetx-time()>=($timetx-22)){

     ?>
    <script>
    <?php
    if ($_SESSION['nantx']==1) {
 
 
        ?>
             		    			         document.getElementById("vung-taixiu").style.display = 'block';
    <?php
    }
    ?>

    </script>
    <?php
    
}
if ($tx[time]+$timetx-time()<=($timetx-20)){

    if ($tx[time]+$timetx-time()<=1){
    echo'<img src="/images/taixiu/roll.gif"  height="120" width="120">';
    } else {
       ?>
    <script>
             		    			         document.getElementById("vung-taixiu").style.display = 'none';
             		    			          document.getElementById("vung-taixiu").style.left = '0';
             		    			          document.getElementById("vung-taixiu").style.top = '0';


    </script>
    <?php     

echo''.$tx[time]+$timetx-time().'';
}
} else 


{
   

    



 
echo'    <img src="/images/taixiu/'.$tx[1].'.png" height="50" width="50" class="responsive2" style="
    width: 19%;
    height: 63%;
    margin-top: 19%;
    margin-left: 37.7%;
"><img src="/images/taixiu/'.$tx[2].'.png" height="50" width="50" class="responsive2" style="
    width: 19%;
    height: 5%;
    margin-top: 107%;
    margin-left: 15.7%;
"> 
    <img src="/images/taixiu/'.$tx[3].'.png" height="50" width="50" class="responsive2" style="
    width: 19%;
    height: 71%;
    margin-top: -61%;
    margin-left: 11.7%;
">';



 
}

}
if (isset($_GET['vung_number'])) {
if ($tx[time]+$timetx-time()>($timetx-20)){

    echo'<span>'.($tx[time]+20-time()).'</span>';
}
    
}
if (isset($_GET['txxx'])) {
    
if ($tx[time]+$timetx-time()>($timetx-20)){
   

    
echo'
<div class="clock-small">'.($tx[time]+20-time()).'</div>';

    


}
    
}


if (isset($_GET['note_play'])) {


  if ($tx[time]+$timetx-time()==5){
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
        


                               ?>
                                <script>
                                
                                showStt('Hệ thống ngưng nhận cược');
</script>
<?php
}
    
}
if (isset($_GET['his'])) {
    ?>
    <script>
        var _0xb5c9 = ["offset", "#game-taixiu .his", "show", "left", "px", "css", "data-title", "attr", "html", "#game-taixiu .tooltip_tx", "post", "./user-play", "parse", "error", "tb", "ms", "ajax", "hide", "%", "url(../lib/img/tx/ef.png)", "1", "#khung-tx .effect", "background-image", " url(../lib/img/tx/xx", "xn1", "floor", "_1.png),url(../lib/img/tx/xx", "xn2", "_2.png),url(../lib/img/tx/xx", "xn3", "_3.png)", "xn4", "#game-taixiu .kq-num div", "0", "#game-taixiu .effect", "#game-taixiu .kq-num", "val", "#khung-tx", "\x54\x68\xF4\x6E\x67\x20\x42\xE1\x6F", "\x56\x75\x69\x20\x4C\xF2\x6E\x67\x20\x43\x68\u1ECD\x6E\x20\x54\xE0\x69\x20\x48\x6F\u1EB7\x63\x20\x58\u1EC9\x75", "", "replace", ".mymoney", "#khung-tx input.input-tai", "#khung-tx input.input-xiu", "000000", "000", "data-txt", ".middle", "find", "\x58\xF3\x61", "slice", "tai", "xiu", "check", "stringify", "emit", "focus", "fade", "#khung-tx .group-button", "active", "removeClass", "#khung-tx .input-cuoc-hide", "addClass", "#khung-tx .input-tai.input-cuoc-hide", "select", "#khung-tx .input-xiu.input-cuoc-hide", "src", "../lib/img/tx/btn_nan_0.png", "nantx", "#game-taixiu2", "../lib/img/tx/btn_nan_1.png", "#game-taixiu2 .clock img", "hasClass", "0px", "#vung-taixiu", "dequeue", "kq", "queue", "delay", ".", "color", " .icon", "remove", "first", "#game-taixiu .his div", "xiu-wrap", "<div class=\"btn-xiu\" onmouseover=\"show_roll_tx($(this))\" data-title=\"#", "roll", " (", "-", ")", "-Xỉu\"></div>", "tai-wrap", "<div class=\"btn-tai\" onmouseover=\"show_roll_tx($(this))\" data-title=\"#", "\x2D\x54\xE0\x69\x22\x3E\x3C\x2F\x64\x69\x76\x3E", "before", "#game-taixiu .his span", "tai-xiu", "#chat-swiper p", "<p>", "</p>", "parseHTML", "append", "#chat-swiper div", "length", "height", "eq", "#chat-swiper", "20", "animate", "actigame", ".actigame", ".group-button", ".move-here", "draggable", "#game-taixiu", "position", "width", "top", "click touchstart mousedown touchend", "on", "#khung-tx .tai-wrap .input-tai", "#khung-tx .xiu-wrap .input-xiu", "#khung-tx .clogame", "#khung-tx .wingame", "/game/lichsu_tx", "#khung-tx .hisgame", "/game/huongdan_tx", "#khung-tx .guigame", "#khung-tx .chatgame", "click", "#khung-tx .nangame", "/game/taixiu", "#khung-tx .allgame", "#khung-tx .group-button .button.blue", "#khung-tx .group-button .button.money2", "#khung-tx .group-button .button.money", "#khung-tx .group-button .button.tattay", "#khung-tx .group-button .button.green", "#khung-tx .group-button .button.red", "ready"];


function show_roll_tx(data) {
    var soicau = data[_0xb5c9[0]]();
    var soicau2 = $(_0xb5c9[1])[_0xb5c9[0]]();
    $(_0xb5c9[9])[_0xb5c9[8]](data[_0xb5c9[7]](_0xb5c9[6]))[_0xb5c9[5]]({
        'margin-left': (soicau[_0xb5c9[3]] - soicau2[_0xb5c9[3]]) + _0xb5c9[4]
    })[_0xb5c9[2]]()
}


    </script>
    <?php
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
}
if (isset($_GET['sumxiu'])) {
   
    echo'' .tron($tongtienxiu) . '</div>';

}

if (isset($_GET['cuoc-xiu'])) {
echo''.format_cash($listtienxiuuser['money']).'';
    
}
if (isset($_GET['cuoc-tai'])) {
echo''.format_cash($listtientaiuser['money']).'';
    
}

if (isset($_GET['sumtai'])) {

    echo'' .tron($tongtientai) . '</div>';



}
if (isset($_GET['user-xiu'])) {
    echo''.$i2.'';
}
if (isset($_GET['user-tai'])) {
    echo''.$i.'';
}
if (isset($_GET['nangame'])) {

    if ($_SESSION['nantx']==0) {
        $_SESSION['nantx']=1;
        


    } else        if ($_SESSION['nantx']==1) {
        $_SESSION['nantx']=0;


}
}
if (isset($_GET['kqq'])) {
    $xucxac=$tx[1]+$tx[2]+$tx[3];
    echo''.$xucxac.'';
    
}

		
	
if (isset($_GET['load-game'])) {
    ?>
    <script>
        var _0xb5c9 = ["offset", "#game-taixiu .his", "show", "left", "px", "css", "data-title", "attr", "html", "#game-taixiu .tooltip_tx", "post", "./user-play", "parse", "error", "tb", "ms", "ajax", "hide", "%", "url(../lib/img/tx/ef.png)", "1", "#khung-tx .effect", "background-image", " url(../lib/img/tx/xx", "xn1", "floor", "_1.png),url(../lib/img/tx/xx", "xn2", "_2.png),url(../lib/img/tx/xx", "xn3", "_3.png)", "xn4", "#game-taixiu .kq-num div", "0", "#game-taixiu .effect", "#game-taixiu .kq-num", "val", "#khung-tx", "\x54\x68\xF4\x6E\x67\x20\x42\xE1\x6F", "\x56\x75\x69\x20\x4C\xF2\x6E\x67\x20\x43\x68\u1ECD\x6E\x20\x54\xE0\x69\x20\x48\x6F\u1EB7\x63\x20\x58\u1EC9\x75", "", "replace", ".mymoney", "#khung-tx input.input-tai", "#khung-tx input.input-xiu", "000000", "000", "data-txt", ".middle", "find", "\x58\xF3\x61", "slice", "tai", "xiu", "check", "stringify", "emit", "focus", "fade", "#khung-tx .group-button", "active", "removeClass", "#khung-tx .input-cuoc-hide", "addClass", "#khung-tx .input-tai.input-cuoc-hide", "select", "#khung-tx .input-xiu.input-cuoc-hide", "src", "../lib/img/tx/btn_nan_0.png", "nantx", "#game-taixiu2", "../lib/img/tx/btn_nan_1.png", "#game-taixiu2 .clock img", "hasClass", "0px", "#vung-taixiu", "dequeue", "kq", "queue", "delay", ".", "color", " .icon", "remove", "first", "#game-taixiu .his div", "xiu-wrap", "<div class=\"btn-xiu\" onmouseover=\"show_roll_tx($(this))\" data-title=\"#", "roll", " (", "-", ")", "-Xỉu\"></div>", "tai-wrap", "<div class=\"btn-tai\" onmouseover=\"show_roll_tx($(this))\" data-title=\"#", "\x2D\x54\xE0\x69\x22\x3E\x3C\x2F\x64\x69\x76\x3E", "before", "#game-taixiu .his span", "tai-xiu", "#chat-swiper p", "<p>", "</p>", "parseHTML", "append", "#chat-swiper div", "length", "height", "eq", "#chat-swiper", "20", "animate", "actigame", ".actigame", ".group-button", ".move-here", "draggable", "#game-taixiu", "position", "width", "top", "click touchstart mousedown touchend", "on", "#khung-tx .tai-wrap .input-tai", "#khung-tx .xiu-wrap .input-xiu", "#khung-tx .clogame", "#khung-tx .wingame", "/game/lichsu_tx", "#khung-tx .hisgame", "/game/huongdan_tx", "#khung-tx .guigame", "#khung-tx .chatgame", "click", "#khung-tx .nangame", "/game/taixiu", "#khung-tx .allgame", "#khung-tx .group-button .button.blue", "#khung-tx .group-button .button.money2", "#khung-tx .group-button .button.money", "#khung-tx .group-button .button.tattay", "#khung-tx .group-button .button.green", "#khung-tx .group-button .button.red", "ready"];



    $(document)[_0xb5c9[141]](function () {

      $(_0xb5c9[75])[_0xb5c9[115]]({
             drag: function () {
            var _0x9ca2x19 = $(this)[_0xb5c9[117]]();
            if (_0x9ca2x19[_0xb5c9[3]] > Math[_0xb5c9[25]]($(this)[_0xb5c9[118]]() * 0.60)) {
                    	          document.getElementById("kq-tx").style.display = 'block';

   
                 <?php
                 if  ($tx['ketqua']=='tai') {
                     
                     ?>
                     	document.getElementById("taiicon").style.webkitAnimationPlayState = 'running';
                     <?php
                 } else  if  ($tx['ketqua']=='xiu'){
                    ?>
                     	document.getElementById("xiuicon").style.webkitAnimationPlayState = 'running';
                     <?php   
                 } 
            ?>
            };
            if (_0x9ca2x19[_0xb5c9[119]] > Math[_0xb5c9[25]]($(this)[_0xb5c9[106]]() * 0.60)) {
                    	          document.getElementById("kq-tx").style.display = 'block';

        
              <?php
                 if  ($tx['ketqua']=='tai') {
                     ?>
                     	document.getElementById("taiicon").style.webkitAnimationPlayState = 'running';
                     <?php
                 } else  if  ($tx['ketqua']=='xiu'){
                    ?>
                     	document.getElementById("xiuicon").style.webkitAnimationPlayState = 'running';
                     <?php   
                 } 
            ?>
            };
            if (_0x9ca2x19[_0xb5c9[3]] < Math[_0xb5c9[25]](_0xb5c9[90] + $(this)[_0xb5c9[118]]() * 0.60)) {
                    	          document.getElementById("kq-tx").style.display = 'block';

          
                           <?php
                 if  ($tx['ketqua']=='tai') {
                     ?>
                     	document.getElementById("taiicon").style.webkitAnimationPlayState = 'running';
                     <?php
                 } else  if  ($tx['ketqua']=='xiu'){
                    ?>
                     	document.getElementById("xiuicon").style.webkitAnimationPlayState = 'running';
                     <?php   
                 } 
            ?>
            };
            if (_0x9ca2x19[_0xb5c9[119]] < Math[_0xb5c9[25]](_0xb5c9[90] + $(this)[_0xb5c9[106]]() * 0.60)) {
                    	          document.getElementById("kq-tx").style.display = 'block';

       
                           <?php
                 if  ($tx['ketqua']=='tai') {
                     ?>
                     	document.getElementById("taiicon").style.webkitAnimationPlayState = 'running';
                     <?php
                 } else  if  ($tx['ketqua']=='xiu'){
                    ?>
                     	document.getElementById("xiuicon").style.webkitAnimationPlayState = 'running';
                     <?php   
                 } 
            ?>
            }
        }
        });
})

    </script>


    
    <?php
    	if ($tx[time]+$timetx-time()<=($timetx-10) &&  $_SESSION['nantx']==1){
    	    ?>
    	    <script>
    	          document.getElementById("kq-tx").style.display = 'block';
    	    </script>
    	    <?php
   
    	if  ($tx['ketqua']=='tai') {
    	    
                     ?>
                     <script>
                     
                     	document.getElementById("taiicon").style.webkitAnimationPlayState = 'running';
                     	
                     </script>
                     <?php
                 } else  if  ($tx['ketqua']=='xiu'){
                    ?>
                    <script>
                     	document.getElementById("xiuicon").style.webkitAnimationPlayState = 'running';
                    </script>
                     <?php   
                 } 
            
    	}
    	if ($tx[time]+$timetx-time()<=($timetx-20)){
		    ?>
		    <script>
		        	          document.getElementById("kq-tx").style.display = 'none';

		    			         document.getElementById("taiicon").style.webkitAnimationPlayState = 'paused';
			         document.getElementById("xiuicon").style.webkitAnimationPlayState = 'paused';
			             document.getElementById('dragon').style.webkitAnimationPlayState = 'running'; 

</script>
<?php
		} else {
		    if ($_SESSION['nantx']==1){  
		    
		     		     ?>
		 <script>
			         			             document.getElementById('dragon').style.webkitAnimationPlayState = 'paused'; 

		</script>
		<?php   
		    }
		 if  ($tx['ketqua']=='tai' && $_SESSION['nantx']!=1){  
		     ?>
		 <script>

		         document.getElementById("taiicon").style.webkitAnimationPlayState = 'running';
			         			             document.getElementById('dragon').style.webkitAnimationPlayState = 'paused'; 

		</script>
		<?php
			 }   if  ($tx['ketqua']=='xiu' && $_SESSION['nantx']!=1){
 ?>
 <script>



			         document.getElementById("xiuicon").style.webkitAnimationPlayState = 'running';
			         			         			             document.getElementById('dragon').style.webkitAnimationPlayState = 'paused'; 

					 </script>
			 <?php
			 }
		}	
		
	
		    
			 
  if ($tx[time]+$timetx-time()==5){
                               ?>
                                <script>
                                     		    			         document.getElementById("bangcuoc").style.display = 'none';

                                
                                showStt('Hệ thống ngưng nhận cược');
</script>
<?php
}
if ($tx[time]+$timetx-time()>($timetx-20) && $_SESSION['nantx']!=1){

 ?>
 <script>
     		    			         document.getElementById("kq-tx").style.display = 'block';


 </script>
 <?php
} else if ($tx[time]+$timetx-time()<=($timetx-20) && $_SESSION['nantx']!=1){

    ?>
 <script>
     		    			         document.getElementById("kq-tx").style.display = 'none';


 </script>
 <?php 
}
if ($tx[time]+$timetx-time()==($timetx-20)){
                                ?>
                                <script>
         
                                
                                showStt('Hệ thống bắt đầu phiên mới');
</script>
<?php   

}


}   


?>

