<?php
	//phpinfo();
	include_once('dbproj_connect.php');
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/shoppingStyle.css">
</head>
<div class = "top">
<ul>
  <li><a href="profile.php">My page</a></li>
  <li><a href="homepage.php">Homepage</a></li>
</ul>
</div>

<?php
printf("<div class = 'main'>");
$query = "SELECT * FROM ITEM;";
$result = $db->query($query);
while ($row = $result->fetch()) { // for each row in the result table
$id = $row['id'];
$name=$row['name'];
$price=$row['price'];
$imageLink=$row['imageLink'];
printf("<form method='post' action='itempage.php' id='%s'><input type='hidden' name='itemID' value=%s> </form>", $id, $id);
printf("<button type='submit' form='%s'><img src='$imageLink' alt='Mountain View' style='width:200px;height: 180px'> </br>%s %s</button> &nbsp;",$id, $name, $price." dollars");
}
printf("</div>");
?>


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

