/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : dbaplikasi_paser

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-03-06 08:17:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Procedure structure for proc_grafikjenisizin
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_grafikjenisizin`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_grafikjenisizin`(vtglawal date,vtglakhir date)
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
SELECT
refjenisizinikm_id,
refjenisizinikm_nama,
(SELECT count(b.tblhasilsurvei_id) FROM tblhasilsurvei b WHERE b.refjenisizinikm_id =refjenisizinikm.refjenisizinikm_id AND tblhasilsurvei_syscreate >= vtglawal AND tblhasilsurvei_syscreate <= vtglakhir  ) as jumlah
FROM refjenisizinikm 
ORDER BY refjenisizinikm_nama;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_grafikloket
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_grafikloket`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_grafikloket`(tglawal date,tglakhir date)
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN

SELECT
a.refloket_id,
a.refloket_nama,
count(a.refloket_id) as jumlah

FROM
refloket a
LEFT JOIN  refjenisizinikm b ON a.refloket_id = b.refloket_id
LEFT JOIN tblhasilsurvei c ON c.refjenisizinikm_id = b.refjenisizinikm_id
WHERE c.tblhasilsurvei_syscreate >= tglawal and c.tblhasilsurvei_syscreate <= tglakhir
GROUP BY a.refloket_id;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_grafiksaran
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_grafiksaran`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_grafiksaran`(tglawal date,tglakhir date)
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN

SELECT
sum(IF(c.tblhasilsurvei_penilaian='positif',1,0)) as positif,
sum(IF(c.tblhasilsurvei_penilaian='negatif',1,0)) as negatif,
sum(IF(c.tblhasilsurvei_penilaian='abstrak',1,0)) as abstain
FROM
tblhasilsurvei c 
WHERE c.tblhasilsurvei_syscreate >= tglawal and c.tblhasilsurvei_syscreate <= tglakhir;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_grafiksex
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_grafiksex`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_grafiksex`(vtglawal date,vtglakhir date)
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
SELECT
refsex_id,
refsex_nama,
(SELECT count(b.tblhasilsurvei_id) FROM tblhasilsurvei b WHERE b.refsex_id =refsex.refsex_id AND tblhasilsurvei_syscreate >= vtglawal AND tblhasilsurvei_syscreate <= vtglakhir  ) as jumlah
FROM refsex 
ORDER BY refsex_nama;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_grafiktkpendidikan
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_grafiktkpendidikan`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_grafiktkpendidikan`(vtglawal date,vtglakhir date)
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
SELECT
reftingkatpendidikan_id,
reftingkatpendidikan_nama,
(SELECT count(b.tblhasilsurvei_id) FROM tblhasilsurvei b WHERE b.reftingkatpendidikan_id =reftingkatpendidikan.reftingkatpendidikan_id AND tblhasilsurvei_syscreate >= vtglawal AND tblhasilsurvei_syscreate <= vtglakhir  ) as jumlah
FROM reftingkatpendidikan 
ORDER BY reftingkatpendidikan_kode;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_grafikusia
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_grafikusia`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_grafikusia`(tglawal date,tglakhir date)
    SQL SECURITY INVOKER
BEGIN
SELECT
sum(if(b.tblhasilsurvei_usia < 15 ,1,0)) as usai_kurang15,
sum(if(b.tblhasilsurvei_usia >= 15 and b.tblhasilsurvei_usia <= 20,1,0)) as usai_15_20,
sum(if(b.tblhasilsurvei_usia >= 21 and b.tblhasilsurvei_usia <= 25,1,0)) as usai_21_25,
sum(if(b.tblhasilsurvei_usia >= 26 and b.tblhasilsurvei_usia <= 30,1,0)) as usai_26_30,
sum(if(b.tblhasilsurvei_usia >= 31 and b.tblhasilsurvei_usia <= 35,1,0)) as usai_31_35,
sum(if(b.tblhasilsurvei_usia >= 36 and b.tblhasilsurvei_usia <= 40,1,0)) as usai_36_40,
sum(if(b.tblhasilsurvei_usia >= 41 and b.tblhasilsurvei_usia <= 45,1,0)) as usai_41_45,
sum(if(b.tblhasilsurvei_usia >= 46 and b.tblhasilsurvei_usia <= 50,1,0)) as usai_46_50,
sum(if(b.tblhasilsurvei_usia >= 51 and b.tblhasilsurvei_usia <= 55,1,0)) as usai_51_55,
sum(if(b.tblhasilsurvei_usia >= 56 and b.tblhasilsurvei_usia <= 60,1,0)) as usai_56_60,
sum(if(b.tblhasilsurvei_usia > 60,1,0)) as usai_lebih60
FROM tblhasilsurvei b WHERE b.tblhasilsurvei_syscreate >= tglawal and b.tblhasilsurvei_syscreate <= tglakhir;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_hitungikm
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_hitungikm`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_hitungikm`(vtahun int(4),vbulan int(2), vjenisizinikm int(11))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN

