<?PHP
/*
Tác giả : Trần Đỗ Đức Nghĩa.
Emaill  : trandoducnghia@gmail.com.
*/
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$vip    = array("10","20","150","400","1000","5000");
$mysqli = new mysqli("localhost","playnroc_tnmx","][{Z+sg[KOk8","playnroc_tnmx");
$mysqli -> set_charset("utf8");
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$gio = date('h');
$phut= date('i');
$giay= date('s');
$thoigian = ''.$gio.':'.$phut.':'.$giay.' '.$ngay.'/'.$thang.'/'.$nam.'';
$ngaythangnam = ''.$ngay.'/'.$thang.'/'.$nam.'';
$id = $_SESSION['id'];
$mysqli->query("DELETE FROM `cuoc` WHERE `xu` <= '0' AND `hoantra` = '0'"); // xóa cược 0 0 
if($id >=1)
{
    $datauser = new users($id);
    $user     = $datauser;
    $uid      = $id;
    $u        = $user;
    if($datauser->thongtin->diem <=0)
    {
        $datauser->upthongtin('diem',10);
    }
    if($datauser->thongtin->diem >= $vip[$datauser->thongtin->vip] AND $datauser->thongtin->vip <6)
    {
        $datauser->upthongtin('vip',$datauser->thongtin->vip+1);
    }
}

