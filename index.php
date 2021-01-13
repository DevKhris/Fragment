<?php

// require the psr-4 autoloader
require_once __DIR__ . '/vendor/autoload.php';

use RubyNight\Application;
// create new app instance
$app = new Application(__DIR__);

// require
require_once __DIR__ . '/config/app.config.php';
require_once __DIR__ . '/routes/main.php';