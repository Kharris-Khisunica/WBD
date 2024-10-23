<?php

namespace app\core;

class Request
{
    private string $path;
    private string $method;

    private array $params;

    public function __construct()
    {
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->path = $this->getRequestPath();
    }

    private function getRequestPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        if ($path !== '/') {
            $path = rtrim($path, '/');
        }

        $pos = strpos($path, '?');
        return $pos !== false ? substr($path, 0, $pos) : $path;
    }
    public function getPath(): string
    {
        return $this->path;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
    public function getParams(): array
    {
        return $this->params;
    }

    public function getRequestData(): array
    {
        $data = [];

        switch ($this->method) {
            case 'get':
                
                $data = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS) ?? [];
                break;

            case 'post':
            case 'put':
            case 'patch':
            case 'delete':
                // Handle POST, PUT, PATCH, DELETE by retrieving raw JSON data
                $rawData = file_get_contents('php://input');
                error_log("Raw Data: " . $rawData); // Log raw input for debugging

                $jsonData = json_decode($rawData, true);

                if (json_last_error() !== JSON_ERROR_NONE) {
                    error_log("JSON Decode Error: " . json_last_error_msg()); // Log JSON errors
                    return []; // Return an empty array on failure
                }

                if (is_array($jsonData)) {
                    foreach ($jsonData as $key => $value) {
                        // Sanitize only if it's a string or a scalar value
                        $data[$key] = is_scalar($value) ? filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS) : $value;
                    }
                }
                break;
        }

        return $data;
    }


    public function setParams($params)
    {
        $this->params = $params;
    }
}
