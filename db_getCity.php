<?php
include_once ('connect.php');
	$query ="SELECT * FROM city";
	$result = mysqli_query($link, $query) or die("Error_SQL " . mysqli_error($link)); 
	//$rows = mysqli_num_rows($result); echo "$rows</br>";
	//$key=array();
	while($info = mysqli_fetch_array( $result, MYSQLI_ASSOC)) { 
		print "<option name='$info[name]'>$info[name]</option>"; 
	}
?>