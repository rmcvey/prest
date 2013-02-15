<?php
/**
*	Base class for output normalization
*	@author Rob McVey
*/
class response
{
	public static function send($data, $headers = array(
		'Cache-Control' => 'no-cache, must-revalidate',
		'Expires' => 'Mar, 6 Jul 2100 05:00:00 GMT',
		'Content-type' => 'application/json'
	))
	{
		foreach($headers as $key => $value)
		{
			header("$key:$value");
		}
		
		if(!is_string($data))
		{
			$data = json_encode($data);
		}
		echo $data;
		exit;
	}
	
	public static function message($message = '')
	{
		$data = json_encode(
			array(
				'message' => array(
					'message' => $message
				)
			)
		);
		return self::send($data);
	}
	
	public static function error($message = 'An unknown error occured')
	{
		$data = json_encode(
			array(
				'error' => array(
					'message' => $message
				)
			)
		);
		return self::send($data);
	}
}