<?php

class helpers{
    function view($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . "/../views/$viewName.php";
    }
    function redirect($url) {
        header("Location: $url");
        exit;
    }
    function sanitizeInput($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }
}
