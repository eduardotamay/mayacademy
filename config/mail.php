<?php

return [
    'driver' => env('MAIL_DRIVER', 'smtp'),

    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
    // 'host' => env('MAIL_HOST', 'smtp.gmail.com'),

    'port' => env('MAIL_PORT', 587),

    'from' => [
        // 'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        // 'name' => env('MAIL_FROM_NAME', 'Example'),
        'address' => env('MAIL_FROM_ADDRESS', 'kaambaltic@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'MAYACADEMY'),
    ],

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'username' => env('MAIL_USERNAME'),
    // 'username' => env('kaambaltic@gmail.com'),
    'password' => env('MAIL_PASSWORD'),
    // 'password' => env('3du4rd0t4m4y'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

    'log_channel' => env('MAIL_LOG_CHANNEL'),
];
