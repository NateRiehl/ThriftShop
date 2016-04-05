<?php
	include_once('dbproj_connect.php');
	$id = $_POST['itemID'];
	session_start();
	$userEmail=$_SESSION['email'];
?>
<html>
	<!--This is the in-depth item page-->
	<head>
		<title> Item Page </title>
		<link rel="stylesheet" type="text/css" href="../css/itempageStyle.css">
	</head>


<body>
<div class ="imgBackground"> </div>

<div class = "top">
<ul>
  <li><a href="profile.php">My page</a></li>
  <li><a href="shoppingPage.php">Shopping Page</a></li>
</ul>
</div>
	
	<DIV class = "itemImg">
	<?php	//get item's image
		$query = "SELECT imageLink,sold FROM ITEM WHERE id= '$id'";
		$result = $db->query($query);
		$row = $result->fetch();
		$imageLink=$row['imageLink'];
		$sold = $row['sold'];
		echo("<img src='$imageLink'>");
		//Print the sold logo
		echo("<div class='sold'>");
		if($sold == 1){
			echo("<img src='imgs/sold.gif'>");
		}
		echo("</div>");
	?>
	</DIV>
	
	<DIV class = "description">
	<?php //Get item's description and other associated info
		$query = "SELECT * FROM ITEM WHERE id= '$id'";
		$result = $db->query($query);
		$row = $result->fetch();
		$name= $row['name'];
		$price= $row['price'];
		$date = $row['date'];
		$descript=$row['description'];
		$sellerEmail=$row['sellerEmail']; 
		printf("<h1> %s </h1>", $name);	
		printf("<h2>Price: $%s </h2>", $price);
		printf("<h2>Description: </h2>");
		printf("<p> %s </br></br> Date Posted: %s </p>", $descript, $date);
		if($sellerEmail != $userEmail){
			printf("<h3> Seller: %s <h3>", $sellerEmail);
		}
		else{
			echo("<h3>Seller: Me</h3>");
		}
		printf("<form method='post' action='profile.php' id='email'><input type='hidden' name='sellerEmail' value=%s> </form>", $sellerEmail);
		printf("<form method='post' action='edititem.php' id='edititem'><input type='hidden' name='itemID' value=%s> </form>", $id);
		if($sellerEmail == $userEmail){
			printf("<button type='submit' form='email'>Go to my page</button>");
			printf("<button type='submit' form='edititem'>Edit my item</button>");
		}
		else{
			printf("<button type='submit' form='email'>Go to Seller's page</button>");
		}
	?>	
	</DIV> 

</body>



</html>
