<?php
session_start();
require_once('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    // Masukkan data pembayaran ke tabel payments
    $stmt = $conn->prepare("INSERT INTO payments (booking_id, metode_pembayaran, status) VALUES (?, ?, 'pending')");
    $stmt->bind_param("is", $booking_id, $metode_pembayaran);

    if ($stmt->execute()) {
        // Redirect ke halaman konfirmasi atau halaman lain yang diinginkan
        header("Location: konfirmasi_pembayaran.php?booking_id=" . $booking_id);
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
