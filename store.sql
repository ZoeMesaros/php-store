-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 16 jun 2023 kl 10:43
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
(6, 'Vivien Of Holloway');

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
  `item_desc` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `date_added` date DEFAULT NULL,
  `date_sold` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `items`
--

INSERT INTO `items` (`id`, `title`, `color`, `brandID`, `sellerID`, `item_desc`, `price`, `date_added`, `date_sold`) VALUES
(1, 'Wild Rose', 'Pink', 6, 2, 'Never been worn', 85, '2023-06-13', '2023-06-16'),
(2, 'Cupid Heart Button Dress', 'Pink', 5, 3, 'Small scratches', 380, '2023-06-04', NULL),
(3, 'Black and White Polka Dot Dress', 'White', 3, 2, 'No signs of wear', 450, '2023-03-16', NULL),
(4, 'Lana Dress', 'Aqua', 6, 1, 'Has never been worn', 550, '2023-05-17', '2023-05-19'),
(5, 'Leopard Print Dress', 'Beige', 2, 3, 'Tags are still attached', 350, '2023-04-12', NULL),
(6, 'Layla Floral Dress', 'White', 2, 1, 'Some small spots and pulled threads', 430, '2023-03-12', '2023-04-04'),
(7, 'Megan Check Dress', 'Multicolor', 5, 4, 'In nice condition', 250, '2023-06-16', NULL);

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
(3, 'StinaS', 'Stina', 'Stensson', 'st@gmail.com', '076 159 48 35'),
(4, 'BrittaP', 'Britta', 'Persson', 'britta@gmail.com', '070 648 54 64');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT för tabell `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT för tabell `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
