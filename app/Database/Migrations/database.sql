-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for perpustakaan
DROP DATABASE IF EXISTS `perpustakaan`;
CREATE DATABASE IF NOT EXISTS `perpustakaan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `perpustakaan`;

-- Dumping structure for table perpustakaan.anggota
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `kode_anggota` varchar(45) NOT NULL,
  `nama_anggota` varchar(45) NOT NULL,
  `jurusan_anggota` varchar(45) NOT NULL,
  `no_telp_anggota` varchar(25) NOT NULL,
  `alamat_anggota` text NOT NULL,
  PRIMARY KEY (`id_anggota`),
  UNIQUE KEY `kode_anggota` (`kode_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpustakaan.anggota: ~2 rows (approximately)
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` (`id_anggota`, `kode_anggota`, `nama_anggota`, `jurusan_anggota`, `no_telp_anggota`, `alamat_anggota`) VALUES
	(1, '41519120101', 'Mugia Adha Kusumah', 'Informatika', '089198912', 'jln tanjung no 7b'),
	(3, '41519120102', 'Hilmi', 'TI', '089198912', 'jln tanjung no 7b'),
	(5, 'AG-123', 'test admin', 'Informatika', '123123', 'jln test');
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.buku
DROP TABLE IF EXISTS `buku`;
CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `id_rak` int(11) DEFAULT NULL,
  `kode_buku` char(5) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penulis_buku` varchar(45) NOT NULL,
  `penerbit_buku` varchar(45) NOT NULL,
  `tahun_penerbit` year(4) NOT NULL,
  `harga_per_hari` int(11) NOT NULL DEFAULT 0,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id_buku`),
  UNIQUE KEY `UNIQUE` (`kode_buku`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpustakaan.buku: ~8 rows (approximately)
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` (`id_buku`, `id_rak`, `kode_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tahun_penerbit`, `harga_per_hari`, `stok`) VALUES
	(4, 2, 'A14', 'Buku Ajar Tumbuh Kembang Remaja & Permasalahanya', 'Komang Ayu Heni', 'Sagung Seto', '2011', 2000, 10),
	(5, 4, 'A15', 'Dasar Dasar Uroginekologi', 'Zainul Anwar', 'Andi Offset', '2009', 5000, 9),
	(6, 3, 'A16', 'Etnografi Pengobatan; Praktik Budaya peramuan & su', 'Nasruddin Anshoriy', 'LKiS', '2011', 3000, 10),
	(7, 5, 'A17', 'Keanekaragaman klinik peny. Trofoblas gestasional', 'Greg Barton', 'LKiS', '2013', 2000, 10),
	(8, 3, 'A18', 'Kumpulan Undang undang Sistem peradilan Pidana', 'Soetjiningsih', 'Sagung Seto', '2009', 3000, 9),
	(9, 6, 'A19', 'Makna Budaya Dalam Komunikasi Antar Budaya', 'M. Z. Arifin', 'Sagung Seto', '1998', 5000, 10),
	(49, 1, 'A33', 'judul aja', 'penulis', 'penerbit', '2022', 0, -1),
	(50, 1, 'A35', 'judul aja', 'penulis', 'penerbit', '2022', 0, 3);
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.peminjaman
DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `kode_peminjaman` varchar(50) DEFAULT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpustakaan.peminjaman: ~6 rows (approximately)
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` (`id_peminjaman`, `kode_peminjaman`, `tanggal_pinjam`, `tanggal_kembali`, `id_buku`, `id_anggota`, `id_petugas`) VALUES
	(46, 'PJM-20220330-355', '2022-03-30', '2022-03-30', 4, 1, 1),
	(47, 'PJM-20220330-283', '2022-03-30', '2022-03-31', 3, 1, 1),
	(48, 'PJM-20220330-527', '2022-03-30', '2022-03-30', 5, 1, 1),
	(49, 'PJM-20220406-853', '2022-04-06', '2022-04-13', 3, 1, 1),
	(50, 'PJM-20220408-208', '2022-04-08', '2022-04-09', 3, 1, 2),
	(51, 'PJM-20220408-214', '2022-04-08', '2022-04-14', 8, 3, 2);
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.pengembalian
DROP TABLE IF EXISTS `pengembalian`;
CREATE TABLE IF NOT EXISTS `pengembalian` (
  `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT,
  `id_pinjam` int(11) DEFAULT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  PRIMARY KEY (`id_pengembalian`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpustakaan.pengembalian: ~3 rows (approximately)
/*!40000 ALTER TABLE `pengembalian` DISABLE KEYS */;
INSERT INTO `pengembalian` (`id_pengembalian`, `id_pinjam`, `tanggal_pengembalian`, `total_pembayaran`, `denda`, `id_petugas`) VALUES
	(57, 46, '2022-03-30', 2000, 0, 0),
	(58, 48, '2022-03-30', 5000, 0, 0),
	(59, 47, '2022-03-30', 5000, 0, 0),
	(60, 49, '2022-04-06', 5000, 0, 0),
	(61, 51, '2022-04-08', 3000, 0, 0);
/*!40000 ALTER TABLE `pengembalian` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.petugas
DROP TABLE IF EXISTS `petugas`;
CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(45) NOT NULL,
  `jabatan_petugas` varchar(45) NOT NULL,
  `no_telp_petugas` varchar(20) NOT NULL,
  `alamat_petugas` text NOT NULL,
  `username_petugas` varchar(45) NOT NULL,
  `password_petugas` text NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpustakaan.petugas: ~1 rows (approximately)
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `jabatan_petugas`, `no_telp_petugas`, `alamat_petugas`, `username_petugas`, `password_petugas`) VALUES
	(10, 'admin', 'Admin', '086123213', 'jl mana aja', 'admin', '5800a0d19cf8d69b32b094dc519e91326fc032d2831b6d11caa280444f870fe354df35468df48847be0cdaf530cf551174b578440ec2f4cbe7542f71f12c3977f61f490eafffcb02f8a0ccc917d2add4644fb8b0bd'),
	(11, 'Mugia Adha Kusumah', 'Admin', '089614696651', 'jln tanjung no 7b kampus ipb dramaga bogor', 'mugiaadha', 'f8989413acf653605e69068afb65fb3048e5cf6ea4d958fa77282bbe29b467f63ed29eb8e3f7ead5aeb0b07819cf70975afc202998d72acd84abc147b298cef41ef0b1049bf93184814426001613066c3367f86a80f84445');
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.rak
DROP TABLE IF EXISTS `rak`;
CREATE TABLE IF NOT EXISTS `rak` (
  `id_rak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(45) NOT NULL,
  `lokasi_rak` varchar(45) NOT NULL,
  PRIMARY KEY (`id_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpustakaan.rak: ~8 rows (approximately)
/*!40000 ALTER TABLE `rak` DISABLE KEYS */;
INSERT INTO `rak` (`id_rak`, `nama_rak`, `lokasi_rak`) VALUES
	(1, 'General', 'Blok B'),
	(2, 'Matematika', 'Blok A'),
	(3, 'Hoby', 'Blok B'),
	(4, 'Komputer', 'Blok B'),
	(5, 'Sosial', 'Blok C'),
	(6, 'Ekonomi', 'Blok C'),
	(7, 'Sains', 'Blok C'),
	(13, 'test', 'Blok ZZ');
/*!40000 ALTER TABLE `rak` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
