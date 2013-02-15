<?php

require 'MDB2.php';

class db
{
	private static $_db = null;
	public static $dsn;
	
	private static function _get_instance()
	{
		if( is_null(self::$_db) )
		{
			$dsn = array(
				'hostspec' => db::$dsn['hostname'],
				'username' => db::$dsn['username'],
				'password' => db::$dsn['password'],
				'database' => db::$dsn['database'],
		    );

			$options = array(
				'debug' => 2,
				'portability' => MDB2_PORTABILITY_ALL
		    );

			self::$_db = MDB2::factory( $dsn, $options );
			self::$_db->setFetchMode(MDB2_FETCHMODE_ASSOC);
		}
		return self::$_db;
	}
	
	public static function query($statement)
	{
		$db 	= self::_get_instance();
		$result = $db->query($statement);
		
		if(Pear::isError($result))
		{
			error_log($result->getMessage() . ' query -> ' . $statement);
			return array();
		}
		return $result->fetchAll();
	}
	
	public static function quote($value)
	{
		$db = self::_get_instance();
		return $db->quote($value);
	}
}