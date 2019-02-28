-- MySQL Script generated by MySQL Workbench
-- Thu Feb 28 12:29:37 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema test2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema test2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `test2` DEFAULT CHARACTER SET utf8 ;
USE `test2` ;

-- -----------------------------------------------------
-- Table `test2`.`publicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test2`.`publicacion` (
  `id_publicacion` INT NOT NULL AUTO_INCREMENT,
  `fecha_publicacion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_publicacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `test2`.`imagen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test2`.`imagen` (
  `id_imagen` INT NOT NULL AUTO_INCREMENT,
  `url_imagen` TEXT NULL,
  `publicacion_id_publicacion` INT NOT NULL,
  PRIMARY KEY (`id_imagen`),
  INDEX `fk_imagen_publicacion_idx` (`publicacion_id_publicacion` ASC),
  CONSTRAINT `fk_imagen_publicacion`
    FOREIGN KEY (`publicacion_id_publicacion`)
    REFERENCES `test2`.`publicacion` (`id_publicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;