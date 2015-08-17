<?php

/**
 * Here is where you can define all of your
 * application routes.
 *
 * You can also create partials to organize
 * your routes and require them in this
 * file.
 */

$app->get('/', function() use ($app) {
    view('welcome', ['message' => 'lim 2: Starter Kit']);
});
