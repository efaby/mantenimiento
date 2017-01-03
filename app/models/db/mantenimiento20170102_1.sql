-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.9-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema mantenimiento
--

CREATE DATABASE IF NOT EXISTS mantenimiento;
USE mantenimiento;

--
-- Definition of table `acceso`
--

DROP TABLE IF EXISTS `acceso`;
CREATE TABLE `acceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_id` int(11) NOT NULL,
  `accion` varchar(1024) NOT NULL,
  `icono` varchar(64) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `orden` int(11) NOT NULL,
  `menu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acceso`
--

/*!40000 ALTER TABLE `acceso` DISABLE KEYS */;
INSERT INTO `acceso` (`id`,`rol_id`,`accion`,`icono`,`titulo`,`orden`,`menu`) VALUES 
 (1,1,'Novedad/listar/','fa-book','Mantenimiento Correctivo',3,1),
 (2,1,'Usuario/listar/','fa-user','Usuarios',1,1),
 (3,1,'Laboratorio/listar/','fa-tasks','Laboratorios',2,1),
 (4,1,'Plan/listar/','fa-wrench','Planes Mantenimiento',4,1),
 (5,2,'Novedad/listar/','fa-book','Mantenimiento Correctivo',2,1),
 (6,2,'Orden/listar/','fa-bell','Mantenimiento Preventivo',3,1),
 (7,2,'Novedad/ingreso/','fa-edit ','Ingreso Novedad',1,1),
 (8,3,'Practica/listar/','fa-copy','Prácticas',1,1),
 (9,3,'Paralelo/listar/','fa-link ','Paralelos',2,1),
 (10,3,'Estudiante/listar/','fa-users','Estudiantes',3,1),
 (11,3,'Evaluacion/listar/','fa-pencil','Calificar Prácticas',4,1),
 (12,4,'Practica/practicas/','fa-list','Mis Prácticas',1,1);
/*!40000 ALTER TABLE `acceso` ENABLE KEYS */;


--
-- Definition of table `activo_fisico`
--

DROP TABLE IF EXISTS `activo_fisico`;
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
  `nombre` varchar(1024) NOT NULL,
  `diagram_proceso_url` varchar(256) DEFAULT NULL,
  `alias` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_activo_fisico_tipo_motor1` (`tipo_motor_id`),
  CONSTRAINT `fk_activo_fisico_tipo_motor1` FOREIGN KEY (`tipo_motor_id`) REFERENCES `tipo_motor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activo_fisico`
--

/*!40000 ALTER TABLE `activo_fisico` DISABLE KEYS */;
INSERT INTO `activo_fisico` (`id`,`version`,`nombre_activo`,`ficha`,`codigo`,`inventario`,`manual_fabricante`,`seccion`,`marca_maquina`,`modelo_maquina`,`serie_maquina`,`color`,`pais_origen`,`capacidad`,`caracteristicas`,`marca_motor`,`tipo_he`,`num_fases`,`rpm`,`voltaje_motor`,`hz`,`amperios_motor`,`kw`,`imagen_maquina_url`,`tipo_motor_id`,`nomenglatura_url`,`funcion`,`nombre`,`diagram_proceso_url`,`alias`) VALUES 
 (1,'','','','001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'/images',1,NULL,NULL,'maquina 1',NULL,'');
/*!40000 ALTER TABLE `activo_fisico` ENABLE KEYS */;


--
-- Definition of table `activo_plan`
--

DROP TABLE IF EXISTS `activo_plan`;
CREATE TABLE `activo_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_mantenimiento_id` int(11) NOT NULL,
  `activo_fisico_id` int(11) NOT NULL,
  `horas_operacion` decimal(5,2) NOT NULL DEFAULT '0.00',
  `frecuencia_horas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_activo_plan_plan_mantenimiento1` (`plan_mantenimiento_id`),
  KEY `fk_activo_plan_activo_fisico1` (`activo_fisico_id`),
  CONSTRAINT `fk_activo_plan_activo_fisico1` FOREIGN KEY (`activo_fisico_id`) REFERENCES `activo_fisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_plan_plan_mantenimiento1` FOREIGN KEY (`plan_mantenimiento_id`) REFERENCES `plan_mantenimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activo_plan`
--

/*!40000 ALTER TABLE `activo_plan` DISABLE KEYS */;
INSERT INTO `activo_plan` (`id`,`plan_mantenimiento_id`,`activo_fisico_id`,`horas_operacion`,`frecuencia_horas`) VALUES 
 (1,1,1,'4.85',2);
/*!40000 ALTER TABLE `activo_plan` ENABLE KEYS */;


--
-- Definition of table `archivos_activo`
--

DROP TABLE IF EXISTS `archivos_activo`;
CREATE TABLE `archivos_activo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  `activo_fisico_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_archivos_activo_activo_fisico1` (`activo_fisico_id`),
  CONSTRAINT `fk_archivos_activo_activo_fisico1` FOREIGN KEY (`activo_fisico_id`) REFERENCES `activo_fisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archivos_activo`
