<?php

namespace AventureCloud\ForceHttps\Facades;

use Illuminate\Support\Facades\Facade;

class HttpsService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'HttpsService';
    }
}
