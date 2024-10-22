<?php

require_once __DIR__ . "/bootstrap/autoloader.php";
require_once __DIR__ ."/utils/envLoader.php";
use app\core\Application;


session_start();

$envPath = __DIR__ ."/../.env";
loadEnv($envPath);

$_SESSION['role'] = '';

$config = [
    'username' => $_ENV['POSTGRES_USER'],
    'password' => $_ENV['POSTGRES_PASSWORD'],
    'dbname' => $_ENV['POSTGRES_DB'],
    'host' => $_ENV['POSTGRES_HOST'],
    'port' => $_ENV['POSTGRES_PORT'],
];

echo 'POSTGRES_USER: ' . $_ENV['POSTGRES_USER'] . PHP_EOL;
echo 'POSTGRES_DB: ' . $_ENV['POSTGRES_DB'] . PHP_EOL;

$app = new Application(dirname(__DIR__), $config);
$routes = require __DIR__ . '/routes.php';
$routes($app->router);

$app->run() ;