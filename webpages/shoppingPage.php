<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/shoppingStyle.css">
</head>
<div class = "top">
<ul>
  <li><a href="#">My page</a></li>
  <li><a href="homepage.php">Homepage</a></li>
</ul>
</div>
<div class = "main">
<button type="submit" onclick="location.href='homepage.php';"><img src="imgs/thriftshop.jpg" alt="Mountain View" style="width:200px;height: 180px;"> <br/>Price</button> &nbsp;
<button type="submit"><img src="imgs/thriftshop.jpg" alt="Mountain View" style="width:200px;height: 180px;"> <br/>Price</button> &nbsp;
<button type="submit"><img src="imgs/thriftshop.jpg" alt="Mountain View" style="width:200px;height: 180px;"> <br/>Price</button> &nbsp;
<button type="submit"><img src="imgs/thriftshop.jpg" alt="Mountain View" style="width:200px;height: 180px;"> <br/>Price</button> &nbsp;
<button type="submit"><img src="imgs/thriftshop.jpg" alt="Mountain View" style="width:200px;height: 180px;"> <br/>Price</button> &nbsp;
<button type="submit"><img src="imgs/thriftshop.jpg" alt="Mountain View" style="width:200px;height: 180px;"> <br/>Price</button>
</div>

<div class = "right">
<form name="categoryForm" method="POST" action="#">

<table name="categories" align="center" border="0" cellspacing="0" cellpadding="0" >

<caption><h3>Narrow your search: </h3></caption>

<!-- row 6: check boxes -->
<tr>
<td>
<input type="checkbox" name="cb[]" value="cbC1">Category <br />
<input type="checkbox" name="cb[]" value="cbC2">Category <br />
<input type="checkbox" name="cb[]" value="cbC3">Category <br />
<input type="checkbox" name="cb[]" value="cbC3">Category <br />
<input type="checkbox" name="cb[]" value="cbC3">Category <br />
<input type="checkbox" name="cb[]" value="cbC3">Category <br />
<input type="checkbox" name="cb[]" value="cbC3">Category <br />
<input type="checkbox" name="cb[]" value="cbC4">Category 
</td>
</tr>

<!-- row 10: submit button -->
<tr>
<td><input type="submit" value="Refresh" /></td>
</tr>

</table>
</form>
</div>

