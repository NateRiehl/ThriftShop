<?php
/**
* This php file is executed when a user tries to login
*/
include_once('dbproj_connect.php');
session_start();
$email=$_POST['email'];
$password =$_POST['password'];
$password = md5($password); //Hash the password to match database
$_SESSION['email'] = $email;
$query = "Select* from USER WHERE email='$email' AND password='$password'";
$result = $db->query($query);
if($result != false){
	if($result->rowCount() == 1){ //Login user in as long as they are in the database
	//header('Location: http://www.cs.gettysburg.edu/~riehna01/cs360/webpages/shoppingPage.php');
	header('Location: shoppingPage.php');
	}
	else{
		//Redirect to homepage with error message passed through
		die(header("location:homepage.php?loginFailed=true&reason=password"));

	}
}
?>
