<?php
include ("database.php");
date_default_timezone_set("PRC");
//添加评论
$userinfo = $_POST['uid'];//获取用户是否登录
$goodid=$_POST['hid'];
//$uid = $_POST[''];
$content = $_POST['content'];//评论内容


$cues = '';
// if($userinfo == ''){
// 	$cues='您还没登录..';
// }else
	 if($content == ''){
	$cues='请输入评论..';
}else{
	$sql = mysql_query("
		INSERT INTO `yershop_comment_user`(goodid,create_time,content,uid) VALUES('{$goodid}',UNIX_TIMESTAMP(),'{$content}','{$userinfo}');		
	");
	if($sql){
		$cues='评论添加成功..';
	}else{
		$cues = '评论添加失败..';
	}
}
$b='[{"tishi":"'.$cues.'"}]';
echo $b;
mysql_close();
?>