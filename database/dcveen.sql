-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 dec 2019 om 12:51
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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE `order` (
  `Id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phonenumber` varchar(45) DEFAULT NULL,
  `companyname` varchar(45) DEFAULT NULL,
  `adress` varchar(45) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `delivery_time` timestamp NULL DEFAULT NULL,
  `products` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `paymentOption` varchar(45) DEFAULT NULL,
  `totalPrice` decimal(10,0) DEFAULT NULL,
  `Succeed` tinyint(4) DEFAULT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `category_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Admin_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Order_User1_idx` (`User_Id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Product_category1_idx` (`category_category_id`);

--
-- Indexen voor tabel `product_has_order`
--
ALTER TABLE `product_has_order`
  ADD PRIMARY KEY (`Product_Id`,`Order_Id`),
  ADD KEY `fk_Product_has_Order_Order1_idx` (`Order_Id`),
  ADD KEY `fk_Product_has_Order_Product1_idx` (`Product_Id`);

--
-- Indexen voor tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_reviews_User1_idx` (`User_Id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_User_Admin1_idx` (`Admin_Id`);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_Order_User1` FOREIGN KEY (`User_Id`) REFERENCES `mydb`.`user` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_category1` FOREIGN KEY (`category_category_id`) REFERENCES `mydb`.`category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `product_has_order`
--
ALTER TABLE `product_has_order`
  ADD CONSTRAINT `fk_Product_has_Order_Order1` FOREIGN KEY (`Order_Id`) REFERENCES `mydb`.`order` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_has_Order_Product1` FOREIGN KEY (`Product_Id`) REFERENCES `mydb`.`product` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_reviews_User1` FOREIGN KEY (`User_Id`) REFERENCES `mydb`.`user` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_Admin1` FOREIGN KEY (`Admin_Id`) REFERENCES `mydb`.`admin` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
