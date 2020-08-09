-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2020 pada 01.48
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `partvisit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_activity_plan`
--

CREATE TABLE `tb_activity_plan` (
  `ap_id` int(11) NOT NULL,
  `ap_id_sales` int(11) NOT NULL,
  `ap_id_customer` int(11) NOT NULL,
  `ap_plan_revenue` int(11) NOT NULL,
  `ap_visit` int(11) NOT NULL,
  `ap_bulan_tahun` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_no` varchar(20) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_channel` varchar(20) NOT NULL,
  `customer_jenis` varchar(20) NOT NULL,
  `customer_alamat` text NOT NULL,
  `status` int(11) NOT NULL,
  `creaby` int(11) NOT NULL,
  `creadate` datetime NOT NULL,
  `modby` int(11) DEFAULT NULL,
  `moddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`customer_id`, `customer_no`, `customer_name`, `customer_channel`, `customer_jenis`, `customer_alamat`, `status`, `creaby`, `creadate`, `modby`, `moddate`) VALUES
(1, '5200010153', 'Armada Auto Tara', '3S', 'Customer Aktif', 'Kalimalang Jakarta\r\n                    ', 1, 1, '2020-03-27 18:09:29', 1, '2020-03-27 18:19:33'),
(2, '11221', 'Armada Auto Tara', '3S', 'Customer Non Aktif', 'Bekasi Utara', 1, 1, '2020-04-07 16:13:18', 1, '2020-04-30 03:58:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_info`
--

CREATE TABLE `tb_info` (
  `id_info` int(11) NOT NULL,
  `nama_info` varchar(100) NOT NULL,
  `desc_info` varchar(255) DEFAULT NULL,
  `info_file` longtext DEFAULT NULL,
  `status` int(11) NOT NULL,
  `moddate` date NOT NULL,
  `modby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_promo`
--

CREATE TABLE `tb_promo` (
  `id_promo` int(11) NOT NULL,
  `promo` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `promo_file` longtext DEFAULT NULL,
  `status` int(11) NOT NULL,
  `moddate` date NOT NULL,
  `modby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_promo`
--

INSERT INTO `tb_promo` (`id_promo`, `promo`, `deskripsi`, `promo_file`, `status`, `moddate`, `modby`) VALUES
(14, 'get 1 ', 'get1', NULL, 1, '2020-06-04', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_revenue`
--

CREATE TABLE `tb_revenue` (
  `rev_id` int(11) NOT NULL,
  `rev_id_ap` int(11) NOT NULL,
  `rev_week1` int(11) DEFAULT 0,
  `rev_week2` int(11) DEFAULT 0,
  `rev_week3` int(11) DEFAULT 0,
  `rev_week4` int(11) DEFAULT 0,
  `rev_total` int(11) DEFAULT 0,
  `rev_result` varchar(100) DEFAULT NULL,
  `rev_evaluasi` varchar(255) DEFAULT NULL,
  `rev_sisa` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(20) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `creaby` int(11) NOT NULL,
  `creadate` datetime NOT NULL,
  `modby` int(11) DEFAULT NULL,
  `moddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nama_role`, `deskripsi`, `status`, `creaby`, `creadate`, `modby`, `moddate`) VALUES
(1, 'superadministrator', 'Super Administrator Adalah seorang yang bertanggung jawab sebagai kepala dari semua administrator', 1, 1, '2020-03-22 00:00:00', 1, '2020-03-23 15:04:06'),
(2, 'Administrator', 'Administrator berperan sebagai admin', 1, 1, '2020-03-22 12:19:00', 1, '2020-03-23 15:03:55'),
(3, 'Sales', 'Menangani Penjualan', 1, 1, '2020-03-28 09:36:47', 1, '2020-03-28 09:37:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_karyawan` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto_profil` text DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `creaby` int(11) NOT NULL,
  `creadate` datetime NOT NULL,
  `modby` int(11) DEFAULT NULL,
  `moddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_role`, `id_karyawan`, `nama`, `alamat`, `no_telp`, `tgl_lahir`, `email`, `foto_profil`, `username`, `password`, `jenis_kelamin`, `status`, `creaby`, `creadate`, `modby`, `moddate`) VALUES
(1, 1, '1', 'Hendy', 'Jakarta', '0801902312', '2020-03-31', 'hendy@gmail.com', '1.jpg', 'admin', 'admin', 'Male', 1, 1, '2020-03-22 00:11:00', 1, '2020-05-23 10:21:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_visit`
--

CREATE TABLE `tb_visit` (
  `visit_id` int(11) NOT NULL,
  `visit_id_ap` int(11) NOT NULL,
  `visit_tanggal` date NOT NULL,
  `visit_kegiatan` varchar(50) DEFAULT NULL,
  `visit_jenis_FU` varchar(50) DEFAULT NULL,
  `visit_result_FU` varchar(255) DEFAULT NULL,
  `visit_problem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_activity_plan`
--
ALTER TABLE `tb_activity_plan`
  ADD PRIMARY KEY (`ap_id`),
  ADD KEY `ap_id_sales` (`ap_id_sales`),
  ADD KEY `ap_id_customer` (`ap_id_customer`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `modby` (`modby`);

--
-- Indeks untuk tabel `tb_promo`
--
ALTER TABLE `tb_promo`
  ADD PRIMARY KEY (`id_promo`),
  ADD KEY `modby` (`modby`);

--
-- Indeks untuk tabel `tb_revenue`
--
ALTER TABLE `tb_revenue`
  ADD PRIMARY KEY (`rev_id`),
  ADD KEY `rev_id_ap` (`rev_id_ap`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `tb_visit`
--
ALTER TABLE `tb_visit`
  ADD PRIMARY KEY (`visit_id`),
  ADD KEY `visit_id_ap` (`visit_id_ap`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_promo`
--
ALTER TABLE `tb_promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_revenue`
--
ALTER TABLE `tb_revenue`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_visit`
--
ALTER TABLE `tb_visit`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_activity_plan`
--
ALTER TABLE `tb_activity_plan`
  ADD CONSTRAINT `tb_activity_plan_ibfk_1` FOREIGN KEY (`ap_id_sales`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_activity_plan_ibfk_2` FOREIGN KEY (`ap_id_customer`) REFERENCES `tb_customer` (`customer_id`);

--
-- Ketidakleluasaan untuk tabel `tb_info`
--
ALTER TABLE `tb_info`
  ADD CONSTRAINT `tb_info_ibfk_1` FOREIGN KEY (`modby`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_promo`
--
ALTER TABLE `tb_promo`
  ADD CONSTRAINT `tb_promo_ibfk_1` FOREIGN KEY (`modby`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_revenue`
--
ALTER TABLE `tb_revenue`
  ADD CONSTRAINT `tb_revenue_ibfk_2` FOREIGN KEY (`rev_id_ap`) REFERENCES `tb_activity_plan` (`ap_id`);

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id_role`);

--
-- Ketidakleluasaan untuk tabel `tb_visit`
--
ALTER TABLE `tb_visit`
  ADD CONSTRAINT `tb_visit_ibfk_1` FOREIGN KEY (`visit_id_ap`) REFERENCES `tb_activity_plan` (`ap_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
