<?php

namespace RubyNight;

use RubyNight\Libs\Logger;
use RubyNight\Libs\Database;
use RubyNight\Kernel\Http\Request;
use RubyNight\Kernel\Http\Response;
use RubyNight\Kernel\Router\Router;
use RubyNight\Kernel\Http\Controller;

/**
 * Application class
 * 
 * @category Framework
 * @package  RubyNight;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */
class Application
{
    public static string $path;
    public static Application $app;
    public Database $db;
    public ?Controller $controller = null;
    public Request $req;
    public Response $res;
    public Router $route;
    public Logger $log;

    /**
     *  Contructor function
     *
     * @param string $path app path
     * 
     * @return void
     */
    public function __construct($path)
    {
        // declare this as app instance 
        self::$app = $this;
        // application path
        self::$path = $path;
        // new request instance
        $this->req = new Request();
        // new response instance
        $this->res = new Response();
        // new router instance
        $this->route = new Router($this->req, $this->res);
        // new Logger instance
        $this->log = Logger::get();
        // new Eloquent Database instance
        $this->db = new Database();
        // return instance
        return $this;
    }

    /**
     * Execute callback resolve
     *
     * @return $this executes callback from request
     */
    public function run()
    {
        // returns resolve
        return $this->route->resolve();
    }

    /**
     * Undocumented function
     *
     * @param string $event
     * 
     * @return void
     */
    public function doEvent($event)
    {
        $callbacks = $this->eventListener[$event] ?? [];
        foreach ($callbacks as $cb) {
            call_user_func($cb);
        }
    }

    /**
     * Undocumented function
     *
     * @param string $event
     * @param string $callback
     * 
     * @return void
     */
    public function on($event, $callback)
    {
        $this->eventListeners[$event][] = $callback;
    }
}