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
use Phug\Phug;
use RubyNight\Controllers\IndexController;

//
// Here goes the routes for the RubyNight routing
//

// Routes to home view
$app->route->get('/', [IndexController::class, 'index']);

// this works with warnings
$app->route->get('/docs', Phug::display('h1 RubyNight Docs'));

// execute the app
$app->execute();