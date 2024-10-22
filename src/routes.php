<?php

use app\controllers\JobController;
use app\controllers\TestingController;

return function ($router) {
    $router->get('/', [TestingController::class, 'index']);
    $router->get('/hello', [TestingController::class, 'hello']);
    $router->get('/new-job', [JobController::class, 'addPage']);
    
};
