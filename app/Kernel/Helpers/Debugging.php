<?php


namespace Fragment\Kernel\Helpers;

use Fragment\Kernel\View\View;

class Debugging
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
        $this->debug = array('Fragment' => $app);
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