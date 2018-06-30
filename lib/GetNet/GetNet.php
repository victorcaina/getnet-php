<?php

abstract class GetNet
{
	public static $client_id;
	public static $client_secret;
	const LIVE = 1;
	const END_POINT_HOMOLOGATION = "https://api-homologacao.getnet.com.br";
	const END_POINT_PRODUCTION = " ";
	const API_VERSION = 'v1';
	const AUTH = 'auth/oauth/v2';

	public static function full_api_url($path)
	{
		return self::END_POINT_HOMOLOGATION . '/' . self::API_VERSION . $path;
	}

	public static function api_url_authenticate($path)
	{
		return self::END_POINT_HOMOLOGATION . '/' . self::AUTH . $path;
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