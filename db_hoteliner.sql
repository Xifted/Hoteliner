-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 12:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hoteliner`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('Laki - Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` enum('Admin','Resepsionis') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_diterima` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `nama`, `tgl_lahir`, `gender`, `jabatan`, `tgl_diterima`, `alamat`, `no_telp`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'testadmin', '$2a$12$ckQLPKYauvmLnj7P3c3j/uTPTkV3utVSLJ.J2t/Tt4X9fWgCyENSK', 'admin@gmail.com', 'Vicnent', '2023-03-22', 'Laki - Laki', 'Admin', '2023-03-08', 'dadsadasdasda', '2515151423412', 'dasdasdasdadasdas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_reservasi`
--

CREATE TABLE `detail_reservasi` (
  `id_rsv` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tgl_in` datetime DEFAULT NULL,
  `tgl_out` datetime DEFAULT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_reservasi`
--

INSERT INTO `detail_reservasi` (`id_rsv`, `id_kamar`, `tgl_in`, `tgl_out`, `harga`) VALUES
(1, 2, '2023-03-09 09:44:19', '2023-03-08 09:44:19', 1000000),
(2, 4, '2023-03-26 04:47:42', '2023-03-26 04:47:42', 313131232),
(3, 5, '2023-03-26 04:48:56', '2023-03-26 04:48:56', 31290412),
(1, 11, '2023-03-26 06:07:54', '2023-03-26 06:07:54', 42141421421),
(1, 12, '2023-03-26 06:07:54', '2023-03-26 06:07:54', 412412412);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_tambahan`
--

CREATE TABLE `fasilitas_tambahan` (
  `id_fasilitas` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_tambahan`
--

INSERT INTO `fasilitas_tambahan` (`id_fasilitas`, `nama`, `harga`, `status`) VALUES
(1, 'Extra Bed', 100000, 'Tersedia'),
(2, 'Dinner', 300000, 'Tersedia'),
(3, 'Breakfast', 200000, 'Tersedia'),
(4, 'Massage', 300000, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_tipe`, `nama`, `deskripsi`, `status`) VALUES
(1, 1, 'Room 1', 'dashdasdaskdasjhdjasdkjas', 'Tersedia'),
(2, 1, 'Room 2', 'dashdasdaskdasjhdjasdkjas', 'Tersedia'),
(3, 1, 'Room 3', 'dashdasdaskdasjhdjasdkjas', 'Tersedia'),
(4, 2, 'Room 4', 'dashdasdaskdasjhdjasdkjas', 'Tidak Tersedia'),
(5, 2, 'Room 5', 'dashdasdaskdasjhdjasdkjas', 'Tersedia'),
(6, 2, 'Room 6', 'dashdasdaskdasjhdjasdkjas', 'Tersedia'),
(7, 3, 'Room 7', 'dashdasdaskdasjhdjasdkjas', 'Tersedia'),
(8, 3, 'Room 8', 'dashdasdaskdasjhdjasdkjas', 'Tersedia'),
(9, 3, 'Room 9', 'dashdasdaskdasjhdjasdkjas', 'Tidak Tersedia'),
(10, 4, 'Room 10', 'dashdasdaskdasjhdjasdkjas', 'Tidak Tersedia'),
(11, 4, 'Room 11', 'dashdasdaskdasjhdjasdkjas', 'Tidak Tersedia'),
(12, 4, 'Room 12', 'dashdasdaskdasjhdjasdkjas', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_metode` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_rekening_hotel` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_19_125018_create_akun_table', 2),
(6, '2023_03_02_162109_create_tamu_table', 3),
(7, '2023_03_02_170852_create_admin_table', 4),
(8, '2023_03_02_171732_create_admin_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_rsv` int(11) NOT NULL,
  `id_tamu` int(11) NOT NULL,
  `tgl_rsv` datetime NOT NULL DEFAULT current_timestamp(),
  `booking_code` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_rsv`, `id_tamu`, `tgl_rsv`, `booking_code`) VALUES
(1, 4, '2023-03-19 21:49:46', '2e075d05-95d9-47fa-8136-4409dbe6cd86'),
(2, 4, '2023-03-19 22:29:40', '7dec6902-d40f-481a-8fa7-ecd6a549786a'),
(3, 2, '2023-03-22 06:40:46', 'd151485a-f6e3-46a3-8fbb-8e553ce7c27f'),
(4, 2, '2023-03-22 06:47:05', 'c50a557d-d996-4b92-865c-40dc3c8605a0'),
(5, 2, '2023-03-22 07:12:07', 'b2a67eca-c9d0-4899-9494-6962545704c4'),
(6, 2, '2023-03-22 22:29:41', 'c9abf885-0e5c-495c-99f4-dbd47fdaf2cf'),
(7, 2, '2023-03-24 04:28:29', '399b400d-8fc8-425e-8d73-e1ed923b71f5');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(11) NOT NULL,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` enum('Laki - Laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` bigint(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `username`, `password`, `email`, `verified`, `nama`, `tgl_lahir`, `gender`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'test', '$2a$12$ckQLPKYauvmLnj7P3c3j/uTPTkV3utVSLJ.J2t/Tt4X9fWgCyENSK', 'test@gmail.com', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'testuser', '$2y$10$.pWdXz.dSV80ZDZqQ8Azbusv5.TtMmkE2SiTfo.2mNZSFmMINAkoW', 'test123@gmail.com', 0, 'Vincent', '2023-03-15', NULL, 'dsadad', 908309128312, NULL, NULL),
(3, 'test123', '$2y$10$kwxdNlavd46x3uYfgAkvNegl8yioCieI348YXdNo70FFNLoheehxO', 'test@gmail.com', 0, 'Budi', '2000-06-22', NULL, 'Jalan Kaki', 8392183918, NULL, NULL),
(4, 'Mustofa', '$2y$10$JHeC8ItytJJWUhA6d50bDOr2qfWfmGFFyC33GKzXxFr7dhlW9NM4a', 'mustofa@gmail.com', 0, 'Mustofa Nur Wahid', '2005-04-30', NULL, 'Jalan Jalan', 82187318321, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe` int(11) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` bigint(15) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe`, `img_url`, `nama`, `deskripsi`, `harga`, `status`) VALUES
(1, 'http://127.0.0.1:8000/assets/img/rooms/room1.jpg', 'Standard Room', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit ut facilis harum incidunt est, perferendis hic non ab, nihil sunt cum ipsa deleniti laboriosam! Pariatur nostrum soluta eaque cupiditate. Praesentium, dolorum! Molestias sit, nulla maxime adipisci, eum voluptates at, deleniti dicta enim praesentium esse harum? Numquam quod asperiores voluptatem ipsum.', 5000000, 'Tersedia'),
(2, 'http://127.0.0.1:8000/assets/img/rooms/room2.jpg', 'Deluxe Room', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit ut facilis harum incidunt est, perferendis hic non ab, nihil sunt cum ipsa deleniti laboriosam! Pariatur nostrum soluta eaque cupiditate. Praesentium, dolorum! Molestias sit, nulla maxime adipisci, eum voluptates at, deleniti dicta enim praesentium esse harum? Numquam quod asperiores voluptatem ipsum.', 10000000, 'Tersedia'),
(3, 'http://127.0.0.1:8000/assets/img/rooms/room2.jpg', 'Superior Room', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit ut facilis harum incidunt est, perferendis hic non ab, nihil sunt cum ipsa deleniti laboriosam! Pariatur nostrum soluta eaque cupiditate. Praesentium, dolorum! Molestias sit, nulla maxime adipisci, eum voluptates at, deleniti dicta enim praesentium esse harum? Numquam quod asperiores voluptatem ipsum.', 15000000, 'Tersedia'),
(4, 'http://127.0.0.1:8000/assets/img/rooms/room3.jpg', 'Presidential Room', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit ut facilis harum incidunt est, perferendis hic non ab, nihil sunt cum ipsa deleniti laboriosam! Pariatur nostrum soluta eaque cupiditate. Praesentium, dolorum! Molestias sit, nulla maxime adipisci, eum voluptates at, deleniti dicta enim praesentium esse harum? Numquam quod asperiores voluptatem ipsum.', 20000000, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_rsv` int(11) NOT NULL,
  `metode` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `no_rekening_tamu` varchar(30) NOT NULL,
  `total_harga` bigint(15) NOT NULL,
  `status_pembayaran` enum('Gagal','Pending','berhasil') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD KEY `id_rsv` (`id_rsv`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitas_tambahan`
--
ALTER TABLE `fasilitas_tambahan`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_rsv`),
  ADD KEY `id_tamu` (`id_tamu`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_rsv` (`id_rsv`),
  ADD KEY `metode` (`metode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas_tambahan`
--
ALTER TABLE `fasilitas_tambahan`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_rsv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD CONSTRAINT `detail_reservasi_ibfk_1` FOREIGN KEY (`id_rsv`) REFERENCES `reservasi` (`id_rsv`),
  ADD CONSTRAINT `detail_reservasi_ibfk_3` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_kamar` (`id_tipe`);

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `tamu` (`id_tamu`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_rsv`) REFERENCES `reservasi` (`id_rsv`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`metode`) REFERENCES `metode_pembayaran` (`id_metode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
