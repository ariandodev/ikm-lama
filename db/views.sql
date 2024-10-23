/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : dbaplikasi_paser

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-03-06 08:16:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- View structure for vtblpengguna
-- ----------------------------
DROP VIEW IF EXISTS `vtblpengguna`;
CREATE  VIEW `vtblpengguna` AS select `tblpengguna`.`tblpengguna_nama` AS `nama`,`tblpengguna`.`tblpengguna_username` AS `username`,`tblpengguna`.`tblpengguna_id` AS `pengguna_id`,`tblpengguna`.`tblpengguna_idsubunit` AS `idsubunit`,`tblpengguna`.`tblpengguna_status` AS `status`,`tblrole`.`tblrole_code` AS `kode`,`tblrole`.`tblrole_desc` AS `deskripsi`,`tblpengguna`.`tblpengguna_email` AS `email`,`tblpengguna`.`tblpengguna_notelp` AS `notelp` from (`tblrole` join `tblpengguna` on((`tblrole`.`tblrole_id` = `tblpengguna`.`tblrole_id`))) ; ;

-- ----------------------------
-- View structure for vtblrolemenu
-- ----------------------------
DROP VIEW IF EXISTS `vtblrolemenu`;
CREATE  VIEW `vtblrolemenu` AS select `c`.`tblrole_id` AS `tblrole_id`,`c`.`tblrole_code` AS `tblrole_code`,`c`.`tblrole_desc` AS `tblrole_desc`,`b`.`tblmenu_id` AS `tblmenu_id`,`b`.`tblmenu_urutan` AS `tblmenu_urutan`,`b`.`tblmenu_kode` AS `tblmenu_kode`,`b`.`tblmenu_title` AS `tblmenu_title`,`b`.`tblmenu_icon` AS `tblmenu_icon`,`b`.`tblmenu_link` AS `tblmenu_link`,ifnull(`b`.`tblmenu_idparent`,0) AS `tblmenu_idparent`,`a`.`tblroleprivilege_id` AS `tblroleprivilege_id`,`a`.`tblroleprivilege_iscreate` AS `tblroleprivilege_iscreate`,`a`.`tblroleprivilege_isupdate` AS `tblroleprivilege_isupdate`,`a`.`tblroleprivilege_isdelete` AS `tblroleprivilege_isdelete`,`a`.`tblroleprivilege_issearch` AS `tblroleprivilege_issearch`,`a`.`tblroleprivilege_isprint` AS `tblroleprivilege_isprint`,`a`.`tblroleprivilege_isshow` AS `tblroleprivilege_isshow`,`b`.`tblmenu_status` AS `tblmenu_status` from ((`tblroleprivilege` `a` join `tblmenu` `b` on((`a`.`tblmenu_id` = `b`.`tblmenu_id`))) join `tblrole` `c` on((`c`.`tblrole_id` = `a`.`tblrole_id`))) order by `c`.`tblrole_id`,`b`.`tblmenu_urutan` ; ;

-- ----------------------------
-- View structure for vtblroleprivilege
-- ----------------------------
DROP VIEW IF EXISTS `vtblroleprivilege`;
CREATE  VIEW `vtblroleprivilege` AS select `tblroleprivilege`.`tblroleprivilege_id` AS `tblroleprivilege_id`,`tblroleprivilege`.`tblroleprivilege_iscreate` AS `tblroleprivilege_iscreate`,`tblroleprivilege`.`tblroleprivilege_isupdate` AS `tblroleprivilege_isupdate`,`tblroleprivilege`.`tblroleprivilege_isdelete` AS `tblroleprivilege_isdelete`,`tblroleprivilege`.`tblroleprivilege_issearch` AS `tblroleprivilege_issearch`,`tblroleprivilege`.`tblroleprivilege_isprint` AS `tblroleprivilege_isprint`,`tblroleprivilege`.`tblroleprivilege_isshow` AS `tblroleprivilege_isshow`,`tblroleprivilege`.`tblrole_id` AS `tblrole_id`,`tblmenu`.`tblmenu_idparent` AS `tblmenu_idparent`,`tblmenu`.`tblmenu_link` AS `tblmenu_link`,`tblmenu`.`tblmenu_icon` AS `tblmenu_icon`,`tblmenu`.`tblmenu_title` AS `tblmenu_title`,`tblmenu`.`tblmenu_kode` AS `tblmenu_kode`,`tblroleprivilege`.`tblmenu_id` AS `tblmenu_id` from (`tblroleprivilege` join `tblmenu` on((`tblroleprivilege`.`tblmenu_id` = `tblmenu`.`tblmenu_id`))) order by `tblroleprivilege`.`tblrole_id`,`tblmenu`.`tblmenu_urutan` ;
