<?php
include_once('dbproj_connect.php');
session_start();
$userEmail = $_SESSION['email'];
$email = $_POST['email'];
$query = "Select Fname from USER where email='$email'";
$result = $db->query($query);
$row = $result->fetch();
$name = $row['Fname'];
?>
<!--Add a review to a seller. -->
<HTML>	
	<head> 
		<title> Add Review for <?php echo($name); ?></title>
		<link rel="stylesheet" type="text/css" href="../css/registerStyle.css">
	</head>
<body> 
<div align=center>
	<h1> Add Review for <?php echo($name); ?> </h1>
</div>

<div align=center class = "registerForm">

<!-- Form for adding review to seller. -->
<form name='fmAdd' method='POST' action='add_review.php'>
	<table cellpadding="0" cellspacing="5">
	<tr>
 		<td><input type='text' name='title' id='title' placeholder='Title of Review'/> </td>
	</tr>
	<tr>
 		<td><input type='text' name='item' id='item' placeholder='Item bought'/> </td>
	</tr>
	<tr>
		<td><input type='number' name='numGrade' id='numGrade' placeholder='Grade seller (0-5)'/> </td>
	</tr>
	<tr>
		<td> <input type='text' name ='comment' id='comment'  placeholder='Enter your comment'/> </td>
	</tr>
		<?php echo("<input type='hidden' name='email' value='$email'>");?>
	</table>
	<input type='submit' value='Submit Review!'>
</form>
</div>
	</body>
</HTML>

