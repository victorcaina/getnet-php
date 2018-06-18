<?php
class GetNet_Util
{
 	public static function fromCamelCase($str)
 	{
		$matches = NULL;
 		if (preg_match_all('/(^|[A-Z])+([a-z]|$)*/', $str, $matches)){
			$words = $matches[0];
			$words_clean = [];
 			foreach($words as $key => $word){
				if (strlen($word) > 0) {
					$words_clean[] = strtolower($word);
				}
			}

			return implode('_', $words_clean);
		}else {
			return strtolower($str);
		}
	}

	public static function isList($arr)
	{
		if(!is_array($arr)) {
			return false;
		}

		foreach (array_keys($arr) as $k) {
			if (!is_numeric($k)) {
				return false;
			}
		}

		return true;
	}

	public static function convertGetNetObjectToArray($object)
	{
		$output = [];
		foreach ($object as $key => $value) {
			if ($value instanceof GetNet_Object) {
				$output[$key] = $value->__toArray(true);
			}else if (is_array($value)) {
				$output[$key] = self::convertGetNetObjectToArray($value);
			}else {
				$output[$key] = $value;
			}
		}

		return $output;
	}

	public static function convertToGetNetObject($response)
	{
		$types = [
			'transaction' 	=> 'GetNet_Transaction',
			'customer' 		=> "GetNet_Customer",
			'address' 		=> "GetNet_Address",
			'phone' 		=> "GetNet_Phone",
			// 'subscription' 	=> 'GetNet_Subscription'
		];

		if(self::isList($response)) {
			$output = [];
			foreach($response as $j) {
				array_push($output, self::convertToGetNetObject($j));
			}

			return $output;
		} else if(is_array($response)) {
			if(isset($response['object']) && is_string($response['object']) && isset($types[$response['object']])) {
				$class = $types[$response['object']];
			} else {
				$class = 'GetNet_Object';
			}

			return GetNet_Object::build($response, $class);
		}else {
			return $response;
		}
	}
}