-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2022 pada 16.40
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katalog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level_akses` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `username`, `password`, `nama`, `level_akses`, `email`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Christian', 'admin', 'adminweb@shalz.com'),
(7, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Van', 'user', 'livanags@gmail.com'),
(11, 'zeana110', 'dc0a1af68d054bdbdddfdc3c44e7bd84', 'Zea', 'user', 'zeaseas@gmail.com'),
(13, 'lalapooo', '9cb2d2208f71cc5dfba0c5d56e840dfc', 'lala', 'user', 'lalafrnc@oscorp.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `nama_seller` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id`, `nama_produk`, `nama_seller`, `deskripsi`, `foto`, `kategori`, `harga`) VALUES
(13, 'Chateau Lafite 1787', 'Christian', 'A finest collection of the Noble House Rothschild.', 'chateau-lafite.jpg', 'top-6', 20000),
(14, 'Penfolds Grange Hermitage 1951', 'Christian', 'Fermented from 1951 a geniune Australian red wine with amazing taste, makes you fly into the nine realm', 'penfolds.jpg', 'top-6', 600000),
(15, 'Screaming Eagle Cabernet 1992', 'Christian', 'Special taste of nobility, makes your bank account screaming like an eagle', 'screaming_eagle.jpg', 'top-6', 500000),
(16, 'Shipwrecked Heidsieck 1907', 'Christian', 'Bittersweet, taste better and better', 'shipwreck.jpg', 'top-6', 20000),
(18, 'Sababay', 'Van', 'Bittersweet, taste better and better', 'sababay.jpg', 'top-6', 500000),
(19, 'Cape Discovery', 'Van', 'A unique taste from a single drop of heavenly wine. Local indonesian wine', 'cape.jpg', 'Lokal', 600000),
(20, 'Bellissimo Wines', 'Van', 'Sweet but intens, match for a dessert', 'bellisimo.jpg', 'top-6', 200000),
(23, 'Hatten Wine', 'Van', 'Sweet but intens, match for a dessert', 'hatten.jpg', 'Lokal', 400000),
(24, 'Plaga', 'Van', 'Trurth or dare? dare you drink this lovely flying plaga', 'plaga.jpg', 'Lokal', 50000),
(25, 'Artisan', 'Van', 'Sweet but psycho, this one kills you with sweetness', 'artisan.jpg', 'Lokal', 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(2, 'Lokal'),
(3, 'top-4'),
(1, 'top-6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_akses`
--

CREATE TABLE `level_akses` (
  `id` int(11) NOT NULL,
  `level_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level_akses`
--

INSERT INTO `level_akses` (`id`, `level_akses`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `level_akses`
--
ALTER TABLE `level_akses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `level_akses`
--
ALTER TABLE `level_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
