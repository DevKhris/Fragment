<?php

use RubyNight\Application;
use RubyNight\Controllers\IndexController;

// Routes to home view
$app->router->get('/', [IndexController::class, 'index']);

// Routes to home view
$app->router->get('docs', function () {
    return 'Getting Started with RubyNight';
});

// execute the app
return $app->execute();
