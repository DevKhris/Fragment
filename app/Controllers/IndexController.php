<?php

namespace RubyNight\Controllers;

use RubyNight\Kernel\Helpers\ConfigHandler as Config;
use RubyNight\Kernel\Http\Controller;

class IndexController extends Controller
{

    /**
     * Index function
     *
     * @return void
     */
    public function index()
    {
        $version = Config::get('APP_VERSION');
        $this->view('welcome', compact('version'));
    }
}