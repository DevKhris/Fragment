<?php

declare(strict_types=1);

namespace RubyNight\Kernel\Console;

class Output
{
    public function output($input)
    {
        echo $input;
    }

    public function newline()
    {
        $this->output("\n");
    }

    public function echo($input)
    {
        $this->newline();
        $this->output($input);
        $this->newline();
    }
}