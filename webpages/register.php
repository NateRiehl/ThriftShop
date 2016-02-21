<?php
include_once('dbproj_connect.php');
?>
<HTML>	
	<head> 
		<title> Register for Thrift Shop</title>
		<link rel="stylesheet" type="text/css" href="../css/registerStyle.css">
 <script type="text/javascript">
 //This function checks if the two passwords match each other and the form is submitted if they do
    function checkForm() { 
        var pw = document.getElementById('password').value;
        var pwCheck = document.getElementById('passwordCheck').value;
        if(pw == "" || pwCheck == ""){
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
 <td><input type='text' name='Fname' placeholder='First name'/> </td>
</tr>
<tr>
<td><input type='text' name='Lname' placeholder='Last name'/> </td>
</tr>
<tr>
<td><input type='text' name='email' placeholder='Email'/> </td>
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










