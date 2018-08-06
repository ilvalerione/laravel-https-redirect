<?php

namespace AventureCloud\HttpsRedirect\Facades;

use AventureCloud\HttpsRedirect\HttpsRedirectService;
use Illuminate\Support\Facades\Facade;

class HttpsRedirect extends Facade
{
    protected static function getFacadeAccessor()
    {
        return HttpsRedirectService::class;
    }
}
