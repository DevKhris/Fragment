<?php

namespace RubyNight\Kernel\Router;

use Phug\Phug;
use RubyNight\Application;
use RubyNight\Kernel\Http\Request;
use RubyNight\Kernel\Http\Response;

/**
 * Class Router for basic routing and route handling
 *
 * @package RubyNight\Kernel\Router;
 *
 * @author Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 */
class Router
{
    // protected array of routes
    protected array $routes = array();

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
        $this->request = $req;
        // instance of response object
        $this->response = $res;
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
    public function get($path, $callback)
    {
        // get's the path route and returns it's callback
        return $this->routes['get'][$path] = $callback;
    }


    /**
     * Post function
     *
     * @param string $path     uri path
     * @param string  $callback callback
     *
     * @return $this
     */
    public function post($path, $callback)
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
        $path = $this->request->getPath();
        // get pmethod from request
        $method = $this->request->getMethod();

        // get the route method and path or return false
        $callback = $this->routes[$method][$path] ?? '';
        // if not callback then return 404 state and display view
        if ($callback === false) {
            $this->res->setStatus(404);
        }
        // if callback is a string
        if (is_string($callback)) {
            // return the view of the current callack
            return $this->view($callback, null);
        }
        // if is an array passes the callback index to self instance
        if (is_array($callback)) {
            $self[0] = new $callback[0];
        }
        // executes the user function from callback
        return call_user_func(array($callback[0], $callback[1]));
    }

    /**
     * Render view to route
     *
     * @param  string $callback [description]
     * @param  array $args     [description]
     * @param  array $opt      [description]
     *
     * @return view           [description]
     */
    public static function view($callback, $args = [null], $opt = [null])
    {

        Phug::displayFile(VIEWS_PATH . $callback . '.pug', $args, $opt);
    }
}
