<?php

if (!function_exists('curl_init')) {
	throw new Exception('GetNet needs the CURL PHP extension.');
}

if (!function_exists('json_decode')) {
	throw new Exception('GetNet needs the JSON PHP extension.');
}

	function debug2 ($var, $legenda = false, $exit = false) {
	    echo "\n<pre style='width: 100%; z-index: 9999; position: relative;'>";
	    echo "============================ DEBUG2 OFICIAL ==========================\n";
	    if ($legenda){
	        $legenda = strtoupper($legenda);
	        $tamanho = strlen ($legenda);
	        $tabs = str_repeat('&nbsp;', (70 - $tamanho) / 2);
	        echo $tabs . $legenda . "\n\n";
	    }
	    if (is_array($var)) {
	        echo utf8_encode(print_r($var, true));
	    } else if (is_string($var)) {
	        echo "string(" . strlen($var) . ") \"" . utf8_encode($var) . "\"\n";
	    } else if(is_object($var)){
	        echo "OBJECT \n\n";
	        echo utf8_encode(print_r(var_export($var), true));
	    } else {
	        echo var_dump($var);
	    }
	    echo "\n";
	    debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
	    echo "</pre>";
	    if ($exit) {
	        die;
	    }
	}

require(dirname(__FILE__) . '/lib/GetNet/GetNet.php');
require(dirname(__FILE__) . '/lib/GetNet/Object.php');
require(dirname(__FILE__) . '/lib/GetNet/Model.php');
require(dirname(__FILE__) . '/lib/GetNet/CardHashCommon.php');
require(dirname(__FILE__) . '/lib/GetNet/Card.php');
require(dirname(__FILE__) . '/lib/GetNet/Error.php');
require(dirname(__FILE__) . '/lib/GetNet/Exception.php');
require(dirname(__FILE__) . '/lib/GetNet/Request.php');
require(dirname(__FILE__) . '/lib/GetNet/RestClient.php');
require(dirname(__FILE__) . '/lib/GetNet/RestAuth.php');
require(dirname(__FILE__) . '/lib/GetNet/Set.php');
require(dirname(__FILE__) . '/lib/GetNet/PaymentCommon.php');
require(dirname(__FILE__) . '/lib/GetNet/Payment.php');
require(dirname(__FILE__) . '/lib/GetNet/TokenCommon.php');
require(dirname(__FILE__) . '/lib/GetNet/Token.php');
require(dirname(__FILE__) . '/lib/GetNet/Util.php');