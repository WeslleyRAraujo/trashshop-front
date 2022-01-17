
<?php

include_once "./bootstrap.php";

use Afterimage\Router;
use App\Classes\Session;

Session::checkLifeTime();

$route = new Router();

$route->get('/', 'App\Controller\ShopController:index');

$route->get('/shop', 'App\Controller\ShopController:detail');

$route->get('/login', 'App\Controller\LoginController:index');
$route->get('/login/exit', 'App\Controller\LoginController:exit');
$route->post('/login/auth', 'App\Controller\LoginController:auth');

$route->get('/profile', 'App\Controller\UserController:profile');

$route->get('/user', 'App\Controller\UserController:user');

$route->get('/sessiontime', 'App\Controller\LoginController:sessionTime');

Afterimage\Session::unset('error_login');