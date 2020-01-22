<?php

return [
    'default' => env('PDF_DRIVER', 'log'),

    'drivers' => [
        'compose' => [
            // This is a good way to have some user-land way if we decide to change
            // APIs either through versioning or just breaking changes while still
            // early in development.
            'url' => 'https://compose.artisan.studio',

            // This will be passed through as a header via X-Compose-Project-Token.
            'token' => env('COMPOSE_TOKEN'),
        ],
    ],
];