-- MySQL dump 10.13  Distrib 5.7.26, for Win64 (x86_64)
--
-- Host: localhost    Database: renli.com
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `lizhili_admin`
--

DROP TABLE IF EXISTS `lizhili_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_admin`
--

LOCK TABLES `lizhili_admin` WRITE;
/*!40000 ALTER TABLE `lizhili_admin` DISABLE KEYS */;
INSERT INTO `lizhili_admin` VALUES (1,'admin','751aff6be33b5649fde05436dc4cb4f7',1529570040,1532252345,1,1,'超级管理员不能删除和停用'),(2,'qpm101','25eee4665b3053ff200ea3c9b776bc35',1532685192,NULL,2,1,'');
/*!40000 ALTER TABLE `lizhili_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_article`
--

DROP TABLE IF EXISTS `lizhili_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_article`
--

LOCK TABLES `lizhili_article` WRITE;
/*!40000 ALTER TABLE `lizhili_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `lizhili_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_auth_group`
--

DROP TABLE IF EXISTS `lizhili_auth_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lizhili_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  `sort` tinyint(4) DEFAULT '0',
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_auth_group`
--

LOCK TABLES `lizhili_auth_group` WRITE;
/*!40000 ALTER TABLE `lizhili_auth_group` DISABLE KEYS */;
INSERT INTO `lizhili_auth_group` VALUES (1,'超级管理员',1,'1,3,2,10,7,9,8,4,6,5,11',0,'拥有至高无上的权利'),(2,'内容发布员',1,'1,3,2,10,7,9,8,4,6,5,11',0,'只能管理内容');
/*!40000 ALTER TABLE `lizhili_auth_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_auth_group_access`
--

DROP TABLE IF EXISTS `lizhili_auth_group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lizhili_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_auth_group_access`
--

LOCK TABLES `lizhili_auth_group_access` WRITE;
/*!40000 ALTER TABLE `lizhili_auth_group_access` DISABLE KEYS */;
INSERT INTO `lizhili_auth_group_access` VALUES (1,1),(2,2);
/*!40000 ALTER TABLE `lizhili_auth_group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_auth_rule`
--

DROP TABLE IF EXISTS `lizhili_auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_auth_rule`
--

LOCK TABLES `lizhili_auth_rule` WRITE;
/*!40000 ALTER TABLE `lizhili_auth_rule` DISABLE KEYS */;
INSERT INTO `lizhili_auth_rule` VALUES (1,'article/all','资讯总权限',1,1,'',0,0,0),(2,'article/add','添加资讯',1,1,'',1,1,0),(3,'article/edit','资讯修改',1,1,'',1,1,0),(4,'link/all','友情链接',1,1,'',0,0,0),(5,'link/add','添加友情链接',1,1,'',4,1,0),(6,'link/edit','修改友情链接',1,1,'',4,1,0),(7,'slide/all','幻灯片总权限',1,1,'',0,0,0),(8,'slide/add','添加幻灯片',1,1,'',7,1,0),(9,'slide/edit','修改幻灯片',1,1,'',7,1,0),(10,'comment/all','评论总权限',1,1,'',0,0,0),(11,'message/all','留言总权限',1,1,'',0,0,0);
/*!40000 ALTER TABLE `lizhili_auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_cate`
--

DROP TABLE IF EXISTS `lizhili_cate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_cate`
--

LOCK TABLES `lizhili_cate` WRITE;
/*!40000 ALTER TABLE `lizhili_cate` DISABLE KEYS */;
/*!40000 ALTER TABLE `lizhili_cate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_comment`
--

DROP TABLE IF EXISTS `lizhili_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_comment`
--

LOCK TABLES `lizhili_comment` WRITE;
/*!40000 ALTER TABLE `lizhili_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `lizhili_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_config`
--

DROP TABLE IF EXISTS `lizhili_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lizhili_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `shuo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_config`
--

LOCK TABLES `lizhili_config` WRITE;
/*!40000 ALTER TABLE `lizhili_config` DISABLE KEYS */;
INSERT INTO `lizhili_config` VALUES (1,'watermark','1','水印'),(2,'shui_weizhi','9','水印位置具体看手册'),(3,'shui_neirong','李志立 lizhilimaster@163.com','水印内容'),(4,'thumbnail','1','缩率图'),(5,'t_w','300','缩略图宽'),(6,'t_h','300','缩略图高'),(7,'shui_zihao','18','水印字号'),(8,'shui_yanse','#ffffff','水印颜色');
/*!40000 ALTER TABLE `lizhili_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_link`
--

DROP TABLE IF EXISTS `lizhili_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_link`
--

LOCK TABLES `lizhili_link` WRITE;
/*!40000 ALTER TABLE `lizhili_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `lizhili_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_log`
--

DROP TABLE IF EXISTS `lizhili_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lizhili_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `ip` char(15) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_log`
--

LOCK TABLES `lizhili_log` WRITE;
/*!40000 ALTER TABLE `lizhili_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `lizhili_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_member`
--

DROP TABLE IF EXISTS `lizhili_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_member`
--

LOCK TABLES `lizhili_member` WRITE;
/*!40000 ALTER TABLE `lizhili_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `lizhili_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_message`
--

DROP TABLE IF EXISTS `lizhili_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_message`
--

LOCK TABLES `lizhili_message` WRITE;
/*!40000 ALTER TABLE `lizhili_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `lizhili_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_shield`
--

DROP TABLE IF EXISTS `lizhili_shield`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lizhili_shield` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shield` text,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_shield`
--

LOCK TABLES `lizhili_shield` WRITE;
/*!40000 ALTER TABLE `lizhili_shield` DISABLE KEYS */;
INSERT INTO `lizhili_shield` VALUES (1,'她妈|它妈|他妈|你妈|去死|贱人|1090tv|10jil|21世纪中国基金会|2c8|3p|4kkasi|64惨案|64惨剧|64学生运动|64运动|64运动民國|89惨案|89惨剧|89学生运动|89运动|adult|asiangirl|avxiu|av女|awoodong|A片|bbagoori|bbagury|bdsm|binya|bitch|bozy|bunsec|bunsek|byuntae|B样|fa轮|fuck|ＦｕｃΚ|gay|hrichina|jiangzemin|j女|kgirls|kmovie|lihongzhi|MAKELOVE|NND|nude|petish|playbog|playboy|playbozi|pleybog|pleyboy|q奸|realxx|s2x|sex|shit|sorasex|tmb|TMD|tm的|tongxinglian|triangleboy|UltraSurf|unixbox|ustibet|voa|admin|lizhili|manage',NULL,NULL);
/*!40000 ALTER TABLE `lizhili_shield` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_slide`
--

DROP TABLE IF EXISTS `lizhili_slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_slide`
--

LOCK TABLES `lizhili_slide` WRITE;
/*!40000 ALTER TABLE `lizhili_slide` DISABLE KEYS */;
/*!40000 ALTER TABLE `lizhili_slide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lizhili_system`
--

DROP TABLE IF EXISTS `lizhili_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lizhili_system`
--

LOCK TABLES `lizhili_system` WRITE;
/*!40000 ALTER TABLE `lizhili_system` DISABLE KEYS */;
INSERT INTO `lizhili_system` VALUES (1,'网站名称','webname',1,'','',0,'网站名称',1,NULL,1567676416),(2,'关键词','keyword',1,'','',0,'网站关键字',1,NULL,1567676416),(3,'描述','miaoshu',1,'','',0,'网站描述',1,NULL,1567676416),(4,'底部版权信息','copyright',1,'','',0,'网站版权信息',1,NULL,1567676416),(5,'备案号','No',1,'','',0,'网站备案号',1,NULL,1567676416),(6,'统计代码','statistics',2,'','',0,'网站统计代码',1,NULL,1567676416),(7,'网站状态','value',3,'开启','开启,关闭',0,'网站的状态',1,NULL,1567676416);
/*!40000 ALTER TABLE `lizhili_system` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-30  9:34:04
