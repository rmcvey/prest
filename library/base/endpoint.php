<?php

class base_endpoint
{
	protected $_path;
	
	public function __call($name, $params)
	{
		response::error("Invalid endpoint '$name'");
	}
	
	public function __toString()
	{
		return $this->_path;
	}
	
	public function get_path()
	{
		return $this->_path;
	}
}