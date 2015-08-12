<?php

return [
    'name' => env('SLIM_NAME', 'default'),
    'mode' => env('SLIM_MODE', 'development'),
    'debug' => env('SLIM_DEBUG', true),
    'templates.path' => VIEWS_PATH,

    'log.enabled' => env('SLIM_LOG', true),

    'cookies.encrypt' => true,
    'cookies.lifetime' => '20 minutes',
    'cookies.path' => '/',
    'cookies.domain' => null,
    'cookies.secure' => false,
    'cookies.httponly' => false,
    'cookies.secret_key' => env('COOKIES_SECRET', 'secret'),
    'cookies.cipher' => MCRYPT_RIJNDAEL_256,
    'cookies.cipher_mode' => MCRYPT_MODE_CBC,
    'http.version' => '1.1',
];
