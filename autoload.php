<?php

spl_autoload_register(function ($class_name) {
    $models = __DIR__ . '/models/' . $class_name . '.php';
    $controllers = __DIR__ . '/controllers/' . $class_name . '.php';

    if (file_exists($models)) {
        require_once $models;
    } elseif (file_exists($controllers)) {
        require_once $controllers;
    } else {
        throw new Exception("Class {$class_name} not found.");
    }
});