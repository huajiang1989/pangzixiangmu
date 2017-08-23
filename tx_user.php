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
<iframe id="iframe1" name="iframe1" src="" style="display:none "></iframe>
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
                <li>提现管理</li>
            </ul>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="">
                                提现须知
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            1.心爱平台提现银行卡账户名和支付宝姓名必须与您的实名认证姓名一致。
                            人民币提现正常24小时到账，具体到账时间因收款银行略有不同节假日到账时间略有延迟。
                            </br>
                            2.提现收取手续费： 慈善基金';echo $cssz["tx_csjj"];echo '%，请仔细确认后在操作。
                            </br>

                            3.提现时间：

                            工作日：9时到16时的提现申请当日到账；16时到次日9时的提现申请，在次日16时前到账。周末及法定节假日在提现申请后24小时到账。
                            </br>

                            4.根据国家反洗钱改革及保障客户资产安全，会对系统检测出的异常账户进行安全认证。如有疑问，请联系客服。
                        </div>
                    </div>
                </div>
            </div>
            <div class="smart-widget m-top-lg widget-green">
                <div class="smart-widget-header">
                    提现操作
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
							    <input type="hidden" name="mobile" id="mobile" value="';echo $user["mobile"];echo '">
								<input type="hidden" name="qb1" id="qb1" value="';echo $user["bl_qb"];echo '">
								<input type="hidden" name="qb3" id="qb3" value="';echo $user["bx_qb"];echo '">
								<input type="hidden" name="qb2" id="qb2" value="';echo $user["gq_qb"];echo '">
								<input type="hidden" name="qb4" id="qb4" value="';echo $user["dj_qb"];echo '">
								<input type="hidden" name="qb5" id="qb5" value="';echo $user["tb_qb"];echo '">
								<input type="hidden" name="action" id="action" value="tx">
                                <label for="shopingbag" class="col-lg-2 control-label">钱包类型</label>
                                <div class="col-lg-8">
                                    <select class="form-control"  name="qblx" id="qblx"  value="1">
                                        <option value="1">本利钱包</option>
                                        <option value="2">股权钱包</option>
                                        <option value="3">保险钱包</option>
                                        <option value="4">冻结钱包</option>
                                        <option value="5">退本钱包</option>
                                    </select>
                                </div><!-- /.col -->
                            </div>

                            <div class="form-group">
                                <label for="leftmoney" class="col-lg-2 control-label" id="qbname">本利钱包余额</label>
                                <div class="col-lg-8">
                                    <input type="number" class="form-control" disabled name="qbye" id="qbye" value="';echo $user["bl_qb"];echo '"
                                           placeholder="本利钱包余额">
                                </div><!-- /.col -->
                            </div>


                            <div class="form-group">
                                <label for="recbank" class="col-lg-2 control-label">汇入银行</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" required name="hryh" id="hryh"
                                           placeholder="汇入银行">
                                </div><!-- /.col -->
                            </div>


                            <div class="form-group">
                                <label for="account" class="col-lg-2 control-label">账号</label>
                                <div class="col-lg-8">
                                    <input type="number" class="form-control" required name="zh" id="zh"
                                           placeholder="账号">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label">户主</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" required name="hz" id="hz"
                                           placeholder="户主">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="moneyamount" class="col-lg-2 control-label">金额</label>
                                <div class="col-lg-8">
                                    <input type="number" class="form-control" required name="money" id="money"
                                           placeholder="金额">
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label for="tradepassword" class="col-lg-2 control-label">交易密码</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" required name="jypw" id="jypw"
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
													<button class="btn btn-default" type="button" name="but_phone" id="but_phone" onClick="time(this);">发送验证码</button>
												</span>
                                    </div>
                                </div><!-- /.col -->
                            </div>


                            <div class="form-group">
                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xs-offset-3 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                                    <button type="button" class="btn btn-success" style="width:100%;"
                                            onclick="txsend()">提现
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
//发送验证码时添加cookie
function addCookie(name,value,expiresHours){
    var cookieString=name+"="+escape(value);
	
    //判断是否设置过期时间,0代表关闭浏览器时失效
    if(expiresHours>0){
        var date=new Date();
        date.setTime(date.getTime()+expiresHours*1000);
        cookieString=cookieString+";expires=" + date.toUTCString();
    }
        document.cookie=cookieString;
}
//修改cookie的值
function editCookie(name,value,expiresHours){
    var cookieString=name+"="+escape(value);
    if(expiresHours>0){
      var date=new Date();
      date.setTime(date.getTime()+expiresHours*1000); //单位是毫秒
      cookieString=cookieString+";expires=" + date.toGMTString();
    }
      document.cookie=cookieString;
}
//根据名字获取cookie的值
function getCookieValue(name){
      var strCookie=document.cookie;
      var arrCookie=strCookie.split(";");
      for(var i=0;i<arrCookie.length;i++){
        var arr=arrCookie[i].split("=");
        if(arr[0]==name){
          return unescape(arr[1]);
          break;
        }
      }
       
}

