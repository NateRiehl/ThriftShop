<?php
include_once('dbproj_connect.php');
session_start();
$Fname= $_POST['Fname'];
$Lname=$_POST['Lname'];
$email=$_POST['email'];
$password =$_POST['password'];
$_SESSION['email'] = $email;
$query = "INSERT INTO USER VALUES('$Fname', '$Lname', '$email', '$password', 'imgs/propic.png' , 'Edit your bio to place information here')";
$result = $db ->query($query);
if($result != false){
	printf("<p> Welcome to the Gettysburg Thrift shop, %s</p>\n", $Fname);
}
?>

<a href="shoppingPage.php"> Go to shopping page </a>
