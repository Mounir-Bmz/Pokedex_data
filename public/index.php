<?php

require_once('../vendor/autoload.php');
require_once('../app/Controllers/MainController.php');

// Create an object $router using AltoRouter
$router = new AltoRouter();
// The BASE_URI key is set via the .htaccess file
$router->setBasePath(dirname($_SERVER['SCRIPT_NAME']));

$router->map(
    'GET', 
    '/', 
    [
        'action' => 'home',
        'controller' => 'MainController'
    ],
    'home'
);

$router->map(
    'GET', 
    '/types',
    [
        'action' => 'types',
        'controller' => 'MainController'
    ],
    'types'
);

$router->map(
    'GET', 
    '/details/[i:number]',
    [
        'action' => 'details',
        'controller' => 'MainController'
    ],
    'details'
);

$router->map(
    'GET', 
    '/(liste|liste/)',
    [
        'action' => 'liste',
        'controller' => 'MainController'
    ],
    'liste'
);

$router->map(
    'GET', 
    '/liste/[:type]',
    [
        'action' => 'liste',
        'controller' => 'MainController'
    ],
    'liste-type'
);

$match = $router->match();

// dispatch
if ($match) {

    $controllerToUse = $match['target']['controller'];
    $methodToUse = $match['target']['action'];

    $controller = new $controllerToUse();
    $controller->$methodToUse($match['params']);

} else {
    echo 'Aïe ! Ça n\' a pas fonctionné...';
}