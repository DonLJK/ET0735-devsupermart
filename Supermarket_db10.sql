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
  `id` INT NOT NULL AUTO_INCREMENT,
  `prod_name` VARCHAR(50) NOT NULL,
  `prod_price` DECIMAL NOT NULL,
  `prod_image` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DevOps_Supermarketdb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DevOps_Supermarketdb`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DevOps_Supermarketdb`.`cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DevOps_Supermarketdb`.`cart` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer_id` INT NOT NULL,
  `prod_id` INT NOT NULL,
  `prod_quantity` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `productid_idx` (`prod_id` ASC),
  INDEX `customerid_idx` (`customer_id` ASC),
  CONSTRAINT `productFK`
    FOREIGN KEY (`prod_id`)
    REFERENCES `DevOps_Supermarketdb`.`product` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `customerFK`
    FOREIGN KEY (`customer_id`)
    REFERENCES `DevOps_Supermarketdb`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DevOps_Supermarketdb`.`payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DevOps_Supermarketdb`.`payment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cart_type` VARCHAR(50) NOT NULL,
  `payment_date` DATE NOT NULL,
  `cart_totalprice` DECIMAL NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DevOps_Supermarketdb`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DevOps_Supermarketdb`.`order` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `payment_id` INT NOT NULL,
  `cart_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `paymentid_idx` (`payment_id` ASC),
  INDEX `cartid_idx` (`cart_id` ASC),
  CONSTRAINT `paymentFK`
    FOREIGN KEY (`payment_id`)
    REFERENCES `DevOps_Supermarketdb`.`payment` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `cartFK`
    FOREIGN KEY (`cart_id`)
    REFERENCES `DevOps_Supermarketdb`.`cart` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
