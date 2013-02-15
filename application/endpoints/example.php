<?php
/**
*	Example endpoint
*	@author Rob McVey
*/
class endpoints_example extends base_endpoint 
{
	// required attribute
	protected $_path = "/example";
	
	// responds from /example/sayhi?name=World
	public function sayhi_endpoint($params)
	{	
		if(isset($params['name']))
		{
			$name = htmlspecialchars($params['name']);
			return array(
				'message' => "Hello " . $name
			);
		}
		response::error('Missing required param name');
	}
	
	// responds from /example/earthquake_data/?params
	public function earthquake_data_endpoint($params)
	{
		return earthquake::data($params);
	}
}