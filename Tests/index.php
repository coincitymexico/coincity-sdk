<?php

use Coincity\SDK\Curl\Configuration;
use Coincity\SDK\Fun\User;
use Danidoble\Danidoble;
use Symfony\Component\ErrorHandler\Debug;

include_once __DIR__ . '/../vendor/autoload.php';

Debug::enable();
//ZVYEnK984VISZt4jcSzZGn0BSITMM683a0IiKXod // h
//pxzgpvDe8PR0OUOUeH9OAeZjBNgkNghbtrg4l0i0 // work

$sdk = new Configuration();
$sdk->setToken('pxzgpvDe8PR0OUOUeH9OAeZjBNgkNghbtrg4l0i0');
$sdk->setSsl(false);
$sdk->setWebsite("https://localhost/coincity/dash/api");

$user = new User();

$user->attributes->setId(1279);
//$user = $user->drop();dd($user);

//$user->attributes->setName("Pruebas");
//$user->attributes->setLastName("Locas");
$user->attributes->setRestoreThis(true);
//
//$user->attributes->setEmail("chulin@chulin.com");
//$user->attributes->setEmailAlternative("probando@ando.com");
//$user->attributes->setPassword("12345678");
//$user->attributes->setPasswordConfirm("12345678");
//$user->attributes->empresa = "OWL DESARROLLOS";
$user = $user->save();
dd($user);
//$user->name = "Pues quiero modificarlo";
//$user = $user->save();
////echo $user;
//dd($user);

//$users = User::getPaginated();
//dump($users);

$user = User::findById(1);

$user->name = "Luis Daniel";
//$user->last_name = "Modificado2";
//$user->email = "guilin@chulin.com";
//$user = $user->save();
dd($user);


$r = new Danidoble();
$r->paginated = User::getPaginated();
dd($r->paginated);
$r->byId = User::findById(1274);

dd($r);