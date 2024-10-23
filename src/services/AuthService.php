<?php

namespace app\services;

use app\core\Application;
use app\core\Service;
use app\repositories\UserRepository;
use app\services\UserService;
use app\exceptions\NotFoundException;

class AuthService extends Service {
    private UserRepository $userRepository;
    public function __construct() {
        include_once Application:: $_BASE_DIR . '/repositories/UserRepository.php';
        $this->userRepository = new UserRepository();
        $this->userService = new UserService();
    }

    private function makeSession($user) {
        $_SESSION['username'] = $user['nama'];
        $_SESSION['id'] = $user['user_id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['pp_path'] = $user['pp_path'];
    }

    public function login($email, $password) {
        $err = $this->validateNotEmpty([$email, $password], ['email','password']);
        $this->validation($err);
        $user = $this->userRepository->getUserByEmail($email);

        if (!$user) {
            $verify = password_verify($password, $user['password']);
            if ($verify) {
                $this->makeSession($user);
                return;
            }
        }

        $err['login'] = 'Wrong username or password';
        $this->validation($err);
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function registerJS($data) {
        $this->validateRegister($data);
        $hash = password_hash($data['password'], PASSWORD_BCRYPT);
        $this->userRepository->addJobseeker($data['nama'], $data['email'], $hash);
        $user = $this->userRepository->getUserByEmail($data['email']);
        $this->makeSession($user);
    }

    public function registerC($data) {
        $this->validateRegister($data);
        $hash = password_hash($data['password'], PASSWORD_BCRYPT);
        $this->userRepository->addCompany($data['nama'], $data['email'], $hash);
        $user = $this->userRepository->getUserByEmail($data['email']);
        $this->makeSession($user);
    }

    private function validateRegister($data) {
        $error = $this->validateNotEmpty($data, ['name', 'email','password', 'confirm-password']);
        
        if (!isset($error['name'])) {
            $error['name'] = $this->validateName($data['name']);
        }

        if (!isset($error['email'])) {
            $error['email'] = $this->validateEmail($data['email']);
        }

        if (!isset($error['password']) && !isset($error['confirm-password'])) {
            if (strcmp($data['password'],$data['confirm-password']) != 0) {
                $error['password'] = 'Password and Confirm Password are different';
            }
        }
        $this->validation($error);
    }

    private function validateEmail($email) {
        $errors = [];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address';
        }
        else {
            if ($this->userRepository->getUserByEmail($email)) {
                $errors['email'] = 'That email address is already taken';
            }
        }
        return $errors;
    }    

    private function validateName($name) {
        $errors = [];
        $name = trim($name);
        $not_allowed = '/;=%?\$~`\\/';
        if (preg_match($not_allowed, $name)) {
            $errors['name'] = 'Name can not contain ; = % ? $ ~ ` \ ';
        }
        return $errors;
    }

}