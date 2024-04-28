-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 03:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sawi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `no` int(11) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `masalah` varchar(100) NOT NULL,
  `penyakit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`no`, `bagian`, `masalah`, `penyakit`) VALUES
(1, 'ukuran_akar', 'terlalu_kecil', '1. Kekurangan nutrisi <br>\r\n2. Kepadatan tanah yang tinggi <br>\r\n3. Serangan hama <br>'),
(2, 'ukuran_akar', 'membengkak', '1. Infeksi jamur <br>\r\n2. Kelebihan air <br> '),
(3, 'warna_akar', 'hitam', '1. Infeksi jamur <br>\r\n2. Kelebihan air <br>'),
(4, 'tekstur_akar', 'lembek', '1. Kekurangan air <br>\r\n2. Akar busuk <br>\r\n3. Infeksi jamur<br> '),
(5, 'ukuran_batang', 'terlalu_kecil', '1. Kekurangan nutrisi <br>\r\n2. Kekurangan cahaya matahari<br>'),
(6, 'warna_batang', 'kekuningan', '1. Kekurangan air <br> \r\n2. Kekurangan klorofil <br>'),
(7, 'tekstur_batang', 'lembek', '1. Kekurangan air <br> \r\n2. Kekurangan nutrisi <br> \r\n3. Infeksi jamur <br>'),
(8, 'ukuran_daun', 'terlalu_kecil', '1. Kekurangan nutrisi <br>\r\n2. Jarak tanaman terlalu padat <br>\r\n3. Serangan hama <br>'),
(9, 'warna_daun', 'kekuningan', '1. Kekurangan nutrisi  <br> \r\n2. Kelebihan sinar matahari <br>\r\n3. Kelebihan air <br>\r\n4. Ph tanah tidak seimbang <br>'),
(10, 'ukuran_akar', 'proposional', '-'),
(11, 'warna_akar', 'krem', '-'),
(12, 'tekstur_akar', 'kaku', '-'),
(13, 'ukuran_batang', 'proposional', '-'),
(14, 'warna_batang', 'hijau_muda', '-'),
(15, 'tekstur_batang', 'kaku', '-'),
(16, 'ukuran_daun', 'proposional', '-'),
(17, 'warna_daun', 'hijau', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
