<?php
session_start();
require_once '../backend/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM kategori WHERE id_kategori = ?");
$stmt->execute([$id]);
$buku = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $stmt = $conn->prepare("UPDATE kategori SET nama_kategori = ? WHERE id_kategori = ?");
    $stmt->execute([$nama_kategori, $id_kategori]);
    header("Location: kategori.php");
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
        <input type="text" name="id_kategori" value="<?= $buku['id_kategori'] ?>" disable>
        <label for="nama_kategori">Nama Kategori</label><br>
        <input type="text" id="nama_kategori" name="nama_kategori" value="<?= $buku['nama_kategori'] ?>" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
