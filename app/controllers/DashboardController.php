<?php
class DashboardController {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        $role = $_SESSION['user']['role'];

        if ($role == 'admin') {
            require_once __DIR__ . '/../views/dashboard/admin.php';
        } elseif ($role == 'writer') {
            require_once __DIR__ . '/../views/dashboard/writer.php';
        } else {
            require_once __DIR__ . '/../views/dashboard/reader.php';
        }
    }
}
