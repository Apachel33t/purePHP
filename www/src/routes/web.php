<?php

use Services\Router\Router;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ClientErrorController;

$router = new Router();

$router->get('/storage', [ListController::class, 'index']);
$router->post('/storage', [ListController::class, 'create']);
$router->addNotFoundHandler([ClientErrorController::class, 'notFound']);

$router->run();