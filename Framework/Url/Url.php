<?php

namespace Framework\Url;

class Url
{
    /** Get last part url */
    public function getLastPartUrl()
    {
        $result = explode('/', $_SERVER['REQUEST_URI']);
        return end($result);
    }

    /**
     * Parse space url
     *
     * @param string $str
     * @return string
     */
    public function parseSpaceUrl(string $str): string
    {
        return preg_replace('/%20/', ' ', $str);
    }

    /** Redirect to home page */
    public function goToHomePage(): void
    {
        header("Location: /");
    }
    /** Redirect to previous page */
    public function goToPrevPage(): void
    {
        $httpReferer = $_SERVER['HTTP_REFERER'] ?? '/';
        header("Location: $httpReferer");
    }

    /**
     * Redirect to specific page
     *
     * @param string $page
     */
    public function goToPage(string $page): void
    {
        header("Location: /$page");
    }

}
