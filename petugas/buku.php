<?php
session_start();
require_once '../backend/config.php'; // Koneksi database

// Cek autentikasi admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'petugas') {
    header('Location: ../frontpage/index.php');
    exit;
}

// Ambil data buku
$stmt = $conn->query("SELECT * FROM buku");
$buku = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    
    <a href="Peminjaman.php">Data Peminjaman</a> |
    <a href="anggota.php">Data Anggota</a> |
  
        <a href="../frontpage/index.php">Logout</a>
    </nav>
    
    <section class="content">
        <div class="table-container">
            <a href="buku_add.php" class="btn add">Tambah Buku</a>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Id Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Id Katagori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buku as $row): ?>
                        <tr>
                            <td><?= $row['id_buku'] ?></td>
                            <td><?= $row['judul'] ?></td>
                            <td><?= $row['penulis'] ?></td>
                            <td><?= $row['penerbit'] ?></td>
                            <td><?= $row['tahun_terbit'] ?></td>
                            <td><?= $row['id_kategori'] ?></td>
                            <td>
                                <a href="buku_edit.php?id=<?= $row['id_buku'] ?>" class="btn edit">Edit</a>
                                <a href="buku_delete.php?id=<?= $row['id_buku'] ?>" class="btn delete" onclick="return">Hapus</a>
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
