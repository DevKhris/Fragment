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

use RubyNight\Application;
use RubyNight\Libs\Logging;
use RubyNight\Kernel\Helpers\Debug;

/*
|--------------------------------------------------------------------------
| Autoload
|--------------------------------------------------------------------------
 */

require_once __DIR__ . '/../vendor/autoload.php';

// Create new app instance
$app = new Application(__DIR__);

// Define base path with config helper
define('BASE_PATH', $app->config::get('BASE_PATH'));

/*
|--------------------------------------------------------------------------
| logging and Debug
|--------------------------------------------------------------------------
 */
Logging::enableSysLogs();
$logger = Logging::get();

// Debug application
// if ($_ENV['APP_DEBUG'] == "true") {
//     $debug = new Debug($app);
//     $debug->print();
// }

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
 */
require BASE_PATH . '/routes/main.php';
require BASE_PATH . '/routes/api.php';

$app->run();