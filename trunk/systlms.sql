/*
Navicat MySQL Data Transfer

Source Server         : a3ncabal.dyndns.info
Source Server Version : 50522
Source Host           : a3ncabal.dyndns.info:3306
Source Database       : systlms

Target Server Type    : MYSQL
Target Server Version : 50522
File Encoding         : 65001

Date: 2012-10-30 02:09:29
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES ('1', 'Maybank');
INSERT INTO `bank` VALUES ('2', 'CIMB');
INSERT INTO `bank` VALUES ('3', 'RHB');
INSERT INTO `bank` VALUES ('4', 'Public Bank');
INSERT INTO `bank` VALUES ('5', 'Bank Islam');

-- ----------------------------
-- Table structure for `captcha`
-- ----------------------------
DROP TABLE IF EXISTS `captcha`;
CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of captcha
-- ----------------------------
INSERT INTO `captcha` VALUES ('4', '1351531905', '127.0.0.1', '84814');
INSERT INTO `captcha` VALUES ('5', '1351533270', '127.0.0.1', '33804');
INSERT INTO `captcha` VALUES ('6', '1351533401', '127.0.0.1', '36427');
INSERT INTO `captcha` VALUES ('7', '1351533524', '127.0.0.1', '70493');
INSERT INTO `captcha` VALUES ('8', '1351533694', '127.0.0.1', '95902');
INSERT INTO `captcha` VALUES ('9', '1351533713', '127.0.0.1', '70155');
INSERT INTO `captcha` VALUES ('10', '1351533722', '127.0.0.1', '57282');
INSERT INTO `captcha` VALUES ('11', '1351533777', '127.0.0.1', '88612');

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
INSERT INTO `ci_sessions` VALUES ('bd1cb51cfccae852da9113b5e9629981', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:16.0) Gecko/20100101 Firefox/16.0', '1351534130', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', 'lk', 'lipat kain', 'kursus lipat kain', '10', '4');
INSERT INTO `course` VALUES ('2', 'jk', 'jemur kain', 'kursus jemur kain', '10', '4');
INSERT INTO `course` VALUES ('3', 'kr', 'kemas rumah', 'kursus kemas rumah', '20', '8');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` char(255) NOT NULL,
  `IC` varchar(20) NOT NULL,
  `address` char(255) DEFAULT NULL,
  `postal_code` varchar(5) DEFAULT NULL,
  `city` char(255) DEFAULT NULL,
  `state` char(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'stud@gmail.com', '4297f44b13955235245b2497399d7a93', 'Nabil Asif Noor Dhiauddin', '760505026479', '1, Taman Mutiara', '08000', 'Sungai Petani', 'Kedah', '0162172420');
INSERT INTO `user` VALUES ('2', 'admin', 'efc9b1e45645f55afbf7401a728b3334', 'Admin', '123456789012', null, null, null, null, null);
INSERT INTO `user` VALUES ('3', 'gerabah@gmail.com', '4297f44b13955235245b2497399d7a93', 'Nur Abdul Aziz', '100524025648', '72, Jalan Keranji 11, Taman Keranji, Jalan Alor Mengkudu,', '05400', 'Alor Setar', 'Kedah', '0162172420');

-- ----------------------------
-- Table structure for `user_code_course`
-- ----------------------------
DROP TABLE IF EXISTS `user_code_course`;
CREATE TABLE `user_code_course` (
  `username` varchar(255) NOT NULL,
  `code_course` char(8) NOT NULL,
  `activate` decimal(1,0) NOT NULL,
  `graduate` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_code_course
-- ----------------------------
INSERT INTO `user_code_course` VALUES ('stud@gmail.com', 'lk', '0', '0');
INSERT INTO `user_code_course` VALUES ('stud@gmail.com', 'kr', '0', '0');
INSERT INTO `user_code_course` VALUES ('gerabah@gmail.com', 'lk', '0', '0');

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
INSERT INTO `user_payment_bank` VALUES ('stud@gmail.com', '30', '123123', '2012-10-29 23:03:42', '5', 'bayar pakai cheq');

-- ----------------------------
-- Table structure for `user_role`
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` char(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('1', 'Manager', 'Managers can access course and modify them, they usually do not participate in courses.');
INSERT INTO `user_role` VALUES ('2', 'Course creator', 'Course creators can create new courses.');
INSERT INTO `user_role` VALUES ('3', 'Teacher', 'Teachers can do anything within a course, including changing the activities and grading students.');
INSERT INTO `user_role` VALUES ('4', 'Non-editing teacher', 'Non-editing teachers can teach in courses and grade students, but may not alter activities.');
INSERT INTO `user_role` VALUES ('5', 'Student', 'Students generally have fewer privileges within a course.');
INSERT INTO `user_role` VALUES ('6', 'Guest', 'Guests have minimal privileges and usually can not enter text anywhere.');

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
INSERT INTO `user_user_role` VALUES ('stud@gmail.com', '5');
INSERT INTO `user_user_role` VALUES ('admin', '1');
INSERT INTO `user_user_role` VALUES ('gerabah@gmail.com', '5');