''' This module takes a properly formatted Doc Films capsule spreadsheet and
outputs properly formatted data for database insertion. '''

''' Users will need to download Python on their machines as well as Anaconda '''

import re                   #for regular expressions
import pandas as pd         #pandas

''' input the name of the .xlsx spreadsheet in capsules_spreadsheets/ that you are seeking to format '''
spreadsheet_name = 'database-example-summer-2022.xlsx'

''' input the number of example rows in the capsules spreadsheet. MAKE SURE TO CHANGE THIS IF IT CHANGES '''
example_rows = 2
