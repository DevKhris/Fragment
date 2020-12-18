<?php

// require the psr-4 autoloader
require_once __DIR__ . '/vendor/autoload.php';

use RubyNight\Application;
use RubyNight\Kernel\Http\Request;
use RubyNight\Kernel\Http\Response;
// create new app instance
$app = new Application(__DIR__);

// Routes to home view
$app->router->get('/', function () {
	return Application::$app->router->renderView('welcome');
});

// execute the app
$app->execute();