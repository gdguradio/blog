-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: simpleBlog
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`,`ip_address`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('06mf81bphc23uolgmr7j9i6s13j48feb','127.0.0.1',1587405815,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587405815;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('0dtevu3060ul3gaf7k687582fmit84qe','127.0.0.1',1587403229,_binary '__ci_last_regenerate|i:1587403229;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('0r7tmppcj3kj223gfba9is8kn2pde2q9','127.0.0.1',1587386261,_binary '__ci_last_regenerate|i:1587386261;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('15nak89rtnc9oq9dfkpjelu668nul53k','127.0.0.1',1587479710,_binary '__ci_last_regenerate|i:1587479710;_ci_previous_url|s:26:\"http://testblog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";id|s:1:\"1\";'),('1bo1497s6igs7obcmcl9hj55qlf6d921','127.0.0.1',1587480640,_binary '__ci_last_regenerate|i:1587480640;_ci_previous_url|s:26:\"http://testblog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";id|s:1:\"1\";'),('1osd12ldfmrhbsv9sfcjgkqavt6dav5r','127.0.0.1',1587403391,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587403391;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('22g6sbdpvi6mlpirvhn7e1i7i0dbve71','127.0.0.1',1587371545,_binary '__ci_last_regenerate|i:1587371545;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('2enbh1sft96gct5t6t6uvthpnrk5g6li','127.0.0.1',1587476205,_binary '__ci_last_regenerate|i:1587476205;_ci_previous_url|s:33:\"http://testblog-local.com/newpost\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('3h3o86glqavfar54rcc424mtff4n9o05','127.0.0.1',1587385260,_binary '__ci_last_regenerate|i:1587385260;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('3najpmm7vo7cvfj5i13pj12dehfigs2r','127.0.0.1',1587404825,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587404825;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('3tugfiukjjck83dvpjr4cmvd06j7mknq','127.0.0.1',1587404079,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587404079;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('4eg564lipfm5ih1nu6j4d8u5e0m8ikfi','127.0.0.1',1587468731,_binary '__ci_last_regenerate|i:1587468731;_ci_previous_url|s:33:\"http://testblog-local.com/newpost\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('4f7dpgsbdma0q2hicvj35lhs7rk07be0','127.0.0.1',1587405138,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587405138;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('699u2gkuejf3fbsv8jqcdefcb53jknar','127.0.0.1',1587467963,_binary '__ci_last_regenerate|i:1587467963;_ci_previous_url|s:33:\"http://testblog-local.com/newpost\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('6iqv3jgmuqv9tumk41otp1p6a995tq1h','127.0.0.1',1587409162,_binary '__ci_last_regenerate|i:1587408856;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('6lplc1jkl7vc38mngf2a937h0smklrk5','127.0.0.1',1587407512,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587407512;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('6o6d4ccfas9mns9snhen5b6k7igocrr2','127.0.0.1',1587390532,_binary '__ci_last_regenerate|i:1587390532;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('75k74knef3lfgpg2umu5rfrn252mb4fm','127.0.0.1',1587403699,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587403699;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('7gv5kcpmd3483uos4tu5do9fmvkcurho','127.0.0.1',1587388129,_binary '__ci_last_regenerate|i:1587388129;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('8d2pgt5cej0fb0451ibj4nk9kbig3g25','127.0.0.1',1587407821,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587407821;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('9fcalcloj2eaidp1heoc91rgln5p4959','127.0.0.1',1587369972,_binary '__ci_last_regenerate|i:1587369972;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('a0s6lp3u679569dut6qr5eieuq091d8k','127.0.0.1',1587376403,_binary '__ci_last_regenerate|i:1587376403;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('a43jku34a1amo55n00923hlgjolvueiq','127.0.0.1',1587376773,_binary '__ci_last_regenerate|i:1587376773;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('aa25up1goimlm750btpk5iftgk3pekt1','127.0.0.1',1587409228,_binary '__ci_last_regenerate|i:1587409228;_ci_previous_url|s:26:\"http://testblog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('aaatf59utle5t0m5l936u4sqphqlj2un','127.0.0.1',1587470176,_binary '__ci_last_regenerate|i:1587470176;_ci_previous_url|s:33:\"http://testblog-local.com/newpost\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('aovqspq7hcvi3rgbidum394ocbi7it0d','127.0.0.1',1587364079,_binary '__ci_last_regenerate|i:1587364079;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('b5homhu32oivjaifeakdobve6q9t147c','127.0.0.1',1587401834,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587401834;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('bup8ufi7p0noq26s1b115iraet8otr40','127.0.0.1',1587318038,_binary '__ci_last_regenerate|i:1587318038;'),('bvri09pehln3esukads5ftc8n3re594g','127.0.0.1',1587407208,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587407208;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('c19ud70ignr5mipnhkt8nuurkdr64pts','127.0.0.1',1587408170,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587408170;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('djih4mu9v8as80bd8s1gu5vtps41u75v','127.0.0.1',1587402913,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587402913;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('dm18hbhhfmb6g0vc8ackh6011n02rah3','127.0.0.1',1587375031,_binary '__ci_last_regenerate|i:1587375031;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('dq1683na933ctgguac47kuhvkfp5hgia','127.0.0.1',1587371867,_binary '__ci_last_regenerate|i:1587371867;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('e82p14kr18oeih61mn2diujt988dm584','127.0.0.1',1587404828,_binary '__ci_last_regenerate|i:1587404828;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('ecurolj2gip2vmqm22r2lv3j1k7ta8ae','127.0.0.1',1587405459,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587405459;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('eiqkbdfd2r15q7tfdeq6r31uds0pvhkh','127.0.0.1',1587363769,_binary '__ci_last_regenerate|i:1587363769;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('eobgggjmorc5vag9ag9mndd6gpb3ti21','127.0.0.1',1587363450,_binary '__ci_last_regenerate|i:1587363450;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('f8u3sgrqdk4sur3pilujn35od8e3q06k','127.0.0.1',1587318347,_binary '__ci_last_regenerate|i:1587318347;_ci_previous_url|s:22:\"http://blog-local.com/\";'),('fhlqcclbe5jcbphvsct742d17srrlsdu','127.0.0.1',1587477134,_binary '__ci_last_regenerate|i:1587477134;_ci_previous_url|s:33:\"http://testblog-local.com/newpost\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('fmf8lkkfif22f01k6m2i3kuj2jh6ngks','127.0.0.1',1587319300,_binary '__ci_last_regenerate|i:1587319300;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:5:\"Admin\";'),('gspe6h8ct13u1qgregsfks37n35d063j','127.0.0.1',1587478013,_binary '__ci_last_regenerate|i:1587478013;_ci_previous_url|s:33:\"http://testblog-local.com/newpost\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";id|s:1:\"1\";'),('hvcuslekas30avf64q0p6blhc46bt73b','127.0.0.1',1587364583,_binary '__ci_last_regenerate|i:1587364583;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('i5i28d5ifmesmkg17fq7hc248pt9212q','127.0.0.1',1587474907,_binary '__ci_last_regenerate|i:1587474907;_ci_previous_url|s:33:\"http://testblog-local.com/newpost\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('i8fmm76md6f4q2a6fr43555rvjopkesv','127.0.0.1',1587469240,_binary '__ci_last_regenerate|i:1587469240;_ci_previous_url|s:33:\"http://testblog-local.com/newpost\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('ibmoava1j6invm9r58d3nbhr0lc82bbs','127.0.0.1',1587385943,_binary '__ci_last_regenerate|i:1587385943;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('iiqps8vkanu3rnao3o13ab9nq8emfou1','127.0.0.1',1587402609,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587402609;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('j0h0hapt5pajug1ol2451fmf2dos450o','127.0.0.1',1587374367,_binary '__ci_last_regenerate|i:1587374367;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('j83f7l2nj95k0psde8ko47qt4me2s1nn','127.0.0.1',1587365606,_binary '__ci_last_regenerate|i:1587365606;_ci_previous_url|s:22:\"http://blog-local.com/\";'),('ljl0fr6vrv4d2ra5v9v4uoapmfcfiita','127.0.0.1',1587372379,_binary '__ci_last_regenerate|i:1587372379;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('lqhgoaho07tivm1gsin2vle7lu579392','127.0.0.1',1587406891,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587406891;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('luusg2vssprjpgee18sg9717vq6rckav','127.0.0.1',1587478362,_binary '__ci_last_regenerate|i:1587478362;_ci_previous_url|s:26:\"http://testblog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";id|s:1:\"1\";'),('m187s85b33qpsmm0k5mkbakrdh4i2l70','127.0.0.1',1587402338,_binary '__ci_last_regenerate|i:1587402338;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:9:\"Test User\";email|s:14:\"test@gmail.com\";role|s:4:\"User\";access|s:14:\"insert,updated\";'),('m4uj9trdl2ohbuoikekc9cs9mgg77vfg','127.0.0.1',1587321540,_binary '__ci_last_regenerate|i:1587321540;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('n66mi4v7869k0dha11hkd0o7l9apgl5p','127.0.0.1',1587321540,_binary '__ci_last_regenerate|i:1587321540;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('nisi4rfkiti4rod400isk1g33d5tj2to','127.0.0.1',1587404422,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587404422;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('nn42eknsinvp9cvar5s72anlb70jg406','127.0.0.1',1587318977,_binary '__ci_last_regenerate|i:1587318977;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:5:\"Admin\";'),('nt2da5esk1jvr43rtq4l890mpp9i7231','127.0.0.1',1587467409,_binary '__ci_last_regenerate|i:1587467409;_ci_previous_url|s:33:\"http://testblog-local.com/newpost\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('o5fh7qf7gond8cc56f8mvfsa7m3k76k4','127.0.0.1',1587370362,_binary '__ci_last_regenerate|i:1587370362;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('o6vtvdldmv4ak9toc0dn9udbb06tuien','127.0.0.1',1587321183,_binary '__ci_last_regenerate|i:1587321183;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";'),('og61kgejdljkl3k4jo8cb80hkb6uv56j','127.0.0.1',1587373298,_binary '__ci_last_regenerate|i:1587373298;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('op75rr2i7v86kq9isb29bjtuo1uucvn7','127.0.0.1',1587409638,_binary '__ci_last_regenerate|i:1587409514;_ci_previous_url|s:26:\"http://testblog-local.com/\";name|s:10:\"Test Admin\";email|s:19:\"testadmin@gmail.com\";role|s:4:\"User\";access|s:14:\"insert,updated\";'),('p7tpb8300e1cdsp0drt81qvdn4j6liof','127.0.0.1',1587400904,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587400904;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('qc2g4s1iq7q2vrbop3le7vs6lpi0np67','127.0.0.1',1587375338,_binary '__ci_last_regenerate|i:1587375338;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('qeaegfnigldrdhm8fdkonh44uiu2k6h5','127.0.0.1',1587402203,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587402203;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('qehljf0vi9stvbgjcv1fkqs6c8bq67jf','127.0.0.1',1587470690,_binary '__ci_last_regenerate|i:1587470690;_ci_previous_url|s:33:\"http://testblog-local.com/newpost\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('qp6n6g7eif2srf6g3foc9recvfk25aft','127.0.0.1',1587369119,_binary '__ci_last_regenerate|i:1587369119;_ci_previous_url|s:22:\"http://blog-local.com/\";'),('rcdad1hi325oalfho165t4fpbl1gjv0q','127.0.0.1',1587401533,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587401533;_ci_previous_url|s:26:\"http://testblog-local.com/\";'),('re8nfjoj08fskev90ncu240dqp7037jb','127.0.0.1',1587386909,_binary '__ci_last_regenerate|i:1587386909;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('s5kq46t09l0tbhd477a4lk10ruhlmbe6','127.0.0.1',1587480063,_binary '__ci_last_regenerate|i:1587480063;_ci_previous_url|s:26:\"http://testblog-local.com/\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";id|s:1:\"1\";'),('sod6erck645bkmb7k991ndpi8itp58vo','127.0.0.1',1587383691,_binary '__ci_last_regenerate|i:1587383691;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('sp4dn94hp15r59dqfkqo0hs5m8fsli8p','127.0.0.1',1587406223,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587406222;_ci_previous_url|s:26:\"http://testblog-local.com/\";'),('sv0cneu03he07g8iosakmk4k8l59aor4','127.0.0.1',1587369483,_binary '__ci_last_regenerate|i:1587369483;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('t2g34re1rhb25db6obpuphd8j17jurp7','127.0.0.1',1587476646,_binary '__ci_last_regenerate|i:1587476646;_ci_previous_url|s:33:\"http://testblog-local.com/newpost\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('tq69jgl4m8tkfa0crc6obuoh7pkl2f8u','127.0.0.1',1587480726,_binary '__ci_last_regenerate|i:1587480640;_ci_previous_url|s:41:\"http://testblog-local.com/Post/viewpost/1\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";id|s:1:\"1\";'),('tvoremje43ma2m2qq8v99bdd26p5o7lv','127.0.0.1',1587408535,_binary 'name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";__ci_last_regenerate|i:1587408535;_ci_previous_url|s:34:\"http://testblog-local.com/Register\";'),('ul76qv5uj38hpa95ubl13m21ueopapub','127.0.0.1',1587371205,_binary '__ci_last_regenerate|i:1587371205;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('uobssc8ceq63me2fmhsiva8f48opa3d9','127.0.0.1',1587408853,_binary '__ci_last_regenerate|i:1587408853;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('uvnk594ivsm8d07n373jukrsttsu7sf3','127.0.0.1',1587389939,_binary '__ci_last_regenerate|i:1587389934;_ci_previous_url|s:30:\"http://blog-local.com/Register\";name|s:11:\"Admin Admin\";email|s:15:\"admin@gmail.com\";role|s:5:\"Admin\";access|s:21:\"insert,updated,delete\";'),('vp0vn52928omvq0d80lk4q22su77hlbu','127.0.0.1',1587396669,_binary '__ci_last_regenerate|i:1587396669;_ci_previous_url|s:22:\"http://blog-local.com/\";name|s:9:\"Test User\";email|s:14:\"test@gmail.com\";role|s:4:\"User\";access|s:14:\"insert,updated\";');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_details`
--

