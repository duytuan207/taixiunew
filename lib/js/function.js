var tien = 0;
var khunggame = [];






function decode(_0x90f8x9) {
    var _0x90f8x5 = '';
    _0x90f8x9 = _0x90f8x9['replace'](/ /g, '');
    for (var _0x90f8xa = 0; _0x90f8xa < _0x90f8x9['length']; _0x90f8xa += 2) {
        _0x90f8x5 += String['fromCharCode'](parseInt(_0x90f8x9['substr'](_0x90f8xa, 2), 16))
    };
    return decodeURIComponent(escape(_0x90f8x5))
}

function encode(_0x90f8x5) {
    _0x90f8x5 = unescape(encodeURIComponent(_0x90f8x5));
    var _0x90f8x9 = '';
    for (var _0x90f8xa = 0; _0x90f8xa < _0x90f8x5['length']; _0x90f8xa++) {
        _0x90f8x9 += ' ' + _0x90f8x5['charCodeAt'](_0x90f8xa).toString(16)
    };
    return _0x90f8x9
}






function njs(_0x90f8x4) {
    var _0x90f8x20 = String(_0x90f8x4);
    var _0x90f8x21 = _0x90f8x20['length'];
    var _0x90f8x22 = 0;
    var _0x90f8x23 = '';
    var _0x90f8xa;
    for (_0x90f8xa = _0x90f8x21 - 1; _0x90f8xa >= 0; _0x90f8xa--) {
        _0x90f8x22 += 1;
        aa = _0x90f8x20[_0x90f8xa];
        if (_0x90f8x22 % 3 == 0 && _0x90f8x22 != 0 && _0x90f8x22 != _0x90f8x21) {
            _0x90f8x23 = '.' + aa + _0x90f8x23
        } else {
            _0x90f8x23 = aa + _0x90f8x23
        }
    };
    return _0x90f8x23
}


function check_all(_0x90f8x25) {
    $['ajax']({
        type: 'post',
        url: '/user-play',
        data: {
            user_check: true,
            check_game: _0x90f8x25
        },
        success: function (_0x90f8x5) {
            var _0x90f8x6 = JSON['parse'](_0x90f8x5);
            $('.mymoney')['html'](njs(_0x90f8x6['money']));
            $('.mymoneyket')['html'](njs(_0x90f8x6['moneyket']));

        
        }
    });
    return false
}



function Load_Game(_0x90f8x4, _0x90f8x2a) {
    if (khunggame[0] == 1 && khunggame[_0x90f8x2a] == 1) {
        $('#' + _0x90f8x2a)['show']('fade', {}, 500)
    } else {
        if (khunggame[0] == 1) {
            if (checkCookie(_0x90f8x2a) == false) {
                var _0x90f8x2b = 30
            } else {
                var _0x90f8x2b = 5
            };
            $('.progress_' + _0x90f8x2a)['append']('<div class=\"progress_main\" style=\"    top: 45%;z-index: 9999;\"><div class=\"progress_load\"></div><div class=\"progress_time\" style=\"font-size: 25px;\"></div></div>');
            (function _0x90f8x2c(_0x90f8xa) {
                setTimeout(function () {
                    $('.progress_' + _0x90f8x2a + ' .progress_load')['css']({
                        width: _0x90f8xa + '%'
                    });
                    $('.progress_' + _0x90f8x2a + ' .progress_time')['html']('Load ' + _0x90f8xa + '%');
                    if (++_0x90f8xa < 100) {
                        _0x90f8x2c(_0x90f8xa)
                    } else {
                        $('#' + _0x90f8x2a)['show']();
                        _0x90f8x2b = 0;
                        $('.progress_' + _0x90f8x2a + ' .progress_main')['hide']()
                    }
                }, _0x90f8x2b)
            })(0);
            khunggame[_0x90f8x2a] = 1;
            $['ajax']({
                type: 'post',
                url: '/user',
                data: {
                    load_game: true,
                    game_load: _0x90f8x4
                },
                success: function (_0x90f8x5) {
                    $('.main-game')['append'](_0x90f8x5);
                    $('#' + _0x90f8x2a)['hide']();
                    if (checkCookie(_0x90f8x2a) == true) {
                        $('#' + _0x90f8x2a)['show']()
                    };
                    setCookie(_0x90f8x2a, '1', 0.1)
                }
            })
        }
    }
}



function set_img(_0x90f8x4, _0x90f8x2a, _0x90f8x11) {
    _0x90f8x4 = (100 / Math['floor'](_0x90f8x2a)) * Math['floor'](_0x90f8x4);
    if (_0x90f8x11) {
        _0x90f8x4 = _0x90f8x4 + _0x90f8x11
    };
    return _0x90f8x4
}



