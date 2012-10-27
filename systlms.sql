/*
Navicat MySQL Data Transfer

Source Server         : a3ncabal.dyndns.info
Source Server Version : 50522
Source Host           : a3ncabal.dyndns.info:3306
Source Database       : systlms

Target Server Type    : MYSQL
Target Server Version : 50522
File Encoding         : 65001

Date: 2012-10-27 21:00:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bank`
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bank
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('fa3e82d8ff55d05e2c05b3c654f52431', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:14.0) Gecko/20100101 Firefox/14.0.1', '1351342760', '');

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_course` char(8) NOT NULL,
  `course` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cost` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', 'lk', 'lipat kain', 'kursus lipat kain', '10', '4');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` char(255) NOT NULL,
  `address` char(255) DEFAULT NULL,
  `postal code` varchar(5) DEFAULT NULL,
  `city` char(255) DEFAULT NULL,
  `state` char(20) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'stud@gmail.com', '4297f44b13955235245b2497399d7a93 ', 'Students', '1, taman mutiara', '08000', 'sungai petani', 'kedah', '162172420');

-- ----------------------------
-- Table structure for `user_code_course`
-- ----------------------------
DROP TABLE IF EXISTS `user_code_course`;
CREATE TABLE `user_code_course` (
  `username` varchar(255) NOT NULL,
  `code_course` char(8) NOT NULL,
  `activate` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_code_course
-- ----------------------------
INSERT INTO `user_code_course` VALUES ('stud@gmail.com', 'lk', '0');

-- ----------------------------
-- Table structure for `user_payment_bank`
-- ----------------------------
DROP TABLE IF EXISTS `user_payment_bank`;
CREATE TABLE `user_payment_bank` (
  `username` varchar(255) NOT NULL,
  `payment` int(11) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `id_bank` int(11) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_payment_bank
-- ----------------------------

-- ----------------------------
-- Table structure for `user_role`
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_role
-- ----------------------------

-- ----------------------------
-- Table structure for `user_user_role`
-- ----------------------------
DROP TABLE IF EXISTS `user_user_role`;
CREATE TABLE `user_user_role` (
  `username` varchar(255) NOT NULL,
  `id_user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_user_role
-- ----------------------------
