<?php

namespace app\core;

class Request
{
    private string $path;
    private string $method;

    private array $params;

    public function __construct() {
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->path = $this->getRequestPath();
    }

    private function getRequestPath() : string {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        if ($path !== '/') {
            $path = rtrim($path, '/');
        }

        $pos = strpos($path, '?');
        return $pos !== false ? substr($path, 0, $pos) : $path;
    }
    public function getPath() : string {
        return $this->path;
    }

    public function getMethod() : string {
        return $this->method;
    }
    public function getParams() : array {
        return $this->params;
    }

    public function getRequestData(): array {
        $data = [];
    
        switch ($this->method) {
            case 'get':
                // Handle GET method by retrieving query parameters
                $data = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS) ?? [];
                break;
    
            case 'post':
                // Handle POST method by retrieving form data
                $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS) ?? [];
                break;
    
            case 'put':
            case 'patch':
            case 'delete':
                // Handle PUT, PATCH, DELETE by reading raw body content (usually JSON)
                $rawData = file_get_contents('php://input');
                $jsonData = json_decode($rawData, true);
    
                if (is_array($jsonData)) {
                    // Sanitize each JSON value
                    foreach ($jsonData as $key => $value) {
                        $data[$key] = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
                break;
        }
    
        return $data;

    }

    public function setParams($params) {
        $this->params = $params;
    }  

    public function getFiles() : array{
        return $_FILES;
    }
    
}