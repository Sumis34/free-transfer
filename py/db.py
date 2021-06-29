import mysql.connector
import json
  
def db_start():
    # Opening JSON file '../datenbank_connector/secret.json' for linux
    data = json.load(open('datenbank_connector/secret.json'))

    db = mysql.connector.connect(
    host="localhost",
    user=data['db_username'],
    database="transfer",
    password=data['db_password']
    )

    if db.is_connected():
        #print('Connected to MySQL database')
        pass

    return db

def delete_file(file_name):
    try:
        db = db_start()

        file_path = "./uploads/" + file_name

        cursor = db.cursor()

        sql = "DELETE FROM files WHERE file_path = %s"

        val = (file_path, )

        cursor.execute(sql, val)

        db.commit()

        print(cursor.rowcount, "record(s) deleted")

        return True
    except Exception as e:
        print(e)
        return e

def get_file(file_name = None):

    try:
        db = db_start()

        cursor = db.cursor()

        #If no path is provided select all files

        if file_name is None:
            sql = "SELECT * FROM files"
            cursor.execute(sql)

        else:
            file_path = "./uploads/" + file_name
            sql = "SELECT * FROM files WHERE file_path = %s"
            val = (file_path, )
            cursor.execute(sql, val)

        result = cursor.fetchall()

        db.commit()

        return result
    except Exception as e:
        print(e)
        return e


if __name__ == "__main__":
    #delete_file("fd7ccb420b7ff266736841d6a5fec445_1624570653.pdf")
    print(get_file())