<?php
include_once('dbproj_connect.php');
?>
<HTML>	
	<head> 
		<title> Register for Thrift Shop</title>
		<link rel="stylesheet" type="text/css" href="../css/registerStyle.css">
	</head>
<body> 
<div align=center>
<h1> Add an item to the Gettysburg Community Thrift </h1>
</div>
<div align=center class = "registerForm">
<form name='fmAdd' method='POST' action='add_item.php' onsubmit="return checkForm()" enctype='multipart/form-data'>
<table cellpadding="0" cellspacing="5">

<tr>
 <td><input type='text' name='name' id='name' placeholder='Title of item'/> </td>
</tr>

<tr>
<td><input type='number' name='price' id='price' placeholder='Price'/> </td>
</tr>

<tr>
<td>
<input type="checkbox" name="cb[]" value="cbC1">Menswear<br />
<input type="checkbox" name="cb[]" value="cbC2">Womens Clothing<br />
<input type="checkbox" name="cb[]" value="cbC3">Sporting Apparel<br />
<input type="checkbox" name="cb[]" value="cbC4">Other
</td>
</tr>

<tr>
<td> <input type='text' name ='description' id='description'  placeholder='Enter a description'/> </td>
</tr>

<tr>
<td> <input type='file' name='imageFile' id='imageFile' /> </td>
</tr>

<tr>
<td> <input type='text' name ='email' id='email'  placeholder='your email'/> </td>
</tr>

</table>
<input type='submit' value='Submit Item!'>
</form>
</div>
	</body>
</HTML>









