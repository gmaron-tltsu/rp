<?php
$city=$_POST['city'];
include_once ('connect.php');
	$query ="DELETE FROM city WHERE name='$city'";
	$result = mysqli_query($link, $query) or die("Error_SQL " . mysqli_error($link));
echo "$city   DELETED"; 	
?>