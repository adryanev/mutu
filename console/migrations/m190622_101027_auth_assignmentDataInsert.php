<?php

use yii\db\Schema;
use yii\db\Migration;

class m190622_101027_auth_assignmentDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
      $sequel = <<<SQL


SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  INDEX `idx-auth_assignment-user_id`(`user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('adminFakultas', '3', 1561199566);
INSERT INTO `auth_assignment` VALUES ('adminInstitusi', '2', 1561199559);
INSERT INTO `auth_assignment` VALUES ('adminProdi', '4', 1561199573);
INSERT INTO `auth_assignment` VALUES ('superUser', '1', 1561199550);
INSERT INTO `auth_assignment` VALUES ('userFakultas', '6', 1561199588);
INSERT INTO `auth_assignment` VALUES ('userInstitusi', '5', 1561199581);
INSERT INTO `auth_assignment` VALUES ('userProdi', '7', 1561199595);

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `data` blob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `rule_name`(`rule_name`) USING BTREE,
  INDEX `idx-auth_item-type`(`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('@app-admin/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-institusi/*', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-institusi/create', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-institusi/delete', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-institusi/index', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-institusi/update', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-institusi/view', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi-s1/*', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi-s1/create', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi-s1/delete', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi-s1/index', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi-s1/update', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi-s1/view', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi-s2/*', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi-s2/create', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi-s2/delete', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi-s2/index', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi-s2/update', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi-s2/view', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi/*', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi-prodi/index', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi/*', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi/create', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi/delete', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi/index', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi/update', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/akreditasi/view', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/fakultas-akademi/*', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/fakultas-akademi/create', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/fakultas-akademi/delete', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/fakultas-akademi/index', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/fakultas-akademi/update', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/fakultas-akademi/view', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/jenis-akreditasi/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/jenis-akreditasi/create', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/jenis-akreditasi/delete', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/jenis-akreditasi/index', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/jenis-akreditasi/update', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/jenis-akreditasi/view', 2, NULL, NULL, NULL, 1561199355, 1561199355);
INSERT INTO `auth_item` VALUES ('@app-admin/program-studi/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/program-studi/create', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/program-studi/delete', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/program-studi/index', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/program-studi/update', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/program-studi/view', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/program/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/program/create', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/program/delete', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/program/index', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/program/update', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/program/view', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat-institusi/*', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat-institusi/create', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat-institusi/delete', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat-institusi/index', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat-institusi/update', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat-institusi/view', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat-prodi/*', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat-prodi/create', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat-prodi/delete', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat-prodi/index', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat-prodi/update', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat-prodi/view', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat/*', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat/arsip-sertifikat', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/sertifikat/grafik-sertifikat', 2, NULL, NULL, NULL, 1561268958, 1561268958);
INSERT INTO `auth_item` VALUES ('@app-admin/site/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/site/error', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/site/index', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/site/login', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/site/logout', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/unit/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/unit/create', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/unit/delete', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/unit/index', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/unit/update', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/unit/view', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/user/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/user/create', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/user/delete', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/user/get-fakultas', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/user/get-prodi', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/user/index', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/user/update', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-admin/user/view', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/*', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/*', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/about', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/captcha', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/contact', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/error', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/index', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/login', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/logout', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/request-password-reset', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/resend-verification-email', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/reset-password', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/signup', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/site/verify-email', 2, NULL, NULL, NULL, 1561199369, 1561199369);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/*', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/download', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/download-detail', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/download-isian', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/download-template', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/hapus-detail', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/hapus-dokumen', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/hapus-gambar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/hapus-isian', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/isi', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/isi-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/lihat', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/lihat-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/unggah', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-institusi/unggah-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/*', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/download', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/download-detail', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/download-isian', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/download-template', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/hapus-detail', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/hapus-dokumen', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/hapus-gambar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/hapus-isian', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/isi', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/isi-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/lihat', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/lihat-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/unggah', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-fakultas/unggah-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/*', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/download', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/download-detail', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/download-isian', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/download-template', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/hapus-detail', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/hapus-dokumen', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/hapus-gambar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/hapus-isian', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/isi', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/isi-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/lihat', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/lihat-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/unggah', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-pasca-prodi/unggah-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/download', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/download-detail', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/download-isian', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/download-template', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/hapus-detail', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/hapus-dokumen', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/hapus-gambar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/hapus-isian', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/isi', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/isi-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/lihat', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/lihat-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/unggah', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-fakultas/unggah-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/download', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/download-detail', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/download-isian', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/download-template', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/hapus-detail', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/hapus-dokumen', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/hapus-gambar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/hapus-isian', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/isi', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/isi-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/lihat', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/lihat-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/unggah', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang-s1-prodi/unggah-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang/arsip-borang', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang/cari-fakultas', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/borang/cari-prodi', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/default/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/default/error', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/default/index', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-institusi/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-institusi/asesor-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-institusi/download-dok', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-institusi/hapus-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-institusi/isi', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-institusi/isi-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-institusi/lihat', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-institusi/lihat-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-institusi/pj', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-institusi/pj-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-institusi/publik-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-institusi/ubah-publik', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-fakultas/*', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-fakultas/download-dok', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-fakultas/isi', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-fakultas/isi-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-fakultas/lihat', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-fakultas/pj', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-fakultas/pj-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-fakultas/ubah-publik', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-prodi/*', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-prodi/asesor-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-prodi/download-dok', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-prodi/hapus-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-prodi/isi', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-prodi/isi-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-prodi/lihat', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-prodi/lihat-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-prodi/pj', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-prodi/pj-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-prodi/publik-standar', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-pasca-prodi/ubah-publik', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-fakultas/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-fakultas/asesor-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-fakultas/download-dok', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-fakultas/hapus-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-fakultas/isi', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-fakultas/isi-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-fakultas/lihat', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-fakultas/lihat-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-fakultas/pj', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-fakultas/pj-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-fakultas/publik-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-fakultas/ubah-publik', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-prodi/*', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-prodi/asesor-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-prodi/download-dok', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-prodi/hapus-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-prodi/isi', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-prodi/isi-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-prodi/lihat', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-prodi/lihat-standar', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-prodi/pj', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-prodi/pj-standar', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-prodi/publik-standar', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi-s1-prodi/ubah-publik', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi/*', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi/arsip-dok', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi/cari-dok', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/dokumentasi/cari-fakultas', 2, NULL, NULL, NULL, 1561199356, 1561199356);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-fakultas/*', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-fakultas/arsip', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-fakultas/download', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-fakultas/hapus', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-fakultas/index', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-fakultas/lihat', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-institusi/*', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-institusi/arsip', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-institusi/download', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-institusi/hapus', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-institusi/index', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-institusi/lihat', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-prodi-pasca/*', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-prodi-pasca/arsip', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-prodi-pasca/download', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-prodi-pasca/hapus', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-prodi-pasca/index', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-prodi-pasca/lihat', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-prodi-s1/*', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-prodi-s1/arsip', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-prodi-s1/download', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-prodi-s1/hapus', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-prodi-s1/index', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led-prodi-s1/lihat', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led/*', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/led/prodi', 2, NULL, NULL, NULL, 1561199357, 1561199357);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat-institusi/*', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat-institusi/create', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat-institusi/delete', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat-institusi/index', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat-institusi/update', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat-institusi/view', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat-prodi/*', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat-prodi/create', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat-prodi/delete', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat-prodi/index', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat-prodi/update', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat-prodi/view', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat/*', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat/arsip-sertifikat', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-akreditasi/standar7/sertifikat/grafik-sertifikat', 2, NULL, NULL, NULL, 1561268971, 1561268971);
INSERT INTO `auth_item` VALUES ('@app-monitoring/*', 2, NULL, NULL, NULL, 1561199379, 1561199379);
INSERT INTO `auth_item` VALUES ('@app-monitoring/site/*', 2, NULL, NULL, NULL, 1561199379, 1561199379);
INSERT INTO `auth_item` VALUES ('@app-monitoring/site/error', 2, NULL, NULL, NULL, 1561199379, 1561199379);
INSERT INTO `auth_item` VALUES ('@app-monitoring/site/index', 2, NULL, NULL, NULL, 1561199379, 1561199379);
INSERT INTO `auth_item` VALUES ('@app-monitoring/site/login', 2, NULL, NULL, NULL, 1561199379, 1561199379);
INSERT INTO `auth_item` VALUES ('@app-monitoring/site/logout', 2, NULL, NULL, NULL, 1561199379, 1561199379);
INSERT INTO `auth_item` VALUES ('@app-monitoring/user/*', 2, NULL, NULL, NULL, 1561199379, 1561199379);
INSERT INTO `auth_item` VALUES ('@app-monitoring/user/create', 2, NULL, NULL, NULL, 1561199379, 1561199379);
INSERT INTO `auth_item` VALUES ('@app-monitoring/user/delete', 2, NULL, NULL, NULL, 1561199379, 1561199379);
INSERT INTO `auth_item` VALUES ('@app-monitoring/user/index', 2, NULL, NULL, NULL, 1561199379, 1561199379);
INSERT INTO `auth_item` VALUES ('@app-monitoring/user/update', 2, NULL, NULL, NULL, 1561199379, 1561199379);
INSERT INTO `auth_item` VALUES ('@app-monitoring/user/view', 2, NULL, NULL, NULL, 1561199379, 1561199379);
INSERT INTO `auth_item` VALUES ('adminFakultas', 1, 'Admin Fakultas', NULL, NULL, 1561199271, 1561199271);
INSERT INTO `auth_item` VALUES ('adminInstitusi', 1, 'Admin Institusi', NULL, NULL, 1561199258, 1561199258);
INSERT INTO `auth_item` VALUES ('adminLpm', 1, 'Admin Lpm', NULL, NULL, 1561199247, 1561199247);
INSERT INTO `auth_item` VALUES ('adminProdi', 1, 'Admin Prodi', NULL, NULL, 1561199282, 1561199282);
INSERT INTO `auth_item` VALUES ('createAkreditasi', 2, 'Create Akreditasi', NULL, NULL, 1561200108, 1561200108);
INSERT INTO `auth_item` VALUES ('createAkreditasiInstitusi', 2, 'Create Akreditasi Institusi', NULL, NULL, 1561200121, 1561200121);
INSERT INTO `auth_item` VALUES ('createAkreditasiProdi', 2, 'Create Akreditasi Prodi', NULL, NULL, 1561200132, 1561200132);
INSERT INTO `auth_item` VALUES ('createFakultas', 2, 'Create Fakultas', NULL, NULL, 1561200142, 1561200142);
INSERT INTO `auth_item` VALUES ('createProdi', 2, 'Create Prodi', NULL, NULL, 1561200159, 1561200159);
INSERT INTO `auth_item` VALUES ('createSertifikat', 2, 'Create Sertifikat', NULL, NULL, 1561200170, 1561200170);
INSERT INTO `auth_item` VALUES ('createUnit', 2, 'Create Unit', NULL, NULL, 1561200185, 1561200185);
INSERT INTO `auth_item` VALUES ('createUser', 2, 'Create User', NULL, NULL, 1561200193, 1561200193);
INSERT INTO `auth_item` VALUES ('deleteAkreditasi', 2, 'Delete Akreditasi', NULL, NULL, 1561200402, 1561200402);
INSERT INTO `auth_item` VALUES ('deleteAkreditasiInstitusi', 2, 'Delete Akreditasi Institusi', NULL, NULL, 1561200417, 1561200417);
INSERT INTO `auth_item` VALUES ('deleteAkreditasiProdi', 2, 'Delete Akreditasi Prodi', NULL, NULL, 1561200430, 1561200430);
INSERT INTO `auth_item` VALUES ('deleteBorang', 2, 'Delete Borang', NULL, NULL, 1561200441, 1561200441);
INSERT INTO `auth_item` VALUES ('deleteDokumentasi', 2, 'Delete Dokumentasi', NULL, NULL, 1561200451, 1561200451);
INSERT INTO `auth_item` VALUES ('deleteFakultas', 2, 'Delete Fakultas', NULL, NULL, 1561200462, 1561200462);
INSERT INTO `auth_item` VALUES ('deleteLed', 2, 'Delete Led', NULL, NULL, 1561200474, 1561200474);
INSERT INTO `auth_item` VALUES ('deleteProdi', 2, 'Delete Prodi', NULL, NULL, 1561200484, 1561200484);
INSERT INTO `auth_item` VALUES ('deleteSertifikat', 2, 'Delete Sertifikat', NULL, NULL, 1561200495, 1561200495);
INSERT INTO `auth_item` VALUES ('deleteUnit', 2, 'Delete Unit', NULL, NULL, 1561200506, 1561200506);
INSERT INTO `auth_item` VALUES ('deleteUser', 2, 'Delete User', NULL, NULL, 1561200517, 1561200517);
INSERT INTO `auth_item` VALUES ('isiBorang', 2, 'Isi Borang', NULL, NULL, 1561200938, 1561200938);
INSERT INTO `auth_item` VALUES ('isiBorangFakultasSendiri', 2, 'Isi Borang Fakultas Sendiri', 'isi-borang-fakultas-sendiri', NULL, 1561200985, 1561201222);
INSERT INTO `auth_item` VALUES ('isiBorangInstitusi', 2, 'Isi Borang Institusi', NULL, NULL, 1561200645, 1561200645);
INSERT INTO `auth_item` VALUES ('isiBorangProdiSendiri', 2, 'Isi Borang Prodi Sendiri', 'isi-borang-prodi-sendiri', NULL, 1561201075, 1561201243);
INSERT INTO `auth_item` VALUES ('isiDokumentasi', 2, 'isi Dokumentasi', NULL, NULL, 1561201063, 1561201063);
INSERT INTO `auth_item` VALUES ('isiDokumentasiFakultasSendiri', 2, 'isi Dokumentasi Fakultas Sendiri', 'isi-dokumentasi-fakultas-sendiri', NULL, 1561201094, 1561201263);
INSERT INTO `auth_item` VALUES ('isiDokumentasiInstitusi', 2, 'Isi Dokumentasi Institusi', NULL, NULL, 1561200657, 1561200657);
INSERT INTO `auth_item` VALUES ('isiDokumentasiProdiSendiri', 2, 'Isi Dokumentasi Prodi Sendiri', 'isi-dokumentasi-prodi-sendiri', NULL, 1561201110, 1561201281);
INSERT INTO `auth_item` VALUES ('isiLed', 2, 'Isi Led', NULL, NULL, 1561201122, 1561201122);
INSERT INTO `auth_item` VALUES ('isiLedFakultasSendiri', 2, 'Isi Led Fakultas Sendiri', NULL, NULL, 1561201133, 1561201133);
INSERT INTO `auth_item` VALUES ('isiLedInstitusi', 2, 'Isi Led Institusi', NULL, NULL, 1561200667, 1561200667);
INSERT INTO `auth_item` VALUES ('isiLedProdiSendiri', 2, 'Isi Led Prodi Sendiri', 'isi-led-prodi-sendiri', NULL, 1561201153, 1561201153);
INSERT INTO `auth_item` VALUES ('superUser', 1, 'Super User', NULL, NULL, 1561199234, 1561199234);
INSERT INTO `auth_item` VALUES ('updateAkreditasi', 2, 'Update Akreditasi', NULL, NULL, 1561200220, 1561200220);
INSERT INTO `auth_item` VALUES ('updateAkreditasiInsitusi', 2, 'Update Akreditasi Institusi', NULL, NULL, 1561200234, 1561200234);
INSERT INTO `auth_item` VALUES ('updateAkreditasiProdi', 2, 'Update Akreditasi Prodi', NULL, NULL, 1561200246, 1561200246);
INSERT INTO `auth_item` VALUES ('updateBorang', 2, 'Update Borang', NULL, NULL, 1561200255, 1561200255);
INSERT INTO `auth_item` VALUES ('updateDokumentasi', 2, 'Update Dokumentasi', NULL, NULL, 1561200264, 1561200264);
INSERT INTO `auth_item` VALUES ('updateFakultas', 2, 'Update Fakultas', NULL, NULL, 1561200275, 1561200275);
INSERT INTO `auth_item` VALUES ('updateLed', 2, 'Update Led', NULL, NULL, 1561200286, 1561200286);
INSERT INTO `auth_item` VALUES ('updateProdi', 2, 'Update Prodi', NULL, NULL, 1561200297, 1561200297);
INSERT INTO `auth_item` VALUES ('updateSertifikat', 2, 'Update Sertifikat', NULL, NULL, 1561200314, 1561200314);
INSERT INTO `auth_item` VALUES ('updateUser', 2, 'Update User', NULL, NULL, 1561200325, 1561200325);
INSERT INTO `auth_item` VALUES ('userFakultas', 1, 'User Fakultas', NULL, NULL, 1561199307, 1561199307);
INSERT INTO `auth_item` VALUES ('userInstitusi', 1, 'User Institusi', NULL, NULL, 1561199298, 1561199298);
INSERT INTO `auth_item` VALUES ('userProdi', 1, 'User Prodi', NULL, NULL, 1561199315, 1561199315);
INSERT INTO `auth_item` VALUES ('viewAkreditasi', 2, 'View Akreditasi', NULL, NULL, 1561200528, 1561200528);
INSERT INTO `auth_item` VALUES ('viewAkreditasiInstitusi', 2, 'View Akred Institusi', NULL, NULL, 1561200540, 1561200540);
INSERT INTO `auth_item` VALUES ('viewAkreditasiProdi', 2, 'View Akreditasi Prodi', NULL, NULL, 1561200549, 1561200549);
INSERT INTO `auth_item` VALUES ('viewFakultas', 2, 'View Fakultas', NULL, NULL, 1561200568, 1561200568);
INSERT INTO `auth_item` VALUES ('viewProdi', 2, 'View Prodi', NULL, NULL, 1561200586, 1561200586);
INSERT INTO `auth_item` VALUES ('viewSertifikat', 2, 'View Sertifikat', NULL, NULL, 1561200609, 1561200609);
INSERT INTO `auth_item` VALUES ('viewUnit', 2, 'View Unit', NULL, NULL, 1561200621, 1561200621);
INSERT INTO `auth_item` VALUES ('viewUser', 2, 'View User', NULL, NULL, 1561200630, 1561200630);

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('superUser', '@app-admin/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/akreditasi-institusi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/akreditasi-prodi-s1/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/akreditasi-prodi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/akreditasi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/fakultas-akademi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/jenis-akreditasi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/program-studi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/program/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/sertifikat-institusi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/sertifikat-prodi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/sertifikat/*');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-admin/site/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/site/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/unit/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-admin/user/*');
INSERT INTO `auth_item_child` VALUES ('superUser', '@app-akreditasi/*');
INSERT INTO `auth_item_child` VALUES ('adminInstitusi', '@app-akreditasi/site/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-akreditasi/site/*');
INSERT INTO `auth_item_child` VALUES ('userFakultas', '@app-akreditasi/site/*');
INSERT INTO `auth_item_child` VALUES ('userInstitusi', '@app-akreditasi/site/*');
INSERT INTO `auth_item_child` VALUES ('userProdi', '@app-akreditasi/site/*');
INSERT INTO `auth_item_child` VALUES ('adminInstitusi', '@app-akreditasi/standar7/borang-institusi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-akreditasi/standar7/borang-institusi/*');
INSERT INTO `auth_item_child` VALUES ('userInstitusi', '@app-akreditasi/standar7/borang-institusi/*');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/borang-pasca-fakultas/*');
INSERT INTO `auth_item_child` VALUES ('userProdi', '@app-akreditasi/standar7/borang-pasca-prodi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-akreditasi/standar7/borang-s1-fakultas/*');
INSERT INTO `auth_item_child` VALUES ('userFakultas', '@app-akreditasi/standar7/borang-s1-fakultas/*');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/borang-s1-fakultas/lihat');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/borang-s1-fakultas/lihat-standar');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/borang-s1-fakultas/unggah');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/borang-s1-fakultas/unggah-standar');
INSERT INTO `auth_item_child` VALUES ('userProdi', '@app-akreditasi/standar7/borang-s1-prodi/*');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/borang/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-akreditasi/standar7/borang/*');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/default/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-akreditasi/standar7/default/*');
INSERT INTO `auth_item_child` VALUES ('adminInstitusi', '@app-akreditasi/standar7/dokumentasi-institusi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-akreditasi/standar7/dokumentasi-institusi/*');
INSERT INTO `auth_item_child` VALUES ('userInstitusi', '@app-akreditasi/standar7/dokumentasi-institusi/*');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/dokumentasi-pasca-fakultas/*');
INSERT INTO `auth_item_child` VALUES ('userProdi', '@app-akreditasi/standar7/dokumentasi-pasca-prodi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-akreditasi/standar7/dokumentasi-s1-fakultas/*');
INSERT INTO `auth_item_child` VALUES ('userFakultas', '@app-akreditasi/standar7/dokumentasi-s1-fakultas/*');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/dokumentasi-s1-fakultas/asesor-standar');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/dokumentasi-s1-fakultas/lihat');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/dokumentasi-s1-fakultas/lihat-standar');
INSERT INTO `auth_item_child` VALUES ('userProdi', '@app-akreditasi/standar7/dokumentasi-s1-prodi/*');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/dokumentasi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-akreditasi/standar7/dokumentasi/*');
INSERT INTO `auth_item_child` VALUES ('adminFakultas', '@app-akreditasi/standar7/led-fakultas/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-akreditasi/standar7/led-fakultas/*');
INSERT INTO `auth_item_child` VALUES ('userFakultas', '@app-akreditasi/standar7/led-fakultas/*');
INSERT INTO `auth_item_child` VALUES ('adminInstitusi', '@app-akreditasi/standar7/led-institusi/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-akreditasi/standar7/led-institusi/*');
INSERT INTO `auth_item_child` VALUES ('userInstitusi', '@app-akreditasi/standar7/led-institusi/*');
INSERT INTO `auth_item_child` VALUES ('userProdi', '@app-akreditasi/standar7/led-prodi-pasca/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-akreditasi/standar7/led-prodi-s1/*');
INSERT INTO `auth_item_child` VALUES ('userProdi', '@app-akreditasi/standar7/led-prodi-s1/*');
INSERT INTO `auth_item_child` VALUES ('adminLpm', '@app-akreditasi/standar7/led/*');
INSERT INTO `auth_item_child` VALUES ('userProdi', '@app-akreditasi/standar7/led/*');
INSERT INTO `auth_item_child` VALUES ('superUser', '@app-monitoring/*');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('isi-borang-fakultas-sendiri', 0x4F3A35323A22636F6D6D6F6E5C617574685C726261635C72756C65735C497369426F72616E6746616B756C74617353656E6469726952756C6573223A333A7B733A343A226E616D65223B733A32373A226973692D626F72616E672D66616B756C7461732D73656E64697269223B733A393A22637265617465644174223B693A313536313139393339383B733A393A22757064617465644174223B693A313536313139393339383B7D, 1561199398, 1561199398);
INSERT INTO `auth_rule` VALUES ('isi-borang-prodi-sendiri', 0x4F3A34393A22636F6D6D6F6E5C617574685C726261635C72756C65735C497369426F72616E6750726F646953656E6469726952756C6573223A333A7B733A343A226E616D65223B733A32343A226973692D626F72616E672D70726F64692D73656E64697269223B733A393A22637265617465644174223B693A313536313139393431333B733A393A22757064617465644174223B693A313536313139393431333B7D, 1561199413, 1561199413);
INSERT INTO `auth_rule` VALUES ('isi-dokumentasi-fakultas-sendiri', 0x4F3A35373A22636F6D6D6F6E5C617574685C726261635C72756C65735C497369446F6B756D656E7461736946616B756C74617353656E6469726952756C6573223A333A7B733A343A226E616D65223B733A33323A226973692D646F6B756D656E746173692D66616B756C7461732D73656E64697269223B733A393A22637265617465644174223B693A313536313139393432393B733A393A22757064617465644174223B693A313536313139393432393B7D, 1561199429, 1561199429);
INSERT INTO `auth_rule` VALUES ('isi-dokumentasi-prodi-sendiri', 0x4F3A35343A22636F6D6D6F6E5C617574685C726261635C72756C65735C497369446F6B756D656E7461736950726F646953656E6469726952756C6573223A333A7B733A343A226E616D65223B733A32393A226973692D646F6B756D656E746173692D70726F64692D73656E64697269223B733A393A22637265617465644174223B693A313536313139393433393B733A393A22757064617465644174223B693A313536313139393433393B7D, 1561199439, 1561199439);
INSERT INTO `auth_rule` VALUES ('isi-led-fakultas-sendiri', 0x4F3A34393A22636F6D6D6F6E5C617574685C726261635C72756C65735C4973694C656446616B756C74617353656E6469726952756C6573223A333A7B733A343A226E616D65223B733A32343A226973692D6C65642D66616B756C7461732D73656E64697269223B733A393A22637265617465644174223B693A313536313139393435333B733A393A22757064617465644174223B693A313536313139393435333B7D, 1561199453, 1561199453);
INSERT INTO `auth_rule` VALUES ('isi-led-prodi-sendiri', 0x4F3A34363A22636F6D6D6F6E5C617574685C726261635C72756C65735C4973694C656450726F646953656E6469726952756C6573223A333A7B733A343A226E616D65223B733A32313A226973692D6C65642D70726F64692D73656E64697269223B733A393A22637265617465644174223B693A313536313139393436353B733A393A22757064617465644174223B693A313536313139393436353B7D, 1561199465, 1561199465);

SET FOREIGN_KEY_CHECKS = 1;

SQL;

      $this->execute($sequel);

    }

    public function safeDown()
    {
        //$this->truncateTable('{{%auth_assignment}} CASCADE');
    }
}
