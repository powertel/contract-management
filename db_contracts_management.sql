/*
Navicat MySQL Data Transfer

Source Server         : MySQL/Maria DB
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_contracts_management

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-09-18 08:12:06
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `companies`
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of companies
-- ----------------------------

-- ----------------------------
-- Table structure for `contract_types`
-- ----------------------------
DROP TABLE IF EXISTS `contract_types`;
CREATE TABLE `contract_types` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contract_types
-- ----------------------------
INSERT INTO `contract_types` VALUES ('1', 'type1');
INSERT INTO `contract_types` VALUES ('2', 'type2');
INSERT INTO `contract_types` VALUES ('3', 'typ3');

-- ----------------------------
-- Table structure for `contracts`
-- ----------------------------
DROP TABLE IF EXISTS `contracts`;
CREATE TABLE `contracts` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `contract_type_id` int(8) NOT NULL,
  `organisation_name` varchar(50) NOT NULL,
  `effective_date` date NOT NULL,
  `end_date` date NOT NULL,
  `org_address` varchar(50) NOT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `documents_id` int(8) DEFAULT NULL,
  `contract_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `CONTRACT_TYPE` (`contract_type_id`),
  CONSTRAINT `CONTRACT_TYPE` FOREIGN KEY (`contract_type_id`) REFERENCES `contract_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contracts
-- ----------------------------
INSERT INTO `contracts` VALUES ('1', '1', 'University Of Zimbabwe', '2018-09-18', '2018-09-28', '', null, '0', 'UZ Fibre Link Contract');
INSERT INTO `contracts` VALUES ('2', '1', 'University Of Zimbabwe', '2018-09-18', '2018-09-28', '', null, '0', 'UZ Fibre Link Contract');
INSERT INTO `contracts` VALUES ('3', '2', 'Liquid Telecom', '2018-09-18', '2018-09-20', 'ZB House\r\nCrn Jason/Second St\r\nHarare', null, '0', 'Liquid Fibre');
INSERT INTO `contracts` VALUES ('4', '3', 'Lanana', '2018-09-19', '2018-09-20', 'Harare', null, '0', 'Lanana Computers');
INSERT INTO `contracts` VALUES ('5', '2', 'Nissan Clover', '2018-09-19', '0000-00-00', 'Msasa\r\nHarare', null, '0', 'Clover Leaf Motors');
INSERT INTO `contracts` VALUES ('6', '2', 'erhgfd', '2018-08-21', '2018-09-20', 'fgfg', null, '0', 'ewrwwer');
INSERT INTO `contracts` VALUES ('7', '2', 'fdghjm,', '2018-09-19', '2018-09-26', 'asdfghjcnm\r\n\';lkfds', null, '0', 'retyj');
INSERT INTO `contracts` VALUES ('8', '1', 'dfd', '2018-09-10', '2018-09-14', 'dfdfd', null, '0', 'sdsfd');
INSERT INTO `contracts` VALUES ('9', '2', 'svc', '2018-09-04', '2018-09-12', 'xcd', null, '0', 'sds');
INSERT INTO `contracts` VALUES ('10', '2', 'sds', '2018-09-11', '2018-09-05', 'sdssd', null, '0', 'sdsd');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `groups` VALUES ('2', 'members', 'General User');

-- ----------------------------
-- Table structure for `login_attempts`
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', null, null, null, '1268889823', '1537234832', '1', 'Admin', 'istrator', 'ADMIN', '0');

-- ----------------------------
-- Table structure for `users_groups`
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('1', '1', '1');
INSERT INTO `users_groups` VALUES ('2', '1', '2');
