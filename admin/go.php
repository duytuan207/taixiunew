<?PHP
include_once('../function/config.php');

if($admin ==0)
{
    header('location : /admin/login.php');
    exit();
}

$_SESSION['id'] = $_GET['id'];
header('location : /index.php');

