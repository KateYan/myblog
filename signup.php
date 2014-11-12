<?php
error_reporting(E_ALL^E_DEPRECATED);
include 'connectdb.php';
session_start();
$error_msg = "";

if (isset($_POST["sign"])) {
	$username = $_POST["username"];
	$email = $_POST["email"];
	$pasw = $_POST["upasw"];
	if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["upasw"])) {

		$findname = mysql_query("SELECT * FROM user Where UserName='" . $username . "'");
		$namenum = mysql_num_rows($findname);

		$findemail = mysql_query("SELECT * FROM user Where UserName='" . $email . "'");
		$emailnum = mysql_num_rows($findemail);

		if (($namenum == 0) && ($email == 0) && ($pasw != "")) {
			mysql_query("INSERT INTO user(UserName, UserPassword, Email) VALUES ('" . $username . "','" . $pasw . "','" . $email . "')");
			$uid = mysql_query("SELECT @@IDENTITY AS 'Identity'");

			$_SESSION["userid"] = $uid;
			$_SESSION["username"] = $username;

			$home_url = "loged.php";
			header('Location:' . $home_url);
		} elseif ($namenum != 0) {
			$error_msg = "Sorry, this username has been taken.";/*报告错误信息*/
			echo '<div class="alert alert-warning" role="alert">';
			echo '<strong>' . "Warning! " . '</strong>';
			echo $error_msg;
			echo '</div>';
		} elseif ($emailnum != 0) {
			$error_msg = "Sorry, this email has been used.";/*报告错误信息*/
			echo '<div class="alert alert-warning" role="alert">';
			echo '<strong>' . "Warning! " . '</strong>';
			echo $error_msg;
			echo '</div>';
		} else {
			$error_msg = "Sorry, you must enter a valid username and password to log in.";/*报告错误信息*/
			echo '<div class="alert alert-warning" role="alert">';
			echo '<strong>' . "Warning! " . '</strong>';
			echo $error_msg;
			echo '</div>';
		}
	} else {
		$error_msg = "Sorry, please enter all required information.";/*报告错误信息*/
		echo '<div class="alert alert-warning" role="alert">';
		echo '<strong>' . "Warning! " . '</strong>';
		echo $error_msg;
		echo '</div>';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewpoint" content="width=device-width,initial-scale=1.0" />
	<title>Sign Up</title>
	<link href="bootstrap-3.3.0/dist/css/bootstrap.css" rel="stylesheet type="text/css"">
	<link href="bootstrap-3.3.0/dist/css/bootstrap-them.css" rel="stylesheet type="text/css"">
</head>
<body>
	<div class="container">
		<h1 class="page-header">Sign up as new user</h1>
		<div class="col-md-8 col-md-offset-2">
			<form id="signup" method="POST" action="signup.php">
			<label class="control-label" for="username">Username:</label>
				<input class="form-control" type="text" name="username" placeholder="Set your username">
			<label class="control-label" for="email">Email:</label>
				<input  class="form-control" type="text" name="email" placeholder="Enter your email">
			<label class="control-label" for="upasw">Password:</label>
				<input  class="form-control" type="text" name="upasw" placeholder="Set your password"><br>
			<button class="btn btn-primary" name="sign" value="Signup">Sign up</button>
			</form>
		</div>

	</div>
	<script type="text/javascript" src="bootstrap-3.3.0/dist/js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.0/dist/js/bootstrap.js"></script>
</body>
</html>