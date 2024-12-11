<?php
session_start();
require_once '../backend/config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $id_kategori = $_POST['id_kategori'];

    $stmt = $conn->prepare("INSERT INTO buku (id_buku, judul, penulis, penerbit, tahun_terbit, id_kategori) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$id_buku, $judul, $penulis, $penerbit, $tahun_terbit, $id_kategori]);
    header('Location: buku.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>
<body>
    <h1>Tambah Buku</h1>
    <form method="POST">
        <label for="id_buku">Id Buku</label><br>
        <input type="text" id="id_buku" name="id_buku" required><br>
        <label for="judul">Judul</label><br>
        <input type="text" id="judul" name="judul" required><br>
        <label for="penulis">Penulis</label><br>
        <input type="text" id="penulis" name="penulis" required><br>
        <label for="penerbit">Penerbit</label><br>
        <input type="text" id="penerbit" name="penerbit" required><br>
        <label for="tahun_terbit">Tahun Terbit</label><br>
        <input type="text" id="tahun_terbit" name="tahun_terbit" required><br>
        <label for="id_kategori">Id Kategori</label><br>
        <input type="text" id="id_kategori" name="id_kategori" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
