<?php
require_once __DIR__ . '/../models/Post.php';

class PostController {

    private $postModel;

    public function __construct() {
        $this->postModel = new Post();
    }

    // Menampilkan form untuk membuat artikel
    public function showCreateForm() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['role_id']) || $_SESSION['user']['role_id'] != 1) {
            die("Hanya penulis yang dapat membuat artikel.");
        }

        include 'views/create_post';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image_url'])) {
            $uploadDir = __DIR__ . '/../../uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
    
            $newFileName = uniqid() . '_' . $_FILES['image_url']['name'];
            $imagePath = $uploadDir . $newFileName;
    
            if (move_uploaded_file($_FILES['image_url']['tmp_name'], $imagePath)) {
                $this->postModel->createPost($_SESSION['user']['user_id'], $_POST['title'], $_POST['content'], $_POST['category'], 'uploads/' . $newFileName);
                echo "Artikel berhasil dipublikasikan!";
            } else {
                echo "Gagal mengunggah gambar.";
            }
        }
    }
    
    // Menampilkan daftar artikel
    public function index() {
        $posts = $this->postModel->getAllPosts();
        require_once __DIR__ . '/../views/home/index.php';
    }

    // Menampilkan artikel berdasarkan ID
    public function viewPost($post_id) {
        $post = $this->postModel->getPostById($post_id);

        if ($post) {
            echo "<h1>" . htmlspecialchars($post['title']) . "</h1>";
            echo "<p>" . htmlspecialchars($post['content']) . "</p>";
            echo "<img src='" . htmlspecialchars($post['image_url']) . "' alt='Gambar Artikel'>";
        } else {
            echo "Artikel tidak ditemukan.";
        }
    }

    // Mengupdate artikel
    public function editPost($post_id) {
        $post = $this->postModel->getPostById($post_id);

        // Validasi: Pastikan penulis yang sedang login adalah penulis artikel
        if ($_SESSION['user']['user_id'] != $post['user_id']) {
            die("Anda tidak memiliki izin untuk mengubah artikel ini.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            $image_url = isset($_FILES['image_url']) && $_FILES['image_url']['name'] != '' ? 'uploads/' . basename($_FILES['image_url']['name']) : $_POST['existing_image'];

            if ($_FILES['image_url']['name'] != '') {
                move_uploaded_file($_FILES['image_url']['tmp_name'], $image_url);
            }

            $this->postModel->updatePost($post_id, $title, $content, $category, $image_url);
            echo "Artikel berhasil diperbarui!";
        } else {
            include 'views/edit_post.php';  // Tampilkan form edit
        }
    }

    // Menghapus artikel
    public function deletePost($post_id) {
        $post = $this->postModel->getPostById($post_id);

        // Validasi: Pastikan penulis yang sedang login adalah penulis artikel
        if ($_SESSION['user']['user_id'] != $post['user_id']) {
            die("Anda tidak memiliki izin untuk menghapus artikel ini.");
        }

        $this->postModel->deletePost($post_id);
        echo "Artikel berhasil dihapus!";
    }
}
?>
