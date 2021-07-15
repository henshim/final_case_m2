SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `finalCase` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `finalCase`;

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cart` (`id`, `quantity`, `product_id`) VALUES
(7, 1, 11),
(8, NULL, NULL);

DROP TABLE IF EXISTS `cartDetails`;
CREATE TABLE `cartDetails` (
  `cartId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Cardfight Vanguard'),
(2, 'Battle Spirits'),
(3, 'YuGiOh'),
(4, 'magic the gathering');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `create_time` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `supply_id` int(11) DEFAULT NULL,
  `img` varchar(100) DEFAULT 'default-product-image.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`id`, `name`, `price`, `amount`, `description`, `cate_id`, `supply_id`, `img`) VALUES
(10, 'Battle Spirits sleeve', 50000, 3, 'hieu', 2, 3, 'BS_back.jpg'),
(11, 'YuGiOh sleeve', 150000, 2, 'new', 3, 2, 'ygo-Back.png'),
(20, 'Vanguard sleeve', 250000, 3, 'card sleeve\r\n', 1, 1, 'Cfv_back.jpg'),
(21, 'kamen rider wizard flame style', 10000, 3, 'bs card', 2, 3, 'wizard-flameStyle.png'),
(22, 'elemental hero neos', 10000, 3, 'yugioh card', 3, 2, 'neos.jpg'),
(24, 'chronodragon nextage', 280000, 3, 'vanguard card', 1, 1, 'nextage.png');

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `suppliers` (`id`, `name`, `address`) VALUES
(1, 'Bushiroad', 'Japan'),
(2, 'Konami', 'Japan'),
(3, 'Bandai', 'Japan');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) DEFAULT 'customer',
  `img` varchar(100) DEFAULT 'default-avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `name`, `password`, `role`, `img`) VALUES
(1, 'admin', 'admin', 'main', 'default-avatar.jpg'),
(2, 'hieu123', 'hieu123', 'customer', 'default-avatar.jpg'),
(3, 'hieu123', 'hieu123', 'customer', 'default-avatar.jpg'),
(4, 'hoang1', 'hieu123', 'customer', 'default-avatar.jpg');
DROP VIEW IF EXISTS `v_cart`;
CREATE TABLE `v_cart` (
`id` int(11)
,`productName` varchar(50)
,`quantity` int(11)
,`img` varchar(100)
,`priceEach` int(11)
);
DROP VIEW IF EXISTS `v_product`;
CREATE TABLE `v_product` (
`id` int(11)
,`name` varchar(50)
,`price` int(11)
,`amount` int(11)
,`description` text
,`cateName` varchar(50)
,`supName` varchar(50)
,`img` varchar(100)
);
DROP TABLE IF EXISTS `v_cart`;

DROP VIEW IF EXISTS `v_cart`;
CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`localhost` SQL SECURITY DEFINER VIEW `v_cart`  AS SELECT `cart`.`id` AS `id`, `products`.`name` AS `productName`, `cart`.`quantity` AS `quantity`, `products`.`img` AS `img`, `products`.`price` AS `priceEach` FROM (`cart` join `products` on(`cart`.`product_id` = `products`.`id`)) ;
DROP TABLE IF EXISTS `v_product`;

DROP VIEW IF EXISTS `v_product`;
CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`localhost` SQL SECURITY DEFINER VIEW `v_product`  AS SELECT `products`.`id` AS `id`, `products`.`name` AS `name`, `products`.`price` AS `price`, `products`.`amount` AS `amount`, `products`.`description` AS `description`, `categories`.`name` AS `cateName`, `suppliers`.`name` AS `supName`, `products`.`img` AS `img` FROM ((`products` join `categories` on(`products`.`cate_id` = `categories`.`id`)) join `suppliers` on(`products`.`supply_id` = `suppliers`.`id`)) ;


ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

ALTER TABLE `cartDetails`
  ADD KEY `cartId` (`cartId`),
  ADD KEY `productId` (`productId`);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `supply_id` (`supply_id`);

ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `cartDetails`
  ADD CONSTRAINT `cartDetails_ibfk_1` FOREIGN KEY (`cartId`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cartDetails_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);

ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`supply_id`) REFERENCES `suppliers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
