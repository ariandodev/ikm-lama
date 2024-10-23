-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2024 at 08:29 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikmdpmpt_dbikm`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_grafikjenisizin` (`vtglawal` DATE, `vtglakhir` DATE)  SQL SECURITY INVOKER
BEGIN
SELECT
refjenisizinikm_id,
refjenisizinikm_nama,
(SELECT count(b.tblhasilsurvei_id) FROM tblhasilsurvei b WHERE b.refjenisizinikm_id =refjenisizinikm.refjenisizinikm_id AND tblhasilsurvei_syscreate >= vtglawal AND tblhasilsurvei_syscreate <= vtglakhir  ) as jumlah
FROM refjenisizinikm 
ORDER BY refjenisizinikm_nama;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_grafikloket` (`tglawal` DATE, `tglakhir` DATE)  SQL SECURITY INVOKER
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

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_grafiksaran` (`tglawal` DATE, `tglakhir` DATE)  SQL SECURITY INVOKER
BEGIN

SELECT
sum(IF(c.tblhasilsurvei_penilaian='positif',1,0)) as positif,
sum(IF(c.tblhasilsurvei_penilaian='negatif',1,0)) as negatif,
sum(IF(c.tblhasilsurvei_penilaian='abstain',1,0)) as abstain
FROM
tblhasilsurvei c 
WHERE c.tblhasilsurvei_syscreate >= tglawal and c.tblhasilsurvei_syscreate <= tglakhir;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_grafiksex` (`vtglawal` DATE, `vtglakhir` DATE)  SQL SECURITY INVOKER
BEGIN
SELECT
refsex_id,
refsex_nama,
(SELECT count(b.tblhasilsurvei_id) FROM tblhasilsurvei b WHERE b.refsex_id =refsex.refsex_id AND tblhasilsurvei_syscreate >= vtglawal AND tblhasilsurvei_syscreate <= vtglakhir  ) as jumlah
FROM refsex 
ORDER BY refsex_nama;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_grafiktkpendidikan` (`vtglawal` DATE, `vtglakhir` DATE)  SQL SECURITY INVOKER
BEGIN
SELECT
reftingkatpendidikan_id,
reftingkatpendidikan_nama,
(SELECT count(b.tblhasilsurvei_id) FROM tblhasilsurvei b WHERE b.reftingkatpendidikan_id =reftingkatpendidikan.reftingkatpendidikan_id AND tblhasilsurvei_syscreate >= vtglawal AND tblhasilsurvei_syscreate <= vtglakhir  ) as jumlah
FROM reftingkatpendidikan 
ORDER BY reftingkatpendidikan_kode;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_grafikusia` (`tglawal` DATE, `tglakhir` DATE)  SQL SECURITY INVOKER
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
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_hitungikm` (`vtahun` INT(4), `vbulan` INT(2), `vjenisizinikm` INT(11))  SQL SECURITY INVOKER
BEGIN

DECLARE vjmlresponden int(11);
DECLARE vjmltotal     DECIMAL(19,5);
DECLARE vhasil        DECIMAL(19,5);

SELECT count(a.refjenisizinikm_id), sum(a.tblhasilsurvei_total) INTO vjmlresponden, vjmltotal  FROM tblhasilsurvei a WHERE YEAR(a.tblhasilsurvei_syscreate)=vtahun AND MONTH(a.tblhasilsurvei_syscreate)=vbulan AND a.refjenisizinikm_id = vjenisizinikm; 

SET vhasil = (vjmltotal / vjmlresponden) *  0.1111 * 25;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_ikm0daftarresponden` (`vtahun` INT(4), `vbulan` INT(2), `vjenisizinikm` INT(11))  SQL SECURITY INVOKER
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

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_ikm1jumlah` (`vtahun` INT(4), `vbulan` INT(2), `vjenisizinikm` INT(11))  SQL SECURITY INVOKER
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

    SET ISI = CONCAT('SELECT "1" as FIRST',ISI,' FROM tblhasilsurvei WHERE YEAR(tblhasilsurvei_syscreate) = ',vtahun,' AND MONTH(tblhasilsurvei_syscreate) = ',vbulan,' AND  tblhasilsurvei_id IS NOT NULL ',IF(vjenisizinikm > 0,CONCAT(' and refjenisizinikm_id=',vjenisizinikm),' '));
    SET @SQL = ISI;

PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_ikm2nrr` (`vtahun` INT(4), `vbulan` INT(2), `vjenisizinikm` INT(11))  SQL SECURITY INVOKER
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
     SET ISI = CONCAT('SELECT "1" as FIRST',ISI,' FROM tblhasilsurvei WHERE YEAR(tblhasilsurvei_syscreate) = ',vtahun,' AND MONTH(tblhasilsurvei_syscreate) = ',vbulan,' AND tblhasilsurvei_id IS NOT NULL  ',IF(vjenisizinikm > 0,CONCAT(' and refjenisizinikm_id=',vjenisizinikm),' '));
    SET @COBA = ISI;

PREPARE stmt1 FROM @COBA;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;
 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_ikm3nrrtertimbang` (`vtahun` INT(4), `vbulan` INT(2), `vjenisizinikm` INT(11))  SQL SECURITY INVOKER
BEGIN
DECLARE NRR DECIMAL(19,6)  DEFAULT 0.11111111;
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
     SET ISI = CONCAT('SELECT "1" as FIRST ',ISI,ISI2,' FROM tblhasilsurvei WHERE YEAR(tblhasilsurvei_syscreate) = ',vtahun,' AND MONTH(tblhasilsurvei_syscreate) = ',vbulan,' AND tblhasilsurvei_id IS NOT NULL  ',IF(vjenisizinikm > 0,CONCAT(' and refjenisizinikm_id=',vjenisizinikm),' '));		 
    SET @SQL = ISI;

PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;
 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_ikm4hasilakhir` (`vtahun` INT(4), `vbulan` INT(2), `vjenisizinikm` INT(11))  SQL SECURITY INVOKER
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
     SET ISI = CONCAT('SELECT ROUND(',ISI,',2) as hasilakhir FROM tblhasilsurvei WHERE YEAR(tblhasilsurvei_syscreate) = ',vtahun,' AND MONTH(tblhasilsurvei_syscreate) = ',vbulan,' AND tblhasilsurvei_id IS NOT NULL  ',IF(vjenisizinikm > 0,CONCAT(' and refjenisizinikm_id=',vjenisizinikm),' '));
     SET @SQL = ISI;

PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;
 



END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekapikm` (`vtahun` INT(4), `vbulan` INT(2), `vidizin` INT(2))  BEGIN
  DECLARE SUB1 TEXT DEFAULT '';
  DECLARE SUB2 TEXT DEFAULT '';
  DECLARE vn INT(2) DEFAULT 1;
  DECLARE currpertanyaan CURSOR FOR
    SELECT tblpertanyaan_id, tblpertanyaan_point FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;

  OPEN currpertanyaan;
  BEGIN
      DECLARE exit_flag INT DEFAULT 0;
      DECLARE pertanyaan_id INT(11);
      DECLARE tblpertanyaan_point VARCHAR(300);
      DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET exit_flag = 1;

      currpertanyaan_loop:LOOP
        FETCH currpertanyaan INTO pertanyaan_id,tblpertanyaan_point;
            IF exit_flag THEN LEAVE currpertanyaan_loop; 
            END IF;
             SET SUB1 = CONCAT(SUB1,' WHEN a.tblpertanyaan_id = ',pertanyaan_id,' THEN IFNULL(AVG(b.tblhasilsurvei_pertanyaan',pertanyaan_id,'),0)');
      END LOOP;
  END;
  CLOSE currpertanyaan;

IF vbulan = 0 THEN
SET vbulan = 12;
END IF;

  WHILE(vn <= vbulan) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT CASE ',SUB1,' END FROM tblhasilsurvei b WHERE YEAR(b.tblhasilsurvei_syscreate)=',vtahun,' and MONTH(b.tblhasilsurvei_syscreate)=',vn,' and  if(',vidizin,'>0,b.refjenisizinikm_id = ',vidizin,',b.refjenisizinikm_id is not null)) as bulan_',vn,', hitung_ikm(',vtahun,',',vn,',',vidizin,') as ikm_',vn);
 
SET vn = vn + 1;
  END WHILE;

SET vn = vbulan + 1;

  WHILE(vn <= 12) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT  "0.0000") as bulan_',vn,', 0 as ikm_',vn);
  SET vn = vn + 1;
  END WHILE;
  

  SET SUB2 = CONCAT('SELECT a.tblpertanyaan_id, a.tblpertanyaan_urut, a.tblpertanyaan_point',SUB2,
             ' FROM tblpertanyaan  a  WHERE  a.tblpertanyaan_isaktif = "T"  ORDER BY a.tblpertanyaan_urut ');

SET @SQL = SUB2;


PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;


    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekapikmbulan` (`vtahun` INT(4), `vidizin` INT(2), `vbulan` INT(2))  SQL SECURITY INVOKER
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

    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekapizin` (`vtahun` INT(4), `vbulan` INT(2), `vidizin` INT(2))  SQL SECURITY INVOKER
BEGIN
  DECLARE SUB1 TEXT DEFAULT '';
  DECLARE SUB2 TEXT DEFAULT '';
  DECLARE vn INT(2) DEFAULT 1;
  DECLARE currpertanyaan CURSOR FOR
    SELECT tblpertanyaan_id, tblpertanyaan_point FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;

  OPEN currpertanyaan;
  BEGIN
      DECLARE exit_flag INT DEFAULT 0;
      DECLARE pertanyaan_id INT(11);
      DECLARE tblpertanyaan_point VARCHAR(300);
      DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET exit_flag = 1;

      currpertanyaan_loop:LOOP
        FETCH currpertanyaan INTO pertanyaan_id,tblpertanyaan_point;
            IF exit_flag THEN LEAVE currpertanyaan_loop; 
            END IF;
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
  

  SET SUB2 = CONCAT('SELECT a.tblpertanyaan_id, a.tblpertanyaan_urut, a.tblpertanyaan_point',SUB2,
             ' FROM tblpertanyaan  a  WHERE  a.tblpertanyaan_isaktif = "T"  ORDER BY a.tblpertanyaan_urut ');

SET @SQL = SUB2;


PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;


    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekapizinbulan` (`vtahun` INT(4), `vbulan` INT(2), `vidizin` INT(2))  SQL SECURITY INVOKER
BEGIN
  DECLARE SUB1 TEXT DEFAULT '';
  DECLARE SUB2 TEXT DEFAULT '';
    DECLARE vn INT(2) DEFAULT 1;
  DECLARE currpertanyaan CURSOR FOR
    SELECT tblpertanyaan_id, tblpertanyaan_point FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;

  OPEN currpertanyaan;
  BEGIN
      DECLARE exit_flag INT DEFAULT 0;
      DECLARE pertanyaan_id INT(11);
      DECLARE tblpertanyaan_point VARCHAR(300);
      DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET exit_flag = 1;

      currpertanyaan_loop:LOOP
        FETCH currpertanyaan INTO pertanyaan_id,tblpertanyaan_point;
            IF exit_flag THEN LEAVE currpertanyaan_loop; 
            END IF;
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


  SET SUB2 = CONCAT('SELECT a.tblpertanyaan_id, a.tblpertanyaan_urut, a.tblpertanyaan_point',SUB2,
             ' FROM tblpertanyaan  a  WHERE  a.tblpertanyaan_isaktif = "T"  ORDER BY a.tblpertanyaan_urut ');

SET @SQL = SUB2;


PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;


    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekapresponden` (`vtahun` INT(4), `vidizin` INT(2), `vbulan` INT(2))  SQL SECURITY INVOKER
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

    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekaprespondenbulan` (`vtahun` INT(4), `vbulan` INT(2))  SQL SECURITY INVOKER
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


FROM
refjenisizinikm a WHERE a.refjenisizinikm_isaktif = "T"
ORDER BY a.refjenisizinikm_id;


    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekaprespondenperbulan` (`vtahun` INT(4), `vbulan` INT(2))  SQL SECURITY INVOKER
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


    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_rekaprespondensampaibulan` (`vtahun` INT(4), `vbulan` INT(2))  SQL SECURITY INVOKER
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


FROM
refjenisizinikm a WHERE a.refjenisizinikm_isaktif = "T"
ORDER BY a.refjenisizinikm_id;


    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_triwulan1` (`vtahun` INT(4), `vbulan` INT(2), `vidizin` INT(2))  BEGIN
  DECLARE SUB1 TEXT DEFAULT '';
  DECLARE SUB2 TEXT DEFAULT '';
  DECLARE vn INT(2) DEFAULT 1;
  DECLARE currpertanyaan CURSOR FOR
    SELECT tblpertanyaan_id, tblpertanyaan_point FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;

  OPEN currpertanyaan;
  BEGIN
      DECLARE exit_flag INT DEFAULT 0;
      DECLARE pertanyaan_id INT(11);
      DECLARE tblpertanyaan_point VARCHAR(300);
      DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET exit_flag = 1;

      currpertanyaan_loop:LOOP
        FETCH currpertanyaan INTO pertanyaan_id,tblpertanyaan_point;
            IF exit_flag THEN LEAVE currpertanyaan_loop; 
            END IF;
             SET SUB1 = CONCAT(SUB1,' WHEN a.tblpertanyaan_id = ',pertanyaan_id,' THEN IFNULL(AVG(b.tblhasilsurvei_pertanyaan',pertanyaan_id,'),0)');
      END LOOP;
  END;
  CLOSE currpertanyaan;

IF vbulan = 0 THEN
SET vbulan = 3;
END IF;

  WHILE(vn <= vbulan) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT CASE ',SUB1,' END FROM tblhasilsurvei b WHERE YEAR(b.tblhasilsurvei_syscreate)=',vtahun,' and MONTH(b.tblhasilsurvei_syscreate)=',vn,' and  if(',vidizin,'>0,b.refjenisizinikm_id = ',vidizin,',b.refjenisizinikm_id is not null)) as bulan_',vn,', hitung_ikm(',vtahun,',',vn,',',vidizin,') as ikm_',vn);
 
SET vn = vn + 1;
  END WHILE;

SET vn = vbulan + 1;

  WHILE(vn <= 3) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT  "0.0000") as bulan_',vn,', 0 as ikm_',vn);
  SET vn = vn + 1;
  END WHILE;
  

  SET SUB2 = CONCAT('SELECT a.tblpertanyaan_id, a.tblpertanyaan_urut, a.tblpertanyaan_point',SUB2,
             ' FROM tblpertanyaan  a  WHERE  a.tblpertanyaan_isaktif = "T"  ORDER BY a.tblpertanyaan_urut ');

SET @SQL = SUB2;


PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;


    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_triwulan2` (`vtahun` INT(4), `vbulan` INT(2), `vidizin` INT(2))  BEGIN
  DECLARE SUB1 TEXT DEFAULT '';
  DECLARE SUB2 TEXT DEFAULT '';
  DECLARE vn INT(2) DEFAULT 1;
  DECLARE currpertanyaan CURSOR FOR
    SELECT tblpertanyaan_id, tblpertanyaan_point FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;

  OPEN currpertanyaan;
  BEGIN
      DECLARE exit_flag INT DEFAULT 0;
      DECLARE pertanyaan_id INT(11);
      DECLARE tblpertanyaan_point VARCHAR(300);
      DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET exit_flag = 1;

      currpertanyaan_loop:LOOP
        FETCH currpertanyaan INTO pertanyaan_id,tblpertanyaan_point;
            IF exit_flag THEN LEAVE currpertanyaan_loop; 
            END IF;
             SET SUB1 = CONCAT(SUB1,' WHEN a.tblpertanyaan_id = ',pertanyaan_id,' THEN IFNULL(AVG(b.tblhasilsurvei_pertanyaan',pertanyaan_id,'),0)');
      END LOOP;
  END;
  CLOSE currpertanyaan;

IF vbulan = 0 THEN
SET vbulan = 6;
END IF;

  WHILE(vn <= vbulan) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT CASE ',SUB1,' END FROM tblhasilsurvei b WHERE YEAR(b.tblhasilsurvei_syscreate)=',vtahun,' and MONTH(b.tblhasilsurvei_syscreate)=',vn,' and  if(',vidizin,'>0,b.refjenisizinikm_id = ',vidizin,',b.refjenisizinikm_id is not null)) as bulan_',vn,', hitung_ikm(',vtahun,',',vn,',',vidizin,') as ikm_',vn);
 
SET vn = vn + 1;
  END WHILE;

SET vn = vbulan + 1;

  WHILE(vn <= 6) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT  "0.0000") as bulan_',vn,', 0 as ikm_',vn);
  SET vn = vn + 1;
  END WHILE;
  

  SET SUB2 = CONCAT('SELECT a.tblpertanyaan_id, a.tblpertanyaan_urut, a.tblpertanyaan_point',SUB2,
             ' FROM tblpertanyaan  a  WHERE  a.tblpertanyaan_isaktif = "T"  ORDER BY a.tblpertanyaan_urut ');

SET @SQL = SUB2;


PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;


    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_triwulan3` (`vtahun` INT(4), `vbulan` INT(2), `vidizin` INT(2))  BEGIN
  DECLARE SUB1 TEXT DEFAULT '';
  DECLARE SUB2 TEXT DEFAULT '';
  DECLARE vn INT(2) DEFAULT 1;
  DECLARE currpertanyaan CURSOR FOR
    SELECT tblpertanyaan_id, tblpertanyaan_point FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;

  OPEN currpertanyaan;
  BEGIN
      DECLARE exit_flag INT DEFAULT 0;
      DECLARE pertanyaan_id INT(11);
      DECLARE tblpertanyaan_point VARCHAR(300);
      DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET exit_flag = 1;

      currpertanyaan_loop:LOOP
        FETCH currpertanyaan INTO pertanyaan_id,tblpertanyaan_point;
            IF exit_flag THEN LEAVE currpertanyaan_loop; 
            END IF;
             SET SUB1 = CONCAT(SUB1,' WHEN a.tblpertanyaan_id = ',pertanyaan_id,' THEN IFNULL(AVG(b.tblhasilsurvei_pertanyaan',pertanyaan_id,'),0)');
      END LOOP;
  END;
  CLOSE currpertanyaan;

IF vbulan = 0 THEN
SET vbulan = 9;
END IF;

  WHILE(vn <= vbulan) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT CASE ',SUB1,' END FROM tblhasilsurvei b WHERE YEAR(b.tblhasilsurvei_syscreate)=',vtahun,' and MONTH(b.tblhasilsurvei_syscreate)=',vn,' and  if(',vidizin,'>0,b.refjenisizinikm_id = ',vidizin,',b.refjenisizinikm_id is not null)) as bulan_',vn,', hitung_ikm(',vtahun,',',vn,',',vidizin,') as ikm_',vn);
 
SET vn = vn + 1;
  END WHILE;

SET vn = vbulan + 1;

  WHILE(vn <= 9) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT  "0.0000") as bulan_',vn,', 0 as ikm_',vn);
  SET vn = vn + 1;
  END WHILE;
  

  SET SUB2 = CONCAT('SELECT a.tblpertanyaan_id, a.tblpertanyaan_urut, a.tblpertanyaan_point',SUB2,
             ' FROM tblpertanyaan  a  WHERE  a.tblpertanyaan_isaktif = "T"  ORDER BY a.tblpertanyaan_urut ');

SET @SQL = SUB2;


PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;


    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_triwulan4` (`vtahun` INT(4), `vbulan` INT(2), `vidizin` INT(2))  BEGIN
  DECLARE SUB1 TEXT DEFAULT '';
  DECLARE SUB2 TEXT DEFAULT '';
  DECLARE vn INT(2) DEFAULT 1;
  DECLARE currpertanyaan CURSOR FOR
    SELECT tblpertanyaan_id, tblpertanyaan_point FROM tblpertanyaan WHERE tblpertanyaan_isaktif ="T" ORDER BY tblpertanyaan_urut;

  OPEN currpertanyaan;
  BEGIN
      DECLARE exit_flag INT DEFAULT 0;
      DECLARE pertanyaan_id INT(11);
      DECLARE tblpertanyaan_point VARCHAR(300);
      DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET exit_flag = 1;

      currpertanyaan_loop:LOOP
        FETCH currpertanyaan INTO pertanyaan_id,tblpertanyaan_point;
            IF exit_flag THEN LEAVE currpertanyaan_loop; 
            END IF;
             SET SUB1 = CONCAT(SUB1,' WHEN a.tblpertanyaan_id = ',pertanyaan_id,' THEN IFNULL(AVG(b.tblhasilsurvei_pertanyaan',pertanyaan_id,'),0)');
      END LOOP;
  END;
  CLOSE currpertanyaan;

IF vbulan = 0 THEN
SET vbulan = 12;
END IF;

  WHILE(vn <= vbulan) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT CASE ',SUB1,' END FROM tblhasilsurvei b WHERE YEAR(b.tblhasilsurvei_syscreate)=',vtahun,' and MONTH(b.tblhasilsurvei_syscreate)=',vn,' and  if(',vidizin,'>0,b.refjenisizinikm_id = ',vidizin,',b.refjenisizinikm_id is not null)) as bulan_',vn,', hitung_ikm(',vtahun,',',vn,',',vidizin,') as ikm_',vn);
 
SET vn = vn + 1;
  END WHILE;

SET vn = vbulan + 1;

  WHILE(vn <= 12) DO
      SET SUB2 = CONCAT(SUB2,',(SELECT  "0.0000") as bulan_',vn,', 0 as ikm_',vn);
  SET vn = vn + 1;
  END WHILE;
  

  SET SUB2 = CONCAT('SELECT a.tblpertanyaan_id, a.tblpertanyaan_urut, a.tblpertanyaan_point',SUB2,
             ' FROM tblpertanyaan  a  WHERE  a.tblpertanyaan_isaktif = "T"  ORDER BY a.tblpertanyaan_urut ');

SET @SQL = SUB2;


PREPARE stmt1 FROM @SQL;
EXECUTE stmt1;
DEALLOCATE PREPARE stmt1;


    
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_ikm` (`vtahun` INT(4), `vbulan` INT(2), `vidizin` INT(11)) RETURNS DECIMAL(10,4) SQL SECURITY INVOKER
BEGIN
DECLARE hasil DECIMAL (10,4);
DECLARE NRR INT(2)DEFAULT 25 ;

SET hasil = (select hitung_nrrtertimbang(vtahun,vbulan,vidizin) * NRR );

RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_nrrtertimbang` (`vtahun` INT(4), `vbulan` INT(2), `vidizin` INT(11)) RETURNS DECIMAL(10,4) SQL SECURITY INVOKER
BEGIN
DECLARE hasil DECIMAL (10,4);
DECLARE NRR DECIMAL (19,8)DEFAULT 0.11111111;
DECLARE hasil1 DECIMAL (10,8);
DECLARE hasil2 DECIMAL (10,8);
DECLARE hasil3 DECIMAL (10,8);
DECLARE hasil4 DECIMAL (10,8);
DECLARE hasil5 DECIMAL (10,8);
DECLARE hasil6 DECIMAL (10,8);
DECLARE hasil7 DECIMAL (10,8);
DECLARE hasil8 DECIMAL (10,8);
DECLARE hasil9 DECIMAL (10,8);

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


SET hasil = (hasil1+hasil2+hasil3+hasil4+hasil5+hasil6+hasil7+hasil8+hasil9);

RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_responden` (`vtahun` INT(4), `vbulan` INT(2), `vidizin` INT(11)) RETURNS INT(11) SQL SECURITY INVOKER
BEGIN
DECLARE HASIL INT(11);

SET HASIL = (select count(tblhasilsurvei_id) FROM tblhasilsurvei WHERE YEAR(tblhasilsurvei_syscreate) =vtahun and MONTH(tblhasilsurvei_syscreate) = vbulan and if(vidizin>0,refjenisizinikm_id =vidizin,refjenisizinikm_id is not null));

RETURN HASIL;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `iscolexists` (`namatable` VARCHAR(255), `namafield` VARCHAR(255)) RETURNS INT(1) SQL SECURITY INVOKER
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
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `refjenisizinikm`
--

CREATE TABLE `refjenisizinikm` (
  `refjenisizinikm_id` int(11) NOT NULL,
  `refloket_id` int(5) DEFAULT NULL,
  `refjenisizinikm_nama` varchar(255) NOT NULL,
  `refjenisizinikm_isaktif` enum('F','T') DEFAULT 'F'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refjenisizinikm`
--

INSERT INTO `refjenisizinikm` (`refjenisizinikm_id`, `refloket_id`, `refjenisizinikm_nama`, `refjenisizinikm_isaktif`) VALUES
(7, 1, 'TANDA DAFTAR GUDANG (TDG)', 'F'),
(11, 1, 'IZIN MENDIRIKAN BANGUNAN', 'F'),
(12, 1, 'SURAT IZIN PRAKTIK PENATA ANESTESI', 'F'),
(18, 1, 'LAYANAN BERBANTUAN NIB', 'F'),
(42, 1, 'IZIN MEMASANG REKLAME', 'T'),
(56, 1, 'SURAT IZIN PRAKTIK DOKTER', 'T'),
(60, 1, 'SIP TERAPIS GIGI & MULUT', 'T'),
(63, 1, 'SIP APOTEKER (SIPA)', 'T'),
(64, 1, 'SIP TENAGA TEKNIS KEFARMASIAN (SIPTTK)', 'T'),
(66, 1, 'SURAT IZIN PRAKTIK PERAWAT', 'T'),
(68, 1, 'SURAT IZIN PRAKTIK BIDAN', 'T'),
(71, 1, 'SURAT IZIN APOTEK', 'F'),
(74, 1, 'IZIN OPERASIOANAL KLINIK', 'F'),
(77, 1, 'IZIN OPERASIONAL PUSKESMAS', 'F'),
(87, 1, 'SIP TERAPIS GIGI & MULUT', 'T'),
(97, 1, 'SURAT IZIN OPERASIONAL PNF (PAUD)', 'T'),
(102, 1, 'IZIN LOKASI', 'F'),
(104, 1, 'SURAT IZIN OPERASIONAL PNF (LKP)', 'F'),
(123, 1, 'LAYANAN BERBANTUAN OSS', 'T'),
(124, 1, 'LAYANAN KONSULTASI', 'T'),
(125, 1, 'LAYANAN Si HATI', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `refloket`
--

CREATE TABLE `refloket` (
  `refloket_id` int(11) NOT NULL,
  `refloket_nama` varchar(255) NOT NULL,
  `refloket_petugas` varchar(255) NOT NULL,
  `refloket_isaktif` enum('N','Y') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refloket`
--

INSERT INTO `refloket` (`refloket_id`, `refloket_nama`, `refloket_petugas`, `refloket_isaktif`) VALUES
(1, 'Front Office', 'Ependri, A.Md', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `refsex`
--

CREATE TABLE `refsex` (
  `refsex_id` int(2) NOT NULL,
  `refsex_kode` varchar(2) DEFAULT NULL,
  `refsex_nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refsex`
--

INSERT INTO `refsex` (`refsex_id`, `refsex_kode`, `refsex_nama`) VALUES
(1, 'L', 'Laki-laki'),
(2, 'P', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `reftingkatpendidikan`
--

CREATE TABLE `reftingkatpendidikan` (
  `reftingkatpendidikan_id` bigint(19) NOT NULL,
  `refgolru_id` int(3) NOT NULL,
  `reftingkatpendidikan_urut` int(2) DEFAULT '0',
  `reftingkatpendidikan_kode` varchar(20) NOT NULL,
  `reftingkatpendidikan_nama` varchar(150) DEFAULT NULL,
  `haryo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reftingkatpendidikan`
--

INSERT INTO `reftingkatpendidikan` (`reftingkatpendidikan_id`, `refgolru_id`, `reftingkatpendidikan_urut`, `reftingkatpendidikan_kode`, `reftingkatpendidikan_nama`, `haryo`) VALUES
(1, 5, 1, '', 'SD', '01'),
(2, 7, 2, '', 'SLTP', '02'),
(3, 8, 3, '', 'SLTA', '03'),
(4, 10, 4, '', 'D-1', '04'),
(5, 10, 5, '', 'D-2', '05'),
(6, 11, 6, '', 'D-3', '06'),
(8, 12, 8, '', 'D-4', '08'),
(9, 13, 9, '', 'S-1', '09'),
(10, 14, 10, '', 'S-2', '10'),
(11, 14, 11, '', 'S-3', '00'),
(20003, 0, 12, '', 'Lainnya', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reftriwulan`
--

CREATE TABLE `reftriwulan` (
  `reftriwulan_id` int(11) NOT NULL,
  `reftriwulan_nama` varchar(255) DEFAULT NULL,
  `reftriwulan_isaktif` enum('F','T') DEFAULT 'F'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reftriwulan`
--

INSERT INTO `reftriwulan` (`reftriwulan_id`, `reftriwulan_nama`, `reftriwulan_isaktif`) VALUES
(1, 'Triwulan I', 'F'),
(2, 'Triwulan II', 'T'),
(3, 'Triwulan III', 'F'),
(4, 'Triwulan IV', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `refusia`
--

CREATE TABLE `refusia` (
  `refusia_id` int(11) NOT NULL,
  `refusia_awal` int(2) DEFAULT NULL,
  `refusia_akhir` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblappconfig`
--

CREATE TABLE `tblappconfig` (
  `tblappconfig_id` int(11) NOT NULL,
  `tblappconfig_key` varchar(255) NOT NULL,
  `tblappconfig_value` varchar(400) DEFAULT NULL,
  `tblappconfig_type` enum('STRING','BOOLEAN','FILE','LIST') DEFAULT 'STRING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblappconfig`
--

INSERT INTO `tblappconfig` (`tblappconfig_id`, `tblappconfig_key`, `tblappconfig_value`, `tblappconfig_type`) VALUES
(1, 'APLIKASI_NAMA', 'Indeks Kepuasan Masyarakat ', 'STRING'),
(2, 'APLIKASI_LOGO', 'favicon.png', 'STRING'),
(3, 'APLIKASI_INSTANSI', 'Badan Penanaman Modal dan Pelayanan Perizinan Terpadu', 'STRING'),
(4, 'APLIKASI_WILAYAH', 'Kabupaten Paser', 'STRING'),
(5, 'APLIKASI_KOP_UTAMA', 'PEMERINTAH KABUPATEN PASER', 'STRING'),
(6, 'APLIKASI_ALAMAT_INSTANSI', '-', 'STRING'),
(7, 'APLIKASI_CETAK_WILAYAH', 'Paser', 'STRING'),
(8, 'APLIKASI_INSTANSI_SINGKAT', '-', 'STRING'),
(9, 'APLIKASI_PEMERINTAH', 'Kabupaten Paser', 'STRING'),
(10, 'APLIKASI_TIMEOUT_MINUTES', '10', 'STRING'),
(11, 'APLIKASI_PROVINSI', 'Kalimantan TImur', 'STRING'),
(12, 'APLIKASI_ISVALIDASI_KABID', 'false', 'BOOLEAN');

-- --------------------------------------------------------

--
-- Table structure for table `tblhasilsurvei`
--

CREATE TABLE `tblhasilsurvei` (
  `tblhasilsurvei_id` int(9) NOT NULL,
  `refjenisizinikm_id` int(11) NOT NULL,
  `reftingkatpendidikan_id` int(11) NOT NULL,
  `refsex_id` int(1) NOT NULL,
  `tblhasilsurvei_usia` int(11) NOT NULL,
  `refloket_id` int(11) DEFAULT NULL,
  `tblhasilsurvei_caradaftar` enum('Loket','Online') DEFAULT NULL,
  `tblhasilsurvei_pengurusan` enum('Pemilik','Kuasa') DEFAULT NULL,
  `refjenisizinikm_nama` varchar(200) DEFAULT NULL,
  `tblhasilsurvei_nama` varchar(255) DEFAULT NULL,
  `tblhasilsurvei_nip` varchar(255) DEFAULT NULL,
  `tblhasilsurvei_pertanyaan1` int(2) DEFAULT NULL,
  `tblhasilsurvei_pertanyaan2` int(2) DEFAULT NULL,
  `tblhasilsurvei_pertanyaan3` int(2) DEFAULT NULL,
  `tblhasilsurvei_pertanyaan4` int(2) DEFAULT NULL,
  `tblhasilsurvei_pertanyaan5` int(2) DEFAULT NULL,
  `tblhasilsurvei_pertanyaan6` int(2) DEFAULT NULL,
  `tblhasilsurvei_pertanyaan7` int(2) DEFAULT NULL,
  `tblhasilsurvei_pertanyaan8` int(2) DEFAULT NULL,
  `tblhasilsurvei_pertanyaan9` int(2) DEFAULT NULL,
  `tblhasilsurvei_pertanyaan10` int(2) DEFAULT NULL,
  `tblhasilsurvei_penilaian` enum('positif','negatif','abstrak') NOT NULL,
  `tblhasilsurvei_saran` text,
  `tblhasilsurvei_total` varchar(255) DEFAULT NULL,
  `tblhasilsurvei_syscreate` datetime NOT NULL,
  `tblhasilsurvei_sysupdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhasilsurvei`
--

INSERT INTO `tblhasilsurvei` (`tblhasilsurvei_id`, `refjenisizinikm_id`, `reftingkatpendidikan_id`, `refsex_id`, `tblhasilsurvei_usia`, `refloket_id`, `tblhasilsurvei_caradaftar`, `tblhasilsurvei_pengurusan`, `refjenisizinikm_nama`, `tblhasilsurvei_nama`, `tblhasilsurvei_nip`, `tblhasilsurvei_pertanyaan1`, `tblhasilsurvei_pertanyaan2`, `tblhasilsurvei_pertanyaan3`, `tblhasilsurvei_pertanyaan4`, `tblhasilsurvei_pertanyaan5`, `tblhasilsurvei_pertanyaan6`, `tblhasilsurvei_pertanyaan7`, `tblhasilsurvei_pertanyaan8`, `tblhasilsurvei_pertanyaan9`, `tblhasilsurvei_pertanyaan10`, `tblhasilsurvei_penilaian`, `tblhasilsurvei_saran`, `tblhasilsurvei_total`, `tblhasilsurvei_syscreate`, `tblhasilsurvei_sysupdate`) VALUES
(407, 68, 6, 2, 23, 1, '', '', '68', 'HASANAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:36:56', NULL),
(406, 68, 6, 2, 30, 1, '', '', '68', 'LENI MARLIYANA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:27:18', NULL),
(225, 42, 6, 1, 43, 1, '', '', '42', 'ARPIANO UDASCO', NULL, 4, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '.', '29', '2018-10-30 09:41:46', NULL),
(226, 56, 9, 2, 40, 1, '', '', '56', 'endah hastariningsih', NULL, 3, 4, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'pertahankan dan tingkatkan', '30', '2018-11-07 15:30:41', NULL),
(227, 56, 9, 2, 40, 1, '', '', '56', 'endah hastariningsih', NULL, 3, 4, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'pertahankan dan tingkatkan', '30', '2018-11-07 15:30:41', NULL),
(217, 2, 3, 1, 60, 1, '', '', '2', 'Heroes', NULL, 3, 4, 3, 4, 3, 4, 3, 3, 4, NULL, '', 'DATA SAMPLE!!', '31', '2018-10-12 06:55:03', NULL),
(228, 56, 9, 2, 40, 1, '', '', '56', 'endah hastariningsih', NULL, 3, 4, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'pertahankan dan tingkatkan', '30', '2018-11-07 15:30:41', NULL),
(220, 6, 1, 1, 36, 1, '', '', '6', 'kios. berkat rasidi', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2018-10-18 10:19:08', NULL),
(221, 6, 3, 1, 46, 1, '', '', '6', 'zaini', NULL, 4, 3, 3, 4, 4, 3, 3, 3, 3, NULL, '', 'bekerja lebih semangat', '30', '2018-10-22 08:56:28', NULL),
(229, 56, 9, 2, 40, 1, '', '', '56', 'endah hastariningsih', NULL, 3, 4, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'pertahankan dan tingkatkan', '30', '2018-11-07 15:30:42', NULL),
(230, 56, 9, 2, 40, 1, '', '', '56', 'endah hastariningsih', NULL, 3, 4, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'pertahankan dan tingkatkan', '30', '2018-11-07 15:30:42', NULL),
(231, 56, 9, 2, 40, 1, '', '', '56', 'endah hastariningsih', NULL, 3, 4, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'pertahankan dan tingkatkan', '30', '2018-11-07 15:30:42', NULL),
(232, 42, 4, 2, 42, 1, '', '', '42', 'CV.Nucleus', NULL, 4, 4, 3, 3, 3, 3, 4, 3, 4, NULL, '', 'Lebih ditingkatkan lagi pelayanan yg sudah baik ini. Trims', '31', '2019-01-16 11:13:09', NULL),
(233, 20, 3, 1, 21, 1, '', '', '20', 'andre hairunika', NULL, 3, 4, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-01-16 14:57:12', NULL),
(234, 71, 6, 2, 35, 1, '', '', '71', 'neneng sri maryati', NULL, 3, 3, 3, 3, 3, 3, 4, 3, 4, NULL, '', 'semoga kedepannya lebih baik untuk kemajuan pulang pisau', '29', '2019-02-06 14:33:24', NULL),
(235, 42, 3, 1, 41, 1, '', '', '42', 'ASIO H. UNIl', NULL, 3, 4, 4, 3, 4, 3, 4, 3, 4, NULL, '', 'Lanjutan dan Tingkatkan', '32', '2019-02-11 12:15:20', NULL),
(236, 66, 9, 2, 39, 1, '', '', '66', 'shihatin', NULL, 3, 4, 3, 4, 3, 3, 4, 4, 4, NULL, '', '-', '32', '2019-02-14 10:23:38', NULL),
(237, 20, 9, 1, 60, 1, '', '', '20', 'GUNAWAN WIJAYA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'Terus pertahankan pelayanan yang sangat baik ini.. Terima kasih..', '36', '2019-02-18 10:28:25', NULL),
(238, 20, 9, 2, 55, 1, '', '', '20', 'CHRISTANTI TINAWATI MARGONO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '.', '36', '2019-02-18 10:31:07', NULL),
(239, 66, 6, 2, 27, 1, '', '', '66', 'JULYANI WIDARI', NULL, 3, 4, 3, 4, 3, 3, 3, 3, 4, NULL, '', '.', '30', '2019-02-18 10:51:38', NULL),
(240, 67, 6, 2, 35, 1, '', '', '67', 'SUSANTI OCTAVIANA', NULL, 3, 3, 2, 4, 3, 3, 3, 3, 4, NULL, '', 'SEMOGA PELAYANAN LEBIH BAIK DAN CEPAT', '28', '2019-02-18 13:59:15', NULL),
(241, 67, 6, 2, 39, 1, '', '', '67', 'HALIMAH', NULL, 3, 3, 3, 4, 4, 3, 3, 3, 4, NULL, '', 'LEBIH CEPAT', '30', '2019-02-18 14:03:28', NULL),
(242, 60, 3, 2, 36, 1, '', '', '60', 'NANING ZULAIKHA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-05-06 14:39:49', NULL),
(243, 7, 3, 1, 45, 1, '', '', '7', 'xxx', NULL, 3, 3, 3, 4, 3, 3, 2, 3, 3, NULL, '', 'agar pelayanan lebih sopan dan ramah', '27', '2019-05-17 10:01:38', NULL),
(244, 66, 6, 2, 27, 1, '', '', '66', 'iin indah hardianti', NULL, 4, 4, 3, 4, 4, 4, 3, 3, 4, NULL, '', 'tidak ada masukan.', '33', '2019-05-21 15:18:39', NULL),
(245, 3, 2, 1, 1121212, 1, '', '', '3', 'ass', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '', 'assaas', '9', '2019-05-31 13:56:44', NULL),
(246, 3, 2, 1, 1121212, 1, '', '', '3', 'ass', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '', 'assaas', '9', '2019-05-31 13:56:49', NULL),
(247, 66, 20003, 2, 30, 1, '', '', '66', 'YUYUN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-06-10 11:19:29', NULL),
(248, 60, 6, 2, 25, 1, '', '', '60', 'ELSA R', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'bagus', '36', '2019-06-26 15:48:19', NULL),
(249, 56, 9, 1, 26, 1, '', '', '56', 'ahmad marzuki rifki', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'pertahankan', '36', '2019-07-01 08:53:27', NULL),
(250, 56, 9, 1, 26, 1, '', '', '56', 'ahmad marzuki rifki', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'pertahankan', '36', '2019-07-01 08:53:28', NULL),
(251, 56, 9, 1, 26, 1, '', '', '56', 'ahmad marzuki rifki', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'pertahankan', '36', '2019-07-01 08:53:28', NULL),
(252, 12, 3, 2, 22, 1, '', '', '12', 'DESI SULISTIAWATI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'Terimakasih atas pelayanan yang diberikan', '27', '2019-07-02 15:24:12', NULL),
(253, 6, 3, 1, 30, 1, '', '', '6', 'A', NULL, 3, 2, 3, 2, 2, 3, 2, 3, 2, NULL, '', 'qaee', '22', '2019-07-08 09:52:33', NULL),
(254, 6, 3, 1, 30, 1, '', '', '6', 'A', NULL, 3, 2, 3, 2, 2, 3, 2, 3, 2, NULL, '', 'qaee', '22', '2019-07-08 09:52:33', NULL),
(255, 6, 3, 1, 30, 1, '', '', '6', 'A', NULL, 3, 2, 3, 2, 2, 3, 2, 3, 2, NULL, '', 'qaee', '22', '2019-07-08 09:52:33', NULL),
(256, 68, 6, 2, 26, 1, '', '', '68', 'REFITA ERLINA', NULL, 3, 2, 2, 4, 3, 3, 3, 3, 3, NULL, '', 'pelayanan yang diberikan sudah cukup baik harap lebih ditingkatkan', '26', '2019-07-15 14:53:29', NULL),
(257, 68, 6, 2, 28, 1, '', '', '68', 'Febriyana', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'Pelayanan sudah cukup baik,tolong ditingkatkan lagi.terima kasih.', '29', '2019-07-15 14:56:31', NULL),
(258, 68, 6, 2, 26, 1, '', '', '68', 'Tikae Purnama Sari', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'pelayanan sudah cukup baik, tolong di tingkatkan lagi. terima kasih', '29', '2019-07-15 14:58:34', NULL),
(259, 68, 6, 2, 29, 1, '', '', '68', 'linda wati', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'pelayanannya sudah cukup baik. terima kasih.', '29', '2019-07-15 15:03:21', NULL),
(260, 67, 6, 2, 25, 1, '', '', '67', 'Amalia Dwi Andini', NULL, 4, 4, 4, 4, 4, 4, 3, 3, 4, NULL, '', '-', '34', '2019-07-25 14:51:04', NULL),
(261, 67, 6, 2, 24, 1, '', '', '67', 'Yusiana Feronica', NULL, 3, 3, 3, 4, 3, 4, 3, 3, 4, NULL, '', '-', '30', '2019-07-25 14:53:12', NULL),
(262, 68, 6, 2, 28, 1, '', '', '68', 'firda maya', NULL, 3, 3, 3, 4, 4, 4, 4, 4, 4, NULL, '', '--', '33', '2019-07-25 14:55:15', NULL),
(263, 68, 6, 2, 23, 1, '', '', '68', 'oktehelen', NULL, 4, 3, 3, 4, 3, 4, 4, 3, 4, NULL, '', '--', '32', '2019-07-25 14:57:53', NULL),
(264, 66, 6, 2, 24, 1, '', '', '66', 'UTARI NESIA SEPTIANI', NULL, 4, 4, 3, 4, 4, 4, 4, 4, 4, NULL, '', 'TERIMA KASIH ATAS PELAYANAN YANG DI BERIKAN', '35', '2019-07-25 15:27:14', NULL),
(265, 66, 6, 2, 26, 1, '', '', '66', 'SUHARTINI', NULL, 4, 3, 3, 4, 3, 3, 4, 4, 4, NULL, '', 'PELAYANAN SUDAH SANGAT BAIK, JELAS DAN TEPAT', '32', '2019-07-25 15:29:08', NULL),
(266, 68, 6, 2, 27, 1, '', '', '68', 'Rr. Nia Sawitri, A.Md.Keb', NULL, 3, 3, 2, 4, 3, 3, 3, 3, 3, NULL, '', 'sudah cukup baik', '27', '2019-08-08 08:43:50', NULL),
(267, 68, 6, 2, 26, 1, '', '', '68', 'Herlina Novitasari', NULL, 3, 3, 3, 4, 3, 3, 3, 2, 4, NULL, '', '--', '28', '2019-08-08 09:49:30', NULL),
(268, 56, 9, 1, 26, 1, '', '', '56', 'dr. MOHAMAD EVANDIAR IZWARDY', NULL, 4, 4, 4, 4, 3, 4, 4, 4, 4, NULL, '', 'Pelayanan terus ditingkatkan.', '35', '2019-08-21 14:35:53', NULL),
(269, 97, 8, 2, 43, 1, '', '', '97', 'anae', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2019-08-21 15:30:01', NULL),
(270, 20, 6, 1, 49, 1, '', '', '20', 'MAIL', NULL, 3, 3, 3, 2, 3, 3, 3, 2, 3, NULL, '', 'BAIK', '25', '2019-08-30 09:42:28', NULL),
(271, 42, 3, 1, 62, 1, '', '', '42', 'ABDUL HAMID', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-08-30 11:22:38', NULL),
(272, 66, 6, 2, 39, 1, '', '', '66', 'NITAWATI,A.Md.Kep', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'Semoga lebih baik lagi dlm memberikan pelayanan', '29', '2019-09-02 14:40:05', NULL),
(273, 63, 9, 2, 25, 1, '', '', '63', 'Duwi Efasari', NULL, 4, 4, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '31', '2019-09-02 15:26:48', NULL),
(274, 42, 1, 1, 50, 1, '', '', '42', 'URES', NULL, 3, 3, 3, 3, 3, 3, 2, 3, 3, NULL, '', 'Lebih Ditingkatkan Lagi', '26', '2019-09-05 10:41:18', NULL),
(275, 42, 3, 1, 26, 1, '', '', '42', 'MAHDIANOR', NULL, 3, 3, 3, 3, 1, 3, 3, 3, 3, NULL, '', '-', '25', '2019-09-09 08:56:45', NULL),
(276, 18, 3, 1, 26, 1, '', '', '18', 'MAHDIANOR', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-09 08:57:38', NULL),
(277, 42, 3, 1, 27, 1, '', '', '42', 'AKHMAD SALEH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-09 09:00:19', NULL),
(278, 6, 3, 1, 26, 1, '', '', '6', 'MAHDIANOR', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-09 09:01:35', NULL),
(279, 6, 3, 1, 27, 1, '', '', '6', 'AKHMAD SALEH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-09 09:02:39', NULL),
(280, 18, 3, 1, 27, 1, '', '', '18', 'AKHMAD SALEH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-09 09:03:29', NULL),
(281, 68, 6, 2, 23, 1, '', '', '68', 'CHRISTIN NATALINA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'TIDAK ADA', '27', '2019-09-09 09:51:24', NULL),
(282, 66, 6, 2, 24, 1, '', '', '66', 'NOVIANA ARIE HAWINI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'TIDAK ADA', '27', '2019-09-09 09:53:22', NULL),
(283, 64, 9, 2, 61, 1, '', '', '64', 'TINING Y. GUAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-09 11:19:14', NULL),
(284, 97, 9, 1, 52, 1, '', '', '97', 'AMBRI S.Pd', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-09-09 11:26:37', NULL),
(285, 20, 3, 1, 49, 1, '', '', '20', 'H. SALAPUDIN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-09 15:13:57', NULL),
(286, 20, 3, 1, 36, 1, '', '', '20', 'BOBY RAMLIE', NULL, 3, 3, 3, 2, 3, 3, 3, 3, 4, NULL, '', 'PERLU PERBAIKAN FORMULIR ISIAN IMB WALET DAN SINGKRONISASI DENGAN PIHAK KECAMATAN, DESA. SEBAIKNYA 1 FORMULIR DENGAN PIHAK DESA DAN KECAMATAN', '27', '2019-09-10 09:58:01', NULL),
(287, 20, 8, 1, 45, 1, '', '', '20', 'YANDRA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', 'Perlu ditingkatkan lagi', '28', '2019-09-10 11:57:46', NULL),
(288, 42, 3, 2, 31, 1, '', '', '42', 'ENUR NORJANAH', NULL, 3, 4, 3, 3, 3, 4, 4, 3, 4, NULL, '', 'Mudah mudahan kedepannya lebih baik lagi...', '31', '2019-09-10 14:32:14', NULL),
(289, 42, 3, 2, 31, 1, '', '', '42', 'ENUR NORJANAH', NULL, 3, 4, 3, 3, 3, 4, 4, 3, 4, NULL, '', 'Mudah mudahan kedepannya lebih baik lagi...', '31', '2019-09-10 14:32:14', NULL),
(290, 42, 3, 2, 31, 1, '', '', '42', 'ENUR NORJANAH', NULL, 3, 4, 3, 3, 3, 4, 4, 3, 4, NULL, '', 'Mudah mudahan kedepannya lebih baik lagi...', '31', '2019-09-10 14:32:14', NULL),
(291, 42, 3, 2, 31, 1, '', '', '42', 'ENUR NORJANAH', NULL, 3, 4, 3, 3, 3, 4, 4, 3, 4, NULL, '', 'Mudah mudahan kedepannya lebih baik lagi...', '31', '2019-09-10 14:32:14', NULL),
(292, 42, 3, 2, 31, 1, '', '', '42', 'ENUR NORJANAH', NULL, 3, 4, 3, 3, 3, 4, 4, 3, 4, NULL, '', 'Mudah mudahan kedepannya lebih baik lagi...', '31', '2019-09-10 14:32:14', NULL),
(293, 20, 9, 1, 41, 1, '', '', '20', 'TRISANTO N. ABEL, ST', NULL, 3, 3, 3, 2, 3, 3, 3, 3, 4, NULL, '', 'Baik dan lebih ditingkatkan lagi kecepatan proses pelayanan.', '27', '2019-09-10 14:41:57', NULL),
(294, 42, 3, 1, 40, 1, '', '', '42', 'devie siylvano', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-11 10:42:05', NULL),
(295, 6, 3, 1, 44, 1, '', '', '6', 'DEVIE SYLVANO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', 'Agar lebih ditingkatkan lagi', '28', '2019-09-11 13:55:06', NULL),
(296, 18, 3, 1, 44, 1, '', '', '18', 'DEVIE SYLVANO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'Terima Kasih Banyak!!', '29', '2019-09-11 13:56:08', NULL),
(297, 20, 8, 1, 35, 1, '', '', '20', 'MEYDI PORONG', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', 'Sudah baik, hanya perlu lebih ditingkatkan lagi', '28', '2019-09-11 13:58:45', NULL),
(298, 42, 8, 1, 24, 1, '', '', '42', 'TOMI ADE PUTRA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2019-09-11 14:07:03', NULL),
(299, 6, 8, 1, 24, 1, '', '', '6', 'TOMMI ADE PUTRA', NULL, 3, 3, 3, 4, 3, 3, 4, 4, 4, NULL, '', '-', '31', '2019-09-11 14:07:59', NULL),
(300, 18, 8, 1, 24, 1, '', '', '18', 'TOMMI ADE PUTRA', NULL, 3, 3, 3, 4, 3, 3, 4, 4, 4, NULL, '', '-', '31', '2019-09-11 14:09:11', NULL),
(301, 20, 3, 1, 47, 1, '', '', '20', 'ZONNUN ALMIKHRI', NULL, 3, 3, 3, 3, 4, 3, 4, 4, 3, NULL, '', 'Perlu lebih ditingkatkan lagi', '30', '2019-09-11 14:12:49', NULL),
(302, 66, 9, 1, 27, 1, '', '', '66', 'BUDI ARTO', NULL, 3, 3, 3, 4, 3, 3, 4, 3, 4, NULL, '', '-', '30', '2019-09-13 10:23:34', NULL),
(303, 20, 3, 1, 41, 1, '', '', '20', 'AHMAD LUKMAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'Terimaksih Atas Pelayan Yang saudar Berikan Kepada Kami', '27', '2019-09-17 10:54:30', NULL),
(304, 20, 9, 1, 49, 1, '', '', '20', 'PHANG KUI FA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'Terima Kasih Atas Pelayana Yang saudara Berikan Kepada kami,  Kami Sangat Puas', '27', '2019-09-17 10:57:06', NULL),
(305, 20, 3, 1, 47, 1, '', '', '20', 'SUYADI', NULL, 3, 3, 3, 2, 3, 3, 3, 2, 4, NULL, '', '-', '26', '2019-09-18 11:46:03', NULL),
(306, 20, 3, 1, 41, 1, '', '', '20', 'SUPRIYADI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-24 08:19:09', NULL),
(307, 42, 9, 1, 41, 1, '', '', '42', 'RYRYO PRIE ARIES, ST', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2019-09-24 08:20:31', NULL),
(308, 42, 3, 1, 40, 1, '', '', '42', 'MAARIF BUDI SANTOSO', NULL, 3, 3, 4, 3, 3, 3, 3, 4, 4, NULL, '', '-', '30', '2019-09-24 08:21:47', NULL),
(309, 42, 3, 2, 41, 1, '', '', '42', 'DEWI INDAH RAKHMAWATI', NULL, 3, 3, 3, 3, 3, 3, 4, 4, 4, NULL, '', '-', '30', '2019-09-24 08:23:54', NULL),
(310, 6, 3, 2, 41, 1, '', '', '6', 'DEWI INDAH RAKHMAWATI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-24 08:24:34', NULL),
(311, 18, 3, 2, 41, 1, '', '', '18', 'DEWI INDAH RAKHMAWATI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-24 08:25:20', NULL),
(312, 6, 3, 1, 40, 1, '', '', '6', 'MAARIF BUDI SANTOSO', NULL, 3, 3, 4, 3, 3, 3, 4, 4, 4, NULL, '', '-', '31', '2019-09-24 08:26:33', NULL),
(313, 18, 3, 1, 40, 1, '', '', '18', 'MAARIF BUDI SANTOSO', NULL, 3, 3, 4, 4, 3, 3, 4, 4, 4, NULL, '', '-', '32', '2019-09-24 08:27:37', NULL),
(314, 42, 3, 1, 50, 1, '', '', '42', 'UGOE WINARGO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2019-09-24 10:41:16', NULL),
(315, 6, 3, 1, 50, 1, '', '', '6', 'UGOE WINARGO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-09-24 10:42:23', NULL),
(316, 18, 3, 1, 50, 1, '', '', '18', 'UGOE WINARGO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-09-24 10:43:18', NULL),
(317, 66, 6, 2, 26, 1, '', '', '66', 'RUSMIATY', NULL, 3, 4, 3, 4, 3, 3, 4, 3, 2, NULL, '', '-', '29', '2019-09-25 10:53:22', NULL),
(318, 42, 9, 1, 34, 1, '', '', '42', 'INDRA NATHA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-25 14:04:28', NULL),
(319, 42, 3, 1, 40, 1, '', '', '42', 'jok kayan sahay', NULL, 2, 2, 2, 2, 2, 3, 2, 2, 2, NULL, '', '-', '27', '2019-09-26 14:01:49', NULL),
(320, 42, 3, 1, 52, 1, '', '', '42', 'ABDULLAH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 3, NULL, '', '-', '34', '2019-09-30 14:52:30', NULL),
(321, 20, 9, 1, 55, 1, '', '', '20', 'Drs. IBUNG B. GANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-09-30 14:56:48', NULL),
(322, 42, 9, 1, 44, 1, '', '', '42', 'ARPISNO UDASCO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2019-09-30 14:58:08', NULL),
(323, 20, 3, 1, 57, 1, '', '', '20', 'MUIS', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-30 14:59:15', NULL),
(324, 20, 3, 1, 59, 1, '', '', '20', 'PRIYADI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2019-09-30 15:01:27', NULL),
(325, 42, 3, 2, 44, 1, '', '', '42', 'HERLINA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-09-30 15:21:46', NULL),
(326, 18, 6, 2, 44, 1, '', '', '18', 'HERLINA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-09-30 15:26:46', NULL),
(327, 6, 6, 2, 44, 1, '', '', '6', 'HERLINA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-09-30 15:28:32', NULL),
(328, 78, 6, 2, 44, 1, '', '', '78', 'HERLINA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-09-30 15:30:00', NULL),
(329, 56, 10, 1, 36, 1, '', '', '56', 'Teuku Syahrul Rizanur', NULL, 3, 3, 3, 4, 4, 4, 4, 4, 4, NULL, '', 'Mudah mudahan kedepan surat izin praktik dokter dapat diurus melalui pelayanan online.', '33', '2019-09-30 15:51:59', NULL),
(330, 68, 6, 2, 22, 1, '', '', '68', 'rariuni delitaku', NULL, 3, 3, 3, 4, 3, 3, 4, 3, 4, NULL, '', '-', '30', '2019-10-01 14:43:45', NULL),
(331, 56, 10, 1, 38, 1, '', '', '56', 'ade ariantara arsyaf', NULL, 3, 4, 4, 4, 4, 3, 3, 3, 4, NULL, '', 'baik', '32', '2019-10-09 10:41:10', NULL),
(332, 58, 9, 2, 23, 1, '', '', '58', 'drg. SHEILA FILLIA SURITIONO', NULL, 4, 4, 4, 4, 3, 3, 4, 3, 4, NULL, '', '-', '33', '2019-10-09 11:23:29', NULL),
(333, 57, 9, 1, 50, 1, '', '', '57', 'dr. RINTHO ALEXANDER TANGKUDUNG, Sp.B', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 4, NULL, '', '-', '32', '2019-10-09 11:25:11', NULL),
(334, 57, 9, 2, 45, 1, '', '', '57', 'dr. SANTI FARADILLA, Sp.A', NULL, 3, 3, 4, 4, 4, 3, 4, 3, 4, NULL, '', '-', '32', '2019-10-09 11:26:26', NULL),
(335, 78, 9, 2, 54, 1, '', '', '78', 'kamala', NULL, 3, 3, 3, 2, 3, 3, 3, 3, 3, NULL, '', '-', '26', '2019-10-10 08:48:29', NULL),
(336, 42, 3, 2, 46, 1, '', '', '42', 'HARTUTI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-10-10 10:54:50', NULL),
(337, 42, 3, 1, 31, 1, '', '', '42', 'MARJULIANSYAH', NULL, 3, 3, 4, 3, 3, 3, 3, 4, 4, NULL, '', '-', '30', '2019-10-10 10:58:55', NULL),
(338, 42, 6, 2, 53, 1, '', '', '42', 'KAMALA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2019-10-10 11:05:11', NULL),
(339, 18, 6, 2, 53, 1, '', '', '18', 'KAMALA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-10-10 11:05:52', NULL),
(340, 6, 6, 2, 53, 1, '', '', '6', 'KAMALA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-10-10 11:06:31', NULL),
(341, 78, 6, 2, 53, 1, '', '', '78', 'KAMALA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-10-10 11:07:29', NULL),
(342, 20, 3, 1, 41, 1, '', '', '20', 'ARMANSYAH PUTRA', NULL, 3, 3, 3, 3, 3, 4, 4, 4, 4, NULL, '', '-', '31', '2019-10-10 11:23:09', NULL),
(343, 42, 3, 1, 52, 1, '', '', '42', 'ABDULLAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2019-10-10 11:26:29', NULL),
(344, 42, 3, 2, 27, 1, '', '', '42', 'NURITA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2019-10-10 11:27:46', NULL),
(345, 18, 3, 2, 27, 1, '', '', '18', 'NURITA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-10-10 11:28:33', NULL),
(346, 6, 3, 2, 27, 1, '', '', '6', 'NURITA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-10-10 11:29:18', NULL),
(347, 42, 3, 2, 34, 1, '', '', '42', 'MARGARETHA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2019-10-10 11:30:21', NULL),
(348, 18, 3, 2, 34, 1, '', '', '18', 'MARGARETHA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-10-10 11:31:08', NULL),
(349, 6, 3, 2, 34, 1, '', '', '6', 'MARGARETHA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-10-10 11:34:35', NULL),
(350, 42, 3, 1, 19, 1, '', '', '42', 'ASYER LELO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2019-10-10 11:35:27', NULL),
(351, 18, 3, 1, 19, 1, '', '', '18', 'ASYER LELO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2019-10-10 11:36:02', NULL),
(352, 6, 3, 1, 19, 1, '', '', '6', 'ASYER LELO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2019-10-10 11:36:57', NULL),
(353, 42, 9, 1, 46, 1, '', '', '42', 'MIGUHARTAKU', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2019-10-10 11:38:51', NULL),
(354, 21, 9, 1, 46, 1, '', '', '21', 'MIGUHARTAKU', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2019-10-10 11:39:27', NULL),
(355, 6, 9, 1, 46, 1, '', '', '6', 'MIGUHARTAKU', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2019-10-10 11:40:04', NULL),
(356, 18, 9, 1, 46, 1, '', '', '18', 'MIGUHARTAKU', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2019-10-10 11:40:46', NULL),
(357, 20, 10, 1, 54, 1, '', '', '20', 'Drs. HERTO., M.Si', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2019-10-10 11:45:44', NULL),
(358, 42, 3, 1, 33, 1, '', '', '42', 'NEGU', NULL, 3, 3, 3, 3, 3, 3, 4, 4, 4, NULL, '', '-', '30', '2019-10-10 11:46:46', NULL),
(359, 18, 3, 1, 33, 1, '', '', '18', 'NEGU', NULL, 3, 3, 3, 4, 4, 4, 4, 4, 4, NULL, '', '-', '33', '2019-10-10 11:47:45', NULL),
(367, 68, 6, 2, 26, 1, '', '', '68', 'AGUS SULISTIANI', NULL, 3, 3, 3, 4, 3, 3, 4, 4, 3, NULL, '', '-', '30', '2019-10-10 12:00:50', NULL),
(361, 6, 3, 1, 33, 1, '', '', '6', 'NEGU', NULL, 3, 3, 3, 4, 4, 4, 4, 4, 4, NULL, '', '-', '33', '2019-10-10 11:48:42', NULL),
(362, 42, 3, 1, 48, 1, '', '', '42', 'HENDRA GUNAWAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-10-10 11:49:34', NULL),
(363, 21, 3, 1, 48, 1, '', '', '21', 'HENDRA GUNAWAN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-10-10 11:50:26', NULL),
(366, 6, 3, 1, 48, 1, '', '', '6', 'HEDRA GUNAWAN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-10-10 11:53:59', NULL),
(365, 18, 3, 1, 48, 1, '', '', '18', 'HENDRA GUNAWAN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2019-10-10 11:51:31', NULL),
(368, 68, 5, 2, 23, 1, '', '', '68', 'MAYA APRIYANTI', NULL, 3, 3, 3, 4, 4, 3, 3, 3, 3, NULL, '', '-', '29', '2019-10-10 13:52:09', NULL),
(369, 68, 6, 2, 27, 1, '', '', '68', 'SRIWIN PUJIATI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 13:55:21', NULL),
(370, 68, 6, 2, 26, 1, '', '', '68', 'ELLY NORHAYATI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 13:57:21', NULL),
(371, 68, 6, 2, 44, 1, '', '', '68', 'SUHARTINI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 13:59:45', NULL),
(372, 68, 6, 2, 42, 1, '', '', '68', 'RIDA SUSANTI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:00:54', NULL),
(373, 68, 6, 2, 26, 1, '', '', '68', 'DINAR PRATIWI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:05:04', NULL),
(374, 68, 6, 2, 44, 1, '', '', '68', 'TRIANA SETIA HANDAYANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:07:23', NULL),
(375, 68, 6, 2, 27, 1, '', '', '68', 'HAMDANAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:08:36', NULL),
(376, 68, 6, 2, 28, 1, '', '', '68', 'SITA GESTIANA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:10:02', NULL),
(377, 68, 6, 2, 29, 1, '', '', '68', 'NURHARDIYANTI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:11:14', NULL),
(378, 68, 6, 2, 36, 1, '', '', '68', 'YULIANTI SETIANINGSIH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:13:32', NULL),
(379, 68, 6, 2, 45, 1, '', '', '68', 'SUWARNI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:14:50', NULL),
(380, 68, 6, 2, 40, 1, '', '', '68', 'ASTUTI PURWANINGSIH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:17:21', NULL),
(381, 68, 6, 2, 27, 1, '', '', '68', 'NIA SAWITRI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:18:45', NULL),
(382, 68, 6, 2, 27, 1, '', '', '68', 'ROSALINA DITA PRATAMI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:20:31', NULL),
(383, 68, 6, 2, 30, 1, '', '', '68', 'NUR HALIMAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:21:52', NULL),
(384, 68, 6, 2, 51, 1, '', '', '68', 'HESTY .D. TUERAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 14:23:40', NULL),
(385, 68, 6, 2, 23, 1, '', '', '68', 'eka setianingsih', NULL, 4, 3, 4, 4, 3, 4, 3, 3, 4, NULL, '', '-', '32', '2019-10-10 16:03:42', NULL),
(386, 68, 6, 2, 43, 1, '', '', '68', 'ALSENI MARTHY', NULL, 4, 3, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2019-10-10 16:07:00', NULL),
(387, 68, 6, 2, 45, 1, '', '', '68', 'UMI KALSUM', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:07:54', NULL),
(388, 68, 6, 2, 25, 1, '', '', '68', 'LILIS ANDRIANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:08:54', NULL),
(389, 68, 6, 2, 26, 1, '', '', '68', 'ASTINA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:10:03', NULL),
(390, 68, 6, 2, 40, 1, '', '', '68', 'PERAWATY', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:12:03', NULL),
(391, 68, 6, 2, 25, 1, '', '', '68', 'SISKA APRILIAYANTI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:12:53', NULL),
(392, 68, 6, 2, 22, 1, '', '', '68', 'NUR EKA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:13:37', NULL),
(393, 68, 6, 2, 23, 1, '', '', '68', 'HILALLIA MA\'RIFAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:14:34', NULL),
(394, 68, 6, 2, 27, 1, '', '', '68', 'SITI NURJANNAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:15:38', NULL),
(395, 68, 6, 2, 28, 1, '', '', '68', 'NIELY SA\'ADAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:16:41', NULL),
(396, 68, 6, 2, 43, 1, '', '', '68', 'SANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:18:03', NULL),
(397, 68, 6, 2, 43, 1, '', '', '68', 'YUSSI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:19:22', NULL),
(398, 68, 6, 2, 25, 1, '', '', '68', 'WAHYU NUGRAHENI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:20:14', NULL),
(399, 68, 6, 2, 25, 1, '', '', '68', 'WAHYU NUGRAHENI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:20:28', NULL),
(400, 68, 6, 2, 31, 1, '', '', '68', 'PEBRINAE', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:21:33', NULL),
(401, 68, 6, 2, 47, 1, '', '', '68', 'NELSIANA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:22:31', NULL),
(402, 68, 6, 2, 47, 1, '', '', '68', 'SAENAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:23:21', NULL),
(403, 68, 6, 2, 45, 1, '', '', '68', 'SITI ROKHIMAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:24:32', NULL),
(404, 68, 6, 2, 39, 1, '', '', '68', 'SITI YURIYAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:25:22', NULL),
(405, 68, 6, 2, 43, 1, '', '', '68', 'MEGAWATI NABABAN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-10 16:26:15', NULL),
(408, 68, 6, 2, 23, 1, '', '', '68', 'NI KETUT SANTIA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:42:15', NULL),
(409, 68, 6, 2, 28, 1, '', '', '68', 'NYARMINATI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:43:21', NULL),
(410, 68, 6, 2, 35, 1, '', '', '68', 'NURUL HELMILA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:44:23', NULL),
(411, 68, 6, 2, 47, 1, '', '', '68', 'HESTIANA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:45:27', NULL),
(412, 68, 6, 2, 30, 1, '', '', '68', 'YEMIMA EKA WATI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:47:07', NULL),
(413, 68, 6, 2, 27, 1, '', '', '68', 'NUR ASIH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:48:08', NULL),
(414, 68, 6, 2, 31, 1, '', '', '68', 'ELSA CRISTINA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:49:36', NULL),
(415, 68, 6, 2, 29, 1, '', '', '68', 'JERIANA DEWI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:51:21', NULL),
(416, 68, 5, 2, 31, 1, '', '', '68', 'MARSITA AMALASANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:52:28', NULL),
(417, 68, 6, 2, 29, 1, '', '', '68', 'NOR AINA SYA FA\'AH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:53:38', NULL),
(418, 68, 6, 2, 28, 1, '', '', '68', 'ARI HANDAYANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:54:34', NULL),
(419, 68, 6, 2, 27, 1, '', '', '68', 'NORMAWATI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:55:33', NULL),
(420, 68, 6, 2, 30, 1, '', '', '68', 'DESSY ARIANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:56:46', NULL),
(421, 68, 6, 2, 27, 1, '', '', '68', 'IMELDA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:57:49', NULL),
(422, 68, 6, 2, 29, 1, '', '', '68', 'SUKANTI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:58:45', NULL),
(423, 68, 6, 2, 40, 1, '', '', '68', 'LINDA SYAFIYANTI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-11 09:59:49', NULL),
(424, 6, 9, 2, 27, 1, '', '', '6', 'rina', NULL, 4, 3, 4, 3, 3, 3, 3, 3, 4, NULL, '', 'sangat bagus pelayanannya, tingkatkan..', '30', '2019-10-21 15:46:55', NULL),
(425, 97, 9, 2, 45, 1, '', '', '97', 'nyelong', NULL, 3, 4, 3, 4, 4, 3, 4, 4, 4, NULL, '', '-', '33', '2019-10-31 10:57:07', NULL),
(426, 97, 9, 2, 47, 1, '', '', '97', 'tk bina bakti', NULL, 3, 3, 3, 4, 3, 4, 3, 3, 3, NULL, '', '-', '29', '2019-10-31 11:00:38', NULL),
(427, 97, 9, 2, 45, 1, '', '', '97', 'swarni', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-10-31 11:02:10', NULL),
(428, 97, 9, 2, 39, 1, '', '', '97', 'juniarsih', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2019-10-31 11:04:38', NULL),
(429, 97, 9, 2, 37, 1, '', '', '97', 'nani k', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2019-10-31 11:06:05', NULL),
(430, 97, 9, 2, 37, 1, '', '', '97', 'yenie', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2019-10-31 11:09:27', NULL),
(431, 97, 9, 2, 30, 1, '', '', '97', 'endang f', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2019-10-31 11:11:21', NULL),
(432, 97, 9, 2, 42, 1, '', '', '97', 'lilianani', NULL, 3, 3, 4, 4, 3, 4, 3, 3, 4, NULL, '', '-', '31', '2019-10-31 11:12:41', NULL),
(433, 93, 6, 2, 27, 1, '', '', '93', 'meiliana', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih...', '27', '2019-10-31 11:16:40', NULL),
(434, 56, 9, 2, 39, 1, '', '', '56', 'seniriaty', NULL, 3, 3, 4, 4, 3, 3, 3, 3, 4, NULL, '', 'pelayanan baik', '30', '2019-10-31 11:33:33', NULL),
(435, 57, 10, 1, 43, 1, '', '', '57', 'fadlian noor', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', 'sip...', '28', '2019-10-31 11:35:30', NULL),
(436, 56, 9, 1, 27, 1, '', '', '56', 'jepisko tabengan asi lautt', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', 'pelayanan baik', '28', '2019-10-31 11:38:19', NULL),
(437, 64, 6, 2, 27, 1, '', '', '64', 'ayu mawarni', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', 'pelayanan baik', '28', '2019-10-31 11:40:50', NULL),
(438, 68, 5, 2, 43, 1, '', '', '68', 'tara', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:17:01', NULL),
(439, 68, 6, 2, 44, 1, '', '', '68', 'ciliwati', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:17:56', NULL),
(440, 68, 6, 2, 42, 1, '', '', '68', 'sumiatie', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:19:04', NULL),
(441, 68, 6, 2, 30, 1, '', '', '68', 'meryatica sativa', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:20:24', NULL),
(442, 68, 6, 2, 27, 1, '', '', '68', 'rose lia', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:21:27', NULL),
(443, 68, 6, 2, 50, 1, '', '', '68', 'ester ratna sari', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:23:32', NULL),
(444, 68, 6, 2, 27, 1, '', '', '68', 'meiliana', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:24:26', NULL),
(445, 68, 6, 2, 40, 1, '', '', '68', 'lilis hastari', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:26:56', NULL),
(446, 68, 6, 2, 30, 1, '', '', '68', 'pippia lota carunia', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:29:09', NULL),
(447, 68, 6, 2, 30, 1, '', '', '68', 'riska nataliana', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:32:01', NULL),
(448, 68, 6, 2, 26, 1, '', '', '68', 'atrynyaye', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:33:23', NULL),
(449, 68, 6, 2, 47, 1, '', '', '68', 'laksmi sari dewi', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:34:32', NULL),
(450, 68, 6, 2, 42, 1, '', '', '68', 'wenie', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:35:41', NULL),
(451, 68, 6, 2, 27, 1, '', '', '68', 'choiriatu u', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:36:58', NULL),
(452, 68, 6, 2, 43, 1, '', '', '68', 'nanie', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:38:27', NULL),
(453, 68, 6, 2, 30, 1, '', '', '68', 'imas sulastri', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'terima kasih', '27', '2019-10-31 12:39:22', NULL),
(454, 20, 9, 1, 24, 1, '', '', '20', 'muhammad hasan', NULL, 3, 3, 3, 2, 3, 3, 3, 3, 3, NULL, '', '-', '26', '2019-11-01 09:21:07', NULL),
(455, 42, 3, 1, 34, 1, '', '', '42', 'UDIN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-11-01 10:56:55', NULL),
(456, 66, 6, 2, 24, 1, '', '', '66', 'nidya putri', NULL, 3, 2, 2, 4, 3, 3, 3, 3, 4, NULL, '', 'waktu pembuatan sip lebih dipercepat lagi prosesnya', '27', '2019-11-04 09:07:18', NULL),
(457, 42, 9, 1, 41, 1, '', '', '42', 'suryadiniaga', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2019-11-04 09:37:20', NULL),
(458, 42, 9, 2, 24, 1, '', '', '42', 'dewi kinaty', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', 'Pelayanannya sudah sangan  baik , semoga salulu bisa ditingkatkan.', '34', '2019-11-05 10:57:09', NULL),
(459, 66, 6, 2, 30, 1, '', '', '66', 'fenny septiana sindi', NULL, 3, 3, 3, 4, 3, 3, 3, 2, 4, NULL, '', 'tingkatkan pelayanan', '28', '2019-11-13 15:16:30', NULL),
(460, 66, 6, 2, 30, 1, '', '', '66', 'fenny septiana sindi', NULL, 3, 3, 3, 4, 3, 3, 3, 2, 4, NULL, '', 'tingkatkan pelayanan', '28', '2019-11-13 15:16:31', NULL),
(461, 68, 6, 2, 21, 1, '', '', '68', 'nor aida afriliyanti', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-11-13 15:22:30', NULL),
(462, 68, 6, 2, 26, 1, '', '', '68', 'meilinda kristiawati', NULL, 4, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '30', '2019-11-14 09:58:12', NULL),
(463, 66, 6, 1, 39, 1, '', '', '66', 'alfianur', NULL, 3, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'tingkatkan pelayanan', '35', '2019-11-18 11:54:19', NULL),
(464, 66, 6, 2, 31, 1, '', '', '66', 'tunraika Fatmadiyanti', NULL, 3, 4, 4, 4, 4, 3, 4, 4, 4, NULL, '', '--', '34', '2019-11-18 11:56:23', NULL),
(465, 66, 6, 2, 22, 1, '', '', '66', 'Yunisa Handayanti', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'pelayanan memuaskan.', '36', '2019-11-18 11:58:17', NULL),
(466, 66, 3, 1, 54, 1, '', '', '66', 'Tarmiji', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'puas', '36', '2019-11-18 11:59:55', NULL),
(467, 66, 6, 2, 47, 1, '', '', '66', 'salasiah', NULL, 3, 3, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'memuaskan', '34', '2019-11-18 12:01:24', NULL),
(468, 66, 6, 2, 39, 1, '', '', '66', 'Sri Hariati', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'pelayanan memuaskan', '36', '2019-11-18 12:03:31', NULL),
(469, 66, 6, 2, 28, 1, '', '', '66', 'Ika Rahmi', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'Puas', '36', '2019-11-18 12:06:33', NULL),
(470, 56, 9, 1, 28, 1, '', '', '56', 'RANA KATINA FIOLA', NULL, 3, 3, 3, 4, 3, 3, 3, 4, 4, NULL, '', '-', '30', '2019-11-20 09:10:40', NULL),
(471, 20, 5, 2, 59, 1, '', '', '20', 'BUSUN LUBIN PANTUNG', NULL, 3, 3, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-11-20 10:27:29', NULL),
(472, 42, 9, 2, 53, 1, '', '', '42', 'KAMALA', NULL, 3, 3, 4, 3, 3, 3, 4, 3, 4, NULL, '', '-', '30', '2019-11-21 10:13:53', NULL),
(474, 66, 6, 2, 32, 1, '', '', '66', 'CITTA AYUNDA HERIYANTI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-12-16 14:39:33', NULL),
(475, 56, 9, 1, 30, 1, '', '', '56', 'andrie yogie putra', NULL, 4, 4, 3, 4, 4, 4, 4, 4, 4, NULL, '', 'terima kasih sudah dilayani dengan baik', '35', '2019-12-30 09:50:50', NULL),
(476, 56, 9, 2, 28, 1, '', '', '56', 'Rini Wulandari', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'pertahankan pelayanan yang sudah baik', '36', '2019-12-30 10:16:04', NULL),
(477, 56, 9, 1, 30, 1, '', '', '56', 'BILLY ANDERSON SINAGA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2019-12-30 11:34:29', NULL),
(478, 67, 6, 2, 25, 1, '', '', '67', 'cinthya kristin', NULL, 3, 3, 3, 4, 4, 3, 3, 4, 4, NULL, '', '-', '31', '2020-01-13 10:44:24', NULL),
(479, 42, 9, 1, 41, 1, '', '', '42', 'siswandi', NULL, 3, 4, 4, 3, 4, 3, 3, 4, 4, NULL, '', 'terima kasih', '32', '2020-01-14 12:01:31', NULL),
(480, 42, 3, 1, 46, 1, '', '', '42', 'guak', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'terima kasih', '35', '2020-01-14 12:02:29', NULL),
(481, 66, 6, 2, 25, 1, '', '', '66', 'wuri handayani ulandari', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-01-20 09:27:17', NULL),
(482, 68, 6, 2, 23, 1, '', '', '68', 'NOVITA SARI', NULL, 3, 3, 3, 4, 3, 3, 3, 2, 3, NULL, '', '-', '27', '2020-01-20 09:31:42', NULL),
(483, 66, 6, 2, 23, 1, '', '', '66', 'ERVINA OKTA KRISTINA', NULL, 3, 3, 3, 4, 3, 3, 4, 3, 4, NULL, '', '-', '30', '2020-01-20 09:40:45', NULL),
(484, 42, 6, 2, 35, 1, '', '', '42', 'GUSVINE MILANDANG, A. Md. Keb', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'Pengelolaan Sarana Pengaduan Ditingkatkan Lagi', '27', '2020-01-21 14:51:54', NULL),
(485, 6, 6, 2, 35, 1, '', '', '6', 'GUSVINE MILANDANG, A. Md. Keb', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-01-21 14:53:13', NULL),
(486, 78, 6, 2, 35, 1, '', '', '78', 'GUSVINE MILANDANG, A. Md. Keb', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-01-21 14:54:32', NULL),
(487, 18, 6, 2, 35, 1, '', '', '18', 'GUSVINE MILANDANG, A. Md. Keb', NULL, 2, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-01-21 14:55:32', NULL),
(488, 122, 3, 2, 28, 1, '', '', '122', 'RINA, S. Pd', NULL, 2, 2, 2, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-01-21 15:03:59', NULL),
(489, 42, 3, 2, 28, 1, '', '', '42', 'RINA, S. Pd', NULL, 2, 2, 2, 2, 2, 2, 2, 2, 1, NULL, '', '-', '29', '2020-01-21 15:05:13', NULL),
(490, 18, 3, 2, 28, 1, '', '', '18', 'RINA, S. Pd', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-01-21 15:12:31', NULL),
(491, 42, 6, 2, 42, 1, '', '', '42', 'YONYTA KARTIKA SARI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-01-21 15:14:43', NULL),
(492, 42, 3, 2, 39, 1, '', '', '42', 'noorlina hayati', NULL, 3, 4, 4, 3, 3, 3, 3, 4, 4, NULL, '', 'pelayananya baik', '31', '2020-01-27 14:14:16', NULL),
(493, 18, 3, 2, 39, 1, '', '', '18', 'noorlina hayati', NULL, 3, 4, 3, 3, 4, 3, 3, 3, 4, NULL, '', 'teruskan', '30', '2020-01-27 14:16:42', NULL),
(494, 122, 3, 2, 39, 1, '', '', '122', 'noorlina hayati', NULL, 3, 3, 4, 3, 3, 3, 4, 4, 4, NULL, '', 'teruskan', '31', '2020-01-27 14:18:39', NULL),
(495, 67, 6, 2, 31, 1, '', '', '67', 'Sriyantie, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 3, 3, 3, 4, NULL, '', '.', '33', '2020-01-29 12:28:12', NULL),
(496, 67, 6, 2, 30, 1, '', '', '67', 'Ria Ramadhawati A.Md, Keb', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 4, NULL, '', '.', '32', '2020-01-29 12:32:13', NULL),
(497, 67, 6, 2, 29, 1, '', '', '67', 'Misyati,AMd.Keb', NULL, 3, 3, 4, 4, 3, 3, 4, 3, 4, NULL, '', '.', '31', '2020-01-29 12:34:50', NULL),
(498, 68, 6, 2, 27, 1, '', '', '68', 'Ria Uli', NULL, 3, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-----', '30', '2020-01-30 10:06:17', NULL),
(499, 66, 6, 2, 30, 1, '', '', '66', 'FENNY SEPTIANA SINDI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'Pertahankan dan tingkatkan pelayanan', '29', '2020-01-31 09:55:24', NULL),
(500, 66, 6, 1, 26, 1, '', '', '66', 'suryadi', NULL, 3, 3, 3, 4, 3, 4, 4, 3, 4, NULL, '', '-', '31', '2020-02-11 10:05:28', NULL),
(501, 66, 6, 2, 23, 1, '', '', '66', 'Ainun jariah', NULL, 3, 3, 2, 4, 3, 2, 3, 3, 4, NULL, '', '.', '27', '2020-02-12 10:43:21', NULL),
(502, 97, 9, 2, 34, 1, '', '', '97', 'ARINIE ARIFATI', NULL, 4, 4, 4, 4, 3, 4, 4, 3, 4, NULL, '', '-', '34', '2020-02-24 11:25:14', NULL),
(503, 97, 9, 2, 34, 1, '', '', '97', 'ARINIE ARIFATI', NULL, 4, 4, 4, 4, 3, 4, 4, 3, 4, NULL, '', '-', '34', '2020-02-24 11:25:15', NULL),
(504, 97, 9, 2, 37, 1, '', '', '97', 'NURHASANAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2020-02-24 11:29:36', NULL),
(505, 56, 9, 2, 25, 1, '', '', '56', 'vinka meliari', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2020-03-04 10:22:55', NULL),
(506, 66, 6, 2, 34, 1, '', '', '66', 'MARLINDE, A. Md.Kep', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-03-11 10:59:19', NULL),
(507, 66, 9, 1, 29, 1, '', '', '66', 'engggo', NULL, 4, 4, 3, 4, 3, 4, 3, 3, 4, NULL, '', 'lanjutkan...', '32', '2020-03-12 14:42:18', NULL),
(508, 66, 6, 1, 26, 1, '', '', '66', 'kurnia', NULL, 4, 4, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'gg', '31', '2020-03-12 14:43:50', NULL),
(509, 66, 9, 2, 28, 1, '', '', '66', 'gentiara surya prativi', NULL, 4, 4, 4, 4, 3, 4, 4, 4, 4, NULL, '', 'terimakasih atas pelayanan yang diberikan. semoga makin ditingkatkan', '35', '2020-03-13 09:58:30', NULL),
(510, 66, 8, 2, 29, 1, '', '', '66', 'Desiana octavia', NULL, 4, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '1. saran saya untuk petugas memberikan informasi sejelas mungkin sehingga dalam pengurusan tidak bolak-balik untuk melengkapi persyaratan yang ada\r\n2. untuk petugas yang mengetik mohon teliti lagi dalam melohat gekar dan tulisan ketikan agar tidak kurang atau salah mengetik', '29', '2020-03-18 14:09:00', NULL),
(511, 66, 8, 2, 37, 1, '', '', '66', 'hesti wedhany umara', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '1. sarannya untuk petugas yang mengetiknya dapat lagi teliti dalam ketikan agar ridak salah dalam mengetik gelar atau kata-kata', '27', '2020-03-18 14:12:24', NULL),
(512, 66, 9, 2, 42, 1, '', '', '66', 'soryatie', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '1. untuk petugas untuk memberikan informasi terkait apa yang menjadu kurang dalam persyaratan pengurusan SIIPagaar yang mengurus tidak bolak balik dalam mengantar laporan', '27', '2020-03-18 14:14:45', NULL),
(513, 66, 9, 2, 28, 1, '', '', '66', 'prisila bernadethe bano', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '1. petugas untuk mengecek data sesuai ketengan ijazah dan persyaratan yang sudah di lengkapi sehingga sesuai dan tidak salah', '27', '2020-03-18 14:17:53', NULL),
(514, 66, 8, 1, 31, 1, '', '', '66', 'hendra eka putra', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '1. petugas memberikan informasi ketika pembuatan surat siip tersebut. karena pengalaman sudah memeberikan no hp tapi tidak di hubungi', '27', '2020-03-18 14:20:19', NULL),
(515, 66, 8, 2, 29, 1, '', '', '66', 'evi kusmiranti', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '1. Petugas lebih teliti dalam mengetik gelas dan kata-kata, pengaman ada yang salah dalam menulis provinsi. di tulis proinsi', '27', '2020-03-18 14:22:17', NULL),
(516, 66, 9, 2, 26, 1, '', '', '66', 'piopi novika', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '1. petugas untuk harus beri informasi ketika sedah selesai. agar yang bersangkutan boleh bisa mengambilnya', '27', '2020-03-18 14:25:00', NULL),
(517, 66, 8, 2, 58, 1, '', '', '66', 'sutarti', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '1. untuk petugas agar bisa mengecek ulang tulisan ketikan agar tidak terjadi kesalah penulisan gelar', '27', '2020-03-18 14:26:59', NULL),
(518, 66, 8, 2, 31, 1, '', '', '66', 'nofiani harnawati', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'petugas untuk memberikan informasi kesesuaian data agar yang mengurus tau apa yang menjadi kekurangan dalam persyaratan agar bisa segera di lengkapi', '27', '2020-03-18 14:29:13', NULL),
(519, 66, 8, 1, 55, 1, '', '', '66', 'tasimun', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'sarannya untuk petugas dalam mengetik untuk mengecek kembali agar data atau penulisan gelar dan nama sesuai ijazah.', '27', '2020-03-18 14:32:11', NULL),
(520, 66, 8, 1, 27, 1, '', '', '66', 'angga diatama imanuel', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', 'petugas untuk mengecek kembali tulisan ketikannya agar dalam penulisan gelar, nama atau lainnta tidak salah.', '28', '2020-03-18 14:34:25', NULL),
(521, 66, 8, 2, 30, 1, '', '', '66', 'SULISTYA NINGSIH A,Md. Kep', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '1. saran untuk petugas yang mengetik atau membuat SIPP untuk  isa mengecek lagi atau memeperhatikan dalam kata atau kalimay yang diketik agar tidak terjadi kesalah dalam penulisan nama atau gelar', '27', '2020-03-23 11:16:07', NULL),
(522, 66, 9, 1, 29, 1, '', '', '66', 'enggo', NULL, 3, 4, 3, 4, 3, 4, 3, 3, 3, NULL, '', 'lanjutkan..', '30', '2020-03-24 14:26:26', NULL),
(523, 66, 6, 2, 34, 1, '', '', '66', 'kusmiati', NULL, 3, 3, 4, 4, 4, 4, 4, 3, 4, NULL, '', 'tingkatkan', '33', '2020-03-24 14:27:38', NULL),
(524, 66, 9, 2, 28, 1, '', '', '66', 'normalasari', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'tingkatkan', '36', '2020-03-24 14:28:53', NULL),
(525, 66, 9, 2, 28, 1, '', '', '66', 'normalasari', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'tingkatkan', '36', '2020-03-24 14:28:57', NULL),
(526, 66, 6, 1, 38, 1, '', '', '66', 'apriyanto', NULL, 4, 4, 4, 4, 2, 4, 4, 4, 2, NULL, '', '.', '32', '2020-04-30 13:27:31', NULL),
(527, 68, 6, 2, 27, 1, '', '', '68', 'Rosalina Dita Pratama, A.Md. Keb', NULL, 3, 3, 3, 3, 3, 3, 4, 4, 2, NULL, '', '.', '28', '2020-05-04 09:59:25', NULL),
(528, 66, 6, 2, 27, 1, '', '', '66', 'Merry', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '.', '27', '2020-06-04 10:24:38', NULL),
(529, 66, 6, 2, 52, 1, '', '', '66', 'ERITASUNI', NULL, 4, 4, 3, 4, 3, 4, 4, 3, 4, NULL, '', '.', '33', '2020-06-11 11:26:38', NULL),
(530, 56, 9, 2, 24, 1, '', '', '56', 'NOVI MAGDALENA PUSPITA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '.', '29', '2020-06-17 11:55:29', NULL),
(531, 56, 9, 1, 26, 1, '', '', '56', 'WILLIAM GEOVANNI', NULL, 3, 3, 2, 4, 3, 3, 4, 3, 4, NULL, '', '.', '29', '2020-06-22 12:15:43', NULL),
(532, 56, 9, 1, 26, 1, '', '', '56', 'WILLIAM GEOVANNI', NULL, 3, 3, 2, 4, 3, 3, 4, 3, 4, NULL, '', '.', '29', '2020-06-22 12:15:45', NULL),
(533, 68, 6, 2, 24, 1, '', '', '68', 'riska dewanti', NULL, 4, 3, 3, 4, 4, 4, 3, 4, 4, NULL, '', '-', '33', '2020-06-30 11:53:17', NULL),
(534, 56, 9, 1, 34, 1, '', '', '56', 'dr. Angga Richardo', NULL, 3, 3, 1, 4, 3, 3, 3, 1, 3, NULL, '', 'kalau bisa untuk pengambilan SIP dokter tidak mesti terpaku pada satu petugas saja, kalau bisa lewat Front Oficce saja.', '24', '2020-07-07 09:16:50', NULL),
(535, 56, 9, 2, 25, 1, '', '', '56', 'MUSDALIFAH HANIFIAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-07-07 12:20:32', NULL),
(536, 56, 9, 2, 25, 1, '', '', '56', 'MARIA AGAVINA SEPTY PUTRI', NULL, 3, 2, 3, 4, 3, 3, 3, 3, 3, NULL, '', 'PERLU DITINGKATKAN KEMBALI.', '27', '2020-07-07 12:25:28', NULL),
(537, 56, 9, 1, 26, 1, '', '', '56', 'WILLIAM GEOVANNI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-07 12:30:28', NULL),
(538, 56, 9, 2, 24, 1, '', '', '56', 'NOVI MAGDALENA PUSPITA', NULL, 3, 3, 2, 3, 3, 3, 3, 3, 4, NULL, '', '..', '27', '2020-07-07 12:33:53', NULL),
(539, 56, 9, 1, 25, 1, '', '', '56', 'EFRAIM SAID SUDARTO', NULL, 3, 2, 2, 4, 3, 2, 2, 2, 2, NULL, '', 'CUKUP', '22', '2020-07-07 12:44:24', NULL),
(540, 56, 9, 2, 31, 1, '', '', '56', 'Hemaliny Ananta S', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'verry well', '36', '2020-07-08 11:55:21', NULL),
(541, 68, 8, 2, 28, 1, '', '', '68', 'Ditha Rizki Oktavianti, S.Tr.Keb,Bd.', NULL, 4, 4, 3, 4, 3, 4, 4, 4, 4, NULL, '', '-', '34', '2020-07-10 08:47:20', NULL),
(542, 66, 6, 2, 27, 1, '', '', '66', 'Aray Eris Dayanti, AMK', NULL, 3, 3, 2, 4, 3, 2, 3, 2, 3, NULL, '', 'Mohon apabila ada keterlambatan untuk pengurusan berkas bisa di delegasikan ke staf yang lain tapi selebihnya sudah baik.', '25', '2020-07-13 09:10:05', NULL),
(543, 56, 9, 1, 25, 1, '', '', '56', 'Anggy Rayendra', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'cukup baik', '29', '2020-07-13 11:38:18', NULL),
(544, 56, 9, 2, 25, 1, '', '', '56', 'nova auditha', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'sudah cukup baik', '29', '2020-07-13 11:43:00', NULL),
(545, 56, 9, 2, 56, 1, '', '', '56', 'drg. Fenny Kartini Kondolele', NULL, 3, 3, 4, 4, 3, 3, 3, 3, 4, NULL, '', 'Sudah baik dipertahankan dan ditingkatkan..', '30', '2020-07-16 09:54:00', NULL),
(546, 68, 9, 2, 38, 1, '', '', '68', 'Deni Sri Endang', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'terima kasih', '29', '2020-07-16 10:24:28', NULL),
(547, 68, 9, 2, 38, 1, '', '', '68', 'Deni Sri Endang', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'terima kasih', '29', '2020-07-16 10:24:28', NULL),
(548, 68, 9, 2, 38, 1, '', '', '68', 'Deni Sri Endang', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'terima kasih', '29', '2020-07-16 10:24:28', NULL),
(549, 68, 9, 2, 38, 1, '', '', '68', 'Deni Sri Endang', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'terima kasih', '29', '2020-07-16 10:24:28', NULL),
(550, 68, 9, 2, 38, 1, '', '', '68', 'Deni Sri Endang', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'terima kasih', '29', '2020-07-16 10:24:28', NULL),
(551, 68, 9, 2, 38, 1, '', '', '68', 'Deni Sri Endang', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'terima kasih', '29', '2020-07-16 10:24:34', NULL);
INSERT INTO `tblhasilsurvei` (`tblhasilsurvei_id`, `refjenisizinikm_id`, `reftingkatpendidikan_id`, `refsex_id`, `tblhasilsurvei_usia`, `refloket_id`, `tblhasilsurvei_caradaftar`, `tblhasilsurvei_pengurusan`, `refjenisizinikm_nama`, `tblhasilsurvei_nama`, `tblhasilsurvei_nip`, `tblhasilsurvei_pertanyaan1`, `tblhasilsurvei_pertanyaan2`, `tblhasilsurvei_pertanyaan3`, `tblhasilsurvei_pertanyaan4`, `tblhasilsurvei_pertanyaan5`, `tblhasilsurvei_pertanyaan6`, `tblhasilsurvei_pertanyaan7`, `tblhasilsurvei_pertanyaan8`, `tblhasilsurvei_pertanyaan9`, `tblhasilsurvei_pertanyaan10`, `tblhasilsurvei_penilaian`, `tblhasilsurvei_saran`, `tblhasilsurvei_total`, `tblhasilsurvei_syscreate`, `tblhasilsurvei_sysupdate`) VALUES
(552, 68, 9, 2, 38, 1, '', '', '68', 'Deni Sri Endang', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'terima kasih', '29', '2020-07-16 10:24:34', NULL),
(553, 68, 9, 2, 38, 1, '', '', '68', 'Deni Sri Endang', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'terima kasih', '29', '2020-07-16 10:24:34', NULL),
(554, 68, 9, 2, 38, 1, '', '', '68', 'Deni Sri Endang', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'terima kasih', '29', '2020-07-16 10:24:34', NULL),
(555, 68, 9, 2, 38, 1, '', '', '68', 'Deni Sri Endang', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'terima kasih', '29', '2020-07-16 10:24:34', NULL),
(556, 68, 9, 2, 38, 1, '', '', '68', 'Deni Sri Endang', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'terima kasih', '29', '2020-07-16 10:24:36', NULL),
(557, 68, 8, 2, 44, 1, '', '', '68', 'yanti', NULL, 3, 3, 3, 4, 3, 3, 3, 4, 4, NULL, '', 'terima kasih', '30', '2020-07-16 10:26:16', NULL),
(558, 68, 8, 2, 36, 1, '', '', '68', 'Gusvine Milandang', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'terima kasih', '29', '2020-07-16 10:28:07', NULL),
(559, 68, 8, 2, 46, 1, '', '', '68', 'Falentinae', NULL, 3, 4, 3, 4, 3, 3, 4, 4, 4, NULL, '', 'terima kasih', '32', '2020-07-16 10:29:23', NULL),
(560, 68, 8, 2, 33, 1, '', '', '68', 'Anita melania septerina', NULL, 3, 3, 3, 4, 3, 3, 4, 3, 4, NULL, '', 'terima kasih', '30', '2020-07-16 10:30:49', NULL),
(561, 68, 6, 2, 27, 1, '', '', '68', 'susi susanti', NULL, 3, 3, 3, 4, 3, 3, 4, 4, 4, NULL, '', 'terima kasih', '31', '2020-07-16 10:31:44', NULL),
(562, 68, 6, 2, 27, 1, '', '', '68', 'susi susanti', NULL, 3, 3, 3, 4, 3, 3, 4, 4, 4, NULL, '', 'terima kasih', '31', '2020-07-16 10:31:50', NULL),
(563, 68, 6, 2, 51, 1, '', '', '68', 'Ruseti Erni Muliani', NULL, 3, 3, 3, 4, 3, 3, 4, 4, 4, NULL, '', 'terima kasih', '31', '2020-07-16 10:32:56', NULL),
(564, 56, 9, 1, 26, 1, '', '', '56', 'Uria Ricko Tanguhno Handen', NULL, 3, 3, 2, 4, 3, 3, 3, 3, 4, NULL, '', 'tingkatkan', '28', '2020-07-16 10:47:58', NULL),
(565, 56, 9, 1, 26, 1, '', '', '56', 'NYOMAN NUGRAHA SURYA WIBAWA', NULL, 3, 3, 4, 4, 3, 4, 3, 3, 4, NULL, '', 'Lanjutkan', '31', '2020-07-16 10:50:03', NULL),
(566, 68, 6, 2, 24, 1, '', '', '68', 'NOVITA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:30:56', NULL),
(567, 68, 9, 2, 23, 1, '', '', '68', 'LINA NURHASANAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:32:42', NULL),
(568, 68, 6, 2, 26, 1, '', '', '68', 'ROSALINA DITA PRATAMA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:34:32', NULL),
(569, 68, 6, 2, 28, 1, '', '', '68', 'TRI HARTATY', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:35:33', NULL),
(570, 68, 6, 2, 22, 1, '', '', '68', 'RISKA DEWANTI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:36:23', NULL),
(571, 68, 6, 2, 31, 1, '', '', '68', 'EFI NURPIANAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:37:28', NULL),
(572, 68, 6, 2, 28, 1, '', '', '68', 'RUSETI ERNI MULIANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:38:48', NULL),
(573, 68, 6, 2, 25, 1, '', '', '68', 'SUSI SUSANTI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:39:42', NULL),
(574, 68, 9, 2, 24, 1, '', '', '68', 'ANITA MELANIA SEPTERINA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:41:29', NULL),
(575, 68, 9, 2, 34, 1, '', '', '68', 'FALESTINAE', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:42:58', NULL),
(576, 68, 9, 2, 31, 1, '', '', '68', 'GUSVINE MILANDANG', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:48:09', NULL),
(577, 68, 9, 2, 38, 1, '', '', '68', 'YANTI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:49:43', NULL),
(578, 68, 9, 2, 24, 1, '', '', '68', 'LUSSI PURNAWATI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:51:39', NULL),
(579, 68, 6, 2, 30, 1, '', '', '68', 'NI MADE WILIASIH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:53:30', NULL),
(580, 68, 6, 2, 30, 1, '', '', '68', 'NI MADE WILIASIH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:53:31', NULL),
(581, 68, 6, 2, 30, 1, '', '', '68', 'NI MADE WILIASIH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:53:31', NULL),
(582, 68, 6, 2, 41, 1, '', '', '68', 'ERITA SUNI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:54:44', NULL),
(583, 68, 6, 2, 23, 1, '', '', '68', 'ELISKA PRATAMA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:55:43', NULL),
(584, 68, 6, 2, 23, 1, '', '', '68', 'ELISKA PRATAMA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:55:43', NULL),
(585, 68, 9, 2, 26, 1, '', '', '68', 'DITHA RIZKY OKTAVIANTI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:57:29', NULL),
(586, 66, 6, 2, 23, 1, '', '', '66', 'MUNAWARAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 08:59:49', NULL),
(587, 66, 6, 2, 21, 1, '', '', '66', 'LISNA YUVITA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:01:02', NULL),
(588, 66, 6, 2, 24, 1, '', '', '66', 'AINUN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:02:08', NULL),
(589, 66, 9, 1, 27, 1, '', '', '66', 'ENGGO HANI VIANTO MOREDA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:03:55', NULL),
(590, 66, 6, 2, 30, 1, '', '', '66', 'MARLINDE', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:05:31', NULL),
(591, 66, 6, 2, 26, 1, '', '', '66', 'FEBBY RAMONAE', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:12:47', NULL),
(592, 66, 6, 2, 26, 1, '', '', '66', 'FEBBY RAMONAE', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:12:51', NULL),
(593, 66, 6, 2, 23, 1, '', '', '66', 'FEBBY RAMONAE', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:16:42', NULL),
(594, 66, 9, 2, 24, 1, '', '', '66', 'GENTIARA SURYA PRATNI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:17:45', NULL),
(595, 66, 6, 1, 25, 1, '', '', '66', 'MUHAMMAD KURNIA ANDIN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:19:48', NULL),
(596, 66, 6, 2, 27, 1, '', '', '66', 'NORMALASARI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:20:50', NULL),
(597, 66, 6, 2, 24, 1, '', '', '66', 'ROHA TURESEVA SITUMURANG', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:21:55', NULL),
(598, 66, 6, 2, 25, 1, '', '', '66', 'KUSMIATI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:22:41', NULL),
(599, 66, 6, 2, 26, 1, '', '', '66', 'ADELINA WAHYU WULANDARI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:23:33', NULL),
(600, 66, 6, 1, 27, 1, '', '', '66', 'APRIYANTO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:24:40', NULL),
(601, 66, 6, 2, 25, 1, '', '', '66', 'MERRYLINDA PERMATA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:25:45', NULL),
(602, 66, 6, 2, 28, 1, '', '', '66', 'WAHYUNI UTAMI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:27:12', NULL),
(603, 66, 6, 2, 28, 1, '', '', '66', 'WAHYUNI UTAMI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:27:16', NULL),
(604, 66, 6, 2, 25, 1, '', '', '66', 'SEPTIANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:28:00', NULL),
(605, 66, 9, 2, 30, 1, '', '', '66', 'RIRI PRAMITA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:28:42', NULL),
(606, 66, 9, 2, 35, 1, '', '', '66', 'TITA NOVASIA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:29:28', NULL),
(607, 66, 6, 2, 29, 1, '', '', '66', 'MARIA AGUSTINA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:30:24', NULL),
(608, 66, 6, 1, 28, 1, '', '', '66', 'TUAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:31:02', NULL),
(609, 66, 6, 2, 25, 1, '', '', '66', 'CITRA DEWI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:31:43', NULL),
(610, 66, 6, 1, 31, 1, '', '', '66', 'BRYAN ADAMS', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:33:08', NULL),
(611, 66, 9, 2, 28, 1, '', '', '66', 'DENI SRI ENDANG', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:34:05', NULL),
(612, 66, 6, 2, 45, 1, '', '', '66', 'ERITASUNI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:35:05', NULL),
(613, 56, 9, 1, 31, 1, '', '', '56', 'TRI ROHMANTO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:36:51', NULL),
(614, 56, 9, 2, 25, 1, '', '', '56', 'DINA ELZABETH SINAGA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:37:51', NULL),
(615, 56, 9, 1, 27, 1, '', '', '56', 'ANTONIUS PARPUNGUAN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:38:36', NULL),
(616, 56, 9, 2, 26, 1, '', '', '56', 'VEBILA AYU DITA PRIAN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:39:32', NULL),
(617, 56, 9, 2, 26, 1, '', '', '56', 'VINKA MELIARI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:40:32', NULL),
(618, 56, 9, 2, 23, 1, '', '', '56', 'NOVI MAGDALENA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:41:49', NULL),
(619, 56, 9, 1, 25, 1, '', '', '56', 'WILLIAM GEOVANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:42:38', NULL),
(620, 56, 9, 2, 24, 1, '', '', '56', 'NOVA AUDITHA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:43:20', NULL),
(621, 56, 9, 2, 25, 1, '', '', '56', 'MARIA AGAVINA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:44:09', NULL),
(622, 56, 9, 2, 24, 1, '', '', '56', 'MUSDALIFAH HANIFAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:45:25', NULL),
(623, 56, 9, 1, 25, 1, '', '', '56', 'ANGGY RAYENDRA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:46:03', NULL),
(624, 56, 9, 1, 25, 1, '', '', '56', 'EFRAIM SAID SUDARTO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:46:54', NULL),
(625, 56, 9, 1, 25, 1, '', '', '56', 'EFRAIM SAID SUDARTO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:47:57', NULL),
(626, 56, 9, 1, 25, 1, '', '', '56', 'ANGGY RAYENDRA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:48:39', NULL),
(627, 56, 9, 2, 24, 1, '', '', '56', 'MUSDALIFAH HANIFAH', NULL, 2, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:49:33', NULL),
(628, 56, 9, 2, 23, 1, '', '', '56', 'MARIA AGAVINA SEPTY', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:50:22', NULL),
(629, 56, 9, 2, 24, 1, '', '', '56', 'NOVA AUDITHA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:51:07', NULL),
(630, 56, 9, 1, 24, 1, '', '', '56', 'WILLIAM GEOVANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:51:58', NULL),
(631, 56, 9, 2, 24, 1, '', '', '56', 'NOVI MAGDALENA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:52:45', NULL),
(632, 56, 9, 1, 34, 1, '', '', '56', 'ANGGA RICHARDO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:53:42', NULL),
(633, 56, 9, 2, 26, 1, '', '', '56', 'HEMALINY ANANTA SIPAHUTAR', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:55:00', NULL),
(634, 56, 9, 2, 24, 1, '', '', '56', 'MARIA AGAVINA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:55:47', NULL),
(635, 56, 9, 2, 24, 1, '', '', '56', 'MUSDALIFAH HANIFAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:56:28', NULL),
(636, 56, 9, 1, 25, 1, '', '', '56', 'WILLIAM GEOVANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:57:18', NULL),
(637, 56, 9, 1, 25, 1, '', '', '56', 'EFRAIM SAID SUDARTO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:58:10', NULL),
(638, 56, 9, 2, 24, 1, '', '', '56', 'NOVA AUDITHA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:58:47', NULL),
(639, 56, 9, 2, 23, 1, '', '', '56', 'NOVI MAGDALENA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:59:25', NULL),
(640, 56, 9, 2, 23, 1, '', '', '56', 'NOVI MAGDALENA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 09:59:26', NULL),
(641, 56, 9, 1, 25, 1, '', '', '56', 'ANGGY RAYENDRA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 10:00:02', NULL),
(642, 56, 9, 1, 27, 1, '', '', '56', 'NYOMAN NUGRAHA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 10:00:59', NULL),
(643, 56, 9, 1, 29, 1, '', '', '56', 'URIA RICKO TANGUNHO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 10:01:45', NULL),
(644, 56, 9, 2, 43, 1, '', '', '56', 'FENNY KARTINI KONDOLELE', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-07-23 10:02:44', NULL),
(645, 57, 10, 2, 32, 1, '', '', '57', 'Anna Erliana O', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', 'disediakan web digital untuk mempermudah aplikasi', '27', '2020-08-04 09:05:05', NULL),
(646, 64, 6, 2, 24, 1, '', '', '64', 'AYU WANDARI', NULL, 3, 4, 3, 3, 3, 3, 4, 4, 4, NULL, '', '-', '31', '2020-08-27 12:08:43', NULL),
(647, 42, 3, 1, 40, 1, '', '', '42', 'SUJONO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 10:46:10', NULL),
(648, 42, 3, 1, 40, 1, '', '', '42', 'JUNIE', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:24:38', NULL),
(649, 42, 3, 1, 32, 1, '', '', '42', 'PENDI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:25:39', NULL),
(650, 42, 3, 1, 33, 1, '', '', '42', 'RIKKY ONG', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:26:20', NULL),
(651, 42, 3, 1, 33, 1, '', '', '42', 'SUKAMTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:28:29', NULL),
(652, 42, 3, 1, 30, 1, '', '', '42', 'RONI HERMAWAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:29:12', NULL),
(653, 42, 3, 1, 53, 1, '', '', '42', 'H. BAHRIANSYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:34:42', NULL),
(654, 42, 2, 1, 40, 1, '', '', '42', 'IWAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:35:58', NULL),
(655, 42, 3, 1, 33, 1, '', '', '42', 'SAMSUL HADI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:38:08', NULL),
(656, 42, 3, 2, 43, 1, '', '', '42', 'YONYTA KARTIKA SARI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:39:48', NULL),
(657, 42, 3, 1, 33, 1, '', '', '42', 'ANDI BAKHRI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:40:39', NULL),
(658, 42, 3, 1, 35, 1, '', '', '42', 'SEPTO GUNAWAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:42:03', NULL),
(659, 42, 9, 2, 28, 1, '', '', '42', 'RINA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:43:26', NULL),
(660, 42, 2, 1, 47, 1, '', '', '42', 'MIGUHARTAKU', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:47:59', NULL),
(661, 42, 3, 2, 38, 1, '', '', '42', 'AGUSTINA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:48:49', NULL),
(662, 42, 3, 1, 51, 1, '', '', '42', 'ARDIANSYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:49:51', NULL),
(663, 42, 9, 1, 50, 1, '', '', '42', 'DAVID', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:50:42', NULL),
(664, 42, 3, 1, 47, 1, '', '', '42', 'ASMANI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:51:49', NULL),
(665, 42, 3, 1, 47, 1, '', '', '42', 'FAHYANI NOOR', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:53:07', NULL),
(666, 42, 3, 1, 47, 1, '', '', '42', 'HADI HIDAYAT', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:54:19', NULL),
(667, 42, 3, 1, 51, 1, '', '', '42', 'SUGITO', NULL, 2, 2, 2, 2, 2, 2, 2, 2, 1, NULL, '', '-', '27', '2020-09-17 11:55:17', NULL),
(668, 42, 3, 1, 37, 1, '', '', '42', 'GUNADI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:56:00', NULL),
(669, 42, 3, 2, 38, 1, '', '', '42', 'HERNI SUSANTI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:57:00', NULL),
(670, 42, 3, 1, 57, 1, '', '', '42', 'H. ARDIANSYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:58:16', NULL),
(671, 42, 3, 2, 36, 1, '', '', '42', 'RIANTI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 11:59:29', NULL),
(672, 42, 3, 1, 25, 1, '', '', '42', 'ZAINI RAHMAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 13:06:55', NULL),
(673, 42, 2, 1, 41, 1, '', '', '42', 'MADARIANSYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 13:07:38', NULL),
(674, 42, 3, 2, 49, 1, '', '', '42', 'LILIANAWATY', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 13:09:19', NULL),
(675, 42, 3, 1, 44, 1, '', '', '42', 'SAMSURI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 13:10:10', NULL),
(676, 42, 3, 1, 46, 1, '', '', '42', 'AKHMAD WAHYUNI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-17 13:12:10', NULL),
(677, 42, 3, 1, 51, 1, '', '', '42', 'AMEK SURATNA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:13:28', NULL),
(678, 42, 3, 2, 44, 1, '', '', '42', 'HATNAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:14:25', NULL),
(679, 42, 3, 1, 35, 1, '', '', '42', 'MELKI SEDEK', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:15:29', NULL),
(680, 42, 11, 1, 64, 1, '', '', '42', 'YALES YOHANG MUNI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:16:39', NULL),
(681, 42, 3, 2, 27, 1, '', '', '42', 'HARAPAN IBU', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:17:24', NULL),
(682, 42, 3, 1, 24, 1, '', '', '42', 'RAHMAT TOTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:18:25', NULL),
(683, 42, 3, 2, 53, 1, '', '', '42', 'SUPARTI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:19:10', NULL),
(684, 42, 3, 1, 46, 1, '', '', '42', 'HARLIANSYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:21:01', NULL),
(685, 42, 4, 1, 25, 1, '', '', '42', 'AHMAD ZAINI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:21:44', NULL),
(686, 42, 3, 1, 30, 1, '', '', '42', 'SURYANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:22:31', NULL),
(687, 42, 3, 1, 31, 1, '', '', '42', 'ABDUL GAFUR', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:23:13', NULL),
(688, 42, 3, 1, 63, 1, '', '', '42', 'H. WAGU', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:24:21', NULL),
(689, 42, 3, 1, 41, 1, '', '', '42', 'PAHRIANOR', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:24:52', NULL),
(690, 42, 3, 1, 45, 1, '', '', '42', 'HAMDANI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:25:31', NULL),
(691, 42, 3, 2, 57, 1, '', '', '42', 'NUNUNG WIDAYATI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:26:20', NULL),
(692, 42, 3, 1, 47, 1, '', '', '42', 'MULIANI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:27:13', NULL),
(693, 42, 3, 1, 33, 1, '', '', '42', 'AHMAD RAFI\'I', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:29:05', NULL),
(694, 42, 3, 1, 24, 1, '', '', '42', 'ADITYA PRAWIRA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:29:31', NULL),
(695, 42, 9, 2, 41, 1, '', '', '42', 'VERAWATY', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:30:19', NULL),
(696, 42, 3, 1, 48, 1, '', '', '42', 'JOHANSYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:43:32', NULL),
(697, 42, 3, 1, 53, 1, '', '', '42', 'SUKIAT', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:44:10', NULL),
(698, 42, 3, 1, 49, 1, '', '', '42', 'ASRUNTING KONDRAT', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:44:54', NULL),
(699, 42, 3, 1, 59, 1, '', '', '42', 'MURATONI LAMBUNG', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:45:52', NULL),
(700, 42, 3, 1, 51, 1, '', '', '42', 'YULIANUS DANI NAHAR', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:48:13', NULL),
(701, 42, 3, 1, 52, 1, '', '', '42', 'CV. SIANR PAGI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:48:35', NULL),
(702, 42, 3, 1, 43, 1, '', '', '42', 'ANDI AGUS BUDIMAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:50:40', NULL),
(703, 42, 3, 1, 49, 1, '', '', '42', 'ISWANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:51:01', NULL),
(704, 42, 3, 1, 26, 1, '', '', '42', 'ADRANI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:51:33', NULL),
(705, 42, 3, 1, 56, 1, '', '', '42', 'ARIFIN DIJUNID SINANG', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:52:29', NULL),
(706, 42, 3, 2, 46, 1, '', '', '42', 'SUYANTIALHIDAYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:53:54', NULL),
(707, 42, 3, 1, 58, 1, '', '', '42', 'ABDULLAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:54:58', NULL),
(708, 42, 3, 1, 35, 1, '', '', '42', 'FLATINI LAPANG', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:57:05', NULL),
(709, 42, 3, 1, 46, 1, '', '', '42', 'CHANDRA OKTAVIA RINGKANG', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:58:50', NULL),
(710, 42, 3, 1, 28, 1, '', '', '42', 'EDY CHANDRA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 11:59:37', NULL),
(711, 42, 3, 1, 31, 1, '', '', '42', 'OSEP ISWIHANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:00:47', NULL),
(712, 42, 3, 2, 42, 1, '', '', '42', 'SORYATI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:01:43', NULL),
(713, 42, 3, 1, 52, 1, '', '', '42', 'RUNALHARD WAWAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:02:41', NULL),
(714, 42, 3, 1, 76, 1, '', '', '42', 'DENASIUS ANTANG', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:03:24', NULL),
(715, 42, 3, 2, 29, 1, '', '', '42', 'FEBRIANA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:04:13', NULL),
(716, 42, 3, 1, 35, 1, '', '', '42', 'ALIL SOFWAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:04:57', NULL),
(717, 42, 3, 2, 40, 1, '', '', '42', 'HJ. FATIMAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:05:37', NULL),
(718, 42, 9, 1, 56, 1, '', '', '42', 'TRI JOKO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:17:01', NULL),
(719, 42, 3, 1, 53, 1, '', '', '42', 'RUSPENDE', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:18:01', NULL),
(720, 42, 9, 1, 43, 1, '', '', '42', 'PURWANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:18:41', NULL),
(721, 42, 3, 1, 51, 1, '', '', '42', 'NANANG RUSMIYADI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:19:25', NULL),
(722, 42, 3, 1, 49, 1, '', '', '42', 'HENDRA GUNAWAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-23 12:21:14', NULL),
(723, 42, 3, 2, 36, 1, '', '', '42', 'ENUR NORJANAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-23 12:22:03', NULL),
(724, 42, 3, 2, 62, 1, '', '', '42', 'TURIWATI EL LANCA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-23 12:23:18', NULL),
(725, 42, 3, 1, 58, 1, '', '', '42', 'SAMBUNG', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:24:09', NULL),
(726, 42, 3, 2, 25, 1, '', '', '42', 'DWI NUSA INDAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-23 12:25:14', NULL),
(727, 42, 3, 1, 60, 1, '', '', '42', 'ARDIANSYAH IBUS', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-23 12:26:08', NULL),
(728, 42, 3, 1, 40, 1, '', '', '42', 'MIKHAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-23 12:26:54', NULL),
(729, 42, 3, 1, 34, 1, '', '', '42', 'JONFERIK', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:27:52', NULL),
(730, 42, 3, 1, 56, 1, '', '', '42', 'BANGREDY', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-23 12:28:38', NULL),
(731, 42, 3, 1, 34, 1, '', '', '42', 'MUHAMMAD', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-23 12:29:22', NULL),
(732, 42, 3, 1, 63, 1, '', '', '42', 'HADRIWOL', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-23 12:30:09', NULL),
(733, 42, 3, 2, 39, 1, '', '', '42', 'NURHIDAYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-23 12:31:06', NULL),
(734, 42, 3, 1, 65, 1, '', '', '42', 'LAMRI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-30 10:48:25', NULL),
(735, 42, 3, 1, 45, 1, '', '', '42', 'JONI Y ANTANG', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-30 10:49:22', NULL),
(736, 42, 3, 1, 37, 1, '', '', '42', 'H.JAMRI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-30 10:50:32', NULL),
(737, 42, 3, 1, 26, 1, '', '', '42', 'DANIEL KUSMAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-30 10:52:15', NULL),
(738, 42, 3, 1, 65, 1, '', '', '42', 'HERMAN KAMIL', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-30 10:53:04', NULL),
(739, 42, 3, 1, 46, 1, '', '', '42', 'YUNASI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-30 10:53:53', NULL),
(740, 42, 3, 1, 68, 1, '', '', '42', 'HERMAN AMOR SAPILAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-30 11:11:59', NULL),
(741, 42, 3, 1, 48, 1, '', '', '42', 'EKA SABAR SAHA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-30 11:12:53', NULL),
(742, 42, 3, 1, 28, 1, '', '', '42', 'DONI ANDORI', NULL, 3, 3, 3, 3, 3, 3, 3, 4, 4, NULL, '', '-', '29', '2020-09-30 11:13:45', NULL),
(743, 42, 3, 1, 55, 1, '', '', '42', 'CV. SWADAYA PUTRA', NULL, 3, 4, 3, 3, 3, 3, 3, 4, 3, NULL, '', '-', '29', '2020-09-30 11:14:41', NULL),
(744, 42, 9, 2, 48, 1, '', '', '42', 'ERA', NULL, 3, 3, 3, 3, 3, 4, 3, 3, 4, NULL, '', '-', '29', '2020-09-30 11:15:42', NULL),
(745, 42, 4, 1, 31, 1, '', '', '42', 'BENIDIKTUS WIDODO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-30 11:16:33', NULL),
(746, 42, 3, 1, 43, 1, '', '', '42', 'HADI', NULL, 3, 3, 3, 3, 4, 4, 3, 3, 4, NULL, '', '-', '30', '2020-09-30 11:17:08', NULL),
(747, 42, 3, 1, 37, 1, '', '', '42', 'WANTO', NULL, 3, 3, 3, 3, 3, 4, 3, 3, 4, NULL, '', '-', '29', '2020-09-30 11:17:59', NULL),
(748, 42, 3, 1, 31, 1, '', '', '42', 'SOBIRIN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-30 11:21:26', NULL),
(749, 42, 3, 2, 22, 1, '', '', '42', 'SITI RAMIWATY', NULL, 3, 3, 3, 3, 4, 3, 3, 3, 4, NULL, '', '-', '29', '2020-09-30 11:24:07', NULL),
(750, 42, 3, 1, 45, 1, '', '', '42', 'KARDOLIANSYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-09-30 11:25:16', NULL),
(751, 42, 3, 1, 35, 1, '', '', '42', 'DIAN INDRA TRIANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-30 11:26:01', NULL),
(752, 42, 3, 1, 30, 1, '', '', '42', 'APRIANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-09-30 11:26:54', NULL),
(753, 42, 9, 1, 55, 1, '', '', '42', 'KAHARAP TAHAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-10-01 14:01:55', NULL),
(754, 42, 3, 2, 57, 1, '', '', '42', 'HARTUTY', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:02:46', NULL),
(755, 42, 3, 1, 38, 1, '', '', '42', 'SAYUTI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-10-01 14:03:34', NULL),
(756, 42, 3, 1, 58, 1, '', '', '42', 'IP ONG', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:04:17', NULL),
(757, 42, 3, 1, 50, 1, '', '', '42', 'BUDI SUDIANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:04:58', NULL),
(758, 42, 3, 1, 38, 1, '', '', '42', 'MAYASIN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:05:47', NULL),
(759, 42, 3, 2, 36, 1, '', '', '42', 'ENENG SRI MARYATI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:06:32', NULL),
(760, 42, 3, 2, 35, 1, '', '', '42', 'JAMIYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:07:26', NULL),
(761, 42, 3, 1, 40, 1, '', '', '42', 'JUNIE', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:08:18', NULL),
(762, 42, 3, 1, 51, 1, '', '', '42', 'URES', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:09:01', NULL),
(763, 42, 3, 2, 48, 1, '', '', '42', 'HERY WATI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:09:43', NULL),
(764, 42, 3, 2, 52, 1, '', '', '42', 'SITI NURBAYA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:10:36', NULL),
(765, 42, 3, 1, 46, 1, '', '', '42', 'ISKANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:11:18', NULL),
(766, 42, 3, 1, 50, 1, '', '', '42', 'SUPARDI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:11:53', NULL),
(767, 42, 3, 1, 28, 1, '', '', '42', 'BIMO ATIDHIRO PAMBUDI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:12:50', NULL),
(768, 42, 3, 1, 35, 1, '', '', '42', 'CANDRA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:13:24', NULL),
(769, 42, 3, 2, 51, 1, '', '', '42', 'TRONIKA INA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:14:11', NULL),
(770, 42, 11, 1, 53, 1, '', '', '42', 'EC. KARTOMO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:14:58', NULL),
(771, 42, 3, 1, 35, 1, '', '', '42', 'HARIWINOTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:15:41', NULL),
(772, 42, 3, 1, 45, 1, '', '', '42', 'YULIUS', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:16:19', NULL),
(773, 42, 3, 1, 45, 1, '', '', '42', 'ABDURRAHMAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:16:57', NULL),
(774, 42, 3, 1, 29, 1, '', '', '42', 'JULIADI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:17:55', NULL),
(775, 42, 3, 2, 35, 1, '', '', '42', 'JAINUL HUTASOIT', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:18:58', NULL),
(776, 42, 4, 1, 38, 1, '', '', '42', 'JAINAL HUTASOIT', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:23:36', NULL),
(777, 42, 3, 2, 39, 1, '', '', '42', 'MARIANI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:24:15', NULL),
(778, 42, 3, 1, 27, 1, '', '', '42', 'ABDUL WAHID', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:24:55', NULL),
(779, 42, 3, 2, 50, 1, '', '', '42', 'HERVINA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:25:24', NULL),
(780, 42, 3, 1, 32, 1, '', '', '42', 'AKHMAD YANI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:50:31', NULL),
(781, 42, 3, 1, 41, 1, '', '', '42', 'MAARIF BUDI SUSANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:51:18', NULL),
(782, 42, 3, 2, 49, 1, '', '', '42', 'YUSITHA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:52:02', NULL),
(783, 42, 3, 2, 51, 1, '', '', '42', 'YUNITA DURUT', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:52:48', NULL),
(784, 42, 9, 1, 52, 1, '', '', '42', 'GUSTINUS NGATIMAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:53:32', NULL),
(785, 42, 3, 1, 25, 1, '', '', '42', 'GUNAWAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:54:07', NULL),
(786, 42, 3, 1, 45, 1, '', '', '42', 'ROMA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:54:37', NULL),
(787, 42, 3, 2, 30, 1, '', '', '42', 'WIWIN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:55:09', NULL),
(788, 42, 9, 2, 34, 1, '', '', '42', 'RISTINIE', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:55:52', NULL),
(789, 42, 3, 1, 53, 1, '', '', '42', 'EC. KASTOMO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:56:36', NULL),
(790, 42, 3, 1, 42, 1, '', '', '42', 'CARIASI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:57:08', NULL),
(791, 42, 3, 1, 33, 1, '', '', '42', 'ALTEN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:57:48', NULL),
(792, 42, 3, 1, 40, 1, '', '', '42', 'ROBERT', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:58:25', NULL),
(793, 42, 3, 1, 61, 1, '', '', '42', 'UNTUR TAYAM', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:59:00', NULL),
(794, 42, 3, 1, 52, 1, '', '', '42', 'BAHRUL', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:59:29', NULL),
(795, 42, 3, 1, 37, 1, '', '', '42', 'ZAINI ANWAR', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 14:59:59', NULL),
(796, 42, 3, 1, 47, 1, '', '', '42', 'A.ALIYASRI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-01 15:01:18', NULL),
(797, 42, 3, 1, 42, 1, '', '', '42', 'JHON UNTUNG', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:18:08', NULL),
(798, 42, 3, 1, 44, 1, '', '', '42', 'BOBI PRIADI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:19:21', NULL),
(799, 42, 6, 2, 30, 1, '', '', '42', 'MERYAT ICA SATIVA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:21:34', NULL),
(800, 42, 3, 2, 42, 1, '', '', '42', 'SRI BUDI ASTUTI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:23:07', NULL),
(801, 42, 3, 2, 47, 1, '', '', '42', 'RAHMAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:24:01', NULL),
(802, 42, 3, 1, 59, 1, '', '', '42', 'LAMSANI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:25:34', NULL),
(803, 42, 3, 2, 44, 1, '', '', '42', 'RATU YUNITA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:26:23', NULL),
(804, 42, 3, 1, 38, 1, '', '', '42', 'SODIKN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:27:08', NULL),
(805, 42, 3, 2, 40, 1, '', '', '42', 'SRI NGATIN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:27:51', NULL),
(806, 42, 3, 2, 50, 1, '', '', '42', 'ROSDIANA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:29:03', NULL),
(807, 42, 3, 1, 30, 1, '', '', '42', 'SEPTIAN ANDRI KOENTJORO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:29:54', NULL),
(808, 42, 3, 1, 45, 1, '', '', '42', 'RUSTAM EFFENDI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:30:44', NULL),
(809, 42, 3, 1, 41, 1, '', '', '42', 'ADI SAPUTRA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:31:28', NULL),
(810, 42, 3, 2, 42, 1, '', '', '42', 'KAMALA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:32:15', NULL),
(811, 42, 3, 1, 62, 1, '', '', '42', 'H.A ZAINAL ILMI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:33:09', NULL),
(812, 42, 3, 2, 44, 1, '', '', '42', 'DEWI INDAH RAKHMAWATI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:34:21', NULL),
(813, 42, 3, 2, 45, 1, '', '', '42', 'HERLINA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:35:06', NULL),
(814, 42, 3, 2, 28, 1, '', '', '42', 'FAHRIANNOR', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:35:49', NULL),
(815, 42, 3, 1, 51, 1, '', '', '42', 'AKHMAD KUSASI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:36:40', NULL),
(816, 42, 3, 1, 44, 1, '', '', '42', 'KETUT NAOVAN HINDARIWIYANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:38:09', NULL),
(817, 42, 3, 2, 29, 1, '', '', '42', 'ISNIWATI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:39:14', NULL),
(818, 42, 3, 2, 33, 1, '', '', '42', 'MUJIATI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:40:07', NULL),
(819, 42, 3, 1, 58, 1, '', '', '42', 'HERMANTOE', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:40:57', NULL),
(820, 42, 3, 2, 59, 1, '', '', '42', 'ROSNAWATY', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:42:06', NULL),
(821, 42, 3, 1, 36, 1, '', '', '42', 'M.K. WIRA SAPUTRA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:42:56', NULL),
(822, 42, 3, 2, 56, 1, '', '', '42', 'HJ. RAMLAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-08 08:43:41', NULL),
(823, 122, 3, 1, 65, 1, '', '', '122', 'LAMRI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2020-10-14 09:18:28', NULL),
(824, 122, 3, 1, 45, 1, '', '', '122', 'JONI Y ANTANG', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 4, NULL, '', '-', '28', '2020-10-14 09:19:39', NULL),
(825, 122, 9, 2, 31, 1, '', '', '122', 'SRI NURYANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:20:41', NULL),
(826, 122, 3, 2, 31, 1, '', '', '122', 'BENDIKTUS WIDODO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:27:38', NULL),
(827, 122, 3, 1, 43, 1, '', '', '122', 'HADI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-10-14 09:28:43', NULL),
(828, 122, 9, 2, 40, 1, '', '', '122', 'WAHDAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:29:41', NULL),
(829, 122, 9, 2, 31, 1, '', '', '122', 'MASTUTIK', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-10-14 09:30:38', NULL),
(830, 122, 9, 2, 45, 1, '', '', '122', 'MARHAMAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:31:35', NULL),
(831, 122, 9, 2, 39, 1, '', '', '122', 'ANI MINARNI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:32:31', NULL),
(832, 122, 3, 1, 38, 1, '', '', '122', 'MAYASIN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:38:32', NULL),
(833, 122, 3, 2, 35, 1, '', '', '122', 'JAMIYAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:39:20', NULL),
(834, 122, 3, 2, 52, 1, '', '', '122', 'SITI NURBAYA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:40:13', NULL),
(835, 122, 3, 1, 46, 1, '', '', '122', 'ISKANTO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:40:55', NULL),
(836, 122, 3, 1, 28, 1, '', '', '122', 'BIMO ATHIDHIRO PAMBUDI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:41:50', NULL),
(837, 122, 3, 2, 51, 1, '', '', '122', 'TRONIKA INA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:42:46', NULL),
(838, 122, 11, 1, 53, 1, '', '', '122', 'Drs Ec. KASTOMO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:43:49', NULL),
(839, 122, 3, 1, 35, 1, '', '', '122', 'YULIUS', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:44:37', NULL),
(840, 122, 3, 1, 45, 1, '', '', '122', 'ABDURRAHIM', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:45:30', NULL),
(841, 122, 9, 2, 42, 1, '', '', '122', 'UPI LIANA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:46:21', NULL),
(842, 122, 9, 2, 42, 1, '', '', '122', 'UPI LIANA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:46:22', NULL),
(843, 122, 9, 2, 44, 1, '', '', '122', 'SANTIE ERLIANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:47:24', NULL),
(844, 122, 3, 1, 25, 1, '', '', '122', 'GUNAWAN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2020-10-14 09:52:52', NULL),
(845, 122, 3, 1, 32, 1, '', '', '122', 'AKHMAD YANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:53:40', NULL),
(846, 122, 3, 1, 45, 1, '', '', '122', 'ROMA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:54:23', NULL),
(847, 122, 3, 2, 30, 1, '', '', '122', 'WIWIN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:55:15', NULL),
(848, 122, 9, 2, 34, 1, '', '', '122', 'RISTINIE', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 09:56:08', NULL),
(849, 122, 3, 1, 33, 1, '', '', '122', 'ALTEN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:04:43', NULL),
(850, 122, 9, 2, 49, 1, '', '', '122', 'MAYA SOPA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:05:33', NULL),
(851, 122, 3, 1, 61, 1, '', '', '122', 'GUNTUR TAYAM', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:06:23', NULL),
(852, 122, 3, 1, 52, 1, '', '', '122', 'BAHRUL', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:07:00', NULL),
(853, 122, 3, 1, 47, 1, '', '', '122', 'A.ALYASRI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:08:05', NULL),
(854, 122, 3, 1, 42, 1, '', '', '122', 'JHON UNTUNG', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:09:05', NULL),
(855, 122, 3, 1, 44, 1, '', '', '122', 'BOBI PRIADI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:09:52', NULL),
(856, 122, 9, 2, 30, 1, '', '', '122', 'MERYANTIKA SATIVA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:10:54', NULL),
(857, 122, 9, 2, 51, 1, '', '', '122', 'ETNAE', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:12:19', NULL),
(858, 122, 3, 1, 47, 1, '', '', '122', 'RAHMAN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:13:15', NULL),
(859, 122, 3, 1, 59, 1, '', '', '122', 'LAMSANI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:14:07', NULL),
(860, 122, 3, 2, 44, 1, '', '', '122', 'RATU YUNITA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:14:45', NULL),
(861, 122, 3, 1, 38, 1, '', '', '122', 'SODIKIN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:15:32', NULL),
(862, 122, 3, 2, 50, 1, '', '', '122', 'ROSDIANA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:16:25', NULL),
(863, 122, 3, 1, 45, 1, '', '', '122', 'RUSTAM EFFENDI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:17:10', NULL),
(864, 122, 3, 1, 28, 1, '', '', '122', 'FAHRIANOR', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:22:22', NULL),
(865, 122, 3, 2, 29, 1, '', '', '122', 'ASNIWATI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:23:04', NULL),
(866, 122, 3, 2, 59, 1, '', '', '122', 'ROSNAWATY', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:24:21', NULL),
(867, 122, 9, 2, 40, 1, '', '', '122', 'EVI DEWI YANTI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:25:23', NULL),
(868, 122, 9, 2, 38, 1, '', '', '122', 'ALIAH', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:25:59', NULL),
(869, 122, 9, 2, 47, 1, '', '', '122', 'SARTIKA SARI NORWANTINI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:26:55', NULL),
(870, 122, 3, 1, 51, 1, '', '', '122', 'ADEA RIZKY', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:27:48', NULL),
(871, 122, 3, 1, 60, 1, '', '', '122', 'YOGIE LETUS', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:28:28', NULL),
(872, 122, 3, 2, 34, 1, '', '', '122', 'SULASTRI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2020-10-14 10:29:06', NULL),
(873, 66, 9, 1, 30, 1, '', '', '66', 'said m. riza pahlevi', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'pelayanan sudah sangat baik dan semoga tetap terjaga dan dapat ditingkatkan lagi', '36', '2020-10-15 12:21:46', NULL),
(874, 66, 9, 1, 32, 1, '', '', '66', 'Akhmad Gazali, S. Kep., Ns', NULL, 3, 3, 3, 4, 3, 3, 4, 4, 4, NULL, '', 'saran saya pertahankan saja apa yang sudah dicapai saat ini.. jika [erlu ditingkatkan', '31', '2020-10-15 12:24:38', NULL),
(875, 66, 9, 1, 30, 1, '', '', '66', 'Nikolas Henry, S. Kep., Ners', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'tingkatkan lagi,.. apalagi jika bisa menggunakan pelayanan ONLINE...', '29', '2020-10-15 12:26:18', NULL),
(876, 66, 9, 1, 30, 1, '', '', '66', 'Nikolas Henry, S. Kep., Ners', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'tingkatkan lagi,.. apalagi jika bisa menggunakan pelayanan ONLINE...', '29', '2020-10-15 12:26:18', NULL),
(877, 66, 9, 1, 30, 1, '', '', '66', 'Nikolas Henry, S. Kep., Ners', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', 'tingkatkan lagi,.. apalagi jika bisa menggunakan pelayanan ONLINE...', '29', '2020-10-15 12:26:19', NULL),
(878, 68, 6, 2, 45, 1, '', '', '68', 'lidya', NULL, 4, 3, 4, 4, 4, 3, 4, 4, 4, NULL, '', 'semoga\r\nlebih\r\nbaik\r\nlagi\r\n\r\n\r\n\r\ni', '34', '2020-10-15 13:33:23', NULL),
(879, 42, 9, 1, 48, 1, '', '', '42', 'BUKHARI MUSLIM', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:08:32', NULL),
(880, 42, 3, 1, 43, 1, '', '', '42', 'SUPRIYADI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:09:20', NULL),
(881, 42, 3, 1, 54, 1, '', '', '42', 'ABDULLAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:10:02', NULL),
(882, 42, 3, 1, 46, 1, '', '', '42', 'ARIF RAHMAN HAKIM', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:10:53', NULL),
(883, 42, 3, 2, 48, 1, '', '', '42', 'WARNITA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:11:45', NULL),
(884, 42, 3, 1, 38, 1, '', '', '42', 'SISWANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:12:32', NULL),
(885, 42, 3, 1, 42, 1, '', '', '42', 'ACHMAD FARID', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:14:00', NULL),
(886, 42, 3, 2, 28, 1, '', '', '42', 'AKHIR RIONNISA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:16:18', NULL),
(887, 42, 3, 1, 46, 1, '', '', '42', 'YUSUF', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:17:20', NULL),
(888, 42, 3, 1, 52, 1, '', '', '42', 'NURHADI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:17:59', NULL),
(889, 42, 3, 2, 35, 1, '', '', '42', 'RIRI PRAMITA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:22:08', NULL),
(890, 42, 3, 1, 32, 1, '', '', '42', 'NASTAIN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:22:47', NULL),
(891, 42, 3, 1, 31, 1, '', '', '42', 'BENLY BALAYAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:23:39', NULL),
(892, 42, 3, 1, 50, 1, '', '', '42', 'SUPARNO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:24:17', NULL),
(893, 42, 3, 1, 43, 1, '', '', '42', 'RYRYO PRE ARIES', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:25:03', NULL),
(894, 42, 3, 1, 62, 1, '', '', '42', 'IBUNG B. GANI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:25:47', NULL),
(895, 42, 3, 1, 58, 1, '', '', '42', 'DAMEK', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:26:32', NULL),
(896, 42, 3, 1, 56, 1, '', '', '42', 'MISRUDIN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:27:58', NULL),
(897, 42, 6, 2, 29, 1, '', '', '42', 'MEILIANA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:28:45', NULL),
(898, 42, 3, 1, 21, 1, '', '', '42', 'AGUSTINUS', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:29:46', NULL),
(899, 42, 3, 1, 29, 1, '', '', '42', 'TAUFIK PURWANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:30:47', NULL),
(900, 42, 3, 1, 35, 1, '', '', '42', 'RAMA DONA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:31:43', NULL),
(901, 42, 3, 1, 65, 1, '', '', '42', 'GOH NO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-13 11:32:25', NULL),
(902, 42, 3, 1, 41, 1, '', '', '42', 'TOSAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 08:52:28', NULL),
(903, 18, 3, 1, 41, 1, '', '', '18', 'TOSAN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2021-01-14 08:55:46', NULL),
(904, 122, 3, 1, 41, 1, '', '', '122', 'TOSAN', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2021-01-14 08:57:48', NULL),
(905, 42, 3, 1, 43, 1, '', '', '42', 'ESNENI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:03:12', NULL),
(906, 42, 3, 1, 43, 1, '', '', '42', 'ESNENI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2021-01-14 09:03:45', NULL),
(907, 42, 3, 1, 43, 1, '', '', '42', 'ESNENI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2021-01-14 09:05:42', NULL),
(908, 42, 3, 1, 50, 1, '', '', '42', 'SURYADINIAGA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:07:10', NULL),
(909, 18, 3, 1, 50, 1, '', '', '18', 'SURYADINIAGA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2021-01-14 09:07:42', NULL),
(910, 21, 3, 1, 50, 1, '', '', '21', 'SURYADINIAGA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2021-01-14 09:08:22', NULL),
(911, 42, 3, 1, 31, 1, '', '', '42', 'DEKI SUWANTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:11:02', NULL);
INSERT INTO `tblhasilsurvei` (`tblhasilsurvei_id`, `refjenisizinikm_id`, `reftingkatpendidikan_id`, `refsex_id`, `tblhasilsurvei_usia`, `refloket_id`, `tblhasilsurvei_caradaftar`, `tblhasilsurvei_pengurusan`, `refjenisizinikm_nama`, `tblhasilsurvei_nama`, `tblhasilsurvei_nip`, `tblhasilsurvei_pertanyaan1`, `tblhasilsurvei_pertanyaan2`, `tblhasilsurvei_pertanyaan3`, `tblhasilsurvei_pertanyaan4`, `tblhasilsurvei_pertanyaan5`, `tblhasilsurvei_pertanyaan6`, `tblhasilsurvei_pertanyaan7`, `tblhasilsurvei_pertanyaan8`, `tblhasilsurvei_pertanyaan9`, `tblhasilsurvei_pertanyaan10`, `tblhasilsurvei_penilaian`, `tblhasilsurvei_saran`, `tblhasilsurvei_total`, `tblhasilsurvei_syscreate`, `tblhasilsurvei_sysupdate`) VALUES
(912, 122, 3, 1, 31, 1, '', '', '122', 'DEKI SUWANTO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2021-01-14 09:12:07', NULL),
(913, 18, 3, 1, 31, 1, '', '', '18', 'DEKI SUWANTO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2021-01-14 09:15:23', NULL),
(914, 42, 3, 1, 36, 1, '', '', '42', 'HENDRI JUNI SASTRO', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2021-01-14 09:33:25', NULL),
(915, 42, 3, 1, 46, 1, '', '', '42', 'IDAN ATENG SIMON', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:34:31', NULL),
(916, 42, 3, 2, 50, 1, '', '', '42', 'WATIMAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:35:48', NULL),
(917, 42, 3, 1, 53, 1, '', '', '42', 'SAMIRUN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:36:34', NULL),
(918, 42, 2, 2, 45, 1, '', '', '42', 'NURJUMAIYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:41:33', NULL),
(919, 42, 3, 1, 25, 1, '', '', '42', 'RAHMAT TOTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:52:53', NULL),
(920, 42, 3, 1, 51, 1, '', '', '42', 'SOGIONO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:53:33', NULL),
(921, 42, 3, 2, 58, 1, '', '', '42', 'NUNUNG WIDAYANTI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:54:17', NULL),
(922, 42, 3, 1, 45, 1, '', '', '42', 'TAUFIK HIDAYAT', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:55:58', NULL),
(923, 42, 3, 2, 34, 1, '', '', '42', 'ZAHROTUL MUFIDAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:58:49', NULL),
(924, 42, 3, 2, 43, 1, '', '', '42', 'AIDAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 09:59:23', NULL),
(925, 42, 3, 1, 53, 1, '', '', '42', 'JAENAL FANANI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 10:00:03', NULL),
(926, 42, 2, 1, 53, 1, '', '', '42', 'ATAK SANUSI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 10:01:05', NULL),
(927, 42, 3, 1, 21, 1, '', '', '42', 'ASYER LELO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 10:01:46', NULL),
(928, 42, 3, 2, 29, 1, '', '', '42', 'NURITA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 10:02:28', NULL),
(929, 42, 3, 2, 36, 1, '', '', '42', 'MARGARETHA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 10:03:03', NULL),
(930, 42, 3, 1, 43, 1, '', '', '42', 'CV. KAHARAP ITAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 10:03:43', NULL),
(931, 42, 3, 2, 31, 1, '', '', '42', 'MARFUAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 10:04:30', NULL),
(932, 42, 9, 1, 52, 1, '', '', '42', 'H. IBERAHIM', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 10:05:39', NULL),
(933, 42, 3, 2, 42, 1, '', '', '42', 'ROHMI YATI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 10:06:19', NULL),
(934, 18, 2, 1, 52, 1, '', '', '18', 'H. IBERAHIM', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 10:22:37', NULL),
(935, 6, 3, 1, 52, 1, '', '', '6', 'H. IBRAHIM', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 11:02:59', NULL),
(936, 42, 3, 1, 55, 1, '', '', '42', 'H. SURIYANI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 11:03:52', NULL),
(937, 42, 3, 1, 51, 1, '', '', '42', 'YERMIA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 11:08:15', NULL),
(938, 42, 3, 1, 52, 1, '', '', '42', 'H. IBERAHIM', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 11:09:10', NULL),
(939, 42, 3, 1, 32, 1, '', '', '42', 'SYAMSUDIN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 11:10:07', NULL),
(940, 42, 3, 1, 55, 1, '', '', '42', 'UNTUNG I. TINUS', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 11:11:25', NULL),
(941, 42, 3, 1, 46, 1, '', '', '42', 'ZUL EFENDI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 11:12:32', NULL),
(942, 42, 3, 1, 55, 1, '', '', '42', 'ARIANSYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 11:13:22', NULL),
(943, 42, 3, 1, 42, 1, '', '', '42', 'HAZAIRIN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 11:14:37', NULL),
(944, 42, 3, 1, 64, 1, '', '', '42', 'BADERUN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 11:16:08', NULL),
(945, 42, 3, 1, 59, 1, '', '', '42', 'BURHAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-01-14 11:17:45', NULL),
(946, 42, 3, 1, 59, 1, '', '', '42', 'GETSON IYEM', NULL, 3, 3, 4, 4, 3, 3, 4, 3, 4, NULL, '', '-', '31', '2021-08-18 08:36:03', NULL),
(947, 42, 2, 1, 37, 1, '', '', '42', 'HARLIANSYAH', NULL, 3, 3, 4, 3, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2021-08-18 08:39:33', NULL),
(948, 42, 3, 1, 55, 1, '', '', '42', 'YULIUS ALIANTO', NULL, 4, 4, 4, 3, 3, 4, 3, 4, 4, NULL, '', '-', '33', '2021-08-18 08:41:19', NULL),
(949, 42, 3, 1, 59, 1, '', '', '42', 'Getson Iyem', NULL, 3, 3, 3, 3, 3, 4, 3, 3, 4, NULL, '', '-', '29', '2021-08-18 08:45:49', NULL),
(950, 42, 3, 1, 47, 1, '', '', '42', 'HARLIANSYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-18 08:47:28', NULL),
(951, 42, 3, 1, 55, 1, '', '', '42', 'YULIUS ALIANTO', NULL, 4, 3, 4, 3, 3, 4, 4, 4, 4, NULL, '', '-', '33', '2021-08-18 08:50:37', NULL),
(952, 42, 3, 1, 24, 1, '', '', '42', 'FAHRIZAL', NULL, 4, 4, 4, 3, 4, 3, 4, 4, 4, NULL, '', '-', '34', '2021-08-18 08:52:04', NULL),
(953, 42, 3, 1, 41, 1, '', '', '42', 'IWAN', NULL, 3, 4, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2021-08-18 08:54:19', NULL),
(954, 42, 3, 1, 48, 1, '', '', '42', 'MIGUHARTAKU', NULL, 4, 4, 4, 3, 4, 4, 4, 3, 3, NULL, '', '-', '33', '2021-08-18 08:56:46', NULL),
(955, 42, 9, 1, 56, 1, '', '', '42', 'GUNTUR AMIT,S.PD', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-18 08:58:32', NULL),
(956, 42, 9, 1, 28, 1, '', '', '42', 'HENDRA', NULL, 4, 3, 4, 3, 3, 4, 3, 3, 3, NULL, '', '-', '30', '2021-08-18 09:00:14', NULL),
(957, 42, 9, 1, 46, 1, '', '', '42', 'THEOPILOS INDRA GUNAWAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-18 09:02:33', NULL),
(958, 42, 3, 1, 58, 1, '', '', '42', 'H. ARDIANSYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-18 09:04:39', NULL),
(959, 42, 9, 1, 41, 1, '', '', '42', 'EBED KADARUSMAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-18 09:06:16', NULL),
(960, 42, 3, 1, 35, 1, '', '', '42', 'NEGU', NULL, 4, 4, 3, 3, 4, 4, 3, 4, 3, NULL, '', '-', '32', '2021-08-18 09:07:57', NULL),
(961, 42, 3, 1, 37, 1, '', '', '42', 'DANIEL HARISON', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-18 09:10:04', NULL),
(962, 42, 9, 1, 26, 1, '', '', '42', 'AHMAD ZAINI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-18 09:11:15', NULL),
(963, 42, 9, 1, 58, 1, '', '', '42', 'HADI HIDAYAT', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-18 09:12:19', NULL),
(964, 42, 3, 1, 44, 1, '', '', '42', 'SAMSURI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 3, NULL, '', '-', '34', '2021-08-18 09:13:52', NULL),
(965, 42, 3, 1, 37, 1, '', '', '42', 'DANANG PRASTYO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 3, NULL, '', '-', '34', '2021-08-18 09:57:36', NULL),
(966, 42, 3, 1, 48, 1, '', '', '42', 'ASMANI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-18 10:00:58', NULL),
(967, 42, 3, 2, 49, 1, '', '', '42', 'LILIANAWATY', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-18 10:06:02', NULL),
(968, 42, 3, 1, 28, 1, '', '', '42', 'DUNDI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-18 10:09:39', NULL),
(969, 42, 9, 1, 34, 1, '', '', '42', 'SUKAMTO', NULL, 3, 3, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '32', '2021-08-18 10:17:08', NULL),
(970, 42, 3, 2, 30, 1, '', '', '42', 'KARMILA DEWI SARI', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-18 10:53:02', NULL),
(971, 42, 3, 1, 52, 1, '', '', '42', 'SUGITO', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-18 10:54:50', NULL),
(972, 42, 3, 1, 34, 1, '', '', '42', 'IMAM MUDHOFIR', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-18 10:56:49', NULL),
(973, 42, 10, 1, 28, 1, '', '', '42', 'HAMBOWO SULISTYO PUTRO, S.AN., M.AP', NULL, 3, 3, 3, 3, 4, 4, 4, 3, 3, NULL, '', '-', '30', '2021-08-18 10:58:51', NULL),
(974, 42, 3, 1, 45, 1, '', '', '42', 'ASIO H. UNIL', NULL, 3, 3, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '32', '2021-08-18 11:04:02', NULL),
(975, 42, 3, 1, 45, 1, '', '', '42', 'ASIO H. UNIL', NULL, 3, 3, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '32', '2021-08-18 11:12:39', NULL),
(976, 42, 3, 2, 39, 1, '', '', '42', 'AGUSTINA', NULL, 3, 3, 3, 3, 3, 3, 4, 4, 3, NULL, '', '-', '29', '2021-08-18 11:18:35', NULL),
(977, 42, 3, 2, 44, 1, '', '', '42', 'HATNAH', NULL, 3, 3, 3, 3, 3, 3, 4, 4, 4, NULL, '', '-', '30', '2021-08-18 11:19:28', NULL),
(978, 42, 3, 2, 44, 1, '', '', '42', 'YONYTA KARTIKA SARI', NULL, 4, 4, 3, 3, 4, 4, 4, 3, 3, NULL, '', '-', '32', '2021-08-18 11:20:29', NULL),
(979, 42, 3, 1, 62, 1, '', '', '42', 'AMIEK SURATNA', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-18 11:21:26', NULL),
(980, 42, 9, 1, 64, 1, '', '', '42', 'Ir. MANATAP SITUNGKIR', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-18 11:23:43', NULL),
(981, 42, 3, 2, 64, 1, '', '', '42', 'MELIWATY', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-18 11:26:26', NULL),
(982, 42, 9, 1, 41, 1, '', '', '42', 'VERAWATY, SE', NULL, 3, 4, 4, 3, 3, 4, 4, 3, 3, NULL, '', '-', '31', '2021-08-18 11:27:35', NULL),
(983, 42, 3, 1, 77, 1, '', '', '42', 'EDDY DENASIUS ANTANG', NULL, 3, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2021-08-18 11:28:50', NULL),
(984, 42, 3, 1, 42, 1, '', '', '42', 'SISWANDI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-18 11:29:38', NULL),
(985, 42, 9, 1, 34, 1, '', '', '42', 'ANDI BAKRI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-18 11:33:58', NULL),
(986, 42, 9, 1, 46, 1, '', '', '42', 'AKHMAD WAHYUNI', NULL, 4, 4, 4, 3, 4, 4, 4, 3, 3, NULL, '', '-', '33', '2021-08-18 11:35:08', NULL),
(987, 42, 3, 1, 29, 1, '', '', '42', 'EDY CANDRA', NULL, 3, 3, 4, 3, 4, 4, 4, 4, 3, NULL, '', '-', '32', '2021-08-18 11:36:36', NULL),
(988, 42, 2, 1, 44, 1, '', '', '42', 'AKSARIANSYAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-18 11:37:32', NULL),
(989, 42, 3, 2, 51, 1, '', '', '42', 'RUSMINI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-18 11:41:21', NULL),
(990, 42, 3, 1, 34, 1, '', '', '42', 'SAMSUL HADI', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-18 11:42:09', NULL),
(991, 42, 3, 1, 36, 1, '', '', '42', 'SEPTO GUNAWAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-18 11:42:52', NULL),
(992, 42, 3, 1, 56, 1, '', '', '42', 'PERSI LUHER', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-18 11:43:49', NULL),
(993, 42, 3, 1, 39, 1, '', '', '42', 'HARIANTO', NULL, 3, 3, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '33', '2021-08-18 11:44:33', NULL),
(994, 42, 9, 2, 32, 1, '', '', '42', 'Desie Istinawati', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-18 11:45:30', NULL),
(995, 42, 9, 2, 30, 1, '', '', '42', 'WINDA PUSPITA SARI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-18 11:46:24', NULL),
(996, 42, 9, 1, 56, 1, '', '', '42', 'Ir. KAHARAP TAHAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-18 11:47:13', NULL),
(997, 42, 9, 1, 56, 1, '', '', '42', 'HAMDANI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-18 11:49:03', NULL),
(998, 68, 6, 2, 26, 1, '', '', '68', 'DARA TRIANA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 13:57:54', NULL),
(999, 68, 6, 2, 27, 1, '', '', '68', 'FEPELTI FEBRIANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:06:59', NULL),
(1000, 68, 6, 2, 28, 1, '', '', '68', 'YETRI SURANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:08:18', NULL),
(1001, 67, 6, 2, 44, 1, '', '', '67', 'RIDA SUSANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:10:01', NULL),
(1002, 68, 6, 2, 30, 1, '', '', '68', 'JAUHAR LATIFAH A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:14:42', NULL),
(1003, 68, 6, 2, 35, 1, '', '', '68', 'WIDYAS RATNA NINGSIH, Amd.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:16:20', NULL),
(1004, 68, 6, 2, 49, 1, '', '', '68', 'ERNAWATI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:17:40', NULL),
(1005, 68, 6, 2, 29, 1, '', '', '68', 'SRIWIN PUJIATI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:21:00', NULL),
(1006, 68, 6, 2, 26, 1, '', '', '68', 'NOOR YETRI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:23:14', NULL),
(1007, 68, 5, 2, 28, 1, '', '', '68', 'WINDA WAHYU, A.Md.keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:25:12', NULL),
(1008, 68, 6, 2, 30, 1, '', '', '68', 'APRIANI SELVIA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:26:26', NULL),
(1009, 68, 6, 2, 28, 1, '', '', '68', 'ATY WAHYUNI, A. Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:27:52', NULL),
(1010, 68, 6, 2, 25, 1, '', '', '68', 'ROSITA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:31:04', NULL),
(1011, 68, 6, 2, 27, 1, '', '', '68', 'AMELIA SHOLEHAH A.Md, Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:32:57', NULL),
(1012, 68, 6, 2, 22, 1, '', '', '68', 'MARIA TRIMONITA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:34:29', NULL),
(1032, 56, 9, 2, 29, 1, '', '', '56', 'dr. META YULIA NINDITA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 10:42:21', NULL),
(1014, 68, 6, 2, 25, 1, '', '', '68', 'LIA KUSUMA WARDHANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:38:36', NULL),
(1015, 68, 6, 2, 26, 1, '', '', '68', 'LUCIA KURNIA DEWI UTAMI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:40:28', NULL),
(1016, 68, 6, 2, 26, 1, '', '', '68', 'RETNO PRAHESTY A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:42:19', NULL),
(1017, 60, 6, 2, 46, 1, '', '', '60', 'KURNI KUSNELA, A. Md., Kes', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:46:00', NULL),
(1018, 60, 6, 2, 31, 1, '', '', '60', 'YUDA RACHMADANI, A.Md.KG', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:47:42', NULL),
(1019, 60, 6, 1, 29, 1, '', '', '60', 'ARTONO AKBAR, A.Md.KG', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:49:15', NULL),
(1020, 60, 6, 2, 23, 1, '', '', '60', 'RISCA AYU ARIANTI, A.Md.Kes', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:50:57', NULL),
(1021, 60, 6, 2, 40, 1, '', '', '60', 'NOORLINA HAYATI, A.Md.Kes', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:52:19', NULL),
(1033, 56, 9, 2, 27, 1, '', '', '56', 'dr. DEA INTAN SORAYA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 10:44:07', NULL),
(1023, 104, 10, 1, 28, 1, '', '', '104', 'Hambowo S. Putro, A.AN., M.AP', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 14:59:38', NULL),
(1024, 104, 9, 1, 36, 1, '', '', '104', 'Melki Sedek', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 15:01:45', NULL),
(1025, 104, 9, 1, 35, 1, '', '', '104', 'H. Luthfi Ardy Prastyo, Lc', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-18 15:03:34', NULL),
(1034, 56, 9, 1, 28, 1, '', '', '56', 'dr. TRI ROHMANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 10:45:20', NULL),
(1030, 12, 9, 1, 30, 1, '', '', '12', 'HABIBI, S.Kep.Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 09:01:06', NULL),
(1035, 56, 9, 2, 30, 1, '', '', '56', 'dr. RINI WULANDARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 10:46:20', NULL),
(1036, 56, 10, 2, 32, 1, '', '', '56', 'dr. OKTAVIANA NIKEN PRAWITASARI, Sp.N', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 10:47:34', NULL),
(1037, 56, 9, 1, 28, 1, '', '', '56', 'dr. M.NOOR RAHMANSYAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 10:48:54', NULL),
(1038, 56, 9, 1, 26, 1, '', '', '56', 'dr. ARIA JAYA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 10:50:14', NULL),
(1039, 56, 9, 1, 36, 1, '', '', '56', 'dr. ABDI JAUHARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 10:53:50', NULL),
(1040, 56, 10, 1, 36, 1, '', '', '56', 'dr. YAN ADITYA, Sp.B', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 10:55:02', NULL),
(1041, 56, 9, 2, 26, 1, '', '', '56', 'dr. ELGA ELFINA OMPI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 10:56:12', NULL),
(1042, 56, 9, 2, 26, 1, '', '', '56', 'dr. NESSY RAINA SARA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 10:57:27', NULL),
(1045, 11, 9, 1, 52, 1, '', '', '11', 'HERMAN KAMIL', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:04:44', NULL),
(1046, 11, 9, 1, 34, 1, '', '', '11', 'MUHING', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:06:23', NULL),
(1047, 11, 9, 1, 23, 1, '', '', '11', 'AXCEL ARFRIANDO NARANG', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:07:55', NULL),
(1048, 11, 9, 1, 50, 1, '', '', '11', 'MIGUHARTAKU, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:09:16', NULL),
(1049, 11, 9, 1, 39, 1, '', '', '11', 'YANSEN LAMBONG', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:10:42', NULL),
(1050, 11, 9, 1, 53, 1, '', '', '11', 'H. SURJANA TAHER', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:11:39', NULL),
(1051, 11, 9, 1, 53, 1, '', '', '11', 'MIGUHARTAKU, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:12:54', NULL),
(1052, 11, 9, 1, 23, 1, '', '', '11', 'AXCEL ARFRIANDO NARANG', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:14:24', NULL),
(1053, 66, 6, 2, 36, 1, '', '', '66', 'SEPIRELAWATI, AMK', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:16:48', NULL),
(1054, 66, 6, 1, 30, 1, '', '', '66', 'KRIYA HENDRA, AMK', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:18:21', NULL),
(1055, 66, 6, 2, 39, 1, '', '', '66', 'NURUL HIDYAWATI, A. Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:19:30', NULL),
(1056, 66, 6, 1, 31, 1, '', '', '66', 'BOBBY, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:21:02', NULL),
(1057, 66, 6, 2, 25, 1, '', '', '66', 'SUMIATI, A.Md, Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:23:20', NULL),
(1058, 66, 6, 1, 26, 1, '', '', '66', 'REZA UTAMA PUTRA, A. Md. Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:24:45', NULL),
(1059, 66, 9, 2, 31, 1, '', '', '66', 'YULIANTI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:26:36', NULL),
(1060, 66, 6, 1, 30, 1, '', '', '66', 'MAULANA FATHUL GUNADI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:28:02', NULL),
(1061, 66, 9, 2, 27, 1, '', '', '66', 'DEVI NOVIA, S.Kep.Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:29:50', NULL),
(1062, 66, 6, 2, 24, 1, '', '', '66', 'YENTRI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:31:11', NULL),
(1063, 66, 6, 2, 30, 1, '', '', '66', 'DEWI DESIANA PUSPITASARI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:32:18', NULL),
(1064, 66, 6, 1, 31, 1, '', '', '66', 'ARIEF NURUL AZIZ, AMK', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 11:59:46', NULL),
(1065, 66, 6, 1, 32, 1, '', '', '66', 'TAJODIN NOOR. A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 12:01:17', NULL),
(1066, 66, 6, 1, 33, 1, '', '', '66', 'A. YANI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2021-08-19 12:03:04', NULL),
(1067, 42, 3, 1, 51, 1, '', '', '42', 'GETSON IYEM', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-20 10:30:37', NULL),
(1068, 42, 3, 1, 57, 1, '', '', '42', 'HARLIANSYAH', NULL, 4, 4, 4, 3, 4, 4, 4, 3, 3, NULL, '', '-', '33', '2021-08-20 10:35:30', NULL),
(1069, 42, 3, 1, 54, 1, '', '', '42', 'YULIUS ALIANTO', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-20 10:36:15', NULL),
(1070, 42, 3, 1, 41, 1, '', '', '42', 'IWAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-20 10:38:03', NULL),
(1071, 42, 3, 1, 0, 1, '', '', '42', 'FAHRIZAL', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-20 10:40:41', NULL),
(1072, 42, 3, 1, 48, 1, '', '', '42', 'MIGUHARTAKU', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-20 10:42:29', NULL),
(1073, 42, 9, 1, 56, 1, '', '', '42', 'GUNTUR AMIT,S.PD', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-20 10:43:29', NULL),
(1074, 42, 3, 1, 28, 1, '', '', '42', 'HENDRA', NULL, 4, 4, 4, 3, 3, 4, 4, 4, 4, NULL, '', '-', '34', '2021-08-20 10:46:07', NULL),
(1075, 42, 3, 1, 52, 1, '', '', '42', 'AMIEK SURATNA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-20 10:49:30', NULL),
(1076, 42, 3, 1, 45, 1, '', '', '42', 'HATNAH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-20 10:50:13', NULL),
(1077, 42, 2, 1, 46, 1, '', '', '42', 'THEOPILOS INDRA GUNAWAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-20 10:51:04', NULL),
(1078, 42, 2, 1, 58, 1, '', '', '42', 'H. ARDIANSYAH', NULL, 3, 3, 3, 3, 3, 3, 4, 4, 3, NULL, '', '-', '29', '2021-08-20 10:53:16', NULL),
(1079, 42, 3, 1, 41, 1, '', '', '42', 'EBED KADARUSMAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 3, NULL, '', '-', '34', '2021-08-20 10:53:53', NULL),
(1080, 42, 9, 1, 25, 1, '', '', '42', 'NEGU', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-20 10:56:08', NULL),
(1081, 42, 3, 1, 46, 1, '', '', '42', 'DANIEL HARISON', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-20 10:57:34', NULL),
(1082, 42, 3, 1, 26, 1, '', '', '42', 'AHMAD ZAINI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-20 10:58:17', NULL),
(1083, 42, 3, 1, 48, 1, '', '', '42', 'HADI HIDAYAT', NULL, 3, 3, 3, 3, 4, 3, 4, 4, 3, NULL, '', '-', '30', '2021-08-20 10:59:12', NULL),
(1084, 42, 3, 1, 45, 1, '', '', '42', 'SAMSURI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-20 11:01:24', NULL),
(1085, 42, 3, 1, 54, 1, '', '', '42', 'SUKIAT', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 08:00:38', NULL),
(1086, 42, 3, 1, 24, 1, '', '', '42', 'DAVIN HARTONO', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-23 08:02:10', NULL),
(1087, 42, 2, 1, 58, 1, '', '', '42', 'YURIANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 08:54:42', NULL),
(1088, 42, 3, 1, 36, 1, '', '', '42', 'MELKI SEDEK', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-23 08:57:06', NULL),
(1089, 42, 3, 1, 41, 1, '', '', '42', 'Hj. FATIMAH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 08:58:14', NULL),
(1090, 42, 3, 1, 55, 1, '', '', '42', 'MUHAMAD JASA', NULL, 3, 3, 3, 3, 3, 4, 4, 4, 4, NULL, '', '-', '31', '2021-08-23 09:00:09', NULL),
(1091, 42, 3, 1, 54, 1, '', '', '42', 'H. BAHRIANSYAH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:01:41', NULL),
(1092, 42, 3, 1, 53, 1, '', '', '42', 'RUNALHARD WAWAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:04:34', NULL),
(1093, 42, 3, 1, 48, 1, '', '', '42', 'MIGUHARTAKU, SE', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-23 09:05:57', NULL),
(1094, 42, 3, 1, 44, 1, '', '', '42', 'CV. CIPTA JAYA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-23 09:08:03', NULL),
(1095, 42, 3, 2, 42, 1, '', '', '42', 'SORYATIE', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:09:28', NULL),
(1096, 42, 3, 2, 53, 1, '', '', '42', 'IRIANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:11:12', NULL),
(1097, 42, 3, 1, 64, 1, '', '', '42', 'BERDY K. ANDIN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:12:35', NULL),
(1098, 42, 3, 1, 57, 1, '', '', '42', 'CHANDRA OKTAVIA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:13:29', NULL),
(1099, 42, 3, 1, 32, 1, '', '', '42', 'RIKSAN PASARIBU', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:14:08', NULL),
(1100, 42, 3, 1, 59, 1, '', '', '42', 'IPONG', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:28:08', NULL),
(1101, 42, 3, 2, 60, 1, '', '', '42', 'Hj. RUKMINI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:29:47', NULL),
(1102, 42, 3, 1, 69, 1, '', '', '42', 'HELMAN AMUR SAPILAH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:30:38', NULL),
(1103, 42, 3, 1, 54, 1, '', '', '42', 'WILYADY', NULL, 4, 3, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2021-08-23 09:33:04', NULL),
(1104, 42, 3, 1, 46, 1, '', '', '42', 'GUSVINE MILANDANG', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-23 09:34:18', NULL),
(1105, 42, 9, 1, 57, 1, '', '', '42', 'TRI JOKO, SH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:35:36', NULL),
(1106, 42, 3, 1, 33, 1, '', '', '42', 'AING SUBARI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-23 09:36:52', NULL),
(1107, 42, 3, 1, 34, 1, '', '', '42', 'AHMAD RAFI\'I', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:38:35', NULL),
(1108, 42, 9, 1, 56, 1, '', '', '42', 'RIKI WILSON UNJUNG, ST', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:41:13', NULL),
(1109, 42, 3, 1, 25, 1, '', '', '42', 'ADITYA PRAWIRA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:50:04', NULL),
(1110, 42, 9, 1, 41, 1, '', '', '42', 'ROBERT, ST', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:50:36', NULL),
(1111, 42, 3, 1, 39, 1, '', '', '42', 'GHINO SHEFED', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:51:14', NULL),
(1112, 42, 3, 1, 39, 1, '', '', '42', 'GHINO SHEFED', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:52:46', NULL),
(1113, 42, 3, 1, 52, 1, '', '', '42', 'ELYADI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:53:23', NULL),
(1114, 42, 3, 1, 30, 1, '', '', '42', 'CHANDRA PALUSAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-23 09:54:20', NULL),
(1115, 42, 3, 1, 46, 1, '', '', '42', 'KARDOLIANSYAH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:57:13', NULL),
(1116, 42, 9, 2, 31, 1, '', '', '42', 'EKA FITRIANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 09:57:51', NULL),
(1117, 42, 9, 2, 36, 1, '', '', '42', 'MAIMUNAH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:03:46', NULL),
(1118, 42, 3, 1, 54, 1, '', '', '42', 'JUMIANINGSIH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:04:29', NULL),
(1119, 42, 3, 1, 36, 1, '', '', '42', 'HARIWINOTO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:05:46', NULL),
(1120, 42, 3, 2, 46, 1, '', '', '42', 'WIDIYAWATI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:06:17', NULL),
(1121, 42, 3, 1, 44, 1, '', '', '42', 'RUSPENDI', NULL, 4, 3, 3, 3, 3, 3, 4, 4, 3, NULL, '', '-', '30', '2021-08-23 10:07:53', NULL),
(1122, 42, 3, 1, 27, 1, '', '', '42', 'RIFQI HILMAN FAKHRI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:11:20', NULL),
(1123, 42, 3, 1, 50, 1, '', '', '42', 'SAINI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:13:02', NULL),
(1124, 42, 2, 1, 50, 1, '', '', '42', 'ISWANTO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:13:35', NULL),
(1125, 42, 9, 1, 58, 1, '', '', '42', 'ELYADI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:14:17', NULL),
(1126, 42, 3, 1, 35, 1, '', '', '42', 'MUHAMMAD', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:15:06', NULL),
(1127, 42, 3, 1, 46, 1, '', '', '42', 'AHMADI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:16:16', NULL),
(1128, 42, 3, 1, 46, 1, '', '', '42', 'AHMADI', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-23 10:17:11', NULL),
(1129, 42, 3, 2, 31, 1, '', '', '42', 'SRI ASTUTI HANDAYANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:18:06', NULL),
(1130, 42, 3, 1, 40, 1, '', '', '42', 'MISRAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-23 10:18:35', NULL),
(1131, 42, 2, 1, 52, 1, '', '', '42', 'TRIO DARMO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:19:12', NULL),
(1132, 42, 9, 2, 40, 1, '', '', '42', 'MARIANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:19:51', NULL),
(1133, 42, 3, 2, 63, 1, '', '', '42', 'LILIE RANAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:20:37', NULL),
(1134, 42, 3, 1, 26, 1, '', '', '42', 'TOMMI ADE PUTRA', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-23 10:21:13', NULL),
(1135, 42, 9, 1, 24, 1, '', '', '42', 'AXCEL ARFRIANDO NARANG', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:21:48', NULL),
(1136, 42, 6, 2, 44, 1, '', '', '42', 'YURIANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:22:54', NULL),
(1137, 42, 3, 1, 26, 1, '', '', '42', 'YOFY MAHENA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:25:23', NULL),
(1138, 42, 3, 1, 29, 1, '', '', '42', 'DONI ANDORI', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-23 10:25:55', NULL),
(1139, 42, 3, 2, 37, 1, '', '', '42', 'ENUR NORJANAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-23 10:26:35', NULL),
(1140, 42, 9, 2, 36, 1, '', '', '42', 'NENENG SRI MARYATI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:27:26', NULL),
(1141, 42, 9, 1, 44, 1, '', '', '42', 'HADI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:29:17', NULL),
(1142, 42, 3, 1, 30, 1, '', '', '42', 'HADI JOYO SUDIRO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:29:49', NULL),
(1143, 42, 3, 1, 42, 1, '', '', '42', 'ASRIANOOR', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-23 10:30:21', NULL),
(1144, 42, 3, 1, 31, 1, '', '', '42', 'SIRAJUL MUNIR', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:30:53', NULL),
(1145, 42, 3, 1, 35, 1, '', '', '42', 'RINA MANDARI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-23 10:31:23', NULL),
(1146, 42, 3, 1, 26, 1, '', '', '42', 'YOFY MAHENA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 11:45:47', NULL),
(1147, 42, 3, 1, 29, 1, '', '', '42', 'DONI ANDORI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 11:46:35', NULL),
(1148, 42, 3, 1, 37, 1, '', '', '42', 'ENUR NORJANAH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 11:47:27', NULL),
(1149, 42, 3, 1, 37, 1, '', '', '42', 'NENENG SRI MARYATI', NULL, 3, 4, 4, 3, 4, 4, 4, 4, 3, NULL, '', '-', '33', '2021-08-30 11:48:31', NULL),
(1150, 42, 3, 1, 44, 1, '', '', '42', 'HADI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-30 11:49:13', NULL),
(1151, 42, 3, 1, 30, 1, '', '', '42', 'HADI JOYO SUDIRO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-30 11:50:03', NULL),
(1152, 42, 3, 1, 42, 1, '', '', '42', 'ASRIANOOR', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 11:54:34', NULL),
(1153, 42, 3, 1, 31, 1, '', '', '42', 'SIRAJUL MUNIR', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 11:55:20', NULL),
(1154, 42, 3, 1, 35, 1, '', '', '42', 'RINA MANDARI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 11:57:15', NULL),
(1155, 42, 3, 1, 28, 1, '', '', '42', 'HERMAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 14:40:53', NULL),
(1156, 42, 3, 1, 23, 1, '', '', '42', 'SATRIA GIRINDRA WISNU PRADANA', NULL, 4, 4, 4, 3, 4, 3, 3, 3, 3, NULL, '', '-', '31', '2021-08-30 14:42:35', NULL),
(1157, 42, 3, 2, 39, 1, '', '', '42', 'Hj. HALIPAH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 14:43:10', NULL),
(1158, 42, 9, 2, 49, 1, '', '', '42', 'ERA, S. PD', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 14:43:59', NULL),
(1159, 42, 3, 1, 55, 1, '', '', '42', 'ELKOSI', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-30 14:44:34', NULL),
(1160, 42, 3, 1, 46, 1, '', '', '42', 'NYONO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 14:45:46', NULL),
(1161, 42, 3, 1, 49, 1, '', '', '42', 'IMIN SUPITRI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 14:46:29', NULL),
(1162, 42, 3, 1, 58, 1, '', '', '42', 'SUPRIADI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 14:47:50', NULL),
(1163, 42, 3, 1, 51, 1, '', '', '42', 'BUDI SUDIANTORO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 14:49:26', NULL),
(1164, 42, 3, 1, 27, 1, '', '', '42', 'DANIEL KUSMAN', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-30 14:53:00', NULL),
(1165, 42, 3, 1, 28, 1, '', '', '42', 'ZASERS OGGIE PUTRA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 14:53:42', NULL),
(1166, 42, 3, 1, 54, 1, '', '', '42', 'ADRIAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 14:54:24', NULL),
(1167, 42, 3, 1, 29, 1, '', '', '42', 'BUDIARTO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-30 14:55:04', NULL),
(1168, 42, 3, 1, 33, 1, '', '', '42', 'BAHRIANOOR', NULL, 4, 4, 4, 3, 3, 3, 3, 3, 3, NULL, '', '-', '30', '2021-08-30 14:55:44', NULL),
(1169, 42, 3, 2, 36, 1, '', '', '42', 'MAIMUNAH', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-31 08:02:26', NULL),
(1170, 42, 3, 2, 54, 1, '', '', '42', 'JUMIANINGSIH', NULL, 4, 4, 4, 3, 3, 4, 4, 4, 3, NULL, '', '-', '33', '2021-08-31 08:03:09', NULL),
(1171, 42, 3, 1, 36, 1, '', '', '42', 'HARIWINOTO', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, '', '-', '27', '2021-08-31 08:04:31', NULL),
(1172, 42, 3, 1, 54, 1, '', '', '42', 'RUSPENDI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:08:07', NULL),
(1173, 42, 3, 1, 27, 1, '', '', '42', 'RIFQI HILMAN FAKHRI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:08:49', NULL),
(1174, 42, 3, 1, 60, 1, '', '', '42', 'SAINI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:11:09', NULL),
(1175, 42, 3, 1, 60, 1, '', '', '42', 'ISWANTO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:11:56', NULL),
(1176, 42, 3, 1, 58, 1, '', '', '42', 'ELYADI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:12:27', NULL),
(1177, 42, 3, 1, 35, 1, '', '', '42', 'MUHAMMAD', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:13:03', NULL),
(1178, 42, 3, 1, 46, 1, '', '', '42', 'AHMADI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:13:38', NULL),
(1179, 42, 3, 2, 31, 1, '', '', '42', 'SRI ASTUTI HANDAYANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:14:11', NULL),
(1180, 42, 3, 1, 40, 1, '', '', '42', 'MISRAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:14:40', NULL),
(1181, 42, 3, 1, 52, 1, '', '', '42', 'TRIO DARMO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:15:15', NULL),
(1182, 42, 9, 2, 40, 1, '', '', '42', 'MARIANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:15:45', NULL),
(1183, 42, 3, 2, 63, 1, '', '', '42', 'LILIE RANAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:16:17', NULL),
(1184, 42, 3, 1, 26, 1, '', '', '42', 'TOMMI ADE PUTRA', NULL, 4, 4, 4, 3, 4, 4, 4, 3, 3, NULL, '', '-', '33', '2021-08-31 08:16:51', NULL),
(1185, 42, 9, 1, 24, 1, '', '', '42', 'AXCEL ARFRIANDO NARANG', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:17:25', NULL),
(1186, 42, 3, 2, 43, 1, '', '', '42', 'YURIANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2021-08-31 08:18:22', NULL),
(1187, 42, 9, 1, 32, 1, '', '', '42', 'DEKI SUWANTO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 14:59:21', NULL),
(1188, 42, 3, 2, 40, 1, '', '', '42', 'Agustina', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:00:53', NULL),
(1189, 42, 9, 1, 42, 1, '', '', '42', 'IWAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:03:08', NULL),
(1190, 42, 9, 1, 34, 1, '', '', '42', 'HELDI SUSANTA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:05:19', NULL),
(1191, 42, 3, 1, 49, 1, '', '', '42', 'A. ALIYASRI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:11:01', NULL),
(1192, 97, 3, 1, 43, 1, '', '', '97', 'NOVIALITA', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2022-04-07 15:12:05', NULL),
(1193, 97, 9, 2, 46, 1, '', '', '97', 'PURWIYULIATI, S.Pd', NULL, 3, 3, 4, 4, 3, 3, 4, 4, 3, NULL, '', '-', '31', '2022-04-07 15:13:38', NULL),
(1194, 42, 9, 1, 53, 1, '', '', '42', 'H. IBERAHIM, S.Sos', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:14:08', NULL),
(1195, 97, 3, 2, 37, 1, '', '', '97', 'SITI KAMARIAH', NULL, 3, 4, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '29', '2022-04-07 15:14:55', NULL),
(1196, 97, 9, 2, 40, 1, '', '', '97', 'MARTIAH, S.Pd', NULL, 4, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '29', '2022-04-07 15:15:56', NULL),
(1197, 42, 10, 1, 42, 1, '', '', '42', 'EBED KADARUSMAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:16:26', NULL),
(1198, 97, 9, 2, 38, 1, '', '', '97', 'UTAMI, S.Pd. AUD', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-07 15:17:24', NULL),
(1199, 42, 3, 2, 52, 1, '', '', '42', 'DIANG', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:18:28', NULL),
(1200, 97, 9, 2, 47, 1, '', '', '97', 'YAYUK MARKHAMAH, S.Pd. AUD', NULL, 4, 3, 3, 4, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2022-04-07 15:18:33', NULL),
(1201, 97, 9, 2, 36, 1, '', '', '97', 'SUMARTINI , S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 3, NULL, '', '-', '35', '2022-04-07 15:19:21', NULL),
(1202, 97, 3, 2, 46, 1, '', '', '97', 'SITI MASITAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 3, NULL, '', '-', '35', '2022-04-07 15:20:25', NULL),
(1203, 42, 9, 2, 51, 1, '', '', '42', 'LILIANAWATY', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:20:34', NULL),
(1204, 97, 9, 2, 39, 1, '', '', '97', 'ARNIE ARIFATI, S.Pd', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-07 15:21:07', NULL),
(1205, 42, 9, 1, 46, 1, '', '', '42', 'SAMSURI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:22:15', NULL),
(1206, 42, 9, 1, 49, 1, '', '', '42', 'HADI HIDAYAT', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:23:39', NULL),
(1207, 97, 9, 2, 37, 1, '', '', '97', 'HERMIN, S.Pd. AUD', NULL, 4, 4, 4, 4, 4, 4, 4, 3, 3, NULL, '', '-', '34', '2022-04-07 15:23:50', NULL),
(1208, 97, 3, 2, 49, 1, '', '', '97', 'SOLISTIAWATI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-07 15:24:31', NULL),
(1209, 97, 3, 2, 38, 1, '', '', '97', 'MARHAMAH', NULL, 4, 4, 4, 4, 4, 4, 4, 3, 3, NULL, '', '-', '34', '2022-04-07 15:25:29', NULL),
(1210, 97, 9, 2, 54, 1, '', '', '97', 'RASYIDAH, SPd.I', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 3, NULL, '', '-', '35', '2022-04-07 15:26:37', NULL),
(1211, 42, 9, 1, 38, 1, '', '', '42', 'DANIEL HARISON', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:27:00', NULL),
(1212, 97, 3, 2, 39, 1, '', '', '97', 'NI KETUT YUNITASARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-07 15:27:17', NULL),
(1213, 97, 6, 2, 36, 1, '', '', '97', 'NORMA, A.Md', NULL, 4, 4, 4, 4, 3, 3, 4, 3, 3, NULL, '', '-', '32', '2022-04-07 15:28:08', NULL),
(1214, 42, 9, 1, 27, 1, '', '', '42', 'AHMAD ZAINI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:28:39', NULL),
(1215, 97, 9, 2, 38, 1, '', '', '97', 'HESTI BUDIANI, S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-07 15:28:55', NULL),
(1216, 97, 9, 2, 47, 1, '', '', '97', 'DWI YULI HANDAYANI, SPd.I', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-07 15:29:41', NULL),
(1217, 97, 3, 2, 53, 1, '', '', '97', 'ANIS SHOLIKAH', NULL, 4, 4, 4, 4, 3, 3, 4, 4, 4, NULL, '', '-', '34', '2022-04-07 15:30:30', NULL),
(1218, 97, 9, 2, 38, 1, '', '', '97', 'JUMIATI, S.Pd. I', NULL, 4, 4, 4, 4, 4, 3, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:33:12', NULL),
(1219, 42, 9, 1, 52, 1, '', '', '42', 'WAJIYO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:35:10', NULL),
(1220, 97, 9, 2, 46, 1, '', '', '97', 'FAUZIA RAHMAH, S.Pd. I', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-07 15:36:43', NULL),
(1221, 42, 6, 2, 31, 1, '', '', '42', 'KARMILA SARI DEWI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-07 15:37:22', NULL),
(1222, 97, 3, 2, 42, 1, '', '', '97', 'BERTAWATIE', NULL, 4, 4, 3, 4, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:10:23', NULL),
(1223, 97, 3, 2, 46, 1, '', '', '97', 'INDAH MULYANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 08:19:54', NULL),
(1224, 97, 3, 2, 45, 1, '', '', '97', 'SEKAR FAJARIAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 08:22:42', NULL),
(1225, 97, 9, 2, 44, 1, '', '', '97', 'SANTI NORIYAH, S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 08:25:27', NULL),
(1226, 97, 3, 2, 53, 1, '', '', '97', 'MARIFAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 08:28:00', NULL),
(1227, 42, 3, 1, 39, 1, '', '', '42', 'ZAINI ANWAR', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:28:17', NULL),
(1228, 42, 3, 1, 38, 1, '', '', '42', 'ZAINI ANWAR', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:30:24', NULL),
(1229, 97, 9, 1, 53, 1, '', '', '97', 'BUMBUNG, S. Pd', NULL, 4, 4, 4, 4, 4, 4, 3, 4, 3, NULL, '', '-', '34', '2022-04-08 08:31:22', NULL),
(1230, 42, 9, 1, 43, 1, '', '', '42', 'YONYTA KARTIKA SARI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:32:20', NULL),
(1231, 97, 3, 2, 47, 1, '', '', '97', 'VIVIN DEVITA', NULL, 4, 4, 4, 4, 4, 4, 4, 3, 3, NULL, '', '-', '34', '2022-04-08 08:33:46', NULL),
(1232, 42, 6, 1, 47, 1, '', '', '42', 'ASMANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:33:57', NULL),
(1233, 42, 3, 1, 19, 1, '', '', '42', 'GERY GLEN JUNIARTA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:35:45', NULL),
(1234, 97, 9, 2, 41, 1, '', '', '97', 'RINI FATMAWATI, S.Pd', NULL, 4, 4, 4, 4, 4, 3, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:36:00', NULL),
(1235, 97, 9, 2, 47, 1, '', '', '97', 'PUSPA JAYANTI, S.Pd', NULL, 4, 4, 3, 4, 3, 4, 4, 4, 4, NULL, '', '-', '34', '2022-04-08 08:37:59', NULL),
(1236, 42, 3, 1, 46, 1, '', '', '42', 'AKHMAD WAHYUNI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:39:55', NULL),
(1237, 42, 3, 2, 52, 1, '', '', '42', 'IRIANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:41:11', NULL),
(1238, 42, 9, 1, 45, 1, '', '', '42', 'DALIL SHOFWAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:42:44', NULL),
(1239, 42, 9, 1, 35, 1, '', '', '42', 'M. ALI RIDANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:45:03', NULL),
(1240, 42, 9, 2, 43, 1, '', '', '42', 'VERAWATY, SE', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:48:45', NULL),
(1241, 42, 3, 1, 56, 1, '', '', '42', 'UNTUNG I. TINUS', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:50:45', NULL),
(1242, 42, 9, 1, 35, 1, '', '', '42', 'SAMSUL HADI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:53:45', NULL),
(1243, 68, 6, 2, 36, 1, '', '', '68', 'ENI MEIWANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 08:56:31', NULL),
(1244, 68, 6, 2, 52, 1, '', '', '68', 'YUNASI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 3, 4, NULL, '', '-', '35', '2022-04-08 08:57:08', NULL),
(1245, 68, 6, 2, 41, 1, '', '', '68', 'SRI KUMALA AGUNG MANGKU SARI SUGIHARTI', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 4, NULL, '', '-', '29', '2022-04-08 08:57:56', NULL),
(1246, 68, 6, 2, 29, 1, '', '', '68', 'ELLY ROYANI, A.Md.Keb', NULL, 3, 3, 3, 4, 4, 4, 4, 3, 3, NULL, '', '-', '31', '2022-04-08 08:58:31', NULL),
(1247, 68, 6, 2, 38, 1, '', '', '68', 'HERLINA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 08:59:06', NULL),
(1248, 42, 3, 1, 48, 1, '', '', '42', 'NUR HIDAYAT', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 08:59:29', NULL),
(1249, 68, 6, 2, 29, 1, '', '', '68', 'PEBRINAE', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-08 08:59:37', NULL),
(1250, 68, 6, 2, 31, 1, '', '', '68', 'MERANTI UTARI, A.Md.Keb', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-08 09:00:07', NULL),
(1251, 68, 6, 2, 48, 1, '', '', '68', 'HJ. NIDA HERZIANTI, A.Md.Keb', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2022-04-08 09:00:50', NULL),
(1252, 42, 9, 1, 32, 1, '', '', '42', 'SIRAJUL MUNIR', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 09:01:08', NULL),
(1253, 42, 9, 1, 47, 1, '', '', '42', 'JONI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 09:02:28', NULL),
(1254, 42, 9, 2, 30, 1, '', '', '42', 'KIKI ANDRIANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 09:03:58', NULL),
(1255, 68, 6, 2, 42, 1, '', '', '68', 'MARISSA KAROLINA BR GINTING, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 09:12:35', NULL),
(1256, 42, 3, 1, 48, 1, '', '', '42', 'HARDIANTO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 09:13:19', NULL),
(1257, 68, 6, 2, 32, 1, '', '', '68', 'RISKAWATI KRISTIANA DEWI HUTAPEA, A. Md. Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 09:13:24', NULL),
(1258, 42, 9, 1, 41, 1, '', '', '42', 'SURYADINIAGA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 09:15:59', NULL),
(1259, 42, 9, 1, 29, 1, '', '', '42', 'DUNDI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 09:20:55', NULL),
(1260, 68, 6, 2, 42, 1, '', '', '68', 'YUSIANA FERONICA, A.Md.Keb', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-08 09:21:57', NULL),
(1261, 68, 6, 2, 42, 1, '', '', '68', 'HALIMAH, A.Md Keb', NULL, 4, 4, 4, 4, 3, 4, 3, 4, 3, NULL, '', '-', '33', '2022-04-08 09:22:39', NULL),
(1262, 68, 9, 2, 24, 1, '', '', '68', 'NUNUNG MEGAPURI, S.Tr.Keb.,Bdn', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 09:23:23', NULL),
(1263, 68, 6, 2, 43, 1, '', '', '68', 'UMMI NUR AENINGSIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 09:24:20', NULL),
(1264, 68, 9, 2, 35, 1, '', '', '68', 'SANTI SANDRA, S.ST', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-08 09:24:54', NULL),
(1265, 68, 9, 2, 36, 1, '', '', '68', 'NUNUNG MEGAPURI, S.Tr.Keb.,Bdn', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 09:25:37', NULL),
(1266, 68, 6, 2, 40, 1, '', '', '68', 'KASIYANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 09:26:07', NULL),
(1267, 68, 6, 2, 48, 1, '', '', '68', 'YUNASI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 09:26:39', NULL),
(1268, 68, 6, 2, 41, 1, '', '', '68', 'NANIE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-08 09:27:17', NULL),
(1269, 42, 3, 1, 42, 1, '', '', '42', 'RUSAINI ASRAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 10:11:02', NULL),
(1270, 42, 9, 1, 40, 1, '', '', '42', 'GHINO SHEFED', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 10:12:30', NULL),
(1271, 42, 9, 1, 27, 1, '', '', '42', 'GHINO SHEFED', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 10:14:27', NULL),
(1272, 42, 9, 1, 34, 1, '', '', '42', 'AING SUBARI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-08 10:16:54', NULL),
(1273, 68, 6, 2, 36, 1, '', '', '68', 'ASTUTI PURWANINGSIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:37:08', NULL),
(1274, 68, 6, 2, 32, 1, '', '', '68', 'HAMDANAH, A.Md.Keb', NULL, 4, 4, 4, 4, 3, 3, 4, 4, 4, NULL, '', '-', '34', '2022-04-11 08:37:44', NULL),
(1275, 68, 6, 2, 32, 1, '', '', '68', 'TRIANA SETIA HANDAYANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:38:37', NULL),
(1276, 66, 6, 2, 26, 1, '', '', '66', 'KURNIATI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:39:19', NULL),
(1277, 42, 9, 1, 57, 1, '', '', '42', 'RIKI WILSON UNJUNG, ST', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 08:40:54', NULL);
INSERT INTO `tblhasilsurvei` (`tblhasilsurvei_id`, `refjenisizinikm_id`, `reftingkatpendidikan_id`, `refsex_id`, `tblhasilsurvei_usia`, `refloket_id`, `tblhasilsurvei_caradaftar`, `tblhasilsurvei_pengurusan`, `refjenisizinikm_nama`, `tblhasilsurvei_nama`, `tblhasilsurvei_nip`, `tblhasilsurvei_pertanyaan1`, `tblhasilsurvei_pertanyaan2`, `tblhasilsurvei_pertanyaan3`, `tblhasilsurvei_pertanyaan4`, `tblhasilsurvei_pertanyaan5`, `tblhasilsurvei_pertanyaan6`, `tblhasilsurvei_pertanyaan7`, `tblhasilsurvei_pertanyaan8`, `tblhasilsurvei_pertanyaan9`, `tblhasilsurvei_pertanyaan10`, `tblhasilsurvei_penilaian`, `tblhasilsurvei_saran`, `tblhasilsurvei_total`, `tblhasilsurvei_syscreate`, `tblhasilsurvei_sysupdate`) VALUES
(1278, 68, 6, 2, 25, 1, '', '', '68', 'JUMIATI, A.Md.Keb', NULL, 4, 4, 4, 4, 3, 3, 3, 4, 4, NULL, '', '-', '33', '2022-04-11 08:41:44', NULL),
(1279, 68, 6, 2, 30, 1, '', '', '68', 'NOVITA SARI, A.Md.Keb', NULL, 4, 4, 4, 4, 3, 3, 4, 4, 4, NULL, '', '-', '34', '2022-04-11 08:42:28', NULL),
(1280, 66, 6, 2, 30, 1, '', '', '66', 'YUVITA PRILIA NAPIRA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:44:34', NULL),
(1281, 125, 9, 1, 30, 1, '', '', '125', 'DEKI SUWANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:44:52', NULL),
(1282, 68, 6, 2, 42, 1, '', '', '68', 'MEINAWATIE, A.Md.Keb', NULL, 3, 3, 4, 4, 4, 3, 4, 4, 4, NULL, '', '-', '33', '2022-04-11 08:45:09', NULL),
(1283, 68, 6, 2, 24, 1, '', '', '68', 'NOR REKA YULITA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:45:52', NULL),
(1284, 66, 6, 2, 29, 1, '', '', '66', 'RUMILA, A.Md.,Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:45:53', NULL),
(1285, 125, 9, 2, 35, 1, '', '', '125', 'AGUSTINA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:45:58', NULL),
(1286, 68, 6, 2, 29, 1, '', '', '68', 'MIYANG DEWIANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:46:37', NULL),
(1287, 125, 9, 2, 32, 1, '', '', '125', 'SULIYANTI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:46:59', NULL),
(1288, 68, 6, 2, 28, 1, '', '', '68', 'MIYANG DEWIANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:47:36', NULL),
(1289, 66, 9, 1, 26, 1, '', '', '66', 'MEMET HENRY SANTIKA, S.Kep,.Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:47:49', NULL),
(1290, 125, 9, 1, 36, 1, '', '', '125', 'IWAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:49:40', NULL),
(1291, 66, 6, 2, 31, 1, '', '', '66', 'RAHMAWATI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:49:56', NULL),
(1292, 125, 6, 2, 27, 1, '', '', '125', 'AYU MAWARNI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:50:43', NULL),
(1293, 66, 6, 2, 29, 1, '', '', '66', 'CAHYANDARI DWI PUTRI, A.Md.,Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:50:46', NULL),
(1294, 68, 6, 2, 28, 1, '', '', '68', 'NOVI CHRISTIANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:50:48', NULL),
(1295, 68, 6, 2, 28, 1, '', '', '68', 'SOFYA KHARISMARIA PUTRI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 3, 3, NULL, '', '-', '34', '2022-04-11 08:51:43', NULL),
(1296, 125, 9, 2, 25, 1, '', '', '125', 'dR. TIARA ROIDAH MARWASARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:52:14', NULL),
(1297, 66, 6, 2, 28, 1, '', '', '66', 'EKA NATARIAYANA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:52:19', NULL),
(1298, 68, 6, 2, 45, 1, '', '', '68', 'FIRQAH RIYADLAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 3, 4, NULL, '', '-', '35', '2022-04-11 08:52:39', NULL),
(1299, 125, 3, 1, 38, 1, '', '', '125', 'A. ALIYASRI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:53:10', NULL),
(1300, 68, 6, 2, 50, 1, '', '', '68', 'ELLY WAHYU NINGSIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 3, 4, 4, NULL, '', '-', '35', '2022-04-11 08:53:45', NULL),
(1301, 66, 6, 1, 31, 1, '', '', '66', 'RAMADIANSYAH, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:54:19', NULL),
(1302, 125, 9, 1, 50, 1, '', '', '125', 'H. IBERAHIM', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:54:59', NULL),
(1303, 66, 6, 1, 30, 1, '', '', '66', 'AHMAD ROHIM, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:55:15', NULL),
(1304, 66, 6, 1, 46, 1, '', '', '66', 'YOPIE JEFRIE MOKOROWU, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:56:03', NULL),
(1305, 125, 9, 1, 22, 1, '', '', '125', 'RESTU ASHA FAUZAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:56:19', NULL),
(1306, 125, 9, 1, 22, 1, '', '', '125', 'RESTU ASHA FAUZAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:56:20', NULL),
(1307, 68, 6, 2, 34, 1, '', '', '68', 'MERLIANA, A.Md.Keb', NULL, 3, 3, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2022-04-11 08:57:07', NULL),
(1308, 125, 9, 1, 23, 1, '', '', '125', 'MUHAMMAD BAHTIAR', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:57:11', NULL),
(1309, 68, 6, 2, 33, 1, '', '', '68', 'OKTAVINA TUWENTY, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:57:46', NULL),
(1310, 66, 6, 1, 34, 1, '', '', '66', 'DWI JOKO ADY NUGROHO, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:57:58', NULL),
(1311, 125, 6, 2, 20, 1, '', '', '125', 'EVI SOLINA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:58:22', NULL),
(1312, 68, 6, 2, 27, 1, '', '', '68', 'DWI NUSA INDAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:58:29', NULL),
(1313, 68, 6, 2, 45, 1, '', '', '68', 'SUTARI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:59:04', NULL),
(1314, 66, 6, 1, 34, 1, '', '', '66', 'MARADONA, S.Kep.,Ns', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:59:11', NULL),
(1315, 125, 10, 1, 45, 1, '', '', '125', 'EBED KADARUSMAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:59:16', NULL),
(1316, 68, 6, 2, 23, 1, '', '', '68', 'KRISTIN ADERISTA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 08:59:45', NULL),
(1317, 66, 9, 2, 36, 1, '', '', '66', 'RIRI PRAMITA, S.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:00:19', NULL),
(1318, 66, 6, 2, 33, 1, '', '', '66', 'RISTA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:01:15', NULL),
(1319, 125, 6, 2, 20, 1, '', '', '125', 'YUPITA PRILIA NAPIRA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:01:22', NULL),
(1320, 42, 3, 2, 43, 1, '', '', '42', 'MELIWATY', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:02:07', NULL),
(1321, 66, 6, 1, 33, 1, '', '', '66', 'TULUS I. JATTA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:02:08', NULL),
(1322, 125, 6, 2, 26, 1, '', '', '125', 'RUMILA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:02:24', NULL),
(1323, 42, 3, 1, 43, 1, '', '', '42', 'ABD RAHMAN ARHABAS', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:02:44', NULL),
(1324, 66, 9, 2, 42, 1, '', '', '66', 'ELSINE MANTUH, S.Kep.,Ns', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:02:58', NULL),
(1325, 42, 3, 1, 45, 1, '', '', '42', 'JANTO ARROYAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:03:57', NULL),
(1326, 66, 6, 2, 45, 1, '', '', '66', 'MARIANI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:04:13', NULL),
(1327, 66, 9, 2, 46, 1, '', '', '66', 'IRMANAWATI, S.Kep.,Ns.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:05:15', NULL),
(1328, 42, 3, 1, 35, 1, '', '', '42', 'JAJANG SUPRIYATNA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:06:01', NULL),
(1329, 66, 6, 1, 26, 1, '', '', '66', 'REZA UTAMA PUTRA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:06:52', NULL),
(1330, 42, 3, 1, 32, 1, '', '', '42', 'ALDI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:06:59', NULL),
(1331, 42, 3, 1, 32, 1, '', '', '42', 'ALDI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:07:00', NULL),
(1332, 42, 3, 1, 32, 1, '', '', '42', 'RIFQI HILMAN FAKHRI', NULL, 4, 3, 3, 3, 3, 4, 4, 4, 4, NULL, '', '-', '32', '2022-04-11 09:07:44', NULL),
(1333, 66, 6, 2, 34, 1, '', '', '66', 'A.Yani A.Md,. Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:07:52', NULL),
(1334, 42, 3, 1, 27, 1, '', '', '42', 'HAIKAL FARIZI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:08:43', NULL),
(1335, 66, 9, 2, 30, 1, '', '', '66', 'ANITA VIRGINIA, S.Kep.,Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:08:47', NULL),
(1336, 42, 3, 2, 46, 1, '', '', '42', 'SORYATIE', NULL, 4, 4, 4, 3, 4, 4, 3, 4, 4, NULL, '', '-', '34', '2022-04-11 09:09:22', NULL),
(1337, 66, 9, 2, 41, 1, '', '', '66', 'FITRIANI, S. Kep,. Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:09:47', NULL),
(1338, 42, 3, 1, 42, 1, '', '', '42', 'ISWANTO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:10:01', NULL),
(1339, 66, 6, 2, 30, 1, '', '', '66', 'TIA MAYUNI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:10:38', NULL),
(1340, 42, 3, 1, 39, 1, '', '', '42', 'CHANDRA OKTAVIA RINGKANG', NULL, 4, 4, 4, 3, 3, 4, 4, 4, 4, NULL, '', '-', '34', '2022-04-11 09:10:54', NULL),
(1341, 66, 6, 2, 32, 1, '', '', '66', 'IRMA YUNITA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:11:34', NULL),
(1342, 42, 9, 1, 43, 1, '', '', '42', 'PURWANTO, SE', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:11:34', NULL),
(1343, 42, 9, 1, 43, 1, '', '', '42', 'PT. BHAKTI IDOLA TAMA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:12:13', NULL),
(1344, 66, 9, 2, 32, 1, '', '', '66', 'IKE NURNANINGSIH, S.Kep.,Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:12:37', NULL),
(1345, 66, 6, 2, 31, 1, '', '', '66', 'WIDITA KERTTIYASA AMINORA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:13:42', NULL),
(1346, 42, 9, 1, 42, 1, '', '', '42', 'DANIEL KUSMAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:16:49', NULL),
(1347, 125, 3, 2, 45, 1, '', '', '125', 'Diang', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:17:51', NULL),
(1348, 42, 9, 1, 36, 1, '', '', '42', 'RISBEND ASMIN, SE', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:18:47', NULL),
(1349, 42, 9, 1, 43, 1, '', '', '42', 'SEPTYA ADHE, ST', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:19:37', NULL),
(1350, 42, 3, 1, 54, 1, '', '', '42', 'YAPIRON', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:20:16', NULL),
(1351, 42, 3, 1, 45, 1, '', '', '42', 'RUSPENDI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:20:50', NULL),
(1352, 42, 3, 2, 34, 1, '', '', '42', 'Hj. FATIMAH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:21:35', NULL),
(1353, 125, 9, 2, 42, 1, '', '', '125', 'Lilianawaty', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:22:34', NULL),
(1354, 42, 3, 2, 45, 1, '', '', '42', 'SITI NURBAYA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:22:48', NULL),
(1355, 42, 9, 1, 53, 1, '', '', '42', 'TRI JOKO, SH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:23:58', NULL),
(1356, 125, 9, 1, 37, 1, '', '', '125', 'Samsuri', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:24:44', NULL),
(1357, 42, 3, 1, 34, 1, '', '', '42', 'LEO FERNANDO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:25:00', NULL),
(1358, 42, 6, 2, 43, 1, '', '', '42', 'NOOR YETRI, A.Md.Keb', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:25:48', NULL),
(1359, 125, 9, 1, 38, 1, '', '', '125', 'Hadi Hidayat', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:25:58', NULL),
(1360, 125, 9, 1, 38, 1, '', '', '125', 'Daniel Harison', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:26:48', NULL),
(1361, 42, 2, 1, 43, 1, '', '', '42', 'JALI', NULL, 4, 4, 4, 3, 3, 3, 4, 4, 4, NULL, '', '-', '33', '2022-04-11 09:27:10', NULL),
(1362, 42, 6, 2, 38, 1, '', '', '42', 'WIDIYAWATI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:27:53', NULL),
(1363, 125, 9, 1, 26, 1, '', '', '125', 'Memet Henry', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:28:31', NULL),
(1364, 42, 6, 1, 25, 1, '', '', '42', 'RAMA DONA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-04-11 09:28:37', NULL),
(1365, 42, 3, 1, 35, 1, '', '', '42', 'AHMAD RAFI\'I', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 09:51:15', NULL),
(1366, 56, 9, 2, 28, 1, '', '', '56', 'dr. TIARA ROIDAH MARWASASMI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:14:46', NULL),
(1367, 56, 9, 1, 28, 1, '', '', '56', 'dr. WILLIAM GEOVANNI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:15:28', NULL),
(1368, 42, 3, 1, 54, 1, '', '', '42', 'SUKIAT', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:15:37', NULL),
(1369, 56, 9, 2, 58, 1, '', '', '56', 'drg. FENNY KARTINI KONDOLELE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:16:34', NULL),
(1370, 42, 3, 2, 51, 1, '', '', '42', 'RUSMIMI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:17:06', NULL),
(1371, 42, 3, 1, 34, 1, '', '', '42', 'SUKAMTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:18:25', NULL),
(1372, 56, 9, 1, 35, 1, '', '', '56', 'dr. YONATAN ANDRI YANURI', NULL, 4, 4, 3, 4, 3, 3, 3, 4, 4, NULL, '', '-', '32', '2022-04-11 14:18:25', NULL),
(1373, 56, 9, 2, 35, 1, '', '', '56', 'dr. DINI PERMATASARI', NULL, 3, 3, 3, 4, 4, 4, 4, 4, 4, NULL, '', '-', '33', '2022-04-11 14:19:04', NULL),
(1374, 42, 3, 2, 49, 1, '', '', '42', 'NURLITA WATI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:19:30', NULL),
(1375, 56, 9, 2, 26, 1, '', '', '56', 'dr. TORDA FEBRIANTIKA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:20:03', NULL),
(1376, 42, 3, 2, 37, 1, '', '', '42', 'YESI YUWANTI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:20:32', NULL),
(1377, 56, 9, 1, 27, 1, '', '', '56', 'dr. JEFRI PATRIAWAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:20:47', NULL),
(1378, 42, 3, 1, 39, 1, '', '', '42', 'JONATA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:21:20', NULL),
(1379, 56, 9, 2, 24, 1, '', '', '56', 'dr. TIYA APRILIAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:21:24', NULL),
(1380, 56, 9, 2, 24, 1, '', '', '56', 'dr. GABRIELA NATIVITY', NULL, 4, 4, 4, 4, 3, 3, 4, 4, 4, NULL, '', '-', '34', '2022-04-11 14:21:56', NULL),
(1381, 42, 3, 2, 22, 1, '', '', '42', 'MARNI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:22:21', NULL),
(1382, 56, 9, 2, 26, 1, '', '', '56', 'dr. YUSPINA MARGARETA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:22:33', NULL),
(1383, 56, 9, 1, 25, 1, '', '', '56', 'dr. ILUL HIDAYAT. AR', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:23:09', NULL),
(1384, 42, 3, 2, 24, 1, '', '', '42', 'LIA MAHDALENA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:23:15', NULL),
(1385, 42, 3, 1, 55, 1, '', '', '42', 'YULIUS ALIANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:24:12', NULL),
(1386, 63, 9, 1, 28, 1, '', '', '63', 'Apt. MUHAMMAD BAHTIAR, S. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:24:20', NULL),
(1387, 42, 3, 1, 24, 1, '', '', '42', 'FAHRIZAL', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:24:49', NULL),
(1388, 63, 9, 2, 30, 1, '', '', '63', 'Apt. RESTU ASHA FAUZANA, S. Farm', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:24:55', NULL),
(1389, 64, 6, 2, 35, 1, '', '', '64', 'EVI SOLINA A.Md.Farm', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:25:56', NULL),
(1390, 42, 3, 1, 33, 1, '', '', '42', 'YOUNGKI FIRMANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:25:57', NULL),
(1391, 63, 9, 2, 32, 1, '', '', '63', 'Yeyen Pesa Surya S.Farm', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:27:00', NULL),
(1392, 42, 3, 1, 35, 1, '', '', '42', 'ERIUS OKTAVIANUS', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:27:08', NULL),
(1393, 63, 6, 2, 30, 1, '', '', '63', 'Dewi Rahmayanti A.Md.Farm', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:27:37', NULL),
(1394, 63, 6, 2, 37, 1, '', '', '63', 'Rahimah, A.Md.Farm', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:28:19', NULL),
(1395, 42, 3, 1, 49, 1, '', '', '42', 'MIGUHARTAKU, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:28:19', NULL),
(1396, 42, 9, 1, 35, 1, '', '', '42', 'STEPANUS SEGAH SAHA, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:29:26', NULL),
(1397, 42, 3, 1, 35, 1, '', '', '42', 'ASIO H. UNIL', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:30:06', NULL),
(1398, 42, 3, 1, 53, 1, '', '', '42', 'SUGITO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:30:56', NULL),
(1399, 42, 3, 1, 31, 1, '', '', '42', 'EKA FITRIANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:31:54', NULL),
(1400, 125, 6, 1, 32, 1, '', '', '125', 'Ramadiansyah, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:32:23', NULL),
(1401, 42, 3, 2, 38, 1, '', '', '42', 'MISBAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:32:47', NULL),
(1402, 125, 6, 1, 31, 1, '', '', '125', 'Ahmad Rohim, A.Md.Kep', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2022-04-11 14:33:08', NULL),
(1403, 125, 6, 1, 34, 1, '', '', '125', 'Dwi Joko Adi Nugroho,A.Md.Kep', NULL, 3, 3, 3, 4, 4, 4, 4, 4, 4, NULL, '', '-', '33', '2022-04-11 14:33:56', NULL),
(1404, 125, 6, 1, 33, 1, '', '', '125', 'Maradona, S.Kep., Ners', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-11 14:34:35', NULL),
(1405, 42, 3, 2, 65, 1, '', '', '42', 'MELIWATY', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:34:44', NULL),
(1406, 125, 3, 1, 43, 1, '', '', '125', 'm. Ali Ridani', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:35:14', NULL),
(1407, 42, 3, 1, 31, 1, '', '', '42', 'ABD RAHMAN ARHABAS', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:35:29', NULL),
(1408, 125, 9, 2, 45, 1, '', '', '125', 'drg. Fennya Kartini kondolele', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:36:10', NULL),
(1409, 42, 3, 1, 43, 1, '', '', '42', 'JANTO ARROYAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:36:26', NULL),
(1410, 125, 9, 2, 38, 1, '', '', '125', 'Santi Sandrta, SST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:37:10', NULL),
(1411, 42, 3, 1, 35, 1, '', '', '42', 'JAJANG SUPRIYATNA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:37:32', NULL),
(1412, 125, 6, 2, 33, 1, '', '', '125', 'Karsiyani, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 3, 3, 4, 4, NULL, '', '-', '34', '2022-04-11 14:38:02', NULL),
(1413, 42, 3, 1, 21, 1, '', '', '42', 'ALDI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:38:20', NULL),
(1414, 125, 9, 1, 26, 1, '', '', '125', 'dr. Uria Tangunho Ander', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:38:54', NULL),
(1415, 42, 3, 1, 28, 1, '', '', '42', 'RIFQI HILMAN FAKHRI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:39:11', NULL),
(1416, 125, 9, 2, 38, 1, '', '', '125', 'Verawati, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:39:30', NULL),
(1417, 42, 3, 1, 25, 1, '', '', '42', 'HAIKAL FARIZI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:39:59', NULL),
(1418, 125, 3, 1, 43, 1, '', '', '125', 'Untung I Tinus', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-11 14:40:02', NULL),
(1419, 125, 9, 1, 36, 1, '', '', '125', 'Samsul Hadi', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:40:44', NULL),
(1420, 42, 3, 2, 44, 1, '', '', '42', 'SORYATIE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:40:48', NULL),
(1421, 125, 3, 1, 36, 1, '', '', '125', 'Nur Hidayat', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-11 14:41:19', NULL),
(1422, 42, 3, 1, 50, 1, '', '', '42', 'ISWANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:41:37', NULL),
(1423, 125, 3, 1, 32, 1, '', '', '125', 'Sirajul Munir', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-11 14:41:54', NULL),
(1424, 125, 3, 1, 42, 1, '', '', '125', 'Yefri', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:42:28', NULL),
(1425, 42, 3, 1, 47, 1, '', '', '42', 'CHANDRA OKTAVIA RINGKANG', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:43:07', NULL),
(1426, 125, 3, 2, 38, 1, '', '', '125', 'Kiki Andriani', NULL, 4, 4, 4, 4, 3, 4, 3, 4, 4, NULL, '', '-', '34', '2022-04-11 14:43:17', NULL),
(1427, 125, 9, 1, 39, 1, '', '', '125', 'Hardianto', NULL, 4, 4, 4, 4, 4, 4, 3, 3, 4, NULL, '', '-', '34', '2022-04-11 14:43:55', NULL),
(1428, 42, 3, 1, 43, 1, '', '', '42', 'PURWANTO, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:43:59', NULL),
(1429, 42, 3, 1, 28, 1, '', '', '42', 'DANIEL KUSMAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:44:54', NULL),
(1430, 125, 9, 1, 46, 1, '', '', '125', 'Surya Diniaga', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:45:14', NULL),
(1431, 125, 3, 1, 47, 1, '', '', '125', 'Dundi', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:45:43', NULL),
(1432, 125, 3, 1, 49, 1, '', '', '125', 'Ghino Sheefed', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:46:20', NULL),
(1433, 42, 9, 1, 48, 1, '', '', '42', 'RISBEND ASMIN, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:46:56', NULL),
(1434, 125, 9, 1, 36, 1, '', '', '125', 'Aditya Prawira', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:47:16', NULL),
(1435, 42, 9, 1, 31, 1, '', '', '42', 'SEPTYA ADHE, ST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:47:39', NULL),
(1436, 125, 3, 1, 43, 1, '', '', '125', 'Aing Subari', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:48:24', NULL),
(1437, 42, 3, 1, 55, 1, '', '', '42', 'YAPIRON', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:48:34', NULL),
(1438, 125, 9, 1, 48, 1, '', '', '125', 'Riki Wilson Unjung, ST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:49:48', NULL),
(1439, 42, 3, 1, 53, 1, '', '', '42', 'RUSPENDI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '--', '36', '2022-04-11 14:50:29', NULL),
(1440, 125, 3, 2, 41, 1, '', '', '125', 'Marni', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:50:47', NULL),
(1441, 42, 3, 2, 42, 1, '', '', '42', 'Hj. FATIMAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '---', '36', '2022-04-11 14:51:21', NULL),
(1442, 125, 6, 2, 47, 1, '', '', '125', 'Nanie, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 3, 3, 4, 4, NULL, '', '-', '34', '2022-04-11 14:51:27', NULL),
(1443, 42, 3, 2, 54, 1, '', '', '42', 'SITI NURBAYA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:52:25', NULL),
(1444, 125, 9, 1, 52, 1, '', '', '125', 'Stepanus Segah Saha, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:52:30', NULL),
(1445, 42, 9, 1, 57, 1, '', '', '42', 'TRI JOKO, SH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:53:13', NULL),
(1446, 125, 2, 2, 46, 1, '', '', '125', 'Miasbah', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-11 14:53:30', NULL),
(1447, 42, 3, 1, 22, 1, '', '', '42', 'LEO FERNANDO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:54:31', NULL),
(1448, 125, 6, 2, 39, 1, '', '', '125', 'Mariani, A.Md.Kep', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2022-04-11 14:54:31', NULL),
(1449, 42, 6, 2, 26, 1, '', '', '42', 'NOOR YETRI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:55:31', NULL),
(1450, 42, 3, 1, 30, 1, '', '', '42', 'JALI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:56:36', NULL),
(1451, 42, 3, 2, 47, 1, '', '', '42', 'WIDIYAWATI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:57:36', NULL),
(1452, 42, 3, 1, 35, 1, '', '', '42', 'RAMA DONA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 14:58:51', NULL),
(1453, 125, 9, 1, 32, 1, '', '', '125', 'dr. Yonata Andri Yanuri', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:00:32', NULL),
(1454, 125, 6, 1, 31, 1, '', '', '125', 'Reza Utama Putra, A.Md.Kep', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2022-04-11 15:01:11', NULL),
(1455, 125, 3, 2, 53, 1, '', '', '125', 'Solistiawati', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-11 15:01:44', NULL),
(1456, 125, 6, 2, 36, 1, '', '', '125', 'Norma, Amd', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-11 15:02:25', NULL),
(1457, 125, 9, 2, 42, 1, '', '', '125', 'Hesti Budiani, S.Pd', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2022-04-11 15:03:21', NULL),
(1458, 125, 9, 2, 41, 1, '', '', '125', 'Marifah', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:04:08', NULL),
(1459, 125, 9, 1, 47, 1, '', '', '125', 'Bumbung, S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:04:44', NULL),
(1460, 125, 9, 2, 46, 1, '', '', '125', 'Indah Mulyani', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:05:19', NULL),
(1461, 124, 6, 2, 37, 1, '', '', '124', 'KURNIATI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:05:50', NULL),
(1462, 125, 9, 2, 37, 1, '', '', '125', 'Sekar Fajariah', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2022-04-11 15:06:07', NULL),
(1463, 125, 9, 2, 42, 1, '', '', '125', 'Siti Noriyah', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2022-04-11 15:06:54', NULL),
(1464, 124, 6, 2, 30, 1, '', '', '124', 'YUVITA PRILIA NAPIRA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:06:54', NULL),
(1465, 125, 9, 1, 39, 1, '', '', '125', 'Aldi', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:07:39', NULL),
(1466, 124, 6, 2, 28, 1, '', '', '124', 'RUMILA, A.Md.,Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:07:57', NULL),
(1467, 125, 6, 2, 32, 1, '', '', '125', 'Yuneva, A.Md.Farm', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:08:35', NULL),
(1468, 124, 9, 2, 26, 1, '', '', '124', 'MEMET HENRY SANTIKA, S.Kep,.Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:08:49', NULL),
(1469, 125, 6, 2, 28, 1, '', '', '125', 'Dwi Nusa Indah, A.Md.Keb', NULL, 4, 4, 3, 4, 3, 4, 4, 4, 3, NULL, '', '-', '33', '2022-04-11 15:09:19', NULL),
(1470, 125, 6, 2, 45, 1, '', '', '125', 'Sutari, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:09:57', NULL),
(1471, 124, 6, 2, 30, 1, '', '', '124', 'RAHMAWATI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:10:04', NULL),
(1472, 125, 3, 1, 42, 1, '', '', '125', 'Iswanto', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '=', '28', '2022-04-11 15:10:34', NULL),
(1473, 125, 9, 1, 38, 1, '', '', '125', 'Chandra Oktavia R', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:11:11', NULL),
(1474, 124, 6, 2, 29, 1, '', '', '124', 'CAHYANDARI DWI PUTRI, A.Md.,Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:11:40', NULL),
(1475, 125, 9, 1, 47, 1, '', '', '125', 'Purwanto, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:11:49', NULL),
(1476, 125, 9, 1, 49, 1, '', '', '125', 'Batik, S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:12:29', NULL),
(1477, 124, 6, 2, 28, 1, '', '', '124', 'EKA NATARIAYANA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:12:30', NULL),
(1478, 125, 2, 1, 42, 1, '', '', '125', 'Yapiron', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2022-04-11 15:13:08', NULL),
(1479, 124, 6, 1, 33, 1, '', '', '124', 'RAMADIANSYAH, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:13:33', NULL),
(1480, 125, 3, 1, 45, 1, '', '', '125', 'Ruspendi', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:13:46', NULL),
(1481, 125, 3, 1, 31, 1, '', '', '125', 'Leo Fernando', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:14:20', NULL),
(1482, 125, 3, 1, 52, 1, '', '', '125', 'Jali', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:14:49', NULL),
(1483, 124, 6, 1, 30, 1, '', '', '124', 'AHMAD ROHIM, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '---', '36', '2022-04-11 15:14:56', NULL),
(1484, 125, 9, 1, 42, 1, '', '', '125', 'Deny Sumirat, S.Pd', NULL, 4, 4, 4, 4, 3, 3, 3, 4, 4, NULL, '', '-', '33', '2022-04-11 15:15:32', NULL),
(1485, 124, 6, 1, 47, 1, '', '', '124', 'YOPIE JEFRIE MOKOROWU, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:16:11', NULL),
(1486, 125, 3, 1, 59, 1, '', '', '125', 'widiyawati', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:16:16', NULL),
(1487, 125, 3, 1, 39, 1, '', '', '125', 'Rama Dona', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:16:48', NULL),
(1488, 125, 3, 2, 47, 1, '', '', '125', 'H.Fatimah', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:17:32', NULL),
(1489, 124, 6, 1, 34, 1, '', '', '124', 'DWI JOKO ADY NUGROHO, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:17:44', NULL),
(1490, 125, 9, 1, 58, 1, '', '', '125', 'Tri Joko, SH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:18:15', NULL),
(1491, 124, 9, 1, 34, 1, '', '', '124', 'MARADONA, S.Kep.,Ns', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:18:29', NULL),
(1492, 125, 3, 2, 41, 1, '', '', '125', 'Siti Nurbaya', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2022-04-11 15:18:48', NULL),
(1493, 124, 9, 2, 36, 1, '', '', '124', 'RIRI PRAMITA, S.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:20:45', NULL),
(1494, 124, 6, 2, 33, 1, '', '', '124', 'RISTA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:22:01', NULL),
(1495, 124, 6, 1, 32, 1, '', '', '124', 'TULUS I. JATTA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:23:23', NULL),
(1496, 124, 9, 2, 42, 1, '', '', '124', 'ELSINE MANTUH, S.Kep.,Ns', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:24:28', NULL),
(1497, 124, 6, 2, 45, 1, '', '', '124', 'MARIANI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:25:11', NULL),
(1498, 124, 9, 2, 45, 1, '', '', '124', 'IRMANAWATI, S.Kep.,Ns.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:26:30', NULL),
(1499, 124, 6, 1, 26, 1, '', '', '124', 'REZA UTAMA PUTRA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:27:16', NULL),
(1500, 124, 6, 1, 34, 1, '', '', '124', 'A.Yani A.Md,. Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-----', '36', '2022-04-11 15:28:23', NULL),
(1501, 124, 9, 2, 30, 1, '', '', '124', 'ANITA VIRGINIA, S.Kep.,Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:29:22', NULL),
(1502, 124, 9, 2, 41, 1, '', '', '124', 'FITRIANI, S. Kep,. Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '---', '36', '2022-04-11 15:30:07', NULL),
(1503, 124, 6, 2, 30, 1, '', '', '124', 'TIA MAYUNI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:31:27', NULL),
(1504, 124, 6, 2, 32, 1, '', '', '124', 'IRMA YUNITA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:32:47', NULL),
(1505, 124, 9, 2, 32, 1, '', '', '124', 'IKE NURNANINGSIH, S.Kep.,Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:34:12', NULL),
(1506, 124, 6, 2, 31, 1, '', '', '124', 'WIDITA KERTTIYASA AMINORA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-11 15:35:04', NULL),
(1507, 124, 3, 1, 35, 1, '', '', '124', 'AHMAD RAFI\'I', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:25:20', NULL),
(1508, 124, 3, 1, 55, 1, '', '', '124', 'SUKIAT', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:26:45', NULL),
(1509, 124, 3, 2, 51, 1, '', '', '124', 'RUSMIMI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:28:04', NULL),
(1510, 124, 3, 1, 34, 1, '', '', '124', 'SUKAMTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:29:12', NULL),
(1511, 124, 3, 2, 49, 1, '', '', '124', 'NURLITA WATI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:30:16', NULL),
(1512, 124, 3, 2, 37, 1, '', '', '124', 'YESI YUWANTI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:31:34', NULL),
(1513, 124, 3, 1, 39, 1, '', '', '124', 'JONATA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:34:33', NULL),
(1514, 124, 3, 2, 22, 1, '', '', '124', 'MARNI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:35:42', NULL),
(1515, 124, 3, 2, 24, 1, '', '', '124', 'LIA MAHDALENA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:36:47', NULL),
(1516, 124, 3, 1, 55, 1, '', '', '124', 'YULIUS ALIANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:38:28', NULL),
(1517, 124, 3, 1, 24, 1, '', '', '124', 'FAHRIZAL', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:39:14', NULL),
(1518, 124, 3, 1, 33, 1, '', '', '124', 'YOUNGKI FIRMANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:40:14', NULL),
(1519, 124, 3, 1, 35, 1, '', '', '124', 'ERIUS OKTAVIANUS', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:41:15', NULL),
(1520, 124, 9, 1, 49, 1, '', '', '124', 'MIGUHARTAKU, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:42:14', NULL),
(1521, 124, 9, 1, 45, 1, '', '', '124', 'STEPANUS SEGAH SAHA, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:43:33', NULL),
(1522, 124, 3, 1, 45, 1, '', '', '124', 'ASIO H. UNIL', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:44:22', NULL),
(1523, 124, 3, 1, 52, 1, '', '', '124', 'SUGITO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:45:57', NULL),
(1524, 124, 3, 2, 30, 1, '', '', '124', 'EKA FITRIANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 08:46:52', NULL),
(1525, 124, 3, 2, 38, 1, '', '', '124', 'MISBAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '--', '36', '2022-04-12 08:47:33', NULL),
(1526, 124, 3, 1, 32, 1, '', '', '124', 'DEKI SUWANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 09:22:41', NULL),
(1527, 124, 20003, 2, 39, 1, '', '', '124', 'AGUSTINA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 09:51:18', NULL),
(1528, 124, 3, 1, 41, 1, '', '', '124', 'IWAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 09:53:25', NULL),
(1529, 124, 3, 1, 33, 1, '', '', '124', 'HELDI SUSANTA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 09:54:42', NULL),
(1530, 124, 3, 1, 49, 1, '', '', '124', 'A. ALIYASRI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 09:56:30', NULL),
(1531, 124, 9, 1, 52, 1, '', '', '124', 'H. IBERAHIM, S. Sos', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 09:57:39', NULL),
(1532, 124, 3, 1, 41, 1, '', '', '124', 'EBED KADARUSMAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 09:58:43', NULL),
(1533, 124, 3, 2, 50, 1, '', '', '124', 'LILIANAWATY', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:00:12', NULL),
(1534, 124, 3, 2, 52, 1, '', '', '124', 'DIANG', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:01:27', NULL),
(1535, 124, 3, 1, 46, 1, '', '', '124', 'SAMSURI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:02:35', NULL),
(1536, 124, 3, 1, 48, 1, '', '', '124', 'HADI HIDAYAT', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:04:11', NULL),
(1537, 124, 3, 1, 47, 1, '', '', '124', 'DANIEL HARISON', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:05:19', NULL),
(1538, 124, 3, 1, 27, 1, '', '', '124', 'AHMAD ZAINI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:06:17', NULL),
(1539, 124, 3, 1, 52, 1, '', '', '124', 'WAJIYO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:08:14', NULL),
(1540, 124, 3, 2, 31, 1, '', '', '124', 'KARMILA DEWI SARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:21:34', NULL),
(1541, 124, 3, 1, 38, 1, '', '', '124', 'ZAINI ANWAR', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:23:18', NULL),
(1542, 124, 3, 1, 38, 1, '', '', '124', 'MISWARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:26:25', NULL),
(1543, 124, 3, 2, 44, 1, '', '', '124', 'YONYTA KARTIKA SARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:27:55', NULL),
(1544, 124, 3, 1, 49, 1, '', '', '124', 'ASMANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:28:58', NULL),
(1545, 124, 3, 1, 18, 1, '', '', '124', 'GERY GLEN JUNIARTA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:30:13', NULL),
(1546, 124, 3, 1, 47, 1, '', '', '124', 'AKHMAD WAHYUNI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:31:19', NULL),
(1547, 124, 3, 2, 54, 1, '', '', '124', 'IRIANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:33:08', NULL),
(1548, 124, 3, 1, 36, 1, '', '', '124', 'DALIL SHOFWAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:34:28', NULL),
(1549, 124, 3, 1, 34, 1, '', '', '124', 'M. ALI RIDANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:46:07', NULL),
(1550, 124, 9, 2, 42, 1, '', '', '124', 'VERAWATY, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:49:25', NULL),
(1551, 124, 3, 1, 55, 1, '', '', '124', 'UNTUNG I. TINUS', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:53:45', NULL),
(1552, 124, 3, 1, 34, 1, '', '', '124', 'SAMSUL HADI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:58:33', NULL),
(1553, 124, 3, 1, 48, 1, '', '', '124', 'NUR HIDAYAT', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 10:59:48', NULL),
(1554, 124, 3, 1, 31, 1, '', '', '124', 'SIRAJUL MUNIR', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 11:02:19', NULL),
(1555, 124, 3, 1, 46, 1, '', '', '124', 'JONI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '--', '36', '2022-04-12 11:03:12', NULL),
(1556, 124, 3, 2, 30, 1, '', '', '124', 'KIKI ANDRIANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 11:14:33', NULL),
(1557, 124, 3, 1, 47, 1, '', '', '124', 'HARDIANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 11:16:54', NULL),
(1558, 124, 3, 1, 51, 1, '', '', '124', 'SURYADINIAGA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 11:18:26', NULL),
(1559, 124, 3, 1, 28, 1, '', '', '124', 'DUNDI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:20:28', NULL),
(1560, 124, 3, 1, 28, 1, '', '', '124', 'DUNDI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:20:28', NULL),
(1561, 124, 3, 1, 42, 1, '', '', '124', 'RUSAINI ASRAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:21:14', NULL),
(1562, 124, 3, 1, 39, 1, '', '', '124', 'GHINO SHEFED', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:22:26', NULL),
(1563, 124, 3, 1, 26, 1, '', '', '124', 'ADITYA PRAWIRA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:23:13', NULL),
(1564, 124, 3, 1, 33, 1, '', '', '124', 'AING SUBARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:24:04', NULL),
(1565, 124, 9, 1, 56, 1, '', '', '124', 'RIKI WILSON UNJUNG, ST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:25:40', NULL),
(1566, 124, 3, 2, 65, 1, '', '', '124', 'MELIWATY', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:27:28', NULL),
(1567, 124, 3, 1, 31, 1, '', '', '124', 'ABD RAHMAN ARHABAS', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:29:14', NULL),
(1568, 124, 3, 1, 43, 1, '', '', '124', 'JANTO ARROYAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:30:31', NULL),
(1569, 124, 3, 1, 35, 1, '', '', '124', 'JAJANG SUPRIYATNA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:32:05', NULL),
(1570, 124, 3, 1, 21, 1, '', '', '124', 'ALDI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:33:24', NULL),
(1571, 124, 3, 1, 28, 1, '', '', '124', 'RIFQI HILMAN FAKHRI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:34:18', NULL),
(1572, 124, 3, 1, 25, 1, '', '', '124', 'HAIKAL FARIZI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:35:30', NULL),
(1573, 124, 3, 2, 44, 1, '', '', '124', 'SORYATIE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:36:44', NULL),
(1574, 124, 3, 1, 50, 1, '', '', '124', 'ISWANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:38:50', NULL),
(1575, 124, 3, 1, 47, 1, '', '', '124', 'CHANDRA OKTAVIA RINGKANG', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:39:55', NULL),
(1576, 124, 9, 1, 44, 1, '', '', '124', 'PURWANTO, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:41:35', NULL),
(1577, 124, 3, 1, 28, 1, '', '', '124', 'DANIEL KUSMAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:42:55', NULL),
(1578, 124, 9, 1, 48, 1, '', '', '124', 'RISBEND ASMIN, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:44:23', NULL),
(1579, 124, 9, 1, 31, 1, '', '', '124', 'SEPTYA ADHE, ST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:45:53', NULL),
(1580, 124, 3, 1, 55, 1, '', '', '124', 'YAPIRON', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:47:15', NULL),
(1581, 124, 3, 1, 53, 1, '', '', '124', 'RUSPENDI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:48:42', NULL),
(1582, 124, 3, 2, 42, 1, '', '', '124', 'Hj. FATIMAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:50:04', NULL),
(1583, 124, 3, 2, 54, 1, '', '', '124', 'SITI NURBAYA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:51:45', NULL),
(1584, 124, 9, 1, 57, 1, '', '', '124', 'TRI JOKO, SH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:53:53', NULL),
(1585, 124, 3, 1, 22, 1, '', '', '124', 'LEO FERNANDO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:56:40', NULL),
(1586, 124, 6, 2, 26, 1, '', '', '124', 'NOOR YETRI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 14:58:21', NULL),
(1587, 124, 3, 1, 30, 1, '', '', '124', 'JALI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 15:00:11', NULL),
(1588, 124, 3, 2, 47, 1, '', '', '124', 'WIDIYAWATI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 15:02:22', NULL),
(1589, 124, 3, 1, 35, 1, '', '', '124', 'RAMA DONA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-12 15:04:32', NULL),
(1590, 68, 6, 2, 25, 1, '', '', '68', 'ENI MEIWANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:35:29', NULL),
(1591, 68, 6, 2, 48, 1, '', '', '68', 'YUNASI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:36:35', NULL),
(1592, 68, 6, 2, 42, 1, '', '', '68', 'SRI KUMALA AGUNG MANGKU SARI SUGIHARTI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:37:50', NULL),
(1593, 68, 6, 2, 47, 1, '', '', '68', 'ELLY ROYANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:38:49', NULL),
(1594, 68, 6, 2, 47, 1, '', '', '68', 'HERLINA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:39:35', NULL),
(1595, 68, 6, 2, 34, 1, '', '', '68', 'PEBRINAE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:40:27', NULL),
(1596, 68, 6, 2, 48, 1, '', '', '68', 'MERANTI UTARI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:41:22', NULL),
(1597, 68, 6, 2, 46, 1, '', '', '68', 'HJ. NIDA HERZIANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:42:10', NULL),
(1598, 68, 6, 2, 31, 1, '', '', '68', 'MARISSA KAROLINA BR GINTING, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:43:13', NULL),
(1599, 68, 6, 2, 31, 1, '', '', '68', 'RISKAWATI KRISTIANA DEWI HUTAPEA, A. Md. Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:44:12', NULL),
(1600, 68, 6, 2, 27, 1, '', '', '68', 'YUSIANA FERONICA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:45:14', NULL),
(1601, 68, 6, 2, 41, 1, '', '', '68', 'HALIMAH, A.Md Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:46:01', NULL),
(1602, 68, 9, 2, 33, 1, '', '', '68', 'NUNUNG MEGAPURI, S.Tr.Keb.,Bdn', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:46:49', NULL),
(1603, 68, 6, 2, 48, 1, '', '', '68', 'UMMI NUR AENINGSIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:47:50', NULL),
(1604, 68, 9, 2, 40, 1, '', '', '68', 'SANTI SANDRA, S.ST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:48:52', NULL),
(1605, 68, 6, 2, 26, 1, '', '', '68', 'KASIYANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:50:18', NULL),
(1606, 68, 6, 2, 48, 1, '', '', '68', 'YUNASI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:51:03', NULL),
(1607, 68, 6, 2, 46, 1, '', '', '68', 'NANIE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:51:52', NULL),
(1608, 68, 6, 2, 42, 1, '', '', '68', 'ASTUTI PURWANINGSIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:53:06', NULL),
(1609, 68, 6, 2, 29, 1, '', '', '68', 'HAMDANAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:53:52', NULL),
(1610, 68, 6, 2, 46, 1, '', '', '68', 'TRIANA SETIA HANDAYANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:54:48', NULL),
(1611, 68, 9, 2, 39, 1, '', '', '68', 'YULIATI SETIANINGSIH, SST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:55:41', NULL),
(1612, 68, 6, 2, 29, 1, '', '', '68', 'NOVITA SARI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:56:56', NULL),
(1613, 68, 6, 2, 27, 1, '', '', '68', 'ISTI KURNIAWATI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:57:53', NULL),
(1614, 68, 6, 2, 24, 1, '', '', '68', 'JUMIATI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 08:59:55', NULL),
(1615, 68, 6, 2, 42, 1, '', '', '68', 'MEINAWATIE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:00:58', NULL),
(1616, 68, 6, 2, 23, 1, '', '', '68', 'NOR REKA YULITA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:01:48', NULL),
(1617, 68, 6, 2, 28, 1, '', '', '68', 'MIYANG DEWIANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:02:28', NULL),
(1618, 68, 6, 2, 26, 1, '', '', '68', 'ERIKA SEPTINA EKASINTHA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:04:59', NULL),
(1619, 68, 6, 2, 26, 1, '', '', '68', 'NOVI CHRISTIANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:05:52', NULL),
(1620, 68, 6, 2, 27, 1, '', '', '68', 'SOFYA KHARISMARIA PUTRI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:06:44', NULL),
(1621, 68, 6, 2, 44, 1, '', '', '68', 'FIRQAH RIYADLAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:07:31', NULL),
(1622, 68, 6, 2, 49, 1, '', '', '68', 'ELLY WAHYU NINGSIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:08:19', NULL),
(1623, 68, 6, 2, 34, 1, '', '', '68', 'MERLIANA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:08:58', NULL),
(1624, 68, 6, 2, 32, 1, '', '', '68', 'OKTAVINA TUWENTY, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:09:46', NULL),
(1625, 68, 6, 2, 27, 1, '', '', '68', 'DWI NUSA INDAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:10:47', NULL);
INSERT INTO `tblhasilsurvei` (`tblhasilsurvei_id`, `refjenisizinikm_id`, `reftingkatpendidikan_id`, `refsex_id`, `tblhasilsurvei_usia`, `refloket_id`, `tblhasilsurvei_caradaftar`, `tblhasilsurvei_pengurusan`, `refjenisizinikm_nama`, `tblhasilsurvei_nama`, `tblhasilsurvei_nip`, `tblhasilsurvei_pertanyaan1`, `tblhasilsurvei_pertanyaan2`, `tblhasilsurvei_pertanyaan3`, `tblhasilsurvei_pertanyaan4`, `tblhasilsurvei_pertanyaan5`, `tblhasilsurvei_pertanyaan6`, `tblhasilsurvei_pertanyaan7`, `tblhasilsurvei_pertanyaan8`, `tblhasilsurvei_pertanyaan9`, `tblhasilsurvei_pertanyaan10`, `tblhasilsurvei_penilaian`, `tblhasilsurvei_saran`, `tblhasilsurvei_total`, `tblhasilsurvei_syscreate`, `tblhasilsurvei_sysupdate`) VALUES
(1626, 68, 6, 2, 44, 1, '', '', '68', 'SUTARI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:11:38', NULL),
(1627, 68, 6, 2, 48, 1, '', '', '68', 'DAROYAH, A.Md, Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:12:29', NULL),
(1628, 68, 6, 2, 45, 1, '', '', '68', 'HARTARINI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:13:12', NULL),
(1629, 68, 6, 2, 45, 1, '', '', '68', 'YOHANNA BUTAR BUTAR, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:14:00', NULL),
(1630, 68, 6, 2, 23, 1, '', '', '68', 'KRISTIN ADERISTA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:14:57', NULL),
(1631, 124, 6, 2, 25, 1, '', '', '124', 'ENI MEIWANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:16:28', NULL),
(1632, 124, 6, 2, 48, 1, '', '', '124', 'YUNASI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:20:51', NULL),
(1633, 124, 6, 2, 42, 1, '', '', '124', 'SRI KUMALA AGUNG MANGKU SARI SUGIHARTI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:22:05', NULL),
(1634, 124, 6, 2, 47, 1, '', '', '124', 'ELLY ROYANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:22:59', NULL),
(1635, 124, 6, 2, 47, 1, '', '', '124', 'HERLINA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:24:20', NULL),
(1636, 124, 6, 2, 34, 1, '', '', '124', 'PEBRINAE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:26:04', NULL),
(1637, 124, 6, 2, 48, 1, '', '', '124', 'MERANTI UTARI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:27:15', NULL),
(1638, 124, 6, 2, 45, 1, '', '', '124', 'HJ. NIDA HERZIANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:28:29', NULL),
(1639, 124, 6, 2, 31, 1, '', '', '124', 'MARISSA KAROLINA BR GINTING, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:31:02', NULL),
(1640, 124, 6, 2, 31, 1, '', '', '124', 'RISKAWATI KRISTIANA DEWI HUTAPEA, A. Md. Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:32:04', NULL),
(1641, 124, 6, 2, 27, 1, '', '', '124', 'YUSIANA FERONICA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:33:11', NULL),
(1642, 124, 6, 2, 42, 1, '', '', '124', 'HALIMAH, A.Md Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:34:10', NULL),
(1643, 124, 9, 2, 33, 1, '', '', '124', 'NUNUNG MEGAPURI, S.Tr.Keb.,Bdn', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:35:00', NULL),
(1644, 124, 6, 2, 38, 1, '', '', '124', 'UMMI NUR AENINGSIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:35:44', NULL),
(1645, 124, 9, 2, 40, 1, '', '', '124', 'SANTI SANDRA, S.ST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:38:45', NULL),
(1646, 124, 6, 2, 26, 1, '', '', '124', 'KASIYANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:39:38', NULL),
(1647, 124, 6, 2, 48, 1, '', '', '124', 'YUNASI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:41:03', NULL),
(1648, 124, 6, 2, 46, 1, '', '', '124', 'NANIE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:41:48', NULL),
(1649, 124, 6, 2, 42, 1, '', '', '124', 'ASTUTI PURWANINGSIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:44:26', NULL),
(1650, 124, 6, 2, 29, 1, '', '', '124', 'HAMDANAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:45:07', NULL),
(1651, 124, 6, 2, 46, 1, '', '', '124', 'TRIANA SETIA HANDAYANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:46:50', NULL),
(1652, 124, 9, 2, 39, 1, '', '', '124', 'YULIATI SETIANINGSIH, SST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:47:43', NULL),
(1653, 124, 6, 2, 24, 1, '', '', '124', 'JUMIATI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '--', '36', '2022-04-13 09:48:34', NULL),
(1654, 124, 6, 2, 27, 1, '', '', '124', 'ISTI KURNIAWATI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:49:34', NULL),
(1655, 124, 6, 2, 29, 1, '', '', '124', 'NOVITA SARI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:50:23', NULL),
(1656, 124, 6, 2, 42, 1, '', '', '124', 'MEINAWATIE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:51:32', NULL),
(1657, 124, 6, 2, 23, 1, '', '', '124', 'NOR REKA YULITA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:52:18', NULL),
(1658, 124, 6, 2, 28, 1, '', '', '124', 'MIYANG DEWIANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '--', '36', '2022-04-13 09:55:08', NULL),
(1659, 124, 6, 2, 26, 1, '', '', '124', 'ERIKA SEPTINA EKASINTHA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 09:56:10', NULL),
(1660, 124, 6, 2, 26, 1, '', '', '124', 'NOVI CHRISTIANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '----', '36', '2022-04-13 09:57:01', NULL),
(1661, 124, 6, 2, 27, 1, '', '', '124', 'SOFYA KHARISMARIA PUTRI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 10:00:23', NULL),
(1662, 124, 6, 2, 44, 1, '', '', '124', 'FIRQAH RIYADLAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '---', '36', '2022-04-13 10:01:31', NULL),
(1663, 124, 6, 2, 49, 1, '', '', '124', 'ELLY WAHYU NINGSIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '----', '36', '2022-04-13 10:02:54', NULL),
(1664, 124, 6, 2, 34, 1, '', '', '124', 'MERLIANA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '---', '36', '2022-04-13 10:03:59', NULL),
(1665, 124, 6, 2, 32, 1, '', '', '124', 'OKTAVINA TUWENTY, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '---', '36', '2022-04-13 10:05:10', NULL),
(1666, 124, 6, 2, 27, 1, '', '', '124', 'DWI NUSA INDAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '--', '36', '2022-04-13 10:06:05', NULL),
(1667, 124, 6, 2, 44, 1, '', '', '124', 'SUTARI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 10:06:57', NULL),
(1668, 124, 6, 2, 48, 1, '', '', '124', 'DAROYAH, A.Md, Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 10:08:22', NULL),
(1669, 124, 6, 2, 45, 1, '', '', '124', 'HARTARINI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '--', '36', '2022-04-13 10:09:17', NULL),
(1670, 124, 6, 2, 45, 1, '', '', '124', 'YOHANNA BUTAR BUTAR, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 10:10:44', NULL),
(1671, 124, 6, 2, 23, 1, '', '', '124', 'KRISTIN ADERISTA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 10:11:43', NULL),
(1672, 56, 9, 2, 28, 1, '', '', '56', 'dr. TIARA ROIDAH MARWASASMI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 10:59:55', NULL),
(1673, 56, 9, 1, 27, 1, '', '', '56', 'dr. WILLIAM GEOVANNI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:01:03', NULL),
(1674, 56, 10, 2, 52, 1, '', '', '56', 'drg. SRI FADJAR LUSIWARININGSIH, M.Kes', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:02:19', NULL),
(1675, 124, 10, 2, 52, 1, '', '', '124', 'drg. SRI FADJAR LUSIWARININGSIH, M.Kes', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:04:08', NULL),
(1676, 124, 9, 1, 27, 1, '', '', '124', 'dr. WILLIAM GEOVANNI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:05:17', NULL),
(1677, 124, 9, 2, 28, 1, '', '', '124', 'dr. TIARA ROIDAH MARWASASMI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:06:11', NULL),
(1678, 56, 9, 2, 58, 1, '', '', '56', 'drg. FENNY KARTINI KONDOLELE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:08:48', NULL),
(1679, 124, 9, 2, 58, 1, '', '', '124', 'drg. FENNY KARTINI KONDOLELE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '--', '36', '2022-04-13 11:10:47', NULL),
(1680, 56, 9, 1, 27, 1, '', '', '56', 'dr. ILUL HIDAYAT. AR', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:19:35', NULL),
(1681, 124, 9, 1, 24, 1, '', '', '124', 'dr. ILUL HIDAYAT. AR', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:22:21', NULL),
(1682, 56, 9, 2, 34, 1, '', '', '56', 'dr. DINI PERMATASARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:25:01', NULL),
(1683, 124, 9, 2, 34, 1, '', '', '124', 'dr. DINI PERMATASARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:26:07', NULL),
(1684, 56, 9, 2, 26, 1, '', '', '56', 'dr. TORDA FEBRIANTIKA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:29:14', NULL),
(1685, 124, 9, 2, 26, 1, '', '', '124', 'dr. TORDA FEBRIANTIKA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:39:44', NULL),
(1686, 56, 9, 1, 26, 1, '', '', '56', 'dr. JEFRI PATRIAWAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:41:36', NULL),
(1687, 124, 9, 1, 26, 1, '', '', '124', 'dr. JEFRI PATRIAWAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:42:28', NULL),
(1688, 56, 9, 2, 23, 1, '', '', '56', 'dr. TIYA APRILIAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '---', '36', '2022-04-13 11:44:51', NULL),
(1689, 124, 9, 2, 23, 1, '', '', '124', 'dr. TIYA APRILIAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '---', '36', '2022-04-13 11:45:48', NULL),
(1690, 56, 9, 2, 23, 1, '', '', '56', 'dr. GABRIELA NATIVITY', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:46:42', NULL),
(1691, 124, 9, 2, 23, 1, '', '', '124', 'dr. GABRIELA NATIVITY', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 11:47:27', NULL),
(1692, 56, 9, 2, 26, 1, '', '', '56', 'dr. YUSPINA MARGARETA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '---', '36', '2022-04-13 11:48:31', NULL),
(1693, 124, 9, 2, 26, 1, '', '', '124', 'dr. YUSPINA MARGARETA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '---', '36', '2022-04-13 11:49:12', NULL),
(1694, 56, 9, 1, 30, 1, '', '', '56', 'dr. KAREL SIAGIAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '--', '36', '2022-04-13 11:50:03', NULL),
(1695, 124, 9, 1, 30, 1, '', '', '124', 'dr. KAREL SIAGIAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '---', '36', '2022-04-13 11:50:48', NULL),
(1696, 124, 9, 2, 36, 1, '', '', '124', 'SULYANTI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:37:02', NULL),
(1697, 124, 9, 2, 34, 1, '', '', '124', 'NOVIALITA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:38:14', NULL),
(1698, 124, 9, 2, 38, 1, '', '', '124', 'PURWIYULIATI, S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:39:35', NULL),
(1699, 124, 9, 2, 35, 1, '', '', '124', 'SITI KAMARIAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:41:11', NULL),
(1700, 124, 9, 2, 37, 1, '', '', '124', 'MARTIAH, S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:43:21', NULL),
(1701, 124, 9, 2, 38, 1, '', '', '124', 'UTAMI, S.Pd. AUD', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:44:39', NULL),
(1702, 124, 9, 2, 40, 1, '', '', '124', 'YAYUK MARKHAMAH, S.Pd. AUD', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:45:56', NULL),
(1703, 124, 9, 2, 37, 1, '', '', '124', 'SUMARTINI , S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:47:43', NULL),
(1704, 124, 9, 2, 40, 1, '', '', '124', 'SITI MASITAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:48:48', NULL),
(1705, 124, 9, 2, 39, 1, '', '', '124', 'ARNIE ARIFATI, S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:50:06', NULL),
(1706, 124, 9, 1, 42, 1, '', '', '124', 'HERMIN, S.Pd. AUD', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:51:26', NULL),
(1707, 124, 9, 2, 34, 1, '', '', '124', 'SOLISTIAWATI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:53:00', NULL),
(1708, 124, 20003, 2, 35, 1, '', '', '124', 'MARHAMAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:54:29', NULL),
(1709, 124, 9, 2, 37, 1, '', '', '124', 'RASYIDAH, SPd.I', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:55:53', NULL),
(1710, 124, 9, 2, 35, 1, '', '', '124', 'NI KETUT YUNITASARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:57:44', NULL),
(1711, 124, 6, 2, 35, 1, '', '', '124', 'NORMA, A.Md', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 14:58:57', NULL),
(1712, 124, 9, 2, 40, 1, '', '', '124', 'HESTI BUDIANI, S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '--', '36', '2022-04-13 15:00:19', NULL),
(1713, 124, 9, 2, 34, 1, '', '', '124', 'DWI YULI HANDAYANI, SPd.I', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '--', '36', '2022-04-13 15:01:29', NULL),
(1714, 124, 20003, 2, 39, 1, '', '', '124', 'ANIS SHOLIKAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 15:03:48', NULL),
(1715, 124, 9, 2, 35, 1, '', '', '124', 'JUMIATI, S.Pd.I', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 15:04:55', NULL),
(1716, 124, 9, 2, 36, 1, '', '', '124', 'FAUZIA RAHMAH, S.Pd. I', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 15:06:10', NULL),
(1717, 124, 9, 2, 38, 1, '', '', '124', 'BERTAWATIE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 15:07:16', NULL),
(1718, 124, 20003, 2, 37, 1, '', '', '124', 'INDAH MULYANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 15:08:18', NULL),
(1719, 124, 9, 2, 35, 1, '', '', '124', 'SEKAR FAJARIAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 15:09:26', NULL),
(1720, 124, 9, 2, 35, 1, '', '', '124', 'SANTI NORIYAH, S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 15:11:09', NULL),
(1721, 124, 9, 2, 42, 1, '', '', '124', 'MARIFAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 15:12:24', NULL),
(1722, 124, 9, 2, 39, 1, '', '', '124', 'BUMBUNG, S. Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 15:13:55', NULL),
(1723, 124, 9, 2, 36, 1, '', '', '124', 'VIVIN DEVITA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 15:15:02', NULL),
(1724, 124, 9, 2, 38, 1, '', '', '124', 'RINI FATMAWATI, S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 15:15:55', NULL),
(1725, 124, 9, 2, 35, 1, '', '', '124', 'PUSPA JAYANTI, S.Pd', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-13 15:17:06', NULL),
(1726, 124, 9, 1, 28, 1, '', '', '124', 'Apt. MUHAMMAD BAHTIAR, S. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:35:38', NULL),
(1727, 124, 9, 1, 32, 1, '', '', '124', 'Apt. RESTU ASHA FAUZANA, S. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:37:29', NULL),
(1728, 124, 9, 2, 35, 1, '', '', '124', 'Apt. MERY NORVISARI, S. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:39:14', NULL),
(1729, 124, 6, 2, 29, 1, '', '', '124', 'EVI SOLINA, A.Md. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:41:23', NULL),
(1730, 124, 9, 2, 33, 1, '', '', '124', 'YEYEN PESA SURYA, S. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:43:42', NULL),
(1731, 124, 6, 2, 48, 1, '', '', '124', 'DEWI RAHMAYANTI, A.Md. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:46:23', NULL),
(1732, 124, 6, 2, 44, 1, '', '', '124', 'RAHIMAH, A.Md. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:47:45', NULL),
(1733, 124, 6, 2, 20, 1, '', '', '124', 'PUTRI AGUSTINA GINAYAH, A.Md. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:49:45', NULL),
(1734, 124, 6, 2, 35, 1, '', '', '124', 'YUNEVA, A.Md. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:51:27', NULL),
(1735, 124, 6, 2, 33, 1, '', '', '124', 'DESIKA GRATIA, A.Md. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:52:38', NULL),
(1736, 63, 9, 1, 28, 1, '', '', '63', 'Apt. MUHAMMAD BAHTIAR, S. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:55:30', NULL),
(1737, 63, 9, 1, 32, 1, '', '', '63', 'Apt. RESTU ASHA FAUZANA, S. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:57:08', NULL),
(1738, 63, 9, 2, 34, 1, '', '', '63', 'Apt. MERY NORVISARI, S. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 08:58:32', NULL),
(1739, 64, 6, 2, 29, 1, '', '', '64', 'EVI SOLINA, A.Md. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 09:00:24', NULL),
(1740, 64, 9, 2, 33, 1, '', '', '64', 'YEYEN PESA SURYA, S. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 09:04:08', NULL),
(1741, 64, 6, 2, 48, 1, '', '', '64', 'DEWI RAHMAYANTI, A.Md. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 09:05:45', NULL),
(1742, 64, 6, 2, 44, 1, '', '', '64', 'RAHIMAH, A.Md. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 09:06:53', NULL),
(1743, 64, 6, 2, 20, 1, '', '', '64', 'PUTRI AGUSTINA GINAYAH, A.Md. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 09:08:36', NULL),
(1744, 64, 6, 2, 35, 1, '', '', '64', 'YUNEVA, A.Md. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 09:10:03', NULL),
(1745, 64, 6, 2, 33, 1, '', '', '64', 'DESIKA GRATIA, A.Md. Farm.', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-14 09:31:42', NULL),
(1746, 123, 3, 2, 49, 1, '', '', '123', 'A. ALIYASRI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:03:22', NULL),
(1747, 123, 3, 1, 38, 1, '', '', '123', 'MISWARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:04:48', NULL),
(1748, 123, 3, 1, 18, 1, '', '', '123', 'GERY GLEN JUNIARTA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:06:50', NULL),
(1749, 123, 9, 1, 45, 1, '', '', '123', 'STEPANUS SEGAH SAHA, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:08:28', NULL),
(1750, 123, 3, 1, 35, 1, '', '', '123', 'ERIUS OKTAVIANUS', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:09:32', NULL),
(1751, 123, 9, 1, 49, 1, '', '', '123', 'MIGUHARTAKU, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:10:34', NULL),
(1752, 123, 3, 1, 33, 1, '', '', '123', 'YOUNGKI FIRMANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:11:38', NULL),
(1753, 123, 3, 1, 47, 1, '', '', '123', 'HARDIANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:12:36', NULL),
(1754, 123, 3, 1, 34, 1, '', '', '123', 'SUKAMTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:13:48', NULL),
(1755, 123, 3, 2, 49, 1, '', '', '123', 'NURLITA WATI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:14:38', NULL),
(1756, 123, 3, 2, 30, 1, '', '', '123', 'KIKI ANDRIANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:15:29', NULL),
(1757, 123, 3, 1, 42, 1, '', '', '123', 'RUSAINI ASRAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:16:15', NULL),
(1758, 123, 3, 1, 46, 1, '', '', '123', 'JONI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:17:06', NULL),
(1759, 123, 3, 1, 31, 1, '', '', '123', 'SIRAJUL MUNIR', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:17:50', NULL),
(1760, 123, 3, 1, 48, 1, '', '', '123', 'NUR HIDAYAT', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:18:37', NULL),
(1761, 123, 3, 1, 31, 1, '', '', '123', 'ABD RAHMAN ARHABAS', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:19:22', NULL),
(1762, 123, 3, 1, 22, 1, '', '', '123', 'LEO FERNANDO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:21:17', NULL),
(1763, 123, 3, 1, 35, 1, '', '', '123', 'JAJANG SUPRIYATNA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:22:19', NULL),
(1764, 123, 3, 1, 25, 1, '', '', '123', 'HAIKAL FARIZI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:23:31', NULL),
(1765, 123, 3, 1, 55, 1, '', '', '123', 'YAPIRON', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:24:24', NULL),
(1766, 123, 6, 2, 26, 1, '', '', '123', 'NOOR YETRI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:25:26', NULL),
(1767, 123, 3, 1, 21, 1, '', '', '123', 'ALDI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:26:19', NULL),
(1768, 123, 9, 1, 31, 1, '', '', '123', 'SEPTYA ADHE, ST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:27:20', NULL),
(1769, 123, 9, 1, 48, 1, '', '', '123', 'RISBEND ASMIN, SE', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:29:20', NULL),
(1770, 123, 3, 1, 30, 1, '', '', '123', 'JALI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:30:13', NULL),
(1771, 123, 3, 1, 43, 1, '', '', '123', 'JANTO ARROYAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-04-18 08:31:14', NULL),
(1772, 66, 6, 1, 33, 1, '', '', '66', 'Walter mongon sidi', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'makin sukses dan semangat buat kemajuan bersama', '36', '2022-07-05 09:55:26', NULL),
(1773, 68, 6, 2, 27, 1, '', '', '68', 'EXSI KAMISTA VALENSIANI A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 11:26:55', NULL),
(1774, 68, 6, 2, 27, 1, '', '', '68', 'RAHIMAH A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 11:28:40', NULL),
(1775, 42, 3, 2, 31, 1, '', '', '42', 'Rahmah', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Pertahankan', '35', '2022-07-15 11:28:40', NULL),
(1776, 68, 9, 2, 34, 1, '', '', '68', 'NUR HALIMAH, SST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 11:29:52', NULL),
(1777, 42, 3, 1, 47, 1, '', '', '42', 'AHMADI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:29:55', NULL),
(1778, 42, 6, 1, 41, 1, '', '', '42', 'MISRAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Tingkatkan dan lanjutkan', '35', '2022-07-15 11:31:37', NULL),
(1779, 68, 6, 2, 27, 1, '', '', '68', 'NURUL ANGGRAINI H.M.BURHAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 11:31:58', NULL),
(1780, 42, 3, 2, 32, 1, '', '', '42', 'SRI ASTUTI HANDAYANI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Sudah sangat baik', '35', '2022-07-15 11:32:25', NULL),
(1781, 42, 6, 2, 29, 1, '', '', '42', 'NADIA CRISTY', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Teruskan', '35', '2022-07-15 11:33:09', NULL),
(1782, 68, 6, 2, 30, 1, '', '', '68', 'NYARMINATI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 11:33:50', NULL),
(1783, 42, 9, 1, 48, 1, '', '', '42', 'YUDHY TIMBONIA PANGARIBUAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Sudah baik', '35', '2022-07-15 11:34:04', NULL),
(1784, 42, 9, 2, 60, 1, '', '', '42', 'Hj. RUKMINI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Lanjutkan', '35', '2022-07-15 11:36:19', NULL),
(1785, 68, 6, 2, 40, 1, '', '', '68', 'HESTIANA, A.Md.Keb`', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 11:36:22', NULL),
(1786, 42, 3, 1, 40, 1, '', '', '42', 'NUR HIDAYAH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:37:20', NULL),
(1787, 68, 6, 2, 30, 1, '', '', '68', 'YULI NADYA PUTRI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 11:37:44', NULL),
(1788, 42, 3, 2, 61, 1, '', '', '42', 'Hj. KARIYEM', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:38:06', NULL),
(1789, 42, 3, 1, 47, 1, '', '', '42', 'NYONO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:38:43', NULL),
(1790, 68, 6, 2, 30, 1, '', '', '68', 'LAILY INDAH SURYANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 11:39:06', NULL),
(1791, 42, 9, 2, 32, 1, '', '', '42', 'AYU NUPITA SARI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Teruskan kinerja baiknya', '35', '2022-07-15 11:39:44', NULL),
(1792, 42, 3, 1, 44, 1, '', '', '42', 'AHMAD MUZAKIR', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:40:49', NULL),
(1793, 42, 9, 1, 36, 1, '', '', '42', 'MUHAMMAD', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Agar ditingkatkan lagi', '35', '2022-07-15 11:41:50', NULL),
(1794, 42, 10, 1, 46, 1, '', '', '42', 'ASDY NARANG, SH., MCL', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Lanjutkan dan tingkatkan', '35', '2022-07-15 11:43:22', NULL),
(1795, 42, 3, 1, 52, 1, '', '', '42', 'TRIO DARMO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Saran saya agar lebih ditingkatkan lagi', '35', '2022-07-15 11:45:56', NULL),
(1796, 42, 9, 1, 50, 1, '', '', '42', 'ASRUNTING KONDRAT', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:46:57', NULL),
(1797, 42, 6, 1, 41, 1, '', '', '42', 'LAMRAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:48:32', NULL),
(1798, 42, 9, 2, 29, 1, '', '', '42', 'VERONICA MARISA CRISTI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Teruskan pelayanan yang sudah baik', '35', '2022-07-15 11:50:02', NULL),
(1799, 42, 3, 1, 45, 1, '', '', '42', 'HADI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:50:45', NULL),
(1800, 42, 3, 1, 34, 1, '', '', '42', 'ANDI BAKRI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:51:28', NULL),
(1801, 42, 3, 1, 47, 1, '', '', '42', 'KARDOLIANSYAH', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:52:11', NULL),
(1802, 42, 9, 1, 36, 1, '', '', '42', 'PUTRA QUMALUDDIN ATTARNURRIQLI, SI.KOM', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:53:00', NULL),
(1803, 42, 3, 1, 30, 1, '', '', '42', 'HERMAN PASARIBU', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:53:54', NULL),
(1804, 42, 3, 1, 38, 1, '', '', '42', 'MUHAMAD NURHADI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 11:54:38', NULL),
(1805, 68, 9, 2, 26, 1, '', '', '68', 'GITA SILVIA, S.Tr.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 11:57:08', NULL),
(1806, 68, 6, 2, 30, 1, '', '', '68', 'KRISTIAN DWI RATNA SARI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 11:59:32', NULL),
(1807, 42, 9, 1, 41, 1, '', '', '42', 'ROBERT, ST', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:00:33', NULL),
(1808, 68, 6, 2, 48, 1, '', '', '68', 'KADARSIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:01:08', NULL),
(1809, 42, 3, 2, 50, 1, '', '', '42', 'HERI WATI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:01:43', NULL),
(1810, 68, 9, 2, 30, 1, '', '', '68', 'CAHAYANA SIAHAAN, S.Tr.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:02:35', NULL),
(1811, 42, 9, 1, 37, 1, '', '', '42', 'J. CHRISTIAN FEBRIANTO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Perlu peningkatan agar proses bisa lebih cepat lagi', '35', '2022-07-15 12:03:03', NULL),
(1812, 42, 3, 1, 24, 1, '', '', '42', 'SATRIA GIRINDRA WISNU PRADANA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:03:59', NULL),
(1813, 42, 3, 1, 43, 1, '', '', '42', 'MAARIF BUDI SANTOSO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:05:44', NULL),
(1814, 42, 3, 1, 39, 1, '', '', '42', 'SARDI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:06:36', NULL),
(1815, 42, 3, 1, 65, 1, '', '', '42', 'MUJIMAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:07:33', NULL),
(1816, 68, 6, 2, 26, 1, '', '', '68', 'ROKE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:08:33', NULL),
(1817, 42, 9, 1, 23, 1, '', '', '42', 'REZA RAMADHANI ARYA PUTRA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '--', '35', '2022-07-15 12:08:38', NULL),
(1818, 42, 3, 1, 60, 1, '', '', '42', 'HAIRI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:09:22', NULL),
(1819, 42, 9, 1, 37, 1, '', '', '42', 'ARIF RAHMAN HAKIM', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:10:21', NULL),
(1820, 68, 6, 2, 28, 1, '', '', '68', 'ASTINA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:11:03', NULL),
(1821, 42, 3, 1, 33, 1, '', '', '42', 'RIKSAN PASARIBU', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:11:05', NULL),
(1822, 42, 9, 1, 47, 1, '', '', '42', 'SUPRIYANTO, SE', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:11:35', NULL),
(1823, 42, 3, 1, 46, 1, '', '', '42', 'YUSUF', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-=', '35', '2022-07-15 12:12:13', NULL),
(1824, 68, 6, 2, 27, 1, '', '', '68', 'SISCA APRILIYANTI AULIA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:12:24', NULL),
(1825, 42, 9, 2, 28, 1, '', '', '42', 'MIA MAULIDYA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:12:57', NULL),
(1826, 68, 6, 2, 46, 1, '', '', '68', 'SANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:13:24', NULL),
(1827, 42, 3, 2, 47, 1, '', '', '42', 'DESI ARISANDI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:13:56', NULL),
(1828, 42, 3, 1, 37, 1, '', '', '42', 'CANDRA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:14:32', NULL),
(1829, 68, 6, 2, 43, 1, '', '', '68', 'PERAWATY, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:14:35', NULL),
(1830, 42, 2, 1, 52, 1, '', '', '42', 'SUPARDI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:15:08', NULL),
(1831, 68, 6, 2, 33, 1, '', '', '68', 'LENI MARLIYANA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:15:26', NULL),
(1832, 42, 9, 1, 24, 1, '', '', '42', 'NOPELIN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2022-07-15 12:15:47', NULL),
(1833, 68, 9, 2, 47, 1, '', '', '68', 'LIANE S.Tr.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:18:51', NULL),
(1834, 68, 6, 2, 27, 1, '', '', '68', 'LIANE S.Tr.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:19:57', NULL),
(1835, 68, 6, 2, 35, 1, '', '', '68', 'YUSSI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:20:58', NULL),
(1836, 68, 6, 2, 26, 1, '', '', '68', 'MARIA ULVA OMEGA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:21:50', NULL),
(1837, 68, 6, 2, 48, 1, '', '', '68', 'UMI KALSUM, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-15 12:23:13', NULL),
(1838, 66, 9, 1, 25, 1, '', '', '66', 'RELIAS ALVA TALENTA, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:19:29', NULL),
(1839, 66, 6, 1, 27, 1, '', '', '66', 'RONAL SEPTIAWAN, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:20:30', NULL),
(1840, 66, 6, 1, 25, 1, '', '', '66', 'HARIANTO TARO SEMBIRING, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:21:33', NULL),
(1841, 66, 6, 2, 39, 1, '', '', '66', 'VERAIKA,Amd,kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:22:35', NULL),
(1842, 66, 9, 2, 29, 1, '', '', '66', 'SANTALIANI, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:23:28', NULL),
(1843, 66, 9, 1, 25, 1, '', '', '66', 'JERIUS INDRA PRATAMA, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:24:21', NULL),
(1844, 66, 6, 2, 30, 1, '', '', '66', 'ICE TRIANTI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:25:15', NULL),
(1845, 66, 9, 2, 24, 1, '', '', '66', 'APRILIANI WIDYASTUTI, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:25:59', NULL),
(1846, 66, 6, 2, 32, 1, '', '', '66', 'LENY EVIRIANA, AMK', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:26:48', NULL),
(1847, 66, 9, 2, 42, 1, '', '', '66', 'SHIHATIN, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:27:49', NULL),
(1848, 66, 9, 1, 42, 1, '', '', '66', 'ARIS NUGROHO, S.Kep.,Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:28:35', NULL),
(1849, 66, 9, 2, 28, 1, '', '', '66', 'HENNY OCTAVIA, S.Kep.,Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:29:24', NULL),
(1850, 66, 6, 2, 32, 1, '', '', '66', 'DESYANI WAHYU EKA SAPUTRI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:31:40', NULL),
(1851, 66, 9, 1, 29, 1, '', '', '66', 'HERU HERDIANSYAH, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:32:24', NULL),
(1852, 66, 6, 2, 29, 1, '', '', '66', 'NADYAFITRIANITA, AMK', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:33:08', NULL),
(1853, 66, 6, 2, 33, 1, '', '', '66', 'TRI SUSANTI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:33:53', NULL),
(1854, 66, 6, 1, 30, 1, '', '', '66', 'FRENKY AZUANDI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:34:41', NULL),
(1855, 66, 6, 1, 26, 1, '', '', '66', 'SATRIA MUHTAR, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:36:40', NULL),
(1856, 66, 6, 1, 27, 1, '', '', '66', 'NOPRIANTO, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:37:30', NULL),
(1857, 66, 9, 1, 28, 1, '', '', '66', 'DERYANTO, S.Kep., Ns', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:38:28', NULL),
(1858, 66, 6, 2, 35, 1, '', '', '66', 'DIANA PUSPITA SARI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:39:12', NULL),
(1859, 66, 6, 1, 29, 1, '', '', '66', 'DENI HERNANDES SAPUTRA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:39:58', NULL),
(1860, 66, 6, 2, 28, 1, '', '', '66', 'MEINIA CHENTIANI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:40:42', NULL),
(1861, 66, 6, 2, 57, 1, '', '', '66', 'NARLIA, AMK', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:41:55', NULL),
(1862, 66, 9, 2, 24, 1, '', '', '66', 'WIDYANTIE, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:42:42', NULL),
(1863, 66, 9, 2, 24, 1, '', '', '66', 'FINNA PONIKA, S.Kep.,Ns', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:43:31', NULL),
(1864, 66, 9, 2, 25, 1, '', '', '66', 'RENTILIA WINDRI, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:44:20', NULL),
(1865, 66, 9, 1, 27, 1, '', '', '66', 'PRAYUDA FERDIAWAN ERFANDI, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:45:03', NULL),
(1866, 66, 9, 2, 24, 1, '', '', '66', 'ARBAYANTI SITHADEVI, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:46:34', NULL),
(1867, 66, 9, 2, 29, 1, '', '', '66', 'BRILIAN PUTRI CHRISTIANI, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:47:24', NULL),
(1868, 66, 9, 1, 29, 1, '', '', '66', 'HENDY TRISAPUTRA, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:48:07', NULL),
(1869, 66, 9, 2, 31, 1, '', '', '66', 'HERVINA, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:48:49', NULL),
(1870, 66, 9, 2, 40, 1, '', '', '66', 'WIWIK HARYENIE, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:49:26', NULL),
(1871, 66, 9, 2, 31, 1, '', '', '66', 'YOLLANDA RUNTUWENE, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:50:12', NULL),
(1872, 66, 9, 2, 25, 1, '', '', '66', 'ARIZA HARTINAH, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:50:56', NULL),
(1873, 66, 9, 2, 26, 1, '', '', '66', 'VERONA MAHARATHI, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:51:45', NULL),
(1874, 66, 6, 2, 33, 1, '', '', '66', 'JANSI YENI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:52:23', NULL),
(1875, 66, 6, 2, 26, 1, '', '', '66', 'CAROLINE FEBRIANA INKA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:53:04', NULL),
(1876, 66, 6, 1, 32, 1, '', '', '66', 'KARLEWIS TERNANDES, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:55:30', NULL),
(1877, 66, 6, 2, 28, 1, '', '', '66', 'PATRISIA JULIANY, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 10:56:21', NULL),
(1878, 66, 6, 1, 29, 1, '', '', '66', 'SETIAWAN, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:00:56', NULL),
(1879, 66, 6, 1, 28, 1, '', '', '66', 'UMAR, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:01:52', NULL),
(1880, 66, 6, 2, 24, 1, '', '', '66', 'PUTRI ARIYANTI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:02:44', NULL),
(1881, 66, 6, 2, 34, 1, '', '', '66', 'YENITHA OKTOVIANTIE, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:03:50', NULL),
(1882, 66, 6, 1, 25, 1, '', '', '66', 'JIMMI SEPTRIANTO A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:04:33', NULL),
(1883, 66, 6, 2, 23, 1, '', '', '66', 'DILA VIRA YOLANDA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:05:23', NULL),
(1884, 66, 6, 2, 23, 1, '', '', '66', 'YESI LISTYANINGSIH, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:06:05', NULL),
(1885, 66, 6, 2, 32, 1, '', '', '66', 'ANIS AFIFA, AMK', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:06:46', NULL),
(1886, 66, 6, 1, 24, 1, '', '', '66', 'IHSAN PERMADI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:07:29', NULL),
(1887, 66, 6, 2, 23, 1, '', '', '66', 'MONA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:09:02', NULL),
(1888, 66, 6, 1, 27, 1, '', '', '66', 'RENO RAMADHAN, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:09:49', NULL),
(1889, 66, 6, 2, 32, 1, '', '', '66', 'FEBBY RAMONAE, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:10:51', NULL),
(1890, 66, 6, 2, 22, 1, '', '', '66', 'FEBRYANA GASTRI AMELIA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:11:29', NULL),
(1891, 66, 6, 1, 27, 1, '', '', '66', 'KHAIRANNOOR, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:12:15', NULL),
(1892, 66, 6, 2, 32, 1, '', '', '66', 'DESIMIATY, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:12:51', NULL),
(1893, 66, 6, 2, 34, 1, '', '', '66', 'YENITHA OKTOVIANTIE, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:13:28', NULL),
(1894, 66, 6, 2, 26, 1, '', '', '66', 'VALENTINA PUTRI UTAMI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:14:13', NULL),
(1895, 66, 6, 1, 32, 1, '', '', '66', 'HENDRIK SALOMO THOMAS, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:14:58', NULL),
(1896, 66, 6, 1, 27, 1, '', '', '66', 'HAIRIL ANWAR, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:15:46', NULL),
(1897, 66, 9, 2, 25, 1, '', '', '66', 'AYU SUNDARY, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:16:47', NULL),
(1898, 66, 6, 1, 28, 1, '', '', '66', 'STEPANUS SIMSON, AMK', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '4', '36', '2022-07-19 11:17:35', NULL),
(1899, 66, 6, 1, 42, 1, '', '', '66', 'ALFIANUR, A.Md. Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:19:19', NULL),
(1900, 66, 6, 2, 31, 1, '', '', '66', 'WIWIK MEIDAYANTI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:20:10', NULL),
(1901, 66, 6, 2, 31, 1, '', '', '66', 'YANCE TUTUPOLY, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:21:10', NULL),
(1902, 66, 6, 1, 33, 1, '', '', '66', 'BENNY SUSANTO, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:21:59', NULL),
(1903, 66, 9, 1, 25, 1, '', '', '66', 'AHMAD LATHIF, S.Kep,.Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2022-07-19 11:22:41', NULL),
(1904, 42, 3, 2, 40, 1, '', '', '42', 'EKA WARIANA NINGSIH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 3, NULL, '', '-', '33', '2023-05-23 09:58:55', NULL),
(1905, 42, 3, 1, 40, 1, '', '', '42', 'AHMAD ZAINI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:11:58', NULL),
(1906, 42, 3, 1, 40, 1, '', '', '42', 'SAMSURI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:13:11', NULL),
(1907, 42, 3, 1, 40, 1, '', '', '42', 'DANIEL HARISON', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:15:10', NULL),
(1908, 42, 3, 2, 40, 1, '', '', '42', 'NUR HIDAYAT', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:16:07', NULL),
(1909, 42, 3, 1, 40, 1, '', '', '42', 'HADI HIDAYAT', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:17:06', NULL),
(1910, 42, 3, 1, 40, 1, '', '', '42', 'SATRIA GIRINDRA WISNU PRADANA', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:17:55', NULL),
(1911, 42, 3, 2, 40, 1, '', '', '42', 'AGUSTINA', NULL, 4, 4, 3, 3, 4, 4, 4, 3, 3, NULL, '', '-', '32', '2023-05-23 10:18:44', NULL),
(1912, 42, 3, 2, 40, 1, '', '', '42', 'MISWARI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:19:34', NULL),
(1913, 42, 3, 2, 40, 1, '', '', '42', 'LILI ANDRIANI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:20:38', NULL),
(1914, 42, 3, 1, 40, 1, '', '', '42', 'GAPUR', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:23:27', NULL),
(1915, 42, 3, 1, 40, 1, '', '', '42', 'GETSON IYEM', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:24:27', NULL),
(1916, 42, 3, 2, 40, 1, '', '', '42', 'TRI WANITA', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:25:28', NULL),
(1917, 42, 3, 1, 40, 1, '', '', '42', 'DEKI SUWANTO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:26:18', NULL),
(1918, 42, 9, 1, 40, 1, '', '', '42', 'MIGUHARTAKU, SE', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:27:27', NULL),
(1919, 42, 3, 2, 40, 1, '', '', '42', 'KARMILA DEWI SARI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:28:22', NULL),
(1920, 42, 3, 1, 40, 1, '', '', '42', 'ZASERS OGGIE PUTRA', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:29:08', NULL),
(1921, 42, 3, 1, 40, 1, '', '', '42', 'ABDURRAHIM', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:30:22', NULL),
(1922, 42, 3, 1, 40, 1, '', '', '42', 'MUHAMMAD RIFANI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:31:06', NULL),
(1923, 42, 9, 1, 40, 1, '', '', '42', 'MIGUHARTAKU', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:32:00', NULL),
(1924, 42, 3, 1, 40, 1, '', '', '42', 'EDY CANDRA', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:35:54', NULL),
(1925, 42, 3, 1, 40, 1, '', '', '42', 'ASMANI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:36:50', NULL),
(1926, 42, 3, 1, 40, 1, '', '', '42', 'HENDRA', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:37:40', NULL),
(1927, 42, 3, 1, 40, 1, '', '', '42', 'SIRAJUL MUNIR', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:38:32', NULL),
(1928, 42, 3, 1, 40, 1, '', '', '42', 'NABEHAN', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:40:06', NULL),
(1929, 42, 3, 2, 40, 1, '', '', '42', 'AYUNI WULANDARI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:40:58', NULL),
(1930, 42, 3, 1, 40, 1, '', '', '42', 'RUBIANSYAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:41:52', NULL),
(1931, 42, 3, 1, 40, 1, '', '', '42', 'ZAINI ANWAR', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:44:17', NULL),
(1932, 42, 3, 1, 40, 1, '', '', '42', 'MILU', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:46:21', NULL),
(1933, 42, 3, 1, 40, 1, '', '', '42', 'MILU', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:46:21', NULL),
(1934, 42, 3, 1, 40, 1, '', '', '42', 'SUGITO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:47:15', NULL),
(1935, 42, 3, 1, 40, 1, '', '', '42', 'ASIO H. UNIL', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:48:14', NULL),
(1936, 42, 9, 1, 40, 1, '', '', '42', 'RAKHMAT ADE SUBAKTI, ST', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 10:49:05', NULL),
(1937, 42, 9, 2, 40, 1, '', '', '42', 'VERAWATY, SE', NULL, 4, 4, 3, 4, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-05-23 14:24:34', NULL),
(1938, 42, 3, 1, 40, 1, '', '', '42', 'SUGITO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 14:25:53', NULL),
(1939, 42, 3, 1, 40, 1, '', '', '42', 'EBED KADARUSMAN', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 14:26:42', NULL),
(1940, 42, 3, 2, 40, 1, '', '', '42', 'ENUR NORJANAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 14:27:42', NULL),
(1941, 42, 3, 2, 40, 1, '', '', '42', 'SITI RAHUL JANNAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 14:28:31', NULL),
(1942, 42, 9, 2, 40, 1, '', '', '42', 'VERAWATY, SE', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 14:29:16', NULL),
(1943, 42, 3, 1, 40, 1, '', '', '42', 'PT. BHAKTI IDOLA TAMA', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 14:30:11', NULL),
(1944, 42, 3, 1, 40, 1, '', '', '42', 'DANIEL KUSMAN', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 14:31:04', NULL),
(1945, 42, 3, 1, 40, 1, '', '', '42', 'DANIEL KUSMAN', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 14:32:04', NULL),
(1946, 42, 3, 1, 40, 1, '', '', '42', 'SUSANTO MULYO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-23 14:32:50', NULL),
(1947, 68, 6, 2, 30, 1, '', '', '68', 'RAHAYU, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 09:24:27', NULL),
(1948, 68, 6, 2, 26, 1, '', '', '68', 'SRI WAHYUNI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 09:27:00', NULL),
(1949, 68, 9, 2, 38, 1, '', '', '68', 'APRI JANUARI RABUANA, S.Tr.Keb.,Bdn', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 09:30:16', NULL),
(1950, 68, 9, 2, 26, 1, '', '', '68', 'ELISA LESTARI, S.Tr.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 09:35:54', NULL),
(1951, 68, 9, 2, 39, 1, '', '', '68', 'APRI JANUARI RABUANA, S.Tr.Keb.,Bdn', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 09:40:39', NULL),
(1952, 68, 6, 2, 26, 1, '', '', '68', 'PUTRI AISYAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 09:45:29', NULL),
(1953, 68, 8, 2, 32, 1, '', '', '68', 'EMIA ROSPENTI, SST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 09:51:03', NULL),
(1954, 68, 6, 2, 44, 1, '', '', '68', 'ICHWATUN HASANAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 09:54:53', NULL),
(1955, 68, 6, 2, 44, 1, '', '', '68', 'ICHWATUN HASANAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 09:54:53', NULL),
(1956, 68, 6, 2, 47, 1, '', '', '68', 'ICHWATUN HASANAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 09:57:38', NULL),
(1957, 68, 6, 2, 32, 1, '', '', '68', 'PRIYANICHIA. A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:05:59', NULL),
(1958, 68, 6, 2, 32, 1, '', '', '68', 'PRIYANICHIA. A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:05:59', NULL),
(1959, 68, 6, 2, 53, 1, '', '', '68', 'ENATHE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:07:55', NULL),
(1960, 68, 6, 2, 27, 1, '', '', '68', 'KASIYANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:09:58', NULL),
(1961, 68, 6, 2, 30, 1, '', '', '68', 'TIKAE PURNAMA SARI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:11:46', NULL),
(1962, 68, 6, 2, 48, 1, '', '', '68', 'MESAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:14:55', NULL),
(1963, 68, 6, 2, 48, 1, '', '', '68', 'MESAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:14:55', NULL),
(1964, 68, 6, 2, 48, 1, '', '', '68', 'SITI ROKHIMAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:18:24', NULL);
INSERT INTO `tblhasilsurvei` (`tblhasilsurvei_id`, `refjenisizinikm_id`, `reftingkatpendidikan_id`, `refsex_id`, `tblhasilsurvei_usia`, `refloket_id`, `tblhasilsurvei_caradaftar`, `tblhasilsurvei_pengurusan`, `refjenisizinikm_nama`, `tblhasilsurvei_nama`, `tblhasilsurvei_nip`, `tblhasilsurvei_pertanyaan1`, `tblhasilsurvei_pertanyaan2`, `tblhasilsurvei_pertanyaan3`, `tblhasilsurvei_pertanyaan4`, `tblhasilsurvei_pertanyaan5`, `tblhasilsurvei_pertanyaan6`, `tblhasilsurvei_pertanyaan7`, `tblhasilsurvei_pertanyaan8`, `tblhasilsurvei_pertanyaan9`, `tblhasilsurvei_pertanyaan10`, `tblhasilsurvei_penilaian`, `tblhasilsurvei_saran`, `tblhasilsurvei_total`, `tblhasilsurvei_syscreate`, `tblhasilsurvei_sysupdate`) VALUES
(1965, 68, 6, 2, 28, 1, '', '', '68', 'RINA NOPERIANA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:21:33', NULL),
(1966, 68, 6, 2, 30, 1, '', '', '68', 'SITI NURJANAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:23:33', NULL),
(1967, 68, 6, 2, 28, 1, '', '', '68', 'MINA LEDYA RODINA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:25:27', NULL),
(1968, 68, 6, 2, 28, 1, '', '', '68', 'CINTHYA KRISTIN, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:27:11', NULL),
(1969, 68, 6, 2, 29, 1, '', '', '68', 'CINTHYA KRISTIN, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:31:42', NULL),
(1970, 68, 6, 2, 29, 1, '', '', '68', 'CINTHYA KRISTIN, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:31:42', NULL),
(1971, 68, 6, 2, 29, 1, '', '', '68', 'CINTHYA KRISTIN, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:31:42', NULL),
(1972, 68, 6, 2, 29, 1, '', '', '68', 'CINTHYA KRISTIN, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:31:42', NULL),
(1973, 68, 6, 2, 29, 1, '', '', '68', 'CINTHYA KRISTIN, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:31:43', NULL),
(1974, 68, 6, 2, 29, 1, '', '', '68', 'KUSRIANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:33:47', NULL),
(1975, 68, 6, 2, 31, 1, '', '', '68', 'MINARNI SARI LILIS SUMARNO, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:38:06', NULL),
(1976, 68, 6, 2, 32, 1, '', '', '68', 'TITIN TRI AGUSTIN, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:41:34', NULL),
(1977, 68, 6, 2, 35, 1, '', '', '68', 'HENNI SILAEN, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:43:14', NULL),
(1978, 68, 8, 2, 30, 1, '', '', '68', 'WINDA ANGELYANI, SST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:46:19', NULL),
(1979, 68, 6, 2, 33, 1, '', '', '68', 'SRIYANTIE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:51:10', NULL),
(1980, 68, 6, 2, 29, 1, '', '', '68', 'HENI KARDILA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:54:06', NULL),
(1981, 68, 6, 2, 22, 1, '', '', '68', 'NURUL SYIFA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:55:54', NULL),
(1982, 68, 6, 2, 25, 1, '', '', '68', 'RATNA THERESIA NGGAE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:58:23', NULL),
(1983, 68, 6, 2, 25, 1, '', '', '68', 'RATNA THERESIA NGGAE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 10:58:23', NULL),
(1984, 68, 6, 2, 24, 1, '', '', '68', 'KIKY LOVITA DEVY, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:02:04', NULL),
(1985, 68, 6, 2, 32, 1, '', '', '68', 'ARITTA NAULI MANIHURUK, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:04:20', NULL),
(1986, 68, 6, 2, 29, 1, '', '', '68', 'YUSIANTIE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:09:46', NULL),
(1987, 68, 6, 2, 27, 1, '', '', '68', 'ENGGAL AYU PERWIRA MULYADANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:13:48', NULL),
(1988, 68, 6, 2, 25, 1, '', '', '68', 'TRISNAWATI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:17:21', NULL),
(1989, 68, 6, 2, 25, 1, '', '', '68', 'KHATIMAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:18:45', NULL),
(1990, 68, 6, 2, 44, 1, '', '', '68', 'KHATIMAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:22:08', NULL),
(1991, 68, 6, 2, 44, 1, '', '', '68', 'KHATIMAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:22:08', NULL),
(1992, 68, 6, 2, 30, 1, '', '', '68', 'NUR ASIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:24:45', NULL),
(1993, 68, 6, 2, 30, 1, '', '', '68', 'NUR ASIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:24:45', NULL),
(1994, 68, 6, 2, 30, 1, '', '', '68', 'NUR ASIH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:24:45', NULL),
(1995, 68, 6, 2, 28, 1, '', '', '68', 'HILWA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:30:04', NULL),
(1996, 68, 6, 2, 28, 1, '', '', '68', 'HILWA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:31:35', NULL),
(1997, 68, 6, 2, 28, 1, '', '', '68', 'HILWA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:33:26', NULL),
(1998, 68, 6, 2, 28, 1, '', '', '68', 'HILWA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:33:27', NULL),
(1999, 68, 6, 2, 33, 1, '', '', '68', 'NOORHAYATI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:35:31', NULL),
(2000, 68, 6, 2, 34, 1, '', '', '68', 'NOORHAYATI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:37:00', NULL),
(2001, 68, 6, 2, 50, 1, '', '', '68', 'SAENAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:39:11', NULL),
(2002, 68, 6, 2, 26, 1, '', '', '68', 'ELISA FEBIANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:41:02', NULL),
(2003, 68, 6, 2, 26, 1, '', '', '68', 'ELISA FEBIANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:41:03', NULL),
(2004, 68, 6, 2, 27, 1, '', '', '68', 'CHRISTIN NATALINA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:43:34', NULL),
(2005, 68, 6, 2, 34, 1, '', '', '68', 'MARLIANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:45:34', NULL),
(2006, 68, 6, 2, 55, 1, '', '', '68', 'SUKANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:47:52', NULL),
(2007, 68, 6, 2, 28, 1, '', '', '68', 'OKTARIANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:50:12', NULL),
(2008, 68, 6, 2, 30, 1, '', '', '68', 'DEVIA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:51:58', NULL),
(2009, 68, 6, 2, 30, 1, '', '', '68', 'DEVIA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:52:01', NULL),
(2010, 68, 6, 2, 42, 1, '', '', '68', 'SITI YURIYAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:53:29', NULL),
(2011, 68, 6, 2, 42, 1, '', '', '68', 'SITI YURIYAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:53:30', NULL),
(2012, 68, 6, 2, 29, 1, '', '', '68', 'HUSNA RAHMAWATI RETNO, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 11:55:28', NULL),
(2013, 66, 6, 2, 35, 1, '', '', '66', 'EKA OKTAVIANY, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 14:30:59', NULL),
(2014, 66, 6, 1, 27, 1, '', '', '66', 'HAIRIL ANWAR, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 14:37:35', NULL),
(2015, 66, 6, 1, 27, 1, '', '', '66', 'HAIRIL ANWAR, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 14:37:35', NULL),
(2016, 66, 6, 1, 27, 1, '', '', '66', 'HAIRIL ANWAR, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 14:37:35', NULL),
(2017, 66, 6, 1, 32, 1, '', '', '66', 'HENDRIK SOLOMO THOMAS, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 14:41:11', NULL),
(2018, 66, 9, 2, 22, 1, '', '', '66', 'MERRY LIDYA, S.Kep.,Ns', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 14:44:36', NULL),
(2019, 66, 9, 1, 58, 1, '', '', '66', 'SELOT, S.Kep.,Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-24 14:48:37', NULL),
(2020, 42, 3, 2, 40, 1, '', '', '42', 'RUSMIMI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:41:43', NULL),
(2021, 42, 3, 1, 40, 1, '', '', '42', 'TOMMI ADE PUTRA', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:42:55', NULL),
(2022, 42, 3, 2, 40, 1, '', '', '42', 'ELLY ROYANI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:43:37', NULL),
(2023, 42, 3, 1, 40, 1, '', '', '42', 'AKHMAD WAHYUNI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:46:56', NULL),
(2024, 42, 3, 2, 40, 1, '', '', '42', 'HATNAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:48:09', NULL),
(2025, 42, 3, 1, 40, 1, '', '', '42', 'DIANG', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:48:58', NULL),
(2026, 42, 3, 2, 40, 1, '', '', '42', 'RISTA', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:49:59', NULL),
(2027, 42, 3, 2, 40, 1, '', '', '42', 'HJ. RAMLAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:52:00', NULL),
(2028, 42, 3, 2, 40, 1, '', '', '42', 'HJ. RAMLAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:52:01', NULL),
(2029, 42, 3, 1, 40, 1, '', '', '42', 'DAVIN HARTONO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:52:53', NULL),
(2030, 42, 3, 2, 40, 1, '', '', '42', 'LILIANAWATY', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:55:13', NULL),
(2031, 42, 3, 2, 40, 1, '', '', '42', 'EVA KENCANA DEWI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:56:10', NULL),
(2032, 42, 3, 1, 40, 1, '', '', '42', 'MUHAMMAD REZA PAHLAWAN', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:57:07', NULL),
(2033, 42, 3, 2, 40, 1, '', '', '42', 'SELLY', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:58:26', NULL),
(2034, 42, 3, 2, 40, 1, '', '', '42', 'AIDAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 07:59:44', NULL),
(2035, 42, 3, 2, 40, 1, '', '', '42', 'NURJUMAIYAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 08:01:28', NULL),
(2036, 42, 3, 1, 40, 1, '', '', '42', 'MUJIARSO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 08:02:59', NULL),
(2037, 42, 3, 2, 40, 1, '', '', '42', 'MISBAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 08:03:54', NULL),
(2038, 42, 3, 1, 40, 1, '', '', '42', 'YOUNGKI FIRMANTO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 08:39:31', NULL),
(2039, 42, 3, 2, 40, 1, '', '', '42', 'RIANTI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 08:40:22', NULL),
(2040, 42, 3, 1, 40, 1, '', '', '42', 'IMPI. B. GANI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 3, NULL, '', '-', '33', '2023-05-25 08:41:08', NULL),
(2041, 42, 3, 1, 40, 1, '', '', '42', 'RUSDIANSYAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 08:41:47', NULL),
(2042, 42, 3, 1, 40, 1, '', '', '42', 'HENDRO TUTUPOLY', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 08:42:27', NULL),
(2043, 42, 3, 1, 40, 1, '', '', '42', 'WARDODOANSYAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 08:43:09', NULL),
(2044, 42, 3, 2, 40, 1, '', '', '42', 'YAYUK SULASTRI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 08:44:02', NULL),
(2045, 42, 3, 1, 40, 1, '', '', '42', 'ELIKUT', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 13:53:17', NULL),
(2046, 42, 3, 2, 40, 1, '', '', '42', 'SALASIAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 13:54:04', NULL),
(2047, 42, 3, 1, 40, 1, '', '', '42', 'KISWO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 13:54:53', NULL),
(2048, 42, 3, 1, 40, 1, '', '', '42', 'PUNDING', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 13:55:37', NULL),
(2049, 42, 3, 1, 40, 1, '', '', '42', 'AING SUBARI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 13:56:20', NULL),
(2050, 42, 9, 1, 40, 1, '', '', '42', 'RIKI WILSON UNJUNG, ST', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 13:57:05', NULL),
(2051, 42, 3, 1, 40, 1, '', '', '42', 'ADITYA PRAWIRA', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 13:58:18', NULL),
(2052, 42, 3, 1, 40, 1, '', '', '42', 'DUNDI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 13:58:56', NULL),
(2053, 42, 3, 1, 40, 1, '', '', '42', 'AHMAD RAFI\'I', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 13:59:38', NULL),
(2054, 42, 9, 1, 40, 1, '', '', '42', 'STEPANUS SEGAH SAHA, SE', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:00:28', NULL),
(2055, 42, 3, 1, 40, 1, '', '', '42', 'JUMRI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:01:21', NULL),
(2056, 42, 3, 2, 40, 1, '', '', '42', 'WIDIANA SURYANI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:02:06', NULL),
(2057, 42, 3, 1, 40, 1, '', '', '42', 'ALDI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:02:49', NULL),
(2058, 42, 3, 1, 40, 1, '', '', '42', 'AHMAD NOOR EFFENDI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:03:38', NULL),
(2059, 42, 3, 1, 40, 1, '', '', '42', 'JANTO ARROYAN', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:04:20', NULL),
(2060, 42, 3, 2, 40, 1, '', '', '42', 'RAMA DONA', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:05:04', NULL),
(2061, 42, 3, 1, 40, 1, '', '', '42', 'JALI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:05:45', NULL),
(2062, 42, 3, 1, 40, 1, '', '', '42', 'CHANDRA OKTAVIA RINGKANG', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:06:26', NULL),
(2063, 42, 3, 1, 40, 1, '', '', '42', 'SUKAMTO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:08:16', NULL),
(2064, 42, 10, 1, 40, 1, '', '', '42', 'Ir. KAHARAP TAHAN', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:10:39', NULL),
(2065, 42, 3, 2, 40, 1, '', '', '42', 'MISBAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:11:14', NULL),
(2066, 42, 3, 1, 40, 1, '', '', '42', 'AHMAD MUZAKIR', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:11:53', NULL),
(2067, 42, 3, 1, 40, 1, '', '', '42', 'BELO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:12:30', NULL),
(2068, 42, 3, 1, 40, 1, '', '', '42', 'M. ALI RIDANI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:13:05', NULL),
(2069, 42, 3, 1, 40, 1, '', '', '42', 'JAJANG SUPRIYATNA', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:13:54', NULL),
(2070, 42, 10, 1, 40, 1, '', '', '42', 'Ir. KAHARAP TAHAN', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:14:36', NULL),
(2071, 42, 3, 1, 40, 1, '', '', '42', 'NEGU', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:21:15', NULL),
(2072, 42, 3, 1, 40, 1, '', '', '42', 'NEGU', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:21:15', NULL),
(2073, 42, 3, 1, 40, 1, '', '', '42', 'AHMADI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:24:11', NULL),
(2074, 42, 3, 1, 40, 1, '', '', '42', 'AHMADI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:24:55', NULL),
(2075, 42, 3, 1, 40, 1, '', '', '42', 'AHMADI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:25:36', NULL),
(2076, 42, 3, 2, 40, 1, '', '', '42', 'SRI ASTUTI HANDAYANI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:26:21', NULL),
(2077, 42, 3, 2, 40, 1, '', '', '42', 'SRI ASTUTI HANDAYANI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:26:22', NULL),
(2078, 42, 3, 1, 40, 1, '', '', '42', 'RUSPENDI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:27:47', NULL),
(2079, 42, 3, 2, 40, 1, '', '', '42', 'RAY IKA FITRIANA', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:28:31', NULL),
(2080, 42, 3, 1, 40, 1, '', '', '42', 'UGOE WINARGO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:29:11', NULL),
(2081, 42, 3, 2, 40, 1, '', '', '42', 'NOOR YETRI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:29:51', NULL),
(2082, 42, 10, 1, 40, 1, '', '', '42', 'BAHRIANOOR', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:30:33', NULL),
(2083, 42, 3, 1, 40, 1, '', '', '42', 'SUGIANTO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:34:11', NULL),
(2084, 42, 3, 2, 40, 1, '', '', '42', 'YONYTA KARTIKA SARI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:34:55', NULL),
(2085, 42, 3, 1, 40, 1, '', '', '42', 'MUHAMMAD', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:35:33', NULL),
(2086, 42, 3, 1, 40, 1, '', '', '42', 'LUKMANTO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:36:11', NULL),
(2087, 42, 3, 2, 40, 1, '', '', '42', 'WIJIYANTI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:36:54', NULL),
(2088, 42, 3, 2, 40, 1, '', '', '42', 'RODIYAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:37:39', NULL),
(2089, 42, 3, 1, 40, 1, '', '', '42', 'UGOE WINARGO', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:38:14', NULL),
(2090, 42, 3, 1, 40, 1, '', '', '42', 'H. JAMBRI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:38:50', NULL),
(2091, 42, 3, 2, 40, 1, '', '', '42', 'NIBEL', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:39:27', NULL),
(2092, 42, 3, 1, 40, 1, '', '', '42', 'DESMON LUMBAN GAOL', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:40:06', NULL),
(2093, 42, 3, 1, 40, 1, '', '', '42', 'TUAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:40:50', NULL),
(2094, 42, 3, 1, 40, 1, '', '', '42', 'IPONG', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:41:31', NULL),
(2095, 42, 3, 1, 40, 1, '', '', '42', 'MUHAMAD NURHADI', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-25 14:42:31', NULL),
(2096, 56, 9, 2, 43, 1, '', '', '56', 'drg. LIDYA MARLIYAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 08:51:45', NULL),
(2097, 97, 9, 2, 40, 1, '', '', '97', 'YUNITHA, S.Pd', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-26 08:57:45', NULL),
(2098, 97, 9, 1, 40, 1, '', '', '97', 'SURYA WADI PRIYONO, S. Pd', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-26 08:59:01', NULL),
(2099, 56, 10, 1, 57, 1, '', '', '56', 'dr. MUNAWAR LATIF, Sp.PD', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 08:59:18', NULL),
(2100, 56, 10, 1, 57, 1, '', '', '56', 'dr. MUNAWAR LATIF, Sp.PD', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:08:08', NULL),
(2101, 97, 9, 2, 40, 1, '', '', '97', 'SITI MASITAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-26 09:10:00', NULL),
(2102, 97, 9, 2, 40, 1, '', '', '97', 'SITI MASITAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-26 09:10:00', NULL),
(2103, 56, 9, 2, 27, 1, '', '', '56', 'drg. NOVA ANGGELIA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:11:36', NULL),
(2104, 97, 9, 2, 40, 1, '', '', '97', 'SITI MASITAH', NULL, 4, 4, 3, 3, 4, 4, 4, 4, 4, NULL, '', '-', '34', '2023-05-26 09:13:52', NULL),
(2105, 56, 10, 1, 34, 1, '', '', '56', 'dr. I GUSTI NGURAH ARI ADITYA SATRIYA WIBAWA, Sp.B', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:18:17', NULL),
(2106, 56, 11, 2, 36, 1, '', '', '56', 'dr. YONATAN ANDRI YANURI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:21:44', NULL),
(2107, 56, 11, 2, 30, 1, '', '', '56', 'dr. NITA MARTA HARDIANTY', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:24:22', NULL),
(2108, 56, 11, 2, 28, 1, '', '', '56', 'dr. RADIANTI FREDERIKA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:26:59', NULL),
(2109, 56, 11, 1, 32, 1, '', '', '56', 'dr. TUNGGUL SOUBAON SIDABALOK', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:30:17', NULL),
(2110, 56, 11, 2, 26, 1, '', '', '56', 'dr. AGNES DANIELLA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:32:11', NULL),
(2111, 56, 11, 2, 26, 1, '', '', '56', 'dr. AGNES DANIELLA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:32:13', NULL),
(2112, 56, 11, 2, 25, 1, '', '', '56', 'dr. LASMA MARIA SIMAMORA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:34:12', NULL),
(2113, 56, 11, 2, 28, 1, '', '', '56', 'dr. THERESIA ALFIONITA SINULINGGA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:35:45', NULL),
(2114, 56, 11, 2, 24, 1, '', '', '56', 'dr. TESSA WULANDARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:37:50', NULL),
(2115, 56, 11, 2, 24, 1, '', '', '56', 'dr. BELLA AGUSTINA ANDREANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:40:12', NULL),
(2116, 56, 11, 2, 28, 1, '', '', '56', 'dr. FERDINAN SIBARANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:41:52', NULL),
(2117, 56, 11, 2, 34, 1, '', '', '56', 'dr. HEMALINY ANANTA SIPAHUTAR', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:44:07', NULL),
(2118, 56, 11, 2, 27, 1, '', '', '56', 'r. SILUH PUTU CHININYA VANIA SARASWATI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:47:10', NULL),
(2119, 56, 11, 2, 30, 1, '', '', '56', 'dr. FEBRIANA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:48:54', NULL),
(2120, 56, 11, 2, 32, 1, '', '', '56', 'dr. LEWI MARTHA FURI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-05-26 09:50:18', NULL),
(3270, 56, 9, 2, 30, 1, '', '', '56', 'dr. precilia', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 3, NULL, '', '-', '35', '2023-11-27 11:27:54', NULL),
(3271, 66, 6, 2, 27, 1, '', '', '66', 'YULIA LESTARI, A.Md.Kep', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', 'ok', '28', '2023-11-27 11:28:01', NULL),
(3272, 56, 9, 2, 32, 1, '', '', '56', 'dr. meta yilia nindita', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 11:30:49', NULL),
(3273, 56, 9, 2, 35, 1, '', '', '56', 'dr. Tessa', NULL, 4, 4, 4, 4, 4, 4, 3, 3, 3, NULL, '', '-', '33', '2023-11-27 11:34:52', NULL),
(3274, 56, 9, 1, 38, 1, '', '', '56', 'Ferdinan Sibarani', NULL, 4, 4, 4, 4, 3, 4, 3, 4, 3, NULL, '', '-', '33', '2023-11-27 11:36:09', NULL),
(3283, 56, 9, 2, 27, 1, '', '', '56', 'dr. Olivia', NULL, 4, 4, 4, 4, 4, 3, 3, 3, 3, NULL, '', '-', '32', '2023-11-27 13:53:24', NULL),
(3284, 66, 9, 2, 39, 1, '', '', '66', 'YOPIANTI, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'sip', '36', '2023-11-27 13:53:45', NULL),
(3285, 56, 9, 2, 49, 1, '', '', '56', 'Safira Amira', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 13:54:51', NULL),
(3286, 66, 6, 1, 33, 1, '', '', '66', 'AHMADI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 13:55:27', NULL),
(3287, 56, 9, 2, 30, 1, '', '', '56', 'dr. KAREL STEPANUS', NULL, 4, 3, 4, 4, 3, 3, 3, 4, 3, NULL, '', '-', '31', '2023-11-27 13:56:04', NULL),
(3288, 66, 6, 2, 25, 1, '', '', '66', 'YUNISA HANDAYANTI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 13:56:36', NULL),
(3289, 56, 9, 2, 27, 1, '', '', '56', 'dr. NITA MARTHA HARDIANTY', NULL, 3, 3, 3, 4, 3, 3, 3, 3, 3, NULL, '', '-', '28', '2023-11-27 13:57:41', NULL),
(3290, 66, 6, 2, 32, 1, '', '', '66', 'IKA RAHMI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 13:58:25', NULL),
(3291, 56, 9, 2, 28, 1, '', '', '56', 'dr. Sherly Meygaretha', NULL, 4, 4, 4, 4, 4, 4, 3, 3, 3, NULL, '', '-', '33', '2023-11-27 13:59:06', NULL),
(3292, 66, 6, 2, 30, 1, '', '', '66', 'SANIAH, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 13:59:48', NULL),
(3275, 56, 9, 2, 42, 1, '', '', '56', 'dr. THERESIA ALFIONITA SINULINGGA', NULL, 4, 4, 4, 4, 3, 4, 4, 4, 3, NULL, '', '-', '34', '2023-11-27 12:07:24', NULL),
(3276, 56, 9, 2, 36, 1, '', '', '56', 'dr. Agnes', NULL, 4, 3, 4, 4, 3, 3, 3, 4, 3, NULL, '', '-', '31', '2023-11-27 12:08:09', NULL),
(3277, 56, 9, 1, 34, 1, '', '', '56', 'RIO RASUL ADMIRAL', NULL, 4, 3, 4, 4, 3, 3, 4, 3, 3, NULL, '', '-', '31', '2023-11-27 12:14:25', NULL),
(3278, 56, 9, 1, 45, 1, '', '', '56', 'Yulia Kurniawati', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'baik', '36', '2023-11-27 12:15:58', NULL),
(3279, 66, 6, 1, 34, 1, '', '', '66', 'SYAIROFI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 13:41:41', NULL),
(3280, 66, 6, 1, 34, 1, '', '', '66', 'SANURANG SANUPATTI. S.Kep.,Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 13:47:39', NULL),
(3281, 66, 6, 1, 27, 1, '', '', '66', 'LUKMANUL HAKIM, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 13:49:43', NULL),
(3282, 66, 6, 2, 27, 1, '', '', '66', 'SUMIATI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 13:51:19', NULL),
(3305, 66, 6, 2, 35, 1, '', '', '66', 'Lestari Rusmiati', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:33:47', NULL),
(3293, 66, 6, 2, 27, 1, '', '', '66', 'VALENTINNA PUTRI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 14:01:38', NULL),
(3294, 66, 6, 2, 25, 1, '', '', '66', 'TRI DAMAYANTI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 14:06:49', NULL),
(3295, 66, 6, 2, 44, 1, '', '', '66', 'SHIHATIN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'mantul', '36', '2023-11-27 14:08:32', NULL),
(3296, 66, 9, 2, 24, 1, '', '', '66', 'LINA PERMATA SARI, S.Kep.,Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'baik', '36', '2023-11-27 14:09:36', NULL),
(3297, 66, 9, 2, 31, 1, '', '', '66', 'ALBITA, S.Kep., Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 14:10:45', NULL),
(3298, 66, 6, 2, 24, 1, '', '', '66', 'RIYAN WIJAYA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 14:11:45', NULL),
(3299, 66, 6, 1, 31, 1, '', '', '66', 'YUDIANUS', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 14:12:43', NULL),
(3300, 66, 6, 1, 29, 1, '', '', '66', 'Doni', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'bagus', '36', '2023-11-27 14:28:11', NULL),
(3301, 66, 9, 1, 29, 1, '', '', '66', 'AGUSIAS YUDIKA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'mantap', '36', '2023-11-27 14:29:12', NULL),
(3302, 66, 6, 2, 38, 1, '', '', '66', 'SEPIRELAWATI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 14:30:23', NULL),
(3303, 66, 6, 1, 34, 1, '', '', '66', 'PANDRI SUPARTA, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 14:31:49', NULL),
(3304, 66, 6, 2, 33, 1, '', '', '66', 'Sri Neneng', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 14:32:51', NULL),
(3268, 56, 9, 1, 34, 1, '', '', '56', 'dr. ADRIANUS  NYOMAN SUDARTHA  MANTIKEI', NULL, 4, 4, 4, 4, 4, 4, 3, 4, 3, NULL, '', '-', '34', '2023-11-27 11:19:53', NULL),
(3269, 56, 9, 2, 37, 1, '', '', '56', '.DR. meisarah', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 11:26:40', NULL),
(3306, 66, 6, 2, 28, 1, '', '', '66', 'Verona Maharathi', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:34:33', NULL),
(3307, 66, 6, 1, 25, 1, '', '', '66', 'Harianto Taro Sembiring', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 14:36:45', NULL),
(3308, 66, 6, 2, 32, 1, '', '', '66', 'Debie Grelisen, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:38:10', NULL),
(3309, 66, 9, 2, 51, 1, '', '', '66', 'NELSIANA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:39:06', NULL),
(3310, 66, 9, 2, 51, 1, '', '', '66', 'JERIANA DEWI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 14:40:02', NULL),
(3311, 66, 9, 2, 27, 1, '', '', '66', 'FATMA ASTUTI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 14:43:11', NULL),
(3312, 66, 6, 2, 24, 1, '', '', '66', 'SILVI YANTI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:45:14', NULL),
(3313, 66, 9, 2, 28, 1, '', '', '66', 'HENI SANIAH, S.Tr.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:46:43', NULL),
(3314, 66, 6, 1, 22, 1, '', '', '66', 'ILHAM KRISNA MUKTI, A.Md.Kep', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:48:03', NULL),
(3315, 66, 9, 2, 27, 1, '', '', '66', 'YESTI ANAWATI, S.Kep.,Ners', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:49:12', NULL),
(3316, 56, 9, 1, 34, 1, '', '', '56', 'Josef Willy', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'baik', '36', '2023-11-27 14:49:53', NULL),
(3317, 66, 9, 1, 24, 1, '', '', '66', 'DANDUNG SETIADI, S.Kep.,Ns', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:50:33', NULL),
(3318, 56, 9, 2, 27, 1, '', '', '56', 'SEVENTINA AGUSTIANI', NULL, 4, 4, 4, 4, 3, 3, 3, 3, 3, NULL, '', '-', '31', '2023-11-27 14:50:40', NULL),
(3207, 42, 3, 1, 36, 1, '', '', '42', 'ROMI OKTRIASDI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', 'Tetap pertahankan', '35', '2023-11-27 08:39:01', NULL),
(3208, 42, 3, 1, 62, 1, '', '', '42', 'HAIRI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 08:40:47', NULL),
(3209, 42, 9, 1, 41, 1, '', '', '42', 'SISWANDI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 08:42:28', NULL),
(3210, 42, 3, 2, 34, 1, '', '', '42', 'RAMINA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 08:43:54', NULL),
(3211, 42, 9, 1, 39, 1, '', '', '42', 'BUDIANTO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 08:45:33', NULL),
(3212, 42, 9, 2, 28, 1, '', '', '42', 'NORA LUPITA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 08:47:44', NULL),
(3213, 42, 3, 1, 33, 1, '', '', '42', 'KIKI LOGAWI ASISWAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 08:54:06', NULL),
(3215, 42, 9, 2, 45, 1, '', '', '42', 'SORYATIE', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 08:57:59', NULL),
(3216, 42, 9, 1, 54, 1, '', '', '42', 'EDWIN TOTO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 08:59:48', NULL),
(3217, 42, 9, 2, 45, 1, '', '', '42', 'CARIASI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:01:06', NULL),
(3218, 42, 9, 1, 62, 1, '', '', '42', 'SINYUH L SINGAM', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:02:58', NULL),
(3219, 42, 10, 1, 44, 1, '', '', '42', 'JOHANUS INDARTO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:04:25', NULL),
(3220, 42, 3, 1, 32, 1, '', '', '42', 'ABDURRAHIM', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:06:35', NULL),
(3221, 42, 9, 2, 24, 1, '', '', '42', 'MELIANA ASRIYANI PUTRI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:07:50', NULL),
(3222, 68, 6, 2, 29, 1, '', '', '68', 'FANNY TRIA LESTARIE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'Tingkatkan lebih baik lagi', '36', '2023-11-27 09:08:38', NULL),
(3223, 68, 6, 2, 29, 1, '', '', '68', 'NOR AINA SYAFA\'AH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'Mantap', '36', '2023-11-27 09:09:49', NULL),
(3224, 42, 9, 1, 47, 1, '', '', '42', 'KETUT NAOVAN HINDARI WIYANTO', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:10:51', NULL),
(3225, 68, 6, 2, 27, 1, '', '', '68', 'MAYA APRIYANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'Tingkatkan', '36', '2023-11-27 09:11:23', NULL),
(3226, 42, 9, 1, 27, 1, '', '', '42', 'GUSTI WAHYU PERDANA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:12:41', NULL),
(3227, 68, 6, 2, 26, 1, '', '', '68', 'FRISKA DYAH AYU EKAWATI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'sudah baik', '36', '2023-11-27 09:15:19', NULL),
(3228, 68, 6, 2, 26, 1, '', '', '68', 'NOVIA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'sangat baik', '36', '2023-11-27 09:17:25', NULL),
(3229, 68, 6, 2, 27, 1, '', '', '68', 'ROKE, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'sudah bagus', '36', '2023-11-27 09:19:42', NULL),
(3230, 68, 6, 2, 29, 1, '', '', '68', 'FITRI INDRIANI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'Sangat bagus', '36', '2023-11-27 09:21:13', NULL),
(3231, 42, 9, 1, 58, 1, '', '', '42', 'HADRI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:21:53', NULL),
(3232, 42, 9, 1, 45, 1, '', '', '42', 'SUPRIYADI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:24:24', NULL),
(3233, 68, 6, 2, 30, 1, '', '', '68', 'YETRI SURANTI, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'sudah baik', '36', '2023-11-27 09:24:54', NULL),
(3234, 68, 6, 2, 36, 1, '', '', '68', 'ENI OKTAMISARI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'baik', '36', '2023-11-27 09:26:50', NULL),
(3235, 42, 9, 2, 45, 1, '', '', '42', 'DEWI INDAH RAKHMAWATI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:26:52', NULL),
(3236, 68, 6, 2, 26, 1, '', '', '68', 'HASANAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'bagus', '36', '2023-11-27 09:28:52', NULL),
(3237, 42, 3, 2, 54, 1, '', '', '42', 'YUNITHA DURUT', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:29:11', NULL),
(3238, 68, 6, 2, 26, 1, '', '', '68', 'RARIUNI DELITAKU', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'bagus sudah', '36', '2023-11-27 09:30:43', NULL),
(3239, 42, 9, 1, 49, 1, '', '', '42', 'PERSI LUHER``', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:31:02', NULL),
(3240, 68, 6, 2, 27, 1, '', '', '68', 'NI KETUT SANTIA ANGGRAINI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'bagus sudah', '36', '2023-11-27 09:32:20', NULL),
(3241, 68, 9, 2, 32, 1, '', '', '68', 'NEILY SA"ADAH, SST', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'mantap', '36', '2023-11-27 09:33:48', NULL),
(3242, 68, 6, 2, 51, 1, '', '', '68', 'NELSIANA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'mantul', '36', '2023-11-27 09:35:02', NULL),
(3243, 42, 9, 1, 35, 1, '', '', '42', 'MULIANSYAH SUTTA', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:35:56', NULL),
(3244, 68, 6, 2, 51, 1, '', '', '68', 'JERIANA DEWI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'sudah baik', '36', '2023-11-27 09:37:12', NULL),
(3245, 42, 9, 1, 36, 1, '', '', '42', 'ALTEN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:37:52', NULL),
(3246, 68, 6, 2, 23, 1, '', '', '68', 'NOVITA HIKMAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'sudah baik', '36', '2023-11-27 09:39:05', NULL),
(3247, 68, 6, 2, 30, 1, '', '', '68', 'REFITA ERLINA, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'baik', '36', '2023-11-27 09:40:13', NULL),
(3248, 68, 6, 2, 32, 1, '', '', '68', 'JAUHAR LATIFAH, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 09:46:11', NULL),
(3249, 68, 6, 2, 33, 1, '', '', '68', 'LINDA WATI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 09:47:24', NULL),
(3250, 68, 6, 2, 25, 1, '', '', '68', 'KRISTINA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 09:48:23', NULL),
(3251, 42, 9, 1, 36, 1, '', '', '42', 'ALTEN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:49:29', NULL),
(3252, 68, 6, 2, 32, 1, '', '', '68', 'ADE EVA ANGGREHANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'oke', '36', '2023-11-27 09:49:45', NULL),
(3253, 68, 6, 2, 32, 1, '', '', '68', 'WIDYA PUSPITA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'oke', '36', '2023-11-27 09:50:43', NULL),
(3254, 42, 3, 2, 58, 1, '', '', '42', 'SUMIYATI', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 09:51:09', NULL),
(3255, 68, 6, 2, 34, 1, '', '', '68', 'LINA MARLIYANI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 09:53:06', NULL),
(3256, 68, 6, 2, 31, 1, '', '', '68', 'RR. NIA SAWITRI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'oke', '36', '2023-11-27 09:55:10', NULL),
(3257, 68, 6, 2, 37, 1, '', '', '68', 'MEGAWATI NABABAN', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'Ok', '36', '2023-11-27 09:56:55', NULL),
(3258, 68, 6, 2, 33, 1, '', '', '68', 'LISKA YAYANTARA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 09:58:55', NULL),
(3259, 42, 3, 1, 64, 1, '', '', '42', 'UDI .U. LEMAN', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 10:05:47', NULL),
(3260, 68, 6, 2, 47, 1, '', '', '68', 'ALSENIMARTHY, A.Md.Keb', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 10:05:56', NULL),
(3261, 68, 6, 2, 25, 1, '', '', '68', 'NUR EKA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 10:08:28', NULL),
(3262, 68, 6, 2, 26, 1, '', '', '68', 'SITI SURYAWATI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 10:17:17', NULL),
(3263, 68, 6, 2, 27, 1, '', '', '68', 'HILALLIA MA\'RIFAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 10:18:37', NULL),
(3264, 42, 9, 1, 44, 1, '', '', '42', 'ACHMAD FARID', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 10:33:53', NULL),
(3265, 42, 9, 1, 41, 1, '', '', '42', 'RIDWAN ISMAIL', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 10:35:37', NULL),
(3266, 42, 10, 1, 51, 1, '', '', '42', 'YOHANES HARYADI SIEMON', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 10:37:48', NULL),
(3267, 42, 9, 2, 39, 1, '', '', '42', 'Evy Yunita Sethiono', NULL, 4, 4, 4, 3, 4, 4, 4, 4, 4, NULL, '', '-', '35', '2023-11-27 10:40:21', NULL),
(3319, 66, 9, 2, 25, 1, '', '', '66', 'KHANISYAH ISTIQOMAH', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:51:19', NULL),
(3320, 56, 9, 1, 30, 1, '', '', '56', 'dr. TRI ROHMANTO', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'membantu sekali', '36', '2023-11-27 14:51:29', NULL),
(3321, 56, 9, 2, 37, 1, '', '', '56', 'dr. Rinintha', NULL, 4, 3, 4, 4, 3, 3, 3, 4, 3, NULL, '', '-', '31', '2023-11-27 14:52:13', NULL),
(3322, 56, 9, 1, 37, 1, '', '', '56', 'dr. Sartono', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:52:52', NULL),
(3323, 66, 6, 2, 29, 1, '', '', '66', 'DEWI YANTI MUSTIKA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:53:39', NULL),
(3324, 66, 6, 2, 31, 1, '', '', '66', 'RINSA DEWI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:54:35', NULL),
(3325, 66, 6, 1, 24, 1, '', '', '66', 'NOBELDI', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', 'ok', '36', '2023-11-27 14:56:38', NULL),
(3326, 66, 9, 2, 29, 1, '', '', '66', 'KRISTIYA L. NANDENG', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 14:57:38', NULL),
(3328, 66, 9, 1, 31, 1, '', '', '66', 'RYAN TAGOR HADOMUAN HARAHAP', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 15:03:12', NULL),
(3334, 66, 6, 2, 24, 1, '', '', '66', 'LIA OKTARIA', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, '', '-', '36', '2023-11-27 15:14:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblhistugasdalamnegriusulan`
--

CREATE TABLE `tblhistugasdalamnegriusulan` (
  `tblhistugasdalamnegriusulan_id` bigint(19) NOT NULL,
  `tblidentitaspegawaiadhoc_id` bigint(19) NOT NULL,
  `tblhistugasdalamnegriusulan_urut` int(11) DEFAULT NULL,
  `tblhistugasdalamnegriusulan_daerahtujuan` varchar(105) DEFAULT NULL,
  `tblhistugasdalamnegriusulan_jenispenugasan` varchar(255) DEFAULT NULL,
  `tblhistugasdalamnegriusulan_penetap` varchar(255) DEFAULT NULL,
  `tblhistugasdalamnegriusulan_skno` varchar(150) DEFAULT NULL,
  `tblhistugasdalamnegriusulan_sktgl` date DEFAULT NULL,
  `tblhistugasdalamnegriusulan_tglmulai` date DEFAULT NULL,
  `tblhistugasdalamnegriusulan_tglakhir` date DEFAULT NULL,
  `tblhistugasdalamnegriusulan_tglentry` date NOT NULL,
  `tblhistugasdalamnegriusulan_tglupdate` date NOT NULL,
  `refprosesusulan_id` int(2) NOT NULL,
  `refpengguna_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhistugasdalamnegriusulan`
--

INSERT INTO `tblhistugasdalamnegriusulan` (`tblhistugasdalamnegriusulan_id`, `tblidentitaspegawaiadhoc_id`, `tblhistugasdalamnegriusulan_urut`, `tblhistugasdalamnegriusulan_daerahtujuan`, `tblhistugasdalamnegriusulan_jenispenugasan`, `tblhistugasdalamnegriusulan_penetap`, `tblhistugasdalamnegriusulan_skno`, `tblhistugasdalamnegriusulan_sktgl`, `tblhistugasdalamnegriusulan_tglmulai`, `tblhistugasdalamnegriusulan_tglakhir`, `tblhistugasdalamnegriusulan_tglentry`, `tblhistugasdalamnegriusulan_tglupdate`, `refprosesusulan_id`, `refpengguna_id`) VALUES
(57, 10128, NULL, 'daerah', 'jenis tugas', 'penetyap', '78978', '2013-09-09', '2013-09-09', '2013-09-09', '2013-09-09', '2013-09-09', 3, 0),
(58, 10128, NULL, 'daerah tujuan', 'jenis', 'penetap', '8787', '2013-09-09', '2013-09-09', '2013-09-09', '2013-09-09', '2013-09-09', 2, 1),
(59, 10343, NULL, 'bogor', 'jenis tuga', 'penetap', '989898', '2013-11-09', '2013-11-09', '2013-11-09', '2013-11-09', '2013-11-09', 3, 0),
(60, 10403, NULL, 'PPPPP', 'PPPPPPP', 'PPPPPPP', 'MMMM', '2013-12-18', '2013-12-21', '2013-12-26', '2013-12-13', '2013-12-13', 2, 0),
(61, 10403, NULL, 'pppppp', 'pppppp', 'ppppp', 'pppppp', '0000-00-00', '0000-00-00', '0000-00-00', '2013-12-14', '2013-12-14', 2, 1),
(62, 10403, NULL, 'daerah oscar', 'nnnnnn', 'nnnnnnn', 'nnnnnnn', '2013-09-10', '2013-09-10', '0000-00-00', '2013-12-17', '2013-12-17', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblizin`
--

CREATE TABLE `tblizin` (
  `tblizin_id` int(10) NOT NULL,
  `tblizin_nama` varchar(255) NOT NULL,
  `tblizin_lama` int(5) DEFAULT NULL,
  `tblizin_icon` varchar(255) DEFAULT NULL,
  `tblizin_adaretribusi` enum('F','T') DEFAULT 'F',
  `tblizin_adaceklap` enum('F','T') DEFAULT 'F',
  `tblizin_adarekomendasi` enum('F','T') DEFAULT NULL,
  `tblizin_terstruktur` enum('F','T') DEFAULT 'T',
  `tblrole_id` int(11) DEFAULT NULL,
  `tblizin_isaktif` enum('F','T') DEFAULT 'T',
  `tblizin_isonline` enum('T','F') DEFAULT 'F',
  `tblizin_ismulti` enum('T','F') DEFAULT 'F',
  `tblizinkelompok_id` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblizin`
--

INSERT INTO `tblizin` (`tblizin_id`, `tblizin_nama`, `tblizin_lama`, `tblizin_icon`, `tblizin_adaretribusi`, `tblizin_adaceklap`, `tblizin_adarekomendasi`, `tblizin_terstruktur`, `tblrole_id`, `tblizin_isaktif`, `tblizin_isonline`, `tblizin_ismulti`, `tblizinkelompok_id`) VALUES
(1, 'Pendaftaran Penanaman Modal (Modal Dibawah 10M)', NULL, 'perusahaan.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(2, 'Izin Prinsip Penanaman Modal (Modal Dibawah 10M)', NULL, 'shop.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(3, 'Izin Usaha Tetap Penanaman Modal (Modal Dibawah 10M)', NULL, 'industry_izin.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(4, 'Surat Izin Usaha Perdagangan(SIUP)', NULL, 'prinsip.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(5, 'Tanda Daftar Perusahaan(TDP)', NULL, 'perusahaan.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(6, 'Izin Usaha Industri(IUI)', NULL, 'industry_izin.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(7, 'Tanda Daftar Gudang(TDG)', NULL, 'padi.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(8, 'Izin Usaha Burung Walet/ Sriti', NULL, 'satwa.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(9, 'Izin Penggilingan Padi, Huller dan Penyosohan Beras (Rice Mill Unit/RMU)', NULL, 'membangun.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(10, 'Izin Usaha Warung Internet dan Game Net', NULL, 'ps.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(11, 'Rumah Sakit Umum Type C, D', NULL, 'hospital4.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(12, 'Rumah Sakit Khusus Type C', NULL, 'hospital3.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(13, 'Klinik Pratama', NULL, 'apotik1.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(14, 'Klinik Utama', NULL, 'hospital4.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(15, 'Tanda Daftar Industri (TDI)', NULL, 'industry_izin.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(16, 'Izin Usaha Peternakan', NULL, 'satwa.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(17, 'Izin Perluasan Usaha Peternakan', NULL, 'perusahaan.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(18, 'Tanda Daftar Peternakan Rakyat', NULL, 'satwa.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(19, 'Tanda Daftar Usaha Pariwisata (TDUP) Penyelenggaraan Kegiatan Hiburan dan Rekreasi', NULL, 'pariwisata.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(20, 'Tanda Daftar Usaha Pariwisata (TDUP) Pengelolaan Daya tarik Wisata', NULL, 'pariwisata.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(21, 'Tanda Daftar Usaha Pariwisata (TDUP) Penyediaan Akomodasi', NULL, 'pariwisata.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(22, 'Tanda Daftar Usaha Pariwisata (TDUP) Jasa Makanan dan Minuman', NULL, 'food.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(23, 'Tanda Daftar Usaha Pariwisata (TDUP) Wisata Tirta', NULL, 'pariwisata.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(24, 'Tanda Daftar Usaha Pariwisata (TDUP) Kawasan Wisata', NULL, 'pariwisata.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(25, 'Tanda Daftar Usaha Pariwisata (TDUP) Penyelenggaraan Pertemuan dan Pameran', NULL, 'pariwisata.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(26, 'Tanda Daftar Usaha Pariwisata (TDUP) Jasa Transportasi Wisata', NULL, 'pariwisata.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(27, 'Tanda Daftar Usaha Pariwisata (TDUP) Jasa Perjalanan Wisata', NULL, 'pariwisata.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(28, 'Tanda Daftar Usaha Pariwisata (TDUP) Konsultasi Pariwisata', NULL, 'pariwisata.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(29, 'Tanda Daftar Usaha Pariwisata (TDUP) Informasi Pariwisata', NULL, 'pariwisata.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(30, 'Tanda Daftar Usaha Pariwisata (TDUP) Jasa Pramu Wisata', NULL, 'pariwisata.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(31, 'Tanda Daftar Usaha Pariwisata (TDUP) SPA', NULL, 'perusahaan.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(32, 'Izin Gangguan (HO/ ITU)', NULL, 'dsp.png', 'T', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(33, 'Izin Mendirikan Bangunan (IMB) untuk Usaha, Tower dan Campuran/ Ganda', NULL, 'hospital1.png', 'T', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(34, 'Izin Peruntukan Penggunaan Tanah', NULL, 'pariwisata.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(35, 'Izin Prinsip', NULL, 'construct.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(36, 'Izin Lokasi', NULL, 'mine.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(37, 'Izin Terhadap Instalatur Kabel Rumah/ Gedung(IKR/G)', NULL, 'construct.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(38, 'Izin Kantor Cabang dan Loket Pelayanan Operator', NULL, 'satwa.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(39, 'Izin Galian Keperluan Penggelaran Kabel Telekomunikasi dalam Satu Kabupaten', NULL, 'kabel.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(40, 'Izin Mendirikan Bangunan (IMB) untuk Hunian, Sosial Budaya, Keagamaan dan Khusus', NULL, 'bangunankhusus.png', 'T', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(41, 'Wilayah Izin Usaha Pertambangan (WIUP) Dalam Satu Wilayah Daerah', NULL, 'mine.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(42, 'Izin Usaha Pertambangan (IUP) Eksplorasi Dalam Wilayah Daerah', NULL, 'mine.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(43, 'Izin Usaha Pertambangan (IUP) Operasi Produksi Dalam Wilayah Daerah', NULL, 'mine.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(44, 'Izin Pertambangan Rakyat (IPR)', NULL, 'mine.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(45, 'Izin Usaha Jasa Pertambangan (IUJP) Dalam Wilayah Daerah', NULL, 'bermotor.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(46, 'Izin Pemakaian Air Tanah Cekungan Air Tanah Dalam Wilayah Daerah', NULL, 'taman.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(47, 'Izin Pemanfaatan Air Permukaan Dalam Wilayah Daerah', NULL, 'construct.png', 'F', 'T', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(48, 'Surat Izin Tempat Usaha (SITU)', NULL, 'situ.png', 'F', 'F', NULL, 'T', 0, 'T', 'F', 'F', 1),
(49, 'Izin Usaha Jasa Konstruksi (IUJK)', NULL, 'construct.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(50, 'Izin Usaha Perdagangan Minyak (BBM)', NULL, 'bbm.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(51, 'Izin Usaha Optikal', NULL, 'optic.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(52, 'Izin Usaha Apotik', NULL, 'hospital4.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(53, 'Izin Pemasangan Reklame', NULL, 'prinsip.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(56, 'Izin Usaha Bengkel Umum', NULL, 'maintenance.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(57, 'Izin Penggunaan / Pendaratan Alat Berat', NULL, 'barbel.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(58, 'Izin Pengelolaan Parkir Khusus', NULL, 'bermotor.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(59, 'Izin Usaha Hotel Melati', NULL, 'hotel1.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(60, 'Izin Usaha Hotel Berbintang Lima', NULL, 'hotel5.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(61, 'Izin Usaha Hotel Biintang Empat', NULL, 'hotel.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(62, 'Izin Usaha Hotel Biintang Tiga', NULL, 'hotelb3.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(63, 'Izin Usaha Hotel Biintang Dua', NULL, 'imb1.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1),
(64, 'Izin Usaha Hotel Biintang Satu', NULL, 'hotelb1.png', 'F', 'F', NULL, 'T', NULL, 'T', 'F', 'F', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu`
--

CREATE TABLE `tblmenu` (
  `tblmenu_id` int(11) NOT NULL,
  `tblmenu_urutan` int(3) DEFAULT NULL,
  `tblmenu_kode` varchar(255) DEFAULT NULL,
  `tblmenu_title` varchar(255) DEFAULT NULL,
  `tblmenu_icon` varchar(255) DEFAULT NULL,
  `tblmenu_link` varchar(255) DEFAULT NULL,
  `tblmenu_idparent` int(11) DEFAULT NULL,
  `tblmenu_status` enum('header','detail') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmenu`
--

INSERT INTO `tblmenu` (`tblmenu_id`, `tblmenu_urutan`, `tblmenu_kode`, `tblmenu_title`, `tblmenu_icon`, `tblmenu_link`, `tblmenu_idparent`, `tblmenu_status`) VALUES
(1, 1, '01_dashboard', 'Dashboard', 'fa-home', 'dashboard', 0, NULL),
(2, 2, '02_olahdata', 'A. Olah Data', 'fa-file-text-o', '#', 0, NULL),
(3, 3, '03_saran', 'A.1 Saran', 'fa-comment', 'app/refhasilsurvey', 2, NULL),
(4, 4, '04_settingpertanyaan', 'A.2 Setting Pertanyaan Jawaban', 'fa-book', 'app/refpertanyaan', 2, NULL),
(5, 5, '05_olahdataresponden', 'B. Olah Data Responden', 'fa-file-text-o', 'app/refdataresponden', 0, NULL),
(6, 6, '06_settingreferensi', 'C. Setting Referensi', 'fa-file-text-o', '#', 0, NULL),
(7, 7, '07_settingloket', 'C.1 Setting Loket', 'fa-book', 'app/refloket', 6, NULL),
(8, 8, '08_jenisizin', 'C.2 Jenis Izin', 'fa-comment', 'app/refjenisizinikm', 6, NULL),
(9, 9, '09_administrator', 'D. Administrator', 'fa-gear', '#', 0, NULL),
(10, 10, '10_settinggroup', 'D.1 Setting Group', NULL, 'app/tblrole/grup', 9, NULL),
(11, 11, '11_settinguser', 'D.2 Setting User', NULL, 'app/tblpengguna/pengguna', 9, NULL),
(12, 12, '12_settinguserlevel', 'D.3 Setting User Level', NULL, 'app/tblpengguna/hakakses2', 9, NULL),
(13, 13, '13_settingmenu', 'D.4 Setting Menu', NULL, 'app/tblmenu/menu', 9, NULL);

--
-- Triggers `tblmenu`
--
DELIMITER $$
CREATE TRIGGER `tblmenu_after_delete` AFTER DELETE ON `tblmenu` FOR EACH ROW DELETE FROM tblroleprivilege WHERE tblmenu_id = OLD.tblmenu_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tblmenu_after_insert` AFTER INSERT ON `tblmenu` FOR EACH ROW BEGIN
INSERT INTO tblroleprivilege(
tblrole_id) (SELECT b.tblrole_id FROM tblrole b);

UPDATE tblroleprivilege SET tblmenu_id = NEW.tblmenu_id WHERE tblmenu_id IS NULL;




END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblpengguna`
--

CREATE TABLE `tblpengguna` (
  `tblpengguna_id` int(11) NOT NULL,
  `tblpengguna_nama` varchar(255) DEFAULT NULL,
  `tblpengguna_username` varchar(255) DEFAULT NULL,
  `tblpengguna_email` varchar(255) DEFAULT NULL,
  `tblpengguna_password` varchar(255) DEFAULT '',
  `tblrole_id` int(10) DEFAULT '0',
  `tblpengguna_idsubunit` varchar(15) DEFAULT '0',
  `tblpengguna_status` enum('F','T') DEFAULT 'T',
  `tblpengguna_modified` datetime DEFAULT NULL,
  `tblpengguna_created` datetime DEFAULT NULL,
  `tblpengguna_foto` varchar(255) DEFAULT NULL,
  `tblpengguna_notelp` varchar(50) DEFAULT NULL,
  `tblpengguna_keterangan` varchar(255) DEFAULT NULL,
  `tblkendalibloksistem_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpengguna`
--

INSERT INTO `tblpengguna` (`tblpengguna_id`, `tblpengguna_nama`, `tblpengguna_username`, `tblpengguna_email`, `tblpengguna_password`, `tblrole_id`, `tblpengguna_idsubunit`, `tblpengguna_status`, `tblpengguna_modified`, `tblpengguna_created`, `tblpengguna_foto`, `tblpengguna_notelp`, `tblpengguna_keterangan`, `tblkendalibloksistem_id`) VALUES
(1, 'Superadmin', 'superadmin', 'ependris@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '0', 'T', '0000-00-00 00:00:00', '2013-06-08 10:48:38', '8cdddf332a1f8d82d70cdc5d95cda186-WhatsApp_Image_2021-06-07_at_14.16.03-removebg-preview.png', '082157909203', NULL, 0),
(81, 'Operator', 'operator', 'yudi@yahoo.co.id', 'd07f7fb4562ae31cca8381cc3c06cbf3', 12, '0', 'T', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'foto.jpg', '999999999999', NULL, 0),
(83, 'admin', 'admin', 'admin@gmail.com', '04118a13391c4b55091067c05f068311', 1, '0', 'T', '0000-00-00 00:00:00', '2013-06-08 10:48:38', 'foto.jpg', '9019', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpertanyaan`
--

CREATE TABLE `tblpertanyaan` (
  `tblpertanyaan_id` int(11) NOT NULL,
  `tblpertanyaan_urut` int(11) DEFAULT NULL,
  `tblpertanyaan_uraian` varchar(255) DEFAULT NULL,
  `tblpertanyaan_ketjawabanA` varchar(255) DEFAULT NULL,
  `tblpertanyaan_ketjawabanB` varchar(255) DEFAULT NULL,
  `tblpertanyaan_ketjawabanC` varchar(255) DEFAULT NULL,
  `tblpertanyaan_ketjawabanD` varchar(255) DEFAULT NULL,
  `tblpertanyaan_isaktif` enum('T','F') DEFAULT 'T',
  `tblpertanyaan_point` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpertanyaan`
--

INSERT INTO `tblpertanyaan` (`tblpertanyaan_id`, `tblpertanyaan_urut`, `tblpertanyaan_uraian`, `tblpertanyaan_ketjawabanA`, `tblpertanyaan_ketjawabanB`, `tblpertanyaan_ketjawabanC`, `tblpertanyaan_ketjawabanD`, `tblpertanyaan_isaktif`, `tblpertanyaan_point`) VALUES
(1, 1, 'Bagaimana pendapat saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?', 'Tidak sesuai', 'Kurang sesuai', 'Sesuai', 'Sangat sesuai', 'T', 'Persyaratan pelayanan'),
(2, 2, 'Bagaimana pemahaman saudara tentang kemudahan prosedur pelayanan pada DPMPTSP Kabupaten Pulang Pisau?', 'Tidak mudah', 'Kurang mudah', 'Mudah', 'Sangat mudah', 'T', 'Prosedur pelayanan'),
(3, 3, 'Bagaimana pendapat saudara tentang kecapaten waktu dalam memberikan pelayanan?', 'Tidak Cepat', 'Kurang Cepat', 'Cepat', 'Sangat Cepat', 'T', 'Waktu penyelesaian pelayanan'),
(4, 4, 'Bagaimana pendapat saudara tentang kewajaran biaya/tarif yang dibayarkan dalam pelayanan?', 'Sangat Mahal', 'Cukup Mahal', 'Murah', 'Gratis', 'T', 'Biaya/tarif pelayanan'),
(5, 5, 'Bagaimana pendapat saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?', 'Tidak sesuai', 'Kurang sesuai', 'Sesuai', 'Sangat sesuai', 'T', 'Produk spesifikasi jenis pelayanan'),
(6, 6, 'Bagaimana pendapat saudara tentang kompetensi/kemampuan yang dimilki peugas dalam memberikan pelayanan ?', 'Tidak Kompeten', 'Kurang Kompeten', 'Kompeten', 'Sangat Kompeten', 'T', 'Kompetensi petugas pelaksana'),
(7, 7, 'Bagaimana pendapat saudara tentang perilaku petugas dalam memberikan pelayanan terkait kesopanan dan keramahan ?', 'Tidak Sopan dan Tidak Ramah', 'Kurang sopan dan kurang Ramah', 'Sopan dan Ramah', 'Sangat sopan dan Sangat Ramah', 'T', 'Perilaku petugas pelaksana'),
(8, 8, 'Bagaimana pendapat saudara tentang kesesuian standar pelayanan dengan kesanggupan dan kewajiban penyelenggara dalam memberikan pelayanan sebagaimana tertuang dalam maklumat/janji pelayanan?', 'Buruk', 'Cukup', 'Baik', 'Sangat Baik', 'T', 'Maklumat pelayanan'),
(9, 9, 'Bagaimana pendapat saudara tentang mekanisme dan respon penanganan pengaduan pengguna layanan?', 'Tidak ada', 'Ada tapi tidak berfungsi', 'Berfungsi kurang maksimal', 'Dikelola dengan baik', 'T', 'Penanganan pengaduan, saran, dan masukan');

-- --------------------------------------------------------

--
-- Table structure for table `tblrole`
--

CREATE TABLE `tblrole` (
  `tblrole_id` int(10) NOT NULL,
  `tblrole_code` varchar(25) NOT NULL,
  `tblrole_desc` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblrole`
--

INSERT INTO `tblrole` (`tblrole_id`, `tblrole_code`, `tblrole_desc`) VALUES
(1, 'Administrator', 'Group Administrator'),
(12, 'Operator', 'Operator IKM');

-- --------------------------------------------------------

--
-- Table structure for table `tblroleprivilege`
--

CREATE TABLE `tblroleprivilege` (
  `tblroleprivilege_id` int(11) NOT NULL,
  `tblrole_id` int(11) DEFAULT NULL,
  `tblmenu_id` int(11) DEFAULT NULL,
  `tblroleprivilege_iscreate` enum('T','F') DEFAULT 'F',
  `tblroleprivilege_isupdate` enum('F','T') DEFAULT 'F',
  `tblroleprivilege_isdelete` enum('T','F') DEFAULT 'F',
  `tblroleprivilege_issearch` enum('F','T') DEFAULT NULL,
  `tblroleprivilege_isprint` enum('F','T') DEFAULT 'F',
  `tblroleprivilege_isshow` enum('T','F') DEFAULT NULL COMMENT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroleprivilege`
--

INSERT INTO `tblroleprivilege` (`tblroleprivilege_id`, `tblrole_id`, `tblmenu_id`, `tblroleprivilege_iscreate`, `tblroleprivilege_isupdate`, `tblroleprivilege_isdelete`, `tblroleprivilege_issearch`, `tblroleprivilege_isprint`, `tblroleprivilege_isshow`) VALUES
(1, 1, 1, 'F', 'F', 'F', NULL, 'F', 'T'),
(2, 1, 2, 'F', 'F', 'F', NULL, 'F', 'T'),
(3, 1, 3, 'F', 'F', 'F', NULL, 'F', 'T'),
(4, 1, 4, 'F', 'F', 'F', NULL, 'F', 'T'),
(5, 1, 5, 'F', 'F', 'F', NULL, 'F', 'T'),
(6, 1, 6, 'F', 'F', 'F', NULL, 'F', 'T'),
(7, 1, 7, 'F', 'F', 'F', NULL, 'F', 'T'),
(8, 1, 8, 'F', 'F', 'F', NULL, 'F', 'T'),
(9, 1, 9, 'F', 'F', 'F', NULL, 'F', 'T'),
(10, 1, 10, 'F', 'F', 'F', NULL, 'F', 'T'),
(11, 1, 11, 'F', 'F', 'F', NULL, 'F', 'T'),
(12, 1, 12, 'F', 'F', 'F', NULL, 'F', 'T'),
(13, 1, 13, 'F', 'F', 'F', NULL, 'F', 'F'),
(17, 1, 17, 'F', 'F', 'F', NULL, 'F', 'F'),
(18, 1, 18, 'F', 'F', 'F', NULL, 'F', 'F'),
(19, 1, 19, 'F', 'F', 'F', NULL, 'F', 'F'),
(20, 1, 20, 'F', 'F', 'F', NULL, 'F', 'F'),
(21, 1, 21, 'F', 'F', 'F', NULL, 'F', 'F'),
(22, 1, 22, 'F', 'F', 'F', NULL, 'F', 'F'),
(23, 1, 23, 'F', 'F', 'F', NULL, 'F', 'F'),
(24, 1, 24, 'F', 'F', 'F', NULL, 'F', 'F'),
(25, 1, 25, 'F', 'F', 'F', NULL, 'F', 'F'),
(26, 1, 26, 'F', 'F', 'F', NULL, 'F', 'F'),
(27, 1, 27, 'F', 'F', 'F', NULL, 'F', 'F'),
(28, 1, 28, 'F', 'F', 'F', NULL, 'F', 'F'),
(29, 1, 29, 'F', 'F', 'F', NULL, 'F', 'F'),
(30, 1, 30, 'F', 'F', 'F', NULL, 'F', 'F'),
(31, 1, 31, 'F', 'F', 'F', NULL, 'F', 'F'),
(32, 1, 32, 'F', 'F', 'F', NULL, 'F', 'F'),
(33, 1, 33, 'F', 'F', 'F', NULL, 'F', 'T'),
(34, 1, 34, 'F', 'F', 'F', NULL, 'F', 'F'),
(35, 1, 35, 'F', 'F', 'F', NULL, 'F', 'F'),
(36, 1, 36, 'F', 'F', 'F', NULL, 'F', 'T'),
(37, 1, 37, 'F', 'F', 'F', NULL, 'F', 'T'),
(38, 1, 38, 'F', 'F', 'F', NULL, 'F', 'T'),
(39, 1, 39, 'F', 'F', 'F', NULL, 'F', 'T'),
(40, 1, 40, 'F', 'F', 'F', NULL, 'F', 'T'),
(64, 2, 1, 'F', 'F', 'F', NULL, 'F', 'T'),
(65, 2, 2, 'F', 'F', 'F', NULL, 'F', 'F'),
(66, 2, 3, 'F', 'F', 'F', NULL, 'F', 'F'),
(67, 2, 4, 'F', 'F', 'F', NULL, 'F', 'F'),
(68, 2, 5, 'F', 'F', 'F', NULL, 'F', 'F'),
(69, 2, 6, 'F', 'F', 'F', NULL, 'F', 'F'),
(70, 2, 7, 'F', 'F', 'F', NULL, 'F', 'F'),
(71, 2, 8, 'F', 'F', 'F', NULL, 'F', 'F'),
(72, 2, 9, 'F', 'F', 'F', NULL, 'F', 'F'),
(73, 2, 10, 'F', 'F', 'F', NULL, 'F', 'F'),
(74, 2, 11, 'F', 'F', 'F', NULL, 'F', 'F'),
(75, 2, 12, 'F', 'F', 'F', NULL, 'F', 'F'),
(76, 2, 13, 'F', 'F', 'F', NULL, 'F', 'F'),
(80, 2, 17, 'F', 'F', 'F', NULL, 'F', 'F'),
(81, 2, 18, 'F', 'F', 'F', NULL, 'F', 'F'),
(82, 2, 19, 'F', 'F', 'F', NULL, 'F', 'F'),
(83, 2, 20, 'F', 'F', 'F', NULL, 'F', 'F'),
(84, 2, 21, 'F', 'F', 'F', NULL, 'F', 'T'),
(85, 2, 22, 'F', 'F', 'F', NULL, 'F', 'T'),
(86, 2, 23, 'F', 'F', 'F', NULL, 'F', 'T'),
(87, 2, 24, 'F', 'F', 'F', NULL, 'F', 'T'),
(88, 2, 25, 'F', 'F', 'F', NULL, 'F', 'T'),
(89, 2, 26, 'F', 'F', 'F', NULL, 'F', 'T'),
(90, 2, 27, 'F', 'F', 'F', NULL, 'F', 'T'),
(91, 2, 28, 'F', 'F', 'F', NULL, 'F', 'T'),
(92, 2, 29, 'F', 'F', 'F', NULL, 'F', 'T'),
(93, 2, 30, 'F', 'F', 'F', NULL, 'F', 'T'),
(94, 2, 31, 'F', 'F', 'F', NULL, 'F', 'T'),
(95, 2, 32, 'F', 'F', 'F', NULL, 'F', 'T'),
(96, 2, 33, 'F', 'F', 'F', NULL, 'F', 'T'),
(97, 2, 34, 'F', 'F', 'F', NULL, 'F', 'T'),
(98, 2, 35, 'F', 'F', 'F', NULL, 'F', 'T'),
(99, 2, 36, 'F', 'F', 'F', NULL, 'F', 'F'),
(100, 2, 37, 'F', 'F', 'F', NULL, 'F', 'F'),
(101, 2, 38, 'F', 'F', 'F', NULL, 'F', 'F'),
(102, 2, 39, 'F', 'F', 'F', NULL, 'F', 'F'),
(103, 2, 40, 'F', 'F', 'F', NULL, 'F', 'F'),
(127, 3, 1, 'F', 'F', 'F', NULL, 'F', 'T'),
(128, 3, 2, 'F', 'F', 'F', NULL, 'F', 'T'),
(129, 3, 3, 'F', 'F', 'F', NULL, 'F', 'T'),
(130, 3, 4, 'F', 'F', 'F', NULL, 'F', 'T'),
(131, 3, 5, 'F', 'F', 'F', NULL, 'F', 'T'),
(132, 3, 6, 'F', 'F', 'F', NULL, 'F', 'F'),
(133, 3, 7, 'F', 'F', 'F', NULL, 'F', 'F'),
(134, 3, 8, 'F', 'F', 'F', NULL, 'F', 'F'),
(135, 3, 9, 'F', 'F', 'F', NULL, 'F', 'F'),
(136, 3, 10, 'F', 'F', 'F', NULL, 'F', 'F'),
(137, 3, 11, 'F', 'F', 'F', NULL, 'F', 'F'),
(138, 3, 12, 'F', 'F', 'F', NULL, 'F', 'F'),
(139, 3, 13, 'F', 'F', 'F', NULL, 'F', 'F'),
(143, 3, 17, 'F', 'F', 'F', NULL, 'F', 'F'),
(144, 3, 18, 'F', 'F', 'F', NULL, 'F', 'F'),
(145, 3, 19, 'F', 'F', 'F', NULL, 'F', 'F'),
(146, 3, 20, 'F', 'F', 'F', NULL, 'F', 'F'),
(147, 3, 21, 'F', 'F', 'F', NULL, 'F', 'T'),
(148, 3, 22, 'F', 'F', 'F', NULL, 'F', 'T'),
(149, 3, 23, 'F', 'F', 'F', NULL, 'F', 'T'),
(150, 3, 24, 'F', 'F', 'F', NULL, 'F', 'T'),
(151, 3, 25, 'F', 'F', 'F', NULL, 'F', 'T'),
(152, 3, 26, 'F', 'F', 'F', NULL, 'F', 'T'),
(153, 3, 27, 'F', 'F', 'F', NULL, 'F', 'T'),
(154, 3, 28, 'F', 'F', 'F', NULL, 'F', 'T'),
(155, 3, 29, 'F', 'F', 'F', NULL, 'F', 'F'),
(156, 3, 30, 'F', 'F', 'F', NULL, 'F', 'F'),
(157, 3, 31, 'F', 'F', 'F', NULL, 'F', 'F'),
(158, 3, 32, 'F', 'F', 'F', NULL, 'F', 'F'),
(159, 3, 33, 'F', 'F', 'F', NULL, 'F', 'F'),
(160, 3, 34, 'F', 'F', 'F', NULL, 'F', 'F'),
(161, 3, 35, 'F', 'F', 'F', NULL, 'F', 'F'),
(162, 3, 36, 'F', 'F', 'F', NULL, 'F', 'T'),
(163, 3, 37, 'F', 'F', 'F', NULL, 'F', 'F'),
(164, 3, 38, 'F', 'F', 'F', NULL, 'F', 'F'),
(165, 3, 39, 'F', 'F', 'F', NULL, 'F', 'F'),
(166, 3, 40, 'F', 'F', 'F', NULL, 'F', 'F'),
(190, 4, 1, 'F', 'F', 'F', NULL, 'F', 'T'),
(191, 4, 2, 'F', 'F', 'F', NULL, 'F', 'F'),
(192, 4, 3, 'F', 'F', 'F', NULL, 'F', 'F'),
(193, 4, 4, 'F', 'F', 'F', NULL, 'F', 'F'),
(194, 4, 5, 'F', 'F', 'F', NULL, 'F', 'F'),
(195, 4, 6, 'F', 'F', 'F', NULL, 'F', 'F'),
(196, 4, 7, 'F', 'F', 'F', NULL, 'F', 'F'),
(197, 4, 8, 'F', 'F', 'F', NULL, 'F', 'F'),
(198, 4, 9, 'F', 'F', 'F', NULL, 'F', 'F'),
(199, 4, 10, 'F', 'F', 'F', NULL, 'F', 'F'),
(200, 4, 11, 'F', 'F', 'F', NULL, 'F', 'F'),
(201, 4, 12, 'F', 'F', 'F', NULL, 'F', 'F'),
(202, 4, 13, 'F', 'F', 'F', NULL, 'F', 'F'),
(206, 4, 17, 'F', 'F', 'F', NULL, 'F', 'F'),
(207, 4, 18, 'F', 'F', 'F', NULL, 'F', 'T'),
(208, 4, 19, 'F', 'F', 'F', NULL, 'F', 'T'),
(209, 4, 20, 'F', 'F', 'F', NULL, 'F', 'T'),
(210, 4, 21, 'F', 'F', 'F', NULL, 'F', 'F'),
(211, 4, 22, 'F', 'F', 'F', NULL, 'F', 'F'),
(212, 4, 23, 'F', 'F', 'F', NULL, 'F', 'F'),
(213, 4, 24, 'F', 'F', 'F', NULL, 'F', 'F'),
(214, 4, 25, 'F', 'F', 'F', NULL, 'F', 'F'),
(215, 4, 26, 'F', 'F', 'F', NULL, 'F', 'F'),
(216, 4, 27, 'F', 'F', 'F', NULL, 'F', 'F'),
(217, 4, 28, 'F', 'F', 'F', NULL, 'F', 'F'),
(218, 4, 29, 'F', 'F', 'F', NULL, 'F', 'F'),
(219, 4, 30, 'F', 'F', 'F', NULL, 'F', 'F'),
(220, 4, 31, 'F', 'F', 'F', NULL, 'F', 'F'),
(221, 4, 32, 'F', 'F', 'F', NULL, 'F', 'F'),
(222, 4, 33, 'F', 'F', 'F', NULL, 'F', 'F'),
(223, 4, 34, 'F', 'F', 'F', NULL, 'F', 'F'),
(224, 4, 35, 'F', 'F', 'F', NULL, 'F', 'F'),
(225, 4, 36, 'F', 'F', 'F', NULL, 'F', 'F'),
(226, 4, 37, 'F', 'F', 'F', NULL, 'F', 'F'),
(227, 4, 38, 'F', 'F', 'F', NULL, 'F', 'F'),
(228, 4, 39, 'F', 'F', 'F', NULL, 'F', 'F'),
(229, 4, 40, 'F', 'F', 'F', NULL, 'F', 'F'),
(253, 5, 1, 'F', 'F', 'F', NULL, 'F', 'T'),
(254, 5, 2, 'F', 'F', 'F', NULL, 'F', 'F'),
(255, 5, 3, 'F', 'F', 'F', NULL, 'F', 'F'),
(256, 5, 4, 'F', 'F', 'F', NULL, 'F', 'F'),
(257, 5, 5, 'F', 'F', 'F', NULL, 'F', 'F'),
(258, 5, 6, 'F', 'F', 'F', NULL, 'F', 'T'),
(259, 5, 7, 'F', 'F', 'F', NULL, 'F', 'T'),
(260, 5, 8, 'F', 'F', 'F', NULL, 'F', 'T'),
(261, 5, 9, 'F', 'F', 'F', NULL, 'F', 'T'),
(262, 5, 10, 'F', 'F', 'F', NULL, 'F', 'T'),
(263, 5, 11, 'F', 'F', 'F', NULL, 'F', 'F'),
(264, 5, 12, 'F', 'F', 'F', NULL, 'F', 'T'),
(265, 5, 13, 'F', 'F', 'F', NULL, 'F', 'T'),
(269, 5, 17, 'F', 'F', 'F', NULL, 'F', 'F'),
(270, 5, 18, 'F', 'F', 'F', NULL, 'F', 'F'),
(271, 5, 19, 'F', 'F', 'F', NULL, 'F', 'F'),
(272, 5, 20, 'F', 'F', 'F', NULL, 'F', 'F'),
(273, 5, 21, 'F', 'F', 'F', NULL, 'F', 'F'),
(274, 5, 22, 'F', 'F', 'F', NULL, 'F', 'F'),
(275, 5, 23, 'F', 'F', 'F', NULL, 'F', 'F'),
(276, 5, 24, 'F', 'F', 'F', NULL, 'F', 'F'),
(277, 5, 25, 'F', 'F', 'F', NULL, 'F', 'F'),
(278, 5, 26, 'F', 'F', 'F', NULL, 'F', 'F'),
(279, 5, 27, 'F', 'F', 'F', NULL, 'F', 'F'),
(280, 5, 28, 'F', 'F', 'F', NULL, 'F', 'F'),
(281, 5, 29, 'F', 'F', 'F', NULL, 'F', 'F'),
(282, 5, 30, 'F', 'F', 'F', NULL, 'F', 'F'),
(283, 5, 31, 'F', 'F', 'F', NULL, 'F', 'F'),
(284, 5, 32, 'F', 'F', 'F', NULL, 'F', 'F'),
(285, 5, 33, 'F', 'F', 'F', NULL, 'F', 'F'),
(286, 5, 34, 'F', 'F', 'F', NULL, 'F', 'F'),
(287, 5, 35, 'F', 'F', 'F', NULL, 'F', 'F'),
(288, 5, 36, 'F', 'F', 'F', NULL, 'F', 'F'),
(289, 5, 37, 'F', 'F', 'F', NULL, 'F', 'F'),
(290, 5, 38, 'F', 'F', 'F', NULL, 'F', 'F'),
(291, 5, 39, 'F', 'F', 'F', NULL, 'F', 'F'),
(292, 5, 40, 'F', 'F', 'F', NULL, 'F', 'F'),
(316, 6, 1, 'F', 'F', 'F', NULL, 'F', 'T'),
(317, 6, 2, 'F', 'F', 'F', NULL, 'F', 'F'),
(318, 6, 3, 'F', 'F', 'F', NULL, 'F', 'F'),
(319, 6, 4, 'F', 'F', 'F', NULL, 'F', 'F'),
(320, 6, 5, 'F', 'F', 'F', NULL, 'F', 'F'),
(321, 6, 6, 'F', 'F', 'F', NULL, 'F', 'T'),
(322, 6, 7, 'F', 'F', 'F', NULL, 'F', 'T'),
(323, 6, 8, 'F', 'F', 'F', NULL, 'F', 'T'),
(324, 6, 9, 'F', 'F', 'F', NULL, 'F', 'T'),
(325, 6, 10, 'F', 'F', 'F', NULL, 'F', 'F'),
(326, 6, 11, 'F', 'F', 'F', NULL, 'F', 'F'),
(327, 6, 12, 'F', 'F', 'F', NULL, 'F', 'F'),
(328, 6, 13, 'F', 'F', 'F', NULL, 'F', 'T'),
(332, 6, 17, 'F', 'F', 'F', NULL, 'F', 'F'),
(333, 6, 18, 'F', 'F', 'F', NULL, 'F', 'F'),
(334, 6, 19, 'F', 'F', 'F', NULL, 'F', 'F'),
(335, 6, 20, 'F', 'F', 'F', NULL, 'F', 'F'),
(336, 6, 21, 'F', 'F', 'F', NULL, 'F', 'F'),
(337, 6, 22, 'F', 'F', 'F', NULL, 'F', 'F'),
(338, 6, 23, 'F', 'F', 'F', NULL, 'F', 'F'),
(339, 6, 24, 'F', 'F', 'F', NULL, 'F', 'F'),
(340, 6, 25, 'F', 'F', 'F', NULL, 'F', 'F'),
(341, 6, 26, 'F', 'F', 'F', NULL, 'F', 'F'),
(342, 6, 27, 'F', 'F', 'F', NULL, 'F', 'F'),
(343, 6, 28, 'F', 'F', 'F', NULL, 'F', 'F'),
(344, 6, 29, 'F', 'F', 'F', NULL, 'F', 'F'),
(345, 6, 30, 'F', 'F', 'F', NULL, 'F', 'F'),
(346, 6, 31, 'F', 'F', 'F', NULL, 'F', 'F'),
(347, 6, 32, 'F', 'F', 'F', NULL, 'F', 'F'),
(348, 6, 33, 'F', 'F', 'F', NULL, 'F', 'F'),
(349, 6, 34, 'F', 'F', 'F', NULL, 'F', 'F'),
(350, 6, 35, 'F', 'F', 'F', NULL, 'F', 'F'),
(351, 6, 36, 'F', 'F', 'F', NULL, 'F', 'F'),
(352, 6, 37, 'F', 'F', 'F', NULL, 'F', 'F'),
(353, 6, 38, 'F', 'F', 'F', NULL, 'F', 'F'),
(354, 6, 39, 'F', 'F', 'F', NULL, 'F', 'F'),
(355, 6, 40, 'F', 'F', 'F', NULL, 'F', 'F'),
(379, 7, 1, 'F', 'F', 'F', NULL, 'F', 'T'),
(380, 7, 2, 'F', 'F', 'F', NULL, 'F', 'F'),
(381, 7, 3, 'F', 'F', 'F', NULL, 'F', 'F'),
(382, 7, 4, 'F', 'F', 'F', NULL, 'F', 'F'),
(383, 7, 5, 'F', 'F', 'F', NULL, 'F', 'F'),
(384, 7, 6, 'F', 'F', 'F', NULL, 'F', 'T'),
(385, 7, 7, 'F', 'F', 'F', NULL, 'F', 'T'),
(386, 7, 8, 'F', 'F', 'F', NULL, 'F', 'F'),
(387, 7, 9, 'F', 'F', 'F', NULL, 'F', 'F'),
(388, 7, 10, 'F', 'F', 'F', NULL, 'F', 'F'),
(389, 7, 11, 'F', 'F', 'F', NULL, 'F', 'F'),
(390, 7, 12, 'F', 'F', 'F', NULL, 'F', 'F'),
(391, 7, 13, 'F', 'F', 'F', NULL, 'F', 'T'),
(395, 7, 17, 'F', 'F', 'F', NULL, 'F', 'F'),
(396, 7, 18, 'F', 'F', 'F', NULL, 'F', 'F'),
(397, 7, 19, 'F', 'F', 'F', NULL, 'F', 'F'),
(398, 7, 20, 'F', 'F', 'F', NULL, 'F', 'F'),
(399, 7, 21, 'F', 'F', 'F', NULL, 'F', 'F'),
(400, 7, 22, 'F', 'F', 'F', NULL, 'F', 'F'),
(401, 7, 23, 'F', 'F', 'F', NULL, 'F', 'F'),
(402, 7, 24, 'F', 'F', 'F', NULL, 'F', 'F'),
(403, 7, 25, 'F', 'F', 'F', NULL, 'F', 'F'),
(404, 7, 26, 'F', 'F', 'F', NULL, 'F', 'F'),
(405, 7, 27, 'F', 'F', 'F', NULL, 'F', 'F'),
(406, 7, 28, 'F', 'F', 'F', NULL, 'F', 'F'),
(407, 7, 29, 'F', 'F', 'F', NULL, 'F', 'F'),
(408, 7, 30, 'F', 'F', 'F', NULL, 'F', 'F'),
(409, 7, 31, 'F', 'F', 'F', NULL, 'F', 'F'),
(410, 7, 32, 'F', 'F', 'F', NULL, 'F', 'F'),
(411, 7, 33, 'F', 'F', 'F', NULL, 'F', 'F'),
(412, 7, 34, 'F', 'F', 'F', NULL, 'F', 'F'),
(413, 7, 35, 'F', 'F', 'F', NULL, 'F', 'F'),
(414, 7, 36, 'F', 'F', 'F', NULL, 'F', 'F'),
(415, 7, 37, 'F', 'F', 'F', NULL, 'F', 'F'),
(416, 7, 38, 'F', 'F', 'F', NULL, 'F', 'F'),
(417, 7, 39, 'F', 'F', 'F', NULL, 'F', 'F'),
(418, 7, 40, 'F', 'F', 'F', NULL, 'F', 'F'),
(442, 8, 1, 'F', 'F', 'F', NULL, 'F', 'T'),
(443, 8, 2, 'F', 'F', 'F', NULL, 'F', 'F'),
(444, 8, 3, 'F', 'F', 'F', NULL, 'F', 'F'),
(445, 8, 4, 'F', 'F', 'F', NULL, 'F', 'F'),
(446, 8, 5, 'F', 'F', 'F', NULL, 'F', 'F'),
(447, 8, 6, 'F', 'F', 'F', NULL, 'F', 'F'),
(448, 8, 7, 'F', 'F', 'F', NULL, 'F', 'F'),
(449, 8, 8, 'F', 'F', 'F', NULL, 'F', 'F'),
(450, 8, 9, 'F', 'F', 'F', NULL, 'F', 'F'),
(451, 8, 10, 'F', 'F', 'F', NULL, 'F', 'F'),
(452, 8, 11, 'F', 'F', 'F', NULL, 'F', 'F'),
(453, 8, 12, 'F', 'F', 'F', NULL, 'F', 'F'),
(454, 8, 13, 'F', 'F', 'F', NULL, 'F', 'F'),
(458, 8, 17, 'F', 'F', 'F', NULL, 'F', 'T'),
(459, 8, 18, 'F', 'F', 'F', NULL, 'F', 'F'),
(460, 8, 19, 'F', 'F', 'F', NULL, 'F', 'F'),
(461, 8, 20, 'F', 'F', 'F', NULL, 'F', 'F'),
(462, 8, 21, 'F', 'F', 'F', NULL, 'F', 'F'),
(463, 8, 22, 'F', 'F', 'F', NULL, 'F', 'F'),
(464, 8, 23, 'F', 'F', 'F', NULL, 'F', 'F'),
(465, 8, 24, 'F', 'F', 'F', NULL, 'F', 'F'),
(466, 8, 25, 'F', 'F', 'F', NULL, 'F', 'F'),
(467, 8, 26, 'F', 'F', 'F', NULL, 'F', 'F'),
(468, 8, 27, 'F', 'F', 'F', NULL, 'F', 'F'),
(469, 8, 28, 'F', 'F', 'F', NULL, 'F', 'F'),
(470, 8, 29, 'F', 'F', 'F', NULL, 'F', 'F'),
(471, 8, 30, 'F', 'F', 'F', NULL, 'F', 'F'),
(472, 8, 31, 'F', 'F', 'F', NULL, 'F', 'F'),
(473, 8, 32, 'F', 'F', 'F', NULL, 'F', 'F'),
(474, 8, 33, 'F', 'F', 'F', NULL, 'F', 'F'),
(475, 8, 34, 'F', 'F', 'F', NULL, 'F', 'F'),
(476, 8, 35, 'F', 'F', 'F', NULL, 'F', 'F'),
(477, 8, 36, 'F', 'F', 'F', NULL, 'F', 'F'),
(478, 8, 37, 'F', 'F', 'F', NULL, 'F', 'F'),
(479, 8, 38, 'F', 'F', 'F', NULL, 'F', 'F'),
(480, 8, 39, 'F', 'F', 'F', NULL, 'F', 'F'),
(481, 8, 40, 'F', 'F', 'F', NULL, 'F', 'F'),
(505, 9, 1, 'F', 'F', 'F', NULL, 'F', 'T'),
(506, 9, 2, 'F', 'F', 'F', NULL, 'F', 'F'),
(507, 9, 3, 'F', 'F', 'F', NULL, 'F', 'F'),
(508, 9, 4, 'F', 'F', 'F', NULL, 'F', 'F'),
(509, 9, 5, 'F', 'F', 'F', NULL, 'F', 'F'),
(510, 9, 6, 'F', 'F', 'F', NULL, 'F', 'F'),
(511, 9, 7, 'F', 'F', 'F', NULL, 'F', 'F'),
(512, 9, 8, 'F', 'F', 'F', NULL, 'F', 'F'),
(513, 9, 9, 'F', 'F', 'F', NULL, 'F', 'F'),
(514, 9, 10, 'F', 'F', 'F', NULL, 'F', 'F'),
(515, 9, 11, 'F', 'F', 'F', NULL, 'F', 'F'),
(516, 9, 12, 'F', 'F', 'F', NULL, 'F', 'F'),
(517, 9, 13, 'F', 'F', 'F', NULL, 'F', 'F'),
(521, 9, 17, 'F', 'F', 'F', NULL, 'F', 'F'),
(522, 9, 18, 'F', 'F', 'F', NULL, 'F', 'F'),
(523, 9, 19, 'F', 'F', 'F', NULL, 'F', 'F'),
(524, 9, 20, 'F', 'F', 'F', NULL, 'F', 'F'),
(525, 9, 21, 'F', 'F', 'F', NULL, 'F', 'F'),
(526, 9, 22, 'F', 'F', 'F', NULL, 'F', 'F'),
(527, 9, 23, 'F', 'F', 'F', NULL, 'F', 'F'),
(528, 9, 24, 'F', 'F', 'F', NULL, 'F', 'F'),
(529, 9, 25, 'F', 'F', 'F', NULL, 'F', 'F'),
(530, 9, 26, 'F', 'F', 'F', NULL, 'F', 'F'),
(531, 9, 27, 'F', 'F', 'F', NULL, 'F', 'F'),
(532, 9, 28, 'F', 'F', 'F', NULL, 'F', 'F'),
(533, 9, 29, 'F', 'F', 'F', NULL, 'F', 'F'),
(534, 9, 30, 'F', 'F', 'F', NULL, 'F', 'F'),
(535, 9, 31, 'F', 'F', 'F', NULL, 'F', 'F'),
(536, 9, 32, 'F', 'F', 'F', NULL, 'F', 'F'),
(537, 9, 33, 'F', 'F', 'F', NULL, 'F', 'F'),
(538, 9, 34, 'F', 'F', 'F', NULL, 'F', 'F'),
(539, 9, 35, 'F', 'F', 'F', NULL, 'F', 'F'),
(540, 9, 36, 'F', 'F', 'F', NULL, 'F', 'F'),
(541, 9, 37, 'F', 'F', 'F', NULL, 'F', 'F'),
(542, 9, 38, 'F', 'F', 'F', NULL, 'F', 'F'),
(543, 9, 39, 'F', 'F', 'F', NULL, 'F', 'F'),
(544, 9, 40, 'F', 'F', 'F', NULL, 'F', 'F'),
(568, 1, 42, 'F', 'F', 'F', NULL, 'F', 'F'),
(569, 2, 42, 'F', 'F', 'F', NULL, 'F', 'F'),
(570, 3, 42, 'F', 'F', 'F', NULL, 'F', 'F'),
(571, 4, 42, 'F', 'F', 'F', NULL, 'F', 'F'),
(572, 5, 42, 'F', 'F', 'F', NULL, 'F', 'F'),
(573, 6, 42, 'F', 'F', 'F', NULL, 'F', 'F'),
(574, 7, 42, 'F', 'F', 'F', NULL, 'F', 'F'),
(575, 8, 42, 'F', 'F', 'F', NULL, 'F', 'F'),
(576, 9, 42, 'F', 'F', 'F', NULL, 'F', 'T'),
(583, 1, 43, 'F', 'F', 'F', NULL, 'F', 'F'),
(584, 2, 43, 'F', 'F', 'F', NULL, 'F', 'F'),
(585, 3, 43, 'F', 'F', 'F', NULL, 'F', 'F'),
(586, 4, 43, 'F', 'F', 'F', NULL, 'F', 'F'),
(587, 5, 43, 'F', 'F', 'F', NULL, 'F', 'F'),
(588, 6, 43, 'F', 'F', 'F', NULL, 'F', 'F'),
(589, 7, 43, 'F', 'F', 'F', NULL, 'F', 'F'),
(590, 8, 43, 'F', 'F', 'F', NULL, 'F', 'F'),
(591, 9, 43, 'F', 'F', 'F', NULL, 'F', 'T'),
(661, 1, 44, 'F', 'F', 'F', NULL, 'F', 'F'),
(662, 2, 44, 'F', 'F', 'F', NULL, 'F', 'F'),
(663, 3, 44, 'F', 'F', 'F', NULL, 'F', 'F'),
(664, 4, 44, 'F', 'F', 'F', NULL, 'F', 'F'),
(665, 5, 44, 'F', 'F', 'F', NULL, 'F', 'T'),
(666, 6, 44, 'F', 'F', 'F', NULL, 'F', 'T'),
(667, 7, 44, 'F', 'F', 'F', NULL, 'F', 'T'),
(668, 8, 44, 'F', 'F', 'F', NULL, 'F', NULL),
(669, 9, 44, 'F', 'F', 'F', NULL, 'F', 'F'),
(676, 1, 45, 'F', 'F', 'F', NULL, 'F', 'T'),
(677, 2, 45, 'F', 'F', 'F', NULL, 'F', 'F'),
(678, 3, 45, 'F', 'F', 'F', NULL, 'F', 'F'),
(679, 4, 45, 'F', 'F', 'F', NULL, 'F', 'F'),
(680, 5, 45, 'F', 'F', 'F', NULL, 'F', 'F'),
(681, 6, 45, 'F', 'F', 'F', NULL, 'F', 'F'),
(682, 7, 45, 'F', 'F', 'F', NULL, 'F', 'F'),
(683, 8, 45, 'F', 'F', 'F', NULL, 'F', NULL),
(684, 9, 45, 'F', 'F', 'F', NULL, 'F', 'F'),
(691, 1, 46, 'F', 'F', 'F', NULL, 'F', 'T'),
(692, 2, 46, 'F', 'F', 'F', NULL, 'F', 'F'),
(693, 3, 46, 'F', 'F', 'F', NULL, 'F', 'F'),
(694, 4, 46, 'F', 'F', 'F', NULL, 'F', 'F'),
(695, 5, 46, 'F', 'F', 'F', NULL, 'F', 'F'),
(696, 6, 46, 'F', 'F', 'F', NULL, 'F', 'F'),
(697, 7, 46, 'F', 'F', 'F', NULL, 'F', 'F'),
(698, 8, 46, 'F', 'F', 'F', NULL, 'F', NULL),
(699, 9, 46, 'F', 'F', 'F', NULL, 'F', 'F'),
(706, 1, 47, 'F', 'F', 'F', NULL, 'F', 'T'),
(707, 2, 47, 'F', 'F', 'F', NULL, 'F', 'F'),
(708, 3, 47, 'F', 'F', 'F', NULL, 'F', 'F'),
(709, 4, 47, 'F', 'F', 'F', NULL, 'F', 'F'),
(710, 5, 47, 'F', 'F', 'F', NULL, 'F', 'F'),
(711, 6, 47, 'F', 'F', 'F', NULL, 'F', 'F'),
(712, 7, 47, 'F', 'F', 'F', NULL, 'F', 'F'),
(713, 8, 47, 'F', 'F', 'F', NULL, 'F', NULL),
(714, 9, 47, 'F', 'F', 'F', NULL, 'F', 'F'),
(721, 1, 48, 'F', 'F', 'F', NULL, 'F', 'T'),
(722, 2, 48, 'F', 'F', 'F', NULL, 'F', 'F'),
(723, 3, 48, 'F', 'F', 'F', NULL, 'F', 'F'),
(724, 4, 48, 'F', 'F', 'F', NULL, 'F', 'F'),
(725, 5, 48, 'F', 'F', 'F', NULL, 'F', 'F'),
(726, 6, 48, 'F', 'F', 'F', NULL, 'F', 'F'),
(727, 7, 48, 'F', 'F', 'F', NULL, 'F', 'F'),
(728, 8, 48, 'F', 'F', 'F', NULL, 'F', NULL),
(729, 9, 48, 'F', 'F', 'F', NULL, 'F', 'F'),
(736, 1, 49, 'F', 'F', 'F', NULL, 'F', 'T'),
(737, 2, 49, 'F', 'F', 'F', NULL, 'F', 'F'),
(738, 3, 49, 'F', 'F', 'F', NULL, 'F', 'F'),
(739, 4, 49, 'F', 'F', 'F', NULL, 'F', 'F'),
(740, 5, 49, 'F', 'F', 'F', NULL, 'F', 'F'),
(741, 6, 49, 'F', 'F', 'F', NULL, 'F', 'F'),
(742, 7, 49, 'F', 'F', 'F', NULL, 'F', 'F'),
(743, 8, 49, 'F', 'F', 'F', NULL, 'F', NULL),
(744, 9, 49, 'F', 'F', 'F', NULL, 'F', 'F'),
(751, 1, 50, 'F', 'F', 'F', NULL, 'F', 'T'),
(752, 2, 50, 'F', 'F', 'F', NULL, 'F', 'F'),
(753, 3, 50, 'F', 'F', 'F', NULL, 'F', 'F'),
(754, 4, 50, 'F', 'F', 'F', NULL, 'F', 'F'),
(755, 5, 50, 'F', 'F', 'F', NULL, 'F', 'F'),
(756, 6, 50, 'F', 'F', 'F', NULL, 'F', 'F'),
(757, 7, 50, 'F', 'F', 'F', NULL, 'F', 'F'),
(758, 8, 50, 'F', 'F', 'F', NULL, 'F', NULL),
(759, 9, 50, 'F', 'F', 'F', NULL, 'F', 'F'),
(766, 1, 51, 'F', 'F', 'F', NULL, 'F', 'T'),
(767, 2, 51, 'F', 'F', 'F', NULL, 'F', 'F'),
(768, 3, 51, 'F', 'F', 'F', NULL, 'F', 'F'),
(769, 4, 51, 'F', 'F', 'F', NULL, 'F', 'F'),
(770, 5, 51, 'F', 'F', 'F', NULL, 'F', 'F'),
(771, 6, 51, 'F', 'F', 'F', NULL, 'F', 'F'),
(772, 7, 51, 'F', 'F', 'F', NULL, 'F', 'F'),
(773, 8, 51, 'F', 'F', 'F', NULL, 'F', NULL),
(774, 9, 51, 'F', 'F', 'F', NULL, 'F', 'F'),
(781, 1, 52, 'F', 'F', 'F', NULL, 'F', 'T'),
(782, 2, 52, 'F', 'F', 'F', NULL, 'F', 'F'),
(783, 3, 52, 'F', 'F', 'F', NULL, 'F', 'F'),
(784, 4, 52, 'F', 'F', 'F', NULL, 'F', 'F'),
(785, 5, 52, 'F', 'F', 'F', NULL, 'F', 'F'),
(786, 6, 52, 'F', 'F', 'F', NULL, 'F', 'F'),
(787, 7, 52, 'F', 'F', 'F', NULL, 'F', 'F'),
(788, 8, 52, 'F', 'F', 'F', NULL, 'F', NULL),
(789, 9, 52, 'F', 'F', 'F', NULL, 'F', 'F'),
(796, 1, 53, 'F', 'F', 'F', NULL, 'F', 'T'),
(797, 2, 53, 'F', 'F', 'F', NULL, 'F', 'F'),
(798, 3, 53, 'F', 'F', 'F', NULL, 'F', 'F'),
(799, 4, 53, 'F', 'F', 'F', NULL, 'F', 'F'),
(800, 5, 53, 'F', 'F', 'F', NULL, 'F', 'F'),
(801, 6, 53, 'F', 'F', 'F', NULL, 'F', 'F'),
(802, 7, 53, 'F', 'F', 'F', NULL, 'F', 'F'),
(803, 8, 53, 'F', 'F', 'F', NULL, 'F', NULL),
(804, 9, 53, 'F', 'F', 'F', NULL, 'F', 'F'),
(811, 1, 54, 'F', 'F', 'F', NULL, 'F', 'T'),
(812, 2, 54, 'F', 'F', 'F', NULL, 'F', 'F'),
(813, 3, 54, 'F', 'F', 'F', NULL, 'F', 'F'),
(814, 4, 54, 'F', 'F', 'F', NULL, 'F', 'F'),
(815, 5, 54, 'F', 'F', 'F', NULL, 'F', 'F'),
(816, 6, 54, 'F', 'F', 'F', NULL, 'F', 'F'),
(817, 7, 54, 'F', 'F', 'F', NULL, 'F', 'F'),
(818, 8, 54, 'F', 'F', 'F', NULL, 'F', NULL),
(819, 9, 54, 'F', 'F', 'F', NULL, 'F', 'F'),
(826, 1, 55, 'F', 'F', 'F', NULL, 'F', 'T'),
(827, 2, 55, 'F', 'F', 'F', NULL, 'F', 'F'),
(828, 3, 55, 'F', 'F', 'F', NULL, 'F', 'F'),
(829, 4, 55, 'F', 'F', 'F', NULL, 'F', 'F'),
(830, 5, 55, 'F', 'F', 'F', NULL, 'F', 'F'),
(831, 6, 55, 'F', 'F', 'F', NULL, 'F', 'F'),
(832, 7, 55, 'F', 'F', 'F', NULL, 'F', 'F'),
(833, 8, 55, 'F', 'F', 'F', NULL, 'F', NULL),
(834, 9, 55, 'F', 'F', 'F', NULL, 'F', 'F'),
(841, 1, 56, 'F', 'F', 'F', NULL, 'F', 'T'),
(842, 2, 56, 'F', 'F', 'F', NULL, 'F', 'F'),
(843, 3, 56, 'F', 'F', 'F', NULL, 'F', 'F'),
(844, 4, 56, 'F', 'F', 'F', NULL, 'F', 'F'),
(845, 5, 56, 'F', 'F', 'F', NULL, 'F', 'F'),
(846, 6, 56, 'F', 'F', 'F', NULL, 'F', 'F'),
(847, 7, 56, 'F', 'F', 'F', NULL, 'F', 'F'),
(848, 8, 56, 'F', 'F', 'F', NULL, 'F', NULL),
(849, 9, 56, 'F', 'F', 'F', NULL, 'F', 'F'),
(856, 1, 57, 'F', 'F', 'F', NULL, 'F', 'T'),
(857, 2, 57, 'F', 'F', 'F', NULL, 'F', 'F'),
(858, 3, 57, 'F', 'F', 'F', NULL, 'F', 'F'),
(859, 4, 57, 'F', 'F', 'F', NULL, 'F', 'F'),
(860, 5, 57, 'F', 'F', 'F', NULL, 'F', 'F'),
(861, 6, 57, 'F', 'F', 'F', NULL, 'F', 'F'),
(862, 7, 57, 'F', 'F', 'F', NULL, 'F', 'F'),
(863, 8, 57, 'F', 'F', 'F', NULL, 'F', NULL),
(864, 9, 57, 'F', 'F', 'F', NULL, 'F', 'F'),
(871, 1, 58, 'F', 'F', 'F', NULL, 'F', 'T'),
(872, 2, 58, 'F', 'F', 'F', NULL, 'F', 'F'),
(873, 3, 58, 'F', 'F', 'F', NULL, 'F', 'F'),
(874, 4, 58, 'F', 'F', 'F', NULL, 'F', 'F'),
(875, 5, 58, 'F', 'F', 'F', NULL, 'F', 'F'),
(876, 6, 58, 'F', 'F', 'F', NULL, 'F', 'F'),
(877, 7, 58, 'F', 'F', 'F', NULL, 'F', 'F'),
(878, 8, 58, 'F', 'F', 'F', NULL, 'F', NULL),
(879, 9, 58, 'F', 'F', 'F', NULL, 'F', 'F'),
(886, 1, 59, 'F', 'F', 'F', NULL, 'F', 'F'),
(887, 2, 59, 'F', 'F', 'F', NULL, 'F', 'F'),
(888, 3, 59, 'F', 'F', 'F', NULL, 'F', 'F'),
(889, 4, 59, 'F', 'F', 'F', NULL, 'F', NULL),
(890, 5, 59, 'F', 'F', 'F', NULL, 'F', 'T'),
(891, 6, 59, 'F', 'F', 'F', NULL, 'F', 'F'),
(892, 7, 59, 'F', 'F', 'F', NULL, 'F', 'F'),
(893, 8, 59, 'F', 'F', 'F', NULL, 'F', NULL),
(894, 9, 59, 'F', 'F', 'F', NULL, 'F', 'F'),
(901, 1, 60, 'F', 'F', 'F', NULL, 'F', 'T'),
(902, 2, 60, 'F', 'F', 'F', NULL, 'F', 'F'),
(903, 3, 60, 'F', 'F', 'F', NULL, 'F', 'F'),
(904, 4, 60, 'F', 'F', 'F', NULL, 'F', NULL),
(905, 5, 60, 'F', 'F', 'F', NULL, 'F', 'F'),
(906, 6, 60, 'F', 'F', 'F', NULL, 'F', 'F'),
(907, 7, 60, 'F', 'F', 'F', NULL, 'F', 'F'),
(908, 8, 60, 'F', 'F', 'F', NULL, 'F', NULL),
(909, 9, 60, 'F', 'F', 'F', NULL, 'F', 'F'),
(916, 1, 61, 'F', 'F', 'F', NULL, 'F', 'T'),
(917, 2, 61, 'F', 'F', 'F', NULL, 'F', 'F'),
(918, 3, 61, 'F', 'F', 'F', NULL, 'F', 'F'),
(919, 4, 61, 'F', 'F', 'F', NULL, 'F', NULL),
(920, 5, 61, 'F', 'F', 'F', NULL, 'F', 'F'),
(921, 6, 61, 'F', 'F', 'F', NULL, 'F', 'F'),
(922, 7, 61, 'F', 'F', 'F', NULL, 'F', 'F'),
(923, 8, 61, 'F', 'F', 'F', NULL, 'F', NULL),
(924, 9, 61, 'F', 'F', 'F', NULL, 'F', 'F'),
(931, 1, 62, 'F', 'F', 'F', NULL, 'F', 'T'),
(932, 2, 62, 'F', 'F', 'F', NULL, 'F', 'F'),
(933, 3, 62, 'F', 'F', 'F', NULL, 'F', 'F'),
(934, 4, 62, 'F', 'F', 'F', NULL, 'F', NULL),
(935, 5, 62, 'F', 'F', 'F', NULL, 'F', 'F'),
(936, 6, 62, 'F', 'F', 'F', NULL, 'F', 'F'),
(937, 7, 62, 'F', 'F', 'F', NULL, 'F', 'F'),
(938, 8, 62, 'F', 'F', 'F', NULL, 'F', NULL),
(939, 9, 62, 'F', 'F', 'F', NULL, 'F', 'F'),
(940, 10, -33, 'F', 'F', 'F', NULL, 'F', NULL),
(941, 10, 1, 'F', 'F', 'F', NULL, 'F', NULL),
(942, 10, 2, 'F', 'F', 'F', NULL, 'F', NULL),
(943, 10, 3, 'F', 'F', 'F', NULL, 'F', NULL),
(944, 10, 4, 'F', 'F', 'F', NULL, 'F', NULL),
(945, 10, 5, 'F', 'F', 'F', NULL, 'F', NULL),
(946, 10, 6, 'F', 'F', 'F', NULL, 'F', NULL),
(947, 10, 7, 'F', 'F', 'F', NULL, 'F', NULL),
(948, 10, 8, 'F', 'F', 'F', NULL, 'F', NULL),
(949, 10, 9, 'F', 'F', 'F', NULL, 'F', NULL),
(950, 10, 10, 'F', 'F', 'F', NULL, 'F', NULL),
(951, 10, 11, 'F', 'F', 'F', NULL, 'F', NULL),
(952, 10, 12, 'F', 'F', 'F', NULL, 'F', NULL),
(953, 10, 13, 'F', 'F', 'F', NULL, 'F', NULL),
(957, 10, 17, 'F', 'F', 'F', NULL, 'F', NULL),
(958, 10, 18, 'F', 'F', 'F', NULL, 'F', NULL),
(959, 10, 19, 'F', 'F', 'F', NULL, 'F', NULL),
(960, 10, 20, 'F', 'F', 'F', NULL, 'F', NULL),
(961, 10, 21, 'F', 'F', 'F', NULL, 'F', NULL),
(962, 10, 22, 'F', 'F', 'F', NULL, 'F', NULL),
(963, 10, 23, 'F', 'F', 'F', NULL, 'F', NULL),
(964, 10, 24, 'F', 'F', 'F', NULL, 'F', NULL),
(965, 10, 25, 'F', 'F', 'F', NULL, 'F', NULL),
(966, 10, 26, 'F', 'F', 'F', NULL, 'F', NULL),
(967, 10, 27, 'F', 'F', 'F', NULL, 'F', NULL),
(968, 10, 28, 'F', 'F', 'F', NULL, 'F', NULL),
(969, 10, 29, 'F', 'F', 'F', NULL, 'F', NULL),
(970, 10, 30, 'F', 'F', 'F', NULL, 'F', NULL),
(971, 10, 31, 'F', 'F', 'F', NULL, 'F', NULL),
(972, 10, 32, 'F', 'F', 'F', NULL, 'F', NULL),
(973, 10, 34, 'F', 'F', 'F', NULL, 'F', NULL),
(974, 10, 35, 'F', 'F', 'F', NULL, 'F', NULL),
(975, 10, 36, 'F', 'F', 'F', NULL, 'F', NULL),
(976, 10, 37, 'F', 'F', 'F', NULL, 'F', NULL),
(977, 10, 38, 'F', 'F', 'F', NULL, 'F', NULL),
(978, 10, 39, 'F', 'F', 'F', NULL, 'F', NULL),
(979, 10, 40, 'F', 'F', 'F', NULL, 'F', NULL),
(981, 10, 42, 'F', 'F', 'F', NULL, 'F', NULL),
(982, 10, 43, 'F', 'F', 'F', NULL, 'F', NULL),
(983, 10, 44, 'F', 'F', 'F', NULL, 'F', NULL),
(984, 10, 45, 'F', 'F', 'F', NULL, 'F', NULL),
(985, 10, 46, 'F', 'F', 'F', NULL, 'F', NULL),
(986, 10, 47, 'F', 'F', 'F', NULL, 'F', NULL),
(987, 10, 48, 'F', 'F', 'F', NULL, 'F', NULL),
(988, 10, 49, 'F', 'F', 'F', NULL, 'F', NULL),
(989, 10, 50, 'F', 'F', 'F', NULL, 'F', NULL),
(990, 10, 51, 'F', 'F', 'F', NULL, 'F', NULL),
(991, 10, 52, 'F', 'F', 'F', NULL, 'F', NULL),
(992, 10, 53, 'F', 'F', 'F', NULL, 'F', NULL),
(993, 10, 54, 'F', 'F', 'F', NULL, 'F', NULL),
(994, 10, 55, 'F', 'F', 'F', NULL, 'F', NULL),
(995, 10, 56, 'F', 'F', 'F', NULL, 'F', NULL),
(996, 10, 57, 'F', 'F', 'F', NULL, 'F', NULL),
(997, 10, 58, 'F', 'F', 'F', NULL, 'F', NULL),
(998, 10, 59, 'F', 'F', 'F', NULL, 'F', NULL),
(999, 10, 60, 'F', 'F', 'F', NULL, 'F', NULL),
(1000, 10, 61, 'F', 'F', 'F', NULL, 'F', NULL),
(1001, 10, 62, 'F', 'F', 'F', NULL, 'F', NULL),
(1066, 12, -33, 'F', 'F', 'F', NULL, 'F', 'F'),
(1067, 12, -7, 'F', 'F', 'F', NULL, 'F', 'F'),
(1068, 12, 1, 'F', 'F', 'F', NULL, 'F', 'T'),
(1069, 12, 2, 'F', 'F', 'F', NULL, 'F', 'T'),
(1070, 12, 3, 'F', 'F', 'F', NULL, 'F', 'T'),
(1071, 12, 4, 'F', 'F', 'F', NULL, 'F', 'T'),
(1072, 12, 5, 'F', 'F', 'F', NULL, 'F', 'T'),
(1073, 12, 6, 'F', 'F', 'F', NULL, 'F', 'T'),
(1074, 12, 8, 'F', 'F', 'F', NULL, 'F', 'T'),
(1075, 12, 9, 'F', 'F', 'F', NULL, 'F', 'T'),
(1076, 12, 10, 'F', 'F', 'F', NULL, 'F', 'T'),
(1077, 12, 11, 'F', 'F', 'F', NULL, 'F', 'T'),
(1078, 12, 12, 'F', 'F', 'F', NULL, 'F', 'T'),
(1079, 12, 13, 'F', 'F', 'F', NULL, 'F', 'T'),
(1083, 12, 17, 'F', 'F', 'F', NULL, 'F', 'F'),
(1084, 12, 18, 'F', 'F', 'F', NULL, 'F', 'F'),
(1085, 12, 19, 'F', 'F', 'F', NULL, 'F', 'F'),
(1086, 12, 20, 'F', 'F', 'F', NULL, 'F', 'F'),
(1087, 12, 21, 'F', 'F', 'F', NULL, 'F', 'F'),
(1088, 12, 22, 'F', 'F', 'F', NULL, 'F', 'F'),
(1089, 12, 23, 'F', 'F', 'F', NULL, 'F', 'F'),
(1090, 12, 24, 'F', 'F', 'F', NULL, 'F', 'F'),
(1091, 12, 25, 'F', 'F', 'F', NULL, 'F', 'F'),
(1092, 12, 26, 'F', 'F', 'F', NULL, 'F', 'F'),
(1093, 12, 27, 'F', 'F', 'F', NULL, 'F', 'F'),
(1094, 12, 28, 'F', 'F', 'F', NULL, 'F', 'F'),
(1095, 12, 29, 'F', 'F', 'F', NULL, 'F', 'F'),
(1096, 12, 30, 'F', 'F', 'F', NULL, 'F', 'F'),
(1097, 12, 31, 'F', 'F', 'F', NULL, 'F', 'F'),
(1098, 12, 32, 'F', 'F', 'F', NULL, 'F', 'F'),
(1099, 12, 34, 'F', 'F', 'F', NULL, 'F', 'F'),
(1100, 12, 35, 'F', 'F', 'F', NULL, 'F', 'F'),
(1101, 12, 36, 'F', 'F', 'F', NULL, 'F', 'F'),
(1102, 12, 37, 'F', 'F', 'F', NULL, 'F', 'F'),
(1103, 12, 38, 'F', 'F', 'F', NULL, 'F', 'F'),
(1104, 12, 39, 'F', 'F', 'F', NULL, 'F', 'F'),
(1105, 12, 40, 'F', 'F', 'F', NULL, 'F', 'F'),
(1107, 12, 42, 'F', 'F', 'F', NULL, 'F', 'F'),
(1108, 12, 43, 'F', 'F', 'F', NULL, 'F', 'F'),
(1109, 12, 44, 'F', 'F', 'F', NULL, 'F', 'F'),
(1110, 12, 45, 'F', 'F', 'F', NULL, 'F', 'F'),
(1111, 12, 46, 'F', 'F', 'F', NULL, 'F', 'F'),
(1112, 12, 47, 'F', 'F', 'F', NULL, 'F', 'F'),
(1113, 12, 48, 'F', 'F', 'F', NULL, 'F', 'F'),
(1114, 12, 49, 'F', 'F', 'F', NULL, 'F', 'F'),
(1115, 12, 50, 'F', 'F', 'F', NULL, 'F', 'F'),
(1116, 12, 51, 'F', 'F', 'F', NULL, 'F', 'F'),
(1117, 12, 52, 'F', 'F', 'F', NULL, 'F', 'F'),
(1118, 12, 53, 'F', 'F', 'F', NULL, 'F', 'F'),
(1119, 12, 54, 'F', 'F', 'F', NULL, 'F', 'F'),
(1120, 12, 55, 'F', 'F', 'F', NULL, 'F', 'F'),
(1121, 12, 56, 'F', 'F', 'F', NULL, 'F', 'F'),
(1122, 12, 57, 'F', 'F', 'F', NULL, 'F', 'F'),
(1123, 12, 58, 'F', 'F', 'F', NULL, 'F', 'F'),
(1124, 12, 59, 'F', 'F', 'F', NULL, 'F', 'F'),
(1125, 12, 60, 'F', 'F', 'F', NULL, 'F', 'F'),
(1126, 12, 61, 'F', 'F', 'F', NULL, 'F', 'F'),
(1127, 12, 62, 'F', 'F', 'F', NULL, 'F', 'F'),
(1129, 1, 63, 'F', 'F', 'F', NULL, 'F', 'F'),
(1130, 2, 63, 'F', 'F', 'F', NULL, 'F', 'F'),
(1131, 3, 63, 'F', 'F', 'F', NULL, 'F', 'F'),
(1132, 4, 63, 'F', 'F', 'F', NULL, 'F', NULL),
(1133, 5, 63, 'F', 'F', 'F', NULL, 'F', NULL),
(1134, 6, 63, 'F', 'F', 'F', NULL, 'F', 'F'),
(1135, 7, 63, 'F', 'F', 'F', NULL, 'F', NULL),
(1136, 8, 63, 'F', 'F', 'F', NULL, 'F', NULL),
(1137, 9, 63, 'F', 'F', 'F', NULL, 'F', NULL),
(1138, 10, 63, 'F', 'F', 'F', NULL, 'F', NULL),
(1140, 12, 63, 'F', 'F', 'F', NULL, 'F', 'T'),
(1144, 1, 64, 'F', 'F', 'F', NULL, 'F', 'T'),
(1145, 2, 64, 'F', 'F', 'F', NULL, 'F', NULL),
(1146, 3, 64, 'F', 'F', 'F', NULL, 'F', 'T'),
(1147, 4, 64, 'F', 'F', 'F', NULL, 'F', NULL),
(1148, 5, 64, 'F', 'F', 'F', NULL, 'F', NULL),
(1149, 6, 64, 'F', 'F', 'F', NULL, 'F', NULL),
(1150, 7, 64, 'F', 'F', 'F', NULL, 'F', NULL),
(1151, 8, 64, 'F', 'F', 'F', NULL, 'F', NULL),
(1152, 9, 64, 'F', 'F', 'F', NULL, 'F', NULL),
(1153, 10, 64, 'F', 'F', 'F', NULL, 'F', NULL),
(1155, 12, 64, 'F', 'F', 'F', NULL, 'F', NULL),
(1159, 1, 65, 'F', 'F', 'F', NULL, 'F', 'T'),
(1160, 2, 65, 'F', 'F', 'F', NULL, 'F', NULL),
(1161, 3, 65, 'F', 'F', 'F', NULL, 'F', 'T'),
(1162, 4, 65, 'F', 'F', 'F', NULL, 'F', NULL),
(1163, 5, 65, 'F', 'F', 'F', NULL, 'F', NULL),
(1164, 6, 65, 'F', 'F', 'F', NULL, 'F', NULL),
(1165, 7, 65, 'F', 'F', 'F', NULL, 'F', NULL),
(1166, 8, 65, 'F', 'F', 'F', NULL, 'F', NULL),
(1167, 9, 65, 'F', 'F', 'F', NULL, 'F', NULL),
(1168, 10, 65, 'F', 'F', 'F', NULL, 'F', NULL),
(1170, 12, 65, 'F', 'F', 'F', NULL, 'F', NULL),
(1174, 1, 66, 'F', 'F', 'F', NULL, 'F', 'T'),
(1175, 2, 66, 'F', 'F', 'F', NULL, 'F', NULL),
(1176, 3, 66, 'F', 'F', 'F', NULL, 'F', 'T'),
(1177, 4, 66, 'F', 'F', 'F', NULL, 'F', NULL),
(1178, 5, 66, 'F', 'F', 'F', NULL, 'F', NULL),
(1179, 6, 66, 'F', 'F', 'F', NULL, 'F', NULL),
(1180, 7, 66, 'F', 'F', 'F', NULL, 'F', NULL),
(1181, 8, 66, 'F', 'F', 'F', NULL, 'F', NULL),
(1182, 9, 66, 'F', 'F', 'F', NULL, 'F', NULL),
(1183, 10, 66, 'F', 'F', 'F', NULL, 'F', NULL),
(1185, 12, 66, 'F', 'F', 'F', NULL, 'F', NULL),
(1189, 1, 67, 'F', 'F', 'F', NULL, 'F', 'T'),
(1190, 2, 67, 'F', 'F', 'F', NULL, 'F', NULL),
(1191, 3, 67, 'F', 'F', 'F', NULL, 'F', 'T'),
(1192, 4, 67, 'F', 'F', 'F', NULL, 'F', NULL),
(1193, 5, 67, 'F', 'F', 'F', NULL, 'F', NULL),
(1194, 6, 67, 'F', 'F', 'F', NULL, 'F', NULL),
(1195, 7, 67, 'F', 'F', 'F', NULL, 'F', NULL),
(1196, 8, 67, 'F', 'F', 'F', NULL, 'F', NULL),
(1197, 9, 67, 'F', 'F', 'F', NULL, 'F', NULL),
(1198, 10, 67, 'F', 'F', 'F', NULL, 'F', NULL),
(1200, 12, 67, 'F', 'F', 'F', NULL, 'F', NULL),
(1204, 1, 9, 'F', 'F', 'F', NULL, 'F', 'T'),
(1205, 1, 10, 'F', 'F', 'F', NULL, 'F', 'T'),
(1206, 1, 11, 'F', 'F', 'F', NULL, 'F', 'T'),
(1207, 1, 12, 'F', 'F', 'F', NULL, 'F', 'T'),
(1208, 1, 13, 'F', 'F', 'F', NULL, 'F', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `tblslider`
--

CREATE TABLE `tblslider` (
  `tblslider_id` int(6) NOT NULL,
  `tblslider_gambar` varchar(255) DEFAULT NULL,
  `tblslider_posisix` int(255) DEFAULT NULL,
  `tblslider_posisiy` int(255) DEFAULT NULL,
  `tblslider_text` varchar(255) DEFAULT NULL,
  `tblslider_animasi` enum('slotfade-horizontal','slidedown','slideleft','boxfade') DEFAULT NULL,
  `tblslider_status` enum('F','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblslider`
--

INSERT INTO `tblslider` (`tblslider_id`, `tblslider_gambar`, `tblslider_posisix`, `tblslider_posisiy`, `tblslider_text`, `tblslider_animasi`, `tblslider_status`) VALUES
(1, '042b9c5990488569895f4e87ace15c21_maxresdefault.jpg', NULL, NULL, 'Sample', NULL, 'T');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vbulatnrrtertimbang`
--
CREATE TABLE `vbulatnrrtertimbang` (
`jumlah` varchar(255)
,`tahun` int(4)
,`roundnrrp1` decimal(37,2)
,`roundnrrp2` decimal(37,2)
,`roundnrrp3` decimal(37,2)
,`roundnrrp4` decimal(37,2)
,`roundnrrp5` decimal(37,2)
,`roundnrrp6` decimal(37,2)
,`roundnrrp7` decimal(37,2)
,`roundnrrp8` decimal(37,2)
,`roundnrrp9` decimal(37,2)
,`roundnrrp10` decimal(37,2)
,`totalnilaitertimbang` decimal(45,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vbulatnrrtertimbang2`
--
CREATE TABLE `vbulatnrrtertimbang2` (
`jumlah` varchar(255)
,`tahun` int(4)
,`roundnrrp1` decimal(37,2)
,`roundnrrp2` decimal(37,2)
,`roundnrrp3` decimal(37,2)
,`roundnrrp4` decimal(37,2)
,`roundnrrp5` decimal(37,2)
,`roundnrrp6` decimal(37,2)
,`roundnrrp7` decimal(37,2)
,`roundnrrp8` decimal(37,2)
,`roundnrrp9` decimal(37,2)
,`roundnrrp10` decimal(37,2)
,`totalnilaitertimbang` decimal(46,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vnilaiikm`
--
CREATE TABLE `vnilaiikm` (
`jumlah` varchar(255)
,`tahun` int(4)
,`totalnilaitertimbang` decimal(48,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vnilaiikm_baru`
--
CREATE TABLE `vnilaiikm_baru` (
`jumlah` varchar(255)
,`tahun` int(4)
,`totalnilaitertimbang` decimal(48,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vnilaiperunsur`
--
CREATE TABLE `vnilaiperunsur` (
`jumlah` varchar(255)
,`tahun` int(4)
,`jumlahp1` decimal(32,0)
,`jumlahp2` decimal(32,0)
,`jumlahp3` decimal(32,0)
,`jumlahp4` decimal(32,0)
,`jumlahp5` decimal(32,0)
,`jumlahp6` decimal(32,0)
,`jumlahp7` decimal(32,0)
,`jumlahp8` decimal(32,0)
,`jumlahp9` decimal(32,0)
,`jumlahp10` decimal(32,0)
,`totalnilaiperunsur` decimal(41,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vnrrtertimbang`
--
CREATE TABLE `vnrrtertimbang` (
`jumlah` varchar(255)
,`tahun` int(4)
,`nrrp1` decimal(37,3)
,`nrrp2` decimal(37,3)
,`nrrp3` decimal(37,3)
,`nrrp4` decimal(37,3)
,`nrrp5` decimal(37,3)
,`nrrp6` decimal(37,3)
,`nrrp7` decimal(37,3)
,`nrrp8` decimal(37,3)
,`nrrp9` decimal(37,3)
,`nrrp10` decimal(37,3)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vtblpengguna`
--
CREATE TABLE `vtblpengguna` (
`nama` varchar(255)
,`username` varchar(255)
,`pengguna_id` int(11)
,`idsubunit` varchar(15)
,`status` enum('F','T')
,`kode` varchar(25)
,`deskripsi` varchar(50)
,`email` varchar(255)
,`notelp` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vtblrolemenu`
--
CREATE TABLE `vtblrolemenu` (
`tblrole_id` int(10)
,`tblrole_code` varchar(25)
,`tblrole_desc` varchar(50)
,`tblmenu_id` int(11)
,`tblmenu_urutan` int(3)
,`tblmenu_kode` varchar(255)
,`tblmenu_title` varchar(255)
,`tblmenu_icon` varchar(255)
,`tblmenu_link` varchar(255)
,`tblmenu_idparent` bigint(11)
,`tblroleprivilege_id` int(11)
,`tblroleprivilege_iscreate` enum('T','F')
,`tblroleprivilege_isupdate` enum('F','T')
,`tblroleprivilege_isdelete` enum('T','F')
,`tblroleprivilege_issearch` enum('F','T')
,`tblroleprivilege_isprint` enum('F','T')
,`tblroleprivilege_isshow` enum('T','F')
,`tblmenu_status` enum('header','detail')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vtblroleprivilege`
--
CREATE TABLE `vtblroleprivilege` (
`tblroleprivilege_id` int(11)
,`tblroleprivilege_iscreate` enum('T','F')
,`tblroleprivilege_isupdate` enum('F','T')
,`tblroleprivilege_isdelete` enum('T','F')
,`tblroleprivilege_issearch` enum('F','T')
,`tblroleprivilege_isprint` enum('F','T')
,`tblroleprivilege_isshow` enum('T','F')
,`tblrole_id` int(11)
,`tblmenu_idparent` int(11)
,`tblmenu_link` varchar(255)
,`tblmenu_icon` varchar(255)
,`tblmenu_title` varchar(255)
,`tblmenu_kode` varchar(255)
,`tblmenu_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vtotalnilai`
--
CREATE TABLE `vtotalnilai` (
`jumlah` varchar(255)
,`tahun` int(4)
,`tblhasilsurvei_pertanyaan1` int(2)
,`tblhasilsurvei_pertanyaan2` int(2)
,`tblhasilsurvei_pertanyaan3` int(2)
,`tblhasilsurvei_pertanyaan4` int(2)
,`tblhasilsurvei_pertanyaan5` int(2)
,`tblhasilsurvei_pertanyaan6` int(2)
,`tblhasilsurvei_pertanyaan7` int(2)
,`tblhasilsurvei_pertanyaan8` int(2)
,`tblhasilsurvei_pertanyaan9` int(2)
,`tblhasilsurvei_pertanyaan10` int(2)
);

-- --------------------------------------------------------

--
-- Structure for view `vbulatnrrtertimbang`
--
DROP TABLE IF EXISTS `vbulatnrrtertimbang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbulatnrrtertimbang`  AS  select `vnrrtertimbang`.`jumlah` AS `jumlah`,`vnrrtertimbang`.`tahun` AS `tahun`,round(`vnrrtertimbang`.`nrrp1`,2) AS `roundnrrp1`,round(`vnrrtertimbang`.`nrrp2`,2) AS `roundnrrp2`,round(`vnrrtertimbang`.`nrrp3`,2) AS `roundnrrp3`,round(`vnrrtertimbang`.`nrrp4`,2) AS `roundnrrp4`,round(`vnrrtertimbang`.`nrrp5`,2) AS `roundnrrp5`,round(`vnrrtertimbang`.`nrrp6`,2) AS `roundnrrp6`,round(`vnrrtertimbang`.`nrrp7`,2) AS `roundnrrp7`,round(`vnrrtertimbang`.`nrrp8`,2) AS `roundnrrp8`,round(`vnrrtertimbang`.`nrrp9`,2) AS `roundnrrp9`,round(`vnrrtertimbang`.`nrrp10`,2) AS `roundnrrp10`,((((((((round(`vnrrtertimbang`.`nrrp1`,2) + round(`vnrrtertimbang`.`nrrp2`,2)) + round(`vnrrtertimbang`.`nrrp3`,2)) + round(`vnrrtertimbang`.`nrrp4`,2)) + round(`vnrrtertimbang`.`nrrp5`,2)) + round(`vnrrtertimbang`.`nrrp6`,2)) + round(`vnrrtertimbang`.`nrrp7`,2)) + round(`vnrrtertimbang`.`nrrp8`,2)) + round(`vnrrtertimbang`.`nrrp9`,2)) AS `totalnilaitertimbang` from `vnrrtertimbang` ;

-- --------------------------------------------------------

--
-- Structure for view `vbulatnrrtertimbang2`
--
DROP TABLE IF EXISTS `vbulatnrrtertimbang2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbulatnrrtertimbang2`  AS  select `vnrrtertimbang`.`jumlah` AS `jumlah`,`vnrrtertimbang`.`tahun` AS `tahun`,round(`vnrrtertimbang`.`nrrp1`,2) AS `roundnrrp1`,round(`vnrrtertimbang`.`nrrp2`,2) AS `roundnrrp2`,round(`vnrrtertimbang`.`nrrp3`,2) AS `roundnrrp3`,round(`vnrrtertimbang`.`nrrp4`,2) AS `roundnrrp4`,round(`vnrrtertimbang`.`nrrp5`,2) AS `roundnrrp5`,round(`vnrrtertimbang`.`nrrp6`,2) AS `roundnrrp6`,round(`vnrrtertimbang`.`nrrp7`,2) AS `roundnrrp7`,round(`vnrrtertimbang`.`nrrp8`,2) AS `roundnrrp8`,round(`vnrrtertimbang`.`nrrp9`,2) AS `roundnrrp9`,round(`vnrrtertimbang`.`nrrp10`,2) AS `roundnrrp10`,(((((((((round(`vnrrtertimbang`.`nrrp1`,2) + round(`vnrrtertimbang`.`nrrp2`,2)) + round(`vnrrtertimbang`.`nrrp3`,2)) + round(`vnrrtertimbang`.`nrrp4`,2)) + round(`vnrrtertimbang`.`nrrp5`,2)) + round(`vnrrtertimbang`.`nrrp6`,2)) + round(`vnrrtertimbang`.`nrrp7`,2)) + round(`vnrrtertimbang`.`nrrp8`,2)) + round(`vnrrtertimbang`.`nrrp9`,2)) + round(`vnrrtertimbang`.`nrrp10`,2)) AS `totalnilaitertimbang` from `vnrrtertimbang` ;

-- --------------------------------------------------------

--
-- Structure for view `vnilaiikm`
--
DROP TABLE IF EXISTS `vnilaiikm`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vnilaiikm`  AS  select `vnrrtertimbang`.`jumlah` AS `jumlah`,`vnrrtertimbang`.`tahun` AS `tahun`,round(((((((((((`vnrrtertimbang`.`nrrp1` + `vnrrtertimbang`.`nrrp2`) + `vnrrtertimbang`.`nrrp3`) + `vnrrtertimbang`.`nrrp4`) + `vnrrtertimbang`.`nrrp5`) + `vnrrtertimbang`.`nrrp6`) + `vnrrtertimbang`.`nrrp7`) + `vnrrtertimbang`.`nrrp8`) + `vnrrtertimbang`.`nrrp9`) + `vnrrtertimbang`.`nrrp10`) * 25),2) AS `totalnilaitertimbang` from `vnrrtertimbang` ;

-- --------------------------------------------------------

--
-- Structure for view `vnilaiikm_baru`
--
DROP TABLE IF EXISTS `vnilaiikm_baru`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vnilaiikm_baru`  AS  select `vnrrtertimbang`.`jumlah` AS `jumlah`,`vnrrtertimbang`.`tahun` AS `tahun`,round(((((((((((ifnull(`vnrrtertimbang`.`nrrp1`,0) + ifnull(`vnrrtertimbang`.`nrrp2`,0)) + ifnull(`vnrrtertimbang`.`nrrp3`,0)) + ifnull(`vnrrtertimbang`.`nrrp4`,0)) + ifnull(`vnrrtertimbang`.`nrrp5`,0)) + ifnull(`vnrrtertimbang`.`nrrp6`,0)) + ifnull(`vnrrtertimbang`.`nrrp7`,0)) + ifnull(`vnrrtertimbang`.`nrrp8`,0)) + ifnull(`vnrrtertimbang`.`nrrp9`,0)) + ifnull(`vnrrtertimbang`.`nrrp10`,0)) * 25),2) AS `totalnilaitertimbang` from `vnrrtertimbang` ;

-- --------------------------------------------------------

--
-- Structure for view `vnilaiperunsur`
--
DROP TABLE IF EXISTS `vnilaiperunsur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vnilaiperunsur`  AS  select `vtotalnilai`.`jumlah` AS `jumlah`,`vtotalnilai`.`tahun` AS `tahun`,sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan1`) AS `jumlahp1`,sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan2`) AS `jumlahp2`,sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan3`) AS `jumlahp3`,sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan4`) AS `jumlahp4`,sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan5`) AS `jumlahp5`,sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan6`) AS `jumlahp6`,sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan7`) AS `jumlahp7`,sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan8`) AS `jumlahp8`,sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan9`) AS `jumlahp9`,sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan10`) AS `jumlahp10`,(((((((((sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan1`) + sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan2`)) + sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan3`)) + sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan4`)) + sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan5`)) + sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan6`)) + sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan7`)) + sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan8`)) + sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan9`)) + sum(`vtotalnilai`.`tblhasilsurvei_pertanyaan10`)) AS `totalnilaiperunsur` from `vtotalnilai` group by `vtotalnilai`.`tahun` ;

-- --------------------------------------------------------

--
-- Structure for view `vnrrtertimbang`
--
DROP TABLE IF EXISTS `vnrrtertimbang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vnrrtertimbang`  AS  select `vnilaiperunsur`.`jumlah` AS `jumlah`,`vnilaiperunsur`.`tahun` AS `tahun`,(round((`vnilaiperunsur`.`jumlahp1` / (select count(`tblhasilsurvei`.`tblhasilsurvei_id`) AS `responden` from `tblhasilsurvei` where (year(`tblhasilsurvei`.`tblhasilsurvei_syscreate`) = date_format(now(),'%Y%')))),2) * 0.1) AS `nrrp1`,(round((`vnilaiperunsur`.`jumlahp2` / (select count(`tblhasilsurvei`.`tblhasilsurvei_id`) AS `responden` from `tblhasilsurvei` where (year(`tblhasilsurvei`.`tblhasilsurvei_syscreate`) = date_format(now(),'%Y%')))),2) * 0.1) AS `nrrp2`,(round((`vnilaiperunsur`.`jumlahp3` / (select count(`tblhasilsurvei`.`tblhasilsurvei_id`) AS `responden` from `tblhasilsurvei` where (year(`tblhasilsurvei`.`tblhasilsurvei_syscreate`) = date_format(now(),'%Y%')))),2) * 0.1) AS `nrrp3`,(round((`vnilaiperunsur`.`jumlahp4` / (select count(`tblhasilsurvei`.`tblhasilsurvei_id`) AS `responden` from `tblhasilsurvei` where (year(`tblhasilsurvei`.`tblhasilsurvei_syscreate`) = date_format(now(),'%Y%')))),2) * 0.1) AS `nrrp4`,(round((`vnilaiperunsur`.`jumlahp5` / (select count(`tblhasilsurvei`.`tblhasilsurvei_id`) AS `responden` from `tblhasilsurvei` where (year(`tblhasilsurvei`.`tblhasilsurvei_syscreate`) = date_format(now(),'%Y%')))),2) * 0.1) AS `nrrp5`,(round((`vnilaiperunsur`.`jumlahp6` / (select count(`tblhasilsurvei`.`tblhasilsurvei_id`) AS `responden` from `tblhasilsurvei` where (year(`tblhasilsurvei`.`tblhasilsurvei_syscreate`) = date_format(now(),'%Y%')))),2) * 0.1) AS `nrrp6`,(round((`vnilaiperunsur`.`jumlahp7` / (select count(`tblhasilsurvei`.`tblhasilsurvei_id`) AS `responden` from `tblhasilsurvei` where (year(`tblhasilsurvei`.`tblhasilsurvei_syscreate`) = date_format(now(),'%Y%')))),2) * 0.1) AS `nrrp7`,(round((`vnilaiperunsur`.`jumlahp8` / (select count(`tblhasilsurvei`.`tblhasilsurvei_id`) AS `responden` from `tblhasilsurvei` where (year(`tblhasilsurvei`.`tblhasilsurvei_syscreate`) = date_format(now(),'%Y%')))),2) * 0.1) AS `nrrp8`,(round((`vnilaiperunsur`.`jumlahp9` / (select count(`tblhasilsurvei`.`tblhasilsurvei_id`) AS `responden` from `tblhasilsurvei` where (year(`tblhasilsurvei`.`tblhasilsurvei_syscreate`) = date_format(now(),'%Y%')))),2) * 0.1) AS `nrrp9`,(round((`vnilaiperunsur`.`jumlahp10` / (select count(`tblhasilsurvei`.`tblhasilsurvei_id`) AS `responden` from `tblhasilsurvei` where (year(`tblhasilsurvei`.`tblhasilsurvei_syscreate`) = date_format(now(),'%Y%')))),2) * 0.1) AS `nrrp10` from `vnilaiperunsur` ;

-- --------------------------------------------------------

--
-- Structure for view `vtblpengguna`
--
DROP TABLE IF EXISTS `vtblpengguna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtblpengguna`  AS  select `tblpengguna`.`tblpengguna_nama` AS `nama`,`tblpengguna`.`tblpengguna_username` AS `username`,`tblpengguna`.`tblpengguna_id` AS `pengguna_id`,`tblpengguna`.`tblpengguna_idsubunit` AS `idsubunit`,`tblpengguna`.`tblpengguna_status` AS `status`,`tblrole`.`tblrole_code` AS `kode`,`tblrole`.`tblrole_desc` AS `deskripsi`,`tblpengguna`.`tblpengguna_email` AS `email`,`tblpengguna`.`tblpengguna_notelp` AS `notelp` from (`tblrole` join `tblpengguna` on((`tblrole`.`tblrole_id` = `tblpengguna`.`tblrole_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vtblrolemenu`
--
DROP TABLE IF EXISTS `vtblrolemenu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtblrolemenu`  AS  select `c`.`tblrole_id` AS `tblrole_id`,`c`.`tblrole_code` AS `tblrole_code`,`c`.`tblrole_desc` AS `tblrole_desc`,`b`.`tblmenu_id` AS `tblmenu_id`,`b`.`tblmenu_urutan` AS `tblmenu_urutan`,`b`.`tblmenu_kode` AS `tblmenu_kode`,`b`.`tblmenu_title` AS `tblmenu_title`,`b`.`tblmenu_icon` AS `tblmenu_icon`,`b`.`tblmenu_link` AS `tblmenu_link`,ifnull(`b`.`tblmenu_idparent`,0) AS `tblmenu_idparent`,`a`.`tblroleprivilege_id` AS `tblroleprivilege_id`,`a`.`tblroleprivilege_iscreate` AS `tblroleprivilege_iscreate`,`a`.`tblroleprivilege_isupdate` AS `tblroleprivilege_isupdate`,`a`.`tblroleprivilege_isdelete` AS `tblroleprivilege_isdelete`,`a`.`tblroleprivilege_issearch` AS `tblroleprivilege_issearch`,`a`.`tblroleprivilege_isprint` AS `tblroleprivilege_isprint`,`a`.`tblroleprivilege_isshow` AS `tblroleprivilege_isshow`,`b`.`tblmenu_status` AS `tblmenu_status` from ((`tblroleprivilege` `a` join `tblmenu` `b` on((`a`.`tblmenu_id` = `b`.`tblmenu_id`))) join `tblrole` `c` on((`c`.`tblrole_id` = `a`.`tblrole_id`))) order by `c`.`tblrole_id`,`b`.`tblmenu_urutan` ;

-- --------------------------------------------------------

--
-- Structure for view `vtblroleprivilege`
--
DROP TABLE IF EXISTS `vtblroleprivilege`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtblroleprivilege`  AS  select `tblroleprivilege`.`tblroleprivilege_id` AS `tblroleprivilege_id`,`tblroleprivilege`.`tblroleprivilege_iscreate` AS `tblroleprivilege_iscreate`,`tblroleprivilege`.`tblroleprivilege_isupdate` AS `tblroleprivilege_isupdate`,`tblroleprivilege`.`tblroleprivilege_isdelete` AS `tblroleprivilege_isdelete`,`tblroleprivilege`.`tblroleprivilege_issearch` AS `tblroleprivilege_issearch`,`tblroleprivilege`.`tblroleprivilege_isprint` AS `tblroleprivilege_isprint`,`tblroleprivilege`.`tblroleprivilege_isshow` AS `tblroleprivilege_isshow`,`tblroleprivilege`.`tblrole_id` AS `tblrole_id`,`tblmenu`.`tblmenu_idparent` AS `tblmenu_idparent`,`tblmenu`.`tblmenu_link` AS `tblmenu_link`,`tblmenu`.`tblmenu_icon` AS `tblmenu_icon`,`tblmenu`.`tblmenu_title` AS `tblmenu_title`,`tblmenu`.`tblmenu_kode` AS `tblmenu_kode`,`tblroleprivilege`.`tblmenu_id` AS `tblmenu_id` from (`tblroleprivilege` join `tblmenu` on((`tblroleprivilege`.`tblmenu_id` = `tblmenu`.`tblmenu_id`))) order by `tblroleprivilege`.`tblrole_id`,`tblmenu`.`tblmenu_urutan` ;

-- --------------------------------------------------------

--
-- Structure for view `vtotalnilai`
--
DROP TABLE IF EXISTS `vtotalnilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtotalnilai`  AS  select `tblhasilsurvei`.`tblhasilsurvei_total` AS `jumlah`,year(`tblhasilsurvei`.`tblhasilsurvei_syscreate`) AS `tahun`,`tblhasilsurvei`.`tblhasilsurvei_pertanyaan1` AS `tblhasilsurvei_pertanyaan1`,`tblhasilsurvei`.`tblhasilsurvei_pertanyaan2` AS `tblhasilsurvei_pertanyaan2`,`tblhasilsurvei`.`tblhasilsurvei_pertanyaan3` AS `tblhasilsurvei_pertanyaan3`,`tblhasilsurvei`.`tblhasilsurvei_pertanyaan4` AS `tblhasilsurvei_pertanyaan4`,`tblhasilsurvei`.`tblhasilsurvei_pertanyaan5` AS `tblhasilsurvei_pertanyaan5`,`tblhasilsurvei`.`tblhasilsurvei_pertanyaan6` AS `tblhasilsurvei_pertanyaan6`,`tblhasilsurvei`.`tblhasilsurvei_pertanyaan7` AS `tblhasilsurvei_pertanyaan7`,`tblhasilsurvei`.`tblhasilsurvei_pertanyaan8` AS `tblhasilsurvei_pertanyaan8`,`tblhasilsurvei`.`tblhasilsurvei_pertanyaan9` AS `tblhasilsurvei_pertanyaan9`,`tblhasilsurvei`.`tblhasilsurvei_pertanyaan10` AS `tblhasilsurvei_pertanyaan10` from `tblhasilsurvei` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `refjenisizinikm`
--
ALTER TABLE `refjenisizinikm`
  ADD PRIMARY KEY (`refjenisizinikm_id`),
  ADD KEY `refloket_id` (`refloket_id`),
  ADD KEY `refjenisizinikm_id` (`refjenisizinikm_id`);

--
-- Indexes for table `refloket`
--
ALTER TABLE `refloket`
  ADD PRIMARY KEY (`refloket_id`);

--
-- Indexes for table `refsex`
--
ALTER TABLE `refsex`
  ADD PRIMARY KEY (`refsex_id`);

--
-- Indexes for table `reftingkatpendidikan`
--
ALTER TABLE `reftingkatpendidikan`
  ADD PRIMARY KEY (`reftingkatpendidikan_id`);

--
-- Indexes for table `reftriwulan`
--
ALTER TABLE `reftriwulan`
  ADD PRIMARY KEY (`reftriwulan_id`);

--
-- Indexes for table `refusia`
--
ALTER TABLE `refusia`
  ADD PRIMARY KEY (`refusia_id`);

--
-- Indexes for table `tblappconfig`
--
ALTER TABLE `tblappconfig`
  ADD PRIMARY KEY (`tblappconfig_id`);

--
-- Indexes for table `tblhasilsurvei`
--
ALTER TABLE `tblhasilsurvei`
  ADD PRIMARY KEY (`tblhasilsurvei_id`);

--
-- Indexes for table `tblhistugasdalamnegriusulan`
--
ALTER TABLE `tblhistugasdalamnegriusulan`
  ADD PRIMARY KEY (`tblhistugasdalamnegriusulan_id`);

--
-- Indexes for table `tblizin`
--
ALTER TABLE `tblizin`
  ADD PRIMARY KEY (`tblizin_id`);

--
-- Indexes for table `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`tblmenu_id`);

--
-- Indexes for table `tblpengguna`
--
ALTER TABLE `tblpengguna`
  ADD PRIMARY KEY (`tblpengguna_id`),
  ADD UNIQUE KEY `idx_username` (`tblpengguna_username`) USING BTREE;

--
-- Indexes for table `tblpertanyaan`
--
ALTER TABLE `tblpertanyaan`
  ADD PRIMARY KEY (`tblpertanyaan_id`);

--
-- Indexes for table `tblrole`
--
ALTER TABLE `tblrole`
  ADD PRIMARY KEY (`tblrole_id`);

--
-- Indexes for table `tblroleprivilege`
--
ALTER TABLE `tblroleprivilege`
  ADD PRIMARY KEY (`tblroleprivilege_id`);

--
-- Indexes for table `tblslider`
--
ALTER TABLE `tblslider`
  ADD PRIMARY KEY (`tblslider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `refjenisizinikm`
--
ALTER TABLE `refjenisizinikm`
  MODIFY `refjenisizinikm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `refloket`
--
ALTER TABLE `refloket`
  MODIFY `refloket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `refsex`
--
ALTER TABLE `refsex`
  MODIFY `refsex_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reftingkatpendidikan`
--
ALTER TABLE `reftingkatpendidikan`
  MODIFY `reftingkatpendidikan_id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20004;
--
-- AUTO_INCREMENT for table `reftriwulan`
--
ALTER TABLE `reftriwulan`
  MODIFY `reftriwulan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblappconfig`
--
ALTER TABLE `tblappconfig`
  MODIFY `tblappconfig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblhasilsurvei`
--
ALTER TABLE `tblhasilsurvei`
  MODIFY `tblhasilsurvei_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3335;
--
-- AUTO_INCREMENT for table `tblhistugasdalamnegriusulan`
--
ALTER TABLE `tblhistugasdalamnegriusulan`
  MODIFY `tblhistugasdalamnegriusulan_id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `tblizin`
--
ALTER TABLE `tblizin`
  MODIFY `tblizin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `tblmenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tblpengguna`
--
ALTER TABLE `tblpengguna`
  MODIFY `tblpengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `tblpertanyaan`
--
ALTER TABLE `tblpertanyaan`
  MODIFY `tblpertanyaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblrole`
--
ALTER TABLE `tblrole`
  MODIFY `tblrole_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tblroleprivilege`
--
ALTER TABLE `tblroleprivilege`
  MODIFY `tblroleprivilege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1214;
--
-- AUTO_INCREMENT for table `tblslider`
--
ALTER TABLE `tblslider`
  MODIFY `tblslider_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
