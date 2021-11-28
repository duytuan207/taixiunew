
<?php
include_once('../function/config.php');
if((!$_SESSION['username'])){
               echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập", "");</script>';
               exit();
        }

?>

 <div class="modal fade" id="hom_thu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 105%;

  ">
<div class="popup-header">
<img src="/images/close-btn.png" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -3%;">
<h4 class="popup-title" style="margin-left: 10%;
    margin-top: 3%;" id="myModalLabel">Hòm thư của bạn</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

 <div class="khung-body" style="overflow: scroll; height: 200px" >
                                    <center>
                                        
                                        <?php
                                         
                                         $data_ht = $mysqli->query("SELECT * FROM `homthu` WHERE `username` = '".$datauser->taikhoan."' ORDER by id DESC");
   
    while($thongtinht=$data_ht->fetch_assoc()) {
    
                                        
                                        
                                        echo'<div class="khung-homthu"><b>
                                      
                                        '.$thongtinht['noidung'].' </b></br>
                                        '.$thongtinht['thoigian'].'
                                        </div>';
        }
        
                                        ?>
                                        
                                       
                                            
            
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
        $('#hom_thu').modal('show');

</script>
