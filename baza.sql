SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `Restavracija` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Restavracija` ;

-- -----------------------------------------------------
-- Table `Restavracija`.`Uporabniki`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Restavracija`.`Uporabniki` ;

CREATE  TABLE IF NOT EXISTS `Restavracija`.`Uporabniki` (
  `UporabnikID` INT NOT NULL AUTO_INCREMENT ,
  `Ime` VARCHAR(25) NOT NULL ,
  `Priimek` VARCHAR(25) NOT NULL ,
  `Geslo` VARCHAR(20) NOT NULL ,
  `Email` VARCHAR(50) NOT NULL ,
  `Naslov` VARCHAR(45) NOT NULL ,
  `Mesto` VARCHAR(45) NOT NULL ,
  `PostnaStevilka` VARCHAR(10) NOT NULL ,
  `JeAdmin` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`UporabnikID`) ,
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Restavracija`.`Hrana`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Restavracija`.`Hrana` ;

CREATE  TABLE IF NOT EXISTS `Restavracija`.`Hrana` (
  `HranaID` INT NOT NULL AUTO_INCREMENT ,
  `Ime` VARCHAR(30) NOT NULL ,
  `VrstaHrane` VARCHAR(15) NOT NULL ,
  `Opis` VARCHAR(200) NOT NULL ,
  `Cena` FLOAT NOT NULL ,
  `Slika` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`HranaID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Restavracija`.`Pijaca`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Restavracija`.`Pijaca` ;

CREATE  TABLE IF NOT EXISTS `Restavracija`.`Pijaca` (
  `PijacaID` INT NOT NULL AUTO_INCREMENT ,
  `Ime` VARCHAR(30) NOT NULL ,
  `VrstaPijace` VARCHAR(15) NOT NULL ,
  `Opis` VARCHAR(200) NOT NULL ,
  `Cena` FLOAT NOT NULL ,
  `Slika` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`PijacaID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Restavracija`.`KomentarHrana`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Restavracija`.`KomentarHrana` ;

CREATE  TABLE IF NOT EXISTS `Restavracija`.`KomentarHrana` (
  `KomentarHranaID` INT NOT NULL AUTO_INCREMENT ,
  `Hrana_HranaID` INT NOT NULL ,
  `Vsebina` VARCHAR(100) NOT NULL ,
  `Ocena` INT NOT NULL ,
  PRIMARY KEY (`KomentarHranaID`) ,
  INDEX `Hrana_HranaID_idx` (`Hrana_HranaID` ASC) ,
  CONSTRAINT `Hrana_HranaID`
    FOREIGN KEY (`Hrana_HranaID` )
    REFERENCES `Restavracija`.`Hrana` (`HranaID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Restavracija`.`KomentarPijaca`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Restavracija`.`KomentarPijaca` ;

CREATE  TABLE IF NOT EXISTS `Restavracija`.`KomentarPijaca` (
  `KomentarPijacaID` INT NOT NULL AUTO_INCREMENT ,
  `Pijaca_PijacaID` INT NOT NULL ,
  `Vsebina` VARCHAR(100) NOT NULL ,
  `Ocena` INT NOT NULL ,
  PRIMARY KEY (`KomentarPijacaID`) ,
  INDEX `Pijaca_PijacaID_idx` (`Pijaca_PijacaID` ASC) ,
  CONSTRAINT `Pijaca_PijacaID`
    FOREIGN KEY (`Pijaca_PijacaID` )
    REFERENCES `Restavracija`.`Pijaca` (`PijacaID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Restavracija`.`Narocila`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Restavracija`.`Narocila` ;

CREATE  TABLE IF NOT EXISTS `Restavracija`.`Narocila` (
  `NarocilaID` INT NOT NULL AUTO_INCREMENT ,
  `Uporabniki_UporabnikID` INT NOT NULL ,
  PRIMARY KEY (`NarocilaID`) ,
  INDEX `Uporabniki_UporabnikID_idx` (`Uporabniki_UporabnikID` ASC) ,
  CONSTRAINT `Uporabniki_UporabnikID`
    FOREIGN KEY (`Uporabniki_UporabnikID` )
    REFERENCES `Restavracija`.`Uporabniki` (`UporabnikID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Restavracija`.`EnoNarocilo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Restavracija`.`EnoNarocilo` ;

CREATE  TABLE IF NOT EXISTS `Restavracija`.`EnoNarocilo` (
  `EnoNarociloID` INT NOT NULL ,
  `Narocila_NarocilaID` INT NOT NULL ,
  `SkupnaKolicina` INT NOT NULL ,
  `SkupnaCena` INT NOT NULL ,
  `Hrana_HranaID` INT NOT NULL ,
  `Pijaca_PijacaID` INT NOT NULL ,
  PRIMARY KEY (`EnoNarociloID`, `Narocila_NarocilaID`) ,
  INDEX `fk_EnoNarocilo_Narocila1_idx` (`Narocila_NarocilaID` ASC) ,
  INDEX `Hrana_HranaID_idx` (`Hrana_HranaID` ASC) ,
  INDEX `Pijaca_PijacaID_idx` (`Pijaca_PijacaID` ASC) ,
  CONSTRAINT `fk_EnoNarocilo_Narocila1`
    FOREIGN KEY (`Narocila_NarocilaID` )
    REFERENCES `Restavracija`.`Narocila` (`NarocilaID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Hrana_HranaID`
    FOREIGN KEY (`Hrana_HranaID` )
    REFERENCES `Restavracija`.`Hrana` (`HranaID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Pijaca_PijacaID`
    FOREIGN KEY (`Pijaca_PijacaID` )
    REFERENCES `Restavracija`.`Pijaca` (`PijacaID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `Restavracija` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
