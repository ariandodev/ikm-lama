/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : dbaplikasi_paser

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-03-06 08:18:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Function structure for hitung_ikm
-- ----------------------------
DROP FUNCTION IF EXISTS `hitung_ikm`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_ikm`(vtahun int(4), vbulan int(2), vidizin int(11)) RETURNS decimal(10,4)
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
DECLARE hasil DECIMAL (10,4);
DECLARE NRR INT(2)DEFAULT 25 ;

SET hasil = (select hitung_nrrtertimbang(vtahun,vbulan,vidizin) * NRR );

RETURN hasil;
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for hitung_nrrtertimbang
-- ----------------------------
DROP FUNCTION IF EXISTS `hitung_nrrtertimbang`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_nrrtertimbang`(vtahun int(4), vbulan int(2), vidizin int(11)) RETURNS decimal(10,4)
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
DECLARE hasil DECIMAL (10,4);
DECLARE NRR DECIMAL (19,8)DEFAULT 0.1;
DECLARE hasil1 DECIMAL (10,8);
DECLARE hasil2 DECIMAL (10,8);
DECLARE hasil3 DECIMAL (10,8);
DECLARE hasil4 DECIMAL (10,8);
DECLARE hasil5 DECIMAL (10,8);
DECLARE hasil6 DECIMAL (10,8);
DECLARE hasil7 DECIMAL (10,8);
DECLARE hasil8 DECIMAL (10,8);
DECLARE hasil9 DECIMAL (10,8);
DECLARE hasil10 DECIMAL (10,8);

