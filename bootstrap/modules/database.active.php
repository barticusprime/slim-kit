<?php

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Create a new Capsule to handle the Illuminate
 * Database package.
 *
 * @var Illuminate\Database\Capsule\Manager
 */
$capsule = new Capsule;

/**
 * Gets the configuration from the database
 * configuration file.
 *
 * @var array
 */
$config = getconfig('database');

/**
 * Sets the PDO Fetch Mode.
 */
$capsule->setFetchMode($config['fetch']);

/**
 * Adds the configuration of the default
 * driver setting.
 */
$capsule->addConnection(
    $config['connections'][$config['default']]
);

/**
 * Set the Capsule as a global to allow
 * the usage of static methods.
 */
$capsule->setAsGlobal();

/**
 * Booting Eloquent. Enjoy.
 */
$capsule->bootEloquent();

/**
 * Binds the Capsule to the Slim Container,
 * allowing the user to resolve it later.
 */
$app->container->singleton('db', function() use ($capsule) {
    return $capsule->getConnection();
});
