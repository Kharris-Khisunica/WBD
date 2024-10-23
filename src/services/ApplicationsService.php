<?php

namespace app\services;

use app\core\Application;
use app\core\Service;
use app\exceptions\NotFoundException;
use app\repositories\ApplicationsRepository;


class ApplicationsService extends Service
{
    private ApplicationsRepository $applicationsRepository;
    public function __construct()
    {
        require_once Application::$_BASE_DIR . '/src/repositories/ApplicationsRepository.php';
        $this->applicationsRepository = new ApplicationsRepository();
    }

    public function getApplicantByJobId($jobId)
    {
        return $this->applicationsRepository->getApplicantByJobId($jobId);
    }
}