DECLARE vjmlresponden int(11);
DECLARE vjmltotal     DECIMAL(19,5);
DECLARE vhasil        DECIMAL(19,5);

SELECT count(a.refjenisizinikm_id), sum(a.tblhasilsurvei_total) INTO vjmlresponden, vjmltotal  FROM tblhasilsurvei a WHERE YEAR(a.tblhasilsurvei_syscreate)=vtahun AND MONTH(a.tblhasilsurvei_syscreate)=vbulan AND a.refjenisizinikm_id = vjenisizinikm; 

SET vhasil = (vjmltotal / vjmlresponden) *  0.1 * 25;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_ikm0daftarresponden
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_ikm0daftarresponden`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_ikm0daftarresponden`(vtahun int(4),vbulan int(2), vjenisizinikm int(11))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
DECLARE finished INTEGER DEFAULT 0;
DECLARE record_id varchar(100) DEFAULT "";
DECLARE isi VARCHAR(3000) DEFAULT "";

    DECLARE curr CURSOR FOR
        SELECT tblpertanyaan_id FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;
    DECLARE CONTINUE HANDLER
        FOR NOT FOUND SET finished = 1;

    OPEN curr;
    get_data: LOOP
        FETCH curr INTO record_id;
        IF finished = 1 THEN
            LEAVE get_data;
        END IF;
    
    IF iscolexists('tblhasilsurvei',CONCAT('tblhasilsurvei_pertanyaan',record_id))>0 THEN
        SET ISI =
        CONCAT(ISI,',IFNULL(tblhasilsurvei_pertanyaan',record_id,',0) as tblhasilsurvei_pertanyaan',record_id);
    END IF;    

    END LOOP get_data;
    CLOSE curr;

    SET ISI = CONCAT('SELECT tblhasilsurvei_id ',ISI,', b.refjenisizinikm_nama,c.refsex_nama,d.reftingkatpendidikan_nama ',
              ' FROM tblhasilsurvei LEFT JOIN  refjenisizinikm b ON b.refjenisizinikm_id = tblhasilsurvei.refjenisizinikm_id ',
              ' LEFT JOIN refsex c ON c.refsex_id = tblhasilsurvei.refsex_id LEFT JOIN reftingkatpendidikan d ON d.reftingkatpendidikan_id = tblhasilsurvei.reftingkatpendidikan_id WHERE tblhasilsurvei_id IS NOT NULL AND MONTH(tblhasilsurvei_syscreate) = ',vbulan,'',IF(vjenisizinikm > 0,CONCAT(' and tblhasilsurvei.refjenisizinikm_id=',vjenisizinikm),' '));
    SET @SQL = ISI;


PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1; 

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_ikm1jumlah
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_ikm1jumlah`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_ikm1jumlah`(vtahun int(4),vbulan int(2), vjenisizinikm int(11))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
DECLARE finished INTEGER DEFAULT 0;
DECLARE record_id varchar(100) DEFAULT "";
DECLARE isi VARCHAR(3000) DEFAULT "";

    DECLARE curr CURSOR FOR
        SELECT tblpertanyaan_id FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;
    DECLARE CONTINUE HANDLER
        FOR NOT FOUND SET finished = 1;

    OPEN curr;
    get_data: LOOP
        FETCH curr INTO record_id;
        IF finished = 1 THEN
            LEAVE get_data;
        END IF;
    
    IF iscolexists('tblhasilsurvei',CONCAT('tblhasilsurvei_pertanyaan',record_id))>0 THEN
        SET ISI =
        CONCAT(ISI,',IFNULL(SUM(tblhasilsurvei_pertanyaan',record_id,'),0) as tblhasilsurvei_pertanyaan',record_id);
    END IF;    

    END LOOP get_data;
    CLOSE curr;

    SET ISI = CONCAT('SELECT "1" as FIRST',ISI,' FROM tblhasilsurvei WHERE MONTH(tblhasilsurvei_syscreate) = ',vbulan,' AND  tblhasilsurvei_id IS NOT NULL ',IF(vjenisizinikm > 0,CONCAT(' and refjenisizinikm_id=',vjenisizinikm),' '));
    SET @SQL = ISI;

PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;
    
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_ikm2nrr
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_ikm2nrr`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_ikm2nrr`(vtahun int(4),vbulan int(2), vjenisizinikm int(11))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
DECLARE finished INTEGER DEFAULT 0;
DECLARE record_id varchar(100) DEFAULT "";
DECLARE isi VARCHAR(3000) DEFAULT "";

    DECLARE curr CURSOR FOR
        SELECT tblpertanyaan_id FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;
    DECLARE CONTINUE HANDLER
        FOR NOT FOUND SET finished = 1;

    OPEN curr;
    get_data: LOOP
        FETCH curr INTO record_id;
        IF finished = 1 THEN
            LEAVE get_data;
        END IF;
    IF iscolexists('tblhasilsurvei',CONCAT('tblhasilsurvei_pertanyaan',record_id))>0 THEN
        SET ISI =
        CONCAT(ISI,',IFNULL(SUM(tblhasilsurvei_pertanyaan',record_id,'),0)/IF(COUNT(tblhasilsurvei_id)>0,COUNT(tblhasilsurvei_id),1) as tblhasilsurvei_pertanyaan',record_id);
    END IF;

    END LOOP get_data;
    CLOSE curr;
     SET ISI = CONCAT('SELECT "1" as FIRST',ISI,' FROM tblhasilsurvei WHERE MONTH(tblhasilsurvei_syscreate) = ',vbulan,' AND tblhasilsurvei_id IS NOT NULL  ',IF(vjenisizinikm > 0,CONCAT(' and refjenisizinikm_id=',vjenisizinikm),' '));
    SET @COBA = ISI;

PREPARE stmt1 FROM @COBA;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;
 

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_ikm3nrrtertimbang
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_ikm3nrrtertimbang`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_ikm3nrrtertimbang`(vtahun int(4),vbulan int(2), vjenisizinikm int(11))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
DECLARE NRR DECIMAL(19,6)  DEFAULT 0.1;
DECLARE finished INTEGER DEFAULT 0;
DECLARE record_id varchar(100) DEFAULT "";
DECLARE isi TEXT DEFAULT "";
DECLARE isi2 VARCHAR(3000) DEFAULT "";

    DECLARE curr CURSOR FOR
        SELECT tblpertanyaan_id FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;
    DECLARE CONTINUE HANDLER
        FOR NOT FOUND SET finished = 1;

    OPEN curr;
    get_data: LOOP
        FETCH curr INTO record_id;
        IF finished = 1 THEN
            LEAVE get_data;
        END IF;
    IF iscolexists('tblhasilsurvei',CONCAT('tblhasilsurvei_pertanyaan',record_id))>0 THEN
        SET ISI =
        CONCAT(ISI,',round(',NRR,' *(IFNULL(SUM(tblhasilsurvei_pertanyaan',record_id,'),0)/IF(COUNT(tblhasilsurvei_id)>0,COUNT(tblhasilsurvei_id),1)),2) as tblhasilsurvei_pertanyaan',record_id);
        SET ISI2 = CONCAT(ISI2,'+ (round(',NRR,' *(IFNULL(SUM(tblhasilsurvei_pertanyaan',record_id,'),0)/IF(COUNT(tblhasilsurvei_id)>0,COUNT(tblhasilsurvei_id),1)),2))');

   END IF;

    END LOOP get_data;
    CLOSE curr;
     SET ISI2 = concat(' ,0',ISI2,' as tblhasilsurvei_total ');
     SET ISI = CONCAT('SELECT "1" as FIRST ',ISI,ISI2,' FROM tblhasilsurvei WHERE MONTH(tblhasilsurvei_syscreate) = ',vbulan,' AND tblhasilsurvei_id IS NOT NULL  ',IF(vjenisizinikm > 0,CONCAT(' and refjenisizinikm_id=',vjenisizinikm),' '));		 
    SET @SQL = ISI;

PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;
 

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_ikm4hasilakhir
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_ikm4hasilakhir`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_ikm4hasilakhir`(vtahun int(4),vbulan int(2), vjenisizinikm int(11))
    SQL SECURITY INVOKER
