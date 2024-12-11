<?php
session_start();
require_once '../backend/config.php'; // Koneksi database

// Cek autentikasi admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: ../frontpage/index.php');
    exit;
}

// Ambil data buku
$stmt = $conn->query("SELECT * FROM anggota");
$anggota = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <a href="anggota_add.php" class="btn add">Tambah Anggota</a>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Id Anggota</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($anggota as $row): ?>
                        <tr>
                            <td><?= $row['id_anggota'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['no_telepon'] ?></td>
                            <td>
                                <a href="anggota_edit.php?id=<?= $row['id_anggota'] ?>" class="btn edit">Edit</a>
                                <a href="anggota_delete.php?id=<?= $row['id_anggota'] ?>" class="btn delete" onclick="return">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    
    <footer>
        <p>&copy; 2024 Sistem Informasi Perpustakaan</p>
    </footer>
</body>
</html>
