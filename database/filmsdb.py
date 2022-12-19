# I had to install pandas by using miniconda, then
# I installed pandas using `conda install pandas` in the command line
# also had to install openpyxl with `conda instsall openpyxl` in the command line
import pandas as pd                             # allows excel imports
import numpy as np
from pprint import pprint
import os                                       # together with ROOT_DIR, easy way to construct file paths
from config.definitions import ROOT_DIR         
import pymysql                                  # allows for connection to the database using python 3
from getpass import getpass                     # allows for a hidden password input
import argparse                                 # builds a command line interface (CLI)

class connection:
    def __init__(self):
        self.db_server = ''
        self.db_name = 'docfilmstest'
        self.db_user = ''
        self.db_pass = ''

    def get_creds(self):
        # self.db_server = input("Input database server: ")
        # self.db_user = input("Input username: ")
        # self.db_pass = getpass('Input password: ')

        self.db_server = 'db.docfilms.org'
        self.db_user = 'webchair'
        self.db_pass = 'Henderson1337'

    def open_conn(self):
        # attempts connection to database
        try:
            self.db = pymysql.connect(host=self.db_server, user=self.db_user, password=self.db_pass, database=self.db_name)
        except pymysql.err.OperationalError as e:
            if e.args[0] == 2003:
                print('InputError: Database server \'' + self.db_server + '\' cannot be found. Please check spelling. Exiting')
                exit()
            elif e.args[0] == 1045: 
                print('InputError: Either username \'' + self.db_user + '\' or password is not valid. Please check spelling.')
                print('- If username and password are valid, error could be due to access from an unregistered IP address.\n- Check user settings in Dreamhost MySQL database section. Add your IP address if it is not already added.\nExiting.')
                exit()
            else:
                raise
        return self.db     

    def get_cursor(self):
        self.cursor = self.db.cursor()
        return self.cursor

    def drop_table(self, table):
        try:
            drop_films = '''DROP TABLE %s;'''%table
            self.cursor.execute(drop_films)
            self.db.commit()
            print('Dropped table `%s`'%table)
        except pymysql.err.OperationalError as e:
            if e.args[0] == 1051:
                print('Table `%s` not found. Cannot drop.'%table)
            else:
                raise

    def new_quarter(self, quarter, year, startdate=None, enddate=None):
        
        sql_check = 'SELECT `id` FROM `quarters` WHERE UPPER(`quarter`) = UPPER(%s) AND `year` = %s;'

        sql_insert = 'INSERT INTO `quarters` (`quarter`, `year`, `startdate`, `enddate`) VALUES (%s, %s, %s, %s);'
        
        self.cursor.execute(sql_check, (quarter, year))
        rows = self.cursor.fetchall()
        if len(rows) >= 1:
            print('ERROR: Table `quarters` has one or more records for %s quarter %s.'%(quarter, year))
            print('Warning: To prevent data corruption, you MUST fix this by logging into phpMyAdmin to delete the extraneous quarter WITHOUT corrupting any screenings tied to the extraneous quarter.')
            self.db.close()
            exit()
        else:
            print('Notice: Inserting new quarter, %s %s'%(quarter, year))
            self.cursor.execute(sql_insert,(quarter, year, startdate, enddate))
            self.db.commit()
            quarters_id = self.cursor.lastrowid
            return quarters_id

    def new_series_formatted_capsules(self, quarter_id, series, slot):

        series_title, programmer_list, essay, series_notes = series[0], series[1], series[2], series[3]       

        sql_insert_series = 'INSERT INTO `series` (`quarters_id`, `name`, `slot`, `essay`, `notes`) VALUES (%s, %s, %s, %s, %s);'
        
        self.cursor.execute(sql_insert_series, (quarter_id, series_title, slot, replace_nan_with_none(essay), replace_nan_with_none(series_notes)))
        self.db.commit()
        series_id = self.cursor.lastrowid

        if (isinstance(programmer_list, list) and not pd.isna(programmer_list).all()):

            programmer_id_list = []

            for programmer in programmer_list:

                sql_check_programmer = 'SELECT `id` FROM `programmers` WHERE UPPER(`name`) = UPPER(%s);'
                self.cursor.execute(sql_check_programmer, (programmer))
                rows = self.cursor.fetchall()
                
                if len(rows) == 1:
                    programmer_id = rows[0][0]
                elif len(rows) == 0:
                    print('Inserting new programmer: %s'%(programmer))
                    sql_insert_programmer = 'INSERT INTO `programmers` (`name`) VALUES (%s);'
                    self.cursor.execute(sql_insert_programmer, (programmer))
                    self.db.commit()
                    programmer_id = self.cursor.lastrowid  

                programmer_id_list.append(programmer_id)
            
            for programmer_id in programmer_id_list:
                sql_isnert_programmer_id = 'INSERT INTO `series_programmers` (`programmers_id`, `series_id`) VALUES (%s, %s);'
                self.cursor.execute(sql_isnert_programmer_id, (programmer_id, series_id))
                self.db.commit()

        return series_id

    def new_screening_formatted_capsules(self, series_id, screening):
        
        screening_film_list, showtime_list, capsule, screening_notes, image_path = screening

        sql_insert_screening = 'INSERT INTO `screenings` (`series_id`, `capsule`, `notes`, `image_path`) VALUES (%s, %s, %s, %s);'
        self.cursor.execute(sql_insert_screening, (series_id, replace_nan_with_none(capsule), replace_nan_with_none(screening_notes), replace_nan_with_none(image_path)))
        self.db.commit()
        screening_id = self.cursor.lastrowid

        for showtime in showtime_list:
            sql_insert_showtime = 'INSERT INTO `times` (`screenings_id`, `showdate`, `showtime`) VALUES (%s, %s, %s);'
            self.cursor.execute(sql_insert_showtime, (screening_id, showtime[0], showtime[1]))
            self.db.commit()

        # [name_of_movie, [list_of_directors], format, release_year, runtime]
        for film in screening_film_list:
            film_name, director_list, film_format, film_year, film_runtime = film

            director_id_list = []
            for director in director_list:
                sql_check_director = 'SELECT `id` FROM `directors` WHERE UPPER(`name`) COLLATE utf8mb4_general_ci = UPPER(%s);'
                self.cursor.execute(sql_check_director, (director))
                rows = self.cursor.fetchall()

                if len(rows) == 1:
                    director_id = rows[0][0]
                elif len(rows) == 0:
                    print('Inserting new director: %s'%(director))
                    sql_insert_director = 'INSERT INTO `directors` (`name`) VALUES (%s);'
                    self.cursor.execute(sql_insert_director, (director))
                    self.db.commit()
                    director_id = self.cursor.lastrowid  
                director_id_list.append(director_id)  

            sql_check_film = 'SELECT `films`.`id` FROM `films` INNER JOIN `films_directors` ON `films`.`id` = `films_directors`.`films_id` INNER JOIN `directors` ON `films_directors`.`directors_id` = `directors`.`id` WHERE UPPER(`films`.`title`) COLLATE utf8mb4_general_ci = UPPER(%s) AND `films`.`releaseyear` = %s AND `directors`.`id` = %s;'    
            self.cursor.execute(sql_check_film, (film_name, film_year, director_id_list[0]))
            rows = self.cursor.fetchall()

            if len(rows) == 1:
                film_id = rows[0][0]
            elif len(rows) == 0:
                print('Inserting new film: %s (%s)'%(film_name, film_year))
                sql_insert_film = 'INSERT INTO `films` (`title`, `releaseyear`) VALUES (%s, %s);'
                self.cursor.execute(sql_insert_film, (film_name, film_year))
                self.db.commit()
                film_id = self.cursor.lastrowid
                
                for director_id in director_id_list:
                    sql_insert_films_directors = 'INSERT INTO `films_directors` (`films_id`, `directors_id`) VALUES (%s, %s);'
                    self.cursor.execute(sql_insert_films_directors, (film_id, director_id))
                    self.db.commit()
            
            sql_insert_instance = 'INSERT INTO `instances` (`films_id`, `screenings_id`, `runtime`, `format`) VALUES (%s, %s, %s, %s);'
            self.cursor.execute(sql_insert_instance, (film_id, screening_id, film_runtime, film_format))
            self.db.commit()
                
        return

    def new_series(self, quarter_id, series, series_programmer='', series_slot='', series_essay='', series_notes=''):
        
        sql_check = 'SELECT `id` FROM `series` WHERE `quarters_id`=%s AND `name`=\'%s\''%(quarter_id, series)
        
        self.cursor.execute(sql_check)
        rows = self.cursor.fetchall()
        if len(rows) > 2:
            print('ERROR: Table `series` has multiple records for %s with quarters_id %s.'%(series, quarter_id))
            self.db.close()
            exit()
        elif len(rows) == 1:
            print('Warning: %s with quarters_id %s already has record in `series`.'%(series, quarter_id))
            return rows[0][0]
        else:
            sql_insert = 'INSERT INTO `series` (`quarters_id`, `name`'
            sql_values = 'VALUES (%s, \'%s\''%(quarter_id, series)
            if not (pd.isna(series_programmer) or len(series_programmer) < 1):
                sql_insert += ', `programmer`'
                sql_values += ', \'%s\''%series_programmer
            if not (pd.isna(series_slot) or len(series_slot) < 1):
                sql_insert += ', `slot`'
                sql_values += ', \'%s\''%series_slot
            if not (pd.isna(series_essay) or len(series_essay) < 1):
                sql_insert += ', `essay`'
                sql_values += ', \'%s\''%series_essay
            if not (pd.isna(series_notes) or len(series_notes) < 1):
                sql_insert += ', `notes`'
                sql_values += ', \'%s\''%series_notes
            sql_insert = sql_insert + ') ' + sql_values + ');'
            print(sql_insert)

            self.cursor.execute(sql_insert)
            self.db.commit()
            
            series_id = self.cursor.lastrowid
            
            return series_id

