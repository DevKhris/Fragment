<?php


namespace RubyNight\Kernel\Helpers;

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
        $this->debug = array('Application' => (array) $app);
        return $this;
    }

    /**
     * Print Debug info
     *
     * @return void
     */
    public function print()
    {
        echo '<pre style="font-size: 12px; background-color: #112233; color: #fff; font-family: sans-serif;> ';
        var_dump($this->debug);
        echo '</pre>';
    }
}
