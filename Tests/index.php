<?php

use Coincity\SDK\Curl\Configuration;
use Coincity\SDK\Fun\User;
use Danidoble\Danidoble;
use Symfony\Component\ErrorHandler\Debug;

include_once __DIR__ . '/../vendor/autoload.php';

Debug::enable();
//zZpFnBfcqJ20SjaMCk3OePhWc5oqUzO2U2WmC8JX // h
//pxzgpvDe8PR0OUOUeH9OAeZjBNgkNghbtrg4l0i0 // work

$sdk = new Configuration();
$sdk->setToken('pxzgpvDe8PR0OUOUeH9OAeZjBNgkNghbtrg4l0i0');
$sdk->setSsl(false);
$sdk->setWebsite("https://localhost/coincity/dash/api");

$user = new User();
$user->attributes->yolo = "suag";
$user->attributes->setName("Pruebas");
$user->attributes->setLastName("Locas");
$user->attributes->setEmail("chulin@cololo.com");
$user->attributes->setPassword("12345678");
$user->attributes->setPasswordConfirm("12345678");
$user->attributes->empresa = "OWL DESARROLLOS";
//echo $user;
dump($user->save());


$r = new Danidoble();
$r->paginated = User::getUsers();
$r->byId = User::getUser(1274);

dd($r);