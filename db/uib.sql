-- -----------------------------------------------------
-- Schema uib
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `uib` ;
-- -----------------------------------------------------
-- Schema uib
-- -----------------------------------------------------
CREATE SCHEMA
IF NOT EXISTS `uib` DEFAULT CHARACTER
SET utf8mb4 ;
USE `uib` ;
-- -----------------------------------------------------
-- Table `uib`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uib`.`users` ;

CREATE TABLE IF NOT EXISTS `uib`.`users` (
  `user_id` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_status` int(2) NOT NULL,
  `user_name` VARCHAR(45) NOT NULL,
  `user_pass` VARCHAR(45) NOT NULL,
  `user_email` VARCHAR(45) NOT NULL,
  `user_last` DATETIME NOT NULL,
  `user_create` DATETIME NOT NULL,
  `user_update` DATETIME NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name_UNIQUE` (`user_name`),
  UNIQUE KEY `user_email_UNIQUE` (`user_email`),
  UNIQUE INDEX `email_INDEX` (`user_email` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `uib`.`people_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uib`.`people_type` ;

CREATE TABLE IF NOT EXISTS `uib`.`people_type` (
  `type_id` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` VARCHAR(45) NOT NULL,
  `type_create` DATETIME NOT NULL,
  `type_update` DATETIME NOT NULL,
  PRIMARY KEY (`type_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `uib`.`faculties`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uib`.`faculties` ;

CREATE TABLE IF NOT EXISTS `uib`.`faculties` (
  `faculty_id` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `faculty_name` VARCHAR(45) NOT NULL,
  `faculty_create` DATETIME NOT NULL,
  `faculty_update` DATETIME NOT NULL,
  PRIMARY KEY (`faculty_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `uib`.`programs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uib`.`programs` ;

CREATE TABLE IF NOT EXISTS `uib`.`programs` (
  `program_id` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `program_faculty` BIGINT(10) UNSIGNED NOT NULL,
  `program_name` VARCHAR(255) NOT NULL,
  `program_create` DATETIME NOT NULL,
  `program_update` DATETIME NOT NULL,
  PRIMARY KEY (`program_id`),
  CONSTRAINT `fk_programs_program_faculty`
    FOREIGN KEY (`program_faculty`)
    REFERENCES `faculties` (`faculty_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `uib`.`people`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uib`.`people` ;

CREATE TABLE IF NOT EXISTS `uib`.`people` (
  `person_id` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `person_user` BIGINT(10) UNSIGNED NOT NULL,
  `person_type` BIGINT(10) UNSIGNED NOT NULL,
  `person_name` VARCHAR(45) NOT NULL,
  `person_lastname` VARCHAR(45) NOT NULL,
  `person_semester` int(10) UNSIGNED NOT NULL,
  `person_program` BIGINT(10) UNSIGNED NOT NULL,
  `person_picture` VARCHAR(45) NULL,
  `person_create` DATETIME NOT NULL,
  `person_update` DATETIME NOT NULL,
  PRIMARY KEY (`person_id`),
  INDEX `name_INDEX` (`person_name` ASC),
  INDEX `lastname_INDEX` (`person_lastname` ASC),
  CONSTRAINT `fk_people_person_id`
    FOREIGN KEY (`person_user`)
    REFERENCES `users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_people_person_type`
    FOREIGN KEY (`person_type`)
    REFERENCES `people_type` (`type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_people_person_program`
    FOREIGN KEY (`person_program`)
    REFERENCES `programs` (`program_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `uib`.`skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uib`.`skills` ;

CREATE TABLE IF NOT EXISTS `uib`.`skills` (
  `skill_id` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skill_name` VARCHAR(45) NOT NULL,
  `skill_create` DATETIME NOT NULL,
  `skill_update` DATETIME NOT NULL,
  PRIMARY KEY (`skill_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `uib`.`skills_people`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uib`.`skills_people` ;

CREATE TABLE IF NOT EXISTS `uib`.`skills_people` (
  `person_id` BIGINT(10) UNSIGNED NOT NULL,
  `skill_id` BIGINT(10) UNSIGNED NOT NULL,
  `skill_person_create` DATETIME NOT NULL,
  `skill_person_update` DATETIME NOT NULL,
  UNIQUE KEY `skill_people_key` (`person_id`,`skill_id`),
  CONSTRAINT `fk_skills_people_person_id`
    FOREIGN KEY (`person_id`)
    REFERENCES `people` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_skills_people_skill_id`
    FOREIGN KEY (`skill_id`)
    REFERENCES `skills` (`skill_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `uib`.`messages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uib`.`messages` ;

CREATE TABLE IF NOT EXISTS `uib`.`messages` (
  `message_id` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `person_out` BIGINT(10) UNSIGNED NOT NULL,
  `person_in` BIGINT(10) UNSIGNED NOT NULL,
  `message_body` VARCHAR(255) NOT NULL,
  `message_status` INT(2) UNSIGNED NOT NULL,
  `message_create` DATETIME NOT NULL,
  `message_update` DATETIME NOT NULL,
  PRIMARY KEY (`message_id`),
  CONSTRAINT `fk_messages_person_out`
    FOREIGN KEY (`person_out`)
    REFERENCES `people` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_person_in`
    FOREIGN KEY (`person_in`)
    REFERENCES `people` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
