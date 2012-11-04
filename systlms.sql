/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50522
Source Host           : localhost:3306
Source Database       : systlms

Target Server Type    : MYSQL
Target Server Version : 50522
File Encoding         : 65001

Date: 2012-11-05 02:31:04
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of captcha
-- ----------------------------
INSERT INTO `captcha` VALUES ('16', '1352558431', '127.0.0.1', '15657');
INSERT INTO `captcha` VALUES ('17', '1352558482', '127.0.0.1', '62709');
INSERT INTO `captcha` VALUES ('20', '1352046694', '127.0.0.1', '73223');
INSERT INTO `captcha` VALUES ('21', '1352046818', '127.0.0.1', '54428');

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
INSERT INTO `ci_sessions` VALUES ('0eb6769145791a3e5347e3f8464ea671', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:16.0) Gecko/20100101 Firefox/16.0', '1359656283', 'a:5:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:15:\"stud4@gmail.com\";s:8:\"password\";s:32:\"4297f44b13955235245b2497399d7a93\";s:4:\"role\";a:2:{i:1;s:1:\"5\";i:2;s:1:\"5\";}s:9:\"logged_in\";b:1;}');
INSERT INTO `ci_sessions` VALUES ('648446efa576d6d686e211baa8f3ab94', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:16.0) Gecko/20100101 Firefox/16.0', '1352053771', 'a:1:{s:9:\"user_data\";s:0:\"\";}');

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
  `id_payment_type` int(11) NOT NULL,
  `registration_date_start` date NOT NULL,
  `registration_date_end` date NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '0', 'Admin', 'Admin Use Only', '0', '1', '2012-12-01', '2012-12-31', '2013-01-01', '2013-01-31');
