<?php

namespace RubyNight\Kernel\Http;

use Laminas\Diactoros\Request;
use Laminas\Diactoros\Response;
use RubyNight\Kernel\View\View;

/**
 * Controller class
 * 
 * @category Framework
 * @package  RubyNight\Kernel\Http;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */
class Controller
{
    protected array $middleware = [];

    /**
     * Constructor function
     */
    function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
        $this->template = new View;
        return $this;
    }

    /**
     * Render function
     *
     * @param string $view view to render
     * @param array  $params parameters for view
     * 
     * @return string
     */
    public function view($view, $params = [])
    {
        // return rendered view with arguments
        $this->template->view($view, $params);
    }

    /**
     * Register middleware function
     *
     * @param Middleware $middleware middleware
     * 
     * @return void
     */
    public function register(Middleware $middleware)
    {
        // register middleware to array in controller
        $this->middleware[] = $middleware;
    }

    /**
     * Get Middleware function
     *
     * @return array
     */
    public function get(): array
    {
        // get middleware from middlewares array
        return $this->middleware;
    }


    /**
     * Display the needed resource.
     *
     * @return \Laminas\Diactoros\Response
     */
    function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Laminas\Diactoros\Response
     */
    function create()
    {
        //
    }

    /**
     * Store a new resource.
     *
     * @param  \Laminas\Diactoros\Request $request
     * 
     * @return \Laminas\Diactoros\Response
     */
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     * @return \Laminas\Diactoros\Response
     */
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Laminas\Diactoros\Response
     */
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource.
     *
     * @param \Laminas\Diactoros\Request $request
     * @param int $id
     * 
     * @return \Laminas\Diactoros\Response
     */
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Delete the specified resource.
     *
     * @param  int  $id
     * 
     * @return \Laminas\Diactoros\Response
     */
    function delete($id)
    {
        //
    }
}