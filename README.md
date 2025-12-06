# M12 CMS – Models Package

A reusable Eloquent models package for the M12 CMS platform.  
This package provides a standalone `User` model implementation based on Laravel 12, including migrations, factories, Sanctum API token support, and integration with modern Laravel development practices.

---

## Features

- Fully independent `User` model (`M12\Models\User`)
- Laravel Sanctum API token support
- Soft deletes support
- Dedicated migration for the `users` table
- User factory for testing and seeding
- PSR-4 autoloading for package development
- Compatible with Orchestra Testbench for isolated testing
- Apache 2.0 licensed

---

## Requirements

- PHP **8.2+**
- Laravel **12.x**
- Laravel Sanctum **4.x**

---

## Installation

Install the package via Composer:

```bash
composer require m12-cms/models
```

The service provider is auto-discovered by Laravel.

---

## Migrations

By default, the package loads its own migrations automatically.

If you want to publish the migrations into your application, run:

```bash
php artisan vendor:publish --tag=m12-models-migrations
```

This will copy all package migrations to:

```
database/migrations/
```

---

## Usage

You may use the `User` model provided by this package as the primary authentication model of your application.

### Example:

```php
use M12\Models\User;

$user = User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => 'secret123',
]);
```

### API Token Generation (Sanctum)

```php
$token = $user->createToken('api')->plainTextToken;
```

---

## Testing

This package includes a full Testbench setup.

To run tests:

```bash
vendor/bin/phpunit
```

### Testbench Notes

- Sanctum migrations are loaded automatically.
- Package migrations are executed using the Testbench migration loader.
- SQLite in-memory database is used for isolation.

---

## Development

Install dependencies:

```bash
composer install
```

Run code quality tools:

```bash
composer pint
composer analyse
```

---

## Changelog

All notable changes will be documented in release tags.

---

## Versioning

This package follows Semantic Versioning (https://semver.org/).

---

## License

This package is open-source software licensed under the **Apache License 2.0**.
