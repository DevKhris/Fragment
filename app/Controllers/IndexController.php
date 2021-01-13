<?php

namespace RubyNight\Controllers;

use RubyNight\Kernel\Http\Controller;
use RubyNight\Kernel\Router\Router;

class IndexController extends Controller
{
    public static function index()
    {
        Router::view('welcome', ['version' => VERSION]);
    }
}