<?php


use RubyNight\Application;
use RubyNight\Controllers\IndexController;

/**
 * Here goes the routes for the RubyNight routing
 *
 */

// Routes to home view
$app->router->get('/', [IndexController::class, 'index']);

$app->router->get('/docs', function () {
    echo 'Test';
});

// execute the app
return $app->execute();
