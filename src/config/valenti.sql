-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: Valenti
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `eal_boletin`
--

DROP TABLE IF EXISTS `eal_boletin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eal_boletin` (
  `ideal_boletin` int(11) NOT NULL AUTO_INCREMENT,
  `eal_titulo` varchar(45) DEFAULT NULL,
  `eal_texto` varchar(45) DEFAULT NULL,
  `eal_registre` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `eal_active` int(4) DEFAULT NULL,
  `eal_articulo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ideal_boletin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eal_boletin`
--

LOCK TABLES `eal_boletin` WRITE;
/*!40000 ALTER TABLE `eal_boletin` DISABLE KEYS */;
/*!40000 ALTER TABLE `eal_boletin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eal_categoria`
--

DROP TABLE IF EXISTS `eal_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eal_categoria` (
  `ideal_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `eal_name` varchar(100) NOT NULL,
  `eal_active` int(4) NOT NULL,
  `eal_registre` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ideal_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eal_categoria`
--

LOCK TABLES `eal_categoria` WRITE;
/*!40000 ALTER TABLE `eal_categoria` DISABLE KEYS */;
INSERT INTO `eal_categoria` VALUES (1,'Cimentación plataformas y tanques de agua potable',1,'2019-12-11 18:55:36'),(2,'Zona Zapatas',1,'2019-12-11 18:56:30'),(3,'Zona Losa Aligerada',1,'2019-12-11 18:56:30'),(4,'Zona Tanque',1,'2019-12-11 18:56:30'),(5,'Otros',1,'2019-12-11 18:56:30');
/*!40000 ALTER TABLE `eal_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eal_contact`
--

DROP TABLE IF EXISTS `eal_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eal_contact` (
  `ideal_contact` int(11) NOT NULL AUTO_INCREMENT,
  `eal_name` varchar(45) NOT NULL,
  `eal_email` varchar(45) NOT NULL,
  `eal_subject` varchar(45) DEFAULT NULL,
  `eal_message` text,
  PRIMARY KEY (`ideal_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eal_contact`
--

LOCK TABLES `eal_contact` WRITE;
/*!40000 ALTER TABLE `eal_contact` DISABLE KEYS */;
INSERT INTO `eal_contact` VALUES (1,'Nombre 1','correo@correo.com','información','mensaje 1'),(2,'Nombre 1','correo@correo.com','información','mensaje 1'),(3,'Nombre 1','correo@correo.com','información','mensaje 1'),(4,'Nombre 1','correo@correo.com','información','mensaje 1'),(5,'Nombre 1','correo@correo.com','información','mensaje 1');
/*!40000 ALTER TABLE `eal_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eal_contenido`
--

DROP TABLE IF EXISTS `eal_contenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eal_contenido` (
  `ideal_contenido` int(11) NOT NULL AUTO_INCREMENT,
  `eal_img` varchar(500) NOT NULL,
  `eal_message` text NOT NULL,
  `eal_idcategoria` int(4) NOT NULL,
  `eal_registre` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ideal_contenido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eal_contenido`
--

LOCK TABLES `eal_contenido` WRITE;
/*!40000 ALTER TABLE `eal_contenido` DISABLE KEYS */;
/*!40000 ALTER TABLE `eal_contenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eal_history`
--

DROP TABLE IF EXISTS `eal_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eal_history` (
  `ideal_history` int(11) NOT NULL AUTO_INCREMENT,
  `eal_registre` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `eal_action` varchar(12) NOT NULL COMMENT 'INS - "Insertar"\nUPT - "Actualizar"\nDEL - "Eliminar"',
  PRIMARY KEY (`ideal_history`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eal_history`
--

LOCK TABLES `eal_history` WRITE;
/*!40000 ALTER TABLE `eal_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `eal_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eal_menu`
--

DROP TABLE IF EXISTS `eal_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eal_menu` (
  `ideal_menu` int(11) NOT NULL AUTO_INCREMENT,
  `eal_name` varchar(45) NOT NULL,
  `eal_active` int(4) DEFAULT NULL,
  `eal_section` int(4) DEFAULT NULL,
  `eal_icon` varchar(45) NOT NULL,
  PRIMARY KEY (`ideal_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eal_menu`
--

LOCK TABLES `eal_menu` WRITE;
/*!40000 ALTER TABLE `eal_menu` DISABLE KEYS */;
INSERT INTO `eal_menu` VALUES (1,'Seguridad',1,1,'fa-shield-alt'),(2,'Configuración',1,1,'fa-cogs'),(3,'Inicio',1,1,'fa-tachometer-alt'),(4,'Avances de Obra',1,2,'fa-elementor'),(5,'Boletines',1,2,'fa-newspaper');
/*!40000 ALTER TABLE `eal_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eal_parameters`
--

DROP TABLE IF EXISTS `eal_parameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eal_parameters` (
  `ideal_parameters` int(11) NOT NULL AUTO_INCREMENT,
  `eal_name` varchar(45) DEFAULT NULL,
  `eal_active` int(4) DEFAULT NULL,
  `eal_value` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ideal_parameters`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eal_parameters`
--

LOCK TABLES `eal_parameters` WRITE;
/*!40000 ALTER TABLE `eal_parameters` DISABLE KEYS */;
INSERT INTO `eal_parameters` VALUES (1,'Email_contacto',1,'backend@enalgunlugarestudio.com'),(2,'Token_life',1,'60'),(3,'Name_project',1,'Proyecto Valenti');
/*!40000 ALTER TABLE `eal_parameters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eal_perfil`
--

DROP TABLE IF EXISTS `eal_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eal_perfil` (
  `ideal_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `eal_name` varchar(45) DEFAULT NULL,
  `eal_active` int(4) DEFAULT NULL,
  PRIMARY KEY (`ideal_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eal_perfil`
--

LOCK TABLES `eal_perfil` WRITE;
/*!40000 ALTER TABLE `eal_perfil` DISABLE KEYS */;
INSERT INTO `eal_perfil` VALUES (1,'Administrador',1);
/*!40000 ALTER TABLE `eal_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eal_section`
--

DROP TABLE IF EXISTS `eal_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eal_section` (
  `ideal_section` int(11) NOT NULL AUTO_INCREMENT,
  `eal_name` varchar(45) NOT NULL,
  `eal_active` int(4) NOT NULL,
  PRIMARY KEY (`ideal_section`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eal_section`
--

LOCK TABLES `eal_section` WRITE;
/*!40000 ALTER TABLE `eal_section` DISABLE KEYS */;
INSERT INTO `eal_section` VALUES (1,'static',1),(2,'admin',1);
/*!40000 ALTER TABLE `eal_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eal_user`
--

DROP TABLE IF EXISTS `eal_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eal_user` (
  `ideal_user` int(11) NOT NULL AUTO_INCREMENT,
  `eal_name` varchar(45) NOT NULL,
  `eal_login` varchar(45) NOT NULL,
  `eal_password` varchar(200) DEFAULT NULL,
  `eal_active` int(4) DEFAULT NULL,
  `eal_registre` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ideal_perfil` int(11) DEFAULT NULL,
  `eal_token` text,
  PRIMARY KEY (`ideal_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eal_user`
--

LOCK TABLES `eal_user` WRITE;
/*!40000 ALTER TABLE `eal_user` DISABLE KEYS */;
INSERT INTO `eal_user` VALUES (1,'admin','admin','827ccb0eea8a706c4c34a16891f84e7b',1,'2019-12-11 19:23:26',1,'');
/*!40000 ALTER TABLE `eal_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-23 17:57:07
