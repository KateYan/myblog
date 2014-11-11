<?php 
	error_reporting(E_ALL ^ E_DEPRECATED); /*数据库连接文件*/
	$url = "127.0.0.1";
	$user = "root"; 
	$password = "1122";

	$con = mysql_connect($url,$user,$password);
	if(!$con){
		die("fail to connect".mysql_error());
	}

	mysql_select_db("myblog",$con);
 ?>