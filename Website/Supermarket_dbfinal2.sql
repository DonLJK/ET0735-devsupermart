-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema devops_supermarketdb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema devops_supermarketdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `devops_supermarketdb` DEFAULT CHARACTER SET utf8 ;
USE `devops_supermarketdb` ;

-- -----------------------------------------------------
-- Table `devops_supermarketdb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devops_supermarketdb`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `devops_supermarketdb`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devops_supermarketdb`.`product` (
  `prod_id` INT(11) NOT NULL AUTO_INCREMENT,
  `prod_name` VARCHAR(50) NOT NULL,
  `prod_price` DECIMAL(10,0) NOT NULL,
  `prod_image` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`prod_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 513
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `devops_supermarketdb`.`cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devops_supermarketdb`.`cart` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `customer_id` INT(11) NOT NULL,
  `prod_id` INT(11) NOT NULL,
  `prod_quantity` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `productid_idx` (`prod_id` ASC),
  INDEX `customerid_idx` (`customer_id` ASC),
  CONSTRAINT `customerFK`
    FOREIGN KEY (`customer_id`)
    REFERENCES `devops_supermarketdb`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `productFK`
    FOREIGN KEY (`prod_id`)
    REFERENCES `devops_supermarketdb`.`product` (`prod_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `devops_supermarketdb`.`payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devops_supermarketdb`.`payment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cart_type` VARCHAR(50) NOT NULL,
  `payment_date` DATE NOT NULL,
  `cart_totalprice` DECIMAL(10,0) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `devops_supermarketdb`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devops_supermarketdb`.`order` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `payment_id` INT(11) NOT NULL,
  `cart_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `paymentid_idx` (`payment_id` ASC),
  INDEX `cartid_idx` (`cart_id` ASC),
  CONSTRAINT `cartFK`
    FOREIGN KEY (`cart_id`)
    REFERENCES `devops_supermarketdb`.`cart` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `paymentFK`
    FOREIGN KEY (`payment_id`)
    REFERENCES `devops_supermarketdb`.`payment` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
