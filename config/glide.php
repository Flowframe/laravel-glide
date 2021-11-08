<?php

return [
    /*
     * The Laravel Glide server config, the `response`, `source` and `cache` have already been configured to work with Laravel out of the box.
     *
     * https://glide.thephpleague.com/2.0/config/setup/
     */
    'server_config' => [
        // ...

        'base_url' => 'glide',
    ],

    /**
     * Key used to sign the URL
     */
    'sign_key' => env('GLIDE_SIGN_KEY'),

    /**
     * Available responsive image sizes
     */
    'sizes' => [480, 640, 750, 828, 1080, 1200, 1920, 2048, 3840],
];
