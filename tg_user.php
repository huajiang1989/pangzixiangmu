<?php

include("../include/conn_2.php");
include("../include/area.php");
include("../include/function.php");
include("../include/rank.php");
include("../include/pos.php");
include("../include/phpqrcode.php");

if($id!=''){
$sql="select * from {$db_prefix}users where id='".$id."' and regusername='".$_SESSION["glo_username"]."'";
$rs=$db->get_one($sql);
}else{
$sql="select * from {$db_prefix}users where id='".$_SESSION["glo_userid"]."'";
$rs=$db->get_one($sql);
}


$sql_user="select * from {$db_prefix}users where id='".$_SESSION["glo_userid"]."'";
$user=$db->get_one($sql_user);


//****************************生成二维码***************************************
$value = 'http://'.$_SERVER['HTTP_HOST'].'/usernew/register.php?tj='.$_SESSION["glo_username"]; //二维码内容 
$errorCorrectionLevel = 'L';//容错级别 
$matrixPointSize = 6;//生成图片大小 
//生成二维码图片 
QRcode::png($value, 'images/ewm/'.$_SESSION["glo_userid"].'.png', $errorCorrectionLevel, $matrixPointSize, 2); 
$logo = 'logo.png';//准备好的logo图片 
$QR = 'qrcode.png';//已经生成的原始二维码图

//****************************************************************************

//***************************生成收款二维码*************************************

//生成收款二维码
$value1 = 'http://'.$_SERVER['HTTP_HOST'].'/usernew/trans_user.php?skr='.$_SESSION["glo_username"]; //二维码内容 
//$errorCorrectionLevel = 'L';//容错级别 
//$matrixPointSize = 6;//生成图片大小 
//生成二维码图片 
QRcode::png($value1, 'images/ewm/'.$_SESSION["glo_userid"].'_sk.png', $errorCorrectionLevel, $matrixPointSize, 2); 
$logo = 'logo.png';//准备好的logo图片 
$QR = 'qrcode.png';//已经生成的原始二维码图
//****************************************************************************



//****************************生成推广图片*****************************************
//--------------------------------生成宣传图片----------------------------
$base_name = 'images/ewm/axhz2.jpg';
$e = 'images/ewm/'.$_SESSION["glo_userid"].'.png';

// Content type
//header('Content-Type: image/jpeg');

// Load
$thumb = @imagecreatefromjpeg($base_name);
list($width, $height) = getimagesize($e);
$e_p = imagecreatefrompng($e);

// Resize
@imagecopyresized($thumb, $e_p, 250, 290, 0, 0, 200, 200, $width, $height);

// Output
@imagejpeg($thumb,'images/ewm/tg_'.$_SESSION["glo_userid"].'.png');
@imagedestroy($thumb);
$tg_lj='images/ewm/tg_'.$_SESSION["glo_userid"].'.png';

//*******************************************************************************

 



echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>心爱网</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/morris.css" rel="stylesheet"/>

    <!-- Datepicker -->
    <link href="css/datepicker.css" rel="stylesheet"/>

    <!-- Animate -->
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Owl Carousel -->
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">

    <!-- Simplify -->
    <link href="css/simplify.min.css" rel="stylesheet">

</head>