BEGIN
DECLARE NRR DECIMAL(19,4)  DEFAULT 0.11111111;
DECLARE NRR2 INT(2) DEFAULT 25;
DECLARE finished INTEGER DEFAULT 0;
DECLARE record_id varchar(100) DEFAULT "";
DECLARE isi TEXT DEFAULT "";
DECLARE isi2 VARCHAR(3000) DEFAULT "";

    DECLARE curr CURSOR FOR
        SELECT tblpertanyaan_id FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;
    DECLARE CONTINUE HANDLER
        FOR NOT FOUND SET finished = 1;

    OPEN curr;
    get_data: LOOP
        FETCH curr INTO record_id;
        IF finished = 1 THEN
            LEAVE get_data;
        END IF;
    IF iscolexists('tblhasilsurvei',CONCAT('tblhasilsurvei_pertanyaan',record_id))>0 THEN
        SET ISI = CONCAT(ISI,'+ ROUND((',NRR,' *(IFNULL(SUM(tblhasilsurvei_pertanyaan',record_id,'),0)/IF(COUNT(tblhasilsurvei_id)>0,COUNT(tblhasilsurvei_id),1))),2)');

   END IF;

    END LOOP get_data;
    CLOSE curr;
     SET ISI = concat('( 0',ISI,') * ',NRR2);
     SET ISI = CONCAT('SELECT ROUND(',ISI,',2) as hasilakhir FROM tblhasilsurvei WHERE MONTH(tblhasilsurvei_syscreate) = ',vbulan,' AND tblhasilsurvei_id IS NOT NULL  ',IF(vjenisizinikm > 0,CONCAT(' and refjenisizinikm_id=',vjenisizinikm),' '));
     SET @SQL = ISI;

PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;
 



END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_rekapikmbulan
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_rekapikmbulan`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekapikmbulan`(vtahun int(4),vidizin int(2), vbulan int(2))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN

SELECT  
a.refjenisizinikm_id,
a.refjenisizinikm_nama,
if(vbulan>=1 or vbulan = 0,hitung_ikm(vtahun,1,a.refjenisizinikm_id),0) as jan,
if(vbulan>=2 or vbulan = 0,hitung_ikm(vtahun,2,a.refjenisizinikm_id),0) as feb,
if(vbulan>=3 or vbulan = 0,hitung_ikm(vtahun,3,a.refjenisizinikm_id),0) as mar,
if(vbulan>=4 or vbulan = 0,hitung_ikm(vtahun,4,a.refjenisizinikm_id),0) as apr,
if(vbulan>=5 or vbulan = 0,hitung_ikm(vtahun,5,a.refjenisizinikm_id),0) as mei,
if(vbulan>=6 or vbulan = 0,hitung_ikm(vtahun,6,a.refjenisizinikm_id),0) as jun,
if(vbulan>=7 or vbulan = 0,hitung_ikm(vtahun,7,a.refjenisizinikm_id),0) as jul,
if(vbulan>=8 or vbulan = 0,hitung_ikm(vtahun,8,a.refjenisizinikm_id),0) as agt,
if(vbulan>=9 or vbulan = 0,hitung_ikm(vtahun,9,a.refjenisizinikm_id),0) as sep,
if(vbulan>=10 or vbulan = 0,hitung_ikm(vtahun,10,a.refjenisizinikm_id),0) as okt,
if(vbulan>=11 or vbulan = 0,hitung_ikm(vtahun,11,a.refjenisizinikm_id),0) as nov,
if(vbulan>=12 or vbulan = 0,hitung_ikm(vtahun,12,a.refjenisizinikm_id),0) as des

