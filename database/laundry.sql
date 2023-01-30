-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para laundry
CREATE DATABASE IF NOT EXISTS `laundry` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `laundry`;

-- Volcando estructura para tabla laundry.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idEstado` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.clientes: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT IGNORE INTO `clientes` (`id`, `idEstado`, `nombre`, `celular`, `updated_at`, `created_at`) VALUES
	(91, 1, 'Antonio', '529512419458', '2023-01-30 21:39:43', '2023-01-30 21:39:43');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla laundry.detalle_nota_servicios
CREATE TABLE IF NOT EXISTS `detalle_nota_servicios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idNota` int(11) NOT NULL,
  `idArticulo` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` double NOT NULL,
  `estado` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.detalle_nota_servicios: ~23 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_nota_servicios` DISABLE KEYS */;
INSERT IGNORE INTO `detalle_nota_servicios` (`id`, `idNota`, `idArticulo`, `idServicio`, `descripcion`, `subtotal`, `estado`, `cantidad`, `updated_at`, `created_at`) VALUES
	(28, 29, 4, 4, NULL, 15, 1, 1, '2023-01-21 21:12:23', '2023-01-21 21:12:23'),
	(29, 30, 4, 4, NULL, 15, 1, 1, '2023-01-21 21:14:41', '2023-01-21 21:14:41'),
	(30, 31, 4, 4, NULL, 15, 1, 1, '2023-01-21 21:17:53', '2023-01-21 21:17:53'),
	(31, 32, 4, 4, NULL, 15, 1, 1, '2023-01-21 21:31:11', '2023-01-21 21:31:11'),
	(32, 33, 4, 4, NULL, 15, 1, 1, '2023-01-21 21:31:31', '2023-01-21 21:31:31'),
	(33, 34, 4, 4, NULL, 15, 1, 1, '2023-01-24 03:12:13', '2023-01-24 03:12:13'),
	(34, 35, 4, 4, NULL, 15, 1, 1, '2023-01-24 03:38:02', '2023-01-24 03:38:02'),
	(35, 36, 4, 4, NULL, 15, 1, 1, '2023-01-24 03:40:12', '2023-01-24 03:40:12'),
	(36, 37, 4, 4, NULL, 15, 1, 1, '2023-01-24 03:41:32', '2023-01-24 03:41:32'),
	(37, 39, 5, 5, NULL, 80, 1, 2, '2023-01-24 04:12:43', '2023-01-24 04:12:43'),
	(38, 40, 4, 4, NULL, 15, 1, 1, '2023-01-25 06:47:16', '2023-01-25 06:47:16'),
	(39, 41, 4, 4, NULL, 15, 1, 1, '2023-01-28 20:30:03', '2023-01-28 20:30:03'),
	(40, 42, 4, 4, NULL, 15, 1, 1, '2023-01-28 20:52:03', '2023-01-28 20:52:03'),
	(41, 43, 4, 4, NULL, 15, 1, 1, '2023-01-28 20:58:13', '2023-01-28 20:58:13'),
	(42, 44, 4, 4, NULL, 15, 1, 1, '2023-01-28 21:04:06', '2023-01-28 21:04:06'),
	(43, 44, 5, 5, NULL, 40, 1, 1, '2023-01-28 21:04:16', '2023-01-28 21:04:16'),
	(44, 45, 4, 4, NULL, 15, 1, 1, '2023-01-28 21:08:26', '2023-01-28 21:08:26'),
	(45, 46, 4, 4, NULL, 15, 1, 1, '2023-01-28 21:09:39', '2023-01-28 21:09:39'),
	(46, 47, 4, 4, NULL, 15, 1, 1, '2023-01-28 21:12:14', '2023-01-28 21:12:14'),
	(47, 48, 4, 4, NULL, 15, 1, 1, '2023-01-28 21:47:54', '2023-01-28 21:47:54'),
	(48, 49, 4, 4, NULL, 15, 1, 1, '2023-01-28 22:10:38', '2023-01-28 22:10:38'),
	(49, 50, 5, 5, NULL, 80, 1, 2, '2023-01-28 22:15:31', '2023-01-28 22:15:31'),
	(50, 51, 5, 5, NULL, 40, 1, 1, '2023-01-28 22:20:17', '2023-01-28 22:20:17'),
	(51, 52, 4, 4, NULL, 15, 1, 1, '2023-01-30 21:38:20', '2023-01-30 21:38:20'),
	(52, 53, 5, 5, NULL, 200, 1, 5, '2023-01-30 21:40:10', '2023-01-30 21:40:10');
/*!40000 ALTER TABLE `detalle_nota_servicios` ENABLE KEYS */;

-- Volcando estructura para tabla laundry.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla laundry.historial_pagos
CREATE TABLE IF NOT EXISTS `historial_pagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuarioSistema` int(11) NOT NULL,
  `importe` double NOT NULL,
  `restante` double NOT NULL,
  `idNota` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.historial_pagos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `historial_pagos` DISABLE KEYS */;
INSERT IGNORE INTO `historial_pagos` (`id`, `idUsuarioSistema`, `importe`, `restante`, `idNota`, `created_at`, `updated_at`) VALUES
	(7, 31, 10, 5, 31, '2023-01-21 21:17:58', '2023-01-21 21:17:58'),
	(8, 39, 80, 0, 39, '2023-01-24 04:37:16', '2023-01-24 04:37:16'),
	(9, 53, 100, 100, 53, '2023-01-30 21:40:27', '2023-01-30 21:40:27');
/*!40000 ALTER TABLE `historial_pagos` ENABLE KEYS */;

-- Volcando estructura para tabla laundry.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=303 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.migrations: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(170, '2022_11_21_192605_create_servicios_table', 1),
	(293, '2014_10_12_000000_create_users_table', 2),
	(294, '2014_10_12_100000_create_password_resets_table', 2),
	(295, '2019_08_19_000000_create_failed_jobs_table', 2),
	(296, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(297, '2022_11_21_190225_create_notas_table', 2),
	(298, '2022_11_21_192356_create_detalle_nota_servicios_table', 2),
	(299, '2022_11_21_200805_create_historial_pagos_table', 2),
	(300, '2022_12_16_193657_clientes_table', 2),
	(301, '2023_01_12_182340_create_prendas_table', 2),
	(302, '2023_01_12_224230_create_servicios_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla laundry.notas
CREATE TABLE IF NOT EXISTS `notas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idEstado` int(11) NOT NULL,
  `idUsuarioSistema` int(11) NOT NULL,
  `fechaEntrega` timestamp NOT NULL,
  `fechaSalida` timestamp NULL DEFAULT NULL,
  `total` double DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `apunte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugarEntrega` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `restante` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.notas: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT IGNORE INTO `notas` (`id`, `idEstado`, `idUsuarioSistema`, `fechaEntrega`, `fechaSalida`, `total`, `idCliente`, `apunte`, `lugarEntrega`, `updated_at`, `created_at`, `restante`) VALUES
	(29, 10, 1, '2023-01-24 00:00:00', NULL, 15, 1, 'Sin apuntes', 1, '2023-01-21 21:12:16', '2023-01-21 21:12:16', 15),
	(31, 10, 1, '2023-01-24 00:00:00', NULL, 15, 28, 'Sin apuntes', 1, '2023-01-21 21:17:50', '2023-01-21 21:17:50', 5),
	(32, 10, 1, '2023-01-24 00:00:00', NULL, 15, 1, 'Sin apuntes', 1, '2023-01-21 21:31:08', '2023-01-21 21:31:08', 15),
	(33, 10, 1, '2023-01-24 00:00:00', NULL, 15, 1, 'Sin apuntes', 1, '2023-01-21 21:31:27', '2023-01-21 21:31:27', 15),
	(34, 10, 1, '2023-01-26 00:00:00', NULL, 15, 28, 'Sin apuntes', 1, '2023-01-24 03:11:57', '2023-01-24 03:11:57', 15),
	(36, 10, 1, '2023-01-26 00:00:00', NULL, 15, 1, 'Sin apuntes', 1, '2023-01-24 03:40:08', '2023-01-24 03:40:08', 15),
	(39, 15, 1, '2023-01-26 00:00:00', NULL, 80, 31, 'Sin apuntes', 1, '2023-01-24 04:07:28', '2023-01-24 04:07:28', 0),
	(40, 10, 1, '2023-01-28 00:00:00', NULL, 15, 41, 'Sin apuntes', 1, '2023-01-25 06:47:10', '2023-01-25 06:47:10', 15),
	(41, 2, 1, '2023-01-31 00:00:00', NULL, 15, 85, 'Sin apuntes', 1, '2023-01-28 20:29:59', '2023-01-28 20:29:59', 15),
	(42, 25, 1, '2023-01-31 00:00:00', NULL, 15, 85, 'Sin apuntes', 1, '2023-01-28 20:51:58', '2023-01-28 20:51:58', 15),
	(43, 25, 1, '2023-01-31 00:00:00', NULL, 15, 87, 'Sin apuntes', 1, '2023-01-28 20:58:10', '2023-01-28 20:58:10', 15),
	(45, 25, 1, '2023-01-31 00:00:00', NULL, 15, 87, 'Sin apuntes', 1, '2023-01-28 21:08:21', '2023-01-28 21:08:21', 15),
	(46, 25, 1, '2023-01-31 00:00:00', NULL, 15, 87, 'Sin apuntes', 1, '2023-01-28 21:09:35', '2023-01-28 21:09:35', 15),
	(47, 25, 1, '2023-01-31 00:00:00', NULL, 15, 88, 'Sin apuntes', 1, '2023-01-28 21:12:09', '2023-01-28 21:12:09', 15),
	(48, 25, 1, '2023-01-31 00:00:00', NULL, 15, 88, 'Sin apuntes', 1, '2023-01-28 21:47:50', '2023-01-28 21:47:50', 15),
	(49, 10, 1, '2023-01-31 00:00:00', NULL, 15, 88, 'Sin apuntes', 1, '2023-01-28 22:10:17', '2023-01-28 22:10:17', 15),
	(50, 25, 1, '2023-01-31 00:00:00', NULL, 80, 88, 'Sin apuntes', 1, '2023-01-28 22:15:22', '2023-01-28 22:15:22', 80),
	(51, 25, 1, '2023-01-31 00:00:00', NULL, 40, 88, 'Sin apuntes', 1, '2023-01-28 22:20:09', '2023-01-28 22:20:09', 40),
	(52, 25, 1, '2023-02-02 00:00:00', NULL, 15, 90, 'Sin apuntes', 1, '2023-01-30 21:37:39', '2023-01-30 21:37:39', 15),
	(53, 25, 1, '2023-02-02 00:00:00', NULL, 200, 91, 'Sin apuntes', 1, '2023-01-30 21:39:59', '2023-01-30 21:39:59', 100);
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;

-- Volcando estructura para tabla laundry.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla laundry.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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

-- Volcando datos para la tabla laundry.personal_access_tokens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Volcando estructura para tabla laundry.prendas
CREATE TABLE IF NOT EXISTS `prendas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicio` int(11) NOT NULL,
  `costo` double NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.prendas: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `prendas` DISABLE KEYS */;
INSERT IGNORE INTO `prendas` (`id`, `nombre`, `servicio`, `costo`, `descripcion`, `idEmpresa`, `updated_at`, `created_at`) VALUES
	(4, 'Kilo de ropa', 4, 15, 'Kilo de ropa solo lavandería', 12345, '2023-01-21 21:11:13', '2023-01-21 21:11:13'),
	(5, 'Camisa', 5, 40, 'Lavado y planchado de camisa sencilla', 12345, '2023-01-24 03:56:39', '2023-01-24 03:56:39'),
	(6, 'Pantalón', 6, 25, 'Solo planchado de pantalón sencillo', 12345, '2023-01-24 03:57:08', '2023-01-24 03:57:08');
/*!40000 ALTER TABLE `prendas` ENABLE KEYS */;

-- Volcando estructura para tabla laundry.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idEmpresa` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.servicios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT IGNORE INTO `servicios` (`id`, `idEmpresa`, `descripcion`, `updated_at`, `created_at`) VALUES
	(4, 12345, 'Lavandería', '2023-01-21 21:10:34', '2023-01-21 21:10:34'),
	(5, 12345, 'Tintoreria', '2023-01-24 03:55:13', '2023-01-24 03:55:13'),
	(6, 12345, 'Planchado', '2023-01-24 03:55:25', '2023-01-24 03:55:25');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;

-- Volcando estructura para tabla laundry.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Luis', 'ingduranbernal@gmail.com', NULL, '$2y$10$o2vto5wWaLqSjtPiRqh2Se8Z8/28U1LWamqyS3Vikf6CIgmXVc5mW', NULL, '2023-01-20 21:23:38', '2023-01-20 21:23:38'),
	(2, 'luis', 'dareprise@gmail.com', NULL, '$2y$10$q/7vXLVcCcrrKw42xTa4YOYDNXJJXEC8dwWikd41NfHaQOeOI6hOC', 'UbZEkPdH0t8ylrdpS3BlevY5rbPv4oQdDalNpPNDIp3X9fIQuCU7TCs5kbMw', '2023-01-21 18:04:09', '2023-01-21 18:04:09'),
	(3, 'Luis Antonio', 'duranbe@gmail.com', NULL, '$2y$10$Ug0MABwR31xcef7aHR2n/.w592bJ5iwUYkp.jk5./koNEwm31e/AC', NULL, '2023-01-24 03:44:49', '2023-01-24 03:44:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
