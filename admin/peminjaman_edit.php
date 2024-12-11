<?php
session_start();
require_once '../backend/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
$stmt->execute([$id]);
$peminjaman = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $id_peminjamn = $_POST['id_peminjaman'];
    $id_anggota = $_POST['id_anggota'];
    $id_petugas = $_POST['id_petugas'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $stmt = $conn->prepare("UPDATE peminjaman SET id_anggota = ?, id_petugas = ?, tanggal_pinjam = ?, tanggal_kembali = ? WHERE id_peminjaman = ?");
    $stmt->execute([$id_anggota, $id_petugas, $tanggal_pinjam, $tanggal_kembali, $id_peminjaman]);
    header("Location: peminjaman.php");
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
        <input type="hidden" name="id_peminjaman" value="<?= $peminjaman['id_peminjaman'] ?>">
        <label for="id_anggota">Id Anggota</label><br>
        <input type="text" id="id_anggota" name="id_anggota" value="<?= $peminjaman['id_anggota'] ?>" required><br>
        <label for="id_petugas">Id Petugas</label><br>
        <input type="text" id="id_petugas" name="id_petugas" value="<?= $peminjaman['id_petugas'] ?>" required><br>
        <label for="tanggal_pinjam">Tanggal Pinjam</label><br>
        <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $peminjaman['tanggal_pinjam'] ?>" required><br>
        <label for="tanggal_kembali">Tanggal Kembali</label><br>
        <input type="date" id="tanggal_kembali" name="tanggal_kembali" value="<?= $peminjaman['tanggal_kembali'] ?>" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
