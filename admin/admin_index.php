<?php
	require_once('phpscripts/config.php');
	require_once('phpscripts/connect.php');
	confirm_logged_in();


	//Use the session ID as a token to access the users database for whoever is logged in?
	$token = $_SESSION['user_id'];
	$tokenUserString = "SELECT * FROM tbl_user WHERE user_id = '{$token}'";

	$queryUser = mysqli_query($link, $tokenUserString);

//If a row comes back...
	if(mysqli_num_rows($queryUser)){
		$founduser = mysqli_fetch_array($queryUser, MYSQLI_ASSOC);

		$username = $founduser['user_name'];
		$firstName = $founduser['user_fname'];
		$lastLogin = $founduser['user_last_login'];
		$currentLogin = $founduser['user_current_login'];

	} else {
		redirect_to("admin_login.php");
	}
?>



<?php
	//I did not use a tutorial for the time of day welcome messages
	//Decided I would retreive the date again on this page
	//I only want the time this time, and I want it to run every time this page loads. A client may be logged in for a while (morning/afternoon)

	//Setting the default timezone so my time isn't relying on server time. Not sure if this is a bad idea or not
	date_default_timezone_set('America/Toronto');
	$currentTime = date('H'); //capital H gets the 24 hour clock I believe. Easier to filter this way. Also, I only want the HOUR.
	$timeGreeting = "";
	$timeSlogan = "";
	$timeClass = "";

	//If statements. My logic is - if the hour is past 12, it's afternoon, if it's past 17ish, it's evening, past 21 is night, and past 5 is morning.
	//Took a long time to figure out the operators, but it works!
	//https://stackoverflow.com/questions/18031410/javascript-if-time-is-between-7pm-and-7am-do-this
	if ($currentTime > 05 && $currentTime < 12) {
		$timeGreeting = "Good morning, $firstName!";
		$timeSlogan = "Have you had your coffee yet today?";
		$timeClass = "greetMorn";
		$timeIcon = "fa-coffee";
	} else if ($currentTime >= 12 && $currentTime < 17) {
		$timeGreeting = "Good afternoon, $firstName!";
		$timeSlogan = "Another productive day!";
		$timeClass = "greetAft";
		$timeIcon = "fa-sun-o ";
	} else if ($currentTime >= 17 && $currentTime < 21) {
		$timeGreeting = "Good evening, $firstName!";
		$timeSlogan = "What's on the dinner menu?";
		$timeClass = "greetEve";
		$timeIcon = "fa-cutlery";
	} else if ($currentTime >= 21 && $currentTime < 24) {
		$timeGreeting = "Time for bed, $firstName!";
		$timeSlogan = "Don't stay up too late!";
		$timeClass = "greetNight";
		$timeIcon = "fa-bed";
	} else {
		$timeGreeting = "You're still up, $firstName?!";
		$timeSlogan = "You must be a programmer...";
		$timeClass = "greetEarly";
		$timeIcon = "fa-moon-o";
	}
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
  <?php include('../includes/head.php'); ?>
  <title>Dashboard - Evil Corp</title>
  </head>

  <body id="adminIndex">

		<header>
			<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="#">Evil Corp</a></h1>
    </li>

    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>

  <section class="top-bar-section">

    <ul class="right">
      <li class="has-dropdown">
        <a href="#"><?php echo $_SESSION['user_name']; ?></a>
        <ul class="dropdown">
          <li><a href="#">Settings</a></li>
          <li><a href="#">Edit Profile</a></li>
        </ul>
				<li><a href="admin_login.php">Sign Out</a></li>
      </li>
    </ul>

    <!-- Left Nav Section -->
    <ul class="left">
      <li><a href="#">Client Dashboard</a></li>
    </ul>
  </section>
</nav>
		</header>



		<div class="fullWidth <?php echo $timeClass; ?>" id="greetingBanner">
		<div class="row">
		<div class="small-12 columns fadeIn">
		<h2><i class="fa <?php echo $timeIcon; ?>" aria-hidden="true"></i> <?php echo $timeGreeting; ?></h2>
		<h3><?php echo $timeSlogan; ?></h3>
		</div>
		</div>
		</div>

	<div class="row">
	<div class="small-12 columns fadeIn one">
		<p>Welcome to Evil Corp's admin panel. From here, you can do a variatey of tasks such as edit content, manage users, create pages, upload documents, and view website traffic/analytics.</p>
		<p>Well actually...you can't. Not yet anyway. Come back in a few months. Sign the guestbook!</p>
		</div>
	</div>

		<div class="row fadeIn two" id="logInfo">
			<div class="small-12 columns">
			<ul>
				<li id="lastLog">Your last successful login: <?php echo $lastLogin; ?></li>
				<li id="currLog">Current login: <?php echo $currentLogin; ?></li>
			</ul>
			<p>Suspicious activity? <a href="#">Contact your service administration</a>.<p>
		</div>
	</div>


	</body>
</html>
