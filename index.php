<?php
/**
 * Name: RubyNight Framework
 * User: DevKhris
 * Date: 31/10/2020
 * Time: 3:52 AM
 */

require_once __DIR__ . '/vendor/autoload.php';

use app\core\Application;

$app = new Application();

//$router = new Router();

$app->router->get('/', function(){ 
    return 'Welcome to RubyNight Framework'; 

});

$app->router->get('users', function(){
    return 'Users';
});

$app->run();