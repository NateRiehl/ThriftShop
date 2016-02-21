<?php
include_once('dbproj_connect.php');
print_r($_POST);


$Fname= $_POST['Fname'];
$Lname=$_POST['Lname'];
$email=$_POST['email'];
$password =$_POST['password'];


$query = "INSERT INTO users VALUES('$Fname', '$Lname', '$email', '$password')";

printf("Query=%s\n", $query);
$result = $db ->query($query);
if($result != false){
	printf("<p> Added new titan to database </p>\n");
}
?>
<a href="test.php"> Back to titan page </a>
