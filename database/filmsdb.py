# This module takes a properly formatted Doc Films capsule spreadsheet and
# outputs properly formatted data for database insertion.

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

class credentials:
    def __init__(self):
        self.db_server = ''
        self.db_name = 'filmsdb'
        self.db_user = ''
        self.db_pass = ''
    def get_creds(self):
        self.db_server = input("Input database server: ")
        self.db_user = input("Input username: ")
        self.db_pass = getpass('Input password: ')

def inputcaps(sheetpath, quarter, year, exrows):
    # Attempts to turn the capsules spreadsheet located at sheetpath
    # into a pandas dataframe. Handles exceptions if errors are raised.
    try:
        caps_df = pd.read_excel(sheetpath)
    except FileNotFoundError:
        print('FileNotFoundError: \'' + sheetpath + '\' is not a valid file path. Please try again.')
    except ValueError:
        print('ValueError: \'' + sheetpath + '\' is not a valid Excel (.xls, .xlsx, .xlsm, .xlsb, .odf, .ods, .odt) file. Please try again.')


def main():
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


if __name__ == "__main__":
    print('---------------------------------------------------------------------------\ndocdb is a command line program that facilitates modifying existing tables,\nadding new series, and mass-inputting prior screenings.\n\nPlease use `filmsdb -h` to see more information.\n---------------------------------------------------------------------------')
    inputcaps(r'C:\Users\camer\docfilms-github\site\database\capsules_spreadsheets\Spring-2022-Capsules.xlsx', 'spring', 2022, 2)
    #main()