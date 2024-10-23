<?php

namespace app\core;

class Repository
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Application::$db->pdo;
    }

    protected function getType($value)
    {
        if (is_int($value)) {
            $type = \PDO::PARAM_INT;
        } else if (is_bool($value)) {
            $type = \PDO::PARAM_BOOL;
        } else if (is_null($value)) {
            $type = \PDO::PARAM_NULL;
        } else {
            $type = \PDO::PARAM_STR;
        }
        return $type;
    }

    public function getOne($query, $params)
    {
        $stmt = $this->pdo->prepare($query);
        foreach ($params as $param => $value) {
            $stmt->bindValue(":$param", $value, $this->getType($value));
        }
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAll($query, $params)
    {
        $stmt = $this->pdo->prepare($query);
        foreach ($params as $param => $value) {
            $stmt->bindValue(":$param", $value, $this->getType($value));
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function queryNoFetch($query, $params)
    {
        $stmt = $this->pdo->prepare($query);
        foreach ($params as $param => $value) {
            $stmt->bindValue(":$param", $value, $this->getType($value));
        }
        $stmt->execute();
    }

    public function paginate($query, $options,$params)
    {
        if (empty($options['take']) && empty($options['page'])) {
            return [$query, 1];
        }


        try {
            $stmt = $this->pdo->prepare($query);
            foreach ($params as $param => $value) {
                $stmt->bindValue(":$param", $value, $this->getType($value));
            }
            $stmt->execute();

            $totalData = $stmt->rowCount();


            if ($totalData === 0) {
                return [$query, 1];
            }
        } catch (\Exception $e) {
            error_log('Database error: ' . $e->getMessage());
            return [$query, 1];
        }


        $page = $options["page"] ?? 1;
        $limit = $options["take"] ?? 5;

        $offset = ($page - 1) * $limit;

        $paginatedQuery = $query . " LIMIT " . intval($limit) . " OFFSET " . intval($offset);

        $totalPages = ceil($totalData / $limit);

        return [$paginatedQuery, $totalPages];
    }
}
