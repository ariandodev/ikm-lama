/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : dbaplikasi_paser

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-03-06 08:15:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for refjenisizinikm
-- ----------------------------
DROP TABLE IF EXISTS `refjenisizinikm`;
CREATE TABLE `refjenisizinikm` (
`refjenisizinikm_id`  int(11) NOT NULL AUTO_INCREMENT ,
`refloket_id`  int(5) NULL DEFAULT NULL ,
`refjenisizinikm_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`refjenisizinikm_isaktif`  enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F' ,
PRIMARY KEY (`refjenisizinikm_id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=39

;

-- ----------------------------
-- Records of refjenisizinikm
-- ----------------------------
BEGIN;
INSERT INTO `refjenisizinikm` VALUES ('1', '1', 'Penyelesaian kasus-kasus kepegawaian', 'T'), ('3', '1', 'Penyelesaian administrasi pembaharuan daftar keluarga', 'T'), ('4', '1', 'Penyelesaian Ijin perkawinan / perceraian', 'T'), ('5', '1', 'Penyelesaian karis/karsu/karpeg', 'T'), ('6', '1', 'Fasilitas kartu peserta Taspen', 'T'), ('7', '1', 'Pemberian tanda jasa bagi PNS', 'T'), ('8', '1', 'Pengelolaan LHKPN (Laporan Harta Kekayaan Pejabat Negara)', 'T'), ('9', '1', 'Sosialisasi peraturan perundang-undangan bidang Kepegawaian', 'T'), ('10', '1', 'Penyelenggaraan sumpah janji PNS', 'T'), ('11', '1', 'Pelaksanaan operasi razia PNS', 'T'), ('12', '1', 'Penyelenggaraan / pengiriman diklat', 'T'), ('13', '1', 'Penyelesaian ijin belajar', 'T'), ('14', '1', 'Penyelesaian Kenaikan Pangkat PNS', 'T'), ('15', '1', 'Penyelesaian administrasi penyesuaian masa kerja (PMK)', 'T'), ('16', '1', 'Penyelesaian SK pensiun', 'T'), ('17', '1', 'Penyelesaian SK pengangkatan CPNS menjadi PNS', 'T'), ('18', '1', 'Penyelesaian ijin penggunaan gelar akademis', 'T'), ('19', '1', 'Penyelesaian kenaikan gaji berkala', 'T'), ('20', '1', 'Penyelenggaraan Ujian Kenaikan Pangkat Penyesuaian Ijazah (UKPPI)', 'T'), ('21', '1', 'Fasilitas pengadaan kartu PNS elektronik', 'T'), ('22', '1', 'Pelaksanaan pelantikan pejabat struktural/kepala sekolah', 'T'), ('23', '1', 'Uji kesehatan PNS', 'T'), ('24', '1', 'Penetapan PNS dalam jabatan fungsional', 'T'), ('25', '1', 'Fasilitasi bimbingan dan konseling bagi PNS', 'T'), ('26', '1', 'Penyelesaian tenaga honorer menjadi CPNS', 'T'), ('27', '1', 'Penyusunan formasi PNS', 'T'), ('28', '1', 'Sistem informasi dan pelayanan kepegawaian', 'T'), ('29', '1', 'Keberadaan website BKD', 'T'), ('30', '1', 'Penyelenggaraan bimtek penyusunan formasi', 'T'), ('31', '1', 'Pelaksanaan ujian dinas', 'T'), ('32', '1', 'Laporan mekanisme dan peremajaan data pegawai', 'T'), ('33', '1', 'Pelayanan jasa surat menyurat', 'T'), ('34', '1', 'Penyelenggaraan bintek penghitungan Penilaian Angka Kredit (PAK) jabatan fungsional', 'T'), ('35', '1', 'Penyelesaian cuti PNS', 'T'), ('36', '1', 'Penilaian Sasaran Kinerja Pegawai', 'T');
COMMIT;

-- ----------------------------
-- Table structure for refloket
-- ----------------------------
DROP TABLE IF EXISTS `refloket`;
CREATE TABLE `refloket` (
`refloket_id`  int(11) NOT NULL AUTO_INCREMENT ,
`refloket_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`refloket_petugas`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`refloket_isaktif`  enum('N','Y') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N' ,
PRIMARY KEY (`refloket_id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of refloket
-- ----------------------------
BEGIN;
INSERT INTO `refloket` VALUES ('1', 'Front Office', '-', 'N');
COMMIT;

-- ----------------------------
-- Table structure for refsex
-- ----------------------------
DROP TABLE IF EXISTS `refsex`;
CREATE TABLE `refsex` (
`refsex_id`  int(2) NOT NULL AUTO_INCREMENT ,
`refsex_kode`  varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`refsex_nama`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`refsex_id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of refsex
-- ----------------------------
BEGIN;
INSERT INTO `refsex` VALUES ('1', 'L', 'Laki-laki'), ('2', 'P', 'Perempuan');
COMMIT;

-- ----------------------------
-- Table structure for reftingkatpendidikan
-- ----------------------------
DROP TABLE IF EXISTS `reftingkatpendidikan`;
CREATE TABLE `reftingkatpendidikan` (
`reftingkatpendidikan_id`  bigint(19) NOT NULL AUTO_INCREMENT ,
`refgolru_id`  int(3) NOT NULL ,
`reftingkatpendidikan_urut`  int(2) NULL DEFAULT 0 ,
`reftingkatpendidikan_kode`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`reftingkatpendidikan_nama`  varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`haryo`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`reftingkatpendidikan_id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=20003

;

-- ----------------------------
-- Records of reftingkatpendidikan
-- ----------------------------
BEGIN;
INSERT INTO `reftingkatpendidikan` VALUES ('1', '5', '1', '', 'SD', '01'), ('2', '7', '2', '', 'SLTP', '02'), ('3', '8', '3', '', 'SLTA', '03'), ('4', '10', '4', '', 'D-1', '04'), ('5', '10', '5', '', 'D-2', '05'), ('6', '11', '6', '', 'D-3', '06'), ('8', '12', '8', '', 'D-4', '08'), ('9', '13', '9', '', 'S-1', '09'), ('10', '14', '10', '', 'S-2', '10'), ('11', '14', '11', '', 'S-3', '00');
COMMIT;

-- ----------------------------
-- Table structure for refusia
-- ----------------------------
DROP TABLE IF EXISTS `refusia`;
CREATE TABLE `refusia` (
`refusia_id`  int(11) NOT NULL ,
`refusia_awal`  int(2) NULL DEFAULT NULL ,
`refusia_akhir`  int(2) NULL DEFAULT NULL ,
PRIMARY KEY (`refusia_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of refusia
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tblhasilsurvei
-- ----------------------------
DROP TABLE IF EXISTS `tblhasilsurvei`;
CREATE TABLE `tblhasilsurvei` (
`tblhasilsurvei_id`  int(9) NOT NULL AUTO_INCREMENT ,
`refjenisizinikm_id`  int(11) NOT NULL ,
`reftingkatpendidikan_id`  int(11) NOT NULL ,
`refsex_id`  int(1) NOT NULL ,
`tblhasilsurvei_usia`  int(11) NOT NULL ,
`refloket_id`  int(11) NULL DEFAULT NULL ,
`tblhasilsurvei_caradaftar`  enum('Loket','Online') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblhasilsurvei_pengurusan`  enum('Pemilik','Kuasa') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`refjenisizinikm_nama`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblhasilsurvei_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblhasilsurvei_nip`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblhasilsurvei_pertanyaan1`  int(2) NULL DEFAULT NULL ,
`tblhasilsurvei_pertanyaan2`  int(2) NULL DEFAULT NULL ,
`tblhasilsurvei_pertanyaan3`  int(2) NULL DEFAULT NULL ,
`tblhasilsurvei_pertanyaan4`  int(2) NULL DEFAULT NULL ,
`tblhasilsurvei_pertanyaan5`  int(2) NULL DEFAULT NULL ,
`tblhasilsurvei_pertanyaan6`  int(2) NULL DEFAULT NULL ,
`tblhasilsurvei_pertanyaan7`  int(2) NULL DEFAULT NULL ,
`tblhasilsurvei_pertanyaan8`  int(2) NULL DEFAULT NULL ,
`tblhasilsurvei_pertanyaan9`  int(2) NULL DEFAULT NULL ,
`tblhasilsurvei_pertanyaan10`  int(2) NULL DEFAULT NULL ,
`tblhasilsurvei_penilaian`  enum('positif','negatif','abstrak') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tblhasilsurvei_saran`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
`tblhasilsurvei_total`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblhasilsurvei_syscreate`  datetime NOT NULL ,
`tblhasilsurvei_sysupdate`  datetime NULL DEFAULT NULL ,
PRIMARY KEY (`tblhasilsurvei_id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=49

;

-- ----------------------------
-- Records of tblhasilsurvei
-- ----------------------------
BEGIN;
INSERT INTO `tblhasilsurvei` VALUES ('1', '1', '1', '1', '10', '1', 'Loket', 'Pemilik', null, 'lutfiyatul fuadah', '99999999999999999', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', 'positif', ':-)', '31', '2016-02-02 08:59:04', null), ('2', '3', '2', '2', '20', '1', 'Loket', 'Pemilik', null, 'sa\'adah nuraini', '99999999999999999', '3', '3', '3', '4', '3', '3', '4', '3', '4', '4', 'positif', 'Semoga tetap dipertahankan dan ditingkatkan', '34', '2016-02-02 09:00:28', null), ('3', '4', '3', '1', '30', '1', 'Loket', 'Pemilik', null, 'Sany Mayq R', '99999999999999999', '4', '3', '4', '4', '3', '3', '4', '3', '3', '3', 'positif', 'Lebih ditingkatkan lagi :)', '34', '2016-02-02 09:28:01', null), ('4', '5', '4', '2', '40', '1', 'Loket', 'Pemilik', null, 'suhartini', '99999999999999999', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'positif', 'Semoga bisa mempertahankan pelayanan yang Sudah baik\r\n INI Dan lebih di tingkatkan', '30', '2016-02-02 09:45:05', null), ('5', '6', '5', '1', '50', '1', 'Loket', 'Pemilik', null, 'indah nuraini', '99999999999999999', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', 'positif', 'Di pertahankan kalau bisa dimajukan lg. Thank you', '31', '2016-02-02 13:00:04', null), ('6', '7', '6', '2', '60', '1', 'Loket', 'Pemilik', null, 'robingatun', '99999999999999999', '3', '4', '3', '4', '3', '3', '4', '3', '3', '3', 'positif', 'Lebih Raman lagi', '33', '2016-02-02 13:05:53', null), ('7', '8', '8', '1', '70', '1', 'Loket', 'Pemilik', null, 'luhtfi said', '99999999999999999', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'positif', 'Sangat bail', '40', '2016-02-02 13:10:44', null), ('8', '9', '9', '2', '80', '1', 'Loket', 'Pemilik', null, 'Arum Zakiah', '99999999999999999', '4', '4', '4', '4', '3', '3', '3', '3', '3', '3', 'positif', 'Lanjutkan', '34', '2016-02-02 13:20:14', null), ('9', '10', '10', '1', '10', '1', 'Loket', 'Pemilik', null, 'huda khoir nur rela', '99999999999999999', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'positif', 'Sudan bagus', '40', '2016-02-05 08:36:46', null), ('10', '11', '11', '2', '20', '1', 'Loket', 'Pemilik', null, 'setianto', '99999999999999999', '4', '3', '3', '3', '4', '4', '3', '3', '3', '3', 'positif', 'Semoga kedepan Dinas Perizinan yogyakarta semakin bail lagi,Dan mampu menjadi contoh dinas2 perizinan di prov.Diy', '33', '2016-02-05 08:47:09', null), ('11', '12', '11', '1', '30', '1', 'Loket', 'Pemilik', null, 'yossi amallia utomoningsih', '99999999999999999', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', 'positif', 'Lebih Raman lagi.... Mksh', '31', '2016-02-05 08:57:48', null), ('12', '13', '1', '2', '40', '1', 'Loket', 'Pemilik', null, 'karjono', '99999999999999999', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'positif', 'Tingkatkan...!!!!', '30', '2016-02-05 10:15:16', null), ('13', '14', '2', '1', '50', '1', 'Loket', 'Pemilik', null, 'reza zulfikar', '99999999999999999', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', 'positif', 'Tingkatkan', '31', '2016-02-05 10:16:46', null), ('14', '15', '3', '2', '60', '1', 'Loket', 'Pemilik', null, 'nining rohmiatun', '99999999999999999', '3', '3', '4', '4', '4', '3', '3', '3', '4', '4', 'positif', 'Ok', '35', '2016-02-05 10:46:19', null), ('15', '16', '4', '1', '70', '1', 'Loket', 'Pemilik', null, 'wisnu', '99999999999999999', '3', '3', '3', '3', '3', '3', '3', '3', '4', '4', 'positif', 'Smga proseslbh cpt', '32', '2016-02-05 11:04:28', null), ('16', '17', '5', '2', '80', '1', 'Loket', 'Pemilik', null, 'suyatno', '99999999999999999', '3', '4', '3', '4', '3', '4', '3', '4', '3', '3', 'positif', 'Sangat memuaskan', '34', '2016-02-05 11:15:26', null), ('17', '18', '6', '1', '10', '1', 'Loket', 'Pemilik', null, 'lidwina subiantono', '99999999999999999', '4', '4', '4', '4', '4', '3', '4', '3', '3', '3', 'positif', 'Bagus', '36', '2016-02-05 12:55:38', null), ('18', '19', '8', '2', '20', '1', 'Loket', 'Pemilik', null, 'ANDRYANI NINGSIH', '99999999999999999', '3', '3', '3', '4', '3', '3', '4', '3', '3', '3', 'positif', 'Lebih cepat lagi dalam merespon pelayanan publik', '32', '2016-02-05 12:59:34', null), ('19', '20', '9', '1', '30', '1', 'Loket', 'Pemilik', null, 'dona fridayana', '99999999999999999', '4', '3', '3', '4', '3', '3', '3', '3', '3', '3', 'positif', 'Ditingkatkan kembali Pennyelenggaraan pelayanan publiknya', '32', '2016-02-05 13:02:35', null), ('20', '21', '10', '2', '40', '1', 'Loket', 'Pemilik', null, 'arif', '99999999999999999', '4', '4', '4', '4', '3', '4', '4', '3', '4', '4', 'positif', 'OK', '38', '2016-02-05 13:19:22', null), ('21', '22', '11', '1', '50', '1', 'Loket', 'Pemilik', null, 'tri wahyuni', '99999999999999999', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'positif', 'Sudan baik.....:-)', '30', '2016-02-05 14:24:20', null), ('22', '23', '11', '2', '60', '1', 'Loket', 'Pemilik', null, 'silvya dina saputri', '99999999999999999', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', 'positif', 'He\'s lbih jlas lgi akn persyatan swktu mgrus.', '31', '2016-02-05 14:26:49', null), ('23', '24', '1', '1', '70', '1', 'Loket', 'Pemilik', null, 'imam pamungkas walton', '99999999999999999', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', 'positif', 'Jangan korupsi waktu! Meskipun cuma 1 menit:-)', '31', '2016-02-05 14:40:17', null), ('24', '25', '2', '2', '80', '1', 'Loket', 'Pemilik', null, 'gt', '99999999999999999', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'positif', 'Pelayana banyak yang bohong dalam waktu 17 hari until imb', '30', '2016-02-06 07:40:55', null), ('25', '26', '3', '1', '10', '1', 'Loket', 'Pemilik', null, 'tri ayuk rama dani', '99999999999999999', '3', '3', '2', '4', '3', '3', '3', '3', '3', '3', 'positif', 'Tingkatkan', '30', '2016-02-06 08:24:46', null), ('26', '27', '4', '2', '20', '1', 'Loket', 'Pemilik', null, 'aji purwanto', '99999999999999999', '3', '3', '2', '3', '3', '3', '3', '3', '3', '3', 'positif', 'Komunikasi bola Ada kekurangan Berkas lebih ditingkatkan', '29', '2016-02-06 08:43:20', null), ('27', '28', '5', '1', '30', '1', 'Loket', 'Pemilik', null, 'kuncorro hastono', '99999999999999999', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'positif', 'Tingkatkan terus pelayanan yg Sudan bagus', '40', '2016-02-06 10:06:50', null), ('28', '29', '6', '2', '40', '1', 'Loket', 'Pemilik', null, 'sandy saputra', '99999999999999999', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', 'positif', 'Terima kasih untik pelayanannya', '31', '2016-02-06 10:24:30', null), ('29', '30', '8', '1', '50', '1', 'Loket', 'Pemilik', null, 'vera sholeha', '99999999999999999', '4', '3', '3', '4', '3', '3', '3', '3', '3', '3', 'positif', 'Lanjutkan', '32', '2016-02-06 10:35:58', null), ('30', '31', '9', '2', '60', '1', 'Loket', 'Pemilik', null, 'nedi', '99999999999999999', '3', '3', '2', '4', '3', '3', '3', '3', '3', '3', 'positif', 'Waktu penyelesaian kalo visa lebih cepat lagi....', '30', '2016-02-06 10:48:26', null), ('31', '32', '10', '1', '70', '1', 'Loket', 'Pemilik', null, 'widi astuti', '99999999999999999', '3', '4', '3', '4', '3', '3', '3', '3', '3', '3', 'positif', 'Senyum', '32', '2016-02-06 10:59:02', null), ('32', '33', '11', '2', '80', '1', 'Loket', 'Pemilik', null, 'dandi iriyanto', '99999999999999999', '4', '4', '3', '4', '4', '4', '4', '3', '3', '3', 'positif', 'Baik', '36', '2016-02-06 11:04:04', null), ('33', '34', '11', '1', '10', '1', 'Loket', 'Pemilik', null, 'sarmidi', '99999999999999999', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', 'positif', 'Perlu ditingkaytkan into pelayanan masyarakat', '31', '2016-02-06 12:09:51', null), ('34', '35', '1', '2', '20', '1', 'Loket', 'Pemilik', null, 'ikha seiyawan', '99999999999999999', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'positif', 'Teruskan peelayanan spy lbh bail,', '30', '2016-02-06 12:32:41', null), ('35', '36', '2', '1', '30', '1', 'Loket', 'Pemilik', null, 'mochamad nur aziz', '99999999999999999', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'positif', 'Teruskan', '30', '2016-02-06 13:13:42', null), ('36', '13', '9', '2', '32', '1', '', '', '13', 'No Name', '', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', '', '', '31', '2016-02-23 06:24:49', null), ('37', '13', '9', '1', '43', '1', '', '', '13', 'No Name', '', '3', '4', '3', '4', '3', '4', '4', '3', '4', '4', '', '', '36', '2016-02-23 07:05:35', null), ('38', '14', '9', '1', '50', '1', '', '', '14', 'No Name', '', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', '', '', '31', '2016-02-25 00:37:12', null), ('39', '3', '5', '2', '21', '1', '', '', '3', 'No Name', '', '1', '1', '1', '4', '1', '1', '1', '1', '1', '1', '', 'buruk', '13', '2016-02-25 01:22:40', null), ('40', '11', '10', '2', '66', '1', '', '', '11', 'No Name', '', '2', '2', '2', '4', '2', '2', '2', '2', '2', '2', '', '', '22', '2016-02-26 01:31:51', null), ('41', '7', '9', '1', '38', '1', '', '', '7', 'No Name', '', '3', '3', '4', '4', '4', '3', '3', '3', '3', '3', '', '', '33', '2016-02-29 07:44:34', null), ('42', '7', '9', '1', '47', '1', '', '', '7', 'No Name', '', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', '', '', '31', '2016-02-29 07:46:13', null), ('43', '7', '9', '1', '35', '1', '', '', '7', 'No Name', '', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', '', '', '31', '2016-02-29 07:47:44', null), ('44', '13', '9', '1', '28', '1', '', '', '13', 'Jarwo', '12345678.912345.6.789', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', '', 'baik', '31', '2016-03-01 04:55:44', null), ('45', '8', '8', '1', '56', '1', '', '', '8', 'No Name', '', '1', '2', '3', '4', '3', '1', '2', '3', '4', '2', '', '', '25', '2016-03-02 01:43:00', null), ('46', '10', '1', '1', '55', '1', 'Loket', 'Pemilik', '10', 'tt', null, '2', '2', '2', '1', '2', '3', '2', '2', '3', null, '', 'uu', '19', '2016-03-02 14:17:58', null), ('47', '7', '2', '1', '22', '1', 'Loket', 'Pemilik', '7', 'dd', null, '1', '2', '3', '4', '1', '1', '1', '1', '3', null, '', 't', '17', '2016-03-03 03:39:10', null), ('48', '1', '3', '1', '33', '1', 'Loket', 'Pemilik', '1', 'test', null, '1', '2', '2', '3', '2', '1', '2', '3', '3', null, '', 'bagus', '19', '2016-03-04 05:24:56', null);
COMMIT;

-- ----------------------------
-- Table structure for tblhistugasdalamnegriusulan
-- ----------------------------
DROP TABLE IF EXISTS `tblhistugasdalamnegriusulan`;
CREATE TABLE `tblhistugasdalamnegriusulan` (
`tblhistugasdalamnegriusulan_id`  bigint(19) NOT NULL AUTO_INCREMENT ,
`tblidentitaspegawaiadhoc_id`  bigint(19) NOT NULL ,
`tblhistugasdalamnegriusulan_urut`  int(11) NULL DEFAULT NULL ,
`tblhistugasdalamnegriusulan_daerahtujuan`  varchar(105) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblhistugasdalamnegriusulan_jenispenugasan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblhistugasdalamnegriusulan_penetap`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblhistugasdalamnegriusulan_skno`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblhistugasdalamnegriusulan_sktgl`  date NULL DEFAULT NULL ,
`tblhistugasdalamnegriusulan_tglmulai`  date NULL DEFAULT NULL ,
`tblhistugasdalamnegriusulan_tglakhir`  date NULL DEFAULT NULL ,
`tblhistugasdalamnegriusulan_tglentry`  date NOT NULL ,
`tblhistugasdalamnegriusulan_tglupdate`  date NOT NULL ,
`refprosesusulan_id`  int(2) NOT NULL ,
`refpengguna_id`  int(11) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`tblhistugasdalamnegriusulan_id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=63

;

-- ----------------------------
-- Records of tblhistugasdalamnegriusulan
-- ----------------------------
BEGIN;
INSERT INTO `tblhistugasdalamnegriusulan` VALUES ('57', '10128', null, 'daerah', 'jenis tugas', 'penetyap', '78978', '2013-09-09', '2013-09-09', '2013-09-09', '2013-09-09', '2013-09-09', '3', '0'), ('58', '10128', null, 'daerah tujuan', 'jenis', 'penetap', '8787', '2013-09-09', '2013-09-09', '2013-09-09', '2013-09-09', '2013-09-09', '2', '1'), ('59', '10343', null, 'bogor', 'jenis tuga', 'penetap', '989898', '2013-11-09', '2013-11-09', '2013-11-09', '2013-11-09', '2013-11-09', '3', '0'), ('60', '10403', null, 'PPPPP', 'PPPPPPP', 'PPPPPPP', 'MMMM', '2013-12-18', '2013-12-21', '2013-12-26', '2013-12-13', '2013-12-13', '2', '0'), ('61', '10403', null, 'pppppp', 'pppppp', 'ppppp', 'pppppp', '0000-00-00', '0000-00-00', '0000-00-00', '2013-12-14', '2013-12-14', '2', '1'), ('62', '10403', null, 'daerah oscar', 'nnnnnn', 'nnnnnnn', 'nnnnnnn', '2013-09-10', '2013-09-10', '0000-00-00', '2013-12-17', '2013-12-17', '1', '1');
COMMIT;

-- ----------------------------
-- Table structure for tblizin
-- ----------------------------
DROP TABLE IF EXISTS `tblizin`;
CREATE TABLE `tblizin` (
`tblizin_id`  int(10) NOT NULL AUTO_INCREMENT ,
`tblizin_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tblizin_lama`  int(5) NULL DEFAULT NULL ,
`tblizin_icon`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblizin_adaretribusi`  enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F' ,
`tblizin_adaceklap`  enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F' ,
`tblizin_adarekomendasi`  enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblizin_terstruktur`  enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'T' ,
`tblrole_id`  int(11) NULL DEFAULT NULL ,
`tblizin_isaktif`  enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'T' ,
`tblizin_isonline`  enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F' ,
`tblizin_ismulti`  enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F' ,
PRIMARY KEY (`tblizin_id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=41

;

-- ----------------------------
-- Records of tblizin
-- ----------------------------
BEGIN;
INSERT INTO `tblizin` VALUES ('2', 'Izin Prinsip Penanaman Modal', null, null, 'F', 'F', null, 'T', '16', 'F', 'F', 'F'), ('3', 'Izin Prinsip Perluasan Penananaman Modal', null, null, 'F', 'F', null, 'T', '16', 'F', 'F', 'F'), ('5', 'Izin Prinsip Penggabungan Perusahaan Penanaman Modal', null, null, 'F', 'F', null, 'T', '16', 'F', 'F', 'F'), ('6', 'Izin Prinsip Perubahan', null, null, 'F', 'F', null, 'T', '16', 'F', 'F', 'F'), ('7', 'Izin Usaha Penanaman Modal', null, null, 'F', 'F', null, 'T', '16', 'F', 'F', 'F'), ('8', 'Izin Usaha Perluasan', null, null, 'F', 'F', null, 'T', '16', 'F', 'F', 'F'), ('9', 'Izin Usaha Penggabungan Perusahaan Penanaman Modal', null, null, 'F', 'F', null, 'T', '16', 'F', 'F', 'F'), ('10', 'Izin Usaha Perubahan', null, null, 'F', 'F', null, 'T', '16', 'F', 'F', 'F'), ('11', 'Izin Pembukaan Kantor Cabang', null, null, 'F', 'F', null, 'T', '16', 'F', 'F', 'F'), ('12', 'Izin Kantor Perwakilan Perusahaan Asing', null, null, 'F', 'F', null, 'T', '16', 'F', 'F', 'F'), ('13', 'Surat Izin Usaha Perwakilan Perusahaan Perdagangan Asing', null, null, 'F', 'F', null, 'T', '16', 'F', 'F', 'F'), ('14', 'Izin Lokasi ( ILOK )', null, null, 'F', 'F', null, 'T', '18', 'T', 'F', 'F'), ('15', 'Izin Mendirikan Bangunan (IMB)', null, null, 'T', 'T', null, 'T', '18', 'T', 'T', 'F'), ('16', 'Surat Izin Usaha Perdagangan (SIUP)', null, null, 'F', 'F', null, 'T', '17', 'T', 'T', 'T'), ('17', 'Tanda Daftar Industri (TDI)', null, null, 'F', 'F', null, 'T', '17', 'T', 'T', 'T'), ('18', 'Tanda Daftar Perusahaan (TDP)', null, null, 'F', 'F', null, 'T', '17', 'T', 'T', 'T'), ('19', 'Izin Usaha Industri (IUI)', null, null, 'F', 'F', null, 'T', '17', 'T', 'T', 'T'), ('20', 'Tanda Daftar Gudang (TDG)', null, null, 'F', 'T', null, 'T', '17', 'T', 'T', 'T'), ('21', 'Izin Perluasan', null, null, 'F', 'F', null, 'T', '17', 'T', 'F', 'F'), ('22', 'Izin Gangguan ( HO )', null, null, 'T', 'T', null, 'T', '17', 'T', 'T', 'T'), ('23', 'Surat Izin Tempat Usaha (SITU)', null, null, 'F', 'F', null, 'T', '17', 'T', 'F', 'F'), ('24', 'Surat Izin Tempat Usaha Minuman Beralkohol (SITU-MB)', null, null, 'T', 'T', null, 'T', '17', 'T', 'F', 'F'), ('25', 'Izin Usaha Jasa Konstruksi (IUJK)', null, null, 'F', 'F', null, 'T', '17', 'T', 'T', 'T'), ('26', 'Izin Usaha Rekreasi & Hiburan umum', null, null, 'F', 'F', null, 'T', '17', 'T', 'T', 'T'), ('27', 'Izin Usaha Rumah Makan', null, null, 'F', 'F', null, 'T', '17', 'T', 'T', 'T'), ('28', 'Izin Hotel dan Penginapan', null, null, 'F', 'F', null, 'T', '17', 'T', 'T', 'T'), ('29', 'Izin Usaha Jasa Pariwisata ( IUJP )', null, null, 'F', 'F', null, 'T', '17', 'T', 'T', 'T'), ('30', 'Izin Reklame Instidentil', null, null, 'T', 'T', null, 'T', '17', 'T', 'F', 'F'), ('31', 'Izin Pemanfaatan Penggunaan Tanah (Sewa Lahan)', null, null, 'T', 'T', null, 'T', '17', 'T', 'F', 'F'), ('32', 'Izin Trayek', null, null, 'T', 'T', null, 'T', '17', 'T', 'F', 'F'), ('33', 'Izin Bidang Angkutan Jalan', null, null, 'T', 'T', null, 'T', '17', 'T', 'F', 'F'), ('34', 'Izin Pemanfaatan Air Tanah', null, null, 'T', 'T', null, 'T', '17', 'T', 'F', 'F'), ('35', 'Izin Tempat Penyimpanan Sementara Limbah Bahan Berbahaya Dan Beracun', null, null, 'F', 'F', null, 'T', '17', 'T', 'F', 'F'), ('36', 'Izin Pembuangan Air Limbah Cair', null, null, 'F', 'F', null, 'T', '17', 'T', 'F', 'F'), ('37', 'Pemutihan Izin Mendirikan Bangunan', null, null, 'T', 'T', null, 'T', '18', 'T', 'F', 'F'), ('38', 'Izin Paket', null, null, 'F', 'F', null, 'T', null, 'T', 'F', 'F'), ('39', 'Izin Reklame Tetap', null, null, 'T', 'T', null, 'T', null, 'T', 'F', 'F'), ('40', 'Izin Pemasangan / Penyelenggaraan Reklame', null, null, 'T', 'T', null, 'T', null, 'T', 'F', 'F');
COMMIT;

-- ----------------------------
-- Table structure for tblmenu
-- ----------------------------
DROP TABLE IF EXISTS `tblmenu`;
CREATE TABLE `tblmenu` (
`tblmenu_id`  int(11) NOT NULL AUTO_INCREMENT ,
`tblmenu_urutan`  int(3) NULL DEFAULT NULL ,
`tblmenu_kode`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblmenu_title`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblmenu_icon`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblmenu_link`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblmenu_idparent`  int(11) NULL DEFAULT NULL ,
`tblmenu_status`  enum('header','detail') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`tblmenu_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=15

;

-- ----------------------------
-- Records of tblmenu
-- ----------------------------
BEGIN;
INSERT INTO `tblmenu` VALUES ('1', '1', '01_dashboard', 'Dashboard', 'fa-home', 'app/grafik', '0', null), ('2', '2', '02_olahdata', 'A. Olah Data', 'fa-file-text-o', '#', '0', null), ('3', '3', '03_saran', 'A.1 Saran', 'fa-comment', 'app/refhasilsurvey', '2', null), ('4', '4', '04_settingpertanyaan', 'A.2 Setting Pertanyaan Jawaban', 'fa-book', 'app/refpertanyaan', '2', null), ('5', '5', '05_olahdataresponden', 'B. Olah Data Responden', 'fa-file-text-o', 'app/refdataresponden', '0', null), ('6', '6', '06_settingreferensi', 'C. Setting Referensi', 'fa-file-text-o', '#', '0', null), ('7', '7', '07_settingloket', 'C.1 Setting Loket', 'fa-book', 'app/refloket', '6', null), ('8', '8', '08_jenisizin', 'C.2 Jenis Pelayanan', 'fa-comment', 'app/refjenisizinikm', '6', null), ('9', '9', '09_administrator', 'D. Administrator', 'fa-gear', '#', '0', null), ('10', '10', '10_settinggroup', 'D.1 Setting Group', null, 'app/tblrole/grup', '9', null), ('11', '11', '11_settinguser', 'D.2 Setting User', null, 'app/tblpengguna/pengguna', '9', null), ('12', '12', '12_settinguserlevel', 'D.3 Setting User Level', null, 'app/tblpengguna/hakakses2', '9', null), ('13', '13', '13_settingmenu', 'D.4 Setting Menu', null, 'app/tblmenu/menu', '9', null), ('14', '14', '14_settingslider', 'E.Setting Slider', 'fa-file-text-o', '#app/refimageslider', '0', null);
COMMIT;

-- ----------------------------
-- Table structure for tblpengguna
-- ----------------------------
DROP TABLE IF EXISTS `tblpengguna`;
CREATE TABLE `tblpengguna` (
`tblpengguna_id`  int(11) NOT NULL AUTO_INCREMENT ,
`tblpengguna_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblpengguna_username`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblpengguna_email`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblpengguna_password`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '' ,
`tblrole_id`  int(10) NULL DEFAULT 0 ,
`tblpengguna_idsubunit`  varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0' ,
`tblpengguna_status`  enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'T' ,
`tblpengguna_modified`  datetime NULL DEFAULT NULL ,
`tblpengguna_created`  datetime NULL DEFAULT NULL ,
`tblpengguna_foto`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblpengguna_notelp`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblpengguna_keterangan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`tblpengguna_id`),
UNIQUE INDEX `idx_username` (`tblpengguna_username`) USING BTREE 
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=81

;

-- ----------------------------
-- Records of tblpengguna
-- ----------------------------
BEGIN;
INSERT INTO `tblpengguna` VALUES ('1', 'Superadmin', 'superadmin', 'admin@email.com', 'f6d4c7fa4e4c3a47d0c2f932c937902b', '1', '0', 'T', '2014-10-06 21:52:50', '2013-06-08 10:48:38', '0ad52f9dd4584b7bbe0e3f3a3d669712-user.png', '(999) 999-9999', null);
COMMIT;

-- ----------------------------
-- Table structure for tblpertanyaan
-- ----------------------------
DROP TABLE IF EXISTS `tblpertanyaan`;
CREATE TABLE `tblpertanyaan` (
`tblpertanyaan_id`  int(11) NOT NULL AUTO_INCREMENT ,
`tblpertanyaan_urut`  int(11) NULL DEFAULT NULL ,
`tblpertanyaan_uraian`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblpertanyaan_ketjawabanA`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblpertanyaan_ketjawabanB`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblpertanyaan_ketjawabanC`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblpertanyaan_ketjawabanD`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblpertanyaan_isaktif`  enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'T' ,
`tblpertanyaan_point`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`tblpertanyaan_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=11

;

-- ----------------------------
-- Records of tblpertanyaan
-- ----------------------------
BEGIN;
INSERT INTO `tblpertanyaan` VALUES ('1', '1', 'Bagaimana pendapat saudara tentang kesesuaian persyaratan yang harus dipenuhi dengan jenis pelayanan?', 'Tidak sesuai', 'Kurang sesuai', 'Sesuai', 'Sangat sesuai', 'T', 'Persyaratan pelayanan'), ('2', '2', 'Bagaimana menurut Saudara tentang kemudahan Prosedur Pelayanan yang diberikan oleh petugas Pelayanan?', 'Tidak mudah', 'Kurang mudah', 'Mudah', 'Sangat mudah', 'T', 'Prosedur pelayanan'), ('3', '3', 'Bagaimana menurut Saudara kecepatan petugas yang melayani di tiap tahapan pelayanan?', 'Tidak cepat', 'Kurang cepat', 'Cepat', 'Sangat cepat', 'T', 'Waktu penyelesaian pelayanan'), ('4', '4', 'Bagaimana menurut Saudara tentang Kesesusaian/ kewajaran biaya yang ditetapkan?', 'Tidak wajar', 'Kurang wajar', 'Wajar', 'Sangat wajar / <br> Tanpa biaya', 'T', 'Biaya/tarif pelayanan'), ('5', '5', 'Apakah hasil pelayanan yang diberikan sesuai dengan ketentuan dan spesifikasi jenis pelayanan?', 'Tidak sesuai', 'Kurang sesuai', 'Sesuai', 'Sangat sesuai', 'T', 'Produk spesifikasi jenis pelayanan'), ('6', '6', 'Bagaimana pendapat Saudara tentang kemampuan petugas dalam memberikan pelayanan?', 'Tidak mampu', 'Kurang mampu', 'Mampu', 'Sangat mampu', 'T', 'Kompetensi petugas pelaksana'), ('7', '7', 'Bagaimaan pendapat Saudara tentang sikap petugas dalam memberikan pelayanan?', 'Tidak baik', 'Kurang baik', 'Baik', 'Sangat baik', 'T', 'Perilaku petugas pelaksana'), ('8', '8', 'Bagaimana pendapat Saudara tentang kesanggupan petugas dalam memberikan pelayanan sesuai standar pelayanan?', 'Tidak sanggup', 'Kurang sanggup', 'Sanggup', 'Sangat sanggup', 'T', 'Maklumat pelayanan'), ('9', '9', 'Bagaimana menurut Saudara Penanganan Pengaduan yang diberikan oleh BKD?', 'Tidak baik', 'Kurang baik', 'Baik', 'Sangat baik', 'T', 'Penanganan pengaduan, saran, dan masukan'), ('10', '10', 'Bagaimana pendapat Saudara tentang kenyamanan pelayanan di BKD?', 'Tidak nyaman', 'Kurang nyaman', 'Nyaman', 'Sangat Nyaman', 'T', 'Penanganan pengaduan, saran, dan masukan');
COMMIT;

-- ----------------------------
-- Table structure for tblrole
-- ----------------------------
DROP TABLE IF EXISTS `tblrole`;
CREATE TABLE `tblrole` (
`tblrole_id`  int(10) NOT NULL AUTO_INCREMENT ,
`tblrole_code`  varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`tblrole_desc`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`tblrole_id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=12

;

-- ----------------------------
-- Records of tblrole
-- ----------------------------
BEGIN;
INSERT INTO `tblrole` VALUES ('1', 'Administrator', 'Group Administrator');
COMMIT;

-- ----------------------------
-- Table structure for tblroleprivilege
-- ----------------------------
DROP TABLE IF EXISTS `tblroleprivilege`;
CREATE TABLE `tblroleprivilege` (
`tblroleprivilege_id`  int(11) NOT NULL AUTO_INCREMENT ,
`tblrole_id`  int(11) NULL DEFAULT NULL ,
`tblmenu_id`  int(11) NULL DEFAULT NULL ,
`tblroleprivilege_iscreate`  enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F' ,
`tblroleprivilege_isupdate`  enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F' ,
`tblroleprivilege_isdelete`  enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F' ,
`tblroleprivilege_issearch`  enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblroleprivilege_isprint`  enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F' ,
`tblroleprivilege_isshow`  enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'T' ,
PRIMARY KEY (`tblroleprivilege_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1209

;

-- ----------------------------
-- Records of tblroleprivilege
-- ----------------------------
BEGIN;
INSERT INTO `tblroleprivilege` VALUES ('1', '1', '1', 'F', 'F', 'F', null, 'F', 'T'), ('2', '1', '2', 'F', 'F', 'F', null, 'F', 'T'), ('3', '1', '3', 'F', 'F', 'F', null, 'F', 'T'), ('4', '1', '4', 'F', 'F', 'F', null, 'F', 'T'), ('5', '1', '5', 'F', 'F', 'F', null, 'F', 'T'), ('6', '1', '6', 'F', 'F', 'F', null, 'F', 'T'), ('7', '1', '7', 'F', 'F', 'F', null, 'F', 'T'), ('8', '1', '8', 'F', 'F', 'F', null, 'F', 'T'), ('9', '1', '9', 'F', 'F', 'F', null, 'F', 'T'), ('10', '1', '10', 'F', 'F', 'F', null, 'F', 'T'), ('11', '1', '11', 'F', 'F', 'F', null, 'F', 'T'), ('12', '1', '12', 'F', 'F', 'F', null, 'F', 'T'), ('13', '1', '13', 'F', 'F', 'F', null, 'F', 'T'), ('14', '1', '14', 'F', 'F', 'F', null, 'F', 'F'), ('15', '1', '15', 'F', 'F', 'F', null, 'F', 'F'), ('16', '1', '16', 'F', 'F', 'F', null, 'F', 'F'), ('17', '1', '17', 'F', 'F', 'F', null, 'F', 'F'), ('18', '1', '18', 'F', 'F', 'F', null, 'F', 'F'), ('19', '1', '19', 'F', 'F', 'F', null, 'F', 'F'), ('20', '1', '20', 'F', 'F', 'F', null, 'F', 'F'), ('21', '1', '21', 'F', 'F', 'F', null, 'F', 'F'), ('22', '1', '22', 'F', 'F', 'F', null, 'F', 'F'), ('23', '1', '23', 'F', 'F', 'F', null, 'F', 'F'), ('24', '1', '24', 'F', 'F', 'F', null, 'F', 'F'), ('25', '1', '25', 'F', 'F', 'F', null, 'F', 'F'), ('26', '1', '26', 'F', 'F', 'F', null, 'F', 'F'), ('27', '1', '27', 'F', 'F', 'F', null, 'F', 'F'), ('28', '1', '28', 'F', 'F', 'F', null, 'F', 'F'), ('29', '1', '29', 'F', 'F', 'F', null, 'F', 'F'), ('30', '1', '30', 'F', 'F', 'F', null, 'F', 'F'), ('31', '1', '31', 'F', 'F', 'F', null, 'F', 'F'), ('32', '1', '32', 'F', 'F', 'F', null, 'F', 'F'), ('33', '1', '33', 'F', 'F', 'F', null, 'F', 'T'), ('34', '1', '34', 'F', 'F', 'F', null, 'F', 'F'), ('35', '1', '35', 'F', 'F', 'F', null, 'F', 'F'), ('36', '1', '36', 'F', 'F', 'F', null, 'F', 'T'), ('37', '1', '37', 'F', 'F', 'F', null, 'F', 'T'), ('38', '1', '38', 'F', 'F', 'F', null, 'F', 'T'), ('39', '1', '39', 'F', 'F', 'F', null, 'F', 'T'), ('40', '1', '40', 'F', 'F', 'F', null, 'F', 'T'), ('64', '2', '1', 'F', 'F', 'F', null, 'F', 'T'), ('65', '2', '2', 'F', 'F', 'F', null, 'F', 'F'), ('66', '2', '3', 'F', 'F', 'F', null, 'F', 'F'), ('67', '2', '4', 'F', 'F', 'F', null, 'F', 'F'), ('68', '2', '5', 'F', 'F', 'F', null, 'F', 'F'), ('69', '2', '6', 'F', 'F', 'F', null, 'F', 'F'), ('70', '2', '7', 'F', 'F', 'F', null, 'F', 'F'), ('71', '2', '8', 'F', 'F', 'F', null, 'F', 'F'), ('72', '2', '9', 'F', 'F', 'F', null, 'F', 'F'), ('73', '2', '10', 'F', 'F', 'F', null, 'F', 'F'), ('74', '2', '11', 'F', 'F', 'F', null, 'F', 'F'), ('75', '2', '12', 'F', 'F', 'F', null, 'F', 'F'), ('76', '2', '13', 'F', 'F', 'F', null, 'F', 'F'), ('77', '2', '14', 'F', 'F', 'F', null, 'F', 'F'), ('78', '2', '15', 'F', 'F', 'F', null, 'F', 'F'), ('79', '2', '16', 'F', 'F', 'F', null, 'F', 'F'), ('80', '2', '17', 'F', 'F', 'F', null, 'F', 'F'), ('81', '2', '18', 'F', 'F', 'F', null, 'F', 'F'), ('82', '2', '19', 'F', 'F', 'F', null, 'F', 'F'), ('83', '2', '20', 'F', 'F', 'F', null, 'F', 'F'), ('84', '2', '21', 'F', 'F', 'F', null, 'F', 'T'), ('85', '2', '22', 'F', 'F', 'F', null, 'F', 'T'), ('86', '2', '23', 'F', 'F', 'F', null, 'F', 'T'), ('87', '2', '24', 'F', 'F', 'F', null, 'F', 'T'), ('88', '2', '25', 'F', 'F', 'F', null, 'F', 'T'), ('89', '2', '26', 'F', 'F', 'F', null, 'F', 'T'), ('90', '2', '27', 'F', 'F', 'F', null, 'F', 'T'), ('91', '2', '28', 'F', 'F', 'F', null, 'F', 'T'), ('92', '2', '29', 'F', 'F', 'F', null, 'F', 'T'), ('93', '2', '30', 'F', 'F', 'F', null, 'F', 'T'), ('94', '2', '31', 'F', 'F', 'F', null, 'F', 'T'), ('95', '2', '32', 'F', 'F', 'F', null, 'F', 'T'), ('96', '2', '33', 'F', 'F', 'F', null, 'F', 'T'), ('97', '2', '34', 'F', 'F', 'F', null, 'F', 'T'), ('98', '2', '35', 'F', 'F', 'F', null, 'F', 'T'), ('99', '2', '36', 'F', 'F', 'F', null, 'F', 'F'), ('100', '2', '37', 'F', 'F', 'F', null, 'F', 'F'), ('101', '2', '38', 'F', 'F', 'F', null, 'F', 'F'), ('102', '2', '39', 'F', 'F', 'F', null, 'F', 'F'), ('103', '2', '40', 'F', 'F', 'F', null, 'F', 'F'), ('127', '3', '1', 'F', 'F', 'F', null, 'F', 'T'), ('128', '3', '2', 'F', 'F', 'F', null, 'F', 'T'), ('129', '3', '3', 'F', 'F', 'F', null, 'F', 'T'), ('130', '3', '4', 'F', 'F', 'F', null, 'F', 'T'), ('131', '3', '5', 'F', 'F', 'F', null, 'F', 'T'), ('132', '3', '6', 'F', 'F', 'F', null, 'F', 'F'), ('133', '3', '7', 'F', 'F', 'F', null, 'F', 'F'), ('134', '3', '8', 'F', 'F', 'F', null, 'F', 'F'), ('135', '3', '9', 'F', 'F', 'F', null, 'F', 'F'), ('136', '3', '10', 'F', 'F', 'F', null, 'F', 'F'), ('137', '3', '11', 'F', 'F', 'F', null, 'F', 'F'), ('138', '3', '12', 'F', 'F', 'F', null, 'F', 'F'), ('139', '3', '13', 'F', 'F', 'F', null, 'F', 'F'), ('140', '3', '14', 'F', 'F', 'F', null, 'F', 'F'), ('141', '3', '15', 'F', 'F', 'F', null, 'F', 'F'), ('142', '3', '16', 'F', 'F', 'F', null, 'F', 'F'), ('143', '3', '17', 'F', 'F', 'F', null, 'F', 'F'), ('144', '3', '18', 'F', 'F', 'F', null, 'F', 'F'), ('145', '3', '19', 'F', 'F', 'F', null, 'F', 'F'), ('146', '3', '20', 'F', 'F', 'F', null, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES ('147', '3', '21', 'F', 'F', 'F', null, 'F', 'T'), ('148', '3', '22', 'F', 'F', 'F', null, 'F', 'T'), ('149', '3', '23', 'F', 'F', 'F', null, 'F', 'T'), ('150', '3', '24', 'F', 'F', 'F', null, 'F', 'T'), ('151', '3', '25', 'F', 'F', 'F', null, 'F', 'T'), ('152', '3', '26', 'F', 'F', 'F', null, 'F', 'T'), ('153', '3', '27', 'F', 'F', 'F', null, 'F', 'T'), ('154', '3', '28', 'F', 'F', 'F', null, 'F', 'T'), ('155', '3', '29', 'F', 'F', 'F', null, 'F', 'F'), ('156', '3', '30', 'F', 'F', 'F', null, 'F', 'F'), ('157', '3', '31', 'F', 'F', 'F', null, 'F', 'F'), ('158', '3', '32', 'F', 'F', 'F', null, 'F', 'F'), ('159', '3', '33', 'F', 'F', 'F', null, 'F', 'F'), ('160', '3', '34', 'F', 'F', 'F', null, 'F', 'F'), ('161', '3', '35', 'F', 'F', 'F', null, 'F', 'F'), ('162', '3', '36', 'F', 'F', 'F', null, 'F', 'T'), ('163', '3', '37', 'F', 'F', 'F', null, 'F', 'F'), ('164', '3', '38', 'F', 'F', 'F', null, 'F', 'F'), ('165', '3', '39', 'F', 'F', 'F', null, 'F', 'F'), ('166', '3', '40', 'F', 'F', 'F', null, 'F', 'F'), ('190', '4', '1', 'F', 'F', 'F', null, 'F', 'T'), ('191', '4', '2', 'F', 'F', 'F', null, 'F', 'F'), ('192', '4', '3', 'F', 'F', 'F', null, 'F', 'F'), ('193', '4', '4', 'F', 'F', 'F', null, 'F', 'F'), ('194', '4', '5', 'F', 'F', 'F', null, 'F', 'F'), ('195', '4', '6', 'F', 'F', 'F', null, 'F', 'F'), ('196', '4', '7', 'F', 'F', 'F', null, 'F', 'F'), ('197', '4', '8', 'F', 'F', 'F', null, 'F', 'F'), ('198', '4', '9', 'F', 'F', 'F', null, 'F', 'F'), ('199', '4', '10', 'F', 'F', 'F', null, 'F', 'F'), ('200', '4', '11', 'F', 'F', 'F', null, 'F', 'F'), ('201', '4', '12', 'F', 'F', 'F', null, 'F', 'F'), ('202', '4', '13', 'F', 'F', 'F', null, 'F', 'F'), ('203', '4', '14', 'F', 'F', 'F', null, 'F', 'F'), ('204', '4', '15', 'F', 'F', 'F', null, 'F', 'F'), ('205', '4', '16', 'F', 'F', 'F', null, 'F', 'F'), ('206', '4', '17', 'F', 'F', 'F', null, 'F', 'F'), ('207', '4', '18', 'F', 'F', 'F', null, 'F', 'T'), ('208', '4', '19', 'F', 'F', 'F', null, 'F', 'T'), ('209', '4', '20', 'F', 'F', 'F', null, 'F', 'T'), ('210', '4', '21', 'F', 'F', 'F', null, 'F', 'F'), ('211', '4', '22', 'F', 'F', 'F', null, 'F', 'F'), ('212', '4', '23', 'F', 'F', 'F', null, 'F', 'F'), ('213', '4', '24', 'F', 'F', 'F', null, 'F', 'F'), ('214', '4', '25', 'F', 'F', 'F', null, 'F', 'F'), ('215', '4', '26', 'F', 'F', 'F', null, 'F', 'F'), ('216', '4', '27', 'F', 'F', 'F', null, 'F', 'F'), ('217', '4', '28', 'F', 'F', 'F', null, 'F', 'F'), ('218', '4', '29', 'F', 'F', 'F', null, 'F', 'F'), ('219', '4', '30', 'F', 'F', 'F', null, 'F', 'F'), ('220', '4', '31', 'F', 'F', 'F', null, 'F', 'F'), ('221', '4', '32', 'F', 'F', 'F', null, 'F', 'F'), ('222', '4', '33', 'F', 'F', 'F', null, 'F', 'F'), ('223', '4', '34', 'F', 'F', 'F', null, 'F', 'F'), ('224', '4', '35', 'F', 'F', 'F', null, 'F', 'F'), ('225', '4', '36', 'F', 'F', 'F', null, 'F', 'F'), ('226', '4', '37', 'F', 'F', 'F', null, 'F', 'F'), ('227', '4', '38', 'F', 'F', 'F', null, 'F', 'F'), ('228', '4', '39', 'F', 'F', 'F', null, 'F', 'F'), ('229', '4', '40', 'F', 'F', 'F', null, 'F', 'F'), ('253', '5', '1', 'F', 'F', 'F', null, 'F', 'T'), ('254', '5', '2', 'F', 'F', 'F', null, 'F', 'F'), ('255', '5', '3', 'F', 'F', 'F', null, 'F', 'F'), ('256', '5', '4', 'F', 'F', 'F', null, 'F', 'F'), ('257', '5', '5', 'F', 'F', 'F', null, 'F', 'F'), ('258', '5', '6', 'F', 'F', 'F', null, 'F', 'T'), ('259', '5', '7', 'F', 'F', 'F', null, 'F', 'T'), ('260', '5', '8', 'F', 'F', 'F', null, 'F', 'T'), ('261', '5', '9', 'F', 'F', 'F', null, 'F', 'T'), ('262', '5', '10', 'F', 'F', 'F', null, 'F', 'T'), ('263', '5', '11', 'F', 'F', 'F', null, 'F', 'F'), ('264', '5', '12', 'F', 'F', 'F', null, 'F', 'T'), ('265', '5', '13', 'F', 'F', 'F', null, 'F', 'T'), ('266', '5', '14', 'F', 'F', 'F', null, 'F', 'F'), ('267', '5', '15', 'F', 'F', 'F', null, 'F', 'F'), ('268', '5', '16', 'F', 'F', 'F', null, 'F', 'F'), ('269', '5', '17', 'F', 'F', 'F', null, 'F', 'F'), ('270', '5', '18', 'F', 'F', 'F', null, 'F', 'F'), ('271', '5', '19', 'F', 'F', 'F', null, 'F', 'F'), ('272', '5', '20', 'F', 'F', 'F', null, 'F', 'F'), ('273', '5', '21', 'F', 'F', 'F', null, 'F', 'F'), ('274', '5', '22', 'F', 'F', 'F', null, 'F', 'F'), ('275', '5', '23', 'F', 'F', 'F', null, 'F', 'F'), ('276', '5', '24', 'F', 'F', 'F', null, 'F', 'F'), ('277', '5', '25', 'F', 'F', 'F', null, 'F', 'F'), ('278', '5', '26', 'F', 'F', 'F', null, 'F', 'F'), ('279', '5', '27', 'F', 'F', 'F', null, 'F', 'F'), ('280', '5', '28', 'F', 'F', 'F', null, 'F', 'F'), ('281', '5', '29', 'F', 'F', 'F', null, 'F', 'F'), ('282', '5', '30', 'F', 'F', 'F', null, 'F', 'F'), ('283', '5', '31', 'F', 'F', 'F', null, 'F', 'F'), ('284', '5', '32', 'F', 'F', 'F', null, 'F', 'F'), ('285', '5', '33', 'F', 'F', 'F', null, 'F', 'F'), ('286', '5', '34', 'F', 'F', 'F', null, 'F', 'F'), ('287', '5', '35', 'F', 'F', 'F', null, 'F', 'F'), ('288', '5', '36', 'F', 'F', 'F', null, 'F', 'F'), ('289', '5', '37', 'F', 'F', 'F', null, 'F', 'F'), ('290', '5', '38', 'F', 'F', 'F', null, 'F', 'F'), ('291', '5', '39', 'F', 'F', 'F', null, 'F', 'F'), ('292', '5', '40', 'F', 'F', 'F', null, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES ('316', '6', '1', 'F', 'F', 'F', null, 'F', 'T'), ('317', '6', '2', 'F', 'F', 'F', null, 'F', 'F'), ('318', '6', '3', 'F', 'F', 'F', null, 'F', 'F'), ('319', '6', '4', 'F', 'F', 'F', null, 'F', 'F'), ('320', '6', '5', 'F', 'F', 'F', null, 'F', 'F'), ('321', '6', '6', 'F', 'F', 'F', null, 'F', 'T'), ('322', '6', '7', 'F', 'F', 'F', null, 'F', 'T'), ('323', '6', '8', 'F', 'F', 'F', null, 'F', 'T'), ('324', '6', '9', 'F', 'F', 'F', null, 'F', 'T'), ('325', '6', '10', 'F', 'F', 'F', null, 'F', 'F'), ('326', '6', '11', 'F', 'F', 'F', null, 'F', 'F'), ('327', '6', '12', 'F', 'F', 'F', null, 'F', 'F'), ('328', '6', '13', 'F', 'F', 'F', null, 'F', 'T'), ('329', '6', '14', 'F', 'F', 'F', null, 'F', 'F'), ('330', '6', '15', 'F', 'F', 'F', null, 'F', 'F'), ('331', '6', '16', 'F', 'F', 'F', null, 'F', 'F'), ('332', '6', '17', 'F', 'F', 'F', null, 'F', 'F'), ('333', '6', '18', 'F', 'F', 'F', null, 'F', 'F'), ('334', '6', '19', 'F', 'F', 'F', null, 'F', 'F'), ('335', '6', '20', 'F', 'F', 'F', null, 'F', 'F'), ('336', '6', '21', 'F', 'F', 'F', null, 'F', 'F'), ('337', '6', '22', 'F', 'F', 'F', null, 'F', 'F'), ('338', '6', '23', 'F', 'F', 'F', null, 'F', 'F'), ('339', '6', '24', 'F', 'F', 'F', null, 'F', 'F'), ('340', '6', '25', 'F', 'F', 'F', null, 'F', 'F'), ('341', '6', '26', 'F', 'F', 'F', null, 'F', 'F'), ('342', '6', '27', 'F', 'F', 'F', null, 'F', 'F'), ('343', '6', '28', 'F', 'F', 'F', null, 'F', 'F'), ('344', '6', '29', 'F', 'F', 'F', null, 'F', 'F'), ('345', '6', '30', 'F', 'F', 'F', null, 'F', 'F'), ('346', '6', '31', 'F', 'F', 'F', null, 'F', 'F'), ('347', '6', '32', 'F', 'F', 'F', null, 'F', 'F'), ('348', '6', '33', 'F', 'F', 'F', null, 'F', 'F'), ('349', '6', '34', 'F', 'F', 'F', null, 'F', 'F'), ('350', '6', '35', 'F', 'F', 'F', null, 'F', 'F'), ('351', '6', '36', 'F', 'F', 'F', null, 'F', 'F'), ('352', '6', '37', 'F', 'F', 'F', null, 'F', 'F'), ('353', '6', '38', 'F', 'F', 'F', null, 'F', 'F'), ('354', '6', '39', 'F', 'F', 'F', null, 'F', 'F'), ('355', '6', '40', 'F', 'F', 'F', null, 'F', 'F'), ('379', '7', '1', 'F', 'F', 'F', null, 'F', 'T'), ('380', '7', '2', 'F', 'F', 'F', null, 'F', 'F'), ('381', '7', '3', 'F', 'F', 'F', null, 'F', 'F'), ('382', '7', '4', 'F', 'F', 'F', null, 'F', 'F'), ('383', '7', '5', 'F', 'F', 'F', null, 'F', 'F'), ('384', '7', '6', 'F', 'F', 'F', null, 'F', 'T'), ('385', '7', '7', 'F', 'F', 'F', null, 'F', 'T'), ('386', '7', '8', 'F', 'F', 'F', null, 'F', 'F'), ('387', '7', '9', 'F', 'F', 'F', null, 'F', 'F'), ('388', '7', '10', 'F', 'F', 'F', null, 'F', 'F'), ('389', '7', '11', 'F', 'F', 'F', null, 'F', 'F'), ('390', '7', '12', 'F', 'F', 'F', null, 'F', 'F'), ('391', '7', '13', 'F', 'F', 'F', null, 'F', 'T'), ('392', '7', '14', 'F', 'F', 'F', null, 'F', 'F'), ('393', '7', '15', 'F', 'F', 'F', null, 'F', 'F'), ('394', '7', '16', 'F', 'F', 'F', null, 'F', 'F'), ('395', '7', '17', 'F', 'F', 'F', null, 'F', 'F'), ('396', '7', '18', 'F', 'F', 'F', null, 'F', 'F'), ('397', '7', '19', 'F', 'F', 'F', null, 'F', 'F'), ('398', '7', '20', 'F', 'F', 'F', null, 'F', 'F'), ('399', '7', '21', 'F', 'F', 'F', null, 'F', 'F'), ('400', '7', '22', 'F', 'F', 'F', null, 'F', 'F'), ('401', '7', '23', 'F', 'F', 'F', null, 'F', 'F'), ('402', '7', '24', 'F', 'F', 'F', null, 'F', 'F'), ('403', '7', '25', 'F', 'F', 'F', null, 'F', 'F'), ('404', '7', '26', 'F', 'F', 'F', null, 'F', 'F'), ('405', '7', '27', 'F', 'F', 'F', null, 'F', 'F'), ('406', '7', '28', 'F', 'F', 'F', null, 'F', 'F'), ('407', '7', '29', 'F', 'F', 'F', null, 'F', 'F'), ('408', '7', '30', 'F', 'F', 'F', null, 'F', 'F'), ('409', '7', '31', 'F', 'F', 'F', null, 'F', 'F'), ('410', '7', '32', 'F', 'F', 'F', null, 'F', 'F'), ('411', '7', '33', 'F', 'F', 'F', null, 'F', 'F'), ('412', '7', '34', 'F', 'F', 'F', null, 'F', 'F'), ('413', '7', '35', 'F', 'F', 'F', null, 'F', 'F'), ('414', '7', '36', 'F', 'F', 'F', null, 'F', 'F'), ('415', '7', '37', 'F', 'F', 'F', null, 'F', 'F'), ('416', '7', '38', 'F', 'F', 'F', null, 'F', 'F'), ('417', '7', '39', 'F', 'F', 'F', null, 'F', 'F'), ('418', '7', '40', 'F', 'F', 'F', null, 'F', 'F'), ('442', '8', '1', 'F', 'F', 'F', null, 'F', 'T'), ('443', '8', '2', 'F', 'F', 'F', null, 'F', 'F'), ('444', '8', '3', 'F', 'F', 'F', null, 'F', 'F'), ('445', '8', '4', 'F', 'F', 'F', null, 'F', 'F'), ('446', '8', '5', 'F', 'F', 'F', null, 'F', 'F'), ('447', '8', '6', 'F', 'F', 'F', null, 'F', 'F'), ('448', '8', '7', 'F', 'F', 'F', null, 'F', 'F'), ('449', '8', '8', 'F', 'F', 'F', null, 'F', 'F'), ('450', '8', '9', 'F', 'F', 'F', null, 'F', 'F'), ('451', '8', '10', 'F', 'F', 'F', null, 'F', 'F'), ('452', '8', '11', 'F', 'F', 'F', null, 'F', 'F'), ('453', '8', '12', 'F', 'F', 'F', null, 'F', 'F'), ('454', '8', '13', 'F', 'F', 'F', null, 'F', 'F'), ('455', '8', '14', 'F', 'F', 'F', null, 'F', 'T'), ('456', '8', '15', 'F', 'F', 'F', null, 'F', 'T'), ('457', '8', '16', 'F', 'F', 'F', null, 'F', 'T'), ('458', '8', '17', 'F', 'F', 'F', null, 'F', 'T'), ('459', '8', '18', 'F', 'F', 'F', null, 'F', 'F'), ('460', '8', '19', 'F', 'F', 'F', null, 'F', 'F'), ('461', '8', '20', 'F', 'F', 'F', null, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES ('462', '8', '21', 'F', 'F', 'F', null, 'F', 'F'), ('463', '8', '22', 'F', 'F', 'F', null, 'F', 'F'), ('464', '8', '23', 'F', 'F', 'F', null, 'F', 'F'), ('465', '8', '24', 'F', 'F', 'F', null, 'F', 'F'), ('466', '8', '25', 'F', 'F', 'F', null, 'F', 'F'), ('467', '8', '26', 'F', 'F', 'F', null, 'F', 'F'), ('468', '8', '27', 'F', 'F', 'F', null, 'F', 'F'), ('469', '8', '28', 'F', 'F', 'F', null, 'F', 'F'), ('470', '8', '29', 'F', 'F', 'F', null, 'F', 'F'), ('471', '8', '30', 'F', 'F', 'F', null, 'F', 'F'), ('472', '8', '31', 'F', 'F', 'F', null, 'F', 'F'), ('473', '8', '32', 'F', 'F', 'F', null, 'F', 'F'), ('474', '8', '33', 'F', 'F', 'F', null, 'F', 'F'), ('475', '8', '34', 'F', 'F', 'F', null, 'F', 'F'), ('476', '8', '35', 'F', 'F', 'F', null, 'F', 'F'), ('477', '8', '36', 'F', 'F', 'F', null, 'F', 'F'), ('478', '8', '37', 'F', 'F', 'F', null, 'F', 'F'), ('479', '8', '38', 'F', 'F', 'F', null, 'F', 'F'), ('480', '8', '39', 'F', 'F', 'F', null, 'F', 'F'), ('481', '8', '40', 'F', 'F', 'F', null, 'F', 'F'), ('505', '9', '1', 'F', 'F', 'F', null, 'F', 'T'), ('506', '9', '2', 'F', 'F', 'F', null, 'F', 'F'), ('507', '9', '3', 'F', 'F', 'F', null, 'F', 'F'), ('508', '9', '4', 'F', 'F', 'F', null, 'F', 'F'), ('509', '9', '5', 'F', 'F', 'F', null, 'F', 'F'), ('510', '9', '6', 'F', 'F', 'F', null, 'F', 'F'), ('511', '9', '7', 'F', 'F', 'F', null, 'F', 'F'), ('512', '9', '8', 'F', 'F', 'F', null, 'F', 'F'), ('513', '9', '9', 'F', 'F', 'F', null, 'F', 'F'), ('514', '9', '10', 'F', 'F', 'F', null, 'F', 'F'), ('515', '9', '11', 'F', 'F', 'F', null, 'F', 'F'), ('516', '9', '12', 'F', 'F', 'F', null, 'F', 'F'), ('517', '9', '13', 'F', 'F', 'F', null, 'F', 'F'), ('518', '9', '14', 'F', 'F', 'F', null, 'F', 'F'), ('519', '9', '15', 'F', 'F', 'F', null, 'F', 'F'), ('520', '9', '16', 'F', 'F', 'F', null, 'F', 'F'), ('521', '9', '17', 'F', 'F', 'F', null, 'F', 'F'), ('522', '9', '18', 'F', 'F', 'F', null, 'F', 'F'), ('523', '9', '19', 'F', 'F', 'F', null, 'F', 'F'), ('524', '9', '20', 'F', 'F', 'F', null, 'F', 'F'), ('525', '9', '21', 'F', 'F', 'F', null, 'F', 'F'), ('526', '9', '22', 'F', 'F', 'F', null, 'F', 'F'), ('527', '9', '23', 'F', 'F', 'F', null, 'F', 'F'), ('528', '9', '24', 'F', 'F', 'F', null, 'F', 'F'), ('529', '9', '25', 'F', 'F', 'F', null, 'F', 'F'), ('530', '9', '26', 'F', 'F', 'F', null, 'F', 'F'), ('531', '9', '27', 'F', 'F', 'F', null, 'F', 'F'), ('532', '9', '28', 'F', 'F', 'F', null, 'F', 'F'), ('533', '9', '29', 'F', 'F', 'F', null, 'F', 'F'), ('534', '9', '30', 'F', 'F', 'F', null, 'F', 'F'), ('535', '9', '31', 'F', 'F', 'F', null, 'F', 'F'), ('536', '9', '32', 'F', 'F', 'F', null, 'F', 'F'), ('537', '9', '33', 'F', 'F', 'F', null, 'F', 'F'), ('538', '9', '34', 'F', 'F', 'F', null, 'F', 'F'), ('539', '9', '35', 'F', 'F', 'F', null, 'F', 'F'), ('540', '9', '36', 'F', 'F', 'F', null, 'F', 'F'), ('541', '9', '37', 'F', 'F', 'F', null, 'F', 'F'), ('542', '9', '38', 'F', 'F', 'F', null, 'F', 'F'), ('543', '9', '39', 'F', 'F', 'F', null, 'F', 'F'), ('544', '9', '40', 'F', 'F', 'F', null, 'F', 'F'), ('568', '1', '42', 'F', 'F', 'F', null, 'F', 'F'), ('569', '2', '42', 'F', 'F', 'F', null, 'F', 'F'), ('570', '3', '42', 'F', 'F', 'F', null, 'F', 'F'), ('571', '4', '42', 'F', 'F', 'F', null, 'F', 'F'), ('572', '5', '42', 'F', 'F', 'F', null, 'F', 'F'), ('573', '6', '42', 'F', 'F', 'F', null, 'F', 'F'), ('574', '7', '42', 'F', 'F', 'F', null, 'F', 'F'), ('575', '8', '42', 'F', 'F', 'F', null, 'F', 'F'), ('576', '9', '42', 'F', 'F', 'F', null, 'F', 'T'), ('583', '1', '43', 'F', 'F', 'F', null, 'F', 'F'), ('584', '2', '43', 'F', 'F', 'F', null, 'F', 'F'), ('585', '3', '43', 'F', 'F', 'F', null, 'F', 'F'), ('586', '4', '43', 'F', 'F', 'F', null, 'F', 'F'), ('587', '5', '43', 'F', 'F', 'F', null, 'F', 'F'), ('588', '6', '43', 'F', 'F', 'F', null, 'F', 'F'), ('589', '7', '43', 'F', 'F', 'F', null, 'F', 'F'), ('590', '8', '43', 'F', 'F', 'F', null, 'F', 'F'), ('591', '9', '43', 'F', 'F', 'F', null, 'F', 'T'), ('661', '1', '44', 'F', 'F', 'F', null, 'F', 'F'), ('662', '2', '44', 'F', 'F', 'F', null, 'F', 'F'), ('663', '3', '44', 'F', 'F', 'F', null, 'F', 'F'), ('664', '4', '44', 'F', 'F', 'F', null, 'F', 'F'), ('665', '5', '44', 'F', 'F', 'F', null, 'F', 'T'), ('666', '6', '44', 'F', 'F', 'F', null, 'F', 'T'), ('667', '7', '44', 'F', 'F', 'F', null, 'F', 'T'), ('668', '8', '44', 'F', 'F', 'F', null, 'F', null), ('669', '9', '44', 'F', 'F', 'F', null, 'F', 'F'), ('676', '1', '45', 'F', 'F', 'F', null, 'F', 'T'), ('677', '2', '45', 'F', 'F', 'F', null, 'F', 'F'), ('678', '3', '45', 'F', 'F', 'F', null, 'F', 'F'), ('679', '4', '45', 'F', 'F', 'F', null, 'F', 'F'), ('680', '5', '45', 'F', 'F', 'F', null, 'F', 'F'), ('681', '6', '45', 'F', 'F', 'F', null, 'F', 'F'), ('682', '7', '45', 'F', 'F', 'F', null, 'F', 'F'), ('683', '8', '45', 'F', 'F', 'F', null, 'F', null), ('684', '9', '45', 'F', 'F', 'F', null, 'F', 'F'), ('691', '1', '46', 'F', 'F', 'F', null, 'F', 'T'), ('692', '2', '46', 'F', 'F', 'F', null, 'F', 'F'), ('693', '3', '46', 'F', 'F', 'F', null, 'F', 'F'), ('694', '4', '46', 'F', 'F', 'F', null, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES ('695', '5', '46', 'F', 'F', 'F', null, 'F', 'F'), ('696', '6', '46', 'F', 'F', 'F', null, 'F', 'F'), ('697', '7', '46', 'F', 'F', 'F', null, 'F', 'F'), ('698', '8', '46', 'F', 'F', 'F', null, 'F', null), ('699', '9', '46', 'F', 'F', 'F', null, 'F', 'F'), ('706', '1', '47', 'F', 'F', 'F', null, 'F', 'T'), ('707', '2', '47', 'F', 'F', 'F', null, 'F', 'F'), ('708', '3', '47', 'F', 'F', 'F', null, 'F', 'F'), ('709', '4', '47', 'F', 'F', 'F', null, 'F', 'F'), ('710', '5', '47', 'F', 'F', 'F', null, 'F', 'F'), ('711', '6', '47', 'F', 'F', 'F', null, 'F', 'F'), ('712', '7', '47', 'F', 'F', 'F', null, 'F', 'F'), ('713', '8', '47', 'F', 'F', 'F', null, 'F', null), ('714', '9', '47', 'F', 'F', 'F', null, 'F', 'F'), ('721', '1', '48', 'F', 'F', 'F', null, 'F', 'T'), ('722', '2', '48', 'F', 'F', 'F', null, 'F', 'F'), ('723', '3', '48', 'F', 'F', 'F', null, 'F', 'F'), ('724', '4', '48', 'F', 'F', 'F', null, 'F', 'F'), ('725', '5', '48', 'F', 'F', 'F', null, 'F', 'F'), ('726', '6', '48', 'F', 'F', 'F', null, 'F', 'F'), ('727', '7', '48', 'F', 'F', 'F', null, 'F', 'F'), ('728', '8', '48', 'F', 'F', 'F', null, 'F', null), ('729', '9', '48', 'F', 'F', 'F', null, 'F', 'F'), ('736', '1', '49', 'F', 'F', 'F', null, 'F', 'T'), ('737', '2', '49', 'F', 'F', 'F', null, 'F', 'F'), ('738', '3', '49', 'F', 'F', 'F', null, 'F', 'F'), ('739', '4', '49', 'F', 'F', 'F', null, 'F', 'F'), ('740', '5', '49', 'F', 'F', 'F', null, 'F', 'F'), ('741', '6', '49', 'F', 'F', 'F', null, 'F', 'F'), ('742', '7', '49', 'F', 'F', 'F', null, 'F', 'F'), ('743', '8', '49', 'F', 'F', 'F', null, 'F', null), ('744', '9', '49', 'F', 'F', 'F', null, 'F', 'F'), ('751', '1', '50', 'F', 'F', 'F', null, 'F', 'T'), ('752', '2', '50', 'F', 'F', 'F', null, 'F', 'F'), ('753', '3', '50', 'F', 'F', 'F', null, 'F', 'F'), ('754', '4', '50', 'F', 'F', 'F', null, 'F', 'F'), ('755', '5', '50', 'F', 'F', 'F', null, 'F', 'F'), ('756', '6', '50', 'F', 'F', 'F', null, 'F', 'F'), ('757', '7', '50', 'F', 'F', 'F', null, 'F', 'F'), ('758', '8', '50', 'F', 'F', 'F', null, 'F', null), ('759', '9', '50', 'F', 'F', 'F', null, 'F', 'F'), ('766', '1', '51', 'F', 'F', 'F', null, 'F', 'T'), ('767', '2', '51', 'F', 'F', 'F', null, 'F', 'F'), ('768', '3', '51', 'F', 'F', 'F', null, 'F', 'F'), ('769', '4', '51', 'F', 'F', 'F', null, 'F', 'F'), ('770', '5', '51', 'F', 'F', 'F', null, 'F', 'F'), ('771', '6', '51', 'F', 'F', 'F', null, 'F', 'F'), ('772', '7', '51', 'F', 'F', 'F', null, 'F', 'F'), ('773', '8', '51', 'F', 'F', 'F', null, 'F', null), ('774', '9', '51', 'F', 'F', 'F', null, 'F', 'F'), ('781', '1', '52', 'F', 'F', 'F', null, 'F', 'T'), ('782', '2', '52', 'F', 'F', 'F', null, 'F', 'F'), ('783', '3', '52', 'F', 'F', 'F', null, 'F', 'F'), ('784', '4', '52', 'F', 'F', 'F', null, 'F', 'F'), ('785', '5', '52', 'F', 'F', 'F', null, 'F', 'F'), ('786', '6', '52', 'F', 'F', 'F', null, 'F', 'F'), ('787', '7', '52', 'F', 'F', 'F', null, 'F', 'F'), ('788', '8', '52', 'F', 'F', 'F', null, 'F', null), ('789', '9', '52', 'F', 'F', 'F', null, 'F', 'F'), ('796', '1', '53', 'F', 'F', 'F', null, 'F', 'T'), ('797', '2', '53', 'F', 'F', 'F', null, 'F', 'F'), ('798', '3', '53', 'F', 'F', 'F', null, 'F', 'F'), ('799', '4', '53', 'F', 'F', 'F', null, 'F', 'F'), ('800', '5', '53', 'F', 'F', 'F', null, 'F', 'F'), ('801', '6', '53', 'F', 'F', 'F', null, 'F', 'F'), ('802', '7', '53', 'F', 'F', 'F', null, 'F', 'F'), ('803', '8', '53', 'F', 'F', 'F', null, 'F', null), ('804', '9', '53', 'F', 'F', 'F', null, 'F', 'F'), ('811', '1', '54', 'F', 'F', 'F', null, 'F', 'T'), ('812', '2', '54', 'F', 'F', 'F', null, 'F', 'F'), ('813', '3', '54', 'F', 'F', 'F', null, 'F', 'F'), ('814', '4', '54', 'F', 'F', 'F', null, 'F', 'F'), ('815', '5', '54', 'F', 'F', 'F', null, 'F', 'F'), ('816', '6', '54', 'F', 'F', 'F', null, 'F', 'F'), ('817', '7', '54', 'F', 'F', 'F', null, 'F', 'F'), ('818', '8', '54', 'F', 'F', 'F', null, 'F', null), ('819', '9', '54', 'F', 'F', 'F', null, 'F', 'F'), ('826', '1', '55', 'F', 'F', 'F', null, 'F', 'T'), ('827', '2', '55', 'F', 'F', 'F', null, 'F', 'F'), ('828', '3', '55', 'F', 'F', 'F', null, 'F', 'F'), ('829', '4', '55', 'F', 'F', 'F', null, 'F', 'F'), ('830', '5', '55', 'F', 'F', 'F', null, 'F', 'F'), ('831', '6', '55', 'F', 'F', 'F', null, 'F', 'F'), ('832', '7', '55', 'F', 'F', 'F', null, 'F', 'F'), ('833', '8', '55', 'F', 'F', 'F', null, 'F', null), ('834', '9', '55', 'F', 'F', 'F', null, 'F', 'F'), ('841', '1', '56', 'F', 'F', 'F', null, 'F', 'T'), ('842', '2', '56', 'F', 'F', 'F', null, 'F', 'F'), ('843', '3', '56', 'F', 'F', 'F', null, 'F', 'F'), ('844', '4', '56', 'F', 'F', 'F', null, 'F', 'F'), ('845', '5', '56', 'F', 'F', 'F', null, 'F', 'F'), ('846', '6', '56', 'F', 'F', 'F', null, 'F', 'F'), ('847', '7', '56', 'F', 'F', 'F', null, 'F', 'F'), ('848', '8', '56', 'F', 'F', 'F', null, 'F', null), ('849', '9', '56', 'F', 'F', 'F', null, 'F', 'F'), ('856', '1', '57', 'F', 'F', 'F', null, 'F', 'T'), ('857', '2', '57', 'F', 'F', 'F', null, 'F', 'F'), ('858', '3', '57', 'F', 'F', 'F', null, 'F', 'F'), ('859', '4', '57', 'F', 'F', 'F', null, 'F', 'F'), ('860', '5', '57', 'F', 'F', 'F', null, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES ('861', '6', '57', 'F', 'F', 'F', null, 'F', 'F'), ('862', '7', '57', 'F', 'F', 'F', null, 'F', 'F'), ('863', '8', '57', 'F', 'F', 'F', null, 'F', null), ('864', '9', '57', 'F', 'F', 'F', null, 'F', 'F'), ('871', '1', '58', 'F', 'F', 'F', null, 'F', 'T'), ('872', '2', '58', 'F', 'F', 'F', null, 'F', 'F'), ('873', '3', '58', 'F', 'F', 'F', null, 'F', 'F'), ('874', '4', '58', 'F', 'F', 'F', null, 'F', 'F'), ('875', '5', '58', 'F', 'F', 'F', null, 'F', 'F'), ('876', '6', '58', 'F', 'F', 'F', null, 'F', 'F'), ('877', '7', '58', 'F', 'F', 'F', null, 'F', 'F'), ('878', '8', '58', 'F', 'F', 'F', null, 'F', null), ('879', '9', '58', 'F', 'F', 'F', null, 'F', 'F'), ('886', '1', '59', 'F', 'F', 'F', null, 'F', 'F'), ('887', '2', '59', 'F', 'F', 'F', null, 'F', 'F'), ('888', '3', '59', 'F', 'F', 'F', null, 'F', 'F'), ('889', '4', '59', 'F', 'F', 'F', null, 'F', null), ('890', '5', '59', 'F', 'F', 'F', null, 'F', 'T'), ('891', '6', '59', 'F', 'F', 'F', null, 'F', 'F'), ('892', '7', '59', 'F', 'F', 'F', null, 'F', 'F'), ('893', '8', '59', 'F', 'F', 'F', null, 'F', null), ('894', '9', '59', 'F', 'F', 'F', null, 'F', 'F'), ('901', '1', '60', 'F', 'F', 'F', null, 'F', 'T'), ('902', '2', '60', 'F', 'F', 'F', null, 'F', 'F'), ('903', '3', '60', 'F', 'F', 'F', null, 'F', 'F'), ('904', '4', '60', 'F', 'F', 'F', null, 'F', null), ('905', '5', '60', 'F', 'F', 'F', null, 'F', 'F'), ('906', '6', '60', 'F', 'F', 'F', null, 'F', 'F'), ('907', '7', '60', 'F', 'F', 'F', null, 'F', 'F'), ('908', '8', '60', 'F', 'F', 'F', null, 'F', null), ('909', '9', '60', 'F', 'F', 'F', null, 'F', 'F'), ('916', '1', '61', 'F', 'F', 'F', null, 'F', 'T'), ('917', '2', '61', 'F', 'F', 'F', null, 'F', 'F'), ('918', '3', '61', 'F', 'F', 'F', null, 'F', 'F'), ('919', '4', '61', 'F', 'F', 'F', null, 'F', null), ('920', '5', '61', 'F', 'F', 'F', null, 'F', 'F'), ('921', '6', '61', 'F', 'F', 'F', null, 'F', 'F'), ('922', '7', '61', 'F', 'F', 'F', null, 'F', 'F'), ('923', '8', '61', 'F', 'F', 'F', null, 'F', null), ('924', '9', '61', 'F', 'F', 'F', null, 'F', 'F'), ('931', '1', '62', 'F', 'F', 'F', null, 'F', 'T'), ('932', '2', '62', 'F', 'F', 'F', null, 'F', 'F'), ('933', '3', '62', 'F', 'F', 'F', null, 'F', 'F'), ('934', '4', '62', 'F', 'F', 'F', null, 'F', null), ('935', '5', '62', 'F', 'F', 'F', null, 'F', 'F'), ('936', '6', '62', 'F', 'F', 'F', null, 'F', 'F'), ('937', '7', '62', 'F', 'F', 'F', null, 'F', 'F'), ('938', '8', '62', 'F', 'F', 'F', null, 'F', null), ('939', '9', '62', 'F', 'F', 'F', null, 'F', 'F'), ('940', '10', '-33', 'F', 'F', 'F', null, 'F', null), ('941', '10', '1', 'F', 'F', 'F', null, 'F', null), ('942', '10', '2', 'F', 'F', 'F', null, 'F', null), ('943', '10', '3', 'F', 'F', 'F', null, 'F', null), ('944', '10', '4', 'F', 'F', 'F', null, 'F', null), ('945', '10', '5', 'F', 'F', 'F', null, 'F', null), ('946', '10', '6', 'F', 'F', 'F', null, 'F', null), ('947', '10', '7', 'F', 'F', 'F', null, 'F', null), ('948', '10', '8', 'F', 'F', 'F', null, 'F', null), ('949', '10', '9', 'F', 'F', 'F', null, 'F', null), ('950', '10', '10', 'F', 'F', 'F', null, 'F', null), ('951', '10', '11', 'F', 'F', 'F', null, 'F', null), ('952', '10', '12', 'F', 'F', 'F', null, 'F', null), ('953', '10', '13', 'F', 'F', 'F', null, 'F', null), ('954', '10', '14', 'F', 'F', 'F', null, 'F', null), ('955', '10', '15', 'F', 'F', 'F', null, 'F', null), ('956', '10', '16', 'F', 'F', 'F', null, 'F', null), ('957', '10', '17', 'F', 'F', 'F', null, 'F', null), ('958', '10', '18', 'F', 'F', 'F', null, 'F', null), ('959', '10', '19', 'F', 'F', 'F', null, 'F', null), ('960', '10', '20', 'F', 'F', 'F', null, 'F', null), ('961', '10', '21', 'F', 'F', 'F', null, 'F', null), ('962', '10', '22', 'F', 'F', 'F', null, 'F', null), ('963', '10', '23', 'F', 'F', 'F', null, 'F', null), ('964', '10', '24', 'F', 'F', 'F', null, 'F', null), ('965', '10', '25', 'F', 'F', 'F', null, 'F', null), ('966', '10', '26', 'F', 'F', 'F', null, 'F', null), ('967', '10', '27', 'F', 'F', 'F', null, 'F', null), ('968', '10', '28', 'F', 'F', 'F', null, 'F', null), ('969', '10', '29', 'F', 'F', 'F', null, 'F', null), ('970', '10', '30', 'F', 'F', 'F', null, 'F', null), ('971', '10', '31', 'F', 'F', 'F', null, 'F', null), ('972', '10', '32', 'F', 'F', 'F', null, 'F', null), ('973', '10', '34', 'F', 'F', 'F', null, 'F', null), ('974', '10', '35', 'F', 'F', 'F', null, 'F', null), ('975', '10', '36', 'F', 'F', 'F', null, 'F', null), ('976', '10', '37', 'F', 'F', 'F', null, 'F', null), ('977', '10', '38', 'F', 'F', 'F', null, 'F', null), ('978', '10', '39', 'F', 'F', 'F', null, 'F', null), ('979', '10', '40', 'F', 'F', 'F', null, 'F', null), ('981', '10', '42', 'F', 'F', 'F', null, 'F', null), ('982', '10', '43', 'F', 'F', 'F', null, 'F', null), ('983', '10', '44', 'F', 'F', 'F', null, 'F', null), ('984', '10', '45', 'F', 'F', 'F', null, 'F', null), ('985', '10', '46', 'F', 'F', 'F', null, 'F', null), ('986', '10', '47', 'F', 'F', 'F', null, 'F', null), ('987', '10', '48', 'F', 'F', 'F', null, 'F', null), ('988', '10', '49', 'F', 'F', 'F', null, 'F', null), ('989', '10', '50', 'F', 'F', 'F', null, 'F', null), ('990', '10', '51', 'F', 'F', 'F', null, 'F', null), ('991', '10', '52', 'F', 'F', 'F', null, 'F', null);
INSERT INTO `tblroleprivilege` VALUES ('992', '10', '53', 'F', 'F', 'F', null, 'F', null), ('993', '10', '54', 'F', 'F', 'F', null, 'F', null), ('994', '10', '55', 'F', 'F', 'F', null, 'F', null), ('995', '10', '56', 'F', 'F', 'F', null, 'F', null), ('996', '10', '57', 'F', 'F', 'F', null, 'F', null), ('997', '10', '58', 'F', 'F', 'F', null, 'F', null), ('998', '10', '59', 'F', 'F', 'F', null, 'F', null), ('999', '10', '60', 'F', 'F', 'F', null, 'F', null), ('1000', '10', '61', 'F', 'F', 'F', null, 'F', null), ('1001', '10', '62', 'F', 'F', 'F', null, 'F', null), ('1066', '12', '-33', 'F', 'F', 'F', null, 'F', 'F'), ('1067', '12', '-7', 'F', 'F', 'F', null, 'F', 'F'), ('1068', '12', '1', 'F', 'F', 'F', null, 'F', 'T'), ('1069', '12', '2', 'F', 'F', 'F', null, 'F', 'F'), ('1070', '12', '3', 'F', 'F', 'F', null, 'F', 'F'), ('1071', '12', '4', 'F', 'F', 'F', null, 'F', 'F'), ('1072', '12', '5', 'F', 'F', 'F', null, 'F', 'F'), ('1073', '12', '6', 'F', 'F', 'F', null, 'F', 'F'), ('1074', '12', '8', 'F', 'F', 'F', null, 'F', 'F'), ('1075', '12', '9', 'F', 'F', 'F', null, 'F', 'F'), ('1076', '12', '10', 'F', 'F', 'F', null, 'F', 'F'), ('1077', '12', '11', 'F', 'F', 'F', null, 'F', 'F'), ('1078', '12', '12', 'F', 'F', 'F', null, 'F', 'F'), ('1079', '12', '13', 'F', 'F', 'F', null, 'F', 'F'), ('1080', '12', '14', 'F', 'F', 'F', null, 'F', 'F'), ('1081', '12', '15', 'F', 'F', 'F', null, 'F', 'F'), ('1082', '12', '16', 'F', 'F', 'F', null, 'F', 'F'), ('1083', '12', '17', 'F', 'F', 'F', null, 'F', 'F'), ('1084', '12', '18', 'F', 'F', 'F', null, 'F', 'F'), ('1085', '12', '19', 'F', 'F', 'F', null, 'F', 'F'), ('1086', '12', '20', 'F', 'F', 'F', null, 'F', 'F'), ('1087', '12', '21', 'F', 'F', 'F', null, 'F', 'F'), ('1088', '12', '22', 'F', 'F', 'F', null, 'F', 'F'), ('1089', '12', '23', 'F', 'F', 'F', null, 'F', 'F'), ('1090', '12', '24', 'F', 'F', 'F', null, 'F', 'F'), ('1091', '12', '25', 'F', 'F', 'F', null, 'F', 'F'), ('1092', '12', '26', 'F', 'F', 'F', null, 'F', 'F'), ('1093', '12', '27', 'F', 'F', 'F', null, 'F', 'F'), ('1094', '12', '28', 'F', 'F', 'F', null, 'F', 'F'), ('1095', '12', '29', 'F', 'F', 'F', null, 'F', 'F'), ('1096', '12', '30', 'F', 'F', 'F', null, 'F', 'F'), ('1097', '12', '31', 'F', 'F', 'F', null, 'F', 'F'), ('1098', '12', '32', 'F', 'F', 'F', null, 'F', 'F'), ('1099', '12', '34', 'F', 'F', 'F', null, 'F', 'F'), ('1100', '12', '35', 'F', 'F', 'F', null, 'F', 'F'), ('1101', '12', '36', 'F', 'F', 'F', null, 'F', 'F'), ('1102', '12', '37', 'F', 'F', 'F', null, 'F', 'F'), ('1103', '12', '38', 'F', 'F', 'F', null, 'F', 'F'), ('1104', '12', '39', 'F', 'F', 'F', null, 'F', 'F'), ('1105', '12', '40', 'F', 'F', 'F', null, 'F', 'F'), ('1107', '12', '42', 'F', 'F', 'F', null, 'F', 'F'), ('1108', '12', '43', 'F', 'F', 'F', null, 'F', 'F'), ('1109', '12', '44', 'F', 'F', 'F', null, 'F', 'F'), ('1110', '12', '45', 'F', 'F', 'F', null, 'F', 'F'), ('1111', '12', '46', 'F', 'F', 'F', null, 'F', 'F'), ('1112', '12', '47', 'F', 'F', 'F', null, 'F', 'F'), ('1113', '12', '48', 'F', 'F', 'F', null, 'F', 'F'), ('1114', '12', '49', 'F', 'F', 'F', null, 'F', 'F'), ('1115', '12', '50', 'F', 'F', 'F', null, 'F', 'F'), ('1116', '12', '51', 'F', 'F', 'F', null, 'F', 'F'), ('1117', '12', '52', 'F', 'F', 'F', null, 'F', 'F'), ('1118', '12', '53', 'F', 'F', 'F', null, 'F', 'F'), ('1119', '12', '54', 'F', 'F', 'F', null, 'F', 'F'), ('1120', '12', '55', 'F', 'F', 'F', null, 'F', 'F'), ('1121', '12', '56', 'F', 'F', 'F', null, 'F', 'F'), ('1122', '12', '57', 'F', 'F', 'F', null, 'F', 'F'), ('1123', '12', '58', 'F', 'F', 'F', null, 'F', 'F'), ('1124', '12', '59', 'F', 'F', 'F', null, 'F', 'F'), ('1125', '12', '60', 'F', 'F', 'F', null, 'F', 'F'), ('1126', '12', '61', 'F', 'F', 'F', null, 'F', 'F'), ('1127', '12', '62', 'F', 'F', 'F', null, 'F', 'F'), ('1129', '1', '63', 'F', 'F', 'F', null, 'F', 'F'), ('1130', '2', '63', 'F', 'F', 'F', null, 'F', 'F'), ('1131', '3', '63', 'F', 'F', 'F', null, 'F', 'F'), ('1132', '4', '63', 'F', 'F', 'F', null, 'F', null), ('1133', '5', '63', 'F', 'F', 'F', null, 'F', null), ('1134', '6', '63', 'F', 'F', 'F', null, 'F', 'F'), ('1135', '7', '63', 'F', 'F', 'F', null, 'F', null), ('1136', '8', '63', 'F', 'F', 'F', null, 'F', null), ('1137', '9', '63', 'F', 'F', 'F', null, 'F', null), ('1138', '10', '63', 'F', 'F', 'F', null, 'F', null), ('1140', '12', '63', 'F', 'F', 'F', null, 'F', 'T'), ('1144', '1', '64', 'F', 'F', 'F', null, 'F', 'T'), ('1145', '2', '64', 'F', 'F', 'F', null, 'F', null), ('1146', '3', '64', 'F', 'F', 'F', null, 'F', 'T'), ('1147', '4', '64', 'F', 'F', 'F', null, 'F', null), ('1148', '5', '64', 'F', 'F', 'F', null, 'F', null), ('1149', '6', '64', 'F', 'F', 'F', null, 'F', null), ('1150', '7', '64', 'F', 'F', 'F', null, 'F', null), ('1151', '8', '64', 'F', 'F', 'F', null, 'F', null), ('1152', '9', '64', 'F', 'F', 'F', null, 'F', null), ('1153', '10', '64', 'F', 'F', 'F', null, 'F', null), ('1155', '12', '64', 'F', 'F', 'F', null, 'F', null), ('1159', '1', '65', 'F', 'F', 'F', null, 'F', 'T'), ('1160', '2', '65', 'F', 'F', 'F', null, 'F', null), ('1161', '3', '65', 'F', 'F', 'F', null, 'F', 'T'), ('1162', '4', '65', 'F', 'F', 'F', null, 'F', null), ('1163', '5', '65', 'F', 'F', 'F', null, 'F', null), ('1164', '6', '65', 'F', 'F', 'F', null, 'F', null), ('1165', '7', '65', 'F', 'F', 'F', null, 'F', null);
INSERT INTO `tblroleprivilege` VALUES ('1166', '8', '65', 'F', 'F', 'F', null, 'F', null), ('1167', '9', '65', 'F', 'F', 'F', null, 'F', null), ('1168', '10', '65', 'F', 'F', 'F', null, 'F', null), ('1170', '12', '65', 'F', 'F', 'F', null, 'F', null), ('1174', '1', '66', 'F', 'F', 'F', null, 'F', 'T'), ('1175', '2', '66', 'F', 'F', 'F', null, 'F', null), ('1176', '3', '66', 'F', 'F', 'F', null, 'F', 'T'), ('1177', '4', '66', 'F', 'F', 'F', null, 'F', null), ('1178', '5', '66', 'F', 'F', 'F', null, 'F', null), ('1179', '6', '66', 'F', 'F', 'F', null, 'F', null), ('1180', '7', '66', 'F', 'F', 'F', null, 'F', null), ('1181', '8', '66', 'F', 'F', 'F', null, 'F', null), ('1182', '9', '66', 'F', 'F', 'F', null, 'F', null), ('1183', '10', '66', 'F', 'F', 'F', null, 'F', null), ('1185', '12', '66', 'F', 'F', 'F', null, 'F', null), ('1189', '1', '67', 'F', 'F', 'F', null, 'F', 'T'), ('1190', '2', '67', 'F', 'F', 'F', null, 'F', null), ('1191', '3', '67', 'F', 'F', 'F', null, 'F', 'T'), ('1192', '4', '67', 'F', 'F', 'F', null, 'F', null), ('1193', '5', '67', 'F', 'F', 'F', null, 'F', null), ('1194', '6', '67', 'F', 'F', 'F', null, 'F', null), ('1195', '7', '67', 'F', 'F', 'F', null, 'F', null), ('1196', '8', '67', 'F', 'F', 'F', null, 'F', null), ('1197', '9', '67', 'F', 'F', 'F', null, 'F', null), ('1198', '10', '67', 'F', 'F', 'F', null, 'F', null), ('1200', '12', '67', 'F', 'F', 'F', null, 'F', null), ('1204', '1', '9', 'F', 'F', 'F', null, 'F', 'T'), ('1205', '1', '10', 'F', 'F', 'F', null, 'F', 'T'), ('1206', '1', '11', 'F', 'F', 'F', null, 'F', 'T'), ('1207', '1', '12', 'F', 'F', 'F', null, 'F', 'T'), ('1208', '1', '13', 'F', 'F', 'F', null, 'F', 'T');
COMMIT;

-- ----------------------------
-- Table structure for tblslider
-- ----------------------------
DROP TABLE IF EXISTS `tblslider`;
CREATE TABLE `tblslider` (
`tblslider_id`  int(6) NOT NULL AUTO_INCREMENT ,
`tblslider_gambar`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblslider_posisix`  int(255) NULL DEFAULT NULL ,
`tblslider_posisiy`  int(255) NULL DEFAULT NULL ,
`tblslider_text`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblslider_animasi`  enum('slotfade-horizontal','slidedown','slideleft','boxfade') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tblslider_status`  enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`tblslider_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=22

;

-- ----------------------------
-- Records of tblslider
-- ----------------------------
BEGIN;
INSERT INTO `tblslider` VALUES ('16', '68a6a13d2531f240a71316ca093e4cee_img_3945.jpg', null, null, '-', null, 'T'), ('17', 'f7193d288009319c4ef889b34b9962ce_img_9422.jpg', null, null, '-', null, 'T'), ('18', 'fea373cbd6d7e3de8ec53a03dac754c6_img_9583.jpg', null, null, '-', null, 'T'), ('20', 'ef434fd86db64b5fa93017318775b563_img_0424.jpg', null, null, 'Outbond', null, 'T'), ('21', 'f1c7b316e66e0c1d326537404a1f2635_IMG_5400.JPG', null, null, 'Penutupan Diklat', null, 'T');
COMMIT;

-- ----------------------------
-- Auto increment value for refjenisizinikm
-- ----------------------------
ALTER TABLE `refjenisizinikm` AUTO_INCREMENT=39;

-- ----------------------------
-- Auto increment value for refloket
-- ----------------------------
ALTER TABLE `refloket` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for refsex
-- ----------------------------
ALTER TABLE `refsex` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for reftingkatpendidikan
-- ----------------------------
ALTER TABLE `reftingkatpendidikan` AUTO_INCREMENT=20003;

-- ----------------------------
-- Auto increment value for tblhasilsurvei
-- ----------------------------
ALTER TABLE `tblhasilsurvei` AUTO_INCREMENT=49;

-- ----------------------------
-- Auto increment value for tblhistugasdalamnegriusulan
-- ----------------------------
ALTER TABLE `tblhistugasdalamnegriusulan` AUTO_INCREMENT=63;

-- ----------------------------
-- Auto increment value for tblizin
-- ----------------------------
ALTER TABLE `tblizin` AUTO_INCREMENT=41;

-- ----------------------------
-- Auto increment value for tblmenu
-- ----------------------------
ALTER TABLE `tblmenu` AUTO_INCREMENT=15;

-- ----------------------------
-- Auto increment value for tblpengguna
-- ----------------------------
ALTER TABLE `tblpengguna` AUTO_INCREMENT=81;

-- ----------------------------
-- Auto increment value for tblpertanyaan
-- ----------------------------
ALTER TABLE `tblpertanyaan` AUTO_INCREMENT=11;

-- ----------------------------
-- Auto increment value for tblrole
-- ----------------------------
ALTER TABLE `tblrole` AUTO_INCREMENT=12;

-- ----------------------------
-- Auto increment value for tblroleprivilege
-- ----------------------------
ALTER TABLE `tblroleprivilege` AUTO_INCREMENT=1209;

-- ----------------------------
-- Auto increment value for tblslider
-- ----------------------------
ALTER TABLE `tblslider` AUTO_INCREMENT=22;
