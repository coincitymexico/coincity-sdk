<?php

use Coincity\SDK\Curl\Curl;
use Coincity\SDK\Fun\User;
use Danidoble\Danidoble;
use Symfony\Component\ErrorHandler\Debug;

include_once __DIR__ . '/../vendor/autoload.php';

Debug::enable();
//zZpFnBfcqJ20SjaMCk3OePhWc5oqUzO2U2WmC8JX

$sdk = new Curl('zZpFnBfcqJ20SjaMCk3OePhWc5oqUzO2U2WmC8JX');
$sdk->setSsl(false);
$sdk->setWebsite("https://localhost/coincity/dash/api");

$user = new User();


$user->attributes->nombre = "Daniel";
$user->attributes->apellido = "Sandoval";
$user->attributes->email = "dsandoval@coincitymexico.com";
$user->attributes->password = "misupercontrasena1234567890porqueyolo";
$user->attributes->empresa = "OWL DESARROLLOS";
//echo $user;
dd($user);


$r = new Danidoble();
$r->paginated = User::getUsers();
$r->byId = User::getUser(2);

dd($r);