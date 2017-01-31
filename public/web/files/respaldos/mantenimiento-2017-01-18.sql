-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: mantenimiento
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

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
-- Table structure for table `acceso`
--

DROP TABLE IF EXISTS `acceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_id` int(11) NOT NULL,
  `accion` varchar(1024) NOT NULL,
  `icono` varchar(64) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `orden` int(11) NOT NULL,
  `menu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acceso`
--

LOCK TABLES `acceso` WRITE;
/*!40000 ALTER TABLE `acceso` DISABLE KEYS */;
INSERT INTO `acceso` VALUES (1,5,'Novedad/listar/','fa-book','Manteniminetos Correctivos',5,1),(2,1,'Usuario/listar/','fa-user','Usuarios',1,1),(3,1,'Laboratorio/listar/','fa-tasks','Laboratorios',2,1),(4,2,'Plan/listar/','fa-wrench','Planes Mantenimiento',3,1),(5,2,'Novedad/listar/','fa-book','Mantenimiento Correctivo',5,1),(6,2,'Orden/listar/','fa-bell','Mantenimiento Preventivo',5,2),(7,2,'Novedad/ingreso/','fa-edit ','Ingreso Man. Correctivo',2,1),(8,3,'Practica/listar/','fa-copy','Prácticas',1,1),(9,3,'Paralelo/listar/','fa-link ','Paralelos',2,1),(10,3,'Estudiante/listar/','fa-users','Estudiantes',3,1),(11,3,'Evaluacion/listar/','fa-pencil','Calificar Prácticas',4,1),(12,4,'Practica/practicas/','fa-list','Mis Prácticas',1,1),(13,1,'Activo/listar/','fa-cog','Activos Físicos',3,1),(14,1,'Auditoria/listar/','fa-exclamation-triangle','Auditoría',5,1),(15,1,'Respaldo/crear/','fa-database','Respaldar Datos',6,1),(17,2,'#','fa fa-sitemap','Mantenimiento',4,0),(18,1,'Documento/listar/','fa-files-o','Documentos',7,1),(19,1,'#','fa fa-sitemap','Reportes',8,0),(20,1,'Reporte/uso/','fa-pencil-square-o','Uso Maquina',9,1),(21,1,'Reporte/correctivo/','fa-pencil-square-o','Mantenimiento Correctivo',10,1),(22,1,'Novedades/listar/','fa-exclamation-triangle','Novedades',12,1),(23,1,'Reporte/preventivo/','fa-pencil-square-o','Mantenimiento Preventivo',11,2),(24,2,'Activo/listar/','fa-cog','Mis Activos',3,1),(25,2,'Novedades/ingreso/','fa-pencil','Ingreso Novedad',1,1),(26,2,'#','fa fa-sitemap','Reportes',6,0),(27,2,'Reporte/uso/','fa-pencil-square-o','Uso Maquina',7,2);
/*!40000 ALTER TABLE `acceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activo_fisico`
--

DROP TABLE IF EXISTS `activo_fisico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activo_fisico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(45) NOT NULL,
  `nombre_activo` varchar(1024) NOT NULL,
  `ficha` varchar(128) NOT NULL,
  `codigo` varchar(64) NOT NULL,
  `inventario` varchar(64) DEFAULT NULL,
  `manual_fabricante` varchar(64) DEFAULT NULL,
  `seccion` varchar(128) DEFAULT NULL,
  `marca_maquina` varchar(64) DEFAULT NULL,
  `modelo_maquina` varchar(64) DEFAULT NULL,
  `serie_maquina` varchar(64) DEFAULT NULL,
  `color` varchar(64) DEFAULT NULL,
  `pais_origen` varchar(64) DEFAULT NULL,
  `capacidad` varchar(64) DEFAULT NULL,
  `caracteristicas` text,
  `marca_motor` varchar(64) DEFAULT NULL,
  `tipo_he` varchar(64) DEFAULT NULL,
  `num_fases` varchar(64) DEFAULT NULL,
  `rpm` varchar(64) DEFAULT NULL,
  `voltaje_motor` varchar(64) DEFAULT NULL,
  `hz` varchar(64) DEFAULT NULL,
  `amperios_motor` varchar(64) DEFAULT NULL,
  `kw` varchar(64) DEFAULT NULL,
  `imagen_maquina_url` varchar(256) NOT NULL,
  `tipo_motor_id` int(11) NOT NULL,
  `nomenglatura_url` varchar(256) DEFAULT NULL,
  `funcion` text,
  `diagram_proceso_url` varchar(256) DEFAULT NULL,
  `alias` varchar(512) NOT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT '0',
  `laboratorio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_activo_fisico_tipo_motor1` (`tipo_motor_id`),
  KEY `fk_activo_fisico_lab_id_idx` (`laboratorio_id`),
  CONSTRAINT `fk_activo_fisico_tipo_motor1` FOREIGN KEY (`tipo_motor_id`) REFERENCES `tipo_motor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lab_id` FOREIGN KEY (`laboratorio_id`) REFERENCES `laboratorio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activo_fisico`
--

LOCK TABLES `activo_fisico` WRITE;
/*!40000 ALTER TABLE `activo_fisico` DISABLE KEYS */;
INSERT INTO `activo_fisico` VALUES (6,'','Maquina 1','1111','111','','111','','','','','','','','<p>zxzx</p>\r\n','','','','','','','','','act26719.jpg',1,'act4780.jpg','mi funcion','act2933.pdf','maquina 1',0,4);
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
  `horas_operacion` decimal(5,2) NOT NULL DEFAULT '0.00',
  `frecuencia_numero` int(11) NOT NULL DEFAULT '0',
  `frecuencia_id` int(11) NOT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_registro` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `alerta_numero` int(11) NOT NULL,
  `parte_maquina_id` int(11) NOT NULL DEFAULT '0',
  `horas_totales` decimal(5,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `fk_activo_plan_plan_mantenimiento1` (`plan_mantenimiento_id`),
  KEY `fk_activo_plan_activo_fisico1` (`activo_fisico_id`),
  KEY `fk_activo_plan_frecuencia_idx` (`frecuencia_id`),
  CONSTRAINT `fk_activo_plan_activo_fisico1` FOREIGN KEY (`activo_fisico_id`) REFERENCES `activo_fisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_plan_plan_mantenimiento1` FOREIGN KEY (`plan_mantenimiento_id`) REFERENCES `plan_mantenimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_frecuencia_id` FOREIGN KEY (`frecuencia_id`) REFERENCES `frecuencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activo_plan`
--

LOCK TABLES `activo_plan` WRITE;
/*!40000 ALTER TABLE `activo_plan` DISABLE KEYS */;
INSERT INTO `activo_plan` VALUES (6,1,6,1.87,2,1,0,'2017-01-15','2017-01-15',1,4,1.87);
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
-- Table structure for table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(1024) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` varchar(2048) NOT NULL,
  `tipo_usuario` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` VALUES (1,'2','2016-12-10','Registro una Novedad','2'),(2,'2','2017-01-08','Registro una Novedad \"teste 3\"','2'),(3,'ga wej','2017-01-08','Registro una Novedad \"teste teste\"','Técnico'),(4,'ga wej','2017-01-15','Registro una Novedad \"teste\"','Técnico'),(5,'ga wej','2017-01-15','Registro una Novedad \"problema\"','Técnico'),(6,'sdsd Perez','2017-01-15','Registro una Novedad \"nuevo problema\"','Estudiante');
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (9,'sdsd',25,0),(12,'sdsd',26,0),(13,'sdsd',27,0),(15,'sdsd',26,0),(16,'4444',29,0),(17,'0988',31,0),(18,'sdsd',26,0);
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
  `practica_id` int(11) NOT NULL,
  `archivo_url` varchar(256) NOT NULL,
  `duracion_practica` time NOT NULL,
  `observaciones` varchar(1024) DEFAULT NULL,
  `nota_practica` decimal(5,2) DEFAULT NULL,
  `fecha_calificacion` date DEFAULT NULL,
  `profesor_id` int(11) DEFAULT NULL,
  `ejecutado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_evaluacion_practicas1` (`practica_id`),
  KEY `fk_evaluacion_estudiante1_idx` (`estudiante_id`),
  CONSTRAINT `fk_evaluacion_1` FOREIGN KEY (`practica_id`) REFERENCES `practica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluacion_estudiante1` FOREIGN KEY (`estudiante_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
