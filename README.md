# This is my package laravel-ownable-model

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kehet/laravel-ownable-model.svg?style=flat-square)](https://packagist.org/packages/kehet/laravel-ownable-model)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/kehet/laravel-ownable-model/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/kehet/laravel-ownable-model/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/kehet/laravel-ownable-model/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/kehet/laravel-ownable-model/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kehet/laravel-ownable-model.svg?style=flat-square)](https://packagist.org/packages/kehet/laravel-ownable-model)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require kehet/laravel-ownable-model
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-ownable-model-config"
```

This is the contents of the published config file:

```php
return [
    'owner' => \App\Models\User::class,
];
```

## Usage

### Prepare owner modal

```php
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kehet\LaravelOwnableModel\Contracts\OwnerContract;

class User extends Authenticatable implements OwnerContract
{
    // ...
}
```

### Prepare ownable modal

```php
use Illuminate\Database\Eloquent\Model;
use Kehet\LaravelOwnableModel\Contracts\OwnableContract;
use Kehet\LaravelOwnableModel\Traits\HasOwner;

class Comment extends Model implements OwnableContract
{
    use HasOwner;
    
    // ...
}
```

and add following migration

```php
Schema::table('comments', function (Blueprint $table) {
    $table->integer('owned_by_id')->unsigned();
    $table->index('owned_by_id');
});
```

### Available methods for ownable modal

#### Regular Eloquent relation is available
```php
$comment->owner()
$comment->owner
```

#### Check if (not) owned by user
```php
$comment->isOwnedBy($user)
$comment->isNotOwnedBy($user)
```

#### Query modals (not) owned by user
```php
Comment::whereOwnedBy($user);
Comment::whereNotOwnedBy($user);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Kehet](https://github.com/Kehet)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
