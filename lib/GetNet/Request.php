<?php

class GetNet_Request extends GetNet 
{
	private $path;
	private $method;
	private $parameters = Array();
	private $headers;
	private $live;

	public function __construct($path, $method, $live = GetNet::live)
	{
		$this->method 	= $method;
		$this->path 	= $path;
		$this->live 	= $live;
	}

	public function runauth()
	{
		if (!$this->parameters['client_id'] && !$this->parameters['client_secret']) {
			throw new GetNet_Exception("You need to configure Client Id and Client Secret before performing requests.");
		}

		$client = new RestAuth(
			[
				"method" 		=> $this->method,
				"url" 			=> $this->api_url_authenticate($this->path),
				"headers" 		=> $this->headers,
				"parameters" 	=> 'scope=oob&grant_type=client_credentials',
				// "authorization"	=> base64_encode($this->parameters['client_id'] . ':' . $this->parameters['client_secret'])
				"client_id"		=> $this->parameters['client_id'],
				"client_secret" => $this->parameters['client_secret']
			]
		);
		$response = $client->run();
		$decode = json_decode($response["body"], true);

		if ($decode === NULL) {
			throw new Exception("Failed to decode json from response.\n\n Response: ".$response);
		} else {
			if($response["code"] == 200) {
				return $decode;
			}else {
				throw GetNet_Exception::buildWithFullMessage($decode);
			}
		}
	}

	public function run()
	{
		// if(!parent::getSellerId()) {
		// 	throw new GetNet_Exception("You need to configure Seller Id before performing requests.");
		// }

		$this->sellerId = parent::getSellerId();
		$client = new RestClient(
			[
				"method" 		=> $this->method,
				"url" 			=> $this->full_api_url($this->path),
				"headers" 		=> $this->headers,
				"parameters" 	=> $this->parameters,
				"seller_id" 	=> $this->sellerId
			]
		);
		$response = $client->run();

		$decode = json_decode($response["body"], true);
		if($decode === NULL) {
			throw new Exception("Failed to decode json from response.\n\n Response: " . $response);
		}else {
			var_dump($decode);
			if($response["code"] == 200) {
				return $decode;
			}else {
				// debugar o retorno tb para arrumar o exception
				throw GetNet_Exception::buildWithFullMessage($decode);
			}
		}
	}

	public function setParameters($parameters)
   	{
		$this->parameters = $parameters;
	}


	public function getParameters()
	{
		return $this->parameters;
	}
}