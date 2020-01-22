-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 jan 2020 om 10:02
-- Serverversie: 10.1.37-MariaDB
-- PHP-versie: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcveen`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Populaire gerechten'),
(2, 'Doner'),
(3, 'Turkse pizza\r\n'),
(4, 'Hotwings'),
(5, 'Patat\r\n'),
(6, 'Snacks'),
(7, 'Kapsalon'),
(8, 'Tosti'),
(9, 'Dranken'),
(10, 'Sauzen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE `order` (
  `Id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `naam` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phonenumber` varchar(45) DEFAULT NULL,
  `companyname` varchar(45) DEFAULT NULL,
  `adress` varchar(45) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `products` varchar(255) NOT NULL,
  `delivery_time` time DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `paymentOption` varchar(45) DEFAULT NULL,
  `totalPrice` decimal(6,2) DEFAULT NULL,
  `Succeed` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `order`
--

INSERT INTO `order` (`Id`, `payment_id`, `naam`, `email`, `phonenumber`, `companyname`, `adress`, `postcode`, `city`, `products`, `delivery_time`, `remarks`, `paymentOption`, `totalPrice`, `Succeed`) VALUES
(18, 0, 'hamza', 'max@hotmail.com', '0612345678', 'maxbv', '1234', '3904tj', 'veen', 'Kapsalon groot - 1x;Broodje doner - 3x;Durum doner met kaas - 2x;', '19:30:00', 'jojo', 'Contant', '35.00', 0),
(19, 0, 'hamza', 'max@hotmail.com', '0612345678', 'maxbv', '1234', '3904tj', 'veen', 'Kapsalon groot - 2x;', '21:00:00', 'jojo', 'Pinpas', '13.00', 0),
(20, 0, 'hamza', 'max@hotmail.com', '0612345678', 'maxbv', '1234', '3904tj', 'veen', 'Kapsalon groot - 2x;Durum doner met kaas - 2x;', '19:00:00', 'jojo', 'Pinpas', '25.00', 0),
(21, 0, 'hamza', 'max@hotmail.com', '0612345678', 'maxbv', '1234', '3904tj', 'veen', 'Kapsalon groot - 2x;Durum doner met kaas - 2x;', '20:00:00', 'jojo', 'Pinpas', '25.00', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`Id`, `Name`, `price`, `description`, `category_category_id`) VALUES
(1, 'Kapsalon groot', '6.50', 'LMIV - Allergen\r\n-Bevat melk en producten daarvan (inclusief lactose)\r\n-Bevat mosterd en producten daarvan', 1),
(2, 'Kapsalon klein', '5.50', 'LMIV - Allergen\r\n-Bevat melk en producten daarvan (inclusief lactose)\r\n-Bevat mosterd en producten daarvan', 1),
(3, 'Broodje doner', '5.50', NULL, 1),
(4, 'Broodje doner', '5.50', NULL, 2),
(5, 'Broodje doner met kaas', '6.00', NULL, 2),
(6, 'Durum doner', '5.50', NULL, 2),
(7, 'Durum doner met kaas', '6.00', NULL, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_has_order`
--

CREATE TABLE `product_has_order` (
  `Product_Id` int(11) NOT NULL,
  `Order_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `review`
--

CREATE TABLE `review` (
  `Id` int(11) NOT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `adress` varchar(45) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`Id`, `username`, `email`, `password`, `adress`, `create_time`, `is_admin`) VALUES
(1, 'Hamza', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2020-01-07 12:17:51', 1),
(2, 'hamza2000', 'hamza.games2000@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'tester', '2020-01-07 13:28:35', NULL),
(3, 'HamzaM', 'tester@bureauvk.nl', '827ccb0eea8a706c4c34a16891f84e7b', 'tester', '2020-01-07 13:36:30', 1),
(16, 'Amine', 'Amine@hotmail.com', '$2y$10$IL4oZsaw1yF3jHFvFhqYouYU3', 'jojo25', '2020-01-13 00:17:51', NULL),
(17, 'Hamza2000', 'Hamza@hotmail.com', '$2y$10$9JRHxF7IH8rgY08azoREB.Vt8', 'adriaen van ostadelaan 25', '2020-01-16 02:02:14', NULL),
(22, 'hamza2000', 'max@hotmail.com', '$2y$10$TDlmcKsJ9/yaDcRTj5jAf.S/5', '1234', '2020-01-21 23:16:18', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexen voor tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `category_category_id` (`category_category_id`);

--
-- Indexen voor tabel `product_has_order`
--
ALTER TABLE `product_has_order`
  ADD PRIMARY KEY (`Product_Id`,`Order_Id`);

--
-- Indexen voor tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `order`
--
ALTER TABLE `order`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
