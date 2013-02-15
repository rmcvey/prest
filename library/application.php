<?php
/**
*	Register and process endpoints
*	@author Rob McVey
*/
class application
{
	private $_endpoints = array();
	private $_endpoint_match;
	private $_requested_endpoint = '';
	private $_requested_method = '';
	private $_consumer;

	public static $debug = false;
	
	public function __construct($debug=false)
	{
		// ensure provided API key is valid
		$this->_check_key();
		
		// parsing out the /{endpoint}/{action} variables
		$request_path = explode('/', server::get('redirect_url');
		
		$filtered = array_values(
			array_filter($request_path, function($item){
				return $item != '';
			})
		);

		list($this->_requested_endpoint, $this->_requested_method) = $filtered;
		
		$this->_endpoint_match = APP_PATH . 'application/endpoints/*.php';
		
		application::$debug = $debug;
		
		$start = microtime(true);
		$this->_register_endpoints();
		$end = microtime(true);
		logger::time('register_endpoints', $start, $end);
	}
	
	private function _check_key()
	{
		if($key = request::get('key', false) === false)
		{
			return response::error('No API Key Supplied');
		}
		
		$this->consumer = new consumer($key, server::get('remote_addr'));
		
		$this->consumer->rate_limit();
		
		registry::set('consumer', $this->consumer);
	}
	
	/**
	*	load all of the defined endpoints
	*/
	private function _register_endpoints()
	{
		$endpoints = glob($this->_endpoint_match);
		
		$prefix = APP_PATH . 'application/endpoints/';
		
		foreach($endpoints as $filename)
		{
			$file = str_replace($prefix, '', $filename);
			$class_name = 'endpoints_'.str_replace('.php', '', $file);
			$endpoint = new $class_name;
			$this->_endpoints[ $endpoint->__toString() ] = $endpoint;
		}
	}
	
	public function run()
	{
		if(array_key_exists('/'.$this->_requested_endpoint, $this->_endpoints))
		{
			try
			{
				$endpoint = $this->_endpoints[ '/'.$this->_requested_endpoint ];
				$method = $this->_requested_method . '_endpoint';
				
				// base __call method will catch undefined methods and output error
				$response = $endpoint->$method( request::all() );
				response::send($response);
			}
			catch (Exception $exception)
			{
				logger::log($exception->getMessage());
			}
		}
		else
		{
			response::error('Invalid Endpoint');
		}
	}
}