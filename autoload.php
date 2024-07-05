<?php

spl_autoload_register(function ($class_name) {
    include __DIR__ . '/models/' . $class_name . '.php';
    include __DIR__ . '/controllers/' . $class_name . '.php';
});