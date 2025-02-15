<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../core/helpers.php';

class UserController extends Controller{
    public function showProfile($userId)
    {
        // Mengambil data pengguna berdasarkan ID
        $user = User::find($userId);

        if ($user) {
            // Menampilkan profil pengguna
            $this->view('templates/header', ['user' => $user]);
            $this->view('home/profile', ['user' => $user]); // Gunakan method view
            $this->view('templates/footer');
            //return view('/profile', ['user' => $user]);
        } else {
            // Jika pengguna tidak ditemukan, tampilkan pesan error
            $this->view('error', ['message' => 'User not found']);
        }
    }

    public function updateProfile($userId)
    {
        // Mengambil data pengguna berdasarkan ID
        $user = User::find($userId);

        if ($user) {
            // Menampilkan form untuk mengupdate profil
            $this->view('update_profile', ['user' => $user]);
        } else {
            // Jika pengguna tidak ditemukan, tampilkan pesan error
            $this->view('error', ['message' => 'User not found']);
        }
    }

    public function requestWriter() {
        header('Content-Type: application/json');
    
        if (!isset($_SESSION['user'])) {
            echo json_encode(["status" => "error", "message" => "Anda harus login terlebih dahulu."]);
            exit;
        }
    
        $user_id = $_SESSION['user']['user_id'];
        $db = new Database();
    
        // Cek apakah user sudah mengajukan permohonan
        $user = $db->fetch("SELECT request_status FROM users WHERE user_id = :user_id", ['user_id' => $user_id]);
    
        if ($user['request_status'] === 'pending') {
            echo json_encode(["status" => "error", "message" => "Anda sudah mengajukan permohonan. Harap tunggu persetujuan admin."]);
            exit;
        } elseif ($user['request_status'] === 'approved') {
            echo json_encode(["status" => "error", "message" => "Anda sudah menjadi penulis."]);
            exit;
        }
    
        // Update status permohonan menjadi pending
        $db->execute("UPDATE users SET request_status = 'pending' WHERE user_id = :user_id", ['user_id' => $user_id]);
    
        echo json_encode(["status" => "success", "message" => "Permohonan Anda telah dikirim. Harap tunggu persetujuan admin."]);
    }
    
}