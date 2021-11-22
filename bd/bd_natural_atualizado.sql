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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento`
--

LOCK TABLES `atendimento` WRITE;
/*!40000 ALTER TABLE `atendimento` DISABLE KEYS */;
INSERT INTO `atendimento` VALUES (22,16,'2021-11-22',2),(23,17,'2021-11-22',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento_produto`
--

LOCK TABLES `atendimento_produto` WRITE;
/*!40000 ALTER TABLE `atendimento_produto` DISABLE KEYS */;
INSERT INTO `atendimento_produto` VALUES (61,3,22,42,'2.00'),(62,1,22,39,'1.00'),(63,1,22,46,'13.00'),(64,1,23,37,'3.80'),(65,1,23,40,'6.80');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_produto`
--

LOCK TABLES `categoria_produto` WRITE;
/*!40000 ALTER TABLE `categoria_produto` DISABLE KEYS */;
INSERT INTO `categoria_produto` VALUES (2,'produtos-naturais'),(3,'chas'),(4,'confeitaria'),(5,'embalagens'),(6,'chocolates');
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
INSERT INTO `categoria_produto_has_produto` VALUES (3,36),(6,37),(4,38),(5,39),(2,40),(2,41),(2,42),(2,43),(2,46);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (15,'Maria FÃ¡tima','(42) 9865-29987','mariafatima@gmail.com','786.906.300-23','UniÃ£o da VitÃ³ria','PR','2000-02-05','Maria'),(16,'ClÃ¡udio Emanuel','(42) 9988-56232','claudio@gmail.com','112.395.510-70','Porto UniÃ£o','SC','1998-10-09','Claudio'),(17,'Sara','(42) 5986-2322','sara@gmail.com','042.596.740-99','UniÃ£o da VitÃ³ria','PR','1980-09-08','Sara');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (6,'2021-11-22','985256254620',3),(7,'2021-11-22','95821852187',4);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_has_produto`
--

LOCK TABLES `compra_has_produto` WRITE;
/*!40000 ALTER TABLE `compra_has_produto` DISABLE KEYS */;
INSERT INTO `compra_has_produto` VALUES (6,40,12,4.50),(6,43,13,2.10),(7,38,14,9.50);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controla_retirada`
--

LOCK TABLES `controla_retirada` WRITE;
/*!40000 ALTER TABLE `controla_retirada` DISABLE KEYS */;
INSERT INTO `controla_retirada` VALUES (3,'17:55:00',NULL,'ClÃ¡udio','dinheiro',22,'','2021-11-22'),(4,'18:30:00','16:39:37','Cezar','dinheiro',23,'Ã‰ um motoboy da empresa \"Motoboy SA\"','2021-11-22');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (3,'46.735.570/0001-20','Ceral Mais','Rua GetÃºlio Vargas, 254','Transporte SA'),(4,'21.832.953/0001-96','La confeitaria','Avenida 7 de setembro, 85','Trans rÃ¡pido'),(5,'63.824.958/0001-17','ImpÃ©rio das embalagens','Rua 15 de novembro, 985','Fretes e transportes EIRELI');
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
  `ativo` tinyint(1) DEFAULT '1',
  `tipo_venda` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (36,'ChÃ¡ de morango','Sabor morango - Mate leÃ£o',100.000,5.00,100,3.50,1.50,1,'untaria'),(37,'Cacau em pÃ³','A cada 100g',5.000,3.80,5,3.00,0.80,1,'agranel'),(38,'Fuet','unidade',1000.000,15.00,1000,10.00,5.00,1,'unitÃ¡ria'),(39,'P32 alta','unidade',300.000,1.00,300,0.50,0.50,1,'unitÃ¡ria'),(40,'Castanha do ParÃ¡','A cada 100g',200.000,6.80,200,3.00,3.80,1,'agranel'),(41,'Quinoa em flocos','A cada 100g',2000.000,3.00,2000,1.50,1.50,1,'agranel'),(42,'Uva passa preta','A cada 100g',300.000,2.00,300,1.00,1.00,1,'agranel'),(43,'Frutas cristalizadas','A cada 100g',2000.000,1.50,2000,0.08,0.75,1,'agranel'),(46,'Granola','unidade',200.000,13.00,200,9.00,4.00,1,'unitÃ¡ria');
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto_foto`
--

LOCK TABLES `produto_foto` WRITE;
/*!40000 ALTER TABLE `produto_foto` DISABLE KEYS */;
INSERT INTO `produto_foto` VALUES (20,36,'produto-619be9e63d0a8.jpg'),(21,37,'produto-619bea6325e20.jpg'),(22,38,'produto-619bead26b105.jpg'),(23,39,'produto-619beb2ecebe3.jpg'),(24,40,'produto-619beb9119fc7.jpg'),(25,41,'produto-619bebfa56c83.jpg'),(26,42,'produto-619bec7e8be5d.jpg'),(27,43,'produto-619bed08527ed.jpg'),(28,46,'produto-619bedf6adf57.jpg');
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
INSERT INTO `vendedores` VALUES (3,'user@user','40bd001563085fc35165329ea1ff5c5ecbdbbeef','User'),(4,'admin@admin','d033e22ae348aeb5660fc2140aec35850c4da997','Admin');
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

-- Dump completed on 2021-11-22 16:43:52
