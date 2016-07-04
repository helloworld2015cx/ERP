/*
SQLyog Ultimate v8.32 
MySQL - 5.5.48-log : Database - ERP
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ERP` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ERP`;

/*Table structure for table `admin_role` */

DROP TABLE IF EXISTS `admin_role`;

CREATE TABLE `admin_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(32) NOT NULL COMMENT '角色的名称(英文)',
  `display_name` varchar(24) NOT NULL COMMENT '角色的展示名',
  `describe` tinytext COMMENT '角色的功能描述',
  `memo` varchar(128) DEFAULT NULL COMMENT '关于角色的其他备注信息',
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`role_name`),
  UNIQUE KEY `NewIndex2` (`display_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `admin_user` */

DROP TABLE IF EXISTS `admin_user`;

CREATE TABLE `admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL COMMENT '用户登录名',
  `nickname` varchar(24) DEFAULT NULL COMMENT '用户昵称',
  `mailbox` varchar(32) DEFAULT NULL COMMENT '用户邮箱',
  `password` varchar(64) NOT NULL COMMENT '用户的登录密码',
  `create_at` datetime DEFAULT NULL COMMENT '用户创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '用户信息更新时间',
  `memo` varchar(128) DEFAULT NULL COMMENT '用户备注信息',
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`username`,`mailbox`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
