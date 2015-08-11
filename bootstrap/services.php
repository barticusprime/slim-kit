<?php

/**
 * Here you can register all of your services
 * into the Slim container.
 */

$app->container->singleton('db', function() {
    return new Illuminate\Database\Capsule\Manager;
});
