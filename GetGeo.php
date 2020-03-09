<?php
$geoPost=$_POST['geoPost'];
function GetGeo($search_str){
	function translit($s) {
	  $s = (string) $s; // преобразуем в строковое значение
	  $s = strip_tags($s); // убираем HTML-теги
	  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
	  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
	  $s = trim($s); // убираем пробелы в начале и конце строки
	  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
	  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
	  $s = preg_replace("/[^0-9a-z-_,]/i", "", $s); // очищаем строку от недопустимых символов
	  $s = str_replace(" ", "", $s); // заменяем пробелы Trim
	  return $s; // возвращаем результат
	}
	$search_str=translit($search_str);

	$url="https://geocode-maps.yandex.ru/1.x/?format=json&apikey=b93c3758-2969-4b5e-b0c1-ea0beaf1f470&geocode=$search_str";
	$result = file_get_contents($url);
	//echo $result;
	//echo "</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>";


	$json_data = json_decode($result, true);

	$country=$json_data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['Address']['Components'][0]['kind'];
	if($country=="country")
	{
		$country=$json_data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['Address']['Components'][0]['name'];
	}
	//GetLatKey--------------------------
	$query=$json_data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['Address']['Components'];
	foreach ($query as $key => $value){}
	//-----------------------------------
	$city=$json_data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['Address']['Components'][$key]['kind'];
	if($city=="province")
	{
		$city=$json_data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['Address']['Components'][$key]['name'];
	}
	if($city=="locality")
	{
		$city=$json_data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['Address']['Components'][$key]['name'];
	}
	
	//GET_COORD
	$lowerCorner=$json_data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['boundedBy']['Envelope']['lowerCorner'];
	$upperCorner=$json_data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['boundedBy']['Envelope']['upperCorner'];
	//В ответе геокодера координаты возвращаются в последовательности «долгота широта»
	$lon = (explode(" ", $lowerCorner)[0] + explode(" ", $upperCorner)[0])/2;
	$lat = (explode(" ", $lowerCorner)[1] + explode(" ", $upperCorner)[1])/2;


	$geo=array();
	$geo['country']=$country;
	$geo['city']=$city;
	$geo['lon']=$lon;
	$geo['lat']=$lat;
	
	return $geo;
}

$geo=GetGeo($geoPost);
$country=$geo['country'];
$city=$geo['city'];
$lon=$geo['lon'];
$lat=$geo['lat'];

print ("<table>");
print ("<tr><td>$country</td></tr>");
print ("<tr><td>$city</td></tr>");
print ("<tr><td>$lon $lat</td></tr>");
print ("</table>");

print("<input type='hidden' id='country' value=$country>");
print("<input type='hidden' id='city' value=$city>");
print("<input type='hidden' id='lon' value=$lon>");
print("<input type='hidden' id='lat' value=$lat>");
?>