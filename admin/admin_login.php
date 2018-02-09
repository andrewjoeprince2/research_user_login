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
<html>
	<head>
		<meta charset="UTF-8">
		<title>Welcome to your admin panel login</title>
		<link rel="stylesheet" type="text/css" href="../css/main.css">
	</head>
	
	<body>
		<?php if(!empty($message)){ echo $message;} ?>
		<div id="loginForm">
			
		<form action="admin_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" value="">
			<label>Password</labe>
			<input type="password" name="password" value="">

			<input id="submit" type="submit" name="submit" value="Show me da wey">
		</form>
	</div>
	</body>
</html>