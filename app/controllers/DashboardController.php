<?php
class DashboardController {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        // Membuat instance dari model Post
        $postModel = new Post();

        // Ambil semua artikel berdasarkan user_id
        $articles = $postModel->getPostByUser($_SESSION['user']['user_id']);
        
        $role = $_SESSION['user']['role'];

        if ($role == 'admin') {
            require_once __DIR__ . '/../views/dashboard/admin.php';
        } elseif ($role == 'writer') {
            require_once __DIR__ . '/../views/dashboard/writer/writer.php';
        } else {
            require_once __DIR__ . '/../views/dashboard/reader.php';
        }
    }
}
