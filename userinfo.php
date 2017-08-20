<?php
include("../include/conn_2.php");
include("../include/area.php");
include("../include/function.php");
include("../include/rank.php");
include("../include/pos.php");
include("../include/phpqrcode.php");
include("../include/ecls.php");
include("../include/logcls.php");

//echo $_POST["sex"];

//会员信息的修改
if($action=="info")
{
	
	//对修改信息的验证
	//***********************************************手机号验证***********************************************
	//手机号不能为空
	if(empty($mobile))
	{
		echo "手机号为空";exit();
	}
	else
	{
		//$search ='/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/';
		$search='/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\\d{8}$/';
		if(!preg_match($search,$mobile)) {
		 echo "手机号输入错误！";exit();
		}
		
	}
	
	//手机号不能重复
	$sql_mobile="select id  from {$db_prefix}users where mobile='".trim($mobile)."' and id!='".$_SESSION["glo_userid"]."'";
    $rs_mobile=$db->get_one($sql_mobile);
    if(!empty($rs_mobile['id'])) 
	{
		echo "该手机号已被占用！";exit();
	}
	//**********************************************************************************************************
	
	
	//*******************************************身份证号******************************************************
	
	if(empty($idcard))
	{
		echo "身份证号为空！";exit();
	}
	else
	{
		//验证有错误
		if(!checkIdCard($idcard))
		{
			//echo "身份证号输入错误！";exit();
		}
		else
		{
			//验证是否被占用
			$sql_idcard="select id  from {$db_prefix}users where mobile='".trim($idcard)."' and id!='".$_SESSION["glo_userid"]."'";
			$rs_idcard=$db->get_one($sql_idcard);
			if(!empty($rs_idcard['id'])) 
			{
				echo "该身份证号已被占用！";exit();
			}
		}
	}
	
	//*******************************************************************************************************
	
	//***********************************************银行卡号验证*********************************************
	if(empty($zhanghao))
	{
		echo "银行卡号为空！";exit();
	}
	else
	{
		if(!preg_match('/([\d]{4})([\d]{4})([\d]{4})([\d]{4})([\d]{0,})?/',$zhanghao))
		{
			echo "银行卡号输入错误！";exit();
		}
		else
		{
			//验证银行卡号是否被占用
			$sql_zhanghao="select id  from {$db_prefix}users where zhanghao='".trim($zhanghao)."' and id!='".$_SESSION["glo_userid"]."'";
			$rs_zhanghao=$db->get_one($sql_zhanghao);
			if(!empty($rs_zhanghao['id'])) 
			{
				echo "该银行卡号已被占用！";exit();
			}
		}
	}
	
	//*****************************************************************************************************
	
	//***********************************支付宝************************************************************
	if(empty($zhanghao))
	{
		echo "支付宝账号不能为空！";exit();
	}
	else
	{
		//验证支付宝账号是否被占用
		$sql_zhifubao="select id  from {$db_prefix}users where zhifubao='".trim($zhifubao)."' and id!='".$_SESSION["glo_userid"]."'";
		$rs_zhifubao=$db->get_one($sql_zhifubao);
		if(!empty($rs_zhifubao['id'])) 
		{
		   echo "该支付宝账号已被占用！";exit();
		}
	}
	
	//****************************************************************************************************
	

	
	
	
	$sql="update {$db_prefix}users set realname='".$realname."',sex='".$sex."',recontact='$recontact',receiver='$receiver',idcard='".trim($idcard)."',mobile='".trim($mobile)."',bank='".trim($bank)."',zhanghao='".trim($zhanghao)."',zhifubao='".$zhifubao."',huzhu='".trim($huzhu)."',idcardadd='".$idcardadd."' where id='".$_SESSION["glo_userid"]."'";
    $db->query($sql);
	echo "0";
}


if($action=="pw")
{
	//验证旧密码是否对
	$sql_pw="select id  from {$db_prefix}users where pwd='".mymd5($oldpw,"EN")."' and id='".$_SESSION["glo_userid"]."'";
	$rs_pw=$db->get_one($sql_pw);
	if(empty($rs_pw['id'])) 
	{
	   echo "旧密码不正确！";exit();
	}
	else
	{
		$sql="update {$db_prefix}users set pwd='".mymd5($pw,"EN")."' where id='".$_SESSION["glo_userid"]."'";
        $db->query($sql);
		echo "0";
	}
}


