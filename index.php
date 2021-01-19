<?php

namespace RubyNight;
// require the psr-4 autoloader
require_once __DIR__ . '/vendor/autoload.php';

use RubyNight\Application;
use RubyNight\Libs\Logger;
use RubyNight\Kernel\Helpers\Debug;
use RubyNight\Kernel\Helpers\Config;

Logger::enableSysLogs();
$log = Logger::get();

// Define base path with config helper
define('BASE_PATH', Config::get('BASE_PATH', ''));

// create new app instance
$app = new Application(__DIR__);

// Debug application
$debug = new Debug($app);
$debug->print();

// Require routes below
require_once BASE_PATH . 'routes/main.php';
