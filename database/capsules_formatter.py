# This module takes a properly formatted Doc Films capsule spreadsheet and
# outputs properly formatted data for database insertion.

# re comes with python
import re                   #for regular expressions

# I had to install pandas by using miniconda then
# installed pandas using `conda install pandas` in the command line
# also had to install openpyxl with `conda instsall openpyxl` in the command line
import pandas as pd         #for pandas

# allows for defining a path name for the directory containing these files, regardless of user's machine
# ROOT_DIR is just database/ for our case
import os
from config.definitions import ROOT_DIR

# input the name of the .xlsx spreadsheet and its containing folder that you are seeking to format
spreadsheet_name = 'database-example-summer-2022-capsules.xlsx'
containing_directory = 'capsules_spreadsheets'

# input the number of example rows in the capsules spreadsheet. MAKE SURE TO CHANGE THIS IF IT CHANGES
example_rows = 2

# creates a pandas dataframe from the spreadsheet
# os.path.join is used to create the path name for the spreadsheet
capsules_dataframe = pd.read_excel(os.path.join(ROOT_DIR, containing_directory, spreadsheet_name))

series_dictionary = {}

for row in capsules_dataframe:
    series_title = str(row['c19'])
    if not series_title in series_dictionary:
        series_dictionary{series_title:[]}

print(series_dictionary)
