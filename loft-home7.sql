/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : loft-home7

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-12-26 14:30:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `meta_keywords` varchar(100) DEFAULT NULL,
  `meta_description` varchar(100) DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'kitchen', 'Техника для кухни', 'кухня, техника, быт', 'Бытовая техника для кухни', null);
INSERT INTO `categories` VALUES ('2', 'fridge', 'Холодильники и морозильники', 'холодильники, морозильники', 'Хорошие холодильники и морозильники', '1');
INSERT INTO `categories` VALUES ('3', 'big-kitchen-tech', 'Крупная кухонная техника', 'крупная, кухня, техника', 'Очень крупная кухонная техника', '1');
INSERT INTO `categories` VALUES ('4', 'kitchen-tech', 'Кухонная техника', 'кухня, техника', 'Разная кухонная техника', '1');
INSERT INTO `categories` VALUES ('6', 'holodilniki-s-nizhnej-morozilnoj-kameroj', 'Холодильники с нижней морозильной камерой', 'холодильники, нижняя морозильная камера', 'Холодильники с нижней морозильной камерой', '2');
INSERT INTO `categories` VALUES ('7', 'shirokie-holodilniki-s-verhnej-morozilnoj-kameroj', 'Широкие холодильники с верхней морозильной камерой', 'холодильники, верхняя морозильная камера', 'Широкие холодильники с верхней морозильной камерой', '2');
INSERT INTO `categories` VALUES ('8', 'kitchen-accessories', 'Акссесуары для кухни', 'акссесуары, кухня', 'Акссесуары для кухни', null);

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('0c7fa2961aca44e952619705b58ca39bd5cab64c', '127.0.0.1', '1451125158', 0x5F5F63695F6C6173745F726567656E65726174657C693A313435313132343934343B697365725F69647C733A323A223131223B);
INSERT INTO `ci_sessions` VALUES ('5e48f67f0216607df97261699124f4374a58193e', '127.0.0.1', '1451124773', 0x5F5F63695F6C6173745F726567656E65726174657C693A313435313132343439393B697365725F69647C733A323A223131223B);
INSERT INTO `ci_sessions` VALUES ('6f76098b9ffdf900239de6c820bdbe360d3f0156', '127.0.0.1', '1451125406', 0x5F5F63695F6C6173745F726567656E65726174657C693A313435313132353239323B697365725F69647C733A323A223131223B757365725F69647C733A323A223131223B);
INSERT INTO `ci_sessions` VALUES ('76b14cd8ad530f36e00cce4aaea1a67d3da89665', '127.0.0.1', '1451123817', 0x5F5F63695F6C6173745F726567656E65726174657C693A313435313132333733333B697365725F69647C733A323A223131223B);
INSERT INTO `ci_sessions` VALUES ('c1f010a0aa62edd340c6512de2a63d8fe7cfb678', '127.0.0.1', '1451124338', 0x5F5F63695F6C6173745F726567656E65726174657C693A313435313132343130313B697365725F69647C733A323A223131223B757365725F69647C733A323A223131223B);
INSERT INTO `ci_sessions` VALUES ('f5dfafec8e86c3a4b028d92c9bcb541c2454a91f', '127.0.0.1', '1451125759', 0x5F5F63695F6C6173745F726567656E65726174657C693A313435313132353735393B697365725F69647C733A323A223131223B757365725F69647C733A323A223131223B);

