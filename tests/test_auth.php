<?php

	include_once('../GetNet.php');

	// Autenticação
	$authenticate = [
		'client_id' 	=> 'eb153ef1-4e41-4898-92d4-ee407e47b199',
		'client_secret' => 'fcf1e007-5cf9-4fda-830d-e51f9de0b9e6'
	];

	$authorization = new GetNet_Token($authenticate);
	$authorization->authorize();