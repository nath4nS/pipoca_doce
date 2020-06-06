-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: pipoca_doce
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comentarios` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diretor`
--

DROP TABLE IF EXISTS `diretor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `diretor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diretor`
--

LOCK TABLES `diretor` WRITE;
/*!40000 ALTER TABLE `diretor` DISABLE KEYS */;
INSERT INTO `diretor` VALUES (1,'Anthony Russo'),(2,'Joe Russo'),(8,'Jeff Fowler'),(9,'Bilall Fallah'),(11,'Josh Boone'),(13,'Niki Caro');
/*!40000 ALTER TABLE `diretor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filme`
--

DROP TABLE IF EXISTS `filme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `genero` int NOT NULL,
  `duracao` varchar(20) NOT NULL,
  `dataLancamento` varchar(50) NOT NULL,
  `sinopse` text NOT NULL,
  `elenco` varchar(200) NOT NULL,
  `diretor` int NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_genero_idx` (`genero`),
  KEY `fk_diretor_idx` (`diretor`),
  CONSTRAINT `fk_diretor` FOREIGN KEY (`diretor`) REFERENCES `diretor` (`id`),
  CONSTRAINT `fk_genero` FOREIGN KEY (`genero`) REFERENCES `genero` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filme`
--

LOCK TABLES `filme` WRITE;
/*!40000 ALTER TABLE `filme` DISABLE KEYS */;
INSERT INTO `filme` VALUES (1,'Vingadores: Ultimato',2,'3h 2m','25 de abril de 2019','Após Thanos eliminar metade das criaturas vivas, os Vingadores têm de lidar com a perda de amigos e entes queridos. Com Tony Stark vagando perdido no espaço sem água e comida, Steve Rogers e Natasha Romanov lideram a resistência contra o titã louco.','Robert Downey Jr., Chris Evans, Mark Ruffalo',1,'vigadores-20200604000639.jpg'),(2,'Rambo: Programado para Matar',1,'1h 33m','6 de novembro de 1982','Um veterano da Guerra do Vietnã usa todo seu treinamento e agressividade exercitada nos campos de batalha quando é preso e torturado por policiais. ','Sylvester Stallone, Richard Crenna, Brian Dennehy',2,'20527154-20200603000631.jpg'),(4,'Sonic: O Filme',5,'1h 40m','13 de fevereiro de 2020','Sonic, o porco-espinho azul mais famoso do mundo, se junta com os seus amigos para derrotar o terrível Doutor Eggman, um cientista louco que planeja dominar o mundo, e o Doutor Robotnik, responsável por aprisionar animais inocentes em robôs.','James Marsden, Ben Schwartz, Tika Sumpter, Jim Carrey',8,'0121118-20200605210647.jpg'),(5,'Os Novos Mutantes',23,'1h 39m','3 de abril de 2020','The New Mutants é um filme americano de super-herói e terror a ser lançado em 2020 baseado na equipe de super-heróis homônima criada por Chris Claremont e Bob McLeod para a Marvel Comics, produzido pela 20th Century Studios e distribuído pela Walt Disney Studios Motion Pictures.','Anya Taylor-Joy, Maisie Williams, Charlie Heaton, Henry Zaga Blu',11,'4847130-20200606010611.jpg'),(6,'Bad Boys para Sempre',1,'2h 4m','30 de janeiro de 2020 ','Os policiais Mike Lowery e Marcus Burnett se juntam para derrubar o líder de um cartel de drogas em Miami. A recém-criada equipe de elite do departamento de polícia de Miami, ao lado de Mike e Marcus, enfrenta o implacável Armando Armas.','Will Smith, Martin Lawrence, Vanessa Hudgens',9,'bbps_640x940-data-20200606010612.jpg'),(7,'Mulan',3,'2 h','9 de março de 2020','Em Mulan, Hua Mulan (Liu Yifei) é a espirituosa e determinada filha mais velha de um honrado guerreiro. Quando o Imperador da China emite um decreto que um homem de cada família deve servir no exército imperial, Mulan decide tomar o lugar de seu pai, que está doente. Assumindo a identidade de Hua Jun, ela se disfarça de homem para combater os invasores que estão atacando sua nação, provando-se uma grande guerreira.','Yifei Liu, Donnie Yen, Jason Scott Lee',13,'0409486-20200606010614.jpg');
/*!40000 ALTER TABLE `filme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genero` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Ação'),(2,'Animação'),(3,'Aventura'),(4,'Cinema de arte'),(5,'Comédia'),(6,'Comédia romântica'),(7,'Comédia dramática'),(8,'Comédia de ação'),(9,'Dança'),(10,'Documentário'),(11,'Docuficção'),(12,'Drama'),(13,'Espionagem'),(14,'Faroeste'),(15,'Fantasia científica'),(16,'Ficção científica'),(17,'Filmes de guerra'),(18,'Musical'),(19,'Filme policial'),(20,'Romance'),(21,'Seriado'),(22,'Suspense'),(23,'Terror'),(24,'Pornográfico'),(28,'Teste'),(29,'gfdgdf');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `dataNascimento` varchar(20) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Nathan Sousa','08/06/2020','nathan@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','Administrador','Alpaca-Steam-Avatars-20200606010645.jpg'),(2,'Paulo ','24/06/2020','paulo@paulo','81dc9bdb52d04dc20036dbd8313ed055','Administrador','steam-avatar-profile-picture-1445-20200606000614.jpg'),(9,'Teste','29/06/2020','nathans@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','Administrador','84ef834f04e1b6c38ff6a50f25cf539a--edm-quotes-electronic-music-20200605230659.jpg'),(12,'sfsdf','15/06/2003','nathans@gmail.com','c6dd60a67f164c8a38cf909467b7415a','3213123','');
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

-- Dump completed on 2020-06-05 22:46:59
