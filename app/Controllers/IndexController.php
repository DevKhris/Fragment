<?php

namespace RubyNight\Controllers;

use Phug\Phug;

class IndexController
{
    public static function index()
    {
        Phug::display('
        	<img src="/public/img/logo.png" alt="RubyNight Logo">
        	h1 Welcome to RubyNight
        	h2 This is a rendering example with pug
        	');
    }
}
