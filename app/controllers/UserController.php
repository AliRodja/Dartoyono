<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../core/helpers.php';

class UserController extends Controller{
    public function showProfile($userId = null) {
        if ($userId === null) {
            if (isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id']; // Ambil ID user dari session jika ada
            } else {
                http_response_code(400);
                echo "Error: User ID tidak diberikan.";
                return;
            }
        }
    
        $user = User::find($userId);
    
        if ($user) {
            $this->view('templates/header', ['user' => $user]);
            $this->view('home/profile', ['user' => $user]); 
            $this->view('templates/footer');
        } else {
            $this->view('error', ['message' => 'User not found']);
        }
    }
    

    public function updateProfile($userId)
    {
    // Ambil data pengguna berdasarkan ID
    $user = User::find($userId); // Mengembalikan array, bukan objek


    if (!$user || !is_array($user)) {
        $this->view('error', ['message' => 'User not found']);
        return;
    }

    // Jika metode adalah GET, tampilkan halaman form update
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $this->view('update_profile', ['user' => $user]);
        return;
    }

    // Jika metode adalah POST, proses update profil
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari form
        $user['username'] = trim($_POST['username']);
        $user['email'] = trim($_POST['email']);
        $user['full_name'] = trim($_POST['full_name']);
        $user['birth_date'] = $_POST['birth_date'];
        $user['gender'] = $_POST['gender'];
        $user['request_status'] = $_POST['request_status'] ?? 'none';

        // Validasi data
        if (empty($user['username']) || empty($user['email']) || empty($user['full_name']) || empty($user['birth_date']) || empty($user['gender'])) {
            $this->view('update_profile', [
                'user' => $user,
                'error_message' => 'All fields are required.'
            ]);
            return;
        }

        // Jika ada file yang diunggah, proses unggahan gambar
        if (!empty($_FILES['profile_photo']['name'])) {
            $uploadDir = 'uploads/';
            $fileName = time() . "_" . basename($_FILES['profile_photo']['name']); // Hindari nama file duplikat
            $targetPath = $uploadDir . $fileName;

            // Validasi tipe file (hanya JPG, JPEG, dan PNG)
            $fileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
            if (!in_array($fileType, ['jpg', 'jpeg', 'png'])) {
                $this->view('update_profile', [
                    'user' => $user,
                    'error_message' => 'Only JPG, JPEG, and PNG files are allowed.'
                ]);
                return;
            }

            // Pindahkan file ke direktori upload
            if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $targetPath)) {
                $user['profile_photo'] = $targetPath; // Simpan path ke database
            } else {
                $this->view('update_profile', [
                    'user' => $user,
                    'error_message' => 'Error uploading profile photo.'
                ]);
                return;
            }
        }

        // Simpan perubahan ke database
        $userModel = new User();
        $updateStatus = $userModel->update($userId, $user);

        if ($updateStatus) {
            $this->view('templates/header', ['user' => $user]);
            $this->view('home/profile', [
                'user' => $user,
                'success_message' => 'Profile updated successfully!'
            ]);
            $this->view('templates/footer');
        } else {
            $this->view('templates/header', ['user' => $user]);
            $this->view('home/profile', [
                'user' => $user,
                'error_message' => 'Error updating profile.'
            ]);
            $this->view('templates/footer');
        }
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