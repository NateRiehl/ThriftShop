<?php
include_once('dbproj_connect.php');
$email=$_POST['email'];
$password =$_POST['password'];

$query = "Select* from users WHERE email='$email' AND password='$password'";
$result = $db ->query($query);
if($result != false){
	printf("<p> Welcome to the Gettysburg Thrift shop </p>\n");
}
?>
<a href="shoppingPage.php"> Go to shopping page </a>
