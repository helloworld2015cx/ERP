

USE `erp`;
DROP TABLE IF EXISTS `admin_menus`;

CREATE TABLE `admin_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '菜单的父级菜单的ID',
  `menu_name` varchar(32) DEFAULT NULL COMMENT '菜单项的名称',
  `display_name` varchar(32) NOT NULL COMMENT '菜单项的展示名',
  `uri` varchar(128) DEFAULT NULL COMMENT '该菜单项对应的路由',
  `order` tinyint(3) unsigned DEFAULT '0' COMMENT '菜单排序',
  `create_at` datetime DEFAULT NULL COMMENT '菜单创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '菜单更新时间',
  `creator` smallint(5) unsigned DEFAULT NULL COMMENT '菜单的创建者(用户ID)',
  `desc` tinytext COMMENT '菜单项的基本功能描述',
  `memo` varchar(128) DEFAULT NULL COMMENT '备注信息',
  PRIMARY KEY (`id`),
  KEY `menu_name` (`menu_name`),
  KEY `uri` (`uri`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `admin_menus` */

insert  into `admin_menus`(`id`,`pid`,`menu_name`,`display_name`,`uri`,`order`,`create_at`,`update_at`,`creator`,`desc`,`memo`) values (1,0,'system_control','系统管理','admin/system',0,'2016-07-09 22:39:39',NULL,1,NULL,NULL),(2,0,'user_center','用户中心','admin/center',0,'2016-07-10 20:38:14',NULL,1,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `admin_role` */

insert  into `admin_role`(`id`,`role_name`,`display_name`,`describe`,`memo`) values (1,'ROOT','系统管理员','最高管理员，有用系统所有的权限',NULL),(2,'TEST','测试人员','测试人员，开发测试',NULL);

/*Table structure for table `admin_role_menu` */

DROP TABLE IF EXISTS `admin_role_menu`;

CREATE TABLE `admin_role_menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` smallint(5) unsigned NOT NULL COMMENT '角色ID',
  `menu_id` mediumint(8) unsigned NOT NULL COMMENT '菜单ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `admin_role_menu` */

insert  into `admin_role_menu`(`id`,`role_id`,`menu_id`) values (1,1,1),(2,1,2),(3,2,2),(4,2,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `admin_user` */

insert  into `admin_user`(`id`,`username`,`nickname`,`mailbox`,`password`,`create_at`,`update_at`,`memo`) values (1,'cheng','helloworld','18289768853@167.com','14e1b600b1fd579f47433b88e8d85291','2016-07-04 23:10:41',NULL,NULL),(2,'test','test123','123@189.com','14e1b600b1fd579f47433b88e8d85291','2016-07-10 18:07:36',NULL,NULL);

/*Table structure for table `admin_user_role` */

DROP TABLE IF EXISTS `admin_user_role`;

CREATE TABLE `admin_user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id编号',
  `role_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`user_id`,`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `admin_user_role` */

insert  into `admin_user_role`(`id`,`user_id`,`role_id`) values (1,1,1),(3,2,1),(2,2,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
