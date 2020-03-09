<?php
$city_d1=$_POST['city_d1'];
$lon_d1=$_POST['lon_d1'];
$lat_d1=$_POST['lat_d1'];

$city_d2=$_POST['city_d2'];
$lon_d2=$_POST['lon_d2'];
$lat_d2=$_POST['lat_d2'];

include_once("City.php");
$city1=new City($city_d1,$lon_d1,$lat_d1);
$city2=new City($city_d2,$lon_d2,$lat_d2);

function GetDistance($lon1, $lat1, $lon2, $lat2)
{
  $lat1 *= M_PI / 180;
  $lat2 *= M_PI / 180;
  $lon1 *= M_PI / 180;
  $lon2 *= M_PI / 180;
  
  $d_lon = $lon1 - $lon2;
  
  $slat1 = sin($lat1);
  $slat2 = sin($lat2);
  $clat1 = cos($lat1);
  $clat2 = cos($lat2);
  $sdelt = sin($d_lon);
  $cdelt = cos($d_lon);
  
  $y = pow($clat2 * $sdelt, 2) + pow($clat1 * $slat2 - $slat1 * $clat2 * $cdelt, 2);
  $x = $slat1 * $slat2 + $clat1 * $clat2 * $cdelt;
  
  return atan2(sqrt($y), $x) * 6372.795; //В кМ
}

function GetDistanceCity($citi1, $citi2)
{
	return getDistance($citi1->GetLon(), $citi1->GetLat(), $citi2->GetLon(), $citi2->GetLat());
}
print(GetDistanceCity($city1, $city2)."  Км");
?>