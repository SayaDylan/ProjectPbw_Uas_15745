<?php
session_start();
if (!isset($_SESSION['status_login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Terima Kasih!</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .success-card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center; max-width: 400px; }
        .icon { font-size: 60px; color: #28a745; margin-bottom: 20px; }
        h1 { color: #333; margin-bottom: 10px; }
        p { color: #666; line-height: 1.6; margin-bottom: 30px; }
        .btn-home { background: #306497; color: white; padding: 12px 25px; text-decoration: none; border-radius: 8px; font-weight: bold; transition: 0.3s; }
        .btn-home:hover { background: #244d75; }
    </style>
</head>
<body>

    <div class="success-card">
        <div class="icon">✔</div>
        <h1>Pesan Terkirim!</h1>
        <p>Terima kasih sudah menghubungi saya. Pesanan jasa Anda telah berhasil masuk ke sistem dan akan segera saya proses.</p>
        <a href="index.php" class="btn-home">Kembali ke Beranda</a>
    </div>

</body>
</html>