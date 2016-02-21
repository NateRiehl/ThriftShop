<?php
include_once("db_connect.php");
print_r($_POST);

//For each row in $_POST['cbTitan'] create a mysql query to delete the row with that ID and execute it
foreach ($_POST['cbTitan'] as $id){
	printf('Delete titan with %d \n', $id);
	$query="DELETE FROM titan2 WHERE id=".$id;
	//printf("Query to execute: %s\n",$query);
	$result = $db->query($query);
	
	if($result != FALSE){
		print("Success");
	}
}
?>
<!-- Hyper link -->
<a href="test.php">Back to titan page</a>
