<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 1/12/18
 * Time: 11:10 AM
 */

//require the autoload file
require_once ('vendor/autoload.php');

//create an instance of the Base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function() {
    echo '<h1>Routing Demo</h1>';
}
);

//run Fat-Free
$f3->run();