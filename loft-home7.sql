/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : loft-home7

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-12-20 12:27:57
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
INSERT INTO `categories` VALUES ('5', 'fridges', 'Холодильники', 'холодильники', 'Холодильники', '2');
INSERT INTO `categories` VALUES ('6', 'holodilniki-s-nizhnej-morozilnoj-kameroj', 'Холодильники с нижней морозильной камерой', 'холодильники, нижняя морозильная камера', 'Холодильники с нижней морозильной камерой', '2');
INSERT INTO `categories` VALUES ('7', 'shirokie-holodilniki-s-verhnej-morozilnoj-kameroj', 'Широкие холодильники с верхней морозильной камерой', 'холодильники, верхняя морозильная камера', 'Широкие холодильники с верхней морозильной камерой', '2');
INSERT INTO `categories` VALUES ('8', 'kitchen-accessories', 'Акссесуары для кухни', 'акссесуары, кухня', 'Акссесуары для кухни', null);

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
  `meta_keywords` varchar(100) DEFAULT NULL,
  `meta_description` varchar(100) DEFAULT NULL,
  `price` float(5,0) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'holodilnik-s-nizhnei-morozilnoi-kameroi-indesit-df-4180-w', 'Холодильник с нижней морозильной камерой Indesit DF 4180 W', 'Холодильник с нижней морозильной камерой Indesit DF 4180 W', 'Indesit DF 4180 W купить, Indesit DF 4180 W цена, Indesit DF 4180 W Москва', 'Купить Холодильник с нижней морозильной камерой Indesit DF 4180 W', '22290', null);
INSERT INTO `products` VALUES ('2', 'holodilnik-s-nizhnei-morozilnoi-kameroi-hotpoint-ariston-hf-5200-w', 'Холодильник с нижней морозильной камерой Hotpoint-Ariston HF 5200 W', 'Холодильник с нижней морозильной камерой Hotpoint-Ariston HF 5200 W', 'Hotpoint-Ariston HF 5200 W купить, Hotpoint-Ariston HF 5200 W цена', 'Купить Холодильник с нижней морозильной камерой Hotpoint-Ariston HF 5200 W по доступной цене', '30990', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products_categories
-- ----------------------------
INSERT INTO `products_categories` VALUES ('1', '1', '1');
INSERT INTO `products_categories` VALUES ('2', '1', '2');
INSERT INTO `products_categories` VALUES ('3', '1', '5');
INSERT INTO `products_categories` VALUES ('4', '2', '1');
INSERT INTO `products_categories` VALUES ('5', '2', '2');
INSERT INTO `products_categories` VALUES ('6', '2', '5');
