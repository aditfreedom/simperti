-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2021 pada 05.37
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
(1, 'FACHRURRAZI, M.A.', '10091053', 'DIREKTUR', 'QR_Direktur.png'),
(2, 'CHANDRA NURMANSYAH, S.Si', '10101064', 'KEPALA SMP', 'QR_SMP.png'),
(3, 'MARINA NOVA WAHYUNI, ST', '12101107', 'KEPALA SD', 'QR_SD.png'),
(4, 'KARTIKA HAKIM, S.S., M.A.', '10151003', 'KEPALA SMA', 'QR_SMA.png'),
(10, 'SAIFUL ANWAR', '10081067', 'ASS. MANKOM', 'QR_MANKOM.png'),
(11, 'MAINA SARA, M.A.', '11071018', 'KEPALA TU', 'QR_TU.png'),
(12, 'SITI ALPIYAH, S.IP.', '10061007', 'KEPALA PERPUSTAKAAN', 'QR_PERPUSTAKAAN.png'),
(13, 'HIJRIATI MEUTIA, S.Psi., M.A.', '10141003', 'KA. KONSELOR', 'QR_KONSELOR.png'),
(14, 'VICTOR YASADHANA', '11071017', 'DIREKTUR PENDIDIKAN', 'QR_DIREKTURPENDIDIKAN.png');

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
(7, 'PUSDATIN'),
(8, 'PERPUSTAKAAN'),
(9, 'PUSLING'),
(10, 'NON SDK');

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
(11, 'Aditya Aziz Fikhri, S.Tr.Kom', '10186018', 'Laboran Komputer', '7', 1, '0', '10186018', '10186018'),
(12, 'FACHRURRAZI, MA', '10091053', 'Direktur', '6', 14, '1', '10091053', '10091053'),
(13, 'Kartika Hakim, S.S.,MA', '10151003', 'Kepala SMA', '5', 1, '1', '10151003', '10151003'),
(14, 'CHANDRA NURMANSYAH, S.Si', '10101064', 'Kepala SMP', '4', 1, '1', '10101064', '10101064'),
(15, 'Maina Sara, MA', '11071018', 'Kepala TU', '6', 1, '2', '11071018', '11071018'),
(16, 'DWI WULANDARY, ST., MA', '10081054', 'Guru SMP', '4', 2, '3', '10081054', '10081054'),
(17, 'MARINA NOVA WAHYUNI, ST', '12101107', 'Kepala SD', '3', 1, '1', '12101107', '12101107'),
(18, 'Siti Alpiyah, S.IP', '10061007', 'Kepala Perpustakaan', '8', 1, '1', '10061007', '10061007'),
(19, 'Amrul Hakim', '10201001', 'Guru Olahraga', '3', 3, '3', '10201001', '10201001'),
(20, 'Asmaul Husna ', '10131085', 'Waka Kesiswaan SD', '3', 3, '3', '10131085', '10131085'),
(21, 'Asrita', '10101056', 'Guru Kimia', '5', 4, '3', '10101056', '10101056'),
(22, 'Basiran', '10081051', 'Guru Agama', '4', 2, '3', '10081051', '10081051'),
(23, 'Cut Hafsah', '10081088', 'Guru SD', '3', 3, '3', '10081088', '10081088'),
(24, 'Dhia Rahmat', '10151001', 'Guru Olahraga', '4', 2, '3', '10151001', '10151001'),
(25, 'Dian Ferdiansyah', '10141001', 'Guru Sejarah', '5', 4, '3', '10141001', '10141001'),
(26, 'Dieky Zulfikar MD', '10141002', 'Staf Purchaser', '6', 11, '3', '10141002', '10141002'),
(27, 'Dwi Wulandary', '10081054', 'Guru TIK', '4', 2, '3', '10081054', '10081054'),
(28, 'Erlinawati', '10071031', 'Guru Biologi', '5', 4, '3', '10071031', '10071031'),
(29, 'Fahmi', '11091016', 'Guru Seni', '5', 4, '3', '11091016', '11091016'),
(30, 'Helmiati', '10061019', 'Guru B. Arab/Agama', '5', 4, '3', '10061019', '10061019'),
(31, 'Herlina Sari', '10081089', 'Guru Matematika', '4', 2, '3', '10081089', '10081089'),
(32, 'Hijriati Meutia', '10141003', 'Ka. Koselor', '9', 1, '1', '10141003', '10141003'),
(33, 'Husnul Khatimah', '10201002', 'Guru Biologi', '4', 2, '3', '10201002', '10201002'),
(34, 'Ika Meutia', '10081044', 'Guru SD', '3', 3, '3', '10081044', '10081044'),
(35, 'Indra Saputra', '10081045', 'Staf Finance', '6', 11, '3', '10081045', '10081045'),
(36, 'Masyittah', '11121004', 'Waka Kurikulum SMP', '4', 2, '3', '11121004', '11121004'),
(37, 'Meutia Hesti Paldana', '10151004', 'Guru SD', '4', 2, '3', '10151004', '10151004'),
(38, 'Maichita Mutia', '12141009', 'Guru Matematika', '4', 2, '3', '12141009', '12141009'),
(39, 'Mukhlisanur', '10121083', 'Guru B. Indonesia', '5', 4, '3', '10121083', '10121083'),
(40, 'Nurdiana', '10201003', 'Guru Fisika', '5', 4, '3', '10201003', '10201003'),
(41, 'Nurhilza', '10141005', 'Guru SD', '3', 3, '3', '10141005', '10141005'),
(42, 'Nurlaili', '10111078', 'Guru SD', '3', 3, '3', '10111078', '10111078'),
(43, 'Putri Maulida', '10111076', 'Guru SD', '3', 3, '3', '10111076', '10111076'),
(44, 'Rivanda', '10171001', 'Guru SD', '3', 3, '3', '10171001', '10171001'),
(45, 'Rizka Qonita', '10201004', 'Asst. Konselor', '9', 13, '3', '10201004', '10201004'),
(46, 'Safrida', '10061010', 'Guru  Olahraga', '5', 4, '3', '10061010', '10061010'),
(47, 'Siti Dea Satifa', '10161002', 'Staf Accounting', '6', 11, '3', '10161002', '10161002'),
(48, 'Vera Wahyuni', '11161003', 'Guru Matematika SMA', '5', 4, '3', '11161003', '11161003'),
(49, 'Annisa Ziqra', '10186021', 'Assisten Perpustakaan SD', '8', 12, '3', '10186021', '10186021'),
(50, 'Hurmiati', '10186003', 'Staf Tata Usaha', '6', 11, '3', '10186003', '10186003'),
(51, 'Nurul Aulia', '10186006', 'Guru Kimia', '3', 3, '3', '10186006', '10186006'),
(52, 'Rahmi', '10186017', 'Guru Matematika', '5', 4, '3', '10186017', '10186017'),
(53, 'Rika Julianti', '10196027', 'Guru Ekonomi', '5', 4, '3', '10196027', '10196027'),
(54, 'Badlisyah', '10081057', 'Gardener', '10', 10, '3', '10081057', '10081057'),
(55, 'Faisal M.Syah', '10081074', 'Ketua Regu Keamanan', '10', 10, '3', '10081074', '10081074'),
(56, 'Ishak Abu Bakar ', '10071038', 'Pengemudi', '10', 10, '3', '10071038', '10071038'),
(57, 'Jailani', '10081075', 'Ketua Regu Keamanan', '10', 10, '3', '10081075', '10081075'),
(58, 'Jasmani', '10081058', 'Housekeeping ', '10', 10, '3', '10081058', '10081058'),
(59, 'Junaidi Ali', '10081076', 'Anggota Regu Keamanan', '10', 10, '3', '10081076', '10081076'),
(60, 'Mahyeddin Rusli', '10081059', 'Gardener', '10', 10, '3', '10081059', '10081059'),
(61, 'Mawardi', '10081078', 'Anggota Regu Keamanan', '10', 10, '3', '10081078', '10081078'),
(62, 'Muhammad Ali Kemi', '10081060', 'Maintenance', '10', 10, '3', '10081060', '10081060'),
(63, 'Muhammad', '10081080', 'Anggota Regu Keamanan', '10', 10, '3', '10081080', '10081080'),
(64, 'Mulyadi', '10081081', 'Anggota Regu Keamanan', '10', 10, '3', '10081081', '10081081'),
(65, 'Mukhlis', '12081050', 'Maintenance', '10', 10, '3', '12081050', '12081050'),
(66, 'M. Sanusi', '10081077', 'Ketua Regu Keamanan', '10', 10, '3', '10081077', '10081077'),
(67, 'Rohani', '10081065', 'Cook', '10', 10, '3', '10081065', '10081065'),
(68, 'Rohana Ismail', '10191001', 'Cook', '10', 10, '3', '10191001', '10191001'),
(69, 'Ruslan', '10061030', 'Tenaga Paramedis', '10', 10, '3', '10061030', '10061030'),
(70, 'Saifannur ', '10081066', 'Supervisor Kantin', '10', 10, '3', '10081066', '10081066'),
(71, 'Saiful Anwar', '10081067', 'Ass. Mankom', '10', 1, '1', '10081067', '10081067'),
(72, 'Supriani Rasyid', '10081069', 'Housekeeping ', '10', 10, '3', '10081069', '10081069'),
(73, 'Syeh Mustafa Kamal', '10081085', 'Komandan Keamanan', '10', 10, '3', '10081085', '10081085'),
(74, 'Wardiah', '10081070', 'Housekeeping ', '10', 10, '3', '10081070', '10081070'),
(75, 'Zakaria Rasyid', '10111074', 'Maintenance', '10', 10, '3', '10111074', '10111074'),
(76, 'Zulkarnaini ', '10201005', 'Maintenance', '10', 10, '3', '10201005', '10201005'),
(77, 'Aderiana Masthura, S.Si.', '10206046', 'Guru SD', '3', 3, '3', '10206046', '10206046'),
(78, 'Arafah Nuzula, S.Mat.', '10206045', 'Guru SD', '3', 3, '3', '10206045', '10206045'),
(79, 'Ashil Ulayya, S.Pd.', '10206047', 'Guru SD', '3', 3, '3', '10206047', '10206047'),
(80, 'Dian Manya, S.Pd. ', '10206044', 'Guru SD', '3', 3, '3', '10206044', '10206044'),
(81, 'Desy Zuriyanti, S.Pd.', '10206049', 'Guru Seni', '3', 3, '3', '10206049', '10206049'),
(82, 'Fitriani, S.E.', '10206043', 'Guru SD', '3', 3, '3', '10206043', '10206043'),
(83, 'Firdaus Adiannur, S.Pd.', '10206048', 'Guru Bahasa Indonesia', '4', 2, '3', '10206048', '10206048'),
(84, 'Husna, S.Pd.', '10206040', 'Guru English Conversation', '4', 2, '3', '10206040', '10206040'),
(85, 'Khairun Nisak, S.Pd.', '10206037', 'Guru SD', '3', 3, '3', '10206037', '10206037'),
(86, 'Liza Faradilla, S.Pd.', '10206050', 'Guru SD', '3', 3, '3', '10206050', '10206050'),
(87, 'Norafianti, S.Pd.', '10196028', 'Guru PAI dan Budi Pekerti', '5', 4, '3', '10196028', '10196028'),
(88, 'Rasyidin, B.Is.Hons', '10206051', 'Guru PAI dan Budi Pekerti', '3', 3, '3', '10206051', '10206051'),
(89, 'Sri Mulyati, S.S.', '10206054', 'Guru B. Indonesia', '4', 2, '3', '10206054', '10206054'),
(90, 'Sabri', '10206041', 'Guru Tahsin', '4', 2, '3', '10206041', '10206041'),
(91, 'Turangga Restu Ilvaly, S.Pd', '10196026', 'Guru Olahraga SD', '3', 3, '3', '10196026', '10196026'),
(92, 'Idawati, S. Pd.I.', '10196031', 'Assisten Guru SD', '3', 3, '3', '10196031', '10196031'),
(93, 'Dewi Rahmayanti, S.Pd.I', '10206056', 'Guru B. Inggris', '4', 2, '3', '10206056', '10206056'),
(138, 'VICTOR YASADHANA', '11071017', 'DIREKTUR PENDIDIKAN', '6', 14, '1', '11071017', '11071017');

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
  MODIFY `id_atasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `izin`
--
ALTER TABLE `izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
