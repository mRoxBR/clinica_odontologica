-- MySQL Script generated by MySQL Workbench
-- Sat Nov 17 17:08:58 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema clinica_odontologica
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `clinica_odontologica` ;

-- -----------------------------------------------------
-- Schema clinica_odontologica
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `clinica_odontologica` DEFAULT CHARACTER SET utf8 ;
USE `clinica_odontologica` ;

-- -----------------------------------------------------
-- Table `clinica_odontologica`.`funcionario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`funcionario` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`funcionario` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(90) NOT NULL,
  `nascimento` DATE NOT NULL,
  `cpf` CHAR(11) NULL,
  `salario` FLOAT UNSIGNED NOT NULL,
  `cargo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinica_odontologica`.`dentista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`dentista` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`dentista` (
  `funcionario_id` INT UNSIGNED NOT NULL,
  `cro` CHAR(5) NOT NULL,
  PRIMARY KEY (`funcionario_id`),
  UNIQUE INDEX `cro_UNIQUE` (`cro` ASC),
  INDEX `fk_dentista_funcionario1_idx` (`funcionario_id` ASC),
  CONSTRAINT `fk_dentista_funcionario1`
    FOREIGN KEY (`funcionario_id`)
    REFERENCES `clinica_odontologica`.`funcionario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `clinica_odontologica`.`auxiliar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`auxiliar` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`auxiliar` (
  `funcionario_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`funcionario_id`),
  INDEX `fk_auxiliar_funcionario1_idx` (`funcionario_id` ASC),
  CONSTRAINT `fk_auxiliar_funcionario1`
    FOREIGN KEY (`funcionario_id`)
    REFERENCES `clinica_odontologica`.`funcionario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinica_odontologica`.`auxiliar_auxilia_dentista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`auxiliar_auxilia_dentista` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`auxiliar_auxilia_dentista` (
  `dentista_id` INT UNSIGNED NOT NULL,
  `auxiliar_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`dentista_id`, `auxiliar_id`),
  INDEX `fk_auxiliar_auxilia_dentista_dentista1_idx` (`dentista_id` ASC),
  INDEX `fk_auxiliar_auxilia_dentista_auxiliar1_idx` (`auxiliar_id` ASC),
  CONSTRAINT `fk_auxiliar_auxilia_dentista_dentista1`
    FOREIGN KEY (`dentista_id`)
    REFERENCES `clinica_odontologica`.`dentista` (`funcionario_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_auxiliar_auxilia_dentista_auxiliar1`
    FOREIGN KEY (`auxiliar_id`)
    REFERENCES `clinica_odontologica`.`auxiliar` (`funcionario_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `clinica_odontologica`.`recepcionista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`recepcionista` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`recepcionista` (
  `funcionario_id` INT UNSIGNED NOT NULL,
  `nome_usuario` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`funcionario_id`),
  INDEX `fk_administrador-recepcionista_funcionario1_idx` (`funcionario_id` ASC),
  UNIQUE INDEX `nome_usuario_UNIQUE` (`nome_usuario` ASC),
  CONSTRAINT `fk_administrador-recepcionista_funcionario1`
    FOREIGN KEY (`funcionario_id`)
    REFERENCES `clinica_odontologica`.`funcionario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinica_odontologica`.`administrador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`administrador` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`administrador` (
  `funcionario_id` INT UNSIGNED NOT NULL,
  `nome_usuario` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`funcionario_id`),
  INDEX `fk_administrador_funcionario1_idx` (`funcionario_id` ASC),
  UNIQUE INDEX `nome_usuario_UNIQUE` (`nome_usuario` ASC),
  CONSTRAINT `fk_administrador_funcionario1`
    FOREIGN KEY (`funcionario_id`)
    REFERENCES `clinica_odontologica`.`funcionario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinica_odontologica`.`despesa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`despesa` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`despesa` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `data` DATE NOT NULL,
  `valor` FLOAT UNSIGNED NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `situacao` ENUM('Pago', 'Não Pago') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinica_odontologica`.`plano_dentario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`plano_dentario` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`plano_dentario` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `desconto` FLOAT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinica_odontologica`.`paciente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`paciente` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`paciente` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(90) NOT NULL,
  `nascimento` DATE NOT NULL,
  `cpf` CHAR(11) NULL,
  `plano_dentario_id` INT UNSIGNED,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  INDEX `fk_paciente_plano_dentario1_idx` (`plano_dentario_id` ASC),
  CONSTRAINT `fk_paciente_plano_dentario1`
    FOREIGN KEY (`plano_dentario_id`)
    REFERENCES `clinica_odontologica`.`plano_dentario` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinica_odontologica`.`recebimento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`recebimento` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`recebimento` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `valor` FLOAT UNSIGNED NOT NULL,
  `data` DATE NOT NULL,
  `modo_pagamento` VARCHAR(45) NOT NULL,
  `recepcionista_id` INT UNSIGNED NULL,
  `paciente_id` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_balanço_recepcionista1_idx` (`recepcionista_id` ASC),
  INDEX `fk_recebimento_paciente1_idx` (`paciente_id` ASC),
  CONSTRAINT `fk_balanço_recepcionista1`
    FOREIGN KEY (`recepcionista_id`)
    REFERENCES `clinica_odontologica`.`recepcionista` (`funcionario_id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_recebimento_paciente1`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `clinica_odontologica`.`paciente` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinica_odontologica`.`dentista_consulta_paciente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`dentista_consulta_paciente` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`dentista_consulta_paciente` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `paciente_id` INT UNSIGNED NOT NULL,
  `dentista_id` INT UNSIGNED NOT NULL,
  `data` DATE NOT NULL,
  `horario` TIME NOT NULL,
  `valor` FLOAT NOT NULL,
  `situacao` ENUM('Pago', 'Não Pago') NOT NULL,
  `operacao` VARCHAR(45) NOT NULL,
  PRIMARY KEY(`id`),
  INDEX `fk_dentista_has_paciente_paciente1_idx` (`paciente_id` ASC),
  INDEX `fk_dentista_consulta_paciente_dentista1_idx` (`dentista_id` ASC),
  CONSTRAINT `fk_dentista_has_paciente_paciente1`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `clinica_odontologica`.`paciente` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_dentista_consulta_paciente_dentista1`
    FOREIGN KEY (`dentista_id`)
    REFERENCES `clinica_odontologica`.`dentista` (`funcionario_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `clinica_odontologica`.`especialidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`especialidade` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`especialidade` (
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nome`),
  UNIQUE INDEX `nome_especialidade_UNIQUE` (`nome` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinica_odontologica`.`dentista_has_especialidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clinica_odontologica`.`dentista_has_especialidade` ;

CREATE TABLE IF NOT EXISTS `clinica_odontologica`.`dentista_has_especialidade` (
  `dentista_id` INT UNSIGNED NOT NULL,
  `especialidade_nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`dentista_id`, `especialidade_nome`),
  INDEX `fk_dentista_has_especialidade_especialidade1_idx` (`especialidade_nome` ASC),
  INDEX `fk_dentista_has_especialidade_dentista1_idx` (`dentista_id` ASC),
  CONSTRAINT `fk_dentista_has_especialidade_dentista1`
    FOREIGN KEY (`dentista_id`)
    REFERENCES `clinica_odontologica`.`dentista` (`funcionario_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_dentista_has_especialidade_especialidade1`
    FOREIGN KEY (`especialidade_nome`)
    REFERENCES `clinica_odontologica`.`especialidade` (`nome`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
