<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\services\JobService;

class HomeController extends Controller
{

    private JobService $jobService;
    public function __construct()
    {
        include_once Application::$_BASE_DIR . "/src/services/JobService.php";

        $this->view = 'home';
        $this->jobService = new JobService();
    }

    public function index()
    {
        [$jobs, $totalPages] = $this->fetchJobs();

        $this->renderPage('index', ['jobs' => $jobs, 'totalPages' => $totalPages]);
    }

    public function fetchJobs()
    {
        $options = [
            'jobTypes' => !empty($_GET['jobTypes']) ? explode(',', $_GET['jobTypes']) : null,
            'locationTypes' => !empty($_GET['locationTypes']) ? explode(',', $_GET['locationTypes']) : null,
            'sort' => !empty($_GET['sort']) ? $_GET['sort'] : null,
            'search' => !empty($_GET['search']) ? $_GET['search'] : null,
            'page' => !empty($_GET['page']) ? $_GET['page'] : 1

        ];

        return $this->jobService->getAllJobs($options);
    }

    public function getJobListingData()
    {
        [$jobs, $totalPages] = $this->fetchJobs();

        ob_start();

        require_once Application::$_BASE_DIR . "/src/views/component/job-cards.php";

        $jobCardsHtml = ob_get_clean();

        Application::$app->response->jsonEncode(200, [
            'jobs' => $jobCardsHtml
        ]);
    }


    public function home_job()
    {
        $this->renderPage('home_company', []);
    }
}
