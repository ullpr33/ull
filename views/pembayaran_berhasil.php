<?php

require '../config/koneksi.php';
require "../config/constant.php";
session_start();


// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login
    header("Location: " . BASE_URL . "/views/login");
}

$paymentCode= $_GET["va"]

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
    <span>pembayaran berhasil</span>
    <span>kode pembayaran: <?=$paymentCode?></span>
</body>
</html>