def addtables():
    # checks user wants to add tables to database
    answer = input('`addtables` command executed. This will add all defined tables to a blank database. If there are contents still in the database, possible data corruption could result. Confirm? [y/n]: ').lower()
    while True:
        if answer == 'y' or answer == 'yes':
            # double checks user wants to add tables to database
            second_answer = input('Are you sure? [y/n]: ').lower()
            while True:
                if second_answer == 'y' or second_answer == 'yes':
                    break
                elif second_answer == 'n' or second_answer == 'no':
                    print('Exiting now.')
                    exit()
                else:
                    continue
            break
        elif answer == 'n' or answer == 'no':
            print('Smart choice, exiting now.')
            exit()
        else:
            continue

    # initializes connection() object to handle credentials
    conn = connection()
    conn.get_creds()

    # attempts connection to database
    db = conn.open_conn()
    cursor = conn.get_cursor()

    create_films = '''
-- -----------------------------------------------------
-- Table `docfilmstest`.`films`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `docfilmstest`.`films` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(256) NOT NULL,
  `releaseyear` YEAR NULL,
  PRIMARY KEY (`id`),
  INDEX `releaseyear_idx` (`releaseyear` ASC) VISIBLE)
ENGINE = InnoDB;
    '''

    create_quarters = '''
-- -----------------------------------------------------
-- Table `docfilmstest`.`quarters`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `docfilmstest`.`quarters` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quarter` VARCHAR(45) NOT NULL,
  `year` YEAR NOT NULL,
  `startdate` DATE NULL,
  `enddate` DATE NULL,
  PRIMARY KEY (`id`),
  INDEX `year_idx` (`year` ASC) VISIBLE)
ENGINE = InnoDB;
    '''

    create_series = '''
-- -----------------------------------------------------
-- Table `docfilmstest`.`series`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `docfilmstest`.`series` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quarters_id` INT NOT NULL,
  `name` VARCHAR(256) NOT NULL,
  `slot` VARCHAR(256) NULL,
  `essay` TEXT NULL,
  `notes` TEXT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_series_quarters1_idx` (`quarters_id` ASC) VISIBLE,
  CONSTRAINT `fk_series_quarters1`
    FOREIGN KEY (`quarters_id`)
    REFERENCES `docfilmstest`.`quarters` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
    '''

    create_screenings = '''
-- -----------------------------------------------------
-- Table `docfilmstest`.`screenings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `docfilmstest`.`screenings` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `series_id` INT NULL,
  `capsule` TEXT NULL,
  `notes` TEXT NULL,
  `image_path` VARCHAR(256) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_screenings_series_idx` (`series_id` ASC) VISIBLE,
  CONSTRAINT `fk_screenings_series`
    FOREIGN KEY (`series_id`)
    REFERENCES `docfilmstest`.`series` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
    '''

    create_times = '''
-- -----------------------------------------------------
-- Table `docfilmstest`.`times`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `docfilmstest`.`times` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `screenings_id` INT NOT NULL,
  `showdate` DATE NOT NULL,
  `showtime` TIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_times_screenings1_idx` (`screenings_id` ASC) VISIBLE,
  INDEX `showdate_idx` (`showdate` ASC) VISIBLE,
  CONSTRAINT `fk_times_screenings1`
    FOREIGN KEY (`screenings_id`)
    REFERENCES `docfilmstest`.`screenings` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
    '''

    create_instances = '''
-- -----------------------------------------------------
-- Table `docfilmstest`.`instances`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `docfilmstest`.`instances` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `films_id` INT NOT NULL,
  `screenings_id` INT NOT NULL,
  `runtime` INT NULL,
  `format` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_instances_films1_idx` (`films_id` ASC) VISIBLE,
  INDEX `fk_instances_screenings1_idx` (`screenings_id` ASC) VISIBLE,
  CONSTRAINT `fk_instances_films1`
    FOREIGN KEY (`films_id`)
    REFERENCES `docfilmstest`.`films` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_instances_screenings1`
    FOREIGN KEY (`screenings_id`)
    REFERENCES `docfilmstest`.`screenings` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
    '''

    create_directors = '''
    -- -----------------------------------------------------
-- Table `docfilmstest`.`directors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `docfilmstest`.`directors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;
    '''

    create_programmers = '''
-- -----------------------------------------------------
-- Table `docfilmstest`.`programmers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `docfilmstest`.`programmers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;
    '''

    create_series_programmers = '''
-- -----------------------------------------------------
-- Table `docfilmstest`.`series_programmers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `docfilmstest`.`series_programmers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `programmers_id` INT NOT NULL,
  `series_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_series_programmers_programmers1_idx` (`programmers_id` ASC) VISIBLE,
  INDEX `fk_series_programmers_series1_idx` (`series_id` ASC) VISIBLE,
  CONSTRAINT `fk_series_programmers_programmers1`
    FOREIGN KEY (`programmers_id`)
    REFERENCES `docfilmstest`.`programmers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_series_programmers_series1`
    FOREIGN KEY (`series_id`)
    REFERENCES `docfilmstest`.`series` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
    '''

    create_films_directors = '''
-- -----------------------------------------------------
-- Table `docfilmstest`.`films_directors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `docfilmstest`.`films_directors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `films_id` INT NOT NULL,
  `directors_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_film_directors_films1_idx` (`films_id` ASC) VISIBLE,
  INDEX `fk_film_directors_directors1_idx` (`directors_id` ASC) VISIBLE,
  CONSTRAINT `fk_film_directors_films1`
    FOREIGN KEY (`films_id`)
    REFERENCES `docfilmstest`.`films` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_film_directors_directors1`
    FOREIGN KEY (`directors_id`)
    REFERENCES `docfilmstest`.`directors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
    '''

    '''
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
    '''
    
    cursor.execute(create_films)
    db.commit()
    print('Added table `films`')
    cursor.execute(create_quarters)
    db.commit()
    print('Added table `quarters`')
    cursor.execute(create_series)
    db.commit()
    print('Added table `series`')
    cursor.execute(create_screenings)
    db.commit()
    print('Added table `screenings`')
    cursor.execute(create_times)
    db.commit()
    print('Added table `times`')
    cursor.execute(create_instances)
    db.commit()
    print('Added table `instances`')
    cursor.execute(create_directors)
    db.commit()
    print('Added table `directors`')
    cursor.execute(create_programmers)
    db.commit()
    print('Added table `programmers`')
    cursor.execute(create_series_programmers)
    db.commit()
    print('Added table `series_programmers`')
    cursor.execute(create_films_directors)
    db.commit()
    print('Added table `films_directors`')

    # closes database connection
    db.close()

