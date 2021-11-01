<?php

use Coincity\SDK\Curl\Configuration;
use Coincity\SDK\Fun;
use Symfony\Component\ErrorHandler\Debug;

include_once __DIR__ . '/../vendor/autoload.php';

Debug::enable();
//ZVYEnK984VISZt4jcSzZGn0BSITMM683a0IiKXod // h
//pxzgpvDe8PR0OUOUeH9OAeZjBNgkNghbtrg4l0i0 // work

$sdk = new Configuration();
$sdk->setToken('pxzgpvDe8PR0OUOUeH9OAeZjBNgkNghbtrg4l0i0');
$sdk->setSsl(false);
$sdk->setWebsite("https://localhost/coincity/dash/api");



dd("PERATE QUE NO TENGO NADA PREPARADO AQUI");

$stock = new Fun\StockSync();
$stock->attributes->setCveSae("PROBANDO ANDO");
$stock->attributes->setDown(1);
$stock = $stock->save();
dd($stock);