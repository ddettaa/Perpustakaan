<?php
require_once '../backend/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <script src="../assets/js/frontpage.js" defer></script>
</head>
<body>
    <header>
        <h1>Silahkan Login</h1>
    </header>

    <section class="login-container">
        <form method="POST" class="login-form">
            <h2>Welcome</h2>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Sistem Informasi Perpustakaan</p>
    </footer>
</body>
</html>
