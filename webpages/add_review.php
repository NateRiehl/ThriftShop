<?php
include_once('dbproj_connect.php');
session_start();
$userEmail = $_SESSION['email'];
$email = $_POST['email'];
$title = $_POST['title'];
$comment = $_POST['comment'];
$numGrade = $_POST['numGrade'];
$item = $_POST['item'];
echo($email);
$query = "INSERT INTO REVIEW (title, sellerEmail, numGrade, comment, reviewerEmail, item) 
				VALUES('$title', '$email','$numGrade','$comment','$userEmail','$item')";
$result = $db->query($query);
	if($result != false){
		echo("Review added");
	}
?>