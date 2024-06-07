<?php
require '../config/koneksi.php';
require "../config/constant.php";
session_start();
$uid = uniqid('', true);
$itemId = uniqid('', true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

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
    }

    // Masukkan data pembayaran ke tabel payments
    // $stmt = $conn->prepare("INSERT INTO payments (booking_id, metode_pembayaran, status) VALUES (?, ?, 'pending')");
    // $stmt->bind_param("is", $booking_id, $metode_pembayaran);

    // if ($stmt->execute()) {
    //     // Redirect ke halaman konfirmasi atau halaman lain yang diinginkan
    //     $url = BASE_URL . "/views/konfirmasi_pembayaran?booking_id=" . $booking_id;
    //     header("Location: " . $url);
    // } else {
    //     echo "Error: " . $stmt->error;
    // }

    $stmt->close();
    $conn->close();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <script>
        const paymentCode= "<?= $metode_pembayaran ?>";
        const email = "<?= $email ?>";
        const contact = "<?= $kontak ?>";
        const name = "<?= $nama_pelanggan ?>";
        const product = "<?= $jenis_photoshoot?>";
        const price = "<?= $harga?>";
        const id = "<?= $uid?>";
        const itemId = "<?= $itemId?>";

        
        const products = [
            {
                id: itemId,
                quantity: 1,
                productName: product,
                "pricePerUnit": price
            }
        ] 

        const member = {
            "customerFirstName": name,
            "customerLastName": name,
            "customerEmail": email,
            "customerPhoneNumber": "089920003000",
        }

        const paymentDetail = {
            "paymentMethod": paymentCode,
            "orderId": id,
            "paymentDescription": "photoshoot aul"
        }

        const payload = {
            ...member,
            ...paymentDetail,
            products
        }


        const fetchData = async() => {
            const response = await fetch("https://api-sitiket.saddamsatria.my.id/api/v1/external/payment/charge", {
                method:"POST",
                body: JSON.stringify(payload),
                headers:{ 
                    "Authorization" : "Bearer ownernyaganteng",
                    "access-key": "sitiket-app",
                    "Content-Type": "application/json"
                }
            })

            const responseJson = await response.json()
            const responseData  =responseJson.data;


            window.location.href = `<?= BASE_URL . "/views/pembayaran_berhasil?va="?>${responseData.vaNumber}` 
        }

        fetchData()

    </script>
</body>
</html>