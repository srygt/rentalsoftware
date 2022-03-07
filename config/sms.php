<?php

return [
    'active_gateway' => env(
        'ACTIVE_SMS_GATEWAY',
        \App\Services\Sms\Gateways\TurkcellSms\TurkcellSmsGatewayService::class
    ),
    'log' => [
        'path' => 'logs/sms/',
    ],
    'vizyonmesaj' => [
        'username' => env('VIZYONMESAJ_USERNAME'),
        'password' => env('VIZYONMESAJ_PASSWORD'),
        'origin' => env('VIZYONMESAJ_ORIGIN'),
    ],
    'turkcell' => [
        'username' => env('TURKCELL_USERNAME'),
        'password' => env('TURKCELL_PASSWORD'),
        'origin' => env('TURKCELL_ORIGIN'),
    ],
    'telsam' => [
        'username' => env('TELSAM_USERNAME'),
        'password' => env('TELSAM_PASSWORD'),
        'origin' => env('TELSAM_ORIGIN'),
    ],
];
