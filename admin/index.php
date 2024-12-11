<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: ../frontpage/index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* Reset & Global */
        .cards {
            display: content;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            max-width: 1000px;
            width: 100%;
            margin-top: 30px;
        }

        .card {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        .card a {
            text-decoration: none;
            color: #000;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<nav>
    <a href="index.php">Home</a> |
    <a href="buku.php">Data Buku</a> |
    <a href="kategori.php">Kategori Buku</a> |
    <a href="peminjaman.php">Data Peminjaman</a> |
    <a href="anggota.php">Data Anggota</a> |
    <a href="user.php">Data Pengguna</a> |
    <a href="../frontpage/index.php">Logout</a>
</nav>

<div class="container">
    <h1>Selamat datang, Admin!</h1>
    <p>Kelola sistem perpustakaan Anda dengan mudah.</p>

    <div class="cards">
        <div class="card">
            <a href="buku.php">📚 Data Buku</a>
        </div>
        <div class="card">
            <a href="kategori.php">📂 Kategori Buku</a>
        </div>
        <div class="card">
            <a href="peminjaman.php">📜 Data Peminjaman</a>
        </div>
        <div class="card">
            <a href="anggota.php">👥 Data Anggota</a>
        </div>
        <div class="card">
            <a href="user.php">🔑 Data Pengguna</a>
        </div>
        <div class="card">
            <a href="../frontpage/index.php">🚪 Logout</a>
        </div>
    </div>
</div>
</body>
</html>