SET hasil1 = (SELECT IFNULL(ROUND(((SUM(a.tblhasilsurvei_pertanyaan1) /COUNT(tblhasilsurvei_id))*NRR),2),0) FROM tblhasilsurvei a WHERE if(vidizin>0,a.refjenisizinikm_id =vidizin,a.refjenisizinikm_id is not null) AND YEAR (a.tblhasilsurvei_syscreate) = vtahun
AND MONTH (a.tblhasilsurvei_syscreate) = vbulan limit 1);
SET hasil2 = (SELECT IFNULL(ROUND(((SUM(a.tblhasilsurvei_pertanyaan2) /COUNT(tblhasilsurvei_id))*NRR),2),0) FROM tblhasilsurvei a WHERE if(vidizin>0,a.refjenisizinikm_id =vidizin,a.refjenisizinikm_id is not null) AND YEAR (a.tblhasilsurvei_syscreate) = vtahun
AND MONTH (a.tblhasilsurvei_syscreate) = vbulan limit 1);
SET hasil3 = (SELECT IFNULL(ROUND(((SUM(a.tblhasilsurvei_pertanyaan3) /COUNT(tblhasilsurvei_id))*NRR),2),0) FROM tblhasilsurvei a WHERE if(vidizin>0,a.refjenisizinikm_id =vidizin,a.refjenisizinikm_id is not null) AND YEAR (a.tblhasilsurvei_syscreate) = vtahun
AND MONTH (a.tblhasilsurvei_syscreate) = vbulan limit 1);
SET hasil4 = (SELECT IFNULL(ROUND(((SUM(a.tblhasilsurvei_pertanyaan4) /COUNT(tblhasilsurvei_id))*NRR),2),0) FROM tblhasilsurvei a WHERE if(vidizin>0,a.refjenisizinikm_id =vidizin,a.refjenisizinikm_id is not null) AND YEAR (a.tblhasilsurvei_syscreate) = vtahun
AND MONTH (a.tblhasilsurvei_syscreate) = vbulan limit 1);
SET hasil5 = (SELECT IFNULL(ROUND(((SUM(a.tblhasilsurvei_pertanyaan5) /COUNT(tblhasilsurvei_id))*NRR),2),0) FROM tblhasilsurvei a WHERE if(vidizin>0,a.refjenisizinikm_id =vidizin,a.refjenisizinikm_id is not null) AND YEAR (a.tblhasilsurvei_syscreate) = vtahun
AND MONTH (a.tblhasilsurvei_syscreate) = vbulan limit 1);
SET hasil6 = (SELECT IFNULL(ROUND(((SUM(a.tblhasilsurvei_pertanyaan6) /COUNT(tblhasilsurvei_id))*NRR),2),0) FROM tblhasilsurvei a WHERE if(vidizin>0,a.refjenisizinikm_id =vidizin,a.refjenisizinikm_id is not null) AND YEAR (a.tblhasilsurvei_syscreate) = vtahun
AND MONTH (a.tblhasilsurvei_syscreate) = vbulan limit 1);
SET hasil7 = (SELECT IFNULL(ROUND(((SUM(a.tblhasilsurvei_pertanyaan7) /COUNT(tblhasilsurvei_id))*NRR),2),0) FROM tblhasilsurvei a WHERE if(vidizin>0,a.refjenisizinikm_id =vidizin,a.refjenisizinikm_id is not null) AND YEAR (a.tblhasilsurvei_syscreate) = vtahun
AND MONTH (a.tblhasilsurvei_syscreate) = vbulan limit 1);
SET hasil8 = (SELECT IFNULL(ROUND(((SUM(a.tblhasilsurvei_pertanyaan8) /COUNT(tblhasilsurvei_id))*NRR),2),0) FROM tblhasilsurvei a WHERE if(vidizin>0,a.refjenisizinikm_id =vidizin,a.refjenisizinikm_id is not null) AND YEAR (a.tblhasilsurvei_syscreate) = vtahun
AND MONTH (a.tblhasilsurvei_syscreate) = vbulan limit 1);
SET hasil9 = (SELECT IFNULL(ROUND(((SUM(a.tblhasilsurvei_pertanyaan9) /COUNT(tblhasilsurvei_id))*NRR),2),0) FROM tblhasilsurvei a WHERE if(vidizin>0,a.refjenisizinikm_id =vidizin,a.refjenisizinikm_id is not null) AND YEAR (a.tblhasilsurvei_syscreate) = vtahun
AND MONTH (a.tblhasilsurvei_syscreate) = vbulan limit 1);
SET hasil10 = (SELECT IFNULL(ROUND(((SUM(a.tblhasilsurvei_pertanyaan10) /COUNT(tblhasilsurvei_id))*NRR),2),0) FROM tblhasilsurvei a WHERE if(vidizin>0,a.refjenisizinikm_id =vidizin,a.refjenisizinikm_id is not null) AND YEAR (a.tblhasilsurvei_syscreate) = vtahun
AND MONTH (a.tblhasilsurvei_syscreate) = vbulan limit 1);
/*(IFNULL(tblhasilsurvei_pertanyaan1*NRR,0),2)+IFNULL(tblhasilsurvei_pertanyaan2*NRR,0),2)+IFNULL(tblhasilsurvei_pertanyaan3*NRR,0),2)+IFNULL(tblhasilsurvei_pertanyaan4*NRR,0),2)+IFNULL(tblhasilsurvei_pertanyaan5*NRR,0),2)+IFNULL(tblhasilsurvei_pertanyaan6*NRR,0),2)+IFNULL(tblhasilsurvei_pertanyaan7*NRR,0),2)+IFNULL(tblhasilsurvei_pertanyaan8*NRR,0),2)+IFNULL(tblhasilsurvei_pertanyaan9*NRR,0),2)) as jin*/
/*(IFNULL(a.tblhasilsurvei_pertanyaan1*NRR,0),2)+IFNULL(a.tblhasilsurvei_pertanyaan2*NRR,0),2)+IFNULL(a.tblhasilsurvei_pertanyaan3*NRR,0),2)+IFNULL(a.tblhasilsurvei_pertanyaan4*NRR,0),2)+IFNULL(a.tblhasilsurvei_pertanyaan5*NRR,0),2)+IFNULL(a.tblhasilsurvei_pertanyaan6*NRR,0),2)+IFNULL(a.tblhasilsurvei_pertanyaan7*NRR,0),2)+IFNULL(a.tblhasilsurvei_pertanyaan8*NRR,0),2)+IFNULL(a.tblhasilsurvei_pertanyaan9*NRR,0),2))*/
SET hasil = (hasil1+hasil2+hasil3+hasil4+hasil5+hasil6+hasil7+hasil8+hasil9+hasil10);

RETURN hasil;
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for hitung_responden
-- ----------------------------
DROP FUNCTION IF EXISTS `hitung_responden`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_responden`(vtahun int(4), vbulan int(2), vidizin int(11)) RETURNS int(11)
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
DECLARE HASIL INT(11);

SET HASIL = (select count(tblhasilsurvei_id) FROM tblhasilsurvei WHERE YEAR(tblhasilsurvei_syscreate) =vtahun and MONTH(tblhasilsurvei_syscreate) = vbulan and if(vidizin>0,refjenisizinikm_id =vidizin,refjenisizinikm_id is not null));

RETURN HASIL;
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for iscolexists
-- ----------------------------
DROP FUNCTION IF EXISTS `iscolexists`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `iscolexists`(namatable VARCHAR(255), namafield VARCHAR(255)) RETURNS int(1)
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
DECLARE hasil VARCHAR(100);
DECLARE namaskema VARCHAR(255);

SET namaskema = (SELECT DATABASE());
SET @JML = 
(SELECT COUNT(COLUMN_NAME)
FROM information_schema.COLUMNS 
WHERE 
    TABLE_SCHEMA = namaskema 
AND TABLE_NAME = namatable 
AND COLUMN_NAME = namafield);


RETURN IF(@JML > 0,1,0);
END
;;
DELIMITER ;
