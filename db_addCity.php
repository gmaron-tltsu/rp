<?php
include_once ('connect.php');
$country=$_POST['country'];
$city=$_POST['city'];
$lon=$_POST['lon'];
$lat=$_POST['lat'];
$date = date("Y-m-d H:i:s");

$query ="INSERT INTO city (name, lon, lat, date) values ('$city', '$lon', '$lat', '$date')";
$result = mysqli_query($link, $query) or die();

echo "$country    $city   $lon      $lat    $date"; 
?>