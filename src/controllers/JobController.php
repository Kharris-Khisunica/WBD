<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Request;

class JobController extends Controller {
    public function __construct(){

        $this->view = "job";
        // nanti tambahin middle waiire
    }

    public function addPage(Request $request){
        $this->renderPage('update',[]);
    }



}