-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 14 jun 2023 kl 08:24
-- Serverversion: 10.4.28-MariaDB
-- PHP-version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `store`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Hell Bunny'),
(2, 'Hearts & Roses'),
(3, 'Top Vintage'),
(4, 'Unique Vintage'),
(5, 'Voodoo Vixen'),
(6, 'Vivien Of Holloway'),
(7, 'British Retro');

-- --------------------------------------------------------

--
-- Tabellstruktur `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `color` varchar(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `sellerID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date_added` date DEFAULT NULL,
  `date_sold` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `items`
--

INSERT INTO `items` (`id`, `title`, `color`, `brandID`, `sellerID`, `price`, `date_added`, `date_sold`) VALUES
(1, 'Floral Dress', 'Pink', 6, 2, 850, '2023-06-13', NULL),
(2, 'Grace Pink Rose Dress', 'White', 2, 3, 500, '2023-06-09', NULL),
(3, 'Midori Dress', 'Mint', 1, 4, 300, '2023-06-08', '2023-06-11'),
(4, 'Cupid Heart Button Dress', 'Pink', 5, 3, 380, '2023-06-04', NULL),
(5, 'Bettie Polkadot Swing Dress', 'Red', 3, 2, 380, '2023-04-13', '2023-05-10'),
(6, 'Black and White Polka Dot Swing Dress', 'White', 2, 2, 450, '2023-03-16', '2023-04-04'),
(7, 'Lana Dress', 'Aqua', 6, 1, 550, '2023-05-17', '2023-05-19'),
(8, 'Day Dress', 'Black', 2, 3, 380, '2023-04-12', NULL),
(9, 'Layla Floral Swing Dress', 'White', 2, 1, 430, '2023-03-12', '2023-04-04');

-- --------------------------------------------------------

--
-- Tabellstruktur `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `sellers`
--

INSERT INTO `sellers` (`id`, `username`, `first_name`, `last_name`, `email`, `phone`) VALUES
(1, 'AnnaA', 'Anna', 'Andersson', 'anna.a@gmail.com', '070 654 32 18'),
(2, 'LisaN', 'Lisa', 'Nilsson', 'lisa@gmail.com', '080 987 46 21'),
(3, 'StinaS', 'Stina', 'Stensson', 'stina@gmail.com', '076 159 48 35'),
(4, 'AmandaL', 'Amanda', 'Larsson', 'amanda@gmail.com', '073 546 98 45');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seller` (`sellerID`),
  ADD KEY `fk_brand` (`brandID`);

--
-- Index för tabell `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT för tabell `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT för tabell `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_brand` FOREIGN KEY (`brandID`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `fk_seller` FOREIGN KEY (`sellerID`) REFERENCES `sellers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
