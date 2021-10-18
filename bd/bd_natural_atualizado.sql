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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento`
--

LOCK TABLES `atendimento` WRITE;
/*!40000 ALTER TABLE `atendimento` DISABLE KEYS */;
INSERT INTO `atendimento` VALUES (3,1,'2021-09-27',2),(4,1,'2021-09-29',3),(5,NULL,'2021-09-29',1),(6,NULL,'2021-09-29',1),(7,1,'2021-09-30',2),(8,1,'2021-09-30',2),(9,1,'2021-10-04',2),(10,NULL,'2021-10-04',1),(11,11,'2021-10-18',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento_produto`
--

LOCK TABLES `atendimento_produto` WRITE;
/*!40000 ALTER TABLE `atendimento_produto` DISABLE KEYS */;
INSERT INTO `atendimento_produto` VALUES (13,952,3,1,'1.00'),(14,18,3,3,'1.00'),(16,19,4,2,'1.00'),(17,1,4,3,'1.00'),(22,1,5,1,'1.00'),(23,4,5,2,'1.00'),(24,1,5,3,'1.00'),(25,1,6,1,'1.00'),(26,1,6,2,'1.00'),(27,9,7,3,'1.00'),(30,19,8,2,'1.00'),(31,1,9,1,'1.00'),(35,4,10,2,'1.00'),(37,1,10,3,'1.00'),(40,4,10,1,'1.00'),(41,20,11,5,'1.00'),(43,8,11,4,'1.00');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_produto`
--

LOCK TABLES `categoria_produto` WRITE;
/*!40000 ALTER TABLE `categoria_produto` DISABLE KEYS */;
INSERT INTO `categoria_produto` VALUES (1,'produtos-naturais'),(2,'frutas'),(3,'chocolate');
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
INSERT INTO `categoria_produto_has_produto` VALUES (1,1),(3,16);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'leticia','19999999','leticia@gmail','111.111.111-11','UniaÃ£o da VitÃ³ria','PR','2004-06-25'),(4,'1','1','1@1','111.111.111-11','1','1','0001-01-01'),(6,'aaa','a','a@a','222.222.222-22','UniaÃ£o da VitÃ³ria','PR','0204-06-25'),(8,'r','r','r@s','111.111.111-11','s','s','5200-08-05'),(10,'sss','(33) 3333-33333','leticia@eu','119.891.789-01','uv','MT','0555-05-08'),(11,'Adelmo','(42) 9999-99999','adelmo@gmail','047.885.470-66','dd','outro','0033-03-31');
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
  `fornecedor` varchar(45) NOT NULL,
  `nota` varchar(45) NOT NULL,
  `fornecedor_idfornecedor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compras_fornecedor1_idx` (`fornecedor_idfornecedor`),
  CONSTRAINT `fk_compras_fornecedor1` FOREIGN KEY (`fornecedor_idfornecedor`) REFERENCES `fornecedor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
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
  `preco` decimal(8,2) NOT NULL,
  PRIMARY KEY (`compra_idcompras`,`produto_idproduto`),
  KEY `fk_compra_has_produto_produto1_idx` (`produto_idproduto`),
  KEY `fk_compra_has_produto_compra1_idx` (`compra_idcompras`),
  CONSTRAINT `fk_compra_has_produto_compra1` FOREIGN KEY (`compra_idcompras`) REFERENCES `compra` (`id`),
  CONSTRAINT `fk_compra_has_produto_produto1` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_has_produto`
--

LOCK TABLES `compra_has_produto` WRITE;
/*!40000 ALTER TABLE `compra_has_produto` DISABLE KEYS */;
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
  PRIMARY KEY (`id`),
  KEY `atendimento_idx` (`atendimento_id`),
  CONSTRAINT `atendimento` FOREIGN KEY (`atendimento_id`) REFERENCES `atendimento` (`idatendimento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controla_retirada`
--

LOCK TABLES `controla_retirada` WRITE;
/*!40000 ALTER TABLE `controla_retirada` DISABLE KEYS */;
INSERT INTO `controla_retirada` VALUES (1,'22:22:00',NULL,'acs','dinheiro',3,'ccsa'),(2,'22:22:00',NULL,'acs','dinheiro',3,'ccsa'),(3,'08:08:00',NULL,'acs','dinheiro',3,'ccsa'),(4,'22:02:00',NULL,'acs','dinheiro',3,'ccsa'),(5,'22:02:00',NULL,'acs','dinheiro',3,'ccsa'),(6,'22:02:00',NULL,'acs','dinheiro',3,'ccsa'),(7,'23:33:00',NULL,'acs','dinheiro',3,'ccsa'),(8,'11:01:00',NULL,'gsed','cartao_credito',4,'hjg'),(9,'09:30:00',NULL,'Caio','cartao_debito',7,'O caio Ã© rico'),(10,'22:02:00',NULL,'hjsdv','dinheiro',8,'edddx'),(11,'22:02:00',NULL,'2222','cartao_credito',9,'');
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
  `cnpj` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `transportadora` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
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
  `nome` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `peso` decimal(8,3) DEFAULT NULL,
  `valor` decimal(8,2) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor_compra` decimal(8,2) NOT NULL,
  `margem` decimal(8,2) NOT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `tipo_venda` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'a','a',1.000,1.50,1,1.00,1.00,1,'1'),(2,'b','b',1.000,1.00,1,1.00,1.00,1,'1'),(3,'c','c',1.000,1.00,1,1.00,1.00,1,'1'),(4,'d','d',1.000,1.00,1,1.00,1.00,1,'1'),(5,'e','e',1.000,1.00,1,1.00,1.00,1,'1'),(6,'f','f',1.000,1.00,1,1.00,1.00,1,'1'),(7,'g','g',1.000,1.00,1,1.00,1.00,1,'1'),(8,'h','h',1.000,1.00,1,1.00,1.00,1,'1'),(9,'i','i',1.000,1.00,1,1.00,1.00,1,'1'),(10,'j','j',1.000,1.00,1,1.00,1.00,1,'1'),(11,'k','k',1.000,1.00,1,1.00,1.00,1,'1'),(16,'frutas','oituosd',-2.000,-1.00,-1,-1.00,-1.00,NULL,'a granel');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto_foto`
--

LOCK TABLES `produto_foto` WRITE;
/*!40000 ALTER TABLE `produto_foto` DISABLE KEYS */;
INSERT INTO `produto_foto` VALUES (1,16,'produto-616dca5cddbb2.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendedores`
--

LOCK TABLES `vendedores` WRITE;
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
INSERT INTO `vendedores` VALUES (1,'leiticia','e205888b17f2f470c1ef12d55acef94e5b52289d','leticia');
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

-- Dump completed on 2021-10-18 16:40:52
