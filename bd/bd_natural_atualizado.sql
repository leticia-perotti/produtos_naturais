-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_natural
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `atendimento`
--

DROP TABLE IF EXISTS `atendimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atendimento` (
  `idatendimento` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_idclientes` int(11) DEFAULT NULL,
  `data_carrinho` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idatendimento`),
  KEY `fk_atendimento_cliente_idx` (`cliente_idclientes`),
  CONSTRAINT `fk_atendimento_cliente` FOREIGN KEY (`cliente_idclientes`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento`
--

LOCK TABLES `atendimento` WRITE;
/*!40000 ALTER TABLE `atendimento` DISABLE KEYS */;
INSERT INTO `atendimento` VALUES (12,12,'2021-10-26',1),(13,NULL,'2021-10-26',1),(14,NULL,'2021-10-26',1),(15,12,'2021-11-09',3),(16,13,'2021-11-16',2),(17,NULL,'2021-11-16',1);
/*!40000 ALTER TABLE `atendimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atendimento_produto`
--

DROP TABLE IF EXISTS `atendimento_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atendimento_produto` (
  `idatendimento_produto` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `atendimento_idatendimento` int(11) NOT NULL,
  `produto_idproduto` int(11) NOT NULL,
  `valorproduto` varchar(45) NOT NULL,
  PRIMARY KEY (`idatendimento_produto`),
  KEY `fk_atendimento_produto_atendimento1_idx` (`atendimento_idatendimento`),
  KEY `fk_atendimento_produto_produto1_idx` (`produto_idproduto`),
  CONSTRAINT `fk_atendimento_produto_atendimento1` FOREIGN KEY (`atendimento_idatendimento`) REFERENCES `atendimento` (`idatendimento`),
  CONSTRAINT `fk_atendimento_produto_produto1` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento_produto`
--

LOCK TABLES `atendimento_produto` WRITE;
/*!40000 ALTER TABLE `atendimento_produto` DISABLE KEYS */;
INSERT INTO `atendimento_produto` VALUES (45,1,12,19,'1.00'),(46,15,12,18,'1.00'),(47,8,13,24,'1.00'),(48,7,14,25,'1.00'),(49,1,14,23,'1.00'),(50,2,15,25,'1.00'),(52,5,16,17,'1.00'),(54,1,17,18,'1.00'),(55,1,17,23,'1.00');
/*!40000 ALTER TABLE `atendimento_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_produto`
--

DROP TABLE IF EXISTS `categoria_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_produto`
--

LOCK TABLES `categoria_produto` WRITE;
/*!40000 ALTER TABLE `categoria_produto` DISABLE KEYS */;
INSERT INTO `categoria_produto` VALUES (1,'Oleoginosas');
/*!40000 ALTER TABLE `categoria_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_produto_has_produto`
--

DROP TABLE IF EXISTS `categoria_produto_has_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_produto_has_produto` (
  `categoria_produto_id` int(11) NOT NULL,
  `produto_idproduto` int(11) NOT NULL,
  PRIMARY KEY (`categoria_produto_id`,`produto_idproduto`),
  KEY `fk_categoria _produto_has_produto_produto1_idx` (`produto_idproduto`),
  KEY `fk_categoria _produto_has_produto_categoria _produto1_idx` (`categoria_produto_id`),
  CONSTRAINT `fk_categoria _produto_has_produto_categoria _produto1` FOREIGN KEY (`categoria_produto_id`) REFERENCES `categoria_produto` (`id`),
  CONSTRAINT `fk_categoria _produto_has_produto_produto1` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_produto_has_produto`
--

LOCK TABLES `categoria_produto_has_produto` WRITE;
/*!40000 ALTER TABLE `categoria_produto_has_produto` DISABLE KEYS */;
INSERT INTO `categoria_produto_has_produto` VALUES (1,27),(1,28),(1,29),(1,30),(1,31),(1,32),(1,33),(1,34),(1,35);
/*!40000 ALTER TABLE `categoria_produto_has_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` varchar(5) NOT NULL,
  `datanascimento` date DEFAULT NULL,
  `apelido_cliente` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (12,'Cliente','(33) 3333-33333','iiii@iiii','119.891.789-01','dwad','PR','2000-02-22','aaa'),(13,'Adelmo','(52) 8514-24721','adelmo@gmail','381.896.440-84','Uniao','PR','1900-11-11','adelmo'),(14,'novo','(58) 5555-55555','novo@ey','100.977.720-38','eee','SC','9999-04-04','novo');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `nota` varchar(45) NOT NULL,
  `fornecedor_idfornecedor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compras_fornecedor1_idx` (`fornecedor_idfornecedor`),
  CONSTRAINT `fk_compras_fornecedor1` FOREIGN KEY (`fornecedor_idfornecedor`) REFERENCES `fornecedor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (1,'2021-11-16','1050505205',1),(2,'2021-11-16','1141',1);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra_has_produto`
--

DROP TABLE IF EXISTS `compra_has_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compra_has_produto` (
  `compra_idcompras` int(11) NOT NULL,
  `produto_idproduto` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preco` decimal(8,2) NOT NULL,
  PRIMARY KEY (`compra_idcompras`,`produto_idproduto`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_compra_has_produto_produto1_idx` (`produto_idproduto`),
  KEY `fk_compra_has_produto_compra1_idx` (`compra_idcompras`),
  CONSTRAINT `fk_compra_has_produto_compra1` FOREIGN KEY (`compra_idcompras`) REFERENCES `compra` (`id`),
  CONSTRAINT `fk_compra_has_produto_produto1` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_has_produto`
--

LOCK TABLES `compra_has_produto` WRITE;
/*!40000 ALTER TABLE `compra_has_produto` DISABLE KEYS */;
INSERT INTO `compra_has_produto` VALUES (1,17,1,5555.00),(1,18,4,1.00),(1,19,3,150.00),(2,21,5,1.02),(2,27,9,15.00),(2,28,10,15.00);
/*!40000 ALTER TABLE `compra_has_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controla_retirada`
--

DROP TABLE IF EXISTS `controla_retirada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `controla_retirada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora_prevista` time NOT NULL,
  `hora_retirada` time DEFAULT NULL,
  `quem_retira` varchar(45) DEFAULT NULL,
  `meio_pagamento` varchar(45) NOT NULL,
  `atendimento_id` int(11) NOT NULL,
  `observacao` text,
  `dia_retirada` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `atendimento_idx` (`atendimento_id`),
  CONSTRAINT `atendimento` FOREIGN KEY (`atendimento_id`) REFERENCES `atendimento` (`idatendimento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controla_retirada`
--

LOCK TABLES `controla_retirada` WRITE;
/*!40000 ALTER TABLE `controla_retirada` DISABLE KEYS */;
INSERT INTO `controla_retirada` VALUES (1,'17:08:00','14:33:04','fff','dinheiro',15,'','2021-11-09'),(2,'15:59:00',NULL,'eu mesmo','cartao_credito',16,'','2021-11-16');
/*!40000 ALTER TABLE `controla_retirada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faturamento`
--

DROP TABLE IF EXISTS `faturamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faturamento` (
  `idagenda` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `valor_total` int(11) NOT NULL,
  PRIMARY KEY (`idagenda`),
  UNIQUE KEY `data_UNIQUE` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faturamento`
--

LOCK TABLES `faturamento` WRITE;
/*!40000 ALTER TABLE `faturamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `faturamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(20) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `transportadora` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'20.469.088/0001-00','fornecedor','endereÃ§o','transportadora');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET latin1 NOT NULL,
  `descricao` text CHARACTER SET latin1 NOT NULL,
  `peso` decimal(8,3) DEFAULT NULL,
  `valor` decimal(8,2) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor_compra` decimal(8,2) NOT NULL,
  `margem` decimal(8,2) NOT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `tipo_venda` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (17,'castanah do para castanah do para','castanah do para',1.000,1.00,1,1.00,1.00,1,'1'),(18,'b','aaa',1.000,1.00,1,1.00,1.00,1,'1'),(19,'c','aaa',1.000,1.00,1,1.00,1.00,1,'1'),(20,'a','q',1.000,1.00,1,1.00,1.00,1,'1'),(21,'a','q',1.000,1.00,1,1.00,1.00,1,'1'),(22,'a','q',1.000,1.00,1,1.00,1.00,1,'1'),(23,'a','q',1.000,1.00,1,1.00,1.00,1,'1'),(24,'a','q',1.000,1.00,1,1.00,1.00,1,'1'),(25,'a','q',1.000,1.00,1,1.00,1.00,1,'1'),(26,'a','q',1.000,1.00,1,1.00,1.00,1,'1'),(27,'Castanha do ParÃ¡','a cada 100 g',2.022,2.02,NULL,2.02,2.02,2,'a granel'),(28,'Oleoginosas','a cada 100 g',6.000,6.00,0,6.00,6.00,NULL,'a granel'),(29,'1','1',1.000,1.00,NULL,1.00,1.00,NULL,'1'),(30,'2','2',2.000,2.00,NULL,2.00,2.00,NULL,'2'),(31,'3','3',3.000,3.00,NULL,3.00,3.00,NULL,'3'),(32,'4','4',4.000,4.00,0,4.00,4.00,NULL,'4'),(33,'5','5',5.000,5.00,0,5.00,5.00,NULL,'5'),(34,'6','6',6.000,6.00,NULL,6.00,6.00,NULL,'6'),(35,'7','7',7.000,7.00,0,7.00,7.00,NULL,'7');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto_foto`
--

DROP TABLE IF EXISTS `produto_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto_foto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) NOT NULL DEFAULT '0',
  `nome_foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__produto` (`produto_id`),
  CONSTRAINT `FK__produto` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto_foto`
--

LOCK TABLES `produto_foto` WRITE;
/*!40000 ALTER TABLE `produto_foto` DISABLE KEYS */;
INSERT INTO `produto_foto` VALUES (1,22,'produto-616dca5cddbb2.jpg'),(3,27,'produto-6193e4d926b8b.jpg'),(5,29,'produto-61940102bb11b.jpg'),(6,30,'produto-61940143df593.jpg'),(7,31,'produto-61940386052f6.jpg'),(8,32,'produto-619403d35216f.jpg'),(12,33,'produto-619406fd47e2b.jpg'),(13,34,'produto-619407ed6cc05.jpg'),(15,35,'produto-619408db16dce.jpg'),(16,28,'produto-61940918d9716.jpg');
/*!40000 ALTER TABLE `produto_foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Em andamento'),(2,'Finalizado'),(3,'Retirado');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendedores`
--

LOCK TABLES `vendedores` WRITE;
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
INSERT INTO `vendedores` VALUES (2,'leiticia@leticia','e205888b17f2f470c1ef12d55acef94e5b52289d','leticia'),(3,'user@user','40bd001563085fc35165329ea1ff5c5ecbdbbeef','User'),(4,'admin@admin','d033e22ae348aeb5660fc2140aec35850c4da997','Admin');
/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-16 16:41:12
