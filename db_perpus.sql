-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 09:58 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`) VALUES
('A01', 'Reka Rachmadi A', 'reka@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kodebk` varchar(40) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(40) NOT NULL,
  `penerbit` varchar(40) NOT NULL,
  `thnterbit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kodebk`, `judul`, `pengarang`, `penerbit`, `thnterbit`) VALUES
('B01', 'Cinta Segitiga', 'Ahmad Babon', 'Bentang Suka', 2000),
('B02', 'Cinta Segiempat', 'Suzuki Malik', 'Bentang Bintang', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `kode` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`kode`, `nama`, `alamat`, `nohp`, `email`, `foto`) VALUES
('M01', 'Ceu Ukoh', 'Yogyakarta', '085123456789', 'ukoh@gmail.com', 'default.jpg'),
('M02', 'Maman Racing', 'KP Kebon Kalapa', '085123456789', 'ukoh@gmail.com', 'default.jpg'),
('M03', 'Ceu Ukoh 2', 'KP Kebon Kalapa', '085123456789', 'ukoh@gmail.com', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `nopeminjaman` varchar(40) NOT NULL,
  `kodeangt` varchar(40) NOT NULL,
  `kodebk` varchar(40) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglhrskembali` date NOT NULL,
  `tglkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`nopeminjaman`, `kodeangt`, `kodebk`, `tglpinjam`, `tglhrskembali`, `tglkembali`) VALUES
('P01', 'M01', 'B01', '2222-02-22', '2222-02-22', '0000-00-00'),
('P02', 'M02', 'B02', '2222-02-22', '2222-02-22', '0000-00-00'),
('P03', 'M02', 'B02', '2222-02-22', '2222-02-22', '2222-02-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kodebk`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`nopeminjaman`),
  ADD KEY `kodebk` (`kodebk`),
  ADD KEY `kodeangt` (`kodeangt`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`kodeangt`) REFERENCES `member` (`kode`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`kodebk`) REFERENCES `buku` (`kodebk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
