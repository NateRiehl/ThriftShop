<?php

include_once('dbproj_connect.php');

$itemID = $_POST['itemID'];
$name= $_POST['name'];
$price=$_POST['price'];
$description =$_POST['description'];
$sold = $_POST['sold'];
$query;


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
}
//Set item to be sold/notSold
$result = $db->query($query);
?>

Item Updated
<a href="shoppingPage.php"> Go to shopping page </a>
