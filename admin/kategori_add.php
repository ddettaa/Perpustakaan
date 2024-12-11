<?php
session_start();
require_once '../backend/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];
  
    $stmt = $conn->prepare("INSERT INTO kategori (id_kategori, nama_kategori) VALUES (?, ?)");
    $stmt->execute([$id_kategori, $nama_kategori]);
    header('Location: kategori.php');
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
        <label for="id_kategori">Id Kategori</label><br>
        <input type="text" id="id_kategori" name="id_kategori" required><br>
        <label for="nama_kategori">Nama Kategori</label><br>
        <input type="text" id="nama_kategori" name="nama_kategori" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
