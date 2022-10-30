-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Sep 2022 pada 11.48
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apk_pupr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `prov_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `prov_id`) VALUES
(107, 'OGAN KOMERING ULU', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `districts`
--

CREATE TABLE `districts` (
  `dis_id` int(11) NOT NULL,
  `dis_name` varchar(255) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `districts`
--

INSERT INTO `districts` (`dis_id`, `dis_name`, `city_id`) VALUES
(1229, 'BATURAJA BARAT', 107),
(1244, 'BATURAJA TIMUR', 107),
(1251, 'LUBUK BATANG', 107),
(1294, 'LENGKITI', 107),
(1296, 'SOSOH BUAY RAYAP', 107),
(1315, 'SEMIDANG AJI', 107),
(1320, 'LUBUK RAJA', 107),
(1337, 'PENGANDONAN', 107),
(1338, 'ULU OGAN', 107),
(1340, 'PENINJAUAN', 107),
(1348, 'MUARA JAYA', 107),
(1418, 'SINAR PENINJAUAN', 107);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalan`
--

CREATE TABLE `jalan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `prov_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `dis_id` int(11) DEFAULT NULL,
  `subdis_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `panjang_jalan` float NOT NULL,
  `lebar_jalan` float NOT NULL,
  `tebal_jalan` float NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jalan`
--

