/*
MySQL Database Backup Tools
Server:127.0.0.1:3306
Database:cms.com
Data:2020-07-02 11:17:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lizhili_ad_img
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_ad_img`;
CREATE TABLE `lizhili_ad_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `isopen` varchar(255) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_ad_img
-- ----------------------------

INSERT INTO `lizhili_ad_img` (`id`,`create_time`,`update_time`,`title`,`url`,`img`,`isopen`,`ad_id`) VALUES ('1','1593485301','1593485301','11','','/advertisement/20200630/6cbf542d57a94b9d5a7e3856510a6a95.png','1','1');


-- ----------------------------
-- Table structure for lizhili_address
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_address`;
CREATE TABLE `lizhili_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `sheng` varchar(60) DEFAULT NULL,
  `shi` varchar(60) DEFAULT NULL,
  `xian` varchar(60) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` bigint(11) DEFAULT NULL,
  `moren` tinyint(1) DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_address
-- ----------------------------

INSERT INTO `lizhili_address` (`id`,`user_id`,`name`,`sheng`,`shi`,`xian`,`address`,`phone`,`moren`,`create_time`,`update_time`) VALUES ('1','2','林安娜','河北省','石家庄市','桥西区','红旗大街河北老年大学','15176950867','1','1593488718','1593488718');
INSERT INTO `lizhili_address` (`id`,`user_id`,`name`,`sheng`,`shi`,`xian`,`address`,`phone`,`moren`,`create_time`,`update_time`) VALUES ('2','3','徐标天','河北省','石家庄市','桥西区','红旗大街333号','18931113658','1','1593573106','1593573106');
INSERT INTO `lizhili_address` (`id`,`user_id`,`name`,`sheng`,`shi`,`xian`,`address`,`phone`,`moren`,`create_time`,`update_time`) VALUES ('3','5','李昊飞','河北省','石家庄市','长安区','河畔盛景小区','18932923885','1','1593586602','1593586602');


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
INSERT INTO `lizhili_admin` (`id`,`username`,`password`,`create_time`,`update_time`,`role`,`isopen`,`mark`) VALUES ('2','lizhili','25eee4665b3053ff200ea3c9b776bc35','1532685192',NULL,'2','1','');


-- ----------------------------
-- Table structure for lizhili_advertisement
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_advertisement`;
CREATE TABLE `lizhili_advertisement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `text` text,
  `state` smallint(6) unsigned DEFAULT '0',
  `click` mediumint(9) DEFAULT '0',
  `zan` mediumint(9) DEFAULT '0',
  `time` int(10) DEFAULT NULL,
  `cateid` mediumint(9) DEFAULT NULL,
  `faid` int(11) DEFAULT '0' COMMENT '发布者id',
  `laiyuan` varchar(255) DEFAULT NULL,
  `click_wai` mediumint(9) DEFAULT '0' COMMENT '展示数据',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_article
-- ----------------------------



-- ----------------------------
-- Table structure for lizhili_article_img
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_article_img`;
CREATE TABLE `lizhili_article_img` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `pic` varchar(160) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL COMMENT '对应ariticle id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_article_img
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
  `isopen` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_cate
-- ----------------------------



-- ----------------------------
-- Table structure for lizhili_cms
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_cms`;
CREATE TABLE `lizhili_cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text,
  `iswo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_cms
-- ----------------------------

INSERT INTO `lizhili_cms` (`id`,`text`,`iswo`) VALUES ('1','<p style="overflow-wrap: break-word; margin-top: 0px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Helvetica Neue&quot;, Helvetica, tahoma, arial, &quot;WenQuanYi Micro Hei&quot;, Verdana, sans-serif, 宋体; font-size: 14px; white-space: normal; text-indent: 20px;">感谢您一年来对我们的支持和包容。为了更好的服务大家，在2018年6月份，我们全新发布了后台管理系统版本。我们的发布离不开广大用户给出的建议和意见。我们整合了更多优秀插件；优化了框架的体积。当然相比目前行业其他管理系统还有很多不足。但初心不改，实实在在把事做好，做用户最喜欢的框架。更好为客户服务。</p><p style="overflow-wrap: break-word; margin-top: 0px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Helvetica Neue&quot;, Helvetica, tahoma, arial, &quot;WenQuanYi Micro Hei&quot;, Verdana, sans-serif, 宋体; font-size: 14px; white-space: normal; text-indent: 20px;">我们在2018年版本上面，先进行了，大量的技术更新，包括了秒杀，团购，即时通讯，购物，等等功能的扩展。然后在2019年的9月和11月份，我们又进行了重构，大量的精简了原始代码，把原始的一些插件进行了替换，删除没有必要的程序增加水印缩略图等功能，速度是2018年第一版的3倍以上。从最早网站开发，到现在我们已经经历过了6个年头，我们经历过的项目数百个，每一次修改后台我们都抱着不忘初心的态度，努力的写好每一句代码，希望我们的努力，可以得到您的认可。你们的肯定就是对我们最大支持！</p><p style="overflow-wrap: break-word; margin-top: 0px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Helvetica Neue&quot;, Helvetica, tahoma, arial, &quot;WenQuanYi Micro Hei&quot;, Verdana, sans-serif, 宋体; font-size: 14px; white-space: normal; text-indent: 20px;">2020年，添加了广告和水印的判断，修复了bug。添加了数据备份还原功能。添加了关闭网站后的302重定向。5月份添加了后台动态修改菜单功能。6月修改了sql逻辑，添加了广告分类等等。添加了商品的操作。添加了大量的功能。7月修改分销的逻辑，已经发现的bug。前台小程序页面请联系我，lizhilimaster@163.com。</p><p><br/></p>','1');


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
-- Table structure for lizhili_company
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_company`;
CREATE TABLE `lizhili_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `weixin` varchar(255) DEFAULT NULL,
  `erweima` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lizhili_company
-- ----------------------------

INSERT INTO `lizhili_company` (`id`,`name`,`phone`,`weixin`,`erweima`,`desc`) VALUES ('1','河北标天','18633456271','biaotianwenhua','/company/20200522/03acc9f8d8904c0ed9a4746dab8fc3a8.jpg','biaotianwenhua');


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
-- Table structure for lizhili_evaluation
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_evaluation`;
CREATE TABLE `lizhili_evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT '0',
  `pingjia` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `goods_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_evaluation
-- ----------------------------

INSERT INTO `lizhili_evaluation` (`id`,`order_id`,`pingjia`,`time`,`user_id`,`goods_id`) VALUES ('1','153','非常不错，我支持一下','1592293186','10','58');
INSERT INTO `lizhili_evaluation` (`id`,`order_id`,`pingjia`,`time`,`user_id`,`goods_id`) VALUES ('2','151','不错','1592293445','10','58');
INSERT INTO `lizhili_evaluation` (`id`,`order_id`,`pingjia`,`time`,`user_id`,`goods_id`) VALUES ('3','0','撒旦法水电费','1592295149','0','58');


-- ----------------------------
-- Table structure for lizhili_goods
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_goods`;
CREATE TABLE `lizhili_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(60) DEFAULT NULL COMMENT '商品名称',
  `goods_code` char(16) DEFAULT NULL COMMENT '商品编号',
  `goods_img` varchar(200) DEFAULT NULL COMMENT '原图',
  `goods_list_img` varchar(200) DEFAULT NULL COMMENT '大缩略图',
  `markte_price` decimal(10,2) DEFAULT NULL COMMENT '市场价格',
  `shop_price` decimal(10,2) DEFAULT NULL COMMENT '销售价格',
  `isopen` tinyint(1) DEFAULT '1' COMMENT '是否上架，1为上架，0为下架',
  `goods_desc` longtext COMMENT '商品描述',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `goods_num` mediumint(11) DEFAULT '0' COMMENT '库存',
  `postage` decimal(10,2) DEFAULT '0.00' COMMENT '邮费',
  `sales_num` int(11) DEFAULT '0' COMMENT '已经销售的数据',
  `draw` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '提成',
  PRIMARY KEY (`id`),
  KEY `goods_num` (`goods_code`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_goods
-- ----------------------------

INSERT INTO `lizhili_goods` (`id`,`goods_name`,`goods_code`,`goods_img`,`goods_list_img`,`markte_price`,`shop_price`,`isopen`,`goods_desc`,`create_time`,`update_time`,`goods_num`,`postage`,`sales_num`,`draw`) VALUES ('58','北欧实木布艺家用餐椅现代简约洽谈桌咖啡厅休闲靠背轻奢书桌椅子','22','/goods_min/20200701/47c04179aa8f927a5c904228ad7040d9.jpg','/goods_list/20200701/17a27fbf40ca3d54ddc2ff75079eeb2d.jpg','1998.00','988.00','1','<p><img src="https://img.alicdn.com/imgextra/i1/3581751266/O1CN01DJ3vp91LDruiwdzpp_!!3581751266.jpg"/><img src="https://img.alicdn.com/imgextra/i3/3581751266/O1CN017SqISd1LDruiwgHFh_!!3581751266.jpg"/><img src="https://img.alicdn.com/imgextra/i3/3581751266/O1CN01KqlY6u1LDrujPhx8p_!!3581751266.jpg"/><img src="https://img.alicdn.com/imgextra/i4/3581751266/O1CN01sdK1hs1LDruiwfXVA_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i2/3581751266/O1CN01I4wv3H1LDruiNCLYA_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i1/3581751266/O1CN01flra6P1LDruhdstN3_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i4/3581751266/O1CN010io0zY1LDrufJ9ggK_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i3/3581751266/O1CN01lvE4551LDruh8t1rH_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i1/3581751266/O1CN01zozg271LDruiWgJ8X_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i2/3581751266/O1CN01zJShpF1LDruh8stYJ_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i3/3581751266/O1CN01kkvb9Y1LDruhivPCS_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i2/3581751266/O1CN01ZTP7CF1LDruiNAKpK_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i1/3581751266/O1CN01IuBXkS1LDrug1gKDK_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i3/3581751266/O1CN01ZsntMA1LDruavGa0M_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i4/3581751266/O1CN01tWme3P1LDruiwi5XT_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i1/3581751266/O1CN01ZbDXbX1LDrug1ibWh_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i2/3581751266/O1CN01KfESNI1LDrugOHl7s_!!3581751266.jpg" class=""/><img src="https://img.alicdn.com/imgextra/i4/3581751266/O1CN01B26fxY1LDrug1gzhW_!!3581751266.jpg" class=""/></p>','1589362997','1593572199','2600','0.00','4446','0.00');
INSERT INTO `lizhili_goods` (`id`,`goods_name`,`goods_code`,`goods_img`,`goods_list_img`,`markte_price`,`shop_price`,`isopen`,`goods_desc`,`create_time`,`update_time`,`goods_num`,`postage`,`sales_num`,`draw`) VALUES ('62','现代简约北欧实木餐椅日式曲木布艺椅靠背扶手家用办公书桌电脑椅','1593571405471939','/goods_min/20200701/2a6831d667d071eed33549c1f01a1a03.png','/goods_list/20200701/fca0bb16601599243e72ed8846d041e0.jpg','369.00','254.00','1','<center><img alt="" src="https://img.alicdn.com/imgextra/i3/3295189018/O1CN01kcN4cq2GUIGe62nrn_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i3/3295189018/O1CN01Iz8w0g2GUIGfLiyoF_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i3/3295189018/O1CN01Ob0dFv2GUIGWbcvF6_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i3/3295189018/O1CN01A5wfDN2GUIIDcOB5H_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i1/3295189018/O1CN01NZ1XkH2GUIIBRVhEo_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i2/3295189018/O1CN01zeb8Tv2GUIGdQHVAj_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i4/3295189018/O1CN01RQL3Sq2GUIITfdhUM_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i4/3295189018/O1CN01YgOcuc2GUIIWqtTIz_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i4/3295189018/O1CN01htw4TQ2GUIHO3sSJu_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i2/3295189018/O1CN01oBouGG2GUIHX9kej5_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i2/3295189018/O1CN01QSxhzy2GUIGeyyPkz_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i1/3295189018/O1CN01oxdbxQ2GUIGWbebDF_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i4/3295189018/O1CN01LWEiuf2GUIGTHOogA_!!3295189018.png"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i2/3295189018/O1CN01GH8yOs2GUIGTbTpPk_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i2/3295189018/O1CN01k8c9A62GUIGS6wEoO_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i3/3295189018/O1CN01KJOf822GUIILo4HjY_!!3295189018.jpg"/></center><center><img alt="" src="https://img.alicdn.com/imgextra/i2/3295189018/O1CN018MgWQe2GUIIQSJSdk_!!3295189018.jpg"/></center><p><br/></p>','1593571405','1593571992','1000','0.00','1362','5.00');


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
-- Table structure for lizhili_live
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_live`;
CREATE TABLE `lizhili_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `live_num` int(11) DEFAULT NULL,
  `buy_num` int(11) DEFAULT NULL,
  `src` varchar(255) DEFAULT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `isopen` tinyint(1) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_live
-- ----------------------------

INSERT INTO `lizhili_live` (`id`,`live_num`,`buy_num`,`src`,`goods_id`,`title`,`desc`,`update_time`,`create_time`,`isopen`,`pic`) VALUES ('1','234234','32','http://gwjl.biaotian.net/1.mp4','58','正品 躺椅 质量保证 ','正品躺椅 午休椅 折叠椅  质量保证 ','1593586853',NULL,'1','/uploads/20200617/44b62dcd9b6aff1e125a07b5a98643af.jpg');


-- ----------------------------
-- Table structure for lizhili_live_msg
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_live_msg`;
CREATE TABLE `lizhili_live_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `time` mediumint(9) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_live_msg
-- ----------------------------

INSERT INTO `lizhili_live_msg` (`id`,`name`,`msg`,`time`,`update_time`,`create_time`) VALUES ('1','爱吃的猫','这包多少钱啊？','1','1593586853','1590230523');
INSERT INTO `lizhili_live_msg` (`id`,`name`,`msg`,`time`,`update_time`,`create_time`) VALUES ('2','一只小仓鼠','怎么下单啊，，，','2','1593586853','1590230982');
INSERT INTO `lizhili_live_msg` (`id`,`name`,`msg`,`time`,`update_time`,`create_time`) VALUES ('4','苍老的云','666666666666','4','1593586853','1590231096');
INSERT INTO `lizhili_live_msg` (`id`,`name`,`msg`,`time`,`update_time`,`create_time`) VALUES ('5','幸福人生','黄色的包多少钱啊','5','1593586853','1590231096');
INSERT INTO `lizhili_live_msg` (`id`,`name`,`msg`,`time`,`update_time`,`create_time`) VALUES ('6','勇敢的一颗心','最近有活动么？','6','1593586853','1590231096');
INSERT INTO `lizhili_live_msg` (`id`,`name`,`msg`,`time`,`update_time`,`create_time`) VALUES ('7','稀里糊涂的设计狮','这包包还真的很好看 你们有实体店吗？想去看看 ','3','1593586853','1590232235');
INSERT INTO `lizhili_live_msg` (`id`,`name`,`msg`,`time`,`update_time`,`create_time`) VALUES ('8','爱跑步的人','每天都看你的直播 产品质量真的不错','7','1593586853','1590233139');
INSERT INTO `lizhili_live_msg` (`id`,`name`,`msg`,`time`,`update_time`,`create_time`) VALUES ('9','hahahah~','上次买的包 俩月了 跟新的一样 你家质量真的没的说','8','1593586853','1590233139');


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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_log
-- ----------------------------

INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('1','admin','127.0.0.1','1591351949');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('2','admin','127.0.0.1','1592376116');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('3','admin','127.0.0.1','1592376595');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('4','lizhili','127.0.0.1','1592377954');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('5','admin','127.0.0.1','1592377994');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('6','admin','127.0.0.1','1592379791');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('7','admin','111.62.214.23','1593396946');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('8','admin','111.62.214.23','1593397634');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('9','admin','111.62.214.23','1593414726');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('10','admin','111.62.214.23','1593476913');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('11','admin','111.62.214.23','1593481207');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('12','admin','111.62.214.23','1593571174');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('13','admin','111.62.214.23','1593586618');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('14','admin','111.62.214.23','1593595515');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('15','admin','111.62.214.23','1593655062');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('16','admin','127.0.0.1','1593659255');
INSERT INTO `lizhili_log` (`id`,`username`,`ip`,`create_time`) VALUES ('17','admin','127.0.0.1','1593659814');


-- ----------------------------
-- Table structure for lizhili_member
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_member`;
CREATE TABLE `lizhili_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(32) CHARACTER SET utf8 DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `sex` tinyint(4) DEFAULT NULL COMMENT '1代表男，2代表女，3代表未知',
  `email` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `phone` bigint(11) DEFAULT NULL,
  `isopen` tinyint(4) DEFAULT '0' COMMENT '是否启用',
  `state` tinyint(4) DEFAULT '0' COMMENT '0代表是没有通过审核，1代表通过审核',
  `score` int(11) DEFAULT '0' COMMENT '积分',
  `headimg` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `sheng` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `shi` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `xian` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for lizhili_news
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_news`;
CREATE TABLE `lizhili_news` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `keyword` varchar(10) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `pic` varchar(160) DEFAULT NULL,
  `text` text,
  `state` smallint(6) unsigned DEFAULT '0',
  `click` mediumint(9) DEFAULT '0',
  `zan` mediumint(9) DEFAULT '0',
  `time` int(10) DEFAULT NULL,
  `cateid` mediumint(9) DEFAULT NULL,
  `faid` int(11) DEFAULT '0' COMMENT '发布者id',
  `laiyuan` varchar(255) DEFAULT NULL,
  `click_wai` mediumint(9) DEFAULT '0' COMMENT '展示数据',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_news
-- ----------------------------

INSERT INTO `lizhili_news` (`id`,`title`,`keyword`,`desc`,`author`,`pic`,`text`,`state`,`click`,`zan`,`time`,`cateid`,`faid`,`laiyuan`,`click_wai`) VALUES ('1','zzhi ','','sdf sdf sdf dsf sdf ssfdf','','/uploads/20200617/f04b4ac63a2beba8a60d255f5b852942.jpg','<p>sdf sdf sdf dsf sdf ssfdf&nbsp;</p>','0','0','0','1592366505',NULL,'1','','1912');


-- ----------------------------
-- Table structure for lizhili_order
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_order`;
CREATE TABLE `lizhili_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `out_trade_no` char(16) DEFAULT NULL COMMENT '订单号',
  `goods_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `goods_price` decimal(10,2) DEFAULT '0.00' COMMENT '产品单价',
  `order_num` mediumint(10) DEFAULT '0' COMMENT '订单数量',
  `payment` tinyint(1) DEFAULT NULL COMMENT '支付方式 1:支付宝 2:微信 3:余额',
  `distribution` varchar(50) DEFAULT NULL COMMENT '配送方式：申通、顺丰、圆通',
  `order_status` tinyint(1) DEFAULT '0' COMMENT '订单状态: 0:未确认 1:已经确认 2:申请退款 3:退款成功',
  `pay_status` tinyint(1) DEFAULT '0' COMMENT '支付状态，1是支付了，0是未支付',
  `post_status` tinyint(1) DEFAULT '0' COMMENT '配送状态 0:未发货 1:已发货 2:已收货',
  `post_spent` decimal(10,2) DEFAULT '0.00' COMMENT '运费',
  `address_id` varchar(60) DEFAULT NULL COMMENT '收件人',
  `express_num` varchar(20) DEFAULT NULL COMMENT '快递单号',
  `income` decimal(10,2) DEFAULT '0.00',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `order_time` varchar(20) DEFAULT NULL,
  `returns_id` int(11) DEFAULT NULL COMMENT '退换货id',
  `goods_price_zong` decimal(10,2) DEFAULT '0.00' COMMENT '产品总价',
  `isping` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_order
-- ----------------------------

INSERT INTO `lizhili_order` (`id`,`out_trade_no`,`goods_id`,`user_id`,`goods_price`,`order_num`,`payment`,`distribution`,`order_status`,`pay_status`,`post_status`,`post_spent`,`address_id`,`express_num`,`income`,`create_time`,`update_time`,`delete_time`,`order_time`,`returns_id`,`goods_price_zong`,`isping`) VALUES ('1','1593487216221021','58','1','0.01','1','2',NULL,'0','0','0','0.00',NULL,NULL,'0.00','1593487216','1593487216',NULL,NULL,NULL,'0.01','0');
INSERT INTO `lizhili_order` (`id`,`out_trade_no`,`goods_id`,`user_id`,`goods_price`,`order_num`,`payment`,`distribution`,`order_status`,`pay_status`,`post_status`,`post_spent`,`address_id`,`express_num`,`income`,`create_time`,`update_time`,`delete_time`,`order_time`,`returns_id`,`goods_price_zong`,`isping`) VALUES ('2','1593488720751315','58','2','0.01','1','2',NULL,'0','0','0','0.00','1',NULL,'0.00','1593488720','1593488720',NULL,NULL,NULL,'0.01','0');
INSERT INTO `lizhili_order` (`id`,`out_trade_no`,`goods_id`,`user_id`,`goods_price`,`order_num`,`payment`,`distribution`,`order_status`,`pay_status`,`post_status`,`post_spent`,`address_id`,`express_num`,`income`,`create_time`,`update_time`,`delete_time`,`order_time`,`returns_id`,`goods_price_zong`,`isping`) VALUES ('3','1593586696492035','62','5','254.00','1','2',NULL,'0','0','0','0.00','3',NULL,'5.00','1593586696','1593586696',NULL,NULL,NULL,'254.00','0');


-- ----------------------------
-- Table structure for lizhili_pilot_list
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_pilot_list`;
CREATE TABLE `lizhili_pilot_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` smallint(6) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `fid` int(11) DEFAULT '0',
  `icon` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `isopen` tinyint(1) DEFAULT '1',
  `pn_id` int(11) DEFAULT '1' COMMENT '头部导航',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='后台侧面导航';

-- ----------------------------
-- Records of lizhili_pilot_list
-- ----------------------------

INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('1','1','栏目管理','0','&#xe681;','没有地址','1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('2','2','会员管理','0','&#xe60d;','没有地址','1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('3','3','管理员管理','0','&#xe653;',NULL,'1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('4','4','系统管理','0','&#xe62e;',NULL,'1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('5','6','登陆日志','0','&#xe645;','login/log','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('6','7','数据库管理','0','&#xe639;','sql/index','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('8','9','资讯管理','0','&#xe616;',NULL,'1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('9','10','友情链接','0','&#xe6f1;',NULL,'1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('10','11','图片管理','0','&#xe613;',NULL,'1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('11','12','评论管理','0','&#xe622;',NULL,'1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('12','13','留言管理','0','&#xe68a;',NULL,'1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('13','0','栏目管理','1',NULL,'cate/index','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('14','0','会员列表','2',NULL,'Member/index','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('15','0','删除的会员','2',NULL,'Member/shan','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('16','0','角色管理','3','','auth_group/index','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('17','0','权限管理','3','','auth_rule/index','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('18','0','管理员列表','3',NULL,'admin/index','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('19','0','设置管理','4',NULL,'system/index','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('20','0','系统设置','4',NULL,'system/show','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('21','0','常用配置','4',NULL,'system/config','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('22','0','屏蔽词','4',NULL,'system/shield','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('23','0','顶部导航','31',NULL,'pilot/nav','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('24','8','清除缓存','0','&#xe60b;','admin/cahe','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('25','0','资讯管理','8',NULL,'article/index','1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('26','0','链接管理','9',NULL,'link/index','1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('27','0','幻灯片管理','10',NULL,'slide/index','1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('28','0','广告管理','10',NULL,'advertisement/index','1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('29','0','评论列表','11',NULL,'comment/index','1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('30','0','留言列表','12',NULL,'message/index','1','2');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('31','5','导航设置','0','&#xe6b6;',NULL,'1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('32','0','侧面导航','31',NULL,'pilot/lit','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('33','14','商品管理','0','&#xe620;','goods/index','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('34','0','添加商品','33','','goods/add','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('35','0','商品列表','33','','goods/index','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('36','15','订单管理','0','&#xe6b6;','','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('37','0','订单管理','36','','order/index','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('38','10','商城会员','0','&#xe62c;','user/index','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('39','0','商城会员','38','','user/index','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('40','16','公司介绍','0','&#xe643;','company/index','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('41','17','直播管理','0','&#xe66f;','live/index','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('42','18','微信配置','0','&#xe738;','wxpay/index','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('43','19','提现管理','0','&#xe6b7;','withdrawal/index','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('44','0','说明管理','31','','pilot/cms','1','1');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('45','16','商城新闻','0','&#xe623;','news/index','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('46','0','商城配置','0','&#xe72d;','','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('47','0','商品配置','46','','shopconfig/index','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('48','18','积分换购','0','&#xe666;','swap/index','1','3');
INSERT INTO `lizhili_pilot_list` (`id`,`sort`,`name`,`fid`,`icon`,`url`,`isopen`,`pn_id`) VALUES ('49','15','商城广告','0','&#xe646;','shopad/index','1','3');


-- ----------------------------
-- Table structure for lizhili_pilot_nav
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_pilot_nav`;
CREATE TABLE `lizhili_pilot_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` smallint(6) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `isopen` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='后台头部导航';

-- ----------------------------
-- Records of lizhili_pilot_nav
-- ----------------------------

INSERT INTO `lizhili_pilot_nav` (`id`,`sort`,`name`,`isopen`) VALUES ('1','0','网站配置','1');
INSERT INTO `lizhili_pilot_nav` (`id`,`sort`,`name`,`isopen`) VALUES ('2','0','内容管理','1');
INSERT INTO `lizhili_pilot_nav` (`id`,`sort`,`name`,`isopen`) VALUES ('3','0','商城管理','1');


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
-- Table structure for lizhili_shopad
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_shopad`;
CREATE TABLE `lizhili_shopad` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_shopad
-- ----------------------------

INSERT INTO `lizhili_shopad` (`id`,`img`,`url`,`title`,`sort`,`isopen`,`desc`,`create_time`,`update_time`) VALUES ('1','/shopad/20200630/9531a67256527efc0e8b46c0643a83d8.png','','头部广告','0','1','小程序首页头部广告','1593486288','1593486978');


-- ----------------------------
-- Table structure for lizhili_shopconfig
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_shopconfig`;
CREATE TABLE `lizhili_shopconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `share_title` varchar(255) DEFAULT NULL,
  `share_desc` varchar(255) DEFAULT NULL,
  `share_img` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `fen_one` smallint(6) DEFAULT '0',
  `fen_cheng` smallint(6) DEFAULT '0',
  `fen_man` int(11) NOT NULL DEFAULT '0' COMMENT '满多少分换购一次',
  `fen_desc` varchar(255) DEFAULT NULL COMMENT '积分说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_shopconfig
-- ----------------------------

INSERT INTO `lizhili_shopconfig` (`id`,`share_title`,`share_desc`,`share_img`,`logo`,`fen_one`,`fen_cheng`,`fen_man`,`fen_desc`) VALUES ('1','我是标题','使用说明','/shopconfig/20200629/cfd8697ca09e9d53b277564010b26fd1.jpg','/shopconfig/20200629/9393c9f0cfd693f536667425e4b346b9.jpg','1','100','1000','分享并注册成功获得100积分，满1000积分兑换一次神秘礼物！');


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
-- Table structure for lizhili_swap
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_swap`;
CREATE TABLE `lizhili_swap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `fen` int(11) DEFAULT NULL COMMENT '花费积分',
  `isopen` tinyint(1) DEFAULT '0' COMMENT '0，默认，1同意，2不同意',
  `address_id` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_swap
-- ----------------------------

INSERT INTO `lizhili_swap` (`id`,`uid`,`fen`,`isopen`,`address_id`,`create_time`,`update_time`) VALUES ('1','23','500','2','39','1593426167','1593426836');
INSERT INTO `lizhili_swap` (`id`,`uid`,`fen`,`isopen`,`address_id`,`create_time`,`update_time`) VALUES ('2','23','500','1','39','1593426863','1593426873');
INSERT INTO `lizhili_swap` (`id`,`uid`,`fen`,`isopen`,`address_id`,`create_time`,`update_time`) VALUES ('3','22','1000','1','40','1593481303','1593481327');


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


-- ----------------------------
-- Table structure for lizhili_user
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_user`;
CREATE TABLE `lizhili_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `openId` varchar(255) DEFAULT NULL,
  `tonken` varchar(255) DEFAULT NULL,
  `fid` int(11) DEFAULT '0',
  `phone` varchar(11) DEFAULT NULL,
  `avatarUrl` varchar(255) DEFAULT NULL COMMENT '头像',
  `province` varchar(255) DEFAULT NULL COMMENT '省',
  `city` varchar(255) DEFAULT NULL COMMENT '市',
  `country` varchar(255) DEFAULT NULL COMMENT '国家',
  `nickName` varchar(255) DEFAULT NULL COMMENT '姓名',
  `gender` varchar(255) DEFAULT NULL COMMENT '性别',
  `istui` tinyint(1) DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00',
  `haibao` varchar(255) DEFAULT NULL,
  `tui_id` int(11) DEFAULT '0' COMMENT '推荐人id',
  `fen_num` int(11) NOT NULL DEFAULT '0' COMMENT '分享的次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lizhili_user
-- ----------------------------

INSERT INTO `lizhili_user` (`id`,`create_time`,`update_time`,`delete_time`,`openId`,`tonken`,`fid`,`phone`,`avatarUrl`,`province`,`city`,`country`,`nickName`,`gender`,`istui`,`money`,`haibao`,`tui_id`,`fen_num`) VALUES ('1','1593487203','1593487203',NULL,'olGIm0UA5Z80j7PkhSfpDd6Ft7jQ','1a4e90a0473acd78cdaf2cbe7647b4e9','0',NULL,'https://wx.qlogo.cn/mmopen/vi_32/7icobCA5aE7DDcqqziajSTuFUYGFGZPZbHTAHApicugyoAO3PDvazdy05wmONYeL4Vl3E2dH2GS2ic57ial9UrticALg/132','Shanxi','Changzhi','China','Shinawatra','2','0','0.00','/haibao/1593487282.jpg','0','0');
INSERT INTO `lizhili_user` (`id`,`create_time`,`update_time`,`delete_time`,`openId`,`tonken`,`fid`,`phone`,`avatarUrl`,`province`,`city`,`country`,`nickName`,`gender`,`istui`,`money`,`haibao`,`tui_id`,`fen_num`) VALUES ('2','1593487525','1593487525',NULL,'olGIm0erA-__seYwYO7jDXoSsCbI','3e1d1d4e14d3464e93dffb290249ca6d','0',NULL,'https://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83eoVibQamFHskibPOOgcc4RVRnIotMk5RDUj1OrZKqlXGSYhRcvmEib7Dne2A02nBB6CVSmGFH4Yg62NA/132','Hebei','Shijiazhuang','China','希望……','2','1','0.00','/haibao/1593595550.jpg','0','2');
INSERT INTO `lizhili_user` (`id`,`create_time`,`update_time`,`delete_time`,`openId`,`tonken`,`fid`,`phone`,`avatarUrl`,`province`,`city`,`country`,`nickName`,`gender`,`istui`,`money`,`haibao`,`tui_id`,`fen_num`) VALUES ('3','1593570985','1593570985',NULL,'olGIm0eKOoItachX-OtCDxFoNKi8','fa028dda6ec574ccc2d5fc9dbdd57603','0',NULL,'https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIYxMs2E5SyJz0b9loDvlOfaYPlobfutoTZMHvKGvgkzN5he1HxUO5bMcSpwkQBLE7qSKNfkgTmXw/132','Hebei','Shijiazhuang','China','徐省辉','1','1','0.00','/haibao/1593595537.jpg','0','4');
INSERT INTO `lizhili_user` (`id`,`create_time`,`update_time`,`delete_time`,`openId`,`tonken`,`fid`,`phone`,`avatarUrl`,`province`,`city`,`country`,`nickName`,`gender`,`istui`,`money`,`haibao`,`tui_id`,`fen_num`) VALUES ('4','1593586179','1593586179',NULL,'olGIm0XiuWma6UuJSHIAYcuFScag','744cf78b78ab56e0a265591cd5a0691c','0',NULL,'https://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83epjcjDiclQB27acKZ3BL77xbHjcse2AaNa2NkYib9icUooOmK6NS1hIIUkYxGujRJuAQF4icmM5rubyBQ/132','Hebei','Shijiazhuang','China','两个人的幸福','1','1','0.00','/haibao/1593586802.jpg','0','3');
INSERT INTO `lizhili_user` (`id`,`create_time`,`update_time`,`delete_time`,`openId`,`tonken`,`fid`,`phone`,`avatarUrl`,`province`,`city`,`country`,`nickName`,`gender`,`istui`,`money`,`haibao`,`tui_id`,`fen_num`) VALUES ('5','1593586513','1593586513',NULL,'olGIm0fx_WcALNgpSbuqcAEOVC10','e084ce81ff2a2f6e737abacf32c495db','4',NULL,'https://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83epDGs0sTGOO7XJsOXwtSCn7BTUrmcSAA8ZLnibb5ibLxicQRDK694XPaCg4YnTUMSdz35sGZusdmOx9Q/132','','','Chad','昊飞','1','0','0.00',NULL,'4','0');
INSERT INTO `lizhili_user` (`id`,`create_time`,`update_time`,`delete_time`,`openId`,`tonken`,`fid`,`phone`,`avatarUrl`,`province`,`city`,`country`,`nickName`,`gender`,`istui`,`money`,`haibao`,`tui_id`,`fen_num`) VALUES ('6','1593616246','1593616246',NULL,'olGIm0TaUt06xQeaG7yaYUjxRzwk','ed6f5c79a7399f054bd9e66d42319656','0',NULL,'https://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83erx4iaoj5gjXgfOC3Fdiazx5f4t5hRX3KF9pF4Bz3xt7mBS4vRyoiaxIwm2QSd1Iu1ZZEzEyQJPDCLJA/132','Hebei','Shijiazhuang','China','芷若寒旭','2','0','0.00',NULL,'0','2');
INSERT INTO `lizhili_user` (`id`,`create_time`,`update_time`,`delete_time`,`openId`,`tonken`,`fid`,`phone`,`avatarUrl`,`province`,`city`,`country`,`nickName`,`gender`,`istui`,`money`,`haibao`,`tui_id`,`fen_num`) VALUES ('7','1593645485','1593645485',NULL,'olGIm0ZNKOc_qOBfKcDxINe5Vbns','f1f520cd3f1b4c3d1418cf774c3721a7','0',NULL,'https://wx.qlogo.cn/mmhead/y4Hl0aJ7GOtoyAQwyuJwTZia4Eyh2DlTHjViatxhFH7yA/132','','','','童毓纶','0','0','0.00',NULL,'0','1');


-- ----------------------------
-- Table structure for lizhili_withdrawal
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_withdrawal`;
CREATE TABLE `lizhili_withdrawal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `zfb` varchar(255) DEFAULT NULL,
  `wx` varchar(255) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0是未确定 1是完成 提现了',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_withdrawal
-- ----------------------------



-- ----------------------------
-- Table structure for lizhili_xcxpay
-- ----------------------------

DROP TABLE IF EXISTS `lizhili_xcxpay`;
CREATE TABLE `lizhili_xcxpay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lizhili_xcxpay
-- ----------------------------

INSERT INTO `lizhili_xcxpay` (`id`,`name`,`value`,`desc`) VALUES ('1','appid','','小程序appid');
INSERT INTO `lizhili_xcxpay` (`id`,`name`,`value`,`desc`) VALUES ('2','mch_id','','微信支付id');
INSERT INTO `lizhili_xcxpay` (`id`,`name`,`value`,`desc`) VALUES ('3','body','','商品名称');
INSERT INTO `lizhili_xcxpay` (`id`,`name`,`value`,`desc`) VALUES ('4','key','','支付密钥');
INSERT INTO `lizhili_xcxpay` (`id`,`name`,`value`,`desc`) VALUES ('5','notify_url','','支付回调');
INSERT INTO `lizhili_xcxpay` (`id`,`name`,`value`,`desc`) VALUES ('6','secret','','小程序密钥');


