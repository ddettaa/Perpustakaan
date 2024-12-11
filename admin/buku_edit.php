<?php
session_start();
require_once '../backend/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM buku WHERE id_buku = ?");
$stmt->execute([$id]);
$buku = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $id_kategori = $_POST['id_kategori'];

    $stmt = $conn->prepare("UPDATE buku SET judul = ?, penulis = ?, penerbit = ?, tahun_terbit = ?, id_kategori = ? WHERE id_buku = ?");
    $stmt->execute([$judul, $penulis, $penerbit, $tahun_terbit, $id_kategori, $id_buku]);
    header("Location: buku.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>
<body>
    <h1>Edit Buku</h1>
    <form method="POST">
        <input type="hidden" name="id_buku" value="<?= $buku['id_buku'] ?>">
        <label for="judul">Judul</label><br>
        <input type="text" id="judul" name="judul" value="<?= $buku['judul'] ?>" required><br>
        <label for="penulis">Penulis</label><br>
        <input type="text" id="penulis" name="penulis" value="<?= $buku['penulis'] ?>" required><br>
        <label for="penerbit">Penerbit</label><br>
        <input type="text" id="penerbit" name="penerbit" value="<?= $buku['penerbit'] ?>" required><br>
        <label for="tahun_terbit">Tahun Terbit</label><br>
        <input type="text" id="tahun_terbit" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>" required><br>
        <label for="id_kategori">Id Kategori</label><br>
        <input type="text" id="id_kategori" name="id_kategori" value="<?= $buku['id_kategori'] ?>" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
