<?php
	//phpinfo();
	include_once('dbproj_connect.php');
	session_start();
	if(!isset($_SESSION['email'])){ //Make sure user is logged in..Otherwise, send them to login page
		header('Location: http://www.cs.gettysburg.edu/~riehna01/cs360/webpages/homepage.php');
	}
	$email = $_SESSION['email'];
?>
<html>
	<head>
		<title>Gettysburg Marketplace</title>
		<link rel="stylesheet" type="text/css" href="../css/shoppingStyle.css">
	</head>
<body>
<div class="fullscreen">
	<div class = "top">
		<ul>
 		 <li><a href="profile.php">My page</a></li>
  		<li><a href="logout.php">Log out</a></li>
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
		printf("<button type='submit' form='%s'><img src='$imageLink' class='itemimg'> </br>%s $%.2f</button> &nbsp;",$id, $name, $price);
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
	if(isset($_POST['category'])){
	foreach($_POST['category'] as $category){
		if($category == 'all'){
			$categories="";
			break;
		}
		else if($counter==0){
			$categories="where id IN (select id from ITEM JOIN CATEGORY ON itemID=id where category='".$category."'".")";
		}
		else{
			$categories=$categories." AND id IN (select id from ITEM JOIN CATEGORY ON itemID=id where category="."'$category'" . ")";		
		}
		
		$counter++;		
		}
	}	
	$orderBy="";
	if(isset($_POST['sort'])){
		$count = 0;
		foreach($_POST['sort'] as $sortby){
			if($count == 0){
				$orderBy = "ORDER BY ".$sortby;			
			}
			else{
				$orderBy = $orderBy .", ". $sortby;
			}
			$count++;
		}
	}
		$query = "select * from ITEM $categories $orderBy"; 
		//Join category and item table based off of submitted form
		$result = $db->query($query);
		while ($row = $result->fetch()) { // for each row in the result table
			echo("<div class = 'item'>");
			$itemCount ++;
			$id = $row['id'];
			$name=$row['name'];
			$price=$row['price'];
			$imageLink=$row['imageLink'];
			$sold = $row['sold'];
			printf("<form method='post' action='itempage.php' id='%s'><input type='hidden' name='itemID' value=%s> </form>", $id, $id);
			printf("<button type='submit' form='%s'><img src='$imageLink' class='itemimg'> </br>%s %s</button> &nbsp;",$id, $name, "$".$price);
			echo("<div class='sold'>");
			if($sold == 1){
			echo("<img src='imgs/sold.gif'>");
			}
			echo("</div>");
			echo("</div>");		
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
		<caption><h3>Show Items In: </h3></caption>
		<tr>
			<td>
				<input type="checkbox" name="category[]" value="all">All <br />
				<input type="checkbox" name="category[]" value="Menswear">Menswear <br />
				<input type="checkbox" name="category[]" value="Womenswear">Womens clothing <br />
				<input type="checkbox" name="category[]" value="Tops">Tops <br />
				<input type="checkbox" name="category[]" value="Pants">Pants <br />
				<input type="checkbox" name="category[]" value="Shorts">Shorts <br />
				<input type="checkbox" name="category[]" value="Dresses">Dresses/Skirts <br />
				<input type="checkbox" name="category[]" value="Coats">Coats <br />
				<input type="checkbox" name="category[]" value="Summer">Summer <br />
				<input type="checkbox" name="category[]" value="Spring">Spring <br />
				<input type="checkbox" name="category[]" value="Fall">Fall <br />
				<input type="checkbox" name="category[]" value="Winter">Winterwear <br />
				<input type="checkbox" name="category[]" value="SportsApparel">Sports Apparel <br />
				<input type="checkbox" name="category[]" value="Other">Other <br />
			</td>
		</tr>
		
		<tr><td><h3 align="center" style="margin-top:10%; margin-bottom:5%;">Sort By: </h3></td></tr>
		<tr>
			<td>
				<input type="checkbox" name="sort[]" value="price">Price (Low) <br />
				<input type="checkbox" name="sort[]" value="price DESC">Price (High) <br />
				<input type="checkbox" name="sort[]" value="date">Date Posted(New) <br />
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
