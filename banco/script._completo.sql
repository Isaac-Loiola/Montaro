-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema tdszuphpdb01
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tdszuphpdb01
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tdszuphpdb01` ;
USE `tdszuphpdb01` ;

-- -----------------------------------------------------
-- Table `tdszuphpdb01`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tdszuphpdb01`.`clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `email` VARCHAR(90) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 0;


-- -----------------------------------------------------
-- Table `tdszuphpdb01`.`horarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tdszuphpdb01`.`horarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `horario` TIME NOT NULL,
  `disponivel` BIT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 0;


-- -----------------------------------------------------
-- Table `tdszuphpdb01`.`mesas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tdszuphpdb01`.`mesas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `numero` CHAR(3) NOT NULL,
  `capacidade` INT(11) NOT NULL,
  `disponivel` BIT(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tdszuphpdb01`.`negativas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tdszuphpdb01`.`negativas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_reserva` INT(11) NOT NULL,
  `motivo_negativa` VARCHAR(60) NOT NULL,
  `data_registro` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tdszuphpdb01`.`niveis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tdszuphpdb01`.`niveis` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sigla` CHAR(3) NOT NULL,
  `nome` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tdszuphpdb01`.`tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tdszuphpdb01`.`tipos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sigla` VARCHAR(3) NOT NULL,
  `rotulo` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 0;


-- -----------------------------------------------------
-- Table `tdszuphpdb01`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tdszuphpdb01`.`produtos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo_id` INT(11) NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  `resumo` VARCHAR(1000) NULL DEFAULT NULL,
  `valor` DECIMAL(9,2) NULL DEFAULT NULL,
  `imagem` VARCHAR(50) NULL DEFAULT NULL,
  `destaque` BIT(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  INDEX `tipo_id_fk` (`tipo_id` ASC) VISIBLE,
  CONSTRAINT `tipo_id_fk`
    FOREIGN KEY (`tipo_id`)
    REFERENCES `tdszuphpdb01`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 0;


-- -----------------------------------------------------
-- Table `tdszuphpdb01`.`reservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tdszuphpdb01`.`reservas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(11) NOT NULL,
  `data_reserva` DATE NOT NULL,
  `id_horario` INT(11) NOT NULL,
  `data_criacao` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  INDEX `id_cliente` (`id_cliente` ASC) VISIBLE,
  INDEX `id_horario` (`id_horario` ASC) VISIBLE,
  CONSTRAINT `reservas_ibfk_1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `tdszuphpdb01`.`clientes` (`id`),
  CONSTRAINT `reservas_ibfk_2`
    FOREIGN KEY (`id_horario`)
    REFERENCES `tdszuphpdb01`.`horarios` (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tdszuphpdb01`.`reserva_mesa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tdszuphpdb01`.`reserva_mesa` (
  `id_mesa` INT(11) NOT NULL,
  `id_reserva` INT(11) NOT NULL,
  INDEX `id_mesa` (`id_mesa` ASC) VISIBLE,
  INDEX `id_reserva` (`id_reserva` ASC) VISIBLE,
  CONSTRAINT `reserva_mesa_ibfk_1`
    FOREIGN KEY (`id_mesa`)
    REFERENCES `tdszuphpdb01`.`mesas` (`id`),
  CONSTRAINT `reserva_mesa_ibfk_2`
    FOREIGN KEY (`id_reserva`)
    REFERENCES `tdszuphpdb01`.`reservas` (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tdszuphpdb01`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tdszuphpdb01`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(30) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `nivel` CHAR(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_uniq` (`login` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 5;

USE `tdszuphpdb01` ;

-- -----------------------------------------------------
-- Placeholder table for view `tdszuphpdb01`.`vw_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tdszuphpdb01`.`vw_produtos` (`id` INT, `tipo_id` INT, `sigla` INT, `rotulo` INT, `descricao` INT, `resumo` INT, `valor` INT, `imagem` INT, `destaque` INT);

-- -----------------------------------------------------
-- View `tdszuphpdb01`.`vw_produtos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tdszuphpdb01`.`vw_produtos`;
USE `tdszuphpdb01`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `tdszuphpdb01`.`vw_produtos` AS select `p`.`id` AS `id`,`p`.`tipo_id` AS `tipo_id`,`t`.`sigla` AS `sigla`,`t`.`rotulo` AS `rotulo`,`p`.`descricao` AS `descricao`,`p`.`resumo` AS `resumo`,`p`.`valor` AS `valor`,`p`.`imagem` AS `imagem`,`p`.`destaque` AS `destaque` from (`tdszuphpdb01`.`produtos` `p` join `tdszuphpdb01`.`tipos` `t`) where `p`.`tipo_id` = `t`.`id`;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
