<?php


include("../include/conn_2.php");
include("../include/area.php");
include("../include/function.php");
include("../include/rank.php");
include("../include/pos.php");
include("../include/phpqrcode.php");

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

    <link href="js/bootstrap-fileinput/fileinput.css" rel="stylesheet">

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
                <li><span class="primary-font"><i class="icon-home"></i></span><a href="index.html">首页</a></li>
                <li>个人信息管理</li>
                <li>资料修改</li>
            </ul>
            <div class="smart-widget m-top-lg widget-green">
                <div class="smart-widget-header">
                    资料修改
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
                        <form class="form-horizontal" id="inform">
                            <div class="form-group">
							 <input  type="hidden" class="form-control" value="info" id="action" name="action">
							 <input  type="hidden" class="form-control" value="';echo $user["sex"];echo '" id="sex_do" name="sex_do">
								 <input  type="hidden" class="form-control" value="images/idcard/';echo $_SESSION["glo_userid"];echo '.jpg" id="idcardadd" name="idcardadd">
                                <label for="account" class="col-lg-2 control-label">账号</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" readonly="readonly"  value="';echo $user["username"];echo '" id="username" name="username" 
                                           placeholder="账号">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label">姓名</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" ';if(!empty($user["realname"])) echo 'readonly="readonly" value="'.$user["realname"].'"';echo ' id="realname" name="realname"
                                           placeholder="姓名">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="memberlevel" class="col-lg-2 control-label">会员等级</label>
                                <div class="col-lg-8">
                                    <input readonly="readonly"  type="text" class="form-control" value="';echo getuserrank($user["rank"]);echo '" id="userrank" name="userrank">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="recomend" class="col-lg-2 control-label">推荐人</label>
                                <div class="col-lg-8">
                                    <input readonly="readonly"  type="text" class="form-control" value="';echo $user["tjrname"];echo '" id="tjrname" name="tjrname">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="registtime" class="col-lg-2 control-label">注册时间</label>
                                <div class="col-lg-8">
                                   <input readonly="readonly"  type="text" class="form-control" value="';echo $user["regtime"];echo '" id="regtime" name="regtime">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="sex" class="col-lg-2 control-label">性别</label>
                                <div class="col-lg-8">
									<select class="form-control" id="sex" name="sex" value="';echo $user["sex"];echo '">
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="receiveaddress" class="col-lg-2 control-label">收货地址</label>
                                <div class="col-lg-8">
                                 <input  type="text" placeholder="收货地址"  class="form-control" value="';echo $user["recontact"];echo '" id="recontact" name="recontact"> 
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="receiveman" class="col-lg-2 control-label">收货人</label>
                                <div class="col-lg-8">
								<input placeholder="收货人"  type="text" class="form-control" value="';echo $user["receiver"];echo '" id="receiver" name="receiver">
                                 
                                </div><!-- /.col -->
                            </div>

                            <div class="form-group">
                                <label for="idno" class="col-lg-2 control-label">身份证</label>
                                <div class="col-lg-8">
								<input placeholder="身份证"   ';if(!empty($user["idcard"])) echo 'readonly="readonly" value="'.$user["idcard"].'"';echo ' type="text" class="form-control" id="idcard" name="idcard">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="usermobile" class="col-lg-2 control-label">手机</label>
                                <div class="col-lg-8">
                                    <input placeholder="手机"   ';if(!empty($user["mobile"])) echo 'readonly="readonly" value="'.$user["mobile"].'"';echo ' type="text" class="form-control" id="mobile" name="mobile">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="bank" class="col-lg-2 control-label">银行</label>
                                <div class="col-lg-8">
                                   <input  placeholder="银行"   ';if(!empty($user["bank"])) echo 'readonly="readonly" value="'.$user["bank"].'"';echo ' type="text" class="form-control" id="bank" name="bank">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="bankaccount" class="col-lg-2 control-label">银行账号</label>
                                <div class="col-lg-8">
                                   <input placeholder="银行账号"  ';if(!empty($user["zhanghao"])) echo 'readonly="readonly" value="'.$user["zhanghao"].'"';echo ' type="text" class="form-control" id="zhanghao" name="zhanghao">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="accountname" class="col-lg-2 control-label">户主</label>
                                <div class="col-lg-8">
                                   <input placeholder="户主" ';if(!empty($user["huzhu"])) echo 'readonly="readonly" value="'.$user["huzhu"].'"';echo ' type="text" class="form-control" id="huzhu" name="huzhu">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="alipay" class="col-lg-2 control-label">支付宝账号</label>
                                <div class="col-lg-8">
                                   <input placeholder="支付宝账号" ';if(!empty($user["zhifubao"])) echo 'readonly="readonly" value="'.$user["zhifubao"].'"';echo ' type="text" class="form-control" id="zhifubao" name="zhifubao">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="idcardpic" class="col-lg-2 control-label">身份证图片</label>
                                <div class="col-lg-8">
								
									 ';if(empty($user["idcardadd"])){ echo '<input  id="file-card1" name="file-card[]"  type="file" multiple data-min-file-count="1" >';}else { echo'
										 <input  readonly="readonly" value="'.$user["idcardadd"].'"'; echo ' type="text" class="form-control" id="idcardadd " name="idcardadd">';}
										 echo '
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xs-offset-3 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                                    <button type="button" class="btn btn-success" style="width:100%;"
                                            onclick="updateInfo()">确定
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
<script src="js/bootstrap-fileinput/fileinput.js"></script>
<script src="js/bootstrap-fileinput/fileinput-zh.js"></script>
<!-- Simplify -->
<script src="js/simplify/simplify.js"></script>
<script src="src/js/sideMenu.js"></script>

