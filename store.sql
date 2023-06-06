-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 06 jun 2023 kl 13:09
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
(2, 'Weekend doll'),
(3, 'Vivien of holloway'),
(4, 'Top Vintage'),
(5, 'Unique Vintage'),
(6, 'Voodoo Vixen');

-- --------------------------------------------------------

--
-- Tabellstruktur `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `color` varchar(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date_added` date DEFAULT NULL,
  `date_sold` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `items`
--

INSERT INTO `items` (`id`, `title`, `color`, `brandID`, `userID`, `price`, `date_added`, `date_sold`) VALUES
(1, 'Midori Dress', 'Mint green', 1, 1, 1000, '2023-05-28', NULL),
(2, 'Bettie Polkadot Swing Dress', 'Red', 4, 2, 500, '2023-05-17', '2023-05-31'),
(3, 'Grace Pink Rose', 'White', 3, 1, 1000, '2023-05-11', '2023-05-13'),
(4, 'Floral Dress', 'Purple', 3, 2, 340, '2023-05-28', NULL),
(5, 'Kitty Dress', 'Yellow', 3, 3, 500, '2023-06-05', '2023-06-05'),
(6, 'Jinkx Floral Tropical Dress', 'Green', 6, 1, 350, '2023-06-05', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`) VALUES
(1, 'DressLover', 'Anna', 'Svensson', 'anna.s@gmail.com'),
(2, 'Dressy', 'Bellaa', 'Andersson', 'b.a@hotmail.com'),
(3, 'RetroDress', 'Elsa', 'Svensson', 'elsa@gmail.com');

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
  ADD KEY `brandID` (`brandID`),
  ADD KEY `fk_user` (`userID`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT för tabell `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`brandID`) REFERENCES `brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
