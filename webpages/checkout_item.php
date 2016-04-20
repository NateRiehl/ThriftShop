<?php

include_once('dbproj_connect.php');

$itemID = $_POST['itemID'];
$buyerEmail = $_POST['email'];
$query = "Update ITEM SET sold='1' Where id='$itemID'";
$result = $db->query($query);

if($buyerEmail != NULL){
	$query = "Update ITEM SET buyerEmail='$buyerEmail' Where id='$itemID'";
	$result = $db->query($query);
}

if($result == false){
	echo("Any error occurred while processing your purchase");
}
else{
	//header('Location: http://www.cs.gettysburg.edu/~riehna01/cs360/webpages/shoppingPage.php');
	header('Location: http://www.cs.gettysburg.edu/~maldke01/DBProject/webpages/shoppingPage.php');
}

?>