function setCookie(_0x90f8x32, _0x90f8x33, _0x90f8x34) {
    var _0x90f8x35 = new Date();
    if (_0x90f8x34) {
        _0x90f8x35['setTime'](_0x90f8x35['getTime']() + (_0x90f8x34 * 24 * 60 * 60 * 1000));
        document['cookie'] = _0x90f8x32 + '=' + _0x90f8x33 + ';expires=' + _0x90f8x35['toUTCString']()
    } else {
        document['cookie'] = _0x90f8x32 + '=' + _0x90f8x33 + ';expires=Fri, 30 Dec 9999 23:59:59 GMT;'
    }
}



function check_click(_0x90f8x4) {
    if (_0x90f8x4['data']('click') != 'click') {
        _0x90f8x4['data']('click', 'click');
        setTimeout(function () {
            _0x90f8x4['removeData']('click')
        }, 300);
        return true
    };
    return false
}
$(document)['ready'](function () {});

function numanimate(_0x90f8x4, _0x90f8x2a) {
    var _0x90f8x39 = Math['floor'](_0x90f8x4['val']());
    var _0x90f8x3a = (Math['floor'](_0x90f8x2a) - Math['floor'](_0x90f8x4['val']())) / 10;
    (function _0x90f8x2c(_0x90f8xa) {
        setTimeout(function () {
            _0x90f8x4['html'](njs(Math['floor'](_0x90f8x39 + (11 - _0x90f8xa) * _0x90f8x3a)));
            if (--_0x90f8xa) {
                _0x90f8x2c(_0x90f8xa)
            } else {
                _0x90f8x4['val'](_0x90f8x2a)
            }
        }, 30)
    })(10)
}

function numanimate_2(_0x90f8x4, _0x90f8x2a, _0x90f8x19) {
    var _0x90f8x3c = Math['floor'](_0x90f8x19);
    var _0x90f8x39 = Math['floor'](_0x90f8x4['val']());
    var _0x90f8x3a = (Math['floor'](_0x90f8x2a) - Math['floor'](_0x90f8x4['val']())) / _0x90f8x3c;
    (function _0x90f8x2c(_0x90f8xa) {
        setTimeout(function () {
            _0x90f8x4['html'](njs(Math['floor'](_0x90f8x39 + (_0x90f8x3c + 1 - _0x90f8xa) * _0x90f8x3a)));
            if (--_0x90f8xa) {
                _0x90f8x2c(_0x90f8xa)
            } else {
                _0x90f8x4['val'](_0x90f8x2a)
            }
        }, 40)
    })(_0x90f8x3c)
}

function getCookie(_0x90f8x3e) {
    var _0x90f8x3f = _0x90f8x3e + '=';
    var _0x90f8x40 = document['cookie']['split'](';');
    for (var _0x90f8xa = 0; _0x90f8xa < _0x90f8x40['length']; _0x90f8xa++) {
        var _0x90f8x11 = _0x90f8x40[_0x90f8xa];
        while (_0x90f8x11['charAt'](0) == ' ') {
            _0x90f8x11 = _0x90f8x11['substring'](1)
        };
        if (_0x90f8x11['indexOf'](_0x90f8x3f) == 0) {
            return _0x90f8x11['substring'](_0x90f8x3f['length'], _0x90f8x11['length'])
        }
    };
    return ''
}

function checkCookie(_0x90f8x3e) {
    var _0x90f8x42 = getCookie(_0x90f8x3e);
    if (_0x90f8x42 != '') {
        return true
    } else {
        return false
    }
}
$(document)['ready'](function () {
    check_all(0);

    khunggame[0] = 1;
    //Load_Game(1, 'game-taixiu');
        //Load_Game(3, 'khung-chat');


});
$(document)['on']('click', 'a', function (_0x90f8x43) {
    /*Load trang
    _0x90f8x43['preventDefault']();
    var _0x90f8x44 = $(this)['attr']('href');
    var _0x90f8x14 = _0x90f8x44['split']('//');
    if (!_0x90f8x14[1]) {
        if (_0x90f8x44 != '#menu' && _0x90f8x44 != '#loadtrang' && _0x90f8x44 != '#' && _0x90f8x44 != '#home') {
            getContent(_0x90f8x44)
        }
    } else {
        getContent(_0x90f8x44)
    }
    */
});
window['addEventListener']('popstate', function (_0x90f8x16) {
    getContent(location['pathname'], false)
});

function getContent(_0x90f8x46, _0x90f8x47) {
    loadingView = false;
    var _0x90f8x48 = new XMLHttpRequest();
    _0x90f8x48['onreadystatechange'] = function () {
        if (this['readyState'] == 4 && this['status'] == 200) {
            $('#loadtrang')['html'](this['responseText'])
        }
    };
    _0x90f8x48['open']('POST', _0x90f8x46, true);
    _0x90f8x48['setRequestHeader']('Content-type', 'application/x-www-form-urlencoded');
    _0x90f8x48['send']('t=1&load=1');
    history['pushState']('object or string representing the state of the page', 'Xin Chao', _0x90f8x46)
}


