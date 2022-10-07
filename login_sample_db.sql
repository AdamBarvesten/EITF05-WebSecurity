-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 07 okt 2022 kl 13:41
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
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `adress`) VALUES
(8, 'marcus_hedebark', '$2y$10$x6/7r2BchIyydH61An1SyuVJIiKAjPo3cxGbu42M/IadOGgNXo/MS', 's16'),
(9, 'm', '$2y$10$Dj7h8l0FcMwD/8hMiSi49em0TGQev0JuoPxY69F1gy5bJoIvkFCGK', '16'),
(12, 'Marcus_Hedebark', '$2y$10$mMSc.hXzrngpnhTWobPtCucYT9TrE6LxVqoiMKHm0UnJt6UVjhBTm', 'Stora Södergatan 16');

-- --------------------------------------------------------

--
-- Tabellstruktur `tbl_products`
--

CREATE TABLE `tbl_products` (
  `name` text NOT NULL,
  `image_ref` text NOT NULL,
  `price` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `tbl_products`
--

INSERT INTO `tbl_products` (`name`, `image_ref`, `price`, `id`, `info`) VALUES
('rose', '/EITF05-WebSecurity/img/rose.jpeg', 500, 1, 'https://en.wikipedia.org/wiki/Rose'),
('tulip', '/EITF05-WebSecurity/img/tulip.webp', 1000, 3, 'https://en.wikipedia.org/wiki/Tulip');

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
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT för tabell `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
