<?php

return [

    /*
     * The view id of which you want to display data.
     */
    'view_id' => '64387306',

    /*
     * Path to the client secret json file. Take a look at the README of this package
     * to learn how to get this file.
     */
    'service_account_credentials_json' => app_path('laravel-google-analytics/service-account-credentials.json'),

    /*
     * The amount of minutes the Google API responses will be cached.
     * If you set this to zero, the responses won't be cached at all.
     */
    'cache_lifetime_in_minutes' => 60 * 24,

    /*
     * The directory where the underlying Google_Client will store it's cache files.
     */
    'cache_location' => storage_path('app/laravel-google-analytics/google-cache/'),

];
