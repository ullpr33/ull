<?php
require '../config/koneksi.php';
require "../config/constant.php";
session_start();


if($_SERVER["REQUEST_METHOD"] != "POST"){

    header("Location: " . BASE_URL . "/views/booking");

    return;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $kontak = $_POST['kontak'];
    $email = $_POST['email'];
    $tanggal = $_POST['tanggal'];
    $jenis_photoshoot_id = $_POST['jenis_photoshoot'];

    // Ambil harga dari database berdasarkan jenis_photoshoot_id
    $stmt = $conn->prepare("SELECT harga FROM daftar_photoshoots WHERE daftar_photoshoot_id = ?");
    $stmt->bind_param("i", $jenis_photoshoot_id);
    $stmt->execute();
    $stmt->bind_result($harga);
    $stmt->fetch();
    $stmt->close();

    // Masukkan data ke tabel bookings
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, nama_pelanggan, kontak, email, tanggal, jenis_photoshoot_id, harga) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssii", $user_id, $nama_pelanggan, $kontak, $email, $tanggal, $jenis_photoshoot_id, $harga);

    if ($stmt->execute()) {
        // Ambil ID dari pemesanan yang baru saja dimasukkan
        $booking_id = $stmt->insert_id;
        $url = BASE_URL . "/views/detail_pemesanan?booking_id=". $booking_id;
        header("Location: " . $url);
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
