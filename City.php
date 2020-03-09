<?php
class City
{
	private $name="";
	private $lon=0.0;
	private $lat=0.0;
	
	public function __construct($name, $lon, $lat)
	{
		$this->lat=$lat;
		$this->lon=$lon;
		$this->name=$name;
	}
	public function DisplayCity()
	{
		return "$this->name ($this->lon, $this->lat)</br>";
	}
	public function GetName()
	{
		return $this->name;
	}
	public function GetLat()
	{
		return $this->lat;
	}
	public function GetLon()
	{
		return $this->lon;
	}
}
?>