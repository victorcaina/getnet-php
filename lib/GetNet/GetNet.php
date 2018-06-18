<?php

abstract class GetNet
{
	public static $seller_id;
	const live = 1;
	const endpoint = "https://api-homologacao.getnet.com.br";
	const api_version = 'v1';

	public static function full_api_url($path)
	{
		return self::endpoint . '/' . self::api_version . $path;
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