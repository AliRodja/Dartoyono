<?php 
class Comment {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Ambil semua komentar berdasarkan post_id
    public function getCommentsByPostId($post_id) {
        $query = "SELECT c.*, u.username 
                  FROM comments c
                  LEFT JOIN users u ON c.user_id = u.id
                  WHERE c.post_id = :post_id
                  ORDER BY c.created_at DESC";
        $this->db->query($query);
        $this->db->bind(':post_id', $post_id);
        return $this->db->resultSet();
    }

    // Tambahkan komentar baru
    public function addComment($post_id, $user_id, $comment_text, $created_by) {
        $query = "INSERT INTO comments (post_id, user_id, comment_text, created_by) 
                  VALUES (:post_id, :user_id, :comment_text, :created_by)";
        $this->db->query($query);
        $this->db->bind(':post_id', $post_id);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':comment_text', $comment_text);
        $this->db->bind(':created_by', $created_by);
        return $this->db->execute();
    }
}
?>