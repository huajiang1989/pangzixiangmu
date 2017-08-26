<?php

include("../include/conn_2.php");
include("../include/area.php");
include("../include/function.php");
include("../include/rank.php");
include("../include/pos.php");
include("../include/phpqrcode.php");

$sql_user="select * from {$db_prefix}users where id='".$_SESSION["glo_userid"]."'";
$user=$db->get_one($sql_user);

$sql_cssz="select * from {$db_prefix}setting  ";
$cssz=$db->get_one($sql_cssz);

//--------------生成随机数
$sjs=rand(10,99);


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
<iframe id="iframe1" name="iframe1" src="" style="display:none "></iframe>
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
                            <a style="color:red;">级别：</a>';if($user["rank"]=="0") echo '未确定';else echo
                            getuserrank($user["rank"]);echo '
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
                            <img src="images/profile/';if(empty($user[" sex"])) echo 'a4.png';else {
                            if(trim($user["sex"])=="男") echo 'profile9.jpg'; else echo 'profile2.jpg'; }echo ' " alt=""
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
                <li>汇款管理</li>
            </ul>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="">
                                汇款须知
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p class="alert alert-info">
                                1.汇款人姓名必须与账户实名认证姓名一致，姓名不一致的请联系客服并提供汇款证明，我们会在3-5个工作日内退款。<br>
                                2.充值免收手续费，系统收到您的汇款后20分钟内入账，请耐心等待。<br>
                                3.由于周末部分银行不提供汇款到账业务，导致用户充值不能及时到账。建议周末（周五17:00至周一09:00）请尽量避免使用：工商银行、农业银行、建设银行、交通银行、中国银行、民生银行等银行卡进行汇款，否则可能会延迟至周一到账。<br>
                                4.充值不到账请联系客服。<br>
                                5.请严格按照汇款金额汇款，汇款金额的后2位是为了保证即时到账系统能自动分配的<br>
                                6.严禁电信诈骗分子利用平台进行洗钱，爱心平台已与有关部门建立联动机制，将采取各种措施，坚决打击各种犯罪活动，请勿以身试法。</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="smart-widget m-top-lg widget-green">
                <div class="smart-widget-header">
                    汇款操作
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
                        <form class="form-horizontal" name="txform" id="txform">
                            <div class="form-group">
                                <input type="hidden" name="mobile" id="mobile" value="';echo $user[" mobile"];echo '">
                                <input type="hidden" name="action" id="action" value="hk">
                                <label for="bankid" class="col-lg-2 control-label">汇款类型</label>
                                <div class="col-lg-8">
                                    <select name="bankid" id="bankid" value="1" class="form-control">
                                        <option value="yh">';echo $cssz["khh"]." ";;echo '';echo $cssz["yhzh"]." ";;echo
                                            '';echo $cssz["hz"];echo '
                                        </option>
                                        <option value="zfb">支付宝 ';echo $cssz["zfb"]." ";;echo '';echo '';echo
                                            $cssz["hz"];echo '
                                        </option>
                                        <option value="btb">比特币 ';echo $cssz["btb"]." ";echo '</option>
                                        <option value="wx">微信 (请扫描以上的二维码进行支付)</option>
                                        ';
                                        if($cssz["hkzh1"]){ echo '
                                        <option value="wx">'.$cssz["hkzh1"].'</option>
                                        ';}
                                        if($cssz["hkzh2"]){ echo '
                                        <option value="wx">'.$cssz["hkzh1"].'</option>
                                        ';}
                                        if($cssz["hkzh3"]){ echo '
                                        <option value="wx">'.$cssz["hkzh1"].'</option>
                                        ';}
                                        if($cssz["hkzh4"]){ echo '
                                        <option value="wx">'.$cssz["hkzh1"].'</option>
                                        ';}
                                        if($cssz["hkzh5"]){ echo '
                                        <option value="wx">'.$cssz["hkzh1"].'</option>
                                        ';}
                                        echo '</select>
                                </div><!-- /.col -->
                            </div>

                            <div class="form-group">
                                <label for="moneyamount" class="col-lg-2 control-label">金额</label>
                                <div class="col-lg-8">
                                    <input type="hidden" name="fee" value="';echo $sjs;echo '">
                                    <input type="number" class="form-control" name="price" id="price"
                                           placeholder="金额">
                                </div><!-- /.col -->
                            </div>


                            <div class="form-group">
                                <label for="senmoneyuser" class="col-lg-2 control-label">汇款人</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" required name="hkname" disabled id="hkname"
                                           value="';echo $_SESSION[" glo_realname"];echo '"
                                    placeholder="汇款人">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="tradepassword" class="col-lg-2 control-label">交易密码</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" required name="jypw" id="jypw"
                                           placeholder="交易密码">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="mobilecode" class="col-lg-2 control-label">手机验证码</label>
                                <div class="col-lg-8 ">
                                    <div class=" input-group">
                                        <input type="text" class="form-control" name="check_code" id="check_code"
                                               placeholder="手机验证码">
                                        <span class="input-group-btn">
													<button class="btn btn-default" type="button" name="but_phone"
                                                            id="but_phone" onClick="time(this);">发送验证码</button>
												</span>
                                    </div>
                                </div><!-- /.col -->
                            </div>


                            <div class="form-group">
                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xs-offset-3 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                                    <button type="button" class="btn btn-success" style="width:100%;"
                                            onclick="hksend()">提交
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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


</body>


<script src="js/jquery-1.11.1.min.js"></script>
<script>
    var _userName = '<?php echo $user["realname"];?>' || "尊贵的会员";
    var _userSex = '<?php echo $user["sex"];?>';
    var _userHeadPic = (function () {
        if (!_userSex)return 'images/profile/a4.png';
        else if (_userSex == "男") return 'images/profile/profile9.png';
        else  return 'images/profile/profile2.png';
    })();
</script>

<script src="src/js/sideMenu.js"></script>

<!-- Bootstrap -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="js/jquery.slimscroll.min.js"></script>

<!-- Simplify -->
<script src="js/simplify/simplify.js"></script>

<script>
    function ShowInformation(bt, info) {
        alert(bt + ";" + info);
    }


    //发送验证码时添加cookie
    function addCookie(name, value, expiresHours) {
        var cookieString = name + "=" + escape(value);

        //判断是否设置过期时间,0代表关闭浏览器时失效
        if (expiresHours > 0) {
            var date = new Date();
            date.setTime(date.getTime() + expiresHours * 1000);
            cookieString = cookieString + ";expires=" + date.toUTCString();
        }
        document.cookie = cookieString;
    }
    //修改cookie的值
    function editCookie(name, value, expiresHours) {
        var cookieString = name + "=" + escape(value);
        if (expiresHours > 0) {
            var date = new Date();
            date.setTime(date.getTime() + expiresHours * 1000); //单位是毫秒
            cookieString = cookieString + ";expires=" + date.toGMTString();
        }
        document.cookie = cookieString;
    }
    //根据名字获取cookie的值
    function getCookieValue(name) {
        var strCookie = document.cookie;
        var arrCookie = strCookie.split(";");
        for (var i = 0; i < arrCookie.length; i++) {
            var arr = arrCookie[i].split("=");
            if (arr[0] == name) {
                return unescape(arr[1]);
                break;
            }
        }

    }

    $(function () {
        v = getCookieValue("secondsremained") ? getCookieValue("secondsremained") : 0;
//获取cookie值
        if (v > 0) {
            okssss($("#but_phone"));//开始倒计时
        }
    })


    function isMobile(str) {
        var myreg = /^([0]?)(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(16[0-9]{1})|(17[0-9]{1})|(18[0-9]{1})|(19[0-9]{1}))+\d{8})$/;
        return myreg.test(str);

    }


    function time(o) {
        if (document.getElementById("mobile").value == "") {
            //alert("请填写手机号");
            ShowInformation("错误", "请填写手机号！");
            return false;
        }
        if (!isMobile(document.getElementById("mobile").value)) {
            //alert("手机格式不正确");
            ShowInformation("错误", "手机格式不正确！");
            return false;
        }
        var ifrm = document.getElementById("iframe1");
        ifrm.src = "../check.php?phone=" + document.getElementById("mobile").value;

        addCookie("secondsremained", 60, 60);//添加cookie记录,有效时间60s
        //layer.msg("验证码已经发送，注意查收");
        //$.post("../check.php", { phone: $("#mobile").val() }, function(msg) { layer.msg("验证码已经发送，注意查收"); });
        okssss(o);

    }

    var wait = 60;

    function okssss(o) {
        if (wait == 0) {
            $(o).removeAttr("disabled");
            //$(o).val("免费获取验证码");
            $(o).html("获取验证码");
            wait = 120;
        } else {
            $(o).attr("disabled", true);
            //$(o).val("重新发送(" + wait + ")");
            $(o).html("重新发送(" + wait + ")");
            wait--;
            setTimeout(function () {
                    okssss(o);
                },
                1000);
        }
    }


    //汇款ajax
    function hksend() {
        if ($("#price").val() == "") {
            ShowInformation("错误", "汇款金额为空！");
            $("#price").focus();
            return;
        }
        if ($("#hkname").val() == "") {
            ShowInformation("错误", "汇款人为空！");
            $("#hkname").focus();
            return;
        }
        if ($("#jypw").val() == "") {
            ShowInformation("错误", "交易密码为空！");
            $("#jypw").focus();
            return;
        }


        $.ajax({
            cache: true,
            type: "POST",
            url: "userinfo.php",
            data: $("#txform").serialize(),// 你的formid
            async: false,
            error: function (request) {
                ShowInformation("错误", "链接错误！");
            },
            success: function (data) {

                var showinfo = "汇款申请已经提交，请等待审核！";
                var btstr = "信息";
                if (data != "0") {
                    showinfo = data;
                    btstr = "错误";
                }
                ShowInformation(btstr, showinfo);
            }
        });
    }


    //汇款选择钱包类型的时候
    $(document).ready(function () {

        $("#bankid").change(function () {
            if ($("#bankid").val() == "btb") {
                $("#qbname").html("比特币");
                $("#sjs").hide();
            }
            else {
                if ($("#bankid").val() == "wx") {
                    $("#wximg").show();
                }
                else {
                    $("#wximg").hide();
                }
                $("#qbname").html("金额");
                $("#sjs").show();
            }

        });
    });

</script>
</html>
';


?>