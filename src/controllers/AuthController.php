<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Request;

class AuthController extends Controller {
    public function __construct(){

        $this->view = "auth";
        // nanti tambahin middleware
    }

    public function login(){    
        $this->renderPage('login', '');
    }
    public function registerJobseeker(){    
        $this->renderPage('register-jobseeker', '');
    }
    public function registerCompany(){    
        $this->renderPage('register-company', '');
    }
}