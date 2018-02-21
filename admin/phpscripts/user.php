<?php

	function createUser($fname, $username, $password, $email, $lvllist, $randomPass) {
		include('connect.php');
		$userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', '{$lvllist}', 'no', 'Not Set', 'Not set', '0', '$randomPass' )";
		echo $userstring;

		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			redirect_to('admin_index.php');
		}else{
			$message = "This guy sucks.";
			return $message;
		}
	}


?>
