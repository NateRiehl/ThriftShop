<?php
include_once('dbproj_connect.php');
include_once('fileutils.php');
include_once('item_category_setup.php');
session_start();
//Gather information from form on "additem.php"
$imageLink;
$name= $_POST['name'];
$price=$_POST['price'];
$email=$_SESSION['email'];
$description =$_POST['description'];
$date = date('Y-m-d');
$imageFile = $_FILES['imageFile'];

//Insert their item
$query="INSERT INTO ITEM (name, price, description, date, sellerEmail) VALUES('$name', $price, '$description', '$date','$email')";
$result = $db ->query($query);

	if($result != false){
	$id = $db->lastInsertId(); //Get the primary key(auto-incremented) of their item
	$message1 = saveItem($_FILES['imageFile']); //Calls method in "fileutils.php" which saves the item's image to imgs/ and sets $imageLink to the url
	$query = "UPDATE ITEM SET imageLink='$imageLink' WHERE id='$id'"; //Insert image url into db
	$result = $db->query($query);
	if($result != false){
		if(!empty($_POST['category'])){
		setupCategories($id, $_POST['category']); //Add each of their categories to db using method in "item_category_setup"
		printf("<p>Added item to shop</p>\n");
		}	
	}
}
?>



<a href="shoppingPage.php"> Go to shopping page </a>
