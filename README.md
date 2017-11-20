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

Or you can force all passible environment using wildcard:
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
        
        \AventureCloud\ForceHttps\Middleware\Https::class,
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
        
        'force_https' => \AventureCloud\ForceHttps\Middleware\Https::class,
    ];
    
    ...
```
And use it programmatically in your routes configuration:

```php
Route::middleware('force_https')->group(function(){

    Route::view('example', 'example');
    
});
```


# LICENSE
This package are licensed under the [MIT](LICENSE) license.