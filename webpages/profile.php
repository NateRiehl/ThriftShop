<?php
	//phpinfo();
	include_once('dbproj_connect.php');
	session_start();
?>
<HTML>
	<HEAD> 
		<TITLE> Profile Page</TITLE>	
		<link rel="stylesheet" type="text/css" href="../css/profileStyle.css">
	</HEAD>
<BODY>

	<DIV class = "profilepic">
	<?php
		$email = $_SESSION['email'];
		$query = "SELECT imageLink FROM USER WHERE email = '$email'";
		$result = $db->query($query);
		$row = $result->fetch(); 
		$imageLink=$row['imageLink'];
		printf("<img src='$imageLink'>");
	 ?>
	<button type='submit' onclick=location.href='#';> Change Profile Pic </button>

	</DIV>

	<DIV class = "bio">
	<button type='submit'  onclick=location.href='#';> Edit Bio </button>	
	</DIV>
	
	<button type='submit'  id="addItem" onclick=location.href='additem.php';> Add an Item </button>

	<DIV class="reviews">
		
	</DIV>
</BODY>
</HTML>
