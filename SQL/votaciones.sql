-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: votaciones
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `candidatos`
--

DROP TABLE IF EXISTS `candidatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candidatos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidatos`
--

LOCK TABLES `candidatos` WRITE;
/*!40000 ALTER TABLE `candidatos` DISABLE KEYS */;
INSERT INTO `candidatos` VALUES (1,'Candidato 1'),(2,'Candidato 2');
/*!40000 ALTER TABLE `candidatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comunas`
--

DROP TABLE IF EXISTS `comunas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comunas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `region_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `region_id` (`region_id`),
  CONSTRAINT `comunas_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regiones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=358 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comunas`
--

LOCK TABLES `comunas` WRITE;
/*!40000 ALTER TABLE `comunas` DISABLE KEYS */;
INSERT INTO `comunas` VALUES (1,'Santiago',1),(2,'Providencia',1),(3,'Viña del Mar',2),(4,'Valparaíso',2),(9,'Arica',3),(10,'Camarones',3),(11,'Putre',3),(12,'General Lagos',3),(13,'Iquique',4),(14,'Alto Hospicio',4),(15,'Pozo Almonte',4),(16,'Camiña',4),(17,'Colchane',4),(18,'Huara',4),(19,'Pica',4),(20,'Antofagasta',5),(21,'Mejillones',5),(22,'Sierra Gorda',5),(23,'Taltal',5),(24,'Calama',5),(25,'Ollagüe',5),(26,'San Pedro de Atacama',5),(27,'Tocopilla',5),(28,'María Elena',5),(29,'Alto del Carmen',6),(30,'Caldera',6),(31,'Chañaral',6),(32,'Copiapó',6),(33,'Diego de Almagro',6),(34,'Freirina',6),(35,'Huasco',6),(36,'Tierra Amarilla',6),(37,'Vallenar',6),(38,'Andacollo',7),(39,'Canela',7),(40,'Combarbalá',7),(41,'Coquimbo',7),(42,'Illapel',7),(43,'La Higuera',7),(44,'La Serena',7),(45,'Los Vilos',7),(46,'Monte Patria',7),(47,'Ovalle',7),(48,'Paiguano',7),(49,'Punitaqui',7),(50,'Río Hurtado',7),(51,'Salamanca',7),(52,'Vicuña',7),(53,'Chimbarongo',8),(54,'Chépica',8),(55,'Codegua',8),(56,'Coinco',8),(57,'Coltauco',8),(58,'Doñihue',8),(59,'Graneros',8),(60,'La Estrella',8),(61,'Las Cabras',8),(62,'Litueche',8),(63,'Lolol',8),(64,'Machalí',8),(65,'Malloa',8),(66,'Marchihue',8),(67,'Nancagua',8),(68,'Navidad',8),(69,'Olivar',8),(70,'Palmilla',8),(71,'Paredones',8),(72,'Peralillo',8),(73,'Peumo',8),(74,'Pichidegua',8),(75,'Pichilemu',8),(76,'Placilla',8),(77,'Pumanque',8),(78,'Quinta de Tilcoco',8),(79,'Rancagua',8),(80,'Rengo',8),(81,'Requínoa',8),(82,'San Fernando',8),(83,'San Francisco de Mostazal',8),(84,'San Vicente de Tagua Tagua',8),(85,'Santa Cruz',8),(86,'Cauquenes',9),(87,'Chanco',9),(88,'Colbún',9),(89,'Constitución',9),(90,'Curepto',9),(91,'Curicó',9),(92,'Empedrado',9),(93,'Hualañé',9),(94,'Licantén',9),(95,'Linares',9),(96,'Longaví',9),(97,'Maule',9),(98,'Molina',9),(99,'Parral',9),(100,'Pelarco',9),(101,'Pelluhue',9),(102,'Pencahue',9),(103,'Rauco',9),(104,'Retiro',9),(105,'Río Claro',9),(106,'Romeral',9),(107,'Sagrada Familia',9),(108,'San Clemente',9),(109,'San Javier',9),(110,'San Rafael',9),(111,'Talca',9),(112,'Teno',9),(113,'Vichuquén',9),(114,'Villa Alegre',9),(115,'Yerbas Buenas',9),(116,'Bulnes',10),(117,'Chillán',10),(118,'Chillán Viejo',10),(119,'Cobquecura',10),(120,'Coelemu',10),(121,'Coihueco',10),(122,'El Carmen',10),(123,'Ninhue',10),(124,'Ñiquén',10),(125,'Pemuco',10),(126,'Pinto',10),(127,'Portezuelo',10),(128,'Quillón',10),(129,'Quirihue',10),(130,'Ránquil',10),(131,'San Carlos',10),(132,'San Fabián',10),(133,'San Ignacio',10),(134,'San Nicolás',10),(135,'Treguaco',10),(136,'Yungay',10),(137,'Alto Biobío',11),(138,'Antuco',11),(139,'Arauco',11),(140,'Bulnes',11),(141,'Cañete',11),(142,'Cabrero',11),(143,'Chiguayante',11),(144,'Chillán',11),(145,'Chillán Viejo',11),(146,'Cobquecura',11),(147,'Coelemu',11),(148,'Coihueco',11),(149,'Concepción',11),(150,'Contulmo',11),(151,'Coronel',11),(152,'Curanilahue',11),(153,'Florida',11),(154,'Hualpén',11),(155,'Hualqui',11),(156,'Laja',11),(157,'Lebu',11),(158,'Los Álamos',11),(159,'Los Ángeles',11),(160,'Lota',11),(161,'Mulchén',11),(162,'Nacimiento',11),(163,'Negrete',11),(164,'Ninhue',11),(165,'Ñiquén',11),(166,'Pemuco',11),(167,'Penco',11),(168,'Pinto',11),(169,'Portezuelo',11),(170,'Quilaco',11),(171,'Quilleco',11),(172,'Quillón',11),(173,'Quirihue',11),(174,'Ránquil',11),(175,'San Carlos',11),(176,'San Fabián',11),(177,'San Ignacio',11),(178,'San Nicolás',11),(179,'San Pedro de la Paz',11),(180,'Santa Bárbara',11),(181,'Santa Juana',11),(182,'Talcahuano',11),(183,'Tirúa',11),(184,'Tomé',11),(185,'Treguaco',11),(186,'Tucapel',11),(187,'Yumbel',11),(188,'Yungay',11),(189,'Angol',12),(190,'Carahue',12),(191,'Cholchol',12),(192,'Collipulli',12),(193,'Cunco',12),(194,'Curacautín',12),(195,'Curarrehue',12),(196,'Ercilla',12),(197,'Freire',12),(198,'Galvarino',12),(199,'Gorbea',12),(200,'Lautaro',12),(201,'Loncoche',12),(202,'Lonquimay',12),(203,'Los Sauces',12),(204,'Lumaco',12),(205,'Melipeuco',12),(206,'Nueva Imperial',12),(207,'Padre las Casas',12),(208,'Perquenco',12),(209,'Pitrufquén',12),(210,'Pucón',12),(211,'Purén',12),(212,'Renaico',12),(213,'Saavedra',12),(214,'Temuco',12),(215,'Teodoro Schmidt',12),(216,'Toltén',12),(217,'Traiguén',12),(218,'Victoria',12),(219,'Vilcún',12),(220,'Villarrica',12),(221,'Corral',13),(222,'Futrono',13),(223,'La Unión',13),(224,'Lago Ranco',13),(225,'Lanco',13),(226,'Los Lagos',13),(227,'Máfil',13),(228,'Mariquina',13),(229,'Paillaco',13),(230,'Panguipulli',13),(231,'Río Bueno',13),(232,'Valdivia',13),(233,'Ancud',14),(234,'Calbuco',14),(235,'Castro',14),(236,'Chaitén',14),(237,'Chonchi',14),(238,'Cochamó',14),(239,'Curaco de Vélez',14),(240,'Dalcahue',14),(241,'Fresia',14),(242,'Frutillar',14),(243,'Futaleufú',14),(244,'Hualaihué',14),(245,'Llanquihue',14),(246,'Los Muermos',14),(247,'Maullín',14),(248,'Osorno',14),(249,'Palena',14),(250,'Puerto Montt',14),(251,'Puerto Octay',14),(252,'Puerto Varas',14),(253,'Puqueldón',14),(254,'Purranque',14),(255,'Puyehue',14),(256,'Queilén',14),(257,'Quellón',14),(258,'Quemchi',14),(259,'Quinchao',14),(260,'Río Negro',14),(261,'San Juan de la Costa',14),(262,'San Pablo',14),(263,'Aysén',15),(264,'Chile Chico',15),(265,'Cisnes',15),(266,'Cochrane',15),(267,'Coihaique',15),(268,'Guaitecas',15),(269,'Lago Verde',15),(270,'O’Higgins',15),(271,'Río Ibáñez',15),(272,'Tortel',15),(273,'Antártica',16),(274,'Cabo de Hornos',16),(275,'Laguna Blanca',16),(276,'Natales',16),(277,'Porvenir',16),(278,'Primavera',16),(279,'Punta Arenas',16),(280,'Río Verde',16),(281,'San Gregorio',16),(282,'Timaukel',16),(283,'Torres del Paine',16),(284,'Cerrillos',1),(285,'Cerro Navia',1),(286,'Conchalí',1),(287,'El Bosque',1),(288,'Estación Central',1),(289,'Huechuraba',1),(290,'Independencia',1),(291,'La Cisterna',1),(292,'La Florida',1),(293,'La Granja',1),(294,'La Pintana',1),(295,'La Reina',1),(296,'Las Condes',1),(297,'Lo Barnechea',1),(298,'Lo Espejo',1),(299,'Lo Prado',1),(300,'Macul',1),(301,'Maipú',1),(302,'Ñuñoa',1),(303,'Padre Hurtado',1),(304,'Pedro Aguirre Cerda',1),(305,'Peñalolén',1),(306,'Pirque',1),(307,'Pudahuel',1),(308,'Puente Alto',1),(309,'Quilicura',1),(310,'Quinta Normal',1),(311,'Recoleta',1),(312,'Renca',1),(313,'San Bernardo',1),(314,'San Joaquín',1),(315,'San José de Maipo',1),(316,'San Miguel',1),(317,'San Ramón',1),(318,'Santiago',1),(319,'Vitacura',1),(320,'Algarrobo',2),(321,'Cabildo',2),(322,'Calera',2),(323,'Calle Larga',2),(324,'Cartagena',2),(325,'Casablanca',2),(326,'Catemu',2),(327,'Concón',2),(328,'El Quisco',2),(329,'El Tabo',2),(330,'Hijuelas',2),(331,'Isla de Pascua',2),(332,'Juan Fernández',2),(333,'La Cruz',2),(334,'La Ligua',2),(335,'Limache',2),(336,'Llaillay',2),(337,'Los Andes',2),(338,'Nogales',2),(339,'Olmué',2),(340,'Panquehue',2),(341,'Papudo',2),(342,'Petorca',2),(343,'Puchuncaví',2),(344,'Putaendo',2),(345,'Quillota',2),(346,'Quilpué',2),(347,'Quintero',2),(348,'Rinconada',2),(349,'San Antonio',2),(350,'San Esteban',2),(351,'San Felipe',2),(352,'Santa María',2),(353,'Santo Domingo',2),(354,'Valparaíso',2),(355,'Villa Alemana',2),(356,'Viña del Mar',2),(357,'Zapallar',2);
/*!40000 ALTER TABLE `comunas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regiones`
--

DROP TABLE IF EXISTS `regiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regiones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regiones`
--

LOCK TABLES `regiones` WRITE;
/*!40000 ALTER TABLE `regiones` DISABLE KEYS */;
INSERT INTO `regiones` VALUES (1,'Región Metropolitana'),(2,'Región de Valparaíso'),(3,'Región de Arica y Parinacota'),(4,'Región de Tarapacá'),(5,'Región de Antofagasta'),(6,'Región de Atacama'),(7,'Región de Coquimbo'),(8,'Región del Libertador General Bernardo O’Higgins'),(9,'Región del Maule'),(10,'Región de Ñuble'),(11,'Región del Biobío'),(12,'Región de La Araucanía'),(13,'Región de Los Ríos'),(14,'Región de Los Lagos'),(15,'Región de Aysén del General Carlos Ibáñez del Campo'),(16,'Región de Magallanes y de la Antártica Chilena');
/*!40000 ALTER TABLE `regiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votos`
--

DROP TABLE IF EXISTS `votos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `votos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `rut` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `region_id` int DEFAULT NULL,
  `comuna_id` int DEFAULT NULL,
  `candidato_id` int DEFAULT NULL,
  `enterado` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rut` (`rut`),
  KEY `region_id` (`region_id`),
  KEY `comuna_id` (`comuna_id`),
  KEY `candidato_id` (`candidato_id`),
  CONSTRAINT `votos_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regiones` (`id`),
  CONSTRAINT `votos_ibfk_2` FOREIGN KEY (`comuna_id`) REFERENCES `comunas` (`id`),
  CONSTRAINT `votos_ibfk_3` FOREIGN KEY (`candidato_id`) REFERENCES `candidatos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votos`
--

LOCK TABLES `votos` WRITE;
/*!40000 ALTER TABLE `votos` DISABLE KEYS */;
INSERT INTO `votos` VALUES (1,'Simón Zúñiga','Mopaxo1','20.390.967-5','simonzunigahidalgo@gmail.com',1,1,1,'[\"internet\", \"amigo\"]'),(3,'Simón Zúñiga','ElOtro3','8.562.251-K','simonzunigahidalgo@gmail.com',1,2,1,'[\"internet\", \"amigo\"]'),(4,'Dorr Alamos Maria Josefina Del Corazon De Maria','Alamos2','9.100.000-8','alamos@gmail.com',1,2,2,'[\"internet\", \"amigo\"]'),(5,'Pazita Hermosita','Hermosa2','20.469.940-2','pazarancibia00@gmail.com',1,2,1,'[\"internet\", \"amigo\"]'),(6,'Francisco Mella','Pancho2543','9.178.033-K','simon@prueba.cl',1,1,2,'[\"internet\", \"amigo\", \"tv\"]');
/*!40000 ALTER TABLE `votos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-29 11:16:02
