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

	public function run()
	{
		if(!parent::getSellerId()) {
			throw new GetNet_Exception("You need to configure Seller Id before performing requests.");
		}

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