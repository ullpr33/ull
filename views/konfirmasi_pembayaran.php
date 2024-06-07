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

    // Ambil detail pembayaran berdasarkan booking_id
    $stmt = $conn->prepare("SELECT p.metode_pembayaran, p.status, b.harga FROM payments p JOIN bookings b ON p.booking_id = b.booking_id WHERE p.booking_id = ?");
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $metode_pembayaran = $row['metode_pembayaran'];
        $status = $row['status'];
        $harga = $row['harga'];
    } else {
        echo "Pembayaran tidak ditemukan.";
        exit();
    }

    $stmt->close();
} else {
    echo "Booking ID tidak ditemukan.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Konfirmasi Pembayaran</h2>
    <table>
        <tr><th>Metode Pembayaran</th><td><?= htmlspecialchars($metode_pembayaran) ?></td></tr>
        <tr><th>Status</th><td><?= htmlspecialchars($status) ?></td></tr>
        <tr><th>Jumlah</th><td>Rp <?= number_format($harga, 0, ',', '.') ?></td></tr>
    </table>
    <br>
    <p>Terima kasih telah melakukan pemesanan. Silakan melakukan pembayaran sesuai dengan metode yang dipilih.</p>
</body>
</html>
