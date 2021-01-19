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
        echo '<div style="background: #123; color: #fff; font-family: sans-serif;">';
        echo '<h2 style="margin-top: 2px;">Debug</h2>';
        echo '<pre style="font-size: 12px; >';
        var_dump($this->debug);
        echo "</pre></div>";
    }
}
