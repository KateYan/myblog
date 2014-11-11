
	<?php 
		error_reporting(E_ALL ^ E_DEPRECATED);
		$url = "127.0.0.1";
		$user = "root"; 
		$password = "1122";

		$con = mysql_connect($url,$user,$password);
		if(!$con){
			die("fail to connect".mysql_error());
		}

		mysql_select_db("myblog",$con);

		session_start();
		$error_msg="";

		if (!isset($_SESSION["userid"])) {         /*没有人登录时，执行*/
			if (isset($_POST["inconfirm"])) {      /*点击了login按钮*/
				$username=mysql_real_escape_string(trim($_POST["username"]),$con);/*转义数据库中的字符串给变量*/
				$password=mysql_real_escape_string(trim($_POST["password"]),$con);/*trim函数删除字符串两端空白字符*/

				if (!empty($username)&&!empty($password)) { /*如果用户名和密码都输入*/
					$query=mysql_query("SELECT UserID, UserName FROM user WHERE Username='".$username."' AND UserPassword='".$password."'");/*根据用户名和密码查找是否有对应的ID和用户名*/
					if (mysql_num_rows($query)==1) {/*如果返回有一个条目符合等于输入条件*/
						$row=mysql_fetch_array($query);
						$_SESSION["userid"]=$row[0];      /*设置session*/
						$_SESSION["username"]=$row[1];
						/*setcookie("userid",$row[0],time()+(60*60*24*30));   /*设置cookie和时间*/
						/*setcookie("username",$row[1],time()+(60*60*24*30));*/
						echo $_SESSION["userid"];
						$home_url="newarticle.php";       /*设置页面重定向地址*/
						header('Location:'.$home_url);
					}
					else{ /*没有查找到存在对应条目，即结果集为空*/
						$error_msg="Sorry, you must enter a valid username and password to log in.";/*报告错误信息*/
					}
				}
				else{ /*如果用户名和密码没有全部输入*/
					$error_msg="Sorry, you must enter a valid username and password to log in.";/*报告错误信息*/
				}
			}
		}
		else{ /*如果已有用户登录，直接跳转到list页面*/
			$home_url="mybloglist.php";
			header('Location:'.$home_url);
		}
 	?>

<html>
<head>
	<meta name="viewpoint" content="width=device-width,initial-scale=1.0" />
	<title>Log in</title>
	<link href="bootstrap.css" rel="stylesheet type="text/css"">
	<link href="bootstrap-theme.css" rel="stylesheet type="text/css""><title></title>
</head>

<body>
	<div class="container">	
		<h1 class="header">LOG IN</h1>
		<div class="col-md-8 col-md-offset-2">
			<form id="logininfo" method="POST" action=""></form>
			<label class="control-label" for="username">Username:</label>
				<input form="logininfo" class="form-control" type="text" name="username" placeholder="Enter your username">
			<label class="control-label" for="password">Password</label>
				<input form="logininfo" class="form-control" type="text" name="password" placeholder="Enter your password"><br>
			<button class="btn btn-primary" form="logininfo" name="inconfirm">Log in</button>
			<a class="btn btn-success" href="mybloglist.php">Return</a>
		</div>
	</div>
	<script type="text/javascript" src="jquery-1.11.1.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
</body>
</html>