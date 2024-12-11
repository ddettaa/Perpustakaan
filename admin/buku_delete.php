<?php
session_start();
require_once '../backend/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM buku WHERE id_buku = ?");
$stmt->execute([$id]);

header('Location: buku.php');
?>