<body class="overflow-hidden">
<div class="wrapper preload">
    <div class="sidebar-right">
        <div class="sidebar-inner scrollable-sidebar">
            <div class="sidebar-header clearfix">
                <input class="form-control dark-input" placeholder="Search" type="text">
                <div class="btn-group pull-right">
                    <a href="#" class="sidebar-setting" data-toggle="dropdown"><i class="fa fa-cog fa-lg"></i></a>
                    <ul class="dropdown-menu pull-right flipInV">
                        <li><a href="#"><i class="fa fa-circle text-danger"></i><span class="m-left-xs">Busy</span></a>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i><span class="m-left-xs">Turn Off Chat</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="title-block">
                Group Chat
            </div>
            <div class="content-block">
                <ul class="sidebar-list">
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o text-success"></i><span class="m-left-xs">Close Friends</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o text-success"></i><span class="m-left-xs">Business</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="title-block">
                Favorites
            </div>
        </div><!-- sidebar-inner -->
    </div><!-- sidebar-right -->
    <header class="top-nav">
        <div class="top-nav-inner">
            <div class="nav-header">
                <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleSM">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav-notification pull-right">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fa-lg"></i></a>
                        <span class="badge badge-danger bounceIn">1</span>
                        <ul class="dropdown-menu dropdown-sm pull-right user-dropdown">

                        </ul>
                    </li>
                </ul>

                <a href="main.php" class="brand">
                    <i class="fa fa-database"></i><span class="brand-name">心爱网</span>
                </a>
            </div>
            <div class="nav-container">
                <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleLG">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="nav-notification">
                    <li class="search-list">
                        <div class="search-input-wrapper">
                            <div class="search-input">
                                <input type="text" class="form-control input-sm inline-block">
                                <a href="#" class="input-icon text-normal"><i class="ion-ios7-search-strong"></i></a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="pull-right m-right-sm">
                    <div style="position: relative;float: left;display: block; margin-right: 20px;padding: 20px 0;outline: none;">
                        <div class="user-detail inline-block">
                            <a style="color:red;">级别：</a>';if($user["rank"]=="0") echo '未确定';else echo getuserrank($user["rank"]);echo ' 
                        </div>
                        <div class="user-detail inline-block">
                            <a style="color:red;">账号：</a>';echo $user["username"];echo '
                        </div>
                        <div class="user-detail inline-block">
                            <a style="color:red;">业绩：</a>';echo $user["summoney"];echo '
                        </div>
                    </div>
                    <div class="user-block hidden-xs">
                        <a href="#" id="userToggle" data-toggle="dropdown">
                            <img src="images/profile/';if(empty($user["sex"])) echo 'a4.png';else { if(trim($user["sex"])=="男") echo 'profile9.jpg'; else echo 'profile2.jpg'; }echo ' " alt=""
                                 class="img-circle inline-block user-profile-pic">
                            <div class="user-detail inline-block">
                                ';echo $user["realname"];echo '
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="panel border dropdown-menu user-panel">

                        </div>
                    </div>

                </div>
            </div>
        </div><!-- ./top-nav-inner -->
    </header>
    <aside class="sidebar-menu fixed">
        <div class="sidebar-inner scrollable-sidebar">
            <div class="main-menu">
            </div>
            <div class="sidebar-fix-bottom clearfix">

            </div>
        </div><!-- sidebar-inner -->
    </aside>

    <div class="main-container">
        <div class="padding-md">
            <ul class="breadcrumb">
                <li><span class="primary-font"><i class="icon-home"></i></span><a href="main.php">首页</a></li>
                <li>推广</li>
            </ul>
            <div class="row">
                <div class="col-sm-4">
                    <div class="smart-widget">
                        <div class="smart-widget-header">
                            推广图片
                            <span class="smart-widget-option">
								<span class="refresh-icon-animated">
									<i class="fa fa-circle-o-notch fa-spin"></i>
								</span>
	                            <a href="#" class="widget-toggle-hidden-option">
	                                <i class="fa fa-cog"></i>
	                            </a>
	                            <a href="#" class="widget-collapse-option" data-toggle="collapse">
	                                <i class="fa fa-chevron-up"></i>
	                            </a>
	                            <a href="#" class="widget-refresh-option">
	                                <i class="fa fa-refresh"></i>
	                            </a>
	                            <a href="#" class="widget-remove-option">
	                                <i class="fa fa-times"></i>
	                            </a>
	                        </span>
                        </div>
                        <div class="smart-widget-inner">
                            <img src="';echo "images/ewm/tg_".$_SESSION["glo_userid"].".png";echo '">
                        </div><!-- ./smart-widget-inner -->
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="smart-widget">
                        <div class="smart-widget-header">
                            推广二维码
                            <span class="smart-widget-option">
								<span class="refresh-icon-animated">
									<i class="fa fa-circle-o-notch fa-spin"></i>
								</span>
	                            <a href="#" class="widget-toggle-hidden-option">
	                                <i class="fa fa-cog"></i>
	                            </a>
	                            <a href="#" class="widget-collapse-option" data-toggle="collapse">
	                                <i class="fa fa-chevron-up"></i>
	                            </a>
	                            <a href="#" class="widget-refresh-option">
	                                <i class="fa fa-refresh"></i>
	                            </a>
	                            <a href="#" class="widget-remove-option">
	                                <i class="fa fa-times"></i>
	                            </a>
	                        </span>
                        </div>
                        <div class="smart-widget-inner">
                            <img src="';echo "images/ewm/".$_SESSION["glo_userid"].".png";echo '" style="width: 100%;">
                        </div><!-- ./smart-widget-inner -->
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="smart-widget">
                        <div class="smart-widget-header">
                            收款二维码
                            <span class="smart-widget-option">
								<span class="refresh-icon-animated">
									<i class="fa fa-circle-o-notch fa-spin"></i>
								</span>
	                            <a href="#" class="widget-toggle-hidden-option">
	                                <i class="fa fa-cog"></i>
	                            </a>
	                            <a href="#" class="widget-collapse-option" data-toggle="collapse">
	                                <i class="fa fa-chevron-up"></i>
	                            </a>
	                            <a href="#" class="widget-refresh-option">
	                                <i class="fa fa-refresh"></i>
	                            </a>
	                            <a href="#" class="widget-remove-option">
	                                <i class="fa fa-times"></i>
	                            </a>
	                        </span>
                        </div>
                        <div class="smart-widget-inner">
                            <img src="';echo "images/ewm/".$_SESSION["glo_userid"]."_sk.png";echo '" style="width: 100%;">
                        </div><!-- ./smart-widget-inner -->
                    </div>
                </div>
            </div>
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->

    <footer class="footer">
				<span class="footer-brand">
					<strong class="text-danger">心爱</strong>网
				</span>
        <p class="no-margin">
            &copy; 2017 <strong>心爱网</strong>. ALL Rights Reserved. <a href="';echo $user["tghttp"];echo '" >推广链接</a>
        </p>
    </footer>
</div><!-- /wrapper -->

<a href="#" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Jquery -->
<script src="js/jquery-1.11.1.min.js"></script>

<!-- Bootstrap -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Slimscroll -->
<script src="js/jquery.slimscroll.min.js"></script>
<script>
    var _userName = '<?php echo $user["realname"];?>' || "尊贵的会员";
    var _userSex = '<?php echo $user["sex"];?>';
    var _userHeadPic = (function () {
        if (!_userSex)return 'images/profile/a4.png';
        else if (_userSex == "男") return 'images/profile/profile9.png';
        else  return 'images/profile/profile2.png';
    })();
</script>
<!-- Simplify -->
<script src="src/js/sideMenu.js"></script>

<script src="js/simplify/simplify.js"></script>
<script>
</script>

</body>
</html>
';


?>