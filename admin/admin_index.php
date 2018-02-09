<?php
	require_once('phpscripts/config.php');
	confirm_logged_in()
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Welcome to your admin panel login</title>
		<link rel="stylesheet" type="text/css" href="../css/main.css">
	</head>
	
	<body>
		<h3>Hello <?php echo $_SESSION['user_name']; ?></h3>
		<p>You're logged in. Welcome to the admin panel. You can do nothing here.</p>	
	</body>
</html>