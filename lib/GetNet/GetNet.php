<?php

abstract class GetNet
{
	public static $seller_id;
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

	public static function setSellerId($seller_id)
	{
		self::$seller_id = $seller_id;
	}

	public static function getSellerId()
	{
		return self::$seller_id;
	}
}