<?php
include_once('dbproj_connect.php');
$Fname= $_POST['Fname'];
$Lname=$_POST['Lname'];
$email=$_POST['email'];
$password =$_POST['password'];

$query = "INSERT INTO users VALUES('$Fname', '$Lname', '$email', '$password')";
$result = $db ->query($query);
if($result != false){
	printf("<p> Welcome to the Gettysburg Thrift shop, %s</p>\n", $Fname);
}
?>
<a href="shoppingPage.php"> Go to shopping page </a>
