<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/UserModel.php';

class AuthController extends Database
{

    public function loginForm()
    {
        include __DIR__ . '/../views/auth/login.php';
    }

    public function login()
    {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: index.php?controller=item&action=index");
        } else {
            echo "<script>alert('Login gagal! Username atau password salah'); 
        window.location='index.php?controller=auth&action=loginForm';</script>";
        }
    }


    public function profile()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=loginForm");
            exit;
        }

        $userModel = new UserModel();
        $user = $userModel->getUserById($_SESSION['user_id']);

        include __DIR__ . '/../views/auth/profile.php';
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();

        session_start();

        header("Location: index.php?controller=dashboard&action=index");
        exit();
    }
}
