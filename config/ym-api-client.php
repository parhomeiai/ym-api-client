<?php

return [
    'api_key' => env('YM_API_KEY'),

    'base_url' => 'https://api.partner.market.yandex.ru',

    'http' => [
        'timeout' => 10,
        'retry' => [
            'times' => 3,
            'sleep_ms' => 300,
        ],
    ],
];

