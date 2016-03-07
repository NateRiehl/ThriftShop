<?php
include_once('dbproj_connect.php');
include_once('fileutils.php');

// take a look at what we get from user's upload
// $_FILES['image']['name']:     file name from the user's computer
// $_FILES['image']['size']:     # of bytes
// $_FILES['image']['tmp_name']: actual file stored in temporary location
// $_FILES['image']['type']:     type of the file
// $_FILES['image']['error']:    error type (UPLOAD_ERR_NO_FILE, UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE, ...)
$imageLink;
$name= $_POST['name'];
$price=$_POST['price'];
$email=$_POST['email'];
$description =$_POST['description'];
$date = date('Y-m-d');
$imageFile = $_FILES['imageFile'];
$query = "INSERT INTO ITEM (name, price, description, date, sellerEmail) 
				VALUES('$name', $price, '$description', '$date','$email')";
$result = $db ->query($query);
if($result != false){
	printf("<p>Added item to shop</p>\n");
}
$queryID = "SELECT id FROM ITEM WHERE name='$name' AND description='$description' AND date='$date' AND price='$price'";
$resultID = $db ->query($queryID);
$row = $resultID->fetch();
$id = $row['id'];
$message1 = saveItem($_FILES['imageFile']);


printf($imageLink);
$query = "UPDATE ITEM SET imageLink='$imageLink' WHERE id='$id'";
$result = $db ->query($query);
?>



<a href="shoppingPage.php"> Go to shopping page </a>
