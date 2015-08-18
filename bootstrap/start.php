<?php

use Slim\Slim;

session_cache_limiter(false);
session_start();

/**
 * Defines paths to directories.
 */
define('ROOT_PATH'  , __DIR__.'/../');
define('CONFIG_PATH', ROOT_PATH . 'bootstrap/config/');
define('MODULES_PATH', ROOT_PATH . 'bootstrap/modules/');
define('APP_PATH'   , ROOT_PATH . 'app/');
define('RESOURCES_PATH', ROOT_PATH . 'resources/');
define('VIEWS_PATH', RESOURCES_PATH . 'views/');
define('PUBLIC_PATH', ROOT_PATH . 'public/');
define('ASSETS_PATH', PUBLIC_PATH . 'assets/');

/**
 * Require the Starter Kit helpers first,
 * to avoid overrides.
 */
require_once 'helpers.php';

/**
 * Register the Composer autoloader.
 */
require_once ROOT_PATH . 'vendor/autoload.php';

/**
 * Load the enviroment variables if we're on
 * a development enviroment.
 *
 * Production enviroments should be set by
 * your hosts configuration to prevent the
 * loading of the .env files on each
 * request.
 */
if (env('SLIM_MODE', 'development') === 'development') {
    (new Dotenv\Dotenv(ROOT_PATH))->load();
}

/**
 * Create a new Slim application.
 *
 * @var Slim
 */
$app = new Slim(getconfig('slim'));

/**
 * Set the name of the Slim application.
 */
$app->setName($app->config('name'));

/**
 * Load all the active modules.
 */
$modules = glob(MODULES_PATH . '*.active.php');

foreach ($modules as $module) {
    require_once $module;
}

/**
 * Handle the application services.
 */
require_once 'services.php';

/**
 * Handle the application middleware.
 */
require_once 'middleware.php';

/**
 * Handle the application routes.
 */
require_once APP_PATH . 'routes.php';
