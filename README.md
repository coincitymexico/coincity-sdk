# Coin City SDK

## Configure yours credentials

```php
$token = "your token for sdk" 
$sdk = new Configuration();

// Set your token
$sdk->setToken($token);

// Disable SSL/HTTPS for local use
$sdk->setSsl(false);

// Set your website base endpoint 
$sdk->setWebsite("https://localhost/coincity/dash/api");
```

### Users

#### Get users paginated

```php
$page = 1;// optional
$r = User::getPaginated($page);
```

#### Get user by Identifier

```php
$id = 1;
$r = User::findById($id);
```

#### New User

```php
$user = new User();
$user->attributes->setName("Testing");
$user->attributes->setLastName("Now");
$user->attributes->setEmail("chulin@chulin.com");
$user->attributes->setEmailAlternative("probando@ando.com");
$user->attributes->setPassword("12345678");
$user->attributes->setPasswordConfirm("12345678");
$user->attributes->setCompany("OWL DESARROLLOS");
$result = $user->save();
```

#### Edit user

```php
$user = new User();
$id = 123;
$user->attributes->setId($id);// this says if is new register or edit 
$user->attributes->setName("Testing");
$user->attributes->setLastName("Now");
$user->attributes->setEmail("chulin@chulin.com");
$user->attributes->setEmailAlternative("probando@ando.com");
$user->attributes->setPassword("12345678");
$user->attributes->setPasswordConfirm("12345678");
$user->attributes->setCompany("OWL DESARROLLOS");
$result = $user->save();
```

#### Delete user

```php
$user = new User();
$id = 123;
$user->attributes->setId($id);// this says if is new register or edit 
$result = $user->drop();
```

#### Restore user

```php
$user = new User();
$id = 123;
$user->attributes->setId($id);
$user->attributes->setRestoreThis(true); // this restore
$user->attributes->setName("Testing");
$user->attributes->setLastName("Now");
$user->attributes->setEmail("chulin@chulin.com");
$user->attributes->setEmailAlternative("probando@ando.com");
$user->attributes->setPassword("12345678");
$user->attributes->setPasswordConfirm("12345678");
$user->attributes->setCompany("OWL DESARROLLOS");
$result = $user->save();
```

__Created by danidoble__