/*Sử lý tiền tài xỉu*/
$system_taixiu = $mysqli->query("SELECT * FROM `taixiu` where `trangthai` = 'finished'");
while($tx=$system_taixiu->fetch_assoc()){ 
    $ketqua = $tx['x1'] + $tx['x2'] + $tx['x3'];
    $name   = $ketqua <= 10 ? 'xiu' : 'tai'; // kết quả trò chơi.
    $system_cuoc = $mysqli->query("SELECT * FROM `cuoc` where `game` = 'taixiu' AND `phien` = '".$tx['id']."'");
    while($cuoc=$system_cuoc->fetch_assoc())
    {
        $log = $mysqli->query("SELECT * FROM `cuoc_taixiu` where `uid` = '".$cuoc['uid']."' AND `phien` = '".$cuoc['phien']."'")->fetch_assoc();
        if($log['id'] <=0)
        {
            $mysqli->query("INSERT INTO `cuoc_taixiu` SET `phien` = '".$cuoc['phien']."', `uid` = '".$cuoc['uid']."' ");
            
        }
        $xu = $cuoc['xu'];
        $hoantra = $cuoc['hoantra'];
        $xucuoc = $xu + $hoantra;
        if($cuoc['type'] == $name) // chiến thắng
        {
           
               $mmo = new users($cuoc['uid']);
               $xunhan = ($xu*2)*0.95;
               $mmo->upxu($xunhan);
               $xuwin = $mmo->thongtin->taixiu_win + $xunhan;
               $mmo->upthongtin('taixiu_win',$xuwin);
               $mysqli->query("UPDATE `cuoc_taixiu` SET `xucuoc` = `xucuoc` +  '" . $xucuoc . "', `hoantra` = `hoantra` + '".$hoantra."', `thoigian` = '".$thoigian."', `ketqua` = '".$ketqua."', `type` = '".$cuoc['type']."', `xunhan` = `xunhan` + '".$xunhan."' WHERE `phien` = '" . $cuoc['phien'] . "' AND `uid`= '".$cuoc['uid']."'");
           
        }
        else // thua
        {
               $mmo = new users($cuoc['uid']);
               $xuwin = $mmo->thongtin->taixiu_lose + $xu;
               $mmo->upthongtin('taixiu_lose',$xuwin);
               $mysqli->query("UPDATE `cuoc_taixiu` SET `xucuoc` = `xucuoc` +  '" . $xucuoc . "', `hoantra` = `hoantra` + '".$hoantra."', `thoigian` = '".$thoigian."', `ketqua` = '".$ketqua."', `type` = '".$cuoc['type']."', `xunhan` = '0' where `phien` = '" . $cuoc['phien'] . "' AND `uid`= '".$cuoc['uid']."'");
        }
        $mysqli->query("DELETE FROM `cuoc` WHERE `id` = '" . $cuoc['id']. "'");
    }
    
    /*Game bầu cua*/
    $system_cuoc = $mysqli->query("SELECT * FROM `cuoc` where `game` = 'baucua' AND `phien` = '".$tx['id']."'");
    while($cuoc=$system_cuoc->fetch_assoc())
    {
        $log = $mysqli->query("SELECT * FROM `cuoc_baucua` where `uid` = '".$cuoc['uid']."' AND `phien` = '".$cuoc['phien']."'")->fetch_assoc();
        if($log['id'] <=0)
        {
            $mysqli->query("INSERT INTO `cuoc_baucua` SET `phien` = '".$cuoc['phien']."', `uid` = '".$cuoc['uid']."' ");
            
        }
        $xu = $cuoc['xu'];
        $xucuoc = $xu;
        if($cuoc['type'] == $tx['b1'] or $cuoc['type'] == $tx['b2'] or $cuoc['type'] == $tx['b3']) // chiến thắng
        {
           
               $mmo = new users($cuoc['uid']);
               $xunhan = ($xu*2)*0.95;
               $mmo->upxu($xunhan);
               $xuwin = $mmo->thongtin->baucua_win + $xunhan;
               $mmo->upthongtin('baucua_win',$xuwin);
               $mysqli->query("UPDATE `cuoc_baucua` SET `xucuoc` = `xucuoc` +  '" . $xucuoc . "', `thoigian` = '".$thoigian."', `xunhan` = `xunhan` + '".$xunhan."',`play_chon".$cuoc['type']."` = `play_chon".$cuoc['type']."` + '".$xucuoc."'  WHERE `phien` = '" . $cuoc['phien'] . "' AND `uid`= '".$cuoc['uid']."'");
           
        }
        else // thua
        {
               $mmo = new users($cuoc['uid']);
               $xuwin = $mmo->thongtin->baucua_lose + $xu;
               $mmo->upthongtin('baucua_lose',$xuwin);
               $mysqli->query("UPDATE `cuoc_baucua` SET `xucuoc` = `xucuoc` +  '" . $xucuoc . "', `thoigian` = '".$thoigian."', `xunhan` = `xunhan` + '0',`play_chon".$cuoc['type']."` = `play_chon".$cuoc['type']."` + '".$xucuoc."'  WHERE `phien` = '" . $cuoc['phien'] . "' AND `uid`= '".$cuoc['uid']."'");
        }
        $mysqli->query("DELETE FROM `cuoc` WHERE `id` = '" . $cuoc['id']. "'");
    }
    /*DucNghia*/
    
    /*Game chẵn lẻ*/
    $system_cuoc = $mysqli->query("SELECT * FROM `cuoc` where `game` = 'chanle' AND `phien` = '".$tx['id']."'");
    while($cuoc=$system_cuoc->fetch_assoc())
    {
        $log = $mysqli->query("SELECT * FROM `cuoc_chanle` where `uid` = '".$cuoc['uid']."' AND `phien` = '".$cuoc['phien']."'")->fetch_assoc();
        if($log['id'] <=0)
        {
            $mysqli->query("INSERT INTO `cuoc_chanle` SET `phien` = '".$cuoc['phien']."', `uid` = '".$cuoc['uid']."' ");
            
        }
        $xu = $cuoc['xu'];
        $xucuoc = $xu;
        $ls = $mysqli->query("SELECT * FROM `cuoc_chanle` where `uid` = '".$cuoc['uid']."' AND `phien` = '".$cuoc['phien']."'")->fetch_assoc();
        $chan  = 0;
        $le    = 0;
        $le3   = 0;
        $chan3 = 0;
        $le4   = 0;
        $chan4 = 0;
        
        if($cuoc['type'] == "chan") $chan = $cuoc['xu'];
        if($cuoc['type'] == "le")   $le = $cuoc['xu'];
        if($cuoc['type'] == "le3")  $le3 = $cuoc['xu'];
        if($cuoc['type'] == "chan3") $chan3 = $cuoc['xu'];
        if($cuoc['type'] == "le4") $le4 = $cuoc['xu'];
        if($cuoc['type'] == "chan4") $chan4 = $cuoc['xu'];
        $var0 = explode(",",$ls['cuoc'])[0] + $chan;
        $var1 = explode(",",$ls['cuoc'])[1] + $le;
        $var2 = explode(",",$ls['cuoc'])[2] + $le3;
        $var3 = explode(",",$ls['cuoc'])[3] + $chan3;
        $var4 = explode(",",$ls['cuoc'])[4] + $le4;
        $var5 = explode(",",$ls['cuoc'])[5] + $chan4;
        $win = 0;
        $type_cuoc = ''.$var0.','.$var1.','.$var2.','.$var3.','.$var4.','.$var5.'';
        $dem  = $tx['c1'] + $tx['c2'] + $tx['c3'] + $tx['c4'];
        // 2 2 2 1 = 7 chẵn 3,
        // 1 1 1 2 = 5 lẻ 3,
        // 2 2 2 2 = 8 chẵn 4,
        // 1 1 1 1 =4 => chẵn 4.
        // 2 2 1 1 => 6 :v
        /*Nếu là chẵn*/
        /*
        if($tx['c5'] == 0 or $tx['c5'] == 2 or $tx['c5'] ==4 AND $cuoc['type'] == "chan") $win = $cuoc['xu']*1.95;
        if($tx['c5'] == 1 or $tx['c5'] == 3 or $tx['c5'] ==5 AND $cuoc['type'] == "le") $win = $cuoc['xu']*1.95;
        
        if($tx['c5'] == 0 or $tx['c5'] ==2 or $tx['c5'] ==4)
        {
            if($dem == 7 AND $cuoc['type'] == "chan3") $win = $cuoc['xu']*3.95;
            if($dem == 8 AND $cuoc['type'] == "chan4") $win = $cuoc['xu']*11.95;
        }
        
        if($tx['c5'] == 1 or $tx['c5'] == 3 or $tx['c5'] ==5)
        {
            if($dem == 5 AND $cuoc['type'] == "le3") $win = $cuoc['xu']*3.95;
            if($dem == 4 AND $cuoc['type'] == "le4") $win = $cuoc['xu']*11.95;
        }
        */
        $cau5 = $tx['c5'];
        if($cau5 == 0 || $cau5 == 2 || $cau5 == 4 AND $cuoc['type'] == "chan") 
        {
            $win+=$cuoc['xu']*1.95;
        }
        
        if($cau5 == 1 || $cau5 == 3 AND $cuoc['type'] == "le") 
        {
            $win+=$cuoc['xu']*1.95;
        }
        
        if($cau5 == 3 AND  $cuoc['type'] == "le3") 
        {
            $win+=$cuoc['xu']*3.95;
        }
        
        if($cau5 == 1 AND $cuoc['type'] == "chan3") 
        {
            $win+=$cuoc['xu']*3.95;
        }
        
        if($cau5 == 0 AND $cuoc['type'] == "le4") 
        {
            $win+=$win+ $cuoc['xu']*11.95;
        }
        
        if($cau5 == 4 AND $cuoc['type'] == "chan4") 
        {
            $win+=$win+ $cuoc['xu']*11.95;
        }
        
        $mmo = new users($cuoc['uid']);
        if($win >=1) // chiến thắng
        {
            $mmo->upxu($win);
            $xuwin = $mmo->thongtin->chanle_win + $win;
            $mmo->upthongtin('chanle_win',$xuwin);
        }
        else
        {
            $xuthua = $mmo->thongtin->chanle_lose + $cuoc['xu'];
            $mmo->upthongtin('chanle_lose',$xuthua);
        }
        $mysqli->query("UPDATE `cuoc_chanle` SET  `thoigian`='".$thoigian."', `nhan` = `nhan` + '".$win."', `cuoc` = '".$type_cuoc."'  WHERE `phien` = '" . $cuoc['phien'] . "' AND `uid`= '".$cuoc['uid']."'");
        
        $mysqli->query("DELETE FROM `cuoc` WHERE `id` = '" . $cuoc['id']. "'");
    }
    /*DucNghia*/
    $phientaixiu = $mysqli->query("SELECT * FROM `phien_taixiu` where  `phien` = '".$tx['id']."'")->fetch_assoc();
    if($phientaixiu['id'] <=0)
    {
        $mysqli->query("INSERT INTO `phien_taixiu` SET `phien` = '".$tx['id']."', `thoigian` = '".$thoigian."', `x1` = '".$tx['x1']."', `x2` = '".$tx['x2']."', `x3` = '".$tx['x3']."', `ketqua` = '".$name."'"); // lịch sử phiên
        $mysqli->query("INSERT INTO `phien_chanle` SET `phien` = '".$tx['id']."', `thoigian` = '".$thoigian."', `x1` = '".$tx['c1']."', `x2` = '".$tx['c2']."', `x3` = '".$tx['c3']."', `x4` = '".$tx['c4']."', `ketqua` = '".$tx['c5']."'"); // lịch sử phiên
        $mysqli->query("INSERT INTO `phien_baucua` SET `phien` = '".$tx['id']."', `thoigian` = '".$thoigian."', `x1` = '".$tx['b1']."', `x2` = '".$tx['b2']."', `x3` = '".$tx['b3']."'"); // lịch sử phiên
        
    }
    
}
/*Game viết bởi DucNghia*/
/*FUNCTION USERS*/

