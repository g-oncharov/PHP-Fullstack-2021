<?php

namespace Framework\View;

class View
{

    public function render(string $layout, array $params, string $template = 'default')
    {
        $template = $_SERVER['DOCUMENT_ROOT'] . '/App/views/template/layouts/' . $template . '.php';
        extract($params);
        $correctParams = true;
        $layout = $_SERVER['DOCUMENT_ROOT'] . '/App/views/' . $layout . '.php';

        foreach ($params as $item) {
            if (is_null($item)) {
                $correctParams =  false;
                break;
            }
        }

        if (file_exists($template) && $correctParams) {
            ob_start();
            include_once($layout);
            $layout = ob_get_clean();
            ob_clean();
            ob_start();
            include_once($template);
            $output = ob_get_clean();
        } else {
            $output = '';
        }
        echo $output;
    }
}
