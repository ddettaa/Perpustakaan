<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="../assets/css/frontpage.css">
    <script src="../assets/js/frontpage.js" defer></script>
</head>
<body>
    <header>
        <h1>Selamat Datang di Sistem Informasi Perpustakaan</h1>
    </header>
    
    <nav>
        <div class="nav-container">
            <a href="index.php" class="nav-link">Home</a>
            <a href="../about/About.html" class="nav-link">Tentang Pembuat</a>
        </div>
    </nav>
    
    <section class="hero">
        <h2>Informasi Perpustakaan</h2>
        <p>Kelola dan akses berbagai informasi perpustakaan dengan mudah. Temukan buku favorit Anda, cek status peminjaman, dan banyak lagi.</p>
        <button onclick="window.location.href='login.php'">Login</button>
    </section>
    
    <footer>
        <p>&copy; 2024 Sistem Informasi Perpustakaan</p>
    </footer>
</body>
</html>
