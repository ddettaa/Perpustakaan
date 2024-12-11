<?php
session_start();
require_once '../backend/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM anggota WHERE id_anggota = ?");
$stmt->execute([$id]);

header('Location: anggota.php');
?>
