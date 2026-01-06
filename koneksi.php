<?php
$conn = mysqli_connect("localhost", "root", "", "db_porotofolio");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>