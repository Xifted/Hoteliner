-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 01:26 AM
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
  `id_kamar` int(11) DEFAULT NULL,
  `tgl_in` datetime DEFAULT NULL,
  `tgl_out` datetime DEFAULT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_reservasi`
--

INSERT INTO `detail_reservasi` (`id_rsv`, `id_kamar`, `tgl_in`, `tgl_out`, `harga`) VALUES
(1, 1, '2023-03-31 00:00:00', '2023-04-01 00:00:00', 5000000),
(1, 2, '2023-03-31 00:00:00', '2023-04-01 00:00:00', 5000000),
(2, 1, '2023-03-31 00:00:00', '2023-04-01 00:00:00', 5000000),
(2, 2, '2023-03-31 00:00:00', '2023-04-01 00:00:00', 5000000),
(3, 1, '2023-03-24 00:00:00', '2023-03-25 00:00:00', 5000000),
(3, 2, '2023-03-30 00:00:00', '2023-03-31 00:00:00', 5000000),
(4, 1, '2023-03-18 00:00:00', '2023-03-19 00:00:00', 5000000),
(4, 3, '2023-03-31 00:00:00', '2023-04-01 00:00:00', 5000000),
(5, 1, '2023-03-31 00:00:00', '2023-04-01 00:00:00', 5000000),
(5, 2, '2023-03-31 00:00:00', '2023-04-01 00:00:00', 5000000),
(6, 1, '2023-03-17 00:00:00', '2023-03-18 00:00:00', 5000000),
(6, 3, '2023-03-17 00:00:00', '2023-03-18 00:00:00', 5000000),
(7, 1, '2023-03-17 00:00:00', '2023-03-18 00:00:00', 5000000),
(7, 3, '2023-03-31 00:00:00', '2023-04-01 00:00:00', 5000000),
(8, 1, '2023-04-07 00:00:00', '2023-04-08 00:00:00', 5000000),
(8, 2, '2023-04-07 00:00:00', '2023-04-08 00:00:00', 5000000),
(9, 3, '2023-04-07 00:00:00', '2023-04-08 00:00:00', 5000000),
(9, 5, '2023-04-07 00:00:00', '2023-04-08 00:00:00', 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` varchar(255) NOT NULL,
  `value` int(3) NOT NULL,
  `nama_kupon` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_diskon` date NOT NULL,
  `tgl_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 2, '2023-03-31 19:53:09', 'acdfe3f4-a1b1-4124-b157-69cfc867077d'),
(2, 2, '2023-03-31 21:05:29', '0501b4ef-0c13-4ae3-8bcc-cc17bd4d0af1'),
(3, 2, '2023-03-31 21:07:34', 'ed6fdc22-98ff-40c4-9b90-50a092ff6fea'),
(4, 2, '2023-03-31 21:11:31', 'f6f1dac1-43fb-40e1-a621-c391b35306c9'),
(5, 2, '2023-03-31 21:49:18', '31dc30cf-df8f-436b-bf4d-9e738c452db9'),
(6, 2, '2023-03-31 22:03:12', '1641001f-82cd-44ef-bc4e-ff38dab80b74'),
(7, 2, '2023-03-31 22:03:58', '3dee3e73-8dc3-4e70-8df7-d381a2af83cb'),
(8, 2, '2023-04-06 04:08:53', '2d3bf9d7-d4bd-406e-b13e-39c3d6ba7090'),
(9, 2, '2023-04-06 04:11:47', '6e126ad0-308d-4831-8d04-bcacb25e3dba'),
(10, 2, '2023-04-06 05:06:06', 'b6809224-aa71-4bec-8148-b5a98c9d6fdf');

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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `username`, `password`, `email`, `verified`, `nama`, `tgl_lahir`, `gender`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'test', '$2a$12$ckQLPKYauvmLnj7P3c3j/uTPTkV3utVSLJ.J2t/Tt4X9fWgCyENSK', 'test@gmail.com', 0, NULL, NULL, NULL, NULL, NULL, '2023-03-21 23:28:42', NULL),
(2, 'testuser', '$2y$10$.pWdXz.dSV80ZDZqQ8Azbusv5.TtMmkE2SiTfo.2mNZSFmMINAkoW', 'test123@gmail.com', 0, 'Vincent', '2023-03-15', NULL, 'dsadad', 908309128312, '2023-03-06 23:28:54', NULL),
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
  `id_transaksi` varchar(50) NOT NULL,
  `id_rsv` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `payment_code` bigint(20) NOT NULL,
  `payment_type` varchar(30) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `no_rekening_tamu` varchar(30) DEFAULT NULL,
  `total_harga` double NOT NULL,
  `status_pembayaran` varchar(10) NOT NULL,
  `pdf_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_rsv`, `order_id`, `payment_code`, `payment_type`, `tgl_transaksi`, `no_rekening_tamu`, `total_harga`, `status_pembayaran`, `pdf_url`) VALUES
('0b167b70-4c06-428a-bc8a-8f466db1a7e1', 8, 1875584532, 4429159217742792, 'cstore', '2023-04-06 04:09:46', NULL, 10000000, 'pending', 'https://app.sandbox.midtrans.com/snap/v1/transactions/d4f89895-0f9f-407f-a26c-d9c818104b72/pdf'),
('0f8613f5-113d-4806-961a-f3c568b7ab91', 5, 1748633516, 0, 'bank_transfer', '2023-03-31 21:50:38', NULL, 44000, 'settlement', 'https://app.sandbox.midtrans.com/snap/v1/transactions/633dbaaf-994f-4d7e-9694-70120ed71dc8/pdf'),
('37001334-6110-4ade-a83e-472975bfe4d4', 2, 1307219630, 217368111222333, 'cstore', '2023-03-31 21:05:54', NULL, 44000, 'pending', 'https://app.sandbox.midtrans.com/snap/v1/transactions/152e8dc7-f1a6-47b6-9d99-6ad68e3c8232/pdf'),
('48e081b1-447a-41c3-88c3-3e2453ec3462', 9, 1950226482, 223178111222333, 'cstore', '2023-04-06 04:12:04', NULL, 15000000, 'settlement', 'https://app.sandbox.midtrans.com/snap/v1/transactions/d3f9638d-07a9-4448-af4b-5bc3e985e6de/pdf'),
('5735f793-e420-4529-8930-9488e15b67b3', 1, 611291729, 217318111222333, 'cstore', '2023-03-31 19:53:36', NULL, 44000, 'pending', 'https://app.sandbox.midtrans.com/snap/v1/transactions/14a4ef96-4372-4194-9d14-d6da9a7afee4/pdf'),
('d2a21f23-aba4-4e29-b6dc-03efd280013c', 4, 785118685, 0, 'qris', '2023-03-31 21:12:33', NULL, 44000, 'settlement', '0');

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
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

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
  ADD KEY `id_rsv` (`id_rsv`);

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
  MODIFY `id_rsv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_rsv`) REFERENCES `reservasi` (`id_rsv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
