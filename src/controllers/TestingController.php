<?php

namespace app\controllers;
use app\core\Controller;

class TestingController extends Controller 
{
    public function __construct(){
        $this->view = 'testing';

    }

    public function index(){    
        $this->renderPage('index', 'test');
    }
    public function hello(){    
        $this->renderPage('hello', 'test');
    }

}