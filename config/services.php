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

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),//env('GOOGLE_CLIENT_ID','109580248822-v94gdo22qukg309ssgc26uupe8usds0n.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),//env('GOOGLE_CLIENT_SECRET','ieGuoDFGgEul0C7uyNoF9jm6'),
        'redirect' =>  env('GOOGLE_URL')//'http://smartskills.tn/STM_/google/callback',
    ],


];