class users
{
    public $id;
    public function users($id)
    {
        global $mysqli;
        $users = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '" . $id . "'")->fetch_array();
        foreach($users as $key => $value)
        {
            $this->{$key} = $value;
        }
        $this->thongtin = json_decode($this->thongtin);
        if (!isset($this->thongtin)) 
        {
            $this->thongtin = new stdClass();
        }
    }
    
    public function up($name, $value)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `$name` = '".$value."' WHERE `id` = '" . $this->id . "'");
    }
    
    public function info()
    {
        return $this->id;
    }
    
    public function upthongtin($name,$value)
    {
        global $mysqli;
        $this->thongtin->$name = $value;
        $mysqli->query("UPDATE `nguoichoi` SET `thongtin` = '" . json_encode($this->thongtin,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "' WHERE `id` = '" . $this->id . "'");
    }
    
    public function upxu($vnd)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `xu` = `xu` +  '" . $vnd . "' WHERE `id` = '" . $this->id . "'");
    }
}
class play
{
    public function play()
    {
        global $mysqli;
        global $thoigian;
        /*Kiểm tra tạo dữ liệu game mới*/
        $game = $mysqli->query("SELECT * FROM `taixiu`")->num_rows;
        
        if($game <=0)
        {
            $newid = 0;
        }
        $taixiu = $mysqli->query("SELECT * FROM `taixiu` ORDER BY `id` DESC LIMIT  1")->fetch_assoc();
        
            $newid = $taixiu['id'];
        
        
        return $newid;
    }
    
}

