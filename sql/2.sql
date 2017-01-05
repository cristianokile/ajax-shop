-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 05-Jan-2017 às 16:11
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `produto_cod` varchar(11) NOT NULL,
  `produto_nome` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `produto_tam` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `produto_cat` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `produto_img` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `produto_img_hd` varchar(300) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `produto_qtde` int(100) NOT NULL,
  `produto_preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto_cod`, `produto_nome`, `produto_tam`, `produto_cat`, `produto_img`, `produto_img_hd`, `produto_qtde`, `produto_preco`) VALUES
(5, '240100', 'Vaso de CerÃ¢mica', '35 x 105 cm', 'AriaÃº', 'img/uploads/produtos/ariau-vaso-de-ceramica-01.png', 'img/uploads/produtos/ariau-vaso-de-ceramica-01.png', 15, '0.00'),
(6, '240102', 'Vaso de CerÃ¢mica', '5 x 105 cm', 'AriaÃº', 'img/uploads/produtos/ariau-prato-de-ceramica-02.png', 'img/uploads/produtos/ariau-prato-de-ceramica-02.png', 0, '0.00'),
(7, '240103', 'Prato de CerÃ¢mica', '&Oslash; 25 cm', 'AriaÃº', 'img/uploads/produtos/ariau-prato-de-ceramica-02.png', 'img/uploads/produtos/ariau-prato-de-ceramica-02.png', 0, '0.00'),
(8, '240104', 'Vaso de CerÃ¢mica', '21 x 95 cm', 'AriaÃº', 'img/uploads/produtos/ariau-vaso-de-ceramica-03.png', 'img/uploads/produtos/ariau-vaso-de-ceramica-03.png', 0, '0.00'),
(9, '240045', 'Vaso de CerÃ¢mica', '29 cm', 'IstambÃºl', 'img/uploads/produtos/istambul-vaso-de-ceramica-01.png', 'img/uploads/produtos/istambul-vaso-de-ceramica-01.png', 0, '0.00'),
(10, '240056', 'Vaso de CerÃ¢mica', '29 cm', 'IstambÃºl', 'img/uploads/produtos/istambul-vaso-de-ceramica-02.png', 'img/uploads/produtos/istambul-vaso-de-ceramica-02.png', 0, '0.00'),
(11, '240057', 'Vaso de CerÃ¢mica', '37 cm', 'IstambÃºl', 'img/uploads/produtos/istambul-vaso-de-ceramica-03.png', 'img/uploads/produtos/istambul-vaso-de-ceramica-03.png', 0, '0.00'),
(12, '240018', 'Garrafa de CerÃ¢mica', '27 x 7 cm', 'Ãfrica', 'img/uploads/produtos/africa-garrafa-de-ceramica-01.png', 'img/uploads/produtos/africa-garrafa-de-ceramica-01.png', 0, '0.00'),
(13, '211009', 'Garrafa de CerÃ¢mica', '33 x 28 cm', 'Ãfrica', 'img/uploads/produtos/africa-garrafa-de-ceramica-02.png', 'img/uploads/produtos/africa-garrafa-de-ceramica-02.png', 0, '0.00'),
(14, '240010', 'Garrafa de CerÃ¢mica', '32 x 19 cm', 'Ãfrica', 'img/uploads/produtos/africa-garrafa-de-ceramica-03.png', 'img/uploads/produtos/africa-garrafa-de-ceramica-03.png', 0, '0.00'),
(15, '240011', 'Vaso de CerÃ¢mica', '23 cm', 'Ãfrica', 'img/uploads/produtos/africa-vaso-de-ceramica-04.png', 'img/uploads/produtos/africa-vaso-de-ceramica-04.png', 0, '0.00'),
(16, '240012', 'Vaso de CerÃ¢mica', '31 cm', 'Ãfrica', 'img/uploads/produtos/africa-vaso-de-ceramica-05.png', 'img/uploads/produtos/africa-vaso-de-ceramica-05.png', 0, '0.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