def droptables():
    # checks user wants to drop all tables in the database
    answer = input('`droptables` command executed. This will drop (DELETE) all defined tables. PROCEED IF YOU KNOW WHAT YOU ARE DOING. Confirm? [y/n]: ').lower()
    while True:
        if answer == 'y' or answer == 'yes':
            # double checks user wants to drop all tables in the database
            second_answer = input('Are you sure you want to drop (DELETE) all tables? [y/n]: ').lower()
            while True:
                if second_answer == 'y' or second_answer == 'yes':
                    break
                elif second_answer == 'n' or second_answer == 'no':
                    print('Exiting now.')
                    exit()
                else:
                    continue
            break
        elif answer == 'n' or answer == 'no':
            print('Smart choice, exiting now.')
            exit()
        else:
            continue

    # initializes connection() object to handle credentials
    conn = connection()
    conn.get_creds()

    # attempts connection to database
    db = conn.open_conn()
    conn.get_cursor()

    # calls connection() class to drop the tables
    conn.drop_table('instances')
    conn.drop_table('films_directors')
    conn.drop_table('series_programmers')
    conn.drop_table('programmers')
    conn.drop_table('films')
    conn.drop_table('directors')
    conn.drop_table('times')
    conn.drop_table('screenings')
    conn.drop_table('series')
    conn.drop_table('quarters')

    # closes database connection
    db.close()

