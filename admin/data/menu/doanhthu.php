<?PHP
$ab = $mysqli->query("SELECT * FROM `doanhthu`  ORDER by id DESC LIMIT $start, $kmess ");
if ($mysqli->query("SELECT * FROM `doanhthu`")->num_rows > $kmess)
{
    $trang = '<center>' . trang('get/doanhthu&', $start, $mysqli->query("SELECT * FROM `doanhthu`")->num_rows, $kmess) . '</center>';
}
while($a=$ab->fetch_assoc())
{ 
    $list .= '<tr><td>'.$a['date'].'</td> <td>'.number_format($a['thu']).'</td> <td>'.number_format($a['mat']).'</td></tr>';
}

?>
 <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Doanh thu</h4>
                  <p class="card-category"> Danh sách doanh thu các ngày gần đây</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                       <th>Thời gian</th> <td>Thu về</td> <td>Thiệt hại</td> 
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