INSERT INTO `jalan` (`id`, `nama_kegiatan`, `prov_id`, `city_id`, `dis_id`, `subdis_id`, `user_id`, `panjang_jalan`, `lebar_jalan`, `tebal_jalan`, `tahun`) VALUES
(2, 'Pembangunan Jalan', 6, 107, 1229, 0, 8, 1, 2, 3, 2022),
(3, 'Pembangunan Jalan', 6, 107, 1244, 19641, 8, 100, 5, 5, 2022),
(4, 'Pembangunan Jalan', 6, 107, 1244, 17788, 8, 150, 8, 8, 2022),
(5, 'Pembangunan Jalan', 6, 107, 1229, 16990, 8, 10.5, 5, 5, 2022),
(6, 'Pembangunan Jalan', 6, 107, 1251, 19641, 8, 50.5, 5.6, 5.6, 2022),
(7, 'Pembangunan Jalan', 6, 107, 1294, 0, 8, 100, 8, 8, 2022),
(8, 'Pembangunan Jalan', 6, 107, 1296, 17076, 8, 80, 8, 8, 2022),
(9, 'Pembangunan Jalan', 6, 107, 1315, 0, 8, 100, 10, 8, 2021),
(10, 'Pembangunan Jalan', 6, 107, 1320, 0, 8, 100, 10, 8, 2021),
(11, 'Pembangunan Jalan', 6, 107, 1320, 0, 8, 100, 10, 8, 2021),
(12, 'Pembangunan Jalan', 6, 107, 1337, 0, 8, 100, 10, 8, 2021),
(13, 'Pembangunan Jalan', 6, 107, 1229, 0, 8, 200, 10, 8, 2021),
(14, 'Pembangunan Jalan', 6, 107, 1315, 0, 8, 132, 10, 8, 2022),
(15, 'Pembangunan Jalan', 6, 107, 1338, 0, 8, 119, 8, 8, 2022),
(16, 'Pembangunan Jalan', 6, 107, 1340, 0, 8, 172, 10, 7, 2022),
(17, 'Pembangunan Jalan', 6, 107, 1348, 0, 8, 127, 10, 8, 2022),
(18, 'Pembangunan Jalan', 6, 107, 1418, 0, 8, 112, 10, 8, 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `prov_id` int(11) NOT NULL,
  `prov_name` varchar(255) DEFAULT NULL,
  `locationid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `provinces`
--

INSERT INTO `provinces` (`prov_id`, `prov_name`, `locationid`, `status`) VALUES
(6, 'SUMATERA SELATAN', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subdistricts`
--

CREATE TABLE `subdistricts` (
  `subdis_id` int(11) NOT NULL,
  `subdis_name` varchar(255) DEFAULT NULL,
  `dis_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `subdistricts`
--

INSERT INTO `subdistricts` (`subdis_id`, `subdis_name`, `dis_id`) VALUES
(16990, 'AIR GADING', 1229),
(17008, 'AIR PAOH / PAUH', 1244),
(17020, 'AIR WALL', 1251),
(17076, 'BANDAR AGUNG', 1251),
(17085, 'BANDAR JAYA', 1294),
(17089, 'BANDAR', 1296),
(17121, 'BANJAR SARI', 1315),
(17127, 'BANU AYU', 1251),
(17139, 'BATANG HARI', 1315),
(17141, 'BATTU WINANGUN', 1320),
(17155, 'BATU KUNING', 1229),
(17159, 'BATU PUTIH', 1229),
(17160, 'BATU RADEN', 1320),
(17170, 'BATUMARTA I', 1320),
(17171, 'BATUMARTA II', 1320),
(17176, 'BATURAJA LAMA', 1244),
(17177, 'BATURAJA PERMAI', 1244),
(17184, 'BEDEGUNG', 1315),
(17193, 'BELAMBANGAN', 1337),
(17194, 'BELANDANG', 1338),
(17198, 'BELATUNG', 1251),
(17201, 'BELIMBING', 1340),
(17222, 'BERINGIN', 1348),
(17245, 'BINDU', 1340),
(17285, 'BUMI KAWA', 1294),
(17301, 'BUNGA TANJUNG', 1294),
(17305, 'BUNGLAI', 1340),
(17401, 'DURIAN', 1340),
(17418, 'FAJAR JAYA', 1294),
(17448, 'GEDUNG PAKUAN / PEKUON', 1294),
(17470, 'GUNA MAKMUR', 1315),
(17496, 'GUNUNG KURIPAN', 1337),
(17498, 'GUNUNG LIWAT', 1337),
(17508, 'GUNUNG MERAKSA', 1251),
(17509, 'GUNUNG MERAKSA', 1337),
(17520, 'GUNUNG TIGA', 1338),
(17615, 'KAMPAI', 1340),
(17626, 'KARANG AGUNG', 1229),
(17658, 'KARANG DAPO', 1340),
(17660, 'KARANG ENDAH', 1229),
(17664, 'KARANG ENDAH', 1294),
(17677, 'KARANG LANTANG', 1348),
(17713, 'KARTA MULIA', 1251),
(17720, 'KARYA JAYA', 1418),
(17729, 'KARYA MUKTI', 1418),
(17761, 'KEBON AGUNG', 1315),
(17767, 'KEBUN JATI', 1315),
(17770, 'KEDATON TIMUR', 1340),
(17774, 'KEDATON', 1340),
(17776, 'KEDONDONG', 1340),
(17786, 'KELUMPANG', 1338),
(17787, 'KEMALA JAYA', 1348),
(17788, 'KEMALA RAJA', 1244),
(17806, 'KEMELAK BINDUNG LANGIT', 1244),
(17822, 'KEPAYANG', 1340),
(17843, 'KESAMBI RATA', 1337),
(17900, 'KUNGKILAN', 1296),
(17915, 'KURUP', 1251),
(17938, 'LAYA', 1229),
(17953, 'LEKIS REJO', 1320),
(17976, 'LONTAR', 1348),
(17985, 'LUBUK BANJAR', 1251),
(17986, 'LUBUK BANJAR', 1320),
(17987, 'LUBUK BARU', 1296),
(17988, 'LUBUK BATANG BARU', 1251),
(17989, 'LUBUK BATANG LAMA', 1251),
(17999, 'LUBUK DALAM', 1294),
(18005, 'LUBUK HARA', 1294),
(18012, 'LUBUK KEMILING', 1340),
(18022, 'LUBUK LEBAN', 1296),
(18044, 'LUBUK RUKAM', 1340),
(18066, 'LUBUK TUPAK', 1348),
(18071, 'LUNGGAIAN', 1251),
(18086, 'MAKARTI JAYA', 1340),
(18088, 'MAKARTI TAMA', 1340),
(18116, 'MARGA BAKTI', 1418),
(18122, 'MARGA MULYA', 1418),
(18147, 'MARKISA', 1251),
(18148, 'MARTA JAYA', 1320),
(18175, 'MEKAR JAYA', 1296),
(18183, 'MEKAR SARI', 1296),
(18203, 'MENDALA', 1340),
(18205, 'MENDINGIN', 1338),
(18218, 'MERBAU', 1251),
(18227, 'MITRA KENCANA', 1340),
(18303, 'MUARA SAEH', 1348),
(18373, 'NEGERI AGUNG', 1294),
(18383, 'NEGERI RATU', 1294),
(18386, 'NEGERI SINDANG', 1296),
(18418, 'NYIUR SAYAK', 1315),
(18427, 'PADANG BINDU', 1315),
(18463, 'PAGAR DEWA', 1294),
(18488, 'PAJAR BULAN', 1294),
(18504, 'PANAI MAKMUR', 1315),
(18523, 'PANDAN DULANG', 1315),
(18532, 'PANGGAL PANGGAL', 1315),
(18550, 'PANTI JAYA', 1340),
(18553, 'PASAR BARU', 1244),
(18559, 'PASAR LAMA', 1244),
(18595, 'PEDATARAN', 1338),
(18644, 'PENANTIAN', 1296),
(18652, 'PENGANDONAN', 1337),
(18654, 'PENGARINGAN', 1315),
(18659, 'PENILIKAN / MITRA OGAN', 1340),
(18665, 'PENINJAUAN', 1340),
(18672, 'PENYANDINGAN', 1296),
(18794, 'PUSAR', 1229),
(18801, 'RAKSA JIWA', 1315),
(18824, 'RANTAU KUMPAI', 1296),
(18831, 'RANTAU PANJANG', 1340),
(18917, 'SAUNG NAGA', 1229),
(18920, 'SAUNG NAGA', 1340),
(18934, 'SEGARA KEMBANG', 1294),
(18953, 'SELEMAN', 1315),
(18956, 'SEMANDING', 1337),
(18976, 'SEPANCAR LAWANG KULON', 1244),
(19055, 'SIMPANG EMPAT', 1294),
(19089, 'SINAR KEDATON', 1340),
(19104, 'SINGAPURA', 1315),
(19125, 'SP TIGA', 1340),
(19143, 'SRI MULYA', 1418),
(19219, 'SUKA MERINDU', 1315),
(19230, 'SUKA PINDAH', 1340),
(19250, 'SUKAJADI', 1244),
(19257, 'SUKAJADI', 1338),
(19267, 'SUKAMAJU', 1229),
(19303, 'SUKARAJA', 1294),
(19324, 'SUKARAMI', 1315),
(19329, 'SUKARAYA', 1244),
(19403, 'SUNDAN', 1294),
(19480, 'SURAU', 1348),
(19532, 'TALANG JAWA', 1229),
(19607, 'TANGSI LONTAR', 1337),
(19616, 'TANJUNG AGUNG', 1229),
(19619, 'TANJUNG AGUNG', 1294),
(19641, 'TANJUNG BARU', 1244),
(19682, 'TANJUNG DALAM', 1251),
(19705, 'TANJUNG KARANG', 1229),
(19710, 'TANJUNG KEMALA', 1244),
(19728, 'TANJUNG KURUNG', 1315),
(19737, 'TANJUNG LENGKAYAP', 1294),
(19743, 'TANJUNG MAKMUR', 1418),
(19745, 'TANJUNG MANGGUS', 1251),
(19781, 'TANJUNG PURA', 1337),
(19811, 'TANJUNG SARI', 1337),
(19832, 'TANJUNGAN', 1337),
(19858, 'TEBING KAMPUNG', 1315),
(19923, 'TERUSAN', 1244),
(19926, 'TIHANG', 1294),
(19956, 'TUALANG', 1294),
(19958, 'TUBOHAN', 1315),
(19981, 'TUNGKU JAYA', 1296),
(19984, 'UJAN MAS', 1337),
(20018, 'ULAK LEBAR', 1338),
(20025, 'ULAK PANDAN', 1315),
(20036, 'UMPAN', 1294),
(20055, 'WAY HELING', 1294);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level_user` int(11) NOT NULL,
  `original_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama`, `kontak`, `password`, `last_login`, `level_user`, `original_pass`) VALUES
(8, '11111', 'Admin', '081299929922', '$2y$10$i6LAb9xDh4G.pgVZ.cGknOUtRiPvK5SAW8SeMvAnICqKvnejunsQS', '2022-09-24 04:28:16', 1, ''),
(14, '22222', 'Pimpinan', '082189299222', '$2y$10$bMYspn86xs5Syrp9uclhu.WnCGUm9ZOhq2QBKaS8fWZGsxQro3aoW', '2022-09-18 02:46:04', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`) USING BTREE;

--
-- Indeks untuk tabel `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`dis_id`) USING BTREE;

--
-- Indeks untuk tabel `jalan`
--
ALTER TABLE `jalan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`prov_id`) USING BTREE;

--
-- Indeks untuk tabel `subdistricts`
--
ALTER TABLE `subdistricts`
  ADD PRIMARY KEY (`subdis_id`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `level_user` (`level_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=476;

--
-- AUTO_INCREMENT untuk tabel `districts`
--
ALTER TABLE `districts`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6995;

--
-- AUTO_INCREMENT untuk tabel `jalan`
--
ALTER TABLE `jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `provinces`
--
ALTER TABLE `provinces`
  MODIFY `prov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `subdistricts`
--
ALTER TABLE `subdistricts`
  MODIFY `subdis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81226;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jalan`
--
ALTER TABLE `jalan`
  ADD CONSTRAINT `jalan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_user`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
