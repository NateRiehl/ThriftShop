<?php
include_once('dbproj_connect.php');
session_start();
$Fname= $_POST['Fname'];
$Lname=$_POST['Lname'];
$email=$_POST['email'];
$password =$_POST['password'];
$query = "SELECT* FROM USER WHERE email = '$email'";
$result = $db->query($query);

if($result->rowCount() != 0){
	printf("<p> This email address is already in use. Please login with your other account or create an account with a new email address. </p>");
}
else{

$_SESSION['email'] = $email;
$query = "INSERT INTO USER VALUES('$Fname', '$Lname', '$email', '$password', 'imgs/propic.png' , 'Edit your bio to place information here')";
$result = $db ->query($query);
	if($result != false){
	printf("<p> Welcome to the Gettysburg Thrift shop, %s</p>\n", $Fname);
	printf("<a href='shoppingPage.php'> Go to shopping page </a>");
	}
}
?>

