<?php

declare(strict_types=1);

namespace RubyNight\Kernel\Console;

use RubyNight\Kernel\Console\Handlers\NamespaceHandler;

class CommandRegister
{
    protected $controllersPath;
    
    protected $shellCommands = [];

    protected $shellControllers = [];
    
    public function __construct($path)
    {
        $this->controllersPath = $path;
        $this->registerNamespaces();
    }

    public function registerNamespaces() 
    {
        foreach(glob($this->getControllersPath() . '/*', GLOB_ONLYDIR) as $namespace) 
        {
            $this->registerNamespace(basename($namespace));
        }
    }

    public function registerNamespace($namespace)
    {
        $handler = new NamespaceHandler($namespace);
        $handler->loadControllers($this->getControllersPath());
        $this->shellControllers[strtolower($namespace)] = $handler;
    }
    
    public function set($command, $callback)
    {
        $this->shellCommands[$command] = $callback;
    }

    public function get($command)
    {
        return isset($this->shellCommands[$command]) ? $this->shellCommands[$command] : null;
    }

    /**
     * Get the value of shellControllers
     */ 
    public function getShellController($command)
    {
        return isset($this->shellControllers[$command]) ? $this->shellControllers[$command] : null;
    }

    /**
     * Set the value of shellControllers
     *
     */ 
    public function setShellController($command, ShellController $sc)
    {
        $this->shellControllers = [$command => $sc];
    }

    public function callbackController($command, $args = null)
    {
        $namespace = $this->getShellController($command);

        if ($namespace !== null)
        {
            return $namespace->getController($args);
        }

        return null;
    }

    public function callback($command)
    {
        $cmd = $this->get($command);
        if ($cmd === null)
        {
            echo ("\n[Error] Argument \"$command\" is invalid or not found.\n");
        }
        return $cmd;
    }

    /**
     * Get the value of controllersPath
     */ 
    public function getControllersPath()
    {
        return $this->controllersPath;
    }
}