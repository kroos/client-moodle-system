/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50522
Source Host           : localhost:3306
Source Database       : systlms

Target Server Type    : MYSQL
Target Server Version : 50522
File Encoding         : 65001

Date: 2013-02-10 15:43:38
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of captcha
-- ----------------------------
INSERT INTO `captcha` VALUES ('9', '1354029956', '127.0.0.1', '15366');
INSERT INTO `captcha` VALUES ('10', '1354030044', '127.0.0.1', '10925');
INSERT INTO `captcha` VALUES ('11', '1360538337', '127.0.0.1', '14765');
INSERT INTO `captcha` VALUES ('12', '1360538349', '127.0.0.1', '39031');
INSERT INTO `captcha` VALUES ('13', '1360538357', '127.0.0.1', '26158');
INSERT INTO `captcha` VALUES ('14', '1360538388', '127.0.0.1', '61817');
INSERT INTO `captcha` VALUES ('15', '1360538467', '127.0.0.1', '88818');
INSERT INTO `captcha` VALUES ('16', '1360538664', '127.0.0.1', '38468');
INSERT INTO `captcha` VALUES ('17', '1360538724', '127.0.0.1', '72646');
INSERT INTO `captcha` VALUES ('18', '1360538757', '127.0.0.1', '55444');
INSERT INTO `captcha` VALUES ('19', '1360538822', '127.0.0.1', '21041');
INSERT INTO `captcha` VALUES ('20', '1360538859', '127.0.0.1', '59548');
INSERT INTO `captcha` VALUES ('21', '1360538861', '127.0.0.1', '96687');
INSERT INTO `captcha` VALUES ('22', '1360538862', '127.0.0.1', '25257');
INSERT INTO `captcha` VALUES ('23', '1360538902', '127.0.0.1', '66612');
INSERT INTO `captcha` VALUES ('24', '1360539135', '127.0.0.1', '54769');

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
INSERT INTO `ci_sessions` VALUES ('abb1b4fa79c702cc51912d5a22347b56', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:21.0) Gecko/20130207 Firefox/21.0', '1360534297', 'a:5:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:5:\"admin\";s:8:\"password\";s:6:\"123123\";s:4:\"role\";a:1:{i:1;s:1:\"1\";}s:9:\"logged_in\";b:1;}');
INSERT INTO `ci_sessions` VALUES ('ba4389954bf1654011e39ff473699054', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:21.0) Gecko/20130207 Firefox/21.0', '1360539134', '');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '0', 'Admin', 'Admin Use Only', '0');
INSERT INTO `course` VALUES ('2', 'PHU 1001', 'Pengenalan', 'Bahagian Pengenalan', '10');
INSERT INTO `course` VALUES ('5', 'KPP1001', 'Kursus Pra Perkahwinan', 'Kursus Pra Perkahwinan', '10');
INSERT INTO `course` VALUES ('6', 'PIT 1001', 'Pengenalan / Muqaddimah', 'Pengenalan', '10');
INSERT INTO `course` VALUES ('7', 'BA 1003', 'Nahu', 'Nahu', '10');
INSERT INTO `course` VALUES ('8', 'BA 1004', 'Sorof', 'Sorof', '10');
INSERT INTO `course` VALUES ('10', 'BA 1002', 'Kemahiran Membaca', 'Kemahiran Membaca', '10');
INSERT INTO `course` VALUES ('11', 'BI 2001', 'Kursus Asas', 'Kursus Asas', '10');
INSERT INTO `course` VALUES ('12', 'STAM 101', 'Hifz Al-Quran dan Tajwid', 'Hifz Al-Quran dan Tajwid', '10');
INSERT INTO `course` VALUES ('13', 'STAM 102', 'Fiqh', 'Fiqh', '10');
INSERT INTO `course` VALUES ('14', 'STAM 103', 'Tauhid', 'Tauhid', '10');
INSERT INTO `course` VALUES ('15', 'STAM 104', 'Tafsir dan Ulumuhu', 'Tafsir dan Ulumuhu', '10');
INSERT INTO `course` VALUES ('16', 'STAM 1005', 'Hadith dan Mustolah', 'Hadith dan Mustolah', '10');
INSERT INTO `course` VALUES ('17', 'STAM 1006', 'Mantiq', 'Mantiq', '10');
INSERT INTO `course` VALUES ('18', 'STAM 1007', 'Nahu', 'Nahu', '10');
INSERT INTO `course` VALUES ('19', 'STAM 1008', 'Sorof', 'Sorof', '10');
INSERT INTO `course` VALUES ('20', 'STAM 1009', 'Insya\'', 'Insya\'', '10');
INSERT INTO `course` VALUES ('21', 'STAM 1010', 'Adab dan Nusus', 'Adab dan Nusus', '10');
INSERT INTO `course` VALUES ('22', 'STAM 1011', 'Mutala\'ah', 'Mutala\'ah', '10');
INSERT INTO `course` VALUES ('23', 'STAM 1012', 'Arud dan Qafiyah', 'Arud dan Qafiyah', '10');
INSERT INTO `course` VALUES ('24', 'STAM 1013', 'Balaghah', 'Balaghah', '10');
INSERT INTO `course` VALUES ('25', 'Doa - 1001', 'Doa-doa pilihan', 'Doa-doa pilihan', '10');
INSERT INTO `course` VALUES ('26', 'PKK 1001', 'Usul Tauhid (Tuan Hussain Kedah)', 'Usul Tauhid (Tuan Hussain Kedah)', '10');
INSERT INTO `course` VALUES ('27', 'KK 1002', 'Ta\'lim Muta\'allim Tariq Ta\'allum', 'Ta\'lim Muta\'allim Tariq Ta\'allum', '10');
INSERT INTO `course` VALUES ('28', 'PKK 1003', 'Hidayah As Subyan', 'Hidayah As Subyan', '10');
INSERT INTO `course` VALUES ('29', 'S 108', 'Adab dan Nusus', 'Adab dan Nusus', '10');
INSERT INTO `course` VALUES ('30', 'SPM 1001', 'Bahasa Melayu', 'Bahasa Melayu', '10');
INSERT INTO `course` VALUES ('31', 'SPM 1002', 'Bahasa Inggeris', 'Bahasa Inggeris', '10');
INSERT INTO `course` VALUES ('32', 'SPM 1003', 'Sains', 'Sains', '10');
INSERT INTO `course` VALUES ('33', 'SPM 1004', 'Matematik', 'Matematik', '10');
INSERT INTO `course` VALUES ('34', 'SPM 1005', 'Kursus Fardhu Ain', 'Kursus Fardhu Ain', '10');

