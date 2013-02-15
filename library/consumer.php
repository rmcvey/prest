<?php

class consumer
{
	const NOAUTH = 'Invalid API key';
	const REACHED_REQUEST_LIMIT = 'Maximum requests per day have been made';
	const IP_MISMATCH = 'IP address is not authorized to make requests with this key';
	
	public $ip = null;
	public $key = null;
	public $valid = false;
	public $can_answer = false;
	
	public function __construct($key, $ip)
	{
		$this->ip = $ip;
		$this->key = $key;
		
		if( $this->_lookup() === false )
		{
			response::error( self::NOAUTH );
		}
		else
		{
			$this->valid = true;
		}
	}
	
	private function _lookup()
	{
		$start = microtime(true);
		if(is_null( $this->key ))
		{
			return false;
		}
		
		$query = sprintf("SELECT * FROM api.tbl_keys WHERE `key` = %s LIMIT 1", db::quote($this->key));
		
		$consumer = current(db::query($query));
		
		if(!empty($consumer))
		{
			$iplong = ip2long($this->ip);
			
			if($iplong < $consumer['ip_range_low'] || $iplong > $consumer['ip_range_high'])
			{
				response::error( self::IP_MISMATCH );
			}
			foreach($consumer as $key => $value)
			{
				$this->$key = $value;
			}
			
			$end = microtime(true);
			
			logger::time('key_lookup', $start, $end);
			
			$start = microtime(true);
			$this->_rate_limit();
			$end = microtime(true);
			
			logger::time('rate_limiter', $start, $end);
			
			return true;
		}
		else
		{
			response::error( self::NOAUTH );
		}
		return false;
	}
	
	private function _rate_limit()
	{
		try {
			$mongo = core_database_mongo::get_write();
			$collection = $mongo->api_request_counter->requests;
		
			$document = array(
				'_id' => $this->key,
				'ts' => date('Y-m-d H:i:s', strtotime('last day of this month')),
				'count' => '$INC'
			);
		
			$collection->insert($document);
			$record = $collection->findOne(array("_id" => $this->key));
		
			if( $record['count'] >= $this->daily_request_limit )
			{
				response::error( self::REACHED_REQUEST_LIMIT );
			}
		} catch (MongoCursorException $e) {
			error_log("Error updating limit table -> " . $e->getMessage());
		}
	}
}