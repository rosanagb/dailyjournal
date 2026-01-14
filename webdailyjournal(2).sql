-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2026 at 03:11 PM
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
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `judul`, `gambar`) VALUES
(1, 'Paroki', 'paroki.jpg'),
(2, 'Damai', 'damai.jpg'),
(3, 'Komunitas', 'komunitas.jpg'),
(4, 'Sarasehan', 'sarasehan.jpg'),
(5, 'Rohani', 'rohani.jpg'),
(6, 'Biara Induk', 'gedangan.jpg'),
(10, 'coba', '20260114202826.jpg');

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
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', ''),
(2, 'user1', 'e00cf25ad42683b3df678c61f42c6bda', ''),
(3, 'user2', 'c84258e9c39059a89ab77d846ddab909', ''),
(4, 'danny', '21232f297a57a5a743894a0e4a801fc3', ''),
(5, 'user3', '32cacb2f994f6b42183a1300d9a3e8d6', ''),
(6, 'user4', 'fc1ebc848e31e0a68e868432225e3c82', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

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
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