--

/*!40000 ALTER TABLE `archivos_activo` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivos_activo` ENABLE KEYS */;


--
-- Definition of table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_estudiante_usuario1` (`usuario_id`),
  CONSTRAINT `fk_estudiante_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estudiante`
--

/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` (`id`,`codigo`,`usuario_id`,`eliminado`) VALUES 
 (9,'sdsd',25,0),
 (12,'sdsd',26,0),
 (13,'sdsd',27,0);
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;


--
-- Definition of table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluacion`
--

/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
INSERT INTO `evaluacion` (`id`,`estudiante_id`,`practica_id`,`archivo_url`,`duracion_practica`,`observaciones`,`nota_practica`,`fecha_calificacion`,`profesor_id`,`ejecutado`) VALUES 
 (2,27,6,'lab966520740.pdf','00:50:01','ninguna','5.00','2016-12-31',3,1),
 (3,27,6,'lab1317023215.pdf','02:00:02','ninguna','6.00','2016-12-30',3,1),
 (4,27,6,'lab417198010.pdf','02:00:02','dsfdfdfdf','9.50','2016-12-30',3,1);
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;


--
-- Definition of table `lab_activo`
--

DROP TABLE IF EXISTS `lab_activo`;
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

--
-- Dumping data for table `lab_activo`
--

/*!40000 ALTER TABLE `lab_activo` DISABLE KEYS */;
INSERT INTO `lab_activo` (`id`,`activo_fisico_id`,`laboratorio_id`,`docente_id`) VALUES 
 (1,1,1,'3');
/*!40000 ALTER TABLE `lab_activo` ENABLE KEYS */;


--
-- Definition of table `lab_docente`
--

DROP TABLE IF EXISTS `lab_docente`;
CREATE TABLE `lab_docente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `laboratorio_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lab_docente_1_idx` (`laboratorio_id`),
  KEY `fk_lab_docente_2_idx` (`usuario_id`),
  CONSTRAINT `fk_lab_docente_1` FOREIGN KEY (`laboratorio_id`) REFERENCES `laboratorio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lab_docente_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_docente`
--

/*!40000 ALTER TABLE `lab_docente` DISABLE KEYS */;
INSERT INTO `lab_docente` (`id`,`laboratorio_id`,`usuario_id`) VALUES 
 (1,1,3),
 (2,2,3);
/*!40000 ALTER TABLE `lab_docente` ENABLE KEYS */;


--
-- Definition of table `laboratorio`
--

DROP TABLE IF EXISTS `laboratorio`;
CREATE TABLE `laboratorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `introduccion` longtext NOT NULL,
  `objetivos` longtext NOT NULL,
  `generalidades` longtext NOT NULL,
  `seguridad` longtext NOT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorio`
--

/*!40000 ALTER TABLE `laboratorio` DISABLE KEYS */;
INSERT INTO `laboratorio` (`id`,`codigo`,`nombre`,`introduccion`,`objetivos`,`generalidades`,`seguridad`,`eliminado`) VALUES 
 (1,'001','Laboratorio 1','introduccion','objetivos','generalidades','seguriodad',0),
 (2,'003','laboratorio 3','&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,&lt;/p&gt;','&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,&lt;/p&gt;','&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,&lt;/p&gt;','&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,&lt;/p&gt;',0);
/*!40000 ALTER TABLE `laboratorio` ENABLE KEYS */;


--
-- Definition of table `matricula`
--

DROP TABLE IF EXISTS `matricula`;
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

--
-- Dumping data for table `matricula`
--

/*!40000 ALTER TABLE `matricula` DISABLE KEYS */;
INSERT INTO `matricula` (`id`,`estudiante_id`,`paralelo_id`) VALUES 
 (14,9,1),
 (15,12,1),
 (16,13,2);
/*!40000 ALTER TABLE `matricula` ENABLE KEYS */;


--
-- Definition of table `novedad`
--