$(function(){
v = getCookieValue("secondsremained")?getCookieValue("secondsremained"):0;
//获取cookie值
    if(v>0){
        okssss($("#but_phone"));//开始倒计时
    }
})


function isMobile(str) {
        var myreg = /^([0]?)(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(16[0-9]{1})|(17[0-9]{1})|(18[0-9]{1})|(19[0-9]{1}))+\d{8})$/;
        return myreg.test(str);

}





function time(o) {       
        if (document.getElementById("mobile").value == "") {
            alert("请填写手机号");
			//ShowInformation("错误","请填写手机号！");
            return false;
        }       
        if (!isMobile(document.getElementById("mobile").value)) {
            alert("手机格式不正确");
			//ShowInformation("错误","手机格式不正确！");
            return false;
        }
		var ifrm=document.getElementById("iframe1");
		ifrm.src="../check.php?phone="+document.getElementById("mobile").value;
		
		addCookie("secondsremained",60,60);//添加cookie记录,有效时间60s
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
            setTimeout(function() {
                okssss(o);
            },
           1000);
        }
   }


   //提现ajax
function txsend()
{
	if ($("#hryh").val()=="")
	{
		alert("汇入银行为空！");
		$("#hryh").focus();
		return ;
	}
	if ($("#zh").val()=="")
	{
		alert("错误:银行账号为空！");
		$("#zh").focus();
		return ;
	}
	if ($("#money").val()=="")
	{
		alert("错误:提现金额为空！");
		$("#money").focus();
		return ;
	}
	if (parseFloat($("#qbye").val())<=parseFloat($("#money").val())){
		alert("错误:金额不能大于钱包余额！");
		$("#money").focus();
		return;
	}
	
	
	
	
	$.ajax({
				cache: true,
				type: "POST",
				url: "userinfo.php",
				data:$("#txform").serialize(),// 你的formid
				async: false,
			    error: function(request) {
			        alert("错误:链接错误！");
			    },
			    success: function(data) {
					
					var showinfo="提现申请已经提交，请等待审核！";
					var btstr="信息";
					if(data!="0")
					{
					   showinfo=data;
					   btstr="错误";
					   alert(btstr+":"+showinfo);
					}
					else
					{
						 alert(btstr+":"+showinfo);
					   window.location.href="tx_user.php";
					}
					
			    }
			});
}


//提现选择钱包类型的时候显示钱包余额
$(document).ready(function(){ 
	$("#qblx").change(function(){
		//alert($(this).children("option:selected").text());
	  $("#qbname").html($(this).children("option:selected").text()+"余额");
	  $("#qbye").val($("#qb"+$(this).children("option:selected").val()).val());
	});
});
</script>

</body>
</html>
';






?>