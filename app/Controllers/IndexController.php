<?php

namespace RubyNight\Controllers;

use Phug\Phug;
use RubyNight\Kernel\Router\Router;

class IndexController
{
    public static function index()
    {
        Router::view('welcome', ['version' => VERSION]);
    }
}
