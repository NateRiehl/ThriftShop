<?php
/**
* This php file holds the utility method to take an array of selected checkboxes
* 	and add them to the CATEGORY table
*/
include_once('dbproj_connect.php');

	/**
	* Input: $id of item, $categories (array of categories that item is in)
	* Adds a row for each index of categories to the CATEGORY table
	*/
	function setupCategories($id, $categories){
		foreach($categories as $category){
			$query = "INSERT INTO CATEGORY VALUES ($id, '$category')";
			$result=$GLOBALS['db']->query($query);
		}
	}
?>