DROP TABLE IF EXISTS `novedad`;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `novedad`
--

/*!40000 ALTER TABLE `novedad` DISABLE KEYS */;
INSERT INTO `novedad` (`id`,`problema`,`causa`,`solucion`,`proceso`,`elementos`,`observaciones`,`tecnico_asigna`,`supervisor_id`,`activo_fisico_id`,`es_estudiante`,`tecnico_repara`,`usuario_registra`) VALUES 
 (1,'problema 45','causa 45','','atendido','ninfunao','niguna',2,1,1,1,2,27),
 (2,'problema 45','causa 45','',NULL,NULL,NULL,NULL,NULL,1,1,NULL,27),
 (3,'problema 45','causa 45','',NULL,NULL,NULL,NULL,NULL,1,1,NULL,27),
 (4,'problema 45','causa 45','',NULL,NULL,NULL,NULL,NULL,1,1,NULL,27),
 (5,'problem problem','n0 lo se','',NULL,NULL,NULL,NULL,NULL,1,0,NULL,2);
/*!40000 ALTER TABLE `novedad` ENABLE KEYS */;


--
-- Definition of table `orden_plan`
--

DROP TABLE IF EXISTS `orden_plan`;
CREATE TABLE `orden_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activo_plan_id` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_atencion` date DEFAULT NULL,
  `tecnico_asignado` int(11) NOT NULL,
  `tiempo_ejecucion` varchar(64) DEFAULT NULL,
  `observacion` varchar(1024) DEFAULT NULL,
  `tecnico_atiende` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orden_plan_activo_plan1` (`activo_plan_id`),
  CONSTRAINT `fk_orden_plan_activo_plan1` FOREIGN KEY (`activo_plan_id`) REFERENCES `activo_plan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orden_plan`
--

/*!40000 ALTER TABLE `orden_plan` DISABLE KEYS */;
INSERT INTO `orden_plan` (`id`,`activo_plan_id`,`fecha_emision`,`fecha_atencion`,`tecnico_asignado`,`tiempo_ejecucion`,`observacion`,`tecnico_atiende`) VALUES 
 (1,1,'2016-12-30','2016-12-30',2,'2 horas','ninguna',2);
/*!40000 ALTER TABLE `orden_plan` ENABLE KEYS */;


--
-- Definition of table `paralelo`
--

DROP TABLE IF EXISTS `paralelo`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paralelo`
--

/*!40000 ALTER TABLE `paralelo` DISABLE KEYS */;
INSERT INTO `paralelo` (`id`,`nombre`,`fecha_inicio`,`fecha_fin`,`lab_docente_id`,`eliminado`) VALUES 
 (1,'pac','2016-12-15','2016-12-30',1,'1'),
 (2,'pa','2016-12-15','2016-12-29',1,'0'),
 (3,'sexto A','2016-12-31','2017-03-29',1,'0');
/*!40000 ALTER TABLE `paralelo` ENABLE KEYS */;


--
-- Definition of table `partes_maquina`
--

DROP TABLE IF EXISTS `partes_maquina`;
CREATE TABLE `partes_maquina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) NOT NULL,
  `url` varchar(256) DEFAULT NULL,
  `activo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_activo_id` (`activo_id`),
  CONSTRAINT `fk_activo_id` FOREIGN KEY (`activo_id`) REFERENCES `activo_fisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partes_maquina`
--

/*!40000 ALTER TABLE `partes_maquina` DISABLE KEYS */;
INSERT INTO `partes_maquina` (`id`,`nombre`,`url`,`activo_id`) VALUES 
 (1,'parte1',NULL,NULL);
/*!40000 ALTER TABLE `partes_maquina` ENABLE KEYS */;


--
-- Definition of table `plan_mantenimiento`
--

DROP TABLE IF EXISTS `plan_mantenimiento`;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_mantenimiento`
--

/*!40000 ALTER TABLE `plan_mantenimiento` DISABLE KEYS */;
INSERT INTO `plan_mantenimiento` (`id`,`tiempo_ejecucion`,`estado_maquina`,`herramientas`,`materiales`,`equipo`,`procedimiento`,`observaciones`,`tarea`,`usuario_id`,`eliminado`) VALUES 
 (1,'15',1,'herramioentas','materias','equipos','&lt;p&gt;xccxc&lt;/p&gt;','&lt;p&gt;xdcxcxc&lt;/p&gt;','tarea 1',2,0),
 (2,'10 min',0,'alguna','algunas','algunas','&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,&lt;/p&gt;','&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,&lt;/p&gt;','plan 3',2,0);
/*!40000 ALTER TABLE `plan_mantenimiento` ENABLE KEYS */;


--
-- Definition of table `practica`
--

DROP TABLE IF EXISTS `practica`;
CREATE TABLE `practica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `fecha` date NOT NULL,
  `tiempo_duracion` int(11) NOT NULL,
  `lab_activo_id` int(11) NOT NULL,
  `url` varchar(512) NOT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT '0',
  `usuario_id` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `paralelo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_practicas_activo_fisico1` (`lab_activo_id`),
  CONSTRAINT `fk_practica_1` FOREIGN KEY (`lab_activo_id`) REFERENCES `lab_activo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practica`
