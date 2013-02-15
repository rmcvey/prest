<?php
/**
 * Global variable registry
 *
 * @author Rob McVey
 */
class registry 
{
	private static $registry;
    
	public static function init()
	{
		foreach(session::all() as $hash => $value)
		{
			self::$registry[$hash] = $value;
		}
	}
    
	public static function get($name, $default = NULL) 
	{
		return isset(self::$registry[$name]) ? self::$registry[$name] : $default;
	}

	public static function set($name, $val, $persist = false)
	{
		if($persist !== false)
		{
			session::set($name, $val);
		}
		self::$registry[$name] = $val;
	}

	public static function all()
	{
		return self::$registry;
	}
}