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
  `class` varchar(40) DEFAULT '-',
  `faculty` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_ad`),
  KEY `class` (`class`),
  CONSTRAINT `advert_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `advert` */

/*Table structure for table `announcement` */

DROP TABLE IF EXISTS `announcement`;

CREATE TABLE `announcement` (
  `id_ann` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `lecturer` int(11) DEFAULT NULL,
  `ann` text,
  `class` varchar(40) DEFAULT NULL,
  `faculty` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_ann`),
  KEY `announcement_ibfk_2` (`lecturer`),
  KEY `announcement_ibfk_3` (`class`),
  CONSTRAINT `announcement_ibfk_2` FOREIGN KEY (`lecturer`) REFERENCES `lecturer` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `announcement_ibfk_3` FOREIGN KEY (`class`) REFERENCES `class` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=cp1251;

/*Data for the table `announcement` */

insert  into `announcement`(`id_ann`,`date`,`lecturer`,`ann`,`class`,`faculty`) values (5,'2017-05-11',1,'кек','azaznya','Факультет компьютерных наук');

/*Table structure for table `class` */

DROP TABLE IF EXISTS `class`;

CREATE TABLE `class` (
  `name` varchar(40) NOT NULL,
  `faculty` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `class` */

insert  into `class`(`name`,`faculty`) values ('azaznya','Факультет компьютерных наук'),('вапыар','Факультет компьютерных наук'),('Организация баз данных и знаний','Факультет компьютерных наук'),('Основы теории передачи информации','Факультет компьютерных наук'),('Системы АКУ','Факультет компьютерных наук'),('Численные методы','Факультет компьютерных наук');

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `department` varchar(60) DEFAULT NULL,
  `faculty` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `department` */

insert  into `department`(`department`,`faculty`) values ('Кафедра электроники и управляющих систем','Факультет компьютерных наук'),('Кафедра искусственного интеллекта и программного обеспечения','Факультет компьютерных наук'),('Кафедра теоретической и прикладной системотехники','Факультет компьютерных наук');

/*Table structure for table `faculty` */

DROP TABLE IF EXISTS `faculty`;

CREATE TABLE `faculty` (
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `faculty` */

insert  into `faculty`(`name`) values ('Факультет компьютерных наук'),('Факультет магии и выводовыведения');

/*Table structure for table `group` */

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `faculty` varchar(60) DEFAULT NULL,
  `speciality` varchar(40) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `group_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_group`),
  KEY `group_ibfk_1` (`faculty`),
  KEY `group_ibfk_2` (`speciality`),
  CONSTRAINT `group_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `group_ibfk_2` FOREIGN KEY (`speciality`) REFERENCES `speciality` (`name_spec`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=cp1251;

/*Data for the table `group` */

insert  into `group`(`id_group`,`faculty`,`speciality`,`course`,`group_name`) values (1,'Факультет компьютерных наук','Компьютерные науки',3,'КС-32'),(2,'Факультет компьютерных наук','Компьютерные науки',3,'КС-31'),(3,'Факультет компьютерных наук','Системная инженерия',3,'КУ-31'),(5,'Факультет компьютерных наук','Безпасность информационных систем',3,'КБ-31'),(9,'Факультет компьютерных наук','Компьютерные науки',2,'КС-21'),(12,'Факультет компьютерных наук','Компьютерные науки',1,'КС-11'),(13,'Факультет компьютерных наук','Системная инженерия',7,'Машины_см'),(15,'Факультет магии и выводовыведения','Выводоведение',1,'Принцесски'),(16,'Факультет магии и выводовыведения','Выводоведение',1,'Единорожки');

/*Table structure for table `lecturer` */

DROP TABLE IF EXISTS `lecturer`;

CREATE TABLE `lecturer` (
  `fio` varchar(60) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `degree` varchar(40) DEFAULT NULL,
  `department` varchar(60) DEFAULT NULL,
  KEY `lecturer_ibfk_1` (`id_user`),
  CONSTRAINT `lecturer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `lecturer` */

insert  into `lecturer`(`fio`,`id_user`,`degree`,`department`) values ('Рева Сергей Николаевич',1,'старший преподаватель','Кафедра электроники и управляющих систем'),('Кабалянц Петр Степанович',2,'доцент','Кафедра электроники и управляющих систем'),('Лазурик Валентина Михайловна',3,'старший преподаватель','Кафедра искусственного интеллекта и программного обеспечения'),('Лосев Юрий Иванович',4,'старший преподаватель','Кафедра теоретической и прикладной системотехники'),('Серега',NULL,'дно','Кафедра электроники и управляющих систем'),('фыа',NULL,'фыафца','Кафедра теоретической и прикладной системотехники'),('кек чын ын',NULL,'ауе','Кафедра электроники и управляющих систем');

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
  `parity` int(11) DEFAULT NULL,
  `faculty` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_lesson`),
  KEY `lesson_ibfk_1` (`group`),
  KEY `lesson_ibfk_2` (`class`),
  KEY `lesson_ibfk_3` (`lecturer`),
  CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lesson_ibfk_2` FOREIGN KEY (`class`) REFERENCES `class` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lesson_ibfk_3` FOREIGN KEY (`lecturer`) REFERENCES `lecturer` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=cp1251;

/*Data for the table `lesson` */

insert  into `lesson`(`id_lesson`,`day`,`class_num`,`group`,`class`,`lecturer`,`type`,`classroom`,`subgroup`,`parity`,`faculty`) values (18,'Понедельник',1,1,'Численные методы',2,'лекция','Северный корпус, ауд.541',0,0,NULL),(19,'Понедельник',1,2,'Численные методы',2,'лекция','Северный корпус, ауд.541',0,0,NULL),(20,'Понедельник',2,1,'Численные методы',2,'практика','Северный корпус, ауд.538',0,2,NULL);

/*Table structure for table `speciality` */

DROP TABLE IF EXISTS `speciality`;

CREATE TABLE `speciality` (
  `name_spec` varchar(40) NOT NULL,
  `faculty` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`name_spec`),
  KEY `specialty_ibfk_1` (`faculty`),
  CONSTRAINT `speciality_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `speciality` */

insert  into `speciality`(`name_spec`,`faculty`) values ('Атомные терминаторы','Факультет компьютерных наук'),('Безпасность информационных систем','Факультет компьютерных наук'),('Компьютерные науки','Факультет компьютерных наук'),('Системная инженерия','Факультет компьютерных наук'),('Выводоведение','Факультет магии и выводовыведения');

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `id_user` int(11) DEFAULT NULL,
  `fio` varchar(60) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `faculty` varchar(60) DEFAULT NULL,
  KEY `id_user` (`id_user`),
  KEY `group` (`group`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `student_ibfk_2` FOREIGN KEY (`group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `student` */

insert  into `student`(`id_user`,`fio`,`group`,`faculty`) values (9,'root',1,NULL),(13,'RIchBich',1,NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) DEFAULT NULL,
  `password` varbinary(40) DEFAULT NULL,
  `user_category` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=cp1251;

/*Data for the table `user` */

insert  into `user`(`id_user`,`login`,`password`,`user_category`) values (1,'RevaSN','RevaSN','lecturer'),(2,'KabalyancPS','KabalyancPS','lecturer'),(3,'LazurickVM','LazurickVM','lecturer'),(4,'LosevUI','LosevUI','lecturer'),(5,'DeridIO','DeridIO','lecturer'),(9,'root','root','decanat'),(13,'Hell','Hell','student'),(14,'123','123','student');

/*Table structure for table `allclasses` */

DROP TABLE IF EXISTS `allclasses`;

/*!50001 DROP VIEW IF EXISTS `allclasses` */;
/*!50001 DROP TABLE IF EXISTS `allclasses` */;

/*!50001 CREATE TABLE  `allclasses`(
 `id_lesson` int(11) ,
 `day` varchar(40) ,
 `num` int(11) ,
 `id_group` int(11) ,
 `class` varchar(40) ,
 `fio` varchar(60) ,
 `type` varchar(40) ,
 `classroom` varchar(40) ,
 `subgroup` int(11) ,
 `degree` varchar(40) ,
 `parity` int(11) 
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
 `group_name` varchar(20) ,
 `class` varchar(40) ,
 `fio` varchar(60) ,
 `type` varchar(40) ,
 `classroom` varchar(40) ,
 `subgroup` int(11) 
)*/;

/*View structure for view allclasses */

/*!50001 DROP TABLE IF EXISTS `allclasses` */;
/*!50001 DROP VIEW IF EXISTS `allclasses` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allclasses` AS (select `lesson`.`id_lesson` AS `id_lesson`,`lesson`.`day` AS `day`,`lesson`.`class_num` AS `num`,`group`.`id_group` AS `id_group`,`lesson`.`class` AS `class`,`lecturer`.`fio` AS `fio`,`lesson`.`type` AS `type`,`lesson`.`classroom` AS `classroom`,`lesson`.`subgroup` AS `subgroup`,`lecturer`.`degree` AS `degree`,`lesson`.`parity` AS `parity` from (`lecturer` join (`lesson` join `group` on((`lesson`.`group` = `group`.`id_group`))) on((`lecturer`.`id_user` = `lesson`.`lecturer`)))) */;

/*View structure for view announcements */

/*!50001 DROP TABLE IF EXISTS `announcements` */;
/*!50001 DROP VIEW IF EXISTS `announcements` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `announcements` AS (select `announcement`.`date` AS `date`,`lecturer`.`fio` AS `fio`,`announcement`.`class` AS `class`,`announcement`.`ann` AS `ann` from (`announcement` join `lecturer` on((`announcement`.`lecturer` = `lecturer`.`id_user`)))) union (select `advert`.`date` AS `date`,'Деканат' AS `fio`,`advert`.`class` AS `class`,`advert`.`ad` AS `ann` from `advert`) */;

/*View structure for view groupks32classes */

/*!50001 DROP TABLE IF EXISTS `groupks32classes` */;
/*!50001 DROP VIEW IF EXISTS `groupks32classes` */;

/*!50001 CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `groupks32classes` AS (select `lesson`.`day` AS `day`,`lesson`.`class_num` AS `num`,`group`.`group_name` AS `group_name`,`lesson`.`class` AS `class`,`lecturer`.`fio` AS `fio`,`lesson`.`type` AS `type`,`lesson`.`classroom` AS `classroom`,`lesson`.`subgroup` AS `subgroup` from (`lecturer` join (`lesson` join `group` on((`lesson`.`group` = `group`.`id_group`))) on((`lecturer`.`id_user` = `lesson`.`lecturer`))) where (`group`.`id_group` = 1)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
