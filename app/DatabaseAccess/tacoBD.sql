-- MySQL Script generated by MySQL Workbench
-- vie 19 may 2017 00:41:38 CDT
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema taconnecta
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `taconnecta` ;

-- -----------------------------------------------------
-- Schema taconnecta
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `taconnecta` DEFAULT CHARACTER SET utf8 ;
USE `taconnecta` ;

-- -----------------------------------------------------
-- Table `taconnecta`.`Cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `taconnecta`.`Cliente` ;

CREATE TABLE IF NOT EXISTS `taconnecta`.`Cliente` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `idUsuario_UNIQUE` (`idUsuario` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `taconnecta`.`DireccionCliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `taconnecta`.`DireccionCliente` ;

CREATE TABLE IF NOT EXISTS `taconnecta`.`DireccionCliente` (
  `idDireccion` INT NOT NULL AUTO_INCREMENT,
  `calle` VARCHAR(45) NOT NULL,
  `numero` INT NOT NULL,
  `colonia` VARCHAR(45) NOT NULL,
  `delegacion` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `npostal` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idDireccion`),
  UNIQUE INDEX `idDireccion_UNIQUE` (`idDireccion` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `taconnecta`.`CliDir`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `taconnecta`.`CliDir` ;

CREATE TABLE IF NOT EXISTS `taconnecta`.`CliDir` (
  `idCli` INT NOT NULL,
  `idDir` INT NOT NULL,
  INDEX `fk_UsrDir_Direccion1_idx` (`idDir` ASC),
  INDEX `fk_CliDir_Cliente1_idx` (`idCli` ASC),
  CONSTRAINT `fk_UsrDir_Direccion1`
    FOREIGN KEY (`idDir`)
    REFERENCES `taconnecta`.`DireccionCliente` (`idDireccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CliDir_Cliente1`
    FOREIGN KEY (`idCli`)
    REFERENCES `taconnecta`.`Cliente` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `taconnecta`.`Categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `taconnecta`.`Categoria` ;

CREATE TABLE IF NOT EXISTS `taconnecta`.`Categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nombreCat` VARCHAR(45) NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taconnecta`.`SubCategoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `taconnecta`.`SubCategoria` ;

CREATE TABLE IF NOT EXISTS `taconnecta`.`SubCategoria` (
  `idSubCategoria` INT NOT NULL AUTO_INCREMENT,
  `nombreSub` VARCHAR(45) NOT NULL,
  `idCat` INT NOT NULL,
  PRIMARY KEY (`idSubCategoria`),
  INDEX `fk_SubCategoria_Categoria1_idx` (`idCat` ASC),
  CONSTRAINT `fk_SubCategoria_Categoria1`
    FOREIGN KEY (`idCat`)
    REFERENCES `taconnecta`.`Categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `taconnecta`.`Puesto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `taconnecta`.`Puesto` ;

CREATE TABLE IF NOT EXISTS `taconnecta`.`Puesto` (
  `idPuesto` INT NOT NULL AUTO_INCREMENT,
  `nPuesto` VARCHAR(45) NOT NULL,
  `nResponsable` VARCHAR(45) NOT NULL,
  `horario` VARCHAR(300) NULL,
  `telContacto` VARCHAR(45) NULL,
  `descripcion` VARCHAR(1000) NULL,
  `idSub` INT NULL,
  `correo` VARCHAR(45) NULL,
  `contrasena` VARCHAR(45) NULL,
  PRIMARY KEY (`idPuesto`),
  INDEX `fk_Puesto_SubCategoria1_idx` (`idSub` ASC),
  CONSTRAINT `fk_Puesto_SubCategoria1`
    FOREIGN KEY (`idSub`)
    REFERENCES `taconnecta`.`SubCategoria` (`idSubCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `taconnecta`.`Resena`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `taconnecta`.`Resena` ;

CREATE TABLE IF NOT EXISTS `taconnecta`.`Resena` (
  `idResena` INT NOT NULL AUTO_INCREMENT,
  `idCliente` INT NOT NULL,
  `idPuesto` INT NOT NULL,
  `mensaje` VARCHAR(500) NULL,
  `calificacion` INT NULL,
  PRIMARY KEY (`idResena`),
  UNIQUE INDEX `idResena_UNIQUE` (`idResena` ASC),
  INDEX `fk_Resena_Puesto1_idx` (`idPuesto` ASC),
  CONSTRAINT `fk_Resena_Puesto1`
    FOREIGN KEY (`idPuesto`)
    REFERENCES `taconnecta`.`Puesto` (`idPuesto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `taconnecta`.`CliRes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `taconnecta`.`CliRes` ;

CREATE TABLE IF NOT EXISTS `taconnecta`.`CliRes` (
  `idCliente` INT NOT NULL,
  `idResena` INT NOT NULL,
  INDEX `fk_ClientePuesto_Resena1_idx` (`idResena` ASC),
  INDEX `fk_ClientePuesto_Cliente1_idx` (`idCliente` ASC),
  CONSTRAINT `fk_ClientePuesto_Resena1`
    FOREIGN KEY (`idResena`)
    REFERENCES `taconnecta`.`Resena` (`idResena`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ClientePuesto_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `taconnecta`.`Cliente` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `taconnecta`.`DireccionPuesto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `taconnecta`.`DireccionPuesto` ;

CREATE TABLE IF NOT EXISTS `taconnecta`.`DireccionPuesto` (
  `Puesto_idPuesto` INT NOT NULL,
  `calle` VARCHAR(45) NULL,
  `numero` VARCHAR(45) NULL,
  `colonia` VARCHAR(45) NULL,
  `delegacion` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `pais` VARCHAR(45) NULL,
  `npostal` VARCHAR(45) NULL,
  INDEX `fk_DireccionPuesto_Puesto1_idx` (`Puesto_idPuesto` ASC),
  PRIMARY KEY (`Puesto_idPuesto`),
  CONSTRAINT `fk_DireccionPuesto_Puesto1`
    FOREIGN KEY (`Puesto_idPuesto`)
    REFERENCES `taconnecta`.`Puesto` (`idPuesto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `taconnecta`.`Menu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `taconnecta`.`Menu` ;

CREATE TABLE IF NOT EXISTS `taconnecta`.`Menu` (
  `Puesto_idPuesto` INT NOT NULL,
  `platillos` VARCHAR(1000) NULL,
  `precio` VARCHAR(100) NULL,
  `bebidas` VARCHAR(500) NULL,
  `postres` VARCHAR(500) NULL,
  INDEX `fk_Menu_Puesto1_idx` (`Puesto_idPuesto` ASC),
  PRIMARY KEY (`Puesto_idPuesto`),
  CONSTRAINT `fk_Menu_Puesto1`
    FOREIGN KEY (`Puesto_idPuesto`)
    REFERENCES `taconnecta`.`Puesto` (`idPuesto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `taconnecta`.`Cliente_has_Puesto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `taconnecta`.`Cliente_has_Puesto` ;

CREATE TABLE IF NOT EXISTS `taconnecta`.`Cliente_has_Puesto` (
  `Cliente_idUsuario` INT NOT NULL,
  `Puesto_idPuesto` INT NOT NULL,
  PRIMARY KEY (`Cliente_idUsuario`, `Puesto_idPuesto`),
  INDEX `fk_Cliente_has_Puesto_Puesto1_idx` (`Puesto_idPuesto` ASC),
  INDEX `fk_Cliente_has_Puesto_Cliente1_idx` (`Cliente_idUsuario` ASC),
  CONSTRAINT `fk_Cliente_has_Puesto_Cliente1`
    FOREIGN KEY (`Cliente_idUsuario`)
    REFERENCES `taconnecta`.`Cliente` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cliente_has_Puesto_Puesto1`
    FOREIGN KEY (`Puesto_idPuesto`)
    REFERENCES `taconnecta`.`Puesto` (`idPuesto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;