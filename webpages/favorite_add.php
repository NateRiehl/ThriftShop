<?php
	
	include_once('dbproj_connect.php');
	session_start();
	$itemID = $_POST['itemID'];
	$email = $_POST['email'];
	$add_remove = $_POST['add_remove'];	
	$query;
	if($add_remove == "add"){	
		$query = "INSERT INTO FAVORITES VALUES('$email', '$itemID')";
	}
	else{
		$query = "DELETE FROM FAVORITES WHERE userEmail='$email' && itemID='$itemID'";	
	}	
	$result = $db->query($query);		
?>
<html>

<body>
	<form name='fmFav' method = 'POST' action = 'itempage.php'>
			<input type='hidden' name='itemID' value='<?php echo($itemID);?>'/>
	</form>
	<script>
		window.onload=function(){
           	document.forms["fmFav"].submit();
        }	
	</script>
</body>
</html>
