

    <?php

include_once('function/config.php');



$data_cl = $mysqli->query("SELECT * FROM `chanle`   ORDER by id DESC LIMIT 1");
$cl=$data_cl->fetch_assoc();
$timecl=30;

if ($cl[time]+$timecl-time()<=0){
    //1 lẻ đen - 2 chẵn trắng

$r1 = rand(1,2);
$r2 = rand(1,2);
$r3 = rand(1,2);
$r4 = rand(1,2);
if ($r1==1 && $r2==1 && $r3==1 && $r4==1) {
    $ketqua='denfull';
    $chanle='chan';
}
if ($r1==2 && $r2==2 && $r3==2 && $r4==2) {
    $ketqua='trangfull';
        $chanle='chan';

}
/// le 3
if ($r1==1 && $r2==1 && $r3==1 && $r4==2) {
    $ketqua='3den1trang';
        $chanle='le';

}
if ($r1==1 && $r2==1 && $r3==2 && $r4==1) {
    $ketqua='3den1trang';
            $chanle='le';

}
if ($r1==1 && $r2==2 && $r3==1 && $r4==1) {
    $ketqua='3den1trang';
            $chanle='le';

}
if ($r1==2 && $r2==1 && $r3==1 && $r4==1) {
    $ketqua='3den1trang';
            $chanle='le';

}
///le 3

//le 1
if ($r1==1 && $r2==2 && $r3==2 && $r4==2) {
    $ketqua='3trang1den';
            $chanle='le';

}
if ($r1==2 && $r2==1 && $r3==2 && $r4==2) {
    $ketqua='3trang1den';
            $chanle='le';

}
if ($r1==2 && $r2==2 && $r3==1 && $r4==2) {
    $ketqua='3trang1den';
            $chanle='le';

}
if ($r1==2 && $r2==2 && $r3==2 && $r4==1) {
    $ketqua='3trang1den';
            $chanle='le';

}
//le 1

//chan 2
if ($r1==1 && $r2==1 && $r3==2 && $r4==2) {
    $ketqua='2den2trang';
            $chanle='chan';

}
if ($r1==2 && $r2==2 && $r3==1 && $r4==1) {
    $ketqua='2den2trang';
                $chanle='chan';

}
if ($r1==1 && $r2==2 && $r3==1 && $r4==2) {
    $ketqua='2den2trang';
                $chanle='chan';

}
if ($r1==2 && $r2==1 && $r3==2 && $r4==1) {
    $ketqua='2den2trang';
                $chanle='chan';

}
if ($r1==1 && $r2==2 && $r3==2 && $r4==1) {
    $ketqua='2den2trang';
                $chanle='chan';

}
if ($r1==2 && $r2==1 && $r3==1 && $r4==2) {
    $ketqua='2den2trang';
                $chanle='chan';

}

//chan 2



$pm = $cl['id']+1;

//chan le


$mysqli->query("INSERT INTO chanle SET `ketqua`= '".$ketqua."', `chanle`= '".$chanle."', `1`='".$r1."',`2`='".$r2."',`3`='".$r3."',`4`='".$r4."',`time`='".time()."' ,`createdate`= now() ");





    
}
if (isset($_GET['clock'])) {

    



echo'<span class="middle font_size_21 clock-big" style="display: inline;">'.($cl[time]+$timecl-time()).'</span>';


}
if (isset($_GET['phien'])) {

echo'<div class="middle" style="position: absolute;">#'.($cl['id']+1).'</div>';
}
if (isset($_GET['item1'])) {
echo'<div  style="background-image: url(/lib/img/xocdia/1.png);"></div>
';
    
}
if (isset($_GET['item2'])) {
echo'<div  style="background-image: url(/lib/img/xocdia/'.$r2.'.png);"></div>
';
    
}
if (isset($_GET['item3'])) {
echo'<div  style="background-image: url(/lib/img/xocdia/'.$r3.'.png);"></div>
';
    
}
if (isset($_GET['item4'])) {
echo'<div  style="background-image: url(/lib/img/xocdia/'.$r4.'.png);"></div>
';
    
}
    if ($cl[time]+$timecl-time()<=0){
?>
<script>
    		    		    			         document.getElementById("kq1").style.backgroundImage  = "url('/lib/img/xocdia/<?=$r1?>.png')";
    		    		    			         document.getElementById("kq2").style.backgroundImage  = "url('/lib/img/xocdia/<?=$r2?>.png')";
    		    		    			         document.getElementById("kq3").style.backgroundImage  = "url('/lib/img/xocdia/<?=$r3?>.png')";
    		    		    			         document.getElementById("kq4").style.backgroundImage  = "url('/lib/img/xocdia/<?=$r4?>.png')";

</script>
    <?php    
    } else  if ($cl[time]+$timecl-time()<=5){
        ?>
        <script>
                document.getElementById('ketqqua').style.webkitAnimationPlayState = 'running'; 

        </script>
        <?php
        if ($cl[time]+$timecl-time()<=1){
            ?>
            <script>
            
                                                showStt2('Hệ thống chuẩn bị mở bát');

            </script>
            <?php
        }
    ?>
<script>



    		    		    			         document.getElementById("kq1").style.backgroundImage  = "url('/lib/img/loading.gif')";
    		    		    			         document.getElementById("kq2").style.backgroundImage  = "url('/lib/img/loading.gif')";
    		    		    			         document.getElementById("kq3").style.backgroundImage  = "url('/lib/img/loading.gif')";
    		    		    			         document.getElementById("kq4").style.backgroundImage  = "url('/lib/img/loading.gif')";

</script>
    <?php       
    } else {
        ?>
        <script>
              
                        document.getElementById('ketqqua').style.webkitAnimationPlayState = 'paused'; 
</script>
<?php
    }


    	if ($cl[time]+$timetx-time()<=($timetx-10)){


    	     ?>
		    <script>

             		    		        document.getElementById("ketqqua").style.display = 'block';    



		    			         document.getElementById("chann").style.display = 'none';
			         document.getElementById("lee").style.display = 'none';
			          document.getElementById("denfull").style.display = 'none';
			         document.getElementById("trangfull").style.display = 'none';
			         			         document.getElementById("3den1trang").style.display = 'none';
			         			         document.getElementById("3trang1den").style.display = 'none';
			         			         
			         			    


</script>
<?php
    	} else {
    ?>
    <script>
        document.getElementById("ketqqua").style.display = 'none';              		    

    </script>
    <?php
    	    
    	    if  ($cl['ketqua']=='trangfull'){  
		     ?>
		 <script>
		 
			 
			         			         			         			         document.getElementById("trangfull").style.display = 'block';


		</script>
		<?php
    	}
    	   	    if  ($cl['ketqua']=='denfull'){  
		     ?>
		 <script>
		 
			     
			         			         			         			         document.getElementById("denfull").style.display = 'block';

		</script>
		<?php
    	} 
    	   	    if  ($cl['ketqua']=='3den1trang'){  
		     ?>
		 <script>
		 
			    
			         			         			         			         document.getElementById("3den1trang").style.display = 'block';

		</script>
		<?php
    	} 
    	   	    if  ($cl['ketqua']=='3trang1den'){  
		     ?>
		 <script>
		 
			
			         			         			         			         document.getElementById("3trang1den").style.display = 'block';

		</script>
		<?php
    	} 
    	if  ($cl['chanle']=='chan'){  
		     ?>
		 <script>
		 
			    
			         			         			         			         document.getElementById("chann").style.display = 'block';

		</script>
		<?php
    	} 
    	if  ($cl['chanle']=='le'){  
		     ?>
		 <script>
		 
			      
			         			         			         			         			         document.getElementById("lee").style.display = 'block';


		</script>
		<?php
    	} 
    	}