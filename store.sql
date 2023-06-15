-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 15 jun 2023 kl 15:30
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
-- Tabellstruktur `conditions`
--

CREATE TABLE `conditions` (
  `id` int(11) NOT NULL,
  `item_condition` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `conditions`
--

INSERT INTO `conditions` (`id`, `item_condition`) VALUES
(1, 'Never Worn, with Original Tags'),
(2, 'Never Worn'),
(3, 'Very Good'),
(4, 'Good'),
(5, 'Fair');

-- --------------------------------------------------------

--
-- Tabellstruktur `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `color` varchar(11) NOT NULL,
  `typeID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `sellerID` int(11) NOT NULL,
  `condID` int(11) NOT NULL,
  `item_desc` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `date_added` date DEFAULT NULL,
  `date_sold` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `items`
--

INSERT INTO `items` (`id`, `title`, `color`, `typeID`, `brandID`, `sellerID`, `condID`, `item_desc`, `price`, `date_added`, `date_sold`) VALUES
(1, 'Wild Rose Cerise Dress', 'Pink', 5, 6, 2, 2, 'Has not been used', 850, '2023-06-13', NULL),
(2, 'Midori Dress', 'Mint', 1, 1, 4, 3, 'Few signs of wear', 300, '2023-06-08', '2023-06-11'),
(3, 'Cupid Heart Button Dress', 'Pink', 3, 5, 3, 3, 'Small scratches', 380, '2023-06-04', NULL),
(4, 'Black and White Polka Dot Dress', 'White', 5, 3, 2, 2, 'No signs of wear', 450, '2023-03-16', '2023-04-04'),
(5, 'Lana Dress', 'Aqua', 1, 6, 1, 2, 'Has never been worn', 550, '2023-05-17', '2023-05-19'),
(6, 'Leopard Print Dress', 'Beige', 8, 2, 3, 1, 'Tags are still attached', 350, '2023-04-12', NULL),
(7, 'Layla Floral Dress', 'White', 3, 2, 1, 4, 'Some small spots and pulled threads', 430, '2023-03-12', '2023-04-04'),
(8, 'Anna Hibiscus Ocean', 'Blue', 7, 6, 2, 1, 'Unused with tags', 150, '2023-06-15', NULL);

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

-- --------------------------------------------------------

--
-- Tabellstruktur `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'A-line'),
(2, 'Wiggle'),
(3, 'Swing'),
(4, 'Circle'),
(5, 'Halter'),
(6, 'Strapless'),
(7, 'Sun dress'),
(8, 'Shirt dress');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seller` (`sellerID`),
  ADD KEY `fk_brand` (`brandID`),
  ADD KEY `fl_condition` (`condID`),
  ADD KEY `fk_type` (`typeID`);

--
-- Index för tabell `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT för tabell `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT för tabell `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT för tabell `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_brand` FOREIGN KEY (`brandID`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `fk_seller` FOREIGN KEY (`sellerID`) REFERENCES `sellers` (`id`),
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`typeID`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `fl_condition` FOREIGN KEY (`condID`) REFERENCES `conditions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
