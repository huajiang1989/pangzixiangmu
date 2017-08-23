<?php

include("../include/conn_2.php");
include("../include/area.php");
include("../include/function.php");
include("../include/rank.php");
include("../include/pos.php");
include("../include/phpqrcode.php");
include("../include/pageclass.php");
include("../include/ecls.php");
include("../include/secpwd.php");
include("../include/consume.php");

$sql_user="select * from {$db_prefix}users where id='".$_SESSION["glo_userid"]."'";
$user=$db->get_one($sql_user);



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
                        <div class="user-detail inline-block">
                            <a style="color:red;">级别：</a>村代理
                        </div>
                        <div class="user-detail inline-block">
                            <a style="color:red;">账号：</a>A
                        </div>
                        <div class="user-detail inline-block">
                            <a style="color:red;">业绩：</a>1000
                        </div>
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
        <div class="padding-md">
            <ul class="breadcrumb">
                <li><span class="primary-font"><i class="icon-home"></i></span><a href="index.html">首页</a></li>
                <li>钱包管理</li>
                <li>钱包明细</li>
            </ul>
            <table class="table table-striped" id="dataTable">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>会员名</th>
                    <th>金额</th>
                    <th>本利金额</th>
                    <th>消费金额</th>
                    <th>股权金额</th>
                    <th>保险金额</th>
                    <th>说明</th>
                    <th>操作时间</th>
                </tr>
                </thead>
                <tbody>
				';
			$pagesize=8;$pageno=getparam("pageno");
if($pageno<1) $pageno=1;
$sqlc="select count(id) as c from {$db_prefix}money_record where 1 and username='".$_SESSION["glo_username"]."' ";
$filter="";
if ($filter!='') $sqlc.=$filter;
$rs=$db->get_one($sqlc);
$recnum=$rs['c'];
$pagenum=ceil($recnum/$pagesize);
if($pageno>$pagenum) $pageno=intval($pagenum);
if($pageno<1) $pageno=1;
$bgpos=$pagesize*($pageno-1);
$sql="select * from {$db_prefix}money_record where 1 and username='".$_SESSION["glo_username"]."' ";
if ($filter!='') $sql.=$filter;
$sql.=" order by id desc limit ".$bgpos.",".$pagesize;
$result=$db->query($sql);
$i=0;
if ($db->num_rows($result)>0){
while($rs=$db->fetch_array($result)){
		$i++;
	echo					     '<tr ';if($i%2==0) echo 'class="success"'; echo '> 
							     <th scope="row">';echo $i;echo '</th> 
								 <td>';echo $rs["username"];echo '</td> 
								 <td>';echo $rs["money"];echo '</td> 
								 <td>';echo $rs["bl_money"];echo '</td> 
								 <td>';echo $rs["xf_money"];echo '</td> 
								 <td>';echo $rs["gq_money"];echo '</td> 
								 <td>';echo $rs["bx_money"];echo '</td> 
								 <td>';echo $rs["memo"];echo '</td> 
								 <td>';echo date("Y-m-d H:i:s",$rs["addtime"]);echo '</td> 
							 </tr> 
							';
	}
}
echo						   '
                </tbody>
            </table>
        </div><!-- ./padding-md -->
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

<!-- Flot -->
<script src="js/jquery.flot.min.js"></script>

<!-- Slimscroll -->
<script src="js/jquery.slimscroll.min.js"></script>

<!-- Morris -->
<script src="js/rapheal.min.js"></script>
<script src="js/morris.min.js"></script>

<!-- Datepicker -->
<script src="js/uncompressed/datepicker.js"></script>

<!-- Sparkline -->
<script src="js/sparkline.min.js"></script>

<!-- Skycons -->
<script src="js/uncompressed/skycons.js"></script>

<!-- Popup Overlay -->
<script src="js/jquery.popupoverlay.min.js"></script>

<!-- Easy Pie Chart -->
<script src="js/jquery.easypiechart.min.js"></script>

<!-- Sortable -->
<script src="js/uncompressed/jquery.sortable.js"></script>

<!-- Owl Carousel -->
<script src="js/owl.carousel.min.js"></script>

<!-- Modernizr -->
<script src="js/modernizr.min.js"></script>

<!-- Simplify -->
<script src="src/js/sideMenu.js"></script>
<script src="js/simplify/simplify.js"></script>

<script>
</script>

</body>
</html>
';


?>