-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6935
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table database_ksp.table_anggota
CREATE TABLE IF NOT EXISTS `table_anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(50) DEFAULT NULL,
  `nik` varchar(17) DEFAULT NULL,
  `nomor_hp` varchar(15) DEFAULT NULL,
  `kecamatan` varchar(200) DEFAULT NULL,
  `desa` varchar(200) DEFAULT NULL,
  `alamat_detail` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table database_ksp.table_anggota: ~2 rows (approximately)
INSERT INTO `table_anggota` (`id_anggota`, `nama_anggota`, `nik`, `nomor_hp`, `kecamatan`, `desa`, `alamat_detail`, `created_at`, `updated_at`) VALUES
	(1, 'RAHMAT LUTVI FURKON', '1305051207960004', '082285498005', 'LIMA KAUM', 'LIMA KAUM', 'LIMO KAUM', '2024-11-05 21:37:20', NULL),
	(2, 'AHMAD NUR FAUZI', '1305051207960004', '082285498002', 'PADANG GANTINGA', 'PADANG GANTIANG', 'TALAGO BIRU', '2024-11-05 21:37:20', NULL);

-- Dumping structure for table database_ksp.table_pinjam
CREATE TABLE IF NOT EXISTS `table_pinjam` (
  `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL DEFAULT '0',
  `jumlah_pinjaman` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pinjaman`),
  KEY `id_anggota` (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table database_ksp.table_pinjam: ~2 rows (approximately)
INSERT INTO `table_pinjam` (`id_pinjaman`, `id_anggota`, `jumlah_pinjaman`) VALUES
	(1, 1, 3000000),
	(2, 2, 2500000);

-- Dumping structure for table database_ksp.table_transaksi
CREATE TABLE IF NOT EXISTS `table_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `status` enum('Debit','Kredit') DEFAULT NULL,
  `keterangan` text COMMENT 'Keterangan transaksi',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_admin` (`id_admin`),
  KEY `id_anggota` (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table database_ksp.table_transaksi: ~3 rows (approximately)
INSERT INTO `table_transaksi` (`id_transaksi`, `id_admin`, `id_anggota`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'Debit', 'Pinjaman Oleh Rahmat Lutvi Furkon', '2024-11-05 21:40:37', NULL),
	(2, 1, 1, 'Kredit', 'Pembayaran Cicilan Pertama rahmat Lutvi Furkon', '2024-11-05 21:41:00', NULL),
	(3, 1, 2, 'Kredit', 'Pembayaran Cicilan Pertama Oleh Fahruzu Rozi', NULL, NULL);

-- Dumping structure for table database_ksp.table_user
CREATE TABLE IF NOT EXISTS `table_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `role_user` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table database_ksp.table_user: ~2 rows (approximately)
INSERT INTO `table_user` (`id_user`, `email`, `nama_user`, `role_user`, `last_login`, `created_at`, `updated_at`) VALUES
	(1, 'admin@gmail.com', 'Admin', 'admin', '2024-11-05 21:41:44', '2024-11-05 21:41:46', '2024-11-05 21:41:46'),
	(2, 'budy@gmail.com', 'Budi Hartono', 'debt', '2024-11-05 21:43:04', '2024-11-05 21:43:06', '2024-11-05 21:43:07');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
