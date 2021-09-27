-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_natural
-- ------------------------------------------------------
-- Server version	5.7.30-log

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
-- Table structure for table `atendimento`
--

DROP TABLE IF EXISTS `atendimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atendimento` (
  `idatendimento` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_idclientes` int(11) DEFAULT NULL,
  `data_carrinho` date NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`idatendimento`),
  KEY `fk_atendimento_cliente_idx` (`cliente_idclientes`),
  KEY `fk_atendimento_status_idx` (`status`),
  CONSTRAINT `fk_atendimento_cliente` FOREIGN KEY (`cliente_idclientes`) REFERENCES `cliente` (`id`),
  CONSTRAINT `fk_atendimento_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento`
--

LOCK TABLES `atendimento` WRITE;
/*!40000 ALTER TABLE `atendimento` DISABLE KEYS */;
INSERT INTO `atendimento` VALUES (1,NULL,'2021-08-23',NULL),(2,1,'2021-08-25',3),(3,8,'2021-08-25',3),(4,9,'2021-09-25',NULL);
/*!40000 ALTER TABLE `atendimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atendimento_produto`
--

DROP TABLE IF EXISTS `atendimento_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atendimento_produto` (
  `idatendimento_produto` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `atendimento_idatendimento` int(11) NOT NULL,
  `produto_idproduto` int(11) NOT NULL,
  `valorproduto` decimal(8,2) NOT NULL,
  PRIMARY KEY (`idatendimento_produto`),
  KEY `fk_atendimento_produto_atendimento1_idx` (`atendimento_idatendimento`),
  KEY `fk_atendimento_produto_produto1_idx` (`produto_idproduto`),
  CONSTRAINT `fk_atendimento_produto_atendimento1` FOREIGN KEY (`atendimento_idatendimento`) REFERENCES `atendimento` (`idatendimento`),
  CONSTRAINT `fk_atendimento_produto_produto1` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento_produto`
--

LOCK TABLES `atendimento_produto` WRITE;
/*!40000 ALTER TABLE `atendimento_produto` DISABLE KEYS */;
INSERT INTO `atendimento_produto` VALUES (55,15,3,5,1.00),(58,6,3,9,1.00),(59,5,4,7,1.00);
/*!40000 ALTER TABLE `atendimento_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria _produto`
--

DROP TABLE IF EXISTS `categoria _produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria _produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria _produto`
--

LOCK TABLES `categoria _produto` WRITE;
/*!40000 ALTER TABLE `categoria _produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria _produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria _produto_has_produto`
--

DROP TABLE IF EXISTS `categoria _produto_has_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria _produto_has_produto` (
  `categoria _produto_id` int(11) NOT NULL,
  `produto_idproduto` int(11) NOT NULL,
  PRIMARY KEY (`categoria _produto_id`,`produto_idproduto`),
  KEY `fk_categoria _produto_has_produto_produto1_idx` (`produto_idproduto`),
  KEY `fk_categoria _produto_has_produto_categoria _produto1_idx` (`categoria _produto_id`),
  CONSTRAINT `fk_categoria _produto_has_produto_categoria _produto1` FOREIGN KEY (`categoria _produto_id`) REFERENCES `categoria _produto` (`id`),
  CONSTRAINT `fk_categoria _produto_has_produto_produto1` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria _produto_has_produto`
--

LOCK TABLES `categoria _produto_has_produto` WRITE;
/*!40000 ALTER TABLE `categoria _produto_has_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria _produto_has_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` varchar(45) NOT NULL,
  `datanascimento` date DEFAULT '0000-00-00',
  `clientecol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'e','9','a@a','111.111.111-11','UniÃ£o da VitÃ³ria','d','0002-02-22',NULL),(2,'a','1','a@a','111.111.111-11','UniÃ£o da VitÃ³ria','d','0011-11-01',NULL),(3,'a','1','a@a','111.111.111-11','UniÃ£o da VitÃ³ria','d','0011-11-01',NULL),(4,'a','a','a@a','111.111.111-11','UniÃ£o da VitÃ³ria','d','0001-11-11',NULL),(5,'Edenir eliane senn perotti','42988628620','a@a','111.111.111-11','UniÃ£o da VitÃ³ria','d','2200-02-04',NULL),(6,'Edenir eliane senn perotti','42988628620','a@a','111.111.111-11','UniÃ£o da VitÃ³ria','d','2200-02-04',NULL),(7,'Edenir eliane senn perotti','42988628620','a@a','111.111.111-11','UniÃ£o da VitÃ³ria','d','0022-02-22',NULL),(8,'Leticia','12312312','leticia@gmail','222.222.222-22','UniÃ£o da VitÃ³ria','q','0011-11-11',NULL),(9,'Fernando Luiz Perotti','(42) 9886-28620','leticiadanieleperotti@gmail.com','119.891.789-01','UniÃ£o da VitÃ³ria','d','0525-05-04',NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `controla_retirada` (
  `id` int(11) NOT NULL,
  `hora_prevista` date DEFAULT NULL,
  `hora_retirada` date DEFAULT NULL,
  `quem_retira` varchar(45) DEFAULT NULL,
  `meio_pagamento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controla_retirada`
--

LOCK TABLES `controla_retirada` WRITE;
/*!40000 ALTER TABLE `controla_retirada` DISABLE KEYS */;
/*!40000 ALTER TABLE `controla_retirada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faturamento`
--

DROP TABLE IF EXISTS `faturamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (5,'a','1',1.000,1.00,1,1.00,1.00,1,'1'),(6,'b','1',1.000,1.00,1,1.00,11.00,1,'1'),(7,'c','1',1.000,1.00,1,1.00,1.00,1,'1'),(8,'d','1',1.000,1.00,1,1.00,1.00,1,'1'),(9,'e','1',11.000,1.00,1,1.00,1.00,1,'1'),(10,'f','1',1.000,1.00,1,1.00,1.00,1,'1');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
INSERT INTO `status` VALUES (1,'Em andamento'),(2,'Pendente'),(3,'Retirado');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendedores`
--

LOCK TABLES `vendedores` WRITE;
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bd_natural'
--

--
-- Dumping routines for database 'bd_natural'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-25 12:26:51
