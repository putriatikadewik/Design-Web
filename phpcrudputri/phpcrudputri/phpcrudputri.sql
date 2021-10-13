-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 05:10 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcrudputri`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `halaman_buku` int(11) NOT NULL,
  `penulis_buku` varchar(255) NOT NULL,
  `penerbit_buku` text DEFAULT NULL,
  `jumlah_terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul_buku`, `halaman_buku`, `penulis_buku`, `penerbit_buku`, `jumlah_terjual`) VALUES
(1, 'merasa pintar, bodoh saja tidak punya', 289, 'rusdi mathari', '@starbooksjogja', 201),
(17, 'bela negara dalam sistem pendidikan nasional', 400, 'Prof.Dr.Syarifudin Tippe M.Se', 'Gramedia', 10003),
(18, 'Pemograman sistem pakar, Konsep dasar dan aplikasinya menggunakan Visual basic 6', 620, 'Anik Andriani, M.Kom', 'Gramedia', 2),
(19, 'Semua ada saatnya', 840, 'Ust. Abdul Somad, Lc., Ma', '', 1),
(20, 'Buku sakti pemograman, HTML, CSS, PHP & JAVASCRIPT', 390, 'DIDIK SETIAWAN', '', 20),
(21, 'Aku bangga menjadi tunanganmu', 180, 'Santi Setyaningsih', '-', 6),
(22, 'Buku harian pecinta Malaikat', 400, 'R. Rusandi', 'R. Risandi', 1002),
(23, 'Dasar logika pemograman komputer, Panduan berbasis Flowcard menggunakan Flowgorithm', 369, 'Abdul kadir', 'Abdul kadir', 2),
(24, 'Kumpulan cerita rakyat jepang', 200, 'KAKATUA', '', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
