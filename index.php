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

//set debug level
$f3->set('DEBUG', 3);

//define a default route
$f3->route("GET /", function() {
    echo '<h1>Routing Demo</h1>';
}
);

//define a page1 route
$f3->route("GET /page1", function() {
    echo '<h1>This is page 1</h1>';
}
);

//define a page1, subpage a route
$f3->route("GET /page1/subpage-a", function() {
    echo '<h1>This is page 1, subpage a</h1>';
}
);

//run Fat-Free
$f3->run();