<?php

return [
    'default' => env('PDF_DRIVER', 'log'),

    'drivers' => [
        'compose' => [
            'token' => env('COMPOSE_TOKEN'),
        ],
    ],
];