<?php
session_start();
session_destroy(); // Hapus semua sesi
session_start(); // Mulai sesi baru agar tidak terjadi error di halaman utama
header("Location: /index.php"); // Arahkan kembali ke halaman utama
exit();
?>
