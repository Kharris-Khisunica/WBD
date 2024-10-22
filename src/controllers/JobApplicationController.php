<?php

namespace app\controllers;

use app\core\Controller;

class JobApplicationController extends Controller{
    
    public function __construct(){

        $this->view: 'jobApplication';
    }

    public function inputJobApplication(Request $request){
        // Ambil file upload dari user
        $files = $request->getFiles();

        //Cek CV
        

    }
}