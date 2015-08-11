<?php

$app->get('/', function() use ($app) {
    view('welcome', ['message' => 'Slim 2: Starter Kit']);
});
