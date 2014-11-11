<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	include 'connectdb.php';
	session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
  	<meta name="viewpoint" content="width=device-width,initial-scale=1.0" />
 	<link href="bootstrap-3.3.0/dist/css/bootstrap.css" rel="stylesheet type="text/css"">
	<link href="bootstrap-3.3.0/dist/css/bootstrap-them.css" rel="stylesheet type="text/css"">
 	<title>Manage my account</title>
 </head>
 <body>
	<div class="container">
		<h1 class="page-header">Hi <a><i>user</i></a>, welcome to your control centre</h1>
		<div class="col-md-11 col-md-offset-1">
			<h3> All my articles:</h3>
			<div class="col-md-7">
			<ul class="list-group">
			<?php 
			if (isset($_SESSION["userid"])) {
				$result=mysql_query("SELECT Arti_ID, Arti_Title FROM article WHERE userID='".$_SESSION["userid"]."'");			/*查找用户所有的数据库条目*/
				$num=mysql_num_rows($result);
				if ($num==0) {
					echo "You have no article exists.";
				}

				else { 
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

								echo '<div class="col-md-1" style="width:20%">';
									echo '<span style="float:right">';
										echo '<a href="edit.php?edit='.$row[0].'" class="btn btn-xs btn-info">';/*每一行末尾插入一个连接button, GET ID 给edit,s送到edit.php*/
										echo "Edit".'</a>';
									echo '</span>';
								echo '</div>';
							echo '</div>';
						echo '</li>';
					}
				}
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
			<br><br>
			<a href="main.php" class="btn btn-primary">Back to main</a>
			<br><br>
			<form action="main.php" method="POST" accept-charset="utf-8">
			<button class="btn btn-primary" name="logout">Log out</button>
			</form>
			</div>
		</div>
	</div>
 
 	<script type="text/javascript" src="bootstrap-3.3.0/dist/js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.0/dist/js/bootstrap.js"></script>
 </body>

 </html>