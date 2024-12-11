<?php
session_start();
require_once '../backend/config.php'; // Koneksi database

// Cek autentikasi admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'petugas') {
    header('Location: ../frontpage/index.php');
    exit;
}

// Ambil data buku
$stmt = $conn->query("SELECT * FROM peminjaman");
$peminjaman = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
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
    </nav a>
    
    <section class="content">
        <div class="table-container">
            <a href="peminjaman_add.php" class="btn add">Tambah Peminjaman</a>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Id Peminjaman</th>
                        <th>Id Anggota</th>
                        <th>Id Petugas</th>
                        <th>Id Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($peminjaman as $row): ?>
                        <tr>
                            <td><?= $row['id_peminjaman'] ?></td>
                            <td><?= $row['id_anggota'] ?></td>
                            <td><?= $row['id_buku']?> </td>
                            <td><?= $row['id_petugas'] ?></td>
                            <td><?= $row['tanggal_pinjam'] ?></td>
                            <td><?= $row['tanggal_kembali'] ?></td>
                            <td>
                                <a href="peminjaman_edit.php?id=<?= $row['id_peminjaman'] ?>" class="btn edit">Edit</a>
                                <a href="peminjaman_delete.php?id=<?= $row['id_peminjaman'] ?>" class="btn delete" onclick="return">Hapus</a>
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
