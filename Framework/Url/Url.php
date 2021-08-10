<?php

namespace Framework\Url;

class Url
{
    public function getLastPartUrl()
    {
        $result = explode('/', $_SERVER['REQUEST_URI']);
        return end($result);
    }
}