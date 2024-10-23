<?php

namespace app\services;

use app\core\Application;
use app\core\Service;
use app\exceptions\NotFoundException;
use app\repositories\JobRepository;


class JobService extends Service {
    private JobRepository $jobRepository;
    public function __construct() {
        require_once Application::$_BASE_DIR . '/src/repositories/JobRepository.php';
        $this->jobRepository = new JobRepository();
    }
    
    public function getAllJobs($options=[]) {
        $jobs = $this->jobRepository->getAllJobs($options);
        return $jobs;
    }
    
    public function getJob($jobId) {
        return $this->jobRepository->getJobById($jobId);
    }
}