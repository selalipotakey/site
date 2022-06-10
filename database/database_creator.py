import pymysql



db_server = input("Input database server: ")
db_user = input("Input username: ")
db_pass = input("Input password: ")
db_name = input("Input database name: ")

db = pymysql.connect(host=db_server, user=db_user, password=db_pass, database=db_name)
cursor = db.cursor()

create_database = '''
CREATE TABLE IF NOT EXISTS `film_archive`.`series` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NOT NULL DEFAULT 'None found',
  `programmer` VARCHAR(128) NOT NULL DEFAULT 'None found',
  `slot` VARCHAR(128) NOT NULL DEFAULT 'None found',
  `quarter` VARCHAR(45) NOT NULL DEFAULT 'None found',
  `year` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `film_archive`.`films` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `series_id` INT NOT NULL,
  `title` VARCHAR(128) NOT NULL,
  `director` VARCHAR(128) NOT NULL DEFAULT 'None found',
  `year` INT NULL,
  `runtime` INT NULL,
  `format` VARCHAR(45) NOT NULL DEFAULT 'None found',
  `notes` MEDIUMTEXT NOT NULL DEFAULT 'None',
  `date` INT NULL,
  `time` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_films_series_idx` (`series_id` ASC) VISIBLE,
  CONSTRAINT `fk_films_series`
    FOREIGN KEY (`series_id`)
    REFERENCES `film_archive`.`series` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
'''

cursor.execute(create_database)
db.commit()

db.close()
