<?php
session_start();
require_once '../backend/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM prodi WHERE id_prodi = ?");
$stmt->execute([$id]);

header('Location: prodi.php');
?>
