<?php 

	error_reporting(E_ALL ^ E_DEPRECATED);
	include 'connectdb.php';

	session_start();
	if (isset($_SESSION["userid"])) {
		if (isset($_POST["save"])) {
			$title=str_replace("'", "''", $_POST["title"]);/*如果点击保存，用POST获取title和content内容*/
			$content=str_replace("'", "''", $_POST["content"]);/*因为可能包含单引号，用str_replace函数将其替换为双引号，否则无法存入数据库*/
			$userid=$_SESSION["userid"];

			mysql_query("INSERT INTO article(Arti_Title, Arti_Content, userID) VALUES ('$title','$content','$userid')");/*插入数据库表*/
		}
	}
?>
<html>
<head>
	<meta name="viewpoint" content="width=device-width,initial-scale=1.0" />
	<title>Create New Article</title>
	<link href="bootstrap-3.3.0/dist/css/bootstrap.css" rel="stylesheet type="text/css"">
	<link href="bootstrap-3.3.0/dist/css/bootstrap-them.css" rel="stylesheet type="text/css"">
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


		<div class="row">
			<a href="main.php" class="col-md-10 col-md-offset-1">
				<br><button class="btn btn-success"  name="goback" value="Go Back">Return to main page</button><!--无值传递链接按钮，返回list页面-->
			</a>
		</div>		
	</div>
	<script type="text/javascript" src="bootstrap-3.3.0/dist/js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.0/dist/js/bootstrap.js"></script>
</body>
</html>