DROP TABLE IF EXISTS `post_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `bannerHeader` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bannerSubHeader` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bannermeta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bodyFrstPara` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bodyFrstHeading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bodyFrstBlockQuote` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bodyScndHeading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bodyScndPara` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bodyImgCaption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bannerimage` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bodyimage` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dteCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dteUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_details`
--

LOCK TABLES `post_details` WRITE;
/*!40000 ALTER TABLE `post_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strRoleName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strRoleAccess` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dteCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dteUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','insert,updated,delete','2020-04-16 13:22:01','2020-04-16 13:22:01'),(2,'User','insert,updated','2020-04-16 13:24:55','2020-04-16 13:24:55');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `dteCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dteUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,1,1,'2020-04-20 19:03:24','2020-04-20 19:03:24'),(2,2,2,'2020-04-20 19:03:24','2020-04-20 19:03:24'),(3,3,2,'2020-04-20 19:05:09','2020-04-20 19:05:09');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strFullName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intAge` int(11) DEFAULT NULL,
  `strEmail` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strUserName` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strPassWord` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bitDeleteFlag` tinyint(1) NOT NULL DEFAULT '0',
  `bitActiveFlag` tinyint(1) NOT NULL DEFAULT '0',
  `dteCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dteUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin Admin',25,'admin@gmail.com','admin','$2y$10$tOvTnrW9Pp8ZzIKuPd1DJOZrCCmwjOpA.YZmN4jPyfudAerV2I4h.',0,1,'2020-04-19 18:06:50','2020-04-19 18:06:50'),(2,'Test User',25,'test@gmail.com','testuser','$2y$10$k.ubGpcLhO6kuPscBog0ouHddMncxEaCL9ohBu.yylxmjptm0SDwu',0,1,'2020-04-20 07:02:44','2020-04-20 07:02:44'),(3,'Test Admin',35,'testadmin@gmail.com','testadmin','$2y$10$wdk3hNU5XwfjHrHtAVQPce80sq6SDbN/Hceoy2tG7eEkZQnT50Lbe',0,1,'2020-04-20 12:23:02','2020-04-20 12:23:02'),(4,'User',35,'users@gmail.com','users','$2y$10$S68xq2vzLePayyg262fCc.s9o7ZVAXHDeQM8zgPkN09kdBCWwJM02',0,0,'2020-04-20 12:23:53','2020-04-20 12:23:53');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-21 23:03:13