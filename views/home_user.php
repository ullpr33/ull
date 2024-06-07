<?php

require '../config/koneksi.php';
require "../config/constant.php";
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login
    header("Location: login.html");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran</title>
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

        img {
            margin: 10px; /* Jarak 10px di semua sisi */
        }
    </style>
</head>
<body>
<?php include "../components/navbar_user.php" ?>
<?php include "../components/session.php";?>

<!-- Tambahkan formulir pembayaran atau informasi pembayaran di sini -->
<div class="container">
    <h2>Welcome to Couple Photoshoot</h2>
    <p>
        Layanan pemesanan photoshoot kami menyediakan berbagai paket untuk kebutuhan fotografi moment penting Anda. Dengan tim profesional kami, kami akan membuat pengalaman sesi foto Anda menjadi tak terlupakan.
    </p>
    <h2>Paket yang Tersedia</h2>
    <ul>
        <li><em>ENGAGEMENT</em></li>
        <img src="img/lov.jpeg" width="200" height="200">
        <img src="img/lov.jpeg" width="200" height="200">
        <img src="img/lov.jpeg" width="200" height="200">
        
        <li><em>PREWEDDING</em></li>
        <img src="img/lov.jpeg" width="200" height="200">
        <img src="img/lov.jpeg" width="200" height="200">
        <img src="img/lov.jpeg" width="200" height="200">

        <li><em>WEDDING</em></li>
        <img src="img/lov.jpeg" width="200" height="200">
        <img src="img/lov.jpeg" width="200" height="200">
        <img src="img/lov.jpeg" width="200" height="200">

        <li><em>MATERNITY</em></li>
        <img src="img/love.jpeg" width="200" height="200">
        <img src="img/love.jpeg" width="200" height="200">
        <img src="img/love.jpeg" width="200" height="200">
    </ul>
    <p>
       <em>ABADIKAN MOMEN BAHAGIA ANDA SEINDAH MUNGKIN</em>
    </p>
</div>
</body>
</html>
