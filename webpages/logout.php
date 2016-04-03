<?php
	session_start();
	session_destroy();
	header('Location: http://www.cs.gettysburg.edu/~riehna01/cs360/webpages/homepage.php');
?>
