<?php
session_start();
require_once '../backend/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM user WHERE id_user = ?");
$stmt->execute([$id]);

header('Location: user.php');
?>
