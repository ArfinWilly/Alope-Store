-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk e-commerce
CREATE DATABASE IF NOT EXISTS `e-commerce` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `e-commerce`;

-- membuang struktur untuk table e-commerce.completed_orders
CREATE TABLE IF NOT EXISTS `completed_orders` (
  `idPayment` int NOT NULL AUTO_INCREMENT,
  `nameCustomers` varchar(256) NOT NULL,
  `addressCustomers` varchar(256) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `nameProduct` varchar(128) NOT NULL,
  `amount` int NOT NULL,
  `totalPrice` int NOT NULL,
  `pay` int NOT NULL,
  `returnPay` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPayment`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel e-commerce.completed_orders: ~1 rows (lebih kurang)
INSERT INTO `completed_orders` (`idPayment`, `nameCustomers`, `addressCustomers`, `no_telp`, `nameProduct`, `amount`, `totalPrice`, `pay`, `returnPay`, `created_at`) VALUES
	(24, 'Arfin', 'Batang', '085640163288', 'Akra', 1, 125000, 130000, 5000, '2024-12-24 14:04:51');

-- membuang struktur untuk table e-commerce.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `idCustomers` int NOT NULL AUTO_INCREMENT,
  `nameCustomers` varchar(128) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `addressCustomers` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `nameProduct` varchar(128) NOT NULL,
  `amount` int NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idCustomers`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel e-commerce.orders: ~0 rows (lebih kurang)

-- membuang struktur untuk table e-commerce.pdf_storage
CREATE TABLE IF NOT EXISTS `pdf_storage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pembayaran` int NOT NULL,
  `file_name` varchar(256) NOT NULL,
  `file_path` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel e-commerce.pdf_storage: ~0 rows (lebih kurang)

-- membuang struktur untuk table e-commerce.product
CREATE TABLE IF NOT EXISTS `product` (
  `idProduct` int NOT NULL AUTO_INCREMENT,
  `img` varchar(128) NOT NULL,
  `nameProduct` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`idProduct`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel e-commerce.product: ~11 rows (lebih kurang)
INSERT INTO `product` (`idProduct`, `img`, `nameProduct`, `category`, `price`) VALUES
	(15, '6749211f93f50.png', 'Dheo', 'Sendal', 78000),
	(16, '6749221317a24.png', 'Akra', 'Sepatu', 125000),
	(17, '67698835b2b31.png', 'Glad', 'Sepatu', 150000),
	(18, '67698859dccda.png', 'Hyper', 'Sepatu', 150000),
	(19, '6769887ccd5b0.png', 'Levo', 'Sepatu', 120000),
	(20, '67698964c1e40.png', 'Loco', 'Sendal', 80000),
	(21, '6769898542ebc.jpeg', 'Q 19', 'Sepatu', 100000),
	(22, '67698b0542963.png', 'Vasco', 'Sepatu', 120000),
	(23, '676a58fead57c.png', 'Wilder', 'Sendal', 90000),
	(24, '67698b59536c6.png', 'Yeager', 'Sendal', 50000),
	(26, '676a59242dc47.png', 'Zone', 'Sepatu', 85000);

-- membuang struktur untuk table e-commerce.users
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `userPassword` varchar(256) NOT NULL,
  `userLevel` enum('admin','kurir','pelanggan') NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel e-commerce.users: ~1 rows (lebih kurang)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
