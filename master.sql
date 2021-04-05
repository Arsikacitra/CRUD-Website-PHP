-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2020 pada 07.49
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `username`, `password`) VALUES
(1, 'admin@gmail', 'admin', '$2y$10$0QKL6deye/Rr/XeKSzkJpesvcGUSa07lpAtQvNieDgPVCuq0Q7Ns2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `gambar_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `harga_barang` int(6) NOT NULL,
  `stok_barang` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `gambar_barang`, `nama_barang`, `jenis_barang`, `harga_barang`, `stok_barang`) VALUES
('B001', 'gamis Cropped.jpg', 'Gamis', 'Baju', 250000, 55),
('B002', 'tunic Cropped.jpg', 'Tunic', 'Baju', 175000, 15),
('B003', 'blouse.jpg', 'Blouse', 'Pakaian', 275000, 17),
('C001', 'kulot.jpg', 'Kulot', 'Celana', 12000, 10),
('H001', 'pashmina Cropped.jpg', 'Pashmina', 'Kerudung', 125000, 200),
('H003', 'umama Cropped.jpg', 'Umama', 'Kerudung', 50000, 50),
('H004', 'neci Cropped.jpg', 'Neci', 'Kerudung', 45000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `gambar`, `username`, `email`, `alamat`, `no_telp`, `password`) VALUES
(1, 'anaa Cropped.jpg', 'Anaa', 'Ana@gmail.com', 'Jalan raya', '088223', '$2y$10$fV0/4td6skyDQCVSOUS1ROHAGbCxWZtaiPZmtmTlRTTGW2YsIsZTm'),
(3, 'ani Cropped.jpg', 'Ani', 'Ani@gmail.com', 'Jalan tikus', '081234', '$2y$10$sEfMP0L7z0bL3LMGQest0uKH0W7McqNcbhI8PtPvVS8yrbJqL2Lpe'),
(4, 'bambang Cropped.jpg', 'Bambang', 'Bambang@gmail.com', 'Jalan gede', '082345', '$2y$10$FBO.dtrbAAD2OdTST3FBPOmxTBIoYZYS6ZqHzl/B5LX8LrPg8Rc/y'),
(5, 'budhi Cropped.jpg', 'Budi', 'Budi@gmail.com', 'Jalan macet', '083456', '$2y$10$pPWjp5qH9s1.pcbFVfvbYek36ZoSnnBDOJI5cA/xbOv0.A7cQ/p7W'),
(6, 'elsa Cropped.jpg', 'Elsa', 'Elsa@gmail.com', 'Jalan nanjak', '084567', '$2y$10$FJQWY2FYxYT0qDidrDScXe2L1dqwKreH45cjZLxNAL0fUGjhrz24O'),
(7, 'cinta.jpg', 'Cinta', 'Cinta@gmail.com', 'Jalan sepi', '085678', '$2y$10$qs4LdtpDu4K1BHvHb547UeMJwCpTsTmz7Om2KQkZF91usEbGieHUG'),
(8, 'randi.jpg', 'Randii', 'Randi@gmail.com', 'Jalan kenangan', '086789', '$2y$10$6q.Bn7/6.TvWxTaxGCBg1eVbd/8c5wUmRdCG0XD1/IoG7KmKhELeC');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
