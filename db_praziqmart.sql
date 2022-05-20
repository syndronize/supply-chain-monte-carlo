-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 06:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_praziqmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa_persediaan`
--

CREATE TABLE `analisa_persediaan` (
  `id_analisa` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `tgl_prediksi` date DEFAULT NULL,
  `hasil_analisa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2022_04_06_015532_create_user_table', 1),
(2, '2022_04_06_015933_create_sales_table', 1),
(3, '2022_04_06_020003_create_produk_table', 1),
(4, '2022_04_06_020153_create_analisa_persediaan_table', 1),
(5, '2022_04_06_020229_create_transaksi_table', 1),
(6, '2022_04_09_045423_create_permintaan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `total_permintaan` int(11) DEFAULT NULL,
  `tanggal_permintaan` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `nm_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nm_produk`, `jenis`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(2, 'Lifebouy Sabun Lemon Fresh', 'Sabun Mandi', 1800, 207, '2022-04-09 00:14:43', '2022-04-09 00:19:53'),
(3, 'Lifebouy Shampo Strong & Shiny', 'Shampoo', 18000, 289, '2022-04-09 00:16:04', '2022-04-09 00:16:04'),
(4, 'Lifebouy Shampo Anti-Dunfruff', 'Shampoo', 19000, 259, '2022-04-09 00:16:47', '2022-04-09 00:16:47'),
(5, 'Lifebouy Shampo Anti-Hairfall', 'Shampoo', 21000, 411, '2022-04-09 00:17:25', '2022-04-09 00:17:25'),
(6, 'Lifebouy Sabun Total 10', 'Sabun Mandi', 2000, 273, '2022-04-09 00:17:59', '2022-04-09 00:17:59'),
(7, 'Lifebouy Sabun Mild Care', 'Sabun Mandi', 90000, 279, '2022-04-09 00:19:08', '2022-04-09 00:19:08'),
(8, 'Lifebouy Sabun Nature Pure', 'Sabun Mandi', 2900, 251, '2022-04-09 00:19:39', '2022-04-09 00:19:39'),
(9, 'Dove Sabun White Beauty Bar', 'Sabun Mandi', 9000, 175, '2022-04-09 00:20:51', '2022-04-09 00:20:51'),
(10, 'Dove Sabun Cream Beauty Bar', 'Sabun Mandi', 9100, 209, '2022-04-09 00:21:45', '2022-04-09 00:21:45'),
(11, 'Dove Shampo Nourishing Secret', 'Shampoo', 9000, 242, '2022-04-09 00:23:09', '2022-04-09 00:23:09'),
(12, 'Dove Shampo Nutritive Solution', 'Shampoo', 28100, 207, '2022-04-09 00:23:39', '2022-04-09 00:23:39'),
(13, 'Pepsodent Pencegah Gigi Berlubang', 'Odol', 9000, 177, '2022-04-09 00:24:11', '2022-04-09 00:24:11'),
(14, 'Pepsodent Herbal', 'Odol', 8200, 219, '2022-04-09 00:25:26', '2022-04-09 00:25:26'),
(15, 'Pepsodent Whitening', 'Odol', 12000, 240, '2022-04-09 00:25:57', '2022-04-09 00:25:57'),
(16, 'Pepsodent Siwak', 'Odol', 9000, 195, '2022-04-09 00:27:05', '2022-04-09 00:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_invoice` bigint(20) UNSIGNED NOT NULL,
  `nm_sales` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id_invoice`, `nm_sales`, `no_hp`, `id_produk`, `jumlah`, `total`, `tgl_order`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'Voluptatem Do qui d', 8, 27, 27, '2022-04-12', '2022-04-11 01:42:52', '2022-04-11 20:39:23'),
(2, 'Non cupidatat obcaec', 'Eos obcaecati et dis', 3, 76, 13, '2022-04-12', '2022-04-11 20:38:53', '2022-04-11 20:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_temp` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `total`, `created_at`, `updated_at`) VALUES
(1, '2022-04-21', 2271600, NULL, NULL),
(2, '2022-01-21', 2271600, NULL, NULL),
(3, '2022-02-21', 2271600, NULL, NULL),
(4, '2022-03-21', 2271600, NULL, NULL),
(5, '2022-05-21', 2271600, NULL, NULL),
(6, '2022-06-21', 2271600, NULL, NULL),
(7, '2022-07-21', 2271600, NULL, NULL),
(8, '2022-08-21', 2271600, NULL, NULL),
(9, '2022-09-21', 2271600, NULL, NULL),
(10, '2022-10-21', 2271600, NULL, NULL),
(11, '2022-11-21', 2271600, NULL, NULL),
(12, '2022-11-21', 2271600, NULL, NULL),
(13, '2022-12-21', 41400, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_detail`, `id_transaksi`, `id_produk`, `jumlah`, `harga`) VALUES
(1, 1, 2, 12, 1800),
(2, 1, 3, 10, 18000),
(3, 2, 2, 3, 1800),
(4, 2, 3, 4, 18000),
(5, 3, 2, 5, 1800),
(6, 3, 3, 6, 18000),
(7, 4, 2, 7, 1800),
(8, 4, 3, 8, 18000),
(9, 5, 2, 9, 1800),
(10, 5, 3, 10, 18000),
(11, 6, 2, 11, 1800),
(12, 6, 3, 13, 18000),
(13, 7, 2, 14, 1800),
(14, 7, 3, 15, 18000),
(15, 8, 2, 16, 1800),
(16, 8, 3, 17, 18000),
(17, 9, 2, 18, 1800),
(18, 9, 3, 19, 18000),
(19, 10, 2, 20, 1800),
(20, 10, 3, 21, 18000),
(21, 11, 2, 22, 1800),
(22, 11, 3, 23, 18000),
(23, 12, 2, 24, 1800),
(24, 12, 3, 25, 18000),
(25, 13, 2, 3, 1800),
(26, 13, 3, 2, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nm_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_user` enum('manajer','kasir','admin') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `pass`, `level_user`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$W7.WKOAm.akV9Kyjs/XWleEseYMyZ7qCztzVV7HoUq8I4y0LPv0.K', 'admin', '2022-04-10 05:55:55', '2022-04-10 06:01:50'),
(2, 'kasir', '$2y$10$N5AaTutnKjXkKba8JSJj2ONb9cqsPgOTMWgO3l3GbE6FzSaCu.Ysq', 'kasir', '2022-04-22 21:18:59', '2022-04-22 21:41:54'),
(3, 'manajer', '$2y$10$1rDiF/ji91o2HF5NtCiTfO6C0PRGwq87aAOEEYjISslPxuid/z4F6', 'manajer', '2022-04-22 21:19:10', '2022-04-22 21:19:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisa_persediaan`
--
ALTER TABLE `analisa_persediaan`
  ADD PRIMARY KEY (`id_analisa`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisa_persediaan`
--
ALTER TABLE `analisa_persediaan`
  MODIFY `id_analisa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_invoice` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
