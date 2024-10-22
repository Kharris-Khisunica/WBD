<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;


class AuthController extends Controller{

    public function __construct(){
        $this->view = 'auth';

    }

    //Load Page

    public function loginPage(){

    }

    public function registerPage_Company(){

    }

    public function registerPage_Jobseeker(){

    }

    // Process

    public function login(Request $request){
        
    }

    public function register_Company(Request $request){

    }

    public function register_Jobseeker(Request $request){

    }

    
    public function logout(){

        exit;
    }
}
