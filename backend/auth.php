<?php
session_start();
require_once 'config.php';

// Cek apakah form login sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password']; // Menggunakan password asli, tanpa md5

    // Query untuk mengambil data user berdasarkan username
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Cek apakah user ditemukan
    if ($user) {
        // Verifikasi password yang diinput dengan yang ada di database
        if (password_verify($password, $user['password'])) {
            // Jika password benar, simpan data user ke session
            $_SESSION['user'] = $user;

            // Redirect berdasarkan role user
            if ($user['role'] == 'admin') {
                header('Location: ../admin/index.php');
                exit; // Jangan lupa untuk menghentikan eksekusi lebih lanjut setelah header
            } elseif ($user['role'] == 'petugas') {
                header('Location: ../petugas/index.php');
                exit;
            }
        } else {
            // Jika password salah
            echo "<script>alert('Username atau password salah!');</script>";
        }
    } else {
        // Jika username tidak ditemukan
        echo "<script>alert('Username atau password salah!');</script>";
    }
}
?>