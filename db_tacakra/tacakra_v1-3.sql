-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 08:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tacakra`
--

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `no_kk` char(16) NOT NULL,
  `nama` varchar(125) DEFAULT NULL,
  `komplek` varchar(5) DEFAULT NULL,
  `jenis_kelamin` varchar(16) DEFAULT NULL,
  `no_telepon` varchar(16) DEFAULT NULL,
  `tahun_masuk` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `siswa` (`nis`, `nama`, `kelas`, `jenis_kelamin`, `no_telepon`, `tahun_masuk`) VALUES
(10646, 'Adrian Ibrahim Al Agha', '2B', 'Laki-laki', '082314717777', 2021),
(10648, 'Aisyah Syafiqa Rifani', '2B', 'Perempuan', '082314717776', 2021),
(10649, 'Akhmad Dhika Naufal Nafis', '2B', 'Laki-laki', '082314711121', 2021),
(10650, 'Aldebaran Athaila Santoso', '2B', 'Laki-laki', '082314711122', 2021),
(10651, 'Alvario Fadlan Agustino', '2B', 'Laki-laki', '082314711123', 2021),
(10652, 'Aprila Ceta Azzahra', '2B', 'Perempuan', '082314717623', 2021),
(10653, 'Aqila Zhuriatul Diah Khasanah', '2B', 'Perempuan', '081544441234', 2021),
(10654, 'Archie Putri Pratidina', '2B', 'Perempuan', '081544441199', 2021),
(10655, 'Arif Maulana', '2B', 'Laki-laki', '082314711144', 2021),
(10656, 'Arsenio Rajendra Hidayatullah', '2B', 'Laki-laki', '082314711177', 2021),
(10657, 'Aura Salma Putri Wibowo', '2B', 'Perempuan', '081589661234', 2021),
(10658, 'Azhar Pradipta Wahyudi', '2B', 'Laki-laki', '081599991234', 2021),
(10659, 'Dhamar Suryo Aji', '2B', 'Laki-laki', '081599991122', 2021),
(10660, 'Faiza Kirana Fahmi', '2B', 'Perempuan', '082314719912', 2021),
(10661, 'Felicia Jane Dwi Pratista', '2B', 'Perempuan', '082314718812', 2021),
(10662, 'Gibran El Fatih Maulana', '2B', 'Laki-laki', '081567761234', 2021),
(10663, 'Gwen Syareefa Kikandrya', '2B', 'Perempuan', '081523325643', 2021),
(10664, 'Muhammad Alennendra Prihassetio', '2B', 'Laki-laki', '081534231234', 2021),
(10665, 'Muhammad Azka Al Farizi', '2B', 'Laki-laki', '082366546653', 2021),
(10667, 'Naufal Putra Dhaifullah', '2B', 'Laki-laki', '081589654266', 2021),
(10668, 'Queentaozora Rahmadisya Rd Rockabilly', '2B', 'Laki-laki', '081575561234', 2021),
(10669, 'Ratu Khansa Nurqaintan', '2B', 'Perempuan', '082345674432', 2021),
(10670, 'Zaidan Ahsan Susilo', '2B', 'Laki-laki', '081543217546', 2021),
(10671, 'Zhafira Najma Qisya Farzana', '2B', 'Perempuan', '082378543216', 2021),
(10677, 'Haidar Azka Ardhana Putra', '2B', 'Laki-laki', '082345789654', 2021),
(10678, 'Azzah Rifqi Hakim', '6A', 'Laki-laki', '081233446677', 2019),
(20231, 'Abimanyu Surya', '4C', 'Laki-laki', '08329975421', 2018),
(12210867, 'Azzah Rifqi', '1A', 'Laki-laki', '082314717011', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` int(11) NOT NULL,
  `no_kk` char(16) DEFAULT NULL,
  `saldo` int(8) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`id_tabungan`, `no_kk`, `saldo`) VALUES
(1, 10646, 48000),
(2, 10648, 5000),
(3, 10649, 0),
(4, 10650, 0),
(5, 10651, 0),
(8, 10652, 0),
(9, 10653, 0),
(10, 10654, 0),
(11, 10655, 0),
(12, 10656, 0),
(13, 10657, 0),
(14, 10658, 0),
(15, 10659, 0),
(16, 10660, 0),
(17, 10661, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_transaksi` varchar(15) NOT NULL,
  `nominal` int(8) NOT NULL,
  `catatan` varchar(128) NOT NULL,
  `metode_pembayaran` varchar(10) NOT NULL,
  `bukti` varchar(128) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_tabungan` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `jenis_transaksi`, `nominal`, `catatan`, `metode_pembayaran`, `bukti`, `status`, `id_tabungan`, `tanggal`) VALUES
