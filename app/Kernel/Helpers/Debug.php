<?php


namespace RubyNight\Kernel\Helpers;

use RubyNight\Kernel\View\View;

class Debug
{

    /**
     * Debug var
     *
     * @var array|object
     */
    public $debug;

    /**
     * Constructor function
     *
     * @param object $app Application instance to debug
     */
    public function __construct($app)
    {
        $this->view = new View;
        $this->debug = array('RubyNight' => $app);
        return $this;
    }

    /**
     * Print Debug info
     *
     * @return void
     */
    public function print()
    {
        dump($this->debug);
    }
}