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
	echo("messed up");
}

echo("You bought item!");
echo("<a href='shoppingPage.php'> Go to shopping page </a>");

?>
