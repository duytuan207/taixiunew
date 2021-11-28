<?php
include_once('../function/config.php');

?>
<div class="modal fade" id="ho_tro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="popup-content" style="    background-size: 101% 105%;

  ">
<div class="popup-header">
<img src="/images/close-btn.png" data-dismiss="modal" style="float: right;
    width: 7%;
    margin-top: -2%;">
<h4 class="popup-title" style="margin-left: 10%;
    margin-top: 2%;" id="myModalLabel">Hỗ trợ</h4>
</div>
<div class="modal-body" style="padding: 35px;">
<div class="popup-body">

 <div class="form pt-3">
                                    <center>
                                        
                                    <div class="form-group">
<a href="<?=$site['site_fanpage']?>" target="_blank"><img src="/images/img-fanpage.png"></a>
                                           </div>
                  <div class="form-group">
<a href="<?=$site['site_group']?>" target="_blank"><img src="/images/img-group.png"></a>
                                           </div>       
                                                             <div class="form-group">
<a href="<?=$site['site_telegram']?>" target="_blank"><img src="/images/icon_tele.png"></a>
                                           </div>  
                                                                                  <div class="form-group">
<font color="yellow"><b>Hotline: <?=$site['site_hotline']?></b></font>
                                           </div>  


            
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
        $('#ho_tro').modal('show');

</script>
