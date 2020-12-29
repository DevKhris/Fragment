<?php

/**
 * Class MainController for handling rendering and callbacks
 *
 * @package RubyNight;
 *
 * @author Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 */

namespace RubyNight;

use RubyNight\Kernel\Router\Router;
use RubyNight\Kernel\Http\Response;
use RubyNight\Kernel\Http\Request;

class Application
{
    public static string $appPath;
    public static Application $app;
    /**
     *  Contructor function
     *
     * @param string $path app path
     *
     * @return $this
     *
     */
    public function __construct($path)
    {
        // self instance and application path
        self::$app = $this;
        $this->$path = $path;
        // new request instance
        $this->req = new Request();
        // new response instance
        $this->res = new Response();
        // new router instance
        $this->router = new Router($this->req, $this->res);
        return $this;
    }

    /**
     * Execute callback resolve
     *
     * @return $this executes callback from request
     */
    public function execute()
    {
        // returns resolve
        return $this->router->resolve();
    }
}