<script>
    $(function () {
		
		//修改男女的选中
					var key=$("#sex_do").val();
					 $("#sex").find("option").each(function(){  
								if(key == $(this).val()){  
								   $(this).attr("selected","selected");  
								   //return false;  
								}  
                          });  
		
        $("#file-card1").fileinput({//初始化上传文件框
            showUpload: false,
            showRemove: false,
            uploadAsync: true,
            uploadLabel: "上传",//设置上传按钮的汉字
            uploadClass: "btn btn-primary",//设置上传按钮样式
            showCaption: false,//是否显示标题
            language: "zh",//配置语言
            uploadUrl: "upload.php",
            maxFileSize: 0,
            maxFileCount: 1, /*允许最大上传数，可以多个，当前设置单个*/
            enctype: "multipart/form-data",
            //allowedPreviewTypes : [ "image" ], //allowedFileTypes: ["image", "video", "flash"],
            allowedFileExtensions: ["jpg", "png", "gif"], /*上传文件格式*/
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
            dropZoneTitle: "请通过拖拽图片文件放到这里",
            dropZoneClickTitle: "或者点击此区域添加图片",
            //uploadExtraData: {"id": id},//这个是外带数据
            showBrowse: false,
            browseOnZoneClick: true,
            slugCallback: function (filename) {
                return filename.replace("(", "_").replace("]", "_");
            }
        });
    })
	
function  ShowInformation(bt,info)
{
	alert(bt+":"+info);
}
	
	//修改ajax
function updateInfo()
{
	$.ajax({
				cache: true,
				type: "POST",
				url: "userinfo.php",
				data:$("#inform").serialize(),// 你的formid
				async: false,
			    error: function(request) {
			        ShowInformation("错误","链接错误！");
			    },
			    success: function(data) {
					//修改男女的选中
					var key=$("#sex").val();
					 $("#sex").find("option").each(function(){  
								if(key == $(this).val()){  
								   $(this).attr("selected","selected");  
								   //return false;  
								}  
                          });  
				   
					//alert(data);
					var showinfo="修改成功";
					var btstr="信息";
					if(data!="0")
					{
					   showinfo=data;
					   btstr="错误";
					   ShowInformation(btstr,showinfo);
					}
					else
					{
						$("#btn_info_close").click();
					    $("#file-card1").fileinput("upload");
						ShowInformation(btstr,showinfo);
					    window.location.href="info_user.php";
					}
					
			    }
			});
}
</script>

</body>
</html>
';


?>