def make_df(sheetpath, sheet_name):
    try:
        df = pd.read_excel(sheetpath, sheet_name=sheet_name)
        return df
    except FileNotFoundError:
        print('FileNotFoundError: \'' + sheetpath + '\' is not a valid file path. Please try again.')
        exit()
    except ValueError:
        print('TypeError: \'' + sheetpath + '\' is not a valid Excel (.xls, .xlsx, .xlsm, .xlsb, .odf, .ods, .odt) file. Please try again. OR you are accessing a sheet that is out-of-bounds (`sheet_name` index exceeds number of sheets).')
        exit()

def replace_nan_with_none(value):
    if pd.isna(value):
        return None
    else:
        return value

def try_col(row, header, null_check=False, null_suggest=False, series=''):
    # row: Pandas dataframe row
    # header: title of the column the value is in
    # null_check: True=will quit if nulls are found
    # null_suggest: True=will make user confirm nulls are intended if nulls are found
    # series_title: title of series must be used if null_suggest is True

    if null_suggest and len(series)<1:
        print('null_suggest set to `True` but no series_title given. Cannot compute. Exiting.')
        exit()
    
    try:
        value = row['%s'%header]
        if null_check and (pd.isna(value) or len(str(value).strip()) < 1):
            print('NullError: Cells in the \'%s\' column of the sheet contain blanks/nulls'%header)
            exit()
        elif null_suggest and (pd.isna(value) or len(str(value).strip()) < 1):
            while True:
                warning = input('Warning: The series \'%s\' does not have a defined %s value, proceed? [y/n] '%(series, header))
                if warning.lower() == 'y' or warning.lower() == 'yes':
                    return value
                elif warning.lower() == 'n' or warning.lower() == 'no':
                    print('\nNo value for the column %s for \'%s.\'\nPlease input a value in the capsules spreadsheet. Exiting.'%(header, series))
                    exit()
                else:
                    continue
        else:
            return value
    except KeyError:
        print('ColumnError: No column titled \'%s\' found. Please check the spreadsheet and try again.'%header)
        exit()

def format_value(header, value):
    if header == 'programmer':
        if pd.isna(value):
            return value
        elif '&' in value:
            print('The character \'&\' is not allowed in the programmer cell of the series info sheet. Please change to \'and\'. Affected programmer cell: %s'%repr(value))
            exit()
        else:
            programmer_list = []
            intermediate_list = value.split('and')
            for entry in intermediate_list:
                entry = entry.strip(' ,')
                entry_list = entry.split(',')
                for subentry in entry_list:
                    programmer_list.append(subentry.strip())
            return programmer_list
    elif header == 'title':
        title_list = []
        intermediate_list = value.split('//')
        for entry in intermediate_list:
            title_list.append(entry.strip())
        return title_list
    elif header == 'director':
        if '&' in value:
            print('The character \'&\' is not allowed in the director cell of the capsules sheet. Please change to \'and\'. Affected director cell: %s'%repr(value))
            exit()
        director_group_list = []
        intermediate_list = value.split('//')
        for group_of_directors in intermediate_list:
            director_list = []
            subintermediate_list = group_of_directors.split(' and ')
            for subentry in subintermediate_list:
                subentry = subentry.strip(' ,')
                directors = subentry.split(',')
                for director in directors:
                    director_list.append(director.strip())
            director_group_list.append(director_list)
        return director_group_list
    elif header == 'year':
        year_list = []
        intermediate_list = str(value).split('//')
        for year in intermediate_list:
            year = int(float(year.strip()))
            year_list.append(year)
        return year_list
    elif header == 'runtime':
        runtime_list = []
        intermediate_list = value.split('//')
        for runtime in intermediate_list:
            runtime = runtime.strip()
            runtime = int(''.join(char for char in str(runtime) if char.isnumeric()))
            if runtime >= 270:
                while True:
                    warning = input('Warning: A title has a runtime of %s, which is over 4.5 hours, proceed with input? [y/n] '%(value))
                    if warning.lower() == 'y' or warning.lower() == 'yes':
                        break
                    elif warning.lower() == 'n' or warning.lower() == 'no':
                        print('\nIf no title is over 4.5 hours in the spreadsheet, please check the formatting of the runtime. Preferred: ##m (e.g. 103m). Exiting now.')
                        exit()
                    else:
                        continue
            runtime_list.append(runtime)
        return runtime_list
    elif header == 'format':
        known_formats = ['35mm', '3d 35mm', '16mm', '3d 16mm', '3d dcp', 'dcp', '3d digital', 'digital']
        format_list = []
        intermediate_list = value.split('//')
        for format in intermediate_list:
            format = format.strip()
            if not (format.lower() in known_formats):
                while True:
                    warning = input('Warning: a format (%s) is not found in the list of known formats. Input into database? [y/n] \n Known formats: %s'%(value, repr(known_formats)))
                    if warning.lower() == 'y' or warning.lower() == 'yes':
                        break
                    elif warning.lower() == 'n' or warning.lower() == 'no':
                        print('\nPlease go back into capsules spreadsheet and correct the format.')
                        exit()
                    else:
                        continue
            format_list.append(format)
        return format_list
    elif header == 'quarter':
        possible_quarters = ['fall', 'winter', 'spring', 'summer']
        if (value.strip().lower() == 'autumn'):
            value = 'Fall'
        if not (value.strip().lower() in possible_quarters):
            print('Error: Quarter inputted was %s, which is not in known list of possible academic quarters. Please correct and try again. Possible quarters: %s'%(repr(value), repr(possible_quarters)))
            exit()
        return value.strip()
    else:
        print('No header titled \'%s\' with defined formatting instructions. Check code and try again.')
        exit()

