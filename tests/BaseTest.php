<?php

namespace Tests;

use AventureCloud\HttpsRedirect\Facades\HttpsRedirect;
use AventureCloud\HttpsRedirect\HttpsRedirectService;
use AventureCloud\HttpsRedirect\HttpsRedirectServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class BaseTest extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [HttpsRedirectServiceProvider::class];
    }
}