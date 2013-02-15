<?php

function __api_autoload($class_name)
{
	include_once str_replace('_', '/', $class_name) . '.php';
}

spl_autoload_register("__api_autoload");

?>