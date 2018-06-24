<?php

class GetNet_Model extends GetNet_Object
{
	protected static $root_url;

	public function __construct($response = array())
	{
		parent::__construct($response);
	}

	public static function getUrl()
	{
		$class = get_called_class();
		$search = preg_match("/GetNet_(.*)/",$class, $matches);
		return '/'. strtolower($matches[1]) . 's';
	}

	public static function getUrlAuth()
	{
		$class = get_called_class();
		$search = preg_match("/GetNet_(.*)/",$class, $matches);
		return '/'. strtolower($matches[1]);
	}

	public function authentication()
	{
		$request = new GetNet_Request(self::getUrlAuth(), 'POST');
		$parameters = $this->__toArray(true);
		$request->setParameters($parameters);
		$response = $request->runauth();

		return $this->refresh($response);		
		var_dump(self::getUrl());exit();
	}

}