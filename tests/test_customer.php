<?php

include_once('../GetNet.php');

// Autenticação
$authenticate = [
	'client_id' 	=> 'eb153ef1-4e41-4898-92d4-ee407e47b199',
	'client_secret' => 'fcf1e007-5cf9-4fda-830d-e51f9de0b9e6'
];

$authorization = new GetNet_Token($authenticate);
$authorization->authorize();


// Customer
GetNet::setSellerId('61040993-1bd9-4958-9a69-4a8dcf5b890c');
$dados_clientes = [
	"seller_id" 	  => Getnet::getSellerId(),
	"customer_id"	  => "customer_21081826",
	"first_name"	  => "João",
	"last_name"		  => "da Silva",
	"document_type"	  => "CPF",
	"document_number" => "12345678912",
	"birth_date"	  => "1976-02-21",
	"phone_number"	  => "5551999887766",
	"celphone_number" => "5551999887766",
	"email"			  => "customer@email.com.br",
	"observation"	  => "O cliente tem interesse no plano x.",
	"address" => [
	    "street"	  => "Av. Brasil",
	    "number"	  => "1000",
	    "complement"  => "Sala 1",
	    "district"	  => "São Geraldo",
	    "city"		  => "Porto Alegre",
	    "state"		  => "RS",
	    "country"	  => "Brasil",
	    "postal_code" => "90230060"
	]
];

// Criar cliente
$client = new GetNet_Customer($dados_clientes);
$client->create();

// Buscar cliente
// $client = new GetNet_Customer();
// $client->findById('customer_21081826');

// Buscar lista cliente
// $client = new GetNet_Customer();
// debug2($client->all());