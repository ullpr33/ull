<?php
require '../config/koneksi.php';
require "../config/constant.php";
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ". BASE_URL . "/views/login");
    exit();
}

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Ambil detail pemesanan berdasarkan booking_id
    $stmt = $conn->prepare("SELECT b.nama_pelanggan, b.kontak, b.email, b.tanggal, p.nama_jenis, b.harga FROM bookings b JOIN daftar_photoshoots p ON b.jenis_photoshoot_id = p.daftar_photoshoot_id WHERE b.booking_id = ?");
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama_pelanggan = $row['nama_pelanggan'];
        $kontak = $row['kontak'];
        $email = $row['email'];
        $tanggal = $row['tanggal'];
        $jenis_photoshoot = $row['nama_jenis'];
        $harga = $row['harga'];
    } else {
        header("Location: " . BASE_URL . "/views/pesanan_saya");
        return;
    }

    $stmt->close();
} else {
    echo "Booking ID tidak ditemukan.";
    return;
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan</title>
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
    <h2>Detail Pemesanan</h2>
    <table>
        <tr><th colspan='2'>Detail Pemesanan</th></tr>
        <tr><td>Nama Pelanggan:</td><td><?= htmlspecialchars($nama_pelanggan) ?></td></tr>
        <tr><td>Kontak HP:</td><td><?= htmlspecialchars($kontak) ?></td></tr>
        <tr><td>Email:</td><td><?= htmlspecialchars($email) ?></td></tr>
        <tr><td>Tanggal:</td><td><?= htmlspecialchars($tanggal) ?></td></tr>
        <tr><td>Jenis Photoshoot:</td><td><?= htmlspecialchars($jenis_photoshoot) ?></td></tr>
        <tr><td>Harga:</td><td>Rp <?= number_format($harga, 0, ',', '.') ?></td></tr>
    </table>
    <br>
    <button onclick="window.location.href='<?= BASE_URL . '/views/halaman_pembayaran?booking_id=' . $booking_id?>'">Lanjutkan Pembayaran</button>
    <button onclick="window.location.href='<?= BASE_URL . '/controllers/cancel_order?booking_id=' . $booking_id?>'">Batal Pembayaran</button>
</body>
</html>
