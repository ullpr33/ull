<?php
require '../config/koneksi.php';
require "../config/constant.php";
// Mulai session
session_start();

// Hapus semua data session
session_unset();

// Hancurkan session
session_destroy();

// Redirect ke halaman login
header("Location: " . BASE_URL . "/views/login");
exit();
?>
