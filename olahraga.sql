-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2015 at 06:49 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `olahraga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(15) NOT NULL AUTO_INCREMENT,
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(20) NOT NULL,
  `nm_admin` varchar(30) NOT NULL,
  `kontak_admin` int(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `nm_admin`, `kontak_admin`, `email`, `alamat`) VALUES
(1, 'rizafdian', 'qwerty', 'Riz Afdian', 8998, 'afdianriz@gmail.com', 'Jl.Raya Jeruk No.1');

-- --------------------------------------------------------

--
-- Table structure for table `atlit`
--

CREATE TABLE IF NOT EXISTS `atlit` (
  `id_atlit` int(15) NOT NULL,
  `nm_atlit` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `akte` mediumblob NOT NULL,
  `alamat` text NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `propinsi` varchar(50) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `kontak` int(15) NOT NULL,
  `kejuaraan_ygdiikuti` varchar(50) NOT NULL,
  `hasil_kejuaraan` varchar(50) NOT NULL,
  `kekuatan` varchar(20) NOT NULL,
  `kelenturan` varchar(20) NOT NULL,
  `kecepatan` varchar(20) NOT NULL,
  `reaksi` varchar(20) NOT NULL,
  `power` varchar(20) NOT NULL,
  `dayatahanotot` varchar(20) NOT NULL,
  `v02max` varchar(20) NOT NULL,
  `kelincahan` varchar(20) NOT NULL,
  `teknik` varchar(20) NOT NULL,
  `kesehatan` varchar(20) NOT NULL,
  `psikologi` varchar(20) NOT NULL,
  `username_atlit` varchar(20) NOT NULL,
  `password_atlit` varchar(20) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `kd_cb_olahraga` int(11) NOT NULL,
  PRIMARY KEY (`id_atlit`),
  UNIQUE KEY `kd_cb_olahraga` (`kd_cb_olahraga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atlit`
--

INSERT INTO `atlit` (`id_atlit`, `nm_atlit`, `tmpt_lahir`, `tgl_lahir`, `akte`, `alamat`, `kabupaten`, `propinsi`, `pekerjaan`, `kontak`, `kejuaraan_ygdiikuti`, `hasil_kejuaraan`, `kekuatan`, `kelenturan`, `kecepatan`, `reaksi`, `power`, `dayatahanotot`, `v02max`, `kelincahan`, `teknik`, `kesehatan`, `psikologi`, `username_atlit`, `password_atlit`, `gambar`, `kd_cb_olahraga`) VALUES
(1, 'Lebron James', 'New York', '2015-06-01', '', 'jl.raya kharisma', 'DAU', 'Kalimantan Selatan', 'Atlit Profesional', 897658, 'NBL', 'Juara 1', '80', '70', '90', '65', '67', '77', '88', '76', '89', '67', 'A', 'lejames', 'basket', 's.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cb_olahraga`
--

CREATE TABLE IF NOT EXISTS `cb_olahraga` (
  `kd_cb_olahraga` int(11) NOT NULL,
  `nm_cb_olahraga` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_cb_olahraga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelatih`
--

CREATE TABLE IF NOT EXISTS `pelatih` (
  `id` int(15) NOT NULL,
  `nm_pelatih` varchar(50) NOT NULL,
  `tmpt_lhr` varchar(30) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat` text NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `propinsi` varchar(50) NOT NULL,
  `kontak` int(15) NOT NULL,
  `ijazah` mediumblob NOT NULL,
  `sertifikat` mediumblob NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `username_pelatih` varchar(20) NOT NULL,
  `password_pelatih` varchar(20) NOT NULL,
  `kd_cb_olahraga` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kd_cb_olahraga` (`kd_cb_olahraga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatih`
--

INSERT INTO `pelatih` (`id`, `nm_pelatih`, `tmpt_lhr`, `tgl_lhr`, `alamat`, `kabupaten`, `propinsi`, `kontak`, `ijazah`, `sertifikat`, `gambar`, `username_pelatih`, `password_pelatih`, `kd_cb_olahraga`) VALUES
(1, 'Michael Jordan', 'Washington DC', '2015-06-03', 'JL.raya jetis', 'Tlogomas', 'Jawa Timur', 91823616, '', '', 'g.png', 'jordanas', 'bulls', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
