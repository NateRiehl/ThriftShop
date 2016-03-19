<?php
/**
* This page is a form for a user to register to website.
* 	Calls "add_user.php" to process form
*/
include_once('dbproj_connect.php');
?>
<HTML>	
	<head> 
		<title> Register for Thrift Shop</title>
		<link rel="stylesheet" type="text/css" href="../css/registerStyle.css">
 <script type="text/javascript">
 //This function checks if all information is valid
    function checkForm() { 
		var fName = document.getElementById('Fname').value;
		var lName = document.getElementById('Lname').value;
		var email = document.getElementById('email').value;
        var pw = document.getElementById('password').value;
        var pwCheck = document.getElementById('passwordCheck').value;
		if(fName == ""){
			alert("First name required.");		
		}
		else if(lName == ""){
			alert("Last name required.");			
		}        
		else if(email == ""){ 
			alert("Email address required.");
		}
		else if(pw == "" || pwCheck == ""){
        	alert("Password field left blank");
        }
        else if(pw != pwCheck){
        	alert("Password's do not match!");
        }
        else{
         	return true;
        }
        return false;
    }
</script>
	</head>
<body> 
<div align=center>
<h1> Create Your Free Account Today </h1>
</div>
<div align=center class = "registerForm">
<form name='fmAdd' method='POST' action='add_user.php' onsubmit="return checkForm()">
<table cellpadding="0" cellspacing="5">
<tr>
 <td><input type='text' name='Fname' id='Fname' placeholder='First name'/> </td>
</tr>
<tr>
<td><input type='text' name='Lname' id='Lname' placeholder='Last name'/> </td>
</tr>
<tr>
<td><input type='text' name='email' id='email' placeholder='Email'/> </td>
</tr>
<tr>
<td> <input type='password' name ='password' id='password'  placeholder='Password'/> </td>
</tr>
<tr>
<td> <input type='password' id='passwordCheck' placeholder='Retype password'/> </td>
</tr>
</table>
<input type='submit' value='Register!'>
</form>
</div>
	</body>
</HTML>










