<?php
	//phpinfo();
	include_once('dbproj_connect.php');
	session_start();
	$email = $_SESSION['email'];
?>
<HTML>
	<HEAD> 
		<TITLE> Profile Page</TITLE>	
		<link rel="stylesheet" type="text/css" href="../css/profileStyle.css">
	</HEAD>
<BODY>

	<DIV class = "profilepic">
	<?php
		$query = "SELECT imageLink FROM USER WHERE email = '$email'";
		$result = $db->query($query);
		$row = $result->fetch(); 
		$imageLink=$row['imageLink'];
		printf("<img src='$imageLink'>");
	 ?>
	 <!-- <button type='submit' onclick=location.href='#';> Change Profile Pic </button> -->
	<table>
		<form method="post" action="profile.php" enctype="multipart/form-data">
    		<input type="file" id="propic" name="propic"> &nbsp;
		<label for="propic">Choose Profile Pic</label> 
    		<input type="submit" value="click" id="submit" name="submit">
		<label for="submit">Upload Profile Pic</label> 
		</form>
	</table>
	</DIV>
	<DIV class = "name">
	<?php
		$query = "Select Fname, Lname FROM USER WHERE email = '$email'";
		$result = $db->query($query);
		$row = $result->fetch(); 
		$name = $row['Fname'] . " " . $row['Lname'];
		printf("<h1> %s </h1>", $name);
	?>
	</DIV>
	<button type='submit'  id="addItem" onclick=location.href='additem.php';> Add Item </button>
	<DIV class = "bio">
	<h1> About Me </h1>
	<?php
		$email = $_SESSION['email'];
		$query = "SELECT bio FROM USER WHERE email = '$email'";
		$result = $db->query($query);
		$row = $result->fetch(); 
		$bio=$row['bio'];
		printf("<p> %s </p>", $bio);
	?>
	<button type='submit'  onclick=location.href='#';> Edit Bio </button>	
	</DIV>
	
<?php
	if(isset($_POST["submit"])){
	saveFile($_FILES['propic']);
	}
	
function saveFile($fileData) {
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
		$email = $GLOBALS['email'];
                $fnNew    = $upFolder . $email;
		$query = "UPDATE USER SET imageLink='$fnNew' WHERE email='$email'";
		$result = $GLOBALS['db'] ->query($query);
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

	?>

</BODY>
</HTML>

