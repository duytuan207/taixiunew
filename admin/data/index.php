<?PHP

include_once('../../function/config.php');
if($_GET['data'] != 'dangnhap')
{
if($admin ==0)
{
    echo'DucNghia.';
    exit();
}
}
if(isset($_GET['get']))
{
    include('menu/'.$_GET['get'].'.php');
}

if(isset($_GET['data']))
{
    include('data/'.$_GET['data'].'.php');
}

