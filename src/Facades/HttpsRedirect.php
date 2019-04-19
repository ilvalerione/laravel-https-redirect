<?php

namespace LogEngine\HttpsRedirect\Facades;

use LogEngine\HttpsRedirect\HttpsRedirectService;
use Illuminate\Support\Facades\Facade;

class HttpsRedirect extends Facade
{
    protected static function getFacadeAccessor()
    {
        return HttpsRedirectService::class;
    }
}
