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
		<DIV class = "linkpanel">
			<ul>
  				<li><a href="shoppingPage.php">Shopping Page</a></li>
				<li><a href="profile.php">My Page</a></li>
  				<li><a href="logout.php">Log Out</a></li>
			</ul>
		</DIV>
		<DIV align="center">
		<h1>Edit Item <?php echo($itemName);?></h1>
		
		<form name='fmEdit' id='fmEdit' method = 'POST' action = 'edit_item.php'>
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
	
	<!--Submitting Edit Item form with some information passed along. -->
 		<input type='hidden' name='itemID' value='<?php echo($itemID); ?>'/>
		<?php echo("<input type='hidden' name='email' value='$email'>");?>
		<input type='hidden' id='isDelete' name='isDelete' value='no'>
	</table>
	<input type='submit' value='Submit Item Edit!'><br><br>
	<input type='button' value='Delete Item' onclick="deleteItem()">
	</form>


	<script>
	//Checks if the user wants to actually delete item. If yes, continues on to submit form.
		function deleteItem(){
			var confirm = window.confirm("Are you sure you want to delete item? Press OK to confirm deletion or Cancel to continue editing item.");
			if(confirm == true){
				document.getElementById('isDelete').value='yes';
				document.getElementById("fmEdit").submit();
			}
		}
	</script>
	</DIV>
	</BODY>
</HTML>
