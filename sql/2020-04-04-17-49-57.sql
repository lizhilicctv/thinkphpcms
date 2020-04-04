/*
MySQL Database Backup Tools
Server:127.0.0.1:3306
Database:thinkphpcms.com
Data:2020-04-04 17:49:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lizhili_admin
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_admin`;
CREATE TABLE `lizhili_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `isopen` int(11) NOT NULL DEFAULT '1',
  `mark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_admin
-- ----------------------------

INSERT INTO `lizhili_admin` (`id`,`username`,`password`,`create_time`,`update_time`,`role`,`isopen`,`mark`) VALUES ('1','admin','751aff6be33b5649fde05436dc4cb4f7','1529570040','1532252345','1','1','超级管理员不能删除和停用');
INSERT INTO `lizhili_admin` (`id`,`username`,`password`,`create_time`,`update_time`,`role`,`isopen`,`mark`) VALUES ('2','qpm101','25eee4665b3053ff200ea3c9b776bc35','1532685192',NULL,'2','1','');


-- ----------------------------
-- Table structure for lizhili_advertisement
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_advertisement`;
CREATE TABLE `lizhili_advertisement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `isopen` tinyint(1) DEFAULT '0' COMMENT '1代表启用，0代表不启用',
  `desc` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL COMMENT '关键字，根据关键字访问',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告';

-- ----------------------------
-- Records of lizhili_advertisement
-- ----------------------------



-- ----------------------------
-- Table structure for lizhili_article
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_article`;
CREATE TABLE `lizhili_article` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `keyword` varchar(10) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `pic` varchar(160) DEFAULT NULL,
  `editorValue` text,
  `state` smallint(6) unsigned DEFAULT '0',
  `click` mediumint(9) DEFAULT '0',
  `zan` mediumint(9) DEFAULT '0',
  `time` int(10) DEFAULT NULL,
  `cateid` mediumint(9) DEFAULT NULL,
  `faid` int(11) DEFAULT '0' COMMENT '发布者id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_article
-- ----------------------------



-- ----------------------------
-- Table structure for lizhili_auth_group
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_auth_group`;
CREATE TABLE `lizhili_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  `sort` tinyint(4) DEFAULT '0',
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_auth_group
-- ----------------------------

INSERT INTO `lizhili_auth_group` (`id`,`title`,`status`,`rules`,`sort`,`desc`) VALUES ('1','超级管理员','1','1,3,2,10,7,9,8,4,6,5,11','0','拥有至高无上的权利');
INSERT INTO `lizhili_auth_group` (`id`,`title`,`status`,`rules`,`sort`,`desc`) VALUES ('2','内容发布员','1','1,3,2,10,7,9,8,4,6,5,11','0','只能管理内容');


-- ----------------------------
-- Table structure for lizhili_auth_group_access
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_auth_group_access`;
CREATE TABLE `lizhili_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_auth_group_access
-- ----------------------------

INSERT INTO `lizhili_auth_group_access` (`uid`,`group_id`) VALUES ('1','1');
INSERT INTO `lizhili_auth_group_access` (`uid`,`group_id`) VALUES ('2','2');


-- ----------------------------
-- Table structure for lizhili_auth_rule
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_auth_rule`;
CREATE TABLE `lizhili_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `fid` mediumint(9) DEFAULT '0',
  `level` tinyint(4) DEFAULT '0',
  `sort` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_auth_rule
-- ----------------------------

INSERT INTO `lizhili_auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`,`fid`,`level`,`sort`) VALUES ('1','article/all','资讯总权限','1','1','','0','0','0');
INSERT INTO `lizhili_auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`,`fid`,`level`,`sort`) VALUES ('2','article/add','添加资讯','1','1','','1','1','0');
INSERT INTO `lizhili_auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`,`fid`,`level`,`sort`) VALUES ('3','article/edit','资讯修改','1','1','','1','1','0');
INSERT INTO `lizhili_auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`,`fid`,`level`,`sort`) VALUES ('4','link/all','友情链接','1','1','','0','0','0');
INSERT INTO `lizhili_auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`,`fid`,`level`,`sort`) VALUES ('5','link/add','添加友情链接','1','1','','4','1','0');
INSERT INTO `lizhili_auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`,`fid`,`level`,`sort`) VALUES ('6','link/edit','修改友情链接','1','1','','4','1','0');
INSERT INTO `lizhili_auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`,`fid`,`level`,`sort`) VALUES ('7','slide/all','幻灯片总权限','1','1','','0','0','0');
INSERT INTO `lizhili_auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`,`fid`,`level`,`sort`) VALUES ('8','slide/add','添加幻灯片','1','1','','7','1','0');
INSERT INTO `lizhili_auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`,`fid`,`level`,`sort`) VALUES ('9','slide/edit','修改幻灯片','1','1','','7','1','0');
INSERT INTO `lizhili_auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`,`fid`,`level`,`sort`) VALUES ('10','comment/all','评论总权限','1','1','','0','0','0');
INSERT INTO `lizhili_auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`,`fid`,`level`,`sort`) VALUES ('11','message/all','留言总权限','1','1','','0','0','0');


-- ----------------------------
-- Table structure for lizhili_cate
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_cate`;
CREATE TABLE `lizhili_cate` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `catename` varchar(30) DEFAULT NULL,
  `en_name` varchar(30) DEFAULT NULL,
  `fid` tinyint(4) DEFAULT NULL,
  `type` tinyint(3) DEFAULT NULL COMMENT '1代表是列表，2代表是单页，3代表图片列表',
  `keyword` varchar(255) DEFAULT NULL COMMENT '栏目关键字',
  `mark` varchar(255) DEFAULT NULL,
  `editorValue` text COMMENT '单页的数据',
  `sort` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_cate
-- ----------------------------



-- ----------------------------
-- Table structure for lizhili_comment
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_comment`;
CREATE TABLE `lizhili_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `wenzhang_id` int(6) DEFAULT NULL,
  `user_id` int(6) DEFAULT NULL,
  `isopen` tinyint(4) DEFAULT '-1' COMMENT '0是不展示，1是展示，-1是没有审核',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_comment
-- ----------------------------



-- ----------------------------
-- Table structure for lizhili_config
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_config`;
CREATE TABLE `lizhili_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `shuo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_config
-- ----------------------------

INSERT INTO `lizhili_config` (`id`,`key`,`value`,`shuo`) VALUES ('1','watermark','1','水印');
INSERT INTO `lizhili_config` (`id`,`key`,`value`,`shuo`) VALUES ('2','shui_weizhi','9','水印位置具体看手册');
INSERT INTO `lizhili_config` (`id`,`key`,`value`,`shuo`) VALUES ('3','shui_neirong','李志立 lizhilimaster@163.com','水印内容');
INSERT INTO `lizhili_config` (`id`,`key`,`value`,`shuo`) VALUES ('4','thumbnail','1','缩率图');
INSERT INTO `lizhili_config` (`id`,`key`,`value`,`shuo`) VALUES ('5','t_w','300','缩略图宽');
INSERT INTO `lizhili_config` (`id`,`key`,`value`,`shuo`) VALUES ('6','t_h','300','缩略图高');
INSERT INTO `lizhili_config` (`id`,`key`,`value`,`shuo`) VALUES ('7','shui_zihao','18','水印字号');
INSERT INTO `lizhili_config` (`id`,`key`,`value`,`shuo`) VALUES ('8','shui_yanse','#ffffff','水印颜色');


-- ----------------------------
-- Table structure for lizhili_link
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_link`;
CREATE TABLE `lizhili_link` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_link
-- ----------------------------



-- ----------------------------
-- Table structure for lizhili_log
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_log`;
CREATE TABLE `lizhili_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `ip` char(15) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_log
-- ----------------------------

INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('1','admin','127.0.0.1','1585993712');


-- ----------------------------
-- Table structure for lizhili_member
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_member`;
CREATE TABLE `lizhili_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(32) DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `sex` tinyint(4) DEFAULT NULL COMMENT '1代表男，2代表女，3代表未知',
  `email` varchar(60) DEFAULT NULL,
  `phone` bigint(11) DEFAULT NULL,
  `isopen` tinyint(4) DEFAULT '0' COMMENT '是否启用',
  `state` tinyint(4) DEFAULT '0' COMMENT '0代表是没有通过审核，1代表通过审核',
  `score` int(11) DEFAULT '0' COMMENT '积分',
  `headimg` varchar(60) DEFAULT NULL,
  `sheng` varchar(60) DEFAULT NULL,
  `shi` varchar(60) DEFAULT NULL,
  `xian` varchar(60) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_member
-- ----------------------------



-- ----------------------------
-- Table structure for lizhili_message
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_message`;
CREATE TABLE `lizhili_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `neirong` text,
  `isopen` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_message
-- ----------------------------



-- ----------------------------
-- Table structure for lizhili_shield
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_shield`;
CREATE TABLE `lizhili_shield` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shield` text,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_shield
-- ----------------------------

INSERT INTO `lizhili_shield` (`id`,`shield`,`create_time`,`update_time`) VALUES ('1','她妈|它妈|他妈|你妈|去死|贱人|1090tv|10jil|21世纪中国基金会|2c8|3p|4kkasi|64惨案|64惨剧|64学生运动|64运动|64运动民國|89惨案|89惨剧|89学生运动|89运动|adult|asiangirl|avxiu|av女|awoodong|A片|bbagoori|bbagury|bdsm|binya|bitch|bozy|bunsec|bunsek|byuntae|B样|fa轮|fuck|ＦｕｃΚ|gay|hrichina|jiangzemin|j女|kgirls|kmovie|lihongzhi|MAKELOVE|NND|nude|petish|playbog|playboy|playbozi|pleybog|pleyboy|q奸|realxx|s2x|sex|shit|sorasex|tmb|TMD|tm的|tongxinglian|triangleboy|UltraSurf|unixbox|ustibet|voa|admin|lizhili|manage',NULL,NULL);


-- ----------------------------
-- Table structure for lizhili_slide
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_slide`;
CREATE TABLE `lizhili_slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `isopen` tinyint(1) DEFAULT '0' COMMENT '1代表启用，0代表不启用',
  `desc` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_slide
-- ----------------------------



-- ----------------------------
-- Table structure for lizhili_sql
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_sql`;
CREATE TABLE `lizhili_sql` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_sql
-- ----------------------------



-- ----------------------------
-- Table structure for lizhili_system
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_system`;
CREATE TABLE `lizhili_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnname` varchar(100) DEFAULT NULL,
  `enname` varchar(100) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '1',
  `value` varchar(255) DEFAULT NULL,
  `kxvalue` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `desc` varchar(255) DEFAULT NULL,
  `st` tinyint(3) DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_system
-- ----------------------------

INSERT INTO `lizhili_system` (`id`,`cnname`,`enname`,`type`,`value`,`kxvalue`,`sort`,`desc`,`st`,`create_time`,`update_time`) VALUES ('1','网站名称','webname','1','','','0','网站名称','1',NULL,'1567676416');
INSERT INTO `lizhili_system` (`id`,`cnname`,`enname`,`type`,`value`,`kxvalue`,`sort`,`desc`,`st`,`create_time`,`update_time`) VALUES ('2','关键词','keyword','1','','','0','网站关键字','1',NULL,'1567676416');
INSERT INTO `lizhili_system` (`id`,`cnname`,`enname`,`type`,`value`,`kxvalue`,`sort`,`desc`,`st`,`create_time`,`update_time`) VALUES ('3','描述','miaoshu','1','','','0','网站描述','1',NULL,'1567676416');
INSERT INTO `lizhili_system` (`id`,`cnname`,`enname`,`type`,`value`,`kxvalue`,`sort`,`desc`,`st`,`create_time`,`update_time`) VALUES ('4','底部版权信息','copyright','1','','','0','网站版权信息','1',NULL,'1567676416');
INSERT INTO `lizhili_system` (`id`,`cnname`,`enname`,`type`,`value`,`kxvalue`,`sort`,`desc`,`st`,`create_time`,`update_time`) VALUES ('5','备案号','No','1','','','0','网站备案号','1',NULL,'1567676416');
INSERT INTO `lizhili_system` (`id`,`cnname`,`enname`,`type`,`value`,`kxvalue`,`sort`,`desc`,`st`,`create_time`,`update_time`) VALUES ('6','统计代码','statistics','2','','','0','网站统计代码','1',NULL,'1567676416');
INSERT INTO `lizhili_system` (`id`,`cnname`,`enname`,`type`,`value`,`kxvalue`,`sort`,`desc`,`st`,`create_time`,`update_time`) VALUES ('7','网站状态','value','3','开启','开启,关闭','0','网站的状态','1',NULL,'1567676416');
INSERT INTO `lizhili_system` (`id`,`cnname`,`enname`,`type`,`value`,`kxvalue`,`sort`,`desc`,`st`,`create_time`,`update_time`) VALUES ('8','闭站重定向','redirect','1','http://down.linglukeji.com/','','0','','1','1585987185','1585987185');


