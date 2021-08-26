<?php

if (isset($layout)) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/App/Views/Templates/Components/header.php');
    echo $layout;
    require_once($_SERVER['DOCUMENT_ROOT'] . '/App/Views/Templates/Components/footer.php');
}
