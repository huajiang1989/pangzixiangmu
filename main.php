<?php

include("../include/conn_2.php");
include("../include/area.php");
include("../include/function.php");
include("../include/rank.php");
include("../include/pos.php");


$sql_user="select * from {$db_prefix}users where id='".$_SESSION["glo_userid"]."'";
$user=$db->get_one($sql_user);

$sql_cssz="select * from {$db_prefix}setting  ";
$cssz=$db->get_one($sql_cssz);


echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>心爱网</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet">


    <link href="css/ionicons.min.css" rel="stylesheet">

  
    <link href="css/morris.css" rel="stylesheet"/>

  
    <link href="css/datepicker.css" rel="stylesheet"/>

   
    <link href="css/animate.min.css" rel="stylesheet">

    
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">

    
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
        </div>
    </div>
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
        </div>
    </header>
    <aside class="sidebar-menu fixed">
        <div class="sidebar-inner scrollable-sidebar">
            <div class="main-menu">

            </div>
            <div class="sidebar-fix-bottom clearfix">
            </div>
        </div>
    </aside>

    <div class="main-container">
        <div class="padding-md">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        首页
                    </div>
                    <div class="page-sub-header">
                        欢迎您，尊贵的会员
                    </div>
                </div>
            </div>

            <div class="row m-top-md">
                <div class="col-lg-3 col-sm-6">
                    <div class="statistic-box bg-danger m-bottom-md">
                        <div class="statistic-title">
                            本金钱包
                        </div>

                        <div class="statistic-value">
                            ';echo $user["bl_qb"];echo '
                        </div>

                        <div class="m-top-md">静态分配100%</div>

                        <div class="statistic-icon-background">
                            <i class="ion-eye"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="statistic-box bg-info m-bottom-md">
                        <div class="statistic-title">
                            消费钱包
                        </div>

                        <div class="statistic-value">
						';echo $user["xf_qb"];echo '
                        </div>

                        <div class="m-top-md">动态分配';echo $cssz["dt_xf"];echo '%</div>

                        <div class="statistic-icon-background">
                            <i class="ion-ios7-cart-outline"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="statistic-box bg-purple m-bottom-md">
                        <div class="statistic-title">
                            保险钱包
                        </div>

                        <div class="statistic-value">
                            ';echo $user["bx_qb"];echo '
                        </div>

                        <div class="m-top-md">动态分配';echo $cssz["dt_bx"];echo '%</div>

                        <div class="statistic-icon-background">
                            <i class="ion-person-add"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="statistic-box bg-success m-bottom-md">
                        <div class="statistic-title">
                            贵股钱包
                        </div>

                        <div class="statistic-value">
                            ';echo $user["tb_qb"];echo '
                        </div>

                        <div class="m-top-md">不分配</div>

                        <div class="statistic-icon-background">
                            <i class="ion-stats-bars"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <div class="statistic-box bg-warning m-bottom-md">
                        <div class="statistic-title">
                            冻结钱包
                        </div>

                        <div class="statistic-value">
                            ';echo $user["dj_qb"];echo '
                        </div>

                        <div class="m-top-md">动态分配';echo $cssz["dt_xj"];echo '%</div>

                        <div class="statistic-icon-background">
                            <i class="ion-stats-bars"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <div class="statistic-box bg-primary m-bottom-md">
                        <div class="statistic-title">
                            股权钱包
                        </div>

                        <div class="statistic-value">
                            ';echo $user["gq_qb"];echo '
                        </div>

                        <div class="m-top-md">动态分配';echo $cssz["dt_gq"];echo '%</div>

                        <div class="statistic-icon-background">
                            <i class="ion-eye"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div id="myCarousel" class="carousel slide">
                        
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="src/image/lunbotu1.jpg"
                                     alt="First slide">
                            </div>
                            <div class="item">
                                <img src="src/image/lunbotu1.jpg"
                                     alt="Second slide">
                            </div>
                            <div class="item">
                                <img src="src/image/lunbotu1.jpg"
                                     alt="Third slide">
                            </div>
                        </div>
                       
                        <a class="carousel-control left" href="#myCarousel"
                           data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right" href="#myCarousel"
                           data-slide="next">&rsaquo;</a>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="smart-widget widget-dark-blue">
                        <div class="smart-widget-header">
                            您的本周收益增长
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
                            <div class="smart-widget-body no-padding">
                                <div class="padding-md">
                                    <div id="placeholder" style="height:250px;"></div>
                                </div>

                                <div class="bg-grey">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <h3 class="m-top-sm">3491</h3>
                                            <small class="m-bottom-sm block">本金</small>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <h3 class="m-top-sm">721</h3>
                                            <small class="m-bottom-sm block">收益</small>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <h3 class="m-top-sm">$8103</h3>
                                            <small class="m-bottom-sm block">盈利</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			 <div class="smart-widget">
                <div class="smart-widget-header">
                    会员关系图
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
                        <div class="dd" id="nestable">
                           
                        </div>
                    </div>
                </div><!-- ./smart-widget-inner -->
            </div>
			
			
			
			
        </div>
    </div>

    <footer class="footer">
				<span class="footer-brand">
					<strong class="text-danger">心爱</strong>网
				</span>
        <p class="no-margin">
           
        </p>
    </footer>
</div>

<a href="#" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>
<script src="js/jquery-1.11.1.min.js"></script>
<!-- Bootstrap -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="js/jquery.flot.min.js"></script>

<script src="js/jquery.slimscroll.min.js"></script>

<script src="js/uncompressed/datepicker.js"></script>

<script src="js/uncompressed/skycons.js"></script>

<script src="js/jquery.easypiechart.min.js"></script>

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
<script src="js/simplify/simplify_dashboard.js"></script>

<script>
 

</script>

</body>
</html>
';






?>