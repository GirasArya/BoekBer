-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 12:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boekber`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(32) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE `confirmation` (
  `iduser` int(11) NOT NULL,
  `confirmationid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_invoice`
--

CREATE TABLE `order_invoice` (
  `idOrder` int(32) NOT NULL,
  `Order_detail` datetime NOT NULL,
  `Store` varchar(32) NOT NULL,
  `Barber` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tempat_cukur`
--

CREATE TABLE `tempat_cukur` (
  `idToko` int(32) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nomor_Telepon` varchar(255) NOT NULL,
  `Nama_Toko` varchar(255) NOT NULL,
  `Lokasi` varchar(255) NOT NULL,
  `Service` varchar(10) NOT NULL,
  `Deskripsi_Toko` varchar(255) NOT NULL,
  `Rating` varchar(255) NOT NULL,
  `Open_Days` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempat_cukur`
--

INSERT INTO `tempat_cukur` (`idToko`, `Username`, `Password`, `Email`, `Nomor_Telepon`, `Nama_Toko`, `Lokasi`, `Service`, `Deskripsi_Toko`, `Rating`, `Open_Days`) VALUES
(1, 'Hairgood Barbershop', 'Goodie', 'Hairgood@gmail.com', '0912813', 'Hairgood Barbershoop', 'Jl.sebelah sawah belakang kampus', '09.00 - 12', 'We Offer Best Service with Remarkable Choice Of Barbers', '4.8 / 5', 'Mon - Thu'),
(2, 'Everyday Barber', 'Everyday', 'EverydayBarber@gmail.com', '08109284', 'Everyday Barbershop', 'Jl.deket sawah seberang kampus', '07.00 - 16', 'Everyday Barber serves Everyday!', '4.5 / 5', 'Mon - Wed'),
(3, 'Sigma Barbershop', 'Sigma', 'SigmaBarber@gmail.com', '08697812', 'Sigma Barbershoop', 'Jl. Depan kampus seberang jalan', '15.00 - 23', 'One And Only Sigma Style Barbershop', '4.9 / 5', 'Sat - Sun');

-- --------------------------------------------------------

--
-- Table structure for table `tukang_cukur`
--

CREATE TABLE `tukang_cukur` (
  `idBarber` int(32) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Price` double NOT NULL,
  `nama_barber` varchar(32) NOT NULL,
  `Service_Hour` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tukang_cukur`
--

INSERT INTO `tukang_cukur` (`idBarber`, `Username`, `Password`, `Email`, `Price`, `nama_barber`, `Service_Hour`) VALUES
(1, 'Agus Suryana', 'Agussss', 'AgusSuryana@gmail.com', 42000, 'Agus Suryana', '07.00 - 08.40'),
(2, 'John Doe', 'JohnDoe', 'JohnDoe@gmail.com', 23000, 'John Doe', '07.00 - 09.40'),
(3, 'Caelus Jade', 'Cael64', 'CaelusJade@gmail.com', 27000, 'Caelus Jade', '09.00 - 12.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(32) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_Number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Username`, `Password`, `Email`, `Phone_Number`) VALUES
(1, 'Ras', 'Ras123', 'Ras@gmail.com', '098129182'),
(2, 'newRas', 'inicoba', 'apaja@gmail.com', '3213215'),
(3, 'Dika', 'Dika123', 'apaja@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD PRIMARY KEY (`confirmationid`);

--
-- Indexes for table `order_invoice`
--
ALTER TABLE `order_invoice`
  ADD PRIMARY KEY (`idOrder`);

--
-- Indexes for table `tempat_cukur`
--
ALTER TABLE `tempat_cukur`
  ADD PRIMARY KEY (`idToko`);

--
-- Indexes for table `tukang_cukur`
--
ALTER TABLE `tukang_cukur`
  ADD PRIMARY KEY (`idBarber`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `confirmation`
--
ALTER TABLE `confirmation`
  MODIFY `confirmationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_invoice`
--
ALTER TABLE `order_invoice`
  MODIFY `idOrder` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempat_cukur`
--
ALTER TABLE `tempat_cukur`
  MODIFY `idToko` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tukang_cukur`
--
ALTER TABLE `tukang_cukur`
  MODIFY `idBarber` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
