<?php
	include_once('dbproj_connect.php');
	$id = $_POST['itemID'];
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
		$query = "SELECT imageLink FROM ITEM WHERE id= '$id'";
		$result = $db->query($query);
		$row = $result->fetch();
		$imageLink=$row['imageLink'];
		printf("<img src='$imageLink'>");
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
		printf("<h2>Description</h2>");
		printf("<p> %s </br></br> Date Posted: %s </p>", $descript, $date);
		printf("<h3> Seller Contact Email: %s <h3>", $sellerEmail);
		
		printf("<form method='post' action='profile.php' id='email'><input type='hidden' name='sellerEmail' value=%s> </form>", $sellerEmail);
		printf("<button type='submit' form='email'>Go to Seller's page</button>");
	?>	
	</DIV> 

</body>



</html>
