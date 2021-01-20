<?php

namespace RubyNight\Kernel\Router;

use Phug\Phug as Phug;
use RubyNight\Application;
use RubyNight\Kernel\Http\Request;
use RubyNight\Kernel\Http\Response;
use RubyNight\Kernel\Helpers\Config;

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
    private $routes = array();

    /** 
     * Parameters from the route
     * 
     * @var array
     */
    protected $params = array();

    /**
     * Constructor function
     *
     * @param Request  $req Request object
     * @param Response $res Response object
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
     * @param string $route    uri path
     * @param string $callback callback
     *
     * @return $this
     */
    public function get($route, $callback)
    {
        // get's the path route and returns it's callback
        return $this->routes['GET'][$route] = $callback;
    }

    /**
     * Post function
     *
     * @param string $route    uri path
     * @param string $callback callback
     *
     * @return void
     */
    public function post($route, $callback)
    {
        // post's the path route and returns it's callback
        return $this->routes['POST'][$route] = $callback;
    }

    /**
     * Resolve function
     *
     * @return void
     */
    public function resolve()
    {
        // get path from request
        $route = $this->req->getPath();
        // get method from request
        $method = $this->req->getMethod();
        // get the route method and path or return false
        $callback = $this->routes[$method][$route] ?? false;
        // if not callback then return 404 state and display view
        if ($callback === false) {
            $this->res->setStatus(404);
            $template = '
            body(style="background:#131313; color: #f1f1f1; font-family: monospace;")
                div(style="text-align: center; margin-top: 10%;")
                    h1(style="font-size: 3em; color: #a0f") | 404 Not Found
                    h2 Cannot find the requested resource.
            ';
            return $this->render($template);
        }
        if (is_string($callback)) {
            return call_user_func($callback);
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

        return call_user_func($callback, $this->req, $this->res);
    }

    /**
     * Render view to route
     *
     * @param string $view view to display
     * @param array  $args args
     * @param array  $opt  options
     *
     * @return view           rendered view
     */
    public static function view($view, $args = [null], $opt = [null])
    {
        Phug::displayFile(Config::get('VIEWS_PATH') . "$view.pug", $args, $opt);
    }

    /**
     * Render content with paramaters
     *
     * @param string $input   inline-template to render
     * @param array  $_params parameters for render
     * 
     * @return void
     */
    public static function render($input, $_params = [null])
    {
        Phug::display($input, $_params);
    }
}
