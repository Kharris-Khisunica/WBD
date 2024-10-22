<?php
function loadEnv($path) {
    if (!file_exists($path)) {
        throw new Exception("The .env file does not exist at: $path");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Ignore commented lines
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Split the line by '='
        $parts = explode('=', $line, 2);
        if (count($parts) === 2) {
            $key = trim($parts[0]);
            $value = trim($parts[1]);

            // Remove quotes if present
            $value = trim($value, '"');
            $value = trim($value, "'");

            // Set the value in $_ENV
            $_ENV[$key] = $value;
        }
    }
}

