<?php
/**
* This page sets up the profile for a user
*/
	//phpinfo();
	include_once('dbproj_connect.php');
	include_once('fileutils.php');
	session_start();
	if(!isset($_SESSION['email'])){ //Make sure user is logged in..Otherwise, send them to login page
		header('Location: http://www.cs.gettysburg.edu/~riehna01/cs360/webpages/homepage.php');
	}
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
	else{
		$userspage = true;
	}
?>
<HTML>
	<HEAD> 
		<TITLE> Profile Page</TITLE>	
		<link rel="stylesheet" type="text/css" href="../css/profileStyle.css">
		<script> //When user clicks to edit their bio, text box will show up
			function showForm(){
				document.getElementById("bioForm").style.display="block";
				document.getElementById("newbio").style.display="block";
				document.getElementById("editbio").style.display="none";
				document.getElementById("bioInfo").style.display="none";
			}
		</script>
	</HEAD>
<BODY>
	
	<DIV class = "bod">
	
	<DIV class = "tophalf"> 
	<div class = "linkpanel">
		<ul>
  			<li><a href="shoppingPage.php">Shopping Page</a></li>
  			<li><a href="logout.php">Log Out</a></li>

		</ul>
	</div>
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
		printf(" %s ", $name);
		if($userspage == true){
			echo("<button type='submit'  id='addItem' onclick=location.href='additem.php';> Add Item </button>");
		}
?>
	</DIV>
</DIV> 
<DIV class = "bottomhalf">
	<DIV class = "bio">
<?php
		if($userspage == true){
			echo("<h1> About Me: </h1>");
			echo("<form method='post' action='profile.php' id ='bioForm'>");
			echo("<input type='submit' id='submitBio' name='submitBio' value='Submit Bio'></input>");
			echo("</form>");
			echo("<textarea rows='10' cols='100' form='bioForm' id='newbio' name='newbio' placeholder='Enter new bio information here'> </textarea>");
			
			echo("<button type='submit'  onclick='showForm()' id='editbio'> Edit Bio </button>");	
		}
		else{
			printf("<h1> About %s: </h1>", $row['Fname']);			
		}

echo('</DIV>');
		$query = "SELECT bio FROM USER WHERE email = '$email'";
		$result = $db->query($query);
		$row = $result->fetch(); 
		$bio=$row['bio'];
		echo("<DIV class='bioInfo' id='bioInfo' align='left'>");
		printf(" %s ", $bio);
		echo("</DIV>");
	
?>	

<DIV class = "reviews">
<?php
	$query = "SELECT * FROM REVIEW JOIN USER ON sellerEmail = email WHERE email='$email'";
	$result = $db -> query($query);

	if($userspage){
		echo("<h1> My Reviews: </h1>");
	}
	else{ //Let them add a review if this isn't their own page
		printf("<h1> Reviews for %s: </h1>", $name);
		printf("<form method='post' action='addreview.php' id='addreview'><input type='hidden' name='email' value=%s> </form>", $email);
		echo("<button type='submit'  form='addreview'> Add Review </button>");
	}
	while($row = $result->fetch()){ //Get each review of this user
		printf("<DIV class=review>");
		$title = $row['title'];
		$numGrade= $row['numGrade'];
		$item= $row['item'];
		$comment= $row['comment'];
		printf("<h2>%s</h2>", $title);
		$count = 0;
		while($count < $numGrade){ //Print stars
			printf("<img src='imgs/star.png' style='width:20px;height: 18px;position:relative; top: 5%%; float: left;'>");
			$count++;	
		}
		printf("<p>Item bought: %s</p>", $item);
		printf(" %s ", $comment);
		echo("</DIV>");
	}
?>
</DIV>

	<DIV class='selling'>
		<?php
			if($userspage){
				echo("<h1>My Current Items in Marketplace:</h1>");
			}
			else{
				echo("<h1>Current Items in Marketplace:</h1>");
			}
			$query = "select * from ITEM JOIN USER ON email=sellerEmail WHERE email='$email'";
			$result = $db->query($query);
			if($result != false){
				while($row = $result->fetch()){
				echo("<DIV class='item'>");
					$name=$row['name'];
					$price=$row['price'];
					$id=$row['id'];
					printf("<form method='post' action='itempage.php' id='%s'><input type='hidden' name='itemID' value='%s'> </form>", $id, $id);
					printf("<button type='submit' form='%s'>%s. Price: $%s</button> &nbsp;",$id,$name,$price);
				echo("</DIV>");
				}
			}
		?>
	</DIV>
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
</DIV>
</DIV>
</BODY>
</HTML>

