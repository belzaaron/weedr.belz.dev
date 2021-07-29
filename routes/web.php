<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', 'IndexController');
$router->get('/{zip}', 'GenerationController@perform');
