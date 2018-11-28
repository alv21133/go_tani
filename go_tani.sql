-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 08:55 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go_tani`
--

-- --------------------------------------------------------

--
-- Table structure for table `curah_hujan`
--

CREATE TABLE `curah_hujan` (
  `id_hujan` varchar(20) DEFAULT NULL,
  `hujan_min` varchar(10) DEFAULT NULL,
  `hujan_max` varchar(10) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curah_hujan`
--

INSERT INTO `curah_hujan` (`id_hujan`, `hujan_min`, `hujan_max`, `kategori`) VALUES
('001', '200', '1000', 'sedang');

-- --------------------------------------------------------

--
-- Table structure for table `input_user`
--

CREATE TABLE `input_user` (
  `lokasi` varchar(100) DEFAULT NULL,
  `Bulan_tanam` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ketinggian`
--

CREATE TABLE `ketinggian` (
  `id_ketinggian` varchar(5) DEFAULT NULL,
  `max_tinggi` varchar(5) DEFAULT NULL,
  `min_tinggi` varchar(5) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `musim`
--

CREATE TABLE `musim` (
  `id_musim` varchar(5) DEFAULT NULL,
  `awal_musim` varchar(20) DEFAULT NULL,
  `ahir_musim` varchar(20) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suhu`
--

CREATE TABLE `suhu` (
  `id_suhu` varchar(5) DEFAULT NULL,
  `min_suhu` varchar(5) DEFAULT NULL,
  `max_suhu` varchar(5) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tanah`
--

CREATE TABLE `tanah` (
  `id_tanah` varchar(5) DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `ph_max` varchar(12) DEFAULT NULL,
  `ph_min` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tanaman`
--

CREATE TABLE `tanaman` (
  `id_tanaman` int(5) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `waktu_panen` varchar(10) DEFAULT NULL,
  `harga` varchar(15) DEFAULT NULL,
  `ketinggian` varchar(10) DEFAULT NULL,
  `suhu` varchar(5) DEFAULT NULL,
  `jenis_tanah` varchar(30) DEFAULT NULL,
  `curah_hujan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) DEFAULT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(70) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tanaman`
--
ALTER TABLE `tanaman`
  ADD PRIMARY KEY (`id_tanaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tanaman`
--
ALTER TABLE `tanaman`
  MODIFY `id_tanaman` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
