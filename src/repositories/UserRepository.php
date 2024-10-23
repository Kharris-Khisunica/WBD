<?php

namespace app\repositories;

use app\core\Repository;

class UserRepository extends Repository {
    public function __construct() {
        parent::__construct();
    }

    public function getUserById(string $id) {
        $query = 'SELECT * FROM users WHERE user_id = :id';
        $params =['id'=> $id];
        return $this->getOne($query, $params);
    } 

    public function getUserByEmail(string $email) {
        $query = 'SELECT * FROM users WHERE email = :email';
        $params =['email'=> $email];
        return $this->getOne($query, $params);
    }

    public function getUserByName(string $nama) {
        $query = 'SELECT * FROM users WHERE nama = :nama';
        $params =['nama'=> $nama];
        return $this->getOne($query, $params);
    }

    public function getJobSeekerDetail(string $id) {
        $query = 'SELECT * FROM jobseeker_detail WHERE user_id = :id';
        $params =['id'=> $id];
        return $this->getOne($query, $params);
    }

    public function getCompanyDetail(string $id) {
        $query = 'SELECT * FROM company_detail WHERE user_id = :id';
        $params =['id'=> $id];
        return $this->getOne($query, $params);
    }

    public function addJobseeker(string $nama, string $email, string $password) {
        $query = 'INSERT INTO users (email, password, role, nama) VALUES (:e, :p, \'jobseeker\', :n)';
        $params = ['e'=> $email,'p'=> $password, 'n' => $nama];
        $this->queryNoFetch($query, $params);

        $user = $this->getUserByEmail($email);

        $query = 'INSERT INTO jobseeker_detail (user_id, nama) VALUES (:i, :n)';
        $params = ['i' => $user['user_id'],'n' => $nama];
        $this->queryNoFetch($query, $params);
    }

    public function addCompany(string $nama, string $email, string $password) {
        $query = 'INSERT INTO users (email, password, role, nama) VALUES (:e, :p, \'jobseeker\', :n)';
        $params = ['e'=> $email,'p'=> $password, 'n' => $nama];
        $this->queryNoFetch($query, $params);

        $user = $this->getUserByEmail($email);

        $query = 'INSERT INTO company_detail (user_id, nama) VALUES (:i, :n)';
        $params = ['i' => $user['user_id'],'n' => $nama];
        $this->queryNoFetch($query, $params);
    }
}