--

/*!40000 ALTER TABLE `practica` DISABLE KEYS */;
INSERT INTO `practica` (`id`,`nombre`,`fecha`,`tiempo_duracion`,`lab_activo_id`,`url`,`eliminado`,`usuario_id`,`hora_inicio`,`hora_fin`,`paralelo_id`) VALUES 
 (1,'practica','2016-12-25',0,1,'lab170061769.',0,0,'00:00:00','00:00:00',0),
 (2,'practica 1','2016-12-25',3,1,'lab49451839.pdf',0,3,'00:00:00','00:00:00',0),
 (3,'prectica','2016-12-25',4,1,'lab1098347432.pdf',0,3,'00:00:00','00:00:00',0),
 (4,'practica 3','2016-12-27',1,1,'lab1078829698.pdf',0,3,'15:15:00','16:15:00',1),
 (5,'2323','2016-12-28',2,1,'lab1868047202.pdf',0,3,'16:00:00','17:15:00',2),
 (6,'practica 4','2016-12-30',3,1,'lab1664524394.pdf',0,3,'09:15:00','10:40:00',2),
 (7,'Practica 5','2016-12-31',4,1,'pra1660178785.pdf',0,3,'12:00:00','12:30:00',1);
/*!40000 ALTER TABLE `practica` ENABLE KEYS */;


--
-- Definition of table `tipo_motor`
--

DROP TABLE IF EXISTS `tipo_motor`;
CREATE TABLE `tipo_motor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_motor`
--

/*!40000 ALTER TABLE `tipo_motor` DISABLE KEYS */;
INSERT INTO `tipo_motor` (`id`,`nombre`,`descripcion`) VALUES 
 (1,'Corriente Continua','Corriente Continua'),
 (2,'Rotot Devanado','Rotot Devanado'),
 (3,'Jaula de Ardilla','Jaula de Ardilla');
/*!40000 ALTER TABLE `tipo_motor` ENABLE KEYS */;


--
-- Definition of table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_usuario`
--

/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` (`id`,`nombre`,`descripcion`) VALUES 
 (1,'Supervisor','Supervisor'),
 (2,'Técnico','Técnico'),
 (3,'Docente','Docente'),
 (4,'Estudiante','Estudiante');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`,`cedula`,`nombres`,`apellidos`,`password`,`email`,`eliminado`,`tipo_usuario_id`) VALUES 
 (1,'1111111111','Jane ale','Concha','fcea920f7412b5da7be0cf42b8c93759','lajane2020@hotmail.com',0,1),
 (2,'2222222222','ga','wej','e10adc3949ba59abbe56e057f20f883e','lajane2020@hotmail.com',1,2),
 (3,'3333333333','wewe','wew','e10adc3949ba59abbe56e057f20f883e','lajane2020@hotmail.com',1,3),
 (4,'0603108770','sdsd','sdd','e10adc3949ba59abbe56e057f20f883e','sdds',1,1),
 (6,'4444244444','2323','2323','e10adc3949ba59abbe56e057f20f883e','lajane2020@hotmail.com',1,4),
 (7,'0602567802','dsd','sdsd','e10adc3949ba59abbe56e057f20f883e','lajane2020@hotmail.com',1,4),
 (25,'0600034201','sdsd','Perez','e10adc3949ba59abbe56e057f20f883e','lajane2020@hotmail.com',1,4),
 (26,'0600034201','sdsd','Perez','e10adc3949ba59abbe56e057f20f883e','lajane2020@hotmail.com',1,4),
 (27,'6666666666','sdsd','Perez','e10adc3949ba59abbe56e057f20f883e','lajane2020@hotmail.com',0,4),
 (28,'0603718578','Juan122','Perez','202cb962ac59075b964b07152d234b70','lajane2020@hotmail.com',0,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
