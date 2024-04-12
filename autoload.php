<?php
spl_autoload_register(function($className) {
    //echo $className; die();
    $file = __DIR__ . '\\' . $className . '.php'; //$file = __DIR__ .DIRECTORY_SEPARATOR.'../'. '\\' . $className . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    if (file_exists($file)) {
        include $file;
    }
});
