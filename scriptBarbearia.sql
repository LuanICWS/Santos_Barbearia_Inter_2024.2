-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema barbearia_santos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema barbearia_santos
-- -----------------------------------------------------
-- CREATE SCHEMA IF NOT EXISTS `barbearia_santos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
-- Esse é o nome do banco 'y4l7y7v3pdk47h8m' foi automático do deploy
USE `y4l7y7v3pdk47h8m` ;

-- -----------------------------------------------------
-- Table `barbearia_santos`.`cadastro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `y4l7y7v3pdk47h8m`.`cadastro` (
  `usuario_nome_completo` VARCHAR(100) NOT NULL,
  `usuario_email` VARCHAR(255) NOT NULL,
  `usuario_senha` VARCHAR(255) NOT NULL,
  `usuario_telefone` VARCHAR(15) NOT NULL,
  `usuario_cpf` VARCHAR(11) NOT NULL,
  `usuario_data_de_nascimento` DATE NOT NULL,
  `usuario_sexo` ENUM('Masculino', 'Feminino', 'Outros') NOT NULL,
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `usuario_termos_obrigatorios` TINYINT(1) NOT NULL,
  `usuario_incricao_newsletter` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE INDEX `cpf` (`usuario_cpf` ASC),
  UNIQUE INDEX `email` (`usuario_email` ASC))
  ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `barbearia_santos`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `y4l7y7v3pdk47h8m`.`login` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_nome_completo` VARCHAR(100) NOT NULL,
  `usuario_email` VARCHAR(255) NOT NULL,
  `usuario_senha` VARCHAR(255) NOT NULL,
  `usuario_telefone` VARCHAR(15) NOT NULL,
  `usuario_cpf` VARCHAR(11) NOT NULL,
  `usuario_data_de_nascimento` DATE NOT NULL,
  `usuario_sexo` ENUM('Masculino', 'Feminino', 'Outros') NOT NULL,
  `usuario_id` INT NOT NULL DEFAULT '0',
  `usuario_termos_obrigatorios` TINYINT(1) NOT NULL,
  `usuario_incricao_newsletter` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `usuario_email` (`usuario_email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `y4l7y7v3pdk47h8m`.`agendamentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_nome_completo` VARCHAR(100) NOT NULL,
  `usuario_email` VARCHAR(255) NOT NULL,
  `usuario_telefone` VARCHAR(15) NOT NULL,
  `data_do_servico` DATE,
  `hora_do_servico` TIME,
  `servicos` TEXT,
  `data_criacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `y4l7y7v3pdk47h8m`.`servicos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome_servico` VARCHAR(100) NOT NULL,
    `descricao` TEXT NULL,
    `preco` DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `nome_servico` (`nome_servico` ASC)
);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

SELECT * FROM cadastro;
SELECT * FROM agendamentos;
