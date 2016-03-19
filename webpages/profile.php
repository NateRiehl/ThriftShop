<?php
/**
* This page sets up the profile for a user
*/
	//phpinfo();
	include_once('dbproj_connect.php');
	include_once('fileutils.php');
	session_start();
	$email = $_SESSION['email'];
	$userspage = false; //This is a boolean flag to check if user is on their own page
	if(isset($_POST['sellerEmail'])){
		if($_POST['sellerEmail'] == $email){
			$userspage = true;	
		}
		else{
			$email = $_POST['sellerEmail'];		
		}
	}
?>
<HTML>
	<HEAD> 
		<TITLE> Profile Page</TITLE>	
		<link rel="stylesheet" type="text/css" href="../css/profileStyle.css">
		<script> //When user clicks to edit their bio, text box will show up
			function showForm(){
				document.getElementById("bioForm").style.display="block";
			}
		</script>
	</HEAD>
<BODY>
	<DIV class = "tophalf"> </DIV> 
	<DIV class = "lowhalf">  </DIV>

	<DIV class = "profilepic">
<?php		//Get their profile picture
		$query = "SELECT imageLink FROM USER WHERE email = '$email'";
		$result = $db->query($query);
		$row = $result->fetch(); 
		$imageLink=$row['imageLink'];
		printf("<img src='$imageLink'>");
	
	
	
	if($userspage == true){
	echo("<table>");
		echo("<form method='post' action='profile.php' enctype='multipart/form-data'>");
    		echo("<input type='file' id='propic' name='propic'> &nbsp;");
		echo("<label for='propic'>Choose Profile Pic</label>"); 
    		echo("<input type='submit' id='submitProPic' name='submitProPic'>");
		echo("<label for='submitProPic'>Upload Profile Pic</label>"); 
		echo("</form>");
	echo("</table>");
	}
	echo("</DIV>");
	 ?>
	<DIV class = "name">
	<?php
		$query = "Select Fname, Lname FROM USER WHERE email = '$email'";
		$result = $db->query($query);
		$row = $result->fetch(); 
		$name = $row['Fname'] . " " . $row['Lname'];
		printf("<h1> %s </h1>", $name);
		if($userspage == true){
			echo("<button type='submit'  id='addItem' onclick=location.href='additem.php';> Add Item </button>");
		}
?>
	</DIV>

	<DIV class = "bio">
<?php
		if($userspage == true){
			echo("<h1> About Me </h1>");	
		}
		else{
			printf("<h1> About %s </h1>", $row['Fname']);			
		}
		$query = "SELECT bio FROM USER WHERE email = '$email'";
		$result = $db->query($query);
		$row = $result->fetch(); 
		$bio=$row['bio'];
		printf("<p> %s </p>", $bio);

	if($userspage == true){
		echo("<form method='post' action='profile.php' id ='bioForm'>");
		echo("<input type='text' id='newbio' name='newbio' placeholder='Enter new bio information here'> </input>");
		echo("<input type='submit' value='Submit new info' name='submitBio'></input>");
		echo("</form>");
		echo("<button type='submit'  onclick='showForm()'> Edit Bio </button>");	
		echo('</DIV>');
	}
?>	

<?php
	//submitted a new propic
	if(!empty($_POST["submitProPic"])){
			saveProPic($_FILES['propic']); //util method in "fileutils.php" that updates their propic
	}
	//submitted a new bio
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

