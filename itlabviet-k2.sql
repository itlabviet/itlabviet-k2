-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `advertisements`;
CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `advertisement_payment`;
CREATE TABLE `advertisement_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advertisement_id` int(11) NOT NULL,
  `from` datetime NOT NULL,
  `to` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `advertisement_id` (`advertisement_id`),
  CONSTRAINT `FK_PAYMENT_ADVERTISEMENT` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `FK_ARTICLE_CATEGORY` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_ARTICLE_USER` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `parrent_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `FK_CATEGORY_USER` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `article_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `parrent_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `FK_COMMENT_ARTICLE` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  CONSTRAINT `FK_COMMENT_USER` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `alias`, `description`, `status`) VALUES
(1,	'Ban giám đốc',	'BGD',	'Mô tả',	1),
(3,	'Quản trị',	'admin',	'Nhóm quản trị viên',	1),
(4,	'Nhân viên',	'NV',	'',	1),
(5,	'Test Group',	'test',	'.',	1);

DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `FK_USER_GROUP` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `address`, `phone`, `avatar`, `group_id`, `status`, `created_by`, `created_time`) VALUES
(2,	'admin',	'1234567',	'Hoàng Trung',	'hoangphuocthanhtrung@gmail.com',	'17/227 Phan Bội Châu',	'09123456789',	'',	1,	1,	0,	'2018-11-26 09:35:12'),
(4,	'admin123',	'123456',	'Hoàng Trung',	'hoangphuocthanhtrung@gmail.com',	'17/227 Phan Bội Châu',	'09123456789',	'',	4,	1,	0,	'2018-11-26 11:20:04'),
(6,	'admin567',	'shkdfhkjsd',	'Hoàng Lê Thanh Bình',	'hoangphuocthanhtrung@gmail.com',	'17/227 Phan Bội Châu',	'',	'',	4,	1,	0,	'2018-11-26 11:27:44');

-- 2018-12-17 04:03:37
