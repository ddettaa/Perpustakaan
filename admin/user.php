<?php
session_start();
require_once '../backend/config.php'; // Koneksi database

// Cek autentikasi admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: ../frontpage/index.php');
    exit;
}

// Ambil data buku
$stmt = $conn->query("SELECT * FROM user");
$pengguna = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>
<body>
    <nav>
        <a href="index.php">Home</a> |
        <a href="buku.php">Data Buku</a> |
    <a href="Kategori.php">Kategori Buku</a> |
    <a href="Peminjaman.php">Data Peminjaman</a> |
    <a href="anggota.php">Data Anggota</a> |
    <a href="User.php">Data Pengguna</a> |
        <a href="../frontpage/index.php">Logout</a>
    </nav a>
    
    <section class="content">
        <div class="table-container">
            <a href="user_add.php" class="btn add">Tambah Pengguna</a>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Id User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
    <?php foreach ($pengguna as $row): ?>
        <tr>
            <td><?= $row['id_user'] ?></td>
            <td><?= $row['username'] ?></td>
            <td>
                <span class="password-field" data-password="<?= $row['password'] ?>">
                <?= str_repeat('•', strlen($row['password'])) ?></span>
                <span class="toggle-password" data-password="<?= $row['password'] ?>">
                    <img src="../assets/icons/buka.svg" alt="Show Password" class="icon-eye" />
                </span>
            </td>
            <td><?= $row['role'] ?></td>
            <td>
                <a href="user_edit.php?id=<?= $row['id_user'] ?>" class="btn edit">Edit</a>
                <a href="user_delete.php?id=<?= $row['id_user'] ?>" class="btn delete" onclick="return confirm('Yakin ingin menghapus pengguna ini?');">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

                </tbody>
            </table>
        </div>
    </section>
    
    <footer>
        <p>&copy; 2024 Sistem Informasi Perpustakaan</p>
    </footer>
</body>
</html>
