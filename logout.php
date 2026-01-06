<?php
session_start();
session_destroy(); // Menghapus semua jejak login
header("Location: login.php"); // Lempar balik ke login
exit;
?>