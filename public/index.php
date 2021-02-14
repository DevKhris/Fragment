<?php

/**
 * Front Controller 
 *
 * @category Framework
 * @package  RubyNight\Kernel\Http;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */

namespace RubyNight;

/*
|--------------------------------------------------------------------------
| Autoload
|--------------------------------------------------------------------------
 */

require_once __DIR__ . '/../vendor/autoload.php';

use RubyNight\Application;
use RubyNight\Libs\Logger;
use RubyNight\Kernel\Helpers\Debug;
use RubyNight\Kernel\Helpers\Config;

// Enable Logger and Get Instance
Logger::enableSysLogs();
$log = Logger::get();

// Define base path with config helper
define('BASE_PATH', Config::get('BASE_PATH'));

// Create new app instance
$app = new Application(__DIR__);

// Debug application
if ($_ENV['APP_DEBUG'] == "true") {
    $debug = new Debug($app);
    $debug->print();
}
// Require routes below
require BASE_PATH . '/routes/main.php';
require BASE_PATH . '/routes/api.php';

$app->run();
