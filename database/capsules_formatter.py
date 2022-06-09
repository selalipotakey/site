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

# YOU MUST INITIALIZE THE VARIABLES BELOW EACH TIME YOU RUN THIS PROGRAM
# input the name of the .xlsx spreadsheet and its containing folder that you are seeking to format
spreadsheet_name = 'database-example-summer-2022-capsules.xlsx'
containing_directory = 'capsules_spreadsheets'
quarter = 'Summer' # use 'Fall' and NOT 'Autumn'
year = '2022'
# input the number of example rows in the capsules spreadsheet. MAKE SURE TO CHANGE THIS IF IT CHANGES
example_rows = 2
# input the maximum number of repeat screenings of a single title per quarter
max_repeats = 3

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
        series_dictionary[series_title] = [row['programmer'], row['slot'], []]
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
    title_list.append([row['title'], row['director'], str(int(row['year'])), row['runtime'], row['format'], row['public notes'], []])
    # inputs screening date and time into title list
    for i in range(max_repeats):
        num = i+1
        showdate = 'showdate' + str(num)
        showtime = 'showtime' + str(num)
        if pd.isna(row[showdate]) and pd.isna(row[showtime]):
            continue
        title_list[-1][-1].append([row[showdate].strftime('%m%d'), row[showtime].strftime('%H:%M')])


for series_item in series_dictionary:
    for title_item in series_dictionary[series_item][-1]:
        print(title_item)


# asks for inputs for these four variables through command line pop-up
db_server = input("Input database server: ")
db_user = input("Input username: ")
db_pass = input("Input password: ")
db_name = input("Input database name: ")

# initializes connection and cursor to interact with the database
db = pymysql.connect(host=db_server, user=db_user, password=db_pass, database=db_name)
cursor = db.cursor()

# closes connect
db.close()
