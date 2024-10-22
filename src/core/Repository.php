<?php

namespace app\core;

class Repository 
{
    private \PDO $pdo;

    public function __construct(){
       $this->pdo = Application::$db -> pdo;
    }

    protected function getType($value){
        if (is_int($value)) {
            $type = \PDO::PARAM_INT;
        }
        else if (is_bool($value)) {
            $type = \PDO::PARAM_BOOL;
        }
        else if (is_null($value)) {
            $type = \PDO::PARAM_NULL;
        }
        else {
            $type = \PDO::PARAM_STR;
        }
        return $type;
    }

    public function getOne($query, $params){
        $stmt = $this->pdo->prepare($query);
        foreach($params as $param => $value) {
            $stmt->bindValue(":$param", $value, $this->getType($value));
        }
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAll($query, $params){
        $stmt = $this->pdo->prepare($query);
        foreach($params as $param => $value) {
            $stmt->bindValue(":$param", $value, $this->getType($value));
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function queryNoFetch($query, $params){
        $stmt = $this->pdo->prepare($query);
        foreach($params as $param => $value) {
            $stmt->bindValue(":$param", $value, $this->getType($value));
        }
        $stmt->execute();
    } 

    public function paginate($query, $params){
        // BELUm 
    }
}