def format_capsules_sheet(capsules_path, quarter, year, exrows_capsules, exrows_series):
    # Attempts to turn a properly formatted capsules spreadsheet located at capsules_path
    # into a pandas dataframe. Handles exceptions if errors are raised.
    # A properly formatted spreadsheet is one with a separate sheet for series info and essays

    # turns the second sheet (the series info) in the Excel document into a pandas dataframe
    series_df = make_df(capsules_path, 1)

    # formats academic quarter off the bat
    quarter = format_value('quarter', quarter)

    #initializes dictionary containing each series
    series_dict = {}

    count = 0
    # iterates over all rows in the dataframe (i.e. spreadsheet)
    for index, row in series_df.iterrows():
        # count allows us to skip over example rows
        count+=1
        if count <= exrows_series:
            continue

        # assigns slot to a variable, handles not finding a slot column
        series_slot = str(try_col(row, 'slot', null_check=True)).strip()

        # inputs series information into dict if not present
        if not series_slot in series_dict:

            # assigns the series title to a variable, handles not finding a series column
            series_title = str(try_col(row, 'series title', null_check=True)).strip()

            # assigns programmer to a variable, handles not finding a programmer column, formats 
            # the programmer cell into a list of all programmers
            programmer = try_col(row, 'programmer', null_suggest=True, series=series_title) 
            programmer_list = format_value('programmer', programmer)

            # assigns essay to a variable
            essay = try_col(row, 'essay')

            # assigns notes to a variable
            series_notes = try_col(row, 'notes')

            # actual lines that inputs the series data into the dict
            series_dict[series_slot] = [series_title, programmer_list, essay, series_notes]
    
    # turns the second sheet (the series info) in the Excel document into a pandas dataframe
    capsules_df = make_df(capsules_path, 0)
    
    # initialized dictionary that links all screenings in a slot to a key
    screenings_dict = {}

    count = 0
    # iterates over all rows in the dataframe (i.e. spreadsheet)
    for index, row in capsules_df.iterrows():
        # count allows us to skip over example rows
        count+=1
        if count <= exrows_capsules:
            continue

        # assigns slot to a variable, handles not finding a slot column
        slot = str(try_col(row, 'slot', null_check=True)).strip()

        # inputs series information into dict if not present
        if not slot in screenings_dict:
            screenings_dict[slot] = []

        title = try_col(row, 'title', null_check=True)
        title_list = format_value('title', title)

        director = try_col(row, 'director', null_check=True)
        director_list = format_value('director', director)

        if len(title_list) != len(director_list) and len(director_list) != 1:
            print('NumberError: The number of titles for a screening is different the number of sets of directors. Format must be like: "Con Air // Goodfellas", "Joel Coen and Ethan Coen // Martin Scorcese". Screening affected is: %s'%repr(title_list))
            exit()

        # assigns release_year, runtime, format, capsules, and public notes to variables
        release_year = try_col(row, 'year', null_check=True)
        release_year_list = format_value('year', release_year)

        runtime = try_col(row, 'runtime', null_check=True)
        runtime_list = format_value('runtime', runtime)

        if len(title_list) != len(release_year_list) or len(title_list) != len(runtime_list):
            print('NumberError: The number of titles for a screening is different than either the number of release years OR the number of formats OR the number of runtimes. Year/runtime/format must be like formatted in the capsules sheet as "Movie 1 // Movie 2", "Runtime 1 // Runtime 2", "Format 1 // Format 2". Screening affected is: %s'%repr(title_list))
            exit()

        format = try_col(row, 'format', null_check=True)
        format_list = format_value('format', format)

        if len(title_list) != len(format_list) and len(format_list) != 1:
            print('NumberError: The number of titles for a screening is different the number of sets of directors. Format must be like: "Con Air // Goodfellas", "Joel Coen and Ethan Coen // Martin Scorcese". Screening affected is: %s'%repr(title_list))
            exit()

        capsule = try_col(row, 'capsule', null_check=True).strip()

        pub_notes = try_col(row, 'public notes')
        if not pd.isna(pub_notes):
            pub_notes = pub_notes.strip()

        image_path = '/images/%s%s/'%(str(year).strip(), quarter.lower())     # incomplete for now
        
        showtime_list = []
        showtime_count = 0
        while True:
            showtime_count += 1
            try:
                showdate = row['showdate%s'%str(showtime_count)]
                showtime = row['showtime%s'%str(showtime_count)]
                if (pd.isna(showdate) or len(str(showdate).strip()) < 1) or (pd.isna(showtime) or len(str(showtime).strip()) < 1):
                    continue
                showdate = showdate.strftime('%Y-%m-%d')
                showtime = showtime.strftime('%H:%M:%S')
                showtime_list.append((showdate, showtime))
            except KeyError:
                break
        if len(showtime_list) < 1:
            print('Error: No showtimes listed for a screening. Please check the capsules spreadsheet. Screening affected: %s'%repr(title_list))
            exit()

        new_title_list = []

        subcount = 0
        while subcount < len(title_list):
            # current_title will be in the form:
            # [name_of_movie, [list_of_directors], format, release_year, runtime]
            current_title = []
            current_title.append(title_list[subcount])
            
            if len(director_list) == 1:
                director = director_list[0]
            else:
                director = director_list[subcount]
            current_title.append(director)

            if len(format_list) == 1:
                format = format_list[0]
            else:
                format = format_list[subcount]
            current_title.append(format)

            current_title.extend([release_year_list[subcount], runtime_list[subcount]])

            new_title_list.append(current_title)

            subcount += 1
        
        screening = [new_title_list, showtime_list, capsule, pub_notes, image_path]
        screenings_dict[slot].append(screening)
    
    if len(screenings_dict) != len(series_dict):
        print('Error: The capsules sheet says there are %s series, but the series info sheet says there are %s. Please make all the values in the slots column on the capsules sheet is properly capitalized to match the slot column value on the series sheet. Also, make sure to include a special events series on the series info sheet!'%(len(screenings_dict), len(series_dict)))
        exit()

    total_screenings = 0
    try:
        for key in screenings_dict:
            series_dict[key].append(screenings_dict[key])
            total_screenings += len(series_dict[key][-1])
    except KeyError:
        print('KeyError: There are equal numbers of unique `slot` values in the capsules sheet as there are series in the series info sheet, but one or more of the `slot` values in the capsules sheet does not have a corresponding series in the series info sheet. Make sure you are using Roman and Arabic numerals consistently (e.g. Thursday 2 everywhere and not switching to Thursday II).')
        exit()

    while True:
        notice = input('\nNotice:\n\t%s %s\n\tTotal number of series: %s\n\tTotal number of screenings: %s\nIs this correct? [y/n] '%(quarter, year, len(series_dict), total_screenings))
        if notice.lower() == 'y' or notice.lower() == 'yes':
            print('Okay. Capsule spreadsheet properly formatted.')
            break
        elif notice.lower() == 'n' or notice.lower() == 'no':
            print('\nPlease go back into capsules spreadsheet and correct any mistakes.')
            exit()
        else:
            continue

    return [quarter, year, series_dict]

