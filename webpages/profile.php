<?php
	//phpinfo();
	include_once('dbproj_connect.php');
	include_once('fileutils.php');
	session_start();
	$email = $_SESSION['email'];
?>
<HTML>
	<HEAD> 
		<TITLE> Profile Page</TITLE>	
		<link rel="stylesheet" type="text/css" href="../css/profileStyle.css">
	</HEAD>
<BODY>
	<DIV class = "tophalf"> </DIV> 
	<DIV class = "lowhalf">  </DIV>

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
	saveProPic($_FILES['propic']);
	}
?>

</BODY>
</HTML>

