<?php
/**
* This page sets up the profile for a user
*/
	
	include_once('dbproj_connect.php'); //For connecting to database
	include_once('fileutils.php'); //Utility functions for saving pictures
	session_start();
	if(!isset($_SESSION['email'])){ //Make sure user is logged in..Otherwise, send them to login page
		header('Location: http://www.cs.gettysburg.edu/~riehna01/cs360/webpages/homepage.php');
	}
	$email = $_SESSION['email']; //Get their session var
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

	//Query database for user's info
	$query = "SELECT * from USER where email = '$email'";
	$result = $db->query($query);
	$row = $result->fetch();
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
	<!--Links to other pages.-->
	<DIV class = "tophalf"> 
	<DIV class = "linkpanel">
		<ul>	<?php if($userspage==false){echo("<li><a href='profile.php'>My Page</a></li>");}?>
  			<li><a href="shoppingPage.php">Shopping Page</a></li>
			<li><a href="myfavorites.php">My Favorites</a></li>
  			<li><a href="logout.php">Log Out</a></li>

		</ul>
	</DIV>
	<DIV class = "profilepic">
<?php		//Get their profile picture
		$imageLink=$row['imageLink'];
		printf("<img src='$imageLink'>");
	
	
	
		if($userspage == true){
			echo("<div class = 'picButtons'><table>");
			echo("<form method='post' action='profile.php' enctype='multipart/form-data'>");
    			echo("<input type='file' id='propic' name='propic'>");
			echo("<label for='propic'>Choose Picture</label>"); 
    			echo("<input type='submit' id='submitProPic' name='submitProPic'>");
			echo("<label for='submitProPic'>Upload Picture</label>"); 
			echo("</form>");
			echo("</table></div>");
		}
	 ?>
	</DIV> <!--End of profilepic div-->
	<DIV class = "name"> <!--This div show/styles the page owner's name-->
	<?php
		$name = $row['Fname'] . " " . $row['Lname'];
		printf(" %s ", $name);
		if($userspage == true){ //Only can add items if they are on their own page
			echo("<button type='submit'  id='addItem' onclick=location.href='additem.php';> Add Item </button>");
		}
	?>
	</DIV>
</DIV> <!--End of top half of profile.php-->
<DIV class = "bottomhalf">
<DIV class="bioreview">
	<DIV class = "bio">
	<?php
		//Get bio
		$bio=$row['bio'];
		if($userspage == true){
			echo("<h1> About Me: </h1>");
			echo("<form method='post' action='profile.php' id ='bioForm'>");
			echo("<input type='submit' id='submitBio' name='submitBio' value='Submit Bio'></input>");
			echo("</form>");
			echo("<textarea rows='10' cols='100' form='bioForm' id='newbio' name='newbio' placeholder='Enter new bio information here'> '$bio'</textarea>");
			
			echo("<button type='submit'  onclick='showForm()' id='editbio'> Edit Bio </button>");	
		}
		else{
			printf("<h2> About %s: </h2>", $row['Fname']);			
		}
		echo("<DIV class='bioInfo' id='bioInfo' align='left'>");
		printf("<hr><p> %s </p>", $bio);
		echo("</DIV>");		
	?> 
	</DIV><!--End of bio section-->	

	<DIV class = "reviews">
	<?php
	//Get User's reviews
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
		
		echo("<table>");
		echo("<col width='350'>");
		while($row = $result->fetch()){ //Get each review of this user
			printf("<DIV class=review>");
			$title = $row['title'];
			$numGrade= $row['numGrade'];
			$item= $row['item'];
			$comment= $row['comment'];
			printf("<tr><td><h2>%s</h2></td><td>", $title);
			$count = 0;
			while($count < $numGrade){ //Print stars
				printf("<img src='imgs/star.png' style='width:20px;height: 18px;position:relative; margin-bottom: 10%%; float: left;'>\n");
				$count++;	
			}
			printf("</td><td><p>Item bought: %s</p></td></tr>", $item);
			printf("<tr><td>%s</td></tr>", $comment);
			echo("</DIV>");
		}
		echo("</table>");
	?>
	</DIV> <!--End of review section-->
</DIV> <!--End of 'bioreview' AKA left side of bottom half of page-->
	<DIV class='selling'>
		<?php
			if($userspage){
				echo("<h1>My Unsold Items in Marketplace:</h1>");
			}
			else{
				echo("<h1>Unsold Items in Marketplace:</h1>");
			}
			//Get user's items in marketplace
			$query = "select i.imageLink, name, price, id, sold from ITEM AS i JOIN USER AS u ON email=sellerEmail WHERE email='$email'";
			$result = $db->query($query);
			$count = 0;
			if($result != false){
				while($row = $result->fetch()){		
					$name=$row['name'];
					$price=$row['price'];
					$id=$row['id'];
					$sold = $row['sold'];
					$imageLink=$row['imageLink'];
					if($sold == 0){
						$count++;
						echo("<DIV class='item'>");
						printf("<form method='post' action='itempage.php' id='%s'><input type='hidden' name='itemID' value='%s'> </form>", $id, $id);
						printf("<button type='submit' form='%s'>Item: %s. Price: $%.2f</button> &nbsp;",$id,$name,$price);
						printf("<img src='$imageLink'>");
						echo("</DIV>");
					}
				}
				if($count == 0){
					echo("No unsold items to display");				
				}
			}
			if($userspage == true){
				echo("<a href='soldItems.php'>Items Already Sold</a>");
			}
		?>
	</DIV> <!--End of 'currently selling'-->
</DIV> <!--End bottom half-->
</DIV> <!--End body -->
</BODY>
</HTML>
<?php
//Check if new profile or bio have been submitted
	//submitted a new propic
	if(!empty($_POST["submitProPic"])){
		saveProPic($_FILES['propic']); //util method in "fileutils.php" that updates their propic
		header("Refresh:0");	
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




