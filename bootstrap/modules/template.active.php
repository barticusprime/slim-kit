<?php

use Slim\Views\Twig;
use Slim\Views\TwigExtension;

/**
 * Register the Twig package in the Slim
 * configuration.
 *
 * @var Slim\Views\Twig
 */
$view = $app->view(new Twig());

/**
 * Set the template directory where all of
 * the views are going to be resolved.
 */
$view->setTemplatesDirectory(VIEWS_PATH);

/**
 * Gets the configuration from the database
 * configuration file.
 *
 * @var array
 */
$config = getconfig('template');

/**
 * Configurates the parser options.
 *
 * @var array
 */
$view->parserOptions = [
    'debug' => $config['debug']
];

/**
 * Configurates the parser extensions.
 * @var array
 */
$view->parserExtensions = [
    new TwigExtension
];