class taixiu
{
    public $id;
    public function taixiu($id)
    {
      global $mysqli;
      $taixiu = $mysqli->query("SELECT * FROM `taixiu` WHERE `id` = '" . $id . "'")->fetch_array();
      foreach($taixiu as $key => $value)
        {
            $this->{$key} = $value;
        }
    }
    public function up($name,$value)
    {
        global $mysqli;
        $mysqli->query("UPDATE `taixiu` SET `$name` = '" . $value . "' WHERE `id` = '" . $this->id . "'");
    }
}

class cuoc
{
    public $id;
    public function cuoc($id)
    {
        global $mysqli;
        global $uid;
        $cuoc = $mysqli->query("SELECT * FROM `cuoc` WHERE `phien` = '" . $id . "' AND `uid` = '".$uid."' AND `game` = 'taixiu' ")->fetch_array();
        $game = $mysqli->query("SELECT * FROM `cuoc` WHERE `phien` = '" . $id . "' AND `uid` = '".$uid."' AND `game` = 'taixiu'")->num_rows;
        if($game <=0)
        {
           $mysqli->query("INSERT INTO `cuoc` SET `phien` = '".$id."', `uid` = '".$uid."', `game` ='taixiu' "); 
           $cuoc = $mysqli->query("SELECT * FROM `cuoc` WHERE `phien` = '" . $id . "' AND `uid` = '".$uid."' AND `game` = 'taixiu' ")->fetch_array();
        }
        foreach($cuoc as $key => $value)
        {
            $this->{$key} = $value;
        }

    }
    public function moi($cuoc, $type)
    {
        global $mysqli;
        $mysqli->query("INSERT INTO `cuoc` SET `phien` = '".$this->phien."', `uid` = '".$this->uid."', `xu` = '".$cuoc."', `type` = '".$type."', `game` ='taixiu' "); 
        
    }
    public function up($name,$value)
    {
        global $mysqli;
        $mysqli->query("UPDATE `cuoc` SET `$name` = '" . $value . "' WHERE `id` = '" . $this->id . "'");
    }
}

