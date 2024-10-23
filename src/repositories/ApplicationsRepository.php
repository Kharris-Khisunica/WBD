<?php

namespace app\repositories;

use app\core\Repository;

class ApplicationsRepository extends Repository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getApplicantByJobId($id)
    {
        $query = 'SELECT a.*, u.user_id , u.nama
                  FROM lamaran a JOIN users u ON a.user_id = u.user_id 
                  WHERE lowongan_id = :id';
        $params = ['id' => $id];
        return $this->getAll($query, $params);
    }
}
