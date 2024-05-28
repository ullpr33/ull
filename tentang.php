<?php require_once('koneksi.php'); ?>
<?php require_once('koneksi.php'); ?>
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
    <?php include_once('header.php'); ?>
    <div class="container">
        <p>Kami adalah tim fotografer profesional yang menyediakan layanan pemesanan photoshoot untuk berbagai kebutuhan.</p>
    </div>
</body>
</html>