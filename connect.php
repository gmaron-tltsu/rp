<?php
$hostname = "localhost"; 
$username = "gmaron"; 
$password = "70Ew2aKnP0Ks"; 
$dbname = "CityBase"; 

$link = mysqli_connect($hostname,$username,$password,$dbname);
	if (!$link) {
		die('Could not connect: ' . mysqli_error());
	}
?>