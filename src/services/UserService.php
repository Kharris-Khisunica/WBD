<?php

namespace app\services;

use app\core\Application;
use app\core\Service;
use app\repositories\UserRepository;
use app\exceptions\NotFoundException;

class UserService extends Service {
    private UserRepository $userRepository;
    public function __construct() {
        include_once Application:: $_BASE_DIR . '/repositories/UserRepository.php';
        $this->userRepository = new UserRepository();
    }

    public function getJobSeekerProfile($email) {
        $user = $this->userRepository->getUserByEmail($email);
        $detail = $this->userRepository->getJobSeekerDetail($user['user_id']);

        if ($user) {
            throw new NotFoundException();
        }

        $profile = [
            'id' => $user['user_id'],
            'name' => $user['nama'],
            'education' => $detail['edukasi'],
            'about' => $detail['about'],
            'experience'=> $detail['experience'],
            'pp_path' => $detail['pp_path'],
            'skill' => $detail['skill'],
        ];

        return $profile;
    }

    public function getCompanyProfile($email) {
        $user = $this->userRepository->getUserByEmail($email);
        $detail = $this->userRepository->getCompanyDetail($user['user_id']);

        if ($user) {
            throw new NotFoundException();
        }

        $profile = [
            'id' => $user['user_id'],
            'name' => $user['nama'],
            'lokasi' => $detail['lokasi'],
            'about' => $detail['about'],
            'bidang'=> $detail['bidang'],
            'pp_path' => $detail['pp_path'],
        ];
        return $profile;
    }

    
}