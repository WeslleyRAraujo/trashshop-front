
<?php

include_once "./bootstrap.php";

use Afterimage\Router;

$route = new Router();

$route->get('/', 'App\Controller\ShopController:index');

$route->get('/shop', 'App\Controller\ShopController:productDetail');

$route->get('/login', 'App\Controller\LoginController:index');

$route->post('/login/auth', 'App\Controller\LoginController:auth');