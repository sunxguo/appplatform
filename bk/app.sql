CREATE DATABASE  IF NOT EXISTS `app` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `app`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: 182.92.156.106    Database: app
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.12.04.1

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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `text_comment` text,
  `star_comment` tinyint(4) NOT NULL DEFAULT '5' COMMENT '评级1～5',
  `appid_comment` int(11) NOT NULL,
  `time_comment` datetime NOT NULL,
  `user_comment` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  UNIQUE KEY `id_comment_UNIQUE` (`id_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='app评论';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,'好用',4,19,'2015-02-07 10:52:16','孙行者'),(2,'very well',4,1,'2015-02-07 10:55:22','MonkeyKing'),(3,'好用',4,1,'2015-02-07 11:04:18','MK'),(4,'不好用',5,1,'2015-02-07 11:04:48','猪八戒'),(5,'某某某',3,1,'2015-02-07 11:14:08','不会');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `essay`
--

DROP TABLE IF EXISTS `essay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `essay` (
  `id_essay` int(11) NOT NULL AUTO_INCREMENT,
  `navid_essay` int(11) DEFAULT NULL,
  `text_essay` longtext COMMENT '''暂无详情介绍''',
  `title_essay` varchar(127) DEFAULT NULL,
  `time_essay` datetime DEFAULT NULL COMMENT '创建时间',
  `summary_essay` varchar(60) DEFAULT '暂无简介' COMMENT '''暂无简介''',
  `thumbnail_essay` varchar(511) DEFAULT NULL COMMENT '缩略图->json格式',
  `state_essay` tinyint(1) DEFAULT '0' COMMENT '0:发布1:草稿2:删除',
  `visits_essay` int(11) DEFAULT '0' COMMENT '阅读数',
  `lasttime_essay` datetime DEFAULT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`id_essay`),
  UNIQUE KEY `id_essay_UNIQUE` (`id_essay`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='导航nav类型3文章';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `essay`
--

LOCK TABLES `essay` WRITE;
/*!40000 ALTER TABLE `essay` DISABLE KEYS */;
INSERT INTO `essay` VALUES (2,19,'生生世世','事实上','2015-01-20 15:11:44','','null',0,0,NULL),(4,19,'生生世世','事实上','2015-01-20 15:11:54','','[{\"src\":\"\\/uploads\\/image\\/20150121\\/20150121115755_14106.jpg\"}]',0,0,'2015-01-21 11:57:57'),(5,19,'生生世世','事实上','2015-01-20 15:12:10','事实上','null',0,0,NULL),(6,19,'生生世世','事实上','2015-01-20 15:12:12','事实上','null',0,0,'2015-01-20 20:44:43'),(7,19,'生生世世','事实上','2015-01-20 15:12:12','事实上','null',1,0,NULL),(8,19,'生生世世','事实上','2015-01-20 15:12:13','事实上','null',1,0,NULL),(9,19,'生生世世','事实上','2015-01-20 16:53:38','事实上','[{\"src\":\"\\/uploads\\/image\\/20150120\\/20150120164928_72026.jpg\"},{\"src\":\"\\/uploads\\/image\\/20150120\\/20150120164944_74020.jpg\"}]',0,0,NULL),(10,19,'丰富','丰富','2015-01-20 15:57:00','','null',0,0,NULL),(11,19,'丰富','丰富','2015-01-20 15:57:04','','null',0,0,NULL),(12,19,'','4','2015-01-20 15:57:55','4','null',0,0,NULL),(13,19,'过刚刚过刚刚','让人如','2015-01-20 15:59:07','','[{\"src\":\"\\/uploads\\/image\\/20150120\\/20150120155900_47735.jpg\"},{\"src\":\"\\/uploads\\/image\\/20150120\\/20150120211948_22326.jpg\"},{\"src\":\"\\/uploads\\/image\\/20150120\\/20150120211950_26262.jpg\"}]',0,0,'2015-01-20 21:19:52'),(14,19,'刚刚','刚刚','2015-01-20 15:59:17','','null',0,0,'2015-01-20 19:27:08'),(15,19,'','丰富','2015-01-20 15:59:44','','null',0,0,NULL),(16,19,'生生世世','事实上','2015-01-20 16:04:10','事实上','[{\"src\":\"\\/uploads\\/image\\/20150120\\/20150120151224_63421.jpg\"}]',0,0,NULL),(17,19,'ffff','fff','2015-01-21 11:59:15','ff','[{\"src\":\"\\/uploads\\/image\\/20150121\\/20150121115911_59660.jpg\"}]',1,0,'2015-01-21 11:59:15'),(18,23,'<p style=\"font-size:14px;text-indent:2em;color:#252525;font-family:宋体, sans-serif;text-align:justify;background-color:#FFFFFF;\">\n	短短49字，瞬间引爆舆论。\n</p>\n<p style=\"font-size:14px;text-indent:2em;color:#252525;font-family:宋体, sans-serif;text-align:justify;background-color:#FFFFFF;\">\n	这一消息看似来得突然。因为就在一周前的12月15日，中共中央机关刊物《求是》刚刚刊登了令计划的署名文章《坚持中国特色解决民族问题的正确道路，为实现中华民族伟大复兴中国梦团结奋斗》。12月13日，令计划还出现在中央电视台《新闻联播》的画面中；当天，中央统战部向各民主党派中央、全国工商联负责人和无党派人士通报中央经济工作会议精神，令计划主持会议。\n</p>\n<p style=\"font-size:14px;text-indent:2em;color:#252525;font-family:宋体, sans-serif;text-align:justify;background-color:#FFFFFF;\">\n	但长期追踪\"打虎系列剧\"的观众们却不感意外。因为，他们感觉，剧本早有\"计划\"，剧情渐次展开，只待底牌翻开；\"计划\"出现在剧情中，体现了中央\"打虎\"的决心和\"刮骨疗毒\"的勇气。\n</p>\n<p style=\"font-size:14px;text-indent:2em;color:#252525;font-family:宋体, sans-serif;text-align:justify;background-color:#FFFFFF;\">\n	今年以来，山西省政协副主席令政策接受组织调查，另有化名\"王诚\"、真名\"令完成\"的商人被调查。尽管官方消息没有指出他们与令计划的关系，但其兄弟关系广为人知，不少媒体在报道中也都提及了这一点。令计划是否被牵出，备受瞩目。\n</p>\n<p style=\"font-size:14px;text-indent:2em;color:#252525;font-family:宋体, sans-serif;text-align:justify;background-color:#FFFFFF;\">\n	有人注意到，关于令计划被调查的官方通报非常简洁，只提到了\"涉\n</p>','围猎“计划”：令氏家族及其贪腐朋友圈的落幕','2015-01-30 14:45:07','中国人民政治协商会议第十二届全国委员会副主席、中共中央统战部','[{\"src\":\"\\/uploads\\/image\\/20150130\\/20150130144458_51618.jpg\"},{\"src\":\"\\/uploads\\/image\\/20150130\\/20150130144506_81490.jpg\"}]',0,0,'2015-01-30 14:45:07'),(19,23,'<p style=\"font-size:14px;font-family:宋体;color:#333333;background-color:#FFFFFF;\">\n	京华时报讯 昨天，中央纪委驻国家新闻出版广电总局纪检组组长李秋芳在做客中纪委网站接受访谈时透露，派驻纪检组去年对新闻出版、广播影视十大关键领域腐败的常规表现、惯用手法，进行了探底调研，特别是一些行业“潜规则”。今年，将在此基础上继续深化工作，并将要制定《新闻出版广播影视从业人员廉洁行为规定》。\n</p>\n<p style=\"font-size:14px;font-family:宋体;color:#333333;background-color:#FFFFFF;\">\n	影视剧购销等容易滋生腐败\n</p>\n<p style=\"font-size:14px;font-family:宋体;color:#333333;background-color:#FFFFFF;\">\n	李秋芳指出，督责、查责、问责是派驻机构的主要责任。多年来，驻新闻出版广电总局纪检组总结出了几个基本方法：一个就是“日常观察”。另外一种方法为“巡视监督”。派驻纪检组开展了自主监督并起草了党组巡视办法，从实际出发，列出驻在单位需要巡视的关键内容。“比如，影视剧购销、大型节目演出、设备采购、卫星节目落地等，是派驻机构要特别关注的事项，也是容易滋生腐败的部位。对此，主要是通过巡视监督来予以防范。”李秋芳说。\n</p>\n<p style=\"font-size:14px;font-family:宋体;color:#333333;background-color:#FFFFFF;\">\n	李秋芳介绍，派驻纪检组去年已开始对新闻出版、广播影视十大关键领域进行探底调研，了解其中腐败的常规表现、惯用手法，特别要了解它的潜规则。值得注意的是，对一些关键领域比如影视剧购销、大型节目，有些单位的设备采购多是单一来源，有些不进行招投标程序，可能会有一定的风险。此外，还有广告经营、新闻采编，海外台站等领域也将加大力度。\n</p>\n<p style=\"font-size:14px;font-family:宋体;color:#333333;background-color:#FFFFFF;\">\n	去年追责49人近5年来最多\n</p>\n<p style=\"font-size:14px;font-family:宋体;color:#333333;background-color:#FFFFFF;\">\n	去年，专项监督特别监督了一些重要的、大型的专项资金。将之进行分类，通过专项监督，发现问题，推动整改，并对49人进行了追责，达到了5年来的最高纪录。\n</p>\n<p style=\"font-size:14px;font-family:宋体;color:#333333;background-color:#FFFFFF;\">\n	李秋芳称，今年将把专项检查的重点放在曾经管理比较松散的社团，因发现社团落实中央八项规定精神不如机关和事业单位。今年将对社团执行八项规定情况开展专项检查。\n</p>\n<p style=\"font-size:14px;font-family:宋体;color:#333333;background-color:#FFFFFF;\">\n	通过探底调研找到腐败风险点，进行制度建设堵塞监管漏洞。今年的重点就是要推动一部分治理的制度出台，而解决“不能腐”的问题。\n</p>\n<p style=\"font-size:14px;font-family:宋体;color:#333333;background-color:#FFFFFF;\">\n	今年专门制定廉洁从业规定\n</p>\n<p style=\"font-size:14px;font-family:宋体;color:#333333;background-color:#FFFFFF;\">\n	李秋芳提到，今年，还要专门制定《新闻出版广播影视从业人员廉洁行为规定》，同时发动社团，订立从业人员《自律公约》。通过硬性约束和自律，两者结合来营造一个风清气正的行业发展环境。\n</p>\n<p style=\"font-size:14px;font-family:宋体;color:#333333;background-color:#FFFFFF;\">\n	此外，目前，纪检组还正在推进电子政务，把行政审批、许可、监管事项和电子监管有机结合，要求前台运作的所有事项后台都要看到，以加强监管。\n</p>\n<p style=\"font-size:14px;font-family:宋体;color:#333333;background-color:#FFFFFF;\">\n	业内对“潜规则”讳莫如深\n</p>','中纪委官员：已掌握广电领域腐败惯用手法和“潜规则”','2015-01-30 14:46:20','去年已调研广电领域十大腐败惯用手法 影视剧购销卫星节目落地等','[{\"src\":\"\\/uploads\\/image\\/20150130\\/20150130144615_67716.jpg\"},{\"src\":\"\\/uploads\\/image\\/20150130\\/20150130144619_71586.jpg\"}]',0,0,'2015-01-30 14:46:20'),(20,23,'<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	日前，一则檄文直指亚马逊，引发了行业热议。到底是阅读器更适合用户还是客户端更有前景，一时众说纷纭。而我们不可忽视的是，亚马逊在2014年推出的Fire Phone智能手机销售惨淡，Kindle销量下滑，而不久前亚马逊又刚刚下线手机钱包应用，如今又被于伤口上撒盐，可谓是流年不利。\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	<strong>阅读是刚需，工具和形式一直在变化</strong>\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	自从文字出来以来，阅读就伴随着人类走过了几千年的时光。每一次文字载体的变革，都会带来社会的巨大进步，而每一次社会的巨大进步反过来也会引发阅读的大变革。\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	造纸是中国贡献给世界的四大发明之一，而正是因为纸的流行才让文字从高大上的贵族专享成为了全体草民的共同财富，也才从根本上解放了人类思想，迎来了科技大发展的文明社会。\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	当计算机和互联网出现之后，人们的眼睛会被延展到了数字化的屏幕上，因此，电子书阅读开始成为一些人的新宠。后来，人们为了阅读的便利性而创造出了可以手持的移动电子书设备，但随着平板电脑和智能手机的普及，在移动互联网大潮下，阅读器的命运也正在发生根本性的变化。\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	中国新闻出版研究院在2014年公布的第11次全国国民阅读调查数据显示，受数字媒介迅猛发展的影响，中国成年国民数字化阅读方式接触率持续增长。包括网络在线阅读、手机阅读、电子阅读器阅读、光盘阅读、PDA/MP4/MP5阅读等的数字化阅读方式接触率达到50.1%，首次超过半数。\n</p>\n<p class=\"image\" style=\"font-family:Simsun;font-size:medium;vertical-align:baseline;text-align:center;background-color:#FFFFFF;\">\n	<img src=\"http://f.hiphotos.baidu.com/news/crop%3D0%2C0%2C314%2C188%3Bw%3D638/sign=9e161f1e4f36acaf4dafccbc41e9a120/71cf3bc79f3df8dc84f9d3b6c911728b461028d4.jpg\" />\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	<strong>纸面阅读与屏幕阅读不会互相替代</strong>\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	喜欢读书的人有很多，读书的样式也会不同，但共同的感受也是存在的。多项研究发现，人类在屏幕和纸面上的阅读方式有所不同，而且屏幕阅读更容易分心。对某些人来说，打开厚重的封面，然后聆听书脊与书页摩擦的声音，本身就是一种愉悦的体验。以现在的技术发展水平看，短时间内印刷书与电子书将会共存，直到二者在功能、模式和感觉上难以区分为止。\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	亚马逊多年来致力于为用户提供类似于纸面的阅读体验，其专业化的阅读器确实受到了很多人的欢迎，但纸仍然是纸，屏幕仍然屏幕，两者无法直接替代，这也造成了Kindle阅读器的销售量和电子书的销售量开始下滑。\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	来自于尼尔森图书调查公司的调查报告显示，在美国已连续保持3年高增长的电子书销量，2014年前三季度首次出现下跌。截至第三季度末，美国电子书的市场份额为21%，低于前两季的23%。实际上，自2013年起，Kindle电子书销量增长率就已经从之前的三位数骤降至一位数，2014年更是继续回落，即便Kindle推出新款阅读器，仍无法力挽狂澜。与此同时，纸质书的销量则保持稳步增长。根据尼尔森的统计，美国去年印刷书销量增长2.4%，其中包括通过亚马逊和各类书店购买的图书。\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	在中国，原来风火一时的各类电子书阅读器都在几年前开始沉寂，而致力于阅读器的运营商及各家网上书城却逐渐红火，也体现了这样的大趋势。\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	<strong>智能终端的流行让阅读</strong><strong>APP</strong><strong>成为主流</strong>\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	专业化的电子书阅读器虽然携带也很方便，特别是墨迹式的文字让阅读更舒适，可缺点也很多，用户需要单独付费购买终端，单纯的电子书功能也有限，如今随着智能手机和PAD的流行已经变成了鸡肋，甚至成为了小众人群使用的产品。\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	如今的智能手机或平板电脑在屏幕质量上有了大幅度的提升，还有的可以模拟阅读器的屏幕环境，更是让以阅读体验为主要卖点的阅读器失去了竞争力。\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	在智能手机上的阅读APP可以方便的进行搜索，还可以与网络上的各种资源进行链接，在社交互动方面也比单纯的阅读器要方便，更重要的是，各种阅读的客户端掌控的内容越来越多，更新越来越快，其内容资源量已经远远超过了单独的阅读器所能达到的水平，在竞争中已经处在优势地位。\n</p>\n<p class=\"text\" style=\"font-family:Simsun;font-size:14px;vertical-align:baseline;text-indent:28px;background-color:#FFFFFF;\">\n	阅读体验和内容仍然是决定读书方式的最核心因素，阅读器已经在很多方面都落后于客户端，在当前的竞争中处于下风。在当前，不管是阅读器还是客户端，都还只能是与纸面阅读共存。不过，未来到底谁能最终胜出，还需要看谁创造更好的客户体验。时代在发展，技术在进步，阅读方式也在变革，唯一不变的只是阅读而已。\n</p>','阅读器PK客户端，读书习惯决定命运','2015-02-07 12:49:11','阅读体验和内容仍然是决定读书方式的最核心因素，阅读器已经在很','[{\"src\":\"\\/uploads\\/image\\/20150207\\/20150207124908_16026.jpg\"}]',0,0,'2015-02-07 12:49:11');
/*!40000 ALTER TABLE `essay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(127) DEFAULT NULL,
  `catid_product` int(11) DEFAULT '0',
  `description_product` longtext,
  `oriprice_product` int(11) DEFAULT NULL COMMENT '原价',
  `price_product` int(11) DEFAULT NULL COMMENT '价格',
  `navid_product` int(11) NOT NULL,
  `state_product` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:发布1:草稿2:删除',
  `unit_product` varchar(45) DEFAULT NULL COMMENT 'RMB->人民币;NTD->新台币;USD->美元;HKD->港元;',
  `time_product` datetime DEFAULT NULL COMMENT '创建时间',
  `summary_product` varchar(60) DEFAULT NULL,
  `thumbnail_product` varchar(511) DEFAULT NULL,
  `lasttime_product` datetime DEFAULT NULL COMMENT '最后修改时间',
  `collect_product` int(11) DEFAULT '0' COMMENT '收藏数',
  PRIMARY KEY (`id_product`),
  UNIQUE KEY `id_product_UNIQUE` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='商品';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'iphone6 plus 64G',0,'手机',6999,59,22,0,'NTD','2015-01-19 15:24:44','苹果手机','[{\"src\":\"\\/uploads\\/image\\/20150119\\/20150119151919_26243.jpg\"},{\"src\":\"\\/uploads\\/image\\/20150119\\/20150119151940_76189.jpg\"}]','2015-02-25 21:34:55',0),(2,'iphone6 plus 64G',0,'手机',6999,25,22,0,'RMB','2015-01-19 15:24:44','苹果手机','[{\"src\":\"\\/uploads\\/image\\/20150119\\/20150119151919_26243.jpg\"},{\"src\":\"\\/uploads\\/image\\/20150119\\/20150119151940_76189.jpg\"}]','2015-02-24 21:52:58',0),(3,'iphone6',0,'<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">\n	<span style=\"color:#CC0000;font-family:simhei;font-size:24px;line-height:33px;\">iPhone 6 为移动4G版！（单卡多模，支持网络模式：TD-LTE/TD-SCDMA/GSM）FDD-LTE/WCDMA（仅出国漫游时支持）</span> \n</p>\n<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">\n	<img alt=\"iPhone6套餐\" src=\"http://img04.taobaocdn.com/imgextra/i4/713805254/TB2t5ZGbFXXXXXqXXXXXXXXXXXX_!!713805254.jpg_.webp\" /> \n</p>\n<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">\n	<span> </span> \n</p>\n<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">\n	<img align=\"absmiddle\" src=\"http://img04.taobaocdn.com/imgextra/i4/713805254/TB2jbx3bpXXXXXQXpXXXXXXXXXX-713805254.jpg_.webp\" /> \n</p>\n<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">\n	<img align=\"absmiddle\" src=\"http://img01.taobaocdn.com/imgextra/i1/713805254/TB2ls0rbpXXXXbOXXXXXXXXXXXX_!!713805254.jpg_.webp\" /><img align=\"absmiddle\" src=\"http://img03.taobaocdn.com/imgextra/i3/713805254/TB2gmJmbpXXXXXhXpXXXXXXXXXX_!!713805254.jpg_.webp\" /> \n</p>',5999,49,24,0,'RMB','2015-01-30 20:27:54','单卡多模，支持网络模式：TD-LTE/TD-SCDMA/GS','[{\"src\":\"\\/uploads\\/image\\/20150130\\/20150130202751_30874.jpg\"}]','2015-02-25 21:34:41',0),(4,'ipad',0,'顶顶顶顶顶顶',6999,49,24,0,'RMB','2015-02-04 19:42:43','的得到','[{\"src\":\"\\/uploads\\/image\\/20150204\\/20150204194241_95501.jpg\"}]','2015-02-25 21:34:24',0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `previewimg`
--

DROP TABLE IF EXISTS `previewimg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `previewimg` (
  `id_previewimg` int(11) NOT NULL AUTO_INCREMENT,
  `src_previewimg` varchar(255) DEFAULT NULL,
  `ordernum_previewimg` tinyint(2) DEFAULT NULL,
  `appid_previewimg` int(11) NOT NULL,
  PRIMARY KEY (`id_previewimg`),
  UNIQUE KEY `id_previewimg_UNIQUE` (`id_previewimg`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `previewimg`
--

LOCK TABLES `previewimg` WRITE;
/*!40000 ALTER TABLE `previewimg` DISABLE KEYS */;
INSERT INTO `previewimg` VALUES (1,'/uploads/image/20150205/20150205212335_99412.jpg',1,28),(2,'/uploads/image/20150205/20150205212338_37432.jpg',2,28),(3,'/uploads/image/20150205/20150205212430_19440.jpg',3,28),(4,'/uploads/image/20150205/20150205213221_79741.jpg',4,28),(5,'/uploads/image/20150205/20150205213225_81921.jpg',5,28);
/*!40000 ALTER TABLE `previewimg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ad`
--

DROP TABLE IF EXISTS `ad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad` (
  `id_ad` int(11) NOT NULL AUTO_INCREMENT,
  `img_ad` varchar(255) DEFAULT NULL,
  `content_ad` longtext,
  `position_ad` tinyint(1) DEFAULT NULL COMMENT '广告位置1:app侧导航固定广告位',
  PRIMARY KEY (`id_ad`),
  UNIQUE KEY `id_ad_UNIQUE` (`id_ad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad`
--

LOCK TABLES `ad` WRITE;
/*!40000 ALTER TABLE `ad` DISABLE KEYS */;
INSERT INTO `ad` VALUES (1,'/uploads/image/20150122/20150122200528_42835.jpg','广告ss',1);
/*!40000 ALTER TABLE `ad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form` (
  `id_form` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_form` varchar(127) DEFAULT NULL,
  `type_form` varchar(45) DEFAULT 'short',
  `navid_form` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_form`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='表单';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form`
--

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
INSERT INTO `form` VALUES (3,'出差','short',12),(4,'人生','long',12),(9,'姓名','short',21),(10,'联系电话','short',21),(11,'时间','short',21),(12,'预约项目','short',21);
/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `merchant`
--

DROP TABLE IF EXISTS `merchant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `merchant` (
  `id_merchant` int(11) NOT NULL AUTO_INCREMENT,
  `username_merchant` varchar(127) NOT NULL,
  `pwd_merchant` varchar(45) NOT NULL,
  `grade_merchant` tinyint(4) DEFAULT '0',
  `email_merchant` varchar(127) DEFAULT NULL,
  `phone_merchant` varchar(20) DEFAULT NULL,
  `avatar_merchant` varchar(255) DEFAULT NULL,
  `gender_merchant` tinyint(1) DEFAULT NULL COMMENT '0:male 1:female 2:unknown',
  `birthday_merchant` date DEFAULT NULL,
  `vip_grade_merchant` tinyint(4) DEFAULT '0',
  `corporation_merchant` varchar(127) DEFAULT NULL,
  `site_merchant` varchar(127) DEFAULT NULL,
  `reg_time_merchant` datetime DEFAULT NULL,
  `state_merchant` tinyint(1) DEFAULT '0' COMMENT '0:正常1:冻结2:删除',
  `lasttime_merchant` datetime DEFAULT NULL,
  `qq_merchant` varchar(127) DEFAULT NULL,
  `correlation_merchant` int(11) NOT NULL DEFAULT '0' COMMENT '上一级账号的id（子帐号只有上一级账号赋予的权限）',
  `msg_apply_merchant` text COMMENT '申请信息',
  `accept_apply_merchant` tinyint(1) DEFAULT '0' COMMENT '0:未响应1：拒绝2：接受',
  `pingkey_merchant` varchar(127) DEFAULT NULL,
  `paypal_merchant` varchar(127) DEFAULT NULL,
  PRIMARY KEY (`id_merchant`),
  UNIQUE KEY `username_merchant_UNIQUE` (`username_merchant`),
  UNIQUE KEY `id_merchant_UNIQUE` (`id_merchant`),
  UNIQUE KEY `email_merchant_UNIQUE` (`email_merchant`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='商户';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `merchant`
--

LOCK TABLES `merchant` WRITE;
/*!40000 ALTER TABLE `merchant` DISABLE KEYS */;
INSERT INTO `merchant` VALUES (0,'all_','7dd5fe5f4a5359bbb595858c5144d165',1,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,0,NULL,0,NULL,NULL),(1,'MK','759404247572d9c8159010322b8038bb',1,'1220959492@qq.com','18734920576','/uploads/image/20150220/20150220202356_45450.png',0,'2015-01-12',0,'风云科技','济南',NULL,0,NULL,'1220959492',0,NULL,0,'sk_test_H04GOGiPSKS0CmfbrPr1GqH4','sunxguo-facilitator@163.com'),(2,'MonkeyKing','759404247572d9c8159010322b8038bb',1,NULL,NULL,NULL,0,NULL,0,NULL,NULL,'2015-01-10 17:09:20',1,NULL,NULL,1,'',2,NULL,NULL),(4,'sunxguo@163.com','7dd5fe5f4a5359bbb595858c5144d165',1,NULL,NULL,NULL,0,NULL,0,NULL,NULL,'2015-01-10 17:37:49',1,NULL,NULL,0,NULL,0,NULL,NULL),(6,'www','c7efe3c3f9abc33065686682e98640fb',1,NULL,NULL,NULL,0,NULL,0,NULL,NULL,'2015-01-10 18:02:28',1,NULL,NULL,0,NULL,0,NULL,NULL),(7,'ddd','7dd5fe5f4a5359bbb595858c5144d165',1,NULL,NULL,NULL,0,NULL,0,NULL,NULL,'2015-01-10 19:26:01',1,NULL,NULL,0,NULL,0,NULL,NULL),(8,'MK1024','99266c1bbd97d3ed9bbcc4d62daf843c',1,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'2015-02-09 14:54:34',0,NULL,NULL,0,NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `merchant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app`
--

DROP TABLE IF EXISTS `app`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app` (
  `id_app` int(11) NOT NULL AUTO_INCREMENT,
  `name_app` varchar(45) NOT NULL,
  `icon_app` varchar(255) DEFAULT NULL,
  `icon_text_app` varchar(45) DEFAULT NULL,
  `cat_app` tinyint(4) DEFAULT NULL COMMENT '分类',
  `desc_app` text COMMENT '''描述''',
  `launch_app` varchar(255) DEFAULT NULL COMMENT '''启动图片''',
  `template_app` tinyint(4) DEFAULT NULL COMMENT '模板',
  `skin_app` tinyint(4) DEFAULT NULL,
  `skincolor_app` varchar(45) DEFAULT '#000000' COMMENT '自定义皮肤颜色值',
  `create_time_app` datetime NOT NULL,
  `update_time_app` datetime NOT NULL,
  `download_time_app` int(11) DEFAULT '0',
  `download_lasttime_app` datetime DEFAULT NULL,
  `state_app` tinyint(4) DEFAULT NULL COMMENT '0未生成1生成中2已生成（3待发布）4发布审核中5已发布6发布审核不通过7删除',
  `merchant_id_app` int(11) NOT NULL,
  `size_app` varchar(45) DEFAULT NULL COMMENT 'app大小单位：M',
  `android_link_app` varchar(255) DEFAULT NULL COMMENT '安卓app下载地址',
  `ios_link_app` varchar(255) DEFAULT NULL COMMENT '苹果app下载地址',
  `two_code_app` varchar(127) DEFAULT NULL COMMENT '二维码图片地址',
  `validity_app` tinyint(1) NOT NULL DEFAULT '1',
  `perid_app` int(11) DEFAULT '16',
  `alipay_app` varchar(255) DEFAULT NULL,
  `totalstar_app` bigint(20) DEFAULT '0',
  `commentnum_app` bigint(20) DEFAULT '0',
  `pingid_app` varchar(127) DEFAULT NULL,
  PRIMARY KEY (`id_app`),
  UNIQUE KEY `id_app_UNIQUE` (`id_app`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app`
--

LOCK TABLES `app` WRITE;
/*!40000 ALTER TABLE `app` DISABLE KEYS */;
INSERT INTO `app` VALUES (1,'安个','/resource/icon/1.png','',1,'阿股份飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞','/resource/launch/3.png',1,3,'#000000','0000-00-00 00:00:00','0000-00-00 00:00:00',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,12,3,NULL),(2,'嘎嘎','/resource/icon/3.png','嘎嘎',1,'啊嘎嘎嘎嘎嘎嘎嘎嘎嘎个嘎嘎嘎嘎嘎嘎嘎嘎嘎个uuuuuuuuuuuuuuuuu    噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢噢','/resource/launch/4.png',1,2,'#000000','0000-00-00 00:00:00','0000-00-00 00:00:00',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(3,'吧','/resource/icon/3.png','',1,'安抚阿迪发疯飞凤飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞','/resource/launch/3.png',1,4,'#000000','0000-00-00 00:00:00','0000-00-00 00:00:00',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(4,'觉得','/uploads/image/20150107/20150107151144_45678.jpg','',1,'方法飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞','/uploads/image/20150107/20150107151158_42876.jpg',1,3,'#000000','0000-00-00 00:00:00','2015-01-08 16:28:51',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(5,'嘎嘎','/resource/icon/4.png','',1,'嘎嘎嘎嘎嘎嘎嘎嘎嘎个嘎嘎嘎嘎嘎嘎个嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎个嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎个嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎嘎个','/resource/launch/2.png',1,2,'#000000','0000-00-00 00:00:00','0000-00-00 00:00:00',0,NULL,7,1,NULL,NULL,NULL,NULL,0,16,NULL,0,0,NULL),(6,'的','/resource/icon/1.png','',1,'顶顶顶顶顶顶顶顶顶顶的订单顶顶顶顶顶都等顶顶顶顶顶顶顶顶顶顶订单顶顶顶顶顶顶的订单顶顶顶顶顶都等顶顶顶顶顶顶顶顶顶顶','/resource/launch/2.png',1,1,'#000000','0000-00-00 00:00:00','0000-00-00 00:00:00',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(7,'ss',NULL,'ffff',1,'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff','/resource/launch/3.png',1,1,'#000000','2015-01-07 00:00:00','2015-01-07 00:00:00',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(8,'ss',NULL,'ffff',1,'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff','/resource/launch/3.png',1,1,'#000000','2015-01-07 00:00:00','2015-01-07 00:00:00',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(9,'宿舍','/resource/cusicon/20150107202727_1.png','',1,'太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太太','/resource/launch/3.png',1,3,'#000000','2015-01-07 00:00:00','2015-01-07 00:00:00',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(10,'f ','/resource/cusicon/20150107211635_1.png','',1,'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff','/resource/launch/3.png',1,2,'#000000','2015-01-07 00:00:00','2015-01-07 00:00:00',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(11,'g ','/resource/cusicon/20150107211803_1.png','册',1,'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg','/resource/launch/3.png',1,1,'#000000','2015-01-07 00:00:00','2015-01-07 00:00:00',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(12,'是','/resource/cusicon/20150107215225_1.png','谁谁谁',1,'谁谁谁三十岁少时诵诗书圣兽山s圣兽山s圣兽山s柔柔弱弱人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人','/resource/launch/3.png',1,1,'#000000','2015-01-07 21:52:25','2015-01-07 21:52:25',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(13,'方法','/resource/cusicon/20150108100316_1.png','啊',1,'啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊','/resource/launch/3.png',1,2,'#000000','2015-01-08 10:03:16','2015-01-08 10:03:16',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(14,'乖乖','/resource/cusicon/20150108100355_1.png','方法',1,'费凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞','/resource/launch/4.png',1,1,'#000000','2015-01-08 10:03:55','2015-01-08 10:03:55',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(15,'是','/resource/cusicon/20150108101739_1.png','宿舍',1,'少时诵诗书谁谁谁三十岁少时诵诗书圣兽山s圣兽山s圣兽山s飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞','/resource/launch/1.png',1,1,'#000000','2015-01-08 10:17:39','2015-01-08 10:17:39',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(16,'f','/resource/cusicon/20150108110527_1.png','宿',1,'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff','/resource/launch/1.png',1,1,'#000000','2015-01-08 11:05:27','2015-01-08 11:05:27',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(17,'s','/resource/cusicon/20150108110604_1.png','人',1,'人人人人人人人人柔柔弱弱人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人','/resource/launch/1.png',1,1,'#000000','2015-01-08 11:06:04','2015-01-08 11:06:04',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(18,'飞','/resource/cusicon/20150108110807_1.png','飞',1,'凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞','/resource/launch/1.png',1,1,'#000000','2015-01-08 11:08:07','2015-01-08 11:08:07',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(19,'飞飞','/resource/cusicon/20150108111019_1.png','飞方法',1,'飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞费费凤飞飞飞凤飞飞凤飞飞','/resource/launch/1.png',1,1,'#000000','2015-01-08 11:10:19','2015-01-08 11:10:19',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(20,'人','/resource/cusicon/20150108111115_1.png','啊发发发',1,'人人人人人人肉肉肉肉肉肉肉人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人','/resource/launch/1.png',1,1,'#000000','2015-01-08 11:11:15','2015-01-08 11:11:15',0,NULL,7,1,NULL,NULL,NULL,NULL,0,16,NULL,0,0,NULL),(21,'个','/resource/cusicon/20150108112130_1.png','和骄傲飞',1,'凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞','/resource/launch/1.png',1,1,'#000000','2015-01-08 11:21:30','2015-01-08 11:21:30',0,NULL,7,1,NULL,NULL,NULL,NULL,0,16,NULL,0,0,NULL),(22,'飞','/resource/cusicon/20150108151131_1.png','飞',1,'凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞','/resource/launch/4.png',1,2,'#000000','2015-01-08 15:11:31','2015-01-08 15:11:31',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(23,'飞','/resource/cusicon/20150108151154_1.png','飞',1,'凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞','/resource/launch/2.png',1,4,'#000000','2015-01-08 15:11:54','2015-01-08 15:11:54',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(24,'测试','/resource/cusicon/20150225160003_1.png','',1,'凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞凤飞飞飞凤飞飞凤飞飞飞凤飞飞飞凤飞飞飞凤飞飞凤飞飞','/uploads/image/20150311/20150311131414_26331.jpg',2,5,'#ab1fa8','2015-01-08 15:18:50','2015-03-11 13:14:26',0,NULL,3,1,NULL,'/uploads/app/1424926707MK24.apk',NULL,'/uploads/2dcode/24withlogo.png',1,16,'sunxguo@163.com',0,0,'app_OmvrL4D8qrb5qn9K'),(25,'信息之家','/resource/cusicon/20150121194825_1.png','信',3,'丰富凤飞飞反反复复反反复复反反复复反反复复方法反反复复反反复复反反复复反反复复方法反反复复反反复复反反复复反反复复方法','/resource/launch/2.png',1,3,'#000000','2015-01-21 19:48:25','2015-01-21 19:48:25',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(26,'信息之家','/resource/cusicon/20150121195035_1.png','信',2,'丰富凤飞飞反反复复反反复复反反复复反反复复方法反反复复反反复复反反复复反反复复方法反反复复反反复复反反复复反反复复方法','/resource/launch/2.png',1,3,'#000000','2015-01-21 19:50:35','2015-01-21 19:50:35',0,NULL,3,1,NULL,'/uploads/app/1423459616MK26.apk',NULL,'/uploads/2dcode/26withlogo.png',1,15,NULL,0,0,NULL),(27,'丰富','/resource/cusicon/20150121195524_1.png','丰富',4,'凤飞飞反反复复反反复复反反复复反反复复方法反反复复反反复复反反复复反反复复方法反反复复反反复复反反复复反反复复方法丰富反反复复发','/resource/launch/4.png',1,4,'#000000','2015-01-21 19:51:10','2015-01-21 19:55:24',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(28,'测试','/resource/cusicon/20150204200232_1.png','ff',2,'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff','/resource/launch/2.png',1,1,'#000000','2015-01-28 19:57:36','2015-02-04 20:02:33',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(29,'风云科技','/uploads/image/20150209/20150209145543_35422.jpg','',24,'形象APP，树立公司品牌。风云科技是一家。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。。','/resource/launch/4.png',2,5,'#1363f7','2015-02-09 14:56:45','2015-02-16 17:09:49',0,NULL,3,1,NULL,'/uploads/app/1423475118MK29.apk',NULL,'/uploads/2dcode/29withlogo.png',1,16,NULL,0,0,'OK'),(30,'風雲科技','/resource/cusicon/20150212153059_1.png','',1,'ffffffffffffffffffffffffrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr','/resource/launch/1.png',2,2,'#000000','2015-02-12 15:30:59','2015-02-12 16:36:23',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(31,'测试','/resource/cusicon/20150216173858_1.png','',1,'凤飞飞反反复复反反复复反反复复反反复复方法反反复复反反复复反反复复反反复复方法反反复复反反复复反反复复反反复复方法丰富反反复复发','/resource/launch/1.png',1,5,'#000000','2015-02-16 17:38:58','2015-02-16 17:38:58',0,NULL,7,1,NULL,NULL,NULL,NULL,1,16,NULL,0,0,NULL),(32,'ok','/resource/cusicon/20150225210340_1.png','',1,'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff','/resource/launch/1.png',1,1,'#000000','2015-02-25 21:03:40','2015-02-25 21:03:40',0,NULL,7,1,NULL,NULL,NULL,NULL,0,16,NULL,0,0,NULL);
/*!40000 ALTER TABLE `app` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marketad`
--

DROP TABLE IF EXISTS `marketad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marketad` (
  `id_marketad` int(11) NOT NULL AUTO_INCREMENT,
  `src_marketad` varchar(255) DEFAULT NULL,
  `link_marketad` varchar(255) DEFAULT NULL,
  `title_marketad` varchar(127) DEFAULT NULL,
  PRIMARY KEY (`id_marketad`),
  UNIQUE KEY `id_marketad_UNIQUE` (`id_marketad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='应用市场广告';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marketad`
--

LOCK TABLES `marketad` WRITE;
/*!40000 ALTER TABLE `marketad` DISABLE KEYS */;
INSERT INTO `marketad` VALUES (1,'/uploads/image/20150125/20150125213257_59290.jpg','http://www.baidu.com','自助APP平台');
/*!40000 ALTER TABLE `marketad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authority`
--

DROP TABLE IF EXISTS `authority`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authority` (
  `id_authority` int(11) NOT NULL AUTO_INCREMENT,
  `name_authority` varchar(127) NOT NULL,
  PRIMARY KEY (`id_authority`),
  UNIQUE KEY `id_authority_UNIQUE` (`id_authority`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='权限列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authority`
--

LOCK TABLES `authority` WRITE;
/*!40000 ALTER TABLE `authority` DISABLE KEYS */;
INSERT INTO `authority` VALUES (1,'添加新应用'),(2,'删除应用'),(3,'清除应用'),(4,'设置应用'),(5,'添加应用内容'),(6,'删除应用内容'),(7,'修改应用内容'),(8,'推送消息管理'),(9,'设置并赋予新账号自己权限之内的权限');
/*!40000 ALTER TABLE `authority` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `homeslider`
--

DROP TABLE IF EXISTS `homeslider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homeslider` (
  `id_homeslider` int(11) NOT NULL AUTO_INCREMENT,
  `src_homeslider` varchar(255) DEFAULT NULL,
  `ordernum_homeslider` tinyint(2) DEFAULT '0',
  `appid_homeslider` int(11) NOT NULL,
  PRIMARY KEY (`id_homeslider`),
  UNIQUE KEY `id_homeslider_UNIQUE` (`id_homeslider`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='滚动图首页';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homeslider`
--

LOCK TABLES `homeslider` WRITE;
/*!40000 ALTER TABLE `homeslider` DISABLE KEYS */;
INSERT INTO `homeslider` VALUES (1,'/uploads/image/20150118/20150118174119_82814.jpg',1,4),(3,'/uploads/image/20150118/20150118174319_69488.jpg',3,4),(4,'/uploads/image/20150118/20150118175302_39943.jpg',2,4),(5,'/uploads/image/20150212/20150212163220_40303.png',1,30),(6,'/uploads/image/20150212/20150212163226_55035.png',2,30);
/*!40000 ALTER TABLE `homeslider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `url_link` varchar(255) DEFAULT NULL,
  `navid_link` int(11) NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link`
--

LOCK TABLES `link` WRITE;
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
INSERT INTO `link` VALUES (2,'http://so.com',18);
/*!40000 ALTER TABLE `link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `appid_user` int(11) NOT NULL,
  `username_user` varchar(127) NOT NULL,
  `pwd_user` varchar(45) NOT NULL,
  `gender_user` tinyint(1) DEFAULT '2' COMMENT '0:男1:女2:未知',
  `email_user` varchar(127) DEFAULT NULL,
  `phone_user` varchar(45) DEFAULT NULL,
  `state_user` varchar(45) DEFAULT '0' COMMENT '0:正常1:冻结',
  `lasttime_user` datetime DEFAULT NULL COMMENT '最后登录时间',
  `time_user` datetime DEFAULT NULL COMMENT '注册时间',
  `realname_user` varchar(127) DEFAULT NULL,
  `address_user` varchar(127) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user_UNIQUE` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='每个商户app下的用户';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,4,'sunxguo','1',0,'sunxguo@163.com','18734920576','0',NULL,NULL,'孙行者','山东'),(2,24,'MonkeyKing','759404247572d9c8159010322b8038bb',2,NULL,'18734920576','0','2015-03-05 14:02:06','2015-02-01 14:24:05','孙兴国','中国 北京'),(3,24,'sxg','759404247572d9c8159010322b8038bb',2,NULL,'18734920576','0','2015-02-01 18:14:52','2015-02-01 18:14:52','孙行者','中国');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_merc`
--

DROP TABLE IF EXISTS `auth_merc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_merc` (
  `id_auth_merc` int(11) NOT NULL AUTO_INCREMENT,
  `merchantid_auth_merc` int(11) NOT NULL COMMENT '商户账号id',
  `authid_auth_merc` int(11) NOT NULL COMMENT '权限id',
  PRIMARY KEY (`id_auth_merc`),
  UNIQUE KEY `id_auth_merc_UNIQUE` (`id_auth_merc`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='账号所拥有的权限';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_merc`
--

LOCK TABLES `auth_merc` WRITE;
/*!40000 ALTER TABLE `auth_merc` DISABLE KEYS */;
INSERT INTO `auth_merc` VALUES (29,2,1),(30,2,2),(31,2,3),(32,2,4),(33,2,5),(34,2,6),(35,2,7),(36,2,8);
/*!40000 ALTER TABLE `auth_merc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `type_message` tinyint(1) NOT NULL COMMENT '种类 0：admin 推送app客户端 1：admin 发送merchant  2：merchant推送给app客户端 3：merchant发送给用户   以上to对象为0时为所有',
  `from_message` int(11) NOT NULL,
  `to_message` int(11) NOT NULL,
  `title_message` varchar(127) NOT NULL,
  `msg_message` text NOT NULL,
  `time_message` datetime NOT NULL,
  `check_message` tinyint(1) NOT NULL DEFAULT '0',
  `device_message` tinyint(1) DEFAULT '0' COMMENT '0:all  1:android  2:ios',
  `appid_message` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_message`),
  UNIQUE KEY `id_message_UNIQUE` (`id_message`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,0,1,0,'ios用户福利','抽奖','2015-01-22 15:27:40',0,2,NULL),(2,3,1,0,'通知你冻结','丰富','2015-01-22 15:48:59',0,0,NULL),(3,1,1,1,'违规处理','冻结你的账户','2015-01-22 15:49:29',0,0,NULL),(4,2,1,0,'有优惠活动','冻结你的账户','2015-01-31 15:22:29',0,0,24),(5,0,1,0,'测试消息','开始测试发送消息...','2015-02-10 09:59:54',0,1,0),(6,2,1,0,'android 用户','抽奖','2015-02-10 11:50:04',0,1,29),(7,2,1,0,'android 用户','抽奖','2015-02-10 11:50:57',0,1,29),(10,-1,1,0,'ss','sss','2015-02-20 20:00:26',0,0,0),(11,2,1,0,'测试','测试内容','2015-02-25 20:37:41',0,2,24);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marketscroll`
--

DROP TABLE IF EXISTS `marketscroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marketscroll` (
  `id_marketscroll` int(11) NOT NULL AUTO_INCREMENT,
  `src_marketscroll` varchar(255) DEFAULT NULL,
  `link_marketscroll` varchar(255) DEFAULT NULL,
  `title_marketscroll` varchar(127) DEFAULT NULL,
  `order_marketscroll` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_marketscroll`),
  UNIQUE KEY `id_marketscroll_UNIQUE` (`id_marketscroll`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='应用市场 首页滚动图片';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marketscroll`
--

LOCK TABLES `marketscroll` WRITE;
/*!40000 ALTER TABLE `marketscroll` DISABLE KEYS */;
INSERT INTO `marketscroll` VALUES (3,'/uploads/image/20150125/20150125194934_41478.jpg','http://www.baidu.com','百度',1);
/*!40000 ALTER TABLE `marketscroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(45) NOT NULL,
  `fid_category` int(11) NOT NULL,
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `id_category_UNIQUE` (`id_category`),
  UNIQUE KEY `name_category_UNIQUE` (`name_category`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='应用分类';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'生活',0),(2,'新闻',0),(3,'娱乐',0),(4,'体育',0),(5,'美食佳饮',0),(6,'旅游',0),(7,'社交',0),(8,'参考',0),(9,'医疗',0),(10,'购物',0),(11,'音乐音频',0),(12,'财务',0),(13,'健康健身',0),(14,'导航',0),(15,'儿童',0),(16,'工具',0),(17,'教育',0),(18,'商务',0),(19,'媒体视频',0),(20,'天气',0),(21,'图书',0),(22,'报刊杂志',0),(23,'效率',0),(24,'政企门户',0),(25,'游戏',0);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id_content` int(11) NOT NULL AUTO_INCREMENT,
  `text_content` longtext,
  `navid_content` int(11) NOT NULL,
  PRIMARY KEY (`id_content`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='导航nav类型1的内容';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (2,'',29),(5,'',30);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `time_log` datetime NOT NULL,
  `operation_log` varchar(127) DEFAULT NULL,
  `merchant_log` int(11) NOT NULL,
  PRIMARY KEY (`id_log`),
  UNIQUE KEY `id_log_UNIQUE` (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8 COMMENT='cms操作日志';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2015-01-29 20:29:01','删除id为【27】的APP',1),(2,'2015-01-29 20:34:22',NULL,1),(3,'2015-01-29 20:59:59','修改商户信息',1),(4,'2015-01-29 21:00:06','修改商户信息',1),(5,'2015-01-29 21:00:39','添加id为28的APP的滚动图【/uploads/image/20150129/20150129210039_28080.jpg】',1),(6,'2015-01-30 12:20:22','修改id为【28】的APP【测试】',1),(7,'2015-01-30 12:44:40','添加id为24的APP的导航【商城】',1),(8,'2015-01-30 12:48:28','修改导航商城',1),(9,'2015-01-30 12:48:30','修改导航商城',1),(10,'2015-01-30 13:29:06','修改导航关于我们',1),(11,'2015-01-30 14:06:56','添加id为24的APP的导航【文章】',1),(12,'2015-01-30 14:07:04','修改导航文章',1),(13,'2015-01-30 14:07:05','修改导航文章',1),(14,'2015-01-30 14:45:07','添加文章【围猎“计划”：令氏家族及其贪腐朋友圈的落幕】',1),(15,'2015-01-30 14:46:20','添加文章【中纪委官员：已掌握广电领域腐败惯用手法和“潜规则”】',1),(16,'2015-01-30 15:27:02','修改导航地址',1),(17,'2015-01-30 15:29:26','修改导航链接地址',1),(18,'2015-01-30 19:05:06','添加id为24的APP的导航【有分类商城】',1),(19,'2015-01-30 19:05:12','修改导航有分类商城',1),(20,'2015-01-30 19:05:13','修改导航有分类商城',1),(21,'2015-01-30 20:27:54','添加商品【iphone6】',1),(22,'2015-01-31 17:56:30','修改商户信息',1),(23,'2015-02-02 14:57:40','删除导航id18',1),(24,'2015-02-04 10:42:20','取消订单id【3】',1),(25,'2015-02-04 11:34:26','修改APP【】的支付宝收款账号',1),(26,'2015-02-04 11:34:37','修改APP【】的支付宝收款账号',1),(27,'2015-02-04 11:34:53','修改APP【24】的支付宝收款账号',1),(28,'2015-02-04 11:37:28','修改APP【24】的支付宝收款账号',1),(29,'2015-02-04 11:38:32','修改APP【24】的支付宝收款账号',1),(30,'2015-02-04 11:38:37','修改APP【24】的支付宝收款账号',1),(31,'2015-02-04 11:38:42','修改APP【24】的支付宝收款账号',1),(32,'2015-02-04 17:22:07','修改导航有分类商城',1),(33,'2015-02-04 17:22:14','修改导航有分类商城',1),(34,'2015-02-04 17:23:45','修改导航有分类商城',1),(35,'2015-02-04 17:24:21','修改导航有分类商城',1),(36,'2015-02-04 17:26:29','修改导航有分类商城',1),(37,'2015-02-04 17:26:34','修改导航有分类商城',1),(38,'2015-02-04 17:29:15','修改导航有分类商城',1),(39,'2015-02-04 17:37:39','修改导航有分类商城',1),(40,'2015-02-04 17:37:44','修改导航有分类商城',1),(41,'2015-02-04 17:39:43','修改导航有分类商城',1),(42,'2015-02-04 17:47:36','修改导航有分类商城',1),(43,'2015-02-04 19:11:57','修改导航有分类商城',1),(44,'2015-02-04 19:12:25','修改导航有分类商城',1),(45,'2015-02-04 19:13:44','修改导航有分类商城',1),(46,'2015-02-04 19:13:57','修改导航有分类商城',1),(47,'2015-02-04 19:18:37','修改导航有分类商城',1),(48,'2015-02-04 19:22:33','修改导航有分类商城',1),(49,'2015-02-04 19:23:04','修改导航有分类商城',1),(50,'2015-02-04 19:24:35','修改导航有分类商城',1),(51,'2015-02-04 19:25:30','修改导航有分类商城',1),(52,'2015-02-04 19:26:40','修改导航有分类商城',1),(53,'2015-02-04 19:33:14','修改导航有分类商城',1),(54,'2015-02-04 19:33:46','修改导航有分类商城',1),(55,'2015-02-04 19:34:14','修改导航有分类商城',1),(56,'2015-02-04 19:38:19','修改导航有分类商城',1),(57,'2015-02-04 19:38:24','修改导航有分类商城',1),(58,'2015-02-04 19:42:43','添加商品【ipad】',1),(59,'2015-02-04 20:02:33','修改id为【28】的APP【测试】',1),(60,'2015-02-04 20:51:15','删除滚动图id5',1),(61,'2015-02-04 21:17:17','添加id为28的APP的预览图【<img width=\'50\' height=\'100\' src=\'/uploads/image/20150204/20150204211716_71655.jpg\'>】',1),(62,'2015-02-04 21:17:54','添加id为28的APP的预览图【<img width=\'50\' height=\'100\' src=\'/uploads/image/20150204/20150204211754_78096.jpg\'>】',1),(63,'2015-02-04 21:20:43','添加id为28的APP的预览图【<img width=\'50\' height=\'100\' src=\'/uploads/image/20150204/20150204212043_53214.jpg\'>】',1),(64,'2015-02-04 21:22:21','添加id为28的APP的预览图【<img width=\'50\' height=\'100\' src=\'/uploads/image/20150204/20150204212221_79463.jpg\'>】',1),(65,'2015-02-04 21:24:12','添加id为28的APP的预览图【<img width=\'50\' height=\'100\' src=\'/uploads/image/20150204/20150204212412_28742.jpg\'>】',1),(66,'2015-02-04 21:30:28','修改预览图id为【】的顺序',1),(67,'2015-02-04 21:30:30','修改预览图id为【】的顺序',1),(68,'2015-02-04 21:31:39','添加id为28的APP的预览图【<img width=\'50\' height=\'100\' src=\'/uploads/image/20150204/20150204213139_65873.jpg\'>】',1),(69,'2015-02-04 21:31:48','修改预览图id为【3】的顺序',1),(70,'2015-02-04 21:31:51','修改预览图id为【3】的顺序',1),(71,'2015-02-04 21:31:53','修改预览图id为【1】的顺序',1),(72,'2015-02-04 21:31:57','修改预览图id为【1】的顺序',1),(73,'2015-02-04 21:31:59','修改预览图id为【2】的顺序',1),(74,'2015-02-04 21:32:04','删除预览图2',1),(75,'2015-02-04 21:45:40','发布id为【28】的APP到市场',1),(76,'2015-02-04 21:46:10','删除预览图1',1),(77,'2015-02-04 21:46:12','删除预览图3',1),(78,'2015-02-05 21:23:36','添加id为28的APP的预览图【<img width=\'50\' height=\'100\' src=\'/uploads/image/20150205/20150205212335_99412.jpg\'>】',1),(79,'2015-02-05 21:23:39','添加id为28的APP的预览图【<img width=\'50\' height=\'100\' src=\'/uploads/image/20150205/20150205212338_37432.jpg\'>】',1),(80,'2015-02-05 21:23:42','发布id为【28】的APP到市场',1),(81,'2015-02-05 21:24:30','添加id为28的APP的预览图【<img width=\'50\' height=\'100\' src=\'/uploads/image/20150205/20150205212430_19440.jpg\'>】',1),(82,'2015-02-05 21:32:21','添加id为28的APP的预览图【<img width=\'50\' height=\'100\' src=\'/uploads/image/20150205/20150205213221_79741.jpg\'>】',1),(83,'2015-02-05 21:32:25','添加id为28的APP的预览图【<img width=\'50\' height=\'100\' src=\'/uploads/image/20150205/20150205213225_81921.jpg\'>】',1),(84,'2015-02-06 17:22:22','申请添加子帐号【MonkeyKing】',1),(85,'2015-02-06 17:22:33','申请添加子帐号【MonkeyKing】',1),(86,'2015-02-06 17:22:34','申请添加子帐号【MonkeyKing】',1),(87,'2015-02-06 17:23:32','申请添加子帐号【】',1),(88,'2015-02-06 17:33:24','申请添加子帐号【MonkeyKing】',1),(89,'2015-02-06 17:37:10','申请添加子帐号【MonkeyKing】',1),(90,'2015-02-06 17:38:56','申请添加子帐号【MonkeyKing】',1),(91,'2015-02-06 20:40:17','删除id为【22】的APP',2),(92,'2015-02-06 20:43:11','删除id为【22】的APP',2),(93,'2015-02-06 20:43:20','删除id为【22】的APP',2),(94,'2015-02-06 20:47:56','彻底清除id为【21】的APP',2),(95,'2015-02-07 12:40:31','添加id为28的APP的导航【测试】',1),(96,'2015-02-07 12:40:44','添加id为28的APP的导航【刚刚】',1),(97,'2015-02-07 12:40:50','添加id为28的APP的导航【刚刚】',1),(98,'2015-02-07 12:40:56','删除导航id25',1),(99,'2015-02-07 12:40:58','删除导航id26',1),(100,'2015-02-07 12:41:00','删除导航id27',1),(101,'2015-02-07 12:41:04','添加id为28的APP的导航【】',1),(102,'2015-02-07 12:41:08','删除导航id28',1),(103,'2015-02-07 12:49:11','添加文章【阅读器PK客户端，读书习惯决定命运】',1),(104,'2015-02-09 13:43:13','删除id为【24】的APP',1),(105,'2015-02-09 13:43:16','删除id为【23】的APP',1),(106,'2015-02-09 13:43:18','删除id为【22】的APP',1),(107,'2015-02-09 13:43:20','删除id为【19】的APP',1),(108,'2015-02-09 13:43:22','删除id为【18】的APP',1),(109,'2015-02-09 13:43:23','删除id为【17】的APP',1),(110,'2015-02-09 14:54:34','【MK1024】注册',1),(111,'2015-02-09 14:56:45','添加APP【风云科技】',1),(112,'2015-02-10 11:50:04',NULL,1),(113,'2015-02-10 11:50:57','推送消息【android 用户】',1),(114,'2015-02-10 17:06:17','添加id为29的APP的导航【简介】',1),(115,'2015-02-10 18:39:10','修改id为【29】的APP【风云科技】',1),(116,'2015-02-12 15:30:59','添加APP【rr】',1),(117,'2015-02-12 16:32:21','添加id为30的APP的滚动图【/uploads/image/20150212/20150212163220_40303.png】',1),(118,'2015-02-12 16:32:26','添加id为30的APP的滚动图【/uploads/image/20150212/20150212163226_55035.png】',1),(119,'2015-02-12 16:36:23','修改id为【30】的APP【風雲科技】',1),(120,'2015-02-12 17:04:21','添加id为30的APP的导航【測試】',1),(121,'2015-02-12 17:04:26','添加id为30的APP的导航【方法】',1),(122,'2015-02-12 17:19:02','添加id为30的APP的导航【首頁】',1),(123,'2015-02-12 17:19:04','修改导航id为【28】的顺序',1),(124,'2015-02-12 17:19:07','修改导航id为【28】的顺序',1),(125,'2015-02-12 17:19:30','添加id为30的APP的导航【更多】',1),(126,'2015-02-12 18:34:48','修改导航更多',1),(127,'2015-02-12 18:35:04','修改导航商城',1),(128,'2015-02-12 18:35:12','添加id为30的APP的导航【豐富】',1),(129,'2015-02-12 18:35:22','修改导航豐富',1),(130,'2015-02-12 18:37:14','修改导航接口',1),(131,'2015-02-12 18:37:25','修改导航豐富',1),(132,'2015-02-12 18:37:37','添加id为30的APP的导航【設置】',1),(133,'2015-02-14 20:57:03','删除id为【30】的APP',1),(134,'2015-02-15 17:19:13','修改id为【29】的APP【风云科技】',1),(135,'2015-02-15 18:59:28','删除id为【30】的APP',1),(136,'2015-02-16 15:29:10','修改id为【29】的APP【风云科技】',1),(137,'2015-02-16 16:50:46','修改id为【29】的APP【风云科技】',1),(138,'2015-02-16 16:57:37','修改id为【29】的APP【风云科技】',1),(139,'2015-02-16 16:57:47',NULL,1),(140,'2015-02-16 16:57:54','修改id为【29】的APP【风云科技】',1),(141,'2015-02-16 16:58:10','修改id为【29】的APP【风云科技】',1),(142,'2015-02-16 17:06:40','修改id为【29】的APP【风云科技】',1),(143,'2015-02-16 17:08:18','修改id为【29】的APP【风云科技】',1),(144,'2015-02-16 17:08:49','修改id为【29】的APP【风云科技】',1),(145,'2015-02-16 17:08:51','修改id为【29】的APP【风云科技】',1),(146,'2015-02-16 17:09:03','修改id为【29】的APP【风云科技】',1),(147,'2015-02-16 17:09:49','修改id为【29】的APP【风云科技】',1),(148,'2015-02-16 17:38:58','添加APP【测试】',1),(149,'2015-02-16 17:54:22','删除id为【31】的APP',1),(150,'2015-02-16 17:54:40','删除id为【30】的APP',1),(151,'2015-02-20 19:48:39','推送消息【】',1),(152,'2015-02-20 19:50:48','推送消息【】',1),(153,'2015-02-20 20:00:26','推送消息【ss】',1),(154,'2015-02-20 20:23:56','修改商户头像',1),(155,'2015-02-24 21:00:36','修改APP【29】的Ping++的Id',1),(156,'2015-02-24 21:01:01','修改APP【24】的Ping++的Id',1),(157,'2015-02-24 21:22:31','修改商户Ping Key',1),(158,'2015-02-24 21:23:17','修改商户Ping Key',1),(159,'2015-02-24 21:23:58','修改商户Ping Key',1),(160,'2015-02-24 21:52:37','修改商品【iphone6 plus 64G】',1),(161,'2015-02-24 21:52:58','修改商品【iphone6 plus 64G】',1),(162,'2015-02-25 14:11:08','删除id为【24】的APP',1),(163,'2015-02-25 15:55:02','修改id为【24】的APP【修改】',1),(164,'2015-02-25 16:00:03','修改id为【24】的APP【测试】',1),(165,'2015-02-25 20:37:41','推送消息【测试】',1),(166,'2015-02-25 21:03:40','添加APP【ok】',1),(167,'2015-02-25 21:03:47','删除id为【32】的APP',1),(168,'2015-02-25 21:03:55','彻底清除id为【32】的APP',1),(169,'2015-02-25 21:34:24','修改商品【ipad】',1),(170,'2015-02-25 21:34:41','修改商品【iphone6】',1),(171,'2015-02-25 21:34:55','修改商品【iphone6 plus 64G】',1),(172,'2015-03-02 17:26:00','修改id为【24】的APP【测试】',1),(173,'2015-03-02 17:27:42','修改id为【24】的APP【测试】',1),(174,'2015-03-11 13:14:26','修改id为【24】的APP【测试】',1);
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username_admin` varchar(100) NOT NULL,
  `pwd_admin` varchar(45) NOT NULL,
  `grade_admin` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `id_admin_UNIQUE` (`id_admin`),
  UNIQUE KEY `username_admin_UNIQUE` (`username_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'MonkeyKing','759404247572d9c8159010322b8038bb',0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subnav`
--

DROP TABLE IF EXISTS `subnav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subnav` (
  `id_subnav` int(11) NOT NULL AUTO_INCREMENT,
  `navid_subnav` int(11) NOT NULL COMMENT '''所属nav''',
  `name_subnav` varchar(127) DEFAULT NULL,
  `content_subnav` longtext,
  PRIMARY KEY (`id_subnav`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='二级导航';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subnav`
--

LOCK TABLES `subnav` WRITE;
/*!40000 ALTER TABLE `subnav` DISABLE KEYS */;
INSERT INTO `subnav` VALUES (39,1,'介绍','公司简介'),(40,1,'地址','中国'),(41,1,'电话','100000');
/*!40000 ALTER TABLE `subnav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `websiteconfig`
--

DROP TABLE IF EXISTS `websiteconfig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `websiteconfig` (
  `id_websiteconfig` int(11) NOT NULL AUTO_INCREMENT,
  `key_websiteconfig` varchar(255) DEFAULT NULL,
  `value_websiteconfig` longtext,
  PRIMARY KEY (`id_websiteconfig`),
  UNIQUE KEY `id_websiteconfig_UNIQUE` (`id_websiteconfig`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `websiteconfig`
--

LOCK TABLES `websiteconfig` WRITE;
/*!40000 ALTER TABLE `websiteconfig` DISABLE KEYS */;
INSERT INTO `websiteconfig` VALUES (1,'appleDeveloperAccount',''),(2,'appleDeveloperPassword','');
/*!40000 ALTER TABLE `websiteconfig` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nav`
--

DROP TABLE IF EXISTS `nav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nav` (
  `id_nav` int(11) NOT NULL AUTO_INCREMENT,
  `app_id_nav` int(11) NOT NULL,
  `name_nav` varchar(45) NOT NULL,
  `order_nav` tinyint(4) DEFAULT '0' COMMENT '序号越小越靠前',
  `icon_nav` varchar(127) DEFAULT NULL,
  `type_nav` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1://固定页面2://固定二级页面3://文章列表4://表单页5://商城6://链接',
  `hasmallcat_nav` tinyint(1) NOT NULL DEFAULT '0' COMMENT '商城类型 默认无分类',
  PRIMARY KEY (`id_nav`),
  UNIQUE KEY `id_nav_UNIQUE` (`id_nav`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='app导航信息';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nav`
--

LOCK TABLES `nav` WRITE;
/*!40000 ALTER TABLE `nav` DISABLE KEYS */;
INSERT INTO `nav` VALUES (1,24,'关于我们',2,'/assets/images/mobile/8.png',2,0),(12,24,'案例分享',1,'/assets/images/mobile/2.png',4,0),(19,4,'新闻',1,'/assets/images/mobile/5.png',3,0),(20,4,'商城',2,'/assets/images/mobile/2.png',5,0),(21,4,'预约',3,'/assets/images/mobile/9.png',4,0),(22,24,'商城',3,'/assets/images/mobile/2.png',5,0),(23,24,'文章',4,'/assets/images/mobile/12.png',3,0),(24,24,'有分类商城',5,'/assets/images/mobile/2.png',5,1),(25,29,'简介',1,'/assets/images/mobile/11.png',0,0),(26,30,'測試',2,'/assets/images/mobile/2.png',0,0),(27,30,'方法',3,'/assets/images/mobile/2.png',0,0),(28,30,'首頁',1,'/assets/images/mobile/11.png',0,0),(29,30,'商城',4,'/assets/images/mobile/14.png',1,0),(30,30,'天天',5,'/assets/images/mobile/2.png',1,0),(31,30,'設置',6,'/assets/images/mobile/5.png',0,0);
/*!40000 ALTER TABLE `nav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template` (
  `id_template` int(11) NOT NULL AUTO_INCREMENT,
  `name_template` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_template`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='模板';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mall_category`
--

DROP TABLE IF EXISTS `mall_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mall_category` (
  `id_mall_category` int(11) NOT NULL AUTO_INCREMENT,
  `navid_mall_category` int(11) DEFAULT NULL,
  `name_mall_category` varchar(127) DEFAULT NULL,
  `order_mall_category` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_mall_category`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COMMENT='商城分类';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mall_category`
--

LOCK TABLES `mall_category` WRITE;
/*!40000 ALTER TABLE `mall_category` DISABLE KEYS */;
INSERT INTO `mall_category` VALUES (37,24,'衣服',0),(38,24,'数码',1),(39,24,'电器',2),(40,24,'箱包',3);
/*!40000 ALTER TABLE `mall_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `userid_order` int(11) NOT NULL,
  `total_order` int(11) DEFAULT NULL,
  `products_order` longtext COMMENT '商品id&数量&单价',
  `address_order` text NOT NULL,
  `phone_order` varchar(45) NOT NULL,
  `name_order` varchar(45) NOT NULL,
  `time_order` datetime NOT NULL,
  `state_order` tinyint(1) NOT NULL COMMENT '0:创建未支付1：已支付 2：确认并发货 3：交易成功 4：取消',
  `appid_order` int(11) NOT NULL,
  `num_order` bigint(20) NOT NULL,
  PRIMARY KEY (`id_order`),
  UNIQUE KEY `id_order_UNIQUE` (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='订单';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,2,11998,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"5999\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-01-20 21:37:06\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-02-02 11:29:01',0,24,14228477415659),(2,2,11998,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"5999\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-01-20 21:37:06\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-02-02 11:30:56',0,24,14228478563192),(3,2,11998,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"5999\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-01-20 21:37:06\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-02-02 11:31:55',4,24,14228479154120),(4,3,5999,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"5999\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-01-20 21:37:06\",\"collect_product\":\"0\"},\"countnum\":1}]','中国','18734920576','孙行者','2015-02-02 20:10:58',0,24,14228790586558),(5,3,11998,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"5999\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-01-20 21:37:06\",\"collect_product\":\"0\"},\"countnum\":\"2\"}]','中国','18734920576','孙行者','2015-02-02 20:40:33',0,24,14228808331484),(6,2,20996,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"5999\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-01-20 21:37:06\",\"collect_product\":\"0\"},\"countnum\":\"1\"},{\"info\":{\"id_product\":\"3\",\"name_product\":\"iphone6\",\"catid_product\":\"1\",\"description_product\":\"<p style=\\\"color:#404040;font-family:tahoma, arial, \\u5b8b\\u4f53, sans-serif;font-size:14px;background-color:#FFFFFF;\\\">\\n\\t<span style=\\\"color:#CC0000;font-family:simhei;font-size:24px;line-height:33px;\\\">iPhone 6 \\u4e3a\\u79fb\\u52a84G\\u7248\\uff01\\uff08\\u5355\\u5361\\u591a\\u6a21\\uff0c\\u652f\\u6301\\u7f51\\u7edc\\u6a21\\u5f0f\\uff1aTD-LTE\\/TD-SCDMA\\/GSM\\uff09FDD-LTE\\/WCDMA\\uff08\\u4ec5\\u51fa\\u56fd\\u6f2b\\u6e38\\u65f6\\u652f\\u6301\\uff09<\\/span>\\n<\\/p>\\n<p style=\\\"color:#404040;font-family:tahoma, arial, \\u5b8b\\u4f53, sans-serif;font-size:14px;background-color:#FFFFFF;\\\">\\n\\t<img alt=\\\"iPhone6\\u5957\\u9910\\\" src=\\\"http:\\/\\/img04.taobaocdn.com\\/imgextra\\/i4\\/713805254\\/TB2t5ZGbFXXXXXqXXXXXXXXXXXX_!!713805254.jpg_.webp\\\" \\/>\\n<\\/p>\\n<p style=\\\"color:#404040;font-family:tahoma, arial, \\u5b8b\\u4f53, sans-serif;font-size:14px;background-color:#FFFFFF;\\\">\\n\\t<span>&nbsp;<\\/span>\\n<\\/p>\\n<p style=\\\"color:#404040;font-family:tahoma, arial, \\u5b8b\\u4f53, sans-serif;font-size:14px;background-color:#FFFFFF;\\\">\\n\\t<img align=\\\"absmiddle\\\" src=\\\"http:\\/\\/img04.taobaocdn.com\\/imgextra\\/i4\\/713805254\\/TB2jbx3bpXXXXXQXpXXXXXXXXXX-713805254.jpg_.webp\\\" \\/>\\n<\\/p>\\n<p style=\\\"color:#404040;font-family:tahoma, arial, \\u5b8b\\u4f53, sans-serif;font-size:14px;background-color:#FFFFFF;\\\">\\n\\t<img align=\\\"absmiddle\\\" src=\\\"http:\\/\\/img01.taobaocdn.com\\/imgextra\\/i1\\/713805254\\/TB2ls0rbpXXXXbOXXXXXXXXXXXX_!!713805254.jpg_.webp\\\" \\/><img align=\\\"absmiddle\\\" src=\\\"http:\\/\\/img03.taobaocdn.com\\/imgextra\\/i3\\/713805254\\/TB2gmJmbpXXXXXhXpXXXXXXXXXX_!!713805254.jpg_.webp\\\" \\/>\\n<\\/p>\",\"oriprice_product\":\"5999\",\"price_product\":\"4999\",\"navid_product\":\"24\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-30 20:27:54\",\"summary_product\":\"\\u5355\\u5361\\u591a\\u6a21\\uff0c\\u652f\\u6301\\u7f51\\u7edc\\u6a21\\u5f0f\\uff1aTD-LTE\\/TD-SCDMA\\/GS\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150130\\\\\\/20150130202751_30874.jpg\\\"}]\",\"lasttime_product\":\"2015-01-30 20:27:54\",\"collect_product\":\"0\"},\"countnum\":3}]','China','18734920576','孙兴国','2015-02-02 20:43:14',0,24,14228809946648),(7,2,5999,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"5999\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-01-20 21:37:06\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-02-23 15:33:32',0,24,14246768124306),(8,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-02-24 21:53:20',0,24,14247860006172),(9,2,108,'[{\"info\":{\"id_product\":\"4\",\"name_product\":\"ipad\",\"catid_product\":\"0\",\"description_product\":\"\\u9876\\u9876\\u9876\\u9876\\u9876\\u9876\",\"oriprice_product\":\"6999\",\"price_product\":\"49\",\"navid_product\":\"24\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-02-04 19:42:43\",\"summary_product\":\"\\u7684\\u5f97\\u5230\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150204\\\\\\/20150204194241_95501.jpg\\\"}]\",\"lasttime_product\":\"2015-02-25 21:34:24\",\"collect_product\":\"0\"},\"countnum\":1},{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"59\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-25 21:34:55\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-02-25 21:36:09',0,24,14248713697326),(10,2,59,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"59\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-25 21:34:55\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-02-28 21:18:26',0,24,14251295065372),(11,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-02-28 21:23:53',0,24,14251298336614),(12,2,59,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"59\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-25 21:34:55\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-02-28 21:43:32',0,24,14251310129480),(13,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-02-28 22:10:05',0,24,14251326059518),(14,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-01 17:56:21',0,24,14252037811539),(15,2,59,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"59\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-25 21:34:55\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-01 18:25:29',0,24,14252055296444),(16,2,59,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"59\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-25 21:34:55\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-01 18:36:01',0,24,14252061611475),(17,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-01 21:13:45',0,24,14252156254354),(18,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-01 21:22:26',1,24,14252161468153),(19,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-01 21:42:31',0,24,14252173514924),(20,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-01 21:56:44',0,24,14252182048894),(21,2,59,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"59\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-25 21:34:55\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-01 22:02:07',0,24,14252185274641),(22,2,59,'[{\"info\":{\"id_product\":\"1\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"59\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"NTD\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-25 21:34:55\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-02 12:06:12',0,24,14252691721743),(23,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-02 15:17:18',0,24,14252806383433),(24,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-02 15:27:46',0,24,14252812665106),(25,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-02 15:36:33',0,24,14252817932566),(26,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-02 15:44:45',1,24,14252822852981),(27,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','China','18734920576','孙兴国','2015-03-02 15:48:47',1,24,14252825271536),(28,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','中国 北京','18734920576','孙兴国','2015-03-02 16:28:20',1,24,14252849008708),(29,2,25,'[{\"info\":{\"id_product\":\"2\",\"name_product\":\"iphone6 plus 64G\",\"catid_product\":\"0\",\"description_product\":\"\\u624b\\u673a\",\"oriprice_product\":\"6999\",\"price_product\":\"25\",\"navid_product\":\"22\",\"state_product\":\"0\",\"unit_product\":\"RMB\",\"time_product\":\"2015-01-19 15:24:44\",\"summary_product\":\"\\u82f9\\u679c\\u624b\\u673a\",\"thumbnail_product\":\"[{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151919_26243.jpg\\\"},{\\\"src\\\":\\\"\\\\\\/uploads\\\\\\/image\\\\\\/20150119\\\\\\/20150119151940_76189.jpg\\\"}]\",\"lasttime_product\":\"2015-02-24 21:52:58\",\"collect_product\":\"0\"},\"countnum\":1}]','中国 北京','18734920576','孙兴国','2015-03-02 16:33:42',1,24,14252852222335);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formdata`
--

DROP TABLE IF EXISTS `formdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formdata` (
  `id_formdata` int(11) NOT NULL AUTO_INCREMENT,
  `userid_formdata` int(11) DEFAULT NULL,
  `time_formdata` datetime NOT NULL,
  `data_formdata` longtext,
  `formid_formdata` int(11) NOT NULL,
  PRIMARY KEY (`id_formdata`),
  UNIQUE KEY `id_formdata_UNIQUE` (`id_formdata`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='表单数据【包含表单项->数据的 键值数组】';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formdata`
--

LOCK TABLES `formdata` WRITE;
/*!40000 ALTER TABLE `formdata` DISABLE KEYS */;
INSERT INTO `formdata` VALUES (1,0,'2015-01-30 16:33:19','sxg',3),(2,0,'2015-01-30 16:41:23','孙兴国',3),(3,0,'2015-01-30 16:41:26','孙兴国',3),(4,0,'2015-01-30 16:44:39','烁烁',3),(5,0,'2015-01-30 16:45:47','烁烁',3),(6,0,'2015-01-30 16:45:47','烁烁',4);
/*!40000 ALTER TABLE `formdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marketunion`
--

DROP TABLE IF EXISTS `marketunion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marketunion` (
  `id_marketunion` int(11) NOT NULL AUTO_INCREMENT,
  `name_marketunion` varchar(45) DEFAULT NULL,
  `description_marketunion` text,
  `img_marketunion` varchar(255) DEFAULT NULL,
  `special_marketunion` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0:一般的1:装机必备 2: 精品软件 3: 生活 4:新闻 5:娱乐 6:购物 7:8:',
  `home_marketunion` tinyint(1) DEFAULT '0' COMMENT '普通专题上首页',
  `appidarray_marketunion` longtext,
  PRIMARY KEY (`id_marketunion`),
  UNIQUE KEY `id_marketunion_UNIQUE` (`id_marketunion`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marketunion`
--

LOCK TABLES `marketunion` WRITE;
/*!40000 ALTER TABLE `marketunion` DISABLE KEYS */;
INSERT INTO `marketunion` VALUES (1,'装机必备',NULL,NULL,1,1,'[]'),(2,'精品应用',NULL,NULL,2,1,'[]'),(3,'生活',NULL,NULL,3,1,'[]'),(4,'新闻',NULL,NULL,4,1,'[]'),(5,'娱乐',NULL,NULL,5,1,'[]'),(6,'购物',NULL,NULL,6,1,'[]'),(7,'推荐',NULL,NULL,7,1,'[]'),(8,'游戏攻略','游戏的玩法技巧相关app','/uploads/image/20150127/20150127103650_73682.png',0,1,'[]'),(20,'四六级','英语等级考试听力 阅读 口语练习','/uploads/image/20150127/20150127140046_88612.png',0,1,'null');
/*!40000 ALTER TABLE `marketunion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_permission`
--

DROP TABLE IF EXISTS `app_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_permission` (
  `id_app_permission` int(11) NOT NULL AUTO_INCREMENT,
  `essay_app_permission` tinyint(1) DEFAULT NULL,
  `mall_app_permission` tinyint(1) DEFAULT NULL,
  `form_app_permission` tinyint(1) DEFAULT NULL,
  `user_app_permission` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_app_permission`),
  UNIQUE KEY `id_app_permission_UNIQUE` (`id_app_permission`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='app权限';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_permission`
--

LOCK TABLES `app_permission` WRITE;
/*!40000 ALTER TABLE `app_permission` DISABLE KEYS */;
INSERT INTO `app_permission` VALUES (1,0,0,0,0),(2,0,0,0,1),(3,0,0,1,0),(4,0,0,1,1),(5,0,1,0,0),(6,0,1,0,1),(7,0,1,1,0),(8,0,1,1,1),(9,1,0,0,0),(10,1,0,0,1),(11,1,0,1,0),(12,1,0,1,1),(13,1,1,0,0),(14,1,1,0,1),(15,1,1,1,0),(16,1,1,1,1);
/*!40000 ALTER TABLE `app_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'app'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-11 13:17:24
