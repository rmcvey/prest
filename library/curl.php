<?php

class curl
{
	private static function make_request($method, $url, $vars, $headers, $port = null) 
	{
		$ip = $_SERVER['REMOTE_ADDR'];
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en-US; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7");
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/api_cookiejar_$ip");
	    curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/api_cookiejar_$ip");
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, '15');
	
		if(!is_null($port)){
			curl_setopt($ch, CURLOPT_PORT, $port);
		}
	    
		if(!empty($headers)){
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		}
	    if ($method == 'POST') 
	    {
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
	    }

	    $data = curl_exec($ch);
	
	    if ($data) 
	    {
			return $data;
	    } 
	    else 
	    {
	        $error = curl_error($ch);
	        curl_close($ch);
			if($error){
	        	return $error;
			}
			$uri = parse_url($url);
			error_log("Host returned to response: $url");
			return self::error('The host: '. $uri['host'] .' returned no response at location: ' . $uri['path']);
	    }   
	}
	
	public static function build_url($base="", $params=array(), $override_question_mark = false)
	{
		if(substr($base, -1) !== '?' && $override_question_mark === false)
		{
			$base .= '?';
		}
		$querystring = http_build_query($params);
		return $base . $querystring;
	}

	public static function get($url, $headers = array(), $port = null)
	{
	    return self::make_request('GET', $url, 'NULL', $headers, $port);
	}

	public static function post($url, $vars) 
	{
	    return self::make_request('POST', $url, $vars);
	}
}