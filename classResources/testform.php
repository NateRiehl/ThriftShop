<html>
<head> </head>
<body>

;
<table>
<form method="post" action="testform.php">
    <input type="file" name="studentname">
    <input type="submit" value="click" name="submit">
</form>
</table>


<?php
function display()
{
    echo "hello ".$_POST["studentname"];
}
if(isset($_POST['submit']))
{
   display();
} 

?>
</body>
</html>
