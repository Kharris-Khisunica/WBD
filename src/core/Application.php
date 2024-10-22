<?php

namespace app\core;
// use app\db\Connection\Connection;
use app\exceptions\DefaultException;
use app\db\Connection;

class Application 
{
    public static string $_BASE_DIR;
    public static $config;

    public static Application $app;
    public static Connection $db;
    public Router $router;
    public Response $response;
    public Request $request;


    public function __construct(string $baseDir, $config) {
        self::$_BASE_DIR = $baseDir;
        self::$config = $config;

        self::$app = $this;
        self::$db = new Connection($config);
        $this->response = new Response();
        $this->request = new Request();

        $this->router = new Router($this->request, $this->response);
    }

    public function run() {
        try {
            echo $this->router->resolve();
        } catch (DefaultException $e) {
            $e->handle();
        } catch (\Exception $e) {
            echo $e;
        }
    }



}