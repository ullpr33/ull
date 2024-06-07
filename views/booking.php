<?php

require '../config/koneksi.php';
require "../config/constant.php";
session_start();


// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login
    header("Location: " . BASE_URL . "/views/login");
    return;
}


$query = "SELECT daftar_photoshoot_id, nama_jenis, harga FROM daftar_photoshoots";
$result = $conn->query($query);

$options = '';
while ($row = $result->fetch_assoc()) {
    $options .= '<option value="' . $row['daftar_photoshoot_id'] . '" data-price="' . $row['harga'] . '">' . $row['nama_jenis'] . ' - Rp ' . number_format($row['harga'], 0, ',', '.') . '</option>';
}

$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran</title>
</head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <style>
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
<?php include "../components/session.php";?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Photoshoot</title>
</head>
<body>
    <h2>Form Pemesanan Photoshoot</h2>
    <form action="<?= BASE_URL . "/controllers/proses" ?>" method="post">
        <label for="nama_pelanggan">Nama Pelanggan:</label><br>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" required><br><br>

        <label for="kontak">Kontak HP:</label><br>
        <input type="text" id="kontak" name="kontak" required><br><br>

        <label for="email">E-Mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="tanggal">Tanggal (Format: YYYY-MM-DD):</label><br>
        <input type="date" id="tanggal" name="tanggal" required><br><br>

        <label for="jenis_photoshoot">Jenis Photoshoot:</label><br>
        <select id="jenis_photoshoot" name="jenis_photoshoot" required>
            <?= $options ?>
        </select><br><br>

        <input type="submit" value="Pesan Sekarang">
    </form>
</body>
</html>
