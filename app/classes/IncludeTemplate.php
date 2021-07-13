<?php
class IncludeTemplate
{
    public function render(string $template, array $params, string $layout) {
    $template = $_SERVER['DOCUMENT_ROOT'] . '/app/views/template/layouts/' . $template . '.php';
    extract($params);
    $layout = $_SERVER['DOCUMENT_ROOT'] . '/app/views/template/pages/' . $layout . '.php';
    if (file_exists($template)) {
        ob_start();
        include($layout);
        $layout = ob_get_clean();
        ob_clean();
        ob_start();
        include($template);
        $output = ob_get_clean();
    }
    else {
        $output = '';
    }
    return $output;
}
}