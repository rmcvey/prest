<?php

class session 
{
	public static function get($k, $default=NULL)
	{
		if(array_key_exists($k, $_SESSION)){
			return $_SESSION[$k];
		}
		return $default;
	}
	
	public static function all()
	{
		return $_SESSION;
	}
	
	public static function set($k, $val=null)
	{
		if(is_array($k))
		{
			foreach($k as $key => $value)
			{
				$_SESSION[$key] = $value;
			}
		} 
		else 
		{
			$_SESSION[$k] = $val;
		}
	}
	
	public static function remove($k=null)
	{
		if(!is_null($k))
		{
			unset($_SESSION[$k]);
			return true;
		}
		return false;
	}
}