<?php

use Phug\Phug;
use RubyNight\Application;
use RubyNight\Controllers\IndexController;

// Routes to home view
$app->router->get('/', [IndexController::class, 'index']);

$app->router->get('/docs', function () {
    echo 'test';
});
// execute the app
return $app->execute();
