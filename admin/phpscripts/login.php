<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');

		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		$loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";

		$user_set = mysqli_query($link, $loginstring);
		//echo mysqli_num_rows($user_set);
		if(mysqli_num_rows($user_set)){
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];

			$lastLogin = $founduser['user_current_login'];
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name'] = $founduser['user_name'];

			//Passing first name as a session. I actually don't think this was neccesary. Oops.
			$_SESSION['user_fname'] = $founduser['user_fname'];

			//Setting the default timezone so my time isn't relying on server time. Not sure if this is a bad idea or not
			date_default_timezone_set('America/Toronto');
			//I want to run the date function to create the current date/time
			//https://www.youtube.com/watch?v=7hTFhE5Bkjs
			$currentDate = date('m/d/Y H:i:s');

			if(mysqli_query($link, $loginstring)){
				$update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id = {$id}";
				$updatequery = mysqli_query($link, $update);

				//Store the LAST saved password. Simply by getting it from the user_current_login column and copying it to user_last_login column
				//No tutorial needed for this one
				$saveLast = "UPDATE tbl_user SET user_last_login='{$lastLogin}' WHERE user_id = {$id}";
				$updateSaveLast = mysqli_query($link, $saveLast);

				//Making another query to update the database. Updating my user_current_login column to display what the current time was when I logged in correctly
				//Essentially, user_last_login column holds the last backup right before users_current_login is overwritten (updated) with the current time
				$updateCurrentLogin = "UPDATE tbl_user SET user_current_login='{$currentDate}' WHERE user_id = {$id}";
				$updateLLquery = mysqli_query($link, $updateCurrentLogin);
			}

			redirect_to("admin_index.php");
		} else {
			$message = "The username and password you entered did not match our records. Please double-check and try again.";
			return $message;
		}

		mysqli_close($link);
	}

?>
