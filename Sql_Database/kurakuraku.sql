-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 06:47 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kurakuraku`
--
CREATE DATABASE IF NOT EXISTS `kurakuraku` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kurakuraku`;

-- --------------------------------------------------------

--
-- Table structure for table `h_trans`
--

DROP TABLE IF EXISTS `h_trans`;
CREATE TABLE `h_trans` (
  `id` varchar(12) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_trans`
--

INSERT INTO `h_trans` (`id`, `id_customer`, `date`, `total`) VALUES
('P115828', 1, '2018-04-08 19:11:34', 'Rp 1000,-'),
('P125536', 1, '2018-04-04 21:14:04', 'Rp 6000,-'),
('P189178', 1, '2018-04-04 00:00:00', 'Rp 49000,-');

-- --------------------------------------------------------

--
-- Table structure for table `h_trans_history`
--

DROP TABLE IF EXISTS `h_trans_history`;
CREATE TABLE `h_trans_history` (
  `id` varchar(10) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `total` varchar(15) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_trans_history`
--

INSERT INTO `h_trans_history` (`id`, `id_customer`, `total`, `date`, `status`) VALUES
('P189178', 1, 'Rp.49.000,-', '2018-04-04 00:00:00', 'pending'),
('P125536', 1, 'Rp.6000,-', '2018-04-04 21:14:04', 'pending'),
('P115828', 1, 'Rp 1000,-', '2018-04-08 19:11:34', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `nama`, `stok`, `harga`, `deskripsi`, `gambar`, `jenis`) VALUES
(3, 'kura1', 10, 1000, 'ini adalah deskripsi dari kura nomer 1', 'kura-logo.jpg', 'turtle'),
(4, 'kura2', 12, 2000, 'ini adalah deskripsi dari kura nomer 2 untuk gambar nya sbentar lagi saya cari yang bru', 'kura-logo.jpg', 'turtle'),
(5, 'kura3', 15, 5000, 'kura ke tiga sadsad hkbkasdhbadhjkadb fhafbdfba djfbadjkfba djkfbadkf', 'kura-logo.jpg', 'turtle'),
(6, 'kura4', 0, 5000, 'deskripsi kura ke 4 tapi gambarnya masih hp hahahah lucu sekali :p', 'kura-logo.jpg', 'turtle'),
(7, 'gelang', 4, 12000, 'gelang lucu bentuk kura-kura', 'kura-logo.jpg', 'accessories'),
(8, 'gelang-3', 0, 12000, 'gelang lucu bentuk kura-kura', 'kura-logo.jpg', 'accessories'),
(9, 'gelang-2', 6, 16000, 'gelang lucu bentuk kura-kura', 'kura-logo.jpg', 'accessories'),
(10, 'kalung', 12, 14000, 'kalung lucu bentuk kura-kura', 'kura-logo.jpg', 'accessories'),
(11, 'kalung-2', 11, 12000, 'kalung lebih lucu bentuk kura-kura', 'kura-logo.jpg', 'accessories'),
(12, 'jam', 4, 16000, 'jam mainan lucu dengan tema kura-kura', 'kura-logo.jpg', 'accessories'),
(13, 'gantungan kunci', 5, 20000, 'gantungan lucu bentuk kura-kura dari plastik', 'kura-logo.jpg', 'accessories'),
(14, 'makanan', 5, 15000, 'makanan pokok', 'kura-logo.jpg', 'food'),
(15, 'snack', 0, 10000, 'jika kura kura terlihat lapar', 'kura-logo.jpg', 'food'),
(16, 'premium', 18, 24000, 'agar kesehatan dan pertumbuhan kura-kura terjaga', 'kura-logo.jpg', 'food'),
(17, 'premium-2', 21, 32000, 'makanan bernutrisi untuk kura-kura', 'kura-logo.jpg', 'food'),
(18, 'obat', 4, 56000, 'obat jika sakit', 'kura-logo.jpg', 'medicine'),
(19, 'vitamin', 5, 25000, 'vitamin agar tidak mudah sakit', 'kura-logo.jpg', 'medicine'),
(26, 'te', 123, 432, 'zxczxczxc', 'c4237b6a97d23b19ef3f79b63ce30fdd.jpg', 'food');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `positif` int(11) NOT NULL,
  `negatif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `id_barang`, `positif`, `negatif`) VALUES
(1, 1, 10, 2),
(2, 2, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kecamatan` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `no_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `password`, `gender`, `created`, `modified`, `alamat`, `kota`, `kecamatan`, `provinsi`, `tgl_lahir`, `kode_pos`, `no_hp`) VALUES
(1, '', '', 'eko', 'wicaksono', 'test@test.com', 'Water30!', 'male', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '0000-00-00', 0, 0),
(2, '', '', 'tony', 'kusuma', 'tony@test.com', 'Water30!', 'male', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '0000-00-00', 0, 0),
(3, '', '', 'test', 'aja', 'test@testt.com', 'Water30!', 'male', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '0000-00-00', 0, 0),
(5, '', '', 'asd', 'asd', 'a@a', 'a', 'male', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '0000-00-00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `h_trans`
--
ALTER TABLE `h_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
