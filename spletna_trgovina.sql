-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 10:36 AM
-- Server version: 10.4.11-MasterDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+01:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spletna_trgovina`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikli`
--

CREATE TABLE `artikli` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `vrsta` varchar(20) NOT NULL,
  `firma` varchar(20) NOT NULL,
  `slika` varchar(30) NOT NULL,
  `opis` varchar(200) NOT NULL,
  `cena` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikli`
--

INSERT INTO `artikli` (`id`, `naziv`, `vrsta`, `firma`, `slika`, `opis`, `cena`) VALUES
(1, 'Nike Revolution', 'Superge', 'nike', 'sport_edition', 'Superge Nike Revolution. ', 55.99),
(2, 'Adidas Adillette Aqua', 'Natikaci', 'adidas', 'aqua', '', 19.99),
(3, 'Puma Enzo Sport', 'sportni', 'puma', 'soft', '', 69.99),
(4, 'Cat Instruct', 'Cevlji', 'cat', 'instruct', '', 85.99),
(5, 'Converse All Star Črne', 'Gleznjarji', 'converse', 'all_star', '', 69.99),
(6, 'Nike SB Check', 'Superge', 'nike', 'sb_check', '', 45.99),
(7, 'Adidas Phosphere', 'Superge', 'adidas', 'phosphere', '', 55.99),
(8, 'Adidas Daily', 'Superge', 'adidas', 'daily', '', 59.99),
(9, 'Adidas Adilette Shower', 'Natikaci', 'adidas', 'shower', '', 25.99),
(10, 'All star modre', 'Superge', 'converse', 'all_star_bele', '', 59.99),
(11, 'Adidas Terrex Ax3 Gtx', 'pohodniski', 'adidas', 'adidas-terrex', '', 89.99),
(12, 'Adidas Strutter', 'Superge', 'adidas', 'adidas-strutter', '', 55.99);

-- --------------------------------------------------------

--
-- Table structure for table `narocila`
--

CREATE TABLE `narocila` (
  `id` int(11) NOT NULL,
  `uporabnik` varchar(20) NOT NULL,
  `artikel` varchar(50) NOT NULL,
  `velikost` varchar(20) NOT NULL,
  `kolicina` varchar(10) NOT NULL,
  `datum` datetime(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `narocila`
--

INSERT INTO `narocila` (`id`, `uporabnik`, `artikel`, `velikost`, `kolicina`, `datum`) VALUES
(6, 'test', 'Adidas Daily', '45', '1', '2020-07-30 18:23:25.00'),
(7, 'milan', 'Nike SB Check', '45', '1', '2020-07-30 20:00:58.00');

-- --------------------------------------------------------

--
-- Table structure for table `uporabniki`
--

CREATE TABLE `uporabniki` (
  `id` int(11) NOT NULL,
  `up_ime` varchar(20) NOT NULL,
  `geslo` varchar(20) NOT NULL,
  `ime` varchar(25) NOT NULL,
  `priimek` varchar(25) NOT NULL,
  `vrsta` varchar(15) NOT NULL,
  `naslov` varchar(50) NOT NULL,
  `e_naslov` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_slovenian_ci NOT NULL,
  `stevilka` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uporabniki`
--

INSERT INTO `uporabniki` (`id`, `up_ime`, `geslo`, `ime`, `priimek`, `vrsta`, `naslov`, `e_naslov`, `stevilka`) VALUES
(7, 'milan', 'milan', 'Milan', 'Bašič', 'admin', 'Zbure 28', 'milan.basic@helper.si', '051624616'),
(8, 'tadej', 'tadej', 'Tadej', 'Tadej Franko', 'admin', 'Herinja Vas 14A', 'tadejfranko@gmail.com', '041290024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikli`
--
ALTER TABLE `artikli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narocila`
--
ALTER TABLE `narocila`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uporabniki`
--
ALTER TABLE `uporabniki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikli`
--
ALTER TABLE `artikli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `narocila`
--
ALTER TABLE `narocila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uporabniki`
--
ALTER TABLE `uporabniki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
