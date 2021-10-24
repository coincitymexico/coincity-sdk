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
$sdk->setToken('ZVYEnK984VISZt4jcSzZGn0BSITMM683a0IiKXod');
$sdk->setSsl(false);
$sdk->setWebsite("https://localhost/coincity/dash/api");

$user = new User();
$user->attributes->setId(1394);
//$r = $user->drop();dd($r);
$user->attributes->setName("Pruebas");
$user->attributes->setLastName("Locas");
$user->attributes->setRestoreThis(true);

$user->attributes->setEmail("chulin@chulin.com");
$user->attributes->setEmailAlternative("probando@ando.com");
$user->attributes->setPassword("12345678");
$user->attributes->setPasswordConfirm("12345678");
$user->attributes->empresa = "OWL DESARROLLOS";
$result = $user->save();
//echo $user;
dd($result);


$r = new Danidoble();
$r->paginated = User::getPaginated();
$r->byId = User::findById(1274);

dd($r);