<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<meta name="viewport" content="width=1200">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
  
  <title>ТЗ</title>
  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script>
	function search()
	{
		var search_tb = $('input[name="search_tb"]').val();
		$.ajax({
			type: "POST",
			url: "GetGeo.php",
			data: {'geoPost': search_tb},
		}).done(function( result )
			{
				$(".GeoPosition").html(result);
				
				city_del=$("#city").val();
				//alert(city_del);
			});
	}
	
	
	function add()
	{
		var country = $('#country').val();
		var city = $('#city').val();
		var lon = $('#lon').val();
		var lat = $('#lat').val();
		
		if(country==null || city==null || lon==null || lat==null){
			return
		}
		
		$.ajax({
			type: "POST",
			url: "db_addCity.php",
			data: {'city': city, 'lon': lon, 'lat': lat},
		}).done(function( result )
			{
				//$(".calculate_result").html(result);
			});
		
		$.ajax({
			type: "POST",
			url: "db_getCity.php",
		}).done(function( result )
		{
			$("#select1").html(result);
			$("#select2").html(result);
		});
	}
	
	var city_del="";
	function del()
	{	
	
		if(city_del == null)
		{
			city_del = $('input[name="search_tb"]').val();
		}
		
		if(city_del == null)
		{
			return;
		}
		
		$.ajax({
			type: "POST",
			url: "db_delCity.php",
			data: {'city': city_del},
		}).done(function( result )
			{
				//$(".calculate_result").html(result);
				
				$.ajax({
				type: "POST",
				url: "db_getCity.php",
				}).done(function( result )
				{
					$("#select1").html(result);
					$("#select2").html(result);
				});	
				
				
			});
	}
	
	function onChangeCity(select_num)
	{
		if(select_num=="select1")
		{
			var selectValues1 = document.getElementById("select1");
			city_del=selectValues1.value;
			//alert(city_del);
			
			$.ajax({
			type: "POST",
			url: "db_readCity.php",
			data: {'city': city_del, 'select_num':select_num},
			}).done(function( result )
			{
				$(".city1").html(result);
			});
		}
		if(select_num=="select2")
		{
			var selectValues2 = document.getElementById("select2");
			city_del=selectValues2.value;
			//alert(city_del);
			
			$.ajax({
			type: "POST",
			url: "db_readCity.php",
			data: {'city': city_del, 'select_num':select_num},
			}).done(function( result )
			{
				$(".city2").html(result);
			});
		}
	}

	function calculate()
	{
		ObjCity_select1=$('#ObjCity_select1').text();
		ObjLon_select1=$('#ObjLon_select1').text();
		ObjLat_select1=$('#ObjLat_select1').text();
		
		ObjCity_select2=$('#ObjCity_select2').text();
		ObjLon_select2=$('#ObjLon_select2').text();
		ObjLat_select2=$('#ObjLat_select2').text();
		
		//alert(ObjCity_select1 + ObjLon_select1  + ObjLat_select1 + ObjCity_select2 + ObjLon_select2 + ObjLat_select2);
		
		$.ajax({
		type: "POST",
		url: "GetDistance.php",
		data: {'city_d1': ObjCity_select1, 'lon_d1':ObjLon_select1, 'lat_d1':ObjLat_select1, 'city_d2': ObjCity_select2, 'lon_d2':ObjLon_select2, 'lat_d2':ObjLat_select2},
		}).done(function(result)
		{
			$(".calculate_result").html(result);
		});
		//alert(ObjCity_select1);
		
	}
	
	</script>
</head>
<body>
<div class="cont">
	<table>
		<tr>
			<td>
				<div class="city_search">
					<p>City:
					<input type="textbox" name="search_tb" />
					</br>
					<input type="button" name="search" value="Найти" onClick = "search()" />
					</br>
					<input type="button" name="add" value="Добавить" onClick = "add()" />
					</br>
					<input type="button" name="drop" value="Удалить" onClick ="del()"/>
					</br>
				</div>
			</td>
			<td>
				<div class="GeoPosition">
					
				</div>
			</td>
		</tr>
	</table>
	<div class="city_distance">
		<table>
			<tr>
				<td>
					<select id="select1" onChange="onChangeCity(this.id)">
						<?php include ('db_getCity.php');?>
					</select>
				</td>
				<td>
					<select id="select2" onChange="onChangeCity(this.id)">
						<?php include ('db_getCity.php');?>
					</select>
				</td>
			</tr>
		</table>

		<table>
			<tr>
				<td>
					<div class="city1">
						City1
					</div>
				</td>
				<td>
					<div class="city2">
						City2
					</div>
				</td>
			</tr>
		</table>
		<input type="button" name="calculate" value="GetDistance" onClick = "calculate()" />
		<div class="calculate_result"></div>
	</div>
</div>
</body>
</html>
<? mysqli_close($link); ?>