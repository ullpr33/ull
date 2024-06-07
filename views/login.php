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
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <div class="container">
    <h2>Silakan Masuk</h2>
    <form action="<?= BASE_URL . "/controllers/proses_login"?>" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Kata Sandi:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Masuk">
    </form>
    <p>Belum punya akun? <a href="<?= BASE_URL . "/views/register"?>">Daftar di sini</a>.</p>
    </div>
</body>
</html>
