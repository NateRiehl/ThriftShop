<?php
include_once('dbproj_connect.php');
session_start();
//Gather their information
$Fname= $_POST['Fname'];
$Lname=$_POST['Lname'];
$email=$_POST['email'];
$password =$_POST['password'];
$password = md5($password); //Hash password so not stored in plain text

$query = "SELECT* FROM USER WHERE email = '$email'";//Test query to make sure email is unique
$result = $db->query($query);

if($result->rowCount() != 0){ //Error msg. Email address in use.
	printf("<p> This email address is already in use. Please login with your other account or create an account with a new email address. </p>");
}
else{
$_SESSION['email'] = $email; //Set session variable (Essential for rest of website)
// imgs/propic is the default profile picture for users
// "Edit your bio[..]" is the default bio for users
$query = "INSERT INTO USER VALUES('$Fname', '$Lname', '$email', '$password', 'imgs/propic.png' , 'Edit your bio to place information here')"; 
$result = $db ->query($query);
	if($result != false){
	printf("<p> Welcome to the Gettysburg Thrift shop, %s</p>\n", $Fname);
	printf("<a href='shoppingPage.php'> Go to shopping page </a>");
	}
}
?>

