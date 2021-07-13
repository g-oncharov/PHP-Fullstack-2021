<?php
spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . '/app/classes/' . $class_name . '.php';
});