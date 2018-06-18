<?php

if (!function_exists('curl_init')) {
	throw new Exception('GetNet needs the CURL PHP extension.');
}

if (!function_exists('json_decode')) {
	throw new Exception('GetNet needs the JSON PHP extension.');
}

require(dirname(__FILE__) . '/lib/GetNet/Card.php');
require(dirname(__FILE__) . '/lib/GetNet/CardHashCommon.php');
require(dirname(__FILE__) . '/lib/GetNet/Error.php');
require(dirname(__FILE__) . '/lib/GetNet/Exception.php');
require(dirname(__FILE__) . '/lib/GetNet/GetNet.php');
require(dirname(__FILE__) . '/lib/GetNet/Model.php');
require(dirname(__FILE__) . '/lib/GetNet/Object.php');
require(dirname(__FILE__) . '/lib/GetNet/Request.php');
require(dirname(__FILE__) . '/lib/GetNet/RestClient.php');
require(dirname(__FILE__) . '/lib/GetNet/Set.php');
require(dirname(__FILE__) . '/lib/GetNet/Transaction.php');
require(dirname(__FILE__) . '/lib/GetNet/TransactionCommon.php');
require(dirname(__FILE__) . '/lib/GetNet/Util.php');