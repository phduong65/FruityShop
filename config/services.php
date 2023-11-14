<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '697160092374422',  //client face của bạn
        'client_secret' => 'd0c7dc23be72aaf24cd71fe7cba9f050',  //client app service face của bạn
        'redirect' => 'https://127.0.0.1:8000/auth/facebook/callback', //callback trả về
    ],
    'google' => [
        'client_id' => '277983015690-15a03vfso7vpq09bu33nfsehkbs205s6.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://127.0.0.1:8000/auth/google/callback' ,
        // 'http://localhost:8000/login/google/callback'
    ],
];
