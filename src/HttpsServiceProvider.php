<?php

namespace AventureCloud\UserVerify;

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
    }
}