INSERT INTO `evaluacion` VALUES (13,26,11,'pra23365.pdf','00:50:02',NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frecuencia`
--

DROP TABLE IF EXISTS `frecuencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frecuencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `descripcion` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frecuencia`
--

LOCK TABLES `frecuencia` WRITE;
/*!40000 ALTER TABLE `frecuencia` DISABLE KEYS */;
INSERT INTO `frecuencia` VALUES (1,'Horas','Horas'),(2,'Meses','Meses'),(3,'Años','Años');
/*!40000 ALTER TABLE `frecuencia` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_docente`
--

LOCK TABLES `lab_docente` WRITE;
/*!40000 ALTER TABLE `lab_docente` DISABLE KEYS */;
INSERT INTO `lab_docente` VALUES (8,4,3),(9,4,30);
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
  `introduccion` longtext NOT NULL,
  `objetivos` longtext NOT NULL,
  `generalidades` longtext NOT NULL,
  `seguridad` longtext NOT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT '0',
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorio`
--

LOCK TABLES `laboratorio` WRITE;
/*!40000 ALTER TABLE `laboratorio` DISABLE KEYS */;
INSERT INTO `laboratorio` VALUES (4,'c001','laboratorio 1','&lt;p&gt;asasa&lt;/p&gt;','&lt;p&gt;sdadsdsd&lt;/p&gt;','&lt;p&gt;asasas&lt;/p&gt;','&lt;p&gt;asasas&lt;/p&gt;',0,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matricula`
--

LOCK TABLES `matricula` WRITE;
/*!40000 ALTER TABLE `matricula` DISABLE KEYS */;
INSERT INTO `matricula` VALUES (20,18,6);
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
  `url` varchar(128) DEFAULT NULL,
  `tiempo_ejecucion` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_novedades_activo_fisico1` (`activo_fisico_id`),
  CONSTRAINT `fk_lab_activo_fisico_id` FOREIGN KEY (`activo_fisico_id`) REFERENCES `activo_fisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `novedad`
--

LOCK TABLES `novedad` WRITE;
/*!40000 ALTER TABLE `novedad` DISABLE KEYS */;
INSERT INTO `novedad` VALUES (19,'problema','casusa','solucion','mi proceso','mi elemeorn','sdd',2,NULL,6,0,2,2,NULL,NULL),(20,'nuevo problema','mi cauda','',NULL,NULL,NULL,NULL,NULL,6,1,NULL,26,NULL,NULL);
/*!40000 ALTER TABLE `novedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `novedades`
--

DROP TABLE IF EXISTS `novedades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `novedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `novedades`
--

LOCK TABLES `novedades` WRITE;
/*!40000 ALTER TABLE `novedades` DISABLE KEYS */;
INSERT INTO `novedades` VALUES (1,NULL,NULL,'registro de las novedades'),(2,2,'2017-01-15','preuab de novedad');
/*!40000 ALTER TABLE `novedades` ENABLE KEYS */;
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
  `fecha_emision` date NOT NULL,
  `fecha_atencion` date DEFAULT NULL,
  `tecnico_asignado` int(11) NOT NULL,
  `tiempo_ejecucion` varchar(64) DEFAULT NULL,
  `observacion` varchar(1024) DEFAULT NULL,
  `tecnico_atiende` int(11) DEFAULT NULL,
  `atendido` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_orden_plan_activo_plan1` (`activo_plan_id`),
  CONSTRAINT `fk_orden_plan_activo_plan1` FOREIGN KEY (`activo_plan_id`) REFERENCES `activo_plan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paralelo`
--

LOCK TABLES `paralelo` WRITE;
/*!40000 ALTER TABLE `paralelo` DISABLE KEYS */;
INSERT INTO `paralelo` VALUES (6,'paralelo A','2017-01-15','2017-01-31',9,'0');
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
  `url` varchar(256) DEFAULT NULL,
  `activo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_activo_id` (`activo_id`),
  CONSTRAINT `fk_activo_id` FOREIGN KEY (`activo_id`) REFERENCES `activo_fisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partes_maquina`
--

LOCK TABLES `partes_maquina` WRITE;
/*!40000 ALTER TABLE `partes_maquina` DISABLE KEYS */;
INSERT INTO `partes_maquina` VALUES (4,'parte 1',NULL,6);
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
  `tiempo_ejecucion` varchar(64) NOT NULL,
  `estado_maquina` tinyint(4) NOT NULL,
  `herramientas` varchar(256) NOT NULL,
  `materiales` varchar(256) NOT NULL,
  `equipo` varchar(256) NOT NULL,
  `procedimiento` text NOT NULL,
  `observaciones` varchar(2048) NOT NULL,
  `tarea` varchar(1024) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_mantenimiento`
--

LOCK TABLES `plan_mantenimiento` WRITE;
/*!40000 ALTER TABLE `plan_mantenimiento` DISABLE KEYS */;
INSERT INTO `plan_mantenimiento` VALUES (1,'15',1,'herramioentas','materias','equipos','&lt;p&gt;xccxc&lt;/p&gt;','&lt;p&gt;xdcxcxc&lt;/p&gt;','tarea 1',2,0),(2,'10 min',0,'alguna','algunas','algunas','&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,&lt;/p&gt;','&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,&lt;/p&gt;','plan 3',2,0),(3,'2 horas',0,'heramoer','sasasas','asas','&lt;p&gt;z,n,m,zxz&lt;/p&gt;','&lt;p&gt;dlkfjd.fd.f&lt;/p&gt;','plan 4',2,0);
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
  `url` varchar(512) NOT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT '0',
  `usuario_id` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `paralelo_id` int(11) NOT NULL,
  `activo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_activo_id_idx` (`activo_id`),
  CONSTRAINT `fk_activo_fisico_id` FOREIGN KEY (`activo_id`) REFERENCES `activo_fisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `practica`
--

LOCK TABLES `practica` WRITE;
/*!40000 ALTER TABLE `practica` DISABLE KEYS */;
INSERT INTO `practica` VALUES (11,'practica 1','2017-01-15',2,'pra24356.pdf',0,30,'03:30:00','04:45:00',6,6);
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
INSERT INTO `tipo_usuario` VALUES (1,'Supervisor','Supervisor'),(2,'Técnico','Técnico'),(3,'Docente','Docente'),(4,'Estudiante','Estudiante');
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'1111111111','Jane ale','Concha','fcea920f7412b5da7be0cf42b8c93759','efaby10@hotmail.com',0,1),(2,'2222222222','ga','wej','e10adc3949ba59abbe56e057f20f883e','efaby10@gmail.com',0,2),(3,'3333333333','wewe','wew','e10adc3949ba59abbe56e057f20f883e','lajane2020@hotmail.com',0,3),(4,'0603108770','sdsd','sdd','e10adc3949ba59abbe56e057f20f883e','sdds',1,1),(6,'4444244444','2323','2323','e10adc3949ba59abbe56e057f20f883e','lajane2020@hotmail.com',1,4),(7,'0602567802','dsd','sdsd','e10adc3949ba59abbe56e057f20f883e','lajane2020@hotmail.com',0,4),(25,'0600034202','sdsd','Perez','8b522136773385655e6140faeaac1e4e','lajane2020@hotmail.com',1,4),(26,'0600034201','sdsd','Perez','e10adc3949ba59abbe56e057f20f883e','lajane2020@hotmail.com',0,4),(27,'6666666666','sdsd','Perez','e10adc3949ba59abbe56e057f20f883e','lajane2020@hotmail.com',0,4),(28,'0603718571','Juan122','Perez','202cb962ac59075b964b07152d234b70','lajane2020@hotmail.com',0,1),(29,'0603718572','Fabian','Villa','8e57010f041a36616c747808e9bfa2dd','efaby10@hotmail.com',0,4),(30,'0603718578','Fabian','Villa','e10adc3949ba59abbe56e057f20f883e','efaby10@hotmail.com',0,3),(31,'0601815327','Estudiante','estudiante','4870f6e049592a12e88534e668fd72c6','mail@mail.com',0,4);
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

-- Dump completed on 2017-01-18  2:32:15
