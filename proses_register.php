<?php
// Koneksi ke database
require_once('koneksi.php');

// Mendapatkan data yang dikirimkan melalui form
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mengenkripsi kata sandi

// Cek apakah email sudah terdaftar
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Email sudah terdaftar. Silakan gunakan email lain atau masuk ke akun Anda.";
} else {
    // Insert data ke database
    $sql_insert = "INSERT INTO users (nama, email, password) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("sss", $nama, $email, $password);
    
    if ($stmt_insert->execute()) {
        echo "Pendaftaran berhasil. Silakan masuk dengan akun Anda.";
        // Redirect to login page
        header("Location: login.php");
        exit();
    } else {
        echo "Terjadi kesalahan. Silakan coba lagi.";
    }
}

$stmt->close();
$stmt_insert->close();
$conn->close();
?>
