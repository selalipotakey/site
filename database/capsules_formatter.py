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

# input the name of the .xlsx spreadsheet and its containing folder that you are seeking to format
spreadsheet_name = 'database-example-summer-2022-capsules.xlsx'
containing_directory = 'capsules_spreadsheets'

# input the number of example rows in the capsules spreadsheet. MAKE SURE TO CHANGE THIS IF IT CHANGES
example_rows = 2

# input the maximum number of repeat screenings of a single title per quarter
max_repeats = 3

# creates a pandas dataframe from the spreadsheet
# os.path.join is used to create the path name for the spreadsheet
capsules_dataframe = pd.read_excel(os.path.join(ROOT_DIR, containing_directory, spreadsheet_name))

series_dictionary = {}


count = 0
# iterates over all rows in the dataframe (i.e. spreadsheet)
for index, row in capsules_dataframe.iterrows():
    # count allows us to skip over example rows
    count+=1
    if count <= example_rows:
        continue
    series_title = row['series']
    # quits if series cell for given row is blank or an empty string
    if pd.isna(series_title) or len(str(series_title).strip()) < 1:
        print('TypeError: cells in the \'series\' column of ' + spreadsheet_name + ' contain blanks/nulls')
        exit()
    series_title = str(series_title).strip()
    if series_title in series_dictionary:
        continue
    series_dictionary[series_title] = [row['programmer'], row['slot'], []]

print(series_dictionary)
