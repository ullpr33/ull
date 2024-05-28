<?php
session_start();
require_once('koneksi.php');

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Update status pesanan menjadi "Dibatalkan"
    $stmt = $conn->prepare("UPDATE bookings SET status = 'Dibatalkan' WHERE booking_id = ?");
    $stmt->bind_param("i", $booking_id);
    if ($stmt->execute()) {
        $_SESSION['message'] = "Pesanan berhasil dibatalkan.";
    } else {
        $_SESSION['message'] = "Terjadi kesalahan saat membatalkan pesanan.";
    }
    $stmt->close();

    $conn->close();

    header("Location: pesanan_saya.php");
    exit();
} else {
    $_SESSION['message'] = "ID pesanan tidak ditemukan.";
    header("Location: pesanan_saya.php");
    exit();
}
?>
