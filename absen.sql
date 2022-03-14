/*
SQLyog Trial v13.1.9 (64 bit)
MySQL - 10.1.37-MariaDB : Database - absen
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`absen` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `absen`;

/*Table structure for table `absen` */

DROP TABLE IF EXISTS `absen`;

CREATE TABLE `absen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  PRIMARY KEY (`id`,`id_siswa`),
  KEY `id_siswa` (`id_siswa`),
  CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `absen` */

insert  into `absen`(`id`,`id_siswa`,`tanggal`,`add_date`,`foto`,`status`) values 
(1,2,'2020-07-16','2020-07-16 07:48:19','73458834.jpg',0);

/*Table structure for table `places` */

DROP TABLE IF EXISTS `places`;

CREATE TABLE `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `places` */

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `kelas` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

/*Data for the table `siswa` */

insert  into `siswa`(`id`,`nik`,`nama`,`status`,`kelas`) values 
(1,'18197108','Achmad Arief Ramdhani',0,'8 E'),
(2,'18197285','Adisty Aulia',0,'8 E'),
(3,'18197077','ALIYA ANGGRAENI',0,'8 E'),
(4,'18197181','ALYA PUTRI HERILIANA',0,'8 E'),
(5,'18197253','ANUGERAH KRISTIAN ZEGA',0,'8 E'),
(6,'18197005','Athalla Fauzan Hermawan',0,'8 E'),
(7,'18197221','AUREL MAYORI PUTRI',0,'8 E'),
(8,'18197151','Cheril Agata Fernanda',0,'8 E'),
(9,'18197325','EKA PRATIWI ARVIANA',0,'8 E'),
(10,'18197118','FARRAS NUR AJMII',0,'8 E'),
(11,'18197161','FIRZA REINA AURELLIA',0,'8 E'),
(12,'18197015','Garin Junaedi Nugraha',0,'8 E'),
(13,'18197087','Habibah',0,'8 E'),
(14,'18197295','HAWA SOLEHUDIN',0,'8 E'),
(15,'18197046','Indria Shilfanny',0,'8 E'),
(16,'18197263','JECHO FERDIAN RAIFAIZI',0,'8 E'),
(17,'18197363','JESSICA DHONA AMANDA',0,'8 E'),
(18,'18197232','JOSHUA ALBERTO',0,'8 E'),
(19,'18197367','KANAKA KHANSA KAUTSAR',0,'8 E'),
(20,'18197191','KHONSA IZZATI',0,'8 E'),
(21,'18197335','Ledi Lofiana Sihotang',0,'8 E'),
(22,'18197056','Muhamad Argi Pahrijani',0,'8 E'),
(23,'18197305','MUHAMMAD JORDAN SATRIO',0,'8 E'),
(24,'18197131','Naura Aninditha Purnomo',0,'8 E'),
(25,'18197345','Niswa Sahda Wahyudi',0,'8 E'),
(26,'18197171','OLIVIA FAUZIAH HARDIYANTI',0,'8 E'),
(27,'18197201','PRISKA CHRISTY AYUDIAH',0,'8 E'),
(28,'18197097','PUTRI AMANDA SIMBOLON',0,'8 E'),
(29,'18197026','Rafa Arsyi Reddin',0,'8 E'),
(30,'18197242','Ribi Wahyuni',0,'8 E'),
(31,'18197273','Rosita',0,'8 E'),
(32,'18197067','SHAFIRA NAYLA MAHARANI',0,'8 E'),
(33,'18197141','SITI MARATUS SOLEHA',0,'8 E'),
(34,'18197211','TEMMY SAPUTRA',0,'8 E'),
(35,'18197036','Yunus Apriyanto',0,'8 E'),
(36,'18197286','ADITYA NURFADILAH',0,'9 F'),
(37,'18197037','AKMAL MAULANA SANUSI',0,'9 F'),
(38,'18197078','AMANDA NAFISHA',0,'9 F'),
(39,'18197109','ANDIKA RIZKY PRATAMA',0,'9 F'),
(40,'18197182','ARIEL BAGUS DANUARTA',0,'9 F'),
(41,'18197254','ARMINANDA KHANSA SADIYA',0,'9 F'),
(42,'18197006','AULIA ZALFA ARIDA',0,'9 F'),
(43,'18197222','AYUNDI AULIA BAHARI',0,'9 F'),
(44,'18197152','DANI SETIAWAN',0,'9 F'),
(45,'18197326','EKO MUHAMMAD RIZKI',0,'9 F'),
(46,'18197119','FAUZAN MUFTI ALFARIZI',0,'9 F'),
(47,'18197162','GLADYS VIRGIANES SORAYA',0,'9 F'),
(48,'18197088','HAIKAL DIMAS SUSILO',0,'9 F'),
(49,'19208005','HANAUFAL DAFFA\' AL-AZIIZ',0,'9 F'),
(50,'18197047','INTAN KHUSNI MUBAROK',0,'9 F'),
(51,'18197016','INTAN NURAINI',0,'9 F'),
(52,'18197264','KAYLA ZAHRA SABITA',0,'9 F'),
(53,'18197296','LARA MARSELA ANGGINI',0,'9 F'),
(54,'18197336','LUSIANA KARINA',0,'9 F'),
(55,'18197192','MOCHAMMAD RAKA ARYANDWIKA',0,'9 F'),
(56,'18197057','MUHAMAD RIFKY',0,'9 F'),
(57,NULL,'MUHAMMAD NAJASYIIHTHISAM NUGROHO',0,'9 F'),
(58,'18197306','MUHAMMAD TEDJA KUSUMA ARYATAMA',0,'9 F'),
(59,'18197132','NAZWA AULIA',0,'9 F'),
(60,'18197172','PAGHITA IRAWAN',0,'9 F'),
(61,'18197202','RAFFI ABYAN ZIZOU',0,'9 F'),
(62,'18197027','RAHEL VERONIKA TOBING',0,'9 F'),
(63,'18197346','REVITA CHANDRA DEWI',0,'9 F'),
(64,'18197243','RICHARD',0,'9 F'),
(65,'18197098','ROBI SOFYANA',0,'9 F'),
(66,'18197275','SASTA NAFISA APRILIANTI',0,'9 F'),
(67,'18197068','STEVANY PUTRI AYU CHANDRA SARI',0,'9 F'),
(68,'18197212','VANI GRISELA SIHOMBING',0,'9 F'),
(69,'18197142','WILDA NOVITA',0,'9 F');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
