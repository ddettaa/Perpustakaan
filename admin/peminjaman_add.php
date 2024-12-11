<?php
session_start();
require_once '../backend/config.php'; // Pastikan file config.php berisi koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $id_petugas = $_POST['id_petugas'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    // Format tanggal (optional karena input date sudah default ke yyyy-mm-dd)
    $tanggal_pinjam = date('Y-m-d', strtotime($tanggal_pinjam));
    $tanggal_kembali = date('Y-m-d', strtotime($tanggal_kembali));

    // Query untuk menyimpan data ke tabel 'peminjaman'
    $query = "INSERT INTO peminjaman (id_anggota, id_petugas, tanggal_pinjam, tanggal_kembali, id_buku)
              VALUES ('$id_anggota', '$id_petugas', '$tanggal_pinjam', '$tanggal_kembali', '$id_buku')";
    $conn->exec($query);
    header('Location: peminjaman.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peminjaman</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>
<body>
    <h1>Tambah Peminjaman</h1>
    <form method="POST">
        <label for="id_anggota">Id Anggota</label><br>
        <input type="text" id="id_anggota" name="id_anggota" required><br>

        <label for="id_buku">Id Buku</label><br>
        <input type="text" id="id_buku" name="id_buku" required><br>
        
        <label for="id_petugas">Id Petugas</label><br>
        <input type="text" id="id_petugas" name="id_petugas" required><br>
        
        <label for="tanggal_pinjam">Tanggal Pinjam</label><br>
        <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" required><br>
        
        <label for="tanggal_kembali">Tanggal Kembali</label><br>
        <input type="date" id="tanggal_kembali" name="tanggal_kembali" required><br>
        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
