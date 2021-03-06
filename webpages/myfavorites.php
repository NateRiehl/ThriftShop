<?php
	//phpinfo();
	include_once('dbproj_connect.php');
	session_start();
	if(!isset($_SESSION['email'])){ //Make sure user is logged in..Otherwise, send them to login page
		header('Location: homepage.php');
	}
	$email = $_SESSION['email'];
?>
<!--Favorites page where "add to favorites" items are located. -->
<html>
	<head>
		<title>My Favorites</title>
		<link rel="stylesheet" type="text/css" href="../css/favoritesStyle.css">
	</head>
<body>
<div class="fullscreen">
	<div class = "linkpanel">
		<ul>
 		 <li><a href="profile.php">My Page</a></li>
		 <li><a href="shoppingPage.php">Shopping Page</a></li>
  		<li><a href="logout.php">Log out</a></li>
		</ul>
	</div>
<div class = 'main'>	
	<?php
			//Query database to pull all favorited items.
			$query = "SELECT * from ITEM JOIN FAVORITES ON itemID=id WHERE userEmail='$email'";
			$result = $db->query($query);
			echo("<h1> My Favorites</h1>");
			while ($row = $result->fetch()) { // for each row in the result table
			echo("<div class = 'item'>");
				$id = $row['id'];
				$name=$row['name'];
				$price=$row['price'];
				$imageLink=$row['imageLink'];
				$sold = $row['sold'];
				printf("<form method='post' action='itempage.php' id='%s'><input type='hidden' name='itemID' value=%s> </form>\n", $id, $id);
				printf("<button type='submit' form='%s'><img src='$imageLink' class='itemimg'> </br>%s $%.2f</button> &nbsp;\n",$id, $name, $price);
				echo("<div class='sold'>");
				if($sold == 1){
					echo("<img src='imgs/sold.gif'>");
				}
				echo("</div>");
				echo("</div>");		
		}
	?>
</div>
</div>
</body>
</html>
