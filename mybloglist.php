<!DOCTYPE html>
<html>
<head>
	<meta name="viewpoint" content="width=device-width,initial-scale=1.0" />
	<title>Blog Main</title>
	<link href="bootstrap.css" rel="stylesheet type="text/css"">
	<link href="bootstrap-theme.css" rel="stylesheet type="text/css"">
</head>
<body>

	<div class="container">
		<h1 class="page-header">All Articles:</h1>
		<div class="col-md-7 col-md-offset-1">
			<ul class="list-group">
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

				$result=mysql_query("SELECT Arti_ID,Arti_Title FROM article");			/*查找所有的数据库条目*/
				$row=mysql_fetch_row($result);											/*把结果集存为字符串数组*/

				mysql_data_seek($result, 0);
				$i=1;
				while($row=mysql_fetch_row($result)) { 
					echo '<li class="list-group-item">';
						echo '<div class="row">';
							echo '<div class="col-md-6" style="width:80%">';
								echo '<input type="checkbox" style="display:none;">';
								echo '<span>';
									echo '<a href="article.php?view='.$row[0].'"><span>'; /*GET每个条目的Article_ID为view给每个连接，送到详情article.php*/
									echo $row[1];										/*显示题目*/
									echo '</span></a>';
								echo '</span>';
							echo '</div>';

							echo '<div class="col-md-1" style="width:20%">';
								echo '<span style="float:right">';
									echo '<a href="edit.php?edit='.$row[0].'" class="btn btn-xs btn-info">';/*每一行末尾插入一个连接button, GET ID 给edit,s送到edit.php*/
									echo "Edit".'</a>';
								echo '</span>';
							echo '</div>';
						echo '</div>';
					echo '</li>';
					$i++;
				}
			?>
		</ul></div>

		<div class="col-md-4">
		<?php
			echo '<a class="btn btn-success" href="newarticle.php" value="Write a new one">';	/*无值传递，链接按钮到newarticle.php*/
			echo "Write a new one";
			echo '</a>';
			mysql_close($con);
		?>	
		</div>

	</div>

	<script type="text/javascript" src="jquery-1.11.1.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
</body>
</html>