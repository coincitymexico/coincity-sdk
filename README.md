# Coin City SDK

## Configure yours credentials

```php
$token = "your token for sdk" 
$sdk = new Configuration();

// Set your token
$sdk->setToken($token);

// Disable SSL/HTTPS only for local use
$sdk->setSsl(false);

// Custom your website base endpoint 
$sdk->setWebsite("https://localhost/coincity/dash/api");
```

## Available Models at the moment

```php
use \Coincity\SDK\Fun; 

Fun\User::class;
Fun\Search::class;
Fun\SearchCookie::class;
Fun\Stock::class;
Fun\StockSync::class;
Fun\StockMovement::class;
Fun\Category::class;
Fun\SubCategory::class;
Fun\SubCategoryMachine::class;
Fun\Brands::class;
Fun\Model::class;

// ... wait for more
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
$user->attributes->setId($id); 
$result = $user->drop();
```

#### Restore user

```php
$user = new User();
$id = 123;
$user->attributes->setId($id);
$user->attributes->setRestoreThis(true); // this restore
$result = $user->save();
```

## Stock

```php
$stock = new StockSync();
$stock->attributes->setCveSae("PROBANDO ANDO");
$stock->attributes->setDown(1);
$stock = $stock->save();
```

My GitHub [danidoble](https://github.com/danidoble)

__Created by danidoble__