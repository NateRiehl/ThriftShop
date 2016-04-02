<?php
	//phpinfo();
	include_once('dbproj_connect.php');
	session_start();
	$email = $_SESSION['email'];
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/shoppingStyle.css">
</head>
<body>
<div class="fullscreen">
<div class = "top">
<ul>
  <li><a href="profile.php">My page</a></li>
  <li><a href="homepage.php">Homepage</a></li>
</ul>
</div>

<?php
printf("<div class = 'main'>");
if(empty($_POST['submitCategory'])){ //User is looking at all items
	$query = "SELECT * FROM ITEM;";
	$result = $db->query($query);
	while ($row = $result->fetch()) { // for each row in the result table
		echo("<div class = 'item'>");
		$id = $row['id'];
		$name=$row['name'];
		$price=$row['price'];
		$imageLink=$row['imageLink'];
		$sold = $row['sold'];
		printf("<form method='post' action='itempage.php' id='%s'><input type='hidden' name='itemID' value=%s> </form>", $id, $id);
		printf("<button type='submit' form='%s'><img src='$imageLink' class='itemimg'> </br>%s %s</button> &nbsp;",$id, $name, $price." dollars");
		echo("<div class='sold'>");
		if($sold == 1){
			echo("<img src='imgs/sold.gif'>");
		}
		echo("</div>");
		echo("</div>");
		}
}
else{ //User has selected categories to narrow search
	$itemCount = 0; //Keep track of number of items printed to screen
	$counter = 0;
	$categories="";
	foreach($_POST['category'] as $category){
		if($counter==0){
			$categories="'".$category."'";
		}
		else{
			$categories=$categories." OR category="."'$category'";		
		}
		
		$counter++;		
	}
		$query = "select * from ITEM AS i1 group by i1.id having COUNT(i1.id) = (SELECT COUNT(i2.id) FROM ITEM AS i2 JOIN CATEGORY AS c1 ON c1.itemID=i2.id WHERE i2.id=i1.id AND category=$categories GROUP BY i2.id)"; 
		echo($query);	
		//Join category and item table based off of submitted form

		$result = $db->query($query);
		while ($row = $result->fetch()) { // for each row in the result table
			$itemCount ++;
			$id = $row['id'];
			$name=$row['name'];
			$price=$row['price'];
			$imageLink=$row['imageLink'];
			printf("<form method='post' action='itempage.php' id='%s'><input type='hidden' name='itemID' value=%s> </form>", $id, $id);
			printf("<button type='submit' form='%s'><img src='$imageLink' style='width:200px;height: 180px'> </br>%s %s</button> &nbsp;",$id, $name, $price." dollars");
		}
	if($itemCount == 0){ //No items in specified category(s)
		echo("<p style='color:white; font-size: 30px;'>Sorry, no items in our store seem to match your search.</p>");
	}
}
printf("</div>");
?>

<!-- Form to let users narrow search -->
<div class = "right">
<form name="categoryForm" method="POST" action="shoppingPage.php">
<table name="categories" align="center" border="0" cellspacing="0" cellpadding="0" >
<caption><h3>Narrow your search: </h3></caption>

<tr>
<td>
<input type="checkbox" name="category[]" value="Menswear">Menswear <br />
<input type="checkbox" name="category[]" value="Womenswear">Womens clothing <br />
<input type="checkbox" name="category[]" value="SportsApparel">Sports Apparel <br />
<input type="checkbox" name="category[]" value="Other">Other <br />

</td>
</tr>
<tr>
<td><input type="submit" name="submitCategory" value="Refresh" /></td>
</tr>

</table>
</form>
</div>
</div>
</body>
</html>
