<?php

namespace app\core;

/**
 * Class Router
 * 
 * @author Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @package namespace app\core;
 */

class Router
{

    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request)
    {
    }
    /**
     * Get function
     *
     * @param [type] $path
     * @param [type] $callback
     * @return void
     */


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * Resolve function
     *
     * @return void
     */
    public function resolve()
    {
        $this->request->getPath();
        echo '<pre>';
        var_dump($path);
        echo '</pre>';
        exit;
    }
}
