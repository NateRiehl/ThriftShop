<?php
	session_start();
	session_destroy();
	header('Location: http://www.cs.gettysburg.edu/~riehna01/cs360/webpages/homepage.php');
	//header('Location: http://www.cs.gettysburg.edu/~maldke01/DBProject/webpages/homepage.php');
?>
