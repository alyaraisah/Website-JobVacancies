-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 06:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_vacancy`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id_jobseeker` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id_jobseeker`, `id_lowongan`, `status`) VALUES
(11, 1, ''),
(11, 4, ''),
(11, 2, ''),
(11, 3, ''),
(11, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `id_jobseeker` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `domisili_terakhir` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `foto_jobseeker` varchar(255) DEFAULT NULL,
  `pendidikan_SD` varchar(50) NOT NULL,
  `pendidikan_SMP` varchar(50) NOT NULL,
  `pendidikan_SMA` varchar(50) NOT NULL,
  `pendidikan_Universitas` varchar(50) NOT NULL,
  `nama_Pengalaman` varchar(50) NOT NULL,
  `jenis_Pengalaman` varchar(50) NOT NULL,
  `posisi_Pengalaman` varchar(50) NOT NULL,
  `lama_Pengalaman` varchar(20) NOT NULL,
  `durasi_Pengalaman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`id_jobseeker`, `nama`, `gender`, `email`, `password`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `domisili_terakhir`, `no_telp`, `foto_jobseeker`, `pendidikan_SD`, `pendidikan_SMP`, `pendidikan_SMA`, `pendidikan_Universitas`, `nama_Pengalaman`, `jenis_Pengalaman`, `posisi_Pengalaman`, `lama_Pengalaman`, `durasi_Pengalaman`) VALUES
(9, 'asep', NULL, 'asep@gmail.com', '12345678', NULL, NULL, NULL, '', NULL, NULL, '', '', '', '', '', '', '', '', ''),
(10, 'new', NULL, 'new@gmail.com', '$2y$10$iuCh6uZRjY.HdSVn8hQMmu3vwSnIGAROb/L2XUQ6CbluULOeWZNbC', NULL, NULL, NULL, '', NULL, NULL, '', '', '', '', '', '', '', '', ''),
(11, 'Hali Putri Aisyah', NULL, 'haliputriaisyah@gmail.com', '$2y$10$d.athTZ/xr20ZJ482VmoBuJfIOJIGzsQQcz9i6PW5PnCZqgUQy5by', NULL, NULL, NULL, '', NULL, NULL, '', '', '', '', '', '', '', '', ''),
(12, 'mican', NULL, 'mican@gmail.com', '$2y$10$Xl4F7XLEiCWxKftczyvwgeF/3hyABToXzvPr1.Cng8SfsToUYfkXG', NULL, NULL, NULL, '', NULL, NULL, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `gaji` int(10) DEFAULT NULL,
  `posisi` varchar(30) DEFAULT NULL,
  `job_desk` varchar(255) DEFAULT NULL,
  `tipe_kontrak` varchar(30) DEFAULT NULL,
  `pendidikan_terakhir` varchar(30) DEFAULT NULL,
  `pengalaman_kerja` varchar(255) DEFAULT NULL,
  `id_perusahaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `gaji`, `posisi`, `job_desk`, `tipe_kontrak`, `pendidikan_terakhir`, `pengalaman_kerja`, `id_perusahaan`) VALUES
(1, 7000000, 'UX Writer', 'responsible for researching, strategizing, and writing contents', 'Part Time', 'Bachelor\'s Degree', 'have been a ux writer for three months', 1),
(2, 10000000, 'Graphic Designer', 'create visual text and imagery concepts, by hand or using computer software, to communicate ideas that inspire, inform, or captivate consumers', 'Freelance', 'SMA/SMK', 'Have been a graphic design for a year and understanding adobe illustrator is an added value for you', 1),
(3, 1000000, 'Data Analyst', NULL, 'Part Time', 'S1', '1 Year', 2),
(4, 8000000, 'jujurly', 'gatau ngapain', 'part time', 'SD', 'GAADA', 9),
(5, 35000000, 'Data Analyst', 'ya begitu dah', 'Full Time', 'S2', 'Banyak', 9);

-- --------------------------------------------------------

--
-- Stand-in structure for view `lowonganperusahaan`
-- (See below for the actual view)
--
CREATE TABLE `lowonganperusahaan` (
`posisi` varchar(30)
,`job_desk` varchar(255)
,`gaji` int(10)
,`nama_perusahaan` varchar(50)
,`sektor` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) DEFAULT NULL,
  `sektor` varchar(30) DEFAULT NULL,
  `deskripsi_perusahaan` text DEFAULT NULL,
  `alamat_perusahaan` varchar(255) DEFAULT NULL,
  `kontak_telf` varchar(30) DEFAULT NULL,
  `email_perusahaan` varchar(50) DEFAULT NULL,
  `website_perusahaan` varchar(255) DEFAULT NULL,
  `password_perusahaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `sektor`, `deskripsi_perusahaan`, `alamat_perusahaan`, `kontak_telf`, `email_perusahaan`, `website_perusahaan`, `password_perusahaan`) VALUES
(1, 'PT Ruang Raya Indonesia (Ruangguru)', 'IT', NULL, 'Jl. Dr. Saharjo No.161, Manggarai Selatan, Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12860', '02140008000', 'info@ruangguru.com', '', ''),
(2, 'abc', 'abc', NULL, 'abc@gmail.com', '123', 'abc@gmail.com', '', '12345678'),
(8, 'as', NULL, NULL, NULL, NULL, 'as@gmail.com', '', '$2y$10$b1uZwd/8pBoR.R1wzB8uT.EDOXjozlZWGzn.Sc9rMg2K4UV2C1B72'),
(9, 'belum-punya', 'IT', 'GILA PERUSAHAANNYA KECE', 'di mana mana', '022-20202020', 'belum@gmail.com', 'horay-family@hahahahah', '$2y$10$4YxfqjEPsn6K66H1azowieghtLvw8qWOnF43b7ZtnARIuzO2RJrzy');

-- --------------------------------------------------------

--
-- Structure for view `lowonganperusahaan`
--
DROP TABLE IF EXISTS `lowonganperusahaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lowonganperusahaan`  AS SELECT `l`.`posisi` AS `posisi`, `l`.`job_desk` AS `job_desk`, `l`.`gaji` AS `gaji`, `p`.`nama_perusahaan` AS `nama_perusahaan`, `p`.`sektor` AS `sektor` FROM (`lowongan` `l` join `perusahaan` `p` on(`l`.`id_perusahaan` = `p`.`id_perusahaan`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`id_jobseeker`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`),
  ADD KEY `id_perusahaan` (`id_perusahaan`),
  ADD KEY `index_gaji` (`gaji`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD KEY `index_namaPerusahaan` (`nama_perusahaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_seeker`
--
ALTER TABLE `job_seeker`
  MODIFY `id_jobseeker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
