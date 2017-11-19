CREATE DATABASE  IF NOT EXISTS `ocddb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ocddb`;
-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: ocddb
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `glideevent`
--

DROP TABLE IF EXISTS `glideevent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `glideevent` (
  `GLIDEEVENTID` varchar(18) NOT NULL,
  `GLIDEEVENTTYPECODE` varchar(2) DEFAULT NULL,
  `STARTDATE` date NOT NULL,
  `COMMENT` varchar(300) NOT NULL,
  PRIMARY KEY (`GLIDEEVENTID`),
  KEY `fk_GLIDEEVENT_REF_GLIDEEVENTTYPE1_idx` (`GLIDEEVENTTYPECODE`),
  CONSTRAINT `fk_GLIDEEVENT_REF_GLIDEEVENTTYPE1` FOREIGN KEY (`GLIDEEVENTTYPECODE`) REFERENCES `ref_glideeventtype` (`GLIDEEVENTTYPECODE`) ON DELETE NO ACTION ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `glideevent`
--

LOCK TABLES `glideevent` WRITE;
/*!40000 ALTER TABLE `glideevent` DISABLE KEYS */;
INSERT INTO `glideevent` VALUES ('EQ-2011-000010-PHL','EQ','2011-01-10','Earthquake than could be dangerous. '),('NA-2011-000001-PHL','FA','2011-02-10','Famine caused by war.'),('NA-2012-000001-PHL','FR','2012-04-18','Fire casued by left candle.'),('NA-2013-000001-PHL','FL','2013-10-10','Flood caused by heavy rains.'),('NA-2013-000002-PHL','FL','2013-10-18','Flood caused by heavy rains.'),('NA-2013-000003-PHL','FL','2013-10-14','Flood caused by heavy rains.'),('NA-2013-000004-PHL','FL','2013-10-10','Flood caused by heavy rains.'),('NA-2013-000011-PHL','AC','2013-11-11','The technology became a disaster.'),('TC-2011-000189-PHL','TC','2011-12-15','Tropical storm Washi(Sendong) threatens Northeastern Mindanao. Floods occured in Region IX, affecting about 80 families/400 persons.'),('TC-2011-000190-PHL','TC','2011-04-10','Strong Tropical Storm.'),('TC-2011-000191-PHL','TC','2011-05-09','Strong Tropical Storm.'),('TC-2011-000192-PHL','TC','2011-06-07','Strong Tropical Storm.'),('TC-2011-000193-PHL','TC','2011-07-05','Strong Tropical Storm.'),('TC-2011-000194-PHL','TC','2011-08-07','Strong Tropical Storm.'),('TS-2012-000000-PHL','TS','2012-12-21','Tsunami that one of the worst.');
/*!40000 ALTER TABLE `glideevent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infra`
--

DROP TABLE IF EXISTS `infra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infra` (
  `INFRAID` int(10) NOT NULL,
  `SUBSECTORID` int(2) NOT NULL,
  `DMGLOSSTYPEID` tinyint(1) NOT NULL,
  `LENGTH` int(4) NOT NULL,
  `FIRM` varchar(45) NOT NULL,
  `DAMAGES` decimal(10,2) NOT NULL,
  `LOSSES` decimal(10,2) NOT NULL,
  PRIMARY KEY (`INFRAID`),
  KEY `fk_INFRA_REF_SUBSECTOR1_idx` (`SUBSECTORID`),
  KEY `fk_INFRA_REF_DMGELOSSTYPE1_idx` (`DMGLOSSTYPEID`),
  CONSTRAINT `fk_INFRA_REF_DMGELOSSTYPE1` FOREIGN KEY (`DMGLOSSTYPEID`) REFERENCES `ref_dmgelosstype` (`DMGLOSSTYPEID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_INFRA_REF_SUBSECTOR1` FOREIGN KEY (`SUBSECTORID`) REFERENCES `ref_subsector` (`SUBSECTORID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infra`
--

LOCK TABLES `infra` WRITE;
/*!40000 ALTER TABLE `infra` DISABLE KEYS */;
INSERT INTO `infra` VALUES (1000000000,0,0,0,'0',12345.00,0.00),(1000000001,1,1,5,'n.a.',100000.00,5000.00);
/*!40000 ALTER TABLE `infra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livelihood`
--

DROP TABLE IF EXISTS `livelihood`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livelihood` (
  `LIVELIHOODID` int(10) NOT NULL,
  `LIVELIHOODDMGID` int(1) NOT NULL,
  `SUBSECTORID` int(2) NOT NULL,
  `DMGLOSSTYPEID` tinyint(1) NOT NULL,
  `CORN` decimal(10,2) NOT NULL,
  `RICE` decimal(10,2) NOT NULL,
  `VEGETABLES` decimal(10,2) NOT NULL,
  `OTHERCROPS` decimal(10,2) NOT NULL,
  `FISHPONDS` decimal(10,2) NOT NULL,
  `LIVESTOCK` decimal(10,2) NOT NULL,
  `POULTRY` decimal(10,2) NOT NULL,
  `DAMAGES` decimal(10,2) NOT NULL,
  `LOSS` decimal(10,2) NOT NULL,
  PRIMARY KEY (`LIVELIHOODID`,`LIVELIHOODDMGID`),
  KEY `fk_LIVELIHOOD_REF_SUBSECTOR1_idx` (`SUBSECTORID`),
  KEY `fk_LIVELIHOOD_REF_LIVELIHOODDMG1_idx` (`LIVELIHOODDMGID`),
  KEY `fk_LIVELIHOOD_REF_DMGELOSSTYPE1_idx` (`DMGLOSSTYPEID`),
  CONSTRAINT `fk_LIVELIHOOD_REF_DMGELOSSTYPE1` FOREIGN KEY (`DMGLOSSTYPEID`) REFERENCES `ref_dmgelosstype` (`DMGLOSSTYPEID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_LIVELIHOOD_REF_LIVELIHOODDMG1` FOREIGN KEY (`LIVELIHOODDMGID`) REFERENCES `ref_livelihooddmg` (`LIVELIHOODDMGID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_LIVELIHOOD_REF_SUBSECTOR1` FOREIGN KEY (`SUBSECTORID`) REFERENCES `ref_subsector` (`SUBSECTORID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livelihood`
--

LOCK TABLES `livelihood` WRITE;
/*!40000 ALTER TABLE `livelihood` DISABLE KEYS */;
INSERT INTO `livelihood` VALUES (0,0,11,2,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1234.00,0.00),(1000000001,1,11,1,4000.00,5000.00,6000.00,7000.00,800.00,70.00,80.00,1908711.00,12494201.00),(1000000001,2,11,1,3000000.00,3101231.00,5431234.00,4123451.00,1423123.00,1234321.00,1233456.00,341932.00,1334912.00);
/*!40000 ALTER TABLE `livelihood` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdna`
--

DROP TABLE IF EXISTS `pdna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pdna` (
  `PDNAID` int(8) NOT NULL,
  `GLIDEEVENTID` varchar(18) NOT NULL,
  `USERID` int(7) NOT NULL,
  `INCIDENTTYPECODE` varchar(2) NOT NULL,
  `INCIDENTNAME` varchar(45) NOT NULL,
  `STARTDATE` date NOT NULL,
  `ENDDATE` date NOT NULL,
  PRIMARY KEY (`PDNAID`,`GLIDEEVENTID`,`USERID`,`INCIDENTTYPECODE`),
  KEY `fk_PDNA_GLIDEEVENT1_idx` (`GLIDEEVENTID`),
  KEY `fk_PDNA_USERS1_idx` (`USERID`),
  KEY `fk_PDNA_REF_INCIDENT1_idx` (`INCIDENTTYPECODE`),
  CONSTRAINT `fk_PDNA_GLIDEEVENT1` FOREIGN KEY (`GLIDEEVENTID`) REFERENCES `glideevent` (`GLIDEEVENTID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PDNA_USERS1` FOREIGN KEY (`USERID`) REFERENCES `users` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdna`
--

LOCK TABLES `pdna` WRITE;
/*!40000 ALTER TABLE `pdna` DISABLE KEYS */;
INSERT INTO `pdna` VALUES (10000001,'TC-2011-000189-PHL',1,'TC','SENDONG','2011-12-15','2011-12-25'),(10000002,'TC-2011-000190-PHL',1,'TC','AGATON','2011-04-10','2011-04-17'),(10000003,'TC-2011-000191-PHL',1,'TC','BASYANG','2011-05-09','2011-05-12'),(10000004,'TC-2011-000192-PHL',1,'TC','CALOY','2011-06-07','2011-06-14'),(10000005,'TC-2011-000193-PHL',1,'TC','DOMENG','2011-07-05','2011-07-08'),(10000006,'TC-2011-000194-PHL',1,'TC','ESTER','2011-08-07','2011-08-11'),(10000007,'EQ-2011-000010-PHL',1,'EQ','PEPE','2011-01-10','2011-01-10'),(10000008,'TS-2012-000000-PHL',1,'TS','CLARA','2012-12-21','2012-12-21'),(10000009,'NA-2013-000001-PHL',1,'FL','Flood','2013-10-10','2013-10-11'),(10000010,'NA-2013-000002-PHL',1,'FL','Flood','2013-10-14','2013-10-16'),(10000011,'NA-2013-000003-PHL',1,'FL','Flood','2013-10-18','2013-10-18'),(10000012,'NA-2013-000004-PHL',1,'FL','Flood','2013-10-10','2013-10-13'),(10000013,'NA-2013-000011-PHL',1,'AC','Tech Error','2013-11-11','2013-11-11'),(10000014,'NA-2012-000001-PHL',1,'FR','Fire lao tzu','2012-04-18','2012-04-18'),(10000015,'NA-2011-000001-PHL',1,'FA','apocalypse','2011-02-10','2011-02-15');
/*!40000 ALTER TABLE `pdna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdnadetails`
--

DROP TABLE IF EXISTS `pdnadetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pdnadetails` (
  `PDNAID` int(10) NOT NULL,
  `CITY/MUNICIPALITYID` int(5) NOT NULL,
  `RESETTLEMENTID` int(10) NOT NULL,
  `INFRAID` int(10) NOT NULL,
  `LIVELIHOODID` int(10) NOT NULL,
  `SOCIALID` int(2) NOT NULL,
  `DEAD` int(10) NOT NULL,
  `MISSING` int(10) NOT NULL,
  `INJURED` int(10) NOT NULL,
  `AFFECTEDFAM` int(10) NOT NULL,
  `AFFECTEDPER` int(10) NOT NULL,
  `EVACUATEDFAM` int(10) NOT NULL,
  `EVACUATEDPER` int(10) NOT NULL,
  `NOECS` int(10) NOT NULL,
  `BRGY` varchar(100) NOT NULL,
  PRIMARY KEY (`PDNAID`,`RESETTLEMENTID`,`INFRAID`,`CITY/MUNICIPALITYID`,`LIVELIHOODID`,`SOCIALID`),
  KEY `fk_SECTORALDAMAGE_POSTDISASTERASSESSMENT1_idx` (`PDNAID`),
  KEY `fk_DAMAGESLOSSES_REF_CITY/MUNICIPALITY1_idx` (`CITY/MUNICIPALITYID`),
  KEY `fk_PDNADETAILS_RESETTLEMENT1_idx` (`RESETTLEMENTID`),
  KEY `fk_PDNADETAILS_INFRA1_idx` (`INFRAID`),
  KEY `fk_PDNADETAILS_SOCIAL1_idx` (`SOCIALID`),
  KEY `fk__PDNADETAILS_LIVELIHOOD_idx` (`LIVELIHOODID`),
  CONSTRAINT `fk_DAMAGESLOSSES_REF_CITY/MUNICIPALITY1` FOREIGN KEY (`CITY/MUNICIPALITYID`) REFERENCES `ref_city/municipality` (`CITY/MUNICIPALITYID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PDNADETAILS_INFRA1` FOREIGN KEY (`INFRAID`) REFERENCES `infra` (`INFRAID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PDNADETAILS_RESETTLEMENT1` FOREIGN KEY (`RESETTLEMENTID`) REFERENCES `resettlement` (`RESETTLEMENTID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PDNADETAILS_SOCIAL1` FOREIGN KEY (`SOCIALID`) REFERENCES `social` (`SOCIALID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SECTORALDAMAGE_POSTDISASTERASSESSMENT1` FOREIGN KEY (`PDNAID`) REFERENCES `pdna` (`PDNAID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk__PDNADETAILS_LIVELIHOOD` FOREIGN KEY (`LIVELIHOODID`) REFERENCES `livelihood` (`LIVELIHOODID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdnadetails`
--

LOCK TABLES `pdnadetails` WRITE;
/*!40000 ALTER TABLE `pdnadetails` DISABLE KEYS */;
INSERT INTO `pdnadetails` VALUES (10000001,1,0,1000000001,0,0,3,4,100,565,4000,500,3500,100,'Brgy 101'),(10000002,2,0,1000000001,0,0,31,41,102,565,4000,500,3500,100,'Brgy 102'),(10000003,3,0,1000000001,0,0,32,42,102,565,4000,500,3500,100,'Brgy 103'),(10000004,4,0,1000000001,0,0,33,43,103,565,4000,500,3500,100,'Brgy 104'),(10000005,5,0,1000000001,0,0,34,44,105,565,4000,500,3500,100,'Brgy 105'),(10000006,6,0,1000000001,0,0,35,45,106,565,4000,500,3500,100,'Brgy 106'),(10000007,7,0,1000000001,0,0,36,46,107,565,4000,500,3500,100,'Brgy 107'),(10000008,2,0,1000000001,0,0,37,47,108,565,4000,500,3500,100,'Brgy 108'),(10000009,11,0,1000000001,0,0,0,1,3,0,3,0,0,100,'Brgy 108'),(10000010,12,0,1000000001,0,0,0,0,4,0,4,0,0,100,'Brgy 108'),(10000011,13,0,1000000001,0,0,0,1,2,0,5,0,5,100,'Brgy 108'),(10000012,14,0,1000000001,0,0,0,0,3,0,6,0,0,100,'Brgy 108'),(10000013,15,0,1000000001,0,0,0,0,8,0,5,3,2,100,'Brgy 108'),(10000014,16,0,1000000001,0,0,0,8,7,0,3,2,2,100,'Brgy 108'),(10000015,12,0,1000000001,0,0,0,0,4,0,2,2,2,100,'Brgy 108');
/*!40000 ALTER TABLE `pdnadetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recovery`
--

DROP TABLE IF EXISTS `recovery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recovery` (
  `PROJECTID` int(10) NOT NULL,
  `PDNAID` int(10) NOT NULL,
  `RESETTLEMENTID` int(10) NOT NULL,
  `INFRAID` int(10) NOT NULL,
  `CITY/MUNICIPALITYID` int(5) NOT NULL,
  `LIVELIHOODID` int(10) NOT NULL,
  `SOCIALID` int(2) NOT NULL,
  `PROJECTTITLE` varchar(50) NOT NULL,
  PRIMARY KEY (`PROJECTID`),
  KEY `fk_RECOVERY_PDNADETAILS1_idx` (`PDNAID`,`RESETTLEMENTID`,`INFRAID`,`CITY/MUNICIPALITYID`,`LIVELIHOODID`,`SOCIALID`),
  CONSTRAINT `fk_RECOVERY_PDNADETAILS1` FOREIGN KEY (`PDNAID`, `RESETTLEMENTID`, `INFRAID`, `CITY/MUNICIPALITYID`, `LIVELIHOODID`, `SOCIALID`) REFERENCES `pdnadetails` (`PDNAID`, `RESETTLEMENTID`, `INFRAID`, `CITY/MUNICIPALITYID`, `LIVELIHOODID`, `SOCIALID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recovery`
--

LOCK TABLES `recovery` WRITE;
/*!40000 ALTER TABLE `recovery` DISABLE KEYS */;
/*!40000 ALTER TABLE `recovery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_agency`
--

DROP TABLE IF EXISTS `ref_agency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_agency` (
  `AGENCYID` int(3) NOT NULL,
  `DESCRIPTION` varchar(50) NOT NULL,
  PRIMARY KEY (`AGENCYID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_agency`
--

LOCK TABLES `ref_agency` WRITE;
/*!40000 ALTER TABLE `ref_agency` DISABLE KEYS */;
INSERT INTO `ref_agency` VALUES (1,'deped'),(2,'dost'),(3,'dpwh'),(4,'red cross');
/*!40000 ALTER TABLE `ref_agency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_city/municipality`
--

DROP TABLE IF EXISTS `ref_city/municipality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_city/municipality` (
  `CITY/MUNICIPALITYID` int(5) NOT NULL,
  `PROVINCEID` int(5) NOT NULL,
  `DESCRIPTION` varchar(50) NOT NULL,
  PRIMARY KEY (`CITY/MUNICIPALITYID`),
  KEY `fk_REF_CITY/MUNICIPALITY_REF_PROVINCE1_idx` (`PROVINCEID`),
  CONSTRAINT `fk_REF_CITY/MUNICIPALITY_REF_PROVINCE1` FOREIGN KEY (`PROVINCEID`) REFERENCES `ref_province` (`PROVINCEID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_city/municipality`
--

LOCK TABLES `ref_city/municipality` WRITE;
/*!40000 ALTER TABLE `ref_city/municipality` DISABLE KEYS */;
INSERT INTO `ref_city/municipality` VALUES (1,2,'San Pablo City'),(2,3,'Vinzons'),(3,3,'Labo'),(4,3,'Daet'),(5,3,'Talisay'),(6,4,'Legazpi City'),(7,4,'Naga City'),(8,4,'Albay'),(9,4,'Sipocot'),(10,5,'Forbes Park'),(11,5,'Rockwell'),(12,5,'Magallanes'),(13,5,'Pembo'),(14,5,'Tejeros'),(15,5,'San Lorenzo'),(16,5,'Bel-Air');
/*!40000 ALTER TABLE `ref_city/municipality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_dmgelosstype`
--

DROP TABLE IF EXISTS `ref_dmgelosstype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_dmgelosstype` (
  `DMGLOSSTYPEID` tinyint(1) NOT NULL,
  `DESCRIPTION` varchar(45) NOT NULL,
  PRIMARY KEY (`DMGLOSSTYPEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_dmgelosstype`
--

LOCK TABLES `ref_dmgelosstype` WRITE;
/*!40000 ALTER TABLE `ref_dmgelosstype` DISABLE KEYS */;
INSERT INTO `ref_dmgelosstype` VALUES (0,'N/A'),(1,'Public'),(2,'Private');
/*!40000 ALTER TABLE `ref_dmgelosstype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_glideeventtype`
--

DROP TABLE IF EXISTS `ref_glideeventtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_glideeventtype` (
  `GLIDEEVENTTYPECODE` varchar(2) NOT NULL,
  `DESCRIPTION` varchar(30) NOT NULL,
  PRIMARY KEY (`GLIDEEVENTTYPECODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_glideeventtype`
--

LOCK TABLES `ref_glideeventtype` WRITE;
/*!40000 ALTER TABLE `ref_glideeventtype` DISABLE KEYS */;
INSERT INTO `ref_glideeventtype` VALUES ('AC','Tech. Disaster'),('AV','Snow Avalanche'),('CE','Complex Emergency'),('CW','Cold Wave'),('DR','Drought'),('EC','Extratropical Cyclone'),('EP','Epidemic'),('EQ','Earthquake'),('ET','Extreme Temperature'),('FA','Famine'),('FF','Flash Flood'),('FL','Flood'),('FR','Fire'),('HT','Heat Wave'),('IN','Insect Infestation'),('LS','Land Slide'),('MS','Mud Slide'),('OT','Other'),('SL','Slide'),('SS','Storm Surge'),('ST','Severe Local Storm'),('TC','Tropical Cyclone'),('TO','Tornadoes'),('TS','Tsunami'),('VO','Volcano'),('VW','Violent Wind'),('WF','Wildfire'),('WV','Wave/Surge');
/*!40000 ALTER TABLE `ref_glideeventtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_incident`
--

DROP TABLE IF EXISTS `ref_incident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_incident` (
  `INCIDENTTYPECODE` varchar(2) NOT NULL,
  `INCIDENTSOURCEID` tinyint(1) NOT NULL,
  `DESCRIPTION` varchar(50) NOT NULL,
  PRIMARY KEY (`INCIDENTTYPECODE`),
  KEY `fk_REF_INCIDENT_REF_INCIDENTSOURCE1_idx` (`INCIDENTSOURCEID`),
  CONSTRAINT `fk_REF_INCIDENT_REF_INCIDENTSOURCE1` FOREIGN KEY (`INCIDENTSOURCEID`) REFERENCES `ref_incidentsource` (`INCIDENTSOURCEID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_incident`
--

LOCK TABLES `ref_incident` WRITE;
/*!40000 ALTER TABLE `ref_incident` DISABLE KEYS */;
INSERT INTO `ref_incident` VALUES ('AC',1,'Tech. Disaster'),('EQ',2,'Earthquake'),('FA',1,'Famine'),('FL',2,'Flood'),('TS',2,'Tropical Storm');
/*!40000 ALTER TABLE `ref_incident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_incidentsource`
--

DROP TABLE IF EXISTS `ref_incidentsource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_incidentsource` (
  `INCIDENTSOURCEID` tinyint(1) NOT NULL,
  `DESCRIPTION` varchar(45) NOT NULL,
  PRIMARY KEY (`INCIDENTSOURCEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_incidentsource`
--

LOCK TABLES `ref_incidentsource` WRITE;
/*!40000 ALTER TABLE `ref_incidentsource` DISABLE KEYS */;
INSERT INTO `ref_incidentsource` VALUES (1,'Man-made'),(2,'Natural');
/*!40000 ALTER TABLE `ref_incidentsource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_livelihooddmg`
--

DROP TABLE IF EXISTS `ref_livelihooddmg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_livelihooddmg` (
  `LIVELIHOODDMGID` int(1) NOT NULL,
  `DESCRIPTION` varchar(45) NOT NULL,
  PRIMARY KEY (`LIVELIHOODDMGID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_livelihooddmg`
--

LOCK TABLES `ref_livelihooddmg` WRITE;
/*!40000 ALTER TABLE `ref_livelihooddmg` DISABLE KEYS */;
INSERT INTO `ref_livelihooddmg` VALUES (0,'N/A'),(1,'Hectares/Heads '),(2,'Millions');
/*!40000 ALTER TABLE `ref_livelihooddmg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_province`
--

DROP TABLE IF EXISTS `ref_province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_province` (
  `PROVINCEID` int(5) NOT NULL,
  `REGIONCODE` varchar(15) NOT NULL,
  `DESCRIPTION` varchar(50) NOT NULL,
  PRIMARY KEY (`PROVINCEID`),
  KEY `fk_REF_PROVINCE_REF_REGION1_idx` (`REGIONCODE`),
  CONSTRAINT `fk_REF_PROVINCE_REF_REGION1` FOREIGN KEY (`REGIONCODE`) REFERENCES `ref_region` (`REGIONCODE`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_province`
--

LOCK TABLES `ref_province` WRITE;
/*!40000 ALTER TABLE `ref_province` DISABLE KEYS */;
INSERT INTO `ref_province` VALUES (1,'NCR','Manila'),(2,'Region IV','Laguna'),(3,'Region V','Camarines Norte'),(4,'Region V','Camarines Sur'),(5,'NCR','Makati'),(6,'NCR','Malabon'),(7,'NCR','Mandaluyong'),(8,'NCR','Pasig'),(9,'NCR','San Juan'),(10,'NCR','Taguig');
/*!40000 ALTER TABLE `ref_province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_region`
--

DROP TABLE IF EXISTS `ref_region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_region` (
  `REGIONCODE` varchar(15) NOT NULL,
  `DESCRIPTION` varchar(50) NOT NULL,
  PRIMARY KEY (`REGIONCODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_region`
--

LOCK TABLES `ref_region` WRITE;
/*!40000 ALTER TABLE `ref_region` DISABLE KEYS */;
INSERT INTO `ref_region` VALUES ('ARMM','Automonous Region in Muslim Mindanao'),('CAR','Cordillera Administrative Region'),('NCR','National Capital Region'),('Region I','Ilocos Region'),('Region II','Cagayan Valley'),('Region III','Central Luzon'),('Region IV','CALABARZON'),('Region IX','Zamboanga Peninsula'),('Region V','Bicol Region'),('Region VI','Western Visayas'),('Region VII','Central Visayas'),('Region VIII','Eastern Visayas'),('Region X','Northern Mindanao'),('Region XI','Davao Region'),('Region XII','SOCCSKSARGEN'),('Region XIII','Caraga Region');
/*!40000 ALTER TABLE `ref_region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_subsector`
--

DROP TABLE IF EXISTS `ref_subsector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_subsector` (
  `SUBSECTORID` int(2) NOT NULL,
  `DESCRIPTION` varchar(45) NOT NULL,
  PRIMARY KEY (`SUBSECTORID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_subsector`
--

LOCK TABLES `ref_subsector` WRITE;
/*!40000 ALTER TABLE `ref_subsector` DISABLE KEYS */;
INSERT INTO `ref_subsector` VALUES (0,'N/A'),(1,'Roads'),(2,'Bridges'),(3,'Flood Control / Sea Wall'),(4,'Irrigration Facilities'),(5,'Health Infrastructure'),(6,'Education Infrastructure'),(7,'Government Infrastructure'),(8,'Water Infrastructure'),(9,'Power Infrastructure'),(10,'Telecommunications Infrastructure'),(11,'Agriculture'),(12,'Tourism'),(13,'Mining'),(14,'Industry, Trade, Services'),(15,'Shelter'),(16,'Health (WASH)'),(17,'Health (Nutrition)'),(18,'Education'),(19,'Housing'),(20,'Shelter (Land Acquisition)'),(21,'Shelter (Land Development)');
/*!40000 ALTER TABLE `ref_subsector` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_userstatus`
--

DROP TABLE IF EXISTS `ref_userstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_userstatus` (
  `STATUSCODE` int(1) NOT NULL,
  `STATUSDESC` varchar(45) NOT NULL,
  PRIMARY KEY (`STATUSCODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_userstatus`
--

LOCK TABLES `ref_userstatus` WRITE;
/*!40000 ALTER TABLE `ref_userstatus` DISABLE KEYS */;
INSERT INTO `ref_userstatus` VALUES (0,'Inactive'),(1,'Active');
/*!40000 ALTER TABLE `ref_userstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_usertitles`
--

DROP TABLE IF EXISTS `ref_usertitles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_usertitles` (
  `USERTITLEID` int(3) NOT NULL,
  `TITLE` varchar(30) NOT NULL,
  PRIMARY KEY (`USERTITLEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_usertitles`
--

LOCK TABLES `ref_usertitles` WRITE;
/*!40000 ALTER TABLE `ref_usertitles` DISABLE KEYS */;
INSERT INTO `ref_usertitles` VALUES (1,'Admin'),(2,'Encoder');
/*!40000 ALTER TABLE `ref_usertitles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resettlement`
--

DROP TABLE IF EXISTS `resettlement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resettlement` (
  `RESETTLEMENTID` int(10) NOT NULL,
  `SUBSECTORID` int(2) NOT NULL,
  `DMGHOUSES` int(10) NOT NULL,
  `DESHOUSES` int(10) NOT NULL,
  `ESTIMATEDCOST` decimal(10,2) NOT NULL,
  `DAMAGE` decimal(10,2) NOT NULL,
  `LOSSES` decimal(10,2) NOT NULL,
  PRIMARY KEY (`RESETTLEMENTID`),
  KEY `fk_RESETTLEMENT_REF_SUBSECTOR1_idx` (`SUBSECTORID`),
  CONSTRAINT `fk_RESETTLEMENT_REF_SUBSECTOR1` FOREIGN KEY (`SUBSECTORID`) REFERENCES `ref_subsector` (`SUBSECTORID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resettlement`
--

LOCK TABLES `resettlement` WRITE;
/*!40000 ALTER TABLE `resettlement` DISABLE KEYS */;
INSERT INTO `resettlement` VALUES (0,0,6,9,0.00,69.00,0.00);
/*!40000 ALTER TABLE `resettlement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social`
--

DROP TABLE IF EXISTS `social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social` (
  `SOCIALID` int(10) NOT NULL,
  `SUBSECTORID` int(2) NOT NULL,
  `DMGLOSSTYPEID` tinyint(1) NOT NULL,
  `DESCRIPTION` varchar(45) NOT NULL,
  `AFFECTEDSCHOOLS` int(10) NOT NULL,
  `AFFECTEDSTUDENTS` int(10) NOT NULL,
  `DECEASEDSTUDENTS` int(10) NOT NULL,
  `DECEASEDEMP` int(10) NOT NULL,
  `MISSINGSTUDENTS` int(10) NOT NULL,
  `DAMAGES` decimal(10,2) NOT NULL,
  `LOSSES` decimal(10,2) NOT NULL,
  PRIMARY KEY (`SOCIALID`),
  KEY `fk_SOCIAL_REF_SUBSECTOR1_idx` (`SUBSECTORID`),
  KEY `fk_SOCIAL_REF_DMGELOSSTYPE1_idx` (`DMGLOSSTYPEID`),
  CONSTRAINT `fk_SOCIAL_REF_DMGELOSSTYPE1` FOREIGN KEY (`DMGLOSSTYPEID`) REFERENCES `ref_dmgelosstype` (`DMGLOSSTYPEID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SOCIAL_REF_SUBSECTOR1` FOREIGN KEY (`SUBSECTORID`) REFERENCES `ref_subsector` (`SUBSECTORID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social`
--

LOCK TABLES `social` WRITE;
/*!40000 ALTER TABLE `social` DISABLE KEYS */;
INSERT INTO `social` VALUES (0,0,0,'0',0,0,0,0,0,0.00,0.00),(1000000001,16,1,'Hospital',0,0,0,0,0,100000.00,6000.00);
/*!40000 ALTER TABLE `social` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `TASKID` int(10) NOT NULL,
  `AGENCYID` int(3) NOT NULL,
  `PROJECTID` int(10) NOT NULL,
  `TASK` varchar(150) NOT NULL,
  `RECOMMENDEDFUNDING` decimal(10,2) NOT NULL,
  `REMARKS` varchar(150) NOT NULL,
  `STARTYEAR` date NOT NULL,
  `ENDYEAR` date NOT NULL,
  `RANK` int(1) NOT NULL,
  PRIMARY KEY (`TASKID`,`AGENCYID`,`PROJECTID`),
  KEY `fk_TASKS_RECOVERY1_idx` (`PROJECTID`),
  KEY `fk_TASKS_REF_AGENCY1` (`AGENCYID`),
  CONSTRAINT `fk_TASKS_RECOVERY1` FOREIGN KEY (`PROJECTID`) REFERENCES `recovery` (`PROJECTID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TASKS_REF_AGENCY1` FOREIGN KEY (`AGENCYID`) REFERENCES `ref_agency` (`AGENCYID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `USERID` int(7) NOT NULL,
  `STATUSCODE` int(1) NOT NULL,
  `USERTITLEID` int(3) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `FIRSTNAME` varchar(50) NOT NULL,
  `LASTNAME` varchar(45) NOT NULL,
  PRIMARY KEY (`USERID`,`STATUSCODE`),
  KEY `fk_USERS_REF_USERTITLES1_idx` (`USERTITLEID`),
  KEY `fk_USERS_REF_USERSTATUS1_idx` (`STATUSCODE`),
  CONSTRAINT `fk_USERS_REF_USERSTATUS1` FOREIGN KEY (`STATUSCODE`) REFERENCES `ref_userstatus` (`STATUSCODE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_USERS_REF_USERTITLES1` FOREIGN KEY (`USERTITLEID`) REFERENCES `ref_usertitles` (`USERTITLEID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,1,'christin','12345','christin_santos@dlsu.edu.ph','Christin','Santos');
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

-- Dump completed on 2017-11-20  6:51:30
