<?php
	include_once('dbproj_connect.php');
	session_start();
	$email = $_SESSION['email'];
	$itemID = $_POST['itemID'];
	$query = "SELECT * FROM ITEM WHERE id = '$itemID'";
	$result = $db->query($query);
	$row = $result->fetch();
	$itemName = $row['name'];
	$isSold = $row['sold'];
	$price = $row['price'];
?>
<!--Checkout Form for purchasing item. -->

<HTML>
	<HEAD>
		<TITLE>Purchase <?php echo($itemName);?></TITLE>
		<link rel="stylesheet" type="text/css" href="../css/checkoutStyle.css">
	</HEAD>
	<BODY>
	<div class = "linkpanel">
		<ul>
			<li><a href="shoppingPage.php">Shopping Page</a></li>
 		 	<li><a href="profile.php">My page</a></li>
  			<li><a href="logout.php">Log out</a></li>
		</ul>
	</div>
		<DIV align="center">
		<h1>Purchase: <?php echo($itemName);?></h1>
		<h2>Price: $<?php printf("%.2f",$price);?></h2>
		<form name='fmCheck' method = 'POST' action = 'checkout_item.php'>
		<table cellpadding="0" cellspacing="5">

		<tr>
		<td><input type='hidden' name='buyer' id='buyer' value='<?php echo($email);?>'> </td>
		</tr>

		<tr>
 		<td>Name on Credit Card:</td><td> <input type='text' name='cardName' id='cardName' placeholder='John Doe'/> </td>
	</tr>
	<tr>
		<td>Card Number:</td><td><input type='text' name='card#' id='card#' placeholder='0123456789001738'/> </td>
	</tr>
	<tr>
		<td>CVV:</td><td><input type='text' name='cvv' id='cvv' placeholder='000'/> </td>
	</tr>
	<tr>
 		<td>Address/Dorm:</td><td><input type='text' name='address' id='address' placeholder=''/>
		</td>
	</tr>

 		<input type='hidden' name='itemID' value='<?php echo($itemID);?>'/>
		<?php echo("<input type='hidden' name='email' value='$email'>");?>
	</table>
	<input type='submit' value='Buy Item!'>
	</form>
		<form name='fmCancel' method = 'POST' action = 'itempage.php'>
			<input type='hidden' name='itemID' value='<?php echo($itemID);?>'/>
			<input type='submit' value='Cancel'>
		</form>

	</DIV>
	</BODY>
</HTML>
