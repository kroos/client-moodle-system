/*
Navicat MySQL Data Transfer

Source Server         : Myilmu.edu.my
Source Server Version : 50096
Source Host           : myilmu.edu.my:3306
Source Database       : ilmuedu_systlms

Target Server Type    : MYSQL
Target Server Version : 50096
File Encoding         : 65001

Date: 2012-11-27 15:46:15
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `id_payment_type` int(11) NOT NULL,
  `registration_date_start` date NOT NULL,
  `registration_date_end` date NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '0', 'Admin', 'Admin Use Only', '0', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('2', 'PHU 1001', 'Pengenalan', 'Bahagian Pengenalan', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('5', 'KPP1001', 'Kursus Pra Perkahwinan', 'Kursus Pra Perkahwinan', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('6', 'PIT 1001', 'Pengenalan / Muqaddimah', 'Pengenalan', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('7', 'BA 1003', 'Nahu', 'Nahu', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('8', 'BA 1004', 'Sorof', 'Sorof', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('9', 'BA 1001', 'Umum', 'Umum', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('10', 'BA 1002', 'Kemahiran Membaca', 'Kemahiran Membaca', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('11', 'BI 2001', 'Kursus Asas', 'Kursus Asas', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('12', 'STAM 101', 'Hifz Al-Quran dan Tajwid', 'Hifz Al-Quran dan Tajwid', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('13', 'STAM 102', 'Fiqh', 'Fiqh', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('14', 'STAM 103', 'Tauhid', 'Tauhid', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('15', 'STAM 104', 'Tafsir dan Ulumuhu', 'Tafsir dan Ulumuhu', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('16', 'STAM 1005', 'Hadith dan Mustolah', 'Hadith dan Mustolah', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('17', 'STAM 1006', 'Mantiq', 'Mantiq', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('18', 'STAM 1007', 'Nahu', 'Nahu', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('19', 'STAM 1008', 'Sorof', 'Sorof', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('20', 'STAM 1009', 'Insya\'', 'Insya\'', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('21', 'STAM 1010', 'Adab dan Nusus', 'Adab dan Nusus', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('22', 'STAM 1011', 'Mutala\'ah', 'Mutala\'ah', '10', '1', '2012-11-01', '2012-12-31', '2012-11-24', '2013-12-31');
INSERT INTO `course` VALUES ('23', 'STAM 1012', 'Arud dan Qafiyah', 'Arud dan Qafiyah', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('24', 'STAM 1013', 'Balaghah', 'Balaghah', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('25', 'Doa - 1001', 'Doa-doa pilihan', 'Doa-doa pilihan', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('26', 'PKK 1001', 'Usul Tauhid (Tuan Hussain Kedah)', 'Usul Tauhid (Tuan Hussain Kedah)', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('27', 'KK 1002', 'Ta\'lim Muta\'allim Tariq Ta\'allum', 'Ta\'lim Muta\'allim Tariq Ta\'allum', '10', '2', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('28', 'PKK 1003', 'Hidayah As Subyan', 'Hidayah As Subyan', '10', '1', '2012-11-01', '2012-12-31', '2013-01-01', '2013-12-31');
INSERT INTO `course` VALUES ('29', 'S 108', 'Adab dan Nusus', 'Adab dan Nusus', '10', '1', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `course` VALUES ('30', 'SPM 1001', 'Bahasa Melayu', 'Bahasa Melayu', '10', '1', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `course` VALUES ('31', 'SPM 1002', 'Bahasa Inggeris', 'Bahasa Inggeris', '10', '1', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `course` VALUES ('32', 'SPM 1003', 'Sains', 'Sains', '10', '1', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `course` VALUES ('33', 'SPM 1004', 'Matematik', 'Matematik', '10', '1', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO `course` VALUES ('34', 'SPM 1005', 'Kursus Fardhu Ain', 'Kursus Fardhu Ain', '10', '1', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
