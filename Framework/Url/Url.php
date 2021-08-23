<?php

namespace Framework\Url;

class Url
{
    public function getLastPartUrl()
    {
        $result = explode('/', $_SERVER['REQUEST_URI']);
        return end($result);
    }

    public function parseSpaceUrl($str)
    {
        return preg_replace('/%20/', ' ', $str);
    }

    public function goToHomePage()
    {
        header("Location: /");
    }

    public function goToPrevPage()
    {
        $httpReferer = $_SERVER['HTTP_REFERER'] ?? '/';
        header("Location: $httpReferer");
    }

    public function goToPage(string $page)
    {
        header("Location: /$page");
    }

}
