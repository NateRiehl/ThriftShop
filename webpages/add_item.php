<?php
include_once('dbproj_connect.php');
$name= $_POST['name'];
$price=$_POST['price'];
$email=$_POST['email'];
$description =$_POST['description'];
$date = date('Y-m-d');
$query = "INSERT INTO ITEM (name, price, description, date, sellerEmail) 
				VALUES('$name', $price, '$description', '$date','$email')";
$result = $db ->query($query);
if($result != false){
	printf("<p>Added item to shop</p>\n");
}
?>

<a href="shoppingPage.php"> Go to shopping page </a>
