<?php
include_once('dbproj_connect.php');
$email=$_POST['email'];
$password =$_POST['password'];

$query = "Select* from USER WHERE email='$email' AND password='$password'";
$result = $db ->query($query);
if($result != false){
	if($result->rowCount() == 1){
	printf("<p> Welcome to the Gettysburg Thrift shop </p>\n");
	printf("<a href='shoppingPage.php'> Go to shopping page </a>");
	}
	else{
		echo("<p>The information you entered is incorrect</p>");
		echo("<a href='homepage.php'> Go back to homepage </a>");
	}
}
?>
