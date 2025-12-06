# 📦 M12 CMS — Models Package

**Reusable Eloquent models shared across the M12 CMS ecosystem.**

This package provides the core `User` model, factories, and migrations used by both **Admin Panel** and **Frontend** applications.  
It is framework-agnostic inside the Laravel ecosystem and automatically integrates with your application through service providers.

## 🚀 Installation

Require the package via Composer:

```bash
composer require m12-cms/models
```

Laravel will automatically register the package thanks to auto-discovery.

## 📚 Features

- Reusable `User` model compatible with Laravel 12  
- Built-in **Soft Deletes**, API tokens, notifications  
- Fully compatible with:
  - **Filament 4** (optional)  
  - **Laravel Sanctum**  
- Packaged **migrations**  
- Packaged **model factory**  
- Testbench-ready test suite  
- SQLite-ready for CI  

## 🧩 Included Components

### User Model

```
src/Models/User.php
```

### Factories

```
database/factories/UserFactory.php
```

### Migrations

```
database/migrations/
```

## 🧪 Testing

```
vendor/bin/phpunit --testdox
```

## 📦 Releasing a Version

```
git tag -a v0.x.x -m "Release"
git push --tags
```

## 📜 License

Apache-2.0