-- ----------------------------
-- Table structure for information
-- ----------------------------
DROP TABLE IF EXISTS `information`;
CREATE TABLE `information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `h1` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `meta_keywords` varchar(200) DEFAULT NULL,
  `meta_description` varchar(200) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of information
-- ----------------------------
INSERT INTO `information` VALUES ('1', 'payments', 'Способы оплаты', 'Способы оплаты', 'оплата, visa, qiwi', 'Описание способов оплаты товаров из нашего интернет-каталога', 'Оплата-оплата-оплата');
INSERT INTO `information` VALUES ('2', 'about', 'О нас', 'О нас', 'каталог, loftschool, php', 'Про нашу самую лучшую компанию', 'Мы - это мы!');
INSERT INTO `information` VALUES ('3', 'contacts', 'Контакты', 'Контакты', 'контакты', 'Контакты компании', 'Позвоните нам!');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `h1` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `meta_keywords` text,
  `meta_description` text,
  `price` float(5,0) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'holodilnik-s-nizhnei-morozilnoi-kameroi-indesit-df-4180-w', 'Холодильник с нижней морозильной камерой Indesit DF 4180 W', 'Холодильник с нижней морозильной камерой Indesit DF 4180 W', 'Indesit DF 4180 W купить, Indesit DF 4180 W цена, Indesit DF 4180 W Москва', 'Купить Холодильник с нижней морозильной камерой Indesit DF 4180 W', '22290', null);
INSERT INTO `products` VALUES ('2', 'holodilnik-s-nizhnei-morozilnoi-kameroi-hotpoint-ariston-hf-5200-w', 'Холодильник с нижней морозильной камерой Hotpoint-Ariston HF 5200 W', 'Холодильник с нижней морозильной камерой Hotpoint-Ariston HF 5200 W', 'Hotpoint-Ariston HF 5200 W купить, Hotpoint-Ariston HF 5200 W цена', 'Купить Холодильник с нижней морозильной камерой Hotpoint-Ariston HF 5200 W по доступной цене', '30990', null);
INSERT INTO `products` VALUES ('3', 'holodilnik-s-verhnei-morozilnoi-kameroi-shirokii-lg-gn-m702hmhm', 'Холодильник с верхней морозильной камерой Широкий LG GN-M702HMHM', 'Холодильник с верхней морозильной камерой Широкий LG GN-M702HMHM', 'LG GN-M702HMHM купить, LG GN-M702HMHM цена, LG GN-M702HMHM Москва, Холодильник с верхней морозильной камерой Широкий LG GN-M702HMHM интернет магазин, LG GN-M702HMHM продажа, LG GN-M702HMHM заказ, LG GN-M702HMHM доставка, LG GN-M702HMHM в подарок, LG GN-M702HMHM в кредит, LG GN-M702HMHM аксессуары, LG GN-M702HMHM отзывы, LG GN-M702HMHM описание, LG GN-M702HMHM фото, LG GN-M702HMHM инструкции', 'Купить Холодильник с верхней морозильной камерой Широкий LG GN-M702HMHM по доступной цене в интернет-магазине или в розничной сети магазинов города в Москве. LG GN-M702HMHM - аксессуары, отзывы, описание, фото, инструкция.', '78990', null);
INSERT INTO `products` VALUES ('4', 'holodilnik-s-nizhnei-morozilnoi-kameroi-lg-ga-m409sara', 'Холодильник с нижней морозильной камерой LG GA-M409SARA', 'Холодильник с нижней морозильной камерой LG GA-M409SARA', 'LG GA-M409SARA купить, LG GA-M409SARA цена, LG GA-M409SARA Москва, Холодильник с нижней морозильной камерой LG GA-M409SARA интернет магазин, LG GA-M409SARA продажа, LG GA-M409SARA заказ, LG GA-M409SARA доставка, LG GA-M409SARA в подарок, LG GA-M409SARA в кредит, LG GA-M409SARA аксессуары, LG GA-M409SARA отзывы, LG GA-M409SARA описание, LG GA-M409SARA фото, LG GA-M409SARA инструкции', 'Купить Холодильник с нижней морозильной камерой LG GA-M409SARA по доступной цене в интернет-магазине или в розничной сети магазинов города в Москве. LG GA-M409SARA - аксессуары, отзывы, описание, фото, инструкция. ', '36990', null);
INSERT INTO `products` VALUES ('5', 'holodilnik-s-nizhnei-morozilnoi-kameroi-bosch-kgn39vi15r', 'Холодильник с нижней морозильной камерой Bosch KGN39VI15R', 'Холодильник с нижней морозильной камерой Bosch KGN39VI15R', 'Bosch KGN39VI15R купить, Bosch KGN39VI15R цена, Bosch KGN39VI15R Москва, Холодильник с нижней морозильной камерой Bosch KGN39VI15R интернет магазин, Bosch KGN39VI15R продажа, Bosch KGN39VI15R заказ, Bosch KGN39VI15R доставка, Bosch KGN39VI15R в подарок, Bosch KGN39VI15R в кредит, Bosch KGN39VI15R аксессуары, Bosch KGN39VI15R отзывы, Bosch KGN39VI15R описание, Bosch KGN39VI15R фото, Bosch KGN39VI15R инструкции', 'Купить Холодильник с нижней морозильной камерой Bosch KGN39VI15R по доступной цене в интернет-магазине или в розничной сети магазинов города в Москве. Bosch KGN39VI15R - аксессуары, отзывы, описание, фото, инструкция.', '49990', null);
INSERT INTO `products` VALUES ('6', 'holodilnik-s-nizhnei-morozilnoi-kameroi-samsung-rl55tebvb', 'Холодильник с нижней морозильной камерой Samsung RL55TEBVB', 'Холодильник с нижней морозильной камерой Samsung RL55TEBVB', 'Samsung RL55TEBVB купить, Samsung RL55TEBVB цена, Samsung RL55TEBVB Москва, Холодильник с нижней морозильной камерой Samsung RL55TEBVB интернет магазин, Samsung RL55TEBVB продажа, Samsung RL55TEBVB заказ, Samsung RL55TEBVB доставка, Samsung RL55TEBVB в подарок, Samsung RL55TEBVB в кредит, Samsung RL55TEBVB аксессуары, Samsung RL55TEBVB отзывы, Samsung RL55TEBVB описание, Samsung RL55TEBVB фото, Samsung RL55TEBVB инструкции', 'Купить Холодильник с нижней морозильной камерой Samsung RL55TEBVB по доступной цене в интернет-магазине или в розничной сети магазинов города в Москве. Samsung RL55TEBVB - аксессуары, отзывы, описание, фото, инструкция.', '74990', null);
INSERT INTO `products` VALUES ('7', 'holodilnik-s-nizhnei-morozilnoi-kameroi-indesit-bia-18', 'Холодильник с нижней морозильной камерой Indesit BIA 18', 'Холодильник с нижней морозильной камерой Indesit BIA 18', 'Indesit BIA 18 купить, Indesit BIA 18 цена, Indesit BIA 18 Москва, Холодильник с нижней морозильной камерой Indesit BIA 18 интернет магазин, Indesit BIA 18 продажа, Indesit BIA 18 заказ, Indesit BIA 18 доставка, Indesit BIA 18 в подарок, Indesit BIA 18 в кредит, Indesit BIA 18 аксессуары, Indesit BIA 18 отзывы, Indesit BIA 18 описание, Indesit BIA 18 фото, Indesit BIA 18 инструкции', 'Купить Холодильник с нижней морозильной камерой Indesit BIA 18 по доступной цене в интернет-магазине или в розничной сети магазинов города в Москве. Indesit BIA 18 - аксессуары, отзывы, описание, фото, инструкция.', '22890', null);

-- ----------------------------
-- Table structure for products_categories
-- ----------------------------
DROP TABLE IF EXISTS `products_categories`;
CREATE TABLE `products_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products_categories
-- ----------------------------
INSERT INTO `products_categories` VALUES ('1', '1', '1');
INSERT INTO `products_categories` VALUES ('2', '1', '2');
INSERT INTO `products_categories` VALUES ('3', '1', '6');
INSERT INTO `products_categories` VALUES ('4', '2', '1');
INSERT INTO `products_categories` VALUES ('5', '2', '2');
INSERT INTO `products_categories` VALUES ('6', '2', '6');
INSERT INTO `products_categories` VALUES ('7', '3', '1');
INSERT INTO `products_categories` VALUES ('8', '3', '2');
INSERT INTO `products_categories` VALUES ('9', '3', '7');
INSERT INTO `products_categories` VALUES ('10', '4', '1');
INSERT INTO `products_categories` VALUES ('11', '4', '2');
INSERT INTO `products_categories` VALUES ('12', '4', '6');
INSERT INTO `products_categories` VALUES ('13', '5', '1');
INSERT INTO `products_categories` VALUES ('14', '5', '2');
INSERT INTO `products_categories` VALUES ('15', '5', '6');
INSERT INTO `products_categories` VALUES ('16', '6', '1');
INSERT INTO `products_categories` VALUES ('17', '6', '2');
INSERT INTO `products_categories` VALUES ('18', '6', '6');
INSERT INTO `products_categories` VALUES ('19', '7', '1');
INSERT INTO `products_categories` VALUES ('20', '7', '2');
INSERT INTO `products_categories` VALUES ('21', '7', '6');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `tel` varchar(25) DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `users_group` int(11) unsigned NOT NULL,
  `date_reg` datetime NOT NULL,
  `is_activated` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_group` (`users_group`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`users_group`) REFERENCES `users_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Николай', 'Пойманов', null, 'n.poymanov@gmail.com', '', '1', '2015-12-25 23:12:29', '1');
INSERT INTO `users` VALUES ('11', 'мвып', 'мвып', 'рвар', 'cart@cart.ru', '$2y$10$B9Cs0TSQqzHzizoHmOItj.ZfX67LwGuCJz7YUvap4ZAkxQxVMpniK', '2', '2015-12-26 00:32:54', '1');

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('1', 'Администраторы');
INSERT INTO `users_groups` VALUES ('2', 'Зарегистрированные');
