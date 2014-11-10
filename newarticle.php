<!DOCTYPE html>
<html>
<head>
	<meta name="viewpoint" content="width=device-width,initial-scale=1.0" />
	<title>Create New</title>
	<link href="bootstrap.css" rel="stylesheet type="text/css"">
	<link href="bootstrap-them.css" rel="stylesheet type="text/css"">
</head>

<body>
	<div class="container">
		<h1 class="page-header">Record You Mind:</h1>
		<div class="row">
			<form class="col-md-10 col-md-offset-1" method="POST" action="">
				<label class="control-label" for="title">Title: </label>
				<div class="controls">
					<input class="form-control" type="text" name="title" placeholder="Please type in the title"><br>
				</div>

				<label class="control-label" for="content">Content: </label>
				<div class="controls">
					<textarea class="form-control" rows="13" name="content"></textarea><br>
				</div>
				<button class="btn btn-primary" name="save" value="Save">Save</button>
			</form>
		</div>
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

		if (isset($_POST["save"])) {
			$title=str_replace("'", "''", $_POST["title"]);/*如果点击保存，用POST获取title和content内容*/
			$content=str_replace("'", "''", $_POST["content"]);/*因为可能包含单引号，用str_replace函数将其替换为双引号，否则无法存入数据库*/

			mysql_query("INSERT INTO article(Arti_Title, Arti_Content) VALUES ('$title','$content')");/*插入数据库表*/
		}

		mysql_close($con);

		?>

		<div class="row">
			<a href="mybloglist.php" class="col-md-10 col-md-offset-1">
				<br><button class="btn btn-success"  name="goback" value="Go Back">Return to main page</button><!--无值传递链接按钮，返回list页面-->
			</a>
		</div>
			
	</div>
</body>
</html>
