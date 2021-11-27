<?php

namespace Fragment\Kernel\View;

use Phug\Phug;
use Fragment\Kernel\Helpers\Config;

class View
{
    /**
     * Options array for template engine
     *
     * @var array
     */
    private $options = [];

    /** 
     * @codeCoverageIgnore
     */
    public function __construct()
    {
        $this->options = [
            'cache_dir' => Config::getPath('VIEWS_CACHE'),
            'debug' => Config::getPath('APP_DEBUG')
        ];

        // Create template engine instance
        $this->engine = Phug::getRenderer($this->options);

        // Get views path with config handler
        $this->path = Config::getPath('VIEWS_PATH');

        // Get cache path with config handler
        $this->cachePath = Config::getPath('VIEWS_CACHE');

        // Get enviroment opt with config handler
        $this->enviroment = Config::get('APP_ENVIROMENT', 'development');

        return $this;
    }

    public function view($view, $params = [])
    {
        if ($this->enviroment === 'production') {
            return $this->displayFile($view, $params);
        } else if ($this->enviroment === 'development') {
            return $this->renderFIle($view, $params);
        }
    }

    /**
     * Render View declaration
     *
     * @param string $value
     * @param array $params parameters for view
     * 
     * @return void
     */
    public function render($value, $params = [])
    {
        $this->engine->render($value, $params);
    }

    /**
     * Render View File
     *
     * @param string $view view path
     * @param array $params parameters for view
     * 
     * @return void
     */
    public function renderFile($view, $params = [])
    {

        echo $this->engine->renderFile($this->path . DIRECTORY_SEPARATOR . "$view.pug", $params);
    }

    /**
     * Display View declarations 
     *the same way as render except it only displays content
     * not writes it
     * 
     * @param string $view view path
     * @param array $params parameters for view
     * @return void
     */
    public function display($value, $params = [])
    {
        $this->engine->display($value, $params);
    }

    /**
     * displays view file 
     * the same way as renderFile except it only displays content
     * not writes it
     *
     * @param string $view view path
     * @param array $params parameters for view
     * 
     * @return void
     */
    public function displayFile($view, $params = [])
    {
        $this->engine->displayFile($this->path . DIRECTORY_SEPARATOR . "$view.pug", $params);
    }

    /**
     * Compile file from filename to cache path
     *
     * @param string $filename file path to compile
     * 
     * @return void
     */
    public function compileFile($filename)
    {
        $bytes = 16;
        $name = bin2hex(random_bytes($bytes));
        file_put_contents($this->cachePath . DIRECTORY_SEPARATOR . "$name.php", $this->engine->compileFile($filename));
    }

    /**
     * cache File from filename to cache path 
     * Sames a compileFile except it only's write's content directly to cache
     *
     * @param string $filename file path to compile
     * @return void
     */
    public function cacheFile($filename)
    {
        $bytes = 16;
        $name = bin2hex(random_bytes($bytes));
        file_put_contents($this->cachePath . DIRECTORY_SEPARATOR . "$name.pug", $this->engine->cacheFile($filename));
    }
}