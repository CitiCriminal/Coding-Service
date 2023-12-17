-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 02:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neo`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `text` text NOT NULL,
  `timest` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `text`, `timest`) VALUES
(18, 'movie leet', '123@gmail.com', '14525125125115251251215', '2023-07-30 00:26:54'),
(19, 'John Doe', 'johndoe@gmail.com', 'i need a cool site for games', '2023-07-29 13:27:38'),
(20, 'Meader Salzer', 'meadersalzer@icloud.com', 'test 123', '2023-07-27 13:27:38'),
(21, 'John Doe', 'johndoe@gmail.com', 'i need a cool site for games', '2023-07-29 13:27:38'),
(22, 'Meader Salzer', 'meadersalzer@icloud.com', 'test 123', '2023-07-27 13:27:38'),
(23, 'john doe', 'johndoe@gmail.com', 'john doe la', '2023-07-30 01:32:04'),
(24, 'John Doe', 'johndoe@gmail.com', 'test 1234567890\r\n10\r\n\r\n\r\n\r\n11\r\n13', '2023-07-30 01:33:41'),
(25, 'John Doe', 'johndoe@gmail.com', 'test 12345\r\n\r\n\r\n67\r\n\r\n89\r\n\r\n\r\n1011', '2023-07-30 01:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `clientmail` text NOT NULL,
  `status` text NOT NULL,
  `worker` text NOT NULL,
  `timest` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `clientmail`, `status`, `worker`, `timest`) VALUES
(1, 'movie@intery.wtf', 'working on', 'USER 1', '2023-07-30 00:58:18'),
(3, 'movie@intery.wtf', 'unactive', 'USER 1', '2023-07-30 01:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `username`, `password`) VALUES
(1, 'root', 'root');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
