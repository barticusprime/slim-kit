<?php

use Slim\Views\Twig;
use Slim\Views\TwigExtension;

$view = $app->view(new Twig());

$view->setTemplatesDirectory(VIEWS_PATH);

$config = getconfig('template');

$view->parserOptions = [
    'debug' => $config['debug']
];

$view->parserExtensions = [
    new TwigExtension
];
