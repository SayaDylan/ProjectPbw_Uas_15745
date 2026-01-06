<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password']; 

    // Langkah 1: Cek apakah username sudah ada di database agar tidak ganda
    $cek_user = mysqli_query($conn, "SELECT * FROM users WHERE username='$user'");
    
    if (mysqli_num_rows($cek_user) > 0) {
        echo "<script>alert('Username sudah digunakan, silakan pilih nama lain!');</script>";
    } else {
        // Langkah 2: Masukkan data ke tabel users
        $query = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";
        $insert = mysqli_query($conn, $query);

        if ($insert) {
            echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='login.php';</script>";
        } else {
            echo "Gagal mendaftar: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun Baru</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #306497; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .reg-card { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); width: 320px; text-align: center; }
        h2 { color: #333; margin-bottom: 20px; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #28a745; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; width: 100%; }
        button:hover { background: #218838; }
        .footer-text { margin-top: 20px; font-size: 14px; color: #666; }
        .footer-text a { color: #007BFF; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="reg-card">
        <h2>DAFTAR AKUN</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email Aktif" required>
            <input type="password" name="password" placeholder="Buat Password" required>
            <button type="submit" name="register">Daftar Sekarang</button>
        </form>
        <div class="footer-text">
            Sudah punya akun? <a href="login.php">Login di sini</a>
        </div>
    </div>
</body>
</html>