<?php

namespace AventureCloud\ForceHttps;

use Illuminate\Support\ServiceProvider;

/**
 * Class UserVerifyServiceProvider
 * 
 * @package AventureCloud\UserVerify
 */
class HttpsServiceProvider extends ServiceProvider
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
            __DIR__ . '/../config/force_https.php' => config_path('force_https.php')
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
            __DIR__ . '/../config/force_https.php', 'force_https'
        );

        //Bind service in IoC container
        $this->app->singleton('HttpsService', function($app){
            return new HttpsService(config('force_https'));
        });
    }
}
