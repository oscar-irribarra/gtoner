-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: db_proyecto
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Toner'),(2,'Tambor'),(3,'Tinta'),(4,'Fusor');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `IdDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Id_Ubicacion` int(11) NOT NULL,
  PRIMARY KEY (`IdDepartamento`),
  KEY `departamento_ubicacion_idx` (`Id_Ubicacion`),
  CONSTRAINT `departamento_ubicacion` FOREIGN KEY (`Id_Ubicacion`) REFERENCES `ubicacion` (`IdUbicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dispositivo`
--

DROP TABLE IF EXISTS `dispositivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dispositivo` (
  `IdDispositivo` int(11) NOT NULL AUTO_INCREMENT,
  `Marca` varchar(100) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  PRIMARY KEY (`IdDispositivo`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dispton`
--

DROP TABLE IF EXISTS `dispton`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dispton` (
  `IdDispTon` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Dispositivo` int(11) NOT NULL,
  `Id_Toner` int(11) NOT NULL,
  PRIMARY KEY (`IdDispTon`),
  KEY `dispton_dispositivo_idx` (`Id_Dispositivo`),
  KEY `dispton_toner_idx` (`Id_Toner`),
  CONSTRAINT `dispton_dispositivo` FOREIGN KEY (`Id_Dispositivo`) REFERENCES `dispositivo` (`IdDispositivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `dispton_toner` FOREIGN KEY (`Id_Toner`) REFERENCES `toner` (`IdToner`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entrada`
--

DROP TABLE IF EXISTS `entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrada` (
  `IdEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Id_Toner` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`IdEntrada`),
  KEY `entrada_toner_idx` (`Id_Toner`),
  CONSTRAINT `entrada_toner` FOREIGN KEY (`Id_Toner`) REFERENCES `toner` (`IdToner`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `impdep`
--

DROP TABLE IF EXISTS `impdep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impdep` (
  `IdImpDep` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Departamento` int(11) NOT NULL,
  `Id_Impresora` int(11) NOT NULL,
  PRIMARY KEY (`IdImpDep`),
  KEY `impdep_impresora_idx` (`Id_Impresora`),
  KEY `impdep_departamento_idx` (`Id_Departamento`),
  CONSTRAINT `impdep_departamento` FOREIGN KEY (`Id_Departamento`) REFERENCES `departamento` (`IdDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `impdep_impresora` FOREIGN KEY (`Id_Impresora`) REFERENCES `impresora` (`IdImpresora`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `impresora`
--

DROP TABLE IF EXISTS `impresora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impresora` (
  `IdImpresora` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Dispositivo` int(11) NOT NULL,
  `Serie` varchar(100) NOT NULL,
  `NFactura` varchar(100) NOT NULL,
  `FechaCompra` date NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdImpresora`),
  KEY `impresora_dispositivo_idx` (`Id_Dispositivo`),
  CONSTRAINT `impresora_dispositivo` FOREIGN KEY (`Id_Dispositivo`) REFERENCES `dispositivo` (`IdDispositivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `IdInventario` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Toner` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Id_Ubicacion` int(11) NOT NULL,
  PRIMARY KEY (`IdInventario`),
  KEY `inventario_toner_idx` (`Id_Toner`),
  KEY `inventario_ubicacion_idx` (`Id_Ubicacion`),
  CONSTRAINT `inventario_toner` FOREIGN KEY (`Id_Toner`) REFERENCES `toner` (`IdToner`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventario_ubicacion` FOREIGN KEY (`Id_Ubicacion`) REFERENCES `ubicacion` (`IdUbicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `IdPedido` int(11) NOT NULL AUTO_INCREMENT,
  `Id_ImpDep` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `Id_Toner` int(11) NOT NULL,
  PRIMARY KEY (`IdPedido`),
  KEY `pedido_impdep_idx` (`Id_ImpDep`),
  KEY `pedido_toner_idx` (`Id_Toner`),
  CONSTRAINT `pedido_impdep` FOREIGN KEY (`Id_ImpDep`) REFERENCES `impdep` (`IdImpDep`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pedido_toner` FOREIGN KEY (`Id_Toner`) REFERENCES `toner` (`IdToner`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `salida`
--

DROP TABLE IF EXISTS `salida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salida` (
  `IdSalida` int(11) NOT NULL AUTO_INCREMENT,
  `Id_UbicacionOrigen` int(11) NOT NULL,
  `Id_Departamento` int(11) NOT NULL,
  `Id_Toner` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`IdSalida`),
  KEY `salida_toner_idx` (`Id_Toner`),
  KEY `salida_ubicacion_idx` (`Id_UbicacionOrigen`),
  KEY `salida_departamento_idx` (`Id_Departamento`),
  CONSTRAINT `salida_departamento` FOREIGN KEY (`Id_Departamento`) REFERENCES `departamento` (`IdDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `salida_toner` FOREIGN KEY (`Id_Toner`) REFERENCES `toner` (`IdToner`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `salida_ubicacion` FOREIGN KEY (`Id_UbicacionOrigen`) REFERENCES `ubicacion` (`IdUbicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `toner`
--

DROP TABLE IF EXISTS `toner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toner` (
  `IdToner` int(11) NOT NULL AUTO_INCREMENT,
  `Marca` varchar(100) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  `Id_Categoria` int(11) NOT NULL,
  PRIMARY KEY (`IdToner`),
  KEY `toner_categoria_idx` (`Id_Categoria`),
  CONSTRAINT `toner_categoria` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria` (`IdCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ubicacion`
--

DROP TABLE IF EXISTS `ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicacion` (
  `IdUbicacion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`IdUbicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `ubicacion` WRITE;
/*!40000 ALTER TABLE `ubicacion` DISABLE KEYS */;
INSERT INTO `ubicacion` VALUES (1,'Lugar1');
/*!40000 ALTER TABLE `ubicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Rol` tinyint(1) NOT NULL,
  `Id_Ubicacion` int(11) NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  KEY `usuario_ubicacion_idx` (`Id_Ubicacion`),
  CONSTRAINT `usuario_ubicacion` FOREIGN KEY (`Id_Ubicacion`) REFERENCES `ubicacion` (`IdUbicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin','21232f297a57a5a743894a0e4a801fc3',1,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-09 15:02:56
