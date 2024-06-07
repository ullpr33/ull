<?php 

require '../config/koneksi.php';
require "../config/constant.php";
include '../components/header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
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
        <p>Silakan hubungi kami melalui:</p>
        <ul>
            <li>Email: info@example.com</li>
            <li>Telepon: (123) 456-7890</li>
        </ul>
    </div>
</body>
</html>