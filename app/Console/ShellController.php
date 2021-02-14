<?php

declare(strict_types=1);

namespace RubyNight\Kernel\Console;

use RubyNight\Kernel\Console\NightOwl;
use RubyNight\Kernel\Console\Utils\LineParser;

abstract class ShellController
{
    protected $cli;

    protected $input;
    
    abstract public function exec();

    public function boot(NightOwl $cli)
    {
        $this->cli = $cli;
    }

    public function run(LineParser $input)
    {
        $this->input = $input;
        $this->exec();
    }

    public function down()
    {
        //
    }

    public function get()
    {
        return $this->cli;
    }

    public function getArgs()
    {
        return $this->input->args;
    }

    public function getParams()
    {
        return $this->input->params;
    }

    protected function hasParam($param)
    {
        return $this->input->hasParam($param);
    }

    protected function getParam($param)
    {
        return $this->input->getParam($param);
    }

    protected function getPrinter()
    {
        return $this->get()->render();
    }
}