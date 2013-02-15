<?php

class server 
{
	public static function get($k, $default=NULL)
	{
		$k = strtoupper($k);
		if(array_key_exists($k, $_SERVER)){
			return $_SERVER[$k];
		}
		return $default;
	}
	
	public static function all()
	{
		return $_SERVER;
	}
	
	public static function set($k, $val=null)
	{
		if(is_array($k))
		{
			foreach($k as $key => $value)
			{
				$key = strtoupper($key);
				$_SERVER[$key] = $value;
			}
		} 
		else 
		{
			$k = strtoupper($k);
			$_SERVER[$k] = $val;
		}
	}
	
	public static function remove($k=null)
	{
		if(!is_null($k))
		{
			$k = strtoupper($k);
			unset($_SERVER[$k]);
			return true;
		}
		return false;
	}
}