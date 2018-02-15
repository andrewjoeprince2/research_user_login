<?php
	require_once('phpscripts/config.php');
	$ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;
	if(isset($_POST['submit'])){
		// "works";
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== "") {
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else {
			$message = "Please fill out the required fields.";
		}
	}
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
  <?php include('../includes/head.php'); ?>
  <title>Client Login - Evil Corp</title>
  </head>

  <body>

		<div id="loginContainer">
		<div class="row">

			<div class="small-12 columns" id="loginInfo">
				<h2>Evil Corp</h2>
				<h3>Together we can change the world, with E Corp.</h3>
			</div>

			<div class="small-12 columns" id="loginForm">
				<h3>Sign in with your organizational account</h3>

				<?php if(!empty($message)){ echo "<p class=\"error fadeIn\"><i class=\"fa fa-exclamation-triangle fade\" aria-hidden=\"true\" id=\"warningIcon\"></i>{$message}</p>";} ?>

				<form action="admin_login.php" method="post">
					<label>Username</label>
					<input type="text" name="username" value="">
					<label>Password</labe>
					<input type="password" name="password" value="">

					<input id="submit" type="submit" name="submit" value="Let's Go!">
				</form>
				<div id="loginHelp">
				<a href="#">Forgot Password</a>
				</div>
			</div>
		</div>
	</div>


	</body>
</html>
