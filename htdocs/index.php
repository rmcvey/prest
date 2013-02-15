<?php

define('APP_PATH', '/var/www/html/api.somesite.com');

set_include_path(
	implode( PATH_SEPARATOR, array(
		APP_PATH . '/library',
		APP_PATH . '/application/models',
		APP_PATH . '/application/'
	)) . PATH_SEPARATOR . get_include_path()
);

require_once 'autoload.php';

db::$dsn = array(
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'test'
);

if(server::get('request_uri') === '/')
{
	request::redirect('/documentation/', 302);
}

$application = new application();

$application->run();

?>