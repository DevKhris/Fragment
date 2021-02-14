<?php

/**
 * API routes 
 *
 * @category Framework
 * @package  RubyNight;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */

use RubyNight\Kernel\Http\Request;
use RubyNight\Kernel\Http\Response;

/*
|--------------------------------------------------------------------------
| API routes 
|--------------------------------------------------------------------------
 */

$app->route->get('/post/([0-9])*)', function (Request $req, Response $res) {
    var_dump($res->JSON([
        'post' => ['id' => $req->params[0]],
        'status' => '200'
    ]));
    $res->setStatus(200);
});