(43, 2, 'Setoran', 58000, 'Setoran', 'Di tempat', '21687702635.jpeg', 'Diterima', 1, 1687702635),
(44, 2, 'Penarikan', 10000, 'Donasi Palestina', 'Di tempat', '21687702681.jpeg', 'Diterima', 1, 1687702681),
(45, 3, 'Setoran', 10000, 'setoran', 'Dana', '31687799849.jpeg', 'Diterima', 2, 1687799849),
(46, 3, 'Penarikan', 5000, 'penarikan', 'Di tempat', '31687799971.jpeg', 'Diterima', 2, 1687799971),
(47, 32, 'Setoran', 58000, 'Setoran rutin', 'Dana', '321688523996.jpg', 'Diterima', 31, 1688523996),
(48, 32, 'Penarikan', 8000, 'penarikan', 'Dana', '321688524132.jpeg', 'Diterima', 31, 1688524132);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_kk` char(16) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `n0_kk`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Admin SITASI', 999, 'default.jpg', '$2y$10$tswI2xnDTZ9r1tGkKe0/vuoX0/ipxGmRK6vxfdk4LlQ/4m4UoegPm', 1, 1, 200033),
(2, 'Adrian Ibrahim Al Agha', 10646, 'default.jpg', '$2y$10$vPgGnHctIirH4hGkNEMITeEilsh1KLrL2e3WylrbGGxfLln6EfUKG', 2, 1, 1683470238),
(3, 'Aisyah Syafiqa Rifani', 10648, 'default.jpg', '$2y$10$S7U2Wd4EK/MkorZOFq8Br.btbyemiZ8fiZAWn.S4RqNUpxozHBu/2', 2, 1, 1683470873),
(4, 'Akhmad Dhika Naufal Nafis', 10649, 'default.jpg', '$2y$10$Mu4RKP7pu3yvQ2jT3VAN9e6Qmkf/7MY.N3XW.T3pLc8svjqFSRYl2', 2, 1, 1683819816),
(5, 'Aldebaran Athaila Santoso', 10650, 'default.jpg', '$2y$10$XwqyvtmZ7G14QOIwgbF/1ev8mXhyaSjo3iWWG5Px4PjjjiBFo8n7.', 2, 1, 1683819921),
(6, 'Alvario Fadlan Agustino', 10651, 'default.jpg', '$2y$10$k.QlMXWNBJzeMNMdsMvTbeNyxOdtxfJIxMQ91KlfUSB7rnfRg38tm', 2, 1, 1683819972),
(9, 'Aprila Ceta Azzahra', 10652, 'default.jpg', '$2y$10$OwVAp0SSH.1Igq2WUCzHXOqMWgist8qi9XFMDkGBQRLXLYv7ttD5C', 2, 1, 1686414517),
(10, 'Aqila Zhuriatul Diah Khasanah', 10653, 'default.jpg', '$2y$10$lcYcR1pIjLpVf7ASwIl1aedFwhiO/XdiG.jSoKOVXMLGK3sLFBAci', 2, 1, 1686414599),
(11, 'Archie Putri Pratidina', 10654, 'default.jpg', '$2y$10$npwrv.F0N6ZNneK3PkBgROwwg/oP71sDsshAh2.FZrfZ9kPvGzwhK', 2, 1, 1686414677),
(12, 'Arif Maulana', 10655, 'default.jpg', '$2y$10$0UPi58Tea.YVo5w.A1ZfL.1eRA3nXATS/b1EMFxSzI//E/bhRphz.', 2, 1, 1686414763),
(13, 'Arsenio Rajendra Hidayatullah', 10656, 'default.jpg', '$2y$10$sXOQnOEpAs/sIS68YjNPyOz4McDpnYjl0sqyQcUZMPsPjBrbEWQoe', 2, 1, 1686414812),
(14, 'Aura Salma Putri Wibowo', 10657, 'default.jpg', '$2y$10$neA4s0uNo/Wj.9Q.Zqxba.r8TXZwG1qLV3cn8ci9YI9b./twzF8GO', 2, 1, 1686414854),
(15, 'Azhar Pradipta Wahyudi', 10658, 'default.jpg', '$2y$10$wD5kYpoAyE5H1rxeJoQ7qu5ooBQzJ7.WCdsdCmLaK8i/5B2Sj3ub2', 2, 1, 1686414947),
(16, 'Dhamar Suryo Aji', 10659, 'default.jpg', '$2y$10$0wkGieTHU7536x5i3G9PBOOQF74NqrCJY41.LYdfsMyA2BylDp7.6', 2, 1, 1686415030),
(17, 'Faiza Kirana Fahmi', 10660, 'default.jpg', '$2y$10$dWSrUtSYPUSqwqcEFWleL.GD491JjUjsxFfVQXEn6KpRIS4tQG6ia', 2, 1, 1686415117),
(18, 'Felicia Jane Dwi Pratista', 10661, 'default.jpg', '$2y$10$.t4dM2AzaEBE7kvtR5SuKe3Sv9j/yuWkETxGxSHGQyQPM3etA4iUW', 2, 1, 1686415168),
(19, 'Gibran El Fatih Maulana', 10662, 'default.jpg', '$2y$10$1u.jK2iPXexKZd48pQUco.pfIrzkN/qWSNtHAvBd0uei6CkKfLtJm', 2, 1, 1686415396),
(20, 'Gwen Syareefa Kikandrya', 10663, 'default.jpg', '$2y$10$ds4lH9nKEfj9a3BFaqCvaeA3CneomBsGBiOGgOQpTSA0WhTRZ0hhu', 2, 1, 1686415623),
(21, 'Muhammad Alennendra Prihassetio', 10664, 'default.jpg', '$2y$10$SVExJuwnpNzx63P.UIo1NuWq.Q.KuaEf0HKiUc6ZjQmq4VNfOx57u', 2, 1, 1686415754),
(22, 'Muhammad Azka Al Farizi', 10665, 'default.jpg', '$2y$10$8ZIxhhwFp.Pp6ah1g6P6ReYT0CKQJ2hAkeBC8sp88hPBH9XIxiE8u', 2, 1, 1686415888),
(23, 'Naufal Putra Dhaifullah', 10667, 'default.jpg', '$2y$10$zR9A49dagcA9mk4IbX/CX.NX79ealT0sM.5fFGD4uLRTV9ldQIINu', 2, 1, 1686416232),
(24, 'Queentaozora Rahmadisya Rd Rockabilly', 10668, 'default.jpg', '$2y$10$82B0/njgjr1WJZp8gHsUiuFEz14WqLIIvp6Nw/0imrzGdKwAWOUIe', 2, 1, 1686416563),
(25, 'Ratu Khansa Nurqaintan', 10669, 'default.jpg', '$2y$10$TssP79q77hXj6IxaMRpB7eX3EQo/SjteJQK2D4WU9itqtXqtaY8sm', 2, 1, 1686416657),
(26, 'Zaidan Ahsan Susilo', 10670, 'default.jpg', '$2y$10$.pYGwJLai2lxOIxGy5iPe.BIf4QqZSIpxN/8Kfs/yFlb57s2ezKJC', 2, 1, 1686416807),
(27, 'Zhafira Najma Qisya Farzana', 10671, 'default.jpg', '$2y$10$jBIDKF0T89Mdq4FMRCHMS.8Wo7ffS.X6C10dYkQy2mQcxeHEqZUOa', 2, 1, 1686416873),
(28, 'Haidar Azka Ardhana Putra', 10677, 'default.jpg', '$2y$10$TOS431JHNVYbB5K5cyLKV.vVN/kQXIJJEBWDeVJsxSqEJqzzKt6LG', 2, 1, 1686416931),
(30, 'Azzah Rifqi Hakim', 10678, 'default.jpg', '$2y$10$VOVzlnupP1JjwIfx3px/b.mfgeI88hlkv/0WOeIeYyIb4.1tP8ZdC', 2, 1, 1687675454),
(31, 'Abimanyu Surya', 20231, 'default.jpg', '$2y$10$VfpHQOs/QuPlb5nlYOa/HO1fix1B8VjXOOalTTKW/Ii6nPOaAx1qu', 2, 1, 1687800185),
(32, 'Azzah Rifqi', 12210867, 'default.jpg', '$2y$10$ZJ1HZEaPOCekZnWDNG6k7.fPfmNjeu.b4izqs8dgNR9VdRPydGeiq', 2, 1, 1688523851);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Warga');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`),
  ADD KEY `no_kk` (`no_kk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `tabungan_id` (`id_tabungan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `no_kk` (`no_kk`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD CONSTRAINT `tabungan_ibfk_1` FOREIGN KEY (`no_kk`) REFERENCES `warga` (`no_kk`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_tabungan`) REFERENCES `tabungan` (`id_tabungan`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
