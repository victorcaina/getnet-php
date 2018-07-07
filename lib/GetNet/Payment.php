<?php

/**
 *
 */
class GetNet_Payment extends GetNet_PaymentCommon
{

	public function charge($path)
	{
		$this->create($path);
	}


}