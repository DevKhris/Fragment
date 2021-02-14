<?php
declare(strict_types=1);

namespace RubyNight\Kernel\Console\Handlers;

class NamespaceHandler
{
    protected $command;

    protected $controllers = [];

    public function __construct($command)
    {
        $this->command = $command;
    }

    /**
     * Get the value of command
     */ 
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Get the value of controllers
     */ 
    public function loadControllers($commands)
    {
        foreach(glob($commands.'/'.$this->getCommand() . '/*Controller.php') as $controller) 
        {
            $this->controllerMap($controller);
        }

        return $this->getControllers();
    }

    /**
     * Get the value of controllers
     */ 
    public function getControllers()
    {
        return $this->controllers;
    }

    /**
    * Get the value of controller
    */ 
    public function getController($controller)
    {
        return isset($this->controllers[$controller]) ? $this->controllers[$controller] : null;
    }

    protected function controllerMap($controller)
    {
        $filename = basename($controller);
        $class = str_replace('.php','',$filename);

        $command = strtolower(str_replace('Controller','',$class));
        $callback = sprintf("RubyNight\\Kernel\\Console\\Controllers\\%s\\%s", $this->getCommand(), $class);

        /** @var ShellController $sc */
        $sc = new $callback();
       
        $this->controllers[$command] = $sc;
        
    }
}