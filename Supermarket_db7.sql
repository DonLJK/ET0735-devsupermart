-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema DevOps_Supermarketdb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema DevOps_Supermarketdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DevOps_Supermarketdb` DEFAULT CHARACTER SET utf8 ;
USE `DevOps_Supermarketdb` ;

-- -----------------------------------------------------
-- Table `DevOps_Supermarketdb`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DevOps_Supermarketdb`.`product` (
  `prod_id` INT NOT NULL AUTO_INCREMENT,
  `prod_name` VARCHAR(50) NOT NULL,
  `prod_price` DECIMAL UNSIGNED NOT NULL,
  `prod_image` VARCHAR(100) NULL,
  PRIMARY KEY (`prod_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DevOps_Supermarketdb`.`cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DevOps_Supermarketdb`.`cart` (
  `cart_type` VARCHAR(50) NULL,
  `cart_id` INT NOT NULL AUTO_INCREMENT,
  `cart_date` DATE NULL,
  `prod_id` INT NOT NULL,
  `prod_quantity` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`cart_id`),
  INDEX `prod_id_idx` (`prod_id` ASC),
  CONSTRAINT `productFK`
    FOREIGN KEY (`prod_id`)
    REFERENCES `DevOps_Supermarketdb`.`product` (`prod_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DevOps_Supermarketdb`.`payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DevOps_Supermarketdb`.`payment` (
  `payment_id` INT NOT NULL AUTO_INCREMENT,
  `payment_date` DATE NULL,
  `order_id` INT NOT NULL,
  `cart_totalprice` DECIMAL UNSIGNED NULL,
  PRIMARY KEY (`payment_id`),
  INDEX `OrderFK_idx` (`order_id` ASC),
  CONSTRAINT `OrderFK`
    FOREIGN KEY (`order_id`)
    REFERENCES `DevOps_Supermarketdb`.`order` (`order_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DevOps_Supermarketdb`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DevOps_Supermarketdb`.`order` (
  `order_id` INT NOT NULL AUTO_INCREMENT,
  `payment_id` INT NOT NULL,
  `cart_id` INT NOT NULL,
  PRIMARY KEY (`order_id`),
  INDEX `PaymentFK_idx` (`payment_id` ASC),
  INDEX `CartFK_idx` (`cart_id` ASC),
  CONSTRAINT `PaymentFK`
    FOREIGN KEY (`payment_id`)
    REFERENCES `DevOps_Supermarketdb`.`payment` (`payment_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `CartFK`
    FOREIGN KEY (`cart_id`)
    REFERENCES `DevOps_Supermarketdb`.`cart` (`cart_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