function chat() {
    $['ajax']({
        url: '/type/send.php?chat',
        type: 'POST',
        data: {
            chat: $('#name_chat')['val']()
        },
        success: function (chat) {
            if (chat['type'] == 'Thành công') {
                $('#phongchat')['html'](chat['center'] + $('#phongchat')['html']());
                $('#name_chat')['val']('');

       
            } else {
                thongbao(chat['msg'], chat['type'])
            }
        }
    })
}




setInterval(function () {
    check_all(1);
}, 1000);
setInterval(function(){
 $( ".taixiu" ).load( "/f5-reload.php" );
 }, 1000);
setInterval(function(){
 $( "#ls_cuoc" ).load( "/ls_cuoc.php" );
 }, 1000);

 
 
var loadcontent ='<img src="/lib/img/loading.gif" witdh="20">';
$(document).ready(function(){
$('#reloadd').html(loadcontent);
$('#reloadd').load('/f5-reloadd.php');



var refreshId = setInterval(function(){
$('#reloadd').load('/f5-reloadd.php');
$('#reloadd').slideDown('slow');
},15000);


});
 
 function thoatgame()
{
    $.ajax({
        url : '/game/send?exit',
        type : 'POST',
        success : function(d)
        {
            
            window.location.reload();
        }
        
    });
}


function datxiu()
{
    $.ajax({
        url : '/game/send?datxiu',
        type : 'POST',
        data : $("#form_datxiu").find("select, textarea, input").serialize(),
        success : function(d)
        {
            $("#notice_datxiu").html(d.msg);
            thongbao(d.msg,d.type);
                    if (d.type=='thanhcong'){
                                showStt('Đặt cược thành công');

                                 $('#moneyxiu')['val']('');
            }



            
        }
        
    });
}

function dattai()
{
    $.ajax({
        url : '/game/send?dattai',
        type : 'POST',
        data : $("#form_dattai").find("select, textarea, input").serialize(),
        success : function(d)
        {
            $("#notice_dattai").html(d.msg);
            thongbao(d.msg,d.type);
            if (d.type=='thanhcong'){
                                showStt('Đặt cược thành công');

                                 $('#moneytai')['val']('');
            }



            
        }
        
    });
}
function openketsat()
{
    $.ajax(
        {
            url : '/public/ketsat.php',
            data : {},
            type : 'POST',
            success : function(d)
            {

                $("#hien").html(d);

            }
        }
        
        );
}
function openruttien()
{
    $.ajax(
        {
            url : '/public/ruttien.php',
            data : {},
            type : 'POST',
            success : function(d)
            {

                $("#hien").html(d);

            }
        }
        
        );
}
function opennapthe()
{
    $.ajax(
        {
            url : '/public/naptien.php',
            data : {},
            type : 'POST',
            success : function(d)
            {

                $("#hien").html(d);

            }
        }
        
        );
}
function opendangnhap()
{
    $.ajax(
        {
            url : '/public/dangnhap.php',
            data : {},
            type : 'POST',
            success : function(d)
            {

                $("#hien").html(d);

            }
        }
        
        );
}
function opendangky()
{
    $.ajax(
        {
            url : '/public/dangky.php',
            data : {},
            type : 'POST',
            success : function(d)
            {

                $("#hien").html(d);

            }
        }
        
        );
}

function openhomthu()
{
    $.ajax(
        {
            url : '/public/homthu.php',
            data : {},
            type : 'POST',
            success : function(d)
            {

                $("#hien").html(d);

            }
        }
        
        );
}

function opengiftcode()
{
    $.ajax(
        {
            url : '/public/giftcode.php',
            data : {},
            type : 'POST',
            success : function(d)
            {

                $("#hien").html(d);

            }
        }
        
        );
}
function openchuyentien()
{
    $.ajax(
        {
            url : '/public/chuyentien.php',
            data : {},
            type : 'POST',
            success : function(d)
            {

                $("#hien").html(d);

            }
        }
        
        );
}
function openprofile()
{
    $.ajax(
        {
            url : '/public/profile.php',
            data : {},
            type : 'POST',
            success : function(d)
            {

                $("#hien").html(d);

            }
        }
        
        );
}


function openhotro()
{
    $.ajax(
        {
            url : '/public/hotro.php',
            data : {},
            type : 'POST',
            success : function(d)
            {

                $("#hien").html(d);

            }
        }
        
        );
}

     setInterval(function(){
 $( "#phongchat2" ).load( "/f5-chat.php" );
 }, 1000);

function go(url)
  {
      window.location.replace(url);
  }
  

/**/


