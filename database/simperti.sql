-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2021 pada 06.43
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simperti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `atasan`
--

CREATE TABLE `atasan` (
  `id_atasan` int(11) NOT NULL,
  `nama_atasan` varchar(255) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jabatan_atasan` varchar(50) NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `atasan`
--

INSERT INTO `atasan` (`id_atasan`, `nama_atasan`, `nip`, `jabatan_atasan`, `tanda_tangan`) VALUES
(1, 'Fachrurrazi, MA', '10091053', 'Direktur', '-'),
(2, 'CHANDRA NURMANSYAH, S.Si', '10101064', 'Kepala SMP', '-'),
(3, 'MARINA NOVA WAHYUNI, ST', '12101107', 'Kepala SD', '-'),
(4, 'KARTIKA HAKIM, S.S., MA', '10151003', 'Kepala SMA', 'a2.png'),
(10, 'SAIFUL ANWAR', '10081025', 'Asisten Manajer Komplek', 'a1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jenis_cuti` varchar(50) DEFAULT NULL,
  `tanggal_cuti` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `keperluan_cuti` varchar(500) DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `tugas_sekarang` varchar(500) DEFAULT NULL,
  `diserahkan_kepada` varchar(50) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `approve_atasan` varchar(20) DEFAULT NULL,
  `alasan_ditolak` varchar(500) DEFAULT NULL,
  `approve_tu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id`, `id_user`, `jenis_cuti`, `tanggal_cuti`, `tanggal_kembali`, `keperluan_cuti`, `alamat`, `no_hp`, `tugas_sekarang`, `diserahkan_kepada`, `tanggal_pengajuan`, `approve_atasan`, `alasan_ditolak`, `approve_tu`) VALUES
(2, 1, 'Cuti Menunaikan Ibadah Haji', '2021-08-28', '2021-09-30', 'Umroh/Haji', 'Cot Meurak', '081362059403', '1. Guru TIK SD\r\n2. Laboran\r\n3. Guru Ekskul', 'Adit2', '2021-08-27', 'Sedang Diproses', '', 'Sedang Diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(3, 'SD'),
(4, 'SMP'),
(5, 'SMA'),
(6, 'UMUM'),
(7, 'PUSDATIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin`
--

CREATE TABLE `izin` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_izin` date DEFAULT NULL,
  `tanggal_akhir_izin` date DEFAULT NULL,
  `kode_izin` varchar(100) DEFAULT NULL,
  `alasan` varchar(500) DEFAULT NULL,
  `approve_atasan` varchar(20) DEFAULT NULL,
  `approve_tu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `izin`
--

INSERT INTO `izin` (`id`, `id_user`, `tanggal_izin`, `tanggal_akhir_izin`, `kode_izin`, `alasan`, `approve_atasan`, `approve_tu`) VALUES
(1, 1, '2021-08-27', '2021-08-28', '01 (Sakit/Sick Leave)', 'Sakit', 'Diterima', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip_user` varchar(20) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `divisi_user` varchar(20) NOT NULL,
  `id_atasan` int(11) NOT NULL,
  `role` varchar(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nip_user`, `jabatan`, `divisi_user`, `id_atasan`, `role`, `username`, `password`) VALUES
(1, 'Aditya Aziz Fikhri, S.Tr.Kom', '10186018', 'Laboran Komputer', '7', 1, '0', '10186018', '10186018'),
(3, 'FACHRURRAZI, MA', '10091053', 'Direktur', '6', 1, '1', '10091053', '10091053'),
(6, 'Kartika Hakim, S.S.,MA', '10151003', 'Kepala SMA', '5', 1, '1', '10151003', '10151003'),
(7, 'CHANDRA NURMANSYAH, S.Si', '10101064', 'Kepala SMP', '4', 1, '1', '10101064', '10101064'),
(8, 'Maina Sara, MA', '10061010', 'Kepala TU', '6', 1, '2', '10061010', '10061010'),
(9, 'DWI WULANDARY, ST., MA', '10081054', 'Guru SMP', '4', 2, '3', '10081054', '10081054');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `atasan`
--
ALTER TABLE `atasan`
  ADD PRIMARY KEY (`id_atasan`);

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `atasan`
--
ALTER TABLE `atasan`
  MODIFY `id_atasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `izin`
--
ALTER TABLE `izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