if($action=="jypw")
{
	//验证旧密码是否对
	$sql_pw="select id  from {$db_prefix}users where pwd1='".mymd5($oldjypw,"EN")."' and id='".$_SESSION["glo_userid"]."'";
	$rs_pw=$db->get_one($sql_pw);
	if(empty($rs_pw['id'])) 
	{
	   echo "旧密码不正确！";exit();
	}
	else
	{
		$sql="update {$db_prefix}users set pwd1='".mymd5($jypw,"EN")."' where id='".$_SESSION["glo_userid"]."'";
        $db->query($sql);
		echo "0";
	}
}

if($action=="send")
{
	if($tousername=="管理员")
	{
		 $tousername="admin";
	}
	
	/*if(empty($title) || empty($content))
	{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /><script>alert('标题或者内容不能为空!');location.href='xx_user.php';</script>";exit();
	}*/
	
	$sql="select * from {$db_prefix}admin where username='".trim($tousername)."'";
    $rs=$db->get_one($sql);
    $sql1="insert into {$db_prefix}mails(username,realname,title,content,fromusername,fromrealname,fromtype,addtime,state) values('".$rs["username"]."','".$rs["realname"]."','".trim($title)."','".$content."','".$_SESSION["glo_username"]."','".$_SESSION["glo_realname"]."','0','".time()."','1')";
    $db->query($sql1);
    $sql2="insert into {$db_prefix}mails1(username,realname,title,content,tousername,torealname,totype,addtime,state) values('".$_SESSION["glo_username"]."','".$_SESSION["glo_realname"]."','".trim($title)."','".$content."','".$rs["username"]."','".$rs["realname"]."','1','".time()."','1')";
    $db->query($sql2);
     /*echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /><script>alert('邮件已经发送!');location.href='xx_user.php';</script>";exit();*/
	 echo "0";
}




//提现
if ($action=="tx"){
$modtime=time();
$sql_tx="select id from {$db_prefix}cashes where username='".$_SESSION["glo_username"]."' and state=0 and qblx='".$qblx."'";
$rs_tx=$db->get_one($sql_tx);
$sql_cssz="select * from {$db_prefix}setting  ";
$cssz=$db->get_one($sql_cssz);

//体现是否超过上限
if($money>$cssz["txmax"])
{
	echo "提现不能大于".$cssz["txmax"]."！";exit();
}

//提现是否有重复判断
if($rs_tx['id']){
/*echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /><script>alert('您已经有未审核的提现记录，请不要重复提交');history.back();</script>";exit();*/
echo "您已经有未审核的提现记录，请不要重复提交！";exit();
}
//交易密码确认
$sql_1="select * from {$db_prefix}users where username='".$_SESSION["glo_username"]."' and pwd1='".mymd5($jypw,"EN")."'";
$rs_1=$db->get_one($sql_1);
if (empty($rs_1["id"])){
/*echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /><script>alert('交易密码确认失败');history.back();</script>";exit();*/
echo "交易密码确认失败！";exit();
}

//手机验证码确认
if(trim($check_code)!=$_SESSION["CHECK_CODE"]) 
{
	/*echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /><script>alert('验证码错误！');location.href='txgl.php';</script>";exit();*/
	//echo "验证码错误！";exit();
}

//提现金额的倍数判断
if(ceil($money/$cssz["txbs"])!=($money/$cssz["txbs"])) 
{
	/*echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /><script>alert('提现金额必选是".$cssz["txbs"]."的倍数！');location.href='txgl.php';</script>";exit();*/
	echo "提现金额必选是".$cssz["txbs"]."的倍数！";exit();
}
//计算提现金额 扣除百分比慈善基金
$money=$money*(100-$cssz["tx_csjj"])/100;

//开始插入提现数据
$sql="insert into {$db_prefix}cashes(username,realname,bank,zhanghao,huzhu,price,addtime,state,qblx,fee) values('".$_SESSION["glo_username"]."','".$_SESSION["glo_realname"]."','".trim($hryh)."','".trim($zh)."','".trim($hz)."','".floatval($money)."','".time()."','0','".$qblx."','".$money/100*$cssz["tx_csjj"]."')";
$db->query($sql);
$log_adminid=$_SESSION["glo_userid"];$log_admin=$_SESSION["glo_username"];$log_type=100;$log_addtime=time();$log_ip=getip();
$log_memo="会员".$_SESSION["glo_username"]."申请提现".$money."扣除慈善基金".$cssz["tx_csjj"]."%";
setlogstype($log_adminid,$log_admin,$log_type,$log_addtime,$log_ip,$log_memo);
/*echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /><script>alert('提现申请已提交，请等待审核');</script>";*/
echo "0";exit();


}

