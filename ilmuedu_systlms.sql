/*
Navicat MySQL Data Transfer

Source Server         : myilmu.edu.my
Source Server Version : 50096
Source Host           : myilmu.edu.my:3306
Source Database       : ilmuedu_systlms

Target Server Type    : MYSQL
Target Server Version : 50096
File Encoding         : 65001

Date: 2013-02-11 03:00:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `captcha`
-- ----------------------------
DROP TABLE IF EXISTS `captcha`;
CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL auto_increment,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL default '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY  (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of captcha
-- ----------------------------
INSERT INTO `captcha` VALUES ('19', '1356159102', '175.141.45.239', '64421');
INSERT INTO `captcha` VALUES ('20', '1356257194', '202.185.6.180', '57747');
INSERT INTO `captcha` VALUES ('21', '1356329562', '60.48.48.96', '91632');
INSERT INTO `captcha` VALUES ('22', '1356462535', '180.76.5.196', '47188');
INSERT INTO `captcha` VALUES ('23', '1356557214', '180.76.5.191', '10448');
INSERT INTO `captcha` VALUES ('24', '1356612305', '175.141.99.20', '33697');
INSERT INTO `captcha` VALUES ('25', '1358324659', '175.145.98.121', '59204');
INSERT INTO `captcha` VALUES ('26', '1358509523', '175.143.152.61', '43061');
INSERT INTO `captcha` VALUES ('27', '1358762310', '66.249.73.177', '58946');
INSERT INTO `captcha` VALUES ('28', '1359066268', '66.249.73.177', '29252');
INSERT INTO `captcha` VALUES ('29', '1359067491', '66.249.73.177', '99348');
INSERT INTO `captcha` VALUES ('30', '1359092317', '180.76.5.101', '93125');
INSERT INTO `captcha` VALUES ('31', '1359304634', '175.137.31.163', '47547');
INSERT INTO `captcha` VALUES ('32', '1360211492', '202.185.6.180', '50265');
INSERT INTO `captcha` VALUES ('33', '1360212077', '202.185.6.180', '63602');

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(45) NOT NULL default '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('0674cd0e18710e706e4e52af32a7dd86', '175.140.29.82', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:21.0) Gecko/20130207 Firefox/21.0', '1360522783', 'a:4:{s:8:\"username\";s:5:\"admin\";s:8:\"password\";s:7:\"2322077\";s:4:\"role\";a:1:{i:1;s:1:\"1\";}s:9:\"logged_in\";b:1;}');

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL auto_increment,
  `code_course` char(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cost` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '0', 'Admin', 'Admin Use Only', '0');
INSERT INTO `course` VALUES ('3', 'BA001', 'BA001 Pengenalan Bahasa Arab', 'BA-001 Pengenalan Bahasa Arab', '0');
INSERT INTO `course` VALUES ('4', 'S100', 'STAM S001 Pengenalan Pengajian STAM', 'STAM S001 Pengenalan Pengajian STAM', '0');
INSERT INTO `course` VALUES ('5', 'S101-01', 'S101 Pengenalan Hifz Al-quran Dan Tajwid', 'S101 Pengenalan Hifz Al-quran Dan Tajwid', '0');
INSERT INTO `course` VALUES ('6', 'S101-02', 'S101 Hifz Al-Quran dan Tajwid Topik 1 ', 'STAM S101-02 Topik 1 Hifz Al-Quran dan Tajwid', '0');
INSERT INTO `course` VALUES ('7', 'S102-01', 'S102  Fiqh - Muqaddimah', 'S102  Fiqh - Muqaddimah', '0');
INSERT INTO `course` VALUES ('8', 'S102-02', 'S102  Fiqh - Topik 1', 'S102  Fiqh - Topik 1', '0');
INSERT INTO `course` VALUES ('9', 'S103-01', 'S103 Tauhid dan Mantik - Pengenalan', 'S103 Tauhid dan Mantik - Pengenalan', '0');
INSERT INTO `course` VALUES ('10', 'S103-02', 'S103 Tauhid dan Mantik - Topik 1', 'S103 Tauhid dan Mantik - Topik 1', '0');
INSERT INTO `course` VALUES ('11', 'S103-03', 'S103 Tauhid dan Mantik - Topik 2', 'S103 Tauhid dan Mantik - Topik 2', '0');
INSERT INTO `course` VALUES ('12', 'S104-01', 'S104 Tafsir dan Ulumuhu - Pengenalan', 'S104  Tafsir dan Ulumuhu - Pengenalan', '0');
INSERT INTO `course` VALUES ('13', 'S104-02', 'S104  Tafsir dan Ulumuhu - Topik 1', 'S104  Tafsir dan Ulumuhu - Topik 1', '0');
INSERT INTO `course` VALUES ('14', 'S105-01', 'S105 Hadith dan Mustolah - Pengenalan', 'S105 Hadith dan Mustolah - Pengenalan', '0');
INSERT INTO `course` VALUES ('15', 'S105-02', 'S105 Hadith dan Mustolah - Topik 1', 'S105 Hadith dan Mustolah - Topik 1', '0');
INSERT INTO `course` VALUES ('16', 'S106-01', 'S106 Nahu dan Sarf - Pengenalan', 'S106 Nahu dan Sarf - Pengenalan', '0');
INSERT INTO `course` VALUES ('17', 'S106-02', 'S106 Nahu dan Sarf - Topik 1', 'S106 Nahu dan Sarf - Topik 1', '0');
INSERT INTO `course` VALUES ('18', 'S107-01', 'S107 Insya\' dan Mutola\'ah - Pengenalan', 'S107 Insya\' dan Mutola\'ah - Pengenalan', '0');
INSERT INTO `course` VALUES ('19', 'S107-02', 'S107 Insya\' dan Mutola\'ah - Topik 1', 'S107 Insya\' dan Mutola\'ah - Topik 1', '0');
INSERT INTO `course` VALUES ('20', 'S108-01', 'S108 Adab dan Nusus - Pengenalan', 'S108 Adab dan Nusus - Pengenalan', '0');
INSERT INTO `course` VALUES ('21', 'S108-02', 'S108 Adab dan Nusus - Topik 1', 'S108 Adab dan Nusus - Topik 1', '0');
INSERT INTO `course` VALUES ('22', 'S109-01', 'S109  Arud dan Qafiyah - Pengenalan', 'S109  Arud dan Qafiyah - Pengenalan', '0');
INSERT INTO `course` VALUES ('23', 'S109-01', 'S109 Arud dan Qafiyah - Topik 1', 'S109 Arud dan Qafiyah - Topik 1', '0');
INSERT INTO `course` VALUES ('24', 'S110-01', 'S110  Balaqah - Pengenalan ', 'S110  Balaqah - Pengenalan ', '0');
INSERT INTO `course` VALUES ('25', 'S110-02', 'S110 Balaqah - Topik 1', 'S110 Balaqah - Topik 1', '0');
INSERT INTO `course` VALUES ('26', 'S110-03', 'S110 Balaqah - Topik 2', 'S110 Balaqah - Topik 2', '0');
INSERT INTO `course` VALUES ('27', 'PHU-1000', 'PHU-1000 Pengenalan Sekitar Haji & Umrah', 'PHU-1000 Pengenalan Sekitar Haji & Umrah', '0');
INSERT INTO `course` VALUES ('28', 'PHU-1001', 'PHU-1001 Nota Bahagian Pertama ', 'PHU-1001 Nota Bahagian Pertama ', '0');
INSERT INTO `course` VALUES ('29', 'PHU-1002', 'PHU-1002 Nota Bahagian Kedua', 'PHU-1002 Nota Bahagian Kedua', '0');
INSERT INTO `course` VALUES ('30', 'PHU-1003', 'PHU-1002 Nota Bahagian Ketiga', 'PHU-1002 Nota Bahagian Ketiga', '0');
INSERT INTO `course` VALUES ('31', 'PHU-1004', 'PHU-1004 Nota Bahagian Keempat', 'PHU-1004 Nota Bahagian Keempat', '0');
INSERT INTO `course` VALUES ('32', 'PHU-1005', 'PHU-1005 Nota Bahagian Kelima', 'PHU-1005 Nota Bahagian Kelima', '0');
INSERT INTO `course` VALUES ('33', 'PHU-1006', 'PHU-1006 Nota Bahagian Keenam', 'PHU-1006 Nota Bahagian Keenam', '0');
INSERT INTO `course` VALUES ('34', 'PHU-1007', 'PHU-1007 Nota Bahagian Ketujuh', 'PHU-1007 Nota Bahagian Ketujuh', '0');
INSERT INTO `course` VALUES ('35', 'PHU-1008', 'PHU-1008 Nota Bahagian Kelapan', 'PHU-1008 Nota Bahagian Kelapan', '0');
INSERT INTO `course` VALUES ('36', 'PHU-1009', 'PHU-1009 Nota Bahagian Kesembilan', 'PHU-1009 Nota Bahagian Kesembilan', '0');
INSERT INTO `course` VALUES ('37', 'PHU-1010', 'PHU-1010 Nota Bahagian Kesepuluh', 'PHU-1010 Nota Bahagian Kesepuluh', '0');

-- ----------------------------
-- Table structure for `group`
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL auto_increment,
  `group` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
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
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_group` int(11) default NULL,
  `name` char(255) NOT NULL,
  `IC` varchar(20) NOT NULL,
  `address` char(255) default NULL,
  `postal_code` varchar(5) default NULL,
  `city` char(255) default NULL,
  `state` char(20) default NULL,
  `phone` varchar(15) default NULL,
  `skype` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '593239c39771ab28f575747f1fb91db6', '1', 'Admin', '123456789012', null, null, null, null, null, null);
INSERT INTO `user` VALUES ('2', 'shaharudinshafie@gmail.com', '593239c39771ab28f575747f1fb91db6', null, 'Shaharudin', '720916025351', 'No. 60 Taman Pandan', '05350', 'Alor Setar', 'Kedah', '', '');
INSERT INTO `user` VALUES ('3', 'stud@gmail.com', '4297f44b13955235245b2497399d7a93', null, 'Student 1', '900101025555', '1, Taman Mutiara', '08000', 'Sungai Petani', 'Kedah', '0162172420', 'none');
INSERT INTO `user` VALUES ('4', 'zakariaalmakki@yahoo.com', '85b47841f9064236686829b2b4e500da', '2', 'Ustaz Zakaria Ismail', '120101021234', '', '05350', 'Alor Setar', 'Kedah', '', '');
INSERT INTO `user` VALUES ('5', 'abujahid5755@gmail.com', '7b22e6af02e17765a0274f6db5364e06', '2', 'Muhammad Fuad Shafie', '720916205352', '', '', '', '', '', '');
INSERT INTO `user` VALUES ('6', 'maya_liyas5884@yahoo.com', '8596cd71c2deb2d77481ae93f444da03', null, 'Maya2012', '120101021235', 'Kolej Islam Darul Ulum', '05350', 'Alor Setar', 'Kedah', '', '');
INSERT INTO `user` VALUES ('7', 'nasir_fatoni@yahoo.com', '069a95650d29913367fe34f3baa78c21', '2', 'Mohd Zaki (nasir)', '710101675039', '', '', '', 'Kedah', '0104041861', '');
INSERT INTO `user` VALUES ('8', 'zahidi@myilmu.edu.my', '229fb4fe140dea060a46f1ed501eebe7', '1', 'Zahidi Omar', '123456543212', 'Alor Setar', '', 'Alor Setar', 'Kedah', '', '');
INSERT INTO `user` VALUES ('10', 'unaser@myilmu.edu.my', '6549395683ad00469294415850670283', '2', 'Ustaz Naser Abu Faidh', '123456654321', '', '', 'Alor Setar', 'Kedah', '', '');
INSERT INTO `user` VALUES ('11', 'student1@myilmu.edu.my', '593239c39771ab28f575747f1fb91db6', null, 'Pelajar 1', '123212345678', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `user_code_course`
-- ----------------------------
DROP TABLE IF EXISTS `user_code_course`;
CREATE TABLE `user_code_course` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `id_course` int(8) NOT NULL,
  `id_user_role` decimal(1,0) NOT NULL,
  `date_reg` date NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `date_pay` date NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_code_course
-- ----------------------------
INSERT INTO `user_code_course` VALUES ('1', 'admin', '1', '1', '0000-00-00', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('4', 'shaharudinshafie@gmail.com', '3', '5', '2012-12-22', '1', '2012-12-22', '2012-12-22', '2013-01-22');
INSERT INTO `user_code_course` VALUES ('5', 'zakariaalmakki@yahoo.com', '4', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('6', 'zakariaalmakki@yahoo.com', '5', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('7', 'zakariaalmakki@yahoo.com', '6', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('8', 'zakariaalmakki@yahoo.com', '7', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('9', 'zakariaalmakki@yahoo.com', '8', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('10', 'zakariaalmakki@yahoo.com', '9', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('11', 'zakariaalmakki@yahoo.com', '10', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('12', 'zakariaalmakki@yahoo.com', '11', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('13', 'zakariaalmakki@yahoo.com', '12', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('14', 'zakariaalmakki@yahoo.com', '13', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('15', 'zakariaalmakki@yahoo.com', '14', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('16', 'zakariaalmakki@yahoo.com', '15', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('17', 'zakariaalmakki@yahoo.com', '16', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('18', 'zakariaalmakki@yahoo.com', '17', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('19', 'zakariaalmakki@yahoo.com', '18', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('20', 'zakariaalmakki@yahoo.com', '19', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('21', 'zakariaalmakki@yahoo.com', '20', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('22', 'zakariaalmakki@yahoo.com', '21', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('23', 'zakariaalmakki@yahoo.com', '22', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('24', 'zakariaalmakki@yahoo.com', '23', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('25', 'zakariaalmakki@yahoo.com', '24', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('26', 'zakariaalmakki@yahoo.com', '25', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('27', 'zakariaalmakki@yahoo.com', '26', '3', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('28', 'abujahid5755@gmail.com', '1', '1', '2012-12-24', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('29', 'maya_liyas5884@yahoo.com', '22', '3', '2012-12-26', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('30', 'maya_liyas5884@yahoo.com', '23', '3', '2012-12-26', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('31', 'nasir_fatoni@yahoo.com', '3', '3', '2012-12-30', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('32', 'zahidi@myilmu.edu.my', '1', '1', '2013-01-21', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('35', 'unaser@myilmu.edu.my', '27', '3', '2013-01-21', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('36', 'unaser@myilmu.edu.my', '28', '3', '2013-01-21', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('37', 'unaser@myilmu.edu.my', '29', '3', '2013-01-21', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('38', 'unaser@myilmu.edu.my', '30', '3', '2013-01-21', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('39', 'unaser@myilmu.edu.my', '31', '3', '2013-01-21', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('40', 'unaser@myilmu.edu.my', '32', '3', '2013-01-21', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('41', 'unaser@myilmu.edu.my', '33', '3', '2013-01-21', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('42', 'unaser@myilmu.edu.my', '34', '3', '2013-01-21', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('43', 'unaser@myilmu.edu.my', '35', '3', '2013-01-21', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('44', 'unaser@myilmu.edu.my', '36', '3', '2013-01-21', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('45', 'unaser@myilmu.edu.my', '37', '3', '2013-01-21', '1', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `user_code_course` VALUES ('46', 'student1@myilmu.edu.my', '27', '5', '2013-01-23', '1', '2013-01-23', '2013-01-23', '2013-02-23');

-- ----------------------------
-- Table structure for `user_role`
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL auto_increment,
  `user_role` char(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('1', 'Administrator', 'Managers can access course and modify them, they usually do not participate in courses.');
INSERT INTO `user_role` VALUES ('3', 'Teacher', 'Teachers can do anything within a course, including changing the activities and grading students.');
INSERT INTO `user_role` VALUES ('4', 'Non-editing teacher', 'Non-editing teachers can teach in courses and grade students, but may not alter activities.');
INSERT INTO `user_role` VALUES ('5', 'Student', 'Students generally have fewer privileges within a course.');
INSERT INTO `user_role` VALUES ('6', 'Guest', 'Guests have minimal privileges and usually can not enter text anywhere.');
