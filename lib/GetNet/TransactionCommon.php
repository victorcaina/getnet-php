<?php

/**
 * 
 */
class GetNet_TransactionCommon extends GetNet_CardHashCommon
{
	public function __construct($response = array())
	{
		parent::__construct($response);

		if(!isset($this->payment_method)) {
			$this->payment_method = 'credit_card';
		}
	}
}