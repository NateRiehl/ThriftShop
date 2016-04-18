<?php
include_once('dbproj_connect.php');
session_start();
$userEmail = '"'.$_SESSION['email'].'"';
$email = '"'.$_POST['email'].'"';
$title = '"'.$_POST['title'].'"';
$comment = '"'.$_POST['comment'] .'"';
$numGrade = $_POST['numGrade'];
$item = '"'.$_POST['item'] . '"';
echo($email);
$query = sprintf("INSERT INTO REVIEW (title, sellerEmail, numGrade, comment, reviewerEmail, item) 
				VALUES(%s, %s, %d, %s, %s, %s)", $title, $email, $numGrade, $comment, $userEmail, $item);
echo($query);
$result = $db->query($query);
	if($result != false){
		header('Location: http://www.cs.gettysburg.edu/~riehna01/cs360/webpages/shoppingPage.php');
	}
	else{
		echo("An error occurred while adding this review");	
	}
?>
