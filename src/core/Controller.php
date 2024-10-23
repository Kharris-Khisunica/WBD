<?php

namespace app\core;

const _VIEW_PATH = __DIR__ ."/../views";
const _COMPONENT_PATH = _VIEW_PATH . "/components";
const _LAYOUT_PATH = _VIEW_PATH . "/layout/layout.php";

class Controller 
{
    protected string $view = "";
    protected array $middlewares = [];

    public function getMiddlewares(){
        return $this->middlewares;
    }
    public function renderMainContent(string $content, $data){
        ob_start();
        extract($data);
        include_once _VIEW_PATH .  "/$this->view" . "/$content.php";
        return ob_get_clean();
    }

    public function renderComponent($component,$data){
        ob_start();
        extract($data);
        include_once _COMPONENT_PATH . "/$component.php";
        return ob_get_clean();
    }

    public function renderPage($content,$data){
        $mainContent = $this->renderMainContent($content,$data);
        ob_start();
        extract($data);
        include_once _LAYOUT_PATH;
        $layout = ob_get_clean();
        $layout = str_replace('{{page}}', $this->view, $layout);
        $layout = str_replace('{{pageTitle}}', ucwords($content), $layout);
        $layout = str_replace('{{content}}',$mainContent, $layout);
        echo $layout;
    }

}