def input_formatted_capsules(formatted_capsules):
    conn = connection()
    conn.get_creds()
    db = conn.open_conn()
    conn.get_cursor()

    quarter, year, series_dict = formatted_capsules

    quarter_id = conn.new_quarter(quarter, year)

    for slot in series_dict:

        series_id = conn.new_series_formatted_capsules(quarter_id, series_dict[slot], slot)

        for screening in series_dict[slot][-1]:
            conn.new_screening_formatted_capsules(series_id, screening)

    db.close()

# formats archived screenings spreadsheet for database input
def format_archived_screenings(sheetpath):
    
    # turns archival excel into pandas dataframe
    archive = make_df(sheetpath)

    # sorts screenings chronologically
    archive.sort_values(by=['Series', 'Date'], inplace=True)

    # defines the formatted object to return
    screenings_dict = {
        "with_series": [],
        "without_series": []
    }

    # defines variable short-cuts
    series_list = screenings_dict["with_series"]
    sans_series_list = screenings_dict["without_series"]

    # iterates over all rows in the dataframe
    for index, row in archive.iterrows():

        # puts row information into readable variables
        screening_title = row['Title']
        series_title = row['Series']
        director = row['Director']
        release_year = row['Year']
        screening_date = row['Date']
        notes = row['Notes']

        # formats director
        if not pd.isna(director) and not len(str(director).strip()) < 1:
            director = str(director).strip()

        # formats release_year
        if not pd.isna(release_year) and not len(str(release_year).strip()) < 1:
            release_year = int(str(release_year)[0:4])

        # formats screening_date, handles blank dates
        try:
            screening_date = screening_date.strftime('%Y-%m-%d')
        except ValueError:
            print('ERROR: a value in the \'Date\' column around row %s is blank. Please try again'%index)
            

        # checks if given row has series or not
        if not pd.isna(series_title) and not len(str(series_title).strip()) < 1:
            continue
        elif pd.isna(series_title) or len(str(series_title).strip()) < 1:
            sans_series_list.append([screening_title, director, release_year, screening_date, notes])
    
    print(sans_series_list)
    return screenings_dict

# def main():
#     parser = argparse.ArgumentParser(description='A command line program that communicates to Doc\'s filmsdb database to modify existing tables, add new series, mass-input prior screenings, and more.')

#     args = parser.parse_args()


