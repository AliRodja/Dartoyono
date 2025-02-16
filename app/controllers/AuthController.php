<?php
require_once __DIR__ . '/../models/User.php';

class AuthController extends Controller{
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->findUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {

                $_SESSION['user'] = [
                    'user_id' => $user['user_id'],
                    'username' => $user['username'],
                    'full_name' => $user['full_name'],
                    'profile_photo' => $user['profile_photo'],
                    'role' => $this->userModel->getRoleById($user['role_id'])
                ];
                header('Location: /');
                exit();
            } else {
                echo "Login gagal!";
            }
        }

        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $full_name = $_POST['full_name'];
            $birth_date = $_POST['birth_date'];
            $gender = $_POST['gender'];
            $role_id = $_POST['role_id'] ?? 3;
            $request_status = 'none';


            // Validasi gender
            if ($gender !== 'M' && $gender !== 'F') {
                die("Gender yang dipilih tidak valid");
            }       

            // Cek dan buat folder uploads jika belum ada
            $uploadDir = __DIR__ . '/../../uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Proses Upload Foto (Opsional)
            $profile_photo = NULL;
            if (!empty($_FILES['profile_photo']['name'])) {
                $file_name = time() . '_' . basename($_FILES["profile_photo"]["name"]);
                $target_file = $uploadDir . $file_name;

                if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
                    $profile_photo = 'uploads/' . $file_name; // Simpan path relatif
                }
            }

            $result = $this->userModel->register($username, $email, $password, $full_name, $birth_date, $gender, $profile_photo, $role_id, $request_status);
            
        if ($result) {
            header('Location: /login');
            exit();
        } else {
            header('Location: /login');
            exit();
            echo "Registrasi gagal!";
        }
    }

        require_once __DIR__ . '/../views/auth/register.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /');
    }
}
