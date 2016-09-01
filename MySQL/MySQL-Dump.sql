/*
SQLyog Community v12.2.4 (64 bit)
MySQL - 5.7.11 : Database - relacional
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`relacional` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `relacional`;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `data_nascimento` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

/*Table structure for table `iten_nf` */

DROP TABLE IF EXISTS `iten_nf`;

CREATE TABLE `iten_nf` (
  `id_iten` int(11) NOT NULL AUTO_INCREMENT,
  `qtd_iten` int(11) DEFAULT NULL,
  `seq_iten` int(11) DEFAULT NULL,
  `id_nf` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  PRIMARY KEY (`id_iten`),
  KEY `fk_iten_nf_nota_fiscal1_idx` (`id_nf`),
  KEY `fk_iten_nf_produto1_idx` (`id_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `iten_nf` */

/*Table structure for table `nota_fiscal` */

DROP TABLE IF EXISTS `nota_fiscal`;

CREATE TABLE `nota_fiscal` (
  `id_nf` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(255) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_nf`),
  KEY `fk_nota_fiscal_cliente_idx` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nota_fiscal` */

/*Table structure for table `produto` */

DROP TABLE IF EXISTS `produto`;

CREATE TABLE `produto` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prod` varchar(255) DEFAULT NULL,
  `img_prod` varchar(255) DEFAULT NULL,
  `valor_prod` varchar(255) DEFAULT NULL,
  `fabricante` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `produto` */

insert  into `produto`(`id_prod`,`nome_prod`,`img_prod`,`valor_prod`,`fabricante`) values 
(1,'bone','bone.jpg','150,00','bonezera'),
(2,'Camiseta','camiseta.jpg','205,00','DGK'),
(3,'Casaco','casaco.jpg','330,00','Vans'),
(4,'Oculos','oculos.jpg','450,00','Ray Ban'),
(5,'Tenis','tenis.jpg','260,00','Vans');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
