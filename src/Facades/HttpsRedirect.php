<?php

namespace Aventure\HttpsRedirect\Facades;

use Aventure\HttpsRedirect\HttpsRedirectService;
use Illuminate\Support\Facades\Facade;

class HttpsRedirect extends Facade
{
    protected static function getFacadeAccessor()
    {
        return HttpsRedirectService::class;
    }
}
