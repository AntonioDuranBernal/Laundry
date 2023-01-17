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

-- Volcando estructura para tabla laundry.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idEstado` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.clientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT IGNORE INTO `clientes` (`id`, `idEstado`, `nombre`, `celular`, `updated_at`, `created_at`) VALUES
	(1, 1, 'antonio', '9512419458', '2023-01-13 20:06:16', '2023-01-13 20:06:16');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.detalle_nota_servicios: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_nota_servicios` DISABLE KEYS */;
INSERT IGNORE INTO `detalle_nota_servicios` (`id`, `idNota`, `idArticulo`, `idServicio`, `descripcion`, `subtotal`, `estado`, `cantidad`, `updated_at`, `created_at`) VALUES
	(1, 3, 2, 1, NULL, 25, 1, 1, '2023-01-13 20:09:42', '2023-01-13 20:09:42'),
	(2, 3, 2, 1, NULL, 25, 1, 1, '2023-01-13 20:10:01', '2023-01-13 20:10:01'),
	(3, 4, 1, 1, NULL, 60, 1, 1, '2023-01-13 20:13:44', '2023-01-13 20:13:44'),
	(4, 8, 1, 1, NULL, 60, 1, 1, '2023-01-13 20:18:52', '2023-01-13 20:18:52'),
	(5, 9, 1, 1, NULL, 60, 1, 1, '2023-01-13 20:24:52', '2023-01-13 20:24:52'),
	(6, 9, 1, 1, NULL, 60, 1, 1, '2023-01-13 20:25:03', '2023-01-13 20:25:03'),
	(7, 10, 1, 1, NULL, 60, 1, 1, '2023-01-13 20:25:34', '2023-01-13 20:25:34'),
	(8, 11, 1, 1, NULL, 60, 1, 1, '2023-01-13 20:28:18', '2023-01-13 20:28:18'),
	(9, 12, 1, 1, NULL, 60, 1, 1, '2023-01-13 20:32:37', '2023-01-13 20:32:37');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.historial_pagos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `historial_pagos` DISABLE KEYS */;
INSERT IGNORE INTO `historial_pagos` (`id`, `idUsuarioSistema`, `importe`, `restante`, `idNota`, `created_at`, `updated_at`) VALUES
	(1, 3, 0, 50, 3, '2023-01-13 20:11:01', '2023-01-13 20:11:01'),
	(2, 12, 50, 10, 12, '2023-01-13 20:32:51', '2023-01-13 20:32:51');
/*!40000 ALTER TABLE `historial_pagos` ENABLE KEYS */;

-- Volcando estructura para tabla laundry.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.migrations: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(170, '2022_11_21_192605_create_servicios_table', 1),
	(276, '2014_10_12_000000_create_users_table', 2),
	(277, '2014_10_12_100000_create_password_resets_table', 2),
	(278, '2019_08_19_000000_create_failed_jobs_table', 2),
	(279, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(280, '2022_11_21_190225_create_notas_table', 2),
	(281, '2022_11_21_192356_create_detalle_nota_servicios_table', 2),
	(282, '2022_11_21_200805_create_historial_pagos_table', 2),
	(283, '2022_12_16_193657_clientes_table', 2),
	(284, '2023_01_12_182340_create_prendas_table', 2),
	(285, '2023_01_12_224230_create_servicios_table', 2);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.notas: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT IGNORE INTO `notas` (`id`, `idEstado`, `idUsuarioSistema`, `fechaEntrega`, `fechaSalida`, `total`, `idCliente`, `apunte`, `lugarEntrega`, `updated_at`, `created_at`, `restante`) VALUES
	(1, 1, 1, '2023-01-16 00:00:00', NULL, NULL, 1, 'Sin apuntes', 2, '2023-01-13 20:06:21', '2023-01-13 20:06:21', NULL),
	(2, 1, 1, '2023-01-16 00:00:00', NULL, NULL, 1, 'Sin apuntes', 2, '2023-01-13 20:06:31', '2023-01-13 20:06:31', NULL),
	(3, 10, 1, '2023-01-16 00:00:00', NULL, 50, 1, 'Sin apuntes', 2, '2023-01-13 20:09:25', '2023-01-13 20:09:25', 50),
	(6, 1, 1, '2023-01-16 00:00:00', NULL, NULL, 1, 'Sin apuntes', 2, '2023-01-13 20:16:55', '2023-01-13 20:16:55', NULL),
	(12, 10, 1, '2023-01-16 00:00:00', NULL, 60, 1, 'Sin apuntes', 2, '2023-01-13 20:32:29', '2023-01-13 20:32:29', 10);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.prendas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `prendas` DISABLE KEYS */;
INSERT IGNORE INTO `prendas` (`id`, `nombre`, `servicio`, `costo`, `descripcion`, `idEmpresa`, `updated_at`, `created_at`) VALUES
	(1, 'Colcha CH M', 1, 60, 'Lavandería de colcha mediana o chica', 12345, '2023-01-13 20:06:03', '2023-01-13 20:06:03'),
	(2, 'Camisa', 1, 25, 'Lavandería de camisa sencilla', 12345, '2023-01-13 20:09:20', '2023-01-13 20:09:20');
/*!40000 ALTER TABLE `prendas` ENABLE KEYS */;

-- Volcando estructura para tabla laundry.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idEmpresa` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.servicios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT IGNORE INTO `servicios` (`id`, `idEmpresa`, `descripcion`, `updated_at`, `created_at`) VALUES
	(1, 12345, 'Lavanderia', '2023-01-13 20:05:08', '2023-01-13 20:05:08');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laundry.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Luis Antonio Durán Bernal', 'ingduranbernal@gmail.com', NULL, '$2y$10$UGMyZ/37bRBj9YBDCh12nenKlnCf1wEgGO2ZiJW70Q0/K7a8u1p5u', NULL, '2023-01-13 20:04:31', '2023-01-13 20:04:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
