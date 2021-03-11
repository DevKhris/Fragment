<?php

use Laminas\Diactoros\Request;
use Illuminate\Support\Facades\Response;

/**
 * API routes 
 *
 * @category Framework
 * @package  RubyNight;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */


/*
|--------------------------------------------------------------------------
| API routes 
|--------------------------------------------------------------------------
 */

$app->router->get('/post/([0-9])*)', function (Request $req, Response $res) {
});