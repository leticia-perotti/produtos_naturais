-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd_natural
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_natural
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_natural` DEFAULT CHARACTER SET latin1 ;
USE `bd_natural` ;

-- -----------------------------------------------------
-- Table `bd_natural`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_natural`.`cliente` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `telefone` VARCHAR(13) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `uf` VARCHAR(45) NOT NULL,
  `datanascimento` DATE NULL ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_natural`.`atendimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_natural`.`atendimento` (
  `idatendimento` INT(11) NOT NULL AUTO_INCREMENT,
  `cliente_idclientes` INT(11) NULL DEFAULT NULL,
  `data_carrinho` INT(11) NOT NULL,
  PRIMARY KEY (`idatendimento`),
  INDEX `fk_atendimento_cliente_idx` (`cliente_idclientes` ASC),
  CONSTRAINT `fk_atendimento_cliente`
    FOREIGN KEY (`cliente_idclientes`)
    REFERENCES `bd_natural`.`cliente` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_natural`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_natural`.`produto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` TEXT NOT NULL,
  `peso` DECIMAL(8,3) NULL DEFAULT NULL,
  `valor` DECIMAL(8,2) NOT NULL,
  `quantidade` INT(11) NULL DEFAULT NULL,
  `valor_compra` DECIMAL(8,2) NOT NULL,
  `margem` DECIMAL(8,2) NOT NULL,
  `ativo` TINYINT(1) NULL DEFAULT NULL,
  `tipo_venda` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_natural`.`atendimento_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_natural`.`atendimento_produto` (
  `idatendimento_produto` INT(11) NOT NULL AUTO_INCREMENT,
  `quantidade` INT(11) NOT NULL,
  `atendimento_idatendimento` INT(11) NOT NULL,
  `produto_idproduto` INT(11) NOT NULL,
  `valorproduto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idatendimento_produto`),
  INDEX `fk_atendimento_produto_atendimento1_idx` (`atendimento_idatendimento` ASC) ,
  INDEX `fk_atendimento_produto_produto1_idx` (`produto_idproduto` ASC) ,
  CONSTRAINT `fk_atendimento_produto_atendimento1`
    FOREIGN KEY (`atendimento_idatendimento`)
    REFERENCES `bd_natural`.`atendimento` (`idatendimento`),
  CONSTRAINT `fk_atendimento_produto_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `bd_natural`.`produto` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_natural`.`categoria _produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_natural`.`categoria _produto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_natural`.`categoria _produto_has_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_natural`.`categoria _produto_has_produto` (
  `categoria _produto_id` INT(11) NOT NULL,
  `produto_idproduto` INT(11) NOT NULL,
  PRIMARY KEY (`categoria _produto_id`, `produto_idproduto`),
  INDEX `fk_categoria _produto_has_produto_produto1_idx` (`produto_idproduto` ASC) ,
  INDEX `fk_categoria _produto_has_produto_categoria _produto1_idx` (`categoria _produto_id` ASC) ,
  CONSTRAINT `fk_categoria _produto_has_produto_categoria _produto1`
    FOREIGN KEY (`categoria _produto_id`)
    REFERENCES `bd_natural`.`categoria _produto` (`id`),
  CONSTRAINT `fk_categoria _produto_has_produto_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `bd_natural`.`produto` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_natural`.`fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_natural`.`fornecedor` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cnpj` INT(11) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `transportadora` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_natural`.`compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_natural`.`compra` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `fornecedor` VARCHAR(45) NOT NULL,
  `nota` VARCHAR(45) NOT NULL,
  `fornecedor_idfornecedor` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_compras_fornecedor1_idx` (`fornecedor_idfornecedor` ASC) ,
  CONSTRAINT `fk_compras_fornecedor1`
    FOREIGN KEY (`fornecedor_idfornecedor`)
    REFERENCES `bd_natural`.`fornecedor` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_natural`.`compra_has_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_natural`.`compra_has_produto` (
  `compra_idcompras` INT(11) NOT NULL,
  `produto_idproduto` INT(11) NOT NULL,
  `preco` DECIMAL(8,2) NOT NULL,
  PRIMARY KEY (`compra_idcompras`, `produto_idproduto`),
  INDEX `fk_compra_has_produto_produto1_idx` (`produto_idproduto` ASC) ,
  INDEX `fk_compra_has_produto_compra1_idx` (`compra_idcompras` ASC) ,
  CONSTRAINT `fk_compra_has_produto_compra1`
    FOREIGN KEY (`compra_idcompras`)
    REFERENCES `bd_natural`.`compra` (`id`),
  CONSTRAINT `fk_compra_has_produto_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `bd_natural`.`produto` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_natural`.`faturamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_natural`.`faturamento` (
  `idagenda` INT(11) NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `valor_total` INT(11) NOT NULL,
  PRIMARY KEY (`idagenda`),
  UNIQUE INDEX `data_UNIQUE` (`data` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_natural`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_natural`.`status` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_natural`.`vendedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_natural`.`vendedores` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
