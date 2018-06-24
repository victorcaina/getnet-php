<?php

abstract class GetNet
{
	public static $client_id;
	public static $client_secret;
	const live = 1;
	const endpoint = "https://api-homologacao.getnet.com.br";
	const api_version = 'v1';
	const auth = 'auth/oauth/v2';

	public static function full_api_url($path)
	{
		return self::endpoint . '/' . self::api_version . $path;
	}

	public static function api_url_authenticate($path)
	{
		return self::endpoint . '/' . self::auth . $path;
	}

	public static function setClientId($client_id)
	{
		self::$client_id = $client_id;
	}

	public static function setClientSecret($client_secret)
	{
		self::$client_secret = $client_secret;
	}

	public static function getClientId()
	{
		return self::$client_id;
	}

	public static function getClientSecret()
	{
		return self::$client_secret;
	}
}