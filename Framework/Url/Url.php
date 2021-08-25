<?php

namespace Framework\Url;

class Url
{
    /**
     * Get data from get request
     *
     * @return string
     */
    public function getUrl(): string
    {
        $result = "";
        if (!empty($_SERVER['REQUEST_URI'])) {
            $result = trim($_SERVER['REQUEST_URI'], '/');
        }
        return $result;
    }

    /** Get last part url */
    public function getLastPartUrl()
    {
        $result = explode("/", $this->getUrl());
        return end($result);
    }

    /** Get penultimate part url */
    public function getPenultimatePartUrl()
    {
        $result = explode("/", $this->getUrl());
        return $result[count($result) - 2];
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
