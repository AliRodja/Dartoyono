<?php
require_once __DIR__ . '/../core/Database.php';

class User {
    private $db;

    // Konstruktor untuk membuat objek Database
    public function __construct() {
        $this->db = new Database(); // Koneksi menggunakan kelas Database
    }

    // Fungsi register untuk menambah user
    public function register($username, $email, $password, $full_name, $birth_date, $gender, $profile_photo, $role_id, $request_status) {
        // Hash password sebelum disimpan
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Query untuk menambahkan data user
        $query = "INSERT INTO users (username, email, password, full_name, birth_date, gender, profile_photo, role_id, created_at, request_status) 
                  VALUES (:username, :email, :password, :full_name, :birth_date, :gender, :profile_photo, :role_id, NOW(), :request_status)";
        
        // Persiapkan query
        $this->db->query($query);
        
        // Bind data parameter ke query
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashedPassword);
        $this->db->bind(':full_name', $full_name);
        $this->db->bind(':birth_date', $birth_date);
        $this->db->bind(':gender', $gender);
        $this->db->bind(':profile_photo', $profile_photo);
        $this->db->bind(':role_id', $role_id);
        $this->db->bind(':request_status', $request_status);
       
        // Eksekusi dan cek apakah berhasil
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data) {
        $query = "UPDATE users SET 
                    username = :username, 
                    email = :email, 
                    full_name = :full_name, 
                    birth_date = :birth_date, 
                    gender = :gender, 
                    profile_photo = :profile_photo, 
                    request_status = :request_status 
                  WHERE user_id = :user_id";

        $this->db->query($query);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':full_name', $data['full_name']);
        $this->db->bind(':birth_date', $data['birth_date']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':profile_photo', $data['profile_photo']);
        $this->db->bind(':request_status', $data['request_status']);
        $this->db->bind(':user_id', $id);

        return $this->db->execute();
        if (!$this->db->execute()) {
            print_r($this->db->errorInfo()); // Debug error SQL
            return false;
        }
        
    }

    // Fungsi untuk menemukan user berdasarkan email
    public function findUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        
        $this->db->query($query);
        $this->db->bind(':email', $email);

        return $this->db->single(); // Mengembalikan hasil sebagai array
    }

    public function getRoleById($role_id)
    {
        $this->db->query("SELECT role_name FROM roles WHERE role_id = :role_id");
        $this->db->bind(':role_id', $role_id);
        $result = $this->db->single();
        return $result['role_name'];
    }

    public static function view($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . "/../views/$viewName.php";
    }

    public static function find($userId) {
        $db = new Database();
        $db->query("SELECT * FROM users WHERE user_id = :user_id");
        $db->bind(':user_id', $userId);
        return $db->single();
    }

    public function fetch($query, $params = []) {
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function execute($query, $params = []) {
        $stmt = $this->db->pdo->prepare($query);
        return $stmt->execute($params);
    }

    
}
?>
