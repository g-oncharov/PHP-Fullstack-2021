<?php
class View {

    public function render(string $layout, array $params, string $template = 'default') {
        $template = $_SERVER['DOCUMENT_ROOT'] . '/app/template/layouts/' . $template . '.php';
        extract($params);
        $layout = $_SERVER['DOCUMENT_ROOT'] . '/app/views/' . $layout . '.php';
        if (file_exists($template)) {
            ob_start();
            include_once($layout);
            $layout = ob_get_clean();
            ob_clean();
            ob_start();
            include_once($template);
            $output = ob_get_clean();
        }
        else {
            $output = '';
        }
        echo $output;
    }
    public function error404() {
        $template = $_SERVER['DOCUMENT_ROOT'] . '/app/template/layouts/default.php';
        $layout = $_SERVER['DOCUMENT_ROOT'] . '/app/views/404.php';
        if (file_exists($template)) {
            ob_start();
            include_once($layout);
            $layout = ob_get_clean();
            ob_clean();
            ob_start();
            include_once($template);
            $output = ob_get_clean();
        }
        else {
            $output = '404 Not Found';
        }
        echo $output;
    }
}
