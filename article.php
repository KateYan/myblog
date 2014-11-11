<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	include 'connectdb.php';
	session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewpoint" content="width=device-width,initial-scale=1.0" />
	<title>Whole Article</title>
	<link href="bootstrap-3.3.0/dist/css/bootstrap.css" rel="stylesheet type="text/css"">
	<link href="bootstrap-3.3.0/dist/css/bootstrap-them.css" rel="stylesheet type="text/css"">
</head>
<body>
	<div class="container">
		<h1 class="header">The Lost Diomend on the Beach</h1>
		<div class="col-md-10 col-md-offset-1">

			<div style="height:100px">
			<?php 
				$view=$_GET["view"];								/*GET从列表页传来的view=ID*/

				if ($view) {
					$arti=mysql_query("SELECT Arti_Title, Arti_Content FROM article WHERE Arti_ID='".$view."'");
					$box=mysql_fetch_array($arti);                /*根据ID 返回所有某一条目题目和内容为数组*/

					echo '<h2 class="header">'.$box[0].'</h2>'; /*显示题目*/
					echo '<p>'.$box[1].'</p>';					/*显示内容*/
				}
				echo '<a href="main.php">';
				echo '<button class="btn btn-primary" name="return" value="return">'."Return".'</button>'; /*无值传递链接按钮回list页面*/
				echo '</a>';

				mysql_close($con);
			?>				
			</div>
		</div>
	</div>
	<script type="text/javascript" src="bootstrap-3.3.0/dist/js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.0/dist/js/bootstrap.js"></script>
</body>
</html>
