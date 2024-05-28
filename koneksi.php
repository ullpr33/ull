<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "photoshoot_booking";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect);
}