<?php

namespace app\db;

class Connection 
{
    public \PDO $pdo;

    public function __construct($config = []) {
        $username = $config['username'] ?? '';
        $password = $config['password'] ?? '';
        $dbname = $config['dbname'] ?? 'linkinpurry';
        $host = $config['host'] ?? 'localhost';
        $port = $config['port'] ?? 5433;
        $dsn = 'pgsql:host=' . $host . ';port='. $port .';dbname='. $dbname . ';user=' . $username . ';password=' . $password;
        $this->pdo = new \PDO($dsn);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    private function log($message) {
        echo $message . PHP_EOL;
    }

}


