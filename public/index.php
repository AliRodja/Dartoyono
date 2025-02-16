<?php
session_start();
require_once '../app/init.php';
require_once __DIR__ . '/../app/core/Middleware.php';
require_once __DIR__ . '/../app/middleware/AuthMiddleware.php';



// 🔹 Daftarkan middleware
Middleware::add('auth', function () {
    AuthMiddleware::handle();
});

$app = new App;

?>