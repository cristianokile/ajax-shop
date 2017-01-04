-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 03-Jan-2017 às 22:01
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products_list`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `products_list`
--

CREATE TABLE `products_list` (
  `id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` text NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_image` varchar(60) NOT NULL,
  `product_price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products_list`
--

INSERT INTO `products_list` (`id`, `product_name`, `product_desc`, `product_code`, `product_image`, `product_price`) VALUES
(1, 'Cool T-shirt', 'Cool T-shirt, Cotton Fabric. Wash in normal water with mild detergent.', 'TSH1', 'tshirt-1.jpg', 8.50),
(2, 'HBD T-Shirt', 'Cool Happy Birthday printed T-shirt.Crafted from light, breathable cotton.', 'TSH2', 'tshirt-2.jpg', 7.40),
(3, 'Survival of Fittest', 'Yellow t-shirt makes the perfect addition to your casual wardrobe.', 'TSH3', 'tshirt-3.jpg', 9.50),
(4, 'Love Hate T-shirt', 'Stylish and trendy, this crew neck short sleeved t-shirt is made with 100% pure cotton.', 'TSH4', 'tshirt-4.jpg', 10.80);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
