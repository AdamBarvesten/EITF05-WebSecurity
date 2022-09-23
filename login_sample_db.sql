-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 23 sep 2022 kl 17:58
-- Serverversion: 10.4.24-MariaDB
-- PHP-version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `login_sample_db`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `adress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `adress`) VALUES
(3, 'tja', 'tja', ''),
(4, 'yo', '123', ''),
(5, 'weee', 'no', ''),
(6, 'marcus', 'hedebark', 'stora södergatan 16'),
(7, 'm', 'h', 's16');

-- --------------------------------------------------------

--
-- Tabellstruktur `tbl_products`
--

CREATE TABLE `tbl_products` (
  `name` text NOT NULL,
  `image_ref` text NOT NULL,
  `price` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `tbl_products`
--

INSERT INTO `tbl_products` (`name`, `image_ref`, `price`, `id`) VALUES
('rose', '/EITF05-WebSecurity/img/rose.jpeg', 500, 1),
('tulip', '/EITF05-WebSecurity/img/tulip.webp', 1000, 3);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `date`) VALUES
(9, 322339, 'tjena', '1337', '2022-09-13 15:31:43'),
(10, 7612, 'hej', 'hej', '2022-09-13 16:39:55');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
