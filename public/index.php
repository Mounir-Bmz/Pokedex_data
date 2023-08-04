<?php

// je require les fichiers dont j'ai besoin pour que tout s'affiche correctement
require_once('../vendor/autoload.php');
require_once('../app/Controllers/MainController.php');

$router = new AltoRouter();
// ca c'est pour notre $baseURL
$router->setBasePath(dirname($_SERVER['SCRIPT_NAME']));

// ici je défini mes routes avec un paramètre, une target, et un nom aléatoire pour notre route
$router->map(
    'GET', 
    '/', 
    [
        'action' => 'home',
        'controller' => 'MainController'
    ],
    'home'
);

// pareil qu'au dessus 
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
    '/liste',
    [
        'action' => 'liste',
        'controller' => 'MainController'
    ],
    'liste'
);

$match = $router->match();

// dispatch vu en cours
if ($match) {

    $controllerToUse = $match['target']['controller'];
    $methodToUse = $match['target']['action'];

    $controller = new $controllerToUse();
    $controller->$methodToUse($match['params']);

} else {
    echo 'Aïe ! Ça n\' a pas fonctionné...';
}