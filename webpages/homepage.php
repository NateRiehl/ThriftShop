<!-- Homepage of website -->
<HTML>	
	<head> 
		<title> Thrift Shop</title>
			<link rel="stylesheet" type="text/css" href="../css/homepageStyle.css">
	</head>
	<body> 
		<div align=center>
		<h1>KNowledge<br>
			Gettysburg Community Thrift Shop </h1>
		<br>
			
		<h2> Join a Thriving Community of Students and Professors Searching for High Quality, Low Price Items!</h2>
<div align=center class = "login">
	<!-- Check if there was an incorrect username/password entry -->
    <?php $reasons = array("password" => "Wrong Username or Password", "blank" => "You have left one or more fields blank."); if (isset($_GET["loginFailed"])) 
echo("<p>" . $reasons[$_GET["reason"]] . "</p>"); ?>
<br>

<!-- Login Form -->
</form>
	<table>
	<form form name='fmLogin' method='POST' action='login.php'>
  	<input type="text" name="email" placeholder = "Enter Email">
  	<input type="password" name="password" placeholder="Enter Password"> <br>
  	<input type="submit" value="Login">
	</form>
	</table>
</div>
		<br>
		<p><button type="submit" class = "button" onclick="location.href='register.php';">New user? Register</button></p>
		<br>
		</div>
	</body>
</HTML>
