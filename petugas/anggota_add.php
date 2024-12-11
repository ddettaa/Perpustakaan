<?php
session_start();
require_once '../backend/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $id_anggota = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $stmt = $conn->prepare("INSERT INTO anggota (id_anggota, nama, alamat, no_telepon) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nama, $alamat, $no_telepon, $id_anggota]);
    header("Location: anggota.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Anggota</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>
<body>
    <h1>Tambah Anggota</h1>
    <form method="POST">
    <label for="id_anggota">Id Anggota</label><br>
        <input type="text" id="id_anggota" name="id_anggota" required><br>
        <label for="nama">Nama</label><br>
        <input type="text" id="nama" name="nama" required><br>
        <label for="alamat">Alamat</label><br>
        <input type="text" id="alamat" name="alamat" required><br>
        <label for="no_telepon">No Telepon</label><br>
        <input type="text" id="no_telepon" name="no_telepon" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
