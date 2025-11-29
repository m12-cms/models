# M12 CMS Models Package

Reusable Eloquent model package for the M12 CMS ecosystem.  
This package centralizes domain models, ensuring consistency across the admin panel, public website, and additional services.

## Features

- Shared Eloquent models
- Lightweight Laravel service provider
- PSR-4 autoloading
- Apache License 2.0

## Installation

Add to your application's composer.json:

```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/m12-cms/models"
    }
]
```

Then:

```
composer require m12-cms/models
```


## Usage

```php
use M12\Models\Models\Page;
```

## License

Apache License 2.0.
