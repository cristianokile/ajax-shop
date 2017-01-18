SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE IF NOT EXISTS `products_list` (
  `id` int(11) NOT NULL,
  `product_name` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `product_code` varchar(11) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `product_size` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `product_cat` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `product_image` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `product_image_hd` varchar(300) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `product_stock` int(100) NOT NULL,
  `product_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `products_list` (`id`, `product_name`, `product_code`, `product_size`, `product_cat`, `product_image`, `product_image_hd`, `product_stock`, `product_price`) VALUES
(5, 'Vaso de Cerâmica', '240100', '35 x 105 cm', 'Ariaú', 'img/uploads/produtos/ariau-vaso-de-ceramica-01.png', 'img/uploads/produtos/ariau-vaso-de-ceramica-01.png', 15, '0.00'),
(6, 'Vaso de Cerâmica', '240102', '5 x 105 cm', 'Ariaú', 'img/uploads/produtos/ariau-prato-de-ceramica-02.png', 'img/uploads/produtos/ariau-prato-de-ceramica-02.png', 0, '0.00'),
(7, 'Prato de Cerâmica', '240103', '&Oslash; 25 cm', 'Ariaú', 'img/uploads/produtos/ariau-prato-de-ceramica-02.png', 'img/uploads/produtos/ariau-prato-de-ceramica-02.png', 0, '0.00'),
(8, 'Vaso de Cerâmica', '240104', '21 x 95 cm', 'Ariaú', 'img/uploads/produtos/ariau-vaso-de-ceramica-03.png', 'img/uploads/produtos/ariau-vaso-de-ceramica-03.png', 0, '0.00'),
(9, 'Vaso de Cerâmica', '240045', '29 cm', 'Istambúl', 'img/uploads/produtos/istambul-vaso-de-ceramica-01.png', 'img/uploads/produtos/istambul-vaso-de-ceramica-01.png', 0, '0.00'),
(10, 'Vaso de Cerâmica', '240056', '29 cm', 'Istambúl', 'img/uploads/produtos/istambul-vaso-de-ceramica-02.png', 'img/uploads/produtos/istambul-vaso-de-ceramica-02.png', 0, '0.00'),
(11, 'Vaso de Cerâmica', '240057', '37 cm', 'Istambúl', 'img/uploads/produtos/istambul-vaso-de-ceramica-03.png', 'img/uploads/produtos/istambul-vaso-de-ceramica-03.png', 0, '0.00'),
(12, 'Garrafa de Cerâmica', '240018', '27 x 7 cm', 'África', 'img/uploads/produtos/africa-garrafa-de-ceramica-01.png', 'img/uploads/produtos/africa-garrafa-de-ceramica-01.png', 0, '0.00'),
(13, 'Garrafa de Cerâmica', '211009', '33 x 28 cm', 'África', 'img/uploads/produtos/africa-garrafa-de-ceramica-02.png', 'img/uploads/produtos/africa-garrafa-de-ceramica-02.png', 0, '0.00'),
(14, 'Garrafa de Cerâmica', '240010', '32 x 19 cm', 'África', 'img/uploads/produtos/africa-garrafa-de-ceramica-03.png', 'img/uploads/produtos/africa-garrafa-de-ceramica-03.png', 0, '0.00'),
(15, 'Vaso de Cerâmica', '240011', '23 cm', 'África', 'img/uploads/produtos/africa-vaso-de-ceramica-04.png', 'img/uploads/produtos/africa-vaso-de-ceramica-04.png', 0, '0.00'),
(16, 'Vaso de Cerâmica', '240012', '31 cm', 'África', 'img/uploads/produtos/africa-vaso-de-ceramica-05.png', 'img/uploads/produtos/africa-vaso-de-ceramica-05.png', 0, '0.00');


ALTER TABLE `products_list`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `products_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
