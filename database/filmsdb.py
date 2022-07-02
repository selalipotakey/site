# re (regular expressions) comes with python
import re

# I had to install pandas by using miniconda, then
# I installed pandas using `conda install pandas` in the command line
# also had to install openpyxl with `conda instsall openpyxl` in the command line
import pandas as pd

# allows for defining a path name for the directory containing these files, regardless of user's machine
# ROOT_DIR is just database/ for our case
import os
from config.definitions import ROOT_DIR

# allows for connection to the database using python 3
import pymysql

# allows for a hidden password input
from getpass import getpass

# builds a command line interface (CLI)
import argparse

class connection:
    def __init__(self):
        self.db_server = ''
        self.db_name = 'docfilmstest'
        self.db_user = ''
        self.db_pass = ''

    def get_creds(self):
        self.db_server = input("Input database server: ")
        self.db_user = input("Input username: ")
        self.db_pass = getpass('Input password: ')

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
  `programmer` VARCHAR(256) NULL,
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
ENGINE = InnoDB;'''

    create_screenings = '''
-- -----------------------------------------------------
-- Table `docfilmstest`.`screenings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `docfilmstest`.`screenings` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `series_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_screenings_series_idx` (`series_id` ASC) VISIBLE,
  CONSTRAINT `fk_screenings_series`
    FOREIGN KEY (`series_id`)
    REFERENCES `docfilmstest`.`series` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;'''

    create_films = '''
-- -----------------------------------------------------
-- Table `docfilmstest`.`films`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `docfilmstest`.`films` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `screenings_id` INT NOT NULL,
  `title` VARCHAR(256) NOT NULL,
  `director` VARCHAR(256) NULL,
  `releaseyear` YEAR NULL,
  `runtime` INT NULL,
  `format` VARCHAR(45) NULL,
  `capsule` TEXT NULL,
  `notes` TEXT NULL,
  `imagepath` VARCHAR(256) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_films_screenings1_idx` (`screenings_id` ASC) VISIBLE,
  INDEX `releaseyear_idx` (`releaseyear` ASC) VISIBLE,
  CONSTRAINT `fk_films_screenings1`
    FOREIGN KEY (`screenings_id`)
    REFERENCES `docfilmstest`.`screenings` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;'''

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
    cursor.execute(create_quarters)
    db.commit()
    print('Added table `quarters`')
    cursor.execute(create_series)
    db.commit()
    print('Added table `series`')
    cursor.execute(create_screenings)
    db.commit()
    print('Added table `screenings`')
    cursor.execute(create_films)
    db.commit()
    print('Added table `films`')
    cursor.execute(create_times)
    db.commit()
    print('Added table `times`')

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

    # calls connection() class to drop the tables
    conn.drop_table('films')
    conn.drop_table('times')
    conn.drop_table('screenings')
    conn.drop_table('series')
    conn.drop_table('quarters')

    # closes database connection
    db.close()

def inputcaps(sheetpath, quarter, year, exrows):
    # Attempts to turn the capsules spreadsheet located at sheetpath
    # into a pandas dataframe. Handles exceptions if errors are raised.
    try:
        caps_df = pd.read_excel(sheetpath)
    except FileNotFoundError:
        print('FileNotFoundError: \'' + sheetpath + '\' is not a valid file path. Please try again.')
        exit()
    except ValueError:
        print('PathError: \'' + sheetpath + '\' is not a valid Excel (.xls, .xlsx, .xlsm, .xlsb, .odf, .ods, .odt) file. Please try again.')
        exit()

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
        try:
            series_title = row['series']
        except KeyError:
            print('ColumnError: No column titled \'series\' found. Please check the spreadsheet and try again.')
            exit()

        # checks and handles for NaNs in series column
        if pd.isna(series_title) or len(str(series_title).strip()) < 1:
            print('NullError: Cells in the \'series\' column of the sheet contain blanks/nulls')
            exit()
        
        series_title = str(series_title).strip()
        # inputs series information into a dictionary
        if not series_title in series_dict:
            # assigns programmer to a variable, handles not finding a programmer column
            try:
                programmer = row['programmer'] 
            except KeyError:
                print('ColumnError: No column titled \'programmer\' found. Please check the spreadsheet and try again.')
                exit()
            
            # assigns slot to a variable, handles not finding a slot column
            try:
                slot = row['slot']
            except KeyError:
                print('ColumnError: No column titled \'slot\' found. Please check the spreadsheet and try again.')
                exit()

            # handles missing/null values for programmer
            if pd.isna(programmer) or len(str(programmer).strip()) < 1:
                while True:
                    prog_warning = input('Warning: The series \'' + series_title + '\' does not have a programmer, proceed? [y/n] ')
                    if prog_warning.lower() == 'y' or prog_warning.lower() == 'yes':
                        break
                    elif prog_warning.lower() == 'n' or prog_warning.lower() == 'no':
                        print('\nNo programmer for \'' + series_title + '.\'\nPlease input a programmer in the capsules spreadsheet. Exiting.')
                        exit()
                    else:
                        continue

            # handles missing/null values for slot
            if pd.isna(slot) or len(str(slot).strip()) < 1:
                while True:
                    slot_warning = input('Warning: The series \'' + series_title + '\' does not have a slot defined, proceed? [y/n] ')
                    if slot_warning.lower() == 'y' or slot_warning.lower() == 'yes':
                        break
                    elif slot_warning.lower() == 'n' or slot_warning.lower() == 'no':
                        print('\nNo slot for \'' + series_title + '.\'\nPlease input a slot in the capsules spreadsheet. Exiting.')
                        exit()
                    else:
                        continue

            # actual line that inputs the series data
            series_dict[series_title] = [programmer, slot, quarter, year, []]


            title_list = series_dict[series_title][-1]
            # checks and handles for title, director, and year column (essential columns)

            # assigns title to a variable, handles not finding a title column
            try:
                title = row['title'] 
            except KeyError:
                print('ColumnError: No column titled \'title\' found. Please check the spreadsheet and try again.')
                exit()

            # assigns director to a variable, handles not finding a director column
            try:
                director = row['director'] 
            except KeyError:
                print('ColumnError: No column titled \'director\' found. Please check the spreadsheet and try again.')
                exit()

            # assigns year to a variable, handles not finding a year column
            try:
                release_year = int(row['year'])
            except KeyError:
                print('ColumnError: No column titled \'year\' found. Please check the spreadsheet and try again.')
                exit()
            except ValueError:
                print('ValueError: A value in the \'year\' column is not an integer. Please check that there are no non-numerical characters in the \'year\' column.')


            if pd.isna(title) or len(str(title)) < 1:
                print('NullError: A row has blanks/nulls in the \'title\' column. Please check spreadsheet that all titles are present.')
            elif pd.isna(director) or len(str(director)) < 1:
                print('NullError: A row has blanks/nulls in the \'director\' column. Please check spreadsheet that all directors are present.')
            elif pd.isna(release_year) or len(str(release_year)) < 1:
                print('NullError: A row has blanks/nulls in the \'year\' column. Please check spreadsheet that all year are present.')

        exit()


        # inputs information on titles in a series
        title_list.append(title, director, release_year, row['runtime'], row['format'], row['public notes'], int(row['showdate1'].strftime('%m%d')), int(row['showtime1'].strftime('%H%M')))
        # inputs screening date and time into title list
        for i in range(max_repeats-1):
            num = i+2
            showdate = 'showdate' + str(num)
            showtime = 'showtime' + str(num)
            if pd.isna(row[showdate]) and pd.isna(row[showtime]):
                continue
            title_list[-1][5] = title_list[-1][5] + "  -- repeated on " + row[showdate].strftime('%m/%d') + " at " + row[showtime].strftime('%H:%M')

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

def main():
    parser = argparse.ArgumentParser(description='A command line program that communicates to Doc\'s filmsdb database to modify existing tables, add new series, mass-input prior screenings, and more.')

    args = parser.parse_args()


if __name__ == "__main__":
    main()
    #inputcaps(r'C:\Users\camer\docfilms-github\site\database\capsules_spreadsheets\Spring-2022-Capsules-testing.xlsx', 'spring', 2022, 2)
    addtables()