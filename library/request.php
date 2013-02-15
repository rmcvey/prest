<?php

class request
{	
	public static function get($k, $default=NULL)
	{
		if(array_key_exists($k, $_REQUEST))
		{
			return $_REQUEST[$k];
		}
		return $default;
	}
	
	public static function all()
	{
		return $_REQUEST;
	}
	
	public static function set($k, $val)
	{
		$_REQUEST[$k] = $val;
	}
	
	public static function redirect($url, $code = 302, $replace = true)
	{
		if(!empty($url))
		{
			header("Location: $url", $replace, $code);
			exit;
		}
	}
}