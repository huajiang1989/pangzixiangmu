<?php
include("../include/conn_2.php");
include("treeclass.php");
  $json_data = array();
  
  $usersql="select * from {$db_prefix}users where username='".$_SESSION["glo_username"]."'";
  $user=$db->get_one($usersql);
  //$sql="select username id,tjrname fid,case when username='A' then username else CONCAT(username,'    ',tjrname) end  text from {$db_prefix}users ";
  $sql="select username id,tjrname fid,CONCAT(username,'-',case when state=0 then '未激活' when state=1 then '激活' else '封存' 
end,'-',case when rank='0' then '无职务' when rank='1' then c.rank_name_1 when rank='2' then c.rank_name_2 when rank='3' then 
c.rank_name_3 when rank='4' then c.rank_name_4 when rank='5' then c.rank_name_5 when rank='6' then c.rank_name_6 when 
rank='7' then c.rank_name_7 when rank='8' then c.rank_name_8 when rank='9' then c.rank_name_9 when rank='10' then 
c.rank_name_10 else '' end,'-',IFNULL(b.tjnum,'0'),'-',ifnull(a.summoney,'0'),'-',FROM_UNIXTIME(a.confirmtime,'%Y-%m-%d')
) as  name from {$db_prefix}users a 
left join (select count(1) tjnum,tjrname as tjr from {$db_prefix}users group by tjrname)  b on a.username=b.tjr 
left join {$db_prefix}setting c on 1=1 where 1=1 ";

if($user["tjrname"]!="0")
{
	$sql.=" and a.id>='".$user["id"]."' and (a.tjrname!='".$user["tjrname"]."' or a.id='".$user["id"]."')";
}

  $result=$db->query($sql);
  $data1 = array();
  while($rsyj=$db->fetch_array($result)){
	  $data1[] = $rsyj;
	  } 
 
  $bta = new BuildTreeArray($data1,'id','fid',$user["tjrname"]);  
  $data = $bta->getTreeArray();  
  echo json_encode($data); 



  


?>