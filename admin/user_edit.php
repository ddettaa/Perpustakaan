<?php
session_start();
require_once '../backend/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM user WHERE id_user = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE user SET username = ?, nama = ?, password = ?, role = ?  WHERE id_user = ?");
    $stmt->execute([$username, $nama, $password, $role, $id_user]);
    header("Location: user.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
    <style>
        /* Additional styling for the eye icon */
        .eye-icon {
            position: absolute;
            right: 10px;
            top: 12px;
            cursor: pointer;
            font-size: 5px;
            width: 35px;
            
        }
        .password-container {
            position: relative;
        }
    </style>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST">
        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" value="<?= $user['username'] ?>" required><br>
        <label for="nama">Nama</label><br>
        <input type="text" id="nama" name="nama" value="<?= $user['nama'] ?>" required><br>
        <label for="password">Password</label><br>
        <div class="password-container">
            <input type="password" id="password" name="password" value="<?= $user['password'] ?>" required><br>
            <!-- Gambar ikon mata -->
            <img class="eye-icon" id="toggle-password" src="../assets/icons/tutup.svg" onclick="togglePassword()" alt="Toggle password visibility">
        </div><br>
        <label for="role">Role</label><br>
        <select id="role" name="role" required>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="petugas" <?= $user['role'] == 'petugas' ? 'selected' : '' ?>>Petugas</option>
        </select><br>
        <button type="submit">Simpan</button>
    </form>

    <script>
        // Function to toggle password visibility
        function togglePassword() {
            var passwordField = document.getElementById('password');
            var icon = document.getElementById('toggle-password');

            if (passwordField.type === "password") {
                passwordField.type = "text"; // Show password
                icon.src = '../assets/icons/buka.svg'; // Change icon to open eye
            } else {
                passwordField.type = "password"; // Hide password
                icon.src = '../assets/icons/tutup.svg'; // Change icon to closed eye
            }
        }
    </script>
</body>
</html>
