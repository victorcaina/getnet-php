<?php

/**
 * 
 */
class GetNet_Token extends GetNet_TokenCommon
{
	public function authorize() 
	{
		$this->authentication();
	}
}