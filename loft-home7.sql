/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : loft-home7

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-12-19 16:35:04
*/

SET FOREIGN_KEY_CHECKS=0;

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
