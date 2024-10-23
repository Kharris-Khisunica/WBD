<?php

namespace app\core;

class Response
{
    public function setStatusCode(int $statusCode)
    {
        http_response_code($statusCode);
    }

    public function jsonEncode(int $statusCode, $data)
    {
        $this->setStatusCode($statusCode);
        header('Content-Type: application/json');

        // Directly output the JSON encoded data
        echo json_encode($data);
        exit; // Make sure to exit to prevent any further output
    }

    public function redirect(string $url)
    {
        header("Location: $url");
    }
}
