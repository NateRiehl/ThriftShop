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
	<DIV class = "name">
		<h1> John Doe </h1>
		
	</DIV>
	<button type='submit'  id="addItem" onclick=location.href='additem.php';> Add Item </button>
	<DIV class = "bio">
	<h1> About Me </h1>
	<?php
		$email = $_SESSION['email'];
		$query = "SELECT bio FROM USER WHERE email = '$email'";
		$result = $db->query($query);
		$row = $result->fetch(); 
		$bio=$row['bio'];
		printf("<p> %s </p>", $bio);
	?>
	<button type='submit'  onclick=location.href='#';> Edit Bio </button>	
	</DIV>
	
	

</BODY>
</HTML>
