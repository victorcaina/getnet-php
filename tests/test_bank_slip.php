<?php

	include_once('../GetNet.php');

	// Autenticação
	$authenticate = [
		'client_id' 	=> 'eb153ef1-4e41-4898-92d4-ee407e47b199',
		'client_secret' => 'fcf1e007-5cf9-4fda-830d-e51f9de0b9e6'
	];

	$authorization = new GetNet_Token($authenticate);
	$authorization->authorize();


	// Transacao por boleto
	GetNet::setSellerId('61040993-1bd9-4958-9a69-4a8dcf5b890c');
	$dados_transacao = [
  		"seller_id" => Getnet::getSellerId(),
  		"amount"    => 100,
  		"currency"  => "BRL",
  		"order" => [
    		"order_id"		=> "6d2e4380-d8a3-4ccb-9138-c289182818a3",
    		"sales_tax"		=> 0,
    		"product_type"	=> "service"
  		],
  		"boleto" => [
			"our_number"	  => "000001946598",
			"document_number" => "170500000019763",
			"expiration_date" => "16/11/2017",
			"instructions"	  => "Não receber após o vencimento",
			"provider"		  => "santander"
		],
  		"customer" => [
		    "first_name" 	  => "João",
		    "name" 			  => "João da Silva",
		    "document_type"   => "CPF",
		    "document_number" => "12345678912",
    		"billing_address" => [
				"street" 		=> "Av. Brasil",
				"number" 		=> "1000",
				"complement" 	=> "Sala 1",
				"district" 		=> "São Geraldo",
				"city"			=> "Porto Alegre",
				"state"			=> "RS",
				"postal_code"	=> "90230060"
    		]
  		]
	];

	$transacao = new GetNet_Payment($dados_transacao);
	$transacao->charge('/boleto');