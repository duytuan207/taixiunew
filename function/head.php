<?PHP 
include_once('config.php');
$title        = isset($title) ? $title : ' Game Tài Xỉu';
if(!isset($_POST['load']))
{
?>
<!DOCTYPE html>
<html class="fixed">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="full-screen" content="yes"/>
  <meta name="x5-fullscreen" content="true"/>
  <meta name="360-fullscreen" content="true"/>
<title><?=$title?></title>
<meta name="keywords" content="<?=$site['site_tukhoa'];?>" />
<meta name="description" content="<?=$site['site_mota'];?>">
<!-- MÃ NGUỒN ĐƯỢC MOD BỞI THINHLEVA. CONTACTS ME: ZALO 0369084341, FB.COM/LETHINHPRO123 -->
<meta name="author" content="LVT">
<meta property="og:title" content="<?=$site['site_tenweb'];?>" />
<meta property="og:image" content="<?=$site['site_domain'];?><?=$site['site_image'];?>" />
<meta property="og:description" content="<?=$site['site_mota'];?>" />
<link rel="apple-touch-icon" sizes="180x180" href="<?=$site['site_domain'];?><?=$site['site_favicon'];?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?=$site['site_domain'];?><?=$site['site_favicon'];?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?=$site['site_domain'];?><?=$site['site_favicon'];?>">
<!-- STYLE -->
<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
<link rel="stylesheet" href="/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" href="/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
<link rel="stylesheet" href="/assets/vendor/morris/morris.css" />
<link rel="stylesheet" href="/assets/stylesheets/theme.css?version=<?=time()?>" />
<link rel="stylesheet" href="/assets/stylesheets/skins/default.css" />
<link rel="stylesheet" href="/assets/stylesheets/theme-custom.css">
<!-- SCRIPTS -->
<script src="/assets/vendor/modernizr/modernizr.js"></script>
<script src="/assets/vendor/jquery/jquery.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="/assets/javascripts/theme.js"></script>
<script src="../src/scripts/sweetalert.min.js"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="7e0da9fa554703ac4b0a9c09-|49" defer=""></script>
<link rel="stylesheet" href="/lib/css/font_size2.css?v1">
<link rel="stylesheet" href="/lib/css/swiper4.min.css?v=1x">
<link rel="stylesheet" href="/lib/css/all2-22-2020.css?v=1">
<script src="/lib/js/notice.js?v=0.1.0"></script>
<script src="/lib/js/jquery-ui.js?v=1.0.0"></script>
<script src="/lib/js/jquery.ui.touch-punch.min.js?v=1"></script>
<script src="/lib/js/function.js?version=<?=time()?>"></script>
<link href="/assets/libs/chartist/dist/chartist.min.css">
<script src="/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="/assets/libs/chart.js/dist/Chart.min.js"></script>
<script src="/assets/libs/echarts/dist/echarts-en.min.js"></script>
<script src="/assets/libs/raphael/raphael.min.js"></script>
<script src="/assets/libs/morris.js/morris.min.js"></script>
</head>

<body>
<section class="body">


<div id="hien"></div>


<div class="main-game"></div>




<?PHP }?>
