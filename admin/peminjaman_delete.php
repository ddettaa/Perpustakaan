<?php
session_start();
require_once '../backend/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?");
$stmt->execute([$id]);

header('Location: peminjaman.php');
?>
