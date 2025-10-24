-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: comfa_time
-- ------------------------------------------------------
-- Server version	8.0.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `balances_permiso`
--

DROP TABLE IF EXISTS `balances_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `balances_permiso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `tipo_permiso_id` int NOT NULL,
  `año` year NOT NULL,
  `balance_inicial` decimal(5,2) NOT NULL,
  `acumulado` decimal(5,2) DEFAULT '0.00',
  `utilizado` decimal(5,2) DEFAULT '0.00',
  `ajustado` decimal(5,2) DEFAULT '0.00',
  `balance_actual` decimal(5,2) NOT NULL,
  `balance_maximo` decimal(5,2) DEFAULT NULL,
  `arrastre_utilizado` decimal(5,2) DEFAULT '0.00',
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_usuario_permiso_año` (`usuario_id`,`tipo_permiso_id`,`año`),
  KEY `tipo_permiso_id` (`tipo_permiso_id`),
  KEY `idx_usuario_año` (`usuario_id`,`año`),
  KEY `idx_balances_año` (`año`),
  CONSTRAINT `balances_permiso_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `balances_permiso_ibfk_2` FOREIGN KEY (`tipo_permiso_id`) REFERENCES `tipos_permiso` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balances_permiso`
--

LOCK TABLES `balances_permiso` WRITE;
/*!40000 ALTER TABLE `balances_permiso` DISABLE KEYS */;
INSERT INTO `balances_permiso` VALUES (1,1,1,2024,15.00,0.00,11.00,0.00,4.00,NULL,0.00,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(2,1,2,2024,10.00,0.00,1.00,0.00,9.00,NULL,0.00,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(3,1,3,2024,5.00,0.00,0.00,0.00,5.00,NULL,0.00,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(4,2,1,2024,18.00,0.00,0.00,0.00,18.00,NULL,0.00,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(5,2,2,2024,10.00,0.00,3.00,0.00,7.00,NULL,0.00,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(6,4,1,2024,15.00,0.00,0.00,0.00,15.00,NULL,0.00,'2025-10-24 04:27:52','2025-10-24 04:27:52');
/*!40000 ALTER TABLE `balances_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracion_sistema`
--

DROP TABLE IF EXISTS `configuracion_sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configuracion_sistema` (
  `id` int NOT NULL AUTO_INCREMENT,
  `clave_config` varchar(100) NOT NULL,
  `valor_config` json NOT NULL,
  `descripcion` text,
  `categoria` varchar(50) NOT NULL,
  `es_publica` tinyint(1) DEFAULT '0',
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clave_config` (`clave_config`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion_sistema`
--

LOCK TABLES `configuracion_sistema` WRITE;
/*!40000 ALTER TABLE `configuracion_sistema` DISABLE KEYS */;
INSERT INTO `configuracion_sistema` VALUES (1,'nombre_empresa','\"ComfaTime S.A. de C.V.\"','Nombre oficial de la empresa','GENERAL',1,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(2,'dias_laborales','5','Días laborales por semana','CALENDARIO',0,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(3,'horario_oficina_inicio','\"09:00:00\"','Hora de inicio de labores','HORARIO',1,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(4,'horario_oficina_fin','\"18:00:00\"','Hora de fin de labores','HORARIO',1,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(5,'max_solicitudes_pendientes','3','Máximo de solicitudes pendientes por usuario','VALIDACIONES',0,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(6,'dias_minimos_aviso_vacaciones','5','Días mínimos de aviso para vacaciones','VALIDACIONES',1,'2025-10-24 04:27:52','2025-10-24 04:27:52');
/*!40000 ALTER TABLE `configuracion_sistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `departamento_padre_id` int DEFAULT NULL,
  `color` varchar(7) DEFAULT '#3B82F6',
  `esta_activo` tinyint(1) DEFAULT '1',
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `departamento_padre_id` (`departamento_padre_id`),
  CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`departamento_padre_id`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'Desarrollo','Departamento de Desarrollo de Software',NULL,'#3B82F6',1,'2025-10-24 04:27:52'),(2,'Recursos Humanos','Gestión del Talento Humano',NULL,'#EF4444',1,'2025-10-24 04:27:52'),(3,'Operaciones','Operaciones y Logística',NULL,'#10B981',1,'2025-10-24 04:27:52'),(4,'Ventas','Equipo Comercial',NULL,'#F59E0B',1,'2025-10-24 04:27:52'),(5,'Soporte Técnico','Atención a clientes y soporte',NULL,'#8B5CF6',1,'2025-10-24 04:27:52');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flujo_aprobacion`
--

DROP TABLE IF EXISTS `flujo_aprobacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `flujo_aprobacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `solicitud_permiso_id` int NOT NULL,
  `aprobador_id` int NOT NULL,
  `tipo_aprobador` enum('SUPERVISOR','RRHH','RESERVA') NOT NULL,
  `orden_secuencia` int NOT NULL,
  `estado` enum('PENDIENTE','APROBADO','RECHAZADO','OMITIDO') DEFAULT 'PENDIENTE',
  `comentarios` text,
  `accion_tomada_en` timestamp NULL DEFAULT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_solicitud_aprobador` (`solicitud_permiso_id`,`aprobador_id`),
  KEY `idx_aprobador_estado` (`aprobador_id`,`estado`),
  CONSTRAINT `flujo_aprobacion_ibfk_1` FOREIGN KEY (`solicitud_permiso_id`) REFERENCES `solicitudes_permiso` (`id`) ON DELETE CASCADE,
  CONSTRAINT `flujo_aprobacion_ibfk_2` FOREIGN KEY (`aprobador_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flujo_aprobacion`
--

LOCK TABLES `flujo_aprobacion` WRITE;
/*!40000 ALTER TABLE `flujo_aprobacion` DISABLE KEYS */;
INSERT INTO `flujo_aprobacion` VALUES (1,1,2,'SUPERVISOR',1,'APROBADO','Solicitud aprobada, que disfruten sus vacaciones','2024-06-02 19:30:00','2025-10-24 04:27:52','2025-10-24 04:27:52'),(2,2,2,'SUPERVISOR',1,'APROBADO','Aprobado para consulta médica','2024-08-01 21:20:00','2025-10-24 04:27:52','2025-10-24 04:27:52'),(3,3,5,'SUPERVISOR',1,'PENDIENTE',NULL,NULL,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(4,4,3,'RRHH',1,'APROBADO','Descansen y recuperese','2024-09-04 15:00:00','2025-10-24 04:27:52','2025-10-24 04:27:52');
/*!40000 ALTER TABLE `flujo_aprobacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `integraciones_calendario`
--

DROP TABLE IF EXISTS `integraciones_calendario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integraciones_calendario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `proveedor` enum('GOOGLE','OUTLOOK','ICAL') NOT NULL,
  `token_acceso` text,
  `token_actualizacion` text,
  `token_expiracion` timestamp NULL DEFAULT NULL,
  `id_calendario` varchar(255) DEFAULT NULL,
  `esta_activa` tinyint(1) DEFAULT '1',
  `ultima_sincronizacion` timestamp NULL DEFAULT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_usuario_proveedor` (`usuario_id`,`proveedor`),
  CONSTRAINT `integraciones_calendario_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `integraciones_calendario`
--

LOCK TABLES `integraciones_calendario` WRITE;
/*!40000 ALTER TABLE `integraciones_calendario` DISABLE KEYS */;
/*!40000 ALTER TABLE `integraciones_calendario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_auditoria`
--

DROP TABLE IF EXISTS `log_auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_auditoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int DEFAULT NULL,
  `accion` varchar(100) NOT NULL,
  `tabla_afectada` varchar(50) DEFAULT NULL,
  `registro_id` int DEFAULT NULL,
  `valores_antiguos` json DEFAULT NULL,
  `valores_nuevos` json DEFAULT NULL,
  `direccion_ip` varchar(45) DEFAULT NULL,
  `agente_usuario` text,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_accion_fecha` (`accion`,`creado_en`),
  KEY `idx_usuario_fecha` (`usuario_id`,`creado_en`),
  KEY `idx_log_auditoria_creado` (`creado_en` DESC),
  CONSTRAINT `log_auditoria_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_auditoria`
--

LOCK TABLES `log_auditoria` WRITE;
/*!40000 ALTER TABLE `log_auditoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_sincronizacion`
--

DROP TABLE IF EXISTS `log_sincronizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_sincronizacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `integracion_id` int NOT NULL,
  `tipo_sincronizacion` varchar(50) NOT NULL,
  `elementos_sincronizados` int DEFAULT '0',
  `estado` enum('EXITO','ERROR','PARCIAL') NOT NULL,
  `mensaje_error` text,
  `sincronizacion_iniciada` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sincronizacion_completada` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `integracion_id` (`integracion_id`),
  KEY `idx_fecha_sincronizacion` (`sincronizacion_iniciada`),
  CONSTRAINT `log_sincronizacion_ibfk_1` FOREIGN KEY (`integracion_id`) REFERENCES `integraciones_calendario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_sincronizacion`
--

LOCK TABLES `log_sincronizacion` WRITE;
/*!40000 ALTER TABLE `log_sincronizacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_sincronizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notificaciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `tipo` enum('INFORMACION','EXITO','ADVERTENCIA','ERROR') DEFAULT 'INFORMACION',
  `titulo` varchar(200) NOT NULL,
  `mensaje` text NOT NULL,
  `url_accion` varchar(255) DEFAULT NULL,
  `solicitud_relacionada_id` int DEFAULT NULL,
  `leida` tinyint(1) DEFAULT '0',
  `leida_en` timestamp NULL DEFAULT NULL,
  `expira_en` timestamp NULL DEFAULT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `solicitud_relacionada_id` (`solicitud_relacionada_id`),
  KEY `idx_usuario_no_leida` (`usuario_id`,`leida`),
  KEY `idx_creado` (`creado_en`),
  KEY `idx_notificaciones_expiracion` (`expira_en`),
  CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`solicitud_relacionada_id`) REFERENCES `solicitudes_permiso` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones`
--

LOCK TABLES `notificaciones` WRITE;
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
INSERT INTO `notificaciones` VALUES (1,1,'EXITO','Solicitud Aprobada','Tu solicitud de vacaciones ha sido aprobada','/solicitudes/1',1,0,NULL,NULL,'2025-10-24 04:27:52'),(2,2,'INFORMACION','Nueva Solicitud Pendiente','Tienes una nueva solicitud pendiente de revisión','/supervisor/pendientes',3,0,NULL,NULL,'2025-10-24 04:27:52'),(3,3,'ADVERTENCIA','Recordatorio de Revisión','Tienes solicitudes pendientes por revisar','/rrhh/pendientes',NULL,1,NULL,NULL,'2025-10-24 04:27:52');
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plantillas_correo`
--

DROP TABLE IF EXISTS `plantillas_correo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plantillas_correo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `clave_plantilla` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `cuerpo_plantilla` text NOT NULL,
  `variables` json NOT NULL,
  `esta_activa` tinyint(1) DEFAULT '1',
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clave_plantilla` (`clave_plantilla`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plantillas_correo`
--

LOCK TABLES `plantillas_correo` WRITE;
/*!40000 ALTER TABLE `plantillas_correo` DISABLE KEYS */;
INSERT INTO `plantillas_correo` VALUES (1,'solicitud_creada','Solicitud Creada','Confirmación de Solicitud de Permiso','Estimado {{nombre}},\n\nHemos recibido tu solicitud de permiso.\n\nTipo: {{tipo_permiso}}\nFecha Inicio: {{fecha_inicio}}\nFecha Fin: {{fecha_fin}}\n\nTe notificaremos cuando sea revisada.\n\nSaludos,\nEquipo ComfaTime','[\"nombre\", \"tipo_permiso\", \"fecha_inicio\", \"fecha_fin\"]',1,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(2,'solicitud_aprobada','Solicitud Aprobada','Tu Solicitud ha sido Aprobada','¡Buenas noticias {{nombre}}!\n\nTu solicitud de {{tipo_permiso}} ha sido aprobada.\n\nPeríodo: {{fecha_inicio}} al {{fecha_fin}}\nAprobado por: {{aprobador}}\n\nQue lo disfrutes,\nEquipo ComfaTime','[\"nombre\", \"tipo_permiso\", \"fecha_inicio\", \"fecha_fin\", \"aprobador\"]',1,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(3,'recordatorio_aprobacion','Recordatorio de Aprobación','Tienes Solicitudes Pendientes','Hola {{aprobador}},\n\nTienes {{cantidad}} solicitudes pendientes de revisión.\n\nPor favor revisa el sistema cuando tengas un momento.\n\nSaludos,\nSistema ComfaTime','[\"aprobador\", \"cantidad\"]',1,'2025-10-24 04:27:52','2025-10-24 04:27:52');
/*!40000 ALTER TABLE `plantillas_correo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `politicas_permiso`
--

DROP TABLE IF EXISTS `politicas_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `politicas_permiso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_politica` varchar(100) NOT NULL,
  `descripcion` text,
  `departamento_id` int DEFAULT NULL,
  `rol_id` int DEFAULT NULL,
  `meses_minimo_empleo` int DEFAULT '0',
  `tipo_permiso_id` int NOT NULL,
  `dias_por_año` decimal(5,2) NOT NULL,
  `tasa_acumulacion` decimal(5,2) DEFAULT '1.00',
  `max_arrastre` decimal(5,2) DEFAULT '0.00',
  `frecuencia_acumulacion` enum('MENSUAL','QUINCENAL','TRIMESTRAL','ANUAL') DEFAULT 'MENSUAL',
  `duracion_minima` int DEFAULT '1',
  `duracion_maxima` int DEFAULT '30',
  `dias_aviso_previo` int DEFAULT '1',
  `periodos_bloqueados` json DEFAULT NULL,
  `esta_activa` tinyint(1) DEFAULT '1',
  `fecha_efectiva` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `departamento_id` (`departamento_id`),
  KEY `rol_id` (`rol_id`),
  KEY `tipo_permiso_id` (`tipo_permiso_id`),
  KEY `idx_fechas_efectivas` (`fecha_efectiva`,`fecha_fin`),
  CONSTRAINT `politicas_permiso_ibfk_1` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`),
  CONSTRAINT `politicas_permiso_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `politicas_permiso_ibfk_3` FOREIGN KEY (`tipo_permiso_id`) REFERENCES `tipos_permiso` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `politicas_permiso`
--

LOCK TABLES `politicas_permiso` WRITE;
/*!40000 ALTER TABLE `politicas_permiso` DISABLE KEYS */;
INSERT INTO `politicas_permiso` VALUES (1,'Vacaciones Estándar','Política de vacaciones para todos los empleados',NULL,NULL,0,1,15.00,1.25,5.00,'MENSUAL',1,15,1,NULL,1,'2024-01-01',NULL,'2025-10-24 04:27:52'),(2,'Licencia por Enfermedad','Política de días por enfermedad',NULL,NULL,0,2,10.00,0.00,0.00,'MENSUAL',1,10,1,NULL,1,'2024-01-01',NULL,'2025-10-24 04:27:52'),(3,'Días Personales','Días para asuntos personales',NULL,NULL,0,3,5.00,0.00,0.00,'MENSUAL',1,3,1,NULL,1,'2024-01-01',NULL,'2025-10-24 04:27:52');
/*!40000 ALTER TABLE `politicas_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text,
  `permisos` json DEFAULT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'EMPLEADO','Empleado regular del sistema','[\"ver_solicitudes_propias\", \"crear_solicitudes\", \"ver_calendario\"]','2025-10-24 04:27:52','2025-10-24 04:27:52'),(2,'SUPERVISOR','Supervisor de equipo','[\"ver_solicitudes_equipo\", \"aprobar_solicitudes\", \"ver_calendario_equipo\"]','2025-10-24 04:27:52','2025-10-24 04:27:52'),(3,'RRHH','Recursos Humanos','[\"ver_todas_solicitudes\", \"gestionar_usuarios\", \"ver_reportes\", \"configurar_politicas\"]','2025-10-24 04:27:52','2025-10-24 04:27:52'),(4,'ADMIN','Administrador del sistema','[\"todos_permisos\"]','2025-10-24 04:27:52','2025-10-24 04:27:52');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes_permiso`
--

DROP TABLE IF EXISTS `solicitudes_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitudes_permiso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `tipo_permiso_id` int NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `es_medio_dia` tinyint(1) DEFAULT '0',
  `total_dias` decimal(4,2) NOT NULL,
  `motivo` text NOT NULL,
  `contacto_emergencia` varchar(100) DEFAULT NULL,
  `telefono_emergencia` varchar(20) DEFAULT NULL,
  `estado` enum('BORRADOR','PENDIENTE','APROBADO','RECHAZADO','CANCELADO') DEFAULT 'BORRADOR',
  `aprobador_actual_id` int DEFAULT NULL,
  `enviado_en` timestamp NULL DEFAULT NULL,
  `aprobado_en` timestamp NULL DEFAULT NULL,
  `rechazado_en` timestamp NULL DEFAULT NULL,
  `cancelado_en` timestamp NULL DEFAULT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tipo_permiso_id` (`tipo_permiso_id`),
  KEY `aprobador_actual_id` (`aprobador_actual_id`),
  KEY `idx_usuario_id` (`usuario_id`),
  KEY `idx_estado` (`estado`),
  KEY `idx_fechas` (`fecha_inicio`,`fecha_fin`),
  KEY `idx_enviado` (`enviado_en`),
  KEY `idx_solicitudes_fechas` (`fecha_inicio`,`fecha_fin`),
  CONSTRAINT `solicitudes_permiso_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `solicitudes_permiso_ibfk_2` FOREIGN KEY (`tipo_permiso_id`) REFERENCES `tipos_permiso` (`id`),
  CONSTRAINT `solicitudes_permiso_ibfk_3` FOREIGN KEY (`aprobador_actual_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes_permiso`
--

LOCK TABLES `solicitudes_permiso` WRITE;
/*!40000 ALTER TABLE `solicitudes_permiso` DISABLE KEYS */;
INSERT INTO `solicitudes_permiso` VALUES (1,1,1,'Vacaciones de verano','2024-07-15','2024-07-25',NULL,NULL,0,10.00,'Viaje familiar a la playa',NULL,NULL,'APROBADO',NULL,'2024-06-01 14:00:00','2024-06-02 19:30:00',NULL,NULL,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(2,1,3,'Permiso médico','2024-08-10','2024-08-10',NULL,NULL,0,1.00,'Consulta médica de rutina',NULL,NULL,'APROBADO',NULL,'2024-08-01 15:15:00','2024-08-01 21:20:00',NULL,NULL,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(3,4,1,'Vacaciones de invierno','2024-12-20','2024-12-31',NULL,NULL,0,9.00,'Celebrar navidad con familia',NULL,NULL,'PENDIENTE',NULL,'2024-11-15 16:30:00',NULL,NULL,NULL,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(4,2,2,'Licencia por enfermedad','2024-09-05','2024-09-07',NULL,NULL,0,3.00,'Gripe estacional',NULL,NULL,'APROBADO',NULL,'2024-09-04 13:45:00','2024-09-04 15:00:00',NULL,NULL,'2025-10-24 04:27:52','2025-10-24 04:27:52');
/*!40000 ALTER TABLE `solicitudes_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_permiso`
--

DROP TABLE IF EXISTS `tipos_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_permiso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `color` varchar(7) DEFAULT '#6B7280',
  `requiere_aprobacion` tinyint(1) DEFAULT '1',
  `descuenta_del_balance` tinyint(1) DEFAULT '1',
  `max_dias_consecutivos` int DEFAULT '30',
  `dias_aviso_previo` int DEFAULT '1',
  `esta_activo` tinyint(1) DEFAULT '1',
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_permiso`
--

LOCK TABLES `tipos_permiso` WRITE;
/*!40000 ALTER TABLE `tipos_permiso` DISABLE KEYS */;
INSERT INTO `tipos_permiso` VALUES (1,'VACACIONES','Vacaciones','Días de vacaciones pagadas','#10B981',1,1,30,1,1,'2025-10-24 04:27:52'),(2,'ENFERMEDAD','Enfermedad','Licencia por enfermedad','#EF4444',0,1,30,1,1,'2025-10-24 04:27:52'),(3,'PERSONAL','Días personales','Días para asuntos personales','#8B5CF6',1,1,30,1,1,'2025-10-24 04:27:52'),(4,'PERMISO','Permiso','Permiso por horas','#F59E0B',1,0,30,1,1,'2025-10-24 04:27:52'),(5,'MATERNIDAD','Licencia maternidad','Licencia por maternidad','#EC4899',1,0,30,1,1,'2025-10-24 04:27:52'),(6,'PATERNIDAD','Licencia paternidad','Licencia por paternidad','#06B6D4',1,0,30,1,1,'2025-10-24 04:27:52');
/*!40000 ALTER TABLE `tipos_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transacciones_permiso`
--

DROP TABLE IF EXISTS `transacciones_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transacciones_permiso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `tipo_permiso_id` int NOT NULL,
  `solicitud_permiso_id` int DEFAULT NULL,
  `tipo_transaccion` enum('ACUMULACION','USO','AJUSTE','ARRASRE','PERDIDA') NOT NULL,
  `monto` decimal(5,2) NOT NULL,
  `balance_despues` decimal(5,2) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `fecha_transaccion` date NOT NULL,
  `procesado_por` int DEFAULT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tipo_permiso_id` (`tipo_permiso_id`),
  KEY `procesado_por` (`procesado_por`),
  KEY `idx_usuario_fecha` (`usuario_id`,`fecha_transaccion`),
  KEY `idx_solicitud_permiso` (`solicitud_permiso_id`),
  CONSTRAINT `transacciones_permiso_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `transacciones_permiso_ibfk_2` FOREIGN KEY (`tipo_permiso_id`) REFERENCES `tipos_permiso` (`id`),
  CONSTRAINT `transacciones_permiso_ibfk_3` FOREIGN KEY (`solicitud_permiso_id`) REFERENCES `solicitudes_permiso` (`id`),
  CONSTRAINT `transacciones_permiso_ibfk_4` FOREIGN KEY (`procesado_por`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacciones_permiso`
--

LOCK TABLES `transacciones_permiso` WRITE;
/*!40000 ALTER TABLE `transacciones_permiso` DISABLE KEYS */;
INSERT INTO `transacciones_permiso` VALUES (1,1,1,1,'USO',-10.00,5.00,'Uso de vacaciones por viaje familiar',NULL,'2024-07-15',NULL,'2025-10-24 04:27:52'),(2,1,3,2,'USO',-1.00,4.00,'Permiso para consulta médica',NULL,'2024-08-10',NULL,'2025-10-24 04:27:52'),(3,2,2,4,'USO',-3.00,7.00,'Licencia por enfermedad',NULL,'2024-09-05',NULL,'2025-10-24 04:27:52'),(4,1,1,NULL,'ACUMULACION',1.25,5.25,'Acumulación mensual de vacaciones',NULL,'2024-06-01',NULL,'2025-10-24 04:27:52');
/*!40000 ALTER TABLE `transacciones_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo_empleado` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `imagen_perfil` varchar(255) DEFAULT NULL,
  `rol_id` int NOT NULL,
  `departamento_id` int NOT NULL,
  `supervisor_id` int DEFAULT NULL,
  `aprobador_reserva_id` int DEFAULT NULL,
  `dias_vacaciones_disponibles` int DEFAULT '15',
  `dias_enfermedad_disponibles` int DEFAULT '10',
  `dias_personales_disponibles` int DEFAULT '5',
  `fecha_contratacion` date NOT NULL,
  `esta_activo` tinyint(1) DEFAULT '1',
  `ultimo_acceso` timestamp NULL DEFAULT NULL,
  `email_verificado` tinyint(1) DEFAULT '0',
  `token_reset` varchar(100) DEFAULT NULL,
  `token_reset_expiracion` timestamp NULL DEFAULT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_empleado` (`codigo_empleado`),
  UNIQUE KEY `email` (`email`),
  KEY `rol_id` (`rol_id`),
  KEY `aprobador_reserva_id` (`aprobador_reserva_id`),
  KEY `idx_email` (`email`),
  KEY `idx_departamento` (`departamento_id`),
  KEY `idx_supervisor` (`supervisor_id`),
  KEY `idx_codigo_empleado` (`codigo_empleado`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`),
  CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`supervisor_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `usuarios_ibfk_4` FOREIGN KEY (`aprobador_reserva_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'EMP001','ana.garcia@comfatime.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Ana','García','+52-55-1234-5678',NULL,1,1,2,NULL,12,10,5,'2020-03-15',1,NULL,0,NULL,NULL,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(2,'EMP002','carlos.rodriguez@comfatime.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Carlos','Rodríguez','+52-55-2345-6789',NULL,2,1,3,NULL,18,10,5,'2019-06-10',1,NULL,0,NULL,NULL,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(3,'EMP003','maria.lopez@comfatime.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','María','López','+52-55-3456-7890',NULL,3,2,NULL,NULL,22,10,5,'2018-01-20',1,NULL,0,NULL,NULL,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(4,'EMP004','javier.martinez@comfatime.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Javier','Martínez','+52-55-4567-8901',NULL,1,3,5,NULL,8,10,5,'2021-11-05',1,NULL,0,NULL,NULL,'2025-10-24 04:27:52','2025-10-24 04:27:52'),(5,'EMP005','laura.hernandez@comfatime.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Laura','Hernández','+52-55-5678-9012',NULL,2,3,3,NULL,15,10,5,'2020-08-12',1,NULL,0,NULL,NULL,'2025-10-24 04:27:52','2025-10-24 04:27:52');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vista_calendario_equipo`
--

DROP TABLE IF EXISTS `vista_calendario_equipo`;
/*!50001 DROP VIEW IF EXISTS `vista_calendario_equipo`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calendario_equipo` AS SELECT 
 1 AS `id`,
 1 AS `titulo`,
 1 AS `fecha_inicio`,
 1 AS `fecha_fin`,
 1 AS `estado`,
 1 AS `nombre`,
 1 AS `apellido`,
 1 AS `departamento_id`,
 1 AS `color`,
 1 AS `tipo_permiso`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_dashboard_empleado`
--

DROP TABLE IF EXISTS `vista_dashboard_empleado`;
/*!50001 DROP VIEW IF EXISTS `vista_dashboard_empleado`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_dashboard_empleado` AS SELECT 
 1 AS `id`,
 1 AS `nombre`,
 1 AS `apellido`,
 1 AS `email`,
 1 AS `dias_vacaciones_disponibles`,
 1 AS `dias_enfermedad_disponibles`,
 1 AS `dias_personales_disponibles`,
 1 AS `departamento`,
 1 AS `rol`,
 1 AS `solicitudes_pendientes`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vista_calendario_equipo`
--

/*!50001 DROP VIEW IF EXISTS `vista_calendario_equipo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calendario_equipo` AS select `sp`.`id` AS `id`,`sp`.`titulo` AS `titulo`,`sp`.`fecha_inicio` AS `fecha_inicio`,`sp`.`fecha_fin` AS `fecha_fin`,`sp`.`estado` AS `estado`,`u`.`nombre` AS `nombre`,`u`.`apellido` AS `apellido`,`u`.`departamento_id` AS `departamento_id`,`tp`.`color` AS `color`,`tp`.`nombre` AS `tipo_permiso` from ((`solicitudes_permiso` `sp` join `usuarios` `u` on((`sp`.`usuario_id` = `u`.`id`))) join `tipos_permiso` `tp` on((`sp`.`tipo_permiso_id` = `tp`.`id`))) where (`sp`.`estado` = 'APROBADO') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_dashboard_empleado`
--

/*!50001 DROP VIEW IF EXISTS `vista_dashboard_empleado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_dashboard_empleado` AS select `u`.`id` AS `id`,`u`.`nombre` AS `nombre`,`u`.`apellido` AS `apellido`,`u`.`email` AS `email`,`u`.`dias_vacaciones_disponibles` AS `dias_vacaciones_disponibles`,`u`.`dias_enfermedad_disponibles` AS `dias_enfermedad_disponibles`,`u`.`dias_personales_disponibles` AS `dias_personales_disponibles`,`d`.`nombre` AS `departamento`,`r`.`nombre` AS `rol`,count(`sp`.`id`) AS `solicitudes_pendientes` from (((`usuarios` `u` left join `departamentos` `d` on((`u`.`departamento_id` = `d`.`id`))) left join `roles` `r` on((`u`.`rol_id` = `r`.`id`))) left join `solicitudes_permiso` `sp` on(((`u`.`id` = `sp`.`usuario_id`) and (`sp`.`estado` = 'PENDIENTE')))) where (`u`.`esta_activo` = true) group by `u`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-23 23:30:34
