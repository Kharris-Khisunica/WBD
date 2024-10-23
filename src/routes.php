<?php

use app\controllers\JobController;
use app\controllers\TestingController;
use app\controllers\HomeController;
use app\controllers\AuthController;

return function ($router) {
    $router->get('/home', [HomeController::class, 'index']);
    $router->get('/home-job', [HomeController::class, 'home_job']);
    $router->get('/hello', [TestingController::class, 'hello']);
    $router->get('/new-job', [JobController::class, 'addPage']);
    // $router->get('/job-detail', [JobController::class, 'detail']);
    $router->post('/filter-sort', [HomeController::class, 'filterJob']);
    $router->get('/register', [AuthController::class, 'registerJobseeker']);
    $router->get('/register-company', [AuthController::class, 'registerCompany']);
    $router->get('/home/data', [HomeController::class, 'getJobListingData']);
    $router->get('/job/:id', [JobController::class, 'detail']);

    $router->get('/login', [AuthController::class, 'login']);
};
