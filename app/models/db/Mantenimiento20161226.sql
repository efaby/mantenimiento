CREATE DATABASE  IF NOT EXISTS `mantenimiento` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mantenimiento`;
-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: mantenimiento
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `activo_fisico`
--

DROP TABLE IF EXISTS `activo_fisico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activo_fisico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(64) NOT NULL,
  `inventario` varchar(64) DEFAULT NULL,
  `num_manual_fabricante` varchar(64) DEFAULT NULL,
  `seccion` varchar(128) DEFAULT NULL,
  `marca_maquina` varchar(64) DEFAULT NULL,
  `modelo_maquina` varchar(64) DEFAULT NULL,
  `serie_maquina` varchar(64) DEFAULT NULL,
  `color` varchar(64) DEFAULT NULL,
  `pais_origen` varchar(64) DEFAULT NULL,
  `capacidad` varchar(64) DEFAULT NULL,
  `caracteristicas` text,
  `marca_motor` varchar(64) DEFAULT NULL,
  `num_fases` varchar(64) DEFAULT NULL,
  `voltaje_motor` varchar(64) DEFAULT NULL,
  `amperios_motor` varchar(64) DEFAULT NULL,
  `imagen_maquina_url` varchar(256) NOT NULL,
  `tipo_motor_id` int(11) NOT NULL,
  `partes_maquina_id` int(11) NOT NULL,
  `tipo_he` varchar(64) DEFAULT NULL,
  `rpm` varchar(64) DEFAULT NULL,
  `hz` varchar(64) DEFAULT NULL,
  `kw` varchar(64) DEFAULT NULL,
  `nomenglatura_url` varchar(256) DEFAULT NULL,
  `funcion` text,
  `diagram_proceso_url` varchar(256) DEFAULT NULL,
  `nombre` varchar(1024) NOT NULL,
  `alias` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_activo_fisico_tipo_motor1` (`tipo_motor_id`),
  KEY `fk_activo_fisico_partes_maquina1` (`partes_maquina_id`),
  CONSTRAINT `fk_activo_fisico_partes_maquina1` FOREIGN KEY (`partes_maquina_id`) REFERENCES `partes_maquina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_fisico_tipo_motor1` FOREIGN KEY (`tipo_motor_id`) REFERENCES `tipo_motor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activo_fisico`
--

LOCK TABLES `activo_fisico` WRITE;
/*!40000 ALTER TABLE `activo_fisico` DISABLE KEYS */;
INSERT INTO `activo_fisico` VALUES (1,'001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'/images',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'maquina 1','');
/*!40000 ALTER TABLE `activo_fisico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activo_plan`
--

DROP TABLE IF EXISTS `activo_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activo_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_mantenimiento_id` int(11) NOT NULL,
  `activo_fisico_id` int(11) NOT NULL,
  `horas_operacion` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_activo_plan_plan_mantenimiento1` (`plan_mantenimiento_id`),
  KEY `fk_activo_plan_activo_fisico1` (`activo_fisico_id`),
  CONSTRAINT `fk_activo_plan_activo_fisico1` FOREIGN KEY (`activo_fisico_id`) REFERENCES `activo_fisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_plan_plan_mantenimiento1` FOREIGN KEY (`plan_mantenimiento_id`) REFERENCES `plan_mantenimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activo_plan`
--

