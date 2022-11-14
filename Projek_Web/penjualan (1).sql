-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 03:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `total_bayar` int(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email_pembeli` varchar(255) NOT NULL,
  `alamat_pembeli` varchar(255) NOT NULL,
  `nomor_cc` int(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `nama_produk`, `total_bayar`, `nama_lengkap`, `email_pembeli`, `alamat_pembeli`, `nomor_cc`, `tanggal_transaksi`) VALUES
(14, 'Apple', 10000, 'qqjwdjkqw', 'rasidkhairul2@gmail.com', 'qkjwbdk', 123, '2022-11-14 15:00:58'),
(15, 'Apple', 10000, 'qqjwdjkqw', 'rasidkhairul2@gmail.com', 'qkjwbdk', 123, '2022-11-14 15:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idProduct`, `product`, `price`, `image`) VALUES
(1, 'Sepatu 1', 75000, 'http://localhost/youtube/cart-jquery_ajax_php/assets/img/p1.jpg'),
(2, 'Sepatu 2', 65000, 'http://localhost/youtube/cart-jquery_ajax_php/assets/img/p2.jpg'),
(3, 'Sepatu 3', 55000, 'http://localhost/youtube/cart-jquery_ajax_php/assets/img/p3.jpg'),
(4, 'Sepatu 4', 85000, 'http://localhost/youtube/cart-jquery_ajax_php/assets/img/p4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggalpembelian` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kategori`, `harga`, `gambar`, `tanggalpembelian`) VALUES
(10, 'Apple', 'HP', 10000, 'unmul.png', '2022-11-10 15:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_login`
--

CREATE TABLE `riwayat_login` (
  `id_riwayat` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `waktu_login` datetime NOT NULL,
  `waktu_logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_login`
--

INSERT INTO `riwayat_login` (`id_riwayat`, `nama_user`, `waktu_login`, `waktu_logout`) VALUES
(2, 'rasidkhairul2@gmail.com', '2022-11-14 22:19:36', '2022-11-14 22:19:50'),
(3, 'admin@admin.com', '2022-11-14 22:22:08', '0000-00-00 00:00:00'),
(4, 'rasidkhairul2@gmail.com', '2022-11-14 22:23:44', '2022-11-14 22:27:32'),
(5, 'admin@admin.com', '2022-11-14 22:30:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `pass`, `email`, `level`) VALUES
(14, 'admin', 'admin', '$2y$10$j9hDAs3nkANZXUr15ArCFO6tKJiRUsBFn/d5MGybhracznAiq5x0y', 'admin@admin.com', 'admin'),
(15, 'khairul', 'rasid', '$2y$10$IVpsACH0x9S4dsJP6w7N4OOv/.Wn0uBCIli/GEVSTVYyfMlm5QmFy', 'rasidkhairul2@gmail.com', 'user'),
(16, 'dimas', 'dimas', '$2y$10$ilrsl/igzixuMAk2pzDtr.Tf38bz7pKKIin84Iu9yeZTUPVAA3g9.', 'dimas@gmail.com', 'user'),
(17, 'rasid', 'rasid', '$2y$10$UH7xZjk1wP59G/7.1shWzu3ao0wqQsD0NX.DNJfi2DYRAueNL7RJm', 'andiarivan3@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_login`
--
ALTER TABLE `riwayat_login`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `riwayat_login`
--
ALTER TABLE `riwayat_login`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