class baucua
{
    public $id;
    public function baucua($id)
    {
        global $mysqli;
        global $uid;
        $cuoc = $mysqli->query("SELECT * FROM `cuoc` WHERE `phien` = '" . $id . "' AND `uid` = '".$uid."' AND `game` = 'baucua' ")->fetch_array();
        $game = $mysqli->query("SELECT * FROM `cuoc` WHERE `phien` = '" . $id . "' AND `uid` = '".$uid."' AND `game` = 'baucua'")->num_rows;
        if($game <=0)
        {
           $mysqli->query("INSERT INTO `cuoc` SET `phien` = '".$id."', `uid` = '".$uid."', `game` ='baucua' "); 
           $cuoc = $mysqli->query("SELECT * FROM `cuoc` WHERE `phien` = '" . $id . "' AND `uid` = '".$uid."' AND `game` = 'baucua' ")->fetch_array();
        }
        foreach($cuoc as $key => $value)
        {
            $this->{$key} = $value;
        }

    }
    public function moi($cuoc, $type)
    {
        global $mysqli;
        $mysqli->query("INSERT INTO `cuoc` SET `phien` = '".$this->phien."', `uid` = '".$this->uid."', `xu` = '".$cuoc."', `type` = '".$type."', `game` ='baucua' "); 
        
    }
    public function up($name,$value)
    {
        global $mysqli;
        $mysqli->query("UPDATE `cuoc` SET `$name` = '" . $value . "' WHERE `id` = '" . $this->id . "'");
    }
}


class chanle
{
    public $id;
    public function chanle($id)
    {
        global $mysqli;
        global $uid;
        $cuoc = $mysqli->query("SELECT * FROM `cuoc` WHERE `phien` = '" . $id . "' AND `uid` = '".$uid."' AND `game` = 'chanle' ")->fetch_array();
        $game = $mysqli->query("SELECT * FROM `cuoc` WHERE `phien` = '" . $id . "' AND `uid` = '".$uid."' AND `game` = 'chanle'")->num_rows;
        if($game <=0)
        {
           $mysqli->query("INSERT INTO `cuoc` SET `phien` = '".$id."', `uid` = '".$uid."', `game` ='chanle' "); 
           $cuoc = $mysqli->query("SELECT * FROM `cuoc` WHERE `phien` = '" . $id . "' AND `uid` = '".$uid."' AND `game` = 'chanle' ")->fetch_array();
        }
        foreach($cuoc as $key => $value)
        {
            $this->{$key} = $value;
        }

    }
    public function moi($cuoc, $type)
    {
        global $mysqli;
        $mysqli->query("INSERT INTO `cuoc` SET `phien` = '".$this->phien."', `uid` = '".$this->uid."', `xu` = '".$cuoc."', `type` = '".$type."', `game` ='chanle' "); 
        
    }
    public function up($name,$value)
    {
        global $mysqli;
        $mysqli->query("UPDATE `cuoc` SET `$name` = '" . $value . "' WHERE `id` = '" . $this->id . "'");
    }
}

