<?php
	session_start();
	$email = $_SESSION['email'];
	$itemID = $_POST['itemID'];
?>
<HTML>
	<HEAD>
		<TITLE>Edit Item</TITLE>
	</HEAD>
	<BODY>
		<?php echo($itemID);?>
	</BODY>
</HTML>
