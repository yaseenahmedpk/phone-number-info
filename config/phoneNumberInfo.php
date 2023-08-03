<?php

return [

    /*
    |--------------------------------------------------------------------------
    | hlrlookup api key and api secret
    |--------------------------------------------------------------------------
    |
    | This value is the api key and api secret of your hlrlookup.com account, this value will use to request
    | The data of your requested number, make sure to create account on hlrlookup.com to get
    | Unlimited request you need to create premium account
    |
     */

    'api-key' => env('API_KEY', ''),
    'api-secret' => env('API_SECRET', ''),
];
