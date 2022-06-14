<?php

use Services\Router\Router;
use App\Http\Controllers\ListController;

$router = new Router();


$router->get('/api/storage', [ListController::class, 'index']);
$router->post('/api/storage', [ListController::class, 'create']);

$router->run();