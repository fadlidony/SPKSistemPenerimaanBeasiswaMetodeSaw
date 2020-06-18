-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Jun 2020 pada 16.13
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_saw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Dana Ramza Fakhma');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calonbeasiswa`
--

CREATE TABLE `calonbeasiswa` (
  `id_mhs` varchar(10) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `jurusan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `calonbeasiswa`
--

INSERT INTO `calonbeasiswa` (`id_mhs`, `nama_mhs`, `jurusan`) VALUES
('CPB-000001', 'Andi', 'Informatika'),
('CPB-000002', 'Budi', 'Informatika'),
('CPB-000003', 'Catur', 'Informatika'),
('CPB-000004', 'Dedi', 'Informatika'),
('CPB-000005', 'Endah', 'Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `himpunan`
--

CREATE TABLE `himpunan` (
  `id_himpunan` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `namahimpunan` varchar(100) NOT NULL,
  `nilai` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `himpunan`
--

INSERT INTO `himpunan` (`id_himpunan`, `id_kriteria`, `namahimpunan`, `nilai`, `keterangan`) VALUES
(45, 6, '<= Rp 1.000.000', '20', '<= Rp 1.000.000'),
(46, 6, '<= Rp 1.500.000', '40', '<= Rp 1.500.000'),
(47, 6, '<= Rp 3.000.000', '60', '<= Rp 3.000.000'),
(48, 6, '<= Rp 4.500.000', '80', '<= Rp 4.500.000'),
(49, 0, '> Rp 4.500.000', '100', '> Rp 4.500.000'),
(50, 7, 'Semester 4', '20', 'Semester 4'),
(51, 7, 'Semester 5', '40', 'Semester 5'),
(52, 7, 'Semester 6', '60', 'Semester 6'),
(53, 7, 'Semester 7', '80', 'Semester 7'),
(54, 7, 'Semester 8', '100', 'Semester 8'),
(55, 8, '1 Orang', '20', '1 Orang'),
(56, 8, '2 Orang', '40', '2 Orang'),
(57, 8, '3 Orang', '60', '3 Orang'),
(58, 8, '4 Orang', '80', '4 Orang'),
(59, 8, '>4 Orang', '100', '>4 Orang'),
(60, 9, '1 Orang', '20', '1 Orang'),
(61, 9, '2 Orang', '40', '2 Orang'),
(62, 9, '3 Orang', '60', '3 Orang'),
(63, 9, '4 Orang', '80', '4 Orang'),
(64, 9, '>4 Orang', '100', '>4 Orang'),
(65, 10, '< 2,75', '20', '< 2,75'),
(66, 10, '< 3', '40', '< 3'),
(67, 10, '< 3,25', '60', '< 3,25'),
(68, 10, '< 3,5', '80', '< 3,5'),
(69, 10, '>= 3,5', '100', '>= 3,5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(5) NOT NULL,
  `id_mhs` varchar(10) NOT NULL,
  `jml_tanggungan` double NOT NULL,
  `nilai_ipk` double NOT NULL,
  `penghasilan_ortu` double NOT NULL,
  `semester` double NOT NULL,
  `saudara` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `id_mhs`, `jml_tanggungan`, `nilai_ipk`, `penghasilan_ortu`, `semester`, `saudara`) VALUES
(18, 'CPB-000001', 20, 20, 80, 20, 20),
(19, 'CPB-000002', 40, 40, 40, 40, 40),
(20, 'CPB-000003', 60, 100, 60, 60, 60),
(21, 'CPB-000004', 80, 80, 80, 80, 80),
(23, 'CPB-000005', 40, 100, 40, 20, 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `namakriteria` varchar(100) NOT NULL,
  `atribut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `namakriteria`, `atribut`) VALUES
(6, 'Penghasilan Orang Tua', 'Cost'),
(7, 'Semester', 'Benefit'),
(8, 'Tanggungan Orang Tua', 'Benefit'),
(9, 'Saudara Kandung', 'Benefit'),
(10, 'Nilai', 'Benefit');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `calonbeasiswa`
--
ALTER TABLE `calonbeasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indeks untuk tabel `himpunan`
--
ALTER TABLE `himpunan`
  ADD PRIMARY KEY (`id_himpunan`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `himpunan`
--
ALTER TABLE `himpunan`
  MODIFY `id_himpunan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
