<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	include 'connectdb.php';
	session_start();
	if (isset($_POST["logout"])) {
		$_SESSION=array();
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewpoint" content="width=device-width,initial-scale=1.0" />
	<title>Blog Main</title>
	<link href="bootstrap-3.3.0/dist/css/bootstrap.css" rel="stylesheet type="text/css"">
	<link href="bootstrap-3.3.0/dist/css/bootstrap-them.css" rel="stylesheet type="text/css"">
</head>
<body>

	<div class="container">
		<h1 class="page-header">All Articles:</h1>
		<div class="col-md-7 col-md-offset-1">
			<ul class="list-group">
			<?php 		
				$result=mysql_query("SELECT Arti_ID, Arti_Title,userID FROM article");			/*查找所有的数据库条目*/
				$row=mysql_fetch_row($result);                  /*把结果集存为字符串数组*/

				mysql_data_seek($result, 0);		
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

							$showeditor=mysql_query("SELECT UserName FROM user WHERE UserID='".$row[2]."'"); 
							$box=mysql_fetch_row($showeditor);
							$editor=str_replace("'", "''", $box[0]);

							echo '<div class="col-md-1" style="width:20%">';
								echo '<span style="float:right">';
									echo '<a href="">'.$editor.'</a>';
								echo '</span>';
							echo '</div>';
						echo '</div>';
					echo '</li>';
				}
			?>
		</ul></div>

		<div class="col-md-4">
		<?php
			if (!isset($_SESSION["userid"])) {       /*如果没登陆则login*/
				echo '<a class="btn btn-success" href="login.php" value="Log in to manage">';	/*无值传递，链接按钮到newarticle.php*/
				echo "Log in to manage";
				echo '</a>';
				mysql_close($con);			
			}
			else { 
				echo '<a class="btn btn-success" href="newarticle.php" value="newarticle">'."Write a new one".'</a>';
				echo "<br><br>";
				echo '<a class="btn btn-primary" href="loged.php" value="manage center">'."Manage Center".'</a>';

			}
		?>	
		</div>
	</div>

	<script type="text/javascript" src="bootstrap-3.3.0/dist/js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.0/dist/js/bootstrap.js"></script>
</body>
</html>