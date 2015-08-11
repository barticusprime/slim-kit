<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$config = getconfig('database');

$capsule->addConnection([
    $config['connections'][$config['default']]
]);

$capsule->bootEloquent();