$poker = array(
    
"0" => array("so" => 0 , "type" => "0"),
"1" => array("so" => 1 , "type" => "bich"),
"2" => array("so" => 2 , "type" => "bich"),
"3" => array("so" => 3 , "type" => "bich"),
"4" => array("so" => 4 , "type" => "bich"),
"5" => array("so" => 5 , "type" => "bich"),
"6" => array("so" => 6 , "type" => "bich"),
"7" => array("so" => 7 , "type" => "bich"),
"8" => array("so" => 8 , "type" => "bich"),
"9" => array("so" => 9 , "type" => "bich"),
"10" => array("so" => 10 , "type" => "bich"),
"11" => array("so" => 11 , "type" => "bich"),
"12" => array("so" => 12 , "type" => "bich"),
"13" => array("so" => 13 , "type" => "bich"),

"14" => array("so" => 1 , "type" => "tep"),
"15" => array("so" => 2 , "type" => "tep"),
"16" => array("so" => 3 , "type" => "tep"),
"17" => array("so" => 4 , "type" => "tep"),
"18" => array("so" => 5 , "type" => "tep"),
"19" => array("so" => 6 , "type" => "tep"),
"20" => array("so" => 7 , "type" => "tep"),
"21" => array("so" => 8 , "type" => "tep"),
"22" => array("so" => 9 , "type" => "tep"),
"23" => array("so" => 10 , "type" => "tep"),
"24" => array("so" => 11 , "type" => "tep"),
"25" => array("so" => 12 , "type" => "tep"),
"26" => array("so" => 13 , "type" => "tep"),

"27" => array("so" => 1 , "type" => "ro"),
"28" => array("so" => 2 , "type" => "ro"),
"29" => array("so" => 3 , "type" => "ro"),
"30" => array("so" => 4 , "type" => "ro"),
"31" => array("so" => 5 , "type" => "ro"),
"32" => array("so" => 6 , "type" => "ro"),
"33" => array("so" => 7 , "type" => "ro"),
"34" => array("so" => 8 , "type" => "ro"),
"35" => array("so" => 9 , "type" => "ro"),
"36" => array("so" => 10 , "type" => "ro"),
"37" => array("so" => 11 , "type" => "ro"),
"38" => array("so" => 12 , "type" => "ro"),
"39" => array("so" => 13 , "type" => "ro"),

"40" => array("so" => 1 , "type" => "co"),
"41" => array("so" => 2 , "type" => "co"),
"42" => array("so" => 3 , "type" => "co"),
"43" => array("so" => 4 , "type" => "co"),
"44" => array("so" => 5 , "type" => "co"),
"45" => array("so" => 6 , "type" => "co"),
"46" => array("so" => 7 , "type" => "co"),
"47" => array("so" => 8 , "type" => "co"),
"48" => array("so" => 9 , "type" => "co"),
"49" => array("so" => 10 , "type" => "co"),
"50" => array("so" => 11 , "type" => "co"),
"51" => array("so" => 12 , "type" => "co"),
"52" => array("so" => 13 , "type" => "co"),
);


