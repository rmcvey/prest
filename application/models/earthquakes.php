<?php

class earthquakes extends curl 
{
	private static $_base_url = 'http://api.geonames.org/earthquakesJSON?';
	private static $_default_params = array(
		'formatted' => true,
		'north' => 44.1,
		'south' => -9.9,
		'east' => -22.4,
		'west' => 55.2,
		'username' => 'demo',
		'style' => 'full'
	);
	
	public static function data($params = array())
	{
		$options = array_merge(self::$_default_params, $params);
		
		$request_url = self::build_url(self::$_base_url, $options);
		
		return self::get($request_url);
	}
	
}