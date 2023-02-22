-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table umkmmaros.documents
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `umkms_id` bigint unsigned NOT NULL,
  `kartu_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table umkmmaros.documents: ~0 rows (approximately)

-- Dumping structure for table umkmmaros.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table umkmmaros.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table umkmmaros.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table umkmmaros.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(6, '2014_10_12_000000_create_users_table', 1),
	(7, '2014_10_12_100000_create_password_resets_table', 1),
	(8, '2019_08_19_000000_create_failed_jobs_table', 1),
	(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(10, '2023_02_19_154112_create_umkms_table', 1);

-- Dumping structure for table umkmmaros.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table umkmmaros.password_resets: ~0 rows (approximately)

-- Dumping structure for table umkmmaros.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table umkmmaros.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table umkmmaros.umkms
CREATE TABLE IF NOT EXISTS `umkms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `users_id` bigint unsigned NOT NULL,
  `nama_pemilik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kewarganegaraan` enum('WNI','WNA') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nib` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modal` double DEFAULT NULL,
  `jumlah_karyawan` int DEFAULT NULL,
  `tanggal_mulai_usaha` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `koordinat_alamat_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `koordinat_alamat_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `umkms_users_id_foreign` (`users_id`),
  CONSTRAINT `umkms_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table umkmmaros.umkms: ~0 rows (approximately)

-- Dumping structure for table umkmmaros.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table umkmmaros.users: ~19 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'MA DDI KEMBANG LEMARI', '$2y$10$hV7teZGS3DQUb1Lggu7tCu/o/lkM3uWlWs0hzs1wVLnf.9mK0o5kC', NULL, 2, '2023-02-22 13:19:21', NULL),
	(2, 'MAN PANGKAJENE KEPULAUAN', '$2y$10$4xvamv5PDBgFeTcLzeh..u1ZfaMfPEaPMj8SzmDyeFAYNh9Y0RVMe', NULL, 2, '2023-02-22 13:19:22', NULL),
	(3, 'MAS AL-FALAH PAMMAS', '$2y$10$ASbnZRoy6CbJD9XvhKJEkOq8Nb6uChM8W1w.jgiGURrf3F..SpAC2', NULL, 2, '2023-02-22 13:19:22', NULL),
	(4, 'MAS DARUL FATH BONTOLANGKASA', '$2y$10$D/wx6HNiJx4.yvUJ9a8W8ekAKUaNehsFnylkcqph4BL7eYl9kiQ.y', NULL, 2, '2023-02-22 13:19:22', NULL),
	(5, 'MAS DARUL DARUL KAMAL', '$2y$10$7AxFInqFoAYs70TQrNNQne2qKJDtnSyXiIPHSciKx/Qipkm/UGIiK', NULL, 2, '2023-02-22 13:19:22', NULL),
	(6, 'MAS DARUSSALAM ANRONG APPAKA', '$2y$10$AeaxyM7kVMmcztQzCddXZuVJm6/Iko4NOI8XteaIoTlMFGT8fhD8m', NULL, 2, '2023-02-22 13:19:22', NULL),
	(7, 'MAS DDI AD BONTO-BONTO', '$2y$10$m.81s/SskXHAFMt/JMNd1.pmgNrFNN7zx3qJLAKb2YHQbnXWqMg9y', NULL, 2, '2023-02-22 13:19:22', NULL),
	(8, 'MAS DDI BARU-BARU TANGA', '$2y$10$aNeR14/yG4W8KYZpC/4ZNO.FfSqFvAga2dvG2q1AyTxXAVL4oMbF2', NULL, 2, '2023-02-22 13:19:22', NULL),
	(9, 'MAS DDI GALLA RAYA', '$2y$10$sNP3VD9bF.EI2ynxLX32QOVVf5aSuWh2cOlOGl8ROztGYjIXPrqGy', NULL, 2, '2023-02-22 13:19:22', NULL),
	(10, 'MAS DDI JAWI-JAWI', '$2y$10$o8rKLdjNJkyJvBI6I55gp.hW/3zSo0wdF3umZXixtHGAeK/E72GjG', NULL, 2, '2023-02-22 13:19:23', NULL),
	(11, 'MAS DDI KALUKALUKUANG', '$2y$10$ypuPbb3zZqvxUPBkW3hG7Of463Yl/Wl04Q1unFRBq/o5g0rZ2i5C.', NULL, 2, '2023-02-22 13:19:23', NULL),
	(12, 'MAS DDI PADANGLAMPE', '$2y$10$.bfzLe4YahuCU6fBr4tkiu9mQeBQ5IiT4W709og.jSRGm6fQ/uKmy', NULL, 2, '2023-02-22 13:19:23', NULL),
	(13, 'MAS DDI TABO-TABO', '$2y$10$a/.chW8mgVRIA0FeecoAPOZ2ZQlc8ZtV0ChkJZlgzE467meoDYBPK', NULL, 2, '2023-02-22 13:19:23', NULL),
	(14, 'MAS DDI-AD BOWONG CINDEA', '$2y$10$W3ADxapSOOCJAFJ3Q0SyMOtTi3EX6EekN/OQ3pfJ44XrmRQTLpmRy', NULL, 2, '2023-02-22 13:19:24', NULL),
	(15, 'MAS MUHAMMADIYAH SIBATUA PANGKAJENE', '$2y$10$smseuHZSkNMCxuAJTvG2guagaguVgjqM0XLnlXenKzpNZ2aWdUbyO', NULL, 2, '2023-02-22 13:19:24', NULL),
	(16, 'MAS PP MUJAHIDIN', '$2y$10$HTa6vDltKARa8yFBt7ELYePCwDv2z6LZEVOLQTrZZwvsGrQ.msx0q', NULL, 2, '2023-02-22 13:19:24', NULL),
	(17, 'MAS SABUTUNG', '$2y$10$VCkfYn942KJaZBeBnx0Jr.oeKzPOHImIskV5cfMenwfIdcjopl6bi', NULL, 2, '2023-02-22 13:19:24', NULL),
	(18, 'MAS SYAWIR', '$2y$10$zqcOq..B4cxkMvbF/JDqoeJ4yIA.E8zPu/eQIACUQ3e5WjGuQXayK', NULL, 2, '2023-02-22 13:19:24', NULL),
	(19, 'admin_01', '$2y$10$AAdMTyhluit9OLWNMM9iFehRg62n0ld0Hoj6HMdjqp7Vh0xEiaoqK', NULL, 2, '2023-02-22 13:19:24', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
