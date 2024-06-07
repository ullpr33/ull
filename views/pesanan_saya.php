<?php
session_start();
require '../config/koneksi.php';
require "../config/constant.php";

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT b.booking_id, b.nama_pelanggan, b.kontak, b.email, b.tanggal, p.nama_jenis, b.harga, b.status FROM bookings b JOIN daftar_photoshoots p ON b.jenis_photoshoot_id = p.daftar_photoshoot_id WHERE b.user_id = ? AND b.status != 'Dibatalkan'");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();


?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya</title>
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
     /* CSS untuk styling navigasi */
     nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        /* CSS untuk clear floating */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
       
    </style>
</head>
<body>
    
<?php include "../components/navbar_user.php" ?>
<h2>Pesanan Saya</h2>
<table>
    <tr>
        <th>Nama Pelanggan</th>
        <th>Kontak HP</th>
        <th>Email</th>
        <th>Tanggal</th>
        <th>Jenis Photoshoot</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nama_pelanggan']) . "</td>";
            echo "<td>" . htmlspecialchars($row['kontak']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama_jenis']) . "</td>";
            echo "<td>Rp " . number_format($row['harga']) . "</td>";
            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
            echo "<td><a href='detail_pemesanan.php?booking_id=" . $row['booking_id'] . "'>Detail</a>";
            if ($row['status'] != 'Dibatalkan') {
                echo " | <a href='cancel_order.php?booking_id=" . $row['booking_id'] . "'>Batalkan</a>";
            }
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>Tidak ada pesanan.</td></tr>";
    }

    $stmt->close();
    $conn->close();
    ?>
</table>
</body>
</html>
