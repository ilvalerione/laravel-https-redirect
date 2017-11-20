<?php

return [

    /*
    |--------------------------------------------------------------------------
    | HTTPS environments
    |--------------------------------------------------------------------------
    |
    | List here all APP_ENV that you want force redirect to https connection.
    |
    | supported:
    |   - '*' (star to always redirect)
    |   - ['production'] (array of environment names)
    |
    */

    //'environments' => '*'
    'environments' => [
        // 'local', <-- usually no
        'development',
        'test',
        'production',
    ]

];