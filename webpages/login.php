<?php
/**
* This php file is executed when a user tries to login
*/
include_once('dbproj_connect.php');
session_start();
$email=$_POST['email'];
$password =$_POST['password'];
$_SESSION['email'] = $email;
$query = "Select* from USER WHERE email='$email' AND password='$password'";
$result = $db ->query($query);
if($result != false){
	if($result->rowCount() == 1){ //Login user in as long as they are in the database
	//header('Location: http://www.cs.gettysburg.edu/~riehna01/cs360/webpages/shoppingPage.php');
	header('Location: http://www.cs.gettysburg.edu/~maldke01/DBProject/webpages/shoppingPage.php');
	}
	else{
		echo("<p>The information you entered is incorrect</p>");
		echo("<a href='homepage.php'> Go back to homepage </a>");
	}
}
?>
