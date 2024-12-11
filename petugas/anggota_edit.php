<?php
session_start();
require_once '../backend/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM anggota WHERE id_anggota = ?");
$stmt->execute([$id]);
$anggota= $stmt->fetch(PDO::FETCH_ASSOC);
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $id_anggota = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $stmt = $conn->prepare("UPDATE anggota SET nama = ?, alamat = ?, no_telepon = ? WHERE id_anggota = ?");
    $stmt->execute([$nama, $alamat, $no_telepon, $id_anggota]);
    header("Location: anggota.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>
<body>
    <h1>Edit Anggota</h1>
    <form method="POST">
        <input type="hidden" name="id_anggota" value="<?= $anggota['id_anggota'] ?>">
        <label for="nama">Nama</label><br>
        <input type="text" id="nama" name="nama" value="<?= $anggota['nama'] ?>" required><br>
        <label for="alamat">Alamat</label><br>
        <input type="text" id="alamat" name="alamat" value="<?= $anggota['alamat'] ?>" required><br>
        <label for="no_telepon">No Telepon</label><br>
        <input type="text" id="no_telepon" name="no_telepon" value="<?= $anggota['no_telepon'] ?>" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
