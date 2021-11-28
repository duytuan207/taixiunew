<?PHP

$ab = $mysqli->query("SELECT * FROM `lichsu` WHERE `admin` = '".$_GET['id']."'  ORDER by id DESC LIMIT $start, $kmess ");
if ($mysqli->query("SELECT * FROM `lichsu` WHERE `admin` = '".$_GET['id']."'")->num_rows > $kmess)
{
    $trang = '<center>' . trang('get/lichsunap&', $start, $mysqli->query("SELECT * FROM `lichsu` WHERE `admin` = '".$_GET['id']."'")->num_rows, $kmess) . '</center>';
}
while($a=$ab->fetch_assoc())
{ 
    $u = new users($a['uid']);
    $list .= '<tr><td>'.$a['thoigian'].'</td><td>'.$u->taikhoan.' ['.$u->id.']</td><td>'.$a['noidung'].'</td></tr>';
}

?>

 <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Lịch sử nạp tiền</a></h4>
                  <p class="card-category"> Lịch sử nạp tiền của admin <a href="get/lichsunap&id=<?=$_GET['id']?>"> <font color="red"><?=$_GET['id']?></font></a></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                       <td>Thời gian</td> <td>Người dùng được nạp</td> <td>Nội dung</td> 
                      </thead>
                      <tbody>
                       
                      <?=$list?>
                        
                      </tbody>
                    </table>
                    
                  </div>
                  <?=$trang?>
                </div>
                
              </div>
            </div>
          </div>
          
          

          
   