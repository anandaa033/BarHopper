<?php	// ไฟล์ logout.php
	session_start();
	//unset($_SESSION['user_right']);
	//unset($_SESSION['FirstName']);
	//unset($_SESSION['LastName']);

	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy();
	header("Location:Login.php");
?>
