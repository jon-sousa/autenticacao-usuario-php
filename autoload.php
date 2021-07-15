<?php

spl_autoload_register(function(string $className){
    $namespace = str_replace('\\', DIRECTORY_SEPARATOR , $className);
    include_once(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $namespace . '.php');
});