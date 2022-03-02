-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for kklp
CREATE DATABASE IF NOT EXISTS `kklp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `kklp`;

-- Dumping structure for table kklp.ref_hari
CREATE TABLE IF NOT EXISTS `ref_hari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hari` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kklp.ref_hari: ~5 rows (approximately)
/*!40000 ALTER TABLE `ref_hari` DISABLE KEYS */;
INSERT INTO `ref_hari` (`id`, `hari`) VALUES
	(1, 'Senin'),
	(2, 'Selasa'),
	(3, 'Rabu'),
	(4, 'Kamis'),
	(5, 'Jumat');
/*!40000 ALTER TABLE `ref_hari` ENABLE KEYS */;

-- Dumping structure for table kklp.tb_hari
CREATE TABLE IF NOT EXISTS `tb_hari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pekan` int(11) DEFAULT NULL,
  `id_hari` int(11) DEFAULT NULL,
  `hari` varchar(250) DEFAULT NULL,
  `jam` varchar(250) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_pdf` text DEFAULT NULL,
  `file_gambar` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 Tidak Hadir dan 1 Hadir',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kklp.tb_hari: ~10 rows (approximately)
/*!40000 ALTER TABLE `tb_hari` DISABLE KEYS */;
INSERT INTO `tb_hari` (`id`, `id_pekan`, `id_hari`, `hari`, `jam`, `tgl`, `deskripsi`, `file_pdf`, `file_gambar`, `status`) VALUES
	(22, 10, 1, 'Senin', '07.30 - 16.00', NULL, NULL, NULL, NULL, 0),
	(23, 10, 2, 'Selasa', '07.30 - 16.00', NULL, NULL, NULL, NULL, 0),
	(24, 10, 3, 'Rabu', '07.30 - 16.00', NULL, NULL, NULL, NULL, 0),
	(25, 10, 4, 'Kamis', '07.30 - 16.00', NULL, NULL, NULL, NULL, 0),
	(26, 10, 5, 'Jumat', '07.30 - 16.00', NULL, NULL, NULL, NULL, 0),
	(29, 11, 1, 'Senin', '07.30 - 16.00', NULL, NULL, NULL, NULL, 0),
	(30, 11, 2, 'Selasa', '07.30 - 16.00', NULL, NULL, NULL, NULL, 0),
	(31, 11, 3, 'Rabu', '07.30 - 16.00', NULL, NULL, NULL, NULL, 0),
	(32, 11, 4, 'Kamis', '07.30 - 16.00', NULL, NULL, NULL, NULL, 0),
	(33, 11, 5, 'Jumat', '07.30 - 16.00', NULL, NULL, NULL, NULL, 0);
/*!40000 ALTER TABLE `tb_hari` ENABLE KEYS */;

-- Dumping structure for table kklp.tb_kklp
CREATE TABLE IF NOT EXISTS `tb_kklp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asal_instansi` varchar(250) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `id_penempatan` int(11) DEFAULT NULL,
  `id_penanggung_jawab` int(11) DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kklp.tb_kklp: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_kklp` DISABLE KEYS */;
INSERT INTO `tb_kklp` (`id`, `asal_instansi`, `tgl_masuk`, `tgl_keluar`, `id_penempatan`, `id_penanggung_jawab`, `file_name`) VALUES
	(1, 'Universitas Dipa', '2021-09-20', '2021-11-20', 1, 1, NULL),
	(2, 'SMK N 6 MAKASSAR', '2021-10-13', '2021-10-12', 1, 1, 'assets/pdf/surat/file-2021-10-13 05-37-34-terima.pdf'),
	(3, 'SMK N 6 MAKASSAR', '2021-10-13', '2021-10-12', 1, 1, 'assets/pdf/surat/file-2021-10-13 05-40-48-terima.pdf'),
	(4, '', '0000-00-00', '0000-00-00', 0, 0, 'assets/pdf/surat/file-2021-10-13 05-54-24-terima.pdf');
/*!40000 ALTER TABLE `tb_kklp` ENABLE KEYS */;

-- Dumping structure for table kklp.tb_pekan
CREATE TABLE IF NOT EXISTS `tb_pekan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kklp` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pekan_ke` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kklp.tb_pekan: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_pekan` DISABLE KEYS */;
INSERT INTO `tb_pekan` (`id`, `id_kklp`, `id_user`, `pekan_ke`) VALUES
	(10, 1, 2, 1),
	(11, 1, 2, 3);
/*!40000 ALTER TABLE `tb_pekan` ENABLE KEYS */;

-- Dumping structure for table kklp.tb_penanggung_jawab
CREATE TABLE IF NOT EXISTS `tb_penanggung_jawab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penempatan` int(11) DEFAULT NULL,
  `nama_penanggung_jawab` varchar(50) DEFAULT NULL,
  `NIP` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kklp.tb_penanggung_jawab: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_penanggung_jawab` DISABLE KEYS */;
INSERT INTO `tb_penanggung_jawab` (`id`, `id_penempatan`, `nama_penanggung_jawab`, `NIP`) VALUES
	(1, 1, 'Ibu Anni', '001002003004');
/*!40000 ALTER TABLE `tb_penanggung_jawab` ENABLE KEYS */;

-- Dumping structure for table kklp.tb_penempatan
CREATE TABLE IF NOT EXISTS `tb_penempatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penempatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kklp.tb_penempatan: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_penempatan` DISABLE KEYS */;
INSERT INTO `tb_penempatan` (`id`, `nama_penempatan`) VALUES
	(1, 'Guru dan Tenaga Kependidikan'),
	(3, 'Umum'),
	(4, 'Keuangan'),
	(6, 'Tekkom'),
	(8, '');
/*!40000 ALTER TABLE `tb_penempatan` ENABLE KEYS */;

-- Dumping structure for table kklp.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kklp` int(11) NOT NULL,
  `nomor_induk` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(250) DEFAULT NULL,
  `jkel` enum('L','P') DEFAULT NULL,
  `prodi` varchar(250) DEFAULT NULL,
  `no_hp` char(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kklp.tb_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

-- Dumping structure for table kklp.tb_user_admin
CREATE TABLE IF NOT EXISTS `tb_user_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NIP` char(50) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `jabatan` varchar(250) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kklp.tb_user_admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_user_admin` DISABLE KEYS */;
INSERT INTO `tb_user_admin` (`id`, `NIP`, `nama`, `jabatan`, `username`, `password`) VALUES
	(1, '000', 'Fatmawati', 'Penanggung Jawab KKLP', 'admin', '21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `tb_user_admin` ENABLE KEYS */;

-- Dumping structure for trigger kklp.xttrg_add_pekan
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `xttrg_add_pekan` AFTER INSERT ON `tb_pekan` FOR EACH ROW BEGIN

	INSERT INTO tb_hari
	SELECT NULL AS id, NEW.id as id_pekan, id AS id_hari, hari AS hari ,"07.30 - 16.00" AS jam,  NULL AS tgl, NULL AS deskripsi , NULL AS file_pdf , NULL AS file_gambar, 0 AS status FROM ref_hari;
	
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
