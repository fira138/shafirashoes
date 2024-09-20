-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 03:10 AM
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
-- Database: `katalogsepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `id_sepatu` int(11) NOT NULL,
  `file_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `id_sepatu`, `file_gambar`) VALUES
(26, 13, 'New Balance New Balance 990V6 Lace-Up Sneakers.jpg'),
(27, 0, '02-NEW-BALANCE-FFSSBNEW0-NEWU574LGT1-Grey-removebg-preview 1.png'),
(28, 12, '03-NEW-BALANCE-FFSSBNEW0-NEWU574LGT1-Grey-removebg-preview 1 (1).png'),
(29, 13, 'foto 2.jpg'),
(30, 14, '03-NEW-BALANCE-FFSSBNEW0-NEWU574LGT1-Grey-removebg-preview 1.png'),
(31, 15, '01-NEW-BALANCE-FFSSBNEW0-NEWU574LGT1-Grey__1_-removebg-preview 1.png'),
(32, 16, 'New_Balance_530-removebg-preview 9.png'),
(33, 17, '01-NEW-BALANCE-FFSSBNEW0-NEWU574LGT1-Grey__1_-removebg-preview 1.png'),
(34, 20, '03-NEW-BALANCE-FFSSBNEW0-NEWU574LGT1-Grey-removebg-preview 1 (1).png'),
(35, 22, 'New_Balance_New_Balance_990V6_Lace-Up_Sneakers-removebg-preview (1).png'),
(36, 22, '78ebec16-a2dc-46ac-8230-53b5bd4b1e51-removebg-preview 9.png'),
(37, 30, 'New_Balance_New_Balance_990V6_Lace-Up_Sneakers-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `sepatu`
--

CREATE TABLE `sepatu` (
  `id` int(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `diskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sepatu`
--

INSERT INTO `sepatu` (`id`, `nama`, `size`, `harga`, `diskripsi`) VALUES
(36, '22222222', '30', '222222', '2222222'),
(37, '000000000', '30,31,32,33,34', '000000000000000', '0000000000000000000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `user` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sepatu`
--
ALTER TABLE `sepatu`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