FROM refjenisizinikm a
WHERE refjenisizinikm_id IS NOT NULL  AND IF(vidizin<>0,a.refjenisizinikm_id=vidizin,a.refjenisizinikm_id IS NOT NULL);

    
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_rekapizin
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_rekapizin`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekapizin`(vtahun int(4),vbulan int(2), vidizin int(2))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
  DECLARE SUB1 TEXT DEFAULT '';
  DECLARE SUB2 TEXT DEFAULT '';
  DECLARE vn INT(2) DEFAULT 1;
  DECLARE currpertanyaan CURSOR FOR
    SELECT tblpertanyaan_id, tblpertanyaan_uraian FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;

  OPEN currpertanyaan;
  BEGIN
      DECLARE exit_flag INT DEFAULT 0;
      DECLARE pertanyaan_id INT(11);
      DECLARE tblpertanyaan_uraian VARCHAR(300);
      DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET exit_flag = 1;

      currpertanyaan_loop: LOOP
        FETCH currpertanyaan INTO pertanyaan_id,tblpertanyaan_uraian;
            IF exit_flag THEN LEAVE currpertanyaan_loop; 
            END IF;
       # CODE BEGIN HERE
      SET SUB1 = CONCAT(SUB1,' WHEN a.tblpertanyaan_id = ',pertanyaan_id,' THEN IFNULL(AVG(b.tblhasilsurvei_pertanyaan',pertanyaan_id,'),0)');
      END LOOP;
  END;
  CLOSE currpertanyaan;

IF vbulan = 0 THEN
SET vbulan = 12;
END IF;

  WHILE(vn <= vbulan) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT CASE ',SUB1,' END FROM tblhasilsurvei b WHERE YEAR(b.tblhasilsurvei_syscreate)=',vtahun,' and MONTH(b.tblhasilsurvei_syscreate)=',vn,' and  if(',vidizin,'>0,b.refjenisizinikm_id = ',vidizin,',b.refjenisizinikm_id is not null)) as bulan_',vn,
                             ', hitung_nrrtertimbang(',vtahun,',',vn,',',vidizin,') as tertimbang_',vn,', hitung_ikm(',vtahun,',',vn,',',vidizin,') as ikm_',vn,',hitung_responden(',vtahun,',',vn,',',vidizin,') as responden_',vn);
 
SET vn = vn + 1;
  END WHILE;

SET vn = vbulan + 1;

  WHILE(vn <= 12) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT  "0.0000") as bulan_',vn,
                             ', 0 as tertimbang_',vn,', 0 as ikm_',vn,',0 as responden_',vn);
  SET vn = vn + 1;
  END WHILE;
  

  SET SUB2 = CONCAT('SELECT a.tblpertanyaan_id, a.tblpertanyaan_urut, a.tblpertanyaan_uraian',SUB2,
             ' FROM tblpertanyaan  a  WHERE  a.tblpertanyaan_isaktif = "T"  ORDER BY a.tblpertanyaan_urut ');

SET @SQL = SUB2;


PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;


    
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_rekapizinbulan
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_rekapizinbulan`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekapizinbulan`(vtahun int(4),vbulan int(2), vidizin int(2))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
  DECLARE SUB1 TEXT DEFAULT '';
  DECLARE SUB2 TEXT DEFAULT '';
  -- DECLARE vbulan INT(2) DEFAULT 1;
  DECLARE vn INT(2) DEFAULT 1;
  DECLARE currpertanyaan CURSOR FOR
    SELECT tblpertanyaan_id, tblpertanyaan_uraian FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;

  OPEN currpertanyaan;
  BEGIN
      DECLARE exit_flag INT DEFAULT 0;
      DECLARE pertanyaan_id INT(11);
      DECLARE tblpertanyaan_uraian VARCHAR(300);
      DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET exit_flag = 1;

      currpertanyaan_loop: LOOP
        FETCH currpertanyaan INTO pertanyaan_id,tblpertanyaan_uraian;
            IF exit_flag THEN LEAVE currpertanyaan_loop; 
            END IF;
       # CODE BEGIN HERE
      SET SUB1 = CONCAT(SUB1,' WHEN a.tblpertanyaan_id = ',pertanyaan_id,' THEN IFNULL(AVG(b.tblhasilsurvei_pertanyaan',pertanyaan_id,'),0)');
      END LOOP;
  END;
  CLOSE currpertanyaan;