//汇款
if($action=="hk")
{
	//交易密码确认
	$sql_1="select * from {$db_prefix}users where username='".$_SESSION["glo_username"]."' and pwd1='".mymd5($jypw,"EN")."'";
	$rs_1=$db->get_one($sql_1);
	if (empty($rs_1["id"])){
	/*echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /><script>alert('交易密码确认失败');history.back();</script>";exit();*/
	echo "交易密码确认失败！";exit();
	}
	
	//手机验证码确认
	if(trim($check_code)!=$_SESSION["CHECK_CODE"]) 
	{
		/*echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /><script>alert('验证码错误！');location.href='txgl.php';</script>";exit();*/
		//echo "验证码错误！";exit();
	}
	
	
	$bank="";
	$sql_bank="select * from {$db_prefix}setting ";
	$rs_bank=$db->get_one($sql_bank);
	if($bankid=="zfb")
	{
		$bank="支付宝"."<br>".$rs_bank["zfb"]."<br>".$rs_bank["hz"];
	}
	else if($bankid=="btb")
	{
		$bank="比特币"."<br>".$rs_bank["btb"]."<br>".$rs_bank["hz"];
	}
	else if($bankid=="wx")
	{
		$bank="微信"."<br>二维码扫描<br>".$rs_bank["hz"];
	}
	else
	{
		$bank=$rs_bank["khh"]."<br>".$rs_bank["yhzh"]."<br>".$rs_bank["hz"];
	}
	if($bankid=="btb")
	{
		$cz_je=$price;
	}
	else
	{
		$cz_je=floatval($price+$fee/100);
	}
	
	$sql="insert into {$db_prefix}remits(username,realname,bank,hkname,price,memo,state,hktime,addtime) values('".$_SESSION["glo_username"]."','".$_SESSION["glo_realname"]."','".$bank."','".$hkname."','".$cz_je."','汇款','0','".time()."','".time()."')";
    $db->query($sql);
    $log_adminid=$_SESSION["glo_userid"];$log_admin=$_SESSION["glo_username"];$log_type=101;$log_addtime=time();$log_ip=getip();
    setlogstype($log_adminid,$log_admin,$log_type,$log_addtime,$log_ip,$log_memo);
	
	echo "0";exit();
}


//会员选择
if($action=="getrank")
{
	//判断交易密码是否正确 并取得该会员的数据
	$sql="select * from {$db_prefix}users where username='".$_SESSION["glo_username"]."' and pwd1='".mymd5($jypwd,"EN")."'";
    $urs=$db->get_one($sql);
	if(empty($urs["username"]))
	{
		echo "交易密码输入错误！";exit();
	}
	//判断是否存在未处理的升级
	$sqlstr="select count(1) s from {$db_prefix}editrankrecord where username='".$_SESSION["glo_username"]."' and state='0'";
	$str_s=$db->get_one($sqlstr);
	if($str_s["s"]!="0")
	{
		echo "您已经选择会员等级，请您先等待处理！";exit();
	}
	$modtime=time();
	$sql_get="insert into {$db_prefix}editrankrecord (username,oldrank,rank,applytime,state,isapproved,edittime) values ('".$_SESSION["glo_username"]."','".$urs["rank"]."','$rank','$modtime','0','1','')";
    $db->query($sql_get);
	echo "0";exit();
}

//会员升级
if($action=="uprank")
{
	//判断交易密码是否正确 并取得该会员的数据
	$sql="select * from {$db_prefix}users where username='".$_SESSION["glo_username"]."' and pwd1='".mymd5($jypwd,"EN")."'";
    $urs=$db->get_one($sql);
	if(empty($urs["username"]))
	{
		echo "交易密码输入错误！";exit();
	}
	//判断是否存在未处理的升级
	$sqlstr="select count(1) s from {$db_prefix}editrankrecord where username='".$_SESSION["glo_username"]."' and state='0'";
	$str_s=$db->get_one($sqlstr);
	if($str_s["s"]!="0")
	{
		echo "您有未处理的升级，请您先等待处理！";exit();
	}
	$modtime=time();
	$sql111="insert into {$db_prefix}editrankrecord (username,oldrank,rank,applytime,state,isapproved,edittime) values ('".$_SESSION["glo_username"]."','".$urs["rank"]."','$rank','$modtime','0','1','')";
	$db->query($sql111);
	echo "0";
}


