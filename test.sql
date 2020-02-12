-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 11:58 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `Id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`Id`, `nombre`) VALUES
(1, 'Real Valladolid'),
(2, 'Real Madrid'),
(3, 'Sevilla'),
(4, 'Atlético de Madrid'),
(5, 'Barcelona'),
(6, 'Deportivo de la Coruña'),
(7, 'Betis'),
(8, 'Valencia'),
(15, 'Rayo Vallecano'),
(16, 'Las Palmas');

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE `imagenes` (
  `Id` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagenes`
--

INSERT INTO `imagenes` (`Id`, `id_equipo`, `imagen`) VALUES
(1, 1, 'http://sitelicon.eu/test/img/valladolid.png'),
(2, 2, 'http://sitelicon.eu/test/img/madrid.png'),
(3, 2, 'http://sitelicon.eu/test/img/madrid2.png'),
(4, 3, 'http://sitelicon.eu/test/img/sevilla.png'),
(5, 4, 'http://sitelicon.eu/test/img/atmadrid.png'),
(6, 5, 'http://sitelicon.eu/test/img/barcelona.png'),
(8, 7, 'http://sitelicon.eu/test/img/betis.png'),
(9, 8, 'http://sitelicon.eu/test/img/valencia.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
