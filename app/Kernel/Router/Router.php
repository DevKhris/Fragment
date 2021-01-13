<?php

namespace RubyNight\Kernel\Router;

use Phug\Phug as Phug;
use RubyNight\Application;
use RubyNight\Kernel\Http\Request;
use RubyNight\Kernel\Http\Response;

/**
 * Router class for basic routing and route handling
 *
 * @category Framework
 * @package  RubyNight\Kernel\Http;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */
class Router
{
    /** 
     * Associative array for routing table
     * 
     * @var array
     */
    protected $routes = array();

    /** 
     * Parameters from the route
     * 
     * @var array
     */
    protected $params = array();

    /**
     * Constructor function
     *
     * @param Request  $req passes Response to constructor
     * @param Response $res passes Request to constructor
     *
     * @return $this
     */
    public function __construct(Request $req, Response $res)
    {
        // instance of request object
        $this->req = $req;
        // instance of response object
        $this->res = $res;
        // return instance
        return $this;
    }

    /**
     * Get function
     *
     * @param string $path     uri path
     * @param string $callback callback
     *
     * @return $this
     */
    public function get(string $path, $callback)
    {
        // get's the path route and returns it's callback
        return $this->routes['get'][$path] = $callback;
    }


    /**
     * Post function
     *
     * @param string $path     uri path
     * @param string $callback callback
     *
     * @return $this
     */
    public function post(string $path, $callback)
    {
        // post's the path route and returns it's callback
        return $this->routes['post'][$path] = $callback;
    }

    /**
     * Resolve function
     *
     * @return void
     */
    public function resolve()
    {
        // get path from request
        $path = $this->req->getPath();
        // get pmethod from request
        $method = $this->req->getMethod();
        // get the route method and path or return false
        $callback = $this->routes[$method][$path] ?? false;
        // if not callback then return 404 state and display view
        if (!$callback) {
            $this->res->setStatus(404);
        }
        // if callback is a array
        if (is_array($callback)) {
            /**
             * @var $controller \RubyNight\Kernel\Http\Controller
             */
            // set controller from callback
            $controller = new $callback[0];
            // set hook to controller
            $controller->hook = $callback[1];
            Application::$app->controller = $controller;
            $middles = $controller->get();
            foreach ($middles as $middleware) {
                $middleware->run();
            }
            $callback[0] = $controller;
            // executes the class method from callback
            return call_user_func($callback, $this->req, $this->res);
        }
        if (is_string($callback)) {
            return call_user_func($callback);
        }
    }

    /**
     * Render view to route
     *
     * @param string $view     view to display
     * @param array  $args     args
     * @param array  $opt      options
     *
     * @return view           rendered view
     */
    public static function view($view, $args = [null], $opt = [null])
    {
        Phug::displayFile(VIEWS_PATH . "$view.pug", $args, $opt);
    }
}