//会员转账
if($action=="zz")
{
	
	//判断交易密码是否正确 并取得该会员的数据
	$sql="select * from {$db_prefix}users where username='".$_SESSION["glo_username"]."' and pwd1='".mymd5($zzjypwd,"EN")."'";
    $urs=$db->get_one($sql);
	if(empty($urs["username"]))
	{
		echo "交易密码输入错误！";exit();
	}
	
	
	
	//判断消费金额是否超出钱包数额
	if($zzmoney>$urs["xf_qb"])
	{
		echo "转账金额大于钱包余额！";exit();
	}
	//判断接收的会员是否存在
	$sql_js="select * from {$db_prefix}users where username='".$touser."' and state=1 and rank>'0'";
    $urs_js=$db->get_one($sql_js);
	if(empty($urs_js["username"]))
	{
		echo "接收会员不存在或者没有激活或者没有会员等级！";exit();
	}
	
	//转钱的减少
	$sql_1="update {$db_prefix}users set xf_qb=xf_qb-".floatval($zzmoney)." where username='".$_SESSION["glo_username"]."' and state=1 and rank>'0'";
    $db->query($sql_1);
	//接收的增加
	$sql_2="update {$db_prefix}users set xf_qb=xf_qb+".floatval($zzmoney)." where username='".$touser."' and state=1 and rank>'0'";
    $db->query($sql_2);
	
	//添加转账记录
	$sql_re="insert into {$db_prefix}tranfer(username,realname,tousername,torealname,price,state,addtime,fee,type)
	         values('".$_SESSION["glo_username"]."','".$urs["realname"]."','".$urs_js["username"]."','".$urs_js["realname"]."','".$zzmoney."',1,'".time()."','0','4')";
    $db->query($sql_re);
	
	echo "0";
}


function checkIdCard($idcard){
	if(empty($idcard)){
	return false;
	}
	//$idcard = $_POST["idcard’"];
	$City = array(11=>"北京",12=>"天津",13=>"河北",14=>"山西",15=>"内蒙古",21=>"辽宁",22=>"吉林",23=>"黑龙江",31=>"上海",32=>"江苏",33=>"浙江",34=>"安徽",35=>"福建",36=>"江西",37=>"山东",41=>"河南",42=>"湖北",43=>"湖南",44=>"广东",45=>"广西",46=>"海南",50=>"重庆",51=>"四川",52=>"贵州",53=>"云南",54=>"西藏",61=>"陕西",62=>"甘肃",63=>"青海",64=>"宁夏",65=>"新疆",71=>"台湾",81=>"香港",82=>"澳门",91=>"国外");
	$iSum = 0;
	$idCardLength = strlen($idcard);
	//长度验证
	if(!preg_match("/^d{17}(d|x)$/i",$idcard) and!preg_match("/^d{15}$/i",$idcard))
	{
	return false;
	}
	//地区验证
	if(!array_key_exists(intval(substr($idcard,0,2)),$City))
	{
	return false;
	}
	// 15位身份证验证生日，转换为18位
	if ($idCardLength == 15)
	{
	$sBirthday = ’19’.substr($idcard,6,2).’-'.substr($idcard,8,2).’-'.substr($idcard,10,2);
	$d = new DateTime($sBirthday);
	$dd = $d->format("Y-m-d");
	if($sBirthday != $dd)
	{
	return false;
	}
	$idcard = substr($idcard,0,6)."19".substr($idcard,6,9);//15to18
	$Bit18 = getVerifyBit($idcard);//算出第18位校验码
	$idcard = $idcard.$Bit18;
	}
	// 判断是否大于2078年，小于1900年
	$year = substr($idcard,6,4);
	if ($year2078 )
	{
	return false;
	}

	//18位身份证处理
	$sBirthday = substr($idcard,6,4)."-".substr($idcard,10,2)."-".substr($idcard,12,2);
	$d = new DateTime($sBirthday);
	$dd = $d->format("Y-m-d");
	if($sBirthday != $dd)
	{
	return false;
	}
	//身份证编码规范验证
	$idcard_base = substr($idcard,0,17);
	if(strtoupper(substr($idcard,17,1)) != getVerifyBit($idcard_base))
	{
	return false;
	}
	return $_POST["idcard"];
	}

	// 计算身份证校验码，根据国家标准GB 11643-1999
	function getVerifyBit($idcard_base)
	{
	if(strlen($idcard_base) != 17)
	{
	return false;
	}
	//加权因子
	$factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
	//校验码对应值
	$verify_number_list = array("1", "0", "X", "9", "8", "7", "6", "5", "4","3", "2");
	$checksum = 0;
	for ($i = 0; $i < strlen($idcard_base); $i++)
	{
	$checksum += substr($idcard_base, $i, 1) * $factor[$i];
	}
	$mod = $checksum % 11;
	$verify_number = $verify_number_list[$mod];
	return $verify_number;
	}

?>