<?PHP
if(isset($_GET['name']))
{
    if($_GET[code] ==0)
    {
        $code = 1;
    }
    else
    {
        $code = 0;
    }
    $mysqli->query("UPDATE `nguoichoi` SET `do` = '".$code."' where `id` = '".$_GET['name']."'");
    echo'thanh cong';
}
$ab = $mysqli->query("SELECT * FROM `nguoichoi`  ORDER by id DESC LIMIT $start, $kmess ");
if ($mysqli->query("SELECT * FROM `nguoichoi`")->num_rows > $kmess)
{
    $trang = '<center>' . trang('get/nguoichoi&', $start, $mysqli->query("SELECT * FROM `nguoichoi`")->num_rows, $kmess) . '</center>';
}
while($a=$ab->fetch_assoc())
{ 
    $c = json_decode($a['thongtin'],true);
    $list .= '<tr><td>'.$a['id'].'</td> <td>'.($a['do'] >=1 ? '<font color="red">'.$a['taikhoan'].'</font>' : ''.$a['taikhoan'].'').' '.$c['server'].'</td> <td>'.number_format($a['xu']).'</td><td><a href="get/edit&id='.$a['id'].'">Chi tiết</a></td></tr>';
} 

?>
 <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Tài khoản <a href="get/xu">[XẾP THEO SỐ TIỀN CÓ]</a></h4>
                  <p class="card-category"> Danh sách tài khoản người dùng</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                       <th>Id</th> <td>Tài khoản</td> <td>Xu</td> <td>Edit</td>
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