# Laravel https redirect


[![Build Status](https://travis-ci.org/log-engine/laravel-https-redirect.svg?branch=master)](https://travis-ci.org/log-engine/laravel-https-redirect)
[![Latest Stable Version](https://poser.pugx.org/log-engine/laravel-https-redirect/v/stable)](https://packagist.org/packages/log-engine/laravel-https-redirect)
[![Total Downloads](https://poser.pugx.org/log-engine/laravel-https-redirect/downloads)](https://packagist.org/packages/log-engine/laravel-https-redirect)
[![License](https://poser.pugx.org/log-engine/laravel-https-redirect/license)](https://packagist.org/packages/log-engine/laravel-https-redirect)

- **Author:** Valerio Barbera - [support@logengine.dev](mailto:support@logengine.dev)
- **Author Website:** [www.logengine.dev](target="_blank":https://www.logengine.dev) 


Flexible https redirect for Laravel based applications


## Install
``` composer require log-engine/laravel-https-redirect ```

## Config
``` php artisan vendor:publish --provider="LogEngine\HttpsRedirect\HttpsRedirectServiceProvider" ```

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

Or you can force all possible environment using wildcard:
```php
return [
    'environments' => '*'
]
```

## Use
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
        
        \LogEngine\HttpsRedirect\Middleware\HttpsCheck::class,
    ];
    
    ...
```

## Use as Route-Middleware
In alternative you can add middleware as named middleware in your Kernel file:

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
    protected $routeMiddleware  = [
        ...,
        
        'https_redirect' => \LogEngine\HttpsRedirect\Middleware\HttpsCheck::class,
    ];
    
    ...
```
And use it programmatically in your routes configuration:

```php
Route::middleware('https_redirect')->group(function(){

    Route::view('example', 'example');
    
});
```


# LICENSE
This package are licensed under the [MIT](LICENSE) license.
