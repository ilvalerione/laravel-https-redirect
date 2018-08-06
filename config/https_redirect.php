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
    |   - ['qa', 'production'] (array of environment names)
    |
    */

    'environments' => [
        // 'local', <-- usually no
        'qa',
        'production',
    ]

];