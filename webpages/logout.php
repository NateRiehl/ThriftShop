<?php
	session_start();
	//Logout and redirect to homepage.
	session_destroy();
	header('Location: homepage.php');
?>
