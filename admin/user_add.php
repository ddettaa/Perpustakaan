<?php
session_start();
require_once '../backend/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $role = $_POST['role'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $conn->prepare("INSERT INTO user (id_user, username, password, nama, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$id_user, $username, $password, $nama, $role]);
    header("Location: user.php");
    exit; // Pastikan tidak ada output setelah ini
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>
<body>
    <h1>Tambah Pengguna</h1>
    <form method="POST">
        <label for="id_user">Id User</label><br>
        <input type="text" id="id_user" name="id_user" required><br>
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="nama">Nama</label><br>
        <input type="text" id="nama" name="nama" required><br>
        <label for="role">Role</label><br>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
