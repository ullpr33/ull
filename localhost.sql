-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Bulan Mei 2024 pada 15.21
-- Versi server: 10.5.20-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id22217870_photoshoot_booking`
--
-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis_photoshoot_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `nama_pelanggan`, `kontak`, `email`, `tanggal`, `jenis_photoshoot_id`, `harga`, `status`) VALUES
(2, 4, 'lia', '0978767556667', 'auliapratiwi357pr@outlook.com', '2024-05-30', 2, 9000, 'Aktif'),
(4, 5, 'lia', '0978767556667', 'aulia@gmail.com', '2024-06-05', 1, 100000, 'Dibatalkan'),
(5, 8, 'anca', '081281115263', 'ronaanca@gmail.com', '2024-05-25', 1, 100000, 'Aktif'),
(6, 5, 'Aulia ', '089505986635', 'aulia@gmail.com', '2024-05-29', 2, 9000, 'Dibatalkan'),
(7, 5, 'lia', '0978767556667', 'kepo@gmail.com', '2024-05-30', 1, 100000, 'Dibatalkan'),
(8, 5, 'lia', '0978767556667', 'auliapratiwi357@gmail.com', '2024-05-29', 1, 100000, 'Dibatalkan'),
(9, 5, 'lia', '0978767556667', 'auliapratiwi357@gmail.com', '2024-05-29', 1, 100000, 'Dibatalkan'),
(10, 5, 'lia', '0978767556667', 'kepo@gmail.com', '2024-05-29', 2, 9000, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_photoshoots`
--

CREATE TABLE `daftar_photoshoots` (
  `daftar_photoshoot_id` int(11) NOT NULL,
  `nama_jenis` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_photoshoots`
--

INSERT INTO `daftar_photoshoots` (`daftar_photoshoot_id`, `nama_jenis`, `harga`) VALUES
(1, 'wedding', 100000),
(2, 'engagement', 9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`payment_id`, `booking_id`, `metode_pembayaran`, `status`) VALUES
(1, 2, 'credit_card', 'pending'),
(2, 2, 'credit_card', 'pending'),
(3, 2, 'ewallet', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nama`) VALUES
(4, 'kepo@gmail.com', '$2y$10$uZdjjAwOpB2OaK.Q3MYhuONenPSVugOuVCZ388ShTbqRrY0VJjiW.', 'isa'),
(5, 'aulia@gmail.com', '$2y$10$91MnjydN1Vk.GJhbLjM.7.X0n1I5sjfERZGxy2gA7aDesSKtPBccy', 'ina'),
(6, 'auliapratiwi493@gmail.com', '$2y$10$n2mNA9De5fSWboGACwMOLOqo.jyTZK2W5qu04kmRItKxwuFwp/k0G', 'indah'),
(7, 'aku@gmail.com', '$2y$10$YqjaKJHP.dluRMwgtcONj.WDZc/YkP.Wl2mNNZpJj5FJ2ByKigS8.', 'indah'),
(8, 'ronaanca@gmail.com', '$2y$10$RQGgRn13TecZDTbxoiZwOukgYEy2n2bjhpdvRCwI4ONzt1w9vy67.', 'ronameldiansa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `jenis_photoshoot_id` (`jenis_photoshoot_id`);

--
-- Indeks untuk tabel `daftar_photoshoots`
--
ALTER TABLE `daftar_photoshoots`
  ADD PRIMARY KEY (`daftar_photoshoot_id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `daftar_photoshoots`
--
ALTER TABLE `daftar_photoshoots`
  MODIFY `daftar_photoshoot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`jenis_photoshoot_id`) REFERENCES `daftar_photoshoots` (`daftar_photoshoot_id`);

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
