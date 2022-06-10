import pymysql



db_server = input("Input database server: ")
db_user = input("Input username: ")
db_pass = input("Input password: ")
db_name = input("Input database name: ")

db = pymysql.connect(host=db_server, user=db_user, password=db_pass, database=db_name)
cursor = db.cursor()

db.close()
