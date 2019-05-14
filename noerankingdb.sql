-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`estudiante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`estudiante` (
  `idestudiante` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `fechanacimiento` DATE NOT NULL,
  `telefono` VARCHAR(9) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `year` INT NOT NULL,
  `seccion` VARCHAR(10) NOT NULL,
  `centroescolar` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idestudiante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`documento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`documento` (
  `iddocumento` INT NOT NULL AUTO_INCREMENT,
  `idestudiante` INT NOT NULL,
  `tipodocumento` VARCHAR(45) NOT NULL,
  `documento` VARCHAR(120) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`iddocumento`),
  INDEX `llave1_idx` (`idestudiante` ASC) VISIBLE,
  CONSTRAINT `llave1`
    FOREIGN KEY (`idestudiante`)
    REFERENCES `mydb`.`estudiante` (`idestudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipo` (
  `idtipo` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idtipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`reporteap`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`reporteap` (
  `idreporteap` INT NOT NULL AUTO_INCREMENT,
  `idestudiante` INT NOT NULL,
  `idtipo` INT NOT NULL,
  `year` INT NOT NULL,
  `seccion` VARCHAR(10) NOT NULL,
  `nota` DECIMAL(4,2) NOT NULL,
  `observaciones` VARCHAR(300) NOT NULL,
  INDEX `llave4_idx` (`idestudiante` ASC) VISIBLE,
  PRIMARY KEY (`idreporteap`),
  INDEX `llave10_idx` (`idtipo` ASC) VISIBLE,
  CONSTRAINT `llave4`
    FOREIGN KEY (`idestudiante`)
    REFERENCES `mydb`.`estudiante` (`idestudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `llave10`
    FOREIGN KEY (`idtipo`)
    REFERENCES `mydb`.`tipo` (`idtipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`notasfundacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`notasfundacion` (
  `idnotasfundacion` INT NOT NULL AUTO_INCREMENT,
  `idestudiante` INT NOT NULL,
  `` VARCHAR(45) NULL,
  PRIMARY KEY (`idnotasfundacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`notafundacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`notafundacion` (
  `idnotafundacion` INT NOT NULL AUTO_INCREMENT,
  `idestudiante` INT NOT NULL,
  `idtipo` INT NOT NULL,
  `nota` DECIMAL(4,2) NOT NULL,
  PRIMARY KEY (`idnotafundacion`),
  INDEX `llave5_idx` (`idestudiante` ASC) VISIBLE,
  INDEX `llave7_idx` (`idtipo` ASC) VISIBLE,
  CONSTRAINT `llave5`
    FOREIGN KEY (`idestudiante`)
    REFERENCES `mydb`.`estudiante` (`idestudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `llave7`
    FOREIGN KEY (`idtipo`)
    REFERENCES `mydb`.`tipo` (`idtipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`notace`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`notace` (
  `idnotace` INT NOT NULL AUTO_INCREMENT,
  `idestudiante` INT NOT NULL,
  `idtipo` INT NOT NULL,
  `nota` DECIMAL(4,2) NOT NULL,
  PRIMARY KEY (`idnotace`),
  INDEX `llave2_idx` (`idestudiante` ASC) VISIBLE,
  INDEX `llave6_idx` (`idtipo` ASC) VISIBLE,
  CONSTRAINT `llave2`
    FOREIGN KEY (`idestudiante`)
    REFERENCES `mydb`.`estudiante` (`idestudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `llave6`
    FOREIGN KEY (`idtipo`)
    REFERENCES `mydb`.`tipo` (`idtipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`notacertificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`notacertificacion` (
  `idnotacertificacion` INT NOT NULL AUTO_INCREMENT,
  `idestudiante` INT NOT NULL,
  `idtipo` INT NOT NULL,
  `nota` DECIMAL(4,2) NOT NULL,
  PRIMARY KEY (`idnotacertificacion`),
  INDEX `llave3_idx` (`idestudiante` ASC) VISIBLE,
  INDEX `llave8_idx` (`idtipo` ASC) VISIBLE,
  CONSTRAINT `llave3`
    FOREIGN KEY (`idestudiante`)
    REFERENCES `mydb`.`estudiante` (`idestudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `llave8`
    FOREIGN KEY (`idtipo`)
    REFERENCES `mydb`.`tipo` (`idtipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`promce`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`promce` (
  `idpromce` INT NOT NULL AUTO_INCREMENT,
  `idestudiante` INT NOT NULL,
  `promedio` DECIMAL(4,2) NOT NULL,
  PRIMARY KEY (`idpromce`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`promfunda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`promfunda` (
  `idpromfunda` INT NOT NULL AUTO_INCREMENT,
  `idestudiante` INT NOT NULL,
  `promedio` DECIMAL(4,2) NOT NULL,
  PRIMARY KEY (`idpromfunda`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`promcertificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`promcertificacion` (
  `idpromcertificacion` INT NOT NULL AUTO_INCREMENT,
  `idestudiante` INT NOT NULL,
  `promedio` DECIMAL(4,2) NOT NULL,
  PRIMARY KEY (`idpromcertificacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ranking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ranking` (
  `idranking` INT NOT NULL AUTO_INCREMENT,
  `idestudiante` INT NOT NULL,
  `idpromfunda` INT NOT NULL,
  `idpromce` INT NOT NULL,
  `idpromcertificacion` INT NOT NULL,
  `promfudayce` DECIMAL(4,2) NOT NULL,
  `diferencia` DECIMAL(4,2) NOT NULL,
  `idnota_ap` INT NOT NULL,
  `puntuacion` DECIMAL(4,2) NOT NULL,
  PRIMARY KEY (`idranking`),
  INDEX `llave11_idx` (`idestudiante` ASC) VISIBLE,
  INDEX `llave12_idx` (`idpromce` ASC) VISIBLE,
  INDEX `llave13_idx` (`idpromfunda` ASC) VISIBLE,
  INDEX `llave14_idx` (`idpromcertificacion` ASC) VISIBLE,
  CONSTRAINT `llave11`
    FOREIGN KEY (`idestudiante`)
    REFERENCES `mydb`.`estudiante` (`idestudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `llave12`
    FOREIGN KEY (`idpromce`)
    REFERENCES `mydb`.`promce` (`idpromce`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `llave13`
    FOREIGN KEY (`idpromfunda`)
    REFERENCES `mydb`.`promfunda` (`idpromfunda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `llave14`
    FOREIGN KEY (`idpromcertificacion`)
    REFERENCES `mydb`.`promcertificacion` (`idpromcertificacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
