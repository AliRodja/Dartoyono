<?php
require_once __DIR__ . '/../core/Database.php';

class Post {
    private $db;

    public function __construct() {
        // Menghubungkan ke database
        $this->db = new Database();
    }

    // Menambahkan artikel baru
    public function createPost($user_id, $title, $content, $category, $image_url) {
        $query = "INSERT INTO posts (user_id, category, title, content, image_url) VALUES (:user_id, :category, :title, :content, :image_url)";
        
        // Menyiapkan query
        $this->db->query($query);

        // Mengikat parameter ke query
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':category', $category);
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        $this->db->bind(':image_url', $image_url);

        // Mengeksekusi query
        $this->db->execute();
    }

    // Mendapatkan semua artikel
    public function getAllPosts() {
        $query = "SELECT * FROM posts ORDER BY created_at DESC";
        $this->db->query($query);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getPostByUser($user_id){
        $query = "SELECT * FROM posts WHERE user_id = :user_id";
        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        $result = $this->db->resultSet();
        return $result;
    }
    
    // Mendapatkan artikel berdasarkan ID
    public function getPostById($post_id) {
        $query = "SELECT * FROM posts WHERE post_id = :post_id";
        $this->db->query($query);
        $this->db->bind(':post_id', $post_id);
        return $this->db->single();
    }

    // Mengupdate artikel
    public function updatePost($post_id, $title, $content, $category, $image_url) {
        $query = "UPDATE posts SET title = :title, content = :content, category = :category, image_url = :image_url WHERE post_id = :post_id";
        $this->db->query($query);
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        $this->db->bind(':category', $category);
        $this->db->bind(':image_url', $image_url);
        $this->db->bind(':post_id', $post_id);
        $this->db->execute();
    }

    // Menghapus artikel
    public function deletePost($post_id) {
        $query = "DELETE FROM posts WHERE post_id = :post_id";
        $this->db->query($query);
        $this->db->bind(':post_id', $post_id);
        $this->db->execute();
    }
}
