<?php

return [

    // Enable or disable partialcache alltogether
    'cache_store' => env('PARTIAL_CACHE_ENABLED', true),

    // The name of the blade directive to register
    'directive' => env('PARTIAL_CACHE_DIRECTIVE', 'cache'),

    // The base key that used for cache items
    'key' => env('PARTIAL_CACHE_KEY', 'partialcache'),

    // The default cache duration in minutes, set null to remember forever
    'key' => env('PARTIAL_CACHE_DEFAULT_DURATION', 'default_duration'),

    // The cache store that should be used to store requests
    'cache_store' => env('PARTIAL_CACHE_DRIVER', 'file'),

];