LOCK TABLES `activo_plan` WRITE;
/*!40000 ALTER TABLE `activo_plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `activo_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivos_activo`
--

DROP TABLE IF EXISTS `archivos_activo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivos_activo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  `activo_fisico_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_archivos_activo_activo_fisico1` (`activo_fisico_id`),
  CONSTRAINT `fk_archivos_activo_activo_fisico1` FOREIGN KEY (`activo_fisico_id`) REFERENCES `activo_fisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos_activo`
--

LOCK TABLES `archivos_activo` WRITE;
/*!40000 ALTER TABLE `archivos_activo` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivos_activo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_estudiante_usuario1` (`usuario_id`),
  CONSTRAINT `fk_estudiante_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (9,'sdsd',25,0),(12,'sdsd',26,0),(13,'sdsd',27,0);
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estudiante_id` int(11) NOT NULL,
  `practicas_id` int(11) NOT NULL,
  `archivo_url` varchar(256) NOT NULL,
  `duracion_practica` time NOT NULL,
  `observaciones` varchar(1024) DEFAULT NULL,
  `nota_practica` double NOT NULL,
  `fecha_calificacion` date NOT NULL,
  `profesor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_evaluacion_estudiante1` (`estudiante_id`),
  KEY `fk_evaluacion_practicas1` (`practicas_id`),
  CONSTRAINT `fk_evaluacion_estudiante1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluacion_practicas1` FOREIGN KEY (`practicas_id`) REFERENCES `practicas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab_activo`
--

DROP TABLE IF EXISTS `lab_activo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab_activo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activo_fisico_id` int(11) NOT NULL,
  `laboratorio_id` int(11) NOT NULL,
  `docente_id` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lab_activo_activo_fisico1` (`activo_fisico_id`),
  KEY `fk_lab_activo_laboratorio1` (`laboratorio_id`),
  CONSTRAINT `fk_lab_activo_activo_fisico1` FOREIGN KEY (`activo_fisico_id`) REFERENCES `activo_fisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lab_activo_laboratorio1` FOREIGN KEY (`laboratorio_id`) REFERENCES `laboratorio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_activo`
--

LOCK TABLES `lab_activo` WRITE;
/*!40000 ALTER TABLE `lab_activo` DISABLE KEYS */;
INSERT INTO `lab_activo` VALUES (1,1,1,'3');
/*!40000 ALTER TABLE `lab_activo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab_docente`
--

DROP TABLE IF EXISTS `lab_docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab_docente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `laboratorio_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lab_docente_1_idx` (`laboratorio_id`),
  KEY `fk_lab_docente_2_idx` (`usuario_id`),
  CONSTRAINT `fk_lab_docente_1` FOREIGN KEY (`laboratorio_id`) REFERENCES `laboratorio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lab_docente_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_docente`
--

LOCK TABLES `lab_docente` WRITE;
/*!40000 ALTER TABLE `lab_docente` DISABLE KEYS */;
INSERT INTO `lab_docente` VALUES (1,1,3);
/*!40000 ALTER TABLE `lab_docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratorio`
--

DROP TABLE IF EXISTS `laboratorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `introduccion` text NOT NULL,
  `objetivos` text NOT NULL,
  `generalidades` text NOT NULL,
  `seguridad` text NOT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorio`
--

LOCK TABLES `laboratorio` WRITE;
/*!40000 ALTER TABLE `laboratorio` DISABLE KEYS */;
INSERT INTO `laboratorio` VALUES (1,'001','Laboratorio 1','introduccion','objetivos','generalidades','seguriodad',0);
/*!40000 ALTER TABLE `laboratorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matricula`
--

DROP TABLE IF EXISTS `matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matricula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estudiante_id` int(11) NOT NULL,
  `paralelo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_matricula_estudiante1` (`estudiante_id`),
  KEY `fk_matricula_paralelo1` (`paralelo_id`),
  KEY `fk_matricula_estudiante` (`estudiante_id`),
  KEY `fk_matricula_paralelo` (`paralelo_id`),
  CONSTRAINT `fk_matricula_estudiante` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_paralelo` FOREIGN KEY (`paralelo_id`) REFERENCES `paralelo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matricula`
--

LOCK TABLES `matricula` WRITE;
/*!40000 ALTER TABLE `matricula` DISABLE KEYS */;
INSERT INTO `matricula` VALUES (14,9,1),(15,12,1),(16,13,2);
/*!40000 ALTER TABLE `matricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `novedad`
--

DROP TABLE IF EXISTS `novedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `novedad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `problema` varchar(1204) NOT NULL,
  `causa` varchar(1024) NOT NULL,
  `solucion` varchar(1024) DEFAULT NULL,
  `proceso` varchar(1024) DEFAULT NULL,
  `elementos` varchar(1024) DEFAULT NULL,
  `observaciones` varchar(1024) DEFAULT NULL,
  `tecnico_asigna` int(11) DEFAULT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `activo_fisico_id` int(11) NOT NULL,
  `es_estudiante` tinyint(4) NOT NULL DEFAULT '0',
  `tecnico_repara` int(11) DEFAULT NULL,
  `usuario_registra` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_novedades_activo_fisico1` (`activo_fisico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `novedad`
--

LOCK TABLES `novedad` WRITE;
/*!40000 ALTER TABLE `novedad` DISABLE KEYS */;
/*!40000 ALTER TABLE `novedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_plan`
--

DROP TABLE IF EXISTS `orden_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activo_plan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orden_plan_activo_plan1` (`activo_plan_id`),
  CONSTRAINT `fk_orden_plan_activo_plan1` FOREIGN KEY (`activo_plan_id`) REFERENCES `activo_plan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_plan`
--

LOCK TABLES `orden_plan` WRITE;
/*!40000 ALTER TABLE `orden_plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paralelo`
--

DROP TABLE IF EXISTS `paralelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paralelo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `lab_docente_id` int(11) NOT NULL,
  `eliminado` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_paralelo_1_idx` (`lab_docente_id`),
  CONSTRAINT `fk_paralelo_1` FOREIGN KEY (`lab_docente_id`) REFERENCES `lab_docente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paralelo`
--

LOCK TABLES `paralelo` WRITE;
/*!40000 ALTER TABLE `paralelo` DISABLE KEYS */;
INSERT INTO `paralelo` VALUES (1,'pac','2016-12-15','2016-12-30',1,'1'),(2,'pa','2016-12-15','2016-12-29',1,'0');
/*!40000 ALTER TABLE `paralelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partes_maquina`
--

DROP TABLE IF EXISTS `partes_maquina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partes_maquina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partes_maquina`
--

LOCK TABLES `partes_maquina` WRITE;
/*!40000 ALTER TABLE `partes_maquina` DISABLE KEYS */;
INSERT INTO `partes_maquina` VALUES (1,'parte1');
/*!40000 ALTER TABLE `partes_maquina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan_mantenimiento`
--

DROP TABLE IF EXISTS `plan_mantenimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan_mantenimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tiempo_ejecucion` int(11) NOT NULL,
  `estado_maquina` tinyint(4) NOT NULL,
  `herramientas` varchar(256) NOT NULL,
  `materiales` varchar(256) NOT NULL,
  `equipo` varchar(256) NOT NULL,
  `procedimiento` text NOT NULL,
  `observaciones` varchar(2048) NOT NULL,
  `tarea` varchar(1024) NOT NULL,
  `frecuencia_horas` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_mantenimiento`
--

LOCK TABLES `plan_mantenimiento` WRITE;
/*!40000 ALTER TABLE `plan_mantenimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_mantenimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `practica`
--

DROP TABLE IF EXISTS `practica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `practica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `fecha` date NOT NULL,
  `tiempo_duracion` int(11) NOT NULL,
  `activo_fisico_id` int(11) NOT NULL,
  `url` varchar(512) NOT NULL,
  `eliminado` tinyint(4) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_practicas_activo_fisico1` (`activo_fisico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `practica`
--

LOCK TABLES `practica` WRITE;
/*!40000 ALTER TABLE `practica` DISABLE KEYS */;
INSERT INTO `practica` VALUES (1,'practica','2016-12-25',0,1,'lab170061769.',0,0,'00:00:00','00:00:00'),(2,'practica 1','2016-12-25',3,1,'lab49451839.pdf',0,3,'00:00:00','00:00:00'),(3,'prectica','2016-12-25',4,1,'lab1098347432.pdf',0,3,'00:00:00','00:00:00');
/*!40000 ALTER TABLE `practica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_motor`
--

DROP TABLE IF EXISTS `tipo_motor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_motor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_motor`
--

LOCK TABLES `tipo_motor` WRITE;
/*!40000 ALTER TABLE `tipo_motor` DISABLE KEYS */;
INSERT INTO `tipo_motor` VALUES (1,'Corriente Continua','Corriente Continua'),(2,'Rotot Devanado','Rotot Devanado'),(3,'Jaula de Ardilla','Jaula de Ardilla');
/*!40000 ALTER TABLE `tipo_motor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Supervisor','Supervisor'),(2,'Técnico','Técnico'),(3,'Profesor','Profesor'),(4,'Estudiante','Estudiante');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) NOT NULL,
  `nombres` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(256) NOT NULL,
  `eliminado` tinyint(4) DEFAULT '0',
  `tipo_usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_tipo_usuario1` (`tipo_usuario_id`),
  CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'1234566789','Jane ale','Concha','202cb962ac59075b964b07152d234b70','lajane2020@hotmail.com',1,1),(2,'3222222222','ga','wej','202cb962ac59075b964b07152d234b70','lajane2020@hotmail.com',0,2),(3,'0603108770','wewe','wew','202cb962ac59075b964b07152d234b70','lajane2020@hotmail.com',0,3),(4,'0603108770','sdsd','sdd','202cb962ac59075b964b07152d234b70','sdds',1,1),(6,'0600034201','2323','2323','0600034201','lajane2020@hotmail.com',1,4),(7,'0602567802','dsd','sdsd','0602567802','lajane2020@hotmail.com',1,4),(25,'0600034201','sdsd','Perez','0600034201','lajane2020@hotmail.com',1,4),(26,'0600034201','sdsd','Perez','0600034201','lajane2020@hotmail.com',1,4),(27,'0600034201','sdsd','Perez','0600034201','lajane2020@hotmail.com',1,4);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-26 15:37:20
