<?php
use App\Routers\Router as Router;
use App\Middlewares\AuthMiddleware;

// use Controllers
use App\Controllers\AuthController;
use App\Controllers\phonesController;


// ایجاد یک نمونه از میدلور
$authMiddleware = new AuthMiddleware();
$request = (object) [
    "headers" => getallheaders()['token'] ?? null,
    "query"   => $_GET['token'] ?? null,
    "body"    => getPostDataInput()->token ?? null
];

$response = $authMiddleware->handle($request);

if(!$response) exit();
// print_r(getallheaders());

$router = new Router();

// Define routes
$router->post('v1','/login', AuthController::class, 'login');
$router->post('v1','/register', AuthController::class, 'register');
$router->post('v1','/verify', AuthController::class, 'verify');
$router->get('v1', '/phones', phonesController::class , 'index');
$router->get('v1', '/phones/{id}', phonesController::class , 'show');
$router->post('v1', '/phones', phonesController::class , 'store');
$router->put('v1', '/phones/{id}', phonesController::class , 'update');
$router->delete('v1', '/phones/{id}', phonesController::class , 'destroy');