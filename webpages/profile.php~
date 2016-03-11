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
		<script> 
			function showForm(){
				document.getElementById("bioForm").style.display="block";
			}
		</script>
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

	<table>
		<form method="post" action="profile.php" enctype="multipart/form-data">
    		<input type="file" id="propic" name="propic"> &nbsp;
		<label for="propic">Choose Profile Pic</label> 
    		<input type="submit" id="submitProPic" name="submitProPic">
		<label for="submitProPic">Upload Profile Pic</label> 
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
	<form method="post" action="profile.php" id ='bioForm'>
	<input type="text" id="newbio" name="newbio" placeholder="Enter new bio information here"> </input>
	<input type="submit" value="Submit new info" name='submitBio'></input>
	</form>
	<button type='submit'  onclick="showForm()"> Edit Bio </button>	
	</DIV>
	
<?php
	if(!empty($_POST["submitProPic"])){
			saveProPic($_FILES['propic']);
	}
	if(!empty($_POST["submitBio"])){
		$email = $_SESSION['email'];
		$newbio = $_POST['newbio'];
		$query = "UPDATE USER SET bio='$newbio' WHERE email = '$email'";
		$result = $db->query($query);
		header("Refresh:0");
	}
?>

</BODY>
</HTML>