-- ----------------------------
-- Table structure for `group`
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES ('1', 'Admin');
INSERT INTO `group` VALUES ('2', 'Teacher');
INSERT INTO `group` VALUES ('3', 'Others');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `name` char(255) NOT NULL,
  `IC` varchar(20) NOT NULL,
  `address` char(255) DEFAULT NULL,
  `postal_code` varchar(5) DEFAULT NULL,
  `city` char(255) DEFAULT NULL,
  `state` char(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `skype` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '4297f44b13955235245b2497399d7a93', null, 'Admin', '123456789012', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `user_code_course`
-- ----------------------------
DROP TABLE IF EXISTS `user_code_course`;
CREATE TABLE `user_code_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `id_course` int(8) NOT NULL,
  `id_user_role` decimal(1,0) NOT NULL,
  `date_reg` date NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `date_pay` date NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_code_course
-- ----------------------------
INSERT INTO `user_code_course` VALUES ('1', 'admin', '1', '1', '0000-00-00', '1', '0000-00-00', '0000-00-00', '0000-00-00');

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
INSERT INTO `user_role` VALUES ('1', 'Administrator', 'Managers can access course and modify them, they usually do not participate in courses.');
INSERT INTO `user_role` VALUES ('3', 'Teacher', 'Teachers can do anything within a course, including changing the activities and grading students.');
INSERT INTO `user_role` VALUES ('4', 'Non-editing teacher', 'Non-editing teachers can teach in courses and grade students, but may not alter activities.');
INSERT INTO `user_role` VALUES ('5', 'Student', 'Students generally have fewer privileges within a course.');
INSERT INTO `user_role` VALUES ('6', 'Guest', 'Guests have minimal privileges and usually can not enter text anywhere.');

-- ----------------------------
-- View structure for `view_user_payment`
-- ----------------------------
DROP VIEW IF EXISTS `view_user_payment`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_user_payment` AS select `user`.`name` AS `name`,`course`.`course` AS `course`,`course`.`cost` AS `cost`,`user_role`.`user_role` AS `user_role`,`user_code_course`.`date_reg` AS `date_reg`,`user_code_course`.`paid` AS `paid`,`user_code_course`.`date_pay` AS `date_pay` from (((`user` join `user_code_course` on((`user_code_course`.`username` = `user`.`username`))) join `course` on((`user_code_course`.`id_course` = `course`.`id`))) join `user_role` on((`user_code_course`.`id_user_role` = `user_role`.`id`))) where (`user`.`id` <> 1) order by `user_role`.`id`,`user_code_course`.`paid` desc,`user_code_course`.`date_pay` ;
