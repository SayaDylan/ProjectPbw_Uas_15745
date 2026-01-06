<?php
session_start();
include 'koneksi.php';

// Proteksi: Harus login dulu untuk memesan
if (!isset($_SESSION['status_login'])) {
    header("Location: login.php");
    exit;
}

// Mengambil jenis jasa dari URL (fotografi/videografi)
$jasa_pilihan = isset($_GET['jasa']) ? $_GET['jasa'] : 'Umum';

if (isset($_POST['submit_pesanan'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_pelanggan']);
    $email = mysqli_real_escape_string($conn, $_POST['email_pelanggan']);
    $jasa = $_POST['jenis_jasa'];
    $kebutuhan = $_POST['kebutuhan']; // Menangkap pilihan kebutuhan

    // Query simpan ke database (Pastikan sudah melakukan ALTER TABLE di SQL sebelumnya)
    $query = "INSERT INTO pemesanan (nama_pelanggan, email_pelanggan, jenis_jasa, kebutuhan) 
              VALUES ('$nama', '$email', '$jasa', '$kebutuhan')";
    
    $insert = mysqli_query($conn, $query);

    if ($insert) {
        // Jika berhasil, langsung pindah ke halaman terimakasih
        header("Location: terimakasih.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Jasa</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .form-box { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); width: 400px; }
        h2 { color: #306497; text-align: center; margin-bottom: 20px; }
        label { font-weight: bold; display: block; margin-top: 15px; color: #333; }
        input, select { width: 100%; padding: 12px; margin-top: 5px; border: 1px solid #ccc; border-radius: 8px; box-sizing: border-box; font-size: 14px; }
        .btn-kirim { width: 100%; padding: 12px; background: #28a745; color: white; border: none; border-radius: 8px; cursor: pointer; margin-top: 25px; font-weight: bold; font-size: 16px; width: 100%; transition: 0.3s; }
        .btn-kirim:hover { background: #218838; }
        .btn-batal { display: block; text-align: center; margin-top: 15px; color: #d9534f; text-decoration: none; font-size: 14px; }
        .btn-batal:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Form Pesan Jasa: <?php echo ucfirst($jasa_pilihan); ?></h2>
    <form method="POST">
        <input type="hidden" name="jenis_jasa" value="<?php echo $jasa_pilihan; ?>">
        
        <label>Nama Lengkap</label>
        <input type="text" name="nama_pelanggan" placeholder="Masukkan nama Anda" required>
        
        <label>Email Aktif</label>
        <input type="email" name="email_pelanggan" placeholder="nama@email.com" required>
        
        <label>Pilih Kebutuhan</label>
        <select name="kebutuhan" required>
            <option value="">-- Pilih Kebutuhan --</option>
            <option value="Dokumentasi Produk">Dokumentasi Produk</option>
            <option value="Cinematic Video">Cinematic Video</option>
            <option value="Konten Promosi">Konten Promosi</option>
            <option value="Dokumentasi Event">Dokumentasi Event</option>
            <option value="Lainnya">Lainnya</option>
        </select>
        
        <button type="submit" name="submit_pesanan" class="btn-kirim">Konfirmasi Pesanan</button>
        <a href="index.php" class="btn-batal">Batal & Kembali</a>
    </form>
</div>

</body>
</html>