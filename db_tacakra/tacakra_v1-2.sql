/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.28-MariaDB : Database - sitasi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sitasi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `sitasi`;

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(125) DEFAULT NULL,
  `kelas` varchar(5) DEFAULT NULL,
  `jenis_kelamin` varchar(16) DEFAULT NULL,
  `no_telepon` varchar(16) DEFAULT NULL,
  `tahun_masuk` int(4) DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `siswa` */

insert  into `siswa`(`nis`,`nama`,`kelas`,`jenis_kelamin`,`no_telepon`,`tahun_masuk`) values 
(10646,'Adrian Ibrahim Al Agha','2B','Laki-laki','082314717777',2021),
(10648,'Aisyah Syafiqa Rifani','2B','Perempuan','082314717776',2021),
(10649,'Akhmad Dhika Naufal Nafis','2B','Laki-laki','082314711121',2021),
(10650,'Aldebaran Athaila Santoso','2B','Laki-laki','082314711122',2021),
(10651,'Alvario Fadlan Agustino','2B','Laki-laki','082314711123',2021);

/*Table structure for table `tabungan` */

DROP TABLE IF EXISTS `tabungan`;

CREATE TABLE `tabungan` (
  `id_tabungan` int(11) NOT NULL AUTO_INCREMENT,
  `nis` int(11) DEFAULT NULL,
  `saldo` int(8) DEFAULT 0,
  PRIMARY KEY (`id_tabungan`),
  KEY `nis` (`nis`),
  CONSTRAINT `tabungan_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabungan` */

insert  into `tabungan`(`id_tabungan`,`nis`,`saldo`) values 
(1,10646,58000),
(2,10648,48000),
(3,10649,0),
(4,10650,58000),
(5,10651,0);

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `jenis_transaksi` varchar(15) DEFAULT NULL,
  `nominal` int(8) DEFAULT NULL,
  `metode_pembayaran` varchar(10) DEFAULT NULL,
  `bukti` varchar(128) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `id_tabungan` int(11) DEFAULT NULL,
  `tanggal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `user_id` (`id_user`),
  KEY `tabungan_id` (`id_tabungan`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_tabungan`) REFERENCES `tabungan` (`id_tabungan`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id_transaksi`,`id_user`,`jenis_transaksi`,`nominal`,`metode_pembayaran`,`bukti`,`status`,`id_tabungan`,`tanggal`) values 
(22,3,'Setoran',5000,'Dana','31685713296.jpg','Ditolak',2,1685713296),
(23,3,'Setoran',20000,'Dana','31685713728.png','Ditolak',2,1685713728),
(24,3,'Setoran',58000,'Dana','31685714692.jpeg','Diterima',2,1685714692),
(25,3,'Penarikan',10000,'Dana','','Diterima',2,1685714744),
(26,3,'Penarikan',8000,'Dana','','Ditolak',2,1685719485),
(27,2,'Setoran',58000,'Dana','21685722213.jpeg','Diterima',1,1685722213),
(28,3,'Penarikan',2000,'Dana','','Diproses',2,1685883743),
(29,3,'Setoran',10000,'Dana','31685885941.jpeg','Ditolak',2,1685885941),
(30,3,'Setoran',58000,'Dana','31685886391.jpeg','Diproses',2,1685886391),
(31,3,'Setoran',58000,'Dana','31685903703.jpeg','Diproses',2,1685903703),
(32,5,'Setoran',58000,'Dana','51686060178.jpg','Diterima',4,1686060178),
(33,5,'Penarikan',5000,'Di tempat','','Diproses',4,1686061492);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `nis` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `nis` (`nis`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`nis`,`image`,`password`,`role_id`,`is_active`,`date_created`) values 
(1,'Admin SITASI',999,'default.jpg','$2y$10$tswI2xnDTZ9r1tGkKe0/vuoX0/ipxGmRK6vxfdk4LlQ/4m4UoegPm',1,1,200033),
(2,'Adrian Ibrahim Al Agha',10646,'default.jpg','$2y$10$vPgGnHctIirH4hGkNEMITeEilsh1KLrL2e3WylrbGGxfLln6EfUKG',2,1,1683470238),
(3,'Aisyah Syafiqa Rifani',10648,'default.jpg','$2y$10$S7U2Wd4EK/MkorZOFq8Br.btbyemiZ8fiZAWn.S4RqNUpxozHBu/2',2,1,1683470873),
(4,'Akhmad Dhika Naufal Nafis',10649,'default.jpg','$2y$10$Mu4RKP7pu3yvQ2jT3VAN9e6Qmkf/7MY.N3XW.T3pLc8svjqFSRYl2',2,1,1683819816),
(5,'Aldebaran Athaila Santoso',10650,'default.jpg','$2y$10$XwqyvtmZ7G14QOIwgbF/1ev8mXhyaSjo3iWWG5Px4PjjjiBFo8n7.',2,1,1683819921),
(6,'Alvario Fadlan Agustino',10651,'default.jpg','$2y$10$k.QlMXWNBJzeMNMdsMvTbeNyxOdtxfJIxMQ91KlfUSB7rnfRg38tm',2,1,1683819972);

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`role`) values 
(1,'Admin'),
(2,'Siswa');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
