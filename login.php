<?php
session_start();
include 'koneksi.php'; 

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];

    // Mencari user di database berdasarkan username DAN email
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' AND email='$email'");
    
    if (mysqli_num_rows($query) === 1) {
        $row = mysqli_fetch_assoc($query);
        
        // Menyamakan password teks biasa
        if ($pass === $row['password']) {
            $_SESSION['status_login'] = true;
            $_SESSION['user_name'] = $row['username'];
            header("Location: index.php");
            exit;
        }
    }
    $error = "Data login salah! Periksa kembali.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portofolio</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #306497; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); width: 320px; text-align: center; }
        h2 { color: #333; margin-bottom: 20px; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #28a745; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; width: 100%; transition: 0.3s; }
        button:hover { background: #218838; }
        .error { color: red; font-size: 14px; margin-bottom: 10px; }
        .footer-text { margin-top: 20px; font-size: 14px; color: #666; }
        .footer-text a { color: #007BFF; text-decoration: none; font-weight: bold; }
        .footer-text a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>MASUK</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Masuk</button>
        </form>

        <div class="footer-text">
            Belum punya akun? <a href="register.php">Daftar Akun Baru</a>
        </div>
    </div>
</body>
</html>