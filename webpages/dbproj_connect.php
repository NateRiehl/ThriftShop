<?php
$server = 'ada.cc.gettysburg.edu';
$port = 3306;
$user = 'riehna01';
$pass = 'fetchy5';
$dbname = 'kn_cs360';

try{
	$db = new PDO("mysql:host=$server;dbname=$dbname",$user, $pass);
}
catch(PDOException $ex){
	die("MYSQL connection error:" .$ex->getMessage());
}

?>
