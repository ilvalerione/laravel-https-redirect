<?php

namespace AventureCloud\HttpsRedirect;

use Illuminate\Support\ServiceProvider;

/**
 * Class UserVerifyServiceProvider
 * 
 * @package AventureCloud\UserVerify
 */
class HttpsRedirectServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // config
        $this->publishes([
            __DIR__ . '/../config/https_redirect.php' => config_path('https_redirect.php')
        ], 'config');
    }
	
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // configurations
        $this->mergeConfigFrom(
            __DIR__ . '/../config/https_redirect.php', 'https_redirect'
        );

        //Bind service in IoC container
        $this->app->singleton('HttpsRedirect', function($app){
            return new HttpsRedirectService(config('https_redirect'));
        });
    }
}
