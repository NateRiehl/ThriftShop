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
	$buyerEmail = $row['buyerEmail'];
?>
<HTML>
	<HEAD>
		<TITLE>Edit <?php echo($itemName);?></TITLE>
		<link rel="stylesheet" type="text/css" href="../css/editItemStyle.css">
	</HEAD>
	<BODY>
		<DIV align="center">
		<h1>Edit Item <?php echo($itemName);?></h1>
	
		<form name='fmEdit' method = 'POST' action = 'edit_item.php'>
		<table cellpadding="0" cellspacing="5">

		<tr>
 		<td><input type='text' name='name' id='name' placeholder='<?php echo($itemName);?>'/> </td>
		</tr>
		<tr>
 		<td><input type='number' name='price' id='price' placeholder='<?php echo($row['price']);?>'/> </td>
	</tr>
	<tr>
		<td><input type='text' name='description' id='description' placeholder='<?php echo($row['description']);?>'/> </td>
	</tr>
	<tr>
		<td>Sold? Yes <input type='radio' name ='sold' id='yes' value='Yes'
					<?php if($row['sold'] == 1){echo('checked');} ?>/>
				  No<input type='radio' name ='sold' id='no' value='No'
					<?php if($row['sold'] == 0){echo('checked');} ?>/>
		</td>
	</tr>
	<tr>
 		<td><input type='text' name='buyerEmail' id='buyerEmail' placeholder='<?php if(is_null($buyerEmail)) echo('Buyer Email');
					else echo($buyerEmail);?>'/>
		</td>
	</tr>

 		<input type='hidden' name='itemID' value='<?php echo($itemID);?>'/>
		<?php echo("<input type='hidden' name='email' value='$email'>");?>
	</table>
	<input type='submit' value='Submit Item Edit!'>
	</form>
	</DIV>
	</BODY>
</HTML>
