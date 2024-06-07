<?php 

require 'config/koneksi.php'; 
require "config/constant.php";
include 'components/header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav {
            background-color: #444;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            margin: 0 5px;
        }
        nav a:hover {
            background-color: #555;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>COUPLE PHOTOSHOOT</h1>
    </header>
    <div class="container">
        <h2>Welcome to Couple Photoshoot</h2>
        <p>
            Layanan pemesanan photoshoot kami menyediakan berbagai paket untuk kebutuhan fotografi moment penting Anda. Dengan tim profesional kami, kami akan membuat pengalaman sesi foto Anda menjadi tak terlupakan.
        </p>
        <h2>Paket yang Tersedia</h2>
        <ul>
        <style>
        img {
            margin: 10px; /* Jarak 10px di semua sisi */
        }
         </style>
            <li><em>ENGAGEMENT</em></li>
            <img src="img/loe.jpeg"  width="200" height="200">
            <img src="img/lve.jpeg"  width="200" height="200">
            <img src="img/ove.jpeg"  width="200" height="200">
            
            <li><em>PREWEDDING</em></li>
            <img src="img/lve.jpeg"  width="200" height="200">
            <img src="img/lve.jpeg"  width="200" height="200">
            <img src="img/lve.jpeg"  width="200" height="200">

            <li><em>WEDDING</em></li>
            <img src="img/lo.jpeg"  width="200" height="200">
            <img src="img/loe.jpeg"  width="200" height="200">
            <img src="img/lve.jpeg"  width="200" height="200">

            <li><em>MATTERNITY</em></li>
            <img src="img/lov.jpeg"  width="200" height="200">
            <img src="img/loe.jpeg"  width="200" height="200">
            <img src="img/lve.jpeg"  width="200" height="200">
        </ul>
        <p>
           <em> ABADIKAN MOMEN BAHAGIA ANDA SEINDAH MUNGKIN </em>
        </p>
    </div>
</body>
</html>
