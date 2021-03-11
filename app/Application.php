<?php

namespace RubyNight;

use Bramus\Router\Router;
use RubyNight\Libs\Logger;
use RubyNight\Libs\Database;
use RubyNight\Kernel\Helpers\ConfigHandler as Config;
use RubyNight\Kernel\Http\Controller;
use Laminas\Diactoros\ServerRequestFactory;

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
        // new router instance
        $this->router = new Router;
        // Create a server request object
        $this->request = ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );
        // new Logger instance
        $this->log = Logger::get();
        // new Eloquent Database instance
        $this->database = new Database;
        // Create a config handler object
        $this->config = new Config;
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
        $this->router->run();
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