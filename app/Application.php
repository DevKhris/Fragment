<?php

namespace RubyNight;

use Whoops\Run as Whoops;
use Bramus\Router\Router;
use RubyNight\Libs\Logging;
use RubyNight\Libs\Database;
use RubyNight\Kernel\Helpers\Config;
use RubyNight\Kernel\Http\Controller;
use Laminas\Diactoros\ServerRequestFactory;
use Monolog\Logger;

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
    private static string $path;
    private static Application $app;
    private Database $database;
    private Router $route;
    private Logger $logger;
    private Whoops $eh;
    /**
     *  Contructor function
     *
     * @param string $path app path
     * 
     * @return void
     */
    public function __construct($path)
    {
        // Declare self as app instance 
        self::$app = $this;

        // Appplication path
        self::$path = $path;

        // new Router instance
        $this->router = new Router;

        // New ServerRequestFactory instance
        $this->request = ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );

        // new Whoops Instance (ErrorHandler)
        $this->eh = new Whoops;
        $this->eh->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $this->eh->register();

        // new Logger instance
        $this->logger = Logging::get("app",);

        // new Database instance
        $this->database = new Database;

        // new Config instance
        $this->config = new Config;

        // return self instance
        return $this;
    }

    /**
     * Application Bootstrap
     *
     * @return $this executes callback from request
     */
    public function run()
    {
        $this->router->run();
    }
}