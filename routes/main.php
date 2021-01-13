<?php
use Phug\Phug;
use RubyNight\Application;
use RubyNight\Controllers\IndexController;

/**
 * Here goes the routes for the RubyNight routing
 *
 */

// Routes to home view
$app->route->get('/', [IndexController::class, 'index']);

// this works with warnings
$app->route->get('docs', function () {
    Phug::display('h1 Welcome');
});

// execute the app
return $app->execute();