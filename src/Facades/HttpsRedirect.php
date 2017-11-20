<?php

namespace AventureCloud\HttpsRedirect\Facades;

use Illuminate\Support\Facades\Facade;

class HttpsRedirect extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'HttpsRedirect';
    }
}
