<?php
include_once('dbproj_connect.php');

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
$message1 = saveFile($_FILES['imageFile']);

// Takes one file data array, checks the validity, then save the file into local folder
// e.g., $fileData is $_FILES['myFile1'] or $_FILES['myFile2'] or $_FILES['myFile3']
function saveFile($fileData) {

    // DEBUG: print each file data
    echo "<PRE>\n";
    print_r($fileData);
    echo "</PRE>\n";

    // return an error or success message
    $msg = "";

    // 1. check the size: valid size is between (0, 5 MB]
    $fileSize = $fileData['size'];

    if ($fileSize == 0) {
        $msg = "file is empty";
    }
    else if ($fileSize > 5242880) { // greater than 5 MB
        $msg = "file is too big at " . $fileSize;
    }
    else {
        // actual uploaded file: stored in the server's temporary folder
        $realData = $fileData['tmp_name'];

        $imgInfo  = getimagesize($realData);

        // 2. check to see if the file actually is an image
        if ($imgInfo == FALSE) {
            $msg = "file is not an image file; only jpg, png, and gif files are allowed";
        }
        else {
            $mimeType = $imgInfo['mime'];
           
            // 3. check to see if the file is one of the tree allowed types (jpg, png, and gif)
            if ($mimeType == "image/jpeg" || $mimeType == "image/jpg" || 
                $mimeType == "image/gif" || $mimeType == "image/png") {

                $upFolder = "imgs/";
                $fnOriginal = $fileData['name'];
                $fnNew    = $upFolder. $GLOBALS['id'].$fnOriginal;
		$GLOBALS['imageLink'] = $upFolder. $GLOBALS['id'].$fnOriginal;
                //echo "saving as " . $fnNew;

                // copy the uploaded file from temp folder to specified location
                $result = move_uploaded_file($realData, $fnNew);

                if ($result == FALSE) {
                    $msg = $fnOriginal . " could not be uploaded to the server; try again"; 
                }
                else {
                    $msg = $fnOriginal . " is successfully uploaded";
                }
            }
            else {
                $msg = "file is not an allowed image file; only jpg, png, and gif files are allowed";
            }
        }
    }

    return $msg;
}
printf($imageLink);
$query = "UPDATE ITEM SET imageLink='$imageLink' WHERE id='$id'";
$result = $db ->query($query);
?>



<a href="shoppingPage.php"> Go to shopping page </a>
