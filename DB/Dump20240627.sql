-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ventaboletos
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `asientos_reservados`
--

DROP TABLE IF EXISTS `asientos_reservados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asientos_reservados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_horario` int NOT NULL,
  `num_asiento` int NOT NULL,
  `estado` enum('libre','ocupado') DEFAULT 'libre',
  PRIMARY KEY (`id`),
  UNIQUE KEY `num_asiento_UNIQUE` (`num_asiento`),
  KEY `fk_horario` (`fk_horario`),
  CONSTRAINT `asientos_reservados_ibfk_1` FOREIGN KEY (`fk_horario`) REFERENCES `horarios` (`id_horario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asientos_reservados`
--

LOCK TABLES `asientos_reservados` WRITE;
/*!40000 ALTER TABLE `asientos_reservados` DISABLE KEYS */;
INSERT INTO `asientos_reservados` VALUES (1,1,1,'ocupado'),(2,1,2,'ocupado'),(3,1,3,'ocupado'),(4,1,4,'ocupado'),(5,1,5,'ocupado');
/*!40000 ALTER TABLE `asientos_reservados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boletos`
--

DROP TABLE IF EXISTS `boletos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `boletos` (
  `id_boleto` int NOT NULL AUTO_INCREMENT,
  `fk_pasajero` int DEFAULT NULL,
  `fk_horario` int DEFAULT NULL,
  `num_asiento` int DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha_compra` date NOT NULL,
  PRIMARY KEY (`id_boleto`),
  KEY `fk_boletos_pasajeros1_idx` (`fk_pasajero`),
  KEY `horario_boleto_idx` (`fk_horario`),
  CONSTRAINT `fk_boletos_pasajeros1` FOREIGN KEY (`fk_pasajero`) REFERENCES `pasajeros` (`id_pasajero`),
  CONSTRAINT `horario_boleto` FOREIGN KEY (`fk_horario`) REFERENCES `horarios` (`id_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boletos`
--

LOCK TABLES `boletos` WRITE;
/*!40000 ALTER TABLE `boletos` DISABLE KEYS */;
/*!40000 ALTER TABLE `boletos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buses`
--

DROP TABLE IF EXISTS `buses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buses` (
  `id_bus` int NOT NULL AUTO_INCREMENT,
  `placa` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `capacidad` int NOT NULL,
  PRIMARY KEY (`id_bus`),
  UNIQUE KEY `placa_UNIQUE` (`placa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buses`
--

LOCK TABLES `buses` WRITE;
/*!40000 ALTER TABLE `buses` DISABLE KEYS */;
INSERT INTO `buses` VALUES (1,'XYZ-1234','Volvo 2020',50),(2,'ABC-5678','Mercedes 2019',45);
/*!40000 ALTER TABLE `buses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ciudades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `region` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` VALUES (1,'Lima','Lima'),(2,'Arequipa','Arequipa'),(3,'Trujillo','La Libertad'),(4,'Chiclayo','Lambayeque'),(5,'Piura','Piura'),(6,'Iquitos','Loreto'),(7,'Cusco','Cusco'),(8,'Huancayo','Junín'),(9,'Tacna','Tacna'),(10,'Ica','Ica'),(11,'Pucallpa','Ucayali'),(12,'Juliaca','Puno'),(13,'Ayacucho','Ayacucho'),(14,'Chimbote','Áncash'),(15,'Tarapoto','San Martín');
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conductores`
--

DROP TABLE IF EXISTS `conductores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conductores` (
  `id_conductor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `licencia` varchar(50) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_conductor`),
  UNIQUE KEY `licencia_UNIQUE` (`licencia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conductores`
--

LOCK TABLES `conductores` WRITE;
/*!40000 ALTER TABLE `conductores` DISABLE KEYS */;
INSERT INTO `conductores` VALUES (1,'Carlos García','LIC-1234','555-8765'),(2,'Luis Martínez','LIC-67890','555-4321');
/*!40000 ALTER TABLE `conductores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horarios` (
  `id_horario` int NOT NULL AUTO_INCREMENT,
  `fk_ruta` int DEFAULT NULL,
  `fk_bus` int DEFAULT NULL,
  `fk_conductor` int DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time DEFAULT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `bus_horario_idx` (`fk_bus`),
  KEY `conductor_horario_idx` (`fk_conductor`),
  KEY `horaio_ruta_idx` (`fk_ruta`),
  CONSTRAINT `bus_horario` FOREIGN KEY (`fk_bus`) REFERENCES `buses` (`id_bus`),
  CONSTRAINT `conductor_horario` FOREIGN KEY (`fk_conductor`) REFERENCES `conductores` (`id_conductor`),
  CONSTRAINT `horaio_ruta` FOREIGN KEY (`fk_ruta`) REFERENCES `rutas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (1,2,1,1,'2024-06-14','02:30:00','06:30:00'),(2,2,2,2,'2024-06-14','04:00:00','08:00:00');
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasajeros`
--

DROP TABLE IF EXISTS `pasajeros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pasajeros` (
  `id_pasajero` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `dni` char(8) DEFAULT NULL,
  PRIMARY KEY (`id_pasajero`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasajeros`
--

LOCK TABLES `pasajeros` WRITE;
/*!40000 ALTER TABLE `pasajeros` DISABLE KEYS */;
INSERT INTO `pasajeros` VALUES (1,'Alejandro Gonzales','AGonzalez@info.com','34679823',NULL),(2,'Lei Fan','LFan@gmail.com','37456982',NULL),(3,'Franz Kafka','fkafka@info.com','987546384','98746321'),(4,'Simo Bolivar','sbolivar@company.com','976345876','74965173');
/*!40000 ALTER TABLE `pasajeros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal` (
  `id_personal` int NOT NULL AUTO_INCREMENT,
  `dni` varchar(8) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id_personal`),
  UNIQUE KEY `dni_UNIQUE` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'72467086','admin1','Pablo');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rutas`
--

DROP TABLE IF EXISTS `rutas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rutas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ciudad_origen` int NOT NULL,
  `ciudad_destino` int NOT NULL,
  `duracion` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ciudad_origen` (`ciudad_origen`),
  KEY `ciudad_destino` (`ciudad_destino`),
  CONSTRAINT `rutas_ibfk_1` FOREIGN KEY (`ciudad_origen`) REFERENCES `ciudades` (`id`),
  CONSTRAINT `rutas_ibfk_2` FOREIGN KEY (`ciudad_destino`) REFERENCES `ciudades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rutas`
--

LOCK TABLES `rutas` WRITE;
/*!40000 ALTER TABLE `rutas` DISABLE KEYS */;
INSERT INTO `rutas` VALUES (1,2,9,'04:00:00'),(2,9,2,'04:00:00'),(3,7,1,'03:30:00');
/*!40000 ALTER TABLE `rutas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-27  0:17:29
