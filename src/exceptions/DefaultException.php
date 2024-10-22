<?php

namespace app\exceptions;

use app\core\Application;

class DefaultException extends \Exception
{
    public bool $showPage;
    public array $data;

    public string $description;

    public function __construct($code, $message,$description, $showPage = false, $data = [])
    {
        $this->code = $code;
        $this->message = $message;
        $this->description = $description;
        $this->data = array_merge($data, ["message" => $this->message]);
        $this->showPage = $showPage;
    }

    public function handle(){
        $errorCode = $this->code;
        $data = $this->data;
        $desc = $this->description;
        if ($this->showPage) {
            include_once Application::$_BASE_DIR . "/src/views/layout/errorpage.php";
        } else {
            echo Application::$app->response->jsonEncode($this->code, $this->data);
        }
    }
}