function phucsinh($d1,$d2,$d3)
{
    if($d1 == $d2 AND $d2 == $d3 AND $d3 == $d1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function tron($k)
{
    if($k < 1000) return $k;
    else if($k>=1000 AND $k < 1000000) return number_format($k/1000).'K';
    else if($k>=1000000) return number_format($k/1000000).'M';
}
//hugame_realtime('3,173633,940923,957206,6917886,2831073@4,513800,6689000,30455000,64900000,0@5,656843,7559864,36833365,54028469,0@6,2081304,6907678,61872593,68069600,0@9,932351,5440939,40226235,67812040,0@')
class hu
{
    public $id;
    public function hu()
    {
      global $mysqli;
      $hu = $mysqli->query("SELECT * FROM `hu` WHERE `id` = '1'")->fetch_array();
      foreach($hu as $key => $value)
        {
            $this->{$key} = $value;
        }
    }
    
    public function gethu($g,$tien)
    {
        global $mysqli;
        $count  = explode(",",$this->{'g'.$g.''});
        $h100   = $count[0];
        $h1000  = $count[1];
        $h5000  = $count[2];
        $h10000 = $count[3];
        if($tien == 100) return $h100;
        else if($tien == 1000)  return $h1000;
        else if($tien == 5000)  return $h5000;
        else if($tien == 10000)  return $h10000;
    }
    
    
    public function up($g,$tien)
    {
        global $mysqli;
        $count  = explode(",",$this->{'g'.$g.''});
        $h100   = $count[0];
        $h1000  = $count[1];
        $h5000  = $count[2];
        $h10000 = $count[3];
        if($tien == 100) $h100 = $h100 + 100*0.95;
        else if($tien == 1000) $h1000 = $h1000 + 1000*0.95;
        else if($tien == 5000) $h5000 = $h5000 + 5000*0.95;
        else if($tien == 10000) $h10000 = $h10000 + 10000*0.95;
        $ket = ''.$h100.','.$h1000.','.$h5000.','.$h10000.'';
        $mysqli->query("UPDATE `hu` SET `g".$g."` = '" . $ket . "' WHERE `id` = '" . $this->id . "'");
    }
    
    public function moi($g,$tien)
    {
        global $mysqli;
        $count  = explode(",",$this->{'g'.$g.''});
        $h100   = $count[0];
        $h1000  = $count[1];
        $h5000  = $count[2];
        $h10000 = $count[3];
        if($tien == 100) $h100 = 300000;
        else if($tien == 1000) $h1000 = 1000000;
        else if($tien == 5000) $h5000 = 10000000;
        else if($tien == 10000) $h10000 = 50000000;
        $ket = ''.$h100.','.$h1000.','.$h5000.','.$h10000.'';
        $mysqli->query("UPDATE `hu` SET `g".$g."` = '" . $ket . "' WHERE `id` = '" . $this->id . "'");
    }
}

function nohu($game,$tien,$win,$id)
{
    $mysqli->query("INSERT INTO `nohu` SET `type` = '".$game."',`xucuoc` = '".$tien."',`xunhan` = '".$win."', `uid` = '".$id."', `thoigian` = '".$thoigian."' ");
}

function msg($text)
{
    $mysqli->query("INSERT INTO `msg` SET `text` = '".$text."' ");
}

function guithu($title,$msg,$uid)
{
    $mysqli->query("INSERT INTO `thu` SET `text` = '".$msg."', `name` = '".$title."', `thoigian` = '".$thoigian."', `uid` = '".$uid."' ");
}

/*
BOT HŨ
*/

$hu  = new hu();
$type = rand(1,10);
$ngchoi = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `bot` = '1' ORDER BY RAND() LIMIT  1")->fetch_assoc();
$t = array(100,1000,5000,10000);
if($type ==5)
{
    $tien = $t[rand(0,3)];
    if(rand(1,10) ==10) 
    {
       $tien = $hu->gethu(5,$cuoc);
       $d->trunghu = $tien; 
       msg('Người chơi '.$ngchoi['taikhoan'].' đã nổ hũ nhận được '.$tien.'  ');
       nohu('phucsinh',$cuoc,$tien,$id);
       $hu->moi(5,$cuoc);
    }
    $hu->up('5',$cuoc);
}

if($type ==4)
{
    $tien = $t[rand(0,3)];
    if(rand(1,10) ==10) 
    {
       $tien = $hu->gethu(4,$cuoc);
       $d->trunghu = $tien; 
       msg('Người chơi '.$ngchoi['taikhoan'].' đã nổ hũ nhận được '.$tien.'  ');
       nohu('poker',$cuoc,$tien,$id);
       $hu->moi(4,$cuoc);
    }
    $hu->up('4',$cuoc);
}

if($type ==9)
{
    $tien = $t[rand(0,3)];
    if(rand(1,10) ==10) 
    {
       $tien = $hu->gethu(9,$cuoc);
       $d->trunghu = $tien; 
       msg('Người chơi '.$ngchoi['taikhoan'].' đã nổ hũ nhận được '.$tien.'  ');
       nohu('sieuxe',$cuoc,$tien,$id);
       $hu->moi(9,$cuoc);
    }
    $hu->up('9',$cuoc);
}

if($type ==6)
{
    $tien = $t[rand(0,3)];
    if(rand(1,10) ==10) 
    {
       $tien = $hu->gethu(6,$cuoc);
       $d->trunghu = $tien; 
       msg('Người chơi '.$ngchoi['taikhoan'].' đã nổ hũ nhận được '.$tien.'  ');
       nohu('wild',$cuoc,$tien,$id);
       $hu->moi(6,$cuoc);
    }
    $hu->up('6',$cuoc);
}

$lode = $mysqli->query("SELECT * FROM `lode` WHERE `thoigian` = '".$ngaythangnam."' ORDER BY `id` DESC LIMIT  1")->fetch_assoc();
if($lode['id'] <=0)
{
    $mysqli->query("INSERT INTO `lode` SET `thoigian` = '".$ngaythangnam."'");
}

function trang($url, $start, $total, $kmess) {
    $out[] = '<div class="row"><center><ul class="pagination">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li><a class="pagenav" href="' . strtr($url, array('%' => '%%')) . 'p=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '&lt;&lt; Trang Tr&#432;&#7899;c');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li><a>...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="active"><a>' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li><a>...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total) {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, 'Trang Ti&#7871;p &gt;&gt;');
    }
    $out[] = '</ul></center></div>';
    return implode('', $out);
}