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
?>

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
			<div class="col-md-10 col-md-offset-1">
				<label class="control-label" for="title">Title: </label>
				<?php 
				$edit=$_GET["edit"];/*GET从list页面传来的edit=ID*/

				$result=mysql_query("SELECT Arti_Title, Arti_Content FROM article WHERE Arti_ID='".$edit."'");
				$editpart=mysql_fetch_row($result);/*根据ID 找出对应题目和内容*/
				echo '<form id="editarticle" action="" method="POST" ></form>'; /*规定input和textarea要使用POST页面传输局给本页面*/
				echo '<input class="form-control" type="text" form="editarticle" name="title" placeholder="Please type in the title" value="';
				echo $editpart[0];/*在input框显示原有内容标题*/
				echo '">';
			 ?><br>

				<label class="control-label" for="content">Content: </label>
				<div class="controls">
					<textarea form="editarticle" class="form-control" rows="15" name="content">
					<?php 
						echo $editpart[1];/*在textarea显示原有内容*/
					?>
					</textarea><br>
				</div>
				<button class="btn btn-primary" form="editarticle" name="save" value="Save">Save</button><!--保存按钮-->
					<?php 
					if (isset($_POST["save"])) {
						$title=str_replace("'", "''", $_POST["title"]);/*如果点击保存，用POST获取修改后title和content内容*/
						$content=str_replace("'", "''", $_POST["content"]);/*因为可能包含单引号，用str_replace函数将其替换为双引号，否则无法存入数据库*/
						$userid=$_SESSION["userid"];

						mysql_query("INSERT INTO article(Arti_Title, Arti_Content, userID) VALUES ('$title','$content','$userid')");/*修改后存为新的条目*/
						echo $edit;
						mysql_query("DELETE FROM article WHERE Arti_ID='".$edit."'");/*新条目存储后将旧的连同ID一起删除*/
					}
					?>
			</div>
		</div>

		<div class="row">
			<a href="mybloglist.php" class="col-md-10 col-md-offset-1">
				<br><button class="btn btn-success"  name="goback" value="Go Back">Return to main page</button><!--无值传递链接按钮，返回list页面-->
			</a>
		</div>			
	</div>
</body>
</html>
