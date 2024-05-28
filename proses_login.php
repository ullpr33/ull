<?php
session_start();

// Koneksi ke database
require_once('koneksi.php');

// Mendapatkan data yang dikirimkan melalui form
$email = $_POST['email'];
$password = $_POST['password'];

// Mencari pengguna berdasarkan email
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Memeriksa apakah pengguna ditemukan
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    // Memverifikasi kata sandi
    if (password_verify($password, $user['password'])) {
        // Menyimpan data pengguna dalam session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];

        // Mengarahkan ke halaman pemesanan
        header("Location: booking.php");
        exit;
    } else {
        echo "Kata sandi salah. Silakan coba lagi.";
    }
} else {
    echo "Pengguna tidak ditemukan.";
}

$stmt->close();
$conn->close();
?>
