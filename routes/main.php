<?php

/**
 * Main routes 
 *
 * @category Framework
 * @package  RubyNight;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */

use RubyNight\Kernel\Router\Router;
use RubyNight\Controllers\IndexController;

//
// Here goes the routes for the RubyNight routing
//

// Routes to index view
$app->route::get('/', [IndexController::class, 'index']);
$app->route::get('/docs', [IndexController::class, 'index']);
