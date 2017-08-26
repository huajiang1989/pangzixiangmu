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
    header("location:sfyx_user.php");exit();
}

if($action=="fjdel")
{
	$sql_1="delete from {$db_prefix}mails1 where id='".$id."'";
    $db->query($sql_1);
    header("location:sfyx_user.php");exit();
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
            <div class="smart-widget m-top-lg widget-green">
                <div class="smart-widget-header">
                    收件箱
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
                        <div class="message-table table-responsive">
                            <table class="table table-bordereds">
                                <thead>
                                <tr>

                                    <th>标题</th>
                                    <th>信息</th>
                                    <th>日期</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>';
				$sql="select *,FROM_UNIXTIME(addtime, '%Y-%m-%d %H:%i:%s' ) sdtime from {$db_prefix}mails where 1 and username='".$_SESSION["glo_username"]."' order by id desc limit 5";
                $result=$db->query($sql);
				if ($db->num_rows($result)>0){
					$i=0;
                    while($rs=$db->fetch_array($result)){	
					        $i++;
							echo '<tr>
										<td>
											<div class="author-name">
												<a href="#"><strong class="block font-md">';echo $rs["title"];echo '</strong></a>
											</div>
										</td>
										<td>
											<a href="#">
												';echo $rs["content"];echo '
											</a>
										</td>
										<td>';echo $rs["sdtime"];echo '</td>
										<td><a href="sfyx_user.php?action=sjdel&id=';echo $rs["id"];echo '" style="color: red">删除</a></td>
									</tr>';
						     }
					 }
                              echo '</tbody>
                            </table>
                        </div><!-- ./message-table -->
                    </div>
                </div><!-- ./smart-widget-inner -->
            </div>

            <div class="smart-widget m-top-lg widget-green">
                <div class="smart-widget-header">
                    发件箱
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
                        <div class="message-table table-responsive">
                            <table class="table table-bordereds">
                                <thead>
                                <tr>

                                    <th>标题</th>
                                    <th>信息</th>
                                    <th>日期</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
								';
				$sql="select *,FROM_UNIXTIME(addtime, '%Y-%m-%d %H:%i:%s' ) sdtime from {$db_prefix}mails1 where 1 and username='".$_SESSION["glo_username"]."' order by id desc ";
                        $result=$db->query($sql);
                        if ($db->num_rows($result)>0){
							$i=0;
                        while($rs=$db->fetch_array($result)){	
						  $i++;
							echo '
                                <tr>
                                    <td>
                                        <div class="author-name">
                                            <a href="#"><strong class="block font-md">';echo $rs["title"];echo '</strong></a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#">
                                            ';echo $rs["content"];echo '
                                        </a>
                                    </td>
                                    <td>';echo $rs["sdtime"];echo '</td>
                                    <td><a href="sfyx_user.php?action=fjdel&id=';echo $rs["id"];echo '" style="color: red">删除</a></td>
                                </tr>';
						     }
					 }
                              echo '
                                </tbody>
                            </table>
                        </div><!-- ./message-table -->
                    </div>
                </div><!-- ./smart-widget-inner -->
            </div>
        </div><!-- ./inbox-body -->
    </div><!-- ./inbox-wrapper -->

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