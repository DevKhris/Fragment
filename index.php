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

// require the psr-4 autoloader
require_once __DIR__ . '/vendor/autoload.php';

use RubyNight\Application;
// require config
require_once __DIR__ . '/config/app.config.php';

// create new app instance
$app = new Application(__DIR__);

require_once BASE_PATH . '/routes/main.php';
