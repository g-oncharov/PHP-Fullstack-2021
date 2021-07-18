<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/helpers/autoload.php');

class Controller
{
    public $view;
    public function __construct()
    {
        $this->view = new View;
    }

}