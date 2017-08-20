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
        <div class="padding-md">

            <ul class="breadcrumb">
                <li><span class="primary-font"><i class="icon-home"></i></span><a href="main.php">首页</a></li>
                <li>信息管理</li>
                <li>写邮件</li>
            </ul>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <i class="fa fa-check-circle m-right-xs"></i>请在法律规定范围内文明用语
            </div>
            <div class="smart-widget m-top-lg widget-green">
                <div class="smart-widget-header">
                    写邮件
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
                    <div class="smart-widget-hidden-section">
                        <ul class="widget-color-list clearfix">
                            <li style="background-color:#20232b;" data-color="widget-dark"></li>
                            <li style="background-color:#4c5f70;" data-color="widget-dark-blue"></li>
                            <li style="background-color:#23b7e5;" data-color="widget-blue"></li>
                            <li style="background-color:#2baab1;" data-color="widget-green"></li>
                            <li style="background-color:#edbc6c;" data-color="widget-yellow"></li>
                            <li style="background-color:#fbc852;" data-color="widget-orange"></li>
                            <li style="background-color:#e36159;" data-color="widget-red"></li>
                            <li style="background-color:#7266ba;" data-color="widget-purple"></li>
                            <li style="background-color:#f5f5f5;" data-color="widget-light-grey"></li>
                            <li style="background-color:#fff;" data-color="reset"></li>
                        </ul>
                    </div>
                    <div class="smart-widget-body">
                        <form class="form-horizontal" name="xxform" id="xxform">
                            <div class="form-group">
							 <input  type="hidden" class="form-control" value="send" id="action" name="action">
                                <label for="oldpassword" class="col-lg-2 control-label">收件人</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="tousername" name="tousername"  value="管理员" readonly="readonly"
                                           placeholder="收件人">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="newpassword" class="col-lg-2 control-label">邮件标题</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="邮件标题">
                                </div><!-- /.col -->
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-lg-2 control-label">邮件正文</label>
                                <div class="col-lg-8">
                                    <textarea class="form-control"  id="content" name="content" rows="3"></textarea>
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xs-offset-3 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                                    <button type="button" class="btn btn-success" style="width:100%;"
                                            onclick="SendMail()">确定
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- ./smart-widget-inner -->
            </div>
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

<!-- Slimscroll -->
<script src="js/jquery.slimscroll.min.js"></script>

<!-- Simplify -->
<script src="src/js/sideMenu.js"></script>

<script src="js/simplify/simplify.js"></script>

<script>
function  ShowInformation(bt,info)
{
	alert(bt+":"+info);
}

function SendMail()
{
	//验证
	if($("#title").val()=="")
	{
		ShowInformation("错误","标题为空！");
		return;
	}
	if($("#content").val()=="")
	{
		ShowInformation("错误","内容为空！");
		return;
	}
	
	$.ajax({
				cache: true,
				type: "POST",
				url: "userinfo.php",
				data:$("#xxform").serialize(),// 你的formid
				async: false,
			    error: function(request) {
			        ShowInformation("错误","链接错误！");
			    },
			    success: function(data) {
					$("#title").val("");
					$("#content").val("");
					var showinfo="发送成功";
					var btstr="信息";
					if(data!="0")
					{
					   showinfo=data;
					   btstr="错误";
					}
					ShowInformation(btstr,showinfo);
					window.location.href="xyj_user.php";
			    }
			});
}
</script>

</body>
</html>
';

?>