if __name__ == "__main__":
    # main()

    # format_archived_screenings(r'C:\Users\camer\docfilms-github\site\database\2022-09-05-archive-screenings-for-database.xlsx')

    droptables()
    addtables()

    capsules_path_list = [
        ('Fall', 2021, 2, 1, r'C:\Users\camer\docfilms-github\site\database\capsules_spreadsheets\Fall 2021 Capsules.xlsx'),
        ('Summer', 2022, 2, 1, r'C:\Users\camer\docfilms-github\site\database\capsules_spreadsheets\Summer 2022 Capsules.xlsx'),
        ('Winter', 2022, 2, 1, r'C:\Users\camer\docfilms-github\site\database\capsules_spreadsheets\Winter 2022 Capsules.xlsx'),
        ('Spring', 2022, 2, 1, r'C:\Users\camer\docfilms-github\site\database\capsules_spreadsheets\Spring 2022 Capsules.xlsx'),
        ('Autumn', 2022, 2, 1, r'C:\Users\camer\docfilms-github\site\database\capsules_spreadsheets\Autumn 2022 Capsules.xlsx')
    ]

    for capsule_tuple in capsules_path_list:
        quarter, year, exrows_capsules, exrows_series, capsules_path = capsule_tuple
        formatted_capsules = format_capsules_sheet(capsules_path, quarter, year, exrows_capsules, exrows_series)
        input_formatted_capsules(formatted_capsules)



def inputcaps_historic(sheetpath, quarter, year, exrows):
    # Attempts to turn a pre-Summer 2022 capsules spreadsheet located at sheetpath
    # into a pandas dataframe. Handles exceptions if errors are raised.
    # A pre-Summer 2022 spreadsheet is one without a separate sheet for series essays
    caps_df = make_df(sheetpath)

    #initializes dictionary containing each series
    series_dict = {}

    count = 0
    # iterates over all rows in the dataframe (i.e. spreadsheet)
    for index, row in caps_df.iterrows():
        # count allows us to skip over example rows
        count+=1
        if count <= exrows:
            continue
        
        # assigns the series title to a variable, handles not finding a series column
        series_title = str(try_col(row, 'series', null_check=True)).strip()

        # inputs series information into dict if not present
        if not series_title in series_dict:
            # assigns programmer to a variable, handles not finding a programmer column
            programmer = try_col(row, 'programmer', null_suggest=True, series=series_title) 

            # assigns slot to a variable, handles not finding a slot column
            slot = try_col(row, 'slot', null_suggest=True, series=series_title)

            # actual lines that inputs the series data into the dict
            series_dict[slot] = [series_title, programmer, []]
        
        # assigns last element of the list containg the series as the list of the titles in the series
        title_list = series_dict[series_title][-1]

        # assigns title, director, and year to variables. Handles nulls
        title = try_col(row, 'title', null_check=True)
        director = try_col(row, 'director', null_check=True)
        release_year = try_col(row, 'year', null_check=True)

        # assigns runtime, format, and public notes to variables
        runtime = format_value('runtime', try_col(row, 'runtime'))
        format = try_col(row, 'format')
        capsule = repr(try_col(row, 'capsule'))
        pub_notes = try_col(row, 'public notes')

        # inputs that info into the title_list
        title_list.append([title, director, release_year, runtime, format, capsule, pub_notes, []])

        showtime_count = 0
        while True:
            showtime_count += 1
            try:
                showdate = row['showdate%s'%str(showtime_count)]
                showtime = row['showtime%s'%str(showtime_count)]
                if (pd.isna(showdate) or len(str(showdate).strip()) < 1) or (pd.isna(showtime) or len(str(showtime).strip()) < 1):
                    continue
                showdate = showdate.strftime('%Y-%m-%d')
                showtime = showtime.strftime('%H:%M:%S')
                title_list[-1][-1].append((showdate, showtime))
            except KeyError:
                break
    
    conn = connection()
    conn.get_creds()
    db = conn.open_conn()
    conn.get_cursor()

    quarter_id = conn.new_quarter(quarter, year)

    for series in series_dict:
        series_id = conn.new_series(quarter_id, series, series_programmer=series_dict[series][0], series_slot=series_dict[series][1])
        print('%s: %s'%(series, series_id))

    db.close()
    exit()

def pprint_inputcaps_historic(dict):
    # helps to check if inputcaps_historic is working
    # by printing out a 'pretty' version of the formatted dict
    f = open('pprint_inputcaps_historic.out', 'w', encoding="utf-8")
    for series in dict:
        f.write('%s: %s, %s\n'%(series, dict[series][0], dict[series][1]))
        for title in dict[series][-1]:
            count = -1
            time_string = ''
            while True:
                count += 1
                try:
                    title[-1][count]
                    time_string += '%s at %s, '%(title[-1][count][0], title[-1][count][1])
                except IndexError:
                    break
            f.write('\t%s, by %s, %s, %smin, %s, %s, %s, %s\n'%(title[0], title[1], title[2], title[3], title[4], title[5], title[6], time_string))
    f.close()

