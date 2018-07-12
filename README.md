# GetNet PHP SDK

[![Latest Stable Version](https://poser.pugx.org/getnet/getnet-php/v/stable)](https://packagist.org/packages/getnet/getnet-php)
[![Latest Unstable Version](https://poser.pugx.org/getnet/getnet-php/v/unstable)](https://packagist.org/packages/getnet/getnet-php)
[![License](https://poser.pugx.org/getnet/getnet-php/license)](https://packagist.org/packages/getnet/getnet-php)
[![Total Downloads](https://poser.pugx.org/getnet/getnet-php/downloads)](https://packagist.org/packages/getnet/getnet-php)

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
$authorization->authorize();
```
### Wiki
Check the [wiki](https://github.com/victorcaina/getnet-php/wiki) for detailed documentation.
