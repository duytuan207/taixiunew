
<script>
//https://javascriptobfuscator.com/Javascript-Obfuscator.aspx
//http://beautifytools.com/javascript-obfuscator.php#
socket.emit("admin",1);
socket.on("admin", function(data)
{
    var game = data;
        game = JSON.parse(decode(game));
        var cuoc = game.cuoc;
        data = game.taixiu;
        $("#idphien").html('#'+data.id);
       if(data.trangthai == "dangchay")
       {
           $("#trangthai").html('<font color="green">Đang chạy</font> ');
       }
       if(data.trangthai == "dangtinh")
       {
           $("#trangthai").html('<font color="red">Đang cân kèo </font>');
       }
       
       if(data.trangthai == "ketqua")
       {
           $("#trangthai").html('<font color="blue">Hiển thị kết quả</font>');
       }
       
       if(data.trangthai == "hoanthanh")
       {
           $("#trangthai").html('<font color="red">Chờ tạo phiên mới</font> ');
       }
       $("#xuc_xac_1").html('<img onclick="taixiu(\'0x1\')" src="img/taixiu/'+data.x1+'.png">');
       $("#xuc_xac_2").html('<img onclick="taixiu(\'0x2\')" src="img/taixiu/'+data.x2+'.png">');
       $("#xuc_xac_3").html('<img onclick="taixiu(\'0x3\')" src="img/taixiu/'+data.x3+'.png">');
       
       $("#b1").html('<img onclick="baucua(\'0b1\')" src="img/baucua/'+data.b1+'.png">');
       $("#b2").html('<img onclick="baucua(\'0b2\')" src="img/baucua/'+data.b2+'.png">');
       $("#b3").html('<img onclick="baucua(\'0b3\')" src="img/baucua/'+data.b3+'.png">');
       
       $("#tientai").html(''+data.at+'/'+data.t+'');
       $("#tienxiu").html(''+data.ax+'/'+data.x+'');
       $("#c1").html(data.c1);
       $("#c2").html(data.c2);
       $("#c3").html(data.c3);
       $("#c4").html(data.c4);
       $("#c5").html(data.c5);
       
       var cuoctai = '';
       var cuocxiu = '';
       var baucua = '';
       for(var i=0;i<cuoc.length;i++)
       {
           var d = cuoc[i];
           if(d.type == "tai" && d.id != 0 && d.game == 'taixiu')
           {
               cuoctai+=''+d.id+' - <b>'+d.xu+' xu</b>, ';
           }
           
           if(d.type == "xiu" && d.id != 0  && d.game == 'taixiu')
           {
               cuocxiu+=''+d.id+' - <b>'+d.xu+' xu</b>, ';
           }
           
           
           if(d.id != 0  && d.game == 'baucua')
           {
               baucua+=''+d.id+' - <b>'+d.xu+' xu</b>, ';
           }
           
       }
       $("#cuoctai").html(cuoctai);
       $("#cuocxiu").html(cuocxiu);
       $("#cuoc_baucua").html(baucua);
        
        
}

);



function decode(h) {
    var s = ''; 
    h = h.replace(/ /g,'');
    for (var i = 0; i < h.length; i+=2) {
        s += String.fromCharCode(parseInt(h.substr(i, 2), 16))
    }
    return decodeURIComponent(escape(s))
}

function encode(s) {
    s = unescape(encodeURIComponent(s))
    var h = ''
    for (var i = 0; i < s.length; i++) {
        h += ' '+s.charCodeAt(i).toString(16)
    }
    return h
}

    function taixiu(id)
    {
        var a = '<hr><center>Bạn muốn chọn xí ngầu gì</center>';
        for(var i=0;i<=6;i++)
        {
            a+='<img onclick="chontaixiu(\''+id+'\','+i+')" src="img/taixiu/'+i+'.png">';
        }
        a+='<hr>';
        $("#chon_taixiu").html(a);
    }
    
    function baucua(id)
    {
        var a = '<hr><center>Bạn muốn chọn con gì</center>';
        for(var i=0;i<=6;i++)
        {
            a+='<img onclick="chontaixiu(\''+id+'\','+i+')" src="img/baucua/'+i+'.png">';
        }
        a+='<hr>';
        $("#chon_baucua").html(a);
    }
    
    function chontaixiu(id,value)
    {
        
    	   socket.emit("tool",encode(JSON.stringify({xingau : id, so : value})));
    	        	
    }
    
    function chanle()
    {
         $.ajax({
            	       	url         : 'd/chanle',
    	            	type        : 'POST',
    	            	data        : $("#ducnghia_form").find("select, textarea, input").serialize(),
                  	    success : function(result){
                  	        md.showNotification('bottom','left',result);
                  	        
    	            	}
    	        	});
    }
    function reset()
    {
        socket.emit("update",1);
    }
</script>
<div class="row">
    <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                      Thông tin phiên
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="">
                        Phiên ID : <b id="idphien">0</b> <br>
                        Trạng thái : <b id="trangthai">Load</b> <br>
                        Số người/tiền tài : <b id="tientai">0/0</b><br>
                        Số người/tiền xỉu : <b id="tienxiu">0/0</b> <br>
                        <hr>
                        <button onclick="reset()">FIX LỖI ĐƠ PHIÊN*</button>
                        <font color="red"><b>* : Chỉ ấn khi mà phiên bị đơ. Khi ấn sẽ làm mới phiên đồng nghĩa với việc đang cược sẽ bị mất tiền. Để tránh mất tiền người chơi hãy nhìn vào <i>Danh sách cược tài, xỉu</i> rồi cộng lại tiền cho người chơi trước khi ấn nút này.</b></font>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?=$msg?>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                      Cược Tài - Xỉu
                      <p class="card-category">Đã ẩn BOT đặt</p>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="">
                        <font color="red">Kết quả :</font>
                        <b id="xuc_xac_1"></b> <b id="xuc_xac_2"></b> <b id="xuc_xac_3"></b>
                        
                        <b id="chon_taixiu"></b>
                        <br>
                        <font color="green">Danh sách cược tài :</font><b id="cuoctai"></b>
                        <br>
                        <font color="blue">Danh sách cược xỉu :</font><b id="cuocxiu"></b>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                      Cược Bầu cua
                      <p class="card-category">Đã ẩn BOT đặt</p>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="">
                        <font color="red">Kết quả :</font>
                        <b id="b1"></b> <b id="b2"></b> <b id="b3"></b>
                        
                        <b id="chon_baucua"></b>
                        <br>
                        <font color="green">Danh sách cược  :</font><b id="cuoc_baucua"></b>
                        
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>