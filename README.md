# GetNet PHP SDK

PHP integration for [GetNet API](https://api.getnet.com.br/v1/doc/api)

<br>

## Installation
Via Composer
```sh
composer require 'getnet/getnet-php'
```

## Usage
### Basic
you will need your Client ID and Client Secret to authenticate
```php
$authenticate = [
	'client_id' 	=> 'eb153ef1...e47b199',
	'client_secret' => 'fcf1e007...de0b9e6'
];

$authorization = new GetNet_Token($authenticate);
$authorization->authorize()
```