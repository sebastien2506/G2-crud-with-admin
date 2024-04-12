-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema g2_crud
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `g2_crud` ;

-- -----------------------------------------------------
-- Schema g2_crud
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `g2_crud` DEFAULT CHARACTER SET utf8mb4 ;
USE `g2_crud` ;

-- -----------------------------------------------------
-- Table `g2_crud`.`administrator`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `g2_crud`.`administrator` ;

CREATE TABLE IF NOT EXISTS `g2_crud`.`administrator` (
  `idadministrator` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_bin' NOT NULL COMMENT 'case sensitive',
  `passwd` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_bin' NOT NULL,
  PRIMARY KEY (`idadministrator`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `username_UNIQUE` ON `g2_crud`.`administrator` (`username` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `g2_crud`.`ourdatas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `g2_crud`.`ourdatas` ;

CREATE TABLE IF NOT EXISTS `g2_crud`.`ourdatas` (
  `idourdatas` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `ourdesc` VARCHAR(400) NULL,
  `latitude` VARCHAR(10) NULL,
  `longitude` VARCHAR(10) NULL,
  PRIMARY KEY (`idourdatas`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
