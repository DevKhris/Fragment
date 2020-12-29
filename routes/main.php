<?php


use RubyNight\Application;
use RubyNight\Controllers\IndexController;

/**
 * Here goes the routes for the RubyNight routing
 *
 */

// Routes to home view
$app->router->get('/', [IndexController::class, 'index']);

// execute the app
return $app->execute();
