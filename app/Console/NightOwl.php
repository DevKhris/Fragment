<?php

declare(strict_types=1);

namespace RubyNight\Kernel\Console;

use RubyNight\Kernel\Console\ShellController;
use RubyNight\Kernel\Console\Utils\LineParser;

class NightOwl
{
    public $command;
    
    protected $echo;
   
    protected $signature;
    
    protected $shellCommands = [];
    
    public function __construct()
    {
        $this->echo = new Output();
        $this->register = new CommandRegister(__DIR__ . DIRECTORY_SEPARATOR . 'Controllers');
    }

    public function render()
    {
        return $this->echo;
    }

    public function printSignature()
    {
        $this->render()->echo(sprintf("usage %s",$this->getSignature()));
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    public function set($command, $callback)
    {
        $this->register->set($command, $callback);
    }
    
    public function run(array $argv = [])
    {
        $input = new LineParser($argv);
        
        if (count($input->args) < 2) {
            $this->printSignature();
            exit;
        }
      
        $callback = $this->register->callbackController($input->command, $input->subcommand);

        if($callback instanceof ShellController)
        {
            $callback->boot($this);
            $callback->run($input);
            $callback->down();
            exit;
        }

        // if not run single signal
        $this->signal($input);
    }

    public function signal(LineParser $input)
    {
        try {        
            $callback = $this->register->callback($input->command);
            call_user_func($callback, $input);
        } catch (Exception $ex) {
            $this->render()->echo("[Error] " . $ex->getMessage());
            $this->printSignature();
            exit;
        }  
    }

    public function call($command, $argv)
    {
        if($command === null) {
            $this->render()->echo("Sorry mate that command doesn't exist");
            exit;
        }
        call_user_func($command, $argv);
    }

}