def extra():
    # YOU MUST INITIALIZE THE VARIABLES BELOW EACH TIME YOU RUN THIS PROGRAM
    # input the name of the .xlsx spreadsheet and its containing folder that you are seeking to format
    spreadsheet_name = 'Spring-2022-Capsules.xlsx'
    containing_directory = 'capsules_spreadsheets'
    quarter = 'Spring' # use 'Fall' and NOT 'Autumn'
    year = '2022'
    # input the number of example rows in the capsules spreadsheet. MAKE SURE TO CHANGE THIS IF IT CHANGES
    example_rows = 2
    # input the maximum number of repeat screenings of a single title per quarter
    max_repeats = 0

    print(os.path.join(ROOT_DIR, containing_directory, spreadsheet_name))
    # creates a pandas dataframe from the spreadsheet
    # os.path.join is used to create the path name for the spreadsheet
    capsules_dataframe = pd.read_excel(os.path.join(ROOT_DIR, containing_directory, spreadsheet_name))

    #initializes dictionary containing each series
    series_dictionary = {}

    count = 0
    # iterates over all rows in the dataframe (i.e. spreadsheet)
    for index, row in capsules_dataframe.iterrows():
        # count allows us to skip over example rows
        count+=1
        if count <= example_rows:
            continue
        series_title = row['series']
        # checks and handles for NaNs in series column
        if pd.isna(series_title) or len(str(series_title).strip()) < 1:
            print('TypeError: cells in the \'series\' column of ' + spreadsheet_name + ' contain blanks/nulls')
            exit()
        series_title = str(series_title).strip()
        # inputs series information into a dictionary
        if not series_title in series_dictionary:
            series_dictionary[series_title] = [row['programmer'], row['slot'], quarter, year, []]
        title_list = series_dictionary[series_title][-1]
        # checks and handles for title, director, and year column (essential columns)
        if pd.isna(row['title']) or pd.isna(row['director']) or pd.isna(row['year']):
            print('TypeError: either \'title\', \'director\', or \'year\' are null/blank. Please check ' + spreadsheet_name + ' that all titles, directors, and years present')
        if pd.isna(row['runtime']):
            row['runtime'] = 'None found'
        if pd.isna(row['format']):
            row['format'] = 'None found'
        if pd.isna(row['public notes']):
            row['public notes'] = 'None'
        # inputs information on titles in a series
        title_list.append([row['title'], row['director'], str(int(row['year'])), row['runtime'], row['format'], row['public notes'], int(row['showdate1'].strftime('%m%d')), int(row['showtime1'].strftime('%H%M'))])
        # inputs screening date and time into title list
        for i in range(max_repeats-1):
            num = i+2
            showdate = 'showdate' + str(num)
            showtime = 'showtime' + str(num)
            if pd.isna(row[showdate]) and pd.isna(row[showtime]):
                continue
            title_list[-1][5] = title_list[-1][5] + "  -- repeated on " + row[showdate].strftime('%m/%d') + " at " + row[showtime].strftime('%H:%M')

    num_screenings = 0
    for series_item in series_dictionary:
        num_screenings += len(series_dictionary[series_item][-1])


    # sanity check on number of series you're inputting
    print("\nNumber of series ready to input: " + str(len(series_dictionary)))
    print("\nNumber of screenings to input: " + str(num_screenings))
    answer = input("\nReady to input these titles into the database? [y/n]: ")
    if answer.lower() == 'y' or answer.lower() == 'yes':
        pass
    elif answer.lower() == 'n' or answer.lower() == 'no':
        exit()
    else:
        print('Cannot understand response. Exiting now')
        exit()

    # asks for inputs for these four variables through command line pop-up
    db_server = input("Input database server: ")
    db_user = input("Input username: ")
    db_pass = input("Input password: ")
    db_name = input("Input database name: ")

    # initializes connection and cursor to interact with the database
    db = pymysql.connect(host=db_server, user=db_user, password=db_pass, database=db_name)
    cursor = db.cursor()

    for series_item in series_dictionary:
        series_programmer = series_dictionary[series_item][0]
        series_slot = series_dictionary[series_item][1]
        series_quarter = series_dictionary[series_item][2]
        series_year = series_dictionary[series_item][3]

        # prevents repeat rows in the series table, inserts series if no repeats
        query_is_series_in_db = 'SELECT 1 FROM series WHERE series.name = "%s" AND series.programmer = "%s" AND series.slot = "%s" AND series.quarter = "%s" AND series.year = "%s";'%(series_item, series_programmer, series_slot, series_quarter, series_year)
        if int(cursor.execute(query_is_series_in_db)) == 1:
            print('Series titled: _' + series_item + '_ already exits! Will not insert again. If you need to override/modify the screening data of this particular series, access the database via phpMyAdmin and delete the series and all child records, then run this module again\n')
            continue
        elif int(cursor.execute(query_is_series_in_db)) == 0:
            insert_series = 'INSERT INTO series (series.name, series.programmer, series.slot, series.quarter, series.year) VALUES ("%s", "%s", "%s", "%s", "%s");'%(series_item, series_programmer, series_slot, series_quarter, series_year)
            print(insert_series)
            cursor.execute(insert_series)
            db.commit()

            query_series_id = 'SELECT id FROM series WHERE series.name = "%s" AND series.programmer = "%s" AND series.slot = "%s" AND series.quarter = "%s" AND series.year = "%s";'%(series_item, series_programmer, series_slot, series_quarter, series_year)
            cursor.execute(query_series_id)
            series_id = cursor.fetchone()[0]

        for title_item in series_dictionary[series_item][-1]:
            movie_title = title_item[0]
            movie_director = title_item[1]
            movie_year = title_item[2]
            movie_runtime = title_item[3]
            movie_format = title_item[4]
            movie_notes = title_item[5]
            movie_date = title_item[6]
            movie_time = title_item[7]
            insert_films = 'INSERT INTO films (films.series_id, films.title, films.director, films.year, films.runtime, films.format, films.notes, films.date, films.time) VALUES (%s, "%s", "%s", "%s", "%s", "%s", "%s", %s, %s);'%(series_id, movie_title, movie_director, movie_year, movie_runtime, movie_format, movie_notes, movie_date, movie_time)
            cursor.execute(insert_films)
            db.commit()

    # closes connection
    db.close()