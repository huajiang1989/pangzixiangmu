<?php
echo '<HTML><HEAD><title>会员注册</title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

';
include("../include/conn_1.php");include("../include/pv.php");
include("../include/pos.php");
include("../include/rank.php");
include("../include/function.php");
include("../0123456789/1_s.php");
include("../include/ecls.php");
include("../include/logcls.php");
include("../include/setting.php");
include("../include/tjmoney_js.php");
;echo '';

if(!empty($_GET['tj']))
{
	$sql="select * from {$db_prefix}users where username='".trim($_GET['tj'])."'";
	$rs_skr=$db->get_one($sql);
}



if ($action=="reg"){
	//推荐人不能为空
	if(empty($tjr))
	{
		echo '		<script>alert(\'推荐人不能为空！\');location.href=\'register.php?tj=';echo $tjr;;echo '\';</script>';exit();
	}
	
	//判断推荐人账号是否激活
	$usersql="select * from {$db_prefix}users where username='".$tjr."'";
	$tj_user=$db->get_one($usersql);
	
	if($tj_user["state"]!="1")
	{
		echo '		<script>alert(\'推荐人状态异常，未激活或者被封号！\');location.href=\'register.php?tj=';echo $tjr;;echo '\';</script>';exit();
	}
	
    //获取账号
	if(!empty($zh))
	{
		//账号必须是6位及以上
		if(strlen($zh)<6)
		{
			echo '		<script>alert(\'账号必须6位及以上！\');location.href=\'register.php?tj=';echo $tjr;;echo '\';</script>';exit();
		}
		//账号是否由数字和英文组成
		 if (!preg_match("/^[a-z0-9\#]*$/", $zh)) 
		 {
			echo '		<script>alert(\'账号必须由英文或者数字组成！\');location.href=\'register.php?tj=';echo $tjr;;echo '\';</script>';exit();
		 }
		//判断账号是否重复
		$sql="select * from {$db_prefix}users where username='".trim($zh)."'";
		$rs_skr=$db->get_one($sql);
		if(!empty($rs_skr["id"]))
		{
			echo '		<script>alert(\'该账号已被占用，请重新输入！\');location.href=\'register.php?tj=';echo $tjr;;echo '\';</script>';exit();
		}
	}
	else
	{
		echo '		<script>alert(\'账号为空，请输入账号！\');location.href=\'register.php?tj=';echo $tjr;;echo '\';</script>';exit();
	}
	
	//手机号不能为空
	if(empty($mobile))
	{
		echo '		<script>alert(\'手机号不能为空！\');location.href=\'register.php?tj=';echo $tjr;;echo '\';</script>';exit();
	}
	else
	{
		$search ='/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/';
		if(!preg_match($search,$mobile)) {
		 echo '		<script>alert(\'手机号输入错误！\');location.href=\'register.php?tj=';echo $tjr;;echo '\';</script>';exit();
		}
		
	}
	
	//手机号不能重复
	$sql_mobile="select id  from {$db_prefix}users where mobile='".trim($mobile)."'";
    $rs_mobile=$db->get_one($sql_mobile);
    if(!empty($rs_mobile['id'])) 
	{
		echo '		<script>alert(\'该手机号已被占用！\');location.href=\'register.php?tj=';echo $tjr;;echo '\';</script>';exit();
	}
	
	//验证码检验
	/*if($glo_is_phone)
	{
		if(trim($mobile)!=trim($_SESSION["PHONE_NUM"])) 
		{
			echo '		<script>alert(\'注册的手机号码和验证手机号不相同！\');location.href=\'register.php?skr=';echo $tjr;;echo '\';</script>';exit();
		}
		if(trim($check_code)!=$_SESSION["CHECK_CODE"]) 
		{
			echo '		<script>alert(\'验证码错误！\');location.href=\'register.php?skr=';echo $tjr;;echo '\';</script>';exit();
		}
	}*/
	
	//获取设置
	$sql_sz="select * from {$db_prefix}setting ";
    $cssz=$db->get_one($sql_sz);
	
	//新增会员
	$sql="insert into {$db_prefix}users(username,tjrname,rank,state,mobile,regtime,pwd,pwd1,hy_s,hy_sts,jtfltime,jtflts) values('".trim($zh)."','".trim($tjr)."','0','0','".$mobile."','".time()."','".mymd5($mobile,"EN")."','".mymd5($mobile,"EN")."','".$cssz["hy_s"]."','".$cssz["hy_sts"]."','0','0')";
    $db->query($sql);
	
	//做这个会员相对其他会员的代数逻辑
	user_ds(trim($zh));
	
	//推荐的会员的人数加1
	//$sqlkq="update {$db_prefix}users set tjnum=tjnum+1 where username='".$tjr."' ";
    //$db->query($sqlkq);
	
	echo '		<script>alert(\'注册完成,请到资料修改补充详细信息！\');location.href=\'register.php?tj=';echo $tjr;;echo '\';</script>
	';exit();
}

;echo '<link rel="stylesheet" href="/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/dist/css/bootstrap-theme.min.css">

<style>
.col-center-block {
    float: none;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>


<script language="javascript" type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
<script src="/dist/js/bootstrap.min.js"></script>
<script language="javascript">

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
            return false;
        }       
        if (!isMobile(document.getElementById("mobile").value)) {
            alert("手机格式不正确");
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
</script>
</head>
<body>
<iframe id="iframe1" name="iframe1" src="" style="display:none "></iframe>
<div class="container">
   <div class="row myCenter ">
     <div class="col-sm-6 col-md-4 col-center-block">
	     <div style="height:20%;"></div>
        <h3 class="text-center text-danger ">会员注册</h3>
		<form class="form-horizontal" method="post" role="form" action="register.php?action=reg">
		  <div class="form-group">
			<label for="zzhy" class="col-sm-4 control-label">推荐人</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" id="tjr" name="tjr" readonly value="';echo $rs_skr["username"];echo '">
			</div>
		  </div>
		  <div class="form-group">
			<label for="jshy" class="col-sm-4 control-label">账号</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control"  id="zh" name="zh"  placeholder="请输入6位及以上数字和字母">
			</div>
		  </div>
		   <div class="form-group">
    
			<label for="zzsjh" class="col-sm-4 control-label">手机</label>
			<div class="col-sm-8">
			  <div class="input-group">
				  <input type="tel" class="form-control" id="mobile" name="mobile">
				  <span class="input-group-btn">
					<button name="but_phone" id="but_phone" onClick="time(this);" class="btn btn-default" type="button">获取验证码</button>
				  </span>
				  <span id="phonediv"></span>
			  </div>
			</div>
			
		  </div>
		   <div class="form-group">
			<label for="code" class="col-sm-4 control-label">验证码</label>
			<div class="col-sm-8">
			  <input name="check_code" type="text" id="check_code" class="form-control"  >
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
			  <button type="submit" class="btn btn-danger btn-block">注册</button>
			</div>
		  </div>
		</form>
	 </div>
  </div>
</div>
<br><br>
</body></html>';
?>