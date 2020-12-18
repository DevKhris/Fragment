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
    public Router $router;
    public Request $req;
    public Response $res;
    public static Application $app;
    /**
     * [contructor function]
     * 
     * 
     * @param [path] $appPath 
     */
    public function __construct($appPath)
    {
        // self instance and application path
        self::$app = $this;
        self::$appPath = $appPath;
        // new request instance
        $this->req = new Request();
        // new response instance
        $this->res = new Response();
        // new router instance
        $this->router = new Router($this->req, $this->res);
    }

    /**
     * [execute resolves callback]
     * @return [callback] [executes callback from request]
     */
    public function execute()
    {
        // returns resolve
        echo $this->router->resolve();
    }
}