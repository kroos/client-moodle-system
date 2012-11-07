/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50522
Source Host           : localhost:3306
Source Database       : systlms

Target Server Type    : MYSQL
Target Server Version : 50522
File Encoding         : 65001

Date: 2012-11-08 02:42:00
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of captcha
-- ----------------------------
INSERT INTO `captcha` VALUES ('3', '1352310914', '127.0.0.1', '32368');
INSERT INTO `captcha` VALUES ('4', '1352310952', '127.0.0.1', '18014');
INSERT INTO `captcha` VALUES ('5', '1352310953', '127.0.0.1', '36584');
INSERT INTO `captcha` VALUES ('6', '1352310954', '127.0.0.1', '55153');
INSERT INTO `captcha` VALUES ('7', '1352311041', '127.0.0.1', '50712');
INSERT INTO `captcha` VALUES ('8', '1352311042', '127.0.0.1', '50712');
INSERT INTO `captcha` VALUES ('9', '1352311042', '127.0.0.1', '69282');
INSERT INTO `captcha` VALUES ('10', '1352311043', '127.0.0.1', '69282');
INSERT INTO `captcha` VALUES ('11', '1352311043', '127.0.0.1', '69282');
INSERT INTO `captcha` VALUES ('12', '1352311043', '127.0.0.1', '69282');
INSERT INTO `captcha` VALUES ('13', '1352311043', '127.0.0.1', '87851');
INSERT INTO `captcha` VALUES ('14', '1352311043', '127.0.0.1', '87851');
INSERT INTO `captcha` VALUES ('15', '1352311044', '127.0.0.1', '87851');
INSERT INTO `captcha` VALUES ('16', '1352311126', '127.0.0.1', '99132');
INSERT INTO `captcha` VALUES ('17', '1352311128', '127.0.0.1', '27701');
INSERT INTO `captcha` VALUES ('18', '1352311128', '127.0.0.1', '46271');
INSERT INTO `captcha` VALUES ('19', '1352311129', '127.0.0.1', '46271');
INSERT INTO `captcha` VALUES ('20', '1352311130', '127.0.0.1', '64841');
INSERT INTO `captcha` VALUES ('21', '1352311231', '127.0.0.1', '68944');
INSERT INTO `captcha` VALUES ('22', '1352311232', '127.0.0.1', '87514');
INSERT INTO `captcha` VALUES ('23', '1352311236', '127.0.0.1', '53222');
INSERT INTO `captcha` VALUES ('24', '1352311300', '127.0.0.1', '71679');
INSERT INTO `captcha` VALUES ('25', '1352312164', '127.0.0.1', '95849');
INSERT INTO `captcha` VALUES ('26', '1352312165', '127.0.0.1', '24419');
INSERT INTO `captcha` VALUES ('27', '1352312166', '127.0.0.1', '42989');
INSERT INTO `captcha` VALUES ('28', '1352312166', '127.0.0.1', '42989');
INSERT INTO `captcha` VALUES ('29', '1352312213', '127.0.0.1', '15762');
INSERT INTO `captcha` VALUES ('30', '1352312368', '127.0.0.1', '14056');
INSERT INTO `captcha` VALUES ('31', '1352312369', '127.0.0.1', '32626');
INSERT INTO `captcha` VALUES ('32', '1352312369', '127.0.0.1', '32626');
INSERT INTO `captcha` VALUES ('33', '1352312369', '127.0.0.1', '51195');
INSERT INTO `captcha` VALUES ('34', '1352312369', '127.0.0.1', '51195');
INSERT INTO `captcha` VALUES ('35', '1352312371', '127.0.0.1', '69765');
INSERT INTO `captcha` VALUES ('36', '1352312371', '127.0.0.1', '69765');
INSERT INTO `captcha` VALUES ('37', '1352312371', '127.0.0.1', '88335');
INSERT INTO `captcha` VALUES ('38', '1352312371', '127.0.0.1', '88335');
INSERT INTO `captcha` VALUES ('39', '1352312373', '127.0.0.1', '35474');
INSERT INTO `captcha` VALUES ('40', '1352312469', '127.0.0.1', '89590');
INSERT INTO `captcha` VALUES ('41', '1352312469', '127.0.0.1', '89590');
INSERT INTO `captcha` VALUES ('42', '1352312469', '127.0.0.1', '18160');
INSERT INTO `captcha` VALUES ('43', '1352312469', '127.0.0.1', '18160');
INSERT INTO `captcha` VALUES ('44', '1352312471', '127.0.0.1', '55299');
INSERT INTO `captcha` VALUES ('45', '1352312690', '127.0.0.1', '53481');

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
INSERT INTO `ci_sessions` VALUES ('fbe0a5e7f29776aeda9bb0010a937801', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:16.0) Gecko/20100101 Firefox/16.0', '1352313696', 'a:1:{s:9:\"user_data\";s:0:\"\";}');

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_course` char(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cost` int(11) NOT NULL,
  `id_payment_type` int(11) NOT NULL,
  `registration_date_start` date NOT NULL,
  `registration_date_end` date NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '0', 'Admin', 'Admin Use Only', '0', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('2', 'PHU 1001', 'Panduan Lengkap Haji &amp; Umrah', 'Bahagian Pengenalan', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('5', 'KPP1001', 'Kursus Pra Perkahwinan', 'Kursus Pra Perkahwinan', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('6', 'PIT 1001', 'Pengenalan / Muqaddimah', 'Pengenalan', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('7', 'BA 1003', 'Nahu', 'Nahu', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('8', 'BA 1004', 'Sorof', 'Sorof', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('9', 'BA 1011', 'Umum', 'Umum', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('10', 'BA 1002', 'Kemahiran Membaca', 'Kemahiran Membaca', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('11', 'BI 2001', 'Kursus Asas', 'Kursus Asas', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('12', 'STAM 1001', 'Hifz Al-Quran dan Tajwid', 'Hifz Al-Quran dan Tajwid', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('13', 'STAM 1002', 'Fiqh', 'Fiqh', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('14', 'STAM 1003', 'Tauhid', 'Tauhid', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('15', 'STAM 1004', 'Tafsir dan Ulumuhu', 'Tafsir dan Ulumuhu', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('16', 'STAM 1005', 'Hadith dan Mustolah', 'Hadith dan Mustolah', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('17', 'STAM 1006', 'Mantiq', 'Mantiq', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('18', 'STAM 1007', 'Nahu', 'Nahu', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('19', 'STAM 1008', 'Sorof', 'Sorof', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('20', 'STAM 1009', 'Insya\'', 'Insya\'', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('21', 'STAM 1010', 'Adab dan Nusus', 'Adab dan Nusus', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('22', 'STAM 1011', 'Mutala\'ah', 'Mutala\'ah', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('23', 'STAM 1012', 'Arud dan Qafiyah', 'Arud dan Qafiyah', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('24', 'STAM 1013', 'Balaghah', 'Balaghah', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('25', 'Doa - 1001', 'Doa-doa pilihan', 'Doa-doa pilihan', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('26', 'PKK 1001', 'Usul Tauhid (Tuan Hussain Kedah)', 'Usul Tauhid (Tuan Hussain Kedah)', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('27', 'KK 1002', 'Ta\'lim Muta\'allim Tariq Ta\'allum', 'Ta\'lim Muta\'allim Tariq Ta\'allum', '10', '2', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('28', 'PKK 1003', 'Hidayah As Subyan', 'Hidayah As Subyan', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'efc9b1e45645f55afbf7401a728b3334', 'Admin', '123456789012', null, null, null, null, null, null);
INSERT INTO `user` VALUES ('2', 'stud@gmail.com', '4297f44b13955235245b2497399d7a93', 'Nabil Asif', '123456789012', '72, Jalan Keranji 11, Taman Keranji,', '05400', 'Alor Setar', 'Kedah', '0162172420', '');
INSERT INTO `user` VALUES ('3', 'stud1@gmail.com', '4297f44b13955235245b2497399d7a93', 'Azaliha Abdullah', '123456789012', '123, Sdfsdf Sdfsdf, Trytyu, Ghjgvbn,', '08000', 'Johor Bahru', 'Johor', '0162172420', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_code_course
-- ----------------------------
INSERT INTO `user_code_course` VALUES ('1', 'admin', '1', '1', '', '');
INSERT INTO `user_code_course` VALUES ('2', 'stud@gmail.com', '12', '5', '', '');
INSERT INTO `user_code_course` VALUES ('4', 'stud1@gmail.com', '2', '5', '', '');
INSERT INTO `user_code_course` VALUES ('5', 'stud@gmail.com', '8', '5', '', '');
INSERT INTO `user_code_course` VALUES ('6', 'stud@gmail.com', '19', '5', '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_payment_bank
-- ----------------------------
INSERT INTO `user_payment_bank` VALUES ('1', 'stud@gmail.com', '12', '0', '', null, '2013-01-07', '0', '0', 'Please make a payment before Mon, 7 Jan 2013');
INSERT INTO `user_payment_bank` VALUES ('3', 'stud1@gmail.com', '2', '0', '', null, '2013-01-07', '0', '0', 'Please make a payment before Mon, 7 Jan 2013');
INSERT INTO `user_payment_bank` VALUES ('4', 'stud@gmail.com', '8', '0', '', null, '2013-01-07', '0', '0', 'Please make a payment before Mon, 7 Jan 2013');
INSERT INTO `user_payment_bank` VALUES ('5', 'stud@gmail.com', '19', '0', '', null, '2013-01-07', '0', '0', 'Please make a payment before Mon, 7 Jan 2013');

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
