import os 
import time
import db
import logging

logging.basicConfig(filename='py/logging.log', format='%(asctime)s - %(levelname)s - %(message)s',datefmt='%d.%m.%Y %I:%M:%S' ,encoding='utf-8', level=logging.DEBUG)

def delete_expired_files(path = 'uploads/'):

    files = os.listdir(path)

    for file in files:
        file_age = round((time.time() - os.stat(path + file).st_mtime) /60 /60 /24)
        if file_age >= 30:
            try:
                os.remove(path + file)
                db.delete_file(file)
                logging.info(file + " Removed")
            except:
                logging.error("Error while deleting file: " + file)
        else:
            logging.info("No file deleted, file not expired!")
    

def cleanup_db(path = 'uploads/'):
    files = os.listdir(path)
    db_entries = db.get_file()

    try:
        for db_entrie in db_entries:

            db_file_name = db_entrie[2].split('/')[-1]

            if db_file_name not in files:
                db.delete_file(db_file_name)
                logging.info("Dead entry deleted")
        
            else:
                logging.info("No dead entry found in database")
    except:
        logging.error("Error while cleaning up database!")    

if __name__ == "__main__":
    delete_expired_files()
    cleanup_db()