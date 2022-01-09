
<?php

include_once "./bootstrap.php";

use Afterimage\Router;

$route = new Router();

$route->get('/', 'App\Controller\HomeController:index');
$route->get('/message', 'App\Controller\HomeController:json');

$route->get('/login', 'App\Controller\LoginController:index');

$route->post('/login/auth', 'App\Controller\LoginController:auth');