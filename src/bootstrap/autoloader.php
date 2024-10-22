<?php

spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/../';

    $prefix = 'app\\';
    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) === 0) {
        $relativeClass = substr($class, $len);

        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass);

        $file = $baseDir . $classPath . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
});
