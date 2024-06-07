<?php
session_start();
require '../config/koneksi.php';
require "../config/constant.php";

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "/views/login");
    return;
}

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Ambil detail pemesanan berdasarkan booking_id
    $stmt = $conn->prepare("SELECT b.nama_pelanggan, b.kontak, b.email, b.tanggal, p.nama_jenis, b.harga FROM bookings b JOIN daftar_photoshoots p ON b.jenis_photoshoot_id = p.daftar_photoshoot_id WHERE b.booking_id = ?");
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama_pelanggan = $row['nama_pelanggan'];
        $kontak = $row['kontak'];
        $email = $row['email'];
        $tanggal = $row['tanggal'];
        $jenis_photoshoot = $row['nama_jenis'];
        $harga = $row['harga'];
    } else {
        header("Location: " . BASE_URL . "/views/pesanan_saya");
        exit();
    }

    $stmt->close();
} else {
    header("Location: " . BASE_URL . "/views/pesanan_saya");
    exit();
}

$conn->close();
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

<h2>Halaman Pembayaran</h2>
</body>
</html>
    <!-- Tambahkan formulir pembayaran atau informasi pembayaran di sini -->

   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Detail Pembayaran</h2>
    <table>
        <tr><th colspan='2'>Detail Pemesanan</th></tr>
        <tr><td>Nama Pelanggan:</td><td><?= htmlspecialchars($nama_pelanggan) ?></td></tr>
        <tr><td>Kontak HP:</td><td><?= htmlspecialchars($kontak) ?></td></tr>
        <tr><td>Email:</td><td><?= htmlspecialchars($email) ?></td></tr>
        <tr><td>Tanggal:</td><td><?= htmlspecialchars($tanggal) ?></td></tr>
        <tr><td>Jenis Photoshoot:</td><td><?= htmlspecialchars($jenis_photoshoot) ?></td></tr>
        <tr><td >Harga:</td><td id="amount">Rp <?= number_format($harga, 0, ',', '.') ?></td></tr>
    </table>
    <br>
    <form action="<?= BASE_URL . "/controllers/proses_pembayaran"?>" method="post">
        <input type="hidden" name="booking_id" value="<?= $booking_id ?>">
        <label for="metode_pembayaran">Metode Pembayaran:</label><br>
        <select  id="metode_pembayaran" name="metode_pembayaran" required>
        </select><br><br>
        <input type="submit" value="Lanjutkan Pembayaran">
    </form>
    <button onclick="window.location.href='<?= BASE_URL . '/controllers/cancel_order?booking_id=' . $booking_id?>'">Batal Pembayaran</button>



    <script>
       const fetchPaymentMethod = async() => {
            const amount = <?= $harga?>;
            const response = await fetch("https://api-sitiket.saddamsatria.my.id/api/v1/external/payment-methods", {
                method:"POST",
                body: JSON.stringify({
                    totalTransaction :amount.toString()
                }),
                headers:{ 
                    "Authorization" : "Bearer ownernyaganteng",
                    "access-key": "sitiket-app",
                    "Content-Type": "application/json"
                }
            })

            const responseJson = await response.json()
            const responseData = responseJson.data 

            const paymentMethods = responseData.paymentMethods
            const paymentMethodParentElem= document.getElementById("metode_pembayaran")

            paymentMethodParentElem.innerHTML = paymentMethods.map((paymentMethod) => {
                return `<option value="${paymentMethod.paymentMethodCode}">${paymentMethod.paymentMethodName}</option>`
            });
           
       }
       fetchPaymentMethod()
    </script>

</body>
</html>
