<?php

namespace RubyNight\Controllers;

use RubyNight\Kernel\Router\Router;
use RubyNight\Kernel\Helpers\Config;
use RubyNight\Kernel\Http\Controller;

class IndexController extends Controller
{

    /**
     * Index function
     *
     * @return void
     */
    public static function index()
    {
        Router::view('welcome', ['version' => Config::get('APP_VERSION')]);
    }
}
