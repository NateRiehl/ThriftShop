<?php
	//phpinfo();
	include_once('db_connect.php');
?>

<html>
<head>
	<title> My first PHP page </title>
</head>
<body>
<?php
printf("<h2> Teen Titans </h2>\n");
$query = "SELECT * FROM titan2;";
$result = $db->query($query); // returns PDOStatement object; $db from db_connect
if($result != FALSE) {
 printf("# of rows = %d\n", $result->rowCount());
 printf("# of columns = %d\n", $result->columnCount());
}
// display all teen titans
printf("<form name='fmDel' method='POST' action='delete_titan.php' >\n");
printf("<table border = '3' cellspacing='7' cellpadding='0'>\n");
while ($row = $result->fetch()) { // for each row in the result table
$id = $row['id'];
$name=$row['name'];
$power=$row['power'];

 printf ("<tr>\n");
 printf ("<td>%s</td> <td>%s</td>\n", $row['name'], $row['power']);

printf("<td>");
printf("<input type='checkbox' name='cbTitan[]' value = '%d'>", $id);
printf("</td>");
 printf ("</tr>\n");
}
printf ("</table>\n");
printf("<input type='submit' value='Delete Checked titans'>\n");
printf("</form>\n");

?>

<form name='fmAdd' method='POST' action='add_titan.php'>
<table>
<tr>
<td>ID: </td> <td><input type='text' name='id' placeholder='ID'/> </td>
</tr>
<tr>
<td>name: </td><td><input type='text' name='name' placeholder='name'/> </td>
</tr>
<tr>
<td>planet: </td><td><input type='text' name='planet' placeholder='planet'/> </td>
</tr>
<tr>
<td>power:</td><td> <input type='text' name='power' placeholder='power'/> </td>
</tr>
</table>
<input type='submit' value='Add a new titan'>
</form>

</body>
</html>
