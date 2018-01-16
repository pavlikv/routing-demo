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

//define a route using parameters
$f3->route("GET /hello/@name", function($f3, $params) {
    //$name = $params['name'];
    //echo "<h1>Hello, $name</h1>";

    //adding variables to the 'hive' (saving it to usse from the template"
    $f3->set('name', $params['name']);
    $template = new Template();
    echo $template->render('views/hello.html');
}
);

//define a route using parameters
$f3->route("GET /hi/@first/@last", function($f3, $params) {
    //$name = $params['name'];
    //echo "<h1>Hello, $name</h1>";

    //adding variables to the 'hive' (saving it to usse from the template"
    $f3->set('first', $params['first']);
    $f3->set('last', $params['last']);
    $f3->set('message', 'hi');

    $template = new Template();
    echo $template->render('views/hi.html');
}
);

//define a route using parameters
$f3->route("GET /language/@lang", function($f3, $params) {

    switch ($params['lang']) {
        case 'swahili':
            echo 'Jumbo!'; break;
        case 'spanish':
            echo 'Hola!'; break;
        case 'russian':
            echo 'Privet!'; break;
        case 'farsi':
            echo 'Salam!'; break;
        //reroute to another page
        case 'french':
            $f3->reroute('/');
        //404 error
        default:
            $f3->error(404);

    }

}
);

//define a page1, subpage a route
$f3->route("GET /jewelry/rings/toe-rings", function() {
    $template = new Template();
    echo $template->render('views/toe-rings.html');
}
);

//run Fat-Free
$f3->run();