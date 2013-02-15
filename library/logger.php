<?php

class logger
{
	private static $logdir = '/var/log/prest/';
	
	public static function set_log_dir($path)
	{
		if( file_exists($path) && is_writeable($path) )
		{
			self::$logdir = $path;
		}
		else
		{
			throw new Exception("Cannot access log path -> $path");
		}
	}
	
	public static function log($msg, $bucket = 'default')
	{
		$logfile = "$bucket.log";
		return error_log($msg, 3, $logdir . $logfile);
	}
	
	public static function debug($param)
	{
		return self::log(var_export($param, true), 'debug');
	}
	
	public static function time($item, $start, $end)
	{
		$line = array(
			'process' => $item,
			'start' => $start,
			'end' => $end,
			'total' => $end - $start
		);
		return self::log( json_encode($line), 'performance');
	}
	
	public static function get_log($bucket = 'default')
	{
		return file_get_contents($logdir . "$bucket.log");
	}
}