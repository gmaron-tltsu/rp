<?php
	include_once ('connect.php');
	$cityPost=$_POST["city"];
	$select_num=$_POST["select_num"];
	$query ="SELECT * FROM city WHERE name='$cityPost'";
	$result = mysqli_query($link, $query) or die("Error_SQL " . mysqli_error($link)); 
	while($info = mysqli_fetch_array( $result, MYSQLI_ASSOC))
	{ 
		$city_read=$info['name'];
		$lon_read=$info['lon'];
		$lat_read=$info['lat'];
	}
	print("<span id='ObjCity_$select_num'>$city_read</span></br>");
	print("<span id='ObjLon_$select_num'>$lon_read</span> ");
	print("<span id='ObjLat_$select_num'>$lat_read</span>");
?>