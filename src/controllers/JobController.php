<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\services\JobService;
use app\services\ApplicationsService;
use app\exceptions\NotFoundException;


class JobController extends Controller
{
    private JobService $jobService;
    private ApplicationsService $applicationsService;
    public function __construct()
    {
        include_once Application::$_BASE_DIR . "/src/services/JobService.php";

        $this->view = "job";
        $this->jobService = new JobService();
        $this->applicationsService = new ApplicationsService();
    }

    public function addPage()
    {
        $this->renderPage('update', []);
    }

    public function detail(Request $request)
    {
        $jobId = $this->getJobID($request->getParams());
        $job = $this->jobService->getJob($jobId); 

        if ($job) {
            $applicants = $this->applicationsService->getApplicantByJobId($jobId);
            $this->renderPage('job-details', ['job' => $job, 'applicants' => $applicants]);
        } else {
            throw new NotFoundException('');
        }
    }

    public function getJobID($params) {
        $jobId = $params[0];
        if(!is_numeric($jobId) || !preg_match('/^[0-9]+$/', $jobId)){
            throw new NotFoundException();
        }
        return $jobId;
    }

}
