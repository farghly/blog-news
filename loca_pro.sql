-- MySQL Script generated by MySQL Workbench
-- Wed Aug 30 08:03:13 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering
create database `loca_pro`;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema loca_pro
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema loca_pro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `loca_pro` DEFAULT CHARACTER SET utf8 ;
USE `loca_pro` ;

-- -----------------------------------------------------
-- Table `loca_pro`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loca_pro`.`categories` (
  `category_id` INT NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(255) NULL,
  `category_status` CHAR NULL,
  `category_create` DATETIME NULL,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loca_pro`.`authors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loca_pro`.`authors` (
  `author_id` INT NOT NULL AUTO_INCREMENT,
  `author_email` VARCHAR(60) NULL,
  `author_password` VARCHAR(60) NULL,
  `author_fname` VARCHAR(45) NULL,
  `author_lname` VARCHAR(45) NULL,
  `author_registerDate` DATETIME NULL,
  `author_status` VARCHAR(2) NULL,
  `author_role` VARCHAR(7) NULL,
  PRIMARY KEY (`author_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loca_pro`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loca_pro`.`posts` (
  `post_id` INT NOT NULL AUTO_INCREMENT,
  `author_id` INT NULL,
  `category_id` INT NULL,
  `post_title` VARCHAR(255) NULL,
  `post_content` TEXT NULL,
  `post_tags` VARCHAR(255) NULL,
  `post_image` TEXT NULL,
  `post_status` CHAR(10) NULL,
  `post_view_count` INT NULL,
  PRIMARY KEY (`post_id`),
  INDEX `fk_posts_categories1_idx` (`category_id` ASC),
  INDEX `fk_posts_authors1_idx` (`author_id` ASC),
  CONSTRAINT `fk_posts_categories1`
    FOREIGN KEY (`category_id`)
    REFERENCES `loca_pro`.`categories` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_posts_authors1`
    FOREIGN KEY (`author_id`)
    REFERENCES `loca_pro`.`authors` (`author_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loca_pro`.`sub_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loca_pro`.`sub_category` (
  `sub_category_id` INT NOT NULL AUTO_INCREMENT,
  `category_id` INT NULL,
  `sub_category_name` VARCHAR(45) NULL,
  `sub_category_create` DATETIME NULL,
  `sub_category_status` VARCHAR(45) NULL,
  PRIMARY KEY (`sub_category_id`),
  INDEX `fk_sub_category_categories1_idx` (`category_id` ASC),
  CONSTRAINT `fk_sub_category_categories1`
    FOREIGN KEY (`category_id`)
    REFERENCES `loca_pro`.`categories` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loca_pro`.`comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loca_pro`.`comment` (
  `comment_id` INT NOT NULL AUTO_INCREMENT,
  `comment_author` VARCHAR(60) NULL,
  `comment_emaill` VARCHAR(60) NULL,
  `comment_content` TEXT NULL,
  `comment_date` DATETIME NULL,
  `comment_status` VARCHAR(2) NULL,
  `post_comment_id` INT NULL,
  `author_id` INT NULL,
  PRIMARY KEY (`comment_id`),
  INDEX `fk_comment_posts1_idx` (`post_comment_id` ASC),
  CONSTRAINT `fk_comment_posts1`
    FOREIGN KEY (`post_comment_id`)
    REFERENCES `loca_pro`.`posts` (`post_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