INSERT INTO `course` VALUES ('2', 'lk', 'lipat kain', 'kursus lipat kain', '10', '1', '2012-08-01', '2012-09-01', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('3', 'jk', 'jemur kain', 'kursus jemur kain', '10', '1', '2012-09-01', '2012-11-30', '2012-12-01', '2013-02-28');
INSERT INTO `course` VALUES ('4', 'kr', 'kemas rumah', 'kursus kemas rumah', '20', '1', '2012-12-01', '2013-01-31', '2013-02-01', '2013-04-30');
INSERT INTO `course` VALUES ('5', 'bp', 'basuh pinggan', 'kursus basuh pinggan', '80', '2', '2012-11-03', '2012-12-31', '2012-11-01', '2013-01-31');
INSERT INTO `course` VALUES ('6', 'stam', 'sijil tinggi agama malaysia', 'kursus STAM', '30', '2', '2012-11-01', '2013-03-31', '2013-01-01', '2013-11-30');

-- ----------------------------
-- Table structure for `payment_type`
-- ----------------------------
DROP TABLE IF EXISTS `payment_type`;
CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_recurring` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payment_type
-- ----------------------------
INSERT INTO `payment_type` VALUES ('1', 'course');
INSERT INTO `payment_type` VALUES ('2', 'month');
INSERT INTO `payment_type` VALUES ('3', 'semester');

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
  `skype` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'efc9b1e45645f55afbf7401a728b3334', 'Admin', '123456789012', null, null, null, null, null, null);
INSERT INTO `user` VALUES ('2', 'stud@gmail.com', '4297f44b13955235245b2497399d7a93', 'Nabil Asif Noor Dhiauddin', '760505026479', '1, Taman Mutiara', '08000', 'Sungai Petani', 'Kedah', '0162172420', null);
INSERT INTO `user` VALUES ('8', 'stud1@gmail.com', '4297f44b13955235245b2497399d7a93', 'None Of The Above', '123456789012', '123, 123123123, Jhagsdu Uiaysdbasg Xozc ,\r\nLkahspduasd, Jkhdfui Jksdfkh', '08000', 'Alor Setar', 'Kedah', '0162172420', 'none');
INSERT INTO `user` VALUES ('9', 'stud2@gmail.com', '4297f44b13955235245b2497399d7a93', 'Nabil Asif', '123456789012', '123,lkhj Lhasd, Uioyi Weroyasfjbksjdf 11', '08000', 'Alor Setar', 'Selangor', '0162172420', '');
INSERT INTO `user` VALUES ('10', 'stud3@gmail.com', '4297f44b13955235245b2497399d7a93', 'Azaliha Abdullah', '123456789012', '123, Kjh Askdjgas, Khgasdjghoausd', '08000', 'Alor Setar', 'Selangor', '0162172420', 'none');
INSERT INTO `user` VALUES ('11', 'stud4@gmail.com', '4297f44b13955235245b2497399d7a93', 'Azaliha Abdullah', '123456789012', '123, Sdf Sdf Jhdvd', '08000', 'Alor Setar', 'Selangor', '0162172420', 'none');

-- ----------------------------
-- Table structure for `user_code_course`
-- ----------------------------
DROP TABLE IF EXISTS `user_code_course`;
CREATE TABLE `user_code_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `id_course` int(8) NOT NULL,
  `id_user_role` decimal(1,0) NOT NULL,
  `activate` bit(1) NOT NULL,
  `graduate` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_code_course
-- ----------------------------
INSERT INTO `user_code_course` VALUES ('2', 'admin', '1', '1', '', '');
INSERT INTO `user_code_course` VALUES ('5', 'stud1@gmail.com', '6', '5', '', '');
INSERT INTO `user_code_course` VALUES ('6', 'stud2@gmail.com', '5', '5', '', '');
INSERT INTO `user_code_course` VALUES ('7', 'stud3@gmail.com', '5', '5', '', '');
INSERT INTO `user_code_course` VALUES ('12', 'stud@gmail.com', '6', '5', '', '');
INSERT INTO `user_code_course` VALUES ('13', 'stud@gmail.com', '5', '5', '', '');
INSERT INTO `user_code_course` VALUES ('14', 'stud4@gmail.com', '3', '5', '', '');
INSERT INTO `user_code_course` VALUES ('15', 'stud4@gmail.com', '4', '5', '', '');

-- ----------------------------
-- Table structure for `user_payment_bank`
-- ----------------------------
DROP TABLE IF EXISTS `user_payment_bank`;
CREATE TABLE `user_payment_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `id_course` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `date_payment` date DEFAULT NULL,
  `date_due` date NOT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `paid` int(1) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_payment_bank
-- ----------------------------
INSERT INTO `user_payment_bank` VALUES ('13', 'stud1@gmail.com', '6', '0', '', null, '2013-01-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('14', 'stud1@gmail.com', '6', '0', '', null, '2013-02-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('15', 'stud1@gmail.com', '6', '0', '', null, '2013-03-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('16', 'stud1@gmail.com', '6', '0', '', null, '2013-04-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('17', 'stud1@gmail.com', '6', '0', '', null, '2013-05-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('18', 'stud1@gmail.com', '6', '0', '', null, '2013-06-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('19', 'stud1@gmail.com', '6', '0', '', null, '2013-07-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('20', 'stud1@gmail.com', '6', '0', '', null, '2013-08-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('21', 'stud1@gmail.com', '6', '0', '', null, '2013-09-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('22', 'stud1@gmail.com', '6', '0', '', null, '2013-10-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('23', 'stud1@gmail.com', '6', '0', '', null, '2013-11-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('24', 'stud2@gmail.com', '5', '0', '', null, '2012-11-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('25', 'stud2@gmail.com', '5', '0', '', null, '2012-12-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('26', 'stud2@gmail.com', '5', '0', '', null, '2013-01-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('27', 'stud3@gmail.com', '5', '0', '', null, '2012-12-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('28', 'stud3@gmail.com', '5', '0', '', null, '2013-01-07', '0', '0', 'Please pay before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('43', 'stud@gmail.com', '6', '0', '', null, '2013-01-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('44', 'stud@gmail.com', '6', '0', '', null, '2013-02-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('45', 'stud@gmail.com', '6', '0', '', null, '2013-03-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('46', 'stud@gmail.com', '6', '0', '', null, '2013-04-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('47', 'stud@gmail.com', '6', '0', '', null, '2013-05-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('48', 'stud@gmail.com', '6', '0', '', null, '2013-06-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('49', 'stud@gmail.com', '6', '0', '', null, '2013-07-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('50', 'stud@gmail.com', '6', '0', '', null, '2013-08-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('51', 'stud@gmail.com', '6', '0', '', null, '2013-09-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('52', 'stud@gmail.com', '6', '0', '', null, '2013-10-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('53', 'stud@gmail.com', '6', '0', '', null, '2013-11-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('54', 'stud@gmail.com', '5', '80', 'cheque num : 5236 1258 4563', '2012-11-16', '2012-11-07', '1', '1', 'payment by cheque');
INSERT INTO `user_payment_bank` VALUES ('55', 'stud@gmail.com', '5', '0', '', null, '2012-12-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('56', 'stud@gmail.com', '5', '0', '', null, '2013-01-07', '0', '0', 'Please make a payment before 7th day of each month');
INSERT INTO `user_payment_bank` VALUES ('57', 'stud4@gmail.com', '3', '0', '', null, '2012-12-07', '0', '0', 'Please make a payment before Fri, 7 Dec 2012');
INSERT INTO `user_payment_bank` VALUES ('58', 'stud4@gmail.com', '4', '0', '', null, '2013-02-07', '0', '0', 'Please make a payment before Fri, 7 Dec 2012');

-- ----------------------------
-- Table structure for `user_role`
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` char(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('1', 'Administrator', 'Managers can access course and modify them, they usually do not participate in courses.');
INSERT INTO `user_role` VALUES ('2', 'Course creator', 'Course creators can create new courses.');
INSERT INTO `user_role` VALUES ('3', 'Teacher', 'Teachers can do anything within a course, including changing the activities and grading students.');
INSERT INTO `user_role` VALUES ('4', 'Non-editing teacher', 'Non-editing teachers can teach in courses and grade students, but may not alter activities.');
INSERT INTO `user_role` VALUES ('5', 'Student', 'Students generally have fewer privileges within a course.');
INSERT INTO `user_role` VALUES ('6', 'Guest', 'Guests have minimal privileges and usually can not enter text anywhere.');
INSERT INTO `user_role` VALUES ('7', 'Authenticated user', 'All logged in users.');
