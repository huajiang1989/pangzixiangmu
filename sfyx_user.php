<?php

include("../include/conn_2.php");
include("../include/area.php");
include("../include/function.php");
include("../include/rank.php");
include("../include/pos.php");
include("../include/phpqrcode.php");

$sql_user="select * from {$db_prefix}users where id='".$_SESSION["glo_userid"]."'";
$user=$db->get_one($sql_user);

if($action=="sjdel")
{
	$sql_1="delete from {$db_prefix}mails where id='".$id."'";
    $db->query($sql_1);
    header("location:xx_user.php");exit();
}

if($action=="fjdel")
{
	$sql_1="delete from {$db_prefix}mails1 where id='".$id."'";
    $db->query($sql_1);
    header("location:xx_user.php");exit();
}



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

                <a href="index.html" class="brand">
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
                    <div class="user-block hidden-xs">
                        <a href="#" id="userToggle" data-toggle="dropdown">
                            <img src="images/profile/profile1.jpg" alt=""
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
        <div class="inbox-wrapper">
            <div class="inbox-menu">
                <div class="inbox-menu-sm clearfix">
                    <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="inboxCollapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="btn btn-danger btn-sm m-top-sm m-right-sm pull-right" href="xieyoujian.html">写邮件</a>
                </div>

                <div class="padding-md text-center visible-lg visible-md">
                    <a class="btn btn-danger" href="xieyoujian.html">写邮件</a>
                </div>

                <div class="inbox-menu-inner">

                    <ul>
                        <li class="active">
                            <a href="#">
                                收件箱
                            </a>
                        </li>
                        <li>
                            <a href="#">

                                发件箱
                            </a>
                        </li>
                </div><!-- ./inbox-menu-inner -->
                <!--</div>-->
            </div><!-- ./inbox-menu -->

            <div class="inbox-body padding-md">
                <div class="pagination-row clearfix m-bottom-md">
                    <div class="pull-left vertical-middle hidden-xs">112 messages</div>
                    <div class="pull-right pull-left-sm">
                        <div class="inline-block vertical-middle m-right-xs">Page 1 of 8</div>
                        <ul class="pagination vertical-middle">
                            <li class="disabled"><a href="#"><i class="fa fa-step-backward"></i></a></li>
                            <li class="disabled"><a href="#"><i class="fa fa-caret-left large"></i></a></li>
                            <li><a href="#"><i class="fa fa-caret-right large"></i></a></li>
                            <li><a href="#"><i class="fa fa-step-forward"></i></a></li>
                        </ul>
                    </div>
                </div><!-- ./pagination-row -->

                <div class="message-table table-responsive">
                    <table class="table table-bordereds">
                        <thead>
                        <tr>
                            <th class="text-center">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="chkAll" class="inbox-check">
                                    <label for="chkAll"></label>
                                </div>
                            </th>
                            <th></th>
                            <th>作者</th>
                            <th>信息</th>
                            <th>日期</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="chk1" class="inbox-check">
                                    <label for="chk1"></label>
                                </div>
                            </td>
                            <td><a href="#"><i class="fa fa-star-o fa-lg"></i></a></td>
                            <td>
                                <div class="author-name">
                                    <a href="#"><strong class="block font-md">会员1</strong></a>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                    你好，我的投资
                                    <small class="block">谢谢推荐</small>
                                </a>
                            </td>
                            <td>Today, 9.03</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="chk1" class="inbox-check">
                                    <label for="chk1"></label>
                                </div>
                            </td>
                            <td><a href="#"><i class="fa fa-star-o fa-lg"></i></a></td>
                            <td>
                                <div class="author-name">
                                    <a href="#"><strong class="block font-md">会员1</strong></a>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                    你好，我的投资
                                    <small class="block">谢谢推荐</small>
                                </a>
                            </td>
                            <td>Today, 9.03</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="chk1" class="inbox-check">
                                    <label for="chk1"></label>
                                </div>
                            </td>
                            <td><a href="#"><i class="fa fa-star-o fa-lg"></i></a></td>
                            <td>
                                <div class="author-name">
                                    <a href="#"><strong class="block font-md">会员1</strong></a>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                    你好，我的我的投资
                                    <small class="block">谢谢推荐</small>
                                </a>
                            </td>
                            <td>Today, 9.03</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="chk1" class="inbox-check">
                                    <label for="chk1"></label>
                                </div>
                            </td>
                            <td><a href="#"><i class="fa fa-star-o fa-lg"></i></a></td>
                            <td>
                                <div class="author-name">
                                    <a href="#"><strong class="block font-md">会员1</strong></a>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                    你好，我的投资
                                    <small class="block">谢谢推荐</small>
                                </a>
                            </td>
                            <td>Today, 9.03</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="chk1" class="inbox-check">
                                    <label for="chk1"></label>
                                </div>
                            </td>
                            <td><a href="#"><i class="fa fa-star-o fa-lg"></i></a></td>
                            <td>
                                <div class="author-name">
                                    <a href="#"><strong class="block font-md">会员1</strong></a>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                    你好，我的投资
                                    <small class="block">谢谢推荐</small>
                                </a>
                            </td>
                            <td>Today, 9.03</td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- ./message-table -->
                <div class="pagination-row clearfix">
                    <div class="pull-left vertical-middle hidden-xs">112 messages</div>
                    <div class="pull-right pull-left-sm">
                        <div class="inline-block vertical-middle m-right-xs">Page 1 of 8</div>
                        <ul class="pagination vertical-middle">
                            <li class="disabled"><a href="#"><i class="fa fa-step-backward"></i></a></li>
                            <li class="disabled"><a href="#"><i class="fa fa-caret-left large"></i></a></li>
                            <li><a href="#"><i class="fa fa-caret-right large"></i></a></li>
                            <li><a href="#"><i class="fa fa-step-forward"></i></a></li>
                        </ul>
                    </div>
                </div><!-- ./pagination-row -->
            </div><!-- ./inbox-body -->
        </div><!-- ./inbox-wrapper -->
    </div><!-- /main-container -->

    <footer class="footer">
				<span class="footer-brand">
					<strong class="text-danger">心爱</strong>网
				</span>
        <p class="no-margin">
            &copy; 2014 <strong>心爱网</strong>. ALL Rights Reserved.
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

<!-- Simplify -->
<script src="js/simplify/simplify.js"></script>
<script src="src/js/sideMenu.js"></script>

<script>

</script>

</body>
</html>
';


?>