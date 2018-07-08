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

	public static function findById($id)
	{
		$request = new GetNet_Request(self::getUrl() . '/' . $id, 'GET');
		$request->setAuthorization(parent::get_session('token_type') . ' ' . parent::get_session('access_token'));
		$response = $request->run();
		$class = get_called_class();

		return new $class($response);
	}

	public static function all($page = 1, $count = 10)
	{
		$request = new GetNet_Request(self::getUrl(), 'GET');
		$request->setAuthorization(parent::get_session('token_type') . ' ' . parent::get_session('access_token'));
		$request->setParameters(["page" => $page, "limit" => $count]);
		$response = $request->run();
		$return_array = Array();
		$class = get_called_class();

		foreach($response as $r) {
			$return_array[] = new $class($r);
		}

		return $return_array;
	}
}