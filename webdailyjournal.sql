-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2025 at 06:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Perpustakaan Kampus', 'Perpustakaan kampus menyediakan berbagai koleksi buku dan fasilitas belajar untuk mahasiswa sepanjang hari.\r\n', 'perpus.jpg', '2025-12-04 10:35:37', 'admin'),
(2, 'Ruang Kelas', 'Ruang kelas yang nyaman dengan fasilitas LCD, kursi belajar, dan suasana kondusif untuk proses perkuliahan.\r\n', 'ruangkelas.jpg', '2025-12-04 10:59:15', 'admin'),
(3, 'Kelompok Belajar', 'Kelompok belajar menjadi tempat mahasiswa berdiskusi, mengerjakan tugas, dan mengembangkan pemahaman bersama.\r\n', 'kelbelajar.jpg', '2025-12-04 11:00:29', 'admin'),
(4, 'Auditorium', 'Auditorium digunakan untuk seminar, kegiatan kampus, dan acara besar dengan kapasitas ratusan peserta.\r\n', 'auditorium.jpg', '2025-12-04 11:03:58', 'admin'),
(22, 'Taman', 'Taman kampus menjadi area hijau untuk beristirahat, bersantai, atau belajar di ruang terbuka.\r\n', 'taman.jpg', '2025-12-04 11:05:14', 'admin'),
(28, 'Ruang Lab', 'Ruang laboratorium dilengkapi komputer dan peralatan praktikum untuk mendukung kegiatan pembelajaran teknik informatika.\r\n', 'ruanglab.jpg', '2025-12-04 11:06:29', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