IF vbulan = 0 THEN
SET vbulan = 12;
END IF;

  WHILE(vn <= vbulan) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT CASE ',SUB1,' END FROM tblhasilsurvei b WHERE YEAR(b.tblhasilsurvei_syscreate)=',vtahun,' and MONTH(b.tblhasilsurvei_syscreate)=',vn,' and  if(',vidizin,'>0,b.refjenisizinikm_id = ',vidizin,',b.refjenisizinikm_id is not null)) as bulan_',vn,
                             ', hitung_nrrtertimbang(',vtahun,',',vn,',',vidizin,') as tertimbang_',vn,', hitung_ikm(',vtahun,',',vn,',',vidizin,') as ikm_',vn,',hitung_responden(',vtahun,',',vn,',',vidizin,') as responden_',vn);
  SET vn = vn + 1;
  END WHILE;

  SET vn = vbulan + 1;
  WHILE(vn <= 12) DO
     SET SUB2 = CONCAT(SUB2,',(select "0.0000") as bulan_',vn,
                             ', 0 as tertimbang_',vn,', 0 as ikm_',vn,', 0 as responden_',vn);
 
  SET vn = vn + 1;
  END WHILE;


  SET SUB2 = CONCAT('SELECT a.tblpertanyaan_id, a.tblpertanyaan_urut, a.tblpertanyaan_uraian',SUB2,
             ' FROM tblpertanyaan  a  WHERE  a.tblpertanyaan_isaktif = "T"  ORDER BY a.tblpertanyaan_urut ');

SET @SQL = SUB2;


PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;


    
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_rekapizinbulan_edit
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_rekapizinbulan_edit`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekapizinbulan_edit`(vtahun int(4),vbulan int(2), vidizin int(2))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
  DECLARE SUB1 TEXT DEFAULT '';
  DECLARE SUB2 TEXT DEFAULT '';
  -- DECLARE vbulan INT(2) DEFAULT 1;
  DECLARE vn INT(2) DEFAULT 1;
  DECLARE currpertanyaan CURSOR FOR
    SELECT tblpertanyaan_id, tblpertanyaan_uraian FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;

  OPEN currpertanyaan;
  BEGIN
      DECLARE exit_flag INT DEFAULT 0;
      DECLARE pertanyaan_id INT(11);
      DECLARE tblpertanyaan_uraian VARCHAR(300);
      DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET exit_flag = 1;

      currpertanyaan_loop: LOOP
        FETCH currpertanyaan INTO pertanyaan_id,tblpertanyaan_uraian;
            IF exit_flag THEN LEAVE currpertanyaan_loop; 
            END IF;
       # CODE BEGIN HERE
      SET SUB1 = CONCAT(SUB1,' WHEN a.tblpertanyaan_id = ',pertanyaan_id,' THEN IFNULL(AVG(b.tblhasilsurvei_pertanyaan',pertanyaan_id,'),0)');
      END LOOP;
  END;
  CLOSE currpertanyaan;

IF vbulan = 0 THEN
SET vbulan = 12;
END IF;

  WHILE(vn <= vbulan) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT CASE ',SUB1,' END FROM tblhasilsurvei b WHERE YEAR(b.tblhasilsurvei_syscreate)=',vtahun,' and MONTH(b.tblhasilsurvei_syscreate)=',vn,' and  if(',vidizin,'>0,b.refjenisizinikm_id = ',vidizin,',b.refjenisizinikm_id is not null)) as bulan_',vn);
  SET vn = vn + 1;
  END WHILE;

  SET vn = vbulan + 1;
  WHILE(vn <= 12) DO
     SET SUB2 = CONCAT(SUB2,',(select "0.0000") as bulan_',vn);
 
  SET vn = vn + 1;
  END WHILE;


  SET SUB2 = CONCAT('SELECT a.tblpertanyaan_id, a.tblpertanyaan_urut, a.tblpertanyaan_uraian',SUB2,
             ' FROM tblpertanyaan  a  WHERE  a.tblpertanyaan_isaktif = "T"  ORDER BY a.tblpertanyaan_urut ');

SET @SQL = SUB2;


PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;


    
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_rekapresponden
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_rekapresponden`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekapresponden`(vtahun int(4),vidizin int(2), vbulan int(2))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN

SELECT  
a.refjenisizinikm_id,
a.refjenisizinikm_nama,
if(vbulan>=1 or vbulan = 0,hitung_responden(vtahun,1,a.refjenisizinikm_id),0) as jan,
if(vbulan>=2 or vbulan = 0,hitung_responden(vtahun,2,a.refjenisizinikm_id),0) as feb,
if(vbulan>=3 or vbulan = 0,hitung_responden(vtahun,3,a.refjenisizinikm_id),0) as mar,
if(vbulan>=4 or vbulan = 0,hitung_responden(vtahun,4,a.refjenisizinikm_id),0) as apr,
if(vbulan>=5 or vbulan = 0,hitung_responden(vtahun,5,a.refjenisizinikm_id),0) as mei,
if(vbulan>=6 or vbulan = 0,hitung_responden(vtahun,6,a.refjenisizinikm_id),0) as jun,
if(vbulan>=7 or vbulan = 0,hitung_responden(vtahun,7,a.refjenisizinikm_id),0) as jul,
if(vbulan>=8 or vbulan = 0,hitung_responden(vtahun,8,a.refjenisizinikm_id),0) as agt,
if(vbulan>=9 or vbulan = 0,hitung_responden(vtahun,9,a.refjenisizinikm_id),0) as sep,
if(vbulan>=10 or vbulan = 0,hitung_responden(vtahun,10,a.refjenisizinikm_id),0) as okt,
if(vbulan>=11 or vbulan = 0,hitung_responden(vtahun,11,a.refjenisizinikm_id),0) as nov,
if(vbulan>=12 or vbulan = 0,hitung_responden(vtahun,12,a.refjenisizinikm_id),0) as des

FROM refjenisizinikm a
WHERE refjenisizinikm_id IS NOT NULL  AND IF(vidizin<>0,a.refjenisizinikm_id=vidizin,a.refjenisizinikm_id IS NOT NULL);

    
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_rekaprespondenbulan
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_rekaprespondenbulan`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekaprespondenbulan`(vtahun int(4), vbulan int(2))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN

SELECT 
a.refjenisizinikm_id,
a.refjenisizinikm_nama,
if(vbulan>=1 or vbulan = 0,hitung_responden(vtahun,01,a.refjenisizinikm_id),0) as jan,
if(vbulan>=2 or vbulan = 0,hitung_responden(vtahun,02,a.refjenisizinikm_id),0) as feb,
if(vbulan>=3 or vbulan = 0,hitung_responden(vtahun,03,a.refjenisizinikm_id),0) as mar,
if(vbulan>=4 or vbulan = 0,hitung_responden(vtahun,04,a.refjenisizinikm_id),0) as apr,
if(vbulan>=5 or vbulan = 0,hitung_responden(vtahun,05,a.refjenisizinikm_id),0) as mei,
if(vbulan>=6 or vbulan = 0,hitung_responden(vtahun,06,a.refjenisizinikm_id),0) as jun,
if(vbulan>=7 or vbulan = 0,hitung_responden(vtahun,07,a.refjenisizinikm_id),0) as jul,
if(vbulan>=8 or vbulan = 0,hitung_responden(vtahun,08,a.refjenisizinikm_id),0) as agt,
if(vbulan>=9 or vbulan = 0,hitung_responden(vtahun,09,a.refjenisizinikm_id),0) as sep,
if(vbulan>=10 or vbulan = 0,hitung_responden(vtahun,10,a.refjenisizinikm_id),0) as okt,
if(vbulan>=11 or vbulan = 0,hitung_responden(vtahun,11,a.refjenisizinikm_id),0) as nov,
if(vbulan>=12 or vbulan = 0,hitung_responden(vtahun,12,a.refjenisizinikm_id),0) as des
/*,
ROUND((hitung_responden(vtahun,01,a.refjenisizinikm_id) +
hitung_responden(vtahun,02,a.refjenisizinikm_id) +
hitung_responden(vtahun,03,a.refjenisizinikm_id) +
hitung_responden(vtahun,04,a.refjenisizinikm_id) +
hitung_responden(vtahun,05,a.refjenisizinikm_id) +
hitung_responden(vtahun,06,a.refjenisizinikm_id) +
hitung_responden(vtahun,07,a.refjenisizinikm_id) +
hitung_responden(vtahun,08,a.refjenisizinikm_id) +
hitung_responden(vtahun,09,a.refjenisizinikm_id) +
hitung_responden(vtahun,10,a.refjenisizinikm_id) +
hitung_responden(vtahun,11,a.refjenisizinikm_id) +
hitung_responden(vtahun,12,a.refjenisizinikm_id))/12)  as ratarata*/

FROM
refjenisizinikm a WHERE a.refjenisizinikm_isaktif = "T"
ORDER BY a.refjenisizinikm_id;


    
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_rekaprespondenperbulan
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_rekaprespondenperbulan`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekaprespondenperbulan`(vtahun int(4), vbulan int(2))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN

SELECT 
a.refjenisizinikm_id,
a.refjenisizinikm_nama,
if(vbulan=1,hitung_responden(vtahun,01,a.refjenisizinikm_id),0) as jan,
if(vbulan=2,hitung_responden(vtahun,02,a.refjenisizinikm_id),0) as feb,
if(vbulan=3,hitung_responden(vtahun,03,a.refjenisizinikm_id),0) as mar,
if(vbulan=4,hitung_responden(vtahun,04,a.refjenisizinikm_id),0) as apr,
if(vbulan=5,hitung_responden(vtahun,05,a.refjenisizinikm_id),0) as mei,
if(vbulan=6,hitung_responden(vtahun,06,a.refjenisizinikm_id),0) as jun,
if(vbulan=7,hitung_responden(vtahun,07,a.refjenisizinikm_id),0) as jul,
if(vbulan=8,hitung_responden(vtahun,08,a.refjenisizinikm_id),0) as agt,
if(vbulan=9,hitung_responden(vtahun,09,a.refjenisizinikm_id),0) as sep,
if(vbulan=10,hitung_responden(vtahun,10,a.refjenisizinikm_id),0) as okt,
if(vbulan=11,hitung_responden(vtahun,11,a.refjenisizinikm_id),0) as nov,
if(vbulan=12,hitung_responden(vtahun,12,a.refjenisizinikm_id),0) as des

FROM
refjenisizinikm a WHERE a.refjenisizinikm_isaktif = "T"
ORDER BY a.refjenisizinikm_id;


    
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for proc_rekaprespondensampaibulan
-- ----------------------------
DROP PROCEDURE IF EXISTS `proc_rekaprespondensampaibulan`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekaprespondensampaibulan`(vtahun int(4), vbulan int(2))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN

SELECT 
a.refjenisizinikm_id,
a.refjenisizinikm_nama,
if(vbulan>=1 or vbulan = 0,hitung_responden(vtahun,01,a.refjenisizinikm_id),0) as jan,
if(vbulan>=2 or vbulan = 0,hitung_responden(vtahun,02,a.refjenisizinikm_id),0) as feb,
if(vbulan>=3 or vbulan = 0,hitung_responden(vtahun,03,a.refjenisizinikm_id),0) as mar,
if(vbulan>=4 or vbulan = 0,hitung_responden(vtahun,04,a.refjenisizinikm_id),0) as apr,
if(vbulan>=5 or vbulan = 0,hitung_responden(vtahun,05,a.refjenisizinikm_id),0) as mei,
if(vbulan>=6 or vbulan = 0,hitung_responden(vtahun,06,a.refjenisizinikm_id),0) as jun,
if(vbulan>=7 or vbulan = 0,hitung_responden(vtahun,07,a.refjenisizinikm_id),0) as jul,
if(vbulan>=8 or vbulan = 0,hitung_responden(vtahun,08,a.refjenisizinikm_id),0) as agt,
if(vbulan>=9 or vbulan = 0,hitung_responden(vtahun,09,a.refjenisizinikm_id),0) as sep,
if(vbulan>=10 or vbulan = 0,hitung_responden(vtahun,10,a.refjenisizinikm_id),0) as okt,
if(vbulan>=11 or vbulan = 0,hitung_responden(vtahun,11,a.refjenisizinikm_id),0) as nov,
if(vbulan>=12 or vbulan = 0,hitung_responden(vtahun,12,a.refjenisizinikm_id),0) as des
/*,
ROUND((hitung_responden(vtahun,01,a.refjenisizinikm_id) +
hitung_responden(vtahun,02,a.refjenisizinikm_id) +
hitung_responden(vtahun,03,a.refjenisizinikm_id) +
hitung_responden(vtahun,04,a.refjenisizinikm_id) +
hitung_responden(vtahun,05,a.refjenisizinikm_id) +
hitung_responden(vtahun,06,a.refjenisizinikm_id) +
hitung_responden(vtahun,07,a.refjenisizinikm_id) +
hitung_responden(vtahun,08,a.refjenisizinikm_id) +
hitung_responden(vtahun,09,a.refjenisizinikm_id) +
hitung_responden(vtahun,10,a.refjenisizinikm_id) +
hitung_responden(vtahun,11,a.refjenisizinikm_id) +
hitung_responden(vtahun,12,a.refjenisizinikm_id))/12)  as ratarata*/

FROM
refjenisizinikm a WHERE a.refjenisizinikm_isaktif = "T"
ORDER BY a.refjenisizinikm_id;


    
END
;;
DELIMITER ;
