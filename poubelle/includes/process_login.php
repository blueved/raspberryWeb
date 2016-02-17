<?php
	include_once 'db_connect.php';
	include_once 'functions.php';
	sec_session_start(); // Our custom secure way of starting a PHP session.
	if (isset($_POST['email'], $_POST['p'])) {
		$email = $_POST['email'];
		$password = $_POST['p']; // The hashed password.
 
		if (login($email, $password, $mysqli) == true) {
			// Login success 
			//header('Location: ../homePage.php');
			$arr = array('result' => 'success');
			echo json_encode($arr);
		} else {
			// Login failed 
			$arr = array('result' => 'error');
			//header('Location: ../index.php?error=1');
			echo json_encode($arr);
		}
	} else {
		// The correct POST variables were not sent to this page. 
		echo 'Invalid Request', $_POST;
		$arr = array('result' => 'Invalid Request', 'x'=>$_POST);
		json_encode($arr);
	}
?>