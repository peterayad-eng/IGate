<?php
	session_start();
	unset($_SESSION['user']);
	session_destroy();
	setcookie('mail', '', time() - 180);
	header("location: page-login.php");
?>
