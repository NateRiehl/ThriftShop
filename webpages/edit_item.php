<?php

include_once('dbproj_connect.php');

$itemID = $_POST['itemID'];
$name= $_POST['name'];
$price=$_POST['price'];
$description =$_POST['description'];
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
?>

Item Updated
<a href="shoppingPage.php"> Go to shopping page </a>
