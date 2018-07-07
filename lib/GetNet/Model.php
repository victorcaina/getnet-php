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

		return $this->set_session($response);
	}

	public function create($path)
	{
		$request = new GetNet_Request(self::getUrl() . $path, 'POST');
		$request->setAuthorization($this->get_session('token_type') . ' ' . $this->get_session('access_token'));
		$parameters = $this->__toArray(true);
		$request->setParameters($parameters);
		$response = $request->run();

		return $this->refresh($response);
	}

}