<?php

include_once('dbproj_connect.php');

$isDelete = $_POST['isDelete'];
$itemID = $_POST['itemID'];
//Check if item is being deleted. If so, query a delete from database.
if($isDelete == 'yes'){
	echo($itemID."ID");
	$query = "DELETE FROM CATEGORY WHERE itemID='$itemID'";
	$result = $db->query($query);
	$query = "DELETE FROM ITEM WHERE id='$itemID'";
	$result = $db->query($query);
	if($result != false){
		echo("\nSuccessful deletion");	
	}
}
else{//If not being deleted, check other information.
$name= $_POST['name'];
$price=$_POST['price'];
$description =$_POST['description'];
$sold = $_POST['sold'];
$query;
$buyerEmail = $_POST['buyerEmail'];

//If any information is edited, update. Else, leave it how it was.
if(!empty($name)){
	$query = "Update ITEM set name='$name' Where id='$itemID'";
	$result = $db->query($query);
}
 
if(!empty($price)){
	$query = "Update ITEM set price='$price' Where id='$itemID'";
	$result = $db->query($query);
}
if(!empty($description)){
	$query = "Update ITEM set description='$description' Where id='$itemID'";
	$result = $db->query($query);
}
if($sold =="Yes"){
	$query = "Update ITEM set sold='1' Where id='$itemID'";
	
}
else{
	$query = "Update ITEM set sold=0 Where id='$itemID'";
	$buyerEmail = NULL;
}

//Set item to be sold/notSold
$result = $db->query($query);

if(!empty($buyerEmail)){
	$query = "Update ITEM set buyerEmail='$buyerEmail' Where id='$itemID'";
	$result = $db->query($query);
}
}
header('Location: http://www.cs.gettysburg.edu/~maldke01/DBProject/webpages/shoppingPage.php');
//header('Location: http://www.cs.gettysburg.edu/~riehna01/cs360/webpages/shoppingPage.php');
?>

