<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
</head>
<body>
    <h2>Registrasi Akun Baru</h2>
    <form action="proses_register.php" method="post">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Kata Sandi:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Daftar">
    </form>
    <p>Sudah memiliki akun? <a href="login.php">Masuk di sini</a>.</p>
</body>
</html>
