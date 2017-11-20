# Laravel Force https
Flexible https redirect for Laravel based applications

## Install
``` composer require aventure-cloud/laravel-force-https ```

## Config
``` php artisan vendor:publish --provider="AventureCloud\ForceHttps\HttpsServiceProvider" ```

This command publish a new configuration file in your `config` directory
to list all environment names that you want force to https:
```php
return [
    'environments' => [
        // 'local', <-- usually no
        'development',
        'test',
        'production',
    ]
]
```


## Integrate
Add `HttpsMiddleware` middleware in your global middleware section:

```php

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        ...,
        
        \AventureCloud\ForceHttps\Middleware\Https::class,
    ];
    
    ...
```

# LICENSE
This package are licensed under the [MIT](LICENSE) license.