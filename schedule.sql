/*
SQLyog Community v11.42 (64 bit)
MySQL - 5.5.23 : Database - schedule
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`schedule` /*!40100 DEFAULT CHARACTER SET cp1251 */;

USE `schedule`;

/*Table structure for table `advert` */

DROP TABLE IF EXISTS `advert`;

CREATE TABLE `advert` (
  `id_ad` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `ad` text,
  PRIMARY KEY (`id_ad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

/*Data for the table `advert` */

insert  into `advert`(`id_ad`,`date`,`ad`) values (1,'2017-05-15','Занятие Организация баз данных и знаний переносится в ауд.519');

/*Table structure for table `announcement` */

DROP TABLE IF EXISTS `announcement`;

CREATE TABLE `announcement` (
  `id_ann` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `lecturer` int(11) DEFAULT NULL,
  `ann` text,
  `class` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_ann`),
  KEY `lecturer` (`lecturer`),
  KEY `class` (`class`),
  CONSTRAINT `announcement_ibfk_2` FOREIGN KEY (`lecturer`) REFERENCES `lecturer` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `announcement_ibfk_3` FOREIGN KEY (`class`) REFERENCES `class` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=cp1251;

/*Data for the table `announcement` */

insert  into `announcement`(`id_ann`,`date`,`lecturer`,`ann`,`class`) values (1,'2017-05-15',3,'Защита курсовых (часть 2)','Организация баз данных и знаний'),(2,'2017-05-15',1,'Контрольная работа по теме 4','Системы АКУ');

/*Table structure for table `class` */

DROP TABLE IF EXISTS `class`;

CREATE TABLE `class` (
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `class` */

insert  into `class`(`name`) values ('Организация баз данных и знаний'),('Основы теории передачи информации'),('Системы АКУ'),('Численные методы');

/*Table structure for table `classroom` */

DROP TABLE IF EXISTS `classroom`;

CREATE TABLE `classroom` (
  `campus` varchar(40) NOT NULL,
  `room` int(11) NOT NULL,
  PRIMARY KEY (`campus`,`room`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `classroom` */

insert  into `classroom`(`campus`,`room`) values ('северный корпус',519),('северный корпус',541);

/*Table structure for table `faculty` */

DROP TABLE IF EXISTS `faculty`;

CREATE TABLE `faculty` (
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `faculty` */

insert  into `faculty`(`name`) values ('Факультет компьютерных наук');

/*Table structure for table `group` */

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `faculty` varchar(60) DEFAULT NULL,
  `speciality` varchar(40) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `group_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_group`),
  KEY `group_ibfk_1` (`faculty`),
  KEY `group_ibfk_2` (`speciality`),
  CONSTRAINT `group_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `group_ibfk_2` FOREIGN KEY (`speciality`) REFERENCES `speciality` (`name_spec`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=cp1251;

/*Data for the table `group` */

insert  into `group`(`id_group`,`faculty`,`speciality`,`course`,`group_name`) values (1,'Факультет компьютерных наук','Компьютерные науки',3,'КС-32'),(2,'Факультет компьютерных наук','Компьютерные науки',3,'КС-31'),(3,'Факультет компьютерных наук','Системная инженерия',3,'КУ-31');

/*Table structure for table `lecturer` */

DROP TABLE IF EXISTS `lecturer`;

CREATE TABLE `lecturer` (
  `fio` varchar(60) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `degree` varchar(40) DEFAULT NULL,
  `department` varchar(60) DEFAULT NULL,
  KEY `lecturer_ibfk_1` (`id_user`),
  CONSTRAINT `lecturer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `lecturer` */

insert  into `lecturer`(`fio`,`id_user`,`degree`,`department`) values ('Рева Сергей Николаевич',1,'старший преподаватель','Кафедра электроники и управляющих систем'),('Кабалянц Пётр Степанович ',2,'доцент','Кафедра электроники и управляющих систем'),('Лазурик Валентина Михайловна',3,'старший преподавательб','Кафедра искусственного интеллекта и программного обеспечения'),('Лосев Юрий Иванович',4,'','Кафедра теоретической и прикладной системотехники');

/*Table structure for table `lesson` */

DROP TABLE IF EXISTS `lesson`;

CREATE TABLE `lesson` (
  `id_lesson` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(40) DEFAULT NULL,
  `class_num` int(11) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `class` varchar(40) DEFAULT NULL,
  `lecturer` int(11) DEFAULT NULL,
  `type` varchar(40) DEFAULT NULL,
  `classroom` varchar(40) DEFAULT NULL,
  `subgroup` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lesson`),
  KEY `group` (`group`),
  KEY `class` (`class`),
  KEY `lecturer` (`lecturer`),
  CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`group`) REFERENCES `group` (`id_group`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `lesson_ibfk_2` FOREIGN KEY (`class`) REFERENCES `class` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `lesson_ibfk_3` FOREIGN KEY (`lecturer`) REFERENCES `lecturer` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=cp1251;

/*Data for the table `lesson` */

insert  into `lesson`(`id_lesson`,`day`,`class_num`,`group`,`class`,`lecturer`,`type`,`classroom`,`subgroup`) values (1,'Понедельник',1,1,'Численные методы',2,'лекция','Северный корпус, ауд.541',2),(2,'Понедельник',2,1,'Численные методы',2,'практика','Северный корпус, ауд.536',2),(4,'Понедельник',3,1,'Системы АКУ',1,'лекция','Северный корпус, ауд.519',2),(5,'Понедельник',4,1,'Организация баз данных и знаний',3,'практика','Северный корпус, ауд.558',2),(7,'Понедельник',1,2,'Численные методы',2,'лекция','Северный корпус, ауд.541',2),(8,'Понедельник',2,2,'Организация баз данных и знаний',3,'практика','Северный корпус, ауд.558',2),(9,'Понедельник',3,2,'Системы АКУ',1,'лекция','Северный корпус, ауд.519',2),(10,'Понедельник',4,2,'Численные методы',2,'практика','Северный корпус, ауд.552',2),(11,'Понедельник',2,3,'Основы теории передачи информации',4,'лекция','Северный корпус, ауд.519',2),(12,'Понедельник',3,3,'Численные методы',2,'практика','Северный корпус, ауд.536',2),(13,'Вторник',1,1,'Системы АКУ',1,'практика','Северный корпус, ауд.535',2);

/*Table structure for table `speciality` */

DROP TABLE IF EXISTS `speciality`;

CREATE TABLE `speciality` (
  `name_spec` varchar(40) NOT NULL,
  `faculty` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`name_spec`),
  KEY `specialty_ibfk_1` (`faculty`),
  CONSTRAINT `speciality_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `speciality` */

insert  into `speciality`(`name_spec`,`faculty`) values ('Компьютерные науки','Факультет компьютерных наук'),('Системная инженерия','Факультет компьютерных наук');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) DEFAULT NULL,
  `password` varbinary(40) DEFAULT NULL,
  `user_category` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=cp1251;

/*Data for the table `user` */

insert  into `user`(`id_user`,`login`,`password`,`user_category`) values (1,'RevaSN','RevaSN','lecturer'),(2,'KabalyancPS','KabalyancPS','lecturer'),(3,'LazurickVM','LazurickVM','lecturer'),(4,'LosevUI','LosevUI','lecturer');

/*Table structure for table `allclasses` */

DROP TABLE IF EXISTS `allclasses`;

/*!50001 DROP VIEW IF EXISTS `allclasses` */;
/*!50001 DROP TABLE IF EXISTS `allclasses` */;

/*!50001 CREATE TABLE  `allclasses`(
 `day` varchar(40) ,
 `num` int(11) ,
 `id_group` int(11) ,
 `class` varchar(40) ,
 `fio` varchar(60) ,
 `type` varchar(40) ,
 `classroom` varchar(40) ,
 `subgroup` int(11) 
)*/;

/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

/*!50001 DROP VIEW IF EXISTS `announcements` */;
/*!50001 DROP TABLE IF EXISTS `announcements` */;

/*!50001 CREATE TABLE  `announcements`(
 `date` date ,
 `fio` varchar(60) ,
 `class` varchar(40) ,
 `ann` text 
)*/;

/*Table structure for table `groupks32classes` */

DROP TABLE IF EXISTS `groupks32classes`;

/*!50001 DROP VIEW IF EXISTS `groupks32classes` */;
/*!50001 DROP TABLE IF EXISTS `groupks32classes` */;

/*!50001 CREATE TABLE  `groupks32classes`(
 `day` varchar(40) ,
 `num` int(11) ,
 `group_name` varchar(10) ,
 `class` varchar(40) ,
 `fio` varchar(60) ,
 `type` varchar(40) ,
 `classroom` varchar(40) ,
 `subgroup` int(11) 
)*/;

/*View structure for view allclasses */

/*!50001 DROP TABLE IF EXISTS `allclasses` */;
/*!50001 DROP VIEW IF EXISTS `allclasses` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allclasses` AS (select `lesson`.`day` AS `day`,`lesson`.`class_num` AS `num`,`group`.`id_group` AS `id_group`,`lesson`.`class` AS `class`,`lecturer`.`fio` AS `fio`,`lesson`.`type` AS `type`,`lesson`.`classroom` AS `classroom`,`lesson`.`subgroup` AS `subgroup` from (`lecturer` join (`lesson` join `group` on((`lesson`.`group` = `group`.`id_group`))) on((`lecturer`.`id_user` = `lesson`.`lecturer`)))) */;

/*View structure for view announcements */

/*!50001 DROP TABLE IF EXISTS `announcements` */;
/*!50001 DROP VIEW IF EXISTS `announcements` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `announcements` AS (select `announcement`.`date` AS `date`,`lecturer`.`fio` AS `fio`,`announcement`.`class` AS `class`,`announcement`.`ann` AS `ann` from (`announcement` join `lecturer` on((`announcement`.`lecturer` = `lecturer`.`id_user`))) where (`announcement`.`date` = '2017-05-15')) */;

/*View structure for view groupks32classes */

/*!50001 DROP TABLE IF EXISTS `groupks32classes` */;
/*!50001 DROP VIEW IF EXISTS `groupks32classes` */;

/*!50001 CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `groupks32classes` AS (select `lesson`.`day` AS `day`,`lesson`.`class_num` AS `num`,`group`.`group_name` AS `group_name`,`lesson`.`class` AS `class`,`lecturer`.`fio` AS `fio`,`lesson`.`type` AS `type`,`lesson`.`classroom` AS `classroom`,`lesson`.`subgroup` AS `subgroup` from (`lecturer` join (`lesson` join `group` on((`lesson`.`group` = `group`.`id_group`))) on((`lecturer`.`id_user` = `lesson`.`lecturer`))) where (`group`.`id_group` = 1)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
