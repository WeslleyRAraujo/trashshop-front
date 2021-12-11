<?php

include_once "./bootstrap.php";

use Afterimage\Core\Router;

$route = new Router();

// Declaração padrão de rota
$route->get('/', 'App\Controller\HomeController:index');
$route->get('/message', 'App\Controller\HomeController:json');

$route->get('/login', 'App\Controller\UserController:indexLogin');