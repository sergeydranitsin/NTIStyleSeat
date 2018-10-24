<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
	   'client_id' => '508529476278542', // App ID
	   'client_secret' => '6fc397fd7178b69ae60b355fbaee27dd', // App Secret
	   'redirect' => 'http://localhost:8000/register_clientSN/facebook', //Ссылка на перенаправление при удачной авторизации
    ],
    'vkontakte' => [
	   'client_id' => '6726349', // App ID
	   'client_secret' => '9T2ps5zmlMIlCkczSV6A', // App Secret
	   'redirect' => 'http://localhost:8000/register_clientSN/vkontakte', //Ссылка на перенаправление при удачной авторизации
    ],

];
