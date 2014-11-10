<!DOCTYPE html>
<html>
<head>
	<meta name="viewpoint" content="width=device-width,initial-scale=1.0" />
	<title>Whole Article</title>
	<link href="bootstrap.css" rel="stylesheet type="text/css"">
	<link href="bootstrap-them.css" rel="stylesheet type="text/css"">
</head>
<body>
	<div class="container">
		<h1 class="header">The Lost Diomend on the Beach</h1>
		<div class="col-md-10 col-md-offset-1">
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
				$view=$_GET["view"];								/*GET从列表页传来的view=ID*/

				if ($view) {

						
					$arti=mysql_query("SELECT Arti_Title, Arti_Content FROM article WHERE Arti_ID='".$view."'");
					$box=mysql_fetch_row($arti);                /*根据ID 返回所有某一条目题目和内容为数组*/
			?>
			<div style="height:100px">
			<?php
					echo '<h2 class="header">'.$box[0].'</h2>'; /*显示题目*/
					echo '<p>'.$box[1].'</p>';					/*显示内容*/
				}
				echo '<a href="mybloglist.php">';
				echo '<button class="btn btn-primary" name="return" value="return">'."Return".'</button>'; /*无值传递链接按钮回list页面*/
				echo '</a>';

				mysql_close($con);
			?>				
			</div>
		</div>
	</